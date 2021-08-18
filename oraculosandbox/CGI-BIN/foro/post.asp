<!--#INCLUDE FILE="config.inc" -->

<%
'##     Abro la conexion a la base

Function Chked(YN)
   '  Para marcar los CheckBox
   if YN = "yes" then
      Chked = "Checked"
   else 
      Chked = ""
   end if    
End Function

Function CleanCode(str)
if str = "" then 
    str = " "
Else 
	str = replace(str, "<pre>", "[code]", 1, -1, 1)
	str = replace(str, "</pre>", "[/code]", 1, -1, 1)
	str = replace(str, "<b>", "[b]",1,-1,1)
	str = replace(str, "</b>", "[/b]",1,-1,1)
	str = replace(str, "<i>", "[/i]",1,-1,1)
	str = replace(str, "</i>", "[/i]",1,-1,1)
	str = replace(str, "<BLOCKQUOTE><font size=1 face=arial>Cuota:<hr height=1 noshade>", "[quote]",1,-1,1)
	str = replace(str, "<hr height=1 noshade></BLOCKQUOTE></font><font face='" &DefaultFontFace& "' size=2>", "[/quote]",1,-1,1)
	str = replace(str, "<a href='", "[a]", 1, -1, 1)
	str = replace(str, "' Target=_Blank>Link</a>", "[/a]",1,-1,1)
	if smiles ="true" then
		str= replace(str, "<img src=""wink.gif"" width=15 height=15 align=middle>", "[;)]",1,-1,1)
		str= replace(str, "<img src=""sad.gif"" width=15 height=15 align=middle>", "[:(]",1,-1,1)
		str= replace(str, "<img src=""tongue.gif"" width=15 height=15 align=middle>", "[:P]",1,-1,1)
		str= replace(str, "<img src=""smile.gif"" width=15 height=15 align=middle>", "[:)]",1,-1,1)
		
	end if
  End if
	CleanCode = str
end function

if Request.QueryString("method") = "edit" then

set my_conn= Server.CreateObject("ADODB.Connection")
my_Conn.Open ConnString

strSql ="SELECT * from reply where reply_id = " & Request.QueryString("reply_id")
msg = "<br><br>Nota: Solo el autor de este mensaje y el Operador pueden editarlo."
'on Error resume next
set rs = my_conn.Execute (StrSql)
txtmsg = rs("r_message")
End if

if Request.QueryString("method") = "editTopic" then

set my_conn= Server.CreateObject("ADODB.Connection")
my_Conn.Open ConnString

strSql ="SELECT T_Message from Topics where Topic_id = " & Request.QueryString("reply_id")
msg = "<br><br>Nota: Solo el autor de este mensaje y el Operador pueden editarlo."
'on Error resume next
set rs = my_conn.Execute (StrSql)
txtmsg = rs("T_Message")
End if



%>

<html>
<head>
<title>Nuevo Mensaje</title>
</head>

<Style>
	a:link   {color="<% =LinkColor %>";text-decoration:<% =LinkTextDecoration %>}
	a:visited{color:"<% =VisitedLinkColor %>";text-decoration:<% =VisitedTextDecoration %>}
	a:hover  {color:"<% =HoverFontColor %>";text-decoration:<% =HoverTextDecoration %>}
</style>

<body bgcolor="#FFFFFF" text="#000000" link="#000000" vlink="#000000" alink="#000000">
<table align="center" border="0" cellPadding="0" cellSpacing="0" width="100%">
    <tr>
        <td vAlign="top"><img alt="<% =BBTitle %>" border="0" src="bboard.gif"></td>
        <td vAlign="top">
            
            <TD align=right vAlign=top>
            <CENTER><FONT face="<% =DefaultFontFace %>">
            <B><% =BBTitle %></B><BR>
            <FONT size=1>
            <A href="profile.asp?mode=edit"><ACRONYM title="Edite su perfil de usuario.">perfil</ACRONYM></A> 
            |
            <A href="register.asp"><ACRONYM title="Regístrese gratis!">regístrese</ACRONYM></A>
            |
            <A href="search.asp"><ACRONYM title="Realize una búsqueda por palabras, fecha, o usuario.">búsqueda</ACRONYM></A>
            </font>
            </font>
            <br>
            <br>
