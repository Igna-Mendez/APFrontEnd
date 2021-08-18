<%
ID = request.form("ID")

dim strconn
dim conn
dim rs
dim strSQL

strconn = "DRIVER=Microsoft Access Driver (*.mdb); DBQ=" & Server.MapPath("../banners.mdb")

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