<%@LANGUAGE="VBSCRIPT" CODEPAGE="1252"%>
<%
If Request.QueryString("error") <> "" Then
Dim mError
mError = Request.QueryString("error")



%>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title><%=MM_NombreEvento%></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<form name="frError" id="frError" action="">
<p class="textocuerpo"><%=mError%></p>
<center><button name="btVolver" onClick="history.back()" class="boton">Volver</button></center>
</form>
</body>
</html>
<%
End If
%>