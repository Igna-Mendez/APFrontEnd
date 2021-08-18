<%@LANGUAGE="VBSCRIPT" CODEPAGE="1252"%>
<!--#include file="../../Connections/OraculoSemanal.inc" -->
<%
Response.Expires = 0
if (Request.Form("txtMailNuevo") <> "") Then
set spUpMail = Server.CreateObject("ADODB.Command")
spUpMail.ActiveConnection = MM_OraculoSemanal_STRING
spUpMail.CommandText = "dbo.spUpMail"
spUpMail.CommandType = 4
spUpMail.CommandTimeout = 0
spUpMail.Prepared = true
spUpMail.Parameters.Append spUpMail.CreateParameter("@RETURN_VALUE", 3, 4)
spUpMail.Parameters.Append spUpMail.CreateParameter("@viejo", 200, 1,500, "")
spUpMail.Parameters.Append spUpMail.CreateParameter("@mail", 200, 1,500, Request.Form("txtMailNuevo"))
spUpMail.Parameters.Append spUpMail.CreateParameter("@activo", 11, 1,1, 1)
spUpMail.Execute()
end if
response.Redirect("./mails.asp")
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
