<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
  <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
<script type="text/javascript">
$(document).ready(function(){

	$("ul.subnav").parent().append("<span></span>"); //Only shows drop down trigger when js is enabled - Adds empty span tag after ul.subnav

	$("ul.topnav li span").click(function() { //When trigger is clicked...

		//Following events are applied to the subnav itself (moving subnav up and down)
		$(this).parent().find("ul.subnav").slideDown('fast').show(); //Drop down the subnav on click

		$(this).parent().hover(function() {
		}, function(){
			$(this).parent().find("ul.subnav").slideUp('slow'); //When the mouse hovers out of the subnav, move it back up
		});

		//Following events are applied to the trigger (Hover events for the trigger)
		}).hover(function() {
			$(this).addClass("subhover"); //On hover over, add class "subhover"
		}, function(){	//On Hover Out
			$(this).removeClass("subhover"); //On hover out, remove class "subhover"
	});

});
</script>
  <link rel="stylesheet" href="style_poceadas.css" type="text/css" >
  <body>
<!-- //######################## HEARD ############################################### -->

<table width="100%" border="0" cellpadding="0" cellspacing="0" background="http://www.oraculosemanal.com/images/bg_celldream.jpg">
  <tr>
    <td height="35">
    <table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td width="382"><img src="http://www.oraculosemanal.com/images/logo_sub.png" width="260" height="58" /></td>
        <td width="568"><table width="468" border="0" align="center" cellpadding="1" cellspacing="10">
          <tr>
            <td height="101"><iframe src="http://www.oraculosemanal.com/rotativo.htm" name="iframedjdwords" width="468" marginwidth="0"  height="80" marginheight="0" scrolling="No" frameborder="0" id="iframedjdwords2"></iframe>
              <br /></td>
          </tr>
        </table></td>
      </tr>
    </table>
    </td>
  </tr>
  <tr>
    <td height="35" background="http://www.oraculosemanal.com/images/topnav_bg.gif"><div class="container">
    <div id="header">
      <ul class="topnav">
            <li><a href="http://www.oraculosemanal.com">Inicio</a></li>
            <li>
                <a href="#">Quinielas</a>
                <ul class="subnav">
                    <li><a href="http://www.oraculosemanal.com/_testing3/Visualizaciones/iframeSorteos.asp?idQuiniela=1">Nacional</a></li>
                    <li><a href="http://www.oraculosemanal.com/_testing3/Visualizaciones/iframeSorteos.asp?idQuiniela=2">Provincia</a></li>
                    <li><a href="http://www.oraculosemanal.com/_testing3/Visualizaciones/iframeSorteos.asp?idQuiniela=3">Montevideo</a></li>
                    <li><a href="http://www.oraculosemanal.com/_testing3/Visualizaciones/iframeSorteos.asp?idQuiniela=11">Santa Fe</a></li>
                    <li><a href="http://www.oraculosemanal.com/_testing3/Visualizaciones/iframeSorteos.asp?idQuiniela=12">Cordoba</a></li>
                    <li><a href="http://www.oraculosemanal.com/_testing3/Visualizaciones/iframeSorteos.asp?idQuiniela=6">Corrientes</a></li>
                    <li><a href="http://www.oraculosemanal.com/_testing3/Visualizaciones/iframeSorteos.asp?idQuiniela=13">Mendoza</a></li>
                    <li><a href="http://www.oraculosemanal.com/_testing3/Visualizaciones/iframeSorteos.asp?idQuiniela=17">Entre Rios</a></li>
                    <li><a href="http://www.oraculosemanal.com/_testing3/Visualizaciones/iframeSorteos.asp?idQuiniela=14">Neuquen</a></li>
                    <li><a href="http://www.oraculosemanal.com/_testing3/Visualizaciones/iframeSorteos.asp?idQuiniela=5">Santiago</a></li>
                    <li><a href="http://www.oraculosemanal.com/_testing3/Visualizaciones/iframeSorteos.asp?idQuiniela=15">Salta</a></li>
                    <li><a href="http://www.oraculosemanal.com/_testing3/Visualizaciones/iframeSorteos.asp?idQuiniela=7">Tucuman</a></li>
                </ul>
            </li>
            <li>
                <a href="#">Poceados</a>
                <ul class="subnav">
                    <li><a href="http://www.oraculosemanal.com/_testing3/Visualizaciones/Poceadas/Resultados_Poceadas-3.php?idPoceada=2">LOTO</a></li>
                    <li><a href="http://www.oraculosemanal.com/_testing3/Visualizaciones/Poceadas/Resultados_Poceadas-3.php?idPoceada=11">TELEKINO</a></li>
                    <li><a href="http://www.oraculosemanal.com/_testing3/Visualizaciones/Poceadas/Resultados_Poceadas-3.php?idPoceada=10">QUINI 6</a></li>
                    <li><a href="http://www.oraculosemanal.com/_testing3/Visualizaciones/Poceadas/Resultados_Poceadas-3.php?idPoceada=3">LOTO 5</a></li>
                    <li><a href="http://www.oraculosemanal.com/_testing3/Visualizaciones/Poceadas/Resultados_Poceadas-3.php?idPoceada=4">BRINCO</a></li>
                    <li><a href="http://www.oraculosemanal.com/_testing3/Visualizaciones/Poceadas/Resultados_Poceadas-3.php?idPoceada=5">MI BINGO</a></li>
                    <li><a href="http://www.oraculosemanal.com/_testing3/Visualizaciones/Poceadas/Resultados_Poceadas-3.php?idPoceada=7">Mono Bingo</a></li>
                    <li><a href="http://www.oraculosemanal.com/_testing3/Visualizaciones/Poceadas/Resultados_Poceadas-3.php?idPoceada=8">La Poceada</a></li>
                    <li><a href="http://www.oraculosemanal.com/_testing3/Visualizaciones/Poceadas/Resultados_Poceadas-3.php?idPoceada=1">Quiniela Plus</a></li>
                    <li><a href="http://www.oraculosemanal.com/_testing3/Visualizaciones/Poceadas/Resultados_Poceadas-3.php?idPoceada=9">Club Keno</a></li>
                    <li><a href="http://www.oraculosemanal.com/_testing3/Visualizaciones/Poceadas/Resultados_Poceadas-3.php?idPoceada=6">Toto Bingo</a></li>
                    <li><a href="http://www.oraculosemanal.com/_testing3/Visualizaciones/Poceadas/Resultados_Poceadas-3.php?idPoceada=12">Juga con Maradona</a></li>
                </ul>
            </li>
            <li><a href="#">Tablas</a>
                            <ul class="subnav">
                    <li><a href="http://www.oraculosemanal.com/oficios.htm">OFICIOS</a></li>
                    <li><a href="#">SUEÑOS</a></li>
                    <li><a href="http://www.oraculosemanal.com/alfa.htm">Alfanumerico</a></li>
                    <li><a href="http://www.oraculosemanal.com/tablita.htm">Tablita de Datelli</a></li>
                    <li><a href="http://www.oraculosemanal.com/martingala1.htm">Martingala 1</a></li>
                    <li><a href="http://www.oraculosemanal.com/martingala2.htm">Martingala 2</a></li>
                    <li><a href="http://www.oraculosemanal.com/nombres.htm">NOMBRES</a></li>
                    <li><a href="http://www.oraculosemanal.com/animales.htm">ANIMALES</a></li>
                    <li><a href="http://www.oraculosemanal.com/tabladepago.htm">Tabla de Pago</a></li>
                </ul>
            </li>
            <li><a href="http://www.oraculosemanal.com/libro.htm">Libro de Datelli</a></li>
          </ul>
      </div>
    </div></td>
  </tr>
