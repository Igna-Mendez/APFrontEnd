<?php

  function Pantalla_carga()
  {
      $fecha = getdate();
      $anio = $fecha[year];
      $Mes = $fecha[mon];
      $dia =  $fecha[mday];
    echo "<br><br>";
     echo '<form name="form1" method="GET" > ';
  	   datos_tablaopen (' width="260" align="center" class="tablabusqueda" border=0');
  	   		 datos_tablaRowsOpen;
  						    datos_tabladata('Fecha : ', ' width="134" class="tituloMenu"  align="right" ');
  						    datos_tabladata('&nbsp;');
  						    echo "<td>";
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
      						    echo "<select name='mes'>";
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
  			   datos_tablaRowsClose();

  	   		 datos_tablaRowsOpen;
  						    datos_tabladata('Cifras : ', ' width="134" class="tituloMenu"  align="right" ');
  						    datos_tabladata('&nbsp;');
  						    echo "<td align='left'>";
  						    echo "<select name='cifra'>";
  						    for ($i = 1; $i <= 10; $i++)
                  {
                      echo "<option value='" . $i . "' >$i</option>";
                  }
  						    echo "</select>";
  						    echo "</td>";
  			   datos_tablaRowsClose();

  				 datos_tablaRowsOpen;
  						    datos_tabladata('Turno : ', ' width="134" class="tituloMenu"  align="right" ');
  						    datos_tabladata('&nbsp;');
  						    cargo_combos(  "Cmd_turnos","turnos", "Descripcion", "ID"  );
  			   datos_tablaRowsClose();

           datos_tablaRowsOpen;
  						    datos_tabladata('Loteria 1 : ', ' width="134" class="tituloMenu"  align="right" ');
  						    datos_tabladata('&nbsp;');
  						    cargo_combos(  "Cmd_loterias1","quinielas", "QUINIELA", "IDQUINIELA"  );
  			   datos_tablaRowsClose();

           datos_tablaRowsOpen;
							    datos_tabladata(' N&deg; Sorteo 1&deg; : ', ' width="134" class="tituloMenu"  align="right" ');
							     datos_tabladata('&nbsp;');
							    datos_tabladata('<input type="text" name="Sorteo_1"  size="10"  maxlength="10" value=0 onKeyPress="return Solo_Numeros(event)" >', ' width="127" class="clsNode" align="left"');
				   datos_tablaRowsClose();

           datos_tablaRowsOpen;
  						    datos_tabladata('Loteria 2 : ', ' width="134" class="tituloMenu"  align="right" ');
  						    datos_tabladata('&nbsp;');
  						    cargo_combos(  "Cmd_loterias2","quinielas", "QUINIELA", "IDQUINIELA"  );
  			   datos_tablaRowsClose();

           datos_tablaRowsOpen;
							    datos_tabladata(' N&deg; Sorteo 2&deg; : ', ' width="134" class="tituloMenu"  align="right" ');
							     datos_tabladata('&nbsp;');
							    datos_tabladata('<input type="text" name="Sorteo_2"  size="10"  maxlength="10" value=0 onKeyPress="return Solo_Numeros(event)" >', ' width="127" class="clsNode" align="left" ');
				   datos_tablaRowsClose();

           datos_tabladata('<div align="center"><input type="button" value="Ingresar" onclick="refres(this);" class="button" ></div>',' colspan="3" ');

       datos_tablaclose();
  	 echo '</form>';
  }

 function pantalla_cargoN( $dia,$mes,$anio , $cifra, $Cmd_turnos, $Cmd_loterias1, $Sorteo_1, $Cmd_loterias2, $Sorteo_2 )
  {
      echo '<div id="div_quiniela1" >';
           Div1($Sorteo_1, $Cmd_loterias1, $cifra, $Cmd_turnos,$dia,$mes,$anio);
    echo '</div>';

    echo "<br><br><br>";

    echo '<div id="div_quiniela2" >';
         Div2($Sorteo_2, $Cmd_loterias2, $cifra, $Cmd_turnos,$dia,$mes,$anio);
    echo '</div>';
  }

  function Div1($Sorteo_1, $Cmd_loterias1, $cifra, $Cmd_turnos,$dia,$mes,$anio)
  {
         echo '<form name="form1" method="GET" > ';
         echo "<input type='hidden' name='Valor'  value='1'> ";
      	   datos_tablaopen (' width="260" align="center" class="tablabusqueda" border=0 ');

        			 datos_tablaRowsOpen;
    		             cargo_numeros($Sorteo_1, $Cmd_loterias1, $cifra, $Cmd_turnos,$dia,$mes,$anio);
        		   datos_tablaRowsClose();

               datos_tabladata('<div align="center"><input type="button" value="Guardar" onclick="actualiza1(this);" class="button" ></div>');

           datos_tablaclose();
      	 echo '</form>';
  }

 function Div2($Sorteo_2, $Cmd_loterias2, $cifra, $Cmd_turnos,$dia,$mes,$anio)
 {
       echo '<form name="form2" method="GET" > ';
       echo "<input type='hidden' name='Valor'  value='2'> ";
    	   datos_tablaopen (' width="260" align="center" class="tablabusqueda" border=0 ');

             datos_tablaRowsOpen;
  		             cargo_numeros($Sorteo_2, $Cmd_loterias2, $cifra, $Cmd_turnos,$dia,$mes,$anio);
      		   datos_tablaRowsClose();

             datos_tabladata('<div align="center"><input type="button" value="Guardar" onclick="actualiza2(this);" class="button" ></div>');

         datos_tablaclose();
    	 echo '</form>';

 }

  function cargo_numeros($Sorte, $Quiniela, $cifra, $Cmd_turnos, $dia,$mes,$anio)
  {
      include 'coneccion.php';

      $Sql = "SELECT Quiniela FROM Quiniela WHERE IDQUINIELA = $Quiniela";
      $resultado = mssql_query($Sql);
      list( $Quiniela_Desc) = mssql_fetch_array($resultado);

      $Sql = "SELECT Descripcion FROM turnos  WHERE ID = $Cmd_turnos";
      $resultado = mssql_query($Sql);
      list( $Turno_Desc) = mssql_fetch_array($resultado);

      echo "<input type='hidden' name='cifra'  value='" . $cifra . "'> ";
      echo "<input type='hidden' name='turnos'  value='" . $Cmd_turnos . "'> ";
      echo "<input type='hidden' name='dia'  value='" . $dia . "'> ";
      echo "<input type='hidden' name='mes'  value='" . $mes . "'> ";
      echo "<input type='hidden' name='anio'  value='" . $anio . "'> ";
      echo "<input type='hidden' name='loteria'  value='" . $Quiniela . "'> ";
      echo "<input type='hidden' name='Sorteo'  value='" . $Sorte . "'> ";

      datos_tablaopen (' width="100" align="center" border=1');

           datos_tablaRowsOpen('');
  						    datos_tabladata('Sorteo : ' . $Sorte, ' width="134" class="tituloMenu"  align="center"  colspan="2" ');
  			   datos_tablaRowsClose();

           datos_tablaRowsOpen;
  						    datos_tabladata('Quiniela ' . $Quiniela_Desc . ' ' . $Turno_Desc, ' width="134" class="tituloMenu"  align="center" colspan="2"  ');
  			   datos_tablaRowsClose();

           datos_tablaRowsOpen('');
							    datos_tabladata(' Puesto : ', ' width="134" class="tituloMenu"  align="right" ');
							    datos_tabladata('<input type="text" name="Puesto"  size="5"  maxlength="2" value="0" onKeyPress="return Solo_Numeros(event)" >', ' width="127" class="clsNode" align="left"');
				   datos_tablaRowsClose();

           datos_tablaRowsOpen('');
							    datos_tabladata(' Numero : ', ' width="134" class="tituloMenu"  align="right" ');
							    datos_tabladata('<input type="text" name="Numero"  size="' . $cifra . '"  maxlength="' . $cifra . '" value="0" onKeyPress="return Solo_Numeros(event)" >', ' width="127" class="clsNode" align="left" ');
				   datos_tablaRowsClose();

       datos_tablaclose();
  }

  function Inicio_seccion()
  {

      echo "<br><br><br>";
       echo '<form name="form1" method="GET" > ';
    	   datos_tablaopen (' width="260" align="center" class="tablabusqueda" border=0');
             datos_tablaRowsOpen('');
             	    datos_tabladata('<Img src="Img/Logo.png">', ' width="134" class="tituloMenu"  align="center"  colspan="2" ');
             datos_tablaRowsClose();

    	   		 datos_tablaRowsOpen;
    						    datos_tabladata('Usuario : ', ' width="134" class="tituloMenu"  align="right" ');
                    datos_tabladata('<input name="Usuario" type="text" class="clsNode" size="10" maxlength="50" />', ' width="127" class="clsNode" align="left" ');
    			   datos_tablaRowsClose();

             datos_tablaRowsOpen;
  							    datos_tabladata('Contrase&#324;ia : ', ' width="134" class="tituloMenu"  align="right" ');
  							    datos_tabladata('<input name="Contrasenia" type="password" class="clsNode" size="10" maxlength="50" />', ' width="127" class="clsNode" align="left" ');
  				   datos_tablaRowsClose();

             datos_tabladata('<div align="center"><input type="button" value="Ingresar" onclick="refrescar('  . "'validousuario'" . ');" class="button" ></div>',' colspan="3" ');

         datos_tablaclose();
    	 echo '</form>';
  }

	Function Valido_usuario($RS, $IdUsuario, $mensaje)
	{

			if (mssql_num_rows($RS) >0)
			{
            session_start();
			   $_SESSION['IdUsuario'] = $IdUsuario;
            usuario_inicio( $IdUsuario );
			}else{
		       Inicio_seccion();
		       echo "<br><div class='tituloMenu' >" . $mensaje . "</div><br>";
			}
	}

	Function usuario_inicio( $IdUsuario )
	{
	    datos_tablaopen(' border="0" align="center" valign="top"  ');
    			datos_tablaRowsOpen(' align="right" ');
    					echo '<td align="right" >';
    					   menu ();
    					echo '</td>';
    			datos_tablaRowsClose();
          datos_tablaRowsOpen(' align="center" height="300" valign="top"  class="tablabusqueda" ');
              echo '<td><br><br><div id="centro_usu"  align="center" >';
              	datos_tablaopen(' border="0" align="center" valign="top" width="350" ');
              			datos_tablaRowsOpen(' align="center" ');
                        datos_tabladata('<h3>Bienvenido ' . $Usu_Nombre . '</h3>', '  align="center"  ');
              			datos_tablaRowsClose();
              	datos_tablaclose();
              echo '</div></td>';
          datos_tablaRowsClose();
      datos_tablaclose();
	}

  function verifico_sub_menus($id_menu)
  {
     $sql = "SELECT COUNT(*) FROM MENU WHERE REFERENCIA = " . $id_menu . " and ESTADO = 1 ";
     $consulta=mssql_query($sql);

     list( $cant_menu ) = mssql_fetch_array($consulta);
     return $cant_menu;
  }

  function Sub_menu ($id_menu, $i)
  {
      $cons = "SELECT * FROM MENU WHERE REFERENCIA = " . $id_menu . " and ESTADO = 1 ORDER BY ORDEN asc ";
      $resultado = mssql_query($cons);
      if (mssql_num_rows($resultado) >0)
      {
          if ($i == 1 )
          {
            echo '<ul class="sub" >';
          }else
          {
            echo '<ul>';
          }

          while($arr_asoc = mssql_fetch_array($resultado))
          {
          		if ( verifico_sub_menus($arr_asoc[0]) > 0 )
          			   $_flecha = ' class="fly" ';
          		else
                   $_flecha = '';

              echo '  <li><a href="#" onclick="refresca_usu(' . "'" . $arr_asoc[1] . "'" . ')" ' . $_flecha . '>' . $arr_asoc[2] . '</a>';
              $i++;
          		Sub_menu ($arr_asoc[0], $i);
              echo '  </li>';
          }
          mssql_free_result($resultado);
          echo '</ul>';
      }
  }

  function menu ()
  {
      echo ' <div id="Div_menu">
               <ul class="menu2">';
               //<img src="img/menu_izq.gif" align="left"><img src="img/menu_der.gif"  align="right">';
      $cons = "SELECT * FROM MENU WHERE REFERENCIA = 0  and ESTADO = 1 ORDER BY ORDEN asc ";
      $resultado = mssql_query($cons);
      while($arr_asoc = mssql_fetch_array($resultado))
      {
        echo '  <li class="top"><a href="#" onclick="refresca_usu(' . "'" . $arr_asoc[1] . "' " . ')" class="top_link"><span class="down">' . $arr_asoc[2] . '</span></a>';
        Sub_menu ($arr_asoc[0], 1);
        echo '  </li>';
      }
      mssql_free_result($resultado);
      echo '  </ul>
            </div>';
  }

	function Pantalla_Poceados()
	{

       echo '<form name="form1" method="GET" > ';
         echo '<input type="hidden" name="Pantalla" value="1" >';
    	   datos_tablaopen (' width="260" align="center" border=0 ');
  	       datos_tablaRowsOpen('');
           	    datos_tabladata(' Carga de Loter&iacute;as Poceadas ', ' class="maintitle" colspan="3"   align="Center" ');
           datos_tablaRowsClose();

  	       datos_tablaRowsOpen('');
           	    datos_tabladata('&nbsp;', ' colspan="3" ');
           datos_tablaRowsClose();

           datos_tablaRowsOpen;
 					 	     datos_tabladata('Loteria Poceada : ', ' width="134" class="tituloMenu"  align="right" ');
							   datos_tabladata('&nbsp;',' class="tituloMenu"  align="right" ');
                 cargo_combos(  "Cmd_Poseada", "poceados", "poceado", "Idpoceado", '' , 'blanco','',' style="width:140px" ', '' );
				   datos_tablaRowsClose();

           datos_tabladata('<div align="center"><input type="button" value="Cargar" onclick="refresca_usu('  . "'carga_poceadas'" . ');" class="button" ></div>',' colspan="3" ');

         datos_tablaclose();
    	 echo '</form>';

  }

  function Pantalla_Cargo_poceados($Cmd_Poseada)
  {

      $fecha = getdate();
      $anio = $fecha[year];
      $Mes = $fecha[mon];
      $dia =  $fecha[mday];

      $sql_poceada = "SELECT poceado FROM poceados WHERE IdPoceado = " . $Cmd_Poseada ;
      $rs = mssql_query($sql_poceada);
      list( $Poceada ) = mssql_fetch_array($rs);

      echo '<form name="form1" id="form1" method="POST" > ';
       echo '<input type="hidden" name="Cmd_Poseada" value="' . $Cmd_Poseada . '" >';
        datos_tablaopen (' width="260" align="center" border=0 ');
     	    datos_tablaRowsOpen('');
               datos_tabladata($Poceada, ' class="maintitle"  colspan="3" ');
          datos_tablaRowsClose();

          datos_tablaRowsOpen('');
                datos_tabladata('N&deg; Sorteo : ', ' class="tituloMenu"  align="right" ');
                datos_tabladata('&nbsp;',' class="tituloMenu"  align="right" ');
                datos_tabladata('<input name="nro_Sorteo" type="text" class="clsNode" size="10" onKeyPress="return Solo_Numeros(event)" maxlength="30" Value="' . $nro_Sorteo . '" >', ' width="127" class="clsNode" align="left" ');
          datos_tablaRowsClose();

          datos_tablaRowsOpen;
              datos_tabladata('Fecha de la Jugada : ', ' class="tituloMenu"  align="right" ');
              datos_tabladata('&nbsp;',' class="tituloMenu"  align="right" ');
              echo '<td class="tituloMenu"  align="left" >';
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
              	    echo "<select name='mes'>";
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
           datos_tablaRowsClose();

          datos_tablaRowsOpen;
          echo '<td colspan="3" >';

              $sql = "SELECT CantNumeros, cantPuestos, IdTipoPoceada FROM config_poceada WHERE IdPoceada = $Cmd_Poseada ";
              $resultado_sql = mssql_query($sql);
              while($Datos = mssql_fetch_array($resultado_sql) )
              {
                    If ( ($Datos['CantNumeros'] % 5) == 0 )
                    {
                      $cant = 5;
                    } else
                    {
                      If ( ($Datos['CantNumeros'] % 6 ) == 0 )
                      {
                        $cant = 6;
                      } else
                      {
                         $cant = 5;
                      }
                    }

            	      $sql_Tipo = "SELECT tipoPoceado FROM tipos_poceados WHERE idTipoPoceado = " . $Datos['IdTipoPoceada'] ;
                    $rs = mssql_query($sql_Tipo);
                    list( $tipoPoceado ) = mssql_fetch_array($rs);
                    datos_tablaopen (' width="320" align="center" border=0 class="tablabusqueda" ');
                      datos_tablaRowsOpen('');
                       echo "<td>";

                          datos_tablaopen (' width="320" align="center" border=0  ');
                            datos_tablaRowsOpen('');
                               echo '<td colspan="6" align="middle" background="http://www.oraculosemanal.com/images/bgfade.gif"><strong class="Estilo4">' .  utf8_decode(htmlentities($tipoPoceado)) . '</strong></td>';
                            datos_tablaRowsClose();

                            datos_tablaRowsOpen('');
                                $i = 1;
                                $j = 1;
                                while($Datos['CantNumeros']>= $j )
                                {
                                   datos_tabladata('<input name="numero[]" type="text" class="clsNode" size="5" maxlength="10"  >', ' width="127" class="clsNode" align="center" ');

                                   if($cant == $i)
                                   {
                                       datos_tablaRowsClose();
                                       datos_tablaRowsOpen('');
                                       $i = 0;
                                   }
                                   $j++;
                                   $i++;
                                }
                           datos_tablaRowsClose();

                           datos_tablaclose();
                           datos_tablaopen (' width="320" align="center" border=0 ');

                           if($Datos['IdTipoPoceada'] == 26)
                           {
                                datos_tablaRowsOpen('');
                               	    datos_tabladata('NRO. DE CART&Oacute;N', ' background="http://www.oraculosemanal.com/images/bgfade.gif"  class="Estilo4"  align="Center" ');
                                    datos_tabladata('VENDIDO EN', ' background="http://www.oraculosemanal.com/images/bgfade.gif"  class="Estilo4" align="Center" ');
                                datos_tablaRowsClose();

                                while($Datos['cantPuestos'] >= $i)
                                {
                                   datos_tablaRowsOpen('');
                                      datos_tabladata('<input name="Numero_carton[]" type="text" class="clsNode" size="10" maxlength="40" >', ' width="127" class="clsNode" align="Center" ');
                                      datos_tabladata('<input name="lugar[]" type="text" class="clsNode" size="10" maxlength="45"  >', ' width="127" class="clsNode" align="Center" ');
                                   datos_tablaRowsClose();
                                   $i++;
                                }
                           }else
                           {
                               if($Datos['IdTipoPoceada'] == 36)
                               {

                                    datos_tablaRowsOpen('');
                                   	    datos_tabladata('PREMIO ($)', ' background="http://www.oraculosemanal.com/images/bgfade.gif"  class="Estilo4"  align="Center" ');
                                        datos_tabladata('VENDIDO EN', ' background="http://www.oraculosemanal.com/images/bgfade.gif"  class="Estilo4" align="Center" ');
                                        datos_tabladata('NRO. DE CART&Oacute;N', ' background="http://www.oraculosemanal.com/images/bgfade.gif"  class="Estilo4"  align="Center" ');
                                    datos_tablaRowsClose();

                                    while($Datos['cantPuestos'] >= $i)
                                    {
                                       datos_tablaRowsOpen('');
                                          datos_tabladata('<input name="Valor[]" type="text" class="clsNode" size="10" maxlength="40" >', ' width="127" class="clsNode" align="Center" ');
                                          datos_tabladata('<input name="lugar[]" type="text" class="clsNode" size="10" maxlength="45"  >', ' width="127" class="clsNode" align="Center" ');
                                          datos_tabladata('<input name="Numero_carton[]" type="text" class="clsNode" size="10" maxlength="40" >', ' width="127" class="clsNode" align="Center" ');
                                       datos_tablaRowsClose();
                                       $i++;
                                    }
                               }else
                               {
                                     datos_tablaRowsOpen('');
                                     	    datos_tabladata('ACIERTOS', '  background="http://www.oraculosemanal.com/images/bgfade.gif"  class="Estilo4" align="Center" ');
                                          datos_tabladata('GANADORES', ' background="http://www.oraculosemanal.com/images/bgfade.gif"  class="Estilo4"  align="Center" ');
                                          datos_tabladata('PREMIO A C/U ($)', ' background="http://www.oraculosemanal.com/images/bgfade.gif"  class="Estilo4" align="Center" ');
                                     datos_tablaRowsClose();

                                      $i = 1;
                                      $puestos = $Datos['CantNumeros'];
                                      while($Datos['cantPuestos'] >= $i)
                                      {

                                         echo "<input type='hidden' name='tipo2[]'  value='1'> ";
                                         datos_tablaRowsOpen('');
                                         	    datos_tabladata('<input name="aciertos[]" type="text" class="clsNode" size="10" maxlength="30" onKeyPress="return Solo_Numeros(event)" Value="' . $puestos . '">', ' width="127" class="clsNode" align="Center" ');
                                              datos_tabladata('<input name="ganadores[]" type="text" class="clsNode" size="10" maxlength="30"  onKeyPress="return Solo_Numeros(event)" >', ' width="127" class="clsNode" align="Center" ');
                                              datos_tabladata('<input name="premios[]" type="text" class="clsNode" size="10" maxlength="30"  onKeyPress="return Solo_Numeros_com(event)" >', ' width="127" class="clsNode" align="Center" ');
                                         datos_tablaRowsClose();
                                         $i++;
                                         $puestos =  $puestos - 1 ;
                                      }
                                 }
                             }
                           datos_tablaclose();

                       echo "</td>";
                     datos_tablaRowsClose();
                   datos_tablaclose();
                   echo "<br>";

              }

             echo '</td>';
           datos_tablaRowsClose();

        datos_tablaRowsOpen;
          datos_tabladata('<input name="cbCorreo" type="checkbox" id="cbCorreo" value="checkbox"> Enviar Correo ','  class="tituloMenu"  align="right" ');
          datos_tabladata('&nbsp;', '  class="tituloMenu"  align="right" ');
          datos_tabladata('<div align="center"><input type="button" value="Cargar" onclick="refrescar_Poceadas();" onFocus="ReaccionaPoceadas(this)" class="button" ></div>','  class="tituloMenu"  align="right" ');
        datos_tablaRowsClose();
      datos_tablaclose();
      echo '</form>';
  }

	function Config_Poceada( $Cant_cifras, $cant_premios, $Cmd_Poseada, $Cmd_Tip_poce )
	{
	    if ($Cant_cifras == "")
	    {
         $Cant_cifras = '0';
      }
	    if ($cant_premios == "")
	    {
         $cant_premios = '0';
      }
       echo '<form name="form1" method="GET" > ';
         echo '<input type="hidden" name="Pantalla" value="2" >';
    	   datos_tablaopen (' width="300" align="center" border=0 ');
    	       datos_tablaRowsOpen('');
             	    datos_tabladata(' Configuraci&oacute;n de Poceadas ', '  class="maintitle" colspan="3"   align="Center" ');
             datos_tablaRowsClose();
    	       datos_tablaRowsOpen('');
             	    datos_tabladata('&nbsp;', ' colspan="3" ');
             datos_tablaRowsClose();

           datos_tablaRowsOpen('');
           	    datos_tabladata('Cantidad de Cifras : ', ' width="134" class="tituloMenu"  align="right" ');
                datos_tabladata('<input name="Cant_cifras" type="text" class="clsNode" size="14" align="left" onKeyPress="return Solo_Numeros(event)" onFocus="this.value=' . "'" . "'" . '" onBlur="if (this.value==' . "'" . "'" . ') this.value=' . "'0'" . '" maxlength="30" value="' . $Cant_cifras .'" >', ' width="127" class="clsNode" align="left" ');
           datos_tablaRowsClose();

           datos_tablaRowsOpen('');
           	    datos_tabladata('Cantidad de Premios : ', ' width="134" class="tituloMenu"  align="right" ');
                datos_tabladata('<input name="cant_premios" type="text" class="clsNode" size="14" align="left" onKeyPress="return Solo_Numeros(event)" onFocus="this.value=' . "'" . "'" . '" onBlur="if (this.value==' . "'" . "'" . ') this.value=' . "'0'" . '" maxlength="30" value="' . $cant_premios .'" >', ' width="127" class="clsNode" align="left" ');
           datos_tablaRowsClose();

           datos_tablaRowsOpen;
 					 	     datos_tabladata('Loteria Poceada : ', ' width="134" class="tituloMenu"  align="right" ');
							   cargo_combos(  "Cmd_Poseada", "poceados", "poceado", "Idpoceado", '' , 'blanco','',' onchange="ref_comb2();" onFocus="Reacciona(this)" style="width:100px" align="left" ', $Cmd_Poseada );
				   datos_tablaRowsClose();

           if( $Cmd_Poseada != '')
           {
               datos_tablaRowsOpen;
                     datos_tabladata('Tipo de Loteria : ', ' width="134" class="tituloMenu"  align="right" ');
                     cargo_combos( "Cmd_Tip_poce","tipos_poceados", "tipoPoceado", "IdTipoPoceado", " and idPoceado = $Cmd_Poseada " , 'blanco','',' style="width:100px"  align="left" ','' );
               datos_tablaRowsClose();
           }  else
           {
               datos_tablaRowsOpen;
                     datos_tabladata('Tipo de Loteria : ', ' width="134" class="tituloMenu"  align="right" ');
                     cargo_combos( "Cmd_Tip_poce","tipos_poceados", "tipoPoceado", "IdTipoPoceado", " and idPoceado = 0 " , 'blanco','',' style="width:100px" align="left"','' );
               datos_tablaRowsClose();
           }

           datos_tabladata('<div align="center"><input type="button" value="Cargar" onclick="refresca_usu('  . "'Config_poceada'" . ');" onFocus="Reacciona(this)" class="button" ></div>',' colspan="3" ');

         datos_tablaclose();
    	 echo '</form>';

  }

  Function Alta_Poceada()
  {
       echo '<form name="form1" method="GET" > ';
         echo '<input type="hidden" name="Pantalla" value="2" >';
    	   datos_tablaopen (' width="300" align="center" border=0 ');
    	       datos_tablaRowsOpen('');
             	    datos_tabladata(' Nuevas Poceadas ', ' class="maintitle" colspan="3"   align="Center" ');
             datos_tablaRowsClose();
    	       datos_tablaRowsOpen('');
             	    datos_tabladata('&nbsp;', ' colspan="3" ');
             datos_tablaRowsClose();
           datos_tablaRowsOpen('');
           	    datos_tabladata('Nombre Poceada : ', ' width="134" class="tituloMenu"  align="right" ');
                datos_tabladata('<input name="Nombre_poce" type="text" class="clsNode" size="20" maxlength="30" >', ' width="127" class="clsNode" align="center" ');
           datos_tablaRowsClose();

           datos_tabladata('<div align="center"><input type="button" value="Cargar" onclick="refresca_usu('  . "'Alta_poceada'" . ');"  class="button" ></div>',' colspan="3" ');

         datos_tablaclose();
    	 echo '</form>';

  }

  Function Alta_Tipo_Poceada()
  {
       echo '<form name="form1" method="GET" > ';
         echo '<input type="hidden" name="Pantalla" value="2" >';
    	   datos_tablaopen (' width="300" align="center" border=0 ');
             datos_tablaRowsOpen('');
             	    datos_tabladata(' Nuevos Tipos de Poceadas ', '  class="maintitle" colspan="3"   align="Center" ');
             datos_tablaRowsClose();
    	       datos_tablaRowsOpen('');
             	    datos_tabladata('&nbsp;', ' colspan="3" ');
             datos_tablaRowsClose();
           datos_tablaRowsOpen;
 					 	     datos_tabladata('Loteria Poceada : ', ' width="134" class="tituloMenu"  align="right" ');
							   cargo_combos(  "Cmd_Poseada", "poceados", "poceado", "Idpoceado", '' , 'blanco','',' style="width:100px" align="left" ', $Cmd_Poseada );
				   datos_tablaRowsClose();

           datos_tablaRowsOpen('');
           	    datos_tabladata('Nombre Tipo Poceada : ', ' width="134" class="tituloMenu"  align="right" ');
                datos_tabladata('<input name="Nombre_poce" type="text" class="clsNode" size="20" maxlength="30" >', ' width="127" class="clsNode" align="center" ');
           datos_tablaRowsClose();

           datos_tabladata('<div align="center"><input type="button" value="Cargar" onclick="refresca_usu('  . "'Alta_Tipo_poceada'" . ');" class="button" ></div>',' colspan="3" ');

         datos_tablaclose();
    	 echo '</form>';

  }

  Function Modificar_Poceada($Cmd_Poseada)
  {
    If ($Cmd_Poseada != 0)
    {
       $sql = "SELECT poceado From poceados Where IdPoceado = $Cmd_Poseada";
       $rs = mssql_query($sql);
       list( $texto ) = mssql_fetch_array($rs);
    }

       echo '<form name="form1" method="GET" > ';
         echo '<input type="hidden" name="Pantalla" value="4" >';
    	   datos_tablaopen (' width="300" align="center" border=0 ');
             datos_tablaRowsOpen('');
             	    datos_tabladata(' Modificaci&oacute;n de Poceadas ', '   class="maintitle" colspan="3"   align="Center" ');
             datos_tablaRowsClose();
    	       datos_tablaRowsOpen('');
             	    datos_tabladata('&nbsp;', ' colspan="3" ');
             datos_tablaRowsClose();
           datos_tablaRowsOpen;
 					 	     datos_tabladata('Loteria Poceada : ', ' width="134" class="tituloMenu"  align="right" ');
							   cargo_combos(  "Cmd_Poseada", "poceados", "poceado", "Idpoceado", '' , 'blanco','',' onchange="ref_comb4();" style="width:100px" align="left" ', $Cmd_Poseada );
				   datos_tablaRowsClose();

           datos_tablaRowsOpen('');
           	    datos_tabladata('Nombre a Modificar : ', ' width="134" class="tituloMenu"  align="right" ');
                datos_tabladata('<input name="Nombre_poce" type="text" class="clsNode" size="20" maxlength="30" value="' . $texto . '">', ' width="127" class="clsNode" align="center" ');
           datos_tablaRowsClose();

           datos_tabladata('<div align="center"><input type="button" value="Modificar" onclick="refresca_usu('  . "'Modif_poceada'" . ');" class="button" ></div>',' colspan="3" ');

         datos_tablaclose();
    	 echo '</form>';

  }

  Function Modificar_Tipo_Poceada($Cmd_Poseada, $Nombre_poce, $Cmd_Tip_poce)
  {
    if (($Cmd_Tip_poce != '') or ($Cmd_Tip_poce != 0))
    {
       $sql = "SELECT tipoPoceado From tipos_poceados  Where idTipoPoceado  = $Cmd_Tip_poce";
       $rs = mssql_query($sql);
       list( $texto ) = mssql_fetch_array($rs);
    }

       echo '<form name="form1" method="GET" > ';
         echo '<input type="hidden" name="Pantalla" value="3" >';
    	   datos_tablaopen (' width="300" align="center" border=0 ');
             datos_tablaRowsOpen('');
             	    datos_tabladata(' Modificaci&oacute;n de tipo de Poceadas ', '  class="maintitle" colspan="3"   align="Center" ');
             datos_tablaRowsClose();
    	       datos_tablaRowsOpen('');
             	    datos_tabladata('&nbsp;', ' colspan="3" ');
             datos_tablaRowsClose();

           datos_tablaRowsOpen;
 					 	     datos_tabladata('Loteria Poceada : ', ' width="134" class="tituloMenu"  align="right" ');
							   cargo_combos(  "Cmd_Poseada", "poceados", "poceado", "Idpoceado", '' , 'blanco','',' onchange="ref_comb3();" style="width:100px" align="left" ', $Cmd_Poseada );
				   datos_tablaRowsClose();

           if( $Cmd_Poseada != '')
           {
               datos_tablaRowsOpen;
                     datos_tabladata('Tipo de Loteria : ', ' width="134" class="tituloMenu"  align="right" ');
                     cargo_combos( "Cmd_Tip_poce","tipos_poceados", "tipoPoceado", "IdTipoPoceado", " and idPoceado = $Cmd_Poseada " , 'blanco','',' onchange="ref_comb3();" style="width:100px" align="left" ', $Cmd_Tip_poce );
               datos_tablaRowsClose();
           }  else
           {
               datos_tablaRowsOpen;
                     datos_tabladata('Tipo de Loteria : ', ' width="134" class="tituloMenu"  align="right" ');
                     cargo_combos( "Cmd_Tip_poce","tipos_poceados", "tipoPoceado", "IdTipoPoceado", " and idPoceado = 0 " , 'blanco','',' style="width:100px" align="left" ','' );
               datos_tablaRowsClose();
           }

           datos_tablaRowsOpen('');
           	    datos_tabladata('Nombre a Modificar : ', ' width="134" class="tituloMenu"  align="right" ');
                datos_tabladata('<input name="Nombre_poce" type="text" class="clsNode" size="20" maxlength="30" Value="' . $texto . '" >', ' width="127" class="clsNode" align="center" ');
           datos_tablaRowsClose();

           datos_tabladata('<div align="center"><input type="button" value="Modificar" onclick="refresca_usu('  . "'Modif_Tipo_poceada'" . ');" class="button" ></div>',' colspan="3" ');

         datos_tablaclose();
    	 echo '</form>';

  }

