<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
  <link rel="stylesheet" href="style_poceadas.css" type="text/css" >
  

  <body>                           



  <?PHP
     Include ('Coneccion.php');
           
     $GET_IdPoceada = $_GET['idPoceada'];
    // $GET_Fecha = $_GET['Fecha'];
     
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
    
      
     $sql = "SELECT SP.IdSorteoPoceado, SP.IdtipoPoceado, SP.idPoceado, SP.fechaSorteo, SP.NroSorteo, SP.pozo,P.Poceado, TP.TipoPoceado
               FROM Sorteos_Poceados SP
              INNER JOIN POCEADOS P ON ( SP.idPoceado = P.IdPoceado )  
               LEFT JOIN  TIPOS_POCEADOS TP ON ( TP.IdTipoPoceado = SP.IdtipoPoceado  )
              WHERE SP.FechaSorteo = (Select MAX(FechaSorteo) FROM Sorteos_Poceados where IdPoceado = $GET_IdPoceada  $Fecha2) 
                AND SP.IdPoceado = $GET_IdPoceada   $Fecha  ";
                             
     $resultado = mssql_query($sql);
     list( $IdSorteoPoceado, $IdtipoPoceado, $idPoceado, $fechaSorteo, $NroSorteo, $pozo, $Poceado ) = mssql_fetch_array($resultado);
    
    echo '<title>Oraculo Semanal ~ '.$Poceado.'</title>'; 
    echo '<table align="center" >';
    echo ' <tr>
              <td width="339"><h2 align="center" class="Titulo_Loteria"><strong>' . $Poceado . '</strong> </h2>
                             <h5 align="center" class="Titulo_result">SORTEO Nº ' . $NroSorteo . ' - FECHA: ' . date("d/m/Y",strtotime($fechaSorteo)) .'</h5></td>
           </tr>';
           
           
            
   echo '  <tr>
              <td align="middle"><div align="center">
               <center>';
               
        $resultado = mssql_query($sql);       
        while($Datos = mssql_fetch_array($resultado) )
        {    
           if($Datos['IdtipoPoceado'] == 26)
           {        
                 echo '<table cellspacing="5" cellpadding="10" width="300" border="0">
                      <tbody>
                        <tr>
                          <td colspan="2" align="middle" background="http://www.oraculosemanal.com/images/bgfade.gif"><strong class="Estilo4">' . $Datos['TipoPoceado'] . '</strong></td>
                        </tr>';                       
                echo '  <tr>
                           <td align="middle" background="http://www.oraculosemanal.com/images/bgfade.gif" class="Estilo7" width="45%" ><strong>Nro. de Cart&oacute;n </strong></td>
                           <td align="middle" background="http://www.oraculosemanal.com/images/bgfade.gif" class="Estilo7" width="65%" ><strong>Vendido en</strong></td>
                        </tr> ';
                $sql_cartones ="SELECT  Numero_carton, lugar FROM  CARTONES WHERE idSorteoPoceado = " . $Datos['IdSorteoPoceado'];
                $rs_numeros = mssql_query($sql_cartones); 
                while($Datos_num = mssql_fetch_array($rs_numeros) )
                { 
                    If(( Trim($Datos_num['Numero_carton']) != '') AND ( Trim($Datos_num['lugar']) != '')) 
                    {
                       echo' <tr>
                               <td align="middle" background="http://www.oraculosemanal.com/images/bg_hdr.jpg" class="Estilo9"><span class="Titulo_result2">' .$Datos_num['Numero_carton'] . '</span></td>
                               <td align="middle" background="http://www.oraculosemanal.com/images/bg_hdr.jpg" class="Estilo9"><span class="Titulo_result2">' . $Datos_num['lugar'] . '</span></td>
                             </tr> ';
                    }                                                                              
                } 
                echo ' </tbody>
                       </table>';
                
                         
           }else
           {

                 if($Datos['IdtipoPoceado'] == 36)
                 {        
                       echo '<table cellspacing="5" cellpadding="10" width="300" border="0">
                            <tbody>
                              <tr>
                                <td colspan="2" align="middle" background="http://www.oraculosemanal.com/images/bgfade.gif"><strong class="Estilo4">' . $Datos['TipoPoceado'] . '</strong></td>
                              </tr>';                       
/*                      echo '  <tr>
                                 <td align="middle" background="http://www.oraculosemanal.com/images/bgfade.gif" class="Estilo7" width="45%" ><strong>Nro. de Cart&oacute;n </strong></td>
                                 <td align="middle" background="http://www.oraculosemanal.com/images/bgfade.gif" class="Estilo7" width="65%" ><strong>Vendido en</strong></td>
                              </tr> ';
*/                              
                      $sql_cartones ="SELECT  Numero_carton, lugar, importe FROM  CARTONES WHERE idSorteoPoceado = " . $Datos['IdSorteoPoceado'];
                      $rs_numeros = mssql_query($sql_cartones); 
                      while($Datos_num = mssql_fetch_array($rs_numeros) )
                      { 
                          If(( Trim($Datos_num['Numero_carton']) != "") AND ( Trim($Datos_num['lugar']) != "")) 
                          {
                             echo' <tr>
                                     <td align="middle" background="http://www.oraculosemanal.com/images/bg_hdr.jpg" class="Estilo9"><span class="Titulo_result2">' .$Datos_num['importe'] . '</span></td>
                                     <td align="middle" background="http://www.oraculosemanal.com/images/bg_hdr.jpg" class="Estilo9"><span class="Titulo_result2">' . $Datos_num['lugar'] . '</span></td>
                                     <td align="middle" background="http://www.oraculosemanal.com/images/bg_hdr.jpg" class="Estilo9"><span class="Titulo_result2">' .$Datos_num['Numero_carton'] . '</span></td>                                     
                                   </tr> ';
                          }                                                                              
                      } 
                      echo ' </tbody>
                             </table>';
                      
                               
                 }else
                 {
        
                      $SQL_Cant = 'SELECT Count(numero)
                                        FROM numeros_poceados
                                       WHERE numero <> ""
                                        AND  IdSorteoPoceado = '.  $Datos['IdSorteoPoceado']  ; 
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
                        } else
                        {
                      
                              $cant = 5; 
                      
                        }
                      }   
                       
                       If ($Count > 0)
                       {
                       
        /*                             if (($IdtipoPoceado == 23) or ( $IdtipoPoceado == 24) or ( $IdtipoPoceado == 25) )
                                     {
                                        $stile = ' align="middle" height="43" class="Estilo15" ';
                                        $divs_1 = '<div align="center" class="Estilo13">';
                                        $divs_2 = '</div> ';    
                                     }else 
                                     {
                                        $stile = ' class="Estilo2" ' ;
                                        $divs_1 = '<strong>';
                                        $divs_2 = '</strong>';                                   
                                     }
        
        */ 
        
                                        $stile = ' class="Estilo2" ' ;
                                        $divs_1 = '<strong>';
                                        $divs_2 = '</strong>';                                   
        
        
                                echo '<table  cellspacing="5" cellpadding="10" width="300"  border="0">
                                      <tbody>
                                        <tr>
                                          <td colspan="6" align="middle" background="http://www.oraculosemanal.com/images/bgfade.gif"><strong class="Estilo4" >' . $Datos['TipoPoceado'] . '</strong></td>
                                        </tr>';
          
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
        
                                     echo'<td ' . $stile . ' background="http://www.oraculosemanal.com/images/bg_hdr.jpg" >' . $divs_1 . $Datos_num['numero'] . $divs_2 . '</td>';
                                     
                                     if ($i == $cant)
                                     {
                                        echo '</tr><tr>';
                                        $i =0 ;
                                      
                                     }
                                     
                                        
                                  }   
                                  echo'</tr>';   
                                      echo '
                                      </tbody>
                                    </table>';
                        }            
                        
                   
                                  $SQL_PRemios = 'SELECT Aciertos, Ganadores, Monto, IdSorteoPoceado
                                                    FROM Premios
                                                   WHERE IdSorteoPoceado = '.  $Datos['IdSorteoPoceado'] ;    
                                  $rs_PRemios = mssql_query($SQL_PRemios);
                                  $rs_PRemios2 = mssql_query($SQL_PRemios);       
                                   if (mssql_num_rows($rs_PRemios2) > 0 )
                                   {
                                      echo '<div align="center">
                                            <center>
                                              <table cellspacing="5" cellpadding="5" width="300" border="0">
                                                <tbody>
                                                  <tr>
                                                    <td align="middle" background="http://www.oraculosemanal.com/images/bgfade.gif" class="Estilo7"><strong>Aciertos </strong></td>
                                                    <td align="middle" background="http://www.oraculosemanal.com/images/bgfade.gif" class="Estilo7"><strong>Ganadores</strong></td>
                                                    <td align="middle" background="http://www.oraculosemanal.com/images/bgfade.gif" class="Estilo7"><strong>Premios</strong></td>
                                                  </tr> ';
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
                                                                <td align="middle" background="http://www.oraculosemanal.com/images/bg_hdr.jpg" class="Estilo9"><span class="Titulo_result2">' .$Datos_PRem['Aciertos'] . '</span></td>
                                                                <td align="middle" background="http://www.oraculosemanal.com/images/bg_hdr.jpg" class="Estilo9"><span class="Titulo_result2">' . $ganadores . '</span></td>
                                                                <td align="middle" background="http://www.oraculosemanal.com/images/bg_hdr.jpg" class="Estilo9"><span class="Titulo_result2">$ ' . $editado  . '</span></td>
                                                              </tr> ';
                                                      }      
                                                      
                                                                              
                                   echo '        </tbody>
                                              </table>';
                                              
                                   echo '    </center>
                                          </div>';    
                               
                                   }
                          
               }   
            }                 
                
    }      
          
    echo '</td>
       </tr>
    </table><br><br>'; 
    
      
  echo ' <form name="form1" id="form1" method="GET" action=""> 
         <input type="hidden" name="idPoceada" value="' . $GET_IdPoceada . '" >
         <table width="200" border="0" align="center" cellpadding="0" cellspacing="0">
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
                         
     mssql_close($conn);
    echo '      </tr><tr><td align="Center"> 
                    <input name="Submit" type="submit" class="Titulo_result1" value="Buscar"  />
                  </td>
                </tr>
              </table>
            </td>
          </tr>
        </table>
        </form> ';
     

  
  ?>























  </body>
</html>
