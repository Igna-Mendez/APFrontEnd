<%IF SESSION("BANNER_SITE_LOGIN") <> "True" THEN
RESPONSE.REDIRECT ("DEFAULT.ASP")
END IF%>
<%

dim strconn
dim conn
dim rs

strconn = "DRIVER=Microsoft Access Driver (*.mdb);DBQ=" & Server.MapPath("banners.mdb")
set conn = server.createobject("adodb.connection")
conn.open strconn
set rs = server.createobject("adodb.recordset")



IF (request.form("Name")="") then%>

<html>
<head>

 <link href="stylesheet.css" rel="stylesheet" type="text/css" media="all" />  
</head>	
<table CLASS=tabla align=center>
<tr align=center>
	<td>
		<FONT CLASS=FONTTITLE2><B> ERROR!!: Falta nombre del Banner <B></B></FONT>
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

rs.open "banners", conn, 2, 2
rs.addnew
rs("Name") = request.form("Name")
rs("Image") = request.form("Image")
rs("Link") = request.form("Link")
rs.update
rs.close

set rs = nothing
set conn = nothing
set strconn = nothing

response.redirect("thanks.asp?opt=Add")
%>