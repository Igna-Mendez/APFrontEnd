<?PHP

	function mostrar_meta ()
	{
    
    echo ' <meta http-equiv="Content-Type" content="text/html" charset="iso-8859-1" />';
		echo ' <link rel="stylesheet" href="http://www.oraculosemanal.com/_testing3/usuarios/style.css" type="text/css" >';
	  echo ' <script src="http://www.oraculosemanal.com/_testing3/usuarios/prototype-1.6.0.2.js" type="text/javascript"></script>';
	  echo ' <script src="http://www.oraculosemanal.com/_testing3/usuarios/Configuracion.js" type="text/javascript"></script>';

	}

	function heard()
	{
			echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">';
			echo '<html xmlns="http://www.w3.org/1999/xhtml">';
			echo '  <head>';
			echo '    <title>Oraculo Semanal</title>';
			   mostrar_meta ();
		   
		  	include("web.php");
      echo '  </head>';
			echo '  <body  valign="top"  >';
	}

	function pie()
	{
	 	echo '  </body>';
 		echo '</html>';
	}

	function datos_tablaopen($parametos)
	{
			IF ($parametos == '')
	    $parametos = 'width="540" bgcolor="#FFFFFF" border="1"  align="center" ';

	  echo '<table ' . $parametos . '>';
	}

	function datos_tablaclose()
	{
	  echo '</table>';
	}
 function datos_tabladata($Dato, $parametos)
	{
	  echo '   <td ' . $parametos . ' > '.$Dato.  ' </td>';
	}
	function datos_tablaDataOpen($parametos)
	{
	  echo '   <td ' . $parametos . ' > ';
	}

	function datos_tablaDataClose()
	{
	  echo ' </td> ';
	}

	function datos_tablaRowsOpen($parametos)
	{
	  echo '   <tr ' . $parametos . ' > ';
	}

	function datos_tablaRowsClose()
	{
	  echo '   </tr> ';
	}

	function datos_fromOpen($action, $parametos)
	{
	  echo '   <form id="FromPrincipal" name="FromPrincipal" method="post" action="refrescar(' . "'" . $action . "'" . ');" ' . $parametos . ' >';
	}

	function datos_fromClose()
	{
	  echo '   </form>';
	}


	function Mensaje($texto)
	{
	   echo "<script> mensaje('" . $texto . "'); </script>";
	}
	
	function cargo_combos( $Nombre, $tabla, $campo, $id, $Condicion , $condTB, $confTD, $stilocom, $valorDefull )
	{
	//onchange="refrescar(' . "'cargo_combos($Nombre, $tabla, $campo, $id, document.getElementById($Nombre).value) , $condTB), 'Div_Combo'" . ');"
				if ($stilocom == "")
				{ $stilocom = ' style="width:140px" '; }

				echo '<td ' . $confTD . ' ><select name="' . $Nombre . '" id="' . $Nombre . '"  ' . $stilocom . ' class="clsNode" > ';
				if ($condTB <> "")
				{
						if ( $condTB == 'blanco')
						{
			     	echo ' <option value="0" >---</option>';
						}
						else
						{
			     	echo ' <option value="0" >Todas</option>';
			   }
				}
				$cons = "SELECT " . $id  . " , " . $campo . " FROM " . $tabla  . " where 1=1 " . $Condicion;
				$resultado = mssql_query($cons);
				while($arr_asoc = mssql_fetch_array($resultado))
				{
             $i = 1;
             $Campos = "";
		         while ( $i <= (substr_count($campo, ',')+1))
						 {
										$Campos = $Campos . " " . $arr_asoc[$i];
										$i = $i +1;
  		 				}
              if ($valorDefull == $arr_asoc[$id] )
              {
                 echo "   <option selected value='" . $arr_asoc[$id]. "'>" .  utf8_decode(htmlentities($Campos)) . "</option>";
              }else
              {
                 echo "   <option value='" . $arr_asoc[$id]. "'>" . utf8_decode(htmlentities($Campos)) . "</option>";
              }			
        }
			 	mssql_free_result($resultado);
     echo '</select></td>';

	}

?>
