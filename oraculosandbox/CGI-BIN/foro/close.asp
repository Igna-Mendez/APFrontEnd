<!--#INCLUDE FILE="config.inc" -->
<%
Function ChkString(string)
	 if string = "" then string = " "
	 ChkString = Replace(string, "'", "''")
End Function

Function ChkUser(strName, StrPasswd)
	strSql ="SELECT Member_id, M_level, M_Name, M_Password from Members where M_Name = '" & strName & "' and M_Password = '" & StrPasswd &"'"
	'Response.Write StrSql
	set rs_chk = my_conn.Execute (StrSql)
	if rs_chk.BOF or rs_chk.EOF then
		'#  Invalid Password
		ChkUser = 0
	Else
		if cint(rs_chk("Member_ID"))= cint(Request.Form("Author")) then 
			ChkUser = 1 ' Author
		Else
			Select case cint(rs_chk("M_Level"))
				case 1
					ChkUser = 2' Normal User
				case 2
					ChkUser = 3' Moderator
				case 3
					ChkUser = 4' Admin
				case else
					ChkUser = cint(rs_chk("M_Level"))
			End Select
				
		End If	
	End if
	rs_chk.close	
	set rs_chk = nothing
End Function

Function ForumModerator(Forum_ID, M_Name)
	strSQL = "SELECT Members.M_Name, Forum.Forum_ID FROM Members INNER JOIN " & _
	  " Forum ON Members.Member_id = Forum.F_Moderator WHERE Forum.Forum_ID = " & cint(Forum_ID) & _
	  " and Members.M_Name = '" & M_Name & "'"
	set rsChk = my_conn.Execute (strSQL)
	if rsChk.bof or rsChk.eof then
		ForumModerator = "False"
	Else
		ForumModerator = "true"
	End if
	rsChk.close
	set rsChk = nothing
End function

%>

<html>
<head>
<title>Close Thread</title>

</head>

<Style>
	a:link   {color="<% =LinkColor %>";text-decoration:<% =LinkTextDecoration %>}
	a:visited{color:"<% =VisitedLinkColor %>";text-decoration:<% =VisitedTextDecoration %>}
	a:hover  {color:"<% =HoverFontColor %>";text-decoration:<% =HoverTextDecoration %>}
</style>

<body bgcolor="#FFFFFF" text="#000000" link="#000000" vlink="#000000" alink="#000000">
	
<%
if Request.QueryString("mode") = "doit" then
	set my_conn= Server.CreateObject("ADODB.Connection")
	my_Conn.Open ConnString
	
	mlev = cint(ChkUser(Request.Form("user"), Request.Form("pass"))) 
	if mlev > 0 then  ' is Member
	
	  if (ForumModerator(Request.Form("Forum_id"), Request.Form("user"))) = "true" or mlev =4 then
	
		StrSQL = "Update Topics set T_Status = false where Topic_ID = " & Request.Form("topic_id") 
		my_conn.Execute (strSQL)
		Response.Write "<P align=center><font face='" & DefaultFontFace & "' size='3'><strong>Thread Closed!</strong></font></p>"
	  Else
		Response.Write "<P align=center><font face='" & DefaultFontFace & "' size='3'><strong>No Permissions to Close thread<br><br>"
		Response.Write "<a href=""Javascript: onClick= history.go(-1) "">Back</a></font></p>"
	  End if	  
	Else
		Response.Write "<P align=center><font face='" & DefaultFontFace & "' size='3'><strong>No Permissions to Close thread<br><br>"
		Response.Write "<a href=""Javascript: onClick= history.go(-1) "">Back</a></font></p>"
	End if
	my_conn.Close
	set my_Conn = nothing
else 

%>	

<TABLE align=center border=0 cellPadding=0 cellSpacing=0 width=100%>
    
    <TR>
        <TD vAlign=top><IMG alt="<% =BBTitle %>" border=0 src="<%=TitleImgLocation%>" </TD>
        <TD align=right vAlign=top>&nbsp;
</TD></TR></TABLE><P>
<font face="<% =DefaultFontFace %>" size="2">
Close Thread : <strong><%=Request.QueryString("topic_title") %></strong></p>
<div align="center"><center>
<form action="close.asp?mode=doit" method=post>
<input type=hidden name="topic_id" value="<%=Request.QueryString("topic_id") %>">
<input type=hidden name="forum_id" value="<%=Request.QueryString("forum_id") %>">
<TABLE bgColor=#b0c4de border=1 cellPadding=0 cellSpacing=0 width=90% background="" bordercolor=#000000>
                
                <TR>
                    <TD width="50%"><font face="<% =DefaultFontFace %>" size=2>User Name</td>
                    <TD width="50%"><font face="<% =DefaultFontFace %>" size=3><input type=text name="user" size=20>
                         </td>
                <TR>
                    <TD><font face="<% =DefaultFontFace %>" size=2>Password</FONT></td>
                    <TD><font face="<% =DefaultFontFace %>" size=3><input type=password name="pass" size=20>
                        </td>
                <TR>
                    <TD colspan=2 align=center><Input type=submit value="Send"></td>


</TD>
</TR>
</form>
	
	</TABLE>
	<% end if %><font face="<% =DefaultFontFace %>" size=2>
	<a href="javascript:onClick= window.close()"><small>Close 
            Window</SMALL></A></div></center>

