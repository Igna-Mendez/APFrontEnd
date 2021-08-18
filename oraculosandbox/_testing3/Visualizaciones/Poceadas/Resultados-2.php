<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="style_poceadas.css">
<script src="http://code.jquery.com/jquery-latest.js"></script>

<script type="text/javascript">
function actualiza(turno){
     $("#container").load("Resultados-2.php?turno="+turno);
  }
  setInterval( "actualiza()", 1000000 );
</script>


</head>

<body>

<?PHP
  Include ('Coneccion.php');

  $Turno_id = $_GET['turno'];
  $t=$Turno_id ;

  $dia = $_GET['dia'];
  $Mes = $_GET['Mes'];
  $anio = $_GET['anio'];

  $fecha = getdate();
  $anio_actual = $fecha[year];

  if(($anio == "") and ($Mes == "") and ( $dia == ""))
  {
    $fecha = getdate();
    $anio = $fecha[year];
    $Mes = $fecha[mon];
    $dia =  $fecha[mday];
    $Fecha = "";
    $Fecha1 =  $Mes . '/' . $dia . '/' .  $anio;
  }else
  {
     $Fecha1 =  $Mes . '/' . $dia . '/' .  $anio;
  }

  echo '<div class="container" id="container" >';
  echo '<table align="center" border="0" width="40%" >';
  echo '  <tr> ';
  echo '    <td align="middle"><div align="center">';
  echo '    <center>';

  //$t = 1;
  
 // while( $t <= 1 )
 // {

		  $sql = " SELECT T.TURNO
					    FROM turnos T
					   WHERE T.Orden = " . $Turno_id . "
						ORDER BY T.Orden";
//echo $sql ;
	     $resultado = mssql_query($sql);

	     list( $TURNO ) = mssql_fetch_array($resultado);

        echo '<table  cellspacing="5" cellpadding="10" width="400" class="table table-bordered"  border="1">';
        echo '<thead>';
        echo '  <tr>';
        echo '     <td colspan="4" align="middle"><strong class="Estilo12" >' . $TURNO  . '</strong></td>';
        echo '  </tr >  ';

$sql="";
    	  $sql = " SELECT Q.Orden, S.IDSORTEO, S.IDQuiniela, Q.Quiniela , S.NRoSorteo, S.TURNO
					    FROM SORTEOS S
					   INNER JOIN Quinielas Q ON Q.IDQUINIELA =  S.IDQuiniela
					   INNER JOIN turnos T ON S.TURNO =  T.TURNO
					   WHERE fechaSorteo = '$Fecha1 12:00:00 AM'
						  AND S.IDQuiniela in (17,1,2,11)
						  AND T.Orden = $Turno_id
						ORDER BY Q.Orden, S.IDSORTEO, S.IDQuiniela, Q.Quiniela , S.NRoSorteo, S.TURNO";
						//echo $sql ;
	     $resultado2 = mssql_query($sql);

		  $e = 1;
        $$resultado_cont = mssql_query($sql);
$sql="";
        if (mssql_num_rows($$resultado_cont) > 0 )
        {
             echo '  <tr> ';
             while($Datos_sort = mssql_fetch_array($resultado2) )
             {
					 $Valor[$e] = $Datos_sort['IDSORTEO'] ;
		          echo'      <td align="middle" class="Estilo9" ><div align="center" class="Estilo13">' . nl2br(htmlentities( $Datos_sort['Quiniela'] ,ENT_QUOTES,'ISO-8859-1')) . '<strong></td>';
		          
		          $e++;
             }
             echo '  </tr></thead><tbody>';

             $w=1;
             while($w <= 20  )
             {
             echo'<tr> ';
			    	  $o=1;
		           while($o < $e  )
		           {
							$sql_numeros = "Select ubicacion, numero
							                  From Numeros
												  where IdSorteo = ". $Valor[$o] ."
												    and ubicacion = ". $w ."
												  Order by ubicacion asc ";
						//	echo $sql_numeros ;
							$rs_numeros = mssql_query($sql_numeros);
				         while($Datos_numeros = mssql_fetch_array($rs_numeros) )
				         {
				            echo'<td align="middle" class="Estilo12" ><div align="center" class="Estilo12">' . $Datos_numeros['numero'] . '<strong></td>';
				         }

				         $o++;
		           }
             echo '  </tr>';
             $w++;
           }
           echo '</tbody>';
           echo '</table><br>';
mssql_close($conn);
        }


 //   $t = $t+1;
 // }

  echo '    </center>';
  echo '    </td> ';
  echo '  </tr> ';
  echo '</table><br><br> <script>actualiza('. $Turno_id . ')</script>';
    echo '  </div>';


?>



</body>

</html>



