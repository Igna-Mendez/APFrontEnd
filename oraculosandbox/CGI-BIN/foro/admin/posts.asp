<!--#INCLUDE FILE="config.inc" -->
<% Response.Buffer = true %>
<html>
<head>
<title>ASP Resources Forum</title>
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
<div align=center>
<font face="<% =DefaultFontFace %>" size=3>Modify / Delete Posts</font>

<%
Function ChkString(string)
	 if string = "" then string = " "
	 ChkString = Replace(string, "'", "''")
End Function

set rs= Server.CreateObject("ADODB.RecordSet")
set my_conn= Server.CreateObject("ADODB.Connection")
my_Conn.Open ConnString

Select Case Request.QueryString("mode")

case "show"
%>
<form Action="posts.asp?mode=delete" method=post id=form1 name=form1>
<table width=80% border =0 cellpadding=2 cellspacing=2>
<tr>
	<td bgcolor="<% =HeadCellColor %>" align=center>
	   <font face="<% =DefaultFontFace %>" size=2 color="#ffffff">Del
	</td>
	<td bgcolor="<% =HeadCellColor %>" align=center>
	   <font face="<% =DefaultFontFace %>" size=2 color="#ffffff">Topic
	</td>	
	<td bgcolor="<% =HeadCellColor %>" align=center>
	   <font face="<% =DefaultFontFace %>" size=2 color="#ffffff">Author
	</td>		
	<td bgcolor="<% =HeadCellColor %>" align=center>
	   <font face="<% =DefaultFontFace %>" size=2 color="#ffffff">Posts
	</td>
</tr>

<%

strSql ="SELECT Topics.T_Status, Topics.Forum_ID, Topics.Topic_ID, Topics.T_subject,Topics.T_Mail, Topics.T_Originator, Topics.T_Replies,  Members.M_Name "
strSql = strSql & "FROM Members INNER JOIN Topics ON Members.Member_id = Topics.T_Originator "
strSql = strSql & "where Topics.Forum_ID = " & Request.Form("forum") & " order by Topics.T_Last_Post DESC"

rs.Open strSQL, my_Conn
if rs.EOF or rs.BOF then
	Response.Write "<tr><td colspan=4>No Posts Found</td></tr>"
Else
  Response.Write "<input type=hidden name=ForumID  value=" & rs("Forum_id") & ">"
  do until rs.EOF
	Response.Write "<tr>"
	Response.Write "<td align=center><input type=checkbox name='forum' value='" & rs("topic_id") & "'><input type=hidden name='" & rs("topic_id") & "' value='" & rs("T_Replies") & "'></td>" & vbcrlf
	Response.Write "<td><a href='posts-del.asp?mode=show&topic=" & rs("topic_id") & "&Forum=" &rs("Forum_id") &"'><font face='" & DefaultFontFace & "' size=2>" & left(rs("T_subject"), 50) & "</a></font></td>" & vbcrlf
	Response.Write "<td><font face='" & DefaultFontFace & "' size=2>" & rs("M_Name") & "</font></td>" & vbcrlf
	Response.Write "<td><font face='" & DefaultFontFace & "' size=2>" & rs("T_Replies") & "</font></td>" & vbcrlf
	rs.MoveNext
  loop
End if
%>

<tr>
<td colspan=5 align=center><input type=submit name="del" value="Delete Selected Topics"></td></tr></table>
<br>
<%
case "delete"
	delAr = split(Request.Form("forum"), ",")

	for i = 0 to ubound(delAr) 
	strSQL = "Delete * From topics Where topic_id = " & cint(delAr(i)) ' Delete Topic
	my_conn.Execute strSQL
	strSQL = "Delete * From Reply where topic_ID = " & cint(delAr(i)) ' Delete Replys to Topic
	my_conn.Execute strSQL
	strSQL =  "update forum set  F_Count = F_Count - " & Cint(Request.Form(trim(cstr(delAr(i)))))  +1 &  " where Forum_ID = " & Request.Form("Forumid")
	my_conn.Execute strSQL ' Update Counts
	strSQl ="Update totals set totals.P_Count=totals.P_Count -" & Cint(Request.Form(trim(cstr(delAr(i)))))  +1
	my_conn.Execute strSQL
	next

%>
<P align=center><font face="<% =DefaultFontFace %>" size=3>Topics Deleted!....  Totals Updated!
<%
End Select


on error resume next
rs.Close
set rs= nothing
my_conn.Close
set my_conn = nothing

%>