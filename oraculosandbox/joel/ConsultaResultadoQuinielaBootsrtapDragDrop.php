<?php
/*
<--
*/
 include("connections/oculto.inc");
 $idQuiniela = "";
 $idSorteo = "";
 $nroSorteo = "";
 $num = 0;
 $fs = "";
$url=$_SERVER[REQUEST_URI];

parse_str($url['idQuiniela'], $queryIdQuiniela);
parse_str($url['nroSorteo'], $queryNroSorteo);
parse_str($url['fechaSorteo'], $queryFechaSorteo);
parse_str($url['turno'], $queryTurno);
echo "<br>".$queryIdQuiniela['idQuiniela']. "<br />";
echo "<br>".$queryNroSorteo['nroSorteo']. "<br />";
echo "<br>".$queryFechaSorteo['fechaSorteo']. "<br />";
echo "<br>".$queryTurno['turno']. "<br />";

 //conección a la base de datos
$dbhandle = mssql_connect($myServer, $myUser, $myPass)
 or die("Couldn't connect to SQL Server on $myServer"); 

 //selección de base de datos
$selected = mssql_select_db($myDB, $dbhandle)
  or die("Couldn't open database $myDB"); 
 
if ($idSorteo == "") {
	//Si obtuvo un idQuiniela y un NroSorteo de la URL:
	if ($queryIdQuiniela[0] != "" and $queryNroSorteo[0] != "") {
		$idQuiniela = $queryIdQuiniela[0];
		$nroSorteo = $queryNroSorteo[0];
		
		$queryIdNro = "select * FROM pabloseb_oraculosemanal.oraculosemanal.vsorteos_ordenado where idQuiniela in (".$idQuiniela.')';
		$queryIdNro .= " and nrosorteo = ". $nroSorteo;
		
		$rsSorteo = mssql_query($queryIdNro, $dbhandle)
			or die('Ocurrio un error: ' . mssql_get_last_message().' - Query: '.$queryIdNro);
		
		$num = mssql_num_rows($rsSorteo);
	 }
		if($num > 0) {
			$idSorteo = mssql_result($rsSorteo, 0, "idSorteo");
			mssql_free_result($rsSorteo);
		}
		

}

if ($idSorteo == "") {
	//Si obtuvo un idQuiniela y FechaSorteo con Turno de la URL:
	if ($queryIdQuiniela[0] != "" and $queryFechaSorteo[0] != "" and $queryTurno[0] != "") {
		$idQuiniela = $queryIdQuiniela[0];
		$fechaSorteo = $queryFechaSorteo[0];
		$turno = $queryTurno[0];
	
		$queryIdNro = "select * FROM pabloseb_oraculosemanal.oraculosemanal.vsorteos_ordenado where idQuiniela in (".$idQuiniela.')';
		$queryIdNro .= " and turno = '".$turno."' and datediff(day, fechaSorteo, '".$fechaSorteo."') = 0";

		
		$rsSorteo = mssql_query($queryIdNro, $dbhandle)
			or die('Ocurrio un error: ' . mssql_get_last_message());
		
		$num = mssql_num_rows($rsSorteo);
		
		if ($num > 0) {
			$idSorteo = mssql_result($rsSorteo, 0, "idSorteo");
		}
		
		mssql_free_result($rsSorteo);
	}
}
if ($idSorteo == "") {
	$fs = "";
	$fs = $queryFechaSorteo[0];
	//cambiar al implementar
	$queryIdQuiniela[0] = '1,2,3,5,6,7,11,12,13,14,15,17,27,28';
	//Si obtuvo solo un idQuiniela, primero obtiene la fecha del último sorteo
	if ($queryIdQuiniela[0] != "" and  $fs == "") {
		
		$idQuiniela = $queryIdQuiniela[0];
		
		$queryRsMaxFecha = "select top 1 fechaSorteo FROM pabloseb_oraculosemanal.dbo.sorteos where idQuiniela in (".$idQuiniela.") order by fechaSorteo desc ";
		
		$rsMaxFecha = mssql_query($queryRsMaxFecha, $dbhandle)
			or die('Ocurrio un error: ' . mssql_get_last_message());
		
		$num = mssql_num_rows($rsMaxFecha);
			
		if ($num > 0) {
			$fs = mssql_result($rsMaxFecha, 0, "fechaSorteo");
		}
		
		mssql_free_result($rsMaxFecha);
	}
	//Con la fecha ya adquirida Busca los sorteos para la quiniela seleccionada
	if ($idQuiniela != "" and $fs != "") {
		//$idQuiniela = $queryIdQuiniela[0];
		$fechaSorteo = $fs;
		//$fechaSorteo = '12/16/2015 12:00:00 AM';

		$queryIdNro = "select * FROM pabloseb_oraculosemanal.oraculosemanal.vsorteos_ordenado where idQuiniela in (".$idQuiniela.')';
		$queryIdNro .= " and datediff(day, fechaSorteo, '".$fechaSorteo."') = 0";
		
		$rsIdSorteo = mssql_query($queryIdNro, $dbhandle)
			or die('Ocurrio un error: ' . mssql_get_last_message());
					
		$num = mssql_num_rows($rsIdSorteo);
		
		if ($num > 0) {
			$idSorteo = mssql_result($rsIdSorteo, 0, "idSorteo");
			for ($i=1; ;$i++) {
				$idSorteo = $idSorteo.','.mssql_result($rsIdSorteo, $i, "idSorteo");
				if($i==$num-1){
					break;
				}
			}
		}

		mssql_free_result($rsIdSorteo);

	}
}
	
