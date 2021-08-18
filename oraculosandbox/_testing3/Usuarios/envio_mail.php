<?php
    Include "coneccion.php";
    require_once "Mail.php";
    require_once "Mail/mime.php";

    $host = "smtp.oraculosemanal.com";
    $username = "mail@oraculosemanal.com";
    $password = "roytorres12";
    $port = "25";                          
    $from = "mail@oraculosemanal.com";
        
    if( $fecha1 == "")
    {
      $fecha = getdate();
      $anio = $fecha[year];
      $Mes = $fecha[mon];
      $dia =  $fecha[mday]; 
      $Fecha1 = $anio . '/' . $Mes . '/' . $dia ;
      $Fecha = " AND SP.fechaSorteo <= '" . $Fecha1 . "'" ;
      $Fecha2 = " AND fechaSorteo <= '" . $Fecha1 . "'" ;        
    }else
    {
      $Fecha = " AND SP.fechaSorteo <= '" . $fecha1 . "'" ;
      $Fecha2 = " AND fechaSorteo <= '" . $fecha1 . "'" ; 
    }    
    
      
     $sql = "SELECT SP.IdSorteoPoceado, SP.IdtipoPoceado, SP.idPoceado, SP.fechaSorteo, SP.NroSorteo, SP.pozo,P.Poceado, TP.TipoPoceado
               FROM Sorteos_Poceados SP
              INNER JOIN POCEADOS P ON ( SP.idPoceado = P.IdPoceado )  
               LEFT JOIN  TIPOS_POCEADOS TP ON ( TP.IdTipoPoceado = SP.IdtipoPoceado  )
              WHERE SP.FechaSorteo = (Select MAX(FechaSorteo) FROM Sorteos_Poceados where IdPoceado = $Cmd_Poseada  $Fecha2) 
                AND SP.IdPoceado = $Cmd_Poseada   $Fecha  
                order by SP.IdtipoPoceado asc ";
    // echo   $sql ;                      
     $resultado = mssql_query($sql);
     list( $IdSorteoPoceado, $IdtipoPoceado, $idPoceado, $fechaSorteo, $NroSorteo, $pozo, $Poceado ) = mssql_fetch_array($resultado);
   
     $subject = "Oraculosemanal.com - " . $Poceado . " Sorteo " . $NroSorteo  ;  

      $html = $Poceado . "<br>" . "SORTEO Nº " . $NroSorteo . " - FECHA: " . date("d/m/Y",strtotime($fechaSorteo)) ;           
                       
      $resultado = mssql_query($sql);       
      while($Datos = mssql_fetch_array($resultado) )
      {    
    
            $SQL_Cant = 'SELECT Count(numero)
                           FROM numeros_poceados
                          WHERE IdSorteoPoceado = '.  $Datos['IdSorteoPoceado']; 
            $rs_Conunt= mssql_query($SQL_Cant);
            list( $Count) = mssql_fetch_array($rs_Conunt);      
    
            If ( $Count > 0 )
            {
                  $html .= "<br><br>" . $Datos['TipoPoceado'] . "<br>";
      
                  $SQL_num = 'SELECT Ubicacion, numero, IdSorteoPoceado
                                FROM numeros_poceados
                               WHERE IdSorteoPoceado = '.  $Datos['IdSorteoPoceado'] .
                             ' ORDER by numero, Ubicacion '; 
                  $rs_numeros = mssql_query($SQL_num); 
                  $i =0 ;
                  
                  while($Datos_num = mssql_fetch_array($rs_numeros) )
                  { 
                     $i++;
                     $html .= $Datos_num['numero'] ;
                     if ($Count > $i)
                     {
                        $html .= " - ";
                     }                
                     
                  }   
               }
   
                 $SQL_PRemios = 'SELECT Aciertos, Ganadores, Monto, IdSorteoPoceado
                                   FROM Premios
                                  WHERE IdSorteoPoceado = '.  $Datos['IdSorteoPoceado'] . ' order by Aciertos desc';    
                 $rs_PRemios = mssql_query($SQL_PRemios);                         
                 $rs_PRemios2 = mssql_query($SQL_PRemios); 
                 if (mssql_num_rows($rs_PRemios2) > 0 )
                 {      
                    $html .= "<br><br>Resultados : <br>";

                    while($Datos_PRem = mssql_fetch_array($rs_PRemios) )
                    {          
                                /*
                        if (($Datos_PRem['Ganadores'] == "" ) or ($Datos_PRem['Ganadores'] == 0 ))
                        {
                           $ganadores = '0';
                        }else
                        {
                           $ganadores = $Datos_PRem['Ganadores'];
                        }     */
                        
                         $ganadores = $Datos_PRem['Ganadores'];  
                         $editado = number_format( $Datos_PRem['Monto'], 2, ",", ".");
                         $html .= $Datos_PRem['Aciertos'] . "&nbsp; Aciertos &nbsp;" . $ganadores .  "&nbsp;Ganadores&nbsp;&nbsp;C/u&nbsp;Cobran&nbsp;$&nbsp;" . $editado . "<br>";
                
                    }                      
                  } 
                            
      }      
    $sql = "SELECT MAIL FROM MAILS WHERE ACTIVO = 1 ";
    $resultado_sql = mssql_query($sql); 
    while($Datos = mssql_fetch_array($resultado_sql) )
    { 
      $to .= $Datos['MAIL'] . ", " ;
    }    

    $hdrs = array ('From' => $from, 'To' => $to, 'Subject' => $subject, );
    
    $mime = new Mail_mime(); 
    $mime->setTXTBody(strip_tags($html));
    $mime->setHTMLBody($html);
    
    $body = $mime->get();
    $hdrs = $mime->headers($hdrs); 
    
    $smtp = Mail::factory('smtp', array ('host' => $host, 'port' => $port, 'auth' => true,'username' => $username, 'password' => $password));
    
    $mail = $smtp->send($to, $hdrs, $body);

?>
