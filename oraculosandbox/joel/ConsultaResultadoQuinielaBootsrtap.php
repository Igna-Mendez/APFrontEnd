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
 
$parts = parse_url($url);
parse_str($parts['idQuiniela'], $queryIdQuiniela);
parse_str($parts['nroSorteo'], $queryNroSorteo);
parse_str($parts['fechaSorteo'], $queryFechaSorteo);
parse_str($parts['turno'], $queryTurno);
/*echo "<br>".$queryIdQuiniela['idQuiniela']. "<br />";
echo "<br>".$queryNroSorteo['nroSorteo']. "<br />";
echo "<br>".$queryFechaSorteo['fechaSorteo']. "<br />";
echo "<br>".$queryTurno['turno']. "<br />";*/

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
		//$fechaSorteo = '11/26/2015 12:00:00 AM';

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

#maintable {border-collapse:collapse;}
#maintable tr:hover {background-color: #FFFFAA;}
#maintable tr.selected td {
	background: none repeat scroll 0 0 #FFCF8B;
	color: #000000;
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
 <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<!--script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>
<script src="js/vendor/bootstrap.min.js"></script-->

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

$container = '<div class="container-fluid"> ';
$container .= '<div align="center" class="Estilo2">'.$fs.'</div> ';

$rowHeaders = '<th> </th>
';

$tr1='<tr> <td>Turno</td>
';
$tr2='<tr> <td class="first">1</td>
';
$tr3='<tr> <td class="first">2</td>
';
$tr4='<tr> <td class="first">3</td>
';
$tr5='<tr> <td class="first">4</td>
';
$tr6='<tr> <td class="first">5</td>
';
$tr7='<tr> <td class="first">6</td>
';
$tr8='<tr> <td class="first">7</td>
';
$tr9='<tr> <td class="first">8</td>
';
$tr10='<tr> <td class="first">9</td>
';
$tr11='<tr> <td class="first">10</td>
';
$tr12='<tr> <td class="first">11</td>
';
$tr13='<tr> <td class="first">12</td>
';
$tr14='<tr> <td class="first">13</td>
';
$tr15='<tr> <td class="first">14</td>
';
$tr16='<tr> <td class="first">15</td>
';
$tr17='<tr> <td class="first">16</td>
';
$tr18='<tr> <td class="first">17</td>
';
$tr19='<tr> <td class="first">18</td>
';
$tr20='<tr> <td class="first">19</td>
';
$tr21='<tr> <td class="first">20</td>
';
$tr22='<tr> <td>Letras</td>
';