//-->
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Tabla de resultados</title>
<style type="text/css">
<!--
.Estilo1 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 12px;
	font-weight: bold;
	color: #FFFFFF;
}
.Estilo2 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 12px;
	font-style: normal;
	font-weight: bold;
	color: #000000;
}
body {
	font: 100%/1.4 Verdana, Arial, Helvetica, sans-serif;
	background-color: #42413C;
	margin: 0;
	padding: 0;
	color: #000;
}
ul, ol, dl { 
	padding: 0;
	margin: 0;
}
h1, h2, h3, h4, h5, h6, p {
	margin-top: 0;	 
	padding-right: 15px;
	padding-left: 15px; 
}
a img { 
	border: none;
}

a:link {
	color: #42413C;
	text-decoration: underline;
}
a:visited {
	color: #6E6C64;
	text-decoration: underline;
}
a:hover, a:active, a:focus { 
	text-decoration: none;
}
.container {
	width: 960px;
	background-color: #FFFFFF;
	margin: 0 auto; 
}
header {
	background-color: #ADB96E;
}

.sidebar1 {
	float: right;
	width: 180px;
	background-color: #EADCAE;
	padding-bottom: 10px;
}
.content {
	width: 780px;
	float: none;
	padding-top: 10px;
	padding-right: 0px;
	padding-bottom: 10px;
	padding-left: 0px;
}


.content ul, .content ol {
	padding: 0 15px 15px 40px; 
}


ul.nav {
	list-style: none; 
	border-top: 1px solid #666; 
	margin-bottom: 15px; 
}
ul.nav li {
	border-bottom: 1px solid #666; 
}
ul.nav a, ul.nav a:visited { 
	padding: 5px 5px 5px 15px;
	display: block; 
	width: 160px;  
	text-decoration: none;
	background-color: #C6D580;
}
ul.nav a:hover, ul.nav a:active, ul.nav a:focus { 
	background-color: #ADB96E;
	color: #FFF;
}

footer {
	padding: 10px 0;
	background-color: #CCC49F;
	position: relative;
	clear: both; 
}

header, section, footer, aside, article, figure {
	display: block;
}


.tdPrimeros{
	background-color: #b3ffc6;
}

.tdSegundos{
	background-color: #b3ffd9;
}

.tdTerceros{
	background-color: #b3ffec;
}

.tdCuartos{
	background-color: #b3ffff;
}

.tdPrimeros.selected{
	background-color: #C33;
}

.tdSegundos.selected{
	background-color: #C33;
}

.tdTerceros.selected{
	background-color: #C33;
}

.tdCuartos.selected{
	background-color: #C33;
}
.redob{
	background-color: #829881;
}
.result{
	text-align:left;
}
.encontrado{
	background-color: #36D9CE;
}
.acierto{
	background-color: #cc0000;
	font-style:italic;
	font-weight:bold;
}

-->
</style>

<!--[if lt IE 9]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<meta content="yes" name="apple-mobile-web-app-capable" />
 <!-- Latest compiled and minified CSS
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Latest compiled JavaScript -->
<!--<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>-->
<!--script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>
<script src="js/vendor/bootstrap.min.js"></script
Custom JS-->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="bootstrap.min.css">


</head>

<body>

<?php
/*
<--
*/
$iteracion = 0;
$ids = Split(",", $idSorteo);

$bNac=0;
$bProv=0;
$bCord=0;
$bCorr=0;
$bEntR=0;
$bForm=0;
$bMend=0;
$bNeuq=0;
$bOro=0;
$bSalt=0;
$bStaF=0;
$bSant=0;
$bTucu=0;

$container = '<div class="container-fluid" id="container"> 
';
$container .= '	<div class="row"> <div class=align="center" class="Estilo2">'.$fs.'</div> </div> 
	<div class="row" id="resultadosQuinielas">
';

//$rowHeaders = '';

$divNacional=' ';
$divProv=' ';
$divCord=' ';
$divCorr=' ';
$divEntR=' ';
$divForm=' ';
$divMend=' ';
$divNeuq=' ';
$divOro=' ';
$divSalt=' ';
$divStaF=' ';
$divSant=' ';
$divTucu=' ';

