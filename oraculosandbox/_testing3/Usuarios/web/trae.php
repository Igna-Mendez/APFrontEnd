<?php     
    //include("web.php");
    include("conexion.php");
   include("Lib_web.php");
    
   //include ('conexion.php');
  // include ('Lib_web.php');


    $proce = $_GET['proce'];
    
  	if ( $proce == '' )
     	$proce = $_POST['proce'];
  
  	if ( $proce != '#' )
  	{
  	  eval(" $proce ");
  	  
  	}   
                    
?>
