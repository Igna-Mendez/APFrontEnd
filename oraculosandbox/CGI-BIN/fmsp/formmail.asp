<%  
'Obtengo los datos del dominio

url = Request.ServerVariables("HTTP_HOST") 
url2 = Split (url,".",-1,1)
if url2(0)="www" then
	url=mid(url,5)
end if
Response.Write url
	

mailComp = "CDONTS"
smtpServer = "smtp."&url
fromAddr = "formmail@"&url
   


    Response.Buffer = true
    errorMsgs = Array()

    'Checkeo de datos recibidos.

    if Request.ServerVariables("Content_Length") = 0 then
      call AddErrorMsg("No form data submitted.")
    end if

    'Checkeo del campo recipients.

    if Request.Form("_recipients") = "" then
      call AddErrorMsg("Missing email recipient.")
    end if

    'Checkeo todos los correos

    recipients = Split(Request.Form("_recipients"), ",")
    for each name in recipients
      name = Trim(name)
      if not IsValidEmail(name) then
        call AddErrorMsg("Correo invalido en el campo recipients: " & name & ".")
      end if
    next
    recipients = Join(recipients, ",")

    'Obtengo la direccion de Reply.

    name = Trim(Request.Form("_replyToField"))
    if name <> "" then
      replyTo = Request.Form(name)
    else
      replyTo = Request.Form("_replyTo")
    end if
    if replyTo <> "" then
      if not IsValidEmail(replyTo) then
        call AddErrorMsg("Correo invalido en el campo reply-to: " & replyTo & ".")
      end if
    end if

    'Obtengo el texto del asunto.

    subject = Request.Form("_subject")

    

    if Request.Form("_requiredFields") <> "" then
      required = Split(Request.Form("_requiredFields"), ",")
      for each name in required
        name = Trim(name)
        if Left(name, 1) <> "_" and Request.Form(name) = "" then
        call AddErrorMsg("Missing value for " & name)
        end if
      next
    end if

    
    if Request.Form("_fieldOrder") <> "" then
      fieldOrder = Split(Request.Form("_fieldOrder"), ",")
      for each name in fieldOrder
        name = Trim(name)
      next
    else
      fieldOrder = FormFieldList()
    end if

    'Si no hay errores preparo el correo para el envio.

    if UBound(errorMsgs) <  0 then

      'Realizo la tabla con los campos y los valores.

      body = "<table border=0 cellpadding=2 cellspacing=0>" & vbCrLf
      for each name in fieldOrder
        body = body _
             & "<tr valign=top>" _
             & "<td><font face=""Arial,Helvetica"" size=2><b>" _
             & name _
             & ": </b></font></td>" _
             & "<td><font face=""Arial,Helvetica"" size=2>" _
             & Request.Form(name) _
             & "</font></td>" _
             & "</tr>" & vbCrLf
      next
      body = body & "</table>" & vbCrLf

      'Agrego una tabla con las variables desarrolladas/

      if Request.Form("_envars") <> "" then
        body = body _
             & "<p>" _
             & "<table border=0 cellpadding=2 cellspacing=0>" & vbCrLf
        envars = Split(Request.Form("_envars"), ",")
        for each name in envars
          name = Trim(name)
          body = body _
               & "<tr valign=top>" _
               & "<td><font face=""Arial,Helvetica"" size=2><b>" _
               & name _
               & ": </b></font></td>" _
               & "<td><font face=""Arial,Helvetica"" size=2>" _
               & Request.ServerVariables(name) _
               & "</font></td>" _
               & "</tr>" & vbCrLf
        next
        body = body & "</table>" & vbCrLf
      end if

      'Send it.

      str = SendMail()
      if str <> "" then
        AddErrorMsg(str)
      end if

      'Redirecciono a la pagina de agradecimiento si fue indicada.

      if Request.Form("_redirect") <> "" then
        Response.Redirect(Request.Form("_redirect"))
      end if

    end if %>

<html>
<head>
<title>Correo de Suscripción</title>
</head>
<body bgcolor="#ffffff">
<font face="Arial,Helvetica" size=2>

<center>
<%  if UBound(errorMsgs) >= 0 then %>
<table border=0><tr><td><font color="#cc0000" face="Arial,Helvetica" size=2><b>
El formulario no pudo ser procesado por los siguientes errores:
<p>
<ul>
<%    for each msg in errorMsgs %>
   <li><%  = msg %>
<%    next %>
</b></font></td></tr></table>
<%  else %>
<table bgcolor="#000000" border=0 cellpadding=1 cellspacing=0 width=450><tr><td>
<table border=0 cellpadding=4 cellspacing=1 width="100%">
<tr bgcolor="#cccccc" valign=bottom>
   <th colspan=2><font face="Arial,Helvetica" size=2>
   Gracias, la siguiente informacion ha sido enviada:
   </font></th>
</tr>
<%    for each name in fieldOrder %>
<tr bgcolor="#ffffff" valign=top>
   <td><font face="Arial,Helvetica" size=2><b><%  = name %> </b></font></td>
   <td><font face="Arial,Helvetica" size=2><%  = Request.Form(name) %> </font></td>
</tr>
<%    next %>
</table>
</td></tr></table>
<%  end if %>
<p>
<a href="<%  = Request.ServerVariables("HTTP_REFERER") %>">Volver</a>
</center>

</font>
</body>
</html>

<%  sub AddErrorMsg(msg)

      dim n

     'Agrego un error a la lista de mensajes.

      n = UBound(errorMsgs)
      Redim Preserve errorMsgs(n + 1)
      errorMsgs(n + 1) = msg

    end sub

    function SendMail()

      dim mailObj

      
      SendMail = ""

      'Envio el correo por el componente CDONTS
      
      if mailComp = "CDONTS" then
        set mailObj = Server.CreateObject("CDONTS.NewMail")
        mailObj.BodyFormat = 0
        mailObj.MailFormat = 0
        mailObj.From = fromAddr
        mailObj.To = recipients
        mailObj.Subject = subject
        mailObj.Body = body
        mailObj.Send
      end if

      
    end function


    function IsValidEmail(email)

      dim names, name, i, c

      'Chequeo la direccion de correo.

      IsValidEmail = true
      names = Split(email, "@")
      if UBound(names) <> 1 then
        IsValidEmail = false
        exit function
      end if
      for each name in names
        if Len(name) <= 0 then
          IsValidEmail = false
          exit function
        end if
        for i = 1 to Len(name)
          c = Lcase(Mid(name, i, 1))
          if InStr("abcdefghijklmnopqrstuvwxyz_-.", c) <= 0 and not IsNumeric(c) then
            IsValidEmail = false
            exit function
          end if
        next
        if Left(name, 1) = "." or Right(name, 1) = "." then
          IsValidEmail = false
          exit function
        end if
      next
      if InStr(names(1), ".") <= 0 then
        IsValidEmail = false
        exit function
      end if
      i = Len(names(1)) - InStrRev(names(1), ".")
      if i <> 2 and i <> 3 then
        IsValidEmail = false
        exit function
      end if
      if InStr(email, "..") > 0 then
        IsValidEmail = false
      end if

    end function

    function FormFieldList()

      dim str, i, name

      str = ""
      for i = 1 to Request.Form.Count
        for each name in Request.Form
          if Left(name, 1) <> "_" and Request.Form(name) is Request.Form(i) then
            if str <> "" then
              str = str & ","
            end if
            str = str & name
            exit for
          end if
        next
      next
      FormFieldList = Split(str, ",")

    end function %>
