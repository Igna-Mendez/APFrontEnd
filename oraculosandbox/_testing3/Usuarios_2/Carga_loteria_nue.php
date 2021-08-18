<?php

   include 'coneccion.php';
   include 'configuracion.php';
   include 'web.php';
  
   $Nombre_Lote = ucfirst( strtolower( Trim($_POST['Nombre_Lote'])));
   
   If( $Nombre_Lote != "")
   {
      $sql_select = "SELECT IDQUINIELA FROM quinielas WHERE QUINIELA = '$Nombre_Lote' ";
      $rs = mssql_query($sql_select);
  		if(mssql_num_rows($rs) <= 0 )
      {
         $sql_insert = "INSERT INTO quinielas ( QUINIELA ) VALUES ( '$Nombre_Lote' )";
         $rs = mssql_query($sql_insert);
  
  		   Alta_Loterias();
   
         datos_tablaopen(' border="0" align="center" valign="top"  width="405" ');
             datos_tablaRowsOpen(' align="center" ');
                 datos_tabladata('Se a ingresado correctamente la Quiniela.' , ' class="tituloMenu"  align="center" ');
             datos_tablaRowsClose();
         datos_tablaclose();          
      }else
  		{   
  		   Alta_Loterias();
  
         datos_tablaopen(' border="0" align="center" valign="top"  width="405" ');
             datos_tablaRowsOpen(' align="center" ');
                 datos_tabladata('La Quiniela a ingresar ya existe.' , ' class="tituloMenu"  align="center" ');
             datos_tablaRowsClose();
         datos_tablaclose();         
      
      }
   }else
   {
		   Alta_Loterias();
  
       datos_tablaopen(' border="0" align="center" valign="top"  width="405" ');
           datos_tablaRowsOpen(' align="center" ');
               datos_tabladata('No se ingresado ninguna Loteria Poceada.' , ' class="tituloMenu"  align="center" ');
           datos_tablaRowsClose();
       datos_tablaclose();   
   }
  
  
?>