/*
function cargarHeaderTurno($numIte,$quin,$tur,$header,$row){
	if(strpos($quin,'Córdoba') !== false){
		$header .=' <th>Cord.</th>
		 ';
		 if(strpos($tur,'Los') !== false){
			$row .= '<td id="'.$numIte.'-Cord">Prim.</td>
			';		
		} else {
			$row .= '<td id="'.$numIte.'-Cord">'.substr(trim($tur),0,4).'.</td>
			';
		}
	} else {
		$header .=' <th>'.substr(trim($quin),0,4).'.</th>
		 ';
		 if(strpos($turno,'Los') !== false){
			$row .= '<td id="'.$numIte.'-'.substr(trim($quin),0,4).'">Prim.</td>
			';		
		} else {
			$row .= '<td id="'.$numIte.'-'.substr(trim($quin),0,4).'">'.substr(trim($tur),0,4).'.</td>
			';
		}
	}
	
	return array($header,$row);
}
*/


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
	
	
	//Cuenta cantidad por Quiniela
		//Carga la tabla, header y turno
	/*
	if(strpos($quiniela,'Nacional') !== false){
		$bNac++;
		$carga=cargarHeaderTurno($bNac,$quiniela,$turno,$rowHeaders,$tr1);
		$rowHeaders.=$carga[0];
		$tr1.=$carga[1];
	}
	
	if(strpos($quiniela,'Provincia') !== false){
		$bProv++;
		cargarHeaderTurno($bProv,$quiniela,$turno,$rowHeaders,$tr1);
		$rowHeaders.=$carga[0];
		$tr1.=$carga[1];
	}
	
	if(strpos($quiniela,'doba') !== false){
		$bCord++;
		cargarHeaderTurno($bCord,$quiniela,$turno,$rowHeaders,$tr1);
		$rowHeaders.=$carga[0];
		$tr1.=$carga[1];
	}
	
	if(strpos($quiniela,'Corrientes') !== false){
		$bCorr++;
		cargarHeaderTurno($bCorr,$quiniela,$turno,$rowHeaders,$tr1);
		$rowHeaders.=$carga[0];
		$tr1.=$carga[1];
	}

	if(strpos($quiniela,'Entre') !== false){
		$bEntR++;
		cargarHeaderTurno($bEntR,$quiniela,$turno,$rowHeaders,$tr1);
		$rowHeaders.=$carga[0];
		$tr1.=$carga[1];
	}
	
	if(strpos($quiniela,'Formosa') !== false){
		$bForm++;
		cargarHeaderTurno($bForm,$quiniela,$turno,$rowHeaders,$tr1);
		$rowHeaders.=$carga[0];
		$tr1.=$carga[1];
	}
	
	if(strpos($quiniela,'Mendoza') !== false){
		$bMend++;
		cargarHeaderTurno($bMend,$quiniela,$turno,$rowHeaders,$tr1);
		$rowHeaders.=$carga[0];
		$tr1.=$carga[1];
	}
	
	if(strpos($quiniela,'Neuq') !== false){
		$bNeuq++;
		cargarHeaderTurno($bNeuq,$quiniela,$turno,$rowHeaders,$tr1);
		$rowHeaders.=$carga[0];
		$tr1.=$carga[1];
	}
	
	if(strpos($quiniela,'Oro') !== false){
		$bOro++;
		cargarHeaderTurno($bOro,$quiniela,$turno,$rowHeaders,$tr1);
		$rowHeaders.=$carga[0];
		$tr1.=$carga[1];
	}
	
	if(strpos($quiniela,'Salta') !== false){
		$bSalt++;
		cargarHeaderTurno($bSalt,$quiniela,$turno,$rowHeaders,$tr1);
		$rowHeaders.=$carga[0];
		$tr1.=$carga[1];
	}	
	
	if(strpos($quiniela,'Santa') !== false){
		$bStaF++;
		cargarHeaderTurno($bStaF,$quiniela,$turno,$rowHeaders,$tr1);
		$rowHeaders.=$carga[0];
		$tr1.=$carga[1];
	}	
	
	if(strpos($quiniela,'Santiago') !== false){
		$bSant++;
		cargarHeaderTurno($bSant,$quiniela,$turno,$rowHeaders,$tr1);
		$rowHeaders.=$carga[0];
		$tr1.=$carga[1];
	}		
	
	if(strpos($quiniela,'Tucu') !== false){
		$bTucu++;
		cargarHeaderTurno($bTucu,$quiniela,$turno,$rowHeaders,$tr1);
		$rowHeaders.=$carga[0];
		$tr1.=$carga[1];
	}
	unset($carga);
	*/
	if(strpos($quiniela,'doba') !== false){
		$rowHeaders .=' <th>Córd.</th>
		 ';		
	} else {
		$rowHeaders .=' <th>'.substr(trim($quiniela),0,4).'.</th>
		 ';		
	}
	
	if(strpos($turno,'Los') !== false){
		$tr1 .= '<td id="'.$iteracion.'-'.substr(trim($quiniela),0,4).'">Prim.</td>
		';		
	} else {
		$tr1 .= '<td id="'.$iteracion.'-'.substr(trim($quiniela),0,4).'">'.substr(trim($turno),0,4).'.</td>
		';
	}

	
	//Carga los números
	
	for ($i = 0; $i <= $numNumeros1; $i++) {
		if($i==0){
			$tr2.='<td class="tdPrimeros result cabeza">'.mssql_result($rsNumeros1, $i, "numero").'</td>';
		}
		if($i==1){
			$tr3.='<td class="tdPrimeros result">'.mssql_result($rsNumeros1, $i, "numero").'</td>';
		}
		if($i==2){
			$tr4.='<td class="tdPrimeros result">'.mssql_result($rsNumeros1, $i, "numero").'</td>';
		}
		if($i==3){
			$tr5.='<td class="tdPrimeros result">'.mssql_result($rsNumeros1, $i, "numero").'</td>';
		}
		if($i==4){
			$tr6.='<td class="tdPrimeros result">'.mssql_result($rsNumeros1, $i, "numero").'</td>';
		}
		if($i==5){
			$tr7.='<td class="tdSegundos result">'.mssql_result($rsNumeros1, $i, "numero").'</td>';
		}
		if($i==6){
			$tr8.='<td class="tdSegundos result">'.mssql_result($rsNumeros1, $i, "numero").'</td>';
		}
		if($i==7){
			$tr9.='<td class="tdSegundos result">'.mssql_result($rsNumeros1, $i, "numero").'</td>';
		}
		if($i==8){
			$tr10.='<td class="tdSegundos result">'.mssql_result($rsNumeros1, $i, "numero").'</td>';
		}
		if($i==9){
			$tr11.='<td class="tdSegundos result">'.mssql_result($rsNumeros1, $i, "numero").'</td>';
		}
		if($i==10){
			$tr12.='<td class="tdTerceros result">'.mssql_result($rsNumeros1, $i, "numero").'</td>';
		}
		if($i==11){
			$tr13.='<td class="tdTerceros result">'.mssql_result($rsNumeros1, $i, "numero").'</td>';
		}
		if($i==12){
			$tr14.='<td class="tdTerceros result">'.mssql_result($rsNumeros1, $i, "numero").'</td>';
		}
		if($i==13){
			$tr15.='<td class="tdTerceros result">'.mssql_result($rsNumeros1, $i, "numero").'</td>';
		}
		if($i==14){
			$tr16.='<td class="tdTerceros result">'.mssql_result($rsNumeros1, $i, "numero").'</td>';
		}
		if($i==15){
			$tr17.='<td class="tdCuartos result">'.mssql_result($rsNumeros1, $i, "numero").'</td>';
		}
		if($i==16){		
			$tr18.='<td class="tdCuartos result">'.mssql_result($rsNumeros1, $i, "numero").'</td>';
		}
		if($i==17){
			$tr19.='<td class="tdCuartos result">'.mssql_result($rsNumeros1, $i, "numero").'</td>';
		}
		if($i==18){
			$tr20.='<td class="tdCuartos result">'.mssql_result($rsNumeros1, $i, "numero").'</td>';
		}
		if($i==19){
			$tr21.='<td class="tdCuartos result">'.mssql_result($rsNumeros1, $i, "numero").'</td>';
		}

	}
		
	//Carga las letras
	
	if($numLetras > 0){
		$tr22 .= '<td>'.mssql_result($rsLetras, 0, "LETRA");
		for ($i = 1; $i < $numLetras; $i++) {
			 $tr22 .= ' '.mssql_result($rsLetras, $i, "LETRA");

		}
		$tr22.='</td>';
	}else{
		$tr22.='<td> </td>';
	}

	mssql_free_result($rsNumeros1);
	mssql_free_result($rsLetras);
	//termina la tabla

} 
unset($idSorteo2);
mssql_close($dbhandle);

