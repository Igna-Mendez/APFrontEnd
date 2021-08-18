<%
ID = Request.Form("ID")

dim strconn
dim conn
dim rs
dim strSQL

strconn = "DRIVER=Microsoft Access Driver (*.mdb);DBQ=" & Server.MapPath("../banners.mdb")
set conn = server.createobject("adodb.connection")
conn.open strconn
set rs = server.createobject("adodb.recordset")

strSQL = "SELECT * FROM banners WHERE ID = "&ID

rs.open strSQL, conn, 2, 2
rs("Name") = request.form("Name")
rs("Image") = request.form("Image")
rs("Link") = request.form("Link")
rs.update
rs.close

set rs = nothing
set conn = nothing
set strconn = nothing

response.redirect("thanks.asp?opt=Edit")
%>