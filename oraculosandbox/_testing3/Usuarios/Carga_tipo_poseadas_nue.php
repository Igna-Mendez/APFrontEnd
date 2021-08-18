<?php

   include 'coneccion.php';
   include 'configuracion.php';
   include 'web.php';
  
   $Nombre_poce = ucfirst( strtolower( Trim($_POST['Nombre_poce'])));
   $Cmd_Poseada = $_POST['Cmd_Poseada'];

   if( $Nombre_poce != "")
   {
      $sql_select = "SELECT idTipoPoceado FROM tipos_poceados WHERE tipoPoceado = '$Nombre_poce' AND IdPoceado = $Cmd_Poseada";
      $rs = mssql_query($sql_select);
      $rs3 = mssql_query($sql_select);
  		if(mssql_num_rows($rs) <= 0 )
      {
         $sql_insert = "INSERT INTO tipos_poceados ( IdPoceado,  tipoPoceado   ) VALUES ( $Cmd_Poseada , '$Nombre_poce' )";
         $rs = mssql_query($sql_insert);
  		   Alta_Tipo_Poceada();
         datos_tablaopen(' border="0" align="center" valign="top"  width="405" ');
             datos_tablaRowsOpen(' align="center" ');
                 datos_tabladata('Se a ingresado correctamente el Tipo de Poceada.' , ' class="tituloMenu"  align="center" ');
             datos_tablaRowsClose();
         datos_tablaclose();          
      }else
  		{
         list( $idTipoPoceado) = mssql_fetch_array( $rs3 );
         $sql_update = "UPDATE tipos_poceados SET tipoPoceado = '$Nombre_poce' WHERE idTipoPoceado = $idTipoPoceado ";
         $rs2 = mssql_query($sql_update);         
  		   Alta_Tipo_Poceada();
         datos_tablaopen(' border="0" align="center" valign="top"  width="405" ');
             datos_tablaRowsOpen(' align="center" ');
                 datos_tabladata('El Tipo de Poceada se ha modificado.' , ' class="tituloMenu"  align="center" ');
             datos_tablaRowsClose();
         datos_tablaclose();         
      
      }
   }else
   {
		   Alta_Tipo_Poceada();
       datos_tablaopen(' border="0" align="center" valign="top"  width="405" ');
           datos_tablaRowsOpen(' align="center" ');
               datos_tabladata('No se ingresado el Tipo de Poceada.' , ' class="tituloMenu"  align="center" ');
           datos_tablaRowsClose();
       datos_tablaclose();   
   }
  
  
?>