//-----------------------------------------------------------------------------------------------------//
//---------------------------------------    Usuarios    ----------------------------------------------//
	Function Modifica_Datos_Usuario()
	{
	    session_start();
      $IdUsuario = $_SESSION['IdUsuario'];

			$Sql_usu ="SELECT Nombre, Apellido, Usuario FROM usuarios WHERE IdTabla = $IdUsuario ";
			$Usuario_datos = mssql_query($Sql_usu);
			list( $Nombre, $Apellido, $Usuario ) = mssql_fetch_array($Usuario_datos);

			echo '<FORM name="form1" method="POST" >';
	    echo '<input type="hidden" name="IdUsuario" value="' . $IdUsuario . '" >';

		   datos_tablaopen(' border="0" align="center" valign="top"  width="405" ');
							  datos_tablaRowsOpen;
								  datos_tabladata('Modificar Datos del Usuario </p>' , '  class="maintitle"  align="Center" colspan="2" ');
								datos_tablaRowsClose();
							  datos_tablaRowsOpen;
							    datos_tabladata('Nombre : ' , ' class="clsNode" align="right" ');
								  datos_tabladata('<input  type="text" size="13" name="Nombre"  maxlength="60" Value="' . $Nombre . '" >' , ' class="clsNode" width="220" align="left" ');
								datos_tablaRowsClose();
							  datos_tablaRowsOpen;
							    datos_tabladata('Apellido : ' , ' class="clsNode" align="right"  ');
								  datos_tabladata('<input  type="text" size="13" name="Apellido" maxlength="60" Value="' . $Apellido . '" >' , ' class="clsNode" align="left"  ');
							  datos_tablaRowsClose();
							  datos_tablaRowsOpen;
							   datos_tabladata('Usuario : ' , ' class="clsNode" align="right" ');
								  datos_tabladata('<input  type="text" size="13" name="Usuario" maxlength="60" Value="' . $Usuario . '" >' , ' class="clsNode" align="left" ');
								datos_tablaRowsClose();
							  datos_tablaRowsOpen;
							    datos_tabladata('Nueva Contrase&#324;a : ' , ' class="clsNode" align="right"  ');
								  datos_tabladata('<input  type="password" size="13" name="Nueva_pass_A" maxlength="60"  >' , ' class="clsNode" align="left"  ');
							  datos_tablaRowsClose();
							  datos_tablaRowsOpen;
							    datos_tabladata('Verficaci&oacute;n Contrase&#324;a : ' , ' class="clsNode" align="right" ');
								  datos_tabladata('<input  type="password" size="13" name="Nueva_pass_B" maxlength="60" >' , ' class="clsNode" align="left" ');
								datos_tablaRowsClose();
								datos_tablaRowsOpen;
								  datos_tabladata('&nbsp;' , ' class="textoresultado2" colspan="2" ');
								datos_tablaRowsClose();
								datos_tablaRowsOpen;
								  datos_tabladata('<div align="center"><input type="button" value="Modificar" class="button"  onclick="refrescar_usu('  . "'actualizo_Datos'" . ');"  >&nbsp;<input type="button" value="Cancelar" class="button" onclick="refrescar_usu('  . "'Modifica_Datos_Usuario($IdUsuario);'" . ');" ></div>' , ' class="textoresultado2" colspan="2" ');
								datos_tablaRowsClose();
				 datos_tablaclose();
	  echo '	</FORM>';

	}

	Function Alta_Usuario()
	{

			echo '<FORM name="form1" method="POST" >';

		   datos_tablaopen(' border="0" align="center" valign="top"  width="405" ');
							 datos_tablaRowsOpen;
								  datos_tabladata('Alta de Nuevo Usuario </p>' , '  class="maintitle"  align="Center" colspan="2" ');
								datos_tablaRowsClose();
							 datos_tablaRowsOpen;
							   datos_tabladata('Nombre : ' , ' class="clsNode" align="right" ');
								  datos_tabladata('<input  type="text" size="13" name="Nombre"  maxlength="60" >' , ' class="clsNode" width="220" align="left" ');
								datos_tablaRowsClose();
							 datos_tablaRowsOpen;
							   datos_tabladata('Apellido : ' , ' class="clsNode" align="right"  ');
								datos_tabladata('<input  type="text" size="13" name="Apellido" maxlength="60" >' , ' class="clsNode" align="left"  ');
								datos_tablaRowsClose();
							 datos_tablaRowsOpen;
							   datos_tabladata('Usuario : ' , ' class="clsNode" align="right" ');
								  datos_tabladata('<input  type="text" size="13" name="Usuario" maxlength="60"  >' , ' class="clsNode" align="left" ');
								datos_tablaRowsClose();
						 datos_tablaRowsOpen;
							   datos_tabladata('Ingrese la Contrase&#324;a : ' , ' class="clsNode" align="right"  ');
								  datos_tabladata('<input  type="password" size="13" name="Nueva_pass_A" maxlength="60" >' , ' class="clsNode" align="left" ');
								datos_tablaRowsClose();
							 datos_tablaRowsOpen;
							   datos_tabladata('Vuelva a ingresar la Contrase&#324;a : ' , ' class="clsNode" align="right" ');
								  datos_tabladata('<input  type="password" size="13" name="Nueva_pass_B" maxlength="60" >' , ' class="clsNode" align="left" ');
								datos_tablaRowsClose();
								datos_tablaRowsOpen;
								  datos_tabladata('&nbsp;' , ' class="textoresultado2" colspan="2" ');
								datos_tablaRowsClose();
								datos_tablaRowsOpen;
								  datos_tabladata('<div align="center"><input type="button" value="Alta" class="button" onFocus="valido_nueva_contra(this)" onclick="refresca_usu('  . "'Alta_usuario'" . ');"  >&nbsp;<input type="button" value="Cancelar" class="button" ></div>' , ' class="textoresultado2" colspan="2" ');
								datos_tablaRowsClose();
				 datos_tablaclose();
	  echo '	</FORM>';
	}

	Function Baja_Usuario()
	{
			echo '<FORM name="form1" method="POST" >';
	    datos_tablaopen(' border="0" align="center" valign="top"  width="300" ');
							 datos_tablaRowsOpen;
								  datos_tabladata('Dar de Baja a Usuarios </p>' , '  class="maintitle"  align="Center" colspan="2" ');
								datos_tablaRowsClose();
							 datos_tablaRowsOpen;
							   datos_tabladata('Usuario : ' , ' class="clsNode" align="right" width="90"  ');
								  cargo_combos(  "Cmd_usuarios","usuarios", "Usuario", "IdTabla", ' and IdTabla <> 1 '  , 'blanco', ' class="clsNode" align="left" ','',''  );
								datos_tablaRowsClose();
								datos_tablaRowsOpen;
								  datos_tabladata('&nbsp;' , ' class="textoresultado2" colspan="2" ');
								datos_tablaRowsClose();
								datos_tablaRowsOpen;
								  datos_tabladata('<div align="center"><input type="button" value="Eliminar" class="button" onFocus="selecciona_comb_elim(this)" onclick="refresca_usu('  . "'Baja_Usuario'" . ');"  >&nbsp;<input type="button" value="Cancelar" class="button" onclick="refrescar_usu('  . "'Modifica_contrasenia($IdUsuario);'" . ');" ></div>' , ' class="textoresultado2" colspan="2" ');
								datos_tablaRowsClose();
				 datos_tablaclose();
 	echo '</FORM>';
	}
