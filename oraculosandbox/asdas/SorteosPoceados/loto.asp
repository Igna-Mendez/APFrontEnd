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
      <td colspan="2">Loto</td>
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
      <td colspan="2"><div align="center">Tradicional</div></td>
    </tr>
  </table>
  <table width="500" border="0"><tr><td><div align="center"><input name="txtNumero" type="text" size="5" maxlength="2">
      </div></td>
      <td><div align="center">
        <input name="txtNumero" type="text" size="5" maxlength="2">
      </div></td>
      <td><div align="center">
        <input name="txtNumero" type="text" size="5" maxlength="2">
      </div></td>
      <td><div align="center">
        <input name="txtNumero" type="text" size="5" maxlength="2">
      </div></td>
      <td><div align="center">
        <input name="txtNumero" type="text" size="5" maxlength="2">
      </div></td>
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
      <td colspan="3"><div align="center">6
          <input name="txtAciertos" type="hidden" id="txtAciertos" value="6">
      </div></td>
      <td><div align="center">
        <input name="txtGanadores" type="text" id="txtGanadores" size="20" maxlength="50">
      </div></td>
      <td><div align="center">
        <input name="txtCobra" type="text" id="txtCobra" size="20" maxlength="50">
      </div></td>
    </tr>
    <tr>
      <td colspan="3"><div align="center">5
          <input name="txtAciertos" type="hidden" id="txtAciertos" value="5">
      </div></td>
      <td><div align="center">
        <input name="txtGanadores" type="text" id="txtGanadores" size="20" maxlength="50">
      </div></td>
      <td><div align="center">
        <input name="txtCobra" type="text" id="txtCobra" size="20" maxlength="50">
      </div></td>
    </tr>
    <tr>
      <td colspan="3"><div align="center">4
          <input name="txtAciertos" type="hidden" id="txtAciertos" value="4">
      </div></td>
      <td><div align="center">
        <input name="txtGanadores" type="text" id="txtGanadores" size="20" maxlength="50">
      </div></td>
      <td><div align="center">
        <input name="txtCobra" type="text" id="txtCobra" size="20" maxlength="50">
      </div></td>
    </tr>
    <tr>
      <td colspan="3"><div align="center">3
          <input name="txtAciertos" type="hidden" id="txtAciertos" value="3">
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
      <td colspan="6"><div align="center">Desquite</div></td>
    </tr>
    <tr><td><div align="center"><input name="txtNumero2" type="text" id="txtNumero2" size="5" maxlength="2">
      </div></td>
      <td><div align="center">
        <input name="txtNumero2" type="text" id="txtNumero2" size="5" maxlength="2">
      </div></td>
      <td><div align="center">
        <input name="txtNumero2" type="text" id="txtNumero2" size="5" maxlength="2">
      </div></td>
      <td><div align="center">
        <input name="txtNumero2" type="text" id="txtNumero2" size="5" maxlength="2">
      </div></td>
      <td><div align="center">
        <input name="txtNumero2" type="text" id="txtNumero2" size="5" maxlength="2">
      </div></td>
      <td><div align="center">
        <input name="txtNumero2" type="text" id="txtNumero2" size="5" maxlength="2">
      </div></td>	  
    </tr>
  </table>
  <table width="500" border="0">
    <tr>
      <td colspan="3"><div align="center">Aciertos</div></td>
      <td><div align="center">Ganadores</div></td>
      <td><div align="center">Cobra C/U </div></td>
    </tr>
  <tr><td colspan="3"><div align="center">6
          <input name="txtAciertos2" type="hidden" id="txtAciertos2" value="6">
      </div></td>
      <td><div align="center">
        <input name="txtGanadores2" type="text" id="txtGanadores2" size="20" maxlength="50">
      </div></td>
      <td><div align="center">
        <input name="txtCobra2" type="text" id="txtCobra2" size="20" maxlength="50">
      </div></td>
    </tr>
    <tr>
      <td colspan="3"><div align="center">5
          <input name="txtAciertos2" type="hidden" id="txtAciertos2" value="5">
      </div></td>
      <td><div align="center">
        <input name="txtGanadores2" type="text" id="txtGanadores2" size="20" maxlength="50">
      </div></td>
      <td><div align="center">
        <input name="txtCobra2" type="text" id="txtCobra2" size="20" maxlength="50">
      </div></td>
    </tr>	
  </table>
