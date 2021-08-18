<%@ Language="VBScript" %>
 <% Option Explicit %>
<link href="stylesheet.css" rel="stylesheet" type="text/css" media="all" />
<%
Dim user,pass

user		=	Request.Form("username")
pass		=	Request.Form("password")
%>

<%
	IF user = "" Then
	  error("emptyuname")
	ELSEIF pass = "" Then
	  error("emptypass")
	ELSEIF user = "admin" AND pass = "PESA361YAYO" Then 'Change the values in double quots("").These are your username and password.
	  SESSION.TIMEOUT	= 30
	  Session("BANNER_SITE_LOGIN") = "True"
	  Response.Redirect("MAIN.asp")
	ELSE
	  error("wrongup")
	END IF
%>	

<%FUNCTION error(calltype)%>
<HTML>
  <HEAD>
	<TITLE>Administracion</TITLE>
	<STYLE>
	BODY 
		{
			SCROLLBAR-HIGHLIGHT-COLOR:#D8C2AD;
			SCROLLBAR-TRACK-COLOR:#FAFCED;
			SCROLLBAR-SHADOW-COLOR:#000000;
			SCROLLBAR-FACE-COLOR:#D8C2AD;
			SCROLLBAR-3DLIGHT-COLOR:#000000;
			SCROLLBAR-ARROW-COLOR:#FFFDDD;
			SCROLLBAR-DARKSHADOW-COLOR:#000000;
		}
	
	
	.FONT
		{
			COLOR: #000080; Helvetica 
		}
	
	A	
		{
			COLOR: #0011CC;
		}
	
	A:HOVER
		{
			COLOR: #0000FF
		}
	
	A:VISITED
		{
			COLOR: #2D3DAD
		}
	
	A:VISITED:HOVER
		{
			COLOR: #0000FF
		}
	
	.INPUT
		{
			COLOR: 000080;
			FONT: 10px Helvetica;
			HEIGHT: 13pt;
			BACKGROUND-COLOR: AA89C2;
			BORDER-RIGHT: 1px solid; 
			BORDER-LEFT: 1px solid; 
			BORDER-TOP: 1px solid; 
			BORDER-BOTTOM: 1px solid 
	
		}
	
	
	
	</STYLE>

  </HEAD>
  <BODY BGCOLOR="#FFFFFF" TOPMARGIN="0" LEFTMARGIN="0">
<!--#include file="INC_head.asp"-->
<br><br><br>
<table Align="center" vAlign="center" width="500">
  <tr>
    <td Align="center">
      <h3>LOGIN ERROR</h3>
    </td>
  </tr>
  <tr> 
    <td Align="center">
	<%IF calltype = "emptyuname" Then%>
	  <font size="2">Usuario y clave no validos, por favor intente nuevamente.</font>
	<%ELSEIF calltype = "emptypass" Then%>
	  <font size="2">Usuario y clave no validos, por favor intente nuevamente.</font>
	<%ELSEIF calltype = "wrongup" Then%>
	  <font size="2">Usuario y clave no validos, por favor intente nuevamente.</font>
	<%END IF%>
    </td>
  </tr>
</table>

       <br><center><a href="javascript:history.back()"> Haga click aqui para volver</a> </center>


<!--#include file="INC_footer.asp"-->
<%END FUNCTION%>
