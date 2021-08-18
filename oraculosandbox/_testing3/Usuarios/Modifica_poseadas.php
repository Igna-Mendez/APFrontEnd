<?php

   include 'coneccion.php';
   include 'configuracion.php';
   include 'web.php';
  
   $Nombre_poce = ucfirst( strtolower( Trim($_POST['Nombre_poce'])));
   $Cmd_Poseada = $_POST['Cmd_Poseada'];
   
   
   If(( $Nombre_poce != "") or ($Cmd_Poseada == 0))
   {
      $sql_select = "SELECT IdPoceado FROM poceados WHERE IdPoceado = $Cmd_Poseada ";
      $rs = mssql_query($sql_select);
  		if(mssql_num_rows($rs) <= 0 )
  		{   
  		   Modificar_Poceada();
         datos_tablaopen(' border="0" align="center" valign="top"  width="405" ');
             datos_tablaRowsOpen(' align="center" ');
                 datos_tabladata('La Loteria Poceada a Modficar no existe.' , ' class="tituloMenu"  align="center" ');
             datos_tablaRowsClose();
         datos_tablaclose();         
      
      }else
      {
         $sql_insert = "UPDATE poceados SET poceado = '$Nombre_poce' WHERE IdPoceado = $Cmd_Poseada";
         $rs = mssql_query($sql_insert);
  		   Modificar_Poceada();
         datos_tablaopen(' border="0" align="center" valign="top"  width="405" ');
             datos_tablaRowsOpen(' align="center" ');
                 datos_tabladata('Se a Modificado correctamente la Loteria Poceada.' , ' class="tituloMenu"  align="center" ');
             datos_tablaRowsClose();
         datos_tablaclose();          
      }

   }else
   {
		   Modificar_Poceada();
       datos_tablaopen(' border="0" align="center" valign="top"  width="405" ');
           datos_tablaRowsOpen(' align="center" ');
               datos_tabladata('No se seleccionado ninguna Loteria Poceada.' , ' class="tituloMenu"  align="center" ');
           datos_tablaRowsClose();
       datos_tablaclose();   
   }
  
  
?>