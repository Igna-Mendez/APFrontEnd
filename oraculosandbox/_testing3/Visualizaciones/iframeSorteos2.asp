<%@LANGUAGE="VBSCRIPT" CODEPAGE="1252"%>
<%response.Expires = 0%>
<!--#include file="../Connections/OraculoSemanal.inc" -->
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Documento sin t&iacute;tulo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
a {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 10px;
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
-->
</style></head>

<body>
<p>&nbsp;</p>
<table width="750" height="600" border="0" align="center">
  <tr>
    <td><iframe name="datamain" id="datamain"  src="./verSorteos.asp?idQuiniela=<%=Request.Querystring("idQuiniela")%>" width="750px" height="600px" marginwidth="0" marginheight="0" hspace="0" vspace="0" frameborder="0" scrolling="no"></iframe></td>
  </tr>
</table>
<table width="130" border="0" align="center">
  <tr>
    <td><div align="center"><a href="javascript:doit()"><img src="images/icono_imprimir.gif" width="17" height="17" border=0></a></div></td>
    <td><div align="center"><a href="javascript:doit()">Imprimir P&aacute;gina</a></div></td>
  </tr>
</table>
<p align="center">
  <script>
<!--
function doit(){
if (!window.print){
alert("You need NS4.x to use this print button!")
return
}
window.print()
}
//-->
</script>
</body>
</html>
