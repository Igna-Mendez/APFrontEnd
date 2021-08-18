<%@LANGUAGE="VBSCRIPT" CODEPAGE="1252"%>
<!--#include file="../../Connections/OraculoSemanal.inc" -->
<%
Set rsMails = Server.CreateObject("ADODB.Recordset")
rsMails.ActiveConnection = MM_OraculoSemanal_STRING
rsMails.Source = "SELECT * FROM vMails order by mail"
rsMails.CursorType = 3
rsMails.CursorLocation = 2
rsMails.LockType = 1
rsMails.Open()
%>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Documento sin t&iacute;tulo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<table width="600" border="0">
<tr>
	<td colspan="2"><p><b>Mail</b></p></td>
</tr>
<%
if rsMails.recordCount > 0 then
rsMails.MoveFirst
while not rsMails.EOF
%>
<tr>
	<td width="400"><p>
<input name="cbActivo" type="checkbox" id="cbActivo" value="checkbox" <%if rsMails("activo") then%> checked <%end if%>>
	  &nbsp;<%=rsMails("mail")%>
	</p></td>
	<td width="200"><p><a href="eliminar.asp?mail=<%=rsMails("mail")%>">Eliminar</a></p></td>
</tr>
<%
rsMails.MoveNext
wend
end if
%>
<tr>
	<form name="frMail" method="post" action="agregar.asp">
	<td width="400">
	<p><input name="txtMailNuevo" type="text" id="txtMailNuevo" size="50" maxlength="50">&nbsp;</p></td>
	<td width="200"><p><a href="javascript:document.frMail.submit();">Agregar</a></p></td>
  </form>
</tr>
</table>
</body>
</html>
<%
rsMails.close
set rsMails = nothing
%>