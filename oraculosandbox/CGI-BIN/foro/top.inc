<html>
<head>
<title>ToWebs Forum</title>
<script language="JavaScript">
<!-- hide from JavaScript-challenged browsers

function openWindow(url) {
  popupWin = window.open(url, 'new_page', 'width=400,height=400')
}



// done hiding -->
</script>

</head>

<Style>
	a:link   {color="<% =LinkColor %>";text-decoration:<% =LinkTextDecoration %>}
	a:visited{color:"<% =VisitedLinkColor %>";text-decoration:<% =VisitedTextDecoration %>}
	a:hover  {color:"<% =HoverFontColor %>";text-decoration:<% =HoverTextDecoration %>}
</style>


<body bgcolor="#000000" text="#000000" link="#FFFFFF" vlink="#FFFFFF" alink="#FFFFFF">	
<TABLE align=center border=0 cellPadding=0 cellSpacing=0 width=100%>
    <TR>
        <TD vAlign=top>
        <a href="default.asp"><IMG alt="<% =BBTitle %>" border=0 src="<%=TitleImgLocation%>" ></a>
        </TD>
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

<% if lcase(left(Request.ServerVariables("SCRIPT_NAME"), 14)) = "/cgi-bin/foro/"  then %>
   <form action="<%=Request.ServerVariables("SCRIPT_NAME") & "?" & Request.Querystring  %>" method="post">	
    <SELECT NAME="Days">
    <OPTION value="1">Mostrar temas del último día
    <OPTION value="2">Mostrar temas de los últimos 2 días
    <OPTION value="5">Mostrar temas de los últimos 5 días
    <OPTION value="10">Mostrar temas de los últimos 10 días
    <OPTION value="30">Mostrar temas de los últimos 30 días
    <OPTION value="60">Mostrar temas de los últimos 60 días
    <OPTION value="100">Mostrar temas de los últimos 100 días
    <OPTION value="365" >Mostrar temas del último año
    </SELECT>
    <input type=hidden name="cookie" value="true">
    <input type=submit value="Aceptar">
    </form>
	</CENTER>
  <% End If %>
</TD>
</TR>
</TABLE>