<%@LANGUAGE="VBSCRIPT" CODEPAGE="1252"%>
<!--#include file="../Connections/OraculoSemanal.inc" -->
<%
Response.Expires = 0
On Error Resume Next 

if (Request.QueryString("idPoceado") <> "")  and (Request.QueryString("fechaSorteo") <> "") then
set spDownSorteo = Server.CreateObject("ADODB.Command")
spDownSorteo.ActiveConnection = MM_OraculoSemanal_STRING
spDownSorteo.CommandText = "dbo.spDownSorteoPoceado"
spDownSorteo.CommandType = 4
spDownSorteo.CommandTimeout = 0
spDownSorteo.Prepared = true
spDownSorteo.Parameters.Append spDownSorteo.CreateParameter("@RETURN_VALUE", 3, 4)
spDownSorteo.Parameters.Append spDownSorteo.CreateParameter("@idPoceado", 200, 1, 10, Request.QueryString("fechaSorteo"))
spDownSorteo.Parameters.Append spDownSorteo.CreateParameter("@idSorteo", 20, 1, 9, cint(Request.QueryString("idPoceado")))
spDownSorteo.Execute()

If Err.Number <> 0 Then
	mError = Err.Description
	Err.Clear
	Response.Redirect("./../Error/transferError.asp?error="+mError)
End If


end if

response.Redirect("./sorteosPoceados.asp")

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
