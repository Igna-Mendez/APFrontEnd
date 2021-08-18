<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="https://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<link href='https://fonts.googleapis.com/css?family=Oswald:700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="style_poceadas2.css" type="text/css" >
</head>

<body>
<?PHP
  Include ('Coneccion.php');
  $GET_IdPoceada = $_GET['idPoceada'];
  
  $dia = $_GET['dia'];
  $Mes = $_GET['Mes'];
  $anio = $_GET['anio']; 

  $fecha = getdate();
  $anio_actual = $fecha[year];
  
  if(($anio == "") and ($Mes == "") and ( $dia == ""))
  {
    $fecha = getdate();
    $anio = $fecha[year];
    $Mes = $fecha[mon];
    $dia =  $fecha[mday];  
    $Fecha = "";         
  }else
  {
    $Fecha1 = $anio . '/' . $Mes . '/' . $dia ;
    $Fecha = " AND SP.fechaSorteo <= '" . $Fecha1 . "'" ;
    $Fecha2 = " AND fechaSorteo <= '" . $Fecha1 . "'" ; 
  } 

  $sql = "SELECT SP.IdSorteoPoceado, SP.IdtipoPoceado,
                 SP.idPoceado, SP.fechaSorteo, 
                 SP.NroSorteo, SP.pozo,P.Poceado, TP.TipoPoceado
            FROM Sorteos_Poceados SP
           INNER JOIN POCEADOS P ON ( SP.idPoceado = P.IdPoceado )  
            LEFT JOIN  TIPOS_POCEADOS TP ON ( TP.IdTipoPoceado = SP.IdtipoPoceado  )
           WHERE SP.FechaSorteo = (Select MAX(FechaSorteo) FROM Sorteos_Poceados where IdPoceado = $GET_IdPoceada  $Fecha2) 
             AND SP.IdPoceado = $GET_IdPoceada   $Fecha  
             order by SP.IdtipoPoceado asc";
 // echo $sql;
  $resultado = mssql_query($sql);
  list( $IdSorteoPoceado, $IdtipoPoceado, $idPoceado, $fechaSorteo, $NroSorteo, $pozo, $Poceado ) = mssql_fetch_array($resultado);
  
  echo '<title>Oraculo Semanal ~ '.$Poceado.'</title>';
  
  echo '<table align="center" >';
  echo '  <tr> ';
  echo '     <td width="339"><h1 align="center" class="Titulo_Loteria">' . $Poceado . ' </h1><h1 align="center" class="Titulo_result">FECHA: <strong class="Estilo18" >' . date("d/m/Y",strtotime($fechaSorteo)) .'</strong></h1></td>';
  echo '  </tr>';
  
  echo '  <tr> ';
  echo '    <td align="middle"><div align="center">';
  echo '    <center>';
  
  $resultado = mssql_query($sql);       
//  while($Datos = mssql_fetch_array($resultado) )
//  { //inicio While 1 
      
   if (( $idPoceado == 11) or ($idPoceado == 7) or ($idPoceado == 6)) 
   {
     monobingo($resultado);
   }else
   {
     Poceadas($resultado);
   } 
              
//  } // Fin While 1
  echo '    </center>';
  echo '    </td> ';
  echo '  </tr> ';
  echo '</table>';
  
  
