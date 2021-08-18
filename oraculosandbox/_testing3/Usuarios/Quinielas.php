<?php
    include 'coneccion.php';
    include 'configuracion.php';
    include 'web.php';
  
  
    $cantQuinielas = $_POST['cantQuinielas'];
    $dia = $_POST['dia'];
    $mes = $_POST['mes'];
    $anio = $_POST['anio'];
    
    $fecha = "$anio-$mes-$dia";


    Quinielas($cantQuinielas, $fecha);

?>    