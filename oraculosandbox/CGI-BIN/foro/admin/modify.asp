<!--#INCLUDE FILE="config.inc" -->
<% Response.Buffer = true %>
<html>
<head>
<title>ToWebs Foro</title>
<script language="JavaScript">
<!-- hide from JavaScript-challenged browsers

function openWindow(url) {
  popupWin = window.open(url, 'new_page', 'width=400,height=300')
}

// done hiding -->
</script>

</head>

<Style>
<!--
	a:link   {color="<% =LinkColor %>";text-decoration:<% =LinkTextDecoration %>}
	a:visited{color:"<% =VisitedLinkColor %>";text-decoration:<% =VisitedTextDecoration %>}
	a:hover  {color:"<% =HoverFontColor %>";text-decoration:<% =HoverTextDecoration %>}
-->
</style>


<BODY bgColor="<% =PageBGColor %>" text="<% =DefaultFontColor %>" link="<% =LinkColor %>"
	aLink=<% =ActiveLinkColor %> vLink="<% =ActiveLinkColor %>">
	
<%
Function ChkString(string)
	 if string = "" then string = " "
	 ChkString = Replace(string, "'", "''")
End Function

set rs= Server.CreateObject("ADODB.RecordSet")
set my_conn= Server.CreateObject("ADODB.Connection")
my_Conn.Open ConnString

' ######################################################
' #
' #   Primero mostramos los que nesecitamos modificar
' #
' ######################################################

Select Case Request.QueryString("mode")

case "users"  '   Modifico usuario, entonces Muestro usuarios
' #############################################################
	if Request.QueryString("id") = "" then Response.Redirect "view.asp"
	
	strSql = "Select * from members where member_id = " & Request.QueryString("id")
	
	rs.Open StrSql, my_conn, 2, 3
	
	if rs.EOF or rs.BOF then 
		Response.Write "ERROR - User Not Found"  ' Shouldn't happen but catch anyway
	Else
	
%>
<form action="modify.asp?mode=doit&table=users" method=post>
<input type=hidden value="<%=Request.QueryString("id")%>" name="id">
<div align=center>
<p><font face="veranda, arial, helvetica" size=3><strong>Modify Member Details</strong></font></p>
<INPUT type="checkbox"  name="delM"><font face="veranda, arial, helvetica" size=2>Click To Delete User</br>
<table  align=center border=0>
  <tr valign=top>
   <td align=right><font face="veranda, arial, helvetica" size=3>
	<INPUT type="text" name="name" value="<%=rs("M_Name")%>" size=35>
   </td>
   <td align=left>
    <font face="veranda, arial, helvetica" size=2>Member Name
   </td>
  </tr>
  <tr valign=top>
   <td align=right><font face="veranda, arial, helvetica" size=3>
	<INPUT type="text" name="password" value="<%=rs("M_Password")%>" size=35>
   </td>
   <td align=left>
    <font face="veranda, arial, helvetica" size=2>Member Password
   </td>
  </tr>
  <tr valign=top>
   <td align=right><font face="veranda, arial, helvetica" size=3>
    <INPUT type="text" name="email" value="<%=rs("M_Email")%>" size=35>
   </td>
   <td align=left>
    <font face="veranda, arial, helvetica" size=2>Member Email
   </td>
  </tr>
  <tr valign=top>
   <td align=right><font face="veranda, arial, helvetica" size=3>
    <INPUT type="text" name="country"  value="<%=rs("M_Country")%>" size=30>
   </td>
   <td align=left>
     <font face="veranda, arial, helvetica" size=2>Member Country
   </td>
  </tr>
  <tr valign=top>
   <td align=right><font face="veranda, arial, helvetica" size=3>
    <INPUT type="text" name="homepage"  value="<%=rs("M_HomePage")%>" size=30>
   </td>
   <td align=left>
     <font face="veranda, arial, helvetica" size=2>Member HomePage
   </td>
  </tr>  
  <tr valign=top>
   <td align=right><font face="veranda, arial, helvetica" size=3>
    <INPUT type="text" name="ICQ"  value="<%=rs("M_ICQ")%>" size=30>
   </td>
   <td align=left>
     <font face="veranda, arial, helvetica" size=2>Member HomePage
   </td>
  </tr>
  <tr valign=top>
   <td align=right><font face="veranda, arial, helvetica" size=3>
     <TEXTAREA rows=4 cols=30 name="sig" wrap="virtual"><%=rs("M_Sig")%></TEXTAREA>
   </td>
   <td align=left>
     <font face="veranda, arial, helvetica" size=2>Member Signiture
   </td>
  </tr>
  <tr valign=top>
   <td align=right><font face="veranda, arial, helvetica" size=3>
    <INPUT type="text" name="view" value="<%=rs("M_Default_View")%>" size=5>
   </td>
   <td align=left>
    <font face="veranda, arial, helvetica" size=2>Default View<br>
     <small>To be Implimented in later version</small>
   </td>
  </tr>
  <tr valign=top>
   <td align=right><font face="veranda, arial, helvetica" size=3>
    <INPUT type="text" name="level" value="<%=rs("M_Level")%>" size=5>
   </td>
   <td align=left>
    <font face="veranda, arial, helvetica" size=2>Member Level<br>
     <small>
     1 - Normal<br>
     2 - Moderator<br>
     3 - Admin<br>     
     </small>   
   </td>
  </tr>
  <tr colspan=2>
   <td align=center><INPUT type="submit" value="Update User" name=submit1></td>
  </tr>
  </table>
