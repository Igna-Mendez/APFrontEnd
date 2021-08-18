   function ref_comb(item)
	 { 
      var params = "?nro_Sorteo="+document.form1.nro_Sorteo.value 
                 + "&Cmd_Poseada="+document.form1.Cmd_Poseada.value
                 + "&Cmd_Tip_poce="+document.form1.Cmd_Tip_poce.value
                 + "&Pantalla="+document.form1.Pantalla.value;
        //alert (params);
      var ajx = new Ajax.Updater("centro_usu", "Refresca-combos.php", {method:"post", parameters:params });	
   }
   
   function ref_comb2(item)
	 { 
      var params = "?Cant_cifras="+document.form1.Cant_cifras.value 
                 + "&cant_premios="+document.form1.cant_premios.value
                 + "&Cmd_Poseada="+document.form1.Cmd_Poseada.value
                 + "&Cmd_Tip_poce="+document.form1.Cmd_Tip_poce.value
                 + "&Pantalla="+document.form1.Pantalla.value;
      var ajx = new Ajax.Updater("centro_usu", "Refresca-combos.php", {method:"post", parameters:params });	
   }
   
   function ref_comb3(item)
	 { 
      var params = "?Cmd_Poseada="+document.form1.Cmd_Poseada.value 
                  + "&Nombre_poce="+document.form1.Nombre_poce.value
                  + "&Cmd_Tip_poce="+document.form1.Cmd_Tip_poce.value
                  + "&Pantalla="+document.form1.Pantalla.value;
      var ajx = new Ajax.Updater("centro_usu", "Refresca-combos.php", {method:"post", parameters:params });	
   }      

   function ref_comb4(item)
	 { 
      var params = "?Cmd_Poseada="+document.form1.Cmd_Poseada.value 
                  + "&Pantalla="+document.form1.Pantalla.value;
      var ajx = new Ajax.Updater("centro_usu", "Refresca-combos.php", {method:"post", parameters:params });	
   } 
   
   function ref_comb5(item)
	 { 
      var params = "?Cmd_quiniela="+document.form1.Cmd_quiniela.value 
                  + "&Pantalla="+document.form1.Pantalla.value;
      var ajx = new Ajax.Updater("centro_usu", "Refresca-combos.php", {method:"post", parameters:params });	
   }    
  
   function ref_comb6(item)
	 { 
      var params = "?Cmd_Turno="+document.form1.Cmd_Turno.value 
                  + "&Pantalla="+document.form1.Pantalla.value;
      var ajx = new Ajax.Updater("centro_usu", "Refresca-combos.php", {method:"post", parameters:params });	
   }  
   function ref_comb7(item)
	 { 
      var params = "?Cmd_Mail="+document.form1.Cmd_Mail.value 
                 + "&Pantalla="+document.form1.Pantalla.value;
      var ajx = new Ajax.Updater("centro_usu", "Refresca-combos.php", {method:"post", parameters:params });	
   }
      
  
  function actualiza_result(item)
	 {
      
      var params = "?dia="+document.form1.dia.value 
                 + "&mes="+document.form1.mes.value
                 + "&anio="+document.form1.anio.value ;
      var ajx = new Ajax.Updater("centro", "Actualizo_resultados.php", {method:"post", parameters:params });	
   }

  function refres(item)
	 {
      
      var params = "?dia="+document.form1.dia.value 
                 + "&mes="+document.form1.mes.value
                 + "&anio="+document.form1.anio.value
                 + "&cifra="+document.form1.cifra.value
                 + "&Cmd_turnos="+document.form1.Cmd_turnos.value
                 + "&Cmd_loterias1="+document.form1.Cmd_loterias1.value
                 + "&Sorteo_1="+document.form1.Sorteo_1.value
                 + "&Cmd_loterias2="+document.form1.Cmd_loterias2.value
                 + "&Sorteo_2="+document.form1.Sorteo_2.value  ;
                 
      var ajx = new Ajax.Updater("centro", "Refresca_pantalla.php", {method:"post", parameters:params });	
      
   }

   function refrescar(item , div)
	 {
	     switch(item)
        {       
        
						case "validousuario":
                    var params = "?Usuario="+ document.form1.Usuario.value + "&Contrasenia=" + document.form1.Contrasenia.value+"&param=1";
                    var aURL = "validousuario.php";
								    break;    
    
            default:
                   var aURL = "trae.php";
                   var params = "proce=" + item;
                   break;
				}

       var ajx = new Ajax.Updater("centro", aURL , {method:"post", parameters:params });

  }
   function refresca_usu(item , div)
	 {
	     switch(item)
        {      
        
            case "Config_poceada":
                    var params = "?Cant_cifras="+ document.form1.Cant_cifras.value + "&cant_premios="+ document.form1.cant_premios.value + "&Cmd_Poseada=" + document.form1.Cmd_Poseada.value+"&Cmd_Tip_poce=" + document.form1.Cmd_Tip_poce.value;
                    var aURL = "Config_poceada.php";
								    break;  
             /*
						case "carga_poceadas":
                    var params = "?nro_Sorteo=" + document.form1.nro_Sorteo.value + "&Cmd_Poseada=" + document.form1.Cmd_Poseada.value + "&Cmd_Tip_poce=" + document.form1.Cmd_Tip_poce.value
                    + "&dia=" + document.form1.dia.value + "&mes=" + document.form1.mes.value + "&anio=" + document.form1.anio.value;
                    var aURL = "carga_Poceadas.php";
								    break;
             */ 
						case "carga_poceadas":
                    var params = "?Cmd_Poseada=" + document.form1.Cmd_Poseada.value ;
                    var aURL = "carga_Poceadas.php";
								    break;
                                       
            case "Alta_poceada":
                    var params = "?Nombre_poce="+ document.form1.Nombre_poce.value;
                    var aURL = "Carga_poseadas_nue.php";
								    break;      

            case "Alta_Tipo_poceada":
                    var params = "?Cmd_Poseada=" + document.form1.Cmd_Poseada.value + "&Nombre_poce=" + document.form1.Nombre_poce.value;
                    var aURL = "Carga_tipo_poseadas_nue.php";
								    break;
								    
            case "Modif_poceada":
                    var params = "?Cmd_Poseada="+ document.form1.Cmd_Poseada.value + "&Nombre_poce="+ document.form1.Nombre_poce.value;
                    var aURL = "Modifica_poseadas.php";
								    break;
                    
            case "Modif_Tipo_poceada":
                    var params = "?Cmd_Poseada="+ document.form1.Cmd_Poseada.value + "&Cmd_Tip_poce="+ document.form1.Cmd_Tip_poce.value + "&Nombre_poce="+ document.form1.Nombre_poce.value;
                    var aURL = "Modifica_tipo_poseadas.php";
								    break; 
   
            case "Quiniela":
                    var params = "?cantQuinielas="+ document.form1.cantQuinielas.value 
                               + "&dia="+ document.form1.dia.value
                               + "&mes="+ document.form1.mes.value
                               + "&anio="+ document.form1.anio.value;
                    var aURL = "Quinielas.php";
								    break;                    

					 	case "Alta_usuario":
						   var params = "?Nombre=" + document.form1.Nombre.value
									          +"&Apellido="+ document.form1.Apellido.value+"&Usuario="+ document.form1.Usuario.value
														+"&Nueva_pass="+document.form1.Nueva_pass_A.value;
 								var aURL = "Alta_usuario.php";
								 break;                    

   		 	case "actualizo_Datos":
						   var params = "?Nombre=" + document.form1.Nombre.value
								 +"&Apellido="+ document.form1.Apellido.value
                                                         +"&Usuario="+ document.form1.Usuario.value
                                                         +"&IdUsuario="+ document.form1.IdUsuario.value
								 +"&Nueva_pass_A="+document.form1.Nueva_pass_A.value;
 								var aURL = "actualizo_Datos.php";
								 break;
								 
            case "Alta_Loteria":
                    var params = "?Nombre_Lote="+ document.form1.Nombre_Lote.value;
                    var aURL = "Carga_loteria_nue.php";
								    break; 
                                          
            case "Alta_Turno":
                    var params = "?Nombre_Turno="+ document.form1.Nombre_Turno.value;
                    var aURL = "Carga_Turnos.php";
								    break; 
								                      
            case "Modif_Quiniela":
                    var params = "?Cmd_quiniela="+ document.form1.Cmd_quiniela.value+"&Nombre_Quiniela="+ document.form1.Nombre_Quiniela.value;
                    var aURL = "Modifica_Quinielas.php";
								    break; 
								                      
            case "Modif_Turnos":
                    var params = "?Cmd_Turno="+ document.form1.Cmd_Turno.value+"&Nombre_Turno="+ document.form1.Nombre_Turno.value;
                    var aURL = "Modifica_Turnos.php";
								    break;
                                         
            case "Config_Quinielas":
                    var params = "?Cant_numeros="+ document.form1.Cant_numeros.value+"&Cant_cifras="+ document.form1.Cant_cifras.value+"&Cmd_quiniela="+ document.form1.Cmd_quiniela.value;
                    var aURL = "Config_Quinielas.php";
								    break;                      

            case "Pant_Carga_quinielas":
                    var params = "&Fecha="+ document.form1.Fecha.value + "&cantQuinielas="+ document.form1.cantQuinielas.value 
                               + "&Cmd_quiniela_1="+ document.form1.Cmd_quiniela_1.value+"&Cmd_turnos_1="+ document.form1.Cmd_turnos_1.value+"&Sorteo_1="+ document.form1.Sorteo_1.value
                               + "&Cmd_quiniela_2="+ document.form1.Cmd_quiniela_2.value+"&Cmd_turnos_2="+ document.form1.Cmd_turnos_2.value+"&Sorteo_2="+ document.form1.Sorteo_2.value  
                               + "&Cmd_quiniela_3="+ document.form1.Cmd_quiniela_3.value+"&Cmd_turnos_3="+ document.form1.Cmd_turnos_3.value+"&Sorteo_3="+ document.form1.Sorteo_3.value
                               + "&Cmd_quiniela_4="+ document.form1.Cmd_quiniela_4.value+"&Cmd_turnos_4="+ document.form1.Cmd_turnos_4.value+"&Sorteo_4="+ document.form1.Sorteo_4.value;
                    var aURL = "Pant_Carga_quinielas.php";
								    break;    
                                          
            case "Alta_Mails":
                    var params = "?Mail="+ document.form1.Mail.value;
                    var aURL = "Carga_Mails.php";
                    //alert(params);
								    break;            
                                                       								    
            case "Modif_Mails":
                    var params = "?Mail="+ document.form1.Mail.value + "&Cmd_Mail="+ document.form1.Cmd_Mail.value + "&envio_mail="+ document.form1.envio_mail.value;
                    var aURL = "Modifica_Mails.php";
								    break;          
 
             case "Baja_Mails":
                    var params = "?Cmd_Mail="+ document.form1.Cmd_Mail.value;
                    var aURL = "Baja_Mails.php";
								    break;    
                          
// Modificacion 11/10/2010
             case "Busca_poceadas":
                    var params = "?Cmd_Poseada="+ document.form1.Cmd_Poseada.value + "&nro_Sorteo="+ document.form1.nro_Sorteo.value + "&dia="+ document.form1.dia.value + "&mes="+ document.form1.mes.value + "&anio="+ document.form1.anio.value;
                    var aURL = "Busca_poceadas.php";
								    break;
// Fin Modificacion 11/10/2010								    
            default:
                   var aURL = "trae.php";
                   var params = "proce=" + item;
                   break;
				}

       var ajx = new Ajax.Updater("centro_usu", aURL , {method:"post", parameters:params });

  }
  function fun_Modif_Cabecera()
  {
     var url="Modif_Cabecera.php";
     var form = $("form1");
     var formSerialized = form.serialize();
     new Ajax.Updater("centro_usu", url, { method: "post", parameters: { param:  formSerialized }, onSuccess: function(transport) { } });
  }

  function Quiniela_1()
	 {
     var url="Guardo_Numeros.php";
     var form = $("form1");
     var formSerialized = form.serialize();
     new Ajax.Updater("div_quiniela1", url, { method: "post", parameters: { param:  formSerialized }, onSuccess: function(transport) { } });  
   }
  
  function Quiniela_2()
	 {
     var url="Guardo_Numeros.php";
     var form = $("form2");
     var formSerialized = form.serialize();
     new Ajax.Updater("div_quiniela2", url, { method: "post", parameters: { param:  formSerialized }, onSuccess: function(transport) { } });  
   }
   
  function Quiniela_3()
	 {
     var url="Guardo_Numeros.php";
     var form = $("form3");
     var formSerialized = form.serialize();
     new Ajax.Updater("div_quiniela3", url, { method: "post", parameters: { param:  formSerialized }, onSuccess: function(transport) { } });  
   }
   
  function Quiniela_4()
	 {
     var url="Guardo_Numeros.php";
     var form = $("form4");
     var formSerialized = form.serialize();
     new Ajax.Updater("div_quiniela4", url, { method: "post", parameters: { param:  formSerialized }, onSuccess: function(transport) { } });  
   }

 	 function Reacciona(Valor)
	 {
      if (form1.nro_Sorteo.value == "")
      {
        alert("Debe ingresar un Numero de Sorteo.")
        form1.nro_Sorteo.focus();
        exit();
      }
   }
 	 
  function ReaccionaPoceadas(Valor)
	 {
      if (form1.nro_Sorteo.value == "")
      {
        alert("Debe ingresar un Numero de Sorteo.")
        form1.nro_Sorteo.focus();
        exit();
      }
      
      if (form1.Cmd_Poseada.value == 0 )
      {
        alert("Debe seleccionar una loteria poceada.")
        form1.nro_Sorteo.focus();
        exit();
      }      
   }
   
  function refrescar_Poceadas()
	{
		 //alert ("entro");
     var url="Guardo_poseadas.php";
     var form = $("form1");
     var formSerialized = form.serialize();
     new Ajax.Updater("centro_usu", url, { method: "post", parameters: { param:  formSerialized }, onSuccess: function(transport) { } });
  }
  
  function Modifico_Poceadas()
	{
		 //alert ("entro");
     var url="Modificar_poseada.php";
     var form = $("form1");
     var formSerialized = form.serialize();
     new Ajax.Updater("centro_usu", url, { method: "post", parameters: { param:  formSerialized }, onSuccess: function(transport) { } });
  }

	function valido_nueva_contra(Valor)
	{
				if( form1.Nueva_pass_A.value != form1.Nueva_pass_B.value )
				{
						 alert("Las Contraseñas son distintas");
						 form1.Nueva_pass_A.value = "";
						 form1.Nueva_pass_B.value = "";
					  form1.Nueva_pass_A.focus();
					  exit();
				}
	}
	
	function selecciona_comb_elim(Valor)
	{
				if(form1.Cmd_usuarios.value == 0)
				{
						 alert("Debe seleccionar un Usuario para dar de baja.");
					  window.form1.Cmd_usuarios.focus();
					  exit();
				}
	}




