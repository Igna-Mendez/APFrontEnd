<%@LANGUAGE="VBSCRIPT" CODEPAGE="1252"%>
<!--#include file="../Connections/OraculoSemanal.inc" -->
<%

' Formas de ver
' * idSorteo
' * idQuiniela fechaSorteo turno
' * idQuiniela fechaSorteo

idSorteo = ""
idSorteo = Request.QueryString("idSorteo")

if idSorteo = "" then
	if (Request.QueryString("idQuiniela") <> "") and (Request.QueryString("nroSorteo") <> "") then 
		idQuiniela = Request.QueryString("idQuiniela")
		nroSorteo = Request.QueryString("nroSorteo")
		
		Set rsSorteo = Server.CreateObject("ADODB.Recordset")
		rsSorteo.ActiveConnection = MM_OraculoSemanal_STRING
		rsSorteo.Source = "select * from sorteos where idQuiniela = "+idQuiniela+" and nrosorteo = "+nroSorteo
		rsSorteo.CursorType = 3
		rsSorteo.CursorLocation = 2
		rsSorteo.LockType = 1
		rsSorteo.Open()
		
		if rsSorteo.recordCount > 0 then
			idSorteo = cstr(rsSorteo("idSorteo"))
		end if
		
		rsSorteo.close
		set rsSorteo = nothing
	end if
end if

if idSorteo = "" then
	if (Request.QueryString("idQuiniela") <> "") and (Request.QueryString("fechaSorteo") <> "") and (Request.QueryString("turno") <> "") then 
		idQuiniela = Request.QueryString("idQuiniela")
		fechaSorteo = Request.QueryString("fechaSorteo")
		turno = Request.QueryString("turno")

		Set rsSorteo = Server.CreateObject("ADODB.Recordset")
		rsSorteo.ActiveConnection = MM_OraculoSemanal_STRING
		rsSorteo.Source = "select * from sorteos where idQuiniela = "+idQuiniela+" and turno = '"+turno +"' and datediff(day, fechaSorteo, '"+ fechaSorteo +"') = 0"
		rsSorteo.CursorType = 3
		rsSorteo.CursorLocation = 2
		rsSorteo.LockType = 1
		rsSorteo.Open()
		
		if rsSorteo.recordCount > 0 then
			idSorteo = cstr(rsSorteo("idSorteo"))
		end if
		
		rsSorteo.close
		set rsSorteo = nothing		
	end if
end if

if idSorteo = "" then
	Dim fs
	fs = Request.QueryString("fechaSorteo")
	if (Request.QueryString("idQuiniela") <> "") and  not(fs <> "") then
	
		idQuiniela = Request.QueryString("idQuiniela")
		Set rsMaxFecha = Server.CreateObject("ADODB.Recordset")
		rsMaxFecha.ActiveConnection = MM_OraculoSemanal_STRING
		rsMaxFecha.Source = "select top 1 fechaSorteo from sorteos where idQuiniela = "+idQuiniela+" order by fechaSorteo desc "
		rsMaxFecha.CursorType = 3
		rsMaxFecha.CursorLocation = 2
		rsMaxFecha.LockType = 1
		rsMaxFecha.Open()
			
		fs = cstr(rsMaxFecha("fechaSorteo"))
		rsMaxFecha.Close()
	end if 
	if (Request.QueryString("idQuiniela") <> "") and (fs <> "") then 
		idQuiniela = Request.QueryString("idQuiniela")
		fechaSorteo = fs

		Set rsSorteo = Server.CreateObject("ADODB.Recordset")
		rsSorteo.ActiveConnection = MM_OraculoSemanal_STRING
		rsSorteo.Source = "select * from sorteos where idQuiniela = "+idQuiniela+" and datediff(day, fechaSorteo, '"+ fechaSorteo +"') = 0"
		rsSorteo.CursorType = 3
		rsSorteo.CursorLocation = 2
		rsSorteo.LockType = 1
		rsSorteo.Open()
		
		if rsSorteo.recordCount > 0 then
			rsSorteo.moveFirst
			while not rsSorteo.eof
				idSorteo = idSorteo + cstr(rsSorteo("idSorteo"))
				rsSorteo.moveNext
				if not rsSorteo.eof then
					idSorteo = idSorteo + ", "
				end if
			wend
		end if
		
		rsSorteo.close
		set rsSorteo = nothing		
	end if
