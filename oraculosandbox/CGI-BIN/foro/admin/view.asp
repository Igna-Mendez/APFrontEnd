<!--#INCLUDE file="config.inc" -->
<font face="veranda, arial, helvetica" size="1">
<%
if Request.QueryString("order") = "" then
	StrOrder = "Member_ID"
Else
	StrOrder = Request.QueryString("order")
End if

Const adOpenKeyset = 1
Const adLockReadOnly = 1

set my_conn= Server.CreateObject("ADODB.Connection")
set rs = server.CreateObject("ADODB.RecordSet")
my_Conn.Open ConnString

strSql ="SELECT * from members order by " & StrOrder
'Response.Write StrSql
rs.Open strSql, my_conn, adOpenKeyset, adLockReadOnly

if rs.EOF or rs.BOF then 
	Response.Write "No Members Found"
Else
	TotalRows = rs.RecordCount 
	rs.PageSize = 25
	PageSize = rs.PageSize 
	TotalPages=RS.PageCount
	
	select case Request("move")
		case "first" pageNo = 1  '  First
		case "prev" pageNo = cint(Session("page_num")) - 1  '  Next
		case "next" pageNo = cint(Session("page_num")) + 1  '  Previous
		case "last" pageNo = TotalPages  '  Last
		case Else PageNo = 1
	End Select
	
	if cint(PageNo) < 1 then PageNo = 1
	if cint(PageNo) > TotalPages then pageNo = TotalPages
	
	RS.AbsolutePage = PageNo
	PageNumber=PageNo
	Session("page_num") = PageNo
	
	Response.Write "<p align=center><big><big><a href='view.asp?move=first'>&lt;&lt;</a>&nbsp;"
	Response.Write "<a href='view.asp?move=prev'>&lt;</a>&nbsp;"
	Response.Write "<a href='view.asp?move=next'>&gt;</a>&nbsp;"
	Response.Write "<a href='view.asp?move=last'>&gt;&gt;</a><p></big></big>"
	
	Response.Write "<table width=90% align=center border =1 cellpading=0 cellspacing=0>"
	Response.Write "<tr bgcolor=silver>"
	Response.Write "<td><a href='view.asp?order=Member_id'>Id</a></td>"
	Response.Write "<td><a href='view.asp?order=M_Name'>Name</a></td>"
	Response.Write "<td><a href='view.asp?order=M_Password'>Password</a></td>"
	Response.Write "<td><a href='view.asp?order=M_Email'>Email</a></td>"
	Response.Write "<td><a href='view.asp?order=M_Country'>Country</a></td>"
	Response.Write "<td><a href='view.asp?order=M_Homepage'>HomePage</a></td>"
	Response.Write "<td><a href='view.asp?order=M_ICQ'>ICQ</a></td>"
	Response.Write "<td>Sig</td>"
	Response.Write "<td><a href='view.asp?order=M_Level'>Level</a></td></tr>"
	
	 HowMany = 0
	 Do until rs.EOF or HowMany => PageSize 
		Response.Write "<tr>"	
		Response.Write "<td><a href='modify.asp?mode=users&id=" & rs("Member_ID") & "'>" &rs("Member_ID")  & "</a>" & "</td>"
		Response.Write "<td>" & rs("M_Name")  & "</td>"
		Response.Write "<td>" & rs("M_Password")  & "</td>"
		Response.Write "<td>" & rs("M_Email")  & "</td>"
		Response.Write "<td>" & rs("M_Country")  & "</td>"
		Response.Write "<td>" & rs("M_HomePage")  & "</td>"
		Response.Write "<td>" & rs("M_ICQ")  & "</td>"
		Response.Write "<td>" & rs("M_Sig")  & "</td>"
		Response.Write "<td>" & rs("M_Level")  & "</td>"
		Response.Write "</tr>"
		rs.MoveNext
		howmany = howmany + 1
	loop
	Response.Write "</table>"
End if


	Response.Write "<p align=center><big><big><a href='view.asp?move=first'>&lt;&lt;</a>&nbsp;"
	Response.Write "<a href='view.asp?move=prev'>&lt;</a>&nbsp;"
	Response.Write "<a href='view.asp?move=next'>&gt;</a>&nbsp;"
	Response.Write "<a href='view.asp?move=last'>&gt;&gt;</a><p></big></big>"
%>

<p align="right"><font face="Veranda, Arial" size="2">
<%= PageNumber %>
of
<%= TotalPages %></p>
</form></FONT>

<%
rs.Close
set rs=nothing
my_conn.Close
set my_conn = nothing


%>