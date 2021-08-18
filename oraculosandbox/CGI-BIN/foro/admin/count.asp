<!--#INCLUDE FILE="config.inc" -->

<%
server.ScriptTimeout = 6000

set my_conn= Server.CreateObject("ADODB.Connection")
set rs = Server.CreateObject("ADODB.Recordset")
set rs1 = Server.CreateObject("ADODB.Recordset")

my_Conn.Open ConnString

strSQL = "Select Topic_ID, T_Replies From Topics"
rs.Open strSQL, my_conn, 2, 2
i = 0 

Response.Write "<br> Updateing Topic Reply Count <br>"
do until rs.EOF
i = i + 1
	strSQL = "Select count(Reply_ID) AS cnt from Reply where topic_ID = "  &rs("Topic_ID")
	rs1.Open StrSQL, my_Conn
	if rs1.EOF or rs1.BOF then
		rs("T_Replies") = 0
		rs.Update
	Else
		rs("T_Replies") = rs1("cnt")
		rs.Update
	End if
	rs1.Close
	rs.MoveNext
	Response.Write "."
	if i = 80 then 
		Response.Write "<br>"
		i = 0
	End if
loop
rs.Close

Response.Write "<br> Updateing Forum Reply Count <br>"
StrSQL = "Select Forum_ID, F_Count From Forum"
rs.Open strSQL, my_conn, 2, 2

do until rs.EOF
	strSQL = "SELECT Sum(Topics.T_Replies) AS SumOfT_Replies, Count(Topics.T_Replies) AS cnt FROM Topics HAVING Topics.Forum_id = " & rs("Forum_ID")
	rs1.Open StrSQL, my_Conn
	if rs1.EOF or rs1.BOF then
		rs("F_Count") = 0
		rs.Update
	Else
		rs("F_Count") = rs1("cnt") + rs1("SumOfT_Replies")
		rs.Update
	End if
	rs1.Close
	rs.MoveNext
	Response.Write "."
	if i = 80 then 
		Response.Write "<br>"
		i = 0
	End if	
loop
rs.Close

Response.Write "<br> Updateing total Replys Count <br>"

strSQL = "SELECT Sum(Forum.F_Count) AS SumOfF_Count FROM Forum"
rs.Open strSQL, my_Conn

strSQL = "Update totals set P_Count = " & rs("SumOfF_Count")
my_conn.Execute strSQL
rs.Close

StrSQL = "SELECT Count(Member_ID) AS CountOf FROM Members"
rs.Open strSQl, my_conn

Response.Write RS("Countof") & " Registered Users <BR>"

strSQL = " Update totals set U_Count = " & cint(RS("Countof"))
my_conn.Execute strSQL

Response.Write "<br> All Done <br>"

on error resume next

rs.Close
rs1.Close
my_conn.Close
set rs = nothing
set rs1 = nothing
set my_conn = nothing
set rs = nothing
set rs1 = nothing

%>