end if


if idSorteo <> "" then

%>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Documento sin t&iacute;tulo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<table>
	<tr>
<%
dim iteracion
iteracion = 0
ids = Split(idSorteo, ",")
for each idSorteo2 in ids
iteracion = iteracion + 1

Set rsNumeros1 = Server.CreateObject("ADODB.Recordset")
rsNumeros1.ActiveConnection = MM_OraculoSemanal_STRING
rsNumeros1.Source = "SELECT * FROM numeros where idSorteo = " + idSorteo2 + " and ubicacion >=1 and ubicacion <=10  order by ubicacion"
rsNumeros1.CursorType = 3
rsNumeros1.CursorLocation = 2
rsNumeros1.LockType = 1
rsNumeros1.Open()

Set rsNumeros2 = Server.CreateObject("ADODB.Recordset")
rsNumeros2.ActiveConnection = MM_OraculoSemanal_STRING
rsNumeros2.Source = "SELECT * FROM numeros where idSorteo = " + idSorteo2 + " and ubicacion >=11 and ubicacion <=20  order by ubicacion "
rsNumeros2.CursorType = 3
rsNumeros2.CursorLocation = 2
rsNumeros2.LockType = 1
rsNumeros2.Open()

Set rsLetras = Server.CreateObject("ADODB.Recordset")
rsLetras.ActiveConnection = MM_OraculoSemanal_STRING
rsLetras.Source = "SELECT * FROM letras where idSorteo = " + idSorteo2 + " order by ubicacion "
rsLetras.CursorType = 3
rsLetras.CursorLocation = 2
rsLetras.LockType = 1
rsLetras.Open()

Set rsSorteo = Server.CreateObject("ADODB.Recordset")
rsSorteo.ActiveConnection = MM_OraculoSemanal_STRING
rsSorteo.Source = "select * from sorteos s, quinielas q where s.idQuiniela = q.idQuiniela and idSorteo = " + idSorteo2 
rsSorteo.CursorType = 3
rsSorteo.CursorLocation = 2
rsSorteo.LockType = 1
rsSorteo.Open()

turno = ""
quiniela = ""
fechaSorteo = ""

if rsSorteo.recordCount > 0 then
	turno = rsSorteo("turno")
	quiniela = rsSorteo("quiniela")
	fechaSorteo =  rsSorteo("fechaSorteo")
end if

rsSorteo.close()
set rsSorteo = nothing
%>

<%
if (iteracion mod 3) = 0 then 
%>
<tr>
<%end if%>

		<td>
			<table>
				<tr>
					<td colspan="4"><%=turno%>&nbsp;<%=quiniela%>&nbsp;<%=fechaSorteo%></td>
				</tr>
<%
	if rsnumeros1.recordcount > 0 and rsnumeros2.recordcount > 0 then
	rsNumeros1.movefirst
	rsNumeros2.movefirst
	for i = 1 to 10
%>
				<tr>
					<td><%=i%></td>
					<td><%=rsnumeros1("numero")%></td>
					<td><%=10+i%></td>
					<td><%=rsnumeros2("numero")%></td>
				</tr>
<%
	rsNumeros1.movenext
	rsnumeros2.movenext
	next
	end if 
%>
<%
if rsLetras.recordcount > 0 then
rsLetras.movefirst
%>
				<tr>
					<td colspan="4"><p>Letras</p></td>
				</tr>
				<tr>
<%
	while not rsLetras.eof
%>
					<td><%=rsLetras("letra")%></td>
<%
		rsLetras.moveNext
	wend
%>
				</tr>
<%
else
%>
				<tr>
					<td colspan="4">&nbsp;</td>
				</tr>
				<tr>
					<td colspan="4">&nbsp;</td>
				</tr>
<%
end if
%>
			</table>
		</td>
<%
rsNumeros1.close
set rsNumeros1 = nothing
rsNumeros2.close
set rsNumeros2 = nothing
rsLetras.close
set rsLetras = nothing
next
%>
	</tr>
</table>
</body>
</html>
<%
end if
%>