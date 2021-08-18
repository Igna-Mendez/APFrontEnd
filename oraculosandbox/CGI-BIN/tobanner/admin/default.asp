<%@ Language="VBScript" %>
  <% Option Explicit %>

<HTML>
  <HEAD>
	<TITLE>Generador de Encuestas y Votaciones</TITLE>

	<link href="stylesheet.css" rel="stylesheet" type="text/css" media="all" />


  </HEAD>
  <BODY BGCOLOR="#FFFFFF" TOPMARGIN="0" LEFTMARGIN="0">
<!--#include file="INC_HEAD.ASP"-->
<form action=loginprocess.asp method="post">

	<br><br><br>

	<table border=0 Align="center" width="300" class="TABLA" CELLPADDING=4>
	  <tr>
	    <td colspan="2" align="center">
	      <font size="3" class="fonttitle"><b>Ingrese los datos del administrador</b></font>
	    </td>
	  </tr> 
	  <tr>
	    <td align=right>
	      <font size="2" class="FONT">USUARIO</font>
	    </td>
	    <td Align="center">
	      <input type="text" name="username" value="" size="20" maxlength="20" CLASS="FONTINPUT">
	    </td>
	  </tr> 
	  <tr>
	    <td align=right>
	      <font size="2" class="FONT">CLAVE</font>
	    </td>
	    <td Align="center">
	      <input type="password" name="password" value="" size="20" maxlength="20" CLASS="FONTINPUT" >
	    </td>
	  </tr> 
	  <tr>
	    <td colspan="2" align="center">
	      <input type="submit" value="INGRESAR" CLASS="FONTBOTON">
	    </td>
	  </tr> 
	</table>
</form>
<!--#include file="INC_FOOTER.ASP"-->