//#################### Inicio de combos Fechas #################################
  echo ' <form name="form1" id="form1" method="GET" action=""> 
         <input type="hidden" name="idPoceada" value="' . $GET_IdPoceada . '" >
         <table width="160" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td bgcolor="#000000"><div align="center" class="Estilo3">FECHA DE SORTEO</div></td>
          </tr>
          <tr>
            <td>
               <table width="150" border="0" align="center">
                <tr>
                  <td> ';         

      						    echo "<select name='dia'>";
          						    for ($i = 1; $i <= 31; $i++) 
                          {
                              if ($i == $dia)
                              {
                                 echo "<option selected value='" . $i . "'>$i</option>";
                              }else
                              {
                                 echo "<option value='" . $i . "'>$i</option>";
                              }
                          }
      						    echo "</select>";
      						    echo "<select name='Mes'>";
          						    for ($i = 1; $i <= 12; $i++) 
                          {
                              if ($i == $Mes)
                              {
                                 echo "<option selected value='" . $i . "'>$i</option>";
                              }else
                              {
                                 echo "<option value='" . $i . "'>$i</option>";
                              }                         
                              
                          }
      						    echo "</select>";
      						    echo "<select name='anio'>";
          						    for ($i = 2000; $i <= ($anio_actual+1); $i++)
                          {
                              if ($i == $anio)
                              {
                                 echo "<option selected value='" . $i . "'>$i</option>";
                              }else
                              {
                                 echo "<option value='" . $i . "'>$i</option>";
                              } 
                          }
      						    echo "</select>";                    						    
  						    echo "</td>";
                         
     
    echo '      </tr><tr><td align="Center"> 
                    <input name="Submit" type="submit" class="Titulo_result1" value="Buscar"  />
                  </td>
                </tr>
              </table>
            </td>
          </tr>
        </table>
        </form> ';
//#################### FIN de combos de Fechas #################################  

//--------------------------------------------------------------------------------

//####################### Inicio de Funciones ##################################

