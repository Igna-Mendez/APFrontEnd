<%@LANGUAGE="VBSCRIPT" CODEPAGE="1252"%>
<!--#include file="../../Connections/OraculoSemanal.inc" -->
<%
Set rsPoceados = Server.CreateObject("ADODB.Recordset")
rsPoceados.ActiveConnection = MM_OraculoSemanal_STRING
rsPoceados.Source = "SELECT * FROM vPoceados order by poceado"
rsPoceados.CursorType = 3
rsPoceados.CursorLocation = 2
rsPoceados.LockType = 1
rsPoceados.Open()
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
	<td colspan="2"><p><b>Poceado</b></p></td>
</tr>
<%
if rsPoceados.recordCount > 0 then
rsPoceados.MoveFirst
while not rsPoceados.EOF
%>
<tr>
	<td width="400"><p><%=rsPoceados("poceado")%> (<%=rsPoceados("codPoceado")%>)</p></td>
	<td width="200"><p><a href="modificar.asp?idPoceado=<%=rsPoceados("idPoceado")%>">Modificar</a>&nbsp;&nbsp;&nbsp;<a href="eliminar.asp?idPoceado=<%=rsPoceados("idPoceado")%>">Eliminar</a></p></td>
</tr>
<%
rsPoceados.MoveNext
wend
end if
%>
<tr>
	<form name="frAgregaPoceado" method="post" action="agregar.asp">
	<td width="400">
	<p><input name="txtPoceado" type="text" size="50" maxlength="50">&nbsp;<input name="txtCodPoceado" type="text" size="5" maxlength="5"></p>
	</td>
	<td width="200"><p><a href="javascript:document.frAgregaPoceado.submit();">Agregar</a></p></td>
  </form>
</tr>
</table>
</body>
</html>

<%
rsPoceados.Close()
set rsPoceados = Nothing
%>