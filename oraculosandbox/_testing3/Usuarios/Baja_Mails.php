<?php
    include 'coneccion.php';
    include 'configuracion.php';
    include 'web.php';

    $Cmd_Mail = $_POST['Cmd_Mail'];
     
    if (($Cmd_Mail != "") or ($Cmd_Mail != 0))
    {
         $SQL_delete = "DELETE FROM mails WHERE IdTabla =  $Cmd_Mail";
         $rs = mssql_query($SQL_delete); 
         
          Baja_Mails();
         datos_tablaopen(' border="0" align="center" valign="top"  width="405" ');
             datos_tablaRowsOpen(' align="center" ');
                 datos_tabladata('Se a eliminado el Mail correctamente.' , ' class="tituloMenu"  align="center" ');
             datos_tablaRowsClose();
         datos_tablaclose();        

    }else
    {
         Baja_Mails();
         datos_tablaopen(' border="0" align="center" valign="top"  width="405" ');
             datos_tablaRowsOpen(' align="center" ');
                 datos_tabladata('No se a ingresado ningun Mail a eliminar.' , ' class="tituloMenu"  align="center" ');
             datos_tablaRowsClose();
         datos_tablaclose();  
    }

?>    