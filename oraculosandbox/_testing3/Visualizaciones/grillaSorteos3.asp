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
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "https://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Cabecera quinielas - OraculoSemanal</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<meta name="titulo" content="Cabecera quinielas - OraculoSemanal">
<meta name="descripción" content="http://www.oraculosemanal.com/_testing3/Visualizaciones/grillaSorteos.asp" >
<link rel="image_src" href="http://www.oraculosemanal.com/_testing3/Visualizaciones/grillaSorteos.asp" >
 
 
<style type="text/css">
<!--
.Estilo3 {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 10px; font-weight: bold; }
.Estilo4 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 10px;
	font-style: normal;
	font-weight: bold;
}
a {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 10px;
	color: #303030;
	font-weight: bold;
}
a:link {
	text-decoration: none;
}
a:visited {
	text-decoration: none;
}
a:hover {
	text-decoration: none;
	color: #FF0000;
}
a:active {
	text-decoration: none;
}
.Estilo2 {
	font-family: Arial, Helvetica, sans-serif;
	color: #FFFFFF;
	font-weight: bold;
	font-size: 16px;
}
.Estilo6 {
	font-family: Arial, Helvetica, sans-serif;
	color: #FFFFFF;
	font-weight: bold;
	font-size: 14px;
}
-->
</style>
</head>

<body>
<table width="420" border="0" cellpadding="0" cellspacing="0" background="http://www.oraculosemanal.com/images/1515_bg.gif">
  <tr>
    <td width="10">&nbsp;</td>
    <td width="80"><div align="center" class="Estilo4">
      <div align="left"><%=fecha%></div>
    </div></td>
    <td width="80"><div align="center" class="Estilo3">Los Primeros</div></td>
    <td width="80"><div align="center" class="Estilo3">Matutina</div></td>
    <td width="80"><div align="center" class="Estilo3">Vespertina</div></td>
	<td width="80"><div align="center" class="Estilo3">Nocturna</div></td>
    <td width="10">&nbsp;</td>
  </tr>
<%
if rsSorteo.recordCount > 0 then
	rsSorteo.moveFirst
	while not rsSorteo.eof 
%>
  <tr>
    <td width="10">&nbsp;</td>
    <td width="80"><div align="left"><a target="_blank" href="./iframeSorteos.asp?idQuiniela=<%=rsSorteo("idQuinielaP")%>"><%=rsSorteo("quiniela")%></a></div></td>
    <td width="80"><div align="center" class="Estilo4"><%=rsSorteo("losprimeros")%></div></td>
    <td width="80"><div align="center" class="Estilo4"><%=rsSorteo("matutina")%></div></td>
    <td width="80"><div align="center" class="Estilo4"><%=rsSorteo("vespertina")%></div></td>
    <td width="80"><div align="center" class="Estilo4"><%=rsSorteo("nocturna")%></div></td>
    <td width="10">&nbsp;</td>
  </tr>
<%
	rsSorteo.movenext
	wend
end if 
%>
</table>
<p>&nbsp;</p>
</body>
</html>
<%
rsSorteo.close()
set rssorteo = nothing
%>
