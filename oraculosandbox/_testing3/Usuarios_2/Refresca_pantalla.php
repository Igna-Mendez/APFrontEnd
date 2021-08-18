<?php
              
  include("web.php");
  include("coneccion.php");
  include("Configuracion.php");
  
  $dia = $_POST['dia'];
  $mes = $_POST['mes'];
  $anio = $_POST['anio'];
  //$fecha =   $dia ;
                                   
  $cifra = $_POST['cifra'];        
  $Cmd_turnos = $_POST['Cmd_turnos'];
  $Cmd_loterias1 = $_POST['Cmd_loterias1'];
  $Sorteo_1 = $_POST['Sorteo_1'];  
  $Cmd_loterias2 = $_POST['Cmd_loterias2'];
  $Sorteo_2 = $_POST['Sorteo_2'];
  
  
  eval("pantalla_cargoN(" . $dia . ", " . $mes . ", " . $anio . ", " . $cifra . ", " . $Cmd_turnos . ", " . $Cmd_loterias1 . ", " . $Sorteo_1 . ", " . $Cmd_loterias2 . ", " .  $Sorteo_2 . " );");

   
?>
