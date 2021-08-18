<%@LANGUAGE="VBSCRIPT" CODEPAGE="1252"%>
<%response.Expires = 0%>
<!--#include file="../Connections/OraculoSemanal.inc" -->
<html>
<head>
<title>OraculoSemanal.com - Resultados</title>
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
  <script type="text/javascript" src="https://code.jquery.com/jquery-latest.js"></script>
<script type="text/javascript">
$(document).ready(function(){

	$("ul.subnav").parent().append("<span></span>"); //Only shows drop down trigger when js is enabled - Adds empty span tag after ul.subnav

	$("ul.topnav li span").click(function() { //When trigger is clicked...

		//Following events are applied to the subnav itself (moving subnav up and down)
		$(this).parent().find("ul.subnav").slideDown('fast').show(); //Drop down the subnav on click

		$(this).parent().hover(function() {
		}, function(){
			$(this).parent().find("ul.subnav").slideUp('slow'); //When the mouse hovers out of the subnav, move it back up
		});

		//Following events are applied to the trigger (Hover events for the trigger)
		}).hover(function() {
			$(this).addClass("subhover"); //On hover over, add class "subhover"
		}, function(){	//On Hover Out
			$(this).removeClass("subhover"); //On hover out, remove class "subhover"
	});

});
</script>
  <link rel="stylesheet" href="Poceadas/style_poceadas.css" type="text/css" >
  <body>
<!-- //######################## HEARD ############################################### -->

<table width="100%" border="0" cellpadding="0" cellspacing="0" background="/images/bg_celldream.jpg">
  <tr>
    <td height="35">
    <table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td width="382"><img src="/images/logo_sub.png" width="260" height="58" /></td>
        <td width="568"><table width="468" border="0" align="center" cellpadding="1" cellspacing="10">
          <tr>
            <td height="101"><iframe src="https://oraculosemanal.com/rotativo.htm" name="iframedjdwords" width="468" marginwidth="0"  height="80" marginheight="0" scrolling="No" frameborder="0" id="iframedjdwords2"></iframe>
              <br /></td>
          </tr>
        </table></td>
      </tr>
    </table>
    </td>
  </tr>
  <tr>
    <td height="35" background="/images/topnav_bg.gif"><div class="container">
    <div id="header">
      <ul class="topnav">
            <li><a href="https://www.oraculosemanal.com">Inicio</a></li>
            <li>
                <a href="#">Quinielas</a>
                <ul class="subnav">
                    <li><a href="_testing3/Visualizaciones/iframeSorteos.asp?idQuiniela=1">Nacional</a></li>
                    <li><a href="_testing3/Visualizaciones/iframeSorteos.asp?idQuiniela=2">Provincia</a></li>
                    <li><a href="_testing3/Visualizaciones/iframeSorteos.asp?idQuiniela=3">Montevideo</a></li>
                    <li><a href="_testing3/Visualizaciones/iframeSorteos.asp?idQuiniela=11">Santa Fe</a></li>
                    <li><a href="_testing3/Visualizaciones/iframeSorteos.asp?idQuiniela=12">Cordoba</a></li>
                    <li><a href="_testing3/Visualizaciones/iframeSorteos.asp?idQuiniela=6">Corrientes</a></li>
                    <li><a href="_testing3/Visualizaciones/iframeSorteos.asp?idQuiniela=13">Mendoza</a></li>
                    <li><a href="_testing3/Visualizaciones/iframeSorteos.asp?idQuiniela=17">Entre Rios</a></li>
                    <li><a href="_testing3/Visualizaciones/iframeSorteos.asp?idQuiniela=14">Neuquen</a></li>
                    <li><a href="_testing3/Visualizaciones/iframeSorteos.asp?idQuiniela=5">Santiago</a></li>
                    <li><a href="_testing3/Visualizaciones/iframeSorteos.asp?idQuiniela=15">Salta</a></li>
                    <li><a href="_testing3/Visualizaciones/iframeSorteos.asp?idQuiniela=7">Tucuman</a></li>
                </ul>
            </li>
            <li>
                <a href="#">Poceados</a>
                <ul class="subnav">
                    <li><a href="_testing3/Visualizaciones/Poceadas/Resultados_Poceadas-3.php?idPoceada=2">LOTO</a></li>
                    <li><a href="_testing3/Visualizaciones/Poceadas/Resultados_Poceadas-3.php?idPoceada=11">TELEKINO</a></li>
                    <li><a href="_testing3/Visualizaciones/Poceadas/Resultados_Poceadas-3.php?idPoceada=10">QUINI 6</a></li>
                    <li><a href="_testing3/Visualizaciones/Poceadas/Resultados_Poceadas-3.php?idPoceada=3">LOTO 5</a></li>
                    <li><a href="_testing3/Visualizaciones/Poceadas/Resultados_Poceadas-3.php?idPoceada=4">BRINCO</a></li>
                    <li><a href="_testing3/Visualizaciones/Poceadas/Resultados_Poceadas-3.php?idPoceada=5">MI BINGO</a></li>
                    <li><a href="_testing3/Visualizaciones/Poceadas/Resultados_Poceadas-3.php?idPoceada=7">Mono Bingo</a></li>
                    <li><a href="_testing3/Visualizaciones/Poceadas/Resultados_Poceadas-3.php?idPoceada=8">La Poceada</a></li>
                    <li><a href="_testing3/Visualizaciones/Poceadas/Resultados_Poceadas-3.php?idPoceada=1">Quiniela Plus</a></li>
                    <li><a href="_testing3/Visualizaciones/Poceadas/Resultados_Poceadas-3.php?idPoceada=9">Club Keno</a></li>
                    <li><a href="_testing3/Visualizaciones/Poceadas/Resultados_Poceadas-3.php?idPoceada=6">Toto Bingo</a></li>
                    <li><a href="_testing3/Visualizaciones/Poceadas/Resultados_Poceadas-3.php?idPoceada=12">Juga con Maradona</a></li>
                </ul>
            </li>
            <li><a href="#">Tablas</a>
                            <ul class="subnav">
                    <li><a href="oficios.htm">OFICIOS</a></li>
                    <li><a href="#">SUE&Ntilde;OS</a></li>
                    <li><a href="alfa.htm">Alfanumerico</a></li>
                    <li><a href="tablita.htm">Tablita de Datelli</a></li>
                    <li><a href="martingala1.htm">Martingala 1</a></li>
                    <li><a href="martingala2.htm">Martingala 2</a></li>
                    <li><a href="nombres.htm">NOMBRES</a></li>
                    <li><a href="animales.htm">ANIMALES</a></li>
                    <li><a href="tabladepago.htm">Tabla de Pago</a></li>
                </ul>
            </li>
            <li><a href="libro.htm">Libro de Datelli</a></li>
          </ul>
      </div>
    </div></td>
  </tr>
