<%@LANGUAGE="VBSCRIPT" CODEPAGE="65001"%>
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
<meta http-equiv=refresh content=30;URL=grillaSorteos.asp>
<style type="text/css">
<!--
.Estilo3 {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 11px; font-weight: bold; }
.Estilo4 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 14px;
	font-style: normal;
	font-weight: bold;
	
}
.borde {    padding: 8px;     background: #e8edff;     border-bottom: 1px solid #fff;
    color: #669;    border-top: 1px solid transparent; }
	
.Estilo5 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 10px;
	font-style: normal;
	font-weight: bold;
}
a {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #006666;
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

table {     font-family: "Lucida Sans Unicode", "Lucida Grande", Sans-Serif;
    font-size: 12px;    margin: 0px;     width: 420px; text-align: left;    border-collapse: collapse; }

th {     font-size: 13px;     font-weight: normal;     padding: 8px;     background: #b9c9fe;
    border-top: 4px solid #aabcfe;    border-bottom: 1px solid #fff; color: #039; }

td {    padding: 8px;     background: #e8edff;     border-bottom: 1px solid #fff;
    color: #669;    border-top: 1px solid transparent; }

tr:hover td { background: #d0dafd; color: #339; }
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}

-->
</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>

<body>
<table width="419" class="borde">
  <tr>
    <td width="35"><div align="center" class="Estilo5">
      <div align="left"><%=fecha%></div>
    </div></td>
    <td width="77" background="../images/tl_bg.gif"><div align="center" class="Estilo3">PRIMERA</div></td>
    <td width="89" background="../images/tl_bg.gif"><div align="center" class="Estilo3">MATUTINA</div></td>
    <td width="102" background="../images/tl_bg.gif"><div align="center" class="Estilo3">VESPERTINA</div></td>
	<td width="92" background="../images/tl_bg.gif"><div align="center" class="Estilo3">NOCTURNA</div></td>
  </tr>
<%
if rsSorteo.recordCount > 0 then
	rsSorteo.moveFirst
	while not rsSorteo.eof 
%>
  <tr>
    <td><div align="left"><a target="_blank" href="./iframeSorteos.asp?idQuiniela=<%=rsSorteo("idQuinielaP")%>"><%=rsSorteo("quiniela")%></a></div></td>
    <td background="../images/tl_bg.gif"><div align="center" class="Estilo4"><%=rsSorteo("losprimeros")%></div></td>
    <td background="../images/tl_bg.gif"><div align="center" class="Estilo4"><%=rsSorteo("matutina")%></div></td>
    <td background="../images/tl_bg.gif"><div align="center" class="Estilo4"><%=rsSorteo("vespertina")%></div></td>
    <td background="../images/tl_bg.gif"><div align="center" class="Estilo4"><%=rsSorteo("nocturna")%></div></td>
  </tr>
<%
	rsSorteo.movenext
	wend
end if 
%>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>
<%
rsSorteo.close()
set rssorteo = nothing
%>