function eliminaquini(IDSORTEO , Cmd_quiniela)
{
  if(confirm('¿Esta seguro de eliminar la Quiniela cargada?'))
  { 
	// alert("SI");
         var params = "?IDSORTEO="+IDSORTEO
                 + "&Cmd_quiniela="+Cmd_quiniela;
        //alert (params);
      var ajx = new Ajax.Updater("centro_usu", "Elimina_quinielas.php", {method:"post", parameters:params });

  }
}


function eliminaPoseada(idSort_poceados)
{
  if(confirm('¿Esta seguro de eliminar la Poseada cargada?'))
  {
	// alert("SI");
         var params = "?idSort_poceados="+idSort_poceados;
        //alert (params);
      var ajx = new Ajax.Updater("centro_usu", "elimina_poseadas.php", {method:"post", parameters:params });

  }
}


function esFechaValida(fecha){
 if (fecha != undefined && fecha.value != "" ){
     if (!/^\d{2}\/\d{2}\/\d{4}$/.test(fecha.value)){
         alert("formato de fecha no válido (dd/mm/aaaa)");
         return false;
     }
     var dia  =  parseInt(fecha.value.substring(0,2),10);
     var mes  =  parseInt(fecha.value.substring(3,5),10);
     var anio =  parseInt(fecha.value.substring(6),10);

  switch(mes){
     case 1:
     case 3:
     case 5:
     case 7:
     case 8:
     case 10:
     case 12:
         numDias=31;
         break;
     case 4: case 6: case 9: case 11:
         numDias=30;
         break;
     case 2:
         if (comprobarSiBisisesto(anio)){ numDias=29 }else{ numDias=28};
         break;
     default:

         alert("Fecha introducida errónea");
         return false;
      }

     if (dia>numDias || dia==0){
         alert("Fecha introducida errónea");
         return false;
     }
     return true;

 }

}

