<!--#INCLUDE FILE="config.inc" -->

<%
set my_conn= Server.CreateObject("ADODB.Connection")
set rs = server.CreateObject("ADODB.RecordSet")


function doCode(str, oTag, cTag, roTag, rcTag)
	tx = split(str, cTag)
	t = ""
	for i = 0 to ubound(tx)

	  if lcase(oTag) =  "[a]" then
		p = instr(1, tx(i), "[a]", 1) 
		if p <> 0 then
			tmp = mid(tx(i), p)
			url = mid(tmp, 4)
			if lcase(left(url, 5)) = "http:" then
				tmp1 = Replace(tmp, "[a]"&url, "<A href='" & url & "' Target=_Blank>Link</a>", 1, -1, 1)			
			else
				tmp1 = Replace(tmp, "[a]"&url, "<A href='http://" & url & "' Target=_Blank>Link</a>"	, 1, -1, 1)	
			end if
			t =t & Replace(tx(i), tmp, tmp1)
		else
			t = t & tx(i)
		end if
	  else
		cnt = instr(1,tx(i), oTag,1)
		select case cnt 
			case 0
				t=t&tx(i) & " " 
			case else 
				t = t & Replace(tx(i), oTag, roTag,1,1,1)
				t = t & " " & rcTag & " "
		end select
	  end if
	next
	doCode = t
end function

Function Smile(string)
	 String = replace(String, "[:)]", "<img src=""smile.gif"" width=15 height=15 align=middle>")
	 String = replace(String, "[:P]", "<img src=""tongue.gif"" width=15 height=15 align=middle>")	
	 String = replace(String, "[:(]", "<img src=""sad.gif"" width=15 height=15 align=middle>")	
	 String = replace(String, "[;)]", "<img src=""wink.gif"" width=15 height=15 align=middle>")	
	 Smile = String
End function

Sub DoCookies
	' ###   Sets cookies for the post form if asked for
	Response.Cookies("User")("Name")=  Request.Form("UserName")
	Response.Cookies("User")("Pword")= Request.Form("Password")
	Response.Cookies("User")("sig")= Request.Form("sig")
	Response.Cookies("User")("cookies")= Request.Form("cookies")
	Response.Cookies("User").Expires=  dateAdd("d", 30, now)
End Sub

Sub ClearCookies
	' ###   Sets cookies for the post form if asked for
	Response.Cookies("User") =""
	Response.Cookies("User").Expires= dateadd("d", -2, now)
End Sub

Sub DoCount
    ' ###  Updates the totals Table
    strSQl ="Update totals set totals.P_Count=totals.P_Count + 1"
    my_conn.Execute (strSQL)
End Sub

Sub UpdateUCount(user_name)
    ' ### Update Total Post for user
    StrSQL = "Update members set members.M_Posts=members.M_Posts + 1 where M_name = '" & user_name & "'"
    my_conn.Execute (StrSQL)
End sub

Sub DoEmail(email, user_name)

	urlloco = Request.ServerVariables("HTTP_HOST") 
	urlloco2 = Split (urlloco,".",-1,1)
	if urlloco2(0)="www" then
		urlloco=mid(urlloco,5)
	end if

    ' ###  Emails Topic Author if Requested.  
    ' ###  This needs to be edited to use your own email component
    ' ###  if you don't have one, try the w3Jmail component from www.dimac.net it's free!
    
    Set smtp = Server.CreateObject("Cdonts.NewMail")

	Recipients = email
	Sender = "foro@"&urlloco
	Subject = "ASP Forum - Reply to your posting"
	msg = "Hello " & user_name & vbcrlf & vbcrlf
	msg = msg & "You have received a reply to your posting on the ASP Resources Forum."
	msg = msg & "Regarding the subject - " & Request.Form("topic_title") & "." & vbcrlf & vbcrlf
	msg = msg & "You can view the reply at " & Request.Form("refer") & vbcrlf

	smtp.From = Sender
	smtp.To = Recipients
	smtp.Subject = Subject
	smtp.body = msg
	on error resume next '  Ignore Errors
	smtp.Send
	Set smtp = Nothing

End Sub

Function ChkString(str)
	 if str = "" then 
		str = " "
	 Else
		if BadWordFiler = "true" then
		  bwords = split(BadWords, "|")
		  for i = 0 to ubound(bwords)
			str= replace(str, bwords(i), string(len(bwords(i)),"*"), 1,-1,1) 
		  next
        End if
	 End If
	 
	 '  Do ASP Forum Code
	 str = doCode(str, "[b]", "[/b]", "<b>", "</b>")
	 str = doCode(str, "[i]", "[/i]", "<i>", "</i>") 
	 str = doCode(str, "[quote]", "[/quote]", "<BLOCKQUOTE><font size=1 face=arial>quote:<hr height=1 noshade>", "<hr height=1 noshade></BLOCKQUOTE></font><font face='" & DefaultFontFace & "' size=2>") 
	 str = doCode(str, "[a]", "[/a]", "<a>", "</a>")
	 str = doCode(str, "[code]", "[/code]", "<pre>", "</pre>")
	 
	 if smiles = "true" then str= smile(str)
	 
	 str = Replace(str, "'", "''")
	 str = Replace(str, "|", "/")
	 
	 ChkString = str
