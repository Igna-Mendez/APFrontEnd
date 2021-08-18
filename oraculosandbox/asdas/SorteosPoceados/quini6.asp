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
      <td colspan="2">Quini 6 </td>
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
  </table>
  <table width="500" border="0">
    <tr>
      <td colspan="6"><div align="center">2&ordm; del Quini </div></td>
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
    <tr>
      <td colspan="3"><div align="center">4
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
      <td colspan="6"><div align="center">Revancha</div></td>
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
  <tr><td><div align="center">6
        <input name="txtAciertos3" type="hidden" id="txtAciertos3" value="6">
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
      <td colspan="6"><div align="center">Quini Que Siempre Sale </div></td>
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
    <td><div align="center">Aciertos</div></td>
    <td><div align="center">Ganadores</div></td>
    <td><div align="center">Cobra C/U </div></td>
  </tr>
  <tr><td><div align="center">
    <input name="txtAciertos4" type="text" id="txtAciertos4" size="5" maxlength="2">
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
      <td colspan="6"><div align="center">Pozo Extra</div></td>
    </tr>
    <tr><td><div align="center"><input name="txtNumero5" type="text" id="txtNumero5" size="5" maxlength="2">
      </div></td>
      <td><div align="center">
        <input name="txtNumero5" type="text" id="txtNumero5" size="5" maxlength="2">
      </div></td>
      <td><div align="center">
        <input name="txtNumero5" type="text" id="txtNumero5" size="5" maxlength="2">
      </div></td>
      <td><div align="center">
        <input name="txtNumero5" type="text" id="txtNumero5" size="5" maxlength="2">
      </div></td>
      <td><div align="center">
        <input name="txtNumero5" type="text" id="txtNumero5" size="5" maxlength="2">
      </div></td>
      <td><div align="center">
        <input name="txtNumero5" type="text" id="txtNumero5" size="5" maxlength="2">
      </div></td>	  
    </tr>
    <tr><td><div align="center"><input name="txtNumero5" type="text" id="txtNumero5" size="5" maxlength="2">
      </div></td>
      <td><div align="center">
        <input name="txtNumero5" type="text" id="txtNumero5" size="5" maxlength="2">
      </div></td>
      <td><div align="center">
        <input name="txtNumero5" type="text" id="txtNumero5" size="5" maxlength="2">
      </div></td>
      <td><div align="center">
        <input name="txtNumero5" type="text" id="txtNumero5" size="5" maxlength="2">
      </div></td>
      <td><div align="center">
        <input name="txtNumero5" type="text" id="txtNumero5" size="5" maxlength="2">
      </div></td>
      <td><div align="center">
        <input name="txtNumero5" type="text" id="txtNumero5" size="5" maxlength="2">
      </div></td>	  
    </tr>
    <tr><td><div align="center"><input name="txtNumero5" type="text" id="txtNumero5" size="5" maxlength="2">
      </div></td>
      <td><div align="center">
        <input name="txtNumero5" type="text" id="txtNumero5" size="5" maxlength="2">
      </div></td>
      <td><div align="center">
        <input name="txtNumero5" type="text" id="txtNumero5" size="5" maxlength="2">
      </div></td>
      <td><div align="center">
        <input name="txtNumero5" type="text" id="txtNumero5" size="5" maxlength="2">
      </div></td>
      <td><div align="center">
        <input name="txtNumero5" type="text" id="txtNumero5" size="5" maxlength="2">
      </div></td>
      <td><div align="center">
        <input name="txtNumero5" type="text" id="txtNumero5" size="5" maxlength="2">
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
          <input name="txtAciertos5" type="hidden" id="txtAciertos5" value="6">
      </div></td>
      <td><div align="center">
        <input name="txtGanadores5" type="text" id="txtGanadores5" size="20" maxlength="50">
      </div></td>
      <td><div align="center">
        <input name="txtCobra5" type="text" id="txtCobra5" size="20" maxlength="50">
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
  <input name="hiCodPoceado" type="hidden" id="hiCodPoceado" value="Q6">
  <input name="hiTipos" type="hidden" id="hiCodPoceado" value="QT,2Q,RE,QS,PE">
  <input name="QT" type="hidden" id="hiCodPoceado" value="txtNumero,txtAciertos,txtGanadores,txtCobra,falso">
  <input name="2Q" type="hidden" id="LT" value="txtNumero2,txtAciertos2,txtGanadores2,txtCobra2,falso">
  <input name="RE" type="hidden" id="RE" value="txtNumero3,txtAciertos3,txtGanadores3,txtCobra3,falso">
  <input name="QS" type="hidden" id="QS" value="txtNumero4,txtAciertos4,txtGanadores4,txtCobra4,falso">
  <input name="PE" type="hidden" id="PE" value="txtNumero5,txtAciertos5,txtGanadores5,txtCobra5,falso">
</form>
</body>
</html>
