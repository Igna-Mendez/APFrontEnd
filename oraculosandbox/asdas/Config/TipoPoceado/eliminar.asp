<%@LANGUAGE="VBSCRIPT" CODEPAGE="1252"%>
<!--#include file="../../Connections/OraculoSemanal.inc" -->
<%
Response.Expires = 0
if Request.QueryString("idTipoPoceado") <> "" Then
set spDownTipoPoceado = Server.CreateObject("ADODB.Command")
spDownTipoPoceado.ActiveConnection = MM_OraculoSemanal_STRING
spDownTipoPoceado.CommandText = "dbo.spDownTipoPoceado"
spDownTipoPoceado.CommandType = 4
spDownTipoPoceado.CommandTimeout = 0
spDownTipoPoceado.Prepared = true
spDownTipoPoceado.Parameters.Append spDownTipoPoceado.CreateParameter("@RETURN_VALUE", 3, 4)
spDownTipoPoceado.Parameters.Append spDownTipoPoceado.CreateParameter("@idTipoPoceado", 20, 1, 9, Request.QueryString("idTipoPoceado"))
spDownTipoPoceado.Execute()
end if
response.Redirect("./tipoPoceado.asp")
%>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Documento sin t&iacute;tulo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>

</body>
</html>