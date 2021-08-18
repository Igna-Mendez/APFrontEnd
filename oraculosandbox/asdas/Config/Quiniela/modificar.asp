<%@LANGUAGE="VBSCRIPT" CODEPAGE="1252"%>
<!--#include file="../../Connections/OraculoSemanal.inc" -->
<%
Set rsQuinielas = Server.CreateObject("ADODB.Recordset")
rsQuinielas.ActiveConnection = MM_OraculoSemanal_STRING
rsQuinielas.Source = "SELECT * FROM vQuinielas where idQuiniela = "+ Request.QueryString("idQuiniela") +"order by quiniela"
rsQuinielas.CursorType = 3
rsQuinielas.CursorLocation = 2
rsQuinielas.LockType = 1
rsQuinielas.Open()

if rsQuinielas.recordcount > 0 then
rsQuinielas.moveFirst

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
	<form name="frModificaQuiniela" method="post" action="modificar2.asp">
	<td width="400">
	<p><input name="txtQuiniela" type="text" size="50" maxlength="50" value="<%=rsquinielas("quiniela")%>"></p>
	</td>
	<td width="200"><p><a href="javascript:document.frModificaQuiniela.submit();">Modificar</a></p></td>
    <input type="hidden" name="hiIdQuiniela" value="<%=Request.QueryString("idQuiniela")%>">
	</form>
</tr>
</table>  
</body>
</html>
<%
	rsQuinielas.close
	set rsquinielas = nothing
else
	rsQuinielas.close
	set rsquinielas = nothing

	response.Redirect("./quiniela.asp")
end if
%>