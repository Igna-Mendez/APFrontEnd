<%@LANGUAGE="VBSCRIPT" CODEPAGE="1252"%>
<!--#include file="../Connections/OraculoSemanal.inc" -->
<%
Set rsSorteo = Server.CreateObject("ADODB.Recordset")
rsSorteo.ActiveConnection = MM_OraculoSemanal_STRING
rsSorteo.Source = "select * from sorteo_publicado"
rsSorteo.CursorType = 3
rsSorteo.CursorLocation = 2
rsSorteo.LockType = 1
rsSorteo.Open()

Set rsFecha = Server.CreateObject("ADODB.Recordset")
rsFecha.ActiveConnection = MM_OraculoSemanal_STRING
rsFecha.Source = "select valor from configuraciones where configuracion = 'ultimoSorteoPublicado'"
rsFecha.CursorType = 3
rsFecha.CursorLocation = 2
rsFecha.LockType = 1
rsFecha.Open()
Dim fecha 

if rsFecha.recordCount  > 0 then
	fecha = rsFecha("valor")
end if
rsFecha.close
set rsFecha = nothing


%>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Documento sin t&iacute;tulo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<table width="500" border="0">
  <tr>
    <td><%=fecha%></td>
    <td>Los Primeros</td>
    <td>Matutina</td>
    <td>Vespertina</td>
	<td>Nocturna</td>
  </tr>
<%
if rsSorteo.recordCount > 0 then
	rsSorteo.moveFirst
	while not rsSorteo.eof 
%>
  <tr>
    <td><a href="./../Sorteos/ver.asp?idQuiniela=<%=rsSorteo("idQuinielaP")%>&fechaSorteo=<%=day(fecha)&"/"&month(fecha)&"/"&year(fecha)%>" target="_blank"><%=rsSorteo("quiniela")%></a></td>
    <td><%=rsSorteo("losprimeros")%></td>
    <td><%=rsSorteo("matutina")%></td>
    <td><%=rsSorteo("vespertina")%></td>
    <td><%=rsSorteo("nocturna")%></td>
  </tr>
<%
	rsSorteo.movenext
	wend
end if 
%>
</table>
</body>
</html>
<%
rsSorteo.close()
set rssorteo = nothing
%>
