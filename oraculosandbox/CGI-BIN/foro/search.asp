<!--#INCLUDE FILE="config.inc" -->
<!--#INCLUDE FILE="top.inc" -->

<%
set my_conn= Server.CreateObject("ADODB.Connection")
set rs = Server.CreateObject("ADODB.Recordset")
my_Conn.Open ConnString


Function FormatStr(String)
	on Error resume next
	String = Replace(String, CHR(13), "")
	String = Replace(String, CHR(10) & CHR(10), "</P><P>")
	String = Replace(String, CHR(10), "<BR>")
	FormatStr = String
End Function

If Request.QueryString("mode") = "doit" then

if Request.Form("search") <> "" then

'  Build Nightmare SQL Statement  - Kill Server!!!
keywords = split(Request.Form("search"), " ")
keycnt = ubound(keywords)

StrSql ="SELECT  Forum.*, Reply.*, Topics.* FROM (Forum LEFT JOIN Topics "
StrSql = StrSQl & "ON Forum.Forum_ID = Topics.Forum_id) LEFT JOIN Reply ON Topics.Topic_ID = Reply.Topic_ID "
StrSQl = StrSql & "WHERE "

if Request.Form("forum") <> 0 then
	StrSql = StrSql & "Forum.Forum_ID = " & Request.Form("forum") & " and "
End If

StrSQL = StrSql & "("

if Request.Form("searchdate") <> 0 then
	dt = cint(Request.Form("searchdate"))
	StrSql = StrSql & "T_date > #" & dateadd("d", -dt, now) & "#) and ("
End if
cnt = 0
For Each word in keywords
	StrSql =StrSql & "Forum.F_Description Like '%" & word & "%'  or Reply.R_Message Like '%"
	StrSql =StrSql & word & "%'  or  Topics.T_Message Like '%" 
	StrSql =StrSql & word & "%' "
	if cnt < keycnt then StrSql = StrSql &  Request.Form("andor") 
	cnt = cnt + 1
next 

StrSql =StrSql & ") order by topics.topic_id"

mypage=request("whichpage")
If mypage="" then
mypage=1
end if

rs.Open StrSql, my_Conn, 3,1

If rs.Eof or rs.Bof then  ' No categories found in DB
	Response.Write "<font face='" & DefaultFontFace & "'>No matches found</font>"
Else

%>

<body bgcolor="#000000" text="#000000" link="#FFFFFF" vlink="#FFFFFF" alink="#FFFFFF">

<table border="0" width="95%" cellspacing="2" cellpadding="0">
  <tr>
    
    <td align="center" bgcolor="<% =HeadCellColor %>"><strong><font face="<% =DefaultFontFace %>" size="2" color="<% =HeadFontColor %>">Tema</font></strong></td>
    <td align="center" bgcolor="<% =HeadCellColor %>"><strong><font face="<% =DefaultFontFace %>" size="2" color="<% =HeadFontColor %>">Fecha</font></strong></td>
    <td align="center" bgcolor="<% =HeadCellColor %>"><strong><font face="<% =DefaultFontFace %>" size="2" color="<% =HeadFontColor %>">Foro</font></strong></td></tr>

<%
	
	   rec_id=""
	   do until rs.Eof '## Display Forum
	      if rec_id = rs("topics.Topic_ID") then
			'  Don't do anything
		  Else
			Response.Write "<td bgcolor='" & ForumCellColor & "'><a href='Topic.asp?topic_id=" & rs("topics.topic_id") & "&forum_id=" & rs("topics.forum_id") & "&Topic_Title=" & server.URLEncode(left(server.URLEncode(rs("T_Subject")), 50)) & "&forum_title=" & server.URLEncode(rs("f_name")) & "'>"
			Response.Write "<font color='" & ForumLinkColor & "' face='" & DefaultFontFace & "' size='2'>" & rs("T_Subject") & "</a></td>"
			Response.Write "<td bgcolor='" & ForumCellColor & "' align='left' valign='top'><font color='" & ForumFontColor & "' face='" & DefaultFontFace & "' size='2'>" & rs("T_date") &  "</td>"
			Response.Write "<td bgcolor='" & ForumCellColor & "' align='left' valign='top'><font color='" & ForumFontColor & "' face='" & DefaultFontFace & "' size='2'>" & rs("F_Name") & "</td>"
			Response.Write "</tr>"
		  End if 
		  rec_id = rs("topics.topic_id")
		  rs.MoveNext
		loop
%>
  </table>    
  <p align=center><font face="<% =DefaultFontFace %>" size=2><a href="javascript:history.go(-2)">Volver al sistema de foros</a>
<%
End If
Else ' Search = ""
%>
<font face="<% =DefaultFontFace %>" size='4'><center>No ha ingresado ningún texto para buscar</center>
<p align=center><font face="<% =DefaultFontFace %>" size=2>
<a href="javascript:history.go(-2)">Volver al sistema de foros</a>
<%
Response.End
End if ' Search = ""
Else
%>
<div align="center"><center>

<form action="Search.asp?mode=doit" method="post">
<br>

<table border="0" width="80%" cellspacing="2" cellpadding="0">
<tr>
	<td bgcolor="#f7f7f7" align="right" valign=top width="50%">
		<font face="<% =DefaultFontFace %>" size='2'>Buscar : 
	</td>
	<td bgcolor="#f7f7f7" align="left" valign=top width="50%">
		<font face="<% =DefaultFontFace %>" size='2'>
		<input type="text" name="search" size="34"><br>
		<input type="radio" name="andor" value=" and " checked>
		Buscar frase<br>
		<input type="radio" name="andor" value=" or ">
		Buscar alguna de las palabras
		</font>
	</td>
</tr>
<tr>
	<td bgcolor="#f7f7f7" align="right" valign=top width="50%">
		<font face="<% =DefaultFontFace %>" size='2'>Buscar en Foro : 
	</td>
	<td bgcolor="#f7f7f7" align="left" valign=top width="50%">
		<font face="<% =DefaultFontFace %>">
		<select name="forum" size="1">
		<option value="0">Todos
		<%
		StrSql = "SELECT * FROM Forum"
		set rs = my_conn.execute (strSql)
		On Error Resume Next
		do until rs.eof
			Response.Write "<option value=""" & rs("forum_id") & """>" & left(rs("F_name"), 40) & "</option>" & vbcrlf
		rs.movenext
		loop
		%>  
		</select></font>
	</td>
</tr>
	<td bgcolor="#f7f7f7" align="right" valign=top width="50%">
		<font face="<% =DefaultFontFace %>" size='2'>Buscar por fecha : 
	</td>
	<td bgcolor="#f7f7f7" align="left" valign=top width="50%">
		<font face="<% =DefaultFontFace %>">
		<SELECT NAME="SearchDate">
		<OPTION value="0">Cualquier fecha
		<OPTION VALUE="1">Desde ayer
		<OPTION VALUE="5">Desde hace 5 días
		<OPTION VALUE="10">Desde hace 10 días
		<OPTION VALUE="30">Desde hace 30 días
		</SELECT>
	</td>
</tr>
</table>

<input type="submit" value="Buscar">
</form>
</center>
<% End If
on error resume next
set rs = nothing
my_conn.Close
set my_conn = nothing
 %>