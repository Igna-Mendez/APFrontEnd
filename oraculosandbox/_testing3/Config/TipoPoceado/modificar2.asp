<%@LANGUAGE="VBSCRIPT" CODEPAGE="1252"%>
<!--#include file="../../Connections/OraculoSemanal.inc" -->
<%
Response.Expires = 0
if (Request.Form("txtTipoPoceado") <> "") and (Request.Form("hiIdTipoPoceado") <> "") and (Request.Form("hiIdPoceado") <> "") Then
set spUpTipoPoceado = Server.CreateObject("ADODB.Command")
spUpTipoPoceado.ActiveConnection = MM_OraculoSemanal_STRING
spUpTipoPoceado.CommandText = "dbo.spUpTipoPoceado"
spUpTipoPoceado.CommandType = 4
spUpTipoPoceado.CommandTimeout = 0
spUpTipoPoceado.Prepared = true
spUpTipoPoceado.Parameters.Append spUpTipoPoceado.CreateParameter("@RETURN_VALUE", 3, 4)
spUpTipoPoceado.Parameters.Append spUpTipoPoceado.CreateParameter("@idTipoPoceado", 20, 1, 9, Request.Form("hiIdTipoPoceado"))
spUpTipoPoceado.Parameters.Append spUpTipoPoceado.CreateParameter("@idPoceado", 20, 1, 9, Request.Form("hiIdPoceado"))
spUpTipoPoceado.Parameters.Append spUpTipoPoceado.CreateParameter("@tipoPoceado", 200, 1,50, Request.Form("txtTIpoPoceado"))
spUpTipoPoceado.Parameters.Append spUpTipoPoceado.CreateParameter("@tipoPoceado", 200, 1,5, "")
spUpTipoPoceado.Execute()
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

