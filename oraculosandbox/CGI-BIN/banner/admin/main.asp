<%@ LANGUAGE = VBScript.Encode %>
<html>
<head>
<title><% Response.Write("Administrador de Banner") %></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body bgcolor="#6699FF" text="#FFFFFF" link="#FFFFFF" vlink="#99CCFF" alink="#0000FF">
<%imagen=Request.Form ("atach")
imagen="/cgi-bin/banner/"&imagen%>
<table width="750" border="1">
  <tr>
    <td height="14"> 
 <table width="86%" border="0" height="70">
        <tr> 
               </td>
              </tr>
            </table>
          </td>
        </tr>
      </table>
    </td>
  </tr>
</table>     
<img src="line.gif" width="750" height="9"> 
<table width="750" border="1" height="234">
  <tr> 
    <td height="371"> 
      <table width="86%" border="0">
        <tr> 
          <td height="2"><font size="4"><b><font face="Arial, Helvetica, sans-serif" size="3">Panel de control</font></b></font></td>
        </tr>
        <tr> 
          <td height="8"><img src="clearpixel.gif" width="1" height="1"></td>
        </tr>
        <tr> 
          <td height="7"><font size="2" face="Arial, Helvetica, sans-serif">Con el botón Browse y luego Adjuntar suba la imagen. Luego llene los casilleros de abajo.</font></td>
        </tr>
        <tr> 
          <td height="38"> 
        
				<tr> 
                  <td width="51%" height="2"> 
                    <p><font size="2" face="Arial, Helvetica, sans-serif"><b>Subir Imagen 
                       </b></font></p>
                  </td>
                  <td width="49%" height="2"> 
                    <div align="center"> 
<FORM METHOD="POST" ENCTYPE="multipart/form-data" ACTION="prgattach.asp"> 
<INPUT TYPE=FILE SIZE=30 NAME="atach">
<INPUT TYPE=SUBMIT VALUE="Adjuntar"> 
</FORM>
                    </div>
                  </td>
                </tr>
		
		
		    <form method="post" action="add_banner.asp" name="form1">
              <table width="83%" border="0" align="center">
                
				
				<tr> 
                  <td width="51%" height="2"><font size="2" face="Arial, Helvetica, sans-serif"><b>Nombre para el banner (e.g. Company)</b></font></td>
                  <td width="49%" height="2"> 
                    <div align="center"> 
                      <input type="text" name="Name" size="35" maxlength="100">
                    </div>
                  </td>
                </tr>
                
				                
				<tr> 
                  <td width="51%" height="2"> 
                    <p><font size="2" face="Arial, Helvetica, sans-serif"><b>Ubicacion de la Imagen (e.g. /banner/banner.gif) </b></font></p>
				  </td>
                  <td width="49%" height="2"> 
                    <div align="center"> 
                      <input type="text" name="Image" size="35" maxlength="150" value="<%=imagen%>">
                    </div>
                  </td>
                </tr>
                
				<tr> 
                  <td width="51%"><font size="2" face="Arial, Helvetica, sans-serif"><b>Link 
                    (donde apuntara el Banner)<br>(http://www.link.com)</b></font></td>
                  <td width="49%"> 
                    <div align="center"> 
                      <input type="text" name="Link" size="35" maxlength="150">
                    </div>
                  </td>
                </tr>
                <tr> 
                  <td width="51%" height="2">&nbsp;</td>
                  <td width="49%" height="2"> 
                    <div align="center"> 
                      <input type="submit" name="Submit" value="Add Banner">
                    </div>
                  </td>
                </tr>
                <tr>
                  <td width="51%" height="2">&nbsp;</td>
                  <td width="49%" height="2">
                    <div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><b>No Olvide haber subido la Imagen!! (banner) </b></font> </div>
                  </td>
                </tr>
              </table>
            </form>
          </td>
        </tr>
        <tr> 
          <td height="2">&nbsp;</td>
        </tr>
        <tr> 
          <td height="2"> 
            <p><font face="Arial, Helvetica, sans-serif" size="3"><b>Editar Banner</b></font></p>
          </td>
        </tr>
        <tr>
          <td height="8"><img src="clearpixel.gif" width="1" height="1"></td>
        </tr>
        <tr> 
          <td height="2"><font size="2" face="Arial, Helvetica, sans-serif">Seleccione el banner de la lista debajo y luego haga click en 'Edit Banner' para editar las propiedades del mismo.</font></td>
        </tr>
        <tr> 
          <td height="2"> 
            <form method="post" action="edit_banner.asp" name="form2">
              <table width="84%" border="0" align="center">
                <tr> 
                  <td width="32%"><font size="2" face="Arial, Helvetica, sans-serif"><b>Seleccione el Banner</b></font></td>
                  <td width="68%"> 
                    <div align="center"> <%
strconn = "DRIVER=Microsoft Access Driver (*.mdb);DBQ=" & Server.MapPath("../banners.mdb")
set conn = server.createobject("adodb.connection")
conn.open strconn
set rs = server.createobject("adodb.recordset")
Query = "SELECT * FROM banners ORDER BY Name"
rs.open Query, conn
%> 
                      <SELECT id="FormsComboBox2" NAME="ID">
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
                      <input type="submit" name="Submit" value="Edit Banner">
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
        <tr> 
          <td height="2"><font face="Arial, Helvetica, sans-serif" size="3"><b>Borrar Banner </b></font></td>
        </tr>
        <tr> 
          <td height="9"><img src="clearpixel.gif" width="1" height="1"></td>
        </tr>
        <tr> 
          <td height="2"><font size="2" face="Arial, Helvetica, sans-serif">Seleccione el banner de la lista debajo y luego haga click en 'Delete Banner' para borrar el mismo.</font></td>
        </tr>
        <tr> 
          <td height="2"> 
            <form method="post" action="delete_banner.asp" name="form3">
              <table width="84%" border="0" align="center">
                <tr> 
                  <td width="32%"><font size="2" face="Arial, Helvetica, sans-serif"><b>Seleccione Banner</b></font></td>
                  <td width="68%"> 
                    <div align="center"> <%
strconn = "DRIVER=Microsoft Access Driver (*.mdb);DBQ=" & Server.MapPath("../banners.mdb")
set conn = server.createobject("adodb.connection")
conn.open strconn
set rs = server.createobject("adodb.recordset")
Query = "SELECT * FROM banners ORDER BY Name"
rs.open Query, conn
%> 
                      <SELECT id="FormsComboBox2" NAME="ID">
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
                  <td width="32%" height="2"> 
                    <p>&nbsp;</p>
                  </td>
                  <td width="68%" height="2"> 
                    <center>
                      <input type="submit" name="Submit" value="Delete Banner">
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
            <div align="center"><font size="2" face="Arial, Helvetica, sans-serif">Click 
              aqui para volver<br>
              <input type="button" value="Back" onClick="history.go(-1)" name="button">
              </font> </div>
          </td>
        </tr>
        <tr bordercolor="#000000"> 
          <td height="2"><font size="2" face="Arial, Helvetica, sans-serif"><a href="http://www.Towebs.com" target="new"><b>http://www.Towebs.com</a></font></td>
        </tr>
      </table>
    </td>
  </tr>
</table>
<p>&nbsp;</p>
</body>
</html>