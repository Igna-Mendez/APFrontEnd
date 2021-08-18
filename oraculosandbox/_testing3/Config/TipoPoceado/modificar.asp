<%@LANGUAGE="VBSCRIPT" CODEPAGE="1252"%>
<!--#include file="../../Connections/OraculoSemanal.inc" -->
<%
Set rsTipoPoceados = Server.CreateObject("ADODB.Recordset")
rsTipoPoceados.ActiveConnection = MM_OraculoSemanal_STRING
rsTipoPoceados.Source = "SELECT * FROM vTiposPoceados where idTipoPoceado = "+ Request.QueryString("idTipoPoceado") +"order by poceado, tipoPoceado"
rsTipoPoceados.CursorType = 3
rsTipoPoceados.CursorLocation = 2
rsTipoPoceados.LockType = 1
rsTipoPoceados.Open()

if rsTipoPoceados.recordcount > 0 then
rsTipoPoceados.moveFirst

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
	<form name="frModificaTipoPoceado" method="post" action="modificar2.asp">
	<td width="400">
	<p><input name="txtTipoPoceado" type="text" size="50" maxlength="50" value="<%=rsTipoPoceados("tipopoceado")%>"><br><%=rsTipoPoceados("poceado")%></p>
	</td>
	<td width="200"><p><a href="javascript:document.frModificaTipoPoceado.submit();">Modificar</a></p></td>
    <input type="hidden" name="hiIdTipoPoceado" value="<%=Request.QueryString("idTipoPoceado")%>">
    <input type="hidden" name="hiIdPoceado" value="<%=rsTipoPoceados("idPoceado")%>">

	</form>
</tr>
</table>  
</body>
</html>
<%
	rsTipoPoceados.close
	set rsTipoPoceados = nothing
else
	rsTipoPoceados.close
	set rsTipoPoceados = nothing

	response.Redirect("./tipoPoceado.asp")
end if
%>