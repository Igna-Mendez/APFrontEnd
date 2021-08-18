<%
set fs=Server.CreateObject("Scripting.FileSystemObject")
b=Request.ServerVariables("SERVER_NAME")
b= split(b,".",-1,1)
If b(0)="www" then
	dir=b(1)
	else 
	dir=b(0)
end if	
a= Server.MapPath("./")
a=a&"\admin\USUARIOS\"&dir&"\"
set f=fs.GetFolder (a)
set fd=f.files
%><BODY BGCOLOR="#ffffff">
<CENTER>
<P>
<P>
<table WIDTH=125 BORDER=0 CELLSPACING=0>
<tr> 
  <td width="100%" valign="top" align="middle" bgcolor="#0066cc" 
    height="20"><strong><font color="#ffffff" size="2" face="Verdana, Arial">
<A NAME="NEWSLETTER">
ToWebs Mailing List Manager
</font></strong></A></td>
</tr>
<tr> 
 <td valign="top" bgcolor="#99ccff" width="100%" >
  <font face="Arial, Helvetica" size="1"><font color="#000000">
  <FORM ACTION="subscribe.asp" METHOD="post">
 <CENTER>
 <select name="selec">
<%a=a&"\admin\USUARIOS\"&dir&"\"
for each y in fd
	p= y.name 
	p1=split(p,".",-1,1)	
	pp=p1(1)%>
<%if pp="lst" then%>	
<option value="<%=p%>" selected><%=p%></option>
<%End if
Next%>
</select>
</CENTER>
  <INPUT TYPE="radio" NAME="action" VALUE="subscribe" checked>Suscribir<BR>
<CENTER>
  <INPUT NAME="email" VALUE="Su-email" SIZE=10 MAXLENGTH=100 ><BR>
  <INPUT TYPE="hidden" NAME="datafile" VALUE="subscribe">
  <INPUT TYPE="submit" VALUE="Aceptar!"><BR>
  </CENTER></FORM>
           </font>
           </font>
   </td>
 </tr>
</table>

<CENTER>
 

  </TD>
 </TR>
</TABLE>

</CENTER></CENTER></BODY></HTML>
