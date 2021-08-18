<!--#INCLUDE FILE="config.inc" -->
<!--#INCLUDE FILE="top.inc" -->
<%
if Request.QueryString("mode") = "doit" then

	Set myMail = server.createobject("cdonts.newmail")

	set my_conn= Server.CreateObject("ADODB.Connection")
	my_Conn.Open ConnString
	
	mssg = "Esta es una contestación a su pedido de reenvío de contraseña perteneciente a " & BBTitle & "." & vbCrLf & vbCrLf
	
	
	strSql = "Select M_name, M_Password, M_Email from members where M_Name = '"
	strSql = strSql & Request.Form("Name") & "' and M_Email ='"
	strSql = strSql & Request.Form("email") & "'"
	
	set rs = my_conn.Execute (StrSql)
	
	if rs.EOF or rs.BOF then
		mssg = mssg & "Disculpe, la información ingresada es incorrecta." & vbCrLf & vbCrLf
		mssg = mssg & "Deberá registrarse nuevamente." & vbCrLf
	Else
		mssg = mssg & "Su contraseña es: " & rs("M_Password") & vbCrLf
	End if
	
	mssg = mssg & "Gracias por utilizar nuestros foros de discusión"
	
	
	myMail.send BBemail, request.form("email"), "Reenvío de contraseña perteneciente a " & BBtitle, mssg, 0

	Set Mymail=Nothing	

	on error resume next
	rs.close
	set rs=nothing
	my_conn.Close
	set my_conn = nothing
%>
<body bgcolor="#000000" text="#000000" link="#FFFFFF" vlink="#FFFFFF" alink="#FFFFFF">
<p align=center><font face="<% =DefaultFontFace %>" size=4>Reenvío de contraseña</p>
<p align=center><font face="<% =DefaultFontFace %>" size=2>La contraseña le ha sido enviada vía email!</p>

<%	
Else
%>

<p align=center><font face="<% =DefaultFontFace %>" size=4>Reenvio de contraseña</p>
<form action="pword.asp?mode=doit" method="post">
<div align="center">
<TABLE background="" bgColor=#b0c4de border=1 borderColor=#000000 cellPadding=0 
cellSpacing=0 width=70%>
<TBODY>
<TR>
<TD width=50%><FONT face="<% =DefaultFontFace %>" size=2>Usuario </TD>
<TD width=50%><FONT face="<% =DefaultFontFace %>" size=3>
<INPUT name=Name size=30> </FONT></TD>
<TR>
<TD><FONT face="<% =DefaultFontFace %>" size=2>Email</TD>
<TD><FONT face="<% =DefaultFontFace %>" size=3>
<INPUT name=email size=30 type=password value=""></FONT></TD>
</TR>

<TD align=middle colSpan=2><INPUT name=submit1 type=submit value=Enviar></TD></TR></TBODY></TABLE></FONT></TD></TR></TBODY></TABLE>
<P> </P>

<%
End if 
%>

</body>
</html>