//-----------------------------------------------------------------------------------------------------//
//-----------------------------------------------------------------------------------------------------//
//-----------------------------------------------------------------------------------------------------//
//------------------------- Inicio del codigo ingresado el 04/10/2010 ---------------------------------//
//-----------------------------------------------------------------------------------------------------//

  Function Alta_Mails()
  {
       echo '<form name="form1" method="GET" > ';
         echo '<input type="hidden" name="Pantalla" value="2" >';
    	   datos_tablaopen (' width="300" align="center" border=0 ');
            datos_tablaRowsOpen;
                datos_tabladata(' Cargar Mails ', ' class="maintitle" colspan="2"   align="Center" ');
            datos_tablaRowsClose();

            datos_tablaRowsOpen;
                datos_tabladata('&nbsp;', ' colspan="2" ');
            datos_tablaRowsClose();

            datos_tablaRowsOpen;
                datos_tabladata('Mail : ', ' class="tituloMenu"  align="right" ');
                datos_tabladata('<input name="Mail" type="text" class="clsNode" size="40" maxlength="150" >', ' class="clsNode" align="center" ');
            datos_tablaRowsClose();

            datos_tabladata('<div align="center"><input type="button" value="Cargar" onclick="refresca_usu('  . "'Alta_Mails'" . ');"  class="button" ></div>',' colspan="2" ');

         datos_tablaclose();
    	 echo '</form>';

  }

  Function Baja_Mails()
  {
       echo '<form name="form1" method="GET" > ';
    	   datos_tablaopen (' width="300" align="center" border=0 ');
            datos_tablaRowsOpen;
                datos_tabladata(' Eliminacion de Mails ', ' class="maintitle" colspan="2"   align="Center" ');
            datos_tablaRowsClose();

            datos_tablaRowsOpen;
                datos_tabladata('&nbsp;', ' colspan="2" ');
            datos_tablaRowsClose();

            datos_tablaRowsOpen;
            	    datos_tabladata('Seleccionar Mail : ', ' class="tituloMenu"  align="right" ');
            	    cargo_combos(  "Cmd_Mail", "mails", "MAIL", "IdTabla", '' , 'blanco','',' style="width:230px" align="left" ', $Cmd_Mail );
            datos_tablaRowsClose();

            datos_tabladata('<div align="center"><input type="button" value="Eliminar" onclick="refresca_usu('  . "'Baja_Mails'" . ');"  class="button" ></div>',' colspan="2" ');

         datos_tablaclose();
    	 echo '</form>';

  }

  Function Modif_Mails( $Cmd_Mail )
  {
      if (($Cmd_Mail != '') or ($Cmd_Mail != 0))
      {
         $sql_sel = "SELECT mail, activo From mails Where IdTabla = " . $Cmd_Mail;
         $rs = mssql_query($sql_sel);
         list( $texto, $activo ) = mssql_fetch_array($rs);
      }

      if($activo == 1)
      {
        $valueS = ' selected ';
        $valueN = '';
      }else
      {
        $valueN = ' selected ';
        $valueS = '';
      }

       echo '<form name="form1" method="GET" > ';
         echo '<input type="hidden" name="Pantalla" value="7" >';
    	   datos_tablaopen (' width="400" align="center" border=0 ');
            datos_tablaRowsOpen;
                datos_tabladata(' Modificar Mails ', ' class="maintitle" colspan="2"   align="Center" ');
            datos_tablaRowsClose();

            datos_tablaRowsOpen;
                datos_tabladata('&nbsp;', ' colspan="2" ');
            datos_tablaRowsClose();

            datos_tablaRowsOpen;
            	    datos_tabladata('Seleccionar Mail : ', ' class="tituloMenu"  align="right" ');
            	    cargo_combos(  "Cmd_Mail", "mails", "MAIL", "IdTabla", '' , 'blanco','',' onchange="ref_comb7();" style="width:200px" align="left" ', $Cmd_Mail );
            datos_tablaRowsClose();

            datos_tablaRowsOpen;
                datos_tabladata('Modificar Mail : ', ' class="tituloMenu"  align="right" ');
                datos_tabladata('<input name="Mail" type="text" class="clsNode" size="40" maxlength="150"  value="' . $texto . '" >', ' class="clsNode" align="left" ');
            datos_tablaRowsClose();

            datos_tablaRowsOpen;
                datos_tabladata('Enviar Mails : ', ' class="tituloMenu"  align="right" ');
						    echo "<td><select name='envio_mail' style='width:45px' align='left' >";
                   echo "<option $valueS value='1'>SI</option>";
                   echo "<option $valueN value='0'>NO</option>";
						    echo "</select></td>";
            datos_tablaRowsClose();

            datos_tabladata('<div align="center"><input type="button" value="Modificar" onclick="refresca_usu('  . "'Modif_Mails'" . ');"  class="button" ></div>',' colspan="2" ');

         datos_tablaclose();
    	 echo '</form>';

  }

  function pantalla_Quiniela()
  {
      $fecha = getdate();
      $anio = $fecha[year];
      $Mes = $fecha[mon];
      $dia =  $fecha[mday];
      echo '<form name="form1" method="GET" > ';
         datos_tablaopen (' width="360" align="center" border=0 ');
             datos_tablaRowsOpen;
           	       datos_tabladata(' Carga de Quinielas ', ' class="maintitle" colspan="3"   align="Center" ');
             datos_tablaRowsClose();

    	   		 datos_tablaRowsOpen;
    						    datos_tabladata('Cant de loterias a cargar : ', ' width="164" class="tituloMenu"  align="right" ');
    						    datos_tabladata('&nbsp;', '');
    						    echo "<td align='left'>";
        						    echo "<select name='cantQuinielas'>";
        						    for ($i = 1; $i <= 4; $i++)
                        {
                            echo "<option value='" . $i . "' >$i</option>";
                        }
        						    echo "</select>";
    						    echo "</td>";
    			   datos_tablaRowsClose();

              datos_tablaRowsOpen;
  						    datos_tabladata('Fecha de la jugada : ', ' class="tituloMenu"  align="right" ');
  						    datos_tabladata('&nbsp;', '');
  						    echo "<td align='left'>";
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
      						    echo "<select name='mes'>";
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
  			   datos_tablaRowsClose();

				 datos_tablaRowsOpen;
           	       echo '<td>&nbsp;</td>';
             datos_tablaRowsClose();

             datos_tabladata('<div align="center"><input type="button" value="Ingresar" onclick="refresca_usu('  . "'Quiniela'" . ');" class="button" ></div>',' colspan="3" ');

         datos_tablaclose();
      echo '</form>';
  }

  function Quinielas($cantQuinielas, $fecha)
  {
      echo '<form name="form1" method="GET" > ';
        echo "<input type='hidden' name='Fecha'  value='$fecha'> ";
        echo "<input type='hidden' name='cantQuinielas'  value='$cantQuinielas'> ";
         datos_tablaopen (' width="360" align="center"  border=0');
              datos_tablaRowsOpen;
           	       datos_tabladata(' Carga de Quinielas de la fecha : ' . date("d/m/Y",strtotime($fecha)) , ' class="maintitle" colspan="3"   align="Center" ');
             datos_tablaRowsClose();

              datos_tablaRowsOpen;

                      echo "<td>";
                        datos_tablaopen (' width="200" align="center"  class="tablabusqueda" border=0');
                            datos_tablaRowsOpen;
                						    datos_tabladata('Turno : ', ' class="tituloMenu"  align="right" ');
                						    datos_tabladata('&nbsp;', '');
                						    cargo_combos(  "Cmd_turnos_1", "turnos", "Turno", "Idtabla", '' , 'blanco','',' style="width:80px" align="left" ', '' );
                					   datos_tablaRowsClose();

                             datos_tablaRowsOpen;
                    						    datos_tabladata('Loteria 1 : ', ' class="tituloMenu"  align="right" ');
                    						    datos_tabladata('&nbsp;', '');
                    						    cargo_combos(  "Cmd_quiniela_1", "quinielas ", "quiniela", "idquiniela", '' , 'blanco','',' style="width:80px" align="left" ', '' );
                    			   datos_tablaRowsClose();

                             datos_tablaRowsOpen;
                  							    datos_tabladata(' N&deg; Sorteo 1&deg; : ', ' class="tituloMenu"  align="right" ');
                  							     datos_tabladata('&nbsp;', '');
                  							    datos_tabladata('<input name="Sorteo_1" type="text" class="clsNode" size="10" onKeyPress="return Solo_Numeros(event)" maxlength="30" value="0" >', ' class="clsNode" align="left" ');
                  				   datos_tablaRowsClose();

                          // datos_tablaRowsClose();
                          datos_tablaclose();
                      echo "</td>";
                  	 if($cantQuinielas >= 3)
                  	 {
                       echo "<td>";
                        datos_tablaopen (' width="200" align="center"  class="tablabusqueda" border=0');
                           datos_tablaRowsOpen;
                                datos_tabladata('Turno : ', ' class="tituloMenu"  align="right" ');
                						    datos_tabladata('&nbsp;', '');
                						    cargo_combos(  "Cmd_turnos_3", "turnos", "Turno", "Idtabla", '' , 'blanco','',' style="width:80px" align="left" ', '');
                           datos_tablaRowsClose();

                           datos_tablaRowsOpen;
                  						    datos_tabladata('Loteria 3 : ', ' class="tituloMenu"  align="right" ');
                  						    datos_tabladata('&nbsp;', '');
                  						    cargo_combos(  "Cmd_quiniela_3", "quinielas ", "quiniela", "idquiniela", '' , 'blanco','',' style="width:80px" align="left" ', '');
                  			   datos_tablaRowsClose();

                           datos_tablaRowsOpen;
                							    datos_tabladata(' N&deg; Sorteo 3&deg; : ', '  class="tituloMenu"  align="right" ');
                							     datos_tabladata('&nbsp;', '');
                							    datos_tabladata('<input name="Sorteo_3" type="text" class="clsNode" size="10" onKeyPress="return Solo_Numeros(event)" maxlength="30" value="0" >', '  class="clsNode" align="left" ');
                				   datos_tablaRowsClose();
                          // datos_tablaRowsClose();
                          datos_tablaclose();
                       echo "</td>";
                  	 }else
                     {
                         echo "<input type='hidden' name='Cmd_turnos_3'  value='0'> ";
                         echo "<input type='hidden' name='Cmd_quiniela_3'  value='0'> ";
                         echo "<input type='hidden' name='Sorteo_3'  value='0'> ";
                     }

                     if($cantQuinielas >= 2)
                  	 {

                    	   datos_tablaRowsClose();
                         datos_tablaRowsOpen;
                        echo "<td>";
                        datos_tablaopen (' width="200" align="center"  class="tablabusqueda" border=0');
                           datos_tablaRowsOpen;
                                datos_tabladata('Turno : ', ' class="tituloMenu"  align="right" ');
                						    datos_tabladata('&nbsp;', '');
                						    cargo_combos(  "Cmd_turnos_2", "turnos", "turno", "Idtabla", '' , 'blanco','',' style="width:80px" align="left" ', '' );
                           datos_tablaRowsClose();

                           datos_tablaRowsOpen;
                  						    datos_tabladata('Loteria 2 : ', ' class="tituloMenu"  align="right" ');
                  						    datos_tabladata('&nbsp;', '');
                  						    cargo_combos(  "Cmd_quiniela_2", "quinielas ", "quiniela", "idquiniela", '' , 'blanco','',' style="width:80px" align="left" ', '' );
                  			   datos_tablaRowsClose();

                           datos_tablaRowsOpen;
                							    datos_tabladata(' N&deg; Sorteo 2&deg; : ', '  class="tituloMenu"  align="right" ');
                							    datos_tabladata('&nbsp;', '');
                							    datos_tabladata('<input name="Sorteo_2" type="text" class="clsNode" size="10" onKeyPress="return Solo_Numeros(event)" maxlength="30" value="0" >', ' class="clsNode" align="left" ');
                				   datos_tablaRowsClose();

                          // datos_tablaRowsClose();
                          datos_tablaclose();
                       echo "</td>";
                     }else
                     {
                         echo "<input type='hidden' name='Cmd_turnos_2'  value='0'> ";
                         echo "<input type='hidden' name='Cmd_quiniela_2'  value='0'> ";
                         echo "<input type='hidden' name='Sorteo_2'  value='0'> ";
                     }

                  	 if($cantQuinielas >= 4)
                  	 {
                  	   echo "<td>";
                        datos_tablaopen (' width="200" align="center"  class="tablabusqueda" border=0');
                           datos_tablaRowsOpen;
                                datos_tabladata('Turno : ', ' class="tituloMenu"  align="right" ');
                						    datos_tabladata('&nbsp;', '');
                						    cargo_combos(  "Cmd_turnos_4", "turnos", "turno", "Idtabla", '' , 'blanco','',' style="width:80px" align="left" ', '');
                           datos_tablaRowsClose();

                           datos_tablaRowsOpen;
                  						    datos_tabladata('Loteria 4 : ', ' class="tituloMenu"  align="right" ');
                  						    datos_tabladata('&nbsp;', '');
                  						    cargo_combos(  "Cmd_quiniela_4", "quinielas ", "quiniela", "idquiniela", '' , 'blanco','',' style="width:80px" align="left" ', '');
                  			   datos_tablaRowsClose();

                           datos_tablaRowsOpen;
                							    datos_tabladata(' N&deg; Sorteo 4&deg; : ', '  class="tituloMenu"  align="right" ');
                							    datos_tabladata('&nbsp;', '');
                							    datos_tabladata('<input name="Sorteo_4" type="text" class="clsNode" size="10" onKeyPress="return Solo_Numeros(event)" maxlength="30" value="0" >', ' class="clsNode" align="left" ');
                				   datos_tablaRowsClose();

                          // datos_tablaRowsClose();
                          datos_tablaclose();
                        echo "</td>";
                  	 }else
                     {
                         echo "<input type='hidden' name='Cmd_turnos_4'  value='0'> ";
                         echo "<input type='hidden' name='Cmd_quiniela_4'  value='0'> ";
                         echo "<input type='hidden' name='Sorteo_4'  value='0'> ";
                     }

                     datos_tablaRowsClose();

                echo "</td>";
              datos_tablaRowsClose();

            datos_tabladata('<div align="center"><input type="button" value="Ingresar"  onclick="refresca_usu('  . "'Pant_Carga_quinielas'" . ');" class="button" ></div>',' colspan="3" ');
         datos_tablaclose();
      echo '</form>';
  }

  function Carga_Quinielas($fecha, $cantQuinielas, $Cmd_quiniela_1, $Cmd_turnos_1, $Sorteo_1,$Cmd_quiniela_2, $Cmd_turnos_2, $Sorteo_2, $Cmd_quiniela_3, $Cmd_turnos_3, $Sorteo_3, $Cmd_quiniela_4, $Cmd_turnos_4, $Sorteo_4)
  {
     datos_tablaopen (' width="550" align="center" border=0');
        datos_tablaRowsOpen;
              datos_tabladata(' Carga de Quinielas de la fecha : ' . date("d/m/Y",strtotime($fecha)) , ' class="maintitle" colspan="' . $cantQuinielas . '" align="Center" ');
        datos_tablaRowsClose();

        datos_tablaRowsOpen;
             echo "<td valign='top' >";
               echo '<div id="div_quiniela1" >';
                     quiniela_1($Cmd_quiniela_1, $Cmd_turnos_1, $Sorteo_1, $fecha, $CantCifras );
               echo '</div>';
             echo "</td>";

          	 if($cantQuinielas >= 3)
          	 {
                echo "<td valign='top' >";
                  echo '<div id="div_quiniela3" >';
                      quiniela_3($Cmd_quiniela_3, $Cmd_turnos_3, $Sorteo_3, $fecha, $CantCifras );
                  echo '</div>';
                echo "</td>";
          	 }

             if($cantQuinielas >= 2)
          	 {
          	    //datos_tablaRowsClose();
                //datos_tablaRowsOpen;
                echo "<td valign='top' >";
                  echo '<div id="div_quiniela2" >';
                      quiniela_2($Cmd_quiniela_2, $Cmd_turnos_2, $Sorteo_2, $fecha, $CantCifras );
                  echo '</div>';
                echo "</td>";
             }

          	 if($cantQuinielas >= 4)
          	 {
          	    echo "<td valign='top' >";
          	      echo '<div id="div_quiniela4" >';
                      quiniela_4($Cmd_quiniela_4, $Cmd_turnos_4, $Sorteo_4, $fecha, $CantCifras );
                  echo '</div>';
                echo "</td>";
          	 }

        datos_tablaRowsClose();
     datos_tablaclose();
  }
