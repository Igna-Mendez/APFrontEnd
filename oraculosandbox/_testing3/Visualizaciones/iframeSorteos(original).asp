<%@LANGUAGE="VBSCRIPT" CODEPAGE="1252"%>
<%response.Expires = 0%>
<!--#include file="../Connections/OraculoSemanal.inc" -->
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Documento sin t&iacute;tulo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<iframe name="datamain" id="datamain"  src="./verSorteos.asp?idQuiniela=<%=Request.Querystring("idQuiniela")%>" width="800px" height="200px" marginwidth="0" marginheight="0" hspace="0" vspace="0" frameborder="0" scrolling="no"></iframe>
</body>
</html>
