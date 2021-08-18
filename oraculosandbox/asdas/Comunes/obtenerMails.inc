<!--#include file="../Connections/OraculoSemanal.inc" -->
<%
Response.Expires = 0

Set rsConfiguracion = Server.CreateObject("ADODB.Recordset")
rsConfiguracion.ActiveConnection = MM_OraculoSemanal_STRING
rsConfiguracion.Source = "SELECT valor FROM configuraciones where configuracion = 'remitente'"
rsConfiguracion.CursorType = 3
rsConfiguracion.CursorLocation = 2
rsConfiguracion.LockType = 1
rsConfiguracion.Open()

Set rsMails = Server.CreateObject("ADODB.Recordset")
rsMails.ActiveConnection = MM_OraculoSemanal_STRING
rsMails.Source = "SELECT mail FROM mails where activo = 1"
rsMails.CursorType = 3
rsMails.CursorLocation = 2
rsMails.LockType = 1
rsMails.Open()

Dim GLOBAL_REMITENTE
GLOBAL_REMITENTE = ""

if rsConfiguracion.recordcount > 0 then
	rsConfiguracion.movefirst
	GLOBAL_REMITENTE = rsConfiguracion("valor")
end if 

Dim GLOBAL_MAILS
GLOBAL_MAILS = ""

if rsMails.recordcount > 0 then
	rsMails.movefirst
	while not rsMails.eof
		GLOBAL_MAILS = GLOBAL_MAILS + rsMails("mail")
		rsMails.movenext
		if not rsMails.eof then
			GLOBAL_MAILS = GLOBAL_MAILS + "; "
		end if 
	wend
end if 

rsConfiguracion.close
set rsConfiguracion = nothing

rsMails.close
set rsMails = nothing

%>