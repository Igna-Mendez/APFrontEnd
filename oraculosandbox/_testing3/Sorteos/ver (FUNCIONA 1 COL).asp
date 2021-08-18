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
<style type="text/css">
<!--
.Estilo1 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 12px;
	font-weight: bold;
	color: #FFFFFF;
}
.Estilo2 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 10px;
	font-style: normal;
	font-weight: bold;
	color: #000000;
}
-->
</style>
</head>

<body>
<table width="300" border="0" cellpadding="0" cellspacing="0">
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
	fechaSorteo =  day(rsSorteo("fechaSorteo")) &"/"& month(rsSorteo("fechaSorteo")) &"/"& year(rsSorteo("fechaSorteo"))
end if

rsSorteo.close()
set rsSorteo = nothing
%>

<%
if (iteracion mod 3) = 0 then 
%>
<tr>
<%end if%>
<tr>
    <td><img src="images/tl_left_black.gif" width="10" height="22"></td>
    <td colspan="3" background="images/tl_bg_black.gif"><div align="center" class="Estilo1"><%=turno%></div></td>
    <td width="100" background="images/tl_bg_black.gif" class="Estilo1"><%=quiniela%></td>
    <td width="10"><img src="images/tl_right_black.gif" width="10" height="22"></td>
  </tr>
  <tr>
    <td colspan="6"><img src="images/spacerblanc10.gif" width="19" height="10"></td>
  </tr>
  <tr>
    <td colspan="6"><table width="200" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td width="100" class="Estilo2"><div align="center">FECHA</div></td>
        <td width="10"><img src="images/tl_left.gif" width="10" height="19"></td>
        <td background="images/tl_bg.gif" class="Estilo2"><div align="center" class="Estilo2"><%=fechaSorteo%></div></td>
        <td width="10"><img src="images/tl_right.gif" width="10" height="19"></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td colspan="6"><img src="images/spacerblanc10.gif" width="19" height="10"></td>
  </tr>
  <tr>
  <%
	if rsnumeros1.recordcount > 0 and rsnumeros2.recordcount > 0 then
	rsNumeros1.movefirst
	rsNumeros2.movefirst
	for i = 1 to 10
%>
    <tr><td width="10"><p><img src="images/tl_left.gif" width="10" height="19"></p>    </td>
    <td width="40" background="images/tl_bg.gif"><div align="center" class="Estilo2"><%=i%></div></td>
    <td width="100" background="images/tl_bg.gif" class="Estilo2"><div align="center"><%=rsnumeros1("numero")%></div></td>
    <td width="40" background="images/tl_bg.gif" class="Estilo2"><div align="center"><%=10+i%></div></td>
    <td width="100" background="images/tl_bg.gif" class="Estilo2"><div align="center"><%=rsnumeros2("numero")%></div></td>
    <td width="10"><img src="images/tl_right.gif" width="10" height="19"></td>
  <%
	rsNumeros1.movenext
	rsnumeros2.movenext
	next
	end if 
%> 
</tr>
 
  <tr><td colspan="6"><img src="images/spacerblanc10.gif" width="19" height="10"></td>
  </tr>
				

<%
if rsLetras.recordcount > 0 then
rsLetras.movefirst
%>
  <tr>
    <td colspan="6"><table width="140" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td width="100" class="Estilo2"><div align="center">LETRAS&nbsp&nbsp</div></td>
				
<%
	while not rsLetras.eof
%>
        <td width="10"><img src="images/tl_left.gif" width="10" height="19"></td>
        <td width="20" background="images/tl_bg.gif" class="Estilo2"><div align="center"><%=rsLetras("letra")%></div></td>
        <td width="10"><img src="images/tl_right.gif" width="10" height="19"></td>
			
<%
		rsLetras.moveNext
	wend
%>
      </tr>
    </table></td>
  <tr>
    <td colspan="6"><img src="images/spacerblanc10.gif" width="19" height="10"></td>
			
<%
else
%>
	
<%
end if
%>
			
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