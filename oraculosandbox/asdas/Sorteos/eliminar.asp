<%@LANGUAGE="VBSCRIPT" CODEPAGE="1252"%>
<!--#include file="../Connections/OraculoSemanal.inc" -->
<%
Response.Expires = 0

if Request.QueryString("idSorteo") <> "" then
set spDownSorteo = Server.CreateObject("ADODB.Command")
spDownSorteo.ActiveConnection = MM_OraculoSemanal_STRING
spDownSorteo.CommandText = "dbo.spDownSorteo"
spDownSorteo.CommandType = 4
spDownSorteo.CommandTimeout = 0
spDownSorteo.Prepared = true
spDownSorteo.Parameters.Append spDownSorteo.CreateParameter("@RETURN_VALUE", 3, 4)
spDownSorteo.Parameters.Append spDownSorteo.CreateParameter("@idSorteo", 20, 3, 9, cint(Request.QueryString("idSorteo")))
spDownSorteo.Execute()

set spUpSorteoPublicado = Server.CreateObject("ADODB.Command")
spUpSorteoPublicado.ActiveConnection = MM_OraculoSemanal_STRING
spUpSorteoPublicado.CommandText = "dbo.spUpSorteoPublicado"
spUpSorteoPublicado.CommandType = 4
spUpSorteoPublicado.CommandTimeout = 0
spUpSorteoPublicado.Prepared = true
spUpSorteoPublicado.Parameters.Append spUpSorteoPublicado.CreateParameter("@RETURN_VALUE", 3, 4)
spUpSorteoPublicado.Parameters.Append spUpSorteoPublicado.CreateParameter("@fechaFija", 200, 1,10, null)
spUpSorteoPublicado.Execute()

end if

response.Redirect("./sorteos.asp")

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