</table>

<!-- //###################### FIN HEARD ############################################# -->

<?PHP
  Include ('Coneccion.php');
  //$GET_idQuiniela = $_GET['idQuiniela'];


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
    $Fecha1 =  $Mes . '/' . $dia . '/' .  $anio;
  }else
  {
     $Fecha1 =  $Mes . '/' . $dia . '/' .  $anio;
  } 

  echo '<title>Oraculo Semanal ~ '.$Poceado.'</title>';

  echo '<table align="center" >';
  echo '  <tr> ';
  echo '     <td width="339"><h2 align="center" class="Titulo_Loteria"><strong>' . $Poceado . '</strong> </h2><h5 align="center" class="Titulo_result">SORTEO FECHA: ' . date("d/m/Y",strtotime($Fecha1)) .'</h5></td>';
  echo '  </tr>';

  echo '  <tr> ';
  echo '    <td align="middle"><div align="center">';
  echo '    <center>';

//#################### Inicio de combos Fechas #################################
  echo ' <form name="form1" id="form1" method="GET" action="">

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


    echo '      </tr><tr><td align="Center">
                    <input name="Submit" type="submit" class="Titulo_result1" value="Buscar"  />
                  </td>
                </tr>
              </table>
            </td>
          </tr>
        </table>
        </form> <br><br>';
