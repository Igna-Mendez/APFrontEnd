<%@LANGUAGE="VBSCRIPT" CODEPAGE="1252"%>
<!--#include file="../../Connections/OraculoSemanal.inc" -->
<%
Set rsTipoPoceados = Server.CreateObject("ADODB.Recordset")
rsTipoPoceados.ActiveConnection = MM_OraculoSemanal_STRING
rsTipoPoceados.Source = "SELECT * FROM vTiposPoceados order by poceado, tipoPoceado"
rsTipoPoceados.CursorType = 3
rsTipoPoceados.CursorLocation = 2
rsTipoPoceados.LockType = 1
rsTipoPoceados.Open()


Set rsPoceados = Server.CreateObject("ADODB.Recordset")
rsPoceados.ActiveConnection = MM_OraculoSemanal_STRING
rsPoceados.Source = "SELECT * FROM poceados order by poceado"
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
	<td colspan="2"><p><b>Subtipo Poceado</b></p></td>
</tr>
<%
if rsTipoPoceados.recordCount > 0 then
rsTipoPoceados.MoveFirst
while not rsTipoPoceados.EOF
%>
<tr>
	<td width="400"><p><%=rsTipoPoceados("poceado")%>&nbsp;-&nbsp;<%=rsTipoPoceados("tipoPoceado")%> (<%=rsTipoPoceados("codPoceado")%>-<%=rsTipoPoceados("codTipoPoceado")%>)</p></td>
	<td width="200"><p><a href="modificar.asp?idTipoPoceado=<%=rsTipoPoceados("idTipoPoceado")%>">Modificar</a>&nbsp;&nbsp;&nbsp;<a href="eliminar.asp?idTipoPoceado=<%=rsTipoPoceados("idTipoPoceado")%>">Eliminar</a></p></td>
</tr>
<%
rsTipoPoceados.MoveNext
wend
end if
%>
<tr>
	<form name="frAgregaSubtipoPoceado" method="post" action="agregar.asp">
	<td width="400">
	<p><input name="txtTipoPoceado" type="text" id="txtTipoPoceado" size="50" maxlength="50">&nbsp;<input name="txtCodTipoPoceado" type="text" id="txtCodTipoPoceado" size="5" maxlength="5">&nbsp;
	  <select name="selPoceado" id="selPoceado">
<%
if rsPoceados.recordCount > 0 then
	rsPoceados.moveFirst
	while not rsPoceados.EOF 
%>
	    <option value="<%=rsPoceados("idPoceado")%>"><%=rsPoceados("poceado")%></option>
<%
	rsPoceados.moveNext
	wend
end if
%>
	    </select>
	</p>	</td>
	<td width="200"><p><a href="javascript:document.frAgregaSubtipoPoceado.submit();">Agregar</a></p></td>
  </form>
</tr>
</table>
</body>
</html>

<%
rsPoceados.Close()
set rsPoceados = Nothing

rsTipoPoceados.Close()
set rsTipoPoceados = Nothing

%>