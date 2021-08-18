<?php

   include 'coneccion.php';
   include 'configuracion.php';
   include 'web.php';
  
   $Nombre_Turno = ucfirst( strtolower( Trim($_POST['Nombre_Turno'])));
   
   If( $Nombre_Turno != "")
   {
      $sql_select = "SELECT IdTabla FROM Turnos  WHERE Turno = '$Nombre_Turno' ";
      $rs = mssql_query($sql_select);
  		if(mssql_num_rows($rs) <= 0 )
      {
         $sql_insert = "INSERT INTO Turnos  ( Turno ) VALUES ( '$Nombre_Turno' )";
         $rs = mssql_query($sql_insert);
  
  		   Alta_Turnos();
   
         datos_tablaopen(' border="0" align="center" valign="top"  width="405" ');
             datos_tablaRowsOpen(' align="center" ');
                 datos_tabladata('Se a ingresado correctamente el Turno.' , ' class="tituloMenu"  align="center" ');
             datos_tablaRowsClose();
         datos_tablaclose();          
      }else
  		{   
  		   Alta_Turnos();
  
         datos_tablaopen(' border="0" align="center" valign="top"  width="405" ');
             datos_tablaRowsOpen(' align="center" ');
                 datos_tabladata('El turno a ingresar ya existe.' , ' class="tituloMenu"  align="center" ');
             datos_tablaRowsClose();
         datos_tablaclose();         
      
      }
   }else
   {
		   Alta_Turnos();
  
       datos_tablaopen(' border="0" align="center" valign="top"  width="405" ');
           datos_tablaRowsOpen(' align="center" ');
               datos_tabladata('No se ingresado ninguna Loteria Poceada.' , ' class="tituloMenu"  align="center" ');
           datos_tablaRowsClose();
       datos_tablaclose();   
   }
  
  
?>