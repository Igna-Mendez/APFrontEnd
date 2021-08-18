<%
'Aqui conectamos al archivo txt donde sacaremos la cantidad de visitas.
Set oFso = CreateObject("Scripting.FileSystemObject") 
contadortxt = Server.MapPath("/cgi-bin/textcountsp/contador.txt")
Set oFile = oFso.OpenTextFile(contadortxt,1,False)

'Leemos el numero que contiene en el txt
oldNum = CLng(oFile.ReadLine)

'lo cerramos
oFile.Close

'Sumamos una unidad al nuemero previamente obtenido del txt.
oldNum = oldNum + 1

'Abrimos el archivo para escritura.
contadortxt = Server.MapPath("/cgi-bin/textcountsp/contador.txt")
Set oFile = oFso.OpenTextFile(contadortxt,2,true)

'Sobreescribimos el numero de visitas.
oFile.WriteLine(oldNum)

'Cerramos el archivo nuevamente.
oFile.Close

'Ahora utlizamos el numero para mostrarlo.
strCount = oldNum
%>

<div align="center">
<center>
<table border="0">
<tr>
<td width="100%" align="center">Nro. Visitante</td>
</tr>
<tr>
<td width="100%" align="center"><%=strCount%></td>
</tr>
</table>
</center>
</div>


