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


'  Procedure to Add a Forum to the database
Sub add_forum
    set my_conn= Server.CreateObject("ADODB.Connection")
    my_Conn.Open ConnString
    
    strSql = "Select * from forum where forum_id = " & Request.Form("forum")
    set rs = my_conn.Execute (strSql)
		tmpName = rs("F_Name")
		tmpDescription = rs("F_Description")
		tmpCat = rs("F_Cat")
		tmpMod = rs("F_Moderator")
	rs.close
    
%>
<p align="center"><font face="veranda, Arial, Helvetica" size="3"><strong>Add Forum</strong></font></p>
<div align="center"><center>
<form action="forum.asp?mode=doit" method="post">
<input type=hidden value="<%=Request.Form("forum") %>" name="id">
<table border="0" width="90%">
  <tr>
    <td width="50%" valign="top"><font face="veranda, arial, helvetica">Forum Name :<br>
    Forum Description :<br></td>
    <td width="50%" valign="top"><font face="veranda, arial, helvetica">
    <input type="text" name="name" size="25" value="<%=server.HTMLEncode(tmpName)%>"><br>
    <input type="text" name="description" size=25 value="<%=server.HTMLEncode(tmpDescription)%>"></tr>
<tr>
   <td width="50%" valign="top"><font face="veranda, arial, helvetica">Forum Caregory :</font></td>
   <td width="50%" valign="top"><font face="veranda, arial, helvetica" size=2>
    <select name="Category" size="1">
<%
StrSql = "SELECT * FROM category"
set rs = my_conn.execute (strSql)
On Error Resume Next
do until rs.eof
	Response.Write "<option " 
	if rs("Cat_ID") = Cint(tmpCat) then Response.Write " Selected "
	Response.Write 	 "value='" & rs("Cat_id") & "'>" & server.HTMLEncode(rs("cat_name")) & "</option>" & vbcrlf
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
	Response.Write "<option "
	if rs("member_id") = Cint(tmpMod) then Response.Write " Selected "
	Response.Write " value=""" & rs("member_id") & """>" & rs("m_name") & "</option>" & vbcrlf
rs.movenext
loop
set rs = nothing
my_conn.close
set my_conn = nothing

%>
</select>
</font>


</td>
  </tr>
</table>
<input type="submit"></form>
</center></div>
 


<% 
End Sub 

Sub Update_Forum

    set my_conn= Server.CreateObject("ADODB.Connection")
    my_Conn.Open ConnString
    
	strSql = "UPDATE forum SET f_name = '" & chkString(Request.Form("name")) & "', "
	strSql = StrSql & "f_Description = '" & chkString(Request.Form("description")) & "', "
	strSql = StrSql & "f_cat = "  & Request.Form("category") & ", "
	strSql = StrSql & "f_moderator = "  & Request.Form("moderator") 
	strSql = StrSql & " WHERE forum_id = " & Request.Form("id")
'	Response.Write StrSql
	my_conn.Execute StrSql

    my_conn.close
    set my_conn = nothing
   
    Response.Write "<p align=""center""><strong><font face=""veranda, Arial, Helvetica"" size=4>Forum Updated</font></strong></p>"


End Sub

%>


<%
Select Case Request.QueryString("mode")
	case "doit" call Update_Forum
	case "show" call add_forum
	case Else Response.Write "Error"
End Select
%>

</body>
</html>