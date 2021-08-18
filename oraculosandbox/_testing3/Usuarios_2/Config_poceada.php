<?php
    include 'coneccion.php';
    include 'configuracion.php';
    include 'web.php';
    
    $Cant_cifras  = $_POST['Cant_cifras'];
    $cant_premios = $_POST['cant_premios'];
    $Cmd_Poseada  = $_POST['Cmd_Poseada'];
    $Cmd_Tip_poce = $_POST['Cmd_Tip_poce'];
      
    $tipoDato = "";
    if (($Cmd_Tip_poce != 0) or ($Cmd_Tip_poce != ""))
    {
      $tipoDato = " AND IdTipoPoceada = $Cmd_Tip_poce ";
    }
   
    $sql = "SELECT IdTabla 
              FROM config_poceada 
             WHERE IdPoceada = $Cmd_Poseada $tipoDato ";
   	
    $rs = mssql_query($sql);
		if(mssql_num_rows($rs) <= 0 )
		{
		   $SQL_INSERT = "INSERT INTO config_poceada ( IdPoceada, IdTipoPoceada, CantNumeros, cantPuestos )
                      VALUES ($Cmd_Poseada, $Cmd_Tip_poce, $Cant_cifras, $cant_premios)";
		   $rs2 = mssql_query($SQL_INSERT);
		   
		   Config_Poceada(0,0,0,0);
		
       datos_tablaopen(' border="0" align="center" valign="top"  width="405" ');
           datos_tablaRowsOpen(' align="center" ');
               datos_tabladata('Se han cargado la configuracion.' , ' class="tituloMenu"  align="center" ');
           datos_tablaRowsClose();
       datos_tablaclose();		
		
		}else
		{
    
       $sql_update = "UPDATE config_poceada SET CantNumeros = $Cant_cifras, cantPuestos = $cant_premios WHERE IdPoceada = $Cmd_Poseada AND IdTipoPoceada = $Cmd_Tip_poce";
      //Config_Poceada( $Cant_cifras, $cant_premios, $Cmd_Poseada, $Cmd_Tip_poce );
		   $rs2 = mssql_query($sql_update);
		   
		   Config_Poceada(0,0,0,0);
             
      datos_tablaopen(' border="0" align="center" valign="top"  width="405" ');
         datos_tablaRowsOpen(' align="center" ');
             datos_tabladata('Se ha modificado la configuracion' , ' class="tituloMenu"  align="center" ');
         datos_tablaRowsClose();
      datos_tablaclose();	  
        
    }
    
    
    
    
    
?>    