/*
  function quiniela_1($Cmd_quiniela_1, $Cmd_turnos_1, $Sorteo_1, $fecha, $CantCifras )
  {
      echo '<form name="form1" method="GET" > ';
       echo "<input type='hidden' name='Quiniela'  value='1'> ";
        datos_tablaopen (' width="200" align="center"  class="tablabusqueda" border=0');
             Carg_Num_quiniela( $Cmd_quiniela_1, $Cmd_turnos_1, $Sorteo_1, $fecha, $CantCifras );
             datos_tabladata('<div align="center"><input type="button" value="Cargar" onclick="Quiniela_1(this);" class="button" ></div>',' colspan="3" ');
        datos_tablaclose();
      echo '</form>';

  }

  function quiniela_2($Cmd_quiniela_2, $Cmd_turnos_2, $Sorteo_2, $fecha, $CantCifras)
  {
      echo '<form name="form2" method="GET" > ';
       echo "<input type='hidden' name='Quiniela'  value='2'> ";
        datos_tablaopen (' width="200" align="center"  class="tablabusqueda" border=0');
             Carg_Num_quiniela($Cmd_quiniela_2, $Cmd_turnos_2, $Sorteo_2, $fecha, $CantCifras);
             datos_tabladata('<div align="center"><input type="button" value="Cargar" onclick="Quiniela_2(this);" class="button" ></div>',' colspan="3" ');
        datos_tablaclose();
      echo '</form>';
  }

  function quiniela_3($Cmd_quiniela_3, $Cmd_turnos_3, $Sorteo_3, $fecha, $CantCifras )
  {
      echo '<form name="form3" method="GET" > ';
       echo "<input type='hidden' name='Quiniela'  value='3'> ";
        datos_tablaopen (' width="200" align="center"  class="tablabusqueda" border=0');
             Carg_Num_quiniela($Cmd_quiniela_3, $Cmd_turnos_3, $Sorteo_3, $fecha, $CantCifras );
             datos_tabladata('<div align="center"><input type="button" value="Cargar" onclick="Quiniela_3(this);" class="button" ></div>',' colspan="3" ');
        datos_tablaclose();
      echo '</form>';
  }

  function quiniela_4($Cmd_quiniela_4, $Cmd_turnos_4, $Sorteo_4, $fecha, $CantCifras )
  {
      echo '<form name="form4" method="GET" > ';
       echo "<input type='hidden' name='Quiniela'  value='4'> ";
        datos_tablaopen (' width="200" align="center"  class="tablabusqueda" border=0');
              Carg_Num_quiniela($Cmd_quiniela_4, $Cmd_turnos_4, $Sorteo_4, $fecha, $CantCifras);
              datos_tabladata('<div align="center"><input type="button" value="Cargar" onclick="Quiniela_4(this);" class="button" ></div>',' colspan="3" ');
        datos_tablaclose();
      echo '</form>';
  }


  function Carg_Num_quiniela($Cmd_quiniela, $Cmd_turnos, $Sorteo, $fecha, $CantCifras)
  {
      $SQL_sel1 = "SELECT QUINIELA FROM QUINIELAS WHERE IDQUINIELA = $Cmd_quiniela" ;
      $resultado_sql = mssql_query($SQL_sel1);
      list( $QUINIELA ) = mssql_fetch_array($resultado_sql);

      $SQL_sel2 = "SELECT Turno  FROM TURNOS WHERE IDTABLA = $Cmd_turnos";
      $resultado_sql = mssql_query($SQL_sel2);
      list( $Turno ) = mssql_fetch_array($resultado_sql);

      echo "<input type='hidden' name='Cmd_quiniela'  value='$Cmd_quiniela'> ";
      echo "<input type='hidden' name='Cmd_turnos'  value='$Cmd_turnos'> ";
      echo "<input type='hidden' name='Sorteo'  value='$Sorteo'> ";
      echo "<input type='hidden' name='fecha'  value='$fecha'> ";

      datos_tablaRowsOpen;
          datos_tabladata(  utf8_decode(htmlentities($QUINIELA . " " . $Turno ))  , ' class="tituloQuiniela" colspan="3"  align="Center" ');
      datos_tablaRowsClose();

      datos_tablaRowsOpen;
          datos_tabladata( " Sorteo N&deg; : " . $Sorteo , ' class="tituloQuiniela" colspan="3"  align="Center" ');
      datos_tablaRowsClose();

      datos_tablaRowsOpen;
      		  datos_tabladata(' Numero : ', ' class="tituloMenu"  align="right" ');
      		  datos_tabladata('&nbsp;', '');
      		  datos_tabladata('<input name="Numero" type="text" class="clsNode" size="8" onKeyPress="return Solo_Numeros(event)" maxlength="' . $CantCifras . '" value="0" >', ' class="clsNode" align="left" ');
      datos_tablaRowsClose();

      datos_tablaRowsOpen;
      		  datos_tabladata(' Puesto : ', ' class="tituloMenu"  align="right" ');
      		  datos_tabladata('&nbsp;', '');
      		  datos_tabladata('<input name="Puesto" type="text" class="clsNode" size="8" onKeyPress="return Solo_Numeros(event)" maxlength="3" value="0" >', ' class="clsNode" align="left" ');
      datos_tablaRowsClose();
  }

*/
	function Config_Loterias( $Cant_cifras, $cant_premios )
	{
	    if ($Cant_cifras == "")
	    {
         $Cant_cifras = '0';
      }
	    if ($Cant_numeros == "")
	    {
         $Cant_numeros = '0';
      }
       echo '<form name="form1" method="GET" > ';
         echo '<input type="hidden" name="Pantalla" value="2" >';
    	   datos_tablaopen (' width="330" align="center" border=0 ');
  	       datos_tablaRowsOpen;
           	    datos_tabladata(' Configuraci&oacute;n de Quinielas.', ' class="maintitle" colspan="2"   align="Center" ');
           datos_tablaRowsClose();

           datos_tablaRowsOpen;
           	    datos_tabladata('&nbsp;', ' colspan="2" ');
           datos_tablaRowsClose();

           datos_tablaRowsOpen;
           	    datos_tabladata('Cantidad de Numeros a cargar : ', ' class="tituloMenu"  align="right" ');
                datos_tabladata('<input name="Cant_numeros" type="text" class="clsNode" size="14" onKeyPress="return Solo_Numeros(event)" maxlength="30" value="' . $Cant_cifras .'" >', ' width="127" class="clsNode" align="center" ');
           datos_tablaRowsClose();

           datos_tablaRowsOpen;
           	    datos_tabladata('Cantidad de Cifras : ', ' class="tituloMenu"  align="right" ');
                datos_tabladata('<input name="Cant_cifras" type="text" class="clsNode" size="14" onKeyPress="return Solo_Numeros(event)" maxlength="30" value="' . $Cant_numeros .'" >', ' width="127" class="clsNode" align="center" ');
           datos_tablaRowsClose();

           datos_tablaRowsOpen;
 					 	     datos_tabladata('Quiniela : ', ' class="tituloMenu"  align="right" ');
                 cargo_combos(  "Cmd_quiniela", "quinielas", "quiniela", "idquiniela", '' , 'blanco','','  onFocus="Reacciona(this)" style="width:100px" align="center" ', '' );
				   datos_tablaRowsClose();

           datos_tabladata('<div align="center"><input type="button" value="Cargar" onclick="refresca_usu('  . "'Config_Quinielas'" . ');" onFocus="Reacciona(this)" class="button" ></div>',' colspan="2" ');

         datos_tablaclose();
    	 echo '</form>';

  }

  Function Alta_Loterias()
  {
       echo '<form name="form1" method="GET" > ';
         echo '<input type="hidden" name="Pantalla" value="2" >';
    	   datos_tablaopen (' width="300" align="center" border=0 ');
    	       datos_tablaRowsOpen;
             	    datos_tabladata(' Nuevas Loteria ', ' class="maintitle" colspan="3"   align="Center" ');
             datos_tablaRowsClose();

    	       datos_tablaRowsOpen;
             	    datos_tabladata('&nbsp;', ' colspan="3" ');
             datos_tablaRowsClose();

           datos_tablaRowsOpen;
           	    datos_tabladata('Nombre Loteria : ', ' class="tituloMenu"  align="right" ');
                datos_tabladata('<input name="Nombre_Lote" type="text" class="clsNode" size="20" maxlength="30" >', ' width="127" class="clsNode" align="center" ');
           datos_tablaRowsClose();

           datos_tabladata('<div align="center"><input type="button" value="Cargar" onclick="refresca_usu('  . "'Alta_Loteria'" . ');"  class="button" ></div>',' colspan="3" ');

         datos_tablaclose();
    	 echo '</form>';

  }

  Function Alta_Turnos()
  {
       echo '<form name="form1" method="GET" > ';
         echo '<input type="hidden" name="Pantalla" value="2" >';
    	   datos_tablaopen (' width="300" align="center" border=0 ');

           datos_tablaRowsOpen;
           	    datos_tabladata(' Nuevos Turnos : ', ' class="maintitle" colspan="3"   align="Center" ');
           datos_tablaRowsClose();

  	       datos_tablaRowsOpen;
           	    datos_tabladata('&nbsp;', ' colspan="3" ');
           datos_tablaRowsClose();

           datos_tablaRowsOpen;
           	    datos_tabladata(' Turno : ', ' class="tituloMenu"  align="right" ');
                datos_tabladata('<input name="Nombre_Turno" type="text" class="clsNode" size="20" maxlength="30" >', ' width="127" class="clsNode" align="center" ');
           datos_tablaRowsClose();

           datos_tabladata('<div align="center"><input type="button" value="Cargar" onclick="refresca_usu('  . "'Alta_Turno'" . ');" class="button" ></div>',' colspan="3" ');

         datos_tablaclose();
    	 echo '</form>';

  }

  Function Modificar_Loterias($Cmd_quiniela)
  {
    If ($Cmd_quiniela != "")
    {
       $sql = "SELECT quiniela FROM quinielas WHERE idquiniela = $Cmd_quiniela";
       $rs = mssql_query($sql);
       list( $texto ) = mssql_fetch_array($rs);
    }

       echo '<form name="form1" method="GET" > ';
         echo '<input type="hidden" name="Pantalla" value="5" >';
    	   datos_tablaopen (' width="300" align="center" border=0 ');
             datos_tablaRowsOpen;
             	    datos_tabladata(' Modificaci&oacute;n de Quinielas ', ' class="maintitle" colspan="3"   align="Center" ');
             datos_tablaRowsClose();

    	       datos_tablaRowsOpen;
             	    datos_tabladata('&nbsp;', ' colspan="3" ');
             datos_tablaRowsClose();

           datos_tablaRowsOpen;
 					 	     datos_tabladata('Loteria : ', ' class="tituloMenu"  align="right" ');
							   cargo_combos(  "Cmd_quiniela", "quinielas ", "quiniela", "idquiniela", '' , 'blanco','',' onchange="ref_comb5();" style="width:100px" align="left" ', $Cmd_quiniela );
				   datos_tablaRowsClose();

           datos_tablaRowsOpen;
           	    datos_tabladata('Nombre a Modificar : ', ' class="tituloMenu"  align="right" ');
                datos_tabladata('<input name="Nombre_Quiniela" type="text" class="clsNode" size="20" maxlength="30" value="' . $texto . '">', ' width="127" class="clsNode" align="left" ');
           datos_tablaRowsClose();

           datos_tabladata('<div align="center"><input type="button" value="Modificar" onclick="refresca_usu('  . "'Modif_Quiniela'" . ');" class="button" ></div>',' colspan="3" ');

         datos_tablaclose();
    	 echo '</form>';

  }

  Function Modificar_Turnos( $Cmd_Turno )
  {
    if (($Cmd_Turno != '') or ($Cmd_Turno != 0))
    {
       $sql = "SELECT Turno FROM turnos WHERE IdTabla  = $Cmd_Turno";
       $rs = mssql_query($sql);
       list( $texto ) = mssql_fetch_array($rs);
       $texto = utf8_decode(htmlentities($texto)) ;
    }

       echo '<form name="form1" method="GET" > ';
         echo '<input type="hidden" name="Pantalla" value="6" >';
    	   datos_tablaopen (' width="300" align="center" border=0 ');
             datos_tablaRowsOpen;
             	    datos_tabladata(' Modificaci&oacute;n de Turnos ', ' class="maintitle" colspan="3"   align="Center" ');
             datos_tablaRowsClose();

    	       datos_tablaRowsOpen;
             	    datos_tabladata('&nbsp;', ' colspan="3" ');
             datos_tablaRowsClose();

           datos_tablaRowsOpen;
 					 	     datos_tabladata(' Turno : ', ' class="tituloMenu"  align="right" ');
							   cargo_combos(  "Cmd_Turno", "turnos", "Turno", "IdTabla", '' , 'blanco','',' onchange="ref_comb6();" style="width:100px" align="left" ', $Cmd_Turno );
				   datos_tablaRowsClose();

           datos_tablaRowsOpen;
           	    datos_tabladata('Turno a Modificar : ', ' class="tituloMenu"  align="right" ');
                datos_tabladata('<input name="Nombre_Turno" type="text" class="clsNode" size="20" maxlength="30" Value="' . $texto . '" >', ' width="127" class="clsNode" align="left" ');
           datos_tablaRowsClose();

           datos_tabladata('<div align="center"><input type="button" value="Modificar" onclick="refresca_usu('  . "'Modif_Turnos'" . ');" class="button" ></div>',' colspan="3" ');

         datos_tablaclose();
    	 echo '</form>';

  }


