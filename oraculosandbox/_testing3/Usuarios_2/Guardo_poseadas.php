<?php
   
   include 'coneccion.php';
   include 'configuracion.php';
   include 'web.php';
    
   $array_variables = $_POST["param"];
   parse_str($array_variables);
  
   $fecha = "$anio-$mes-$dia";
   
   
   If( $nro_Sorteo != "" )
   {
      $busqueda =  " AND nroSorteo = '$nro_Sorteo' ";
   } else
   {
      $busqueda =  " AND fechaSorteo = CAST (('$fecha 00:00:00') as smalldatetime) ";   
   }

   $SQL_Sel_A = "SELECT idSorteoPoceado FROM sorteos_poceados WHERE IdPoceado = $Cmd_Poseada  $busqueda ";
   $rs = mssql_query($SQL_Sel_A);
   list( $idSorteoPoceado_A ) = mssql_fetch_array($rs);
   
   If ( $idSorteoPoceado_A > 0)
   {
		   Pantalla_Poceados();
		   
       datos_tablaopen(' border="0" align="center" valign="top"  width="405" ');
           datos_tablaRowsOpen(' align="center" ');
              datos_tabladata('La Loteria poceada ya existe.' , ' class="tituloMenu"  align="center" ');
           datos_tablaRowsClose();
       datos_tablaclose();     
   }else
   {
       
       
       $sql = "SELECT IdTipoPoceada, CantNumeros, cantPuestos  FROM config_poceada WHERE IdPoceada = $Cmd_Poseada ";
       $resultado_sql = mssql_query($sql);
       
       $resultado_sql2 = mssql_query($sql);
       
       $j=1;
       $t=0;
       $k=0;
       $d=0; 
       $cant = mssql_num_rows($resultado_sql);
       while( $cant >= $j )
       {                                       
       
          list( $IdTipoPoceada, $CantNumeros, $cantPuestos) = mssql_fetch_array($resultado_sql2);
              
          
          $sql_insert = "INSERT INTO sorteos_poceados ( idTipoPoceado, idPoceado, fechaSorteo, nroSorteo ) 
                          VALUES ( $IdTipoPoceada, $Cmd_Poseada , CAST (('$fecha 00:00:00') as smalldatetime), '$nro_Sorteo' );";
          //echo  $sql_insert;
          $resultado = mssql_query($sql_insert);
                                                                          
          $sql_sel = "SELECT MAX(idSorteoPoceado) 
                         FROM sorteos_poceados 
                        WHERE IDTipoPoceado = $IdTipoPoceada
                          AND idPoceado = $Cmd_Poseada 
                          AND nroSorteo = $nro_Sorteo ";                             
          $resultado_sql = mssql_query($sql_sel);
          list( $idSorteoPoceado) = mssql_fetch_array($resultado_sql);        
        
          $i = 0;           
          while (($CantNumeros  - 1) >= $i )
          {  
              
            $sql_inst1 = "INSERT INTO numeros_poceados ( idSorteoPoceado, ubicacion, numero )
                         VALUES ( $idSorteoPoceado , " . ($i + 1) . " , '$numero[$t]'  ); ";            
            $resultado = mssql_query($sql_inst1);
         //    echo  $sql_inst1;
             $i++;
             $t++;
          
          } 
          
          $i = 0;   
          
          while (($cantPuestos - 1) >= $i )
          { 
                            
              //if(($aciertos[$k] <> "" ) AND ( $ganan <> "" ) AND ( $montos <> "" ) )
              if($IdTipoPoceada == 26)
              {
                 $sql_inst = "INSERT INTO Cartones  ( idSorteoPoceado,  Numero_carton, lugar )
                              VALUES ( $idSorteoPoceado ,  '$Numero_carton[$d]', '$lugar[$d]'  ); ";
    //              echo $sql_inst;  
                 $resultado = mssql_query($sql_inst);                
              
                 $d++;
              }else
              {
                  if($IdTipoPoceada == 36)
                  {
                     $sql_inst = "INSERT INTO Cartones  ( idSorteoPoceado,  Numero_carton, lugar, importe )
                                  VALUES ( $idSorteoPoceado ,  '$Numero_carton[$d]', '$lugar[$d]' , '$Valor[$d]' ); ";
        //              echo $sql_inst;  
                     $resultado = mssql_query($sql_inst);                
                  
                     $d++;
                  }else
                  {              
                      if ((  trim($ganadores[$k]) == '') or ( is_null( $ganadores[$k] )) )
                      {
                         $ganan = '0';
                      }else
                      {
                         $ganan = $ganadores[$k] ;
                      } 
                      $montos = str_replace(",","",$premios[$k]);
                      if(trim($montos) == "")
                      {
                         $montos = 0;
                      } 
                      if(trim($aciertos[$k]) == "")
                      {
                         $acierto = 0;
                      }else
                      {
                         $acierto = $aciertos[$k];
                      }                 
                     $sql_inst = "INSERT INTO premios  ( idSorteoPoceado, aciertos, ganadores, monto )
                                  VALUES ( $idSorteoPoceado , $aciertos[$k] , $ganan , $montos  ); ";
                    //  echo $sql_inst;  
                     $resultado = mssql_query($sql_inst);                             
                 // echo $sql_inst;
                     $k++;    
                  }
              }
              $i++;   
          }   
         
          $j++;         
       }
        
        If ($cbCorreo == "checkbox" )
        {
            session_start();
            $_SESSION['IdPoceado'] = $Cmd_Poseada;
            $_SESSION['fecha'] = $fecha;
            $fecha1  = $fecha;
            Include "envio_mail.php";
        }
        
        Pantalla_Poceados();
        
        datos_tablaopen(' border="0" align="center" valign="top"  width="405" ');
           datos_tablaRowsOpen(' align="center" ');
               datos_tabladata('Se han cargado los datos de la loteria.' , ' class="tituloMenu"  align="Center" ');
           datos_tablaRowsClose();
        datos_tablaclose();        
         
    }
    
?>