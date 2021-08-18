<?php

   include 'coneccion.php';
   include 'configuracion.php';
   include 'web.php';
  
   $Nombre_Quiniela = ucfirst( strtolower( Trim($_POST['Nombre_Quiniela'])));
   $Cmd_quiniela = $_POST['Cmd_quiniela'];
   
   
   If(( $Nombre_Quiniela != "") or ($Cmd_quiniela == 0))
   {
      $sql_select = "SELECT IdQuiniela FROM quinielas WHERE IdQuiniela = $Cmd_quiniela ";
      $rs = mssql_query($sql_select);
  		if(mssql_num_rows($rs) <= 0 )
  		{   
  		   Modificar_Loterias(0);
         datos_tablaopen(' border="0" align="center" valign="top"  width="405" ');
             datos_tablaRowsOpen(' align="center" ');
                 datos_tabladata('La Quiniela a Modficar no existe.' , ' class="tituloMenu"  align="center" ');
             datos_tablaRowsClose();
         datos_tablaclose();         
      
      }else
      {
         $sql_insert = "UPDATE quinielas SET quiniela = '$Nombre_Quiniela' WHERE IdQuiniela = $Cmd_quiniela";
         $rs = mssql_query($sql_insert);
  		   Modificar_Loterias(0);
         datos_tablaopen(' border="0" align="center" valign="top"  width="405" ');
             datos_tablaRowsOpen(' align="center" ');
                 datos_tabladata('Se a Modificado correctamente la Quiniela.' , ' class="tituloMenu"  align="center" ');
             datos_tablaRowsClose();
         datos_tablaclose();          
      }

   }else
   {
		   Modificar_Loterias(0);
       datos_tablaopen(' border="0" align="center" valign="top"  width="405" ');
           datos_tablaRowsOpen(' align="center" ');
               datos_tabladata('No se seleccionado ninguna Quiniela.' , ' class="tituloMenu"  align="center" ');
           datos_tablaRowsClose();
       datos_tablaclose();   
   }
  
  
?>