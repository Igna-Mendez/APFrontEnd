<!--#INCLUDE FILE="config.inc" -->
<body bgcolor="#000000" text="#000000" link="#FFFFFF" vlink="#FFFFFF" alink="#FFFFFF">
<%
'##     Abro la conexion a la base
set my_conn= Server.CreateObject("ADODB.Connection")
my_Conn.Open ConnString

mypage=request("whichpage")
If  mypage="" then
   mypage=1
end if
mypagesize=request("pagesize")
If  mypagesize="" then
   mypagesize=15
end if
mySQL=request("strSQL")
IF  mySQL="" THEN
   mySQL=SQLtemp
END IF

Function FormatStr(String)
	on Error resume next
	String = Replace(String, CHR(13), "")
	String = Replace(String, CHR(10) & CHR(10), "</P><P>")
	String = Replace(String, CHR(10), "<BR>")
	FormatStr = String
End Function

Function DoDropDown(tblName, DispField, ValueField, SelVal, name)
	StrSQL = "SELECT " & DispField & ", " & ValueField 
	StrSQl = StrSQL & " FROM " & tblName
	rsdrop.Open strSQL, my_Conn
	
	Response.Write "<Select Name='" & name & "'>"
	if rsdrop.EOF or rsdrop.BOF then 
		Response.Write "<Option>No se han encontrado mensajes</option>"  & vbcrlf
	Else
		do until rsdrop.EOF
			if rs(ValueField) = cint(SelVal) then
				Response.Write "<option value='" & rsdrop(ValueField) & "' Selected>"
				Response.Write rsdrop(DispField) & "</option>" & vbcrlf
			Else
				Response.Write "<option value='" & rsdrop(ValueField) & "'>"
				Response.Write rsdrop(DispField) & "</option>" & vbcrlf
			End if
			rsdrop.MoveNext
		loop
	End if
	Response.Write "</select>" & vbcrlf
	rsdrop.Close
	set rsdrop = nothing	
End Function

Sub GetFirst
'#     Get Origional Posting
strSql = "SELECT Members.M_Name,Members.M_ICQ, Members.Member_id, Topics.T_date, Topics.T_subject, Topics.T_Message, Topics.T_Originator, Topics.Topic_ID "
strSql = strSql & "FROM Members INNER JOIN Topics ON Members.Member_id = Topics.T_Originator "
strSql = strSql & "where topics.topic_id = " &  Request.QueryString("topic_id") 

set rs = my_conn.Execute (strSql)

If rs.Eof or rs.Bof then  ' No categories found in DB
	Response.Write "<tr><td collspan=5>No se encontraron temas</td></tr>"
Else
		  Response.Write "<tr>"
	      Response.Write "<td bgcolor='" & ForumCellColor & "' valign=""top""><font color='" & ForumFontColor & "' face='" & DefaultFontFace & "' size='2'>" & rs("M_name") & "</font></td>"
		  Response.Write "<td bgcolor='" & ForumCellColor & "'  valign='top' ><font color='" & ForumFontColor & "' face='" & DefaultFontFace & "' size='1'>Fecha - " &  day(rs("T_Date")) & " " & monthname(month(rs("T_Date"))) & " " & year(rs("T_Date")) & " " & hour(rs("T_Date")) & ":" & Minute(rs("T_Date")) & "</font>"
		  Response.Write "&nbsp;&nbsp;<a href=""Javascript:openWindow('profile.asp?mode=display&id=" & rs("member_id") & "')""><img src='profile.gif' alt='Ver perfil' border=0 align='absmiddle' hspace=6></a>"
		  Response.Write "&nbsp;&nbsp;<a href='mail.asp?id=" & rs("member_id") & "'><img src='email.gif' alt='Enviar Email' border=0 align='absmiddle' hspace=6></a>"
		  Response.Write "&nbsp;&nbsp;<a href='post.asp?method=editTopic&reply_id=" & Rs("Topic_ID") & "&auth=" & rs("T_Originator") & "&forum_title=" & server.URLEncode(Request.QueryString("forum_title")) & "&topic_title=" & server.Urlencode(Request.QueryString("topic_title")) & "&forum_id=" & Request.QueryString("forum_id") & "&topic_id=" & Request.QueryString("topic_id") &"'><img src='edit.gif' alt='Editar mensaje' border=0 align='absmiddle' hspace=6></a>"
		  if ICQ = "true" then 
		    if trim(rs("M_ICQ")) <> "" then
		      Response.Write "&nbsp;&nbsp;<a href=""Javascript:openWindow('ICQ.asp?ICQ=" & rs("m_ICQ") & "')""><img src='http://online.mirabilis.com/scripts/online.dll?icq=" & rs("M_ICQ") & "&img=5' width= 18 height=18 border=0 align=absmiddle hspace=6></a>"
		    end if
		  end if
		  Response.Write "<hr noshade size=1><font color='" & ForumFontColor & "' face='" & DefaultFontFace & "' size='2'>" &  formatStr(rs("T_Message")) & "</font></td>"
	      Response.Write "</tr></TD></TR>"