function comprobarSiBisisesto(anio)
{
  if ( ( anio % 100 != 0) && ((anio % 4 == 0) || (anio % 400 == 0)))
  {
    return true;
  }
  else
  {
    return false;
  }
}









  
  
  
	 function mensaje(texto)
	 {
     alert(texto);
   }

		function Solo_Numeros(evt)
		{
				var tecla = window.event.keyCode;
				if (tecla < 48 || tecla > 57)
				{
				  window.event.keyCode=0;
				}
		}

		function validomensaje(Valor)
		{
				if ((form1.email.value == "") && (form1.nombre.value == ""))
				{
				   alert("Debe ingresar su Nombre y su E-mail.")
				   form1.nombre.focus()
							exit();
				}else
				{
							if (form1.nombre.value == "")
							{
							 		alert("Falta Ingresar su Nombre")
							   form1.nombre.focus()
							   exit();
							}
							if (form1.email.value == "")
							{
							 		alert("Falta Ingresar su E-mail")
							   form1.email.focus()
							   exit();
							}else
							{
										if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(form1.email.value))
										{	}
										else
										{
										  alert("La dirección de email es incorrecta.")
							     form1.email.focus()
							     exit();
										}

							}
				}
		}

		function Mostrar(name)
		{
       alert(document.getElementById(name).value);
  }

  function popup(mylink, windowname)
		{
						if (! window.focus)return true;
						var href;
						if (typeof(mylink) == 'string')
						   href=mylink;
						else
								href=mylink.href;

						windowsproperties='';

						if (windowname=='correo')
						{
						  width=550;
						  height=120;
						}else
						{
								if (windowname=='sub_foto')
								{
								  width=500;
								  height=250;
								}else if (windowname=='fotos')
											      {
																	  width=500;
																	  height=385;
								}else if (windowname=='SMS')
											      {
																	  width=500;
																	  height=485;
																	}else                                                                    
												        throw "Error, nombre de ventana no soportado.";
							}
					  window.open(href, windowname,'top=20,left=20,width=' + width + ',height=' + height + windowsproperties);
					  return false;
		}
		function cerrarPopup(windowname)
		{
    		window.close();
		}

		
		function valido_campos_busqueda(Valor)
		{
					if( (form1.Cmd_bus_prop.value == 0) && (form1.IdProp.value == "") )
					{
							 alert("Ingrese un valor a buscar")
						  form1.IdProp.focus();
						  exit();
					}
		}

       function ventanasms(item)
       {
          var param = 'sms.php?Cmd_quiniela='+document.form1.Cmd_quiniela.value+'&dia='+document.form1.dia.value+'&mes='+document.form1.mes.value+'&anio='+document.form1.anio.value; 
          window.open(param, 'SMS','width=500, height=485' );
       }
       
