<?PHP
  
   
	function mostrar_meta()
	{
	  echo "<html lang='en-US'> <head>";
	  
	 // echo '    <meta name="Revisit" content="1 day">';
	  echo '    <meta http-equiv="Content-Language" content="es-ar">';
	  echo '    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">';

	  echo '    <script src="js/TweenMax.min.js"></script> ';
     echo '    <script src="js/jquery.min.js"></script> ';
     echo '    <script src="js/Configuracion.js" type="text/javascript"></script>';
     echo '    <script src="js/prototype-1.6.0.2.js" type="text/javascript"></script>';
     
     echo '    <link rel="stylesheet" href="css/main.css">';
	  echo '    <link rel="stylesheet" href="css/stilo.css">';
	  
    // echo '    <script src="js/jquery.validate.js" type="text/javascript"></script>';
	  echo '  	<!--[if lt IE 9]>
						<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
					<![endif]--> ';
	   echo "</head> <body>";
	  
	   echo "<div id='centro' >";
	}

	function pie_pagina()
	{
      echo " </div>"; //Cieron div centro
      
	   echo " <footer class='info-testimonial'>";
	   echo "       <div class='contenedor clearfix'>";
	   echo "             <div class='footer-testimonial'>";
	   echo "                 <h3><span>OraculoSemanal.com</span></h3>";
	   echo "                 <p>Declaraci&oacute;n de Privacidad | Terminos y condiciones | Juego responsable</p>";
	   echo "             </div>";
	   echo "        </div>";
	   echo "   </footer>";
	   echo "  <p class='copyright'>Copyright &copy; 2018 OraculoSemanal.com - Todos los Derechos Reservados</p>";
     /*
     	   echo "<script src='https://code.jquery.com/jquery-3.2.1.min.js' integrity='sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=' crossorigin='anonymous'></script>
        <script>window.jQuery || document.write('<script src='js/vendor/jquery-3.2.1.min.js'><\/script>')</script>
        <script src='js/plugins.js'></script>
        <script src='js/main.js'></script>
        <script>
            window.ga=function(){ga.q.push(arguments)};ga.q=[];ga.l=+new Date;
            ga('create','UA-XXXXX-Y','auto');ga('send','pageview')
        </script>
        <script src='https://www.google-analytics.com/analytics.js' async defer></script>     ";
        */
	   echo "  </body> </html> ";

	}
                        
	function login()
	{


	   echo "<div id='login-form'>";
	   echo ' <h1>Ingres&aacute; con tu cuenta</h1>';
	   echo '  <fieldset>';

	   echo " <form name='form1' id='form1' method='post' >";
      echo "     <input name='codigo' id='codigo' type='text' placeholder='Ingrese su codigo.' pattern='{4-6}' required oninput='check_text(this);' >";
	   echo '     <br><input id="btn" type="button" value="Ingresar" onclick="refrescar();" >';
	   echo ' </form>';

		if ($mens != '')
		{
	      echo ' <h4>' .$mens .'</h4>';
		}else
		{
         echo ' </br>';
		}

            
	   echo ' </fieldset>';
	   echo ' </div>';

	}
  
  function cargo_numeros()
  {

	   $fecha= date("Y-m-d");
		$sql = "SELECT clientes.Clien_ID
                FROM clientes
					WHERE Fe_baja IS NULL
                 AND not exists (Select 1
					                    from cliente_codigo
											 where clientes.Clien_ID = cliente_codigo.Clien_ID
											   AND fecha = '".$fecha."' )";
//echo $sql;
		 $resultado = mssql_query($sql);


	   // $Idfoto = 52;
	    while($rs_id = mssql_fetch_array($resultado))
	    {
          $i = 0;
			$Clien_ID = $rs_id['Clien_ID'];

	      $rand = range(00022, 99999);
			shuffle($rand);
			foreach ($rand as $val) {
				  //  echo str_pad($val,5,0, STR_PAD_LEFT) . '<br />';
				    if ( $i == 1 )
				    {
		             $sql = "INSERT INTO cliente_codigo (Clien_ID, Codigo, fecha) Values ( " . $Clien_ID . ", '" . str_pad($val,5,0, STR_PAD_LEFT) . "', '" . $fecha . "' ); " ;
					  //  echo $sql;
				       $datos = mssql_query($sql);
		        	 }
					 $i++;
		      }
	    }
	    echo "Fueron cargado los nuevos codigos.";
   }

  function cargo_tablita()
  {
       $fecha= date("Y-m-d");
		 $i = 0;
		  while($i <= 99)
	    {
			 $sql ="INSERT INTO tablita (Ambo, N1, N2, N3, N4, N5, Fecha_alta) VALUES ('" . str_pad( $i , 2, '0', STR_PAD_LEFT) . "', '" . str_pad( rand(0, 999) , 3, '0', STR_PAD_LEFT) . "', '" . str_pad( rand(0, 999) , 3, '0', STR_PAD_LEFT) . "', '" . str_pad( rand(0, 999) , 3, '0', STR_PAD_LEFT) . "', '" . str_pad( rand(0, 999) , 3, '0', STR_PAD_LEFT) . "', '" . str_pad( rand(0, 999) , 3, '0', STR_PAD_LEFT) . "', '" . $fecha . "'); ";
//echo $sql . '<br>';
			 $datos = mssql_query($sql);
			 $i++;
       }
       
  }
  
  function muestro_simpatico($numero)
  {
  			  $sql3 = "Select Ambo, N1, N2, N3, N4, N5 from tablita where Ambo = '".$numero."' ;" ;
//echo $sql3;
			  $res_usu = mssql_query($sql3);
		     list( $Ambo, $N1, $N2, $N3, $N4, $N5 ) = mssql_fetch_array($res_usu);
		    // echo $sql3;
		    
        

	     echo '<table cellspacing="5" cellpadding="10" width="300" border="0">';
        echo ' <tbody>';
        echo '   <tr>';
        echo '	     <td colspan="6" align="middle" background="http://www.oraculosemanal.com/images/bgfade.gif"><strong class="Estilo4">' . $Ambo . '</strong></td>';
        echo '  </tr>';
        echo '  <tr> <td align="middle" background="http://www.oraculosemanal.com/images/bg_hdr.jpg" class="Estilo9"><span class="Titulo_result2">' . $N1 .'-'. $N2 .'-'. $N3 .'-'. $N4 .'-'. $N5 . '</span></td>    </tr> ';
        echo '  </tbody>';
        echo ' </table>';
//        echo '<div class="counter" id="counter" >0</div>';


  }

  function buscador_numero()
  {
	   echo "<div id='login-form'>";
	  // echo ' <h1>Ingrese Numero a buscar</h1>';
	   echo '  <fieldset>';

	   echo " <form name='form1' id='form1' method='post' >";
      echo '       <input type="numero" id="b_numero" name="b_numero" placeholder="Numero a busca" required="required">';
      //echo '        <button type="submit">Buscar</button>';
      echo '       <br><input id="btn" type="button" value="Buscar" onclick="refrescar_busca_num();" >';
      echo '     </form>';
      echo " <div id='res_numer'>";
	   echo ' </div>';
 
 	   echo ' </fieldset>';
	   echo ' </div>';

  }













?>