</form>	
</div>
<%	
	End if
' ###########################################################
case  "category"   '  Modificar Catagoria - Lo mostramos
%>
<script language="javascript">
<!--

function ChangeBox() {
for (var i = 0; i < document.form1.cat.length; i++) {
if (document.form1.cat.options[i].selected == true) {
document.form1.modcat.value = document.form1.cat[i].text;
}
}
return null
}

//-->
</script>

<form action="modify.asp?mode=doit&table=category" method=post  name=form1>
<div align=center>
<p><font face="veranda, arial, helvetica" size=3><strong>Modify Category</strong></font></p>
<table align=center align=center>
<tr valign=top>
<td align=right>
 <select name="cat" onChange="ChangeBox()"> 
 <option>Please Select Category</option>
<%
	StrSql = "SELECT * from category"
	rs.Open StrSQl, my_conn, 2, 3
	
	if rs.EOF or rs.BOF then 
		Response.Write "ERROR - No Categorys Found"  ' Just in case!
	Else
		do until rs.EOF
			Response.Write "<option value=" & rs("Cat_ID")  & ">" & rs("Cat_Name") & "</option>" & vbcrlf
			rs.MoveNext
		loop
		Response.Write "</select>"
	End If
%>
</td>
<td align=left>
 <font face="veranda, arial, helvetica" size=2>Please Select a Category To Modify
</td>
</tr>
<td align=right><font face="veranda, arial, helvetica" size=3>
<INPUT type="text" name="modcat" size=20>
</td>
<td align=left>
	<font face="veranda, arial, helvetica" size=2>Make Your Modification Here
</td>
</tr>
<tr rowspan=2>
<td align=center>
<INPUT type="submit" value="Modify">
</td></table>
</form>
<%

' ###########################################################
case "forum"   '  Modifico Foro  -  Let's Show um
%>
<form action="forum.asp?mode=show" method=post  name=form1>
<input type=hidden value="<%=Request.QueryString("id")%>" name="id">
<div align=center>
<p><font face="veranda, arial, helvetica" size=3><strong>Modify Forum</strong></font></p>
<table align=center align=center>
<tr valign=top>
<td align=right>
 <select name="forum"> 
 <option>Seleccionar Foro</option>
<%
	StrSql = "SELECT Forum_ID, F_Name from forum"
	rs.Open StrSQl, my_conn, 2, 3

	if rs.EOF or rs.BOF then 
		Response.Write "ERROR - No se encontraron Foros"  ' Por las dudas!
	Else
		do until rs.EOF
			Response.Write "<option value=" & rs("Forum_ID")  & ">" & rs("F_Name") & "</option>" & vbcrlf
			rs.MoveNext
		loop
		Response.Write "</select>"
	End If
