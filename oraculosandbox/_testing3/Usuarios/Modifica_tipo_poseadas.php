<?php

   include 'coneccion.php';
   include 'configuracion.php';
   include 'web.php';
  
   $Nombre_poce = ucfirst( strtolower( Trim($_POST['Nombre_poce'])));
   $Cmd_Poseada = $_POST['Cmd_Poseada'];
   $Cmd_Tip_poce = $_POST['Cmd_Tip_poce']; 
   
   If(( $Nombre_poce != "") or ($Cmd_Poseada == 0) or ($Cmd_Tip_poce == 0))
   {
      $sql_select = "SELECT idTipoPoceado FROM tipos_poceados WHERE idTipoPoceado  = $Cmd_Tip_poce ";
      $rs = mssql_query($sql_select);
  		if(mssql_num_rows($rs) <= 0 )
  		{   
  		   Modificar_Tipo_Poceada($Cmd_Poseada, $Nombre_poce, $Cmd_Tip_poce);
         datos_tablaopen(' border="0" align="center" valign="top"  width="405" ');
             datos_tablaRowsOpen(' align="center" ');
                 datos_tabladata('La Loteria Poceada a Modficar no existe.' , ' class="tituloMenu"  align="center" ');
             datos_tablaRowsClose();
         datos_tablaclose();         
      
      }else
      {
         $sql_insert = "UPDATE tipos_poceados SET tipoPoceado   = '$Nombre_poce' WHERE idTipoPoceado = $Cmd_Tip_poce ";
         $rs = mssql_query($sql_insert);
  		   Modificar_Tipo_Poceada(0,0,0);
         datos_tablaopen(' border="0" align="center" valign="top"  width="405" ');
             datos_tablaRowsOpen(' align="center" ');
                 datos_tabladata('Se a Modificado correctamente la Loteria Poceada.' , ' class="tituloMenu"  align="center" ');
             datos_tablaRowsClose();
         datos_tablaclose();          
      }

   }else
   {
		   Modificar_Tipo_Poceada($Cmd_Poseada, $Nombre_poce,$Cmd_Tip_poce);
       datos_tablaopen(' border="0" align="center" valign="top"  width="405" ');
           datos_tablaRowsOpen(' align="center" ');
               datos_tabladata('No se seleccionado ninguna Loteria Poceada.' , ' class="tituloMenu"  align="center" ');
           datos_tablaRowsClose();
       datos_tablaclose();   
   }
  
  mssql_close($conn);
?>
