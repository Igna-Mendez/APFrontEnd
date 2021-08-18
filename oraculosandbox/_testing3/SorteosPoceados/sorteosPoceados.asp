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
rsSorteos.Source = "select distinct	poceado, archivoMuestra, p.idPoceado,cast(datepart(day, fechaSorteo) as varchar(4))+'/'+cast(datepart(month, fechaSorteo) as varchar(4))+'/'+cast(datepart(year, fechaSorteo) as varchar(4)) as fechaA,	cast(datepart(month, fechaSorteo) as varchar(4))+'/'+cast(datepart(day, fechaSorteo) as varchar(4))+'/'+cast(datepart(year, fechaSorteo)  as varchar(4))as fechaE,	nroSorteo from	sorteos_poceados sp,	poceados p where sp.idPoceado = p.idPoceado and datediff(day, fechaSorteo,'"+ mesdiaanio1+"') <= 0 and datediff(day, fechaSorteo,'"+ mesdiaanio2+"') >= 0 order by fechaA desc, poceado asc"
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
<table width="440" border="0">
<tr>
	<td colspan="6"><p><b>Sorteos Poceados</b></p></td>
</tr>
<tr>
<form name="frFiltro" method="post" action="./sorteosPoceados.asp">
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
	<td width="80"><p>Poceado</p></td>
	<td width="80"><p>Nro. Sorteo</p></td>
	<td width="200"><p>&nbsp;</p></td>
</tr>
<%
rsSorteos.MoveFirst
while not rsSorteos.EOF
%>
<tr>
	<td width="80" align="center"><p><%=rsSorteos("FechaA")%></p></td>
	<td width="80" align="center"><p><%=rsSorteos("poceado")%></p></td>
	<td width="80" align="center"><p><%=rsSorteos("nroSorteo")%></p></td>
	<td width="200" align="left"><p><a href="./eliminar.asp?idPoceado=<%=rsSorteos("idpoceado")%>&fechaSorteo=<%=rsSorteos("fechaE")%>">Eliminar</a>&nbsp;&nbsp;&nbsp;<a href="./../Visualizaciones/verPoceados.asp?idPoceado=<%=rsSorteos("idpoceado")%>&fechaSorteo=<%=rsSorteos("fechaE")%>">Ver</a></p></td>
</tr>
<%
rsSorteos.MoveNext
wend
end if
%>
<tr>
	<td width="240" colspan="3">&nbsp;</td>
	<td width="200"><p><a href="./agregar.asp">Agregar</a></p></td>
</tr>
</table>
</body>
</html>
<%
rsSorteos.Close()
set rsSorteos = Nothing
%>