</table>

<!-- //###################### FIN HEARD ############################################# -->

<style type="text/css">
<!--
a {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #333333;
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
	color: #999999;
}
a:active {
	text-decoration: none;
}
.Estilo1 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-weight: bold;
	font-size: 14px;
}
-->
</style></head>

<body>
<br>
<br>
<table width="300" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><form action="" method="post" name="frBuscador" id="frBuscador" target="datamain1">
      <div align="center"><span class="Estilo1">Fecha</span>
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
        </select>
        <input type="submit" name="Submit" value="Buscar" onClick="javascript:buscar()">
      </div>
    </form></td>
  </tr>
</table>
<br>
<table width="950" height="600" border="0" align="center">
  <tr align="center">
    <td width="160" align="center"><center>
    </center></td>
    <td width="780" align="center"><iframe name="datamain1" id="datamain1"  src="./verSorteos.asp?idQuiniela=<%=Request.Querystring("idQuiniela")%>" width="780px" height="600px" marginwidth="0" marginheight="0" hspace="0" vspace="0" frameborder="0" scrolling="no"></iframe></td>
  </tr>
</table>
<br>
<table width="140" border="0" align="center">
  <tr>
    <td><div align="center">
      <a href="javascript:doit()"><img src="/images/icono_imprimir.gif" width="17" height="17" border=0></a>
      <div align="center"></div></td>
    <td><a href="javascript:doit()">Imprimir P&aacute;gina</a></td>
  </tr>
</table>
<p>&nbsp;</p>

<p align="center">


<script language="javascript">
<!--
function doit(){
if (!window.print){
alert("You need NS4.x to use this print button!")
return
}
window.print()
}
//-->

function buscar()
{
	document.frBuscador.action = "./verSorteos.asp?idQuiniela="+<%=Request.Querystring("idQuiniela")%>+"&fechaSorteo="+document.frBuscador.selMes.value+"/"+document.frBuscador.selDia.value+"/"+document.frBuscador.selAnio.value
	return
}

</script>
</body>
</html>
