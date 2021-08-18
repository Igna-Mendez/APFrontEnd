<%@LANGUAGE="VBSCRIPT" CODEPAGE="1252"%>
<!--#include file="../Connections/OraculoSemanal.inc" -->
<%

if (Request.QueryString("idPoceado") <> "") or ((Request.QueryString("idPoceado") <> "") and (Request.QueryString("nroSorteo") <> "")) or ((Request.QueryString("idPoceado") <> "") and (Request.QueryString("fechaSorteo") <> "")) then

Dim idPoceado
Dim nroSorteo
Dim fechaSorteo
Dim condicion
condicion = ""

idPoceado = Request.QueryString("idPoceado")

if (Request.QueryString("nroSorteo") <> "") then
	nroSorteo = Request.QueryString("nroSorteo")
	condicion = " and nroSorteo = '" + nroSorteo + "'"
end if 

if (Request.QueryString("fechaSorteo") <> "") then
	fechaSorteo = Request.QueryString("fechaSorteo")
	condicion = " and fechaSorteo = '" + fechaSorteo + "'"
end if 
Dim maxFecha
maxFecha = ""

if (Request.QueryString("nroSorteo") = "") and (Request.QueryString("fechaSorteo") = "") then
	Set rsMaxFecha = Server.CreateObject("ADODB.Recordset")
	rsMaxFecha.ActiveConnection = MM_OraculoSemanal_STRING
	rsMaxFecha.Source = "select max(fechaSorteo) as FS from vSorteos_Poceados where idPoceado = " + cstr(idPoceado)
	rsMaxFecha.CursorType = 3
	rsMaxFecha.CursorLocation = 2
	rsMaxFecha.LockType = 1
	rsMaxFecha.Open()
	
	rsMaxFecha.moveFirst
	maxFecha = cstr(rsMaxFecha("FS"))

	condicion = " and datediff(day, '"+maxFecha+"', fechaSorteo) = 0 "	
	rsMaxFecha.Close()
end if

Set rsSorteo = Server.CreateObject("ADODB.Recordset")
rsSorteo.ActiveConnection = MM_OraculoSemanal_STRING
rsSorteo.Source = "select * from vSorteos_Poceados where idPoceado = " + idPoceado + " " +condicion + "order by fechaSorteo desc"
rsSorteo.CursorType = 3
rsSorteo.CursorLocation = 2
rsSorteo.LockType = 1
rsSorteo.Open()

if rsSorteo.recordCount > 0 then
rsSorteo.Movefirst
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
      <td colspan="2"><%=rsSorteo("poceado")%></td>
    </tr>
    <tr>
      <td>Sorteo</td>
      <td width="395" colspan="-2"><%=rsSorteo("nroSorteo")%></td>
    </tr>
    <tr>
      <td>Fecha</td>
      <td colspan="-2"><%=day(rsSorteo("fechaSorteo"))&"/"&month(rsSorteo("fechaSorteo"))&"/"&year(rsSorteo("fechaSorteo"))%></td>
    </tr>
</table>
<%
while not rsSorteo.eof
%>
<%
Set rsNumero = Server.CreateObject("ADODB.Recordset")
rsNumero.ActiveConnection = MM_OraculoSemanal_STRING
rsNumero.Source = "select * from numeros_poceados where idSorteoPoceado = " + cstr(rsSorteo("idSorteoPoceado")) + " order by ubicacion"
rsNumero.CursorType = 3
rsNumero.CursorLocation = 2
rsNumero.LockType = 1
rsNumero.Open()
%>
  <table width="500" border="0">
    <tr>
      <td colspan="6"><div align="center"><%=rsSorteo("tipoPoceado")%></div></td>
    </tr>
	</table>
  <table width="500" border="0">
<%
if rsNumero.recordCount > 0 then
rsNumero.moveFirst
cant = rsNumero.recordCount
if cant mod 20  = 0 then cant = 4 else
if cant mod 6  = 0 then cant = (cant / 6) + 6 else
if cant mod 5  = 0 then cant = (cant / 5) + 5 else
if cant mod 4  = 0 then cant = (cant / 4) + 4 else
if cant mod 5  = 0 then cant = (cant / 3) + 3 end if
i = 0
%>
<%
	while not rsNumero.eof
%>  <tr>

<%
	while (not rsNumero.eof) and (i < cant)
%>
  	<td><div align="center">
		<%=rsNumero("numero")%>
      </div></td>
<%
	i = i +1
	rsNumero.movenext
	wend
	i = 0
%>
    </tr>
<%
	wend
end if
%>
  </table>
<%
Set rsAciertos = Server.CreateObject("ADODB.Recordset")
rsAciertos.ActiveConnection = MM_OraculoSemanal_STRING
rsAciertos.Source = "select * from premios where idSorteoPoceado = " + cstr(rsSorteo("idSorteoPoceado")) + " order by aciertos desc"
rsAciertos.CursorType = 3
rsAciertos.CursorLocation = 2
rsAciertos.LockType = 1
rsAciertos.Open()

%>
  <table width="500" border="0">
<%
if rsAciertos.recordCount > 0 then
rsAciertos.MoveFirst
%>
    <tr>
      <td><div align="center">Aciertos</div></td>
      <td><div align="center">Ganadores</div></td>
      <td><div align="center">Cobra C/U </div></td>
    </tr>
<%
 while not rsAciertos.EOF
%>
    <tr>
      <td><div align="center"><%=rsAciertos("aciertos")%>
      </div></td>
      <td><div align="center">
	  <%=rsAciertos("leyenda")%>
      </div></td>
      <td><div align="center">
	  <%=rsAciertos("monto")%>
      </div></td>
    </tr>	
<%
	rsAciertos.moveNext
 wend
end if 
rsAciertos.close
set rsAciertos = nothing
%>
  </table>
<%
Set rsTexto = Server.CreateObject("ADODB.Recordset")
rsTexto.ActiveConnection = MM_OraculoSemanal_STRING
rsTexto.Source = "select * from textos where idSorteoPoceado = " + cstr(rsSorteo("idSorteoPoceado")) 
rsTexto.CursorType = 3
rsTexto.CursorLocation = 2
rsTexto.LockType = 1
rsTexto.Open()
%>
<table width="500" border="0">
<%
if rsTexto.RecordCount > 0 then
rsTexto.moveFirst
while not rsTexto.eof
%>
  <tr><td><div align="center">
  	<%=rsTexto("texto")%>
      </div></td>
    </tr>
<%
	rsTexto.moveNext
	wend
end if
%>
	</table>  
<%
rsTexto.close
set rsTexto = nothing
%>
<br><br>
<%
rsSorteo.movenext
wend
%>

</body>
</html>
<%
end if
rsSorteo.close
set rsSorteo = nothing
end if
%>