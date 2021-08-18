<%@LANGUAGE="VBSCRIPT" CODEPAGE="1252"%>
<!--#include file="../../Connections/OraculoSemanal.inc" -->
<%
Response.Expires = 0
if Request.QueryString("mail") <> "" Then
set spDownMail = Server.CreateObject("ADODB.Command")
spDownMail.ActiveConnection = MM_OraculoSemanal_STRING
spDownMail.CommandText = "dbo.spDownMail"
spDownMail.CommandType = 4
spDownMail.CommandTimeout = 0
spDownMail.Prepared = true
spDownMail.Parameters.Append spDownMail.CreateParameter("@RETURN_VALUE", 3, 4)
spDownMail.Parameters.Append spDownMail.CreateParameter("@mail", 200, 1, 500, Request.QueryString("mail"))
spDownMail.Execute()
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
