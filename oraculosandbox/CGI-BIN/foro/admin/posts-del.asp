<!--#INCLUDE FILE="config.inc" -->
<% 
Response.Buffer = true
set rs= Server.CreateObject("ADODB.RecordSet")
set my_conn= Server.CreateObject("ADODB.Connection")
my_Conn.Open ConnString


%>
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
Select Case Request.QueryString("mode")

case "show"
%>
<form Action="posts-del.asp?mode=delete" method=post id=form1 name=form1>
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

</tr>

<%

strSql = "SELECT Members.M_Name, Topics.T_date, Topics.T_subject, Topics.T_Message, Topics.T_Originator, Topics.Topic_ID "
strSql = strSql & "FROM Members INNER JOIN Topics ON Members.Member_id = Topics.T_Originator "
strSql = strSql & "where topics.topic_id = " &  Request.QueryString("topic") 

rs.open strSql, my_conn ' Get First post

	Response.Write "<input type=hidden name=ForumID  value=" & Request.QueryString("forum")& ">"
	Response.Write "<input type=hidden name=TopicID  value=" & Request.QueryString("topic")& ">"
	Response.Write "<tr bgcolor=#f1f1f1><td colspan=4 align=center><font face='" & DefaultFontFace & "' size=3>"  & rs("T_Subject") & "</font></td></tr>"
	Response.Write "<tr>"
	Response.Write "<td align=center>&nbsp;</td>" & vbcrlf
	Response.Write "<td><font face='" & DefaultFontFace & "' size=2>" & left(rs("T_Message"), 70) & "</font></td>" & vbcrlf
	Response.Write "<td><font face='" & DefaultFontFace & "' size=2>" & rs("M_Name") & "</font></td>" & vbcrlf
	

rs.close

' Get rest of the posts
strSql ="SELECT Members.M_Name, Members.M_ICQ, Reply.Reply_ID, Reply.R_Posted_By, Reply.Topic_ID, Reply.R_Message, Reply.R_Posted "
strSql = strSQl & "FROM Members INNER JOIN Reply ON Members.Member_id = Reply.R_Posted_By "
strSql = strSQl & "where topic_id = " & Request.QueryString("topic") & " order by reply.R_Posted"

rs.Open strSQL, my_Conn
if rs.EOF or rs.BOF then
	Response.Write "<tr><td colspan=4>No Posts Found- Delete the topic to remove posts</td></tr>"
Else
  
  do until rs.EOF
	Response.Write "<tr>"
	Response.Write "<td align=center><input type=checkbox name='forum' value='" & rs("reply_id") & "'></td>" & vbcrlf
	Response.Write "<td><font face='" & DefaultFontFace & "' size=2>" & left(rs("R_Message"), 70) & "</font></td>" & vbcrlf
	Response.Write "<td><font face='" & DefaultFontFace & "' size=2>" & rs("M_Name") & "</font></td>" & vbcrlf
	rs.MoveNext
  loop
End if
%>
<tr>
<td colspan=5 align=center><input type=submit name="del" value="Delete Selected Posts"></td></tr></table>
<br>
<%

case "delete"
	delAr = split(Request.Form("forum"), ",")

	for i = 0 to ubound(delAr) 
	 strSQL = "Delete * From Reply where Reply_ID = " & cint(delAr(i)) ' Delete Replys to Topic
	 Response.Write strSQL & "<br>"
     my_conn.Execute strSQL
	next
	
	strSQL =  "update forum set  F_Count = F_Count - " & Cint(ubound(delAr)) + 1 &  " where Forum_ID = " & Request.Form("Forumid")
	my_conn.Execute strSQL ' Update Counts
	strSQL =  "update Topics set  T_Replies = T_Replies - " & Cint(ubound(delAr))+ 1 &  " where Topic_ID = " & Request.Form("topicid")
	my_conn.Execute strSQL ' Update Counts
	strSQl ="Update totals set totals.P_Count=totals.P_Count -" & Cint(ubound(delAr))+ 1
	my_conn.Execute strSQL

%>
<P align=center><font face="<% =DefaultFontFace %>" size=3>Posts Deleted!....  Totals Updated!
<%
End Select
%>
</body>
</html>

<%
on error resume next
rs.Close
my_conn.Close
set rs = nothing
set my_conn = nothing

%>