//-----------------------------------------------------------------------------------------------------//
//-----------------------------------------------------------------------------------------------------//
//---------------------------- Modificaciones del 10/10/2010 ------------------------------------------//
//-----------------------------------------------------------------------------------------------------//

  function Carg_Num_quiniela($Cmd_quiniela, $Cmd_turnos, $Sorteo, $fecha)
  {
      $SQL_sel = "SELECT QUINIELA FROM QUINIELAS WHERE IDQUINIELA = $Cmd_quiniela" ;
      $resultado_sql = mssql_query($SQL_sel);
      list( $QUINIELA ) = mssql_fetch_array($resultado_sql);

      $SQL_sel = "SELECT Turno  FROM TURNOS WHERE IDTABLA = $Cmd_turnos";
      $resultado_sql = mssql_query($SQL_sel);
      list( $Turno ) = mssql_fetch_array($resultado_sql);

      echo "<input type='hidden' name='Cmd_quiniela'  value='$Cmd_quiniela'> ";
      echo "<input type='hidden' name='Cmd_turnos'  value='$Cmd_turnos'> ";
      echo "<input type='hidden' name='Sorteo'  value='$Sorteo'> ";
      echo "<input type='hidden' name='fecha'  value='$fecha'> ";
      datos_tablaRowsOpen('');
          datos_tabladata( utf8_decode(htmlentities( $QUINIELA )) . "<br>" . utf8_decode(htmlentities( $Turno ))    , ' class="tituloQuiniela" colspan="2"  align="Center" ');
      datos_tablaRowsClose();

      datos_tablaRowsOpen('');
          datos_tabladata( "Sorteo N&deg;: " . $Sorteo , ' class="tituloQuiniela" colspan="2"  align="Center" ');
      datos_tablaRowsClose();

      $SQL_sel = "SELECT CantNumeros, CantCifras FROM config_quiniela WHERE IdQuiniela = $Cmd_quiniela ";
      $resultado_sql = mssql_query($SQL_sel);
      list( $CantNumeros, $CantCifras ) = mssql_fetch_array($resultado_sql);

      if($Sorteo == 0)
      {
        $Sorteo = "";
      }

      $SQL_sel = "SELECT Turno FROM Turnos WHERE IdTabla = $Cmd_turnos";
      $resultado_sql = mssql_query($SQL_sel);
      list( $Turno ) = mssql_fetch_array($resultado_sql);


      //$SQL_sel = "SELECT IDSORTEO FROM sorteos WHERE FECHASORTEO = CAST (('$fecha 00:00:00') as smalldatetime) AND NroSorteo = '" . $Sorteo . "' AND IDQUINIELA = $Cmd_quiniela AND Turno = $Cmd_turnos ";
      $SQL_sel = "SELECT IDSORTEO FROM sorteos WHERE FECHASORTEO = CAST (('$fecha 00:00:00') as smalldatetime) AND NroSorteo = '" . $Sorteo . "' AND IDQUINIELA = $Cmd_quiniela AND Turno = '$Turno' ";

      $resultado_sql = mssql_query($SQL_sel);
      list( $IDSORTEO ) = mssql_fetch_array($resultado_sql);

      if($IDSORTEO == '')
      {
        $IDSORTEO = "Null";
      }

      $i = 1;
      while($CantNumeros >= $i)
      {
         $SQL_sel = "SELECT IdNumero FROM Numeros WHERE IDSORTEO = $IDSORTEO AND UBICACION = $i ";
         //echo $SQL_sel ;
         $resultado_sql = mssql_query($SQL_sel);
         list( $IdNumero ) = mssql_fetch_array($resultado_sql);

         if($IdNumero > 0)
         {
             $SQL_sel = "SELECT Numero FROM Numeros WHERE IdNumero = $IdNumero ";
             //echo $SQL_sel ;
             $resultado_sql = mssql_query($SQL_sel);
             list( $Numeros ) = mssql_fetch_array($resultado_sql);
         }else
         {
            $Numeros = "";
         }
         echo "<input type='hidden' name='puesto[]'  value='$i'> ";
         datos_tablaRowsOpen('');
         	    datos_tabladata($i . ' - ', ' width="25" class="tituloMenu"  align="right" ');
              datos_tabladata('<input name="numero[]" type="text" class="clsNode" Value="' . $Numeros . '" size="6" maxlength="' . $CantCifras . '" onKeyPress="return Solo_Numeros(event)" >', ' class="clsNode" align="left" width="25" ');
         datos_tablaRowsClose();

         $i++;
      }

      if ($Cmd_quiniela == 1)
      {
         $SQL_sel = "SELECT Letra from letras where idSorteo = $IDSORTEO AND Ubicacion = 1";
         $resultado_sql = mssql_query($SQL_sel);
         list( $Letra1 ) = mssql_fetch_array($resultado_sql);
         $SQL_se2 = "SELECT Letra from letras where idSorteo = $IDSORTEO AND Ubicacion = 2";
         $resultado_sql = mssql_query($SQL_se2);
         list( $Letra2 ) = mssql_fetch_array($resultado_sql);
         $SQL_se3 = "SELECT Letra from letras where idSorteo = $IDSORTEO AND Ubicacion = 3";
         $resultado_sql = mssql_query($SQL_se3);
         list( $Letra3 ) = mssql_fetch_array($resultado_sql);
         $SQL_se4 = "SELECT Letra from letras where idSorteo = $IDSORTEO AND Ubicacion = 4";
         $resultado_sql = mssql_query($SQL_se4);
         list( $Letra4 ) = mssql_fetch_array($resultado_sql);

          datos_tablaRowsOpen('');
            echo "<td colspan='2' >";
             datos_tablaopen (' align="center" border=0 ');
               datos_tablaRowsOpen('');
               	    datos_tabladata('Carga de Letras ' , ' class="clsNode" align="Center" width="25" colspan="4" ');
               datos_tablaRowsClose();
               datos_tablaRowsOpen('');
               	    datos_tabladata('<input name="Letra1" type="text" class="clsNode" size="1" maxlength="1" Value="' . $Letra1 . '" >', ' class="clsNode" align="left" width="25" ');
               	    datos_tabladata('<input name="Letra2" type="text" class="clsNode" size="1" maxlength="1" Value="' . $Letra2 . '">', ' class="clsNode" align="left" width="25" ');
               	    datos_tabladata('<input name="Letra3" type="text" class="clsNode" size="1" maxlength="1" Value="' . $Letra3 . '">', ' class="clsNode" align="left" width="25" ');
               	    datos_tabladata('<input name="Letra4" type="text" class="clsNode" size="1" maxlength="1" Value="' . $Letra4 . '">', ' class="clsNode" align="left" width="25" ');
               datos_tablaRowsClose();
             datos_tablaclose();
            echo "</td>";
          datos_tablaRowsClose();

      }

    $SQL_sel = "SELECT COUNT(IDNUMERO) AS CANT FROM NUMEROS WHERE IDSORTEO = $IDSORTEO ";
    $resultado_sql = mssql_query($SQL_sel);
    list( $CANT ) = mssql_fetch_array($resultado_sql);

    if ( ($CantNumeros -1 ) <= $CANT )
    {

       datos_tablaRowsOpen('');
         datos_tabladata('Enviar Correo <input name="cbCorreo" type="checkbox" id="cbCorreo" value="checkbox" >','  class="tituloMenu"  align="left" colspan="2" ');
       datos_tablaRowsClose();

       $mensaje = "SMS_mensaje(". $IDSORTEO . ", " . $Cmd_quiniela . ");";
       datos_tablaRowsOpen('');
         datos_tabladata('<input type="button" value="Texto SMS" onClick="return popup('  . "'trae.php?proce=$mensaje'" . ', ' . "'correo'". ')" class="button" >',' colspan="2" ');
       datos_tablaRowsClose();

       datos_tablaRowsOpen('');
         datos_tabladata('<input type="button" value="Eliminar" onClick="eliminaquini(' . $IDSORTEO . ',' . $Cmd_quiniela .')" class="button" >',' colspan="2" ');
       datos_tablaRowsClose();
       
    }else
    {
       echo "<input type='hidden' name='cbCorreo' value='Nada'> ";
       datos_tablaRowsOpen('');
         datos_tabladata('&nbsp;','  class="tituloMenu"  align="left" colspan="2" ');
       datos_tablaRowsClose();
    }
  }

  function quiniela_1($Cmd_quiniela_1, $Cmd_turnos_1, $Sorteo_1, $fecha )
  {
      echo '<form name="form1" id="form1" method="POST" > ';
       echo "<input type='hidden' name='Quiniela'  value='1'> ";
        datos_tablaopen (' width="137" align="center"  class="tablabusqueda" border=0 valign="top" ');
             Carg_Num_quiniela( $Cmd_quiniela_1, $Cmd_turnos_1, $Sorteo_1, $fecha );
             datos_tabladata('<div align="center"><input type="button" value="Cargar" onclick="Quiniela_1();" class="button" ></div>',' colspan="2" ' );
        datos_tablaclose();
      echo '</form>';
  }

  function quiniela_2($Cmd_quiniela_2, $Cmd_turnos_2, $Sorteo_2, $fecha)
  {
      echo '<form name="form2" id="form2" method="POST" > ';
       echo "<input type='hidden' name='Quiniela'  value='2'> ";
        datos_tablaopen (' width="137"  align="center"  class="tablabusqueda" border=0 valign="top" ');
             Carg_Num_quiniela($Cmd_quiniela_2, $Cmd_turnos_2, $Sorteo_2, $fecha);
             datos_tabladata('<div align="center"><input type="button" value="Cargar" onclick="Quiniela_2();" class="button" ></div>',' colspan="2" ');
        datos_tablaclose();
      echo '</form>';
  }

  function quiniela_3($Cmd_quiniela_3, $Cmd_turnos_3, $Sorteo_3, $fecha )
  {
      echo '<form name="form3" id="form3" method="POST" > ';
       echo "<input type='hidden' name='Quiniela'  value='3'> ";
        datos_tablaopen (' width="137" align="center"  class="tablabusqueda" border=0 valign="top" ');
             Carg_Num_quiniela($Cmd_quiniela_3, $Cmd_turnos_3, $Sorteo_3, $fecha );
             datos_tabladata('<div align="center"><input type="button" value="Cargar" onclick="Quiniela_3();" class="button" ></div>',' colspan="2" ');
        datos_tablaclose();
      echo '</form>';
  }

  function quiniela_4($Cmd_quiniela_4, $Cmd_turnos_4, $Sorteo_4, $fecha )
  {
      echo '<form name="form4" id="form4" method="POST" > ';
       echo "<input type='hidden' name='Quiniela'  value='4'> ";
        datos_tablaopen (' width="137" align="center"  class="tablabusqueda" border=0 valign="top"');
              Carg_Num_quiniela($Cmd_quiniela_4, $Cmd_turnos_4, $Sorteo_4, $fecha);
              datos_tabladata('<div align="center"><input type="button" value="Cargar" onclick="Quiniela_4();" class="button" ></div>',' colspan="2" ');
        datos_tablaclose();
      echo '</form>';
  }

  Function Pantalla_Modif_Poceados()
  {
      $fecha = getdate();
      $anio = $fecha[year];
      $Mes = $fecha[mon];
      $dia =  $fecha[mday];

      echo '<form name="form1" id="form1" method="GET" > ';
        datos_tablaopen (' width="300" align="center"  class="tablabusqueda" border=0');
          datos_tablaRowsOpen;
 					    datos_tabladata('Loteria Poceada : ', ' class="tituloMenu"  align="right" ');
					    datos_tabladata('&nbsp;',' class="tituloMenu"  align="right" ');
              cargo_combos(  "Cmd_Poseada", "poceados", "poceado", "Idpoceado", '' , 'blanco',' align="left" ',' style="width:120px" ', '' );
 			    datos_tablaRowsClose();

          datos_tablaRowsOpen('');
              datos_tabladata('N&deg; Sorteo : ', ' class="tituloMenu"  align="right" ');
              datos_tabladata('&nbsp;',' class="tituloMenu"  align="right" ');
              datos_tabladata('<input name="nro_Sorteo" type="text" class="clsNode" size="10" onKeyPress="return Solo_Numeros(event)" maxlength="30" Value="' . $nro_Sorteo . '" >', ' class="clsNode" align="left" ');
          datos_tablaRowsClose();

          datos_tablaRowsOpen;
            datos_tabladata('Fecha de la Jugada : ', ' class="tituloMenu"  align="right" ');
            datos_tabladata('&nbsp;',' class="tituloMenu"  align="right" ');
            echo '<td class="tituloMenu"  align="left" >';
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
            	    echo "<select name='mes'>";
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
          datos_tablaRowsClose();

          datos_tabladata('<div align="center"><input type="button" value="Buscar" onclick="refresca_usu('  . "'Busca_poceadas'" . ');" class="button" ></div>',' colspan="3" ');
        datos_tablaclose();
      echo '</form>';

  }

  Function Modif_poceadas($fecha, $nro_Sorteo, $Cmd_Poseada)
  {
       If( $nro_Sorteo != "" )
       {
          $busqueda =  " AND NROSORTEO = '$nro_Sorteo' ";
       }else
       {
          $busqueda =  " AND FECHASORTEO = CAST (('$fecha 00:00:00') as smalldatetime) ";
       }

      $sql_sel = "SELECT idSorteoPoceado, IdPoceado, NroSorteo, fechaSorteo FROM sorteos_poceados WHERE IDPOCEADO = $Cmd_Poseada $busqueda ";
      $rs = mssql_query($sql_sel);
      list( $idSorteoPoceado, $IdPoceado, $NroSorteo, $fechaSorteo ) = mssql_fetch_array($rs);

      $fechaS = date("d/m/y",strtotime($fechaSorteo));
      $anio = "20" . substr($fechaS, 6,4);
      $Mes = substr($fechaS, 3,2);
      $dia = substr($fechaS, 0,2);

      $sql_poceada = "SELECT poceado FROM poceados WHERE IdPoceado = " . $IdPoceado ;
      $rs = mssql_query($sql_poceada);
      list( $Poceada ) = mssql_fetch_array($rs);

      echo '<form name="form1" id="form1" method="POST" > ';
       echo '<input type="hidden" name="Cmd_Poseada" value="' . $IdPoceado . '" >';
       //echo "<input type='hidden' name='idSorteoPoceado'  value='$idSorteoPoceado' > ";
        datos_tablaopen (' width="260" align="center" border=0 class="tablabusqueda" ');
     	    datos_tablaRowsOpen('');
               datos_tabladata($Poceada, ' class="maintitle"  colspan="3" ');
          datos_tablaRowsClose();

          datos_tablaRowsOpen('');
                datos_tabladata('N&deg; Sorteo : ' , ' class="tituloMenu"  align="right" ');
                datos_tabladata('&nbsp;',' class="tituloMenu"  align="right" ');
                datos_tabladata('<input name="nro_Sorteo" type="text" class="clsNode" size="10" Value="' . $NroSorteo . '" onKeyPress="return Solo_Numeros(event)" maxlength="30" Value="' . $nro_Sorteo . '" >', ' width="127" class="clsNode" align="left" ');
          datos_tablaRowsClose();

          datos_tablaRowsOpen;
              datos_tabladata('Fecha de la Jugada : ' , ' class="tituloMenu"  align="right" ');
              datos_tabladata('&nbsp;',' class="tituloMenu"  align="right" ');
              echo '<td class="tituloMenu"  align="left" >';
              	    echo "<select name='dia'>";
              			    for ($i = 1; $i <= 31; $i++)
                        {
                            if ($i == "$dia")
                            {
                               echo "<option selected value='" . $i . "'>$i</option>";
                            }else
                            {
                               echo "<option value='" . $i . "'>$i</option>";
                            }
                        }
              	    echo "</select>";
              	    echo "<select name='mes'>";
              			    for ($i = 1; $i <= 12; $i++)
                        {
                            if ($i == "$Mes")
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
                            if ($i == "$anio")
                            {
                               echo "<option selected value='" . $i . "'>$i</option>";
                            }else
                            {
                               echo "<option value='" . $i . "'>$i</option>";
                            }
                        }
              	    echo "</select>";
              echo "</td>";
           datos_tablaRowsClose();

          datos_tablaRowsOpen;
          echo '<td colspan="3" >';

			 $idSort_poceados ='';

			     $sql = "SELECT CantNumeros, cantPuestos, IdTipoPoceada FROM config_poceada WHERE IdPoceada = $IdPoceado ";
              $resultado_sql = mssql_query($sql);
              while($Datos = mssql_fetch_array($resultado_sql) )
              {
                    If ( ($Datos['CantNumeros'] % 5) == 0 )
                    {
                      $cant = 5;
                    } else
                    {
                      If ( ($Datos['CantNumeros'] % 6 ) == 0 )
                      {
                        $cant = 6;
                      } else
                      {
                         $cant = 5;
                      }
                    }

                    $IdTipoPoceada = $Datos['IdTipoPoceada'];

            	      $sql_Tipo = "SELECT tipoPoceado FROM tipos_poceados WHERE idTipoPoceado = $IdTipoPoceada ";
                    $rs = mssql_query($sql_Tipo);
                    list( $tipoPoceado ) = mssql_fetch_array($rs);

                    $sql_sel2 = "SELECT IdSorteoPoceado
                                  FROM sorteos_poceados
                                 WHERE IdTipoPoceado = $IdTipoPoceada
                                   AND idPoceado = $IdPoceado
                                   AND nroSorteo = '$NroSorteo' ";
                    $resultado_sql2 = mssql_query($sql_sel2);
                    list( $idSorteoPoceado2 ) = mssql_fetch_array($resultado_sql2);

                    datos_tablaopen (' width="320" align="center" border=0  ');
                      datos_tablaRowsOpen('');
                       echo "<td>";

                          datos_tablaopen (' width="320" align="center" border=0  ');
                            datos_tablaRowsOpen('');
                               echo '<td colspan="6" align="middle" background="http://www.oraculosemanal.com/images/bgfade.gif"><strong class="Estilo4">' .  utf8_decode(htmlentities($tipoPoceado)) . '</strong></td>';
                            datos_tablaRowsClose();



                               if($IdTipoPoceada == 26)
                               {
                                   datos_tablaopen (' width="320" align="center" border=0 ');

                                    datos_tablaRowsOpen('');
                                   	    datos_tabladata('NRO. DE CART&Oacute;N', ' background="http://www.oraculosemanal.com/images/bgfade.gif"  class="Estilo4"  align="Center" ');
                                        datos_tabladata('VENDIDO EN', ' background="http://www.oraculosemanal.com/images/bgfade.gif"  class="Estilo4" align="Center" ');
                                    datos_tablaRowsClose();

                                    $SQL_CARTONES = "SELECT Numero_carton, lugar, Id_tabla FROM CARTONES WHERE IDSORTEOPOCEADO = $idSorteoPoceado2 Order by lugar";
                                      //echo    $SQL_CARTONES;
                                    $resultado_sql_3 = mssql_query($SQL_CARTONES);
                                    while($Datos_3 = mssql_fetch_array($resultado_sql_3) )
                                    {
                                      echo "<input type='hidden' name='Id_tabla[]'  value='" . $Datos_3['Id_tabla'] . "' > ";
                                      datos_tablaRowsOpen('');
                                          datos_tabladata('<input name="Numero_carton[]" Value="' . Trim($Datos_3['Numero_carton']) . '" type="text" class="clsNode" size="10" maxlength="30" >', ' width="127" class="clsNode" align="Center" ');
                                          datos_tabladata('<input name="lugar[]" Value="' . Trim($Datos_3['lugar']) . '" type="text" class="clsNode" size="10" maxlength="30"  >', ' width="127" class="clsNode" align="Center" ');
                                      datos_tablaRowsClose();
                                   }
                                   //datos_tablaclose();

                               }else
                               {
                                   if($Datos['IdTipoPoceada'] == 36)
                                   {

                                        datos_tablaRowsOpen('');
                                       	    datos_tabladata('PREMIO ($)', ' background="http://www.oraculosemanal.com/images/bgfade.gif"  class="Estilo4"  align="Center" ');
                                            datos_tabladata('VENDIDO EN', ' background="http://www.oraculosemanal.com/images/bgfade.gif"  class="Estilo4" align="Center" ');
                                            datos_tabladata('NRO. DE CART&Oacute;N', ' background="http://www.oraculosemanal.com/images/bgfade.gif"  class="Estilo4"  align="Center" ');
                                        datos_tablaRowsClose();
                                        $SQL_CARTONES = "SELECT Numero_carton, lugar, Id_tabla, importe FROM CARTONES WHERE IDSORTEOPOCEADO = $idSorteoPoceado2 Order by lugar";
                                        $resultado_sql_3 = mssql_query($SQL_CARTONES);
                                        //while($Datos['cantPuestos'] >= $i)
                                        while($Datos_3 = mssql_fetch_array($resultado_sql_3) )
                                        {
                                           echo "<input type='hidden' name='Id_tabla[]'  value='" . $Datos_3['Id_tabla'] . "' > ";
                                           datos_tablaRowsOpen('');
                                              datos_tabladata('<input name="Valor[]" Value="' . Trim($Datos_3['importe']) . '"  type="text" class="clsNode" size="10" maxlength="40" >', ' width="127" class="clsNode" align="Center" ');
                                              datos_tabladata('<input name="lugar[]" Value="' . Trim($Datos_3['lugar']) . '"  type="text" class="clsNode" size="10" maxlength="45"  >', ' width="127" class="clsNode" align="Center" ');
                                              datos_tabladata('<input name="Numero_carton[]" Value="' . Trim($Datos_3['Numero_carton']) . '" type="text" class="clsNode" size="10" maxlength="40" >', ' width="127" class="clsNode" align="Center" ');
                                           datos_tablaRowsClose();
                                           $i++;
                                        }
                                   }else
                                   {
                                          datos_tablaRowsOpen('');
                                              $i = 1;
                                              $j = 1;

                                              $sql_Tipo = "SELECT IdNumeroPoceado, NUMERO FROM NUMEROS_poceados WHERE idsorteoPoceado = $idSorteoPoceado2 Order by  NUMERO " ;

                                              $resultado_sql_2 = mssql_query($sql_Tipo);
                                              while($Datos_2 = mssql_fetch_array($resultado_sql_2) )
                                              {
                                                 echo "<input type='hidden' name='idnumero[]'  value='" . $Datos_2['IdNumeroPoceado'] . "'> ";
                                                 datos_tabladata('<input name="numero[]" Value="' . $Datos_2['NUMERO'] . '" type="text" class="clsNode" size="5" maxlength="10"  >', ' width="127" class="clsNode" align="center" ');

                                                 if($cant == $i)
                                                 {
                                                     datos_tablaRowsClose();
                                                     datos_tablaRowsOpen('');
                                                     $i = 0;
                                                 }
                                                 $j++;
                                                 $i++;
                                              }
                                         datos_tablaRowsClose();

                                         datos_tablaclose();

                                         datos_tablaopen (' width="320" align="center" border=0 ');

                                         datos_tablaRowsOpen('');
                                         	    datos_tabladata('ACIERTOS', '  background="http://www.oraculosemanal.com/images/bgfade.gif"  class="Estilo4" align="Center" ');
                                              datos_tabladata('GANADORES', ' background="http://www.oraculosemanal.com/images/bgfade.gif"  class="Estilo4"  align="Center" ');
                                              datos_tabladata('PREMIO A C/U ($)', ' background="http://www.oraculosemanal.com/images/bgfade.gif"  class="Estilo4" align="Center" ');
                                         datos_tablaRowsClose();

                                          //$i = 1;
                                          $sql_Tipo = "SELECT IDPREMIO, ACIERTOS, GANADORES, MONTO FROM PREMIOS WHERE IDSORTEOPOCEADO = $idSorteoPoceado2 Order by ACIERTOS DESC " ;
                                          //$puestos = $Datos['CantNumeros'];
                                          //while($Datos['cantPuestos'] >= $i)
                                          $resultado_sql_3 = mssql_query($sql_Tipo);
                                          while($Datos_3 = mssql_fetch_array($resultado_sql_3) )
                                          {

                                     	       ///echo $sql_Tipo ;
                                             //$rs = mssql_query($sql_Tipo);
                                            // list( $IDPREMIO, $ACIERTOS, $GANADORES, $MONTO ) = mssql_fetch_array($rs);
                                             //$MONTO = number_format($MONTO, 2, ",", ".");

                                             echo "<input type='hidden' name='IDPREMIO[]'  value='" . $Datos_3['IDPREMIO'] . "' > ";
                                             datos_tablaRowsOpen('');
                                             	    datos_tabladata('<input name="aciertos[]" Value="' . $Datos_3['ACIERTOS'] . '" type="text" class="clsNode" size="10" maxlength="30" onKeyPress="return Solo_Numeros(event)" >', ' width="127" class="clsNode" align="Center" ');
                                                  datos_tabladata('<input name="ganadores[]" Value="' . $Datos_3['GANADORES'] . '" type="text" class="clsNode" size="10" maxlength="30"  onKeyPress="return Solo_Numeros(event)" >', ' width="127" class="clsNode" align="Center" ');
                                                  datos_tabladata('<input name="premios[]" Value="' . $Datos_3['MONTO'] . '" type="text" class="clsNode" size="10" maxlength="30"  onKeyPress="return Solo_Numeros2(event)" >', ' width="127" class="clsNode" align="Center" ');
                                             datos_tablaRowsClose();
                                           //  $i++;
                                           //  $puestos =  $puestos - 1 ;
                                          }
                                  }
                              }
                          datos_tablaclose();
                       echo "</td>";
                     datos_tablaRowsClose();
                   datos_tablaclose();
                   echo "<br>";

						 if($idSort_poceados =='')
						 {
                      $idSort_poceados = $idSorteoPoceado2;
                   }else
                   {
                      $idSort_poceados = $idSort_poceados . ', ' . $idSorteoPoceado2;
                   }


              }

             echo '</td>';
           datos_tablaRowsClose();


        datos_tablaRowsOpen;
          datos_tabladata('<input name="cbCorreo" type="checkbox" id="cbCorreo" value="checkbox"> Enviar Correo ','  class="tituloMenu"  align="right" ');
          datos_tabladata('&nbsp;', '  class="tituloMenu"  align="right" ');
          datos_tabladata('<div align="center"><input type="button" value="Modificar" onclick="Modifico_Poceadas();" onFocus="ReaccionaPoceadas(this)" class="button" ></div>','  class="tituloMenu"  align="right" ');
        datos_tablaRowsClose();

		  datos_tablaRowsOpen;
          datos_tabladata('<div align="center"><input type="button" value="Eliminar" onClick="eliminaPoseada(' . $idSort_poceados . ')" class="button" ></div>','  class="tituloMenu"  align="right" colspan="3" ');
        datos_tablaRowsClose();
        
      datos_tablaclose();
      echo '</form>';
      echo "<br><br>";
  }

