<%@LANGUAGE="VBSCRIPT" CODEPAGE="1252"%>
<!--#include file="../../Connections/OraculoSemanal.inc" -->
<%
Set rsPoceados = Server.CreateObject("ADODB.Recordset")
rsPoceados.ActiveConnection = MM_OraculoSemanal_STRING
rsPoceados.Source = "SELECT * FROM vPoceados where idPoceado = "+ Request.QueryString("idPoceado") +"order by poceado"
rsPoceados.CursorType = 3
rsPoceados.CursorLocation = 2
rsPoceados.LockType = 1
rsPoceados.Open()

if rsPoceados.recordcount > 0 then
rsPoceados.moveFirst

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
	<form name="frModificaPoceado" method="post" action="modificar2.asp">
	<td width="400">
	<p><input name="txtPoceado" type="text" size="50" maxlength="50" value="<%=rsPoceados("poceado")%>"></p>
	</td>
	<td width="200"><p><a href="javascript:document.frModificaPoceado.submit();">Modificar</a></p></td>
    <input type="hidden" name="hiIdPoceado" value="<%=Request.QueryString("idPoceado")%>">
	</form>
</tr>
</table>  
</body>
</html>
<%
	rsPoceados.close
	set rsPoceados = nothing
else
	rsPoceados.close
	set rsPoceados = nothing

	response.Redirect("./poceado.asp")
end if
%>