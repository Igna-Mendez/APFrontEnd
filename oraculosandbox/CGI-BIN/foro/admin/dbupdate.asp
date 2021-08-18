<!--#INCLUDE FILE="config.inc" -->

<%
server.ScriptTimeout = 6000

set my_conn= Server.CreateObject("ADODB.Connection")
set rs = Server.CreateObject("ADODB.Recordset")
set rs1 = Server.CreateObject("ADODB.Recordset")

my_Conn.Open ConnString

strSQL = "Alter table members ADD COLUMN M_ICQ Text(15)"
my_Conn.Execute strSQL	

StrSQl = "Alter table members ADD COLUMN M_Posts Integer"
my_Conn.Execute strSQL

strSQL = "Update Members set M_Posts = 0"
my_Conn.Execute strSQL
Response.Write "members table Updated <br><br>" 


StrSQl = "Alter table topics ADD COLUMN T_Mail bit"
my_Conn.Execute strSQL
Response.Write "members table Updated <br><br>" 

strSQL = "Create Table Totals (P_count Integer, U_Count Integer)"
my_Conn.Execute strSQL
Response.Write "Totals table Created <br><br>" 


strSQL = "Select Member_ID, M_Posts From Members Order by Member_ID"
rs.Open strSQL, my_conn, 2, 2

Response.Write "Calculating Total Posts "
total = 0
i = 0
do until rs.EOF
i = i + 1
cnt = 0
 strSQL = "SELECT Reply.R_Posted_By, Count(Reply.R_Posted_By) AS CntOf FROM Reply GROUP BY Reply.R_Posted_By HAVING (Reply.R_Posted_By)= " & cint(rs("Member_ID"))
 rs1.Open strSQL, my_conn	
 if rs1.EOF or rs1.BOF then 
	'
 Else 
	cnt = rs1("cntOf")
 End if
 rs1.Close
 strSQL = "SELECT Topics.T_Originator, Count(Topics.T_Originator) AS CntOf FROM Topics GROUP BY Topics.T_Originator HAVING (Topics.T_Originator)= " & cint(rs("Member_ID"))
 rs1.Open strSQL, my_conn
 if rs1.EOF or rs1.BOF then 
	'
 Else 
	cnt = cnt + rs1("cntOf")
 End if
 rs1.Close
 rs("M_Posts") = cnt
 total = total + cnt
 rs.Update
 rs.movenext
 Response.Write "."
 if i = 70 then 
	i = 0
	Response.Write "<br>"
 end if
loop
rs.Close
Response.Write "<br>Done! " & total  & " Posts in Total <br>"

StrSQL = "Delete * From Totals"
my_conn.Execute strSQL

strSQL = "Insert into totals (P_Count) Values ( " & cint(total) & ")"
my_Conn.Execute strSQL

StrSQL = "SELECT Count(Member_ID) AS CountOf FROM Members"
rs.Open strSQl, my_conn

Response.Write RS("Countof") & " Registered Users <BR>"

strSQL = " Update totals set U_Count = " & cint(RS("Countof"))
my_conn.Execute strSQL

%>