//-----------------------------------------------------------------------------------------------------//
//------------------------- Fin de las Modificaciones del 10/10/2010 ----------------------------------//
//-----------------------------------------------------------------------------------------------------//
//-----------------------------------------------------------------------------------------------------//

Function grilla_sorteos_cabecera($tipo)
{

	$sql2 = " SELECT CONVERT(VARCHAR(10),  max(fecha), 103) as Fecha FROM sorteo_publicado ";
	$resultado = mssql_query($sql2);
   list( $fecha) = mssql_fetch_array($resultado);
   echo '<form name="form1" id="form1" method="POST" > ';
	echo '<table width="420" border="0" cellpadding="0" cellspacing="0" >';
	echo '  <tr>';
	echo '    <td width="10">&nbsp;</td>';
	//echo '    <td width="80"><div align="center" class="cabecera_numeros"><div align="left">' . $fecha . '</div></div></td>';
	echo '    <td width="80"><div align="center" class="cabecera_numeros"><div align="left"><input type="text" name="fecha[]"  value="' . $fecha . '" maxlength="10" size="7" class="clsNode" ></div></div></td>';
	echo '    <td width="80"><div align="center" class="cabecera_titulo">Los Primeros</div></td>';
	echo '    <td width="80"><div align="center" class="cabecera_titulo">Matutina</div></td>';
	echo '    <td width="80"><div align="center" class="cabecera_titulo">Vespertina</div></td>';
	echo '    <td width="80"><div align="center" class="cabecera_titulo">Nocturna</div></td>';
	echo '    <td width="10">&nbsp;</td>';
	echo '  </tr>';
   $sql = "SELECT idQuinielaP, quiniela, losprimeros, matutina, vespertina, nocturna, fecha  FROM sorteo_publicado ";
	$resultado_sql = mssql_query($sql);
	while($Datos = mssql_fetch_array($resultado_sql) )
	{
		echo '  <tr>';
		echo '    <td width="10" height="15" >&nbsp;</td>';
		echo '     <input type="hidden" name="idQuinielaP[]"  value="' . $Datos['idQuinielaP'] . '" > ';
		echo '     <input type="hidden" name="fecha[]"  value="' . $Datos['fecha'] . '" > ';
		echo '    <td width="80" height="15" ><div align="left" class="cabecera_numeros">' . htmlentities( $Datos['quiniela'] ,ENT_QUOTES,"ISO-8859-1")  . '</div></td>';
		if($tipo != 1)
		{
			echo '    <td width="80" height="15" ><div align="center" class="cabecera_numeros"><input name="primeros[]" Value="' .  $Datos['losprimeros'] . '"  type="text" class="clsNode" size="7" maxlength="10" ></div></td>';
			echo '    <td width="80" height="15" ><div align="center" class="cabecera_numeros"><input name="matutina[]" Value="' .  $Datos['matutina'] . '"  type="text" class="clsNode" size="7" maxlength="10" ></div></td>';
			echo '    <td width="80" height="15" ><div align="center" class="cabecera_numeros"><input name="vespertina[]" Value="' .  $Datos['vespertina'] . '"  type="text" class="clsNode" size="7" maxlength="10" ></div></td>';
			echo '    <td width="80" height="15" ><div align="center" class="cabecera_numeros"><input name="nocturna[]" Value="' .  $Datos['nocturna'] . '"  type="text" class="clsNode" size="7" maxlength="10" ></div></td>';
		}else
		{
			echo '    <td width="80" height="15" ><div align="center" class="cabecera_numeros"><input name="primeros[]" Value="--"  type="text" class="clsNode" size="7" maxlength="10" ></div></td>';
			echo '    <td width="80" height="15" ><div align="center" class="cabecera_numeros"><input name="matutina[]" Value="--"  type="text" class="clsNode" size="7" maxlength="10" ></div></td>';
			echo '    <td width="80" height="15" ><div align="center" class="cabecera_numeros"><input name="vespertina[]" Value="--"  type="text" class="clsNode" size="7" maxlength="10" ></div></td>';
			echo '    <td width="80" height="15" ><div align="center" class="cabecera_numeros"><input name="nocturna[]" Value="--"  type="text" class="clsNode" size="7" maxlength="10" ></div></td>';
		}
		echo '    <td width="10" height="15" >&nbsp;</td>';
		echo '  </tr>';
	}


	echo '  <tr>';
	datos_tabladata('&nbsp;',' colspan="7" ');
	echo '  </tr>';
	echo '  <tr>';
   datos_tabladata('<div align="center"><input type="button" value="Modificar" onclick="fun_Modif_Cabecera();"  class="button" >&nbsp;<input type="button" value="Limpiar" class="button" onclick="refresca_usu('  . "'grilla_sorteos_cabecera(1);'" . ');" >&nbsp;<input type="button" value="Cancelar" class="button" onclick="refresca_usu('  . "'grilla_sorteos_cabecera(0);'" . ');" ></div>',' colspan="7" ');
   echo '  </tr>';

//echo '  <tr>';
//datos_tabladata('<a title="Cabeceras quinielas - OraculoSemanal" target="_blank" href="http://www.facebook.com/sharer.php?u=http://www.oraculosemanal.com/_testing3/Visualizaciones/grillaSorteos.asp">Compartir FB</a> ',' colspan="7" ');
//echo '  </tr>';

	echo '</table><p>&nbsp;</p>';
   echo '</form> ';

}

