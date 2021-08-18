<%@ LANGUAGE = VBScript.Encode %>
<%IF SESSION("BANNER_SITE_LOGIN") <> "True" THEN
RESPONSE.REDIRECT ("DEFAULT.ASP")
END IF%>

<%
ID = request.form("ID")

IF (ID="") then%>

<html>
<head>

 <link href="stylesheet.css" rel="stylesheet" type="text/css" media="all" />  
</head>	
<table CLASS=tabla align=center>
<tr align=center>
	<td>
		<FONT CLASS=FONTTITLE><B> ERROR!!: No hay banner seleccionado <B></B></FONT>
	</td>
</tr>

        <tr bordercolor="#000000"> 
          <td height="2"> 
            <div align="center">
              <input type="button" CLASS=FONTBOTON value="VOLVER" onClick="history.go(-1)" name="button">
              </font> </div>
          </td>
        </tr>

</table>
</center>

</html>


<%
response.end
END IF

dim strconn
dim conn
dim rs
dim strSQL

strconn = "DRIVER=Microsoft Access Driver (*.mdb); DBQ=" & Server.MapPath("banners.mdb")

set conn = server.createobject("adodb.connection")
conn.open strconn
set rs = server.createobject("adodb.recordset")

strSQL = "SELECT * FROM banners WHERE ID = "&ID

rs.open strSQL, conn

if not rs.EOF Then
	strName = rs("Name")
	strImage = rs("Image")
	strLink = rs("Link")
End If

rs.close

set rs = nothing
set conn = nothing
set strconn = nothing
%>
<html>
<head>
<title><% Response.Write("Banner Admin from WEBSITE CONTRIBUTOR") %></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="stylesheet.css" rel="stylesheet" type="text/css" media="all" />
</head>

<body bgcolor="#FFFFFF" text="#FFFFFF" link="#FFFFFF" vlink="#99CCFF" alink="#0000FF">

<table width="750" align=center CLASS=TABLA border="0" height="234">
  <tr> 
    <td height="2"> 
      <table width="100%" border="0">
        <tr bgcolor="#CCCCCC" align=center> 
          <td height="2">
		<font CLASS=FONTTITLEBANNER><b>Editar Banner</b></font>
	  </td>
        </tr>
        <tr> 
          <td height="8"><img src="clearpixel.gif" width="1" height="1"></td>
        </tr>
        <tr> 
          <td height="7"><font CLASS=FONT>Realice los cambios necesarios en los campos de abajo y confirmelos con el botón "Editar Banner".</font></td>
        </tr>
        <tr> 
          <td height="38"> 
            <form method="post" action="edit_banner2.asp" name="form1">
              <table width="83%" border="0" align="center">
                <tr> 
                  <td width="51%" height="2"><FONT CLASS=FONT><b>Nombre para el banner (e.g. Company)</b></font></td>
                  <td width="49%" height="2"> 
                    <div align="center"> 
                      <input type="text" CLASS=FONTINPUTBANNER name="Name" size="35" maxlength="100" value="<%=strName%>">
                    </div>
                  </td>
                </tr>
                <tr> 
                  <td width="51%" height="2"> 
                     <p><FONT CLASS=FONT><b>Ubicacion de la Imagen (e.g. /tobanner/banner.gif) </b></font></p>
                  </td>
                  <td width="49%" height="2"> 
                    <div align="center"> 
                      <input type="text" CLASS=FONTINPUTBANNER name="Image" size="35" maxlength="150" value="<%=strImage%>">
                    </div>
                  </td>
                </tr>
                <tr> 
                      <td width="51%"><FONT CLASS=FONT><b>Link (donde apuntara el Banner)<br>(http://www.link.com)</b></font></td>
                  <td width="49%"> 
                    <div align="center"> 
                      <input type="text" CLASS=FONTINPUTBANNER name="Link" size="35" maxlength="150" value="<%=strLink%>">
                    </div>
                  </td>
                </tr>
                <tr> 
                  <td width="51%" height="2">&nbsp;</td>
                  <td width="49%" height="2"> 
                    <div align="center">
		      <input type="hidden" name="ID" value="<%=ID%>">
                      <input type="submit"  CLASS=FONTBOTON name="Submit" value="Editar Banner">
                    </div>
                  </td>
                </tr>
                <tr> 
                  <td width="51%" height="2">&nbsp;</td>
                  <td width="49%" height="2"> 
                    <div align="center"><FONT CLASS=FONT><b>No Olvide subir la imagen del banner, si cambio! </b></font> </div>
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
            <div align="center"><font size="2" face="Arial, Helvetica, sans-serif">
              <input type="button" CLASS=FONTBOTON value="VOLVER" onClick="history.go(-1)" name="button">
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