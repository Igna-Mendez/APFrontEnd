<%@LANGUAGE="VBSCRIPT" CODEPAGE="1252"%>
<!--#include file="../../Connections/OraculoSemanal.inc" -->
<%
Response.Expires = 0
if (Request.Form("txtPoceado") <> "") and (Request.Form("txtCodPoceado") <> "") Then
set spUpPoceado = Server.CreateObject("ADODB.Command")
spUpPoceado.ActiveConnection = MM_OraculoSemanal_STRING
spUpPoceado.CommandText = "dbo.spUpPoceado"
spUpPoceado.CommandType = 4
spUpPoceado.CommandTimeout = 0
spUpPoceado.Prepared = true
spUpPoceado.Parameters.Append spUpPoceado.CreateParameter("@RETURN_VALUE", 3, 4)
spUpPoceado.Parameters.Append spUpPoceado.CreateParameter("@idPoceado", 20, 3, 9, 0)
spUpPoceado.Parameters.Append spUpPoceado.CreateParameter("@poceado", 200, 1,50, Request.Form("txtPoceado"))
spUpPoceado.Parameters.Append spUpPoceado.CreateParameter("@codpoceado", 200, 1,5, Request.Form("txtCodPoceado"))
spUpPoceado.Execute()
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