$tr1.='</tr>
';
$tr2.='</tr>
';
$tr3.='</tr>
';
$tr4.='</tr>
';
$tr5.='</tr>
';
$tr6.='</tr>
';
$tr7.='</tr>
';
$tr8.='</tr>
';
$tr9.='</tr>
';
$tr10.='</tr>
';
$tr11.='</tr>
';
$tr12.='</tr>
';
$tr13.='</tr>
';
$tr14.='</tr>
';
$tr15.='</tr>
';
$tr16.='</tr>
';
$tr17.='</tr>
';
$tr18.='</tr>
';
$tr19.='</tr>
';
$tr20.='</tr>
';
$tr21.='</tr>
';
$tr22.='</tr>
';

$container .= ' <table id="maintable" class="table col-sm-12 table-striped table-bordered table-hover table-condensed">
 ';
$container .= ' <thead>
	<tr>
 ';

$container .= ' '.$rowHeaders.' 
	</tr>
</thead>

<tbody>
 ';

$container .=$tr1.'
'.$tr2.'
'.$tr3.'
'.$tr4.'
'.$tr5.'
'.$tr6.'
'.$tr7.'
'.$tr8.'
'.$tr9.'
'.$tr10.'
'.$tr11.'
'.$tr12.'
'.$tr13.'
'.$tr14.'
'.$tr15.'
'.$tr16.'
'.$tr17.'
'.$tr18.'
'.$tr19.'
'.$tr20.'
'.$tr21.'
'.$tr22;


$container .= '
	</tbody>
</table> 
</div>';
?>
<label for="busResul">Buscá tu jugada: </label>
<input id="busqResultado" type="number" name="busResul"></input>
<?php
echo $container;
unset($container);

//-->

?>
<label for="jugada">Jugada: </label>
<input type="text" id="jugada"></input>
<script language="javascript"><!--
//<![CDATA[
$("#maintable td.first").click(function(){
    //alert($(this).hasClass("selected"));
    if ($(this).parent(this).hasClass("selected")){
        $(this).parent(this).removeClass("selected");
    }else{
        $(this).parent(this).addClass("selected");
    }
	
});

$("#maintable td.result").click(function(){
    //alert($(this).hasClass("selected"));
    if ($(this).hasClass("selected")){
        $(this).removeClass("selected");
    }else{
        $(this).addClass("selected");
    }
	
	var num = $(this).text();
	var queryNum = num.substr(num.length-2);
	
	$("#maintable td.result").filter(function() {
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
	var valores;
	for (i=0; i<=arrayValores.length; i++){
		valores = valores + "," + arrayValores[i];
		if(String(arrayValores[i]).length == 5 || String(arrayValores[i]).length == 4 || String(arrayValores[i]).length == 3){
			$("#maintable td.result").filter(function() {
				if($(this).text().substr($(this).text().length-2) === String(arrayValores[i]).substr(String(arrayValores[i]).length-2)){
					if ($(this).hasClass("encontrado")){
						$(this).removeClass("encontrado");
					}else{
						$(this).addClass("encontrado");
					}
				}
				});
		}
		
		$("#maintable td.cabeza").filter(function() {
			if($(this).text() === arrayValores[i]){
				if ($(this).hasClass("acierto")){
					$(this).removeClass("acierto");
				}else{
					$(this).addClass("acierto");
				}
			}
		});
	
		
		$("#jugada").val(valores);	
	}
	
}).on('keydown', function(e) {
   var code = e.keyCode || e.which;
	if(code==8||code==46){
		$(this).val('');
		$("#maintable td.result").each(function(){
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
