<BODY bgColor=#33aacc>
<%
opcion=Request.Form ("resul")
'Response.Write opcion
ipadd=Request.ServerVariables("REMOTE_ADDR")
'Verificamos que efectivamente alguien haya votado.
If Request.Form="" then
'Si no votó y redireccionamos a index.html
Response.Redirect "index.html" 
%>
<HTML>
<HEAD>
<TITLE>Encuesta con ASP</TITLE>
</HEAD>
<BODY>
<center>
<%
Else
'guardamos en voto la info del formulario.
voto = Request.Form("mismo")
'Conectamos a la BD.
Set oConn = Server.CreateObject ("ADODB.Connection")
Set RS = Server.CreateObject ("ADODB.RecordSet")
oConn.Open "DRIVER={Microsoft Access Driver (*.mdb)}; DBQ="& Server.MapPath("enc.mdb")
'Con una sentencia SQL pedimos toda la BD.
sql = "SELECT * FROM IP where IP='"&ipadd&"'"
RS.Open sql, oConn, 2, 2

if opcion <> "r" then
if not Rs.eof then
	Response.write "Ya han Votado de esta PC"
	Response.end
End If
oConn.Execute "INSERT INTO IP(IP) VALUES ('"&ipadd&"')"
End if
RS.close


sql = "SELECT * FROM tabla"
RS.Open sql, oConn, 2, 2
'Si es el primer voto de todos, creamos el registro para que los UPDATES funcionen.
'Este IF solo se cumplirá una vez. La primera.
If RS.EOF = True Then
oConn.Execute "INSERT INTO tabla(Dato1, Dato2, Dato3, Dato4) VALUES (0,0,0,0)"
RS.Requery
End If
'Comenzamos el chequeo de datos. Para todos igual
If voto = "1" then
	'Si se cumple el IF, sumamos uno al campo correspondiente.
	oConn.Execute "UPDATE tabla SET Dato1="&RS.Fields("Dato1")+1&""
	'La siguiente linea hace un Refresh en la Tabla, para tener los datos recientes.
	RS.Requery
	Response.Write "<b><center><BR>Voto sumado a NotePad</b><BR></center>"
ElseIf voto = "2" then
	oConn.Execute "UPDATE tabla SET Dato2="&RS.Fields("Dato2")+1&""
	RS.Requery
	Response.Write "<b><center><BR>Voto sumado a HomeSite</b><BR></center>"
ElseIf voto = "3" then
	oConn.Execute "UPDATE tabla SET Dato3="&RS.Fields("Dato3")+1&""
	RS.Requery
	Response.Write "<b><center><BR>Voto sumado a DreamWeaber</b><BR></center>"
ElseIf voto = "4" then
	oConn.Execute "UPDATE tabla SET Dato4="&RS.Fields("Dato4")+1&""
	RS.Requery
	Response.Write "<b><center><BR>Voto sumado a Visual Interdev</b><BR></center>"
End If
'Sumamos todos los votos y los guardamos en una variable.
	total = CInt(RS("Dato1"))+CInt(RS("Dato2"))+CInt(RS("Dato3"))+CInt(RS("Dato4"))
%>
<!-- Creo la tabla que muestra los datos-->
<center>
<br><br><br>
<TABLE bgcolor="#99CCFF" bordercolorlight="white" border="1">
	<TR><td align="center"><FONT size=3><B><U>Resultados sobre <%=total%> 	votos</U></B></FONT></TD></TR>
	<TR><TD>¿Qué programa usas para escribir tus scripts?


<TABLE border="0" cellPadding=2 cellSpacing=0 bgcolor="#99CCFF">
  <TBODY>
  <tr>
  <TR vAlign=bottom>
    <TD><FONT face=Arial,Helvetica size=2><B>Descripción</B></FONT></TD>
    <TD colSpan=3><center><B>Porcentaje de votos</B></center></TD></TR>
    <TD><FONT face=Arial,Helvetica size=2><B>Notepad: </B></FONT></TD>
    <TD colSpan=3><%=CInt(RS("dato1")*100/total)%>%  (<%=CInt(RS("dato1"))%> Votos)</TD></TR>
  <TR vAlign=bottom>
    <TD><FONT face=Arial,Helvetica size=2><B>HomeSite: </B></FONT></TD>
    <TD colSpan=3><%=CInt(RS("dato2")*100/total)%>%  (<%=CInt(RS("dato2"))%> Votos)</TD></TR>
  <TR>
    <TD><FONT face=Arial,Helvetica size=2><B>DreamWeaber: </B></FONT></TD>
    <TD><%=CInt(RS("dato3")*100/total)%>%  (<%=CInt(RS("dato3"))%> Votos)</TD></TR>
  <TR>
    <TD><FONT face=Arial,Helvetica size=2><B>Visual Interdev: </B></FONT></TD>
    <TD><%=CInt(RS("dato4")*100/total)%>%  (<%=CInt(RS("dato4"))%> Votos)</TD></TR>
<P><tr><td align="right" width="50%"></td></tr>
</TBODY></TABLE></TD></TR></TABLE>
</FORM></CENTER></P></BODY></HTML>
</BODY>

</BODY>
</HTML>
<%
'Limpiamos y cerramos todo. 
RS.Close
oConn.Close
Set Rs = Nothing
Set oConn = Nothing
End If
%>