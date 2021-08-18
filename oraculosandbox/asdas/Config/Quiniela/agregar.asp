<%@LANGUAGE="VBSCRIPT" CODEPAGE="1252"%>
<!--#include file="../../Connections/OraculoSemanal.inc" -->
<%
Response.Expires = 0
if Request.Form("txtQuiniela") <> "" Then
set spUpQuiniela = Server.CreateObject("ADODB.Command")
spUpQuiniela.ActiveConnection = MM_OraculoSemanal_STRING
spUpQuiniela.CommandText = "dbo.spUpQuiniela"
spUpQuiniela.CommandType = 4
spUpQuiniela.CommandTimeout = 0
spUpQuiniela.Prepared = true
spUpQuiniela.Parameters.Append spUpQuiniela.CreateParameter("@RETURN_VALUE", 3, 4)
spUpQuiniela.Parameters.Append spUpQuiniela.CreateParameter("@idQuiniela", 20, 1, 9, 0)
spUpQuiniela.Parameters.Append spUpQuiniela.CreateParameter("@quiniela", 200, 1,50, Request.Form("txtQuiniela"))
spUpQuiniela.Execute()
end if
response.Redirect("./quiniela.asp")
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
