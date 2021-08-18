<%@LANGUAGE="VBSCRIPT" CODEPAGE="1252"%>
<!--#include file="../Connections/OraculoSemanal.inc" -->
<%
Response.Expires = 0
On Error Resume Next 

set conn=Server.CreateObject("ADODB.Connection") 
conn.ConnectionString=MM_OraculoSemanal_STRING
conn.Open
conn.BeginTrans

set spUpSorteo = Server.CreateObject("ADODB.Command")
spUpSorteo.ActiveConnection = conn
spUpSorteo.CommandText = "dbo.spUpSorteo"
spUpSorteo.CommandType = 4
spUpSorteo.CommandTimeout = 0
spUpSorteo.Prepared = true
spUpSorteo.Parameters.Append spUpSorteo.CreateParameter("@RETURN_VALUE", 3, 4)
spUpSorteo.Parameters.Append spUpSorteo.CreateParameter("@idSorteo", 20, 3, 9, 0)
spUpSorteo.Parameters.Append spUpSorteo.CreateParameter("@idQuiniela", 20, 1, 9, Request.Form("seLoteria"))
spUpSorteo.Parameters.Append spUpSorteo.CreateParameter("@nroSorteo", 200, 1,10, Request.Form("teSorteo"))
spUpSorteo.Parameters.Append spUpSorteo.CreateParameter("@fechaSorteo", 200, 1,10, Request.Form("selMes")+"/"+Request.Form("selDia")+"/"+Request.Form("selAnio"))
spUpSorteo.Parameters.Append spUpSorteo.CreateParameter("@cantCifras", 16, 1,1, cint(Request.Form("seCifras")))
spUpSorteo.Parameters.Append spUpSorteo.CreateParameter("@turno", 200, 1,20, Request.Form("seTurno"))
spUpSorteo.Execute()

If Err.Number <> 0 Then
	mError = Err.Description
	Err.Clear
	conn.RollbackTrans
	Response.Redirect("./../Error/transferError.asp?error="+mError)
End If

idSorteo = spUpSorteo.Parameters("@idSorteo")

set spUpNumero = Server.CreateObject("ADODB.Command")
spUpNumero.ActiveConnection = conn
spUpNumero.CommandText = "dbo.spUpNumero"
spUpNumero.CommandType = 4
spUpNumero.CommandTimeout = 0
spUpNumero.Prepared = true
spUpNumero.Parameters.Append spUpNumero.CreateParameter("@RETURN_VALUE", 3, 4)
spUpNumero.Parameters.Append spUpNumero.CreateParameter("@idNumero", 20, 3, 9, 0)
spUpNumero.Parameters.Append spUpNumero.CreateParameter("@idSorteo", 20, 1, 9, 0)
spUpNumero.Parameters.Append spUpNumero.CreateParameter("@ubicacion", 16, 1,1, 0)
spUpNumero.Parameters.Append spUpNumero.CreateParameter("@numero", 200, 1,10, 0)

te0 = split(Request.Form("te0"), ",")  

spUpNumero.parameters("@idNumero") = 0
spUpNumero.parameters("@idSorteo") = idSorteo
spUpNumero.parameters("@numero") = te0(0)
spUpNumero.parameters("@ubicacion") = 1
spUpNumero.Execute()

If Err.Number <> 0 Then
	mError = Err.Description
	Err.Clear
	conn.RollbackTrans
	Response.Redirect("./../Error/transferError.asp?error="+mError)
End If	
	
set spUpSorteoPublicado = Server.CreateObject("ADODB.Command")
spUpSorteoPublicado.ActiveConnection = conn
spUpSorteoPublicado.CommandText = "dbo.spUpSorteoPublicado"
spUpSorteoPublicado.CommandType = 4
spUpSorteoPublicado.CommandTimeout = 0
spUpSorteoPublicado.Prepared = true
spUpSorteoPublicado.Parameters.Append spUpSorteoPublicado.CreateParameter("@RETURN_VALUE", 3, 4)
spUpSorteoPublicado.Parameters.Append spUpSorteoPublicado.CreateParameter("@fechaFija", 200, 1,10, null)
spUpSorteoPublicado.Execute()
If Err.Number <> 0 Then
	mError = Err.Description
	Err.Clear
	conn.RollbackTrans
	Response.Redirect("./../Error/transferError.asp?error="+mError)
End If

conn.CommitTrans
conn.Close

On Error goto 0

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