End If
set rs = nothing
End Sub


%>
<!--#INCLUDE FILE="top.inc" -->
<table border=0 width=100%>
<tr>
	<td width=33% align=left><font face="<% =DefaultFontFace %>" size="2">
<a href="default.asp">Foros</a> | 
<a href="forum.asp?forum_id=<%= Request.QueryString("Forum_id") %>&forum_title=<%=server.Urlencode(Request.QueryString("forum_title"))%>"><%=Request.QueryString("forum_title")%></a> | <%=Request.QueryString("topic_title")%>
    </td>
<td align=center width=33%>

   </td>
   <td align=right width=33%><a href="Javascript:openWindow('post_Page.asp?page=http://<%=Request.ServerVariables("HTTP_HOST")&Request.ServerVariables("URL")&"?"&Request.QueryString%>')"><font face="<% =DefaultFontFace %>" size="2">Enviar a un amigo</a>
   </td></tr>
</table>
<% if Request.QueryString("S") <> "False" then %>
<a href="post.asp?forum_id=<%= Request.QueryString("forum_id") %>&method=reply&forum_title=<%=server.URLEncode(Request.QueryString("forum_title"))%>&topic_id=<%=Request.QueryString("topic_id")%>&topic_title=<%=server.URLEncode(Request.QueryString("topic_title"))%>&M=<%=Request.QueryString("M")%>"><font face="<% =DefaultFontFace %>" size="3"><p align = center>Responder</p></a>       
<% Else%>
Tema cerrado
<% end if %>
<table border="0" width="99%" cellspacing="2" cellpadding="3">  
    <td align="center" bgcolor="<% =HeadCellColor %>"><strong><font face="<% =DefaultFontFace %>" size="2" color="<% =HeadFontColor %>">Autor</font></strong></td>
    <td align="center" bgcolor="<% =HeadCellColor %>"><strong><font face="<% =DefaultFontFace %>" size="2" color="<% =HeadFontColor %>">Tema</font></strong></td>
    </tr>
<% if mypage = 1 then Call GetFirst %>
<% 
'##    Get all topicsFrom DB
strSql ="SELECT Members.M_Name, Members.M_ICQ, Reply.Reply_ID, Reply.R_Posted_By, Reply.Topic_ID, Reply.R_Message, Reply.R_Posted "
strSql = strSQl & "FROM Members INNER JOIN Reply ON Members.Member_id = Reply.R_Posted_By "
strSql = strSQl & "where topic_id = " & Request.QueryString("topic_id") & " order by reply.R_Posted"

set rs = Server.CreateObject("ADODB.Recordset")
rs.cachesize=15
rs.open  strSQL, my_conn, 3


i = 0 
If rs.Eof or rs.Bof then  ' No categories found in DB
	Response.Write ""