<table width="500" border="0">
    <tr>
      <td colspan="6"><div align="center">Sale O Sale </div></td>
    </tr>
	
    <tr><td><div align="center"><input name="txtNumero3" type="text" id="txtNumero3" size="5" maxlength="2">
      </div></td>
      <td><div align="center">
        <input name="txtNumero3" type="text" id="txtNumero3" size="5" maxlength="2">
      </div></td>
      <td><div align="center">
        <input name="txtNumero3" type="text" id="txtNumero3" size="5" maxlength="2">
      </div></td>
      <td><div align="center">
        <input name="txtNumero3" type="text" id="txtNumero3" size="5" maxlength="2">
      </div></td>
      <td><div align="center">
        <input name="txtNumero3" type="text" id="txtNumero3" size="5" maxlength="2">
      </div></td>
      <td><div align="center">
        <input name="txtNumero3" type="text" id="txtNumero3" size="5" maxlength="2">
      </div></td>	  
    </tr>
  </table>
  <table width="500" border="0">
  <tr>
    <td><div align="center">Aciertos</div></td>
    <td><div align="center">Ganadores</div></td>
    <td><div align="center">Cobra C/U </div></td>
  </tr>
  <tr><td><div align="center">
    <input name="txtAciertos3" type="text" id="txtAciertos3" size="5" maxlength="2">
  </div></td>
      <td><div align="center">
        <input name="txtGanadores3" type="text" id="txtGanadores3" size="20" maxlength="50">
      </div></td>
      <td><div align="center">
        <input name="txtCobra3" type="text" id="txtCobra3" size="20" maxlength="50">
      </div></td>
    </tr>	
  </table>
<table width="500" border="0">
    <tr>
      <td colspan="6"><div align="center">Yapas</div></td>
    </tr>
    <tr><td><div align="center"><input name="txtNumero4" type="text" id="txtNumero4" size="5" maxlength="2">
      </div></td>
      <td><div align="center">
        <input name="txtNumero4" type="text" id="txtNumero4" size="5" maxlength="2">
      </div></td>
      <td><div align="center">
        <input name="txtNumero4" type="text" id="txtNumero4" size="5" maxlength="2">
      </div></td>
      <td><div align="center">
        <input name="txtNumero4" type="text" id="txtNumero4" size="5" maxlength="2">
      </div></td>
      <td><div align="center">
        <input name="txtNumero4" type="text" id="txtNumero4" size="5" maxlength="2">
      </div></td>
      <td><div align="center">
        <input name="txtNumero4" type="text" id="txtNumero4" size="5" maxlength="2">
      </div></td>	  
    </tr>
    <tr><td><div align="center"><input name="txtNumero4" type="text" id="txtNumero4" size="5" maxlength="2">
      </div></td>
      <td><div align="center">
        <input name="txtNumero4" type="text" id="txtNumero4" size="5" maxlength="2">
      </div></td>
      <td><div align="center">
        <input name="txtNumero4" type="text" id="txtNumero4" size="5" maxlength="2">
      </div></td>
      <td><div align="center">
        <input name="txtNumero4" type="text" id="txtNumero4" size="5" maxlength="2">
      </div></td>
      <td><div align="center">
        <input name="txtNumero4" type="text" id="txtNumero4" size="5" maxlength="2">
      </div></td>
      <td><div align="center">
        <input name="txtNumero4" type="text" id="txtNumero4" size="5" maxlength="2">
      </div></td>	  
    </tr>
  </table>
  <table width="500" border="0">
    <tr>
      <td colspan="3"><div align="center">Aciertos</div></td>
      <td><div align="center">Ganadores</div></td>
      <td><div align="center">Cobra C/U </div></td>
    </tr>
  <tr><td colspan="3"><div align="center">6
          <input name="txtAciertos4" type="hidden" id="txtAciertos4" value="6">
      </div></td>
      <td><div align="center">
        <input name="txtGanadores4" type="text" id="txtGanadores4" size="20" maxlength="50">
      </div></td>
      <td><div align="center">
        <input name="txtCobra4" type="text" id="txtCobra4" size="20" maxlength="50">
      </div></td>
    </tr>
    <tr>
      <td colspan="3"><div align="center">5
          <input name="txtAciertos4" type="hidden" id="txtAciertos4" value="5">
      </div></td>
      <td><div align="center">
        <input name="txtGanadores4" type="text" id="txtGanadores4" size="20" maxlength="50">
      </div></td>
      <td><div align="center">
        <input name="txtCobra4" type="text" id="txtCobra4" size="20" maxlength="50">
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
  <input name="hiCodPoceado" type="hidden" id="hiCodPoceado" value="LO">
  <input name="hiTipos" type="hidden" id="hiCodPoceado" value="LT,DE,SS,YA">
  <input name="LT" type="hidden" id="hiCodPoceado" value="txtNumero,txtAciertos,txtGanadores,txtCobra,falso">
  <input name="DE" type="hidden" id="LT" value="txtNumero2,txtAciertos2,txtGanadores2,txtCobra2,falso">
  <input name="SS" type="hidden" id="SS" value="txtNumero3,txtAciertos3,txtGanadores3,txtCobra3,falso">
  <input name="YA" type="hidden" id="YA" value="txtNumero4,txtAciertos4,txtGanadores4,txtCobra4,falso">
</form>
</body>
</html>
