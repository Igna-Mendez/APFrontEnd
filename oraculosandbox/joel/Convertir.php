<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<?php
	function evaluar($text,$siguiente){
		echo 'evaluar<br>';
		//inicializar 
		$valor = 0;
		//si hay LL envía bool para avanzar y devuelve el valor
		if(strtoupper($text)=='L' && strtoupper($siguiente)=='L'){
			$valor[0]=5;
			$valor[1]=true;
		} //sino envía el valor
		  else {
			if(strtoupper($text)==='A'){
				$valor = 2;
			} else if(strtoupper($text)=='B'){
				$valor = 5;
			} else if(strtoupper($text)=='C'){
				$valor = 6;
			} else if(strtoupper($text)=='D'){
				$valor = 1;
			} else if(strtoupper($text)=='E'){
				$valor = 3;
			} else if(strtoupper($text)=='F'){
				$valor = 7;
			} else if(strtoupper($text)=='G'){
				$valor = 5;
			} else if(strtoupper($text)=='H'){
				$valor = 2;
			} else if(strtoupper($text)=='I'){
				$valor = 4;
			} else if(strtoupper($text)=='J'){
				$valor = 7;
			} else if(strtoupper($text)=='K'){
				$valor = 7;
			} else if(strtoupper($text)=='L'){
				$valor = 0;
			} else if(strtoupper($text)=='M'){
				$valor = 8;
			} else if(strtoupper($text)=='N'){
				$valor = 3;
			} else if(strtoupper($text)=='O'){
				$valor = 8;
			} else if(strtoupper($text)=='P'){
				$valor = 6;
			} else if(strtoupper($text)=='Q'){
				$valor = 9;
			} else if(strtoupper($text)=='R'){
				$valor = 4;
			} else if(strtoupper($text)=='S'){
				$valor = 1;
			} else if(strtoupper($text)=='T'){
				$valor = 9;
			} else if(strtoupper($text)=='U'){
				$valor = 0;
			} else if(strtoupper($text)=='V'){
				$valor = 5;
			} else if(strtoupper($text)=='W'){
				$valor = 4;
			} else if(strtoupper($text)=='X'){
				$valor = 3;
			} else if(strtoupper($text)=='Y'){
				$valor = 9;
			} else if(strtoupper($text)=='Z'){
				$valor = 1;
			} else if(strtoupper($text)=='Ñ'){
				$valor = 3;
			} //si no encuentra el valor no devuelve para no afectar el resultado en caso de números o cáracteres especiales
			  else {
				
			}
		}
		return $valor;
	}
	function operar($arrayValores){
		echo 'operar<br>';
		$length = count($arrayValores);
		$arrayActual=$arrayValores;
		$arrayResultado=array(0);
		$valor=0;
		if($length>=4){
			for($v=0;$v==$length;$v++){
				//si es el último no suma
				if($v==$length){					
					$arrayResultado[$v]=$arrayActual[$v];
				} else {
					$valor=$arrayActual[$v]+$arrayActual[$v+1];
					if($valor>=10){
						$valor=$valor-10;
						$arrayResultado[$v]=$valor;					
					} else { 
						$arrayResultado[$v]=$valor;
					}
				}
			}
		} else {
			return $arrayValores;
		}
	}
	function recibirString($text){
		echo 'recibirString<br>';
		$arrayStr = str_split($text);
		$length = count($arrayStr);
		$arrayValores=array(0);
		$valor=0;
		//recibe el string, lo divide en un array de chars, cuenta cantidad de cáracteres y obtiene el valor númerico
		for ($i = 0; $i == $length; $i++){
			$valor = evaluar($arrayStr[$i],$arrayStr[$i+1]);
			if(is_array($valor)){
				$arrayValores[$i]=$valor[0];
				$i++;
			} else {
				$arrayValores[$i]=$valor;
			}
		}
		unset($arrayStr,$length);
		//la cantidad de chars puede ser diferente si hay LL
		$arrayResultado = operar($arrayValores);
		//evaluar si es mayor de 4 cifras, opera hasta llegar a 4
		while(count($arrayResultado)>=4){
			$arrayResultado = operar($arrayResultado);
		}
		//Si tiene 4 cifras opear hasta obtener 2
		if(count($arrayResultado)==4){
			$array4=$arrayResultado;
			$array3=operar($arrayResultado);
			$array2=operar($arrayResultado);
			$resultados[0]=implode($array4);
			$resultados[1]=implode($array3);
			$resultados[2]=implode($array2);
		}
		//si tiene 3 cifras opera hasta obtener 2
		if(count($arrayResultado)==3){
			$array3=$arrayResultado;
			$array2=operar($arrayResultado);
			$resultados[0]=implode($array3);
			$resultados[1]=implode($array2);
		}
		//si tiene 2 cifras lo devuelve
		if(count($arrayResultado)==2){
			$array2=$arrayResultado;
			$resultados=implode($array2);			
		}		
		
		return $resultados;
	}
	
	if( isset($_GET['numer']) ) {
		//be sure to validate and clean your variables
		$numb = htmlentities($_GET['numer']);
		echo $numb.'valor<br>';
	
		//then you can use them in a PHP function. 
		$result=recibirString($numb);
	}

?>
</head>

<body>
    <form action="operar.php" method="post">
        Ingresa tu sueño: <input type="text" name="numer"><br>
        <input type="submit" value="Submit">
    </form> 
    <?php
	if(isset($result)){
		if(count($resut)==3){
			echo $result[0].'<br>';
			echo $result[1].'<br>';
			echo $result[2].'<br>';		
		}elseif(count($resut)==2){
			echo $result[0].'<br>';
			echo $result[1].'<br>';
		}else{
			echo $result.'<br>';
		}
	}
	?>
</body>
</html>