Else
		rs.movefirst
		rs.pagesize=mypagesize
		maxpages=cint(rs.pagecount)
		maxrecs=cint(rs.pagesize)
		rs.absolutepage=mypage
		howmanyrecs=0
		rec = 1
		do until rs.Eof or rec = 16 '## Display Forum
		if i = 0 then 
			CColor = AltForumCellColor
		else
			CColor = ForumCellColor
		End if
		  Response.Write "<tr>"
	      Response.Write "<td bgcolor='" & CColor & "' valign=""top""><font color='" & ForumFontColor & "' face='" & DefaultFontFace & "' size='2'>" & rs("M_name") & "</font></td>"
		  Response.Write "<td bgcolor='" & CColor & "'  valign='top' ><font color='" & ForumFontColor & "' face='" & DefaultFontFace & "' size='1'>Fecha - " &  day(rs("R_Posted")) & " " & monthname(month(rs("R_Posted"))) & " " & year(rs("R_Posted")) & " " & hour(rs("R_Posted")) & ":" & Minute(rs("R_Posted")) & "</font>"		 
		  Response.Write "&nbsp;&nbsp;<a href=""Javascript:openWindow('profile.asp?mode=display&id=" & rs("R_posted_by") & "')""><img src='profile.gif' alt='Ver perfil' border=0 align='absmiddle' hspace=6></a>"
		  Response.Write "&nbsp;&nbsp;<a href='mail.asp?id=" & rs("R_posted_by") & "'><img src='email.gif' alt='Enviar Email' border=0 align='absmiddle' hspace=6></a>"
		  Response.Write "&nbsp;&nbsp;<a href='post.asp?method=edit&reply_id=" & Rs("Reply_ID") & "&auth=" & server.URLEncode(rs("R_posted_by")) & "&forum_title=" & server.URLEncode(Request.QueryString("forum_title")) & "&topic_title=" & server.Urlencode(Request.QueryString("topic_title")) & "&forum_id=" & Request.QueryString("forum_id") & "&topic_id=" & Request.QueryString("topic_id") &"'><img src='edit.gif' alt='Editar mensaje' border=0 align='absmiddle' hspace=6></a>"
		  if ICQ = "true" then 
		    if trim(rs("M_ICQ")) <> "" then
		      Response.Write "&nbsp;&nbsp;<a href=""Javascript:openWindow('ICQ.asp?ICQ=" & rs("m_ICQ") & "')""><img src='http://online.mirabilis.com/scripts/online.dll?icq=" & rs("M_ICQ") & "&img=5' width= 18 height=18 border=0 align=absmiddle hspace=6></a>"
		    end if
		  end if		  
		  Response.Write "<hr noshade size=1><font color='" & ForumFontColor & "' face='" & DefaultFontFace & "' size='2'>" &  formatStr(rs("R_Message")) & "</font></td>"
	      Response.Write "</tr>"
	    rs.MoveNext
	    i = i + 1
	    if i = 2 then i = 0
	    rec = rec + 1
	    loop
End If
%>
  
  </table>     
<div align=left>
<font face="<% =DefaultFontFace %>" size="2">
<%
if maxpages > 1 then
  
  if Request.QueryString("whichpage") = "" then
   pge = 1
  else
   pge = Request.QueryString("whichpage")
  end if
  
  pad=" "
  scriptname=request.servervariables("script_name")
  Response.Write "Este tema posee " & maxpages & " páginas: &nbsp;&nbsp; " 
for counter=1 to maxpages
   If counter>=15 then
      pad=""
   end if
   
   if counter <> cint(pge) then   
	ref="<a href='" & scriptname 
	ref=ref & "?whichpage=" & counter
	ref=ref & "&pagesize=" & mypagesize 
	ref=ref & "&forum_title=" & server.URLEncode(Request.QueryString("forum_title")) 
	ref=ref & "&topic_title=" & server.Urlencode(Request.QueryString("topic_title")) 
	ref=ref & "&forum_id=" & Request.QueryString("forum_id") 
	ref=ref & "&topic_id=" & Request.QueryString("topic_id") 
	ref=ref & "'>" & pad & counter & "</a>"
	response.write ref & "  "
   Else
    Response.Write  counter   & "  "
   End if
   
   
   if counter mod 15 = 0 then
      response.write "<br>"
   end if
next
End if
%>
</font>
</div>      
  <p align="center">
  <font face="<% =DefaultFontFace %>" size="1">Haga Click <a href="Javascript:openWindow('close.asp?topic_id=<%=Request.QueryString("topic_id")%>&topic_title=<%=server.URLEncode(Request.QueryString("topic_title"))%>&forum_id=<%= Request.QueryString("Forum_id") %>')">aquí</a> para cerrar este Tema, (Solo Administradores y Operadores).<br><br>
  <font face="<% =DefaultFontFace %>" size="3">
  <a href="default.asp">Mostrar todos los foros</a> | 
<% if Request.QueryString("S") <> "False" then %>
<a href="post.asp?forum_id=<%= Request.QueryString("forum_id") %>&method=reply&forum_title=<%=server.URLEncode(Request.QueryString("forum_title"))%>&topic_id=<%=Request.QueryString("topic_id")%>&topic_title=<%=server.URLEncode(Request.QueryString("topic_title"))%>&M=<%=Request.QueryString("M")%>">Responder</a>       
<% Else%>
Thread Closed
<% end if %>

            
 </body></html>
<%
my_conn.Close
set my_conn = nothing
%>
