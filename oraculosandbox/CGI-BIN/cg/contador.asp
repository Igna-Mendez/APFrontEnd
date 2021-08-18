<%
'Creamos la conexión al archivo
Set Fso = CreateObject("Scripting.FileSystemObject") 

contadortxt = Server.MapPath("/cgi-bin/cg/contador.txt")

Set FileRead = Fso.OpenTextFile(contadortxt,1,False)
'Leemos el archivo, y guardamos en la variable contador el valor que contiene el archivo
contador = FileRead.ReadLine 

Set FileWrite = Fso.OpenTextFile(contadortxt,2,false)
'Aumentamos el contador y escribimos el nuevo resultado en el archivo
contador = contador + 1
FileWrite.WriteLine (contador) 

'Cerramos los objetos y conexión
FileWrite.Close
FileRead.Close
Set FileWrite = Nothing 
Set FileRead = Nothing 
Set Fso = Nothing 

'Especificamos que nuestro contador tenga 6 digitos
cantdigitos = 6

'Comprobamos la cantidad de caracteres del contador
cantcont = Len(contador) 
For i = 1 to cantdigitos - cantcont
    contador = "0" & contador 
Next 
'Hacemos un bucle de 1 a 6 (o la cantidad de digitos que se especifico mas arriba)
'Y guardamos cada digito en la variable cantidad
For i = 1 to cantdigitos 
	numero = Mid(contador,i,1) 
'	cantidad = cantidad & "<img src='"& numero & ".gif'>"
	cantidad = cantidad & "<img src='/cgi-bin/cg/" & numero & ".gif'>"
Next
%>
<p align="center"><font face="verdana" size="2">Visitante Nº<br><%=cantidad%></font></p>