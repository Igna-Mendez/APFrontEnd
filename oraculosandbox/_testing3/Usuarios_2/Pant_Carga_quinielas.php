<?php
    include 'coneccion.php';
    include 'configuracion.php';
    include 'web.php';
  
    $Fecha  = $_POST['Fecha'];
    $cantQuinielas  = $_POST['cantQuinielas'];
    
    $Cmd_quiniela_1 = $_POST['Cmd_quiniela_1'];
    $Cmd_turnos_1   = $_POST['Cmd_turnos_1'];
    $Sorteo_1       = $_POST['Sorteo_1'];
    
    $Cmd_quiniela_2 = $_POST['Cmd_quiniela_2'];
    $Cmd_turnos_2   = $_POST['Cmd_turnos_2'];
    $Sorteo_2       = $_POST['Sorteo_2'];
    
    $Cmd_quiniela_3 = $_POST['Cmd_quiniela_3'];
    $Cmd_turnos_3   = $_POST['Cmd_turnos_3'];
    $Sorteo_3       = $_POST['Sorteo_3'];
    
    $Cmd_quiniela_4 = $_POST['Cmd_quiniela_4'];
    $Cmd_turnos_4   = $_POST['Cmd_turnos_4'];
    $Sorteo_4       = $_POST['Sorteo_4'];


    Carga_Quinielas($Fecha, $cantQuinielas, $Cmd_quiniela_1, $Cmd_turnos_1, $Sorteo_1,$Cmd_quiniela_2, $Cmd_turnos_2, $Sorteo_2, $Cmd_quiniela_3, $Cmd_turnos_3, $Sorteo_3, $Cmd_quiniela_4, $Cmd_turnos_4, $Sorteo_4);

?>    