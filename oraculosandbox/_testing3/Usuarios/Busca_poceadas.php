<?php
   include 'coneccion.php';
   include 'configuracion.php';
   include 'web.php';

   $Cmd_Poseada = $_POST['Cmd_Poseada'];
   $nro_Sorteo = $_POST['nro_Sorteo'];
   $dia = $_POST['dia'];
   $mes = $_POST['mes'];
   $anio = $_POST['anio'];

   $fecha = "$anio-$mes-$dia";
   
   If( $nro_Sorteo != "" )
   {
      $busqueda =  " AND nroSorteo = '$nro_Sorteo' ";
   } else
   {
      $busqueda =  " AND fechaSorteo = CAST (('$fecha 00:00:00') as smalldatetime) ";   
   }

   $sql_sel = "SELECT idSorteoPoceado FROM sorteos_poceados WHERE IdPoceado = $Cmd_Poseada  $busqueda ";
   //echo    $sql_sel ;
   $rs = mssql_query($sql_sel);
   list( $idSorteoPoceado ) = mssql_fetch_array($rs);
   
   If ( $idSorteoPoceado <= 0)
   {
		   Pantalla_Modif_Poceados();
		   
       datos_tablaopen(' border="0" align="center" valign="top"  width="405" ');
           datos_tablaRowsOpen(' align="center" ');
              datos_tabladata('No existe Poceada a modificar.' , ' class="tituloMenu"  align="center" ');
           datos_tablaRowsClose();
       datos_tablaclose();   
   }else
   {
       Modif_poceadas($fecha, $nro_Sorteo, $Cmd_Poseada);
   }
mssql_close($conn);
?> 
