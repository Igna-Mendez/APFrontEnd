<!--#INCLUDE FILE="config.inc" -->
<html>
<head>
<title>Post Topic Toa Friend</title>

</head>

<Style><!--
	a:link   {color="<% =LinkColor %>";text-decoration:<% =LinkTextDecoration %>}
	a:visited{color:"<% =VisitedLinkColor %>";text-decoration:<% =VisitedTextDecoration %>}
	a:hover  {color:"<% =HoverFontColor %>";text-decoration:<% =HoverTextDecoration %>}
	-->
</style>

<body bgcolor="#FFFFFF" text="#000000" link="#000000" vlink="#000000" alink="#000000">
<TABLE align=center border=0 cellPadding=0 cellSpacing=0 width=100%>
    
    <TR>
        <TD vAlign=top><IMG alt="<% =BBTitle %>" border=0 src="<%=TitleImgLocation%>"> </TD>
        <TD align=right vAlign=top>&nbsp;
</TD></TR></TABLE>
<div align="center"><center>

<%
if Request.QueryString("mode") = "doit" then

	Subject = "De: " & Request.Form("yname") & " página de interés"
	msg = "Hola " & Request.Form("name") & vbcrlf & vbcrlf & Request.Form("msg") & vbcrlf & vbcrlf & "Este mensaje ha sido enviado por: " & Request.Form("yname") & " " & Request.Form("yemail")
	Set myMail = server.createobject("cdonts.newmail")
	myMail.send BBemail, request.form("email"), Subject, msg, 0

%>
<div align=center>
<font face="<% =DefaultFontFace %>" size=3>El Email ha sido enviado</font>
</div>
<%
else
%>
<form action="post_page.asp?mode=doit" method=post id=form1 name=form1>
<input type=hidden name="page" value="<%=Request.QueryString %>">
<TABLE bgColor=#b0c4de border=1 cellPadding=0 cellSpacing=0 width=90% background="" bordercolor=#000000>
                
                <TR>
                    <TD width="50%"><font face="<% =DefaultFontFace %>" size=2>Nombre del destinatario</td>
                    <TD width="50%"><font face="<% =DefaultFontFace %>" size=3><input type=text name="name" size=20>
                         </td>
                </tr>
                <TR>
                    <TD width="50%"><font face="<% =DefaultFontFace %>" size=2>Dirección de Email del destinatario</td>
                    <TD width="50%"><font face="<% =DefaultFontFace %>" size=3><input type=text name="email" size=20>
                         </td>
                </tr>                
                <TR>
                    <TD><font face="<% =DefaultFontFace %>" size=2>Su Nombre</FONT></td>
                    <TD><font face="<% =DefaultFontFace %>" size=3><input name="yname" size=20>
                        </td>
                </TR>
                <TR>
                </TR>           
                <TR>
                    <TD colspan=2><font face="<% =DefaultFontFace %>" size=2>Mensaje</FONT></td>
                </tr>
                <tr>
                    <TD colspan=2><font face="<% =DefaultFontFace %>" size=3><textarea name="msg" cols=40 rows=5>Hola, <%=vbcrlf %>Creo que esta página puede ser de interés para usted:<%=vbcrlf & Request.QueryString("page") %></textarea>
                        </td>
                </TR>
                </TR>                     
                <TR>
                    <TD colspan=2 align=center><Input type=submit value="Enviar" id=submit1 name=submit1></td>


</TD>
</TR>
</form>
	
	</TABLE>
<% end if %>
<font face="<% =DefaultFontFace %>" size=2>
	<a href="javascript:onClick= window.close()"><small>Cerrar 
            ventana</SMALL></A></div></center>
	
	
	
	
</body>
</html>