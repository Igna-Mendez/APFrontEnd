<!--#INCLUDE file="config.inc" -->
<%
'  Algunas funciones globales

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
'Response.Write  Request.Form("forum")
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
		
		    
		'Create an ADO connection odject
		Set adoCon = Server.CreateObject("ADODB.Connection")
		adoCon.open ConnString
		'Create an ADO recordset object
		Set rsUpdateEntry = Server.CreateObject("ADODB.Recordset")
		
		
		strSQL = "SELECT * FROM forum WHERE forum_id = " & Request.Form("id")
		
		rsUpdateEntry.CursorType = 2
		
		rsUpdateEntry.LockType = 3
		
		rsUpdateEntry.Open strSQL, adoCon
		
		'Update the record in the recordset
		'rsUpdateEntry.Fields("forum_id") = Request.Form("id")
		rsUpdateEntry.Fields("f_name") = Request.Form("name")
		rsUpdateEntry.Fields("f_description") = Request.Form("description")
		
		'Write the updated recordset to the database
		rsUpdateEntry.Update
		
		'Reset server objects
		rsUpdateEntry.Close
		Set rsUpdateEntry = Nothing
		Set adoCon = Nothing
		

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