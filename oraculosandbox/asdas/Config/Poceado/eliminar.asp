<%@LANGUAGE="VBSCRIPT" CODEPAGE="1252"%>
<!--#include file="../../Connections/OraculoSemanal.inc" -->
<%
Response.Expires = 0
if Request.QueryString("idPoceado") <> "" Then
set spDownPoceado = Server.CreateObject("ADODB.Command")
spDownPoceado.ActiveConnection = MM_OraculoSemanal_STRING
spDownPoceado.CommandText = "dbo.spDownPoceado"
spDownPoceado.CommandType = 4
spDownPoceado.CommandTimeout = 0
spDownPoceado.Prepared = true
spDownPoceado.Parameters.Append spDownPoceado.CreateParameter("@RETURN_VALUE", 3, 4)
spDownPoceado.Parameters.Append spDownPoceado.CreateParameter("@idPoceado", 20, 1, 9, Request.QueryString("idPoceado"))
spDownPoceado.Execute()
end if
response.Redirect("./poceado.asp")
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