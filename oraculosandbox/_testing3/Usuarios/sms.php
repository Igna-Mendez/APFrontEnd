<?php

  include 'coneccion.php';
  include 'configuracion.php';
  include 'web.php';
  

   $dia = $_GET["dia"]; 
   $mes = $_GET["mes"]; 
   $anio = $_GET["anio"]; 

   $fecha = $mes.'/'.$dia.'/'.$anio ;
   $Cmd_quiniela = $_GET["Cmd_quiniela"]; 
   
          
    echo '<table class="egt"> ';
    echo '   <tr> ';
    
    
    $SQL_sel = "SELECT CantNumeros, CantCifras FROM config_quiniela WHERE IdQuiniela = $Cmd_quiniela ";
    $resultado_sql = mssql_query($SQL_sel);
    list( $CantNumeros, $CantCifras ) = mssql_fetch_array($resultado_sql);
    
    if($Sorteo == 0)
    {
       $Sorteo = "";
    }

      //$SQL_sel = "SELECT IDSORTEO FROM sorteos WHERE FECHASORTEO = CAST (('$fecha 00:00:00') as smalldatetime) AND NroSorteo = '" . $Sorteo . "' AND IDQUINIELA = $Cmd_quiniela AND Turno = $Cmd_turnos ";
      //$SQL_sel = "SELECT IDSORTEO FROM sorteos WHERE FECHASORTEO = CAST (('$fecha 00:00:00') as smalldatetime) AND NroSorteo = '" . $Sorteo . "' AND IDQUINIELA = $Cmd_quiniela AND Turno = '$Turno' ";
    $SQL_sel = "SELECT IDSORTEO, TURNO FROM sorteos WHERE FECHASORTEO = CAST (('$fecha 00:00:00') as smalldatetime) AND IDQUINIELA = $Cmd_quiniela ";

    $resultado_sql = mssql_query($SQL_sel);
	while($Datos = mssql_fetch_array($resultado_sql) )
	{
           $IDSORTEO = $Datos['IDSORTEO'];
           $TURNO    = $Datos['TURNO'];
           
           echo '   <td valign="top" >';
           echo '    <table class="egt" >';
           echo '       <tr> ';
           echo '          <td> *'.$TURNO.'* </td>  ';
           echo '       </tr> ';

            $i = 1;
            $num = '';
            while($CantNumeros >= $i)
            {
                 $SQL_sel2 = "SELECT UBICACION, IdNumero FROM Numeros WHERE IDSORTEO = $IDSORTEO AND UBICACION = $i ";
                  //echo $SQL_sel;
                   
                  $resultado_sql2 = mssql_query($SQL_sel2);
                  list( $UBICACION, $IdNumero ) = mssql_fetch_array($resultado_sql2);
                  
                  if($IdNumero > 0)
                  {
                      $SQL_sel3 = "SELECT Numero FROM Numeros WHERE IdNumero = $IdNumero ";
                      //echo $SQL_sel ;
                      $resultado_sql3 = mssql_query($SQL_sel3);
                      list( $Numeros ) = mssql_fetch_array($resultado_sql3);
                  }else
                  {
                      $Numeros = "";
                  }
                  //	echo $Numeros;
                  if (strlen($Numeros) > 4 )
                  {
                      $num = " " . $i . "-" . substr($Numeros, -4) . "<br>";
                      echo '<tr><td>'.$num.'</td></tr>';
                  }else
                  {
                      $num = " " . $i . "-" . $Numeros . "<br>";
                      echo '<tr><td>'.$num.'</td></tr>';
                  }
                  $i++;
                  
                 
            }


            if ($Cmd_quiniela == 1)
            {
               $SQL_sela = "SELECT Letra from letras where idSorteo = $IDSORTEO AND Ubicacion = 1";
               $resultado_sqla = mssql_query($SQL_sela);
               list( $Letra1 ) = mssql_fetch_array($resultado_sqla);
               
               $SQL_seb = "SELECT Letra from letras where idSorteo = $IDSORTEO AND Ubicacion = 2";
               $resultado_sqlb = mssql_query($SQL_seb);
               list( $Letra2 ) = mssql_fetch_array($resultado_sqlb);
               
               $SQL_sec = "SELECT Letra from letras where idSorteo = $IDSORTEO AND Ubicacion = 3";
               $resultado_sqlc = mssql_query($SQL_sec);
               list( $Letra3 ) = mssql_fetch_array($resultado_sqlc);
               
               $SQL_sed = "SELECT Letra from letras where idSorteo = $IDSORTEO AND Ubicacion = 4";
               $resultado_sqld = mssql_query($SQL_sed);
               list( $Letra4 ) = mssql_fetch_array($resultado_sqld);
      
      		  // echo " " . $Letra1 ." " . $Letra2 ." " . $Letra3 ." " . $Letra4 . "<br>";
               //echo "<td>  " . $Letra1 ." " . $Letra2 ." " . $Letra3 ." " . $Letra4 . "</td> "; 
               echo '<tr><td>'  . $Letra1 ." " . $Letra2 ." " . $Letra3 ." " . $Letra4 . '</td></tr>'; 
      
            }      
            
           echo '    </table>';   
           echo '  </td>';    
           //   echo "<br><br><br>";
  
           //echo $CantNumeros;
    
    
     }  
     
     echo '   </tr> ';
     echo '</table>';
     
?>