End Function


my_Conn.Open ConnString
err_msg =""
ok=""

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

'  This functio will return the permissions of the user or 0 if not a registered user!
'  0 = No User, 1=Author of post, 2=Normal User, 3=Moderator, 4=Admin
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
				case 2
					ChkUser = 4' Admin
				case else
					ChkUser = cint(rs_chk("M_Level"))
			End Select
				
		End If	
	End if
	rs_chk.close
	set rs_chk = nothing
End Function

Function GetSig(User_Name)
    strSQL = "Select M_Sig from members where M_Name = '" & Request.Form("UserName") & "'"
    set rsSig = my_conn.Execute (strSQL)
    GetSig = rsSig("M_Sig")
    rsSig.close
    set rsSig = nothing
End Function


Sub GO_Result(str_err_msg, boolOk) 
%>
<!--#INCLUDE FILE="top.inc" -->
<%
	if boolOk = true then
	DoCount
	UpdateUCount Request.Form("username")
%>
<body bgcolor="#FFFFFF" text="#000000" link="#000000" vlink="#000000" alink="#000000">
<center>
<font face="<% =DefaultFontFace %>" size="3">
<p>Mensaje grabado!</p>
<p>Gracias por su contribución</p>
<a href="<%= Request.Form("refer")%>">Volver al Foro</a>
</font></center>
</body>
</html>
<%	
		Response.End
	Else
%>
<center>
<font face="<% =DefaultFontFace %>" size="3">
<p>Se ha encontrado un problema! :-</p>
<p><font color=red><%= str_err_msg %></p>
<p>Vuelva atrás para corregir este problema.</p>
</font>
</center>
</body>
</html>
<%		Response.End
	End If

End Sub

if Request.Form("cookies") = "yes" then 
	DoCookies
Else
	ClearCookies
End if


if Request.Form("method_type") = "edit" then
	member = cint(ChkUser(Request.Form("username"), Request.Form("password")))
	
	Select Case Member 
		case 0
			' Invalid Pword
			GO_Result "Usuario o contraseña inválida.", false
			Response.End
		case 1
			' Author of Post so OK
		case 2
			' Normal User - Not Authorised
			GO_Result "Este mensaje solo puede ser modificado por el Autor, los Administradores o el Operador.", false
			Response.End
		case 3
			' Moderator so OK
			' heck the moderator of this forum
			if ForumModerator(Request.Form("Forum_id"), Request.Form("username")) = "False" then
				GO_Result "Este mensaje solo puede ser modificado por el Autor, los Administradores o el Operador.", false
			end if
		case 4
			' Admin so OK
		case Else 
			GO_Result cstr(Member), false
			Response.End
	End Select
	
	'#  Do DB Update

	txtMessage = Request.Form("Message") & vbcrlf & vbcrlf & "Editado por "& Request.Form("UserName") & ", fecha " & now()
	strSql = "update reply set R_Message = '" & chkString(server.htmlencode(txtMessage)) & "' where Reply_ID=" & Request.Form("reply_id")
	my_conn.Execute (StrSql)
	
	'# Update Last Post
	strSql = "update forum set F_Last_Post = #" & now() & "# where Forum_ID = " & Request.Form("forum_id")
	my_conn.Execute (StrSql)
	 err_msg= ""
	if Err.description <> "" then 
		GO_Result "Se ha encontrado el siguiente error: " & Err.description, false
		Response.End
	Else
		Go_Result  "Actualización OK", true
		
	End If
	
	strSql = "update topics set T_Last_Post = #" & now() & "# where Topic_ID = " & Request.Form("topic_id")
	my_conn.Execute (StrSql)
	 err_msg= ""
	if Err.description <> "" then 
		GO_Result "Se ha encontrado el siguiente error: " & Err.description, false
		Response.End
	Else
		Go_Result  "Actualización OK", true
		Response.End
	End If
	
End if

'####
if Request.Form("method_type") = "editTopic" then
	
	member = cint(ChkUser(Request.Form("username"), Request.Form("password")))
	
	Select Case Member 
		case 0
			' Invalid Pword
			GO_Result "Usuario o contraseña inválida.", false
			Response.End
		case 1
			' Author of Post so OK
		case 2
			' Normal User - Not Authorised
			GO_Result "Este mensaje solo puede ser modificado por el Autor, los Administradores o el Operador.", false
			Response.End
		case 3
			' Moderator so 
			if ForumModerator(Request.Form("Forum_id"), Request.Form("username")) = "False" then
				GO_Result "Este mensaje solo puede ser modificado por los Administradores y el Operador.", false
			end if			
		case 4
			' Admin so OK
		case Else 
			GO_Result cstr(Member), false
			Response.End
	End Select
	
	'#  Do DB Update

	txtMessage = Request.Form("Message") & vbcrlf & vbcrlf & "Editado por "& Request.Form("UserName") & ", fecha " & now()
	strSql = "update Topics set T_Message = '" & chkString(server.htmlencode(txtMessage)) & "' where Topic_ID=" & Request.Form("reply_id")
	my_conn.Execute (StrSql)
	

	 err_msg= ""
	if Err.description <> "" then 
		GO_Result "Se ha encontrado el siguiente error: " & Err.description, false
		Response.End
	Else
		Go_Result  "Actualización OK", true
		
	End If
	
