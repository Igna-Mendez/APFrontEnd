<%@ LANGUAGE = VBScript.Encode %>
<%IF SESSION("BANNER_SITE_LOGIN") <> "True" THEN
RESPONSE.REDIRECT ("LOGIN.ASP")
END IF%>

<html>
<head>
<title><% Response.Write("Administrador de Banner") %></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="stylesheet.css" rel="stylesheet" type="text/css" media="all" />
</head>

<script>
function confirmDelete() {
  if (confirm("Esta seguro de borrar este banner?")) {
    return true;
  }
  return false;
}
</script>

<body bgcolor="#FFFFFF" text="#FFFFFF" link="#FFFFFF" vlink="#99CCFF" alink="#0000FF">


<%imagen=Request.Form ("atach")
imagen="/cgi-bin/tobanner/images/"&imagen%>
 
<table width="750" border="0" cellspacing="0" cellpadding="0" align="center" background="fta_panel.png" height="43">
   <tr background="fta_panel.png"> 
       <td><font size="1">&nbsp;</font></td>
     </tr>
</table>

<table width="749" ALIGN=CENTER CLASS=TABLA border="0" height="234">
	<tr ALIGN=CENTER> 
          <td height="2"></td>
        </tr>
	
  	<tr ALIGN=CENTER> 
          <td BGCOLOR="#CCCCCC" height="4" VALIGN=CENTER> 
            <p><FONT CLASS=FONTTITLEBANNER ><b>Agregar Banner</b></font></p>
          </td>
        </tr>

	<tr>     
	<td > 


	<table >
	<tr> 
          <td height="7"><FONT CLASS=FONT>Con el botón Browse y luego Adjuntar suba la imagen. Luego llene los casilleros de abajo.</font></td>
        </tr>
	</table>


      <table width="83%" align=center border="0">
        

		
        
	<tr align=center>
    
          <td height="15"> 
        
		<tr> 
                  <td width="51%" height="2" valign=top><FONT CLASS=FONT><b>Subir Imagen</b></font></td>
                  <td width="49%" height="2"> 
                    <div align="center"> 
                      <FORM METHOD="POST" ENCTYPE="multipart/form-data" ACTION="prgattach.asp"> 
				<INPUT CLASS=FONTINPUTBANNER TYPE=FILE  NAME="atach">
                    </div>
                  </td>
                </tr>
                <tr> 
                  <td width="51%" height="2">&nbsp;</td>
                  <td width="49%" height="2"> 
                    <div align="center"> 
                      <INPUT CLASS=FONTBOTON TYPE=SUBMIT VALUE="Adjuntar Imagen"> 
                    </div>
                  </td>
                </tr>
			</form>
		
		    <form method="post" action="add_banner.asp" name="form1">
              <table width="83%" border="0" align="center">
                
				
		<tr> 
                  <td width="51%" height="2"><FONT CLASS=FONT><b>Nombre para el banner (e.g. Company)</b></font></td>
                  <td width="49%" height="2"> 
                    <div align="center"> 
                      <input type="text" CLASS=FONTINPUTBANNER name="Name" size="35" maxlength="100">
                    </div>
                  </td>
                </tr>
                
				                
				<tr> 
                  <td width="51%" height="2"> 
                    <p><FONT CLASS=FONT><b>Ubicacion de la Imagen (e.g. /tobanner/banner.gif) </b></font></p>
				  </td>
                  <td width="49%" height="2"> 
                    <div align="center"> 
                      <input type="text" CLASS=FONTINPUTBANNER name="Image" size="35" maxlength="150" value="<%=imagen%>">
                    </div>
                  </td>
                </tr>
                
		<tr> 
                  <td width="51%"><FONT CLASS=FONT><b>Link (donde apuntara el Banner)<br>(http://www.link.com)</b></font></td>
                  <td width="49%"> 
                    <div align="center"> 
                      <input type="text" CLASS=FONTINPUTBANNER name="Link" size="35" maxlength="150">
                    </div>
                  </td>
                </tr>
                <tr> 
                  <td width="51%" height="2">&nbsp;</td>
                  <td width="49%" height="2"> 
                    <div align="center"> 
                      <input type="submit" CLASS=FONTBOTON name="Submit" value="Agregar Banner">
                    </div>
                  </td>
                </tr>
                <tr>
                  <td width="51%" height="2">&nbsp;</td>
                  <td width="49%" height="2">
                    <div align="center"><FONT CLASS=FONT><b>No Olvide haber subido la Imagen!! (banner) </b></font> </div>
                  </td>
                </tr>
              </table>
            </form>
          </td>
        </tr>
        <tr> 
          <td height="2">&nbsp;</td>
        </tr>

	<tr ALIGN=CENTER> 
          <td BGCOLOR="#CCCCCC" height="4" VALIGN=CENTER> 
            <p><FONT CLASS=FONTTITLEBANNER ><b>Cómo lo visualizo en mi web?</b></font></p>
          </td>
        </tr>
	<tr > 
          <td > 
            <p><FONT CLASS=FONT >Debera copiar el siguiente código en el archivo que desee que se muesten los banners:</font></p>
          </td>
        </tr>
	<tr>
		<td>

			<table align=center class=tablainterna>
			<tr>
			<td>
				
			<font class=FONT><b>	&LT;!--#INCLUDE virtual="/cgi-bin/tobanner/admin/banners.asp"--&GT; <br>
				&LT;% <br>
				Rnd_Banner() <br>
				%&GT;</b></font>

			</td>
			</tr>

			</table>

		</td>
	</tr>

        <tr ALIGN=CENTER> 
          <td BGCOLOR="#CCCCCC" height="4" VALIGN=CENTER> 
            <p><FONT CLASS=FONTTITLEBANNER ><b>Editar Banner</b></font></p>
          </td>
        </tr>
        <tr>
          <td height="8"><img src="clearpixel.gif" width="1" height="1"></td>
        </tr>
        <tr> 
          <td height="2"><FONT CLASS=FONT>Seleccione el banner de la lista debajo y luego haga click en 'Editar Banner' para editar las propiedades del mismo.</font></td>
        </tr>
        <tr> 
          <td height="2"> 
            <form method="post" action="edit_banner.asp" name="form2">
              <table width="84%" border="0" align="center">
                <tr ALIGN=RIGHT> 
                  <td width="32%"><FONT CLASS=FONT><b>Seleccione el Banner</b></font></td>
                  <td width="68%"> 
                    <div align="center"> <%
strconn = "DRIVER=Microsoft Access Driver (*.mdb);DBQ=" & Server.MapPath("banners.mdb")
set conn = server.createobject("adodb.connection")
conn.open strconn
set rs = server.createobject("adodb.recordset")
Query = "SELECT * FROM banners ORDER BY Name"
rs.open Query, conn
%> 
                      <SELECT CLASS=FONTINPUTBANNER id="FormsComboBox2" NAME="ID">
                        <%
'debug: Response.Write(Query)
if not rs.eof Then
rs.movefirst
Do While NOt Rs.EOF 
%> 
                        <OPTION VALUE="<%=rs("ID")%>"><%=rs("Name")%></OPTION>
                        <%
rs.movenext
Loop
%> 
                      </SELECT>
                      <%
else
	response.write("<P>An error has occurred within our database!</b><P><BR>") 
end if
rs.close
set strconn = nothing
set conn = nothing
set rs = nothing
%> </div>
                  </td>
                </tr>
                <tr> 
                  <td width="32%"> 
                    <p>&nbsp;</p>
                  </td>
                  <td width="68%"> 
                    <center>
                      <input CLASS=FONTBOTON type="submit" name="Submit" value="Editar Banner">
                    </center>
                  </td>
                </tr>
              </table>
            </form>
          </td>
        </tr>
        <tr> 
          <td height="2">&nbsp;</td>
        </tr>
	<tr align=center>
        <td BGCOLOR="#CCCCCC" height="4" VALIGN=CENTER> 
            <p><FONT CLASS=FONTTITLEBANNER ><b>Borrar Banner</b></font></p>
        </tr>
        <tr> 
          <td height="9"><img src="clearpixel.gif" width="1" height="1"></td>
        </tr>
        <tr> 
          <td height="2"><FONT CLASS=FONT>Seleccione el banner de la lista debajo y luego haga click en 'Borrar Banner' para borrar el mismo.</font></td>
        </tr>
        <tr> 
          <td height="2"> 
            <form method="post" action="delete_banner.asp" name="form3" onsubmit="return confirmDelete()">
              <table width="84%" border="0" align="center">
                <tr ALIGN=RIGHT> 
                  <td width="32%"><FONT CLASS=FONT><b>Seleccione Banner</b></font></td>
                  <td width="68%"> 
                    <div align="center"> <%
strconn = "DRIVER=Microsoft Access Driver (*.mdb);DBQ=" & Server.MapPath("banners.mdb")
set conn = server.createobject("adodb.connection")
conn.open strconn
set rs = server.createobject("adodb.recordset")
Query = "SELECT * FROM banners ORDER BY Name"
rs.open Query, conn
%> 
                      <SELECT CLASS=FONTINPUTBANNER id="FormsComboBox2" NAME="ID">
                        <%
'debug: Response.Write(Query)
if not rs.eof Then
rs.movefirst
Do While NOt Rs.EOF 
%> 
                        <OPTION VALUE="<%=rs("ID")%>"><%=rs("Name")%></OPTION>
                        <%
rs.movenext
Loop
%> 
                      </SELECT>
                      <%
else
	response.write("<P>oCURRIO UN ERROR EN LA BAS DE DATOS!</b><P><BR>") 
end if
rs.close
set strconn = nothing
set conn = nothing
set rs = nothing
%> </div>
                  </td>
                </tr>
                <tr> 
                  <td width="32%" height="2"> 
                    <p>&nbsp;</p>
                  </td>
                  <td width="68%" height="2"> 
                    <center>
                      <INPUT CLASS=FONTBOTON type="submit" name="Submit" value="Borrar Banner">
                    </center>
                  </td>
                </tr>
              </table>
            </form>
          </td>
        </tr>
        <tr> 
          <td height="2">&nbsp;</td>
        </tr>
        <tr bordercolor="#000000"> 
          <td height="2"> 
            <div align="center">
              <input type="button" CLASS=FONTBOTON value="SALIR" onClick="location.href='LOGOUT.ASP';" name="button">
              </font> </div>
          </td>
        </tr>
        
      </table>
    </td>
  </tr>

</table>

<!--#include file="INC_FOOTER.ASP"-->


</body>
</html>