<?php

   include 'coneccion.php';
   include 'configuracion.php';
   include 'web.php';
   $idSort_poceados = $_POST['idSort_poceados'];

    $SQL_cont_cartones = "SELECT COUNT(IDSORTEOPOCEADO) FROM CARTONES WHERE IDSORTEOPOCEADO = $idSort_poceados ";
   // echo $SQL_cont_cartones . "<br>";
    $resultado_sql = mssql_query($SQL_cont_cartones);
    list( $CANT ) = mssql_fetch_array($resultado_sql);
    if ( 0 < $CANT )
    {
		 $delete_cartones = "DELETE FROM CARTONES WHERE IDSORTEOPOCEADO = $idSort_poceados";
	  //  echo $delete_cartones . "<br>";
		//Ejecutar delete
	 }

	 $SQL_cont_premios = "SELECT COUNT(IDSORTEOPOCEADO) FROM PREMIOS WHERE IDSORTEOPOCEADO = $idSort_poceados ";
	 ///echo $SQL_cont_premios . "<br>";
    $resultado_sql = mssql_query($SQL_cont_premios);
    list( $CANT ) = mssql_fetch_array($resultado_sql);
    if ( 0 < $CANT )
    {
		 $delete_numeros = "DELETE FROM PREMIOS WHERE IDSORTEOPOCEADO = $idSort_poceados ";
       //echo $delete_numeros . "<br>";
      //Ejecutar delete
	 }

	 $SQL_cont_num_poceados = "SELECT COUNT(IdSorteoPoceado) FROM NUMEROS_poceados where IdSorteoPoceado = $idSort_poceados ";
	 //echo $SQL_cont_num_poceados . "<br>";
    $resultado_sql = mssql_query($SQL_cont_num_poceados);
    list( $CANT ) = mssql_fetch_array($resultado_sql);
    if ( 0 < $CANT )
    {
		 $delete_numeros = "DELETE FROM NUMEROS_poceados WHERE IdSorteoPoceado = $idSort_poceados  ";
      // echo $delete_numeros . "<br>";
      //Ejecutar delete
	 }
	 
	 $delete_Sorteo = "DELETE FROM sorteos_poceados where IdSorteoPoceado = $idSort_poceados ";
	 //echo $delete_Sorteo . "<br>";
	 //Ejecutar delete
	 
    Pantalla_Modif_Poceados();
?>
