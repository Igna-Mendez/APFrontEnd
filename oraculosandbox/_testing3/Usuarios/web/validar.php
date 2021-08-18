<?PHP

   include ('conexion.php');
   include ('Lib_web.php');

	//$Mail = $_POST['email'];
   $Codigo = $_POST['codigo'];
/*
	$sql1=" SELECT Clien_ID, Nombre
	 			 FROM clientes
				WHERE Mail = '" . $Mail . "'
				  AND Fe_baja IS NULL ";

  $resultado_usu1 = mssql_query($sql1);
  $resultado_usu3 = $resultado_usu1;
  list( $IdUsuario) = mysql_fetch_array($resultado_usu1);
  if (mysql_num_rows($resultado_usu1) > 0 )
  {
  */
   	 // echo "Etty.";
	//			  exit();
	  $sql2 = "Select Clien_ID from clientes where Codigo = '". $Codigo . "';" ;
echo $sql2;
	  $res_usu = mysql_query($sql2);
     //list( $valor ) = mysql_fetch_array($res_usu);
	  //if ($valor == 1)
	         
	  list( $IdUsuario) = mysql_fetch_array($res_usu);
	  if (mysql_num_rows($res_usu) > 0 )
	  {
			  $sql3 = "Select count(1) from clientes where Clien_ID = $IdUsuario and (Maquina = '". gethostbyaddr($_SERVER['REMOTE_ADDR']) ."' or Maquina is null ) " ;
			  $res_usu = mysql_query($sql3);
		     list( $valor ) = mysql_fetch_array($res_usu);
			  if ($valor == 1)
			  {
	           	$SQL_UPD = "UPDATE clientes SET Maquina = '". gethostbyaddr($_SERVER['REMOTE_ADDR']) ."' WHERE Clien_ID = $IdUsuario";
		         $resultado = mysql_query($SQL_UPD);
            // echo "entró";
      
                buscador_numero();
                //exit;
			  } else
			  {
				  $msn = "El dispositivo no está permitido para el ingreso.";
				  login($msn);
				 // exit();
			  }
	  

	  }else
	  {
		  $msn = "codigo incorrecto";
		  login($msn);
		  //exit();
	  }
/*  }else
  {
	  echo "Arafue";
  }
  */
?>
