<%@LANGUAGE="VBSCRIPT" CODEPAGE="1252"%>
<!--#include file="../Comunes/obtenerMails.inc" -->
<%
'Entradas
'	mails
'	idPoceado
'	fechaSorteo
'Response.Redirect("./../Error/transferError.asp?error= "+Request.QueryString("mails") +" " + Request.QueryString("idSorteo") +" "+ Request.QueryString("rte"))

if (Request.QueryString("mails") <> "") and (Request.QueryString("idSorteo") <> "") then

Set rsSorteos = Server.CreateObject("ADODB.Recordset")
rsSorteos.ActiveConnection = MM_OraculoSemanal_STRING
rsSorteos.Source = "exec spMailQuinielas "+Request.QueryString("idSorteo")
rsSorteos.CursorType = 3
rsSorteos.CursorLocation = 2
rsSorteos.LockType = 1
rsSorteos.Open()

Set rsDatos = Server.CreateObject("ADODB.Recordset")
rsDatos.ActiveConnection = MM_OraculoSemanal_STRING
rsDatos.Source = "select upper(quiniela) as quiniela, isnull(turno, '') as turno, cast(datepart(day, fechaSorteo) as varchar(2)) +'/'+cast(datepart(month, fechaSorteo) as varchar(2)) +'/'+cast(datepart(year, fechaSorteo) as varchar(4)) as fechasorteo from quinielas q, sorteos s where q.idQuiniela = s.idQuiniela and s.idSorteo =" +Request.QueryString("idSorteo")
rsDatos.CursorType = 3
rsDatos.CursorLocation = 2
rsDatos.LockType = 1
rsDatos.Open()

Dim datos
datos = rsDatos("turno") + " " + rsDatos("quiniela")+ " " + rsDatos("fechaSorteo")

rsDatos.close
set rsDatos = nothing


Dim mensaje
mensaje = ""
rssorteos.movefirst
while not rssorteos.eof
	mensaje = mensaje + rssorteos("texto") + chr(10)
	rssorteos.movenext
wend

%>


<%
Dim oMail
Set oMail = Server.CreateObject("CDO.Message")

oMail.From = Request.QueryString("rte") +" <noreply@oraculosemanal.com>"
oMail.bcc = Request.QueryString("mails")
oMail.Subject= "Oraculosemanal.com - Extracto Quiniela " + datos
oMail.textbody = mensaje

oMail.Send 

Set oMail = Nothing
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
rsSorteos.close()
set rssorteos = nothing
end if
response.Redirect("./sorteos.asp")
%>