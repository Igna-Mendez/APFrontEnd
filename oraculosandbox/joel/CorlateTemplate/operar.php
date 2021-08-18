<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<?php


function getDBCoincidences($str) {
	include("connections/oculto.inc");
	
	 //conección a la base de datos
	$dbhandle = mssql_connect($myServer, $myUser, $myPass)
	 or die("Couldn't connect to SQL Server on $myServer"); 
	
	 //selección de base de datos
	$selected = mssql_select_db($myDB, $dbhandle)
	  or die("Couldn't open database $myDB"); 
	
	$queryCoincidences = "select * FROM pabloseb_oraculosemanal.dbo.BusquedaNumeros where id in (".$str.')';
	
	$rsCoincidences = mssql_query($queryCoincidences, $dbhandle)
		or die('Ocurrio un error: ' . mssql_get_last_message().' - Query: '.$queryCoincidences);

	if(mssql_num_rows($rsCoincidences) > 0) {		
		//0 -> Id | 1 -> oficios | 2 -> sueños1 | 3 -> simpaticos1 | 4 -> simpaticos2 | 5 -> datelli | 6 -> animales | 7 -> sueños2
			
		$divs .= '			<div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
			<div class="feature-wrap">
				<a href="http://www.oraculosemanal.com/oficios.htm">Oficio: '.iconv('Windows-1252', 'UTF-8//TRANSLIT', mssql_result($rsCoincidences, 0, 1)).'</a>
			</div>
		</div><!--/.col-md-4-->';
		$divs .= '			<div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
			<div class="feature-wrap">
				<a href="http://www.oraculosemanal.com/suenios.htm">Soñó con: '.iconv('Windows-1252', 'UTF-8//TRANSLIT', mssql_result($rsCoincidences, 0, 2)).'</a>
			</div>
		</div><!--/.col-md-4-->';
		$divs .= '			<div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
			<div class="feature-wrap">
				<a href="http://www.oraculosemanal.com/martingala1.htm">Martingala Números simpaticos 1:'.iconv('Windows-1252', 'UTF-8//TRANSLIT', mssql_result($rsCoincidences, 0, 3)).'</a>
			</div>
		</div><!--/.col-md-4-->';
		$divs .= '			<div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
			<div class="feature-wrap">
				<a href="http://www.oraculosemanal.com/martingala2.htm">Martingala Números simpaticos 2:'.iconv('Windows-1252', 'UTF-8//TRANSLIT', mssql_result($rsCoincidences, 0, 4)).'</a>
			</div>
		</div><!--/.col-md-4-->';
		$divs .= '			<div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
			<div class="feature-wrap">
				<a href="http://www.oraculosemanal.com/tablita.htm">Tablita Datelli: '.iconv('Windows-1252', 'UTF-8//TRANSLIT', mssql_result($rsCoincidences, 0, 5)).'</a>
			</div>
		</div><!--/.col-md-4-->';
		$divs .= '			<div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
			<div class="feature-wrap">
				<a href="http://www.oraculosemanal.com/animales.htm">Amimal: '.iconv('Windows-1252', 'UTF-8//TRANSLIT', mssql_result($rsCoincidences, 0, 6)).'</a>
			</div>
		</div><!--/.col-md-4-->';
		$divs .= '			<div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
			<div class="feature-wrap">
				<a href="">Sueños: '.iconv('Windows-1252', 'UTF-8//TRANSLIT', mssql_result($rsCoincidences, 0, 7)).'</a>
			</div>
		</div><!--/.col-md-4-->';
		
		mssql_free_result($rsCoincidences);
		return $divs;
		
	} else {
		
		return 'No se Encontro una coincidencia, consulte nuestras tablas';
	}
}

function str_split_unicode($str, $length = 1) {
	$tmp = preg_split('~~u', $str, -1, PREG_SPLIT_NO_EMPTY);
	if ($length > 1) {
		$chunks = array_chunk($tmp, $length);
		foreach ($chunks as $i => $chunk) {
			$chunks[$i] = join('', (array) $chunk);
		}
		$tmp = $chunks;
	}
	return $tmp;
}

