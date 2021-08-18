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
      <td colspan="2">Toto Bingo </td>
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
      <td colspan="2"><div align="center">N&uacute;meros</div></td>
    </tr>
  </table>
  <table width="500" border="0">
  <tr><td><div align="center"><input name="txtNumero" type="text" size="5" maxlength="2">
      </div></td>
      <td><div align="center">
        <input name="txtNumero" type="text" size="5" maxlength="2">
      </div></td>
      <td><div align="center">
        <input name="txtNumero" type="text" size="5" maxlength="2">
      </div></td>
    </tr>
  <tr><td><div align="center"><input name="txtNumero" type="text" size="5" maxlength="2">
      </div></td>
      <td><div align="center">
        <input name="txtNumero" type="text" size="5" maxlength="2">
      </div></td>
      <td><div align="center">
        <input name="txtNumero" type="text" size="5" maxlength="2">
      </div></td>
    </tr>
  <tr><td><div align="center"><input name="txtNumero" type="text" size="5" maxlength="2">
      </div></td>
      <td><div align="center">
        <input name="txtNumero" type="text" size="5" maxlength="2">
      </div></td>
      <td><div align="center">
        <input name="txtNumero" type="text" size="5" maxlength="2">
      </div></td>
    </tr>
  <tr><td><div align="center"><input name="txtNumero" type="text" size="5" maxlength="2">
      </div></td>
      <td><div align="center">
        <input name="txtNumero" type="text" size="5" maxlength="2">
      </div></td>
      <td><div align="center">
        <input name="txtNumero" type="text" size="5" maxlength="2">
      </div></td>
    </tr>
  <tr>
    <td colspan="2">Estrella</td>
    <td><div align="center">
        <input name="txtNumero" type="text" size="5" maxlength="2">
      </div></td>
  </tr>
  </table>
  <table width="500" border="0">
    <tr>
      <td colspan="3"><div align="center">Aciertos</div></td>
      <td><div align="center">Ganadores</div></td>
      <td><div align="center">Cobra C/U </div></td>
    </tr>
    <tr>
      <td colspan="3"><div align="center">12
          <input name="txtAciertos" type="hidden" id="txtAciertos" value="12">
      </div></td>
      <td><div align="center">
        <input name="txtGanadores" type="text" id="txtGanadores" size="20" maxlength="50">
      </div></td>
      <td><div align="center">
        <input name="txtCobra" type="text" id="txtCobra" size="20" maxlength="50">
      </div></td>
    </tr>
    <tr>
      <td colspan="3"><div align="center">11
          <input name="txtAciertos" type="hidden" id="txtAciertos" value="11">
      </div></td>
      <td><div align="center">
        <input name="txtGanadores" type="text" id="txtGanadores" size="20" maxlength="50">
      </div></td>
      <td><div align="center">
        <input name="txtCobra" type="text" id="txtCobra" size="20" maxlength="50">
      </div></td>
    </tr>
    <tr>
      <td colspan="3"><div align="center">10
          <input name="txtAciertos" type="hidden" id="txtAciertos" value="10">
      </div></td>
      <td><div align="center">
        <input name="txtGanadores" type="text" id="txtGanadores" size="20" maxlength="50">
      </div></td>
      <td><div align="center">
        <input name="txtCobra" type="text" id="txtCobra" size="20" maxlength="50">
      </div></td>
    </tr>	
    <tr>
      <td colspan="3"><div align="center">09
          <input name="txtAciertos" type="hidden" id="txtAciertos" value="9">
      </div></td>
      <td><div align="center">
        <input name="txtGanadores" type="text" id="txtGanadores" size="20" maxlength="50">
      </div></td>
      <td><div align="center">
        <input name="txtCobra" type="text" id="txtCobra" size="20" maxlength="50">
      </div></td>
    </tr>
    <tr>
      <td colspan="3"><div align="center">08
          <input name="txtAciertos" type="hidden" id="txtAciertos" value="8">
      </div></td>
      <td><div align="center">
        <input name="txtGanadores" type="text" id="txtGanadores" size="20" maxlength="50">
      </div></td>
      <td><div align="center">
        <input name="txtCobra" type="text" id="txtCobra" size="20" maxlength="50">
      </div></td>
    </tr>
    <tr>
      <td colspan="3"><div align="center">Sueldos
          <input name="txtAciertos" type="hidden" id="txtAciertos" value="7">
      </div></td>
      <td><div align="center">
        <input name="txtGanadores" type="text" id="txtGanadores" size="20" maxlength="50">
      </div></td>
      <td><div align="center">
        <input name="txtCobra" type="text" id="txtCobra" size="20" maxlength="50">
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
  <input name="hiCodPoceado" type="hidden" id="hiCodPoceado" value="TB">
  <input name="hiTipos" type="hidden" id="hiCodPoceado" value="UNICO">
  <input name="UNICO" type="hidden" id="hiCodPoceado" value="txtNumero,txtAciertos,txtGanadores,txtCobra,txtTexto">
</form>
</body>
</html>
