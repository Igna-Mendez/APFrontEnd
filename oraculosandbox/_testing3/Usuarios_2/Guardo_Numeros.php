<?php
  
  include 'coneccion.php';
  include 'configuracion.php';
  include 'web.php';

  $array_variables = $_POST["param"];
  parse_str($array_variables);
  
  if($Sorteo == 0)
  {
    $Sorteo = "";
  }
  $SQL_sel = "SELECT Turno FROM Turnos WHERE IdTabla = $Cmd_turnos";
  $resultado_sql = mssql_query($SQL_sel);
  list( $Turno ) = mssql_fetch_array($resultado_sql);

  $sql = "SELECT IdSorteo FROM Sorteos WHERE NroSorteo = '$Sorteo' AND IdQuiniela = $Cmd_quiniela AND FECHASORTEO = CAST (('$fecha 00:00:00') as smalldatetime) AND turno = '$Turno' ";
  
  $resultado = mssql_query($sql);
     
  if(mssql_num_rows($resultado) <= 0 )
  {
        
    $Sql_Ins_Sort ="INSERT INTO Sorteos (NroSorteo, FechaSorteo, IdQuiniela, TURNO, CANTCIFRAS  ) 
                      VALUES ( '$Sorteo', $fecha, $Cmd_quiniela, '$Turno', 0 )";
    $resultado = mssql_query($Sql_Ins_Sort);
  
  }
  
  $resultado2 = mssql_query($sql);
  list( $IdSorteo ) = mssql_fetch_array($resultado2);      
    
  $SQL_sel = "SELECT CantNumeros FROM config_quiniela WHERE IdQuiniela = $Cmd_quiniela ";
  $resultado_sql = mssql_query($SQL_sel);
  list( $CantNumeros ) = mssql_fetch_array($resultado_sql);
  
  $i = 0; 
  $t = 1;   
  while (($CantNumeros - 1) >= $i )
  {  
      $SQL_sel = "SELECT IDNUMERO FROM numeros WHERE IDSORTEO = $IdSorteo AND UBICACION = $t ";
      $resultado_sql = mssql_query($SQL_sel);
      list( $IDNUMERO  ) = mssql_fetch_array($resultado_sql); 
      
      if( $IDNUMERO <= 0)
      {
         $sql_inst = "INSERT INTO numeros ( IdSorteo, Ubicacion, Numero )
                       VALUES ( $IdSorteo , $puesto[$i], '$numero[$i]'  )";
         $resultado = mssql_query($sql_inst);
         

      }else
      {
         $sql_update = "UPDATE numeros SET numero = '$numero[$i]' 
                          WHERE IDNUMERO  = $IDNUMERO  ";
         $resultado = mssql_query($sql_update);
      }     
      $i++;
      $t++;
  } 
  
  if($Cmd_quiniela == 1 )
  {
      $SQL_sel = "SELECT idSorteo FROM letras WHERE IDSORTEO = $IdSorteo ";
      
      $resultado_sql = mssql_query($SQL_sel);
      list( $idSorteo2  ) = mssql_fetch_array($resultado_sql);  
  
      If($idSorteo2 <= 0)
      {
          $sql_inst1 = "INSERT INTO letras ( Letra, Ubicacion, idSorteo ) VALUES ( '$Letra1', 1 ,$IdSorteo )";
          $resultado = mssql_query($sql_inst1);  
          $sql_inst2 = "INSERT INTO letras ( Letra, Ubicacion, idSorteo ) VALUES ( '$Letra2', 2 ,$IdSorteo )";
          $resultado = mssql_query($sql_inst2);    
          $sql_inst3 = "INSERT INTO letras ( Letra, Ubicacion, idSorteo ) VALUES ( '$Letra3', 3 ,$IdSorteo )";
          $resultado = mssql_query($sql_inst3);  
          $sql_inst4 = "INSERT INTO letras ( Letra, Ubicacion, idSorteo ) VALUES ( '$Letra4', 4 ,$IdSorteo )";
          $resultado = mssql_query($sql_inst4);
      }Else
      {
          $SQL_UPD1 = "UPDATE letras SET Letra = '$Letra1' WHERE idSorteo = $IdSorteo AND Ubicacion = 1 ";
          $resultado = mssql_query($SQL_UPD1);  
          $SQL_UPD2 = "UPDATE letras SET Letra = '$Letra2' WHERE idSorteo = $IdSorteo AND Ubicacion = 2 ";
          $resultado = mssql_query($SQL_UPD2);
          $SQL_UPD3 = "UPDATE letras SET Letra = '$Letra3' WHERE idSorteo = $IdSorteo AND Ubicacion = 3 ";
          $resultado = mssql_query($SQL_UPD3);
          $SQL_UPD4 = "UPDATE letras SET Letra = '$Letra4' WHERE idSorteo = $IdSorteo AND Ubicacion = 4 ";
          $resultado = mssql_query($SQL_UPD4);      
      }          
  
  }
  
  If ($cbCorreo == "checkbox" )
  {
     $fecha1  = $fecha;
     Include "envio_mail_quinielas.php";
  }
  
  if($Quiniela == 1)
  {
    quiniela_1($Cmd_quiniela, $Cmd_turnos, $Sorteo, $fecha );
  }
  
  if($Quiniela == 2)
  {
    quiniela_2($Cmd_quiniela, $Cmd_turnos, $Sorteo, $fecha );
  }
  
  if($Quiniela == 3)
  {
    quiniela_3($Cmd_quiniela, $Cmd_turnos, $Sorteo, $fecha );
  }
  
  if($Quiniela == 4)
  {
    quiniela_4($Cmd_quiniela, $Cmd_turnos, $Sorteo, $fecha );
  }
        
?>