%>

</td>
<td align=left>
 <font face="veranda, arial, helvetica" size=2>Please Select a Forum To Modify
</td>

<tr rowspan=2>
<td align=center>
<INPUT type="submit" value="Modify" id=submit2 name=submit2>
</td></table>
</form>
<%

' ###########################################################
case "posting"   '  Modify Posting - Lets Sow 'um
%>
<form action="posts.asp?mode=show" method=post  name=form1>
<input type=hidden value="<%=Request.QueryString("id")%>" name="id">
<div align=center>
<p><font face="verdana, arial, helvetica" size=3><strong>Modify / Delete Posting</strong></font></p>
<table align=center align=center>
<tr valign=top>
<td align=right>
 <select name="forum"> 
 <option>Please Select Forum</option>
<%
	StrSql = "SELECT Forum_ID, F_Name from forum"
	rs.Open StrSQl, my_conn, 2, 3
	
	if rs.EOF or rs.BOF then 
		Response.Write "ERROR - No Forums Found"  ' Just in case!
	Else
		do until rs.EOF
			Response.Write "<option value=" & rs("Forum_ID")  & ">" & rs("F_Name") & "</option>" & vbcrlf
			rs.MoveNext
		loop
		Response.Write "</select>"
	End If
	
%>

</td>
<td align=left>
 <font face="veranda, arial, helvetica" size=2>Please Choose The Forum To Modidfy posting
</td>

<tr rowspan=2>
<td align=center>
<INPUT type="submit" value="Show Messages" id=submit2 name=submit2>
</td></table>
</form>
<%
' ####################################################################
' #
' #   We've Displayed It, So now lets change it!
' #
' ####################################################################

case "doit"
	Select Case  Request.QueryString("table")
	
	case "users"  ' Updates Users
		if Request.Form("DelM") = "on" then  ' Delete User
			StrSql = "DELETE * FROM members where member_id = " & Request.Form("id")
			my_conn.Execute StrSql
			strSQl ="Update totals set totals.U_Count=totals.U_Count - 1"
			my_conn.Execute StrSql
			
			Response.Write "<p align=center><font face='verdana, arial, helvetica' size=3>" & Request.Form("name") & "  Has been Removed" 
		Else ' Update Details
			StrSql = "UPDATE members SET m_name = '" & ChkString(Request.Form("name")) & "', "
			StrSql = StrSql & "m_password = '" & ChkString(Request.Form("password")) & "', "
			StrSql = StrSql & "m_email = '" & ChkString(Request.Form("email")) & "', "
			StrSql = StrSql & "m_country = '" & ChkString(Request.Form("country")) & "', "
			StrSql = StrSql & "m_homepage = '" & ChkString(Request.Form("homepage")) & "', "
			StrSql = StrSql & "m_ICQ = '" & ChkString(Request.Form("ICQ")) & "', "
			StrSql = StrSql & "m_sig = '" & ChkString(Request.Form("sig")) & "', "
			StrSql = StrSql & "m_default_view = " & ChkString(Request.Form("view")) & ", "
			StrSql = StrSql & "m_level = " & ChkString(Request.Form("level")) 
			StrSql = StrSql & " Where member_id = " & Request.Form("ID")
			'Response.Write StrSql & "<br>"
			
			my_conn.Execute StrSql
			
			Response.Write "<p align=center><font face='veranda, arial, helvetica' size=3>" & Request.Form("name") & " -   Update Done" 	
		End If
		
	case "category"
		strSql = "UPDATE category SET cat_name = '" & Request.Form("modcat") & "' where cat_id = " & Request.Form("cat")
		'Response.Write StrSQl
		Response.Write "Category Updated"
		
		my_conn.Execute StrSql
	
	End Select


End Select


on error resume next
rs.Close
my_conn.Close
set rs = nothing
set my_conn = nothing

%>

</body>
</html>