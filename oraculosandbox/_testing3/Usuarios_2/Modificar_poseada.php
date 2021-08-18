<?php
   
   include 'coneccion.php';
   include 'configuracion.php';
   include 'web.php';
    
   $array_variables = $_POST["param"];
   parse_str($array_variables);

   $fecha = "$anio-$mes-$dia";

   $sql = "SELECT IdTipoPoceada, CantNumeros, cantPuestos  FROM config_poceada WHERE IdPoceada = $Cmd_Poseada ";
   $resultado_sql = mssql_query($sql);   
   $resultado_sql2 = mssql_query($sql);
   
   $j=1;
   $t=0;
   $k = 0;
   $d=0; 
   $cant = mssql_num_rows($resultado_sql);
   while( $cant >= $j )
   {                                       
    
      list( $IdTipoPoceada, $CantNumeros, $cantPuestos) = mssql_fetch_array($resultado_sql2);
     
      $Sql_UPd3 = "UPDATE sorteos_poceados SET nroSorteo = '" . $nro_Sorteo . "', fechaSorteo =  CAST (('$fecha 00:00:00') as smalldatetime)
                    WHERE IdTipoPoceado = $IdTipoPoceada
                      AND IdPoceado  =  $Cmd_Poseada
                      AND NroSorteo = '$nro_Sorteo' ";                        
      //echo  $Sql_UPd3 ;    
      $resultado = mssql_query($Sql_UPd3);
        
      $idTpos = 26;
      if( Trim($IdTipoPoceada) == $idTpos)
      {
          $i = 0;   
          while (($cantPuestos  - 1) >= $i )
          {     
             $luga = ucfirst( strtolower( Trim( $lugar[$d] )));
             $Sql_UPd = "UPDATE CARTONES SET Numero_carton = '$Numero_carton[$d]', lugar = '$luga' WHERE Id_tabla = $Id_tabla[$d] ";                        
             echo  $Sql_UPd ;
             $resultado = mssql_query($Sql_UPd);
             $i++;
             $d++;
          }       
      }else
      {   
            $idTpos3 = 36;
            if( Trim($IdTipoPoceada) == $idTpos3)
            {
                $i = 0;   
                while (($cantPuestos - 1) >= $i )
                {     
                   $luga = ucfirst( strtolower( Trim( $lugar[$d] )));
                   $Sql_UPd = "UPDATE CARTONES SET Numero_carton = '$Numero_carton[$d]', lugar = '$luga', importe = '$Valor[$d]' WHERE Id_tabla = $Id_tabla[$d] ";                        
                   //echo  $Sql_UPd ;
                   $resultado = mssql_query($Sql_UPd);
                   $i++;
                   $d++;
                }       
            }else
            {        
            
            
                $i = 0;   
                while (($CantNumeros  - 1) >= $i )
                {     
                  $Sql_UPd = "UPDATE numeros_poceados SET numero = '" . $numero[$t] . "' WHERE IdNumeroPoceado = $idnumero[$t] ";                        
                  //echo  $Sql_UPd ;
                  $resultado = mssql_query($Sql_UPd);
                  $i++;
                  $t++;
                } 
                   
                $i = 0;   
                while (($cantPuestos - 1) >= $i )
                { 
                    if ((  $ganadores[$k] == '') or ( is_null( $ganadores[$k] )) )
                    {
                       $ganan = '0';
                    }else
                    {
                       $ganan = $ganadores[$k] ;
                    } 
                    $montos = str_replace(",","",$premios[$k]);
                    if($montos == "")
                    {
                       $montos = 0;
                    }                                                    
                    if($aciertos[$k] == "")
                    {
                       $acierto = 0;
                    }else
                    {
                       $acierto = $aciertos[$k];
                    }        
                    $sql_UPD2 = "UPDATE premios SET aciertos = $acierto , ganadores = $ganan, monto = $montos WHERE IDPREMIO = $IDPREMIO[$k] ";
                    $resultado = mssql_query($sql_UPD2);                             
                    //echo $sql_UPD2;
                    $k++;
                    $i++;
                }       
             }
       }
      $j++;         
   }
   
  If ($cbCorreo == "checkbox" )
  {
     Include "envio_mail.php";
  }
  
   Pantalla_Modif_Poceados();   
   datos_tablaopen(' border="0" align="center" valign="top"  width="405" ');
      datos_tablaRowsOpen(' align="center" ');
          datos_tabladata('Se han Modificado los datos de la Poceada.' , ' class="tituloMenu"  align="Center" ');
      datos_tablaRowsClose();
   datos_tablaclose();        
    
?>   