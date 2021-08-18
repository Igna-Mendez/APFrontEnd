<%@ LANGUAGE = VBScript.Encode %>
<%
ID = request.form("ID")

dim strconn
dim conn
dim rs
dim strSQL

strconn = "DRIVER=Microsoft Access Driver (*.mdb); DBQ=" & Server.MapPath("../banners.mdb")

set conn = server.createobject("adodb.connection")
conn.open strconn
set rs = server.createobject("adodb.recordset")

strSQL = "SELECT * FROM banners WHERE ID = "&ID

rs.open strSQL, conn

if not rs.EOF Then
	strName = rs("Name")
	strImage = rs("Image")
	strLink = rs("Link")
End If

rs.close

set rs = nothing
set conn = nothing
set strconn = nothing
%>
<html>
<head>
<title><% Response.Write("Banner Admin from WEBSITE CONTRIBUTOR") %></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body bgcolor="#6699FF" text="#FFFFFF" link="#FFFFFF" vlink="#99CCFF" alink="#0000FF">
<table width="750" border="1">
  <tr>
    <td height="14"> 
      <table width="86%" border="0" height="70">
        <tr> 
          <td width="35%" height="2"><font face="Arial, Helvetica, sans-serif">
            <font size="+1">WEBSITE CONTRIBUTOR</font></noembed> 
              </embed> 
            </object></font></td>
          <td width="5%" height="2">&nbsp;</td>
          <td width="60%" height="2"> 
            <table width="100%" border="0">
              <tr> 
                <td width="28%"> 
                  <div align="center"><font size="3"><b><font face="Arial, Helvetica, sans-serif"><a href="default.asp">Start</a><br>
                    </font><font size="3"><b><font face="Arial, Helvetica, sans-serif"><a href="main.asp">Main</a></font></b></font><font face="Arial, Helvetica, sans-serif"><br>
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
    <td height="2"> 
      <table width="86%" border="0">
        <tr> 
          <td height="2"><font size="4"><b><font face="Arial, Helvetica, sans-serif" size="3">Edit 
            Banner Option</font></b></font></td>
        </tr>
        <tr> 
          <td height="8"><img src="clearpixel.gif" width="1" height="1"></td>
        </tr>
        <tr> 
          <td height="7"><font size="2" face="Arial, Helvetica, sans-serif">Please 
            fill in the fields below and click 'Edit Banner' to confirm the changes 
            to the specified banner.</font></td>
        </tr>
        <tr> 
          <td height="38"> 
            <form method="post" action="edit_banner2.asp" name="form1">
              <table width="83%" border="0" align="center">
                <tr> 
                  <td width="51%" height="2"><font size="2" face="Arial, Helvetica, sans-serif"><b>Name 
                    for Banner (e.g. Company)</b></font></td>
                  <td width="49%" height="2"> 
                    <div align="center"> 
                      <input type="text" name="Name" size="35" maxlength="100" value="<%=strName%>">
                    </div>
                  </td>
                </tr>
                <tr> 
                  <td width="51%" height="2"> 
                    <p><font size="2" face="Arial, Helvetica, sans-serif"><b>Image 
                      Location (e.g. URL) </b></font></p>
                  </td>
                  <td width="49%" height="2"> 
                    <div align="center"> 
                      <input type="text" name="Image" size="35" maxlength="150" value="<%=strImage%>">
                    </div>
                  </td>
                </tr>
                <tr> 
                  <td width="51%"><font size="2" face="Arial, Helvetica, sans-serif"><b>Link 
                    (Web Address for Banner)</b></font></td>
                  <td width="49%"> 
                    <div align="center"> 
                      <input type="text" name="Link" size="35" maxlength="150" value="<%=strLink%>">
                    </div>
                  </td>
                </tr>
                <tr> 
                  <td width="51%" height="2">&nbsp;</td>
                  <td width="49%" height="2"> 
                    <div align="center">
		      <input type="hidden" name="ID" value="<%=ID%>">
                      <input type="submit" name="Submit" value="Edit Banner">
                    </div>
                  </td>
                </tr>
                <tr> 
                  <td width="51%" height="2">&nbsp;</td>
                  <td width="49%" height="2"> 
                    <div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><b>Don't 
                      forget to upload your Image (banner), if changed</b></font> 
                    </div>
                  </td>
                </tr>
              </table>
            </form>
          </td>
        </tr>
        <tr> 
          <td height="2">&nbsp;</td>
        </tr>
        <tr bordercolor="#000000"> 
          <td height="2"> 
            <div align="center"><font size="2" face="Arial, Helvetica, sans-serif">Click 
              here to go back<br>
              <input type="button" value="Back" onClick="history.go(-1)" name="button">
              </font> </div>
          </td>
        </tr>
        <tr bordercolor="#000000"> 
          <td height="2"><font size="2" face="Arial, Helvetica, sans-serif">Created 
            by <a href="http://www.Towebs.com" target="new"><b>http://www.Towebs.com</font></td>
        </tr>
      </table>
    </td>
  </tr>
</table>
<p>&nbsp;</p>
</body>
</html>