End if

' #####


if lcase(Request.Form("method_type")) = "topic" then

	strSql ="SELECT Member_id, M_level,M_Email, M_Name, M_Password from Members where M_Name = '" & Request.Form("UserName") & "' and M_Password = '" & Request.Form("Password") &"'"
	set rs = my_conn.Execute (StrSql)
	 
	if rs.BOF or rs.EOF then
		'#  Invalid Password
		GO_Result "Usuario o contraseña inválida.", false
		Response.End
	Else
	   if Request.Form("Message") = "" then
        GO_Result "Debe dejar un mensaje.", false
        Response.End
       End if
	   if Request.Form("TopicSubject") = "" then
		 GO_Result "Debe especificar el asunto del mensaje.", false
		 Response.End
	   End if         
       
        Strmsg =  chkString(server.htmlencode(Request.Form("Message")))
        if Request.Form("sig") = "yes" then
             strmsg = strmsg & vbcrlf & vbcrlf & GetSig(Request.Form("UserName"))
        End if
        
        if Request.Form("rmail") <> "true" then
			TF  = "False"
		Else 
			TF = "true"
        End if
	
		strSql = "insert into topics (forum_id, T_Subject, T_Message, T_Originator, T_Mail) Values ("
		strSql = StrSql & Request.Form("forum_id") & ", '"
		strSql = StrSql & trim(chkString(server.htmlencode(Request.Form("TopicSubject")))) & "', '"
		strSql = StrSql & Strmsg & "', "
		strSql = StrSql & rs("Member_ID") & ", "
		strSql = StrSql & TF & ")"
		my_conn.Execute (StrSql)
		
		if Err.description <> "" then 
			err_msg = "Se ha encontrado el siguiente error: " & Err.description
		Else
			err_msg =  "Actualización OK"
		End IF
	'# Update Last Post and count
	strSql = "update forum set F_Last_Post = #" & now() & "#, F_Count = F_Count +1 where Forum_ID = " & Request.Form("forum_id")
	my_conn.Execute (StrSql)
	
	GO_Result err_msg, true
	Response.End
	End If	
End if


if Request.Form("method_type") = "reply" then

strSql ="SELECT Member_id, M_level, M_Name, M_Email, M_Password from Members where M_Name = '" & Request.Form("UserName") & "' and M_Password = '" & Request.Form("Password") &"'"
set rs = my_conn.Execute (StrSql)
if rs.BOF or rs.EOF then
	'#  Invalid Password
	err_msg = "Usuario o contraseña inválida."
	GO_Result(err_msg), false
	Response.End
Else
   if Request.Form("Message") = "" then
    GO_Result "No ha ingresado el mensaje!", false
    Response.End
   End if
   
    Strmsg =  chkString(server.htmlencode(Request.Form("Message")))
    if Request.Form("sig") = "yes" then
        strmsg = strmsg & vbcrlf & vbcrlf & GetSig(Request.Form("UserName"))
    End if   
   
	strSql = "insert into reply (topic_id, r_posted_by, r_message) Values ("
	strSql = StrSql & Request.Form("topic_id") & ", "
	strSql = StrSql & rs("Member_ID") & ", '"
	strSql = StrSql & Strmsg & "')"
	my_conn.Execute (StrSql)
		
	'# Update Last Post and count
	strSql = "update topics set T_Last_Post = #" & now() & "#, T_Replies = T_Replies +1 where Topic_ID = " & Request.Form("topic_id")
	my_conn.Execute (StrSql)
	
	strSql = "update forum set F_Last_Post = #" & now() & "#, F_Count = F_Count +1 where Forum_ID = " & Request.Form("forum_id")
	my_conn.Execute (StrSql)

	if Err.description <> "" then 
		GO_Result  "Se ha encontrado el siguiente error: " & Err.description, false
		Response.End
	Else
		if lcase(Request.Form("M")) = "true" then 
			strSQL  = " SELECT Members.M_Name, Members.M_Email FROM Members INNER JOIN " & _ 
			   " Topics ON Members.Member_id = Topics.T_Originator WHERE Topics.Topic_ID= " & Request.Form("topic_ID")
			set rs2 = my_conn.Execute (strSQL)
			DoEmail  rs2("M_Email"), rs2("M_Name")
			rs2.close
			set rs2 = nothing
		End if
		GO_Result  "Actualización OK", True
		Response.End
     End if
End if


end if


my_conn.Close 
set my_conn = nothing
set rs = nothing
%>