function evaluar($text,$siguiente){
	
	//inicializar 
	$valor=0;
	$elie = array(0,false);
	
	//si hay LL envía bool para avanzar y devuelve el valor
	if(strtoupper($text)=='L' && strtoupper($siguiente)=='L'){
		$elie[0]=9;
		$elie[1]=true;
		return $elie;
	} //sino envía el valor
	  else {
		if(strtoupper($text)=='A' || strtoupper($text)=='Á' || strtoupper($text)=='á' || strtoupper($text)=='H'){
			$valor = 2;
		} else if(strtoupper($text)=='D' || strtoupper($text)=='S' || strtoupper($text)=='Z'){
			$valor = 1;
		} else if(strtoupper($text)=='E' || strtoupper($text)=='É' || strtoupper($text)=='é' || strtoupper($text)=='N' || strtoupper($text)=='X' || strtoupper($text)=='Ñ'){
			$valor = 3;
		} else if(strtoupper($text)=='I' || strtoupper($text)=='Í' || strtoupper($text)=='í' || strtoupper($text)=='R'){
			$valor = 4;
		} else if(strtoupper($text)=='B' || strtoupper($text)=='G' || strtoupper($text)=='V' || strtoupper($text)=='W'){
			$valor = 5;
		} else if(strtoupper($text)=='C' || strtoupper($text)=='P'){
			$valor = 6;
		} else if(strtoupper($text)=='F' || strtoupper($text)=='J' || strtoupper($text)=='K'){
			$valor = 7;
		} else if(strtoupper($text)=='O' || strtoupper($text)=='Ó' || strtoupper($text)=='ó' || strtoupper($text)=='M'){
			$valor = 8;
		} else if(strtoupper($text)=='Q' || strtoupper($text)=='T' || strtoupper($text)=='Y'){
			$valor = 9;
		} else if(strtoupper($text)=='U' || strtoupper($text)=='Ú' || strtoupper($text)=='ú' || strtoupper($text)=='L'){
			$valor = 0;
		} //si no encuentra el valor no devuelve nada para no afectar el resultado en caso de números o cáracteres especiales
		  else {
			return;
		}
	}
	return $valor;
}
function operar($arrayValores){
	$length = count($arrayValores);
	$arrayActual=$arrayValores;
	$arrayResultado=array();
	$valor=0;
	$v=0;
	$arrayKeys = array_keys($arrayActual);
	$lastArrayKey = array_pop($arrayKeys);
	if($length>=4){
		foreach($arrayActual as $v => $actual){
			//si es el último no suma
			if($v==$lastArrayKey){					
				
			} else {
				$valor=$actual+$arrayActual[$v+1];
				if($valor>=10){
					$valor=$valor-10;
					$arrayResultado[$v]=$valor;					
				} else { 
					$arrayResultado[$v]=$valor;
				}
			}
		}
		return $arrayResultado;
	} else {
		return $arrayValores;
	}
}
function operar2($arrayValores){
	$length = count($arrayValores);
	$arrayActual=$arrayValores;
	$arrayResultado=array();
	$valor=0;
	$v=0;
	$arrayKeys = array_keys($arrayActual);
	$lastArrayKey = array_pop($arrayKeys);
	
	foreach($arrayActual as $v => $actual){
		//si es el último no suma
		if($v==$lastArrayKey){					
			
		} else {
			$valor=$actual+$arrayActual[$v+1];
			if($valor>=10){
				$valor=$valor-10;
				$arrayResultado[$v]=$valor;					
			} else { 
				$arrayResultado[$v]=$valor;
			}
		}
	}
	return $arrayResultado;
	
}
function recibirString($text){
	if(is_array($text)){
		$text = implode($text);
	}
	//remover espacios en blanco
	$text = preg_replace('/\s+/', '', $text);
	$arrayStr = str_split_unicode($text);
	$arrayValores=array();
	
	//recibe el string, lo divide en un array de chars, cuenta cantidad de cáracteres y obtiene el valor númerico
	$arrayKeys = array_keys($arrayStr);
	$lastArrayKey = array_pop($arrayKeys);		
	foreach ($arrayStr as $i => $elem){
		$valor=0;
		if($i<>$lastArrayKey){
			$valor = evaluar($elem,$arrayStr[$i+1]);
			if(is_array($valor)){
				$arrayValores[$i]=$valor[0];
				$i++;
			} else {
				$arrayValores[$i]=$valor;
			}
		} else {
			$arrayValores[$i] = evaluar($elem,'');
			
		}
		unset($valor);
	}
	unset($arrayStr);
	//la cantidad de chars puede ser diferente si hay LL
	$arrayValores=array_filter($arrayValores, create_function('$a','return preg_match("#\S#", $a);'));

	$arrayResultado = operar($arrayValores);
	

	//evaluar si es mayor de 4 cifras, opera hasta llegar a 4

	for($o=0; ;$o++){
		$tmp = array();
		$tmp = operar($arrayResultado);
		$arrayResultado = $tmp;

		if(count($tmp)<=4 || $o > 150){
			break;
		}
	}

	//Si tiene 4 cifras opear hasta obtener 2
	if(count($arrayResultado)==4){
		$array3=operar2($arrayResultado);
		$array2=operar2($array3);
		$resultados[0]=implode($arrayResultado);
		$resultados[1]=implode($array3);
		$resultados[2]=implode($array2);
	}
	//si tiene 3 cifras opera hasta obtener 2
	if(count($arrayResultado)==3){
		$array2=operar2($arrayResultado);
		$resultados[0]=implode($arrayResultado);
		$resultados[1]=implode($array2);
	}
	//si tiene 2 cifras lo devuelve
	if(count($arrayResultado)==2||count($arrayResultado)==1){
		$resultados=implode($arrayResultado);
	}		

	return $resultados;
}

if( isset($_POST['numer']) ) {
	if($_POST['numer']!=''){
		$result=recibirString($_POST['numer']);
	}
}
if( isset($_POST['numeros'])) {
	if($_POST['numeros']!=''){
		$coincidencias=getDBCoincidences($_POST['numeros']);		
	}
	
	
}

?>
</head>

<body>
    <form action="operar.php" method="post">
        Ingresa tu sueño: <input type="text" name="numer"><br>
        Busca tu número: <input type="text" name="numeros"><br>
        <input type="submit" value="Submit">
    </form> 
    <?php 	
		if(count($result)==3){
			echo $result[0].'<br>';
			echo $result[1].'<br>';
			echo $result[2].'<br>';		
		}elseif(count($result)==2){
			echo $result[0].'<br>';
			echo $result[1].'<br>';
		}else{
			echo $result.'<br>';
		}
		if(gettype($coincidencias)==string || gettype($coincidencias)=='NULL'){
			print_r($coincidencias);
		}else{
			echo $coincidencias;
		}

	?>
</body>
</html>