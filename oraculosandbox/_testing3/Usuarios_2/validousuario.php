<?php
    include 'coneccion.php';
  	include 'configuracion.php';
    include("web.php");
    
  
    $usu = $_POST['Usuario'];
    $pas = md5($_POST['Contrasenia']);

		$sql1=" SELECT IdTabla
		          FROM Usuarios
						 WHERE Usuario = '" . $usu . "'
						   AND Contrasenia = '" . $pas . "'";

    $resultado_usu1 = mssql_query($sql1);
    list( $IdUsuario) = mssql_fetch_array($resultado_usu1);
    if (mssql_num_rows($resultado_usu1) > 0 )
    {
        $sql3=" SELECT IdTabla
                  FROM Usuarios
                 WHERE Usuario = '" . $usu . "'
                   AND Contrasenia = '" . $pas . "'
                   AND FechaBaja IS NULL ";
        								 	
        $resultado_usu3 = mssql_query($sql3);
        if (mssql_num_rows($resultado_usu3) > 0 )
        {
            list( $IdUsuario) = mssql_fetch_array($resultado_usu3);
            if ($_POST['param'] == 1)
            {
            		$sql_upd = "UPDATE Usuarios SET FechaUltimaEntrada = getdate() WHERE IdTabla = $IdUsuario";            		
            	  $result = mssql_query($sql_upd,$conn) or die("Imposible consultar la tablas de usuario, intentelo mas tarde"); 


            }
        }else
        {
        			$mensaje = "El Usuario esta dado de baja.";
        }
		}else
		{
       $mensaje = "El nombre de usuario o la contrase&#324;a son incorectos.";
		}
		
    Valido_usuario($resultado_usu3, $IdUsuario, $mensaje);

?>
