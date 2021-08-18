<%
dim strconn
dim conn
dim rs

strconn = "DRIVER=Microsoft Access Driver (*.mdb);DBQ=" & Server.MapPath("../banners.mdb")
set conn = server.createobject("adodb.connection")
conn.open strconn
set rs = server.createobject("adodb.recordset")

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