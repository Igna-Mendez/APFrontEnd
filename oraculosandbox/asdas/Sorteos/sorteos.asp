<%@LANGUAGE="VBSCRIPT" CODEPAGE="1252"%>
<!--#include file="../Connections/OraculoSemanal.inc" -->
<%

dia = cstr(day(date))
mes = cstr(month(date))
anio = cstr(year(date))
dia2 = dia
mes2 = mes
anio2 = anio

request.form("selDia")

if request.form("selDia") <> "" then
	dia = request.form("selDia") 
end if 

if request.form("selMes") <> "" then
	mes = request.form("selMes") 
end if 

if request.form("selAnio") <> "" then
	anio = request.form("selAnio") 
end if 

if request.form("selDia2") <> "" then
	dia2 = request.form("selDia2") 
end if 

if request.form("selMes2") <> "" then
	mes2 = request.form("selMes2") 
end if 

if request.form("selAnio2") <> "" then
	anio2 = request.form("selAnio2") 
end if 

mesdiaanio1 = cstr(mes) + "/" + cstr(dia) + "/" + cstr(anio)
mesdiaanio2 = cstr(mes2) + "/" + cstr(dia2) + "/" + cstr(anio2)

Set rsSorteos = Server.CreateObject("ADODB.Recordset")
rsSorteos.ActiveConnection = MM_OraculoSemanal_STRING
rsSorteos.Source = "SELECT * FROM vSorteos where datediff(day, fechaSorteo,'"+ mesdiaanio1+"') <= 0 and datediff(day, fechaSorteo,'"+ mesdiaanio2+"') >= 0 order by fechaSorteo, quiniela, nroSorteo"
rsSorteos.CursorType = 3
rsSorteos.CursorLocation = 2
rsSorteos.LockType = 1
rsSorteos.Open()
%>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Documento sin t&iacute;tulo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<table width="600" border="0">
<tr>
	<td colspan="6"><p><b>Sorteos</b></p></td>
</tr>
<tr>
<form name="frFiltro" method="post" action="./sorteos.asp">
	<td colspan="6">
	<p>Filtro&nbsp;Desde&nbsp;
	  <select name="selDia" id="selDia">
        <%
for i = 1 to 31 
%>
        <option value="<%=i%>" <%if cint(i) = cint(dia) then %>selected<% end if%>><%=i%></option>
        <%
next
%>
      </select>
      <select name="selMes" id="selMes">
        <%
for i = 1 to 12 
%>
        <option value="<%=i%>" <%if cint(i) = cint(mes) then %>selected<% end if%>><%=i%></option>
        <%
next
%>
      </select>
      <select name="selAnio" id="selAnio">
        <%
for i = 2000 to year(date()) +1
%>
        <option value="<%=i%>" <%if cint(i) = cint(anio) then %>selected<% end if%>><%=i%></option>
        <%
next
%>
      </select>
      &nbsp;Hasta&nbsp;
      <select name="selDia2" id="selDia2">
        <%
for i = 1 to 31 
%>
        <option value="<%=i%>" <%if cint(i) = cint(dia2) then %>selected<% end if%>><%=i%></option>
        <%
next
%>
      </select>
      <select name="selMes2" id="selMes2">
        <%
for i = 1 to 12 
%>
        <option value="<%=i%>" <%if cint(i) = cint(mes2) then %>selected<% end if%>><%=i%></option>
        <%
next
%>
      </select>
      <select name="selAnio2" id="selAnio2">
        <%
for i = 2000 to year(date()) +1
%>
        <option value="<%=i%>" <%if cint(i) = cint(anio2) then %>selected<% end if%>><%=i%></option>
        <%
next
%>
      </select>
<a href="javascript:document.frFiltro.submit()">Filtrar</a></p></td>
</form>
</tr>
<%
if rsSorteos.recordCount > 0 then
%>
<tr align="center">
	<td width="80"><p>Fecha</p></td>
	<td width="80"><p>Loteria</p></td>
	<td width="80"><p>Turno</p></td>
	<td width="80"><p>Sorteo</p></td>
	<td width="80"><p>Cifras</p></td>
	<td width="200"><p>&nbsp;</p></td>
</tr>

<%
rsSorteos.MoveFirst
while not rsSorteos.EOF
%>
<tr>
	<td width="80" align="center"><p><%=day(rsSorteos("fechaSorteo")) &"/"& month(rsSorteos("fechaSorteo")) &"/"& year(rsSorteos("fechaSorteo"))%></p></td>
	<td width="80" align="center"><p><%=rsSorteos("quiniela")%></p></td>
	<td width="80" align="center"><p><%=rsSorteos("turno")%></p></td>
	<td width="80" align="right"><p><%=rsSorteos("nroSorteo")%></p></td>
	<td width="80" align="right"><p><%=rsSorteos("cantCifras")%></p></td>
	<td width="200" align="left"><p><a href="./eliminar.asp?idSorteo=<%=rsSorteos("idSorteo")%>">Eliminar</a>&nbsp;&nbsp;&nbsp;<a href="./../Visualizaciones/verSorteos.asp?idSorteo=<%=rsSorteos("idSorteo")%>">Ver</a></p></td>
</tr>
<%
rsSorteos.MoveNext
wend
end if
%>
<tr>
	<td width="400" colspan="5">&nbsp;</td>
	<td width="200"><p><a href="./agregar.asp">Agregar</a></p></td>
</tr>
</table>
</body>
</html>

<%
rsSorteos.Close()
set rsSorteos = Nothing
%>