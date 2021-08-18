<%@ LANGUAGE = VBScript.Encode %>
<%IF SESSION("BANNER_SITE_LOGIN") <> "True" THEN
RESPONSE.REDIRECT ("DEFAULT.ASP")
END IF%>

<%
opt = request.querystring("opt")

select case opt
case "Add"
	strDisplay = "agregado"
case "Edit" 
	strDisplay = "editado"
case "Delete"
	strDisplay = "borrado"
case ""
	strDisplay = "ha realizado algo para"
end select
%>

<html>
<head>
<title><% Response.Write("Administrador de Banner") %></title>
   <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
   <meta http-equiv="refresh" content="7; url=main.asp">
   <link href="stylesheet.css" rel="stylesheet" type="text/css" media="all" />  
</head>

<body bgcolor="#FFFFFF" text="#FFFFFF" link="#FFFFFF" vlink="#99CCFF" alink="#0000FF">


<table width="450" CLASS=TABLA border="0" height="100" align=center>
  <tr> 
    <td > 
      <table width="100%" border="0">
        <tr>
          <td bgcolor="#CCCCCC" align=center valign=top><font CLASS=FONTTITLEBANNER><b>
		<%
		if (lcase(opt) = "add") then
			opt = "Agregando"
		elseif (lcase(opt) = "edit") then
			opt = "Editando"
		elseif (lcase(opt) = "delete") then
			opt = "Borrando"

		end if
		%> 
	<%=opt%> Banner </b></font></td>
        </tr>
        <tr>
          <td height="9"><img src="clearpixel.gif" width="1" height="1"></td>
        </tr>
        <tr>
          <td><FONT CLASS=FONT><b>Ud. ha <%=strDisplay%>
            el banner especificado. Será redireccionado al panel principal en 7 segundos, si esto no sucede hacer </b><a href="main.asp" CLass=LINK>click Aqui</a>.</font></td>
        </tr>
       
        
      </table>
    </td>
  </tr>
</table>
<!--#include file="INC_FOOTER.ASP"-->

</body>
</html>