//#################### FIN de combos de Fechas #################################


  $t = 1;
  while( $t <= 4 )
  {
  
		  $sql = " SELECT T.TURNO
					    FROM turnos T
					   WHERE T.Orden = $t
						ORDER BY T.Orden";
	     $resultado = mssql_query($sql);
	     list( $TURNO ) = mssql_fetch_array($resultado);

        echo '<table  cellspacing="5" cellpadding="10" width="500"  border="1">';
        echo '<tbody>';
        echo '  <tr>';
        echo '     <td colspan="4" align="middle" background="http://www.oraculosemanal.com/images/bgfade.gif"><strong class="Estilo4" >' . $TURNO . '</strong></td>';
        echo '  </tr>';


    	  $sql = " SELECT Q.Orden, S.IDSORTEO, S.IDQuiniela, Q.Quiniela , S.NRoSorteo, S.TURNO
					    FROM SORTEOS S
					   INNER JOIN Quinielas Q ON Q.IDQUINIELA =  S.IDQuiniela
					   INNER JOIN turnos T ON S.TURNO =  T.TURNO
					   WHERE fechaSorteo = '$Fecha1 12:00:00 AM'
						  AND S.IDQuiniela in (17,1,2,11)
						  AND T.Orden = $t
						ORDER BY Q.Orden, S.IDSORTEO, S.IDQuiniela, Q.Quiniela , S.NRoSorteo, S.TURNO";
	     $resultado2 = mssql_query($sql);

		  $e = 1;
        $$resultado_cont = mssql_query($sql);
        if (mssql_num_rows($$resultado_cont) > 0 )
        {
        
             echo '  <tr> ';
             while($Datos_sort = mssql_fetch_array($resultado2) )
             {
					 $Valor[$e] = $Datos_sort['IDSORTEO'] ;
		          echo'      <td align="middle" class="Estilo9" background="http://www.oraculosemanal.com/images/bg_hdr.jpg" ><div align="center" class="Estilo13">' . $Datos_sort['Quiniela'] . '<strong></td>';
		          $e++;
             }
             echo '  </tr>';
             

             $w=1;
             while($w <= 20  )
             {
             
             


 echo'<tr> ';
			    	  $o=1;
		           while($o < $e  )
		           {
							$sql_numeros = "Select ubicacion, numero
							                  From Numeros
												  where IdSorteo = ". $Valor[$o] ."
												    and ubicacion = ". $w ."
												  Order by ubicacion asc ";
						//	echo $sql_numeros ;
							$rs_numeros = mssql_query($sql_numeros);
				         while($Datos_numeros = mssql_fetch_array($rs_numeros) )
				         {
				            echo'<td align="middle" class="Estilo9" background="http://www.oraculosemanal.com/images/bg_hdr.jpg" ><div align="center" class="Estilo13">' . $Datos_numeros['numero'] . '<strong></td>';
				         }

				         $o++;
		           }
echo '  </tr>';

           $w++;
           }
           echo '</tbody>';
           echo '</table>';

        }


    $t = $t+1;
  }
  mssql_close($conn);
  echo '    </center>';
  echo '    </td> ';
  echo '  </tr> ';
  echo '</table><br><br>';
  
  
  /*
  
  
  
  
  
  
  
  
  
  
  
  
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
  echo '     <td width="339"><h2 align="center" class="Titulo_Loteria"><strong>' . $Poceado . '</strong> </h2><h5 align="center" class="Titulo_result">SORTEO Nº ' . $NroSorteo . ' - FECHA: ' . date("d/m/Y",strtotime($fechaSorteo)) .'</h5></td>';
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
  echo '</table><br><br>';
  
  
//#################### Inicio de combos Fechas #################################
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
          						    for ($i = 2000; $i <= 2020; $i++) 
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
              echo '<table cellspacing="5" cellpadding="10" width="300" border="0">
                     <tbody>
                       <tr>
                         <td colspan="6" align="middle" background="http://www.oraculosemanal.com/images/bgfade.gif"><strong class="Estilo4">' . $Datos['TipoPoceado'] . '</strong></td>
                       </tr>';
    
              while($Datos_num = mssql_fetch_array($rs_numeros) )
              { 
                  //If(( Trim($Datos_num['Numero_carton']) != "") AND ( Trim($Datos_num['lugar']) != ""))
                  //{
                     echo' <tr>
                             <td align="middle" background="http://www.oraculosemanal.com/images/bg_hdr.jpg" class="Estilo9"><span class="Titulo_result2">' .$Datos_num['importe'] . '</span></td>
                             <td align="middle" background="http://www.oraculosemanal.com/images/bg_hdr.jpg" class="Estilo9"><span class="Titulo_result2">' .$Datos_num['lugar'] . '</span></td>
                             <td align="middle" background="http://www.oraculosemanal.com/images/bg_hdr.jpg" class="Estilo9"><span class="Titulo_result2">' .$Datos_num['Numero_carton'] . '</span></td>                                     
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
              echo '<table  cellspacing="5" cellpadding="10" width="300"  border="0">';
              echo '<tbody>';
              echo '  <tr>';
              echo '     <td colspan="6" align="middle" background="http://www.oraculosemanal.com/images/bgfade.gif"><strong class="Estilo4" >' . $Datos['TipoPoceado'] . '</strong></td>';
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
                 echo'<td align="middle" class="Estilo9" background="http://www.oraculosemanal.com/images/bg_hdr.jpg" ><div align="center" class="Estilo13">' . $Datos_num['numero'] . '<strong></td>';
                 if ($i == $cant)
                 {
                    echo '</tr><tr>';
                    $i =0 ;
                 }
              }  
              echo '  </tr>';   
              echo '</tbody>';
              echo '</table>';      
                
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
              echo '    <table cellspacing="5" cellpadding="5" width="300" border="0">';
              echo '      <tbody>';
              echo '        <tr>';
              echo '          <td align="middle" background="http://www.oraculosemanal.com/images/bgfade.gif" class="Estilo7"><strong>Aciertos </strong></td>';
              echo '          <td align="middle" background="http://www.oraculosemanal.com/images/bgfade.gif" class="Estilo7"><strong>Ganadores</strong></td>';
              echo '          <td align="middle" background="http://www.oraculosemanal.com/images/bgfade.gif" class="Estilo7"><strong>Premios</strong></td>';
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
                          <td align="middle" background="http://www.oraculosemanal.com/images/bg_hdr.jpg" class="Estilo9"><span class="Titulo_result2">' .$Datos_PRem['Aciertos'] . '</span></td>
                          <td align="middle" background="http://www.oraculosemanal.com/images/bg_hdr.jpg" class="Estilo9"><span class="Titulo_result2">' . $ganadores . '</span></td>
                          <td align="middle" background="http://www.oraculosemanal.com/images/bg_hdr.jpg" class="Estilo9"><span class="Titulo_result2">$ ' . $editado  . '</span></td>
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
          echo '<table  cellspacing="5" cellpadding="10" width="300"  border="0">';
          echo '<tbody>';
          echo '  <tr>';
          echo '     <td colspan="6" align="middle" background="http://www.oraculosemanal.com/images/bgfade.gif"><strong class="Estilo4" >' . $Datos['TipoPoceado'] . '</strong></td>';
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
              echo'<td align="middle" ' . $clase . ' background="http://www.oraculosemanal.com/images/bg_hdr.jpg" ><div align="center" ' . $div . '>&nbsp;' . $Datos_num['numero'] . '&nbsp;<strong></td>';
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
    //echo $Datos['IdSorteoPoceado'];
       if ($Datos['IdSorteoPoceado']  <> 0)
       { 
         cartones($Datos['IdSorteoPoceado'] );
       }
       
   }
}

function cartones($IdSorteoPoceado)
{
    
   $sql_cartones ="SELECT  Numero_carton, lugar FROM  CARTONES WHERE idSorteoPoceado = " . $IdSorteoPoceado ;
//echo  $sql_cartones ;
   $rs_numeros = mssql_query($sql_cartones);     
   $rs_numeros2 = mssql_query($sql_cartones); 
   if (mssql_num_rows($rs_numeros2) > 0 )
   {
       echo '<table cellspacing="5" cellpadding="10" width="300" border="0">';
       echo '<tbody>';
       //echo '  <tr>';
      // echo '    <td colspan="2" align="middle" background="http://www.oraculosemanal.com/images/bgfade.gif"><strong class="Estilo4">' . $Datos['TipoPoceado'] . '</strong></td>';
      // echo '  </tr>';

       echo '  <tr>';
       echo '     <td align="middle" background="http://www.oraculosemanal.com/images/bgfade.gif" class="Estilo7" width="45%" ><strong>Nro. de Cart&oacute;n </strong></td>';
       echo '     <td align="middle" background="http://www.oraculosemanal.com/images/bgfade.gif" class="Estilo7" width="65%" ><strong>Vendido en</strong></td>';
       echo '  </tr> ';

       while($Datos_num = mssql_fetch_array($rs_numeros) )
       { 
          If(( Trim($Datos_num['Numero_carton']) != '') AND ( Trim($Datos_num['lugar']) != '')) 
          {
             echo ' <tr> ';
             echo '   <td align="middle" background="http://www.oraculosemanal.com/images/bg_hdr.jpg" class="Estilo9"><span class="Titulo_result2">' .$Datos_num['Numero_carton'] . '</span></td>';
             echo '   <td align="middle" background="http://www.oraculosemanal.com/images/bg_hdr.jpg" class="Estilo9"><span class="Titulo_result2">' . $Datos_num['lugar'] . '</span></td>';
             echo ' </tr> ';
          }                                                                              
       } 
       echo ' </tbody>';
       echo ' </table>';  
    }else
	 {
      cartones2($IdSorteoPoceado);
	 }
  
}

function cartones2($IdSorteoPoceado)
{
     $SQL_PRemios = 'SELECT Aciertos, Ganadores, Monto, IdSorteoPoceado
                       FROM Premios
                      WHERE IdSorteoPoceado = '.  $IdSorteoPoceado . ' order by Aciertos desc';

     $rs_PRemios = mssql_query($SQL_PRemios);
     $rs_PRemios2 = mssql_query($SQL_PRemios);
     if (mssql_num_rows($rs_PRemios2) > 0 )
     {
        echo '<div align="center">';
        echo '  <center>';
        echo '    <table cellspacing="5" cellpadding="5" width="300" border="0">';
        echo '      <tbody>';
        echo '        <tr>';
        echo '          <td align="middle" background="http://www.oraculosemanal.com/images/bgfade.gif" class="Estilo7"><strong>Aciertos </strong></td>';
        echo '          <td align="middle" background="http://www.oraculosemanal.com/images/bgfade.gif" class="Estilo7"><strong>Ganadores</strong></td>';
        echo '          <td align="middle" background="http://www.oraculosemanal.com/images/bgfade.gif" class="Estilo7"><strong>Premios</strong></td>';
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
                    <td align="middle" background="http://www.oraculosemanal.com/images/bg_hdr.jpg" class="Estilo9"><span class="Titulo_result2">' .$Datos_PRem['Aciertos'] . '</span></td>
                    <td align="middle" background="http://www.oraculosemanal.com/images/bg_hdr.jpg" class="Estilo9"><span class="Titulo_result2">' . $ganadores . '</span></td>
                    <td align="middle" background="http://www.oraculosemanal.com/images/bg_hdr.jpg" class="Estilo9"><span class="Titulo_result2">$ ' . $editado  . '</span></td>
                  </tr> ';
        }
        echo '      </tbody>';
        echo '    </table>';
        echo '  </center>';
        echo '</div>';
     }

}

*/
//######################### Fin de Funciones ###################################
?>


<table width="100%" border="0" cellpadding="0" cellspacing="0" background="http://www.oraculosemanal.com/images/footer-bg.png">
  <tr>
    <td height="35" background="http://www.oraculosemanal.com/images/topnav_bg.gif">&nbsp;</td>
  </tr>
  <tr>
    <td><table width="400" border="0" align="center">
      <tr>
        <td height="70"><div align="center"><span class="Titulo_result">© 2010 Oraculosemanal.com. Todos los derechos reservados.</span> </div></td>
      </tr>
    </table></td>
  </tr>
</table>

  </body>
</html>