</td></tr></table>
<center>
<p>
<font face="<% =DefaultFontFace %>" size="2">
Nota: Usted debe estar registrado para poder agregar o responder mensajes.<br>
Para registrarse gratuitamente, haga click <a href="register.asp">aquí</a>.<% =msg %>
</font>
</p>

<form action="post_info.asp" method="post" name="PostTopic">
<table border="0">
<tbody>
<tr>
<td noWrap><font face="<% =DefaultFontFace %>" size="2"><b>Usuario:</b></font></td>
<td>
<input maxLength="25" name="UserName" size="25" Value="<%=Request.Cookies("User")("Name")%>"> </td></tr>
<tr>
<td noWrap><font face="<% =DefaultFontFace %>" size="2"><b>Contraseña:</b></font></td>
<td>
<input maxLength="13" name="Password" size="13" type="password" value="<%=Request.Cookies("User")("Pword")%>">&nbsp;&nbsp;
<font face="<% =DefaultFontFace %>" size="1"><a href="pword.asp">Olvidó su contraseña?</a></font></td></tr>
<% if lcase(Request.QueryString("method")) = "topic" then %>
<tr>
<td noWrap><font face="<% =DefaultFontFace %>" size="2"><b>Asunto:</b></font></td>
<td>
<input maxLength="85" name="TopicSubject" size="40"></td></tr>
<% End If %>
<tr>
<td noWrap vAlign="top"><font face="<% =DefaultFontFace %>" size="2"><b>Mensaje:</b></font> 
</td>
<td><textarea cols="45" name="Message" rows="6" wrap="VIRTUAL"><%=trim(cleancode(txtMsg))%></textarea><br>
<font face="<% =DefaultFontFace %>" size="2">
<input name="Sig" type="checkbox" value="yes" <%=Chked(Request.Cookies("User")("sig"))%>>Marcar para agregar su firma de perfil.<br>
<input name="cookies" type="checkbox" value="yes" <%=Chked(Request.Cookies("User")("cookies"))%>>Marcar para recordar detalles.<% if lcase(Request.QueryString("method")) = "topic" then %>
<br><input name="rmail" type="checkbox" value="true">Marcar para recibir notificación por email al recibir mensajes en este tema.
<% end if %>
</font></td></tr></tbody></table>

<p>
<input name="forum_id" type="hidden" value="<%=Request.QueryString("forum_id") %>"> 
<input name="method_type" type="hidden" value="<%=Request.QueryString("method") %>"> 
<input name="Author" type="hidden" value="<%=Request.QueryString("auth") %>">
<input name="forum_title" type="hidden" value="<%=Request.QueryString("forum_title") %>">
<input name="topic_id" type="hidden" value="<%=Request.QueryString("topic_id") %>">
<input name="topic_title" type="hidden" value="<%=Request.QueryString("topic_title") %>">
<input name="reply_id" type="hidden" value="<%=Request.QueryString("reply_id") %>">
<input name="M" type="hidden" value="<%=Request.QueryString("M") %>">
<input name="refer" type="hidden" value="<%=Request.ServerVariables("HTTP_REFERER") %>">

<%
if Request.QueryString("method") = "reply" then
   btn = "Responder"
Else
   btn = "Agregar Tema"
End if 
%>
<center><input name="Submit" type="submit" value="<%=btn%>">
<input name="Reset" type="reset" value="Borrar formulario"> </center></form></td>
    </tr>
  
  </table>           
  <p align="center">
  <font face="<% =DefaultFontFace %>" size="3">
  <a href="default.asp">Mostrar todos los foros</a>
  </p>       
            
            
            
            
 </body></html>
<%
if Request.QueryString("method") = "edit" then
my_conn.Close
set my_conn = nothing
End If
%>

<script language="JScript" runat=server>
function urlC(strin) {
	var re, r;
	re = /\<A.*ank\>/i ;  
	r = strin.replace(re, "[a]"); 
	return r;
	}
</script>
