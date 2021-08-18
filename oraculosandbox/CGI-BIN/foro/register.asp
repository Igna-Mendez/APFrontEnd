<%
Sub DoCount
    ' ###  Actualizo todas las tablas
    strSQl ="Update totals set totals.U_Count=totals.U_Count + 1"
    my_conn.Execute (strSQL)
End Sub


Sub ShowForm()
%>
<body bgcolor="#FFFFFF" text="#000000" link="#000000" vlink="#000000" alink="#000000">
<center>
<form action="register.asp?mode=doit" method="post">
<font face="<% =DefaultFontFace %>">
<p><font size=4>Registración para <% =BBTitle %></font></p>

<!--#INCLUDE FILE="profile.inc" -->

<% End Sub %>

<!--#INCLUDE FILE="config.inc" -->
<!--#INCLUDE FILE="top.inc" -->

<%
If Request.QueryString("mode") <> "doit" then
	Call ShowForm
Else

	Function ChkString(string)
		if string = "" then string = " "
		ChkString = Replace(string, "'", "''")
	End Function

	Err_Msg = ""
	if Request.Form("name") = "" then Err_Msg = Err_Msg & "<li>No ha ingresado el nombre de usuario.</li>"
	if Request.Form("password") = "" then Err_Msg = Err_Msg &  "<li>No ha ingresado la contraseña.</li>"
	if Request.Form("password") <>  Request.Form("password2") then Err_Msg = Err_Msg & "<li>Las contraseñas no coinciden.</li>"
	if Request.Form("email") = "" then Err_Msg = Err_Msg & "<li>No ha ingresado su dirección de Email.</li>"

	

		set my_conn= Server.CreateObject("ADODB.Connection")
		my_Conn.Open ConnString
	
		strSql = "Select M_Name from members where M_Name = '" & Request.Form("name") &"'"
		set rs = my_conn.Execute (StrSql)

		if rs.bof and rs.eof then 
			' OK
		Else 
			Err_Msg = Err_Msg & "<li>El usuario ingresado ya existe.</li>"
		End If
		rs.close
		set rs = nothing
	
		if Err_Msg = "" then
	
		 strSql = "insert into members  (M_Name, M_Password, M_Email, M_Country, M_Sig, M_ICQ, M_Posts, M_Homepage) Values ('"
		 strSql = StrSQl & ChkString(Request.Form("name")) & "', '"
		 strSql = StrSQl & ChkString(Request.Form("password")) & "', '"
		 strSql = StrSQl & ChkString(Request.Form("email")) & "', '"
		 strSql = StrSQl & ChkString(Request.Form("country")) & "', '"
		 strSql = strSQL & ChkString(Request.Form("sig")) & "', '"
		 strSql = strSQL & ChkString(Request.Form("ICQ")) & "', "
		 strSql = strSQL & "0, '"
		 strSql = StrSQl & ChkString(Request.Form("homepage")) & "')"

		 my_conn.Execute (StrSql)
		 docount
		Else
	
%>
<center>
<font face="<% =DefaultFontFace %>" size=4>
<p>Se encontró uno o más problemas al procesar sus datos:</p>

<ul>
<%= Err_Msg %>
</ul>
</center>
<%

		call ShowForm
		On Error Resume next
	    my_conn.Close
		set my_conn = nothing
		Response.End
		End If


%>
<font face="<% =DefaultFontFace %>" size=4>
<center>
<p>Su registración ha sido Exitosa</p>
<font size=3><a href="javascript:history.go(-2)">Volver al Foro</a></font>
</center>
</font>
<%
End If
On Error Resume next
my_conn.Close
set my_conn = nothing

%>
    
    
    </BODY></HTML>
