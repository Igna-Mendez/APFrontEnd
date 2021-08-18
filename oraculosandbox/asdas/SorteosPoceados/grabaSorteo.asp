<%@LANGUAGE="VBSCRIPT" CODEPAGE="1252"%>
<!--#include file="../Connections/OraculoSemanal.inc" -->
<%
Response.Expires = 0
On Error Resume Next 

set conn=Server.CreateObject("ADODB.Connection") 
conn.ConnectionString=MM_OraculoSemanal_STRING
conn.Open
conn.BeginTrans

tipos = split(Request.Form("hiTipos"), ",")
for each tipo in tipos

Dim datosACargar
datosACargar = split(Request.Form(trim(tipo)), ",")

Dim numerosSorteo
numerosSorteo = trim(datosACargar(0))
Dim aciertosSorteo
aciertosSorteo = trim(datosACargar(1))
Dim ganadoresSorteo
ganadoresSorteo = trim(datosACargar(2))
Dim cobraSorteo
cobraSorteo = trim(datosACargar(3))
Dim textoSorteo
textoSorteo = trim(datosACargar(4))

if (Request.Form(numerosSorteo) <> "") then

Dim pozo
pozo = 0.0
if Request.Form("txtPozo") <> "" then
pozo = Request.Form("txtPozo")
end if 

if tipo = "UNICO" then
	tipo = null
end if

' Alta de sorteo
set spUpSorteoPoceado = Server.CreateObject("ADODB.Command")
spUpSorteoPoceado.ActiveConnection = conn
spUpSorteoPoceado.CommandText = "dbo.spUpSorteoPoceado"
spUpSorteoPoceado.CommandType = 4
spUpSorteoPoceado.CommandTimeout = 0
spUpSorteoPoceado.Prepared = true
spUpSorteoPoceado.Parameters.Append spUpSorteoPoceado.CreateParameter("@RETURN_VALUE", 3, 4)
spUpSorteoPoceado.Parameters.Append spUpSorteoPoceado.CreateParameter("@idSorteoPoceado", 20, 3, 9, 0)
spUpSorteoPoceado.Parameters.Append spUpSorteoPoceado.CreateParameter("@codPoceado", 200, 1,5, Request.Form("hiCodPoceado"))
spUpSorteoPoceado.Parameters.Append spUpSorteoPoceado.CreateParameter("@codTipoPoceado", 200, 1,5, tipo)
spUpSorteoPoceado.Parameters.Append spUpSorteoPoceado.CreateParameter("@fechaSorteo", 200, 1,10, Request.Form("selMes")+"/"+Request.Form("selDia")+"/"+Request.Form("selAnio"))
spUpSorteoPoceado.Parameters.Append spUpSorteoPoceado.CreateParameter("@nroSorteo", 200, 1,10, Request.Form("txtSorteo"))
spUpSorteoPoceado.Parameters.Append spUpSorteoPoceado.CreateParameter("@pozo", 6, 1,8, pozo)
spUpSorteoPoceado.Execute()

If Err.Number <> 0 Then
	mError = Err.Description
	Err.Clear
	conn.RollbackTrans
	Response.Redirect("./../Error/transferError.asp?error=00"+mError)
End If

idSorteoPoceado = spUpSorteoPoceado("@idSorteoPoceado")

' Alta de numero

Dim numeros
numeros = split(Request.Form(numerosSorteo), ",")

set spUpNumeroPoceado = Server.CreateObject("ADODB.Command")
spUpNumeroPoceado.ActiveConnection = conn
spUpNumeroPoceado.CommandText = "dbo.spUpNumeroPoceado"
spUpNumeroPoceado.CommandType = 4
spUpNumeroPoceado.CommandTimeout = 0
spUpNumeroPoceado.Prepared = true
spUpNumeroPoceado.Parameters.Append spUpNumeroPoceado.CreateParameter("@RETURN_VALUE", 3, 4)
spUpNumeroPoceado.Parameters.Append spUpNumeroPoceado.CreateParameter("@idSorteoPoceado", 20, 1, 9, 0)
spUpNumeroPoceado.Parameters.Append spUpNumeroPoceado.CreateParameter("@ubicacion", 16, 1,1, 0)
spUpNumeroPoceado.Parameters.Append spUpNumeroPoceado.CreateParameter("@numero", 200, 1,10, 0)

i = 0
for each element in numeros
i = i + 1
spUpNumeroPoceado("@idSorteoPoceado") = idSorteoPoceado
spUpNumeroPoceado("@ubicacion") = i
spUpNumeroPoceado("@numero") = trim(element)
if trim(element) <> "" then
	spUpNumeroPoceado.Execute()
	If Err.Number <> 0 Then
		mError = Err.Description
		Err.Clear
		conn.RollbackTrans
		Response.Redirect("./../Error/transferError.asp?error=11"+mError)
	End If