foreach ($ids as $idSorteo2) {
	$iteracion++;

	$queryNumeros1 = "SELECT * FROM pabloseb_oraculosemanal.dbo.numeros where idSorteo = ".$idSorteo2." and ubicacion >= 1 and ubicacion <= 20  order by ubicacion";
	
	$rsNumeros1 = mssql_query($queryNumeros1, $dbhandle)
		or die('Ocurrio un error: ' . mssql_get_last_message().' - idSorteo2: '.$idSorteo2.' - query: '.$queryNumeros1.' - idSorteo: '.$idSorteo);
	
	$numNumeros1 = mssql_num_rows($rsNumeros1);
		
	$queryLetras = "SELECT * FROM pabloseb_oraculosemanal.dbo.letras where idSorteo = ".$idSorteo2." order by ubicacion ";
	
	$rsLetras = mssql_query($queryLetras, $dbhandle)
		or die('Ocurrio un error: ' . mssql_get_last_message());	
		
	$numLetras = mssql_num_rows($rsLetras);

	$querySorteo = "select * FROM pabloseb_oraculosemanal.dbo.sorteos s, pabloseb_oraculosemanal.dbo.quinielas q where s.idQuiniela = q.idQuiniela and idSorteo = ".$idSorteo2;
	
	$rsSorteo = mssql_query($querySorteo, $dbhandle)
		or die('Ocurrio un error: ' . mssql_get_last_message());
	
	$numSorteo = mssql_num_rows($rsSorteo);
	
	$turno = "";
	$quiniela = "";
	$fechaSorteo = "";
	$arrayFecha = "";
		
	if ($numSorteo > 0) {
		$turno = mssql_result($rsSorteo, 0, "turno");
		$quiniela = mssql_result($rsSorteo, 0, "quiniela");
		$arrayFechaComp = Split(" ", mssql_result($rsSorteo, 0, "fechaSorteo"));
		if(count($arrayFechaComp)>2){
			$fechaSorteo = $arrayFechaComp[0].' '.$arrayFechaComp[1].' '.$arrayFechaComp[2];
		} else {
			$fechaSorteo = $arrayFechaComp[0];
		}
		
	}
		
	mssql_free_result($rsSorteo);
	//empieza la tabla

	if(strpos($quiniela,'Nacional') !== false){
		$bNac++;
		$divNacional .= '<div class="col-xs-3 col-xs-3 col-sm-1" style="background-color:lavenderblush;" id='.substr($turno,0,1).'-'.substr(trim($quiniela),0,4).'>'.substr(trim($quiniela),0,4).'
';

		if(strpos($turno,'Los') !== false){
			$divNacional .= '<p>Prim.</p>
			';		
		} else {
			$divNacional .= '<p>'.substr(trim($turno),0,4).'.</p>
			';
		}
		
		if ($numNumeros1 > 0) {
			$i=0;
			while($i < 20){
				if($i==0){
					$divNacional .='<p class="tdPrimeros result cabeza">'.mssql_result($rsNumeros1, $i, "numero").'</p>
';
					$i++;
				}elseif($i>0&&$i<=5){
					$divNacional .='<p class="tdPrimeros result">'.mssql_result($rsNumeros1, $i, "numero").'</p>
';
					$i++;
				}elseif($i>5&&$i<=10){
					$divNacional .='<p class="tdSegundos result">'.mssql_result($rsNumeros1, $i, "numero").'</p>
';
					$i++;					
				}elseif($i>10&&$i<=15){
					$divNacional .='<p class="tdTerceros result">'.mssql_result($rsNumeros1, $i, "numero").'</p>
';
					$i++;					
				}elseif($i>15&&$i<=20){
					$divNacional .='<p class="tdCuartos result">'.mssql_result($rsNumeros1, $i, "numero").'</p>
';
					$i++;					
				}
			}
		
		}
		if ($numLetras > 0) {
			$divNacional .= '<p>'.mssql_result($rsLetras, 0, "LETRA");
			for ($i = 1; $i < $numLetras; $i++) {
				 $divNacional .= ''.mssql_result($rsLetras, $i, "LETRA");
	
			}
			$divNacional .= '</p>
';
		} else {
			$divNacional .= '<p>-</p>
			';
		}
		
		$divNacional .= '</div>';

	}
	
	if(strpos($quiniela,'Provincia') !== false){
		$bProv++;
		$divProv .= '<div class="col-xs-3 col-sm-1" style="background-color:lavenderblush;" id='.substr($turno,0,1).'-'.substr(trim($quiniela),0,4).'>'.substr(trim($quiniela),0,4).'
';

		if(strpos($turno,'Los') !== false){
			$divProv .= '<p>Prim.</p>
			';		
		} else {
			$divProv .= '<p>'.substr(trim($turno),0,4).'.</p>
			';
		}
		
		if ($numNumeros1 > 0) {
			$i=0;
			while($i < 20){
				if($i==0){
					$divProv .='<p class="tdPrimeros result cabeza">'.mssql_result($rsNumeros1, $i, "numero").'</p>
';
					$i++;
				}elseif($i>0&&$i<=5){
					$divProv .='<p class="tdPrimeros result">'.mssql_result($rsNumeros1, $i, "numero").'</p>
';
					$i++;
				}elseif($i>5&&$i<=10){
					$divProv .='<p class="tdSegundos result">'.mssql_result($rsNumeros1, $i, "numero").'</p>
';
					$i++;					
				}elseif($i>10&&$i<=15){
					$divProv .='<p class="tdTerceros result">'.mssql_result($rsNumeros1, $i, "numero").'</p>
';
					$i++;					
				}elseif($i>15&&$i<=20){
					$divProv .='<p class="tdCuartos result">'.mssql_result($rsNumeros1, $i, "numero").'</p>
';
					$i++;					
				}
			}
		
		}
		if ($numLetras > 0) {
			$divProv .= '<p>'.mssql_result($rsLetras, 0, "LETRA");
			for ($i = 1; $i < $numLetras; $i++) {
				 $divProv .= ' '.mssql_result($rsLetras, $i, "LETRA");
	
			}
			$divProv .= '</p>
';
		} else {
			$divProv .= '<p>-</p>
			';
		}
		
		$divProv .= '</div>';
	}
	
	if(strpos($quiniela,'doba') !== false){
		$bCord++;
		$divCord .= '<div class="col-xs-3 col-sm-1" style="background-color:lavenderblush;" id='.substr($turno,0,1).'-Cord>Córd
		';
		
		if(strpos($turno,'Los') !== false){
			$divCord .= '<p>Prim.</p>
			';		
		} else {
			$divCord .= '<p>'.substr(trim($turno),0,4).'.</p>
			';
		}
		

		if ($numNumeros1 > 0) {
			$i=0;
			while($i < 20){
				if($i==0){
					$divCord .='<p class="tdPrimeros result cabeza">'.mssql_result($rsNumeros1, $i, "numero").'</p>
';
					$i++;
				}elseif($i>0&&$i<=5){
					$divCord .='<p class="tdPrimeros result">'.mssql_result($rsNumeros1, $i, "numero").'</p>
';
					$i++;
				}elseif($i>5&&$i<=10){
					$divCord .='<p class="tdSegundos result">'.mssql_result($rsNumeros1, $i, "numero").'</p>
';
					$i++;					
				}elseif($i>10&&$i<=15){
					$divCord .='<p class="tdTerceros result">'.mssql_result($rsNumeros1, $i, "numero").'</p>
';
					$i++;					
				}elseif($i>15&&$i<=20){
					$divCord .='<p class="tdCuartos result">'.mssql_result($rsNumeros1, $i, "numero").'</p>
';
					$i++;					
				}
			}
		
		}
		if ($numLetras > 0) {
			$divCord .= '<p>'.mssql_result($rsLetras, 0, "LETRA");
			for ($i = 1; $i < $numLetras; $i++) {
				 $divCord .= ' '.mssql_result($rsLetras, $i, "LETRA");
	
			}
			$divCord .= '</p>
';
		} else {
			$divCord .= '<p>-</p>
			';
		}
		
		$divCord .= '</div>';
	}
	
	if(strpos($quiniela,'Corrientes') !== false){
		$bCorr++;
		$divCorr .= '<div class="col-xs-3 col-sm-1" style="background-color:lavenderblush;" id='.substr($turno,0,1).'-'.substr(trim($quiniela),0,4).'>'.substr(trim($quiniela),0,4).'
';

		if(strpos($turno,'Los') !== false){
			$divCorr .= '<p>Prim.</p>
			';		
		} else {
			$divCorr .= '<p>'.substr(trim($turno),0,4).'.</p>
			';
		}
		
		if ($numNumeros1 > 0) {
			$i=0;
			while($i < 20){
				if($i==0){
					$divCorr .='<p class="tdPrimeros result cabeza">'.mssql_result($rsNumeros1, $i, "numero").'</p>
';
					$i++;
				}elseif($i>0&&$i<=5){
					$divCorr .='<p class="tdPrimeros result">'.mssql_result($rsNumeros1, $i, "numero").'</p>
';
					$i++;
				}elseif($i>5&&$i<=10){
					$divCorr .='<p class="tdSegundos result">'.mssql_result($rsNumeros1, $i, "numero").'</p>
';
					$i++;					
				}elseif($i>10&&$i<=15){
					$divCorr .='<p class="tdTerceros result">'.mssql_result($rsNumeros1, $i, "numero").'</p>
';
					$i++;					
				}elseif($i>15&&$i<=20){
					$divCorr .='<p class="tdCuartos result">'.mssql_result($rsNumeros1, $i, "numero").'</p>
';
					$i++;					
				}
			}
		
		}
		if ($numLetras > 0) {
			$divCorr .= '<p>'.mssql_result($rsLetras, 0, "LETRA");
			for ($i = 1; $i < $numLetras; $i++) {
				 $divCorr .= ' '.mssql_result($rsLetras, $i, "LETRA");
	
			}
			$divCorr .= '</p>
';
		} else {
			$divCorr .= '<p>-</p>
			';
		}
		
		$divCorr .= '</div>';
	}

	if(strpos($quiniela,'Entre') !== false){
		$bEntR++;
		$divEntR .= '<div class="col-xs-3 col-sm-1" style="background-color:lavenderblush;" id='.substr($turno,0,1).'-'.substr(trim($quiniela),0,4).'>Entr';
		
		if(strpos($turno,'Los') !== false){
			$divEntR .= '<p>Prim.</p>
			';		
		} else {
			$divEntR .= '<p>'.substr(trim($turno),0,4).'.</p>
			';
		}

		if ($numNumeros1 > 0) {
			$i=0;
			while($i < 20){
				if($i==0){
					$divEntR .='<p class="tdPrimeros result cabeza">'.mssql_result($rsNumeros1, $i, "numero").'</p>
';
					$i++;
				}elseif($i>0&&$i<=5){
					$divEntR .='<p class="tdPrimeros result">'.mssql_result($rsNumeros1, $i, "numero").'</p>
';
					$i++;
				}elseif($i>5&&$i<=10){
					$divEntR .='<p class="tdSegundos result">'.mssql_result($rsNumeros1, $i, "numero").'</p>
';
					$i++;					
				}elseif($i>10&&$i<=15){
					$divEntR .='<p class="tdTerceros result">'.mssql_result($rsNumeros1, $i, "numero").'</p>
';
					$i++;					
				}elseif($i>15&&$i<=20){
					$divEntR .='<p class="tdCuartos result">'.mssql_result($rsNumeros1, $i, "numero").'</p>
';
					$i++;					
				}
			}
		
		}
		if ($numLetras > 0) {
			$divEntR .= '<p>'.mssql_result($rsLetras, 0, "LETRA");
			for ($i = 1; $i < $numLetras; $i++) {
				 $divEntR .= ' '.mssql_result($rsLetras, $i, "LETRA");
	
			}
			$divEntR .= '</p>
';
		} else {
			$divEntR .= '<p>-</p>
			';
		}
		
		$divEntR .= '</div>';
	}
	
	if(strpos($quiniela,'Formosa') !== false){
		$bForm++;
		$divForm .= '<div class="col-xs-3 col-sm-1" style="background-color:lavenderblush;" id='.substr($turno,0,1).'-'.substr(trim($quiniela),0,4).'>'.substr(trim($quiniela),0,4).'
';

		if(strpos($turno,'Los') !== false){
			$divEntR .= '<p>Prim.</p>
			';		
		} else {
			$divEntR .= '<p>'.substr(trim($turno),0,4).'.</p>
			';
		}


		if ($numNumeros1 > 0) {
			$i=0;
			while($i < 20){
				if($i==0){
					$divForm .='<p class="tdPrimeros result cabeza">'.mssql_result($rsNumeros1, $i, "numero").'</p>
';
					$i++;
				}elseif($i>0&&$i<=5){
					$divForm .='<p class="tdPrimeros result">'.mssql_result($rsNumeros1, $i, "numero").'</p>
';
					$i++;
				}elseif($i>5&&$i<=10){
					$divForm .='<p class="tdSegundos result">'.mssql_result($rsNumeros1, $i, "numero").'</p>
';
					$i++;					
				}elseif($i>10&&$i<=15){
					$divForm .='<p class="tdTerceros result">'.mssql_result($rsNumeros1, $i, "numero").'</p>
';
					$i++;					
				}elseif($i>15&&$i<=20){
					$divForm .='<p class="tdCuartos result">'.mssql_result($rsNumeros1, $i, "numero").'</p>
';
					$i++;					
				}
			}
		
		}
		if ($numLetras > 0) {
			$divForm .= '<p>'.mssql_result($rsLetras, 0, "LETRA");
			for ($i = 1; $i < $numLetras; $i++) {
				 $divForm .= ' '.mssql_result($rsLetras, $i, "LETRA");
	
			}
			$divForm .= '</p>
';
		} else {
			$divForm .= '<p>-</p>
			';
		}
		
		$divForm .= '</div>';
	}
	
	if(strpos($quiniela,'Mendoza') !== false){
		$bMend++;
		$divMend .= '<div class="col-xs-3 col-sm-1" style="background-color:lavenderblush;" id='.substr($turno,0,1).'-'.substr(trim($quiniela),0,4).'>'.substr(trim($quiniela),0,4).'
';

		if(strpos($turno,'Los') !== false){
			$divMend .= '<p>Prim.</p>
			';		
		} else {
			$divMend .= '<p>'.substr(trim($turno),0,4).'.</p>
			';
		}


		if ($numNumeros1 > 0) {
			$i=0;
			while($i < 20){
				if($i==0){
					$divMend .='<p class="tdPrimeros result cabeza">'.mssql_result($rsNumeros1, $i, "numero").'</p>
';
					$i++;
				}elseif($i>0&&$i<=5){
					$divMend .='<p class="tdPrimeros result">'.mssql_result($rsNumeros1, $i, "numero").'</p>
';
					$i++;
				}elseif($i>5&&$i<=10){
					$divMend .='<p class="tdSegundos result">'.mssql_result($rsNumeros1, $i, "numero").'</p>
';
					$i++;					
				}elseif($i>10&&$i<=15){
					$divMend .='<p class="tdTerceros result">'.mssql_result($rsNumeros1, $i, "numero").'</p>
';
					$i++;					
				}elseif($i>15&&$i<=20){
					$divMend .='<p class="tdCuartos result">'.mssql_result($rsNumeros1, $i, "numero").'</p>
';
					$i++;					
				}
			}
		
		}
		if ($numLetras > 0) {
			$divMend .= '<p>'.mssql_result($rsLetras, 0, "LETRA");
			for ($i = 1; $i < $numLetras; $i++) {
				 $divMend .= ' '.mssql_result($rsLetras, $i, "LETRA");
	
			}
			$divMend .= '</p>
';
		} else {
			$divMend .= '<p>-</p>
			';
		}
		
		$divMend .= '</div>';
	}
	
	if(strpos($quiniela,'Neuq') !== false){
		$bNeuq++;
		$divNeuq .= '<div class="col-xs-3 col-sm-1" style="background-color:lavenderblush;" id='.substr($turno,0,1).'-'.substr(trim($quiniela),0,4).'>Neuq
		';
		
		if(strpos($turno,'Los') !== false){
			$divNeuq .= '<p>Prim.</p>
			';		
		} else {
			$divNeuq .= '<p>'.substr(trim($turno),0,4).'.</p>
			';
		}


		if ($numNumeros1 > 0) {
			$i=0;
			while($i < 20){
				if($i==0){
					$divNeuq .='<p class="tdPrimeros result cabeza">'.mssql_result($rsNumeros1, $i, "numero").'</p>
';
					$i++;
				}elseif($i>0&&$i<=5){
					$divNeuq .='<p class="tdPrimeros result">'.mssql_result($rsNumeros1, $i, "numero").'</p>
';
					$i++;
				}elseif($i>5&&$i<=10){
					$divNeuq .='<p class="tdSegundos result">'.mssql_result($rsNumeros1, $i, "numero").'</p>
';
					$i++;					
				}elseif($i>10&&$i<=15){
					$divNeuq .='<p class="tdTerceros result">'.mssql_result($rsNumeros1, $i, "numero").'</p>
';
					$i++;					
				}elseif($i>15&&$i<=20){
					$divNeuq .='<p class="tdCuartos result">'.mssql_result($rsNumeros1, $i, "numero").'</p>
';
					$i++;					
				}
			}
		
		}
		if ($numLetras > 0) {
			$divNeuq .= '<p>'.mssql_result($rsLetras, 0, "LETRA");
			for ($i = 1; $i < $numLetras; $i++) {
				 $divNeuq .= ' '.mssql_result($rsLetras, $i, "LETRA");
	
			}
			$divNeuq .= '</p>
';
		} else {
			$divNeuq .= '<p>-</p>
			';
		}
		
		$divNeuq .= '</div>';
	}
	
	if(strpos($quiniela,'Oro') !== false){
		$bOro++;
		$divOro .= '<div class="col-xs-3 col-sm-1" style="background-color:lavenderblush;" id='.substr($turno,0,1).'-'.substr(trim($quiniela),0,4).'>'.substr(trim($quiniela),0,4).'
';
		
		if(strpos($turno,'Los') !== false){
			$divOro .= '<p>Prim.</p>
			';		
		} else {
			$divOro .= '<p>'.substr(trim($turno),0,4).'.</p>
			';
		}


		if ($numNumeros1 > 0) {
			$i=0;
			while($i < 20){
				if($i==0){
					$divOro .='<p class="tdPrimeros result cabeza">'.mssql_result($rsNumeros1, $i, "numero").'</p>
';
					$i++;
				}elseif($i>0&&$i<=5){
					$divOro .='<p class="tdPrimeros result">'.mssql_result($rsNumeros1, $i, "numero").'</p>
';
					$i++;
				}elseif($i>5&&$i<=10){
					$divOro .='<p class="tdSegundos result">'.mssql_result($rsNumeros1, $i, "numero").'</p>
';
					$i++;					
				}elseif($i>10&&$i<=15){
					$divOro .='<p class="tdTerceros result">'.mssql_result($rsNumeros1, $i, "numero").'</p>
';
					$i++;					
				}elseif($i>15&&$i<=20){
					$divOro .='<p class="tdCuartos result">'.mssql_result($rsNumeros1, $i, "numero").'</p>
';
					$i++;					
				}
			}
		
		}
		if ($numLetras > 0) {
			$divOro .= '<p>'.mssql_result($rsLetras, 0, "LETRA");
			for ($i = 1; $i < $numLetras; $i++) {
				 $divOro .= ' '.mssql_result($rsLetras, $i, "LETRA");
	
			}
			$divOro .= '</p>
';
		} else {
			$divOro .= '<p>-</p>
			';
		}
		
		$divOro .= '</div>';
	}
	
	if(strpos($quiniela,'Salta') !== false){
		$bSalt++;
		$divSalt .= '<div class="col-xs-3 col-sm-1" style="background-color:lavenderblush;" id='.substr($turno,0,1).'-'.substr(trim($quiniela),0,4).'>'.substr(trim($quiniela),0,4).'
';
		
		if(strpos($turno,'Los') !== false){
			$divSalt .= '<p>Prim.</p>
			';		
		} else {
			$divSalt .= '<p>'.substr(trim($turno),0,4).'.</p>
			';
		}

		if ($numNumeros1 > 0) {
			$i=0;
			while($i < 20){
				if($i==0){
					$divSalt .='<p class="tdPrimeros result cabeza">'.mssql_result($rsNumeros1, $i, "numero").'</p>
';
					$i++;
				}elseif($i>0&&$i<=5){
					$divSalt .='<p class="tdPrimeros result">'.mssql_result($rsNumeros1, $i, "numero").'</p>
';
					$i++;
				}elseif($i>5&&$i<=10){
					$divSalt .='<p class="tdSegundos result">'.mssql_result($rsNumeros1, $i, "numero").'</p>
';
					$i++;					
				}elseif($i>10&&$i<=15){
					$divSalt .='<p class="tdTerceros result">'.mssql_result($rsNumeros1, $i, "numero").'</p>
';
					$i++;					
				}elseif($i>15&&$i<=20){
					$divSalt .='<p class="tdCuartos result">'.mssql_result($rsNumeros1, $i, "numero").'</p>
';
					$i++;					
				}
			}
		
		}
		if ($numLetras > 0) {
			$divSalt .= '<p>'.mssql_result($rsLetras, 0, "LETRA");
			for ($i = 1; $i < $numLetras; $i++) {
				 $divSalt .= ' '.mssql_result($rsLetras, $i, "LETRA");
	
			}
			$divSalt .= '</p>
';
		} else {
			$divSalt .= '<p>-</p>
			';
		}
		
		$divSalt .= '</div>';
	}	
	
	if(strpos($quiniela,'Santa') !== false){
		$bStaF++;
		$divStaF .= '<div class="col-xs-3 col-sm-1" style="background-color:lavenderblush;" id='.substr($turno,0,1).'-'.substr(trim($quiniela),0,4).'>Sant.
		';
		
		if(strpos($turno,'Los') !== false){
			$divStaF .= '<p>Prim.</p>
			';		
		} else {
			$divStaF .= '<p>'.substr(trim($turno),0,4).'.</p>
			';
		}
		
		if ($numNumeros1 > 0) {
			$i=0;
			while($i < 20){
				if($i==0){
					$divStaF .='<p class="tdPrimeros result cabeza">'.mssql_result($rsNumeros1, $i, "numero").'</p>
';
					$i++;
				}elseif($i>0&&$i<=5){
					$divStaF .='<p class="tdPrimeros result">'.mssql_result($rsNumeros1, $i, "numero").'</p>
';
					$i++;
				}elseif($i>5&&$i<=10){
					$divStaF .='<p class="tdSegundos result">'.mssql_result($rsNumeros1, $i, "numero").'</p>
';
					$i++;					
				}elseif($i>10&&$i<=15){
					$divStaF .='<p class="tdTerceros result">'.mssql_result($rsNumeros1, $i, "numero").'</p>
';
					$i++;					
				}elseif($i>15&&$i<=20){
					$divStaF .='<p class="tdCuartos result">'.mssql_result($rsNumeros1, $i, "numero").'</p>
';
					$i++;					
				}
			}
		
		}
		if ($numLetras > 0) {
			$divStaF .= '<p>'.mssql_result($rsLetras, 0, "LETRA");
			for ($i = 1; $i < $numLetras; $i++) {
				 $divStaF .= ' '.mssql_result($rsLetras, $i, "LETRA");
	
			}
			$divStaF .= '</p>
';
		} else {
			$divStaF .= '<p>-</p>
			';
		}
		
		$divStaF .= '</div>';
	}	
	
	if(strpos($quiniela,'Santiago') !== false){
		$bSant++;
		$divSant .= '<div class="col-xs-3 col-sm-1" style="background-color:lavenderblush;" id='.substr($turno,0,1).'-'.substr(trim($quiniela),0,4).'>'.substr(trim($quiniela),0,4).'
';

		if(strpos($turno,'Los') !== false){
			$divSant .= '<p>Prim.</p>
			';		
		} else {
			$divSant .= '<p>'.substr(trim($turno),0,4).'.</p>
			';
		}
		
		if ($numNumeros1 > 0) {
			$i=0;
			while($i < 20){
				if($i==0){
					$divSant .='<p class="tdPrimeros result cabeza">'.mssql_result($rsNumeros1, $i, "numero").'</p>
';
					$i++;
				}elseif($i>0&&$i<=5){
					$divSant .='<p class="tdPrimeros result">'.mssql_result($rsNumeros1, $i, "numero").'</p>
';
					$i++;
				}elseif($i>5&&$i<=10){
					$divSant .='<p class="tdSegundos result">'.mssql_result($rsNumeros1, $i, "numero").'</p>
';
					$i++;					
				}elseif($i>10&&$i<=15){
					$divSant .='<p class="tdTerceros result">'.mssql_result($rsNumeros1, $i, "numero").'</p>
';
					$i++;					
				}elseif($i>15&&$i<=20){
					$divSant .='<p class="tdCuartos result">'.mssql_result($rsNumeros1, $i, "numero").'</p>
';
					$i++;					
				}
			}
		
		}
		if ($numLetras > 0) {
			$divSant .= '<p>'.mssql_result($rsLetras, 0, "LETRA");
			for ($i = 1; $i < $numLetras; $i++) {
				 $divSant .= ' '.mssql_result($rsLetras, $i, "LETRA");
	
			}
			$divSant .= '</p>
';
		} else {
			$divSant .= '<p>-</p>
			';
		}
		
		$divSant .= '</div>';
	}		
	
	if(strpos($quiniela,'Tucu') !== false){
		$bTucu++;
		$divTucu .= '<div class="col-xs-3 col-sm-1" style="background-color:lavenderblush;" id='.substr($turno,0,1).'-'.substr(trim($quiniela),0,4).'>Tucu';

		if(strpos($turno,'Los') !== false){
			$divTucu .= '<p>Prim.</p>
			';		
		} else {
			$divTucu .= '<p>'.substr(trim($turno),0,4).'.</p>
			';
		}
		
		if ($numNumeros1 > 0) {
			$i=0;
			while($i < 20){
				if($i==0){
					$divTucu .='<p class="tdPrimeros result cabeza">'.mssql_result($rsNumeros1, $i, "numero").'</p>
';
					$i++;
				}elseif($i>0&&$i<=5){
					$divTucu .='<p class="tdPrimeros result">'.mssql_result($rsNumeros1, $i, "numero").'</p>
';
					$i++;
				}elseif($i>5&&$i<=10){
					$divTucu .='<p class="tdSegundos result">'.mssql_result($rsNumeros1, $i, "numero").'</p>
';
					$i++;					
				}elseif($i>10&&$i<=15){
					$divTucu .='<p class="tdTerceros result">'.mssql_result($rsNumeros1, $i, "numero").'</p>
';
					$i++;					
				}elseif($i>15&&$i<=20){
					$divTucu .='<p class="tdCuartos result">'.mssql_result($rsNumeros1, $i, "numero").'</p>
';
					$i++;					
				}
			}
		
		}
		if ($numLetras > 0) {
			$divTucu .= '<p>'.mssql_result($rsLetras, 0, "LETRA");
			for ($i = 1; $i < $numLetras; $i++) {
				 $divTucu .= ' '.mssql_result($rsLetras, $i, "LETRA");
	
			}
			$divTucu .= '</p>
';
		} else {
			$divTucu .= '<p>-</p>
			';
		}
		$divTucu .= '</div>';
	}		

	mssql_free_result($rsNumeros1);
	mssql_free_result($rsLetras);
	//termina la tabla

} 
unset($idSorteo2);
mssql_close($dbhandle);

