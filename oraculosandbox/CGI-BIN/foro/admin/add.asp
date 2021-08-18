<!--#INCLUDE file="config.inc" -->
<%
'  Some Global Functions

Function ChkString(string)
	if String = "" then string = " "
	string = replace(string, "'", "''")
	ChkString = string
End Function
%>

<html>

<head>

<title>Add</title>
<style>
	a:link   {color="#000080";text-decoration:underline}
	a:visited{color:"#000080";text-decoration:underline}
	a:hover  {color:red;text-decoration:underline}
</style>
</head>

<body bgcolor="#FFFFFF" text="#000080" link="#000080" topmargin="5">
</body>
</html>
<%
'  Procedure to add A Category to the database
Sub add_Cat
  '  Has the form been filled in?
  If request.QueryString("do_it") = "true" then
    set my_conn= Server.CreateObject("ADODB.Connection")
    my_Conn.Open ConnString
    StrSQl = "INSERT INTO category (cat_name) values ('" & ChkString(Request.Form("cat")) & "')"
    my_conn.Execute StrSql

    my_conn.close
    set my_conn = nothing
   
    Response.Write "<p align=""center""><strong><font face=""veranda, Arial, Helvetica"" size=4>Category Added</font></strong></p>"

  Else
%>
 <p align="center"><strong><font face="veranda, Arial, Helvetica" size="3">Add a Category</font></strong></p>

<form method="POST" action="add.asp?mode=category&do_it=true" method="post">
<div align="center"><center><p><font
  face="veranda, arial, helvetica" size="2">Category to Add</font><br>
  <input type="text" name="cat" size="25"><br>
  <input type="submit" value="Add Category" name="B1"></p>
  </center></div>
</form>
<% 
  End If 

End Sub

'  Procedure to Add a Forum to the database
Sub add_forum
    set my_conn= Server.CreateObject("ADODB.Connection")
    my_Conn.Open ConnString

  '  Has the form been filled in?
  If request.QueryString("do_it") = "true" then
    StrSQl = "INSERT INTO Forum (f_name, F_Description, F_Cat, F_Moderator ) values ('"
    StrSql = StrSql &  Request.Form("name") & "', '"
    StrSql = StrSql &  Request.Form("description") & "', "
    StrSql = StrSql &  Request.Form("category") & ", "
    StrSql = StrSql &  Request.Form("moderator") & ")"

    my_conn.Execute StrSql

    my_conn.close
    set my_conn = nothing
   
    Response.Write "<p align=""center""><strong><font face=""veranda, Arial, Helvetica"" size=4>Category Added</font></strong></p>"

  Else
%>
<p align="center"><font face="veranda, Arial, Helvetica" size="3"><strong>Add Forum</strong></font></p>
<div align="center"><center>
<form action="add.asp?mode=forum&do_it=true" method="post">
<table border="0" width="90%">
  <tr>
    <td width="50%" valign="top"><font face="veranda, arial, helvetica">Forum Name :<br>
    Forum Description :<br></td>
    <td width="50%" valign="top"><font face="veranda, arial, helvetica">
    <input type="text" name="name" size="25"><br>
    <input type="text" name="description" size=25></tr>
<tr>
   <td width="50%" valign="top"><font face="veranda, arial, helvetica">Forum Caregory :</font></td>
   <td width="50%" valign="top"><font face="veranda, arial, helvetica">
    <select name="Category" size="1">
<%
StrSql = "SELECT * FROM category"
set rs = my_conn.execute (strSql)
On Error Resume Next
do until rs.eof
	Response.Write "<option value=""" & rs("Cat_id") & """>" & rs("cat_name") & "</option>" & vbcrlf
rs.movenext
loop
%>  
    </select></font>
  </td>
  </tr>
  <tr>
    <td width="50%" valign="top"><font face="veranda, arial, helvetica">Forum Moderator :</font></td>
    <td width="50%" valign="top"><font face="veranda, arial, helvetica">
    <select name="moderator" size="1">
<%
StrSql = "SELECT * FROM members WHERE m_level >= 2"
set rs = my_conn.execute (strSql)
On Error Resume Next
do until rs.eof
	Response.Write "<option value=""" & rs("member_id") & """>" & rs("m_name") & "</option>" & vbcrlf
rs.movenext
loop
set rs = nothing
my_conn.close
set my_conn = nothind

%>
</select>
</font>


</td>
  </tr>
</table>
<input type="submit"></form>
</center></div>
 


<% 
  End If 

End Sub 

%>


<%
Select Case Request.QueryString("mode")
	case "category" call add_Cat
	case "forum" call add_forum
	case Else Response.Write "Error"
End Select
%>