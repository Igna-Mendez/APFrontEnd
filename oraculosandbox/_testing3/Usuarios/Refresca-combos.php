<?php
  include("web.php");
  include("coneccion.php");
  include("Configuracion.php");
  
  $Cmd_Poseada = $_POST['Cmd_Poseada'];
  $Cmd_Tip_poce = $_POST['Cmd_Tip_poce'];
  $Pantalla = $_POST['Pantalla']; 
  
  if ($Pantalla == 1)
  {  
     $nro_Sorteo = $_POST['nro_Sorteo'];
     eval("Pantalla_Poceados(" . $nro_Sorteo . ", " . $Cmd_Poseada . ", " . $Cmd_Tip_poce . " );");
  }
  
  if ($Pantalla == 2)
  {  
      $Cant_cifras = $_POST['Cant_cifras'];
      $cant_premios = $_POST['cant_premios'];
     eval("Config_Poceada(" . $Cant_cifras . ", " . $cant_premios . ", " . $Cmd_Poseada . ", " . $Cmd_Tip_poce . " );");
  }
  
  if ($Pantalla == 3)
  {  
      $Cmd_Poseada = $_POST['Cmd_Poseada'];
      $Nombre_poce = $_POST['Nombre_poce'];
      $Cmd_Tip_poce = $_POST['Cmd_Tip_poce'];
     eval("Modificar_Tipo_Poceada(" . $Cmd_Poseada . ", '" . $Nombre_poce . "', " . $Cmd_Tip_poce . ");");
  } 
    
  if ($Pantalla == 4)
  {  
      $Cmd_Poseada = $_POST['Cmd_Poseada'];
     eval("Modificar_Poceada(" . $Cmd_Poseada . ");");
  } 
  
  if ($Pantalla == 5)
  {  
      $Cmd_quiniela = $_POST['Cmd_quiniela'];
     eval("Modificar_Loterias(" . $Cmd_quiniela . ");");
  } 
  
  if ($Pantalla == 6)
  {  
      $Cmd_Turno = $_POST['Cmd_Turno'];
     eval("Modificar_Turnos(" . $Cmd_Turno . ");");
  }
  
  if ($Pantalla == 7)
  {  
      $Cmd_Mail = $_POST['Cmd_Mail'];
     eval("Modif_Mails(" . $Cmd_Mail . ");");
  }
  
       
?>
