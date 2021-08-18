<%@ LANGUAGE = VBScript.Encode %>
<%
opt = request.querystring("opt")

select case opt
case "Add"
	strDisplay ="added"
case "Edit" 
	strDisplay = "edited"
case "Delete"
	strDisplay = "deleted"
case ""
	strDisplay = "done something to"
end select
%>

<html>
<head>
<title><% Response.Write("Administrador de Banner") %></title>
   <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
   <meta http-equiv="refresh" content="7; url=main.asp">
</head>

<body bgcolor="#6699FF" text="#FFFFFF" link="#FFFFFF" vlink="#99CCFF" alink="#0000FF">
<table width="750" border="1">
  <tr>
    <td height="14"> 
      <table width="86%" border="0" height="70">
        <tr> 
          <td width="35%" height="2"><font face="Arial, Helvetica, sans-serif"><font size="+1"></font></noembed> 
              </embed> 
            </object></font></td>
          <td width="5%" height="2">&nbsp;</td>
          <td width="60%" height="2"> 
            <table width="100%" border="0">
              <tr> 
                <td width="28%"> 
                  <div align="center"><font size="3"><b><font face="Arial, Helvetica, sans-serif"><a href="default.asp">Comenzar</a><br>
                    </font><font size="3"><b><font face="Arial, Helvetica, sans-serif"><a href="main.asp">Principal</a></font></b></font><font face="Arial, Helvetica, sans-serif"><br>
                    </font><font size="3"><b><font face="Arial, Helvetica, sans-serif"></font></b></font><font face="Arial, Helvetica, sans-serif"> 
                    </font></b></font></div>
                </td>
                <td width="6%"> 
                  <div align="center"><font size="3"><b></b></font></div>
                </td>
                <td width="66%"> 
                </td>
              </tr>
            </table>
          </td>
        </tr>
      </table>
    </td>
  </tr>
</table>
<img src="line.gif" width="750" height="9"> 
<table width="750" border="1" height="234">
  <tr> 
    <td height="161"> 
      <table width="86%" border="0">
        <tr>
          <td><font size="4"><b><font face="Arial, Helvetica, sans-serif" size="3"><%=opt%> 
            Banner </font></b></font></td>
        </tr>
        <tr>
          <td height="9"><img src="clearpixel.gif" width="1" height="1"></td>
        </tr>
        <tr>
          <td><font size="2" face="Arial, Helvetica, sans-serif">Ud. ha <%=strDisplay%>
            el banner especificado. Será redireccionado al panel principal en 7 segundos, si esto no sucede hacer click<a href="main.asp">Aqui</a>.</font></td>
        </tr>
        <tr>
          <td height="152">&nbsp;</td>
        </tr>
        <tr>
          <td height="2"><font size="2" face="Arial, Helvetica, sans-serif"><a href="http://www.Towebs.com" target="new"><b>http://www.Towebs.com</a></font></td>
        </tr>
      </table>
    </td>
  </tr>
</table>
<p>&nbsp;</p>
</body>
</html>