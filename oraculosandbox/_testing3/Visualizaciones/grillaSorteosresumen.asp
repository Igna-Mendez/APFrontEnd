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
<title>Cabecera quinielas - OraculoSemanal</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<meta name="viewport" content="width=device-width"/>
<meta name="titulo" content="Cabecera quinielas - OraculoSemanal">
<meta name="descripción" content="http://www.oraculosemanal.com/_testing3/Visualizaciones/grillaSorteos.asp" >
<link rel="image_src" href="http://www.oraculosemanal.com/_testing3/Visualizaciones/grillaSorteos.asp" >
<link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700' rel='stylesheet' type='text/css'>
 
 
<style type="text/css">
<!--
.Estilo3 {
	font-family: 'Lato', sans-serif;
	font-weight: 300;
	font-size: 36px;
	color: #FFF;
}
.Estilo4 {
	font-family: 'Lato', sans-serif;
	font-weight: 700;
	font-size: 36px;
	color: #FFF;
}
a {
	font-family: 'Lato', sans-serif;
	font-weight: 400;
	font-size: 30px;
	color: #FFF;
}
a:link {
	text-decoration: none;
}
a:visited {
	text-decoration: none;
}
a:hover {
	text-decoration: none;
	color: #FFCC00;
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
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
</style>
<script>setTimeout('document.location.reload()',10000); </script>
</head>

<body>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td height="50" colspan="3" bgcolor="#0099FF"><div align="center" class="Estilo3">QUINIELAS VESPERTINAS</div></td>
  </tr>
  <%
if rsSorteo.recordCount > 0 then
	rsSorteo.moveFirst
	while not rsSorteo.eof 
%>
  <tr>
    <td width="10%" bgcolor="#00CCFF">&nbsp;</td>
    <td width="40%" height="60" bgcolor="#00CCFF"><div align="left"><a target="_blank" href="./iframeSorteos.asp?idQuiniela=<%=rsSorteo("idQuinielaP")%>"><%=rsSorteo("quiniela")%></a></div></td>
    <td width="50%" height="60" bgcolor="#00A4CC"><div align="center" class="Estilo4"><%=rsSorteo("vespertina")%></div></td>
  </tr>
  <tr>
    <td colspan="3" bgcolor="#003366"><img src="http://oraculosemanal.com/images/spacerblanc5.gif" width="1" height="1"></td>
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
