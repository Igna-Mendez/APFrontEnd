<%@LANGUAGE="VBSCRIPT" CODEPAGE="1252"%>
<!--#include file="../../Connections/OraculoSemanal.asp" -->
<%
Response.Expires = 0
if Request.QueryString("idQuiniela") <> "" Then
set spDownQuiniela = Server.CreateObject("ADODB.Command")
spDownQuiniela.ActiveConnection = MM_OraculoSemanal_STRING
spDownQuiniela.CommandText = "dbo.spDownQuiniela"
spDownQuiniela.CommandType = 4
spDownQuiniela.CommandTimeout = 0
spDownQuiniela.Prepared = true
spDownQuiniela.Parameters.Append spDownQuiniela.CreateParameter("@RETURN_VALUE", 3, 4)
spDownQuiniela.Parameters.Append spDownQuiniela.CreateParameter("@idQuiniela", 20, 1, 9, Request.QueryString("idQuiniela"))
spDownQuiniela.Execute()
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