end if 
next

' Alta de aciertos

if (aciertosSorteo <> "") and (aciertosSorteo <> "falso") then

Dim aciertos
aciertos = split(Request.Form(aciertosSorteo), ",")
Dim ganadores
ganadores = split(Request.Form(ganadoresSorteo), ",")
Dim cobra
cobra = split(Request.Form(cobraSorteo), ",")

set spUpPremio = Server.CreateObject("ADODB.Command")
spUpPremio.ActiveConnection = conn
spUpPremio.CommandText = "dbo.spUpPremio"
spUpPremio.CommandType = 4
spUpPremio.CommandTimeout = 0
spUpPremio.Prepared = true
spUpPremio.Parameters.Append spUpPremio.CreateParameter("@RETURN_VALUE", 3, 4)
spUpPremio.Parameters.Append spUpPremio.CreateParameter("@idSorteoPoceado", 20, 1, 9, 0)
spUpPremio.Parameters.Append spUpPremio.CreateParameter("@aciertos", 16, 1,1, 0)
spUpPremio.Parameters.Append spUpPremio.CreateParameter("@ganadores", 20, 1,9, 0)
spUpPremio.Parameters.Append spUpPremio.CreateParameter("@monto", 6, 1,8, 0)
spUpPremio.Parameters.Append spUpPremio.CreateParameter("@leyenda", 200, 1,50, 0)


i = 0
for each element in aciertos
i = i + 1
spUpPremio("@idSorteoPoceado")=idSorteoPoceado
spUpPremio("@aciertos")=cint(element)
if isnumeric(ganadores(i-1)) then
	spUpPremio("@ganadores")=trim(ganadores(i-1))
else
	spUpPremio("@ganadores")=null
end if
spUpPremio("@monto")=cobra(i-1)
spUpPremio("@leyenda")=trim(ganadores(i-1))

if (cobra(i-1) <> "") and (trim(ganadores(i-1)) <> "") then
	spUpPremio.Execute()
	If Err.Number <> 0 Then
		mError = Err.Description
		Err.Clear
		conn.RollbackTrans
		Response.Redirect("./../Error/transferError.asp?error=22"+mError)
	End If
end if
next
end if ' aciertos

'Alta de Textos

if (textoSorteo <> "") and (textoSorteo <> "falso") then

Dim textos
textos = split(Request.Form(textoSorteo), ",")

set spUpTexto = Server.CreateObject("ADODB.Command")
spUpTexto.ActiveConnection = conn
spUpTexto.CommandText = "dbo.spUpTexto"
spUpTexto.CommandType = 4
spUpTexto.CommandTimeout = 0
spUpTexto.Prepared = true
spUpTexto.Parameters.Append spUpTexto.CreateParameter("@RETURN_VALUE", 3, 4)
spUpTexto.Parameters.Append spUpTexto.CreateParameter("@idSorteoPoceado", 20, 1, 9, 0)
spUpTexto.Parameters.Append spUpTexto.CreateParameter("@texto", 200, 1,500, 0)

for each element in textos
element = trim(element)

if (element <> "") then
	spUpTexto("@idSorteoPoceado") = idSorteoPoceado
	spUpTexto("@texto") = element
	
	spUpTexto.Execute()
	If Err.Number <> 0 Then
	mError = Err.Description
	Err.Clear
	conn.RollbackTrans
	Response.Redirect("./../Error/transferError.asp?error=33"+mError)
End If
end if 

next
end if ' alta de textos

end if

next ' for each tipo in tipos

conn.CommitTrans
conn.Close

if Request.Form("cbCorreo") = "checkbox" then

Set rsCodPoceado = Server.CreateObject("ADODB.Recordset")
rsCodPoceado.ActiveConnection = MM_OraculoSemanal_STRING
rsCodPoceado.Source = "select idPoceado from poceados where codPoceado ='" + Request.Form("hiCodPoceado") +"'"
rsCodPoceado.CursorType = 3
rsCodPoceado.CursorLocation = 2
rsCodPoceado.LockType = 1
rsCodPoceado.Open()

Dim idPoceado
idPoceado = rsCodPoceado("idPoceado")

rsCodPoceado.close
set rsCodPoceado = nothing

response.redirect("./sendMail.asp?mails="+Request.Form("txtDestinatarios")+"&rte="+Request.Form("txtRemitente")+"&idPoceado="+cstr(idPoceado)+"&fechaSorteo="+Request.Form("selMes")+"/"+Request.Form("selDia")+"/"+Request.Form("selAnio"))
else
Response.Redirect("./sorteosPoceados.asp")
end if

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
<%
On Error GoTo 0
%>