$count=$bNac+$bProv+$bCord+$bCorr+$bEntR+$bForm+$bMend+$bOro+$bNeuq+$bSalt+$bSant+$bStaF+$bTucu;

if($bNac>0){
	$container .= $divNacional;
}

if($bProv>0){
	$container .= $divProv;
}

if($bCord>0){
	$container .= $divCord;
}

if($bCorr>0){
	$container .= $divCorr;
}

if($bEntR>0){
	$container .= $divEntR;
}

if($bForm>0){
	$container .= $divForm;
}

if($bMend>0){
	$container .= $divMend;
}

if($bNeuq>0){
	$container .= $divNeuq;
}

if($bOro>0){
	$container .= $divOro;
}

if($bSalt>0){
	$container .= $divSalt;
}

if($bStaF>0){
	$container .= $divStaF;
}

if($bSant>0){
	$container .= $divSant;
}

if($bTucu>0){
	$container .= $divTucu;
}

$container .= ' 
</div>';

?>
<label for="busResul">Buscá tu jugada: </label>
<input id="busqResultado" type="number" name="busResul" maxlength="5" size="5"></input>
<!--<label for="redob">redoblona: </label>
<input id="redoblona" type="number" name="redob" maxlength="5" size="5"></input>-->
<?php

echo $container;
unset($container,$divNacional);