Function Poceadas($resultado)
{

   while($Datos = mssql_fetch_array($resultado) )
   {
      if(Trim($Datos['IdtipoPoceado']) == 36)
      {  
          $sql_cartones ="SELECT  Numero_carton, lugar, importe FROM  CARTONES WHERE idSorteoPoceado = " . $Datos['IdSorteoPoceado'] . " AND Numero_carton <> '0' AND lugar is not null ";
//          echo      $sql_cartones ;
          $rs_numeros = mssql_query($sql_cartones); 
          $rs_numeros2 = mssql_query($sql_cartones); 
          if (mssql_num_rows($rs_numeros2) > 0 )
          {
              echo '<table cellspacing="5" cellpadding="10" width="160" border="0">
                     <tbody>
                       <tr>
                         <td colspan="6" align="middle" background="/images/bgfade.gif"><strong class="Estilo4">' . $Datos['TipoPoceado'] . '</strong></td>
                       </tr>';
    
              while($Datos_num = mssql_fetch_array($rs_numeros) )
              { 
                  /*If(( Trim($Datos_num['Numero_carton']) != "") AND ( Trim($Datos_num['lugar']) != "")) 
                  {     */
                     echo' <tr>
                             <td align="middle" background="/images/bg_hdr.jpg" class="Estilo9"><span class="Titulo_result2">' .$Datos_num['importe'] . '</span></td>
                             <td align="middle" background="/images/bg_hdr.jpg" class="Estilo9"><span class="Titulo_result2">' .$Datos_num['lugar'] . '</span></td>
                             <td align="middle" background="/images/bg_hdr.jpg" class="Estilo9"><span class="Titulo_result2">' .$Datos_num['Numero_carton'] . '</span></td>                                     
                           </tr> ';
                  //}                                                                              
              } 
              echo ' </tbody>
                     </table>';
         }                     
      }else
      {  
           $SQL_Cant = 'SELECT Count(numero)
                          FROM numeros_poceados
                         WHERE numero <> ""
                           AND IdSorteoPoceado = ' . $Datos['IdSorteoPoceado']   ; 
           $rs_Conunt= mssql_query($SQL_Cant);                                   
           list( $Count) = mssql_fetch_array($rs_Conunt);                       
        
           If ( ($Count % 5) == 0 )
           {
             $cant = 5; 
           } else
           {
             If ( ($Count % 6 ) == 0 ) 
             {
               $cant = 6; 
             }else
             {
               $cant = 5; 
             }
           } 
           
           If ($Count > 0)
           {   
              echo '<table  cellspacing="2" cellpadding="2" width="170"  border="0">';
              echo '<tbody>';
              echo '  <tr>';
              echo '     <td colspan="6" align="middle" background="/images/bgfade.gif"><strong class="Estilo4" >' . $Datos['TipoPoceado'] . '</strong></td>';
              echo '  </tr>';    
              
              $SQL_num = 'SELECT Ubicacion, numero, IdSorteoPoceado
                            FROM numeros_poceados
                           WHERE IdSorteoPoceado = '.  $Datos['IdSorteoPoceado'] .
                         ' ORDER by numero, Ubicacion '; 
              $rs_numeros = mssql_query($SQL_num); 
              $i =0 ;
              echo'<tr> ';                                    
              while($Datos_num = mssql_fetch_array($rs_numeros) )
              { 
                 $i++;
                 echo'<td align="middle" class="Estilo9" background="/images/bg_hdr.jpg"><strong class="Estilo18">Secuencia </strong><div align="center" class="Estilo13">' . $Datos_num['numero'] . '<strong></td>';
                 if ($i == $cant)
                 {
                    echo '</tr><tr>';
                    $i =0 ;
                 }
              }  
              echo '  </tr>';   
              echo '</tbody>';
              echo '</table>';      
              echo '<div align="center" class="Estilo18">c/u cobra $1.000</div>';  
           }
                           
           $SQL_PRemios = 'SELECT Aciertos, Ganadores, Monto, IdSorteoPoceado
                             FROM Premios
                            WHERE IdSorteoPoceado = '.  $Datos['IdSorteoPoceado'] . ' order by Aciertos desc';    
           $rs_PRemios = mssql_query($SQL_PRemios);
           $rs_PRemios2 = mssql_query($SQL_PRemios); 
           if (mssql_num_rows($rs_PRemios2) > 0 )
           {
              echo '<div align="center">';
              echo '  <center>';
              echo '    <table cellspacing="1" cellpadding="1" width="180" border="0">';
              echo '      <tbody>';
              echo '        <tr>';
              echo '          <td align="middle" background="/images/bgfade.gif" class="Estilo7"><strong>Aciertos </strong></td>';
              echo '          <td align="middle" background="/images/bgfade.gif" class="Estilo7"><strong>Ganadores</strong></td>';
              echo '          <td align="middle" background="/images/bgfade.gif" class="Estilo7"><strong>Premios</strong></td>';
              echo '        </tr> ';            
              while($Datos_PRem = mssql_fetch_array($rs_PRemios) )
              {          
                  if (($Datos_PRem['Ganadores'] == "" ) or ($Datos_PRem['Ganadores'] == 0 ))
                  {
                     $ganadores = 'Vacante';
                  }else
                  {
                     $ganadores = $Datos_PRem['Ganadores'];
                  }                     
                  $editado = number_format($Datos_PRem['Monto'], 2, ",", ".");
                 
                  echo' <tr>
                          <td align="middle" background="/images/bg_hdr.jpg" class="Estilo9"><span class="Titulo_result2">' .$Datos_PRem['Aciertos'] . '</span></td>
                          <td align="middle" background="/images/bg_hdr.jpg" class="Estilo9"><span class="Titulo_result2">' . $ganadores . '</span></td>
                          <td align="middle" background="/images/bg_hdr.jpg" class="Estilo9"><span class="Titulo_result2">$ ' . $editado  . '</span></td>
                        </tr> ';
              }              
              echo '      </tbody>';
              echo '    </table>';                    
              echo '  </center>';
              echo '</div>'; 
           }   
    
       }
         
   }   
}

