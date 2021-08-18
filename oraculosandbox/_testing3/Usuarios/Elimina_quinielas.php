<?php

   include 'coneccion.php';
   include 'configuracion.php';
   include 'web.php';
   
   $ID_Sorteo = $_POST['IDSORTEO'];

    $SQL_cont_letras = "SELECT COUNT(IDLETRA) AS CANT FROM LETRAS WHERE IDSORTEO = $ID_Sorteo ";
  //  echo $SQL_cont_letras . "<br>";
    $resultado_sql = mssql_query($SQL_cont_letras);
    list( $CANT ) = mssql_fetch_array($resultado_sql);
    if ( 0 < $CANT )
    {
		 $delete_letras = "DELETE FROM LETRAS WHERE IDSORTEO = $ID_Sorteo";
	//	 echo $delete_letras . "<br>";
  	    $rs = mssql_query($delete_letras);
		//Ejecutar delete
	 }
	 
	 $SQL_cont_numeros = "SELECT COUNT(IDNUMERO) AS CANT FROM NUMEROS WHERE IDSORTEO = $ID_Sorteo ";
	 //echo $SQL_cont_numeros . "<br>";
    $resultado_sql = mssql_query($SQL_cont_numeros);
    list( $CANT ) = mssql_fetch_array($resultado_sql);
    if ( 0 < $CANT )
    {
		 $delete_numeros = "DELETE FROM NUMEROS WHERE IDSORTEO = $ID_Sorteo ";
      // echo $delete_numeros . "<br>";
      $rs = mssql_query($delete_numeros);
      //Ejecutar delete
	 }
	 
	 $delete_Sorteo = "DELETE FROM SORTEOs where IDSORTEO = $ID_Sorteo ";
	 //echo $delete_Sorteo . "<br>";
	 $rs = mssql_query($delete_Sorteo);
	 //Ejecutar delete

    pantalla_Quiniela();
?>