//-->

?>

<script language="javascript"><!--
//<![CDATA[
$("#resultadosQuinielas p.first").click(function(){
    //alert($(this).hasClass("selected"));
    if ($(this).parent(this).hasClass("selected")){
        $(this).parent(this).removeClass("selected");
    }else{
        $(this).parent(this).addClass("selected");
    }
	
});

$("#resultadosQuinielas p.result").click(function(){
    //alert($(this).hasClass("selected"));
    if ($(this).hasClass("selected")){
        $(this).removeClass("selected");
    }else{
        $(this).addClass("selected");
    }
	
	var num = $(this).text();
	var queryNum = num.substr(num.length-2);
	
	$("#resultadosQuinielas p.result").filter(function() {
        if($(this).text().substr($(this).text().length-2) === queryNum){
			if ($(this).hasClass("redob")){
				$(this).removeClass("redob");
			}else{
				$(this).addClass("redob");
			}
		}
		});
	
});

$("#busqResultado").on('keyup',function() {
	var arrayValores = document.getElementsByName("busResul")[0].value.split(" ");
	//var valorRedob = document.getElementsByName("redob")[0].value;
	var valores;
	$("#resultadosQuinielas p.result").each(function(){
			if ($(this).hasClass("encontrado")){
				$(this).removeClass("encontrado");
			}
			if ($(this).hasClass("acierto")){
				$(this).removeClass("acierto");
			}			
		});
	for (i=0; i<=arrayValores.length; i++){
		valores = valores + "," + arrayValores[i];
		if(String(arrayValores[i]).length > 1){

			$("#resultadosQuinielas p.result").filter(function() {
				if($(this).text().substr($(this).text().length-2) === String(arrayValores[i]).substr(String(arrayValores[i]).length-2)){
					if ($(this).hasClass("encontrado")){
						$(this).removeClass("encontrado");
					}else{
						$(this).addClass("encontrado");
					}
				}
			});

		}
		
		$("#resultadosQuinielas p.cabeza").filter(function() {
			if($(this).text() === arrayValores[i]){
				if ($(this).hasClass("acierto")){
					$(this).removeClass("acierto");
				}else{
					$(this).addClass("acierto");
				}
			}
		});
		
		/*if(valorRedob.length > 1){
			$("#resultadosQuinielas p.result").filter(function() {
			if($(this).text() === valorRedob){
				if ($(this).hasClass("acierto")){
					$(this).removeClass("acierto");
				}else{
					$(this).addClass("acierto");
				}
			}
		});
		}*/
	
	}
	
}).on('keydown', function(e) {
   var code = e.keyCode || e.which;
	if(code==8||code==46){
		$(this).val('');
		$("#resultadosQuinielas p.result").each(function(){
			if ($(this).hasClass("encontrado")){
				$(this).removeClass("encontrado");
			}
			if ($(this).hasClass("acierto")){
				$(this).removeClass("acierto");
			}			
		});
	}
 });
	
//]]>
--></script>

</body>
</html>
