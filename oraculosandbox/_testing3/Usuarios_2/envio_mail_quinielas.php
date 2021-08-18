<?php
    Include "coneccion.php";
    require_once "Mail.php";
    require_once "Mail/mime.php";
    
    $host = "smtp.oraculosemanal.com";
    $username = "mail@oraculosemanal.com";
    $password = "roytorres12";
    $port = "25";                          
    $from = "mail@oraculosemanal.com";
       
    $SQL_SEL = "SELECT Q.QUINIELA, S.IDQUINIELA, S.TURNO, S.FECHASORTEO FROM SORTEOS S, Quinielas Q
                 WHERE S.IDQUINIELA = Q.IDQUINIELA 
                   AND IDSORTEO = $IdSorteo";
    $rs = mssql_query($SQL_SEL);
    list( $Quiniela, $IDQUINIELA, $TURNO, $FECHASORTEO ) = mssql_fetch_array($rs);    
    
    $subject = "Oraculosemanal.com - QUINIELA " . $Quiniela . " " . $TURNO . " " . date("d/m/Y",strtotime($FECHASORTEO)) ;
    
    $html = " QUINIELA " . $Quiniela . " " . $TURNO . "  Fecha: " . date("d/m/Y",strtotime($FECHASORTEO)) . "<br><br>";
     
    $sql = "SELECT NUMERO, UBICACION FROM Numeros WHERE IDSORTEO = $IdSorteo Order by UBICACION ";
    $resultado_sql = mssql_query($sql); 
    while($Datos = mssql_fetch_array($resultado_sql) )
    {                                                
      $html .= $Datos['UBICACION'] . ".- " . $Datos['NUMERO'] . "<br>" ;
    }                                                        
    
    If($IDQUINIELA == 1)
    {
        $sql = "SELECT LETRA FROM LETRAS WHERE IDSORTEO = $IdSorteo ORDER BY UBICACION ";
        $resultado_sql = mssql_query($sql); 
        $i = 1;
        while($Datos = mssql_fetch_array($resultado_sql) )
        { 
          $letras .= $Datos['LETRA'] ;
          If($i < 4) 
          { 
            $letras .=  " - " ;
          }
          $i++;
        }               
        $html .= "<br> Letras : " . $letras . "<br>";        
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
