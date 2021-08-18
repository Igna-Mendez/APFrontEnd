<?php
    include 'coneccion.php';
    include 'configuracion.php';
    include 'web.php';
    
    $Cant_numeros = $_POST['Cant_numeros'];
    $Cant_cifras  = $_POST['Cant_cifras'];
    $Cmd_quiniela = $_POST['Cmd_quiniela'];
      
    $sql = "SELECT IdTabla 
              FROM config_Quiniela
             WHERE IdQuiniela = $Cmd_quiniela ";
   	
    $rs = mssql_query($sql);
		if(mssql_num_rows($rs) <= 0 )
		{
		   $SQL_INSERT = "INSERT INTO config_Quiniela ( IdQuiniela, CantNumeros, CantCifras )
                      VALUES ( $Cmd_quiniela, $Cant_numeros, $Cant_cifras )";
		   $rs2 = mssql_query($SQL_INSERT);
		   
		   Config_Loterias(0,0);
		
       datos_tablaopen(' border="0" align="center" valign="top"  width="405" ');
           datos_tablaRowsOpen(' align="center" ');
               datos_tabladata('Se han cargado la configuracion.' , ' class="tituloMenu"  align="center" ');
           datos_tablaRowsClose();
       datos_tablaclose();		
		
		}else
		{

    	$SQL_Update = "UPDATE config_Quiniela SET CantNumeros = $Cant_numeros, CantCifras = $Cant_cifras
    	               WHERE IdQuiniela = $Cmd_quiniela";
		   $rs2 = mssql_query($SQL_Update);
          
      Config_Loterias(0,0);
      
      datos_tablaopen(' border="0" align="center" valign="top"  width="405" ');
         datos_tablaRowsOpen(' align="center" ');
             datos_tabladata('Se Modifico la configuracion cargada.' , ' class="tituloMenu"  align="center" ');
         datos_tablaRowsClose();
      datos_tablaclose();	  
        
    }                      
    mssql_close($conn);
    
?>    
