<?php
              
  include("web.php");
  include("coneccion.php");
  include("Configuracion.php");
  
  $dia = $_POST['dia'];
  $mes = $_POST['mes'];
  $anio = $_POST['anio'];
      
  eval("Resultados($dia, $mes, $anio );");
    
?>

