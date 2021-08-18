<?php
/*
<--
*/

function getCabezas(){
	include("connections/oculto.inc");
	$idQuiniela = "";
	$idSorteo = "";
	$nroSorteo = "";
	$num = 0;
	$fs = "";
	$url=$_SERVER['REQUEST_URI'];
	
	 //conección a la base de datos
	$dbhandle = mssql_connect($myServer, $myUser, $myPass)
	 or die("Couldn't connect to SQL Server on $myServer"); 
	
	 //selección de base de datos
	$selected = mssql_select_db($myDB, $dbhandle)
	  or die("Couldn't open database $myDB"); 
	 
	
	//Obtiene sorteo con datos actuales
	$querySorteoPublicado = "select * from sorteo_publicado";
	
	$rsSorteo = mssql_query($querySorteoPublicado, $dbhandle)
		or die('Ocurrio un error: ' . mssql_get_last_message().' - Query: '.$querySorteoPublicado);
	
	$num = mssql_num_rows($rsSorteo);
	
	
	if($num>0){
		$divs='
		<div class="center wow fadeInDown">
				<h2>'.mssql_result($rsSorteo, 0, "fecha").'</h2>
		</div>
		<div class="row">
			<div class="features">';
	
	
		for ($i=0;$i<=$num-1;$i++){
			// idquiniela
			// 1=nacional 2=provincia 3=oro 5=santiago 6=corrientes 7=tucumán 11=santa fé 12=córdoba 13=Mendoza 14=neuquén 15=salta  17=Entre Ríos
			print_r(mssql_result($rsSorteo, $i, "losprimeros").mssql_result($rsSorteo, $i, "matutina").mssql_result($rsSorteo, $i, "vespertina").mssql_result($rsSorteo, $i, "nocturna"));
			if(mssql_result($rsSorteo, $i, "losprimeros") || mssql_result($rsSorteo, $i, "matutina") || mssql_result($rsSorteo, $i, "vespertina") || mssql_result($rsSorteo, $i, "nocturna") != "--"){
				$divs .= '			<div class="col-md-3 col-sm-4 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
			<div class="feature-wrap">
				<table id="maintable" class="table col-sm-12 table-striped table-bordered table-hover table-condensed">
					<thead>
						<tr>
							<a href="http://www.oraculosemanal.com/_testing3/Visualizaciones/iframeSorteos.asp?idQuiniela='.mssql_result($rsSorteo, $i, "idQuinielaP").'">'.iconv('Windows-1252', 'UTF-8//TRANSLIT', mssql_result($rsSorteo, $i, "quiniela")).'</a>
						</tr>
					</thead>
	
					<tbody>
						<tr> <td> <a href="http://www.oraculosemanal.com/_testing3/Visualizaciones/iframeSorteos.asp?idQuiniela='.mssql_result($rsSorteo, $i, "idQuinielaP").'">'.mssql_result($rsSorteo, $i, "losprimeros").'</a> </tr> </td>
						<tr> <td> <a href="http://www.oraculosemanal.com/_testing3/Visualizaciones/iframeSorteos.asp?idQuiniela='.mssql_result($rsSorteo, $i, "idQuinielaP").'">'.mssql_result($rsSorteo, $i, "matutina").'</a> </tr> </td>
						<tr> <td> <a href="http://www.oraculosemanal.com/_testing3/Visualizaciones/iframeSorteos.asp?idQuiniela='.mssql_result($rsSorteo, $i, "idQuinielaP").'">'.mssql_result($rsSorteo, $i, "vespertina").'</a> </tr> </td>
						<tr> <td> <a href="http://www.oraculosemanal.com/_testing3/Visualizaciones/iframeSorteos.asp?idQuiniela='.mssql_result($rsSorteo, $i, "idQuinielaP").'">'.mssql_result($rsSorteo, $i, "nocturna").'</a> </tr> </td>
					</tbody>
				</table>
			</div>
		</div><!--/.col-md-4-->';
			}
		}
		$divs .= '        </div><!--/.services-->
	</div><!--/.row-->
		';
		return $divs;
	}
}

?>