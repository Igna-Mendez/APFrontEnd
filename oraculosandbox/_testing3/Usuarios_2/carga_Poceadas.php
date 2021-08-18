<?php
    include 'coneccion.php';
    include 'configuracion.php';
    include 'web.php';
  
  
    $Cmd_Poseada = $_POST['Cmd_Poseada'];

  
    Pantalla_Cargo_poceados($Cmd_Poseada);
  /*
    $nro_Sorteo = $_POST['nro_Sorteo'];
    $Cmd_Poseada = $_POST['Cmd_Poseada'];
    $Cmd_Tip_poce = $_POST['Cmd_Tip_poce'];
    $dia  = $_POST['dia'];  
    $mes  = $_POST['mes'];  
    $anio = $_POST['anio']; 
    
    $fecha = "$anio-$mes-$dia";

    $sql_pose = "INSERT INTO sorteos_poceados (idTipoPoceado, idPoceado, fechaSorteo, nroSorteo )
                 VALUES ($Cmd_Tip_poce,$Cmd_Poseada, CAST (('$fecha 00:00:00') as smalldatetime) ,'$nro_Sorteo')";
     
    $resultado = mssql_query($sql_pose);
  
    Cargo_poceados($nro_Sorteo,$Cmd_Poseada, $Cmd_Tip_poce );
  */
?>    