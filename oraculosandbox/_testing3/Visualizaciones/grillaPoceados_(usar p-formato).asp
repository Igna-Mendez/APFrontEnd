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

Set rsSorteo = Server.CreateObject("ADODB.Recordset")
rsSorteo.ActiveConnection = MM_OraculoSemanal_STRING
rsSorteo.Source = "select top 1 * from vSorteos_Poceados where idPoceado = " + idPoceado + " " +condicion + "order by fechaSorteo desc"
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
	font-weight: bold;
	color: #000000;
}
.Estilo3 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 12px;
	font-weight: bold;
	color: #000000;
}
-->
</style>
</head>

<body>
<table width="420" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr background="../images/tl_bg_black.gif">
      <td colspan="2">
      <table width="420" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="10"><img src="../images/tl_left_black.gif" width="10" height="22"></td>
          <td width="400" background="../images/tl_bg_black.gif"><div align="center" class="Estilo1"><%=rsSorteo("poceado")%></div></td>
          <td width="10"><img src="../images/tl_right_black.gif" width="10" height="22"></td>
        </tr>
      </table></td>
  </tr>
    <tr>
      <td colspan="2"><img src="../images/spacerblanc10.gif" width="19" height="10"></td>
    </tr>
    <tr>
      <td colspan="2"><img src="../images/spacerblanc10.gif" width="19" height="10"></td>
    </tr>
    <tr>
      <td colspan="2"><table width="350" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td><div align="center" class="Estilo3">Sorteo</div></td>
          <td width="10"><img src="../images/tl_left.gif" width="10" height="19"></td>
          <td width="50" background="../images/tl_bg.gif"><div align="center" class="Estilo3"><%=rsSorteo("nroSorteo")%></div></td>
          <td width="10"><img src="../images/tl_right.gif" width="10" height="19"></td>
          <td>&nbsp;</td>
          <td><div align="center" class="Estilo3">Fecha</div></td>
          <td width="10"><img src="../images/tl_left.gif" width="10" height="19"></td>
          <td width="100" background="../images/tl_bg.gif"><div align="center" class="Estilo3"><%=day(rsSorteo("fechaSorteo")) &"/"& month(rsSorteo("fechaSorteo")) &"/"& year(rsSorteo("fechaSorteo"))%></div></td>
          <td width="10"><img src="../images/tl_right.gif" width="10" height="19"></td>
        </tr>
      </table></td>
    </tr>
    <tr>
      <td colspan="2"><img src="../images/spacerblanc10.gif" width="19" height="10"></td>
    </tr>
    <tr>
      <td colspan="2"><img src="../images/spacerblanc10.gif" width="19" height="10"></td>
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
  <table width="300" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td><div align="center"></div>        <div align="center" class="Estilo1">
        <table width="420" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td width="10"><img src="../images/tl_left_black.gif" width="10" height="22"></td>
            <td width="400" background="../images/tl_bg_black.gif"><div align="center"><%=rsSorteo("tipoPoceado")%></div></td>
            <td width="10"><img src="../images/tl_right_black.gif" width="10" height="22"></td>
          </tr>
          <tr>
            <td colspan="3"><img src="../images/spacerblanc10.gif" width="19" height="10"></td>
          </tr>
        </table>
        </div></td>
    </tr>
</table>
  <table width="420" border="0" align="center" cellpadding="0" cellspacing="0">
<%
if rsNumero.recordCount > 0 then
rsNumero.moveFirst
cant = 5
i = 0
%>
<%
	while not rsNumero.eof
%>  <tr>

<%
	while (not rsNumero.eof) and (i < cant)
%>
  	<td><div align="center">
        <table width="30" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td><img src="../images/tl_left.gif" width="10" height="19"></td>
            <td background="../images/tl_bg.gif"><span class="Estilo3"><%=rsNumero("numero")%></span></td>
            <td><img src="../images/tl_right.gif" width="10" height="19"></td>
          </tr>
          <tr>
            <td colspan="3"><img src="../images/spacerblanc10.gif" width="19" height="10"></td>
          </tr>
        </table>
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
  <table width="420" border="0" align="center" cellpadding="0" cellspacing="0">
<%
if rsAciertos.recordCount > 0 then
rsAciertos.MoveFirst
%>
    <tr>
      <td width="10"><div align="center"><img src="../images/tl_left_black.gif" width="10" height="22"></div></td>
      <td background="../images/tl_bg_black.gif"><div align="center" class="Estilo1">Aciertos</div></td>
      <td width="10"><img src="../images/tl_right_black.gif" width="10" height="22"></td>
      <td>&nbsp;</td>
      <td width="10"><div align="center"><img src="../images/tl_left_black.gif" width="10" height="22"></div></td>
      <td background="../images/tl_bg_black.gif"><div align="center" class="Estilo1">Ganadores</div></td>
      <td width="10"><img src="../images/tl_right_black.gif" width="10" height="22"></td>
      <td>&nbsp;</td>
      <td width="10"><div align="center"><img src="../images/tl_left_black.gif" width="10" height="22"></div></td>
      <td background="../images/tl_bg_black.gif"><div align="center" class="Estilo1">Cobra C/U</div></td>
      <td width="10"><img src="../images/tl_right_black.gif" width="10" height="22"></td>
    </tr>
<%
 while not rsAciertos.EOF
%>
    <tr>
      <td><div align="center"><img src="../images/tl_left.gif" width="10" height="19">
      </div></td>
      <td background="../images/tl_bg.gif"><div align="center" class="Estilo3"><%=rsAciertos("aciertos")%></div></td>
      <td><img src="../images/tl_right.gif" width="10" height="19"></td>
      <td></td>
      <td><div align="center"><img src="../images/tl_left.gif" width="10" height="19">
      </div></td>
      <td background="../images/tl_bg.gif"><div align="center" class="Estilo3"><%=rsAciertos("leyenda")%></div></td>
      <td><img src="../images/tl_right.gif" width="10" height="19"></td>
      <td></td>
      <td><div align="center"><img src="../images/tl_left.gif" width="10" height="19">
      </div></td>
      <td background="../images/tl_bg.gif"><div align="center" class="Estilo2"><span class="Estilo3">$</span> <span class="Estilo3"><%=rsAciertos("monto")%></span></div></td>
      <td><img src="../images/tl_right.gif" width="10" height="19"></td>
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
%> <table width="420" border="0" align="center" cellpadding="0" cellspacing="0">
<%
if rsTexto.RecordCount > 0 then
rsTexto.moveFirst
while not rsTexto.eof
%>
  <tr><td><div align="center" class="Estilo3">
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