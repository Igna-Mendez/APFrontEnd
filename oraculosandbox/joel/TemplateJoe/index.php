<!DOCTYPE html>
<html lang="en">
<?php
require_once('ResultadosDia.php');
$url="http://oraculosemanal.com";
?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Zab">
    <title>El Oraculo Semanal</title>
	<style>
		.stuck {
		  position:fixed;
		  top:0;
		}
	</style>
	<!-- core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.css" rel="stylesheet" type="text/css"/>
    <link href='http://fonts.googleapis.com/css?family=ABeeZee' rel='stylesheet' type='text/css'>
    <link href="css/main.css" rel="stylesheet">
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.js"></script>
    
</head><!--/head-->

<body>
  <nav class="menu-opener">
    <div class="menu-opener-inner"></div>
  </nav>
  <nav class="menu">
    <ul class="menu-inner">
        <li><a class="menu-link" onclick="abrirpopup('contactenos.htm',400,250);" href="#">Contactenos</a></li>
        <li class="dropdown menu-link">
            <a href="#" class="dropdown-toggle menu-link" data-toggle="dropdown">Datelli<i class="fa fa-angle-down"></i></a>
            <ul class="dropdown-menu">
                <li><a href="libro.htm">Libro de Datelli</a></li>
                <li><a href="https://clubdatelli.com">Club de Datelli</a></li>
            </ul>
        </li>                
        <li class="dropdown menu-link">               
            <a href="#" class="dropdown-toggle menu-link" data-toggle="dropdown">Quinielas <i class="fa fa-angle-down"></i></a>
            <ul class="dropdown-menu">
                <li><a href="<?php echo $url ?>/_testing3/Visualizaciones/iframeSorteos.asp?idQuiniela=1">Nacional</a></li>
                <li><a href="<?php echo $url ?>/_testing3/Visualizaciones/iframeSorteos.asp?idQuiniela=2">Provincia</a></li>
                <li><a href="<?php echo $url ?>/_testing3/Visualizaciones/iframeSorteos.asp?idQuiniela=3">Montevideo</a></li>
                <li><a href="<?php echo $url ?>/_testing3/Visualizaciones/iframeSorteos.asp?idQuiniela=11">Santa Fe</a></li>
                <li><a href="<?php echo $url ?>/_testing3/Visualizaciones/iframeSorteos.asp?idQuiniela=12">Cordoba</a></li>
                <li><a href="<?php echo $url ?>/_testing3/Visualizaciones/iframeSorteos.asp?idQuiniela=6">Corrientes</a></li>
                <li><a href="<?php echo $url ?>/_testing3/Visualizaciones/iframeSorteos.asp?idQuiniela=13">Mendoza</a></li>
                <li><a href="<?php echo $url ?>/_testing3/Visualizaciones/iframeSorteos.asp?idQuiniela=17">Entre Rios</a></li>
                <li><a href="<?php echo $url ?>/_testing3/Visualizaciones/iframeSorteos.asp?idQuiniela=14">Neuquen</a></li>
                <li><a href="<?php echo $url ?>/_testing3/Visualizaciones/iframeSorteos.asp?idQuiniela=5">Santiago</a></li>
                <li><a href="<?php echo $url ?>/_testing3/Visualizaciones/iframeSorteos.asp?idQuiniela=15">Salta</a></li>
                <li><a href="<?php echo $url ?>/_testing3/Visualizaciones/iframeSorteos.asp?idQuiniela=7">Tucuman</a></li>
            </ul>
        </li>
        <li class="dropdown menu-link">
            <a href="#" class="dropdown-toggle menu-link" data-toggle="dropdown">Poceadas <i class="fa fa-angle-down"></i></a>
            <ul class="dropdown-menu">
              <li><a href="<?php echo $url ?>/_testing3/Visualizaciones/Poceadas/Resultados_Poceadas-3.php?idPoceada=2">LOTO</a></li>
              <li><a href="<?php echo $url ?>/_testing3/Visualizaciones/Poceadas/Resultados_Poceadas-3.php?idPoceada=11">TELEKINO</a></li>
              <li><a href="<?php echo $url ?>/_testing3/Visualizaciones/Poceadas/Resultados_Poceadas-3.php?idPoceada=10">QUINI 6</a></li>
              <li><a href="<?php echo $url ?>/_testing3/Visualizaciones/Poceadas/Resultados_Poceadas-3.php?idPoceada=3">LOTO 5</a></li>
              <li><a href="<?php echo $url ?>/_testing3/Visualizaciones/Poceadas/Resultados_Poceadas-3.php?idPoceada=4">BRINCO</a></li>
              <li><a href="<?php echo $url ?>/_testing3/Visualizaciones/Poceadas/Resultados_Poceadas-3.php?idPoceada=5">MI BINGO</a></li>
              <li><a href="<?php echo $url ?>/_testing3/Visualizaciones/Poceadas/Resultados_Poceadas-3.php?idPoceada=7">Mono Bingo</a></li>
              <li><a href="<?php echo $url ?>/_testing3/Visualizaciones/Poceadas/Resultados_Poceadas-3.php?idPoceada=8">La Poceada</a></li>
              <li><a href="<?php echo $url ?>/_testing3/Visualizaciones/Poceadas/Resultados_Poceadas-3.php?idPoceada=1">Quiniela Plus</a></li>
              <li><a href="<?php echo $url ?>/_testing3/Visualizaciones/Poceadas/Resultados_Poceadas-3.php?idPoceada=9">Club Keno</a></li>
              <li><a href="<?php echo $url ?>/_testing3/Visualizaciones/Poceadas/Resultados_Poceadas-3.php?idPoceada=6">Toto Bingo</a></li>
              <li><a href="<?php echo $url ?>/_testing3/Visualizaciones/Poceadas/Resultados_Poceadas-3.php?idPoceada=12">Juga con Maradona</a></li>
            </ul>
        </li>
        <li class="dropdown menu-link">
            <a href="#" class="dropdown-toggle menu-link" data-toggle="dropdown">Tablas <i class="fa fa-angle-down"></i></a>
            <ul class="dropdown-menu">
                  <li><a href="<?php echo $url ?>/oficios.htm">OFICIOS</a></li>
                  <li><a href="<?php echo $url ?>/suenios.htm">SUE&Ntilde;OS</a></li>
                  <li><a href="<?php echo $url ?>/alfa.htm">Alfanumerico</a></li>
                  <li><a href="<?php echo $url ?>/tablita.htm">Tablita de Datelli</a></li>
                  <li><a href="<?php echo $url ?>/martingala1.htm">Martingala 1</a></li>
                  <li><a href="<?php echo $url ?>/martingala2.htm">Martingala 2</a></li>
                  <li><a href="<?php echo $url ?>/nombres.htm">NOMBRES</a></li>
                  <li><a href="<?php echo $url ?>/animales.htm">ANIMALES</a></li>
                  <li><a href="<?php echo $url ?>/tabladepago.htm">Tabla de Pago</a></li>
            </ul>
        </li>
        <li class="menu-link"><form role="form">
                <input type="text" class="search-form" autocomplete="off" placeholder="Ingresa tu número" action="operar.php">
                <i class="fa fa-search"></i>
            </form></li> 
    </ul>
  </nav>
  
  <script>
      $(".menu-opener").click(function(){
      $(".menu-opener, .menu-opener-inner, .menu").toggleClass("active");
      });

  </script>
    
</body>
</html>