<!--#INCLUDE FILE="config.inc" -->
<%
strconn = "DRIVER={Microsoft Access Driver (*.mdb)};DBQ=" & server.mappath("ubbs.mdb")
set conn = Server.CreateObject("ADODB.Connection")
conn.open strconn
conn.Execute("Delete * From Category")
conn.Execute("Delete * From Forum")
conn.Execute("Delete * From Reply")
conn.Execute("Delete * From Topics")

conn.close
%>
<center>Base Limpia!!!</center>
