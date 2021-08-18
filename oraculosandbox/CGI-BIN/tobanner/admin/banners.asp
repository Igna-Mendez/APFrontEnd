<%
Sub Rnd_Banner()

' Initialise variables

Dim strSQL
Dim strBanners
Dim intCounter
Dim intID
Dim strDisplay
Dim strDefault
' Do not Dim the db connections

intCounter = 0
strDefault = "default.gif"

' Set path details etc of DB

strconn = "DRIVER=Microsoft Access Driver (*.mdb);DBQ=" & Server.MapPath("/cgi-bin/tobanner/admin/banners.mdb")

set conn = server.createobject("adodb.connection")
conn.open strconn
set rs = server.createobject("adodb.recordset")

' Set SQL query to get banners

strSQL = "SELECT * FROM banners ORDER BY ID"

' Open connection to DB and query

rs.open strSQL, conn

' Get banners from DB and count them

If not rs.EOF Then
	strBanners = rs.getrows()
	rs.movefirst
	Do While Not rs.EOF
		intCounter = intCounter + 1
		rs.movenext
	Loop

	If intCounter < 2 Then
		' If there's one banner just display it
		strDisplay = "<a href="&strBanners(2,0)&" target=new><img src="&strBanners(1,0)&"></a>"
	Else
		' If there's banners, pick one at random 
		Randomize
		intID = Int(Rnd * intCounter)
		strDisplay = "<a href="&strBanners(2,intID)&" target=new><img src="&strBanners(1,intID)&"></a>"
	End If
Else
	' If there are no banners in DB, display default banner
	strDisplay = "<img src="&strDefault&">"
End If

rs.close
set rs = nothing
set conn = nothing

' Display the banner on webpage with link (except when default)

Response.Write(strDisplay)

End Sub
%>