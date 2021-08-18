<?php
		
  /*  
    $BDD_Servidor="localhost";
		$BDD_Usuario="root";
		$BDD_Pass ="";
	  $BDD_Nombre_Base ="Loterias";

		//conecto con la base de datos
		$conn = mysql_connect($BDD_Servidor,$BDD_Usuario,$BDD_Pass) or die("Disculpas! Hubo un error al procesar lo solicitado. Por favor, inténtalo nuevamente en unos minutos.");
		//selecciono la BBDD
		mysql_select_db($BDD_Nombre_Base,$conn) or die("Error al conectarce a la base de datos. \n Por favor, inténtalo nuevamente en unos minutos.");
		
		
		$BDD_Servidor="localhost";
		$BDD_Usuario="oraculosemanal";
		$BDD_Pass ="sa89ct23e";
	  $BDD_Nombre_Base ="oraculosemanal";
	*/
		$BDD_Servidor="localhost";
		$BDD_Usuario="pabloseb_oraculosemanal";
		$BDD_Pass ="a4gh56khg";
	  $BDD_Nombre_Base ="pabloseb_oraculosemanal";
	 
	 
		$conn = mssql_connect($BDD_Servidor,$BDD_Usuario,$BDD_Pass) or die("Disculpas! Hubo un error al procesar lo solicitado. Por favor, inténtalo nuevamente en unos minutos.");
    mssql_select_db($BDD_Nombre_Base,$conn) or die("Error al conectarce a la base de datos. \n Por favor, inténtalo nuevamente en unos minutos.");
  

?>
