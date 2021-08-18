<!--#INCLUDE FILE="config.inc" -->
<%


'##     Default.asp

'##     Abre la conexion de la base de datos

set my_conn= Server.CreateObject("ADODB.Connection")
my_Conn.Open ConnString


'##    Obtengo los datos totales
set rs1 = Server.CreateObject("ADODB.Recordset")
strSQL = "Select * from Totals"
rs1.open strSQL, my_conn

If rs1.eof then%>
	<!--#INCLUDE FILE="top.inc" -->
	<%Response.Write "Deberas Registrarte Primero ya que la base esta VACIA!!!!"&"<br>"
	Response.Write "Y luego agregar algun tema!!!"
	Response.end
end if

Users = rs1("U_Count")
Posts = rs1("P_Count")

rs1.Close
set rs1 = nothing

'##    Obtengo todos los Foros de la base
strSql = "SELECT * FROM Category"
set rs = my_conn.Execute (StrSql)

'## Corroboro las Coockies
session("last_here_date") = Request.Cookies("date")
Response.Cookies("Date") = now()
Response.Cookies("Date").Expires = dateadd("d",365,now())

' Si nunca ha estado aqui antes , seteo last_here_date to -10 dias
if Session("last_here_date") = "" then
	Session("last_here_date") = dateadd("d",-10,now())
End if

'## Funcion que muestra un icono nuevo
Function isNew(dt)
	if datediff("s", session("last_here_date"), dt) > 1 then
		isNew =  "<font face='" & DefaultFontFace & "' color='" & NewFontColor & "' size='1'>New" 
	Else
		isNew = "&nbsp;" 
	End If
End Function
%>
<!--#INCLUDE FILE="top.inc" -->
<body bgcolor="#FFFFFF" text="#000000" link="#000000" vlink="#000000" alink="#000000">
<table width="100%" border =0><tr><td><font face="<% =DefaultFontFace %>" size="1">
Su última visita - <%= session("last_here_date")%>
</td><td align=right><font face="<% =DefaultFontFace %>" size="1">Cantidad de mensajes : <%= Posts %> , Cantidad de Usuarios : <%= Users %> &nbsp;&nbsp;</font></td></tr>
</table>
<div align="center"><center>

<table border="0" width="95%" cellspacing="2" cellpadding="0">
  <tr>
    <td align="center" bgcolor="<% =HeadCellColor %>"><strong>&nbsp;</td>
    <td align="center" bgcolor="<% =HeadCellColor %>"><strong>
    <font face="<% =DefaultFontFace %>" size="2" color="<% =HeadFontColor %>">Foro</font></strong></td>
    <td align="center" bgcolor="<% =HeadCellColor %>"><strong>
    <font face="<% =DefaultFontFace %>" size="2" color="<% =HeadFontColor %>">Mensajes</font></strong></td>
    <td align="center" bgcolor="<% =HeadCellColor %>"><strong>
    <font face="<% =DefaultFontFace %>" size="2" color="<% =HeadFontColor %>">Ultimo mensaje</font></strong></td>
    <td align="center" bgcolor="<% =HeadCellColor %>"><strong>
    <font face="<% =DefaultFontFace %>" size="2" color="<% =HeadFontColor %>">Operador</font></strong></td>
  </tr>
<% 
If rs.Eof or rs.Bof then  ' No se encontro ninguna categoria
	Response.Write "<tr><td collspan=5>No se han encontrado Foros</td></tr>"
Else
	do until rs.eof '## Clip de la categoria
	
	 '##  Muestro la categoria
	 Response.Write "<tr><td colspan=5 bgcolor='" & CategoryCellColor & "'><font face='" & DefaultFontFace & "' size='2' color='" & CategoryFontColor & "' size+1> <strong>"& rs("cat_name") & " </strong></font></td></tr>"
	 '##  Construir el SQL para obtener los foros por categorias
	 strSql = "SELECT Forum.Forum_ID, Forum.F_Name, Forum.F_Description, Forum.F_Cat, Forum.F_Count, Forum.F_Last_Post, Forum.F_Moderator, Members.M_Name "
	 strSql = strSql & "FROM Members INNER JOIN Forum ON Members.Member_id = Forum.F_Moderator "
	 strSql = strSql & "where Forum.F_Cat = " & rs("cat_id")
	
	 set rsForum =  my_conn.Execute (StrSql)
	 
	 if rsForum.eof or rsForum.bof then
		Response.Write "<tr><td collspan=5>&nbsp;</td></tr>"
	 else
		do until rsForum.Eof '## Muestra el Foro
		  Response.Write "<tr>" & vbcrlf
		  Response.Write "<td bgcolor='" & ForumCellColor & "'>" & isNew(rsForum("F_Last_Post")) & "</td>"& vbcrlf
		  Response.Write "<td bgcolor='" & ForumCellColor & "'><font face='" & DefaultFontFace & "' size=2><a href='forum.asp?forum_id=" & rsForum("Forum_ID") & "&forum_title=" & server.URLEncode(rsForum("F_name")) & "'>"
		  Response.Write rsForum("F_name") & "</a><br>" & vbcrlf
		  Response.Write "<font color='" & ForumFontColor & "' face='" & DefaultFontFace & "' size='2'>" & rsForum("F_Description") & "</font></td>" & vbcrlf
		  Response.Write "<td bgcolor='" & ForumCellColor & "' align='center' valign='top' ><font face='" & DefaultFontFace & "' color='" & ForumFontColor & "' size='2'>" & rsForum("F_Count") & "</font></td>" & vbcrlf
		  Response.Write "<td bgcolor='" & ForumCellColor & "' align='center' valign='top'><font face='" & DefaultFontFace & "' color='" & ForumFontColor & "' size='2'>" & rsForum("F_Last_Post") & "</font></td>" & vbcrlf
		  Response.Write "<td bgcolor='" & ForumCellColor & "' valign='top'><font face='" & DefaultFontFace & "' color='" & ForumFontColor & "' size='2'>" & rsForum("M_Name") & "</font></td>"
	      Response.Write "</tr>" & vbcrlf
	      rsForum.movenext
	      
		loop
	 End If
	rs.MoveNext
	loop
End If
%>
  
  </table>           
  <p align="center"> <font face="<% =DefaultFontFace %>" size="3"><a href="default.asp">Mostrar todos los Foros</a></p>       
            
            
            
            
 </body></html>
<%
my_conn.Close
set my_conn = nothing

set rs = nothing
set rsForum = nothing

%>
