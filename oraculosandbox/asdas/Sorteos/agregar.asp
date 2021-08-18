<%@LANGUAGE="VBSCRIPT" CODEPAGE="1252"%>
<!--#include file="../Comunes/obtenerMails.inc" -->
<%
Set rsQuinielas = Server.CreateObject("ADODB.Recordset")
rsQuinielas.ActiveConnection = MM_OraculoSemanal_STRING
rsQuinielas.Source = "SELECT * FROM vQuinielas order by quiniela"
rsQuinielas.CursorType = 3
rsQuinielas.CursorLocation = 2
rsQuinielas.LockType = 1
rsQuinielas.Open()
%>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Documento sin t&iacute;tulo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<form name="frAgregarSorteo" method="post" action="./agregar2.asp" target="_self">
<table width="600" border="0">
<tr>
	<td colspan="4"><p><b>Sorteo</b></p></td>
</tr>
<tr>
	<td colspan="1"><p>Loteria</p></td>
	<td colspan="3">
	  <select name="seLoteria" id="seLoteria">
<%
if rsQuinielas.recordCount > 0 then
rsQuinielas.moveFirst
while not rsQuinielas.EOF
%>
	    <option value="<%=rsQuinielas("idQuiniela")%>"><%=rsQuinielas("quiniela")%></option>
<%
rsQuinielas.moveNext
wend
end if
%>
	    </select>
	</td>
</tr>
<tr>
	<td colspan="1"><p>Sorteo</p></td>
	<td colspan="3"><input name="teSorteo" type="text" id="teSorteo" size="10" maxlength="10"></td>
</tr>
<tr>
	<td colspan="1"><p>Fecha</p></td>
	<td colspan="3">	  <select name="selDia" id="selDia">
        <%
for i = 1 to 31 
%>
        <option value="<%=i%>" <%if cint(i) = cint(day(date)) then %>selected<% end if%>><%=i%></option>
        <%
next
%>
      </select>
      <select name="selMes" id="selMes">
        <%
for i = 1 to 12 
%>
        <option value="<%=i%>" <%if cint(i) = cint(month(date)) then %>selected<% end if%>><%=i%></option>
        <%
next
%>
      </select>
      <select name="selAnio" id="selAnio">
        <%
for i = 2000 to year(date()) +1
%>
        <option value="<%=i%>" <%if cint(i) = cint(year(date)) then %>selected<% end if%>><%=i%></option>
        <%
next
%>
      </select></td>
</tr>
<tr>
	<td colspan="1"><p>Cifras</p></td>
	<td colspan="3"><select name="seCifras" id="seCifras">
	  <option value="3">3</option>
	  <option value="4">4</option>
	  <option value="5">5</option>
	  <option value="6">6</option>
	  </select></td>
</tr>
<tr>
	<td colspan="1"><p>Turno</p></td>
	<td colspan="3"><select name="seTurno" id="seTurno">
	  <option value="Los Primeros">Los Primeros</option>
	  <option value="Matutina">Matutina</option>
	  <option value="Vespertina">Vespertina</option>
	  <option value="Nocturna">Nocturna</option>
	  </select></td>
</tr>
<%
for i = 1 to 10
%>
<tr>
	<td width="200"><p><%=i%></p>
	</td>
	<td width="200"><input name="te0" type="text" size="6" maxlength="6">
	<%if i = 1 then%>
	&nbsp;<a href="javascript:publicaCabeza();">Cargar Cabeza</a>
	<%end if %>
	</td>
</tr>
<%
next
%>
<%
for i = 1 to 10
%>
<tr>
	<td width="200"><p><%=10+i%></p>
	</td>
	<td width="200"><input name="te1" type="text" size="6" maxlength="6">
	</td>
</tr>
<%
next
%>
<tr>
	<td colspan="4">Letras
	</td>
</tr>
<tr>
	<td width="150"><input name="teLetra" type="text" size="1" maxlength="1">
	</td>
	<td width="150"><input name="teLetra" type="text" size="1" maxlength="1">
	</td>
	<td width="150"><input name="teLetra" type="text" size="1" maxlength="1">
	</td>
	<td width="150"><input name="teLetra" type="text" size="1" maxlength="1">
	</td>
</tr>
</table>
  <table width="600" border="0">
  <tr>
  	<td colspan="2"><div align="center">Envío de Emails</div></td>
  </tr>
  <tr>
    <td width="92">Remitente</td>
    <td width="398"><input name="txtRemitente" type="text" id="txtRemitente" size="70" maxlength="500" value="<%=GLOBAL_REMITENTE%>"></td>
  </tr>
  <tr>
    <td>Destino</td>
    <td><input name="txtDestinatarios" type="text" id="txtDestinatarios" size="70" maxlength="500" value="<%=GLOBAL_MAILS%>"></td>
  </tr>
  </table>
   <table width="600" border="0">
  <tr>
  <td width="183"> <input name="cbCorreo" type="checkbox" id="cbCorreo" value="checkbox"> 
    Enviar Correo </td>
  <td width="122"><div align="center"><a href="javascript:publicaSorteo();">Guardar</a></div></td>
  <td width="181"><div align="center">Salir sin guardar</div></td>
  </tr>
  </table>
</form>
<script language="javascript">
function publicaSorteo()
{
	document.frAgregarSorteo.target = "_self"
	document.frAgregarSorteo.action = "./agregar2.asp";
	document.frAgregarSorteo.submit();
}
function publicaCabeza()
{
	document.frAgregarSorteo.target = "_blank"
	document.frAgregarSorteo.action = "./agregarCabeza.asp";
	document.frAgregarSorteo.submit();
}
</script>
</body>
</html>
<%
rsQuinielas.close
set rsquinielas = nothing
%>