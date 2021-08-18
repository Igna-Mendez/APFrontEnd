<?php
    include 'coneccion.php';
    include 'configuracion.php';
    include 'web.php';
  
    $Mail  = ucfirst( strtolower( Trim($_POST['Mail']))); 

    if ($Mail != "")
    {
        $SQL_SEL = "SELECT MAIL FROM MAILS WHERE MAIL LIKE '$Mail%' ";

        $rs = mssql_query($SQL_SEL);
    		if(mssql_num_rows($rs) <= 0 )
        {
             $sql_Insert = "INSERT INTO MAILS ( MAIL, ACTIVO ) VALUES ( '$Mail', 1 )";
             $rs = mssql_query($sql_Insert);
             Alta_Mails();
             datos_tablaopen(' border="0" align="center" valign="top"  width="405" ');
                 datos_tablaRowsOpen(' align="center" ');
                     datos_tabladata('Se a ingresado Correctamente el Mail : ' . $Mail  , ' class="tituloMenu"  align="center" ');
                 datos_tablaRowsClose();
             datos_tablaclose();   
        }else
        {
             Alta_Mails();
             datos_tablaopen(' border="0" align="center" valign="top"  width="405" ');
                 datos_tablaRowsOpen(' align="center" ');
                     datos_tabladata('El Mail ' . $Mail . ' ya se encuentra almacenando en la base.' , ' class="tituloMenu"  align="center" ');
                 datos_tablaRowsClose();
             datos_tablaclose();        
        }
    
    }else
    {
         Alta_Mails();
         datos_tablaopen(' border="0" align="center" valign="top"  width="405" ');
             datos_tablaRowsOpen(' align="center" ');
                 datos_tabladata('No se a ingresado ningun Mail' , ' class="tituloMenu"  align="center" ');
             datos_tablaRowsClose();
         datos_tablaclose();  
    }

?>    