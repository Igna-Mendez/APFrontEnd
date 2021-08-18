<%@LANGUAGE="VBSCRIPT" CODEPAGE="1252"%>
<!--#include file="../Connections/OraculoSemanal.inc" -->
<%
Set rsPoceados = Server.CreateObject("ADODB.Recordset")
rsPoceados.ActiveConnection = MM_OraculoSemanal_STRING
rsPoceados.Source = "select archivoMuestra from poceados where idPoceado = " + Request.QueryString("idPoceado")
rsPoceados.CursorType = 3
rsPoceados.CursorLocation = 2
rsPoceados.LockType = 1
rsPoceados.Open()

rsPoceados.movefirst
dim arhivoMuestra
archivoMuestra = rsPoceados("archivoMuestra")

rsPoceados.close
set rsPoceados = nothing
%>
<%
'Response.Write("./../Visualizaciones/"+Request.QueryString("archivoMuestra")+"?idPoceado="+Request.QueryString("idPoceado")+"&fechaSorteo="+Request.QueryString("fechaSorteo"))
%>
<%
'Response.Redirect("./../Visualizaciones/"+Request.QueryString("archivoMuestra")+"?idPoceado="+Request.QueryString("idPoceado")+"&fechaSorteo="+Request.QueryString("fechaSorteo"))
%>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Documento sin t&iacute;tulo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>

<iframe id="datamain" src="./../Visualizaciones/<%=archivoMuestra%>?idPoceado=<%=Request.QueryString("idPoceado")%>&fechaSorteo=<%=Request.QueryString("fechaSorteo")%>" width="100%" height="3720px" marginwidth="0" marginheight="0" hspace="0" vspace="0" frameborder="0" scrolling="no">
</iframe>

</body>
</html>
