<?php

   include 'coneccion.php';
   include 'configuracion.php';
   include 'web.php';
  
   $Nombre_poce = ucfirst( strtolower( Trim($_POST['Nombre_poce'])));
    
   If( $Nombre_poce != "")
   {
      $sql_select = "SELECT IdPoceado FROM poceados WHERE poceado = '$Nombre_poce' ";
      $rs = mssql_query($sql_select);
  		if(mssql_num_rows($rs) <= 0 )
      {
         $sql_insert = "INSERT INTO poceados ( poceado ) VALUES ( '$Nombre_poce' )";
         $rs = mssql_query($sql_insert);
  
  		   Alta_Poceada();
   
         datos_tablaopen(' border="0" align="center" valign="top"  width="405" ');
             datos_tablaRowsOpen(' align="center" ');
                 datos_tabladata('Se a ingresado correctamente la Loteria Poceada.' , ' class="tituloMenu"  align="center" ');
             datos_tablaRowsClose();
         datos_tablaclose();          
      }else
  		{   
  		   Alta_Poceada();
  
         datos_tablaopen(' border="0" align="center" valign="top"  width="405" ');
             datos_tablaRowsOpen(' align="center" ');
                 datos_tabladata('La Loteria Poceada a ingresar ya existe.' , ' class="tituloMenu"  align="center" ');
             datos_tablaRowsClose();
         datos_tablaclose();         
      
      }
   }else
   {
		   Alta_Poceada();
  
       datos_tablaopen(' border="0" align="center" valign="top"  width="405" ');
           datos_tablaRowsOpen(' align="center" ');
               datos_tabladata('No se ingresado ninguna Loteria Poceada.' , ' class="tituloMenu"  align="center" ');
           datos_tablaRowsClose();
       datos_tablaclose();   
   }
  
  
?>