function SMS_mensaje($IDSORTEO, $Cmd_quiniela)
{
  //echo $IDSORTEO;

      $SQL_sel = "SELECT CantNumeros, CantCifras FROM config_quiniela WHERE IdQuiniela = $Cmd_quiniela ";
      $resultado_sql = mssql_query($SQL_sel);
      list( $CantNumeros, $CantCifras ) = mssql_fetch_array($resultado_sql);

      if($Sorteo == 0)
      {
        $Sorteo = "";
      }
/*
      $SQL_sel = "SELECT Turno FROM Turnos WHERE IdTabla = $Cmd_turnos";
      $resultado_sql = mssql_query($SQL_sel);
      list( $Turno ) = mssql_fetch_array($resultado_sql);


      //$SQL_sel = "SELECT IDSORTEO FROM sorteos WHERE FECHASORTEO = CAST (('$fecha 00:00:00') as smalldatetime) AND NroSorteo = '" . $Sorteo . "' AND IDQUINIELA = $Cmd_quiniela AND Turno = $Cmd_turnos ";
      $SQL_sel = "SELECT IDSORTEO FROM sorteos WHERE FECHASORTEO = CAST (('$fecha 00:00:00') as smalldatetime) AND NroSorteo = '" . $Sorteo . "' AND IDQUINIELA = $Cmd_quiniela AND Turno = '$Turno' ";

      $resultado_sql = mssql_query($SQL_sel);
      list( $IDSORTEO ) = mssql_fetch_array($resultado_sql);

      if($IDSORTEO == '')
      {
        $IDSORTEO = "Null";
      }
*/
      $i = 1;
      while($CantNumeros >= $i)
      {

            $SQL_sel = "SELECT UBICACION, IdNumero FROM Numeros WHERE IDSORTEO = $IDSORTEO AND UBICACION = $i ";
            //echo $SQL_sel;
				$resultado_sql = mssql_query($SQL_sel);
				list( $UBICACION, $IdNumero ) = mssql_fetch_array($resultado_sql);

				if($IdNumero > 0)
				{
					 $SQL_sel = "SELECT Numero FROM Numeros WHERE IdNumero = $IdNumero ";
					 //echo $SQL_sel ;
					 $resultado_sql = mssql_query($SQL_sel);
					 list( $Numeros ) = mssql_fetch_array($resultado_sql);
				}else
				{
			    	$Numeros = "";
				}
			//	echo $Numeros;
            if (strlen($Numeros) > 4 )
            {
				    echo " " . $i . "-" . substr($Numeros, -4) ;
				}else
				{
                echo " " . $i . "-" . $Numeros ;
				}
				$i++;
		}

      if ($Cmd_quiniela == 1)
      {
         $SQL_sel = "SELECT Letra from letras where idSorteo = $IDSORTEO AND Ubicacion = 1";
         $resultado_sql = mssql_query($SQL_sel);
         list( $Letra1 ) = mssql_fetch_array($resultado_sql);
         $SQL_se2 = "SELECT Letra from letras where idSorteo = $IDSORTEO AND Ubicacion = 2";
         $resultado_sql = mssql_query($SQL_se2);
         list( $Letra2 ) = mssql_fetch_array($resultado_sql);
         $SQL_se3 = "SELECT Letra from letras where idSorteo = $IDSORTEO AND Ubicacion = 3";
         $resultado_sql = mssql_query($SQL_se3);
         list( $Letra3 ) = mssql_fetch_array($resultado_sql);
         $SQL_se4 = "SELECT Letra from letras where idSorteo = $IDSORTEO AND Ubicacion = 4";
         $resultado_sql = mssql_query($SQL_se4);
         list( $Letra4 ) = mssql_fetch_array($resultado_sql);

		   echo " " . $Letra1 . $Letra2 . $Letra3 . $Letra4;

      }




}

?>
