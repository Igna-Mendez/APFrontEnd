<?php

   include 'coneccion.php';
   include 'configuracion.php';
   include 'web.php';
  
   $Nombre_Turno = ucfirst( strtolower( Trim($_POST['Nombre_Turno'])));
   $Cmd_Turno = $_POST['Cmd_Turno'];
   
   
   If(( $Nombre_Turno != "") or ($Cmd_Turno == 0))
   {
      $sql_select = "SELECT Idtabla FROM turnos  WHERE Idtabla = $Cmd_Turno ";
      $rs = mssql_query($sql_select);
  		if(mssql_num_rows($rs) <= 0 )
  		{   
  		   Modificar_Turnos(0);
         datos_tablaopen(' border="0" align="center" valign="top"  width="405" ');
             datos_tablaRowsOpen(' align="center" ');
                 datos_tabladata('El Turno a Modficar no existe.' , ' class="tituloMenu"  align="center" ');
             datos_tablaRowsClose();
         datos_tablaclose();         
      
      }else
      {
         $sql_insert = "UPDATE turnos  SET Turno = '$Nombre_Turno' WHERE Idtabla = $Cmd_Turno";
         $rs = mssql_query($sql_insert);
  		   Modificar_Turnos(0);
         datos_tablaopen(' border="0" align="center" valign="top"  width="405" ');
             datos_tablaRowsOpen(' align="center" ');
                 datos_tabladata('Se a Modificado correctamente el Turno.' , ' class="tituloMenu"  align="center" ');
             datos_tablaRowsClose();
         datos_tablaclose();          
      }

   }else
   {
		   Modificar_Turnos(0);
       datos_tablaopen(' border="0" align="center" valign="top"  width="405" ');
           datos_tablaRowsOpen(' align="center" ');
               datos_tabladata('No se seleccionado ningun Turno.' , ' class="tituloMenu"  align="center" ');
           datos_tablaRowsClose();
       datos_tablaclose();   
   }
  
  
?>