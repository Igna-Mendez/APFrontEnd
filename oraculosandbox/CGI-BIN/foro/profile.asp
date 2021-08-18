
<!--#INCLUDE FILE="config.inc" -->
<%
' Conecto a la base de datos
Function ChkString(string)
	 if string = "" then string = " "
	 ChkString = Replace(string, "'", "''")
End Function

set my_conn= Server.CreateObject("ADODB.Connection")
my_Conn.Open ConnString

%>

<html>
<head>
<title>Perfil de usuario</title>

</head>

<Style>
	a:link   {color="<% =LinkColor %>";text-decoration:<% =LinkTextDecoration %>}
	a:visited{color:"<% =VisitedLinkColor %>";text-decoration:<% =VisitedTextDecoration %>}
	a:hover  {color:"<% =HoverFontColor %>";text-decoration:<% =HoverTextDecoration %>}
</style>

<body bgcolor="#FFFFFF" text="#000000" link="#000000" vlink="#000000" alink="#000000">
<TABLE align=center border=0 cellPadding=0 cellSpacing=0 width=100%>
    
    <TR>
        <TD vAlign=top><a href="default.asp"><IMG alt="ASP Bulletin Board" border=0 
            src="<%=TitleImgLocation%>" ></a></TD>
        <TD align=right vAlign=top>&nbsp;
</TD></TR></TABLE>
<font face="<% =DefaultFontFace %>" size="2">

<%
select case Request.QueryString("mode") 
	case "display"
	
	StrSql = "Select * from members where member_id=" & Request.QueryString("id")
	set rs = my_conn.Execute(StrSql)
%><br><br>
<div align="center"><center>
<TABLE bgColor=#b0c4de border=1 cellPadding=0 cellSpacing=0 
            width=90% 
            background="" bordercolor=#000000 
            >
                
                <TR>
                    <TD width="50%"><font face="<% =DefaultFontFace %>" size=2>Usuario</td>
                    <TD width="50%"><font face="<% =DefaultFontFace %>" size=3><%= rs("M_Name") %>
                         </td>
                <TR>
                    <TD><font face="<% =DefaultFontFace %>" size=2>Dirección de Email</FONT></td>
                    <TD><font face="<% =DefaultFontFace %>" size=3><a href="mailto:<%= rs("m_email") %>"><%= rs("m_email") %></a>
                        </td>
                <TR>
                    <TD><font face="<% =DefaultFontFace %>" size=2>WebSite </td>
                    <TD><font face="<% =DefaultFontFace %>" size=3><a href="<%= rs("M_homepage") %>" target="_Blank"><%= rs("M_homepage") %></a>
                        </td>
                <TR>
                    <TD><font face="<% =DefaultFontFace %>" size=2>País</td>
                    <TD><font face="<% =DefaultFontFace %>" size=3><%= rs("M_country") %>

</TD>
</TR>
                <TR>
                    <TD><font face="<% =DefaultFontFace %>" size=2>Número de ICQ</td>
                    <TD><font face="<% =DefaultFontFace %>" size=3><%= rs("M_ICQ") %>

</TD>
</TR>
                <TR>
                    <TD><font face="<% =DefaultFontFace %>" size=2>Mensajess</td>
                    <TD><font face="<% =DefaultFontFace %>" size=3><%= rs("M_Posts") %>

</TD>
</TR>

	
	</TABLE><a href="javascript:onClick= window.close()"><small>Cerrar ventana</SMALL></A></div></center>

<%
	case "edit"
%>
<form action="profile.asp?mode=go&id=<%=Request.QueryString("id")%>" method="post">


<font face="<% =DefaultFontFace %>" size="2"><center>En esta sección usted puede modificar su perfil de usuario.<br>
Solo puede hacerlo si es un usuario registrado.<br><br>
Por favor ingrese la información solicitada.</a>
<div align=center>
   <TABLE  bgColor=#b0c4de border=1 cellPadding=0 cellSpacing=0 width=75% background="" borderColor="#000000">
                
                <TR>
                    <TD width="50%"><font face="<% =DefaultFontFace %>" size=2>Usuario</td>
                    <TD width="50%"><font face="<% =DefaultFontFace %>" size=3><INPUT name="Name" size="30"  value=""> </td>
                </TR>
                <TR>
                    <TD><font face="<% =DefaultFontFace %>" size=2>Contraseña</td>
                    <TD><font face="<% =DefaultFontFace %>" size=3><INPUT name="password" type=password size="30"></td>
                </TR>
                <TR>
					<TD align=center  colspan=2><input type=submit value=Aceptar></td>
                </TR>    
   </table>            
</form>

<%
case "go"

StrSql = "Select * from members where m_name='" & ChkString(Request.Form("name"))
StrSql = StrSql & "' and m_Password ='" & ChkString(Request.Form("Password")) & "'"

set rs = my_conn.Execute(StrSql)

if rs.bof and rs.eof then 
%>
<font face="<% =DefaultFontFace %>" size="4"><center><br><br>Error de autentificación<br><br>
Vuelva atrás para reintentar
<%
Response.End
else
%>
<form action="profile.asp?mode=doit&id=<%=Request.QueryString("id")%>" method="post" id=form1 name=form1>
<!-- #include file="profile.inc" -->
</form>
<%


end if
case "doit"

StrSQl = "Update Members Set M_Email = '" & chkstring(Request.Form("email")) & "', "
StrSQl = StrSQl & "M_Country ='" & ChkString(Request.Form("country")) & "', "
StrSQl = StrSQl & "M_Sig ='" & ChkString(Request.Form("sig")) & "', "
StrSQl = StrSQl & "M_ICQ ='" & ChkString(Request.Form("ICQ")) & "', "
StrSQl = StrSQl & "M_Homepage ='" & ChkString(Request.Form("homepage")) & "' where M_Name = '"
StrSQl = StrSQl & ChkString(Request.Form("name")) & "' and M_Password = '" & ChkString(Request.Form("Password-d")) & "'"

my_conn.Execute(strSql)
%>

<font face="<% =DefaultFontFace %>" size="4"><center>Perfil de usuario actualizado.<br><br>
<small><br><a href="javascript:history.go(-3)">Volver al Foro</a></small>
<%

end select
on error resume next
rs.close
my_conn.Close
set my_conn = nothing
set rs=nothing
%>

