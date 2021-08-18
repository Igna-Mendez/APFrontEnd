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
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <!-- Estilo de tablas de resultados -->
    <link href="css/bootstrap-responsive.css" rel="stylesheet" type="text/css"/>
    <link href="css/main.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=ABeeZee' rel='stylesheet' type='text/css'>
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
    
	<script src="/path/to/lib/jquery.waypoints.min.js"></script>
    <script src="/path/to/shortcuts/sticky.min.js"></script>    
    <script>
		function abrirpopup(nombre,ancho,alto) {
			dat = 'width=' + ancho + ',height=' + alto + ',left=390,top=340,scrollbars=no,resize=no';
			window.open(nombre,'',dat)
		}
		
		function MM_jumpMenu(targ,selObj,restore){ //v3.0
		eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
		if (restore) selObj.selectedIndex=0;
	  }
	</script>
    <script>
		var sticky = new Waypoint.Sticky({
		  element: $('.basic-sticky-example')[0]
		});
	</script>
</head><!--/head-->

<body class="homepage">
    <div id="wrapper">
    <!-- Menu -->    
    <div id="sidebar-wrapper" id="blah">

        <div class="sidebar-nav">
          <div class="navbar navbar-default" role="navigation">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <span class="visible-xs navbar-brand"></span>
            </div>
            <div class="navbar-collapse collapse sidebar-navbar-collapse">
              <ul class="nav navbar-nav">
                <li><a onclick="abrirpopup('contactenos.htm',400,250);" href="#">Contactenos</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Datelli<i class="fa fa-angle-down"></i></a>
                    <ul class="dropdown-menu">
                        <li><a href="libro.htm">Libro de Datelli</a></li>
                        <li><a href="https://clubdatelli.com">Club de Datelli</a></li>
                    </ul>
                </li>                
                <li class="dropdown">               
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Quinielas <i class="fa fa-angle-down"></i></a>
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
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Poceadas <i class="fa fa-angle-down"></i></a>
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
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Tablas <i class="fa fa-angle-down"></i></a>
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
                <li><form role="form">
                        <input type="text" class="search-form" autocomplete="off" placeholder="Ingresa tu número" action="operar.php">
                        <i class="fa fa-search"></i>
                    </form>
                </li> 
              </ul>
            </div><!--/.nav-collapse -->
          </div>
        </div>

    </div>
    <!-- Contenido principal -->
    
    <div id="page-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <header id="header">
            <div class="top-bar">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6 col-xs-8">
                           <div class="social">
                                <ul class="social-share">
                                    <li><a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Menú</a></li>
                                    <li><a href="https://www.facebook.com/oraculosemanal/?fref=ts" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="https://twitter.com/eloraculodice" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="https://www.youtube.com/embed/wuz25e5ODu8" target="_blank"><i class="fa fa-youtube"></i></a></li>
                                </ul>
                           </div>
                        </div>
                        <div class="search col-sm-6 col-xs-4">
                            <form role="form">
                                <input type="text" class="search-form" autocomplete="off" placeholder="Search">
                                <i class="fa fa-search"></i>
                            </form>
                       </div>
                    </div>
                </div><!--/.container-fluid-->
            </div><!--/.top-bar-->

            </header><!--/header-->
        </div>
        <div class="row">
            <section id="blog-link" class="no-margin">

                <div class="center wow fadeInDown">
                        <h2><a href="https://oraculosemanal.wordpress.com/" target="_blank">Enterate de todo en nuestro blog!<p></p><img src="<?php echo $url ?>/images/head-blog.jpg" border="0" /></a></h2>
                </div>
            </section><!--/#blog-link-->
        </div>
        <div class="row">
            <section id="cabezas" >
                <div class="container-fluid">
                    <div class="center wow fadeInDown">
                        <h2>Las cabezas del día</h2>
                    </div>

                    <?php echo getCabezas(); ?>                   

                </div><!--/.container-fluid-->
            </section><!--/#Cabezas-->
        </div>
        <div class="row">
            <section id="tablas-consultas" >
                <div class="container-fluid">
                    <div class="center wow fadeInDown">
                        <h2>Busca tus sueños y acertá!</h2>
                        <form action="operar.php" method="post">
                            Busca la palabra que quieras jugar(<a href="<?php echo $url ?>/alfa.htm">¿Cómo funciona?</a>): <input type="text" name="numer"><br>
                            Busca tu número: <input type="text" name="numeros"><br>
                            <input type="submit" value="Submit">
                        </form> 
                        <?php
                            if( isset($_POST['numeros'])) {
                                if($_POST['numeros']!=''){
                                    $coincidencias=getDBCoincidences($_POST['numeros']);		
                                }


                            }
                            if(gettype($coincidencias)==string || gettype($coincidencias)=='NULL'){
                                print_r($coincidencias);
                            }else{
                                echo $coincidencias;
                            }; ?>
                    </div>


                </div><!--/.container-fluid-->
            </section><!--/#feature-->
        </div>
        <div class="row">
            <section id="feature" >
                <div class="container-fluid">
                    <div class="center wow fadeInDown">
                        <h2>Consulta tus resultados!</h2>
                    </div>
                    <div class="row">
                        <div class="features">
                            <div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                                <div class="feature-wrap">
                                    <a href="<?php echo $url ?>/_testing3/Visualizaciones/Poceadas/Resultados_Poceadas-3.php?idPoceada=2"><img src="images/juegos/Loto-200.jpg" border="0" /></a>
                                </div>
                            </div><!--/.col-md-4-->

                            <div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                                <div class="feature-wrap">
                                    <a href="<?php echo $url ?>/_testing3/Visualizaciones/Poceadas/Resultados_Poceadas-3.php?idPoceada=11"><img src="images/juegos/telekino.jpg" border="0" /></a>
                                </div>
                            </div><!--/.col-md-4-->

                            <div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                                <div class="feature-wrap">
                                    <a href="<?php echo $url ?>/_testing3/Visualizaciones/Poceadas/Resultados_Poceadas-3.php?idPoceada=10"><img src="images/juegos/quini_6.gif" border="0" /></a>
                                </div>
                            </div><!--/.col-md-4-->

                            <div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                                <div class="feature-wrap">
                                    <a href="<?php echo $url ?>/_testing3/Visualizaciones/Poceadas/Resultados_Poceadas-3.php?idPoceada=3"><img src="images/juegos/loto_5.gif" border="0" /></a>
                                </div>
                            </div><!--/.col-md-4-->

                            <div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                                <div class="feature-wrap">
                                    <a href="<?php echo $url ?>/_testing3/Visualizaciones/Poceadas/Resultados_Poceadas-3.php?idPoceada=4"><img src="images/juegos/brinco.jpg" border="0" /></a>
                                </div>
                            </div><!--/.col-md-4-->

                            <div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                                <div class="feature-wrap">
                                    <a href="<?php echo $url ?>/_testing3/Visualizaciones/Poceadas/Resultados_Poceadas-3.php?idPoceada=5"><img src="images/juegos/mi_bingo.gif" border="0" /></a>
                                </div>
                            </div><!--/.col-md-4-->


                            <div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                                <div class="feature-wrap">
                                    <a href="<?php echo $url ?>/_testing3/Visualizaciones/Poceadas/Resultados_Poceadas-3.php?idPoceada=7"><img src="images/juegos/monobingo.jpg" border="0" /></a>
                                </div>
                            </div><!--/.col-md-4-->

                            <div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                                <div class="feature-wrap">
                                    <a href="<?php echo $url ?>/_testing3/Visualizaciones/Poceadas/Resultados_Poceadas-3.php?idPoceada=8"><img src="images/juegos/quiniela-poceada.jpg" border="0" /></a>
                                </div>
                            </div><!--/.col-md-4-->

                            <div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                                <div class="feature-wrap">
                                    <a href="<?php echo $url ?>/_testing3/Visualizaciones/Poceadas/Resultados_Poceadas-3.php?idPoceada=1"><img src="images/juegos/quiniela-plus.jpg" border="0" /></a>
                                </div>
                            </div><!--/.col-md-4-->

                            <div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                                <div class="feature-wrap">
                                    <a href="<?php echo $url ?>/_testing3/Visualizaciones/Poceadas/Resultados_Poceadas-3.php?idPoceada=9"><img src="images/juegos/clubkeno.jpg" border="0" /></a>
                                </div>
                            </div><!--/.col-md-4-->

                            <div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                                <div class="feature-wrap">
                                    <a href="<?php echo $url ?>/_testing3/Visualizaciones/Poceadas/Resultados_Poceadas-3.php?idPoceada=12"><img src="images/juegos/maradona.jpg" border="0" /></a>
                                </div>
                            </div><!--/.col-md-4-->                    
                        </div><!--/.services-->
                    </div><!--/.row-->    
                </div><!--/.container-fluid-->
            </section><!--/#feature-->
        </div>
        <div class="row">
            <section id="links-externos">
                <div class="container-fluid">
                    <div class="center wow fadeInDown">
                        <h2>Nuestra Radio, Youtube y más!</h2>
                    </div>

                    <div class="row">
                        <div class="col-xs-12 col-sm-4 col-md-3">
                            <div class="recent-work-wrap">
                                <a href="http://aciertecondatelli.com" target="_blank"><img src="<?php echo $url ?>/images/am770.jpg" width="202" height="300" border="0" /></a>
                            </div>
                        </div>   

                        <div class="col-xs-12 col-sm-4 col-md-3">
                            <div class="recent-work-wrap">
                                <iframe width="230" height="150" src="https://www.youtube.com/embed/wuz25e5ODu8" frameborder="0" allowfullscreen></iframe>
                            </div>
                        </div> 

                        <div class="col-xs-12 col-sm-4 col-md-3">
                            <div class="recent-work-wrap">
                                <img class="img-responsive" src="<?php echo $url ?>/images/bg_horosc.jpg" alt="">
                                <div class="overlay">
                                    <div class="recent-work-inner">
                                        <form name="form1" id="form1">
                                            <div align="center">
                                              <select name="menu1" class="Estilo11" onchange="MM_jumpMenu('parent',this,1)">
                                                <option value="index.php" selected="selected">Elegir</option>
                                                <option value="horoscopo.htm">Aries</option>
                                                <option value="tauro.htm">Tauro</option>
                                                <option value="geminis.htm">Geminis</option>
                                                <option value="cancer.htm">Cancer</option>
                                                <option value="leo.htm">Leo</option>
                                                <option value="virgo.htm">Virgo</option>
                                                <option value="libra.htm">Libra</option>
                                                <option value="escorpio.htm">Escorpio</option>
                                                <option value="sagitario.htm">Sagitario</option>
                                                <option value="capricornio.htm">Capricornio</option>
                                                <option value="acuario.htm">Acuario</option>
                                                <option value="piscis.htm">Piscis</option>
                                              </select>
                                            </div>
                                        </form>
                                    </div> 
                                </div>
                            </div>
                        </div>   

                        <div class="col-xs-12 col-sm-4 col-md-3">
                            <div class="recent-work-wrap">
                                <a href="http://www.viafortuna.com.ar" target="_blank"><img src="<?php echo $url ?>/images/viafortuna.jpg" width="130" height="48" border="0" /></a>
                                <a href="http://www.amplitudmodulada.com.ar" target="_blank"><img src="<?php echo $url ?>/images/amplitudmodulada.gif" width="130" height="39" border="0" /></a>
                            </div>
                        </div>   

                        <div class="col-xs-12 col-sm-4 col-md-3">
                            <div class="recent-work-wrap">
                                <a href="https://clubdatelli.com/bases55544.htm" target="_blank"><img src="<?php echo $url ?>/images/datelli55544.jpg" width="202" height="202" border="0" /></a>
                            </div>
                        </div>   

                        <div class="col-xs-12 col-sm-4 col-md-3">
                            <div class="recent-work-wrap">
                                <a href="<?php echo $url ?>/1515.htm" target="_blank"><img src="<?php echo $url ?>/images/byc.gif" width="202" height="50" border="0" /></a>
                            </div>
                        </div> 

                        <div class="col-xs-12 col-sm-4 col-md-3">
                            <div class="recent-work-wrap">
                                <img class="img-responsive" src="images/portfolio/recent/item8.png" alt="">
                                <div class="overlay">
                                    <div class="recent-work-inner">
                                        <h3><a href="#">Business theme </a></h3>
                                        <p>There are many variations of passages of Lorem Ipsum available, but the majority</p>
                                        <a class="preview" href="images/portfolio/full/item8.png" rel="prettyPhoto"><i class="fa fa-eye"></i> View</a>
                                    </div> 
                                </div>
                            </div>
                        </div>   
                    </div><!--/.row-->
                </div><!--/.container-fluid-->
            </section><!--/#links-externos-->
        </div>
        <div class="row">
            <section id="bottom">
                <div class="container-fluid wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                    <div class="row">
                        <div class="col-md-3 col-sm-6">
                            <div class="widget">
                                <h3>Company</h3>
                                <ul>
                                    <li><a href="#">About us</a></li>
                                    <li><a href="#">We are hiring</a></li>
                                    <li><a href="#">Meet the team</a></li>
                                    <li><a href="#">Copyright</a></li>
                                    <li><a href="#">Terms of use</a></li>
                                    <li><a href="#">Privacy policy</a></li>
                                    <li><a href="#">Contact us</a></li>
                                </ul>
                            </div>    
                        </div><!--/.col-md-3-->

                        <div class="col-md-3 col-sm-6">
                            <div class="widget">
                                <h3>Support</h3>
                                <ul>
                                    <li><a href="#">Faq</a></li>
                                    <li><a href="#">Blog</a></li>
                                    <li><a href="#">Forum</a></li>
                                    <li><a href="#">Documentation</a></li>
                                    <li><a href="#">Refund policy</a></li>
                                    <li><a href="#">Ticket system</a></li>
                                    <li><a href="#">Billing system</a></li>
                                </ul>
                            </div>    
                        </div><!--/.col-md-3-->

                        <div class="col-md-3 col-sm-6">
                            <div class="widget">
                                <h3>Developers</h3>
                                <ul>
                                    <li><a href="#">Web Development</a></li>
                                    <li><a href="#">SEO Marketing</a></li>
                                    <li><a href="#">Theme</a></li>
                                    <li><a href="#">Development</a></li>
                                    <li><a href="#">Email Marketing</a></li>
                                    <li><a href="#">Plugin Development</a></li>
                                    <li><a href="#">Article Writing</a></li>
                                </ul>
                            </div>    
                        </div><!--/.col-md-3-->

                        <div class="col-md-3 col-sm-6">
                            <div class="widget">
                                <h3>Our Partners</h3>
                                <ul>
                                    <li><a href="#">Adipisicing Elit</a></li>
                                    <li><a href="#">Eiusmod</a></li>
                                    <li><a href="#">Tempor</a></li>
                                    <li><a href="#">Veniam</a></li>
                                    <li><a href="#">Exercitation</a></li>
                                    <li><a href="#">Ullamco</a></li>
                                    <li><a href="#">Laboris</a></li>
                                </ul>
                            </div>    
                        </div><!--/.col-md-3-->
                    </div>
                </div>
            </section><!--/#bottom-->
        </div>
        <div class="row">
            <footer id="footer" class="midnight-blue">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            &copy; 2016 <a target="_blank" href="http://oraculosemanal.com/" title="OraculoSemanal.com">OraculoSemanal.com</a>. Todos los derechos reservados.
                        </div>
                        <div class="col-sm-6">
                            <ul class="pull-right">
                                <li><a href="#">Home</a></li>
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Faq</a></li>
                                <li><a href="#">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer><!--/#footer-->
        </div>
            
    </div> <!-- container-fluid -->
    </div> <!-- page-content-wrapper -->
    </div> <!-- wrapper -->

	

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/wow.min.js"></script>
    <script>
	/**
	 * ---------------------------------------------
	 * Javscript is just for make elements clickable
	 * Effects are on the css only
	 * ---------------------------------------------
	 * @since 2015/06/10
	 * @author Reiha Hosseini ( @mrReiha )
	 */
	;
	!(function(w, d) {
	
	  'use strict';
	
	  var titles = d.querySelectorAll('.pricing-table-features'),
	
		i = 0,
		len = titles.length;
	
	  for (; i < len; i++)
		titles[i].onclick = function(e) {
	
		  for (var j = 0; j < len; j++)
			if (this != titles[j])
			  titles[j].parentNode.className = titles[j].parentNode.className.replace(/ open/i, '');
	
		  var cn = this.parentNode.className;
	
		  this.parentNode.className = ~cn.search(/open/i) ? cn.replace(/ open/i, '') : cn + ' open';
	
		};
	
	})(this, document);
	
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
        
    $('#blah').hover(function() {
        $(this).fadeTo(1,1);
    },function() {
        $(this).fadeTo(1,0);
    });
    </script>
</body>
</html>