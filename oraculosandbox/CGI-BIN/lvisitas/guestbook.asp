<BODY bgColor=#33aacc>
<%
Const bDeleteEntries = True

Dim bForce
bForce = Request.QueryString("force")

Dim strFile 

strFile = Server.MapPath("./guestbook.txt")

If Request.Form.Count = 0 Then
	' Display the entry form.
	%>
	<center><H1><u>Libro de visitas</u></H1></center>
	<FORM ACTION="guestbook.asp" METHOD="post">
	<TABLE>
		<TR>
		<TD ALIGN="right"><B>Nombre:</B></TD>
		<TD><INPUT TYPE="text" NAME="name" SIZE="15"></INPUT></TD>
		</TR>
		<TR>
		<TD ALIGN="right"><B>Comentario:</B></TD>
		<TD><INPUT TYPE="text" NAME="comment" SIZE="35"></INPUT></TD>
		</TR>
	</TABLE>
	<INPUT TYPE="submit" VALUE="Firmar el libro de visitas!"></INPUT>
	</FORM>

	<BR>

	<H3>Comentarios del día:</H3>
	<!-- Instead of doing this in script, I simply include
			the guestbook file as is -->
	<!--#INCLUDE FILE="./guestbook.txt"-->
	<%
Else
	' Log the entry to the guestbook file
	Dim objFSO  'FileSystemObject Variable
	Dim objFile 'File Object Variable
	
	' Create an instance of the FileSystemObject
	Set objFSO = Server.CreateObject("Scripting.FileSystemObject")
	' Open the TextFile (FileName, ForAppending, AllowCreation)
	Set objFile = objFSO.OpenTextFile(strFile, 8, True)

	' Log the results
	' I simply bold the name and do a <BR>.
	' You can make it look however you'd like.
	' Once again I remind readers that we by no means claim to
	' be UI experts.  Although one person did ask us if we had a
	' graphic designer!  I laughed so hard that I almost hurt myself!
	objFile.Write "<B>"
	objFile.Write Server.HTMLEncode(Request.Form("name"))
	objFile.Write ":</B> "
	objFile.Write Server.HTMLEncode(Request.Form("comment"))
	objFile.Write "<BR>"
	objFile.Write "<hr>"
	objFile.WriteLine ""
	
	' Close the file and dispose of our objects
	objFile.Close
	Set objFile = Nothing
	Set objFSO = Nothing

	' Tell people we've written their info
	%>
	<center><H1>Gracias por firmar nuestro libro de visitas!</H1>
	<A HREF="./index.asp">Volver atrás</A></center>
	<%
End If

' We do this to delete the file every day to keep it managable.
' If you were doing this for real you probably wouldn't want to
' do this so we have defined a const named bDeleteEntries at the
' top of the script that you can set to False to prevent this
' section from running.  You could also delete this whole
' If Then....End If block if you'd like.  Just be sure to leave
' the script delimiter at the bottom!
If bDeleteEntries Then
	Set objFSO = Server.CreateObject("Scripting.FileSystemObject")
	Set objFile = objFSO.GetFile(strFile)
	If DateDiff("d", objFile.DateLastModified, Date()) <> 0 Or bForce <> "" Then
		Set objFile = Nothing		
		' Can't use delete because we need the file to exist for
		' the include the next time the script is run!
		'objFile.Delete
		
		' Create a file overwriting old one.
		Set objFile = objFSO.CreateTextFile(strFile, True)

		' The include barks if the file's empty!
		objFile.Write "<B> </B> "
		objFile.WriteLine " <BR>"
		objFile.Close
	End If
	Set objFile = Nothing
	Set objFSO = Nothing
End If
%>
