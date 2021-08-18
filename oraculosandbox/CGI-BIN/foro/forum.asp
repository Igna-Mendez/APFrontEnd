<!--#INCLUDE FILE="config.inc" -->

<%
nDays = Request.Cookies("NumDays")

if Request.form("cookie") = "true" then
	Response.Cookies("NumDays") = Request.Form("days")
	Response.Cookies("NumDays").expires = date + 365
	nDays = Request.Form("Days")
End If

if nDays = "" then
	nDays = 30
End If

defDate = dateadd("d", -cint(nDays), date)

'##     Abro la conexion a la base de datos

set my_conn= Server.CreateObject("ADODB.Connection")
my_Conn.Open ConnString

'##    Obtengo todos los temas de la base
strSql ="SELECT Topics.T_Status, Topics.Forum_ID, Topics.Topic_ID, Topics.T_subject,Topics.T_Mail, Topics.T_Originator, Topics.T_Replies, Topics.T_Last_Post, Members.M_Name "
strSql = strSql & "FROM Members INNER JOIN Topics ON Members.Member_id = Topics.T_Originator "
strSql = strSql & "where Topics.Forum_ID = " & Request.QueryString("forum_id") & "and T_Last_Post >#" & defDate & "# order by Topics.T_Last_Post DESC"

set rs = my_conn.Execute (StrSql)


'## funcion para mostrar un nuevo icono
Function isNew(dt)
	
	if datediff("s", session("last_here_date"), dt) > 1 then
		isNew =  "<img src='new_t.gif' alt='New Topic' border=0>" 
	Else
		isNew = "<img src='old_t.gif' alt='' border=0>" 
	End If
End Function
%>
<!--#INCLUDE FILE="top.inc" -->
<body bgcolor="#FFFFFF" text="#000000" link="#000000" vlink="#000000" alink="#000000">
<font face="<% =DefaultFontFace %>" size="3"><br><a href="default.asp">Foros</a> | 
<a href="forum.asp?forum_id=<%= Request.QueryString("forum_id") %>&forum_title=<%=server.Urlencode(Request.QueryString("forum_title"))%>"><%=Request.QueryString("forum_title")%></a>
&nbsp;&nbsp;&nbsp;&nbsp;<small>Temas de los últimos <%= ndays %> días<br></small>
<br><center><a href="post.asp?forum_id=<%=Request.QueryString("forum_id")%>&method=Topic&forum_title=<%=server.Urlencode(Request.QueryString("forum_title"))%>">Agregar nuevo Tema</center><br></a>
 
<table border="0" width="95%" cellspacing="2" cellpadding="0">
  <tr>
    <td align="center" bgcolor="<% =HeadCellColor %>">&nbsp;</td>
    <td align="center" bgcolor="<% =HeadCellColor %>"><strong><font face="<% =DefaultFontFace %>" size="2" color="<% =HeadFontColor %>">Tema</font></strong></td>
    <td align="center" bgcolor="<% =HeadCellColor %>"><strong><font face="<% =DefaultFontFace %>" size="2" color="<% =HeadFontColor %>">Autor</font></strong></td>
    <td align="center" bgcolor="<% =HeadCellColor %>"><strong><font face="<% =DefaultFontFace %>" size="2" color="<% =HeadFontColor %>">Respuestas</font></strong></td>
    <td align="center" bgcolor="<% =HeadCellColor %>"><strong><font face="<% =DefaultFontFace %>" size="2" color="<% =HeadFontColor %>">Ultimo mensaje</font></strong></td>
  </tr>
<% 
If rs.Eof or rs.Bof then  ' No categories found in DB
	Response.Write "<tr><td collspan=5>No se encontraron Temas</td></tr>"
Else
		do until rs.Eof '## Muestro Foro
		  Response.Write "<tr>"
		  if rs("T_Status") <> false then
	      Response.Write "<td bgcolor='" & ForumCellColor & "' align='center'><a href='topic.asp?topic_id=" & rs("Topic_ID") & "&forum_id=" & Request.QueryString("forum_id") & "&Topic_Title=" & left(server.URLEncode(rs("T_Subject")), 50) & "&forum_title=" & server.URLEncode(Request.QueryString("forum_title")) & "&M=" & rs("T_Mail") & "'>" & isNew(rs("T_Last_Post")) & "</a></td>" & vbcrlf
		  Else 
		  Response.Write "<td bgcolor='" & ForumCellColor & "' align='center'><a href='topic.asp?topic_id=" & rs("Topic_ID") & "&forum_id=" & Request.QueryString("forum_id") & "&Topic_Title=" & left(server.URLEncode(rs("T_Subject")), 50) & "&forum_title=" & server.URLEncode(Request.QueryString("forum_title")) & "&M=" & rs("T_Mail") & "&S=" & rs("T_Status") & "'><img src='no_t.gif' alt='Thread Closed' border=0></a></td>" & vbcrlf
		  End if
		  Response.Write "<td bgcolor='" & ForumCellColor & "'><font face='" & DefaultFontFace & "' size='2'><a href='topic.asp?topic_id=" & rs("Topic_ID") & "&forum_id=" & Request.QueryString("forum_id") & "&Topic_Title=" & left(server.URLEncode(rs("T_Subject")), 50) & "&forum_title=" & server.URLEncode(Request.QueryString("forum_title")) & "&M=" & rs("T_Mail") & "&S=" & rs("T_Status") & "'>"
		  Response.Write left(rs("T_Subject"), 50) & "</a>&nbsp;</font></td>"
		  Response.Write "<td bgcolor='" & ForumCellColor & "' valign='top' align='center'><font face='" & DefaultFontFace & "' color='" & ForumFontColor & "' size='2'>" &  rs("M_Name") & "</font></td>"
		  Response.Write "<td bgcolor='" & ForumCellColor & "' valign='top' align='center'><font face='" & DefaultFontFace & "' color='" & ForumFontColor & "' size='2'>" & rs("T_Replies") & "</font></td>"
		  Response.Write "<td bgcolor='" & ForumCellColor & "' valign='top' align='center'><font face='" & DefaultFontFace & "' color='" & ForumFontColor & "' size='1'>" & rs("T_Last_Post") & "</font></td>"
	      Response.Write "</tr>"
	    rs.MoveNext
	    loop
End If
%>
  
  </table>           
  <p align="center"> <font face="<% =DefaultFontFace %>" size="3"><a href="default.asp">Mostrar todos los foros</a> | <a href="post.asp?forum_id=<%=Request.QueryString("forum_id")%>&method=Topic&forum_title=<%=server.Urlencode(Request.QueryString("forum_title"))%>">Agregar nuevo Tema</a></p>       
            
            
            
            
 </body></html>
<%
my_conn.Close
set my_conn = nothing
%>
