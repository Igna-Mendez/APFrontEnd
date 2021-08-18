<?php
    include 'coneccion.php';
    include 'configuracion.php';
    include 'web.php';

    $envio_mail = $_POST['envio_mail'];
    $Cmd_Mail = $_POST['Cmd_Mail'];
    $Mail  = ucfirst( strtolower( Trim($_POST['Mail']))); 

    if (($Cmd_Mail != "") or ($Cmd_Mail != 0))
    {
    		if($Mail == "" ) 
        {
             Modif_Mails($Cmd_Mail);
             datos_tablaopen(' border="0" align="center" valign="top"  width="405" ');
                 datos_tablaRowsOpen(' align="center" ');
                     datos_tabladata('No se a ingresado ningun Mail.'  , ' class="tituloMenu"  align="center" ');
                 datos_tablaRowsClose();
             datos_tablaclose();   
        }else
        {
             $SQL_UPDATE = "UPDATE mails SET MAIL = '$Mail', ACTIVO = $envio_mail WHERE IdTabla =  $Cmd_Mail";
             $rs = mssql_query($SQL_UPDATE); 
             
             Modif_Mails(0);
             datos_tablaopen(' border="0" align="center" valign="top"  width="405" ');
                 datos_tablaRowsOpen(' align="center" ');
                     datos_tabladata('Se a modificado el Mail correctamente.' , ' class="tituloMenu"  align="center" ');
                 datos_tablaRowsClose();
             datos_tablaclose();        
        }
    
    }else
    {
         Modif_Mails(0);
         datos_tablaopen(' border="0" align="center" valign="top"  width="405" ');
             datos_tablaRowsOpen(' align="center" ');
                 datos_tabladata('No se a ingresado ningun Mail a modificar.' , ' class="tituloMenu"  align="center" ');
             datos_tablaRowsClose();
         datos_tablaclose();  
    }

?>    