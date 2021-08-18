<?php
  include 'coneccion.php';
  include 'configuracion.php';
  include 'web.php';

  $IdUsuario = $_POST['IdUsuario'];
  $Nombre = $_POST['Nombre'];
  $Apellido = $_POST['Apellido'];
  $Usuario = $_POST['Usuario'];
  $Contraseña = MD5($_POST['Nueva_pass_A']);

  $SQL_INS = "UPDATE  usuarios SET Nombre = '" . $Nombre . "',
                                   Apellido = '" . $Apellido . "',
											  Usuario = '" . $Usuario . "',
											  Contrasenia = '" . $Contraseña . "'";

  $resultado = mssql_query($SQL_INS);

  datos_tablaopen(' border="0" align="center" valign="top" height="150" ');
  		 datos_tablaRowsOpen(' align="center" ');
							  datos_tabladata( '<br>Se Ingreso correctamente al Usuario ' . $Usuario . '.<br>' , ' class="tituloMenu"  align="center" ');
		   datos_tablaRowsClose();
		 datos_tablaclose();

?>
