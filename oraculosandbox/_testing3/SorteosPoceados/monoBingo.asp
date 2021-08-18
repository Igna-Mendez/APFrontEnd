<%@LANGUAGE="VBSCRIPT" CODEPAGE="1252"%>
<!--#include file="../Comunes/obtenerMails.inc" -->
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Documento sin t&iacute;tulo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<form action="./grabaSorteo.asp" method="post" name="frSorteoPoceado" id="frSorteoPoceado">
  <table width="500" border="0">
    <tr>
      <td colspan="2">Mono Bingo </td>
    </tr>
    <tr>
      <td>Sorteo</td>
      <td width="395" colspan="-2"><input name="txtSorteo" type="text" id="txtSorteo" size="20" maxlength="50"></td>
    </tr>
    <tr>
      <td>Fecha</td>
      <td colspan="-2">
        <select name="selDia" id="selDia">
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
	  </select>	</td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">L&iacute;nea</div></td>
    </tr>
  </table>
  <table width="500" border="0">
  <tr>
  	<td><div align="center"><input name="txtNumero" type="text" size="5" maxlength="2">
      </div></td>
      <td><div align="center">
        <input name="txtNumero" type="text" size="5" maxlength="2">
      </div></td>
    </tr>
  <tr>
    <td colspan="2"><div align="center">Pancita</div></td>
    </tr>
  <tr>
    <td colspan="2"><div align="center">
      <input name="txtNumero" type="text" id="txtNumero" size="5" maxlength="2">
    </div></td>
    </tr>
  <tr>
    <td colspan="2"><div align="center">C&oacute;digo de la Suerte</div></td>
  </tr>
  <tr>
    <td colspan="2"><div align="center">
      <input name="txtNumero" type="text" id="txtNumero" size="10" maxlength="10">
    </div></td>
  </tr>
  </table>
  <table width="500" border="0">
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
  <table width="500" border="0">
  <tr>
  <td width="183"> <input name="cbCorreo" type="checkbox" id="cbCorreo" value="checkbox"> 
    Enviar Correo </td>
  <td width="122"><div align="center"><a href="javascript:document.frSorteoPoceado.submit();">Guardar</a></div></td>
  <td width="181"><div align="center">Salir sin guardar</div></td>
  </tr>
  </table>
  <input name="hiCodPoceado" type="hidden" id="hiCodPoceado" value="OB">
  <input name="hiTipos" type="hidden" id="hiCodPoceado" value="UNICO">
  <input name="UNICO" type="hidden" id="hiCodPoceado" value="txtNumero,falso,falsos,falso,falso">
</form>
</body>
</html>
