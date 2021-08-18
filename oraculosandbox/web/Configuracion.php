<?PHP
 include ('conexion.php');
 
	function datos_tablaopen($parametos)
	{
		if $parametos = 'width="540" bgcolor="#FFFFFF" border="1"  align="center" ';

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
	
	function incluir_javascript ($src)
	{
	  echo '<script language="javascript" type="text/javascript" src="' . $src . '"> </script>';
	}

	function Mensaje($texto)
	{
	   echo incluir_javascript ("<script> mensaje('" . $texto . "'); </script>";
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
						   if ($condTB != 'Todas' )
						   {
                  echo ' <option value="0" >' . ucfirst($condTB) . '</option>';
               }else
               {
			     	      echo ' <option value="0" >Todas</option>';
			     	   }
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
                 echo "   <option selected value='" . $arr_asoc[$id]. "'>" . ucfirst(utf8_decode($Campos)) . "</option>";
              }else
              {
                 echo "   <option value='" . $arr_asoc[$id]. "'>" . ucfirst(utf8_decode($Campos)) . "</option>";
              }			
        }
			 	mysql_free_result($resultado);
     echo '</select></td>';

	}

  function verifico_sub_menus($id_menu)
  {
     $sql = "SELECT COUNT(*) FROM MENU WHERE REFERENCIA = " . $id_menu . " and ESTADO = 1 ";
     $consulta=mssql_query($sql);

     list( $cant_menu ) = mssql_fetch_array($consulta);
     return $cant_menu;
  }

  function Sub_menu ($id_menu, $i)
  {
      $cons = "SELECT * FROM MENU WHERE REFERENCIA = " . $id_menu . " and ESTADO = 1 ORDER BY ORDEN asc ";
      $resultado = mssql_query($cons);
      if (mssql_num_rows($resultado) >0)
      {
          if ($i == 1 )
          {
            echo '<ul class="sub" >';
          }else
          {
            echo '<ul>';
          }

          while($arr_asoc = mssql_fetch_array($resultado))
          {
          		if ( verifico_sub_menus($arr_asoc[0]) > 0 )
          			   $_flecha = ' class="fly" ';
          		else
                   $_flecha = '';

              echo '  <li><a href="#" onclick="refresca_usu(' . "'" . $arr_asoc[1] . "'" . ')" ' . $_flecha . '>' . $arr_asoc[2] . '</a>';
              $i++;
          		Sub_menu ($arr_asoc[0], $i);
              echo '  </li>';
          }
          mssql_free_result($resultado);
          echo '</ul>';
      }
  }

  function menu ()
  {
      echo ' <div id="Div_menu">
               <ul class="menu2">';
               //<img src="img/menu_izq.gif" align="left"><img src="img/menu_der.gif"  align="right">';
      $cons = "SELECT * FROM MENU WHERE REFERENCIA = 0  and ESTADO = 1 ORDER BY ORDEN asc ";
      $resultado = mssql_query($cons);
      while($arr_asoc = mssql_fetch_array($resultado))
      {
        echo '  <li class="top"><a href="#" onclick="refresca_usu(' . "'" . $arr_asoc[1] . "' " . ')" class="top_link"><span class="down">' . $arr_asoc[2] . '</span></a>';
        Sub_menu ($arr_asoc[0], 1);
        echo '  </li>';
      }
      mssql_free_result($resultado);
      echo '  </ul>
            </div>';
  }
  
	function compartir_en_facebook($HOME)
	{
	  echo '<script>function fbs_click() {u=location.href;t=document.title;window.open(\'http://www.facebook.com/sharer.php?u=\'+encodeURIComponent(u)+\'&t=\'+encodeURIComponent(t),\'sharer\',\'toolbar=0,status=0,width=626,height=436\');return false;}</script><style> html .fb_share_button { display: -moz-inline-block; display:inline-block; padding:1px 20px 0 5px; height:20px; border:1px solid #d8dfea; background:url(http://b.static.ak.fbcdn.net/images/share/facebook_share_icon.gif?8:26981) no-repeat top right; } html .fb_share_button:hover { color:#fff; border-color:#295582; background:#3b5998 url(http://b.static.ak.fbcdn.net/images/share/facebook_share_icon.gif?8:26981) no-repeat top right; text-decoration:none; } </style> <a href="http://www.facebook.com/share.php?u=<url>" class="fb_share_button" onclick="return fbs_click()" target="_blank" style="text-decoration:none;">Compartir en Facebook</a>';
	  return true;
	}

	function pie_pagina( $Empresa_id )
	{
      $cons = "SELECT menu, Texto, Derechos, Fondo_color FROM pie WHERE Empresa_id = " . $Empresa_id ;
      $resultado = mssql_query($cons);
	   list( $menu, $Texto, $Derechos, $Fondo_color ) = mssql_fetch_array($resultado);
      
      
	   echo " <footer class='site-footer'>";
	   echo "       <div class='contenedor clearfix'>";
	   echo "             <div class='footer-informacion'>";
	   echo "                 <h3><span>OraculoSemanal.com</span></h3>";
	   echo "                 <p>" . $Texto . "</p>";
	   echo "             </div>";
	   echo "        </div>";
	   echo "   </footer>";
	   echo "  <p class='copyright'>" . $Derechos . "</p>";

	}
  
  
?>
