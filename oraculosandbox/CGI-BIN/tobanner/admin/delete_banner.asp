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

strSQL = "SELECT * FROM banners WHERE ID = "& CStr(ID)
rs.open strSQL, conn, 2, 2
rs.delete
rs.update
rs.close

set rs = nothing
set conn = nothing
set strconn = nothing

response.redirect("thanks.asp?opt=Delete")
%>