Function monobingo($resultado)
{
   while($Datos = mssql_fetch_array($resultado) )
   {
       $SQL_Cant = 'SELECT Count(numero)
                      FROM numeros_poceados
                     WHERE numero <> ""
                       AND IdSorteoPoceado = ' . $Datos['IdSorteoPoceado']   ; 
       $rs_Conunt= mssql_query($SQL_Cant);                                   
       list( $Count) = mssql_fetch_array($rs_Conunt);                       
    
       If ( ($Count % 5) == 0 )
       {
         $cant = 5; 
       } else
       {
         If ( ($Count % 6 ) == 0 ) 
         {
           $cant = 6; 
         }else
         {
           $cant = 5; 
         }
       } 
       
       If ($Count > 0)
       {   
          echo '<table  cellspacing="5" cellpadding="5" width="180"  border="0">';
          echo '<tbody>';
          echo '  <tr>';
          echo '     <td colspan="6" align="middle" background="/images/bgfade.gif"><strong class="Estilo4" >' . $Datos['TipoPoceado'] . '</strong></td>';
          echo '  </tr>';    
          
          $SQL_num = 'SELECT Ubicacion, numero, IdSorteoPoceado
                        FROM numeros_poceados
                       WHERE IdSorteoPoceado = '.  $Datos['IdSorteoPoceado'] .
                     ' ORDER by numero, Ubicacion '; 
          $rs_numeros = mssql_query($SQL_num); 
          $i =0 ;
          $rs_numeros2 = mssql_query($SQL_num); 
          $canti2 = mssql_num_rows($rs_numeros2);
          
          echo'<tr> ';
          if ($canti2 <= 3 )
          {
              echo '<td><table align="center" border="0">';
              echo '  <tr>';
              $clase = ' class="Estilo2" ';
              $div = ' class="Estilo15" ';
          }else
          {
              $clase = ' class="Estilo2" ';
              $div = ' class="Estilo13" ';
          }      
                                              
          while($Datos_num = mssql_fetch_array($rs_numeros) )
          { 
              $i++;
              echo'<td align="middle" ' . $clase . ' background="/images/bg_hdr.jpg" ><div align="center" ' . $div . '>&nbsp;' . $Datos_num['numero'] . '&nbsp;<strong></td>';
              if ($i == $cant)
              {
                 echo '</tr><tr>';
                 $i =0 ;
              }
              
              if ( $canti2 == 2 )
              {
                 echo '  </tr>';
                 echo '</table></td>'; 
                 echo '<td><table align="center" border="0">';
                 echo '  <tr>';                                                                                               
              }   
              
          }  
          if ($canti2 <= 3 )
          {
              echo '  </tr>';
              echo '</table></td>';              
          }           
          echo '  </tr>';   
          echo '</tbody>';
          echo '</table>';      
            
       }
    
       if ($Datos['IdSorteoPoceado']  <> 0)
       { 
         cartones($Datos['IdSorteoPoceado'] );
       }
       
   }
}

function cartones($IdSorteoPoceado)
{
    
   $sql_cartones ="SELECT  Numero_carton, lugar FROM  CARTONES WHERE idSorteoPoceado = " . $IdSorteoPoceado ;
  // echo $sql_cartones;
   $rs_numeros = mssql_query($sql_cartones);     
   $rs_numeros2 = mssql_query($sql_cartones); 
   if (mssql_num_rows($rs_numeros2) > 0 )
   {
       echo '<table cellspacing="5" cellpadding="5" width="180" border="0">';
       echo '<tbody>';
       echo '  <tr>';
       echo '    <td colspan="2" align="middle" background="/images/bgfade.gif"><strong class="Estilo4">' . $Datos['TipoPoceado'] . '</strong></td>';
       echo '  </tr>';                       
       
       echo '  <tr>';
       echo '     <td align="middle" background="/images/bgfade.gif" class="Estilo7" width="45%" ><strong>Nro. de Cart&oacute;n </strong></td>';
       echo '     <td align="middle" background="/images/bgfade.gif" class="Estilo7" width="65%" ><strong>Vendido en</strong></td>';
       echo '  </tr> ';

       while($Datos_num = mssql_fetch_array($rs_numeros) )
       { 
          If(( Trim($Datos_num['Numero_carton']) != '') AND ( Trim($Datos_num['lugar']) != '')) 
          {
             echo ' <tr> ';
             echo '   <td align="middle" background="/images/bg_hdr.jpg" class="Estilo9"><span class="Titulo_result2">' .$Datos_num['Numero_carton'] . '</span></td>';
             echo '   <td align="middle" background="/images/bg_hdr.jpg" class="Estilo9"><span class="Titulo_result2">' . $Datos_num['lugar'] . '</span></td>';
             echo ' </tr> ';
          }                                                                              
       } 
       echo ' </tbody>';
       echo ' </table>';  
    }
  
}
//######################### Fin de Funciones ###################################
?>
</body>
</html>
