<?php

  include 'coneccion.php';
  include 'configuracion.php';
  include 'web.php';
  
  $array_variables = $_POST["param"];
  parse_str($array_variables);

	$sql2 = " SELECT count(*) as Hasta FROM sorteo_publicado ";
	$resultado = mssql_query($sql2);
	list( $hasta) = mssql_fetch_array($resultado);

  $i = 0;
  $fechas = $fecha[0];

  $sql1 = " SELECT count(*) as Hasta FROM sorteo_publicado ";
  $resultado1 = mssql_query($sql1);
  list( $fecha_max) = mssql_fetch_array($resultado1);


  
  
  
  
  
  while ($i < $hasta )
  {
		$sql = "UPDATE sorteo_publicado
		           SET matutina = '$matutina[$i]',
					      vespertina = '$vespertina[$i]',
							nocturna = '$nocturna[$i]',
							losprimeros = '$primeros[$i]',
							fecha = '$fechas'
					WHERE idQuinielaP = '$idQuinielaP[$i]' ;";
//echo $sql . "<br>";
		$Fecha =  $fecha[0];
      $rs = mssql_query($sql);
	   $i++;
  }
  $sql_2 = "UPDATE configuraciones SET valor = '$Fecha' where configuracion = 'ultimoSorteoPublicado'";
  $rs = mssql_query($sql_2);
  
  grilla_sorteos_cabecera(0);

?>
