<!--#INCLUDE FILE="config.inc" -->
<!--#INCLUDE FILE="top.inc" -->

<%
set my_conn= Server.CreateObject("ADODB.Connection")
set rs = Server.CreateObject("ADODB.RecordSet")
my_Conn.Open ConnString

StrSql = "Select * From Members Where Member_ID = "  & Request.QueryString("ID")

rs = my_conn.Execute (StrSQl)

%>
<body bgcolor="#FFFFFF" text="#000000" link="#000000" vlink="#000000" alink="#000000">
<font face="<% =DefaultFontFace %>" size=3>
<center>
<p>Click to send <a href="mailto:<%= rs("m_email")%>"><%= rs("M_name")%></a> an email</p>
<font size=2>
<p><a href="javascript:history.go(-1)">Back To Forum</a></p>
</font>
</center>
</body>

<%

set rs = nothing
my_conn.Close
set my_conn = nothing

%>