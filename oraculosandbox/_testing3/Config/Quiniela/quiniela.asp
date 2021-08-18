<%@LANGUAGE="VBSCRIPT" CODEPAGE="1252"%>
<!--#include file="../../Connections/OraculoSemanal.inc" -->
<%
Set rsQuinielas = Server.CreateObject("ADODB.Recordset")
rsQuinielas.ActiveConnection = MM_OraculoSemanal_STRING
rsQuinielas.Source = "SELECT * FROM vQuinielas order by quiniela"
rsQuinielas.CursorType = 3
rsQuinielas.CursorLocation = 2
rsQuinielas.LockType = 1
rsQuinielas.Open()
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
	<td colspan="2"><p><b>Quiniela</b></p></td>
</tr>
<%
if rsQuinielas.recordCount > 0 then
rsQuinielas.MoveFirst
while not rsQuinielas.EOF
%>
<tr>
	<td width="400"><p><%=rsQuinielas("quiniela")%></p></td>
	<td width="200"><p><a href="modificar.asp?idQuiniela=<%=rsQuinielas("idQuiniela")%>">Modificar</a>&nbsp;&nbsp;&nbsp;<a href="eliminar.asp?idQuiniela=<%=rsQuinielas("idQuiniela")%>">Eliminar</a></p></td>
</tr>
<%
rsQuinielas.MoveNext
wend
end if
%>
<tr>
	<form name="frAgregaQuiniela" method="post" action="agregar.asp">
	<td width="400">
	<p><input name="txtQuiniela" type="text" size="50" maxlength="50"></p>
	</td>
	<td width="200"><p><a href="javascript:document.frAgregaQuiniela.submit();">Agregar</a></p></td>
  </form>
</tr>
</table>
</body>
</html>

<%
rsQuinielas.Close()
set rsQuinielas = Nothing
%>