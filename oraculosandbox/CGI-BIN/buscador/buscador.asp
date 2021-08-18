<% Option Explicit %>
<% 
'Se declaran las variables
Response.Buffer = True 

'Dimension global variables
Dim fsoObject			'File system object
Dim fldObject			'Folder object	
Dim sarySearchWord		'Array to hold the words to be searched for
Dim strSearchWords		'Holds the search words
Dim blnIsRoot			'Boolean set to true if it is the root dirctory
Dim strFileURL			'Holds the path to the file on the site
Dim strServerPath		'Holds the server path to this script
Dim intNumFilesShown		'Holds the number of files shown so far
Dim intTotalFilesSearched	'Holds the number of files searched
Dim intTotalFilesFound		'Holds the total matching files found
Dim intFileNum			'Holds the file number
Dim intPageLinkLoopCounter	'Loop counter to display links to the other result pages
Dim sarySearchResults(200)	'Array holding the search results
Dim intDisplayResultsLoopCounter 'loop counter to diplay the results of the search
Dim intResultsArrayPosition	'Stores the array position of the array storing the results
Dim blnSearchResultsFound	'Set to true if search results are found
Dim strFilesTypesToSearch	'Holds the types of files to be searched
Dim strBarredFolders		'Holds the folders that you don't want searched
Dim strBarredFiles		'Holds the names of the files not to be searched
Dim blnEnglishLanguage		'Set to True if the user is using English




' -------------------------- Change the following line to the number of results you wish to have on each page ------------------------------------
Const intRecordsPerPage = 10 'Se mostraran 10 resultados por pagina

' --------------------- Indique los tipos de archivos donde debera buscar las palabras (separado por comas) --------------------------
strFilesTypesToSearch = "htm,html,asp,shtml" 

' --------------------- Indique las carpetas donde no quiere que el buscador actue (separado por comas) --------------------------
strBarredFolders = "cgi-bin," 'cgi-bin  esta como defecto y a modo de ejemplo

' ---------- Indique los archivos donde no quiere que actue el buscador -------------
strBarredFiles = "adminstation.htm,no_allowed.asp" 'adminstration.htm y not_allowed.asp estan como ejemplos

' -------------------- Set this boolean to False if you are not using an English language web site --------------------------------------------------
blnEnglishLanguage = True 'True = English \ False = Other language

'-----------------------------------------------------------------------------------------------------------------------------------------------------


'Initalise variables
intTotalFilesSearched = 0

%>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Search the Website</title>
<meta name="description" content="Search the web site for pages or information that you are after">

<!-- The Web Wiz Guide site search engine is written and produced by Bruce Corkhill ©2001
     	If you want your own site search engine then goto http://www.webwizguide.com --> 
       
       
<!-- Check the from is filled in correctly before submitting -->
<script  language="JavaScript">
<!-- Hide from older browsers...

//Check the form before submitting
function CheckForm () {

	//Check for a word to search
	if (document.frmSiteSearch.search.value==""){
		alert("Please enter at least one keyword to search");
		document.frmSiteSearch.search.focus();
		return false;
	}
	
	return true
}
// -->
</script>
       
</head>
<body bgcolor="#FFFFFF" text="#000000" link="#0000CC" vlink="#0000CC" alink="#FF0000">
<h1 align="center">Buscador Interno</h1>
  
<form method="get" name="frmSiteSearch" action="buscador.asp" onSubmit="return CheckForm();">
  <table cellpadding="0" cellspacing="0" width="90%" align="center">
    <tr> 
      <td height="66" width="165" align="right" rowspan="3" valign="middle"><img src="site_search_image.gif" width="44" height="48" align="absmiddle" alt="Search surf-net"> 
      </td>
      <td height="66" width="15" align="right" rowspan="3" valign="middle">&nbsp;</td>
      <td height="4" width="571"> Texto a buscar: </td>
    </tr>
    <tr> 
      <td height="2" width="571">
      <input type="TEXT" name="search" maxlength="50" size="36" value="<% =Request.QueryString("search") %>">
        <input type="submit" value="Buscar &gt;&gt;" name="submit">
        </td>
    </tr>
    <tr> 
      <td height="34" width="571" valign="top"> Buscar : 
        <input type="radio" name="mode" value="allwords" CHECKED>
        Todas las palabras 
        <input type="radio" name="mode" value="anywords">
        Cualquier palabra 
        <input type="radio" name="mode" value="phrase">
        Frase</td>
    </tr>
  </table>
</form>
<%

'Read in all the search words into one variable
strSearchWords = Trim(Request.QueryString("search"))

'If the site is in English then use the server HTML encode method
If blnEnglishLanguage = True Then
	'Replace any HTML tags with the HTML codes for the same characters (stops people entering HTML tags)
	strSearchWords = Server.HTMLEncode(strSearchWords)

'If the site is not english just change the script tags
Else
	'Just replace the script tag <> with HTML encoded &lt; and &gt;
	strSearchWords = Replace(strSearchWords, "<", "&lt;", 1, -1, 1)
	strSearchWords = Replace(strSearchWords, ">", "&gt;", 1, -1, 1)
End If

'Slit each word to be searched up and place in an array
sarySearchWord = Split(Trim(strSearchWords), " ")



'Read the file number to show from
intFileNum = CInt(Request.QueryString("FileNumPosition"))

'Set the number of files shown so far to the file number read in above
intNumFilesShown = intFileNum


'Create the file system object
Set fsoObject = Server.CreateObject("Scripting.FileSystemObject")


'If there is no words entered by the user to search for then dont carryout the file search routine
If NOT Request.QueryString("search") = "" Then


	'Get the path and the root folder to be searched
	Set fldObject = fsoObject.GetFolder(Server.MapPath("./"))
	
	'Read in the server path to this ASP script
	strServerPath = fldObject.Path & "\"
	
	'Set to true as this is searching the root directory
	blnIsRoot = True
		
	'Call the search sub prcedure
	Call SearchFile(fldObject)
			
	
	'Reset server variables
	Set fsoObject = Nothing
	Set fldObject = Nothing
	
	
	
	
	
	'Display the HTML table with the results status of the search or what type of search it is
	Response.Write vbCrLf & "	<table width=""98%"" border=""0"" cellspacing=""1"" cellpadding=""1"" align=""center"" bgcolor=""#CCCCCC"">"
	Response.Write vbCrLf & " 	  <tr>"
	
	'Display that there where no matching records found
	If blnSearchResultsFound = False Then 
		Response.Write vbCrLf & " 	    <td>&nbsp;Palabras a buscar <b>" & strSearchWords & "</b>. &nbsp;&nbsp;&nbsp;Disculpe, no se encontraron resultados.</td>"   
	
	'Else Search went OK so display how many records found
	Else	
		Response.Write vbCrLf & " 	    <td>&nbsp;Palabras a buscar <b>" & strSearchWords & "</b>. &nbsp;&nbsp;&nbsp;Mostrando resultados " & intFileNum + 1 & " - " & intNumFilesShown & " de " & intTotalFilesFound & ".</td>"	    
	End If
	
	'Close the HTML table with the search status
	Response.Write vbCrLf & "	  </tr>"
	Response.Write vbCrLf & "	</table>"
	
	
	
	
	'HTML table to display the search results or an error if there are no results
	Response.Write vbCrLf & "	<table width=""95%"" border=""0"" cellspacing=""1"" cellpadding=""1"" align=""center"">"
	Response.Write vbCrLf & "	 <tr>" 
	Response.Write vbCrLf & "	  <td>"   
	
	'If no results are found then display an error message
	If blnSearchResultsFound = False Then 
	
		'Write HTML displaying the error
		Response.Write vbCrLf & "	  <br>"
		Response.Write vbCrLf & "	   Su búsqueda - <b>" & strSearchWords & "</b> - no coincidió con ninguno de los archivos encontrados."
	   	Response.Write vbCrLf & "	   <br><br>"

	'Else display the results
	Else
		
		'Loop round to display each result within the search results array
		For intDisplayResultsLoopCounter = 1 to (intNumFilesShown - intFileNum)
		
			Response.Write vbCrLf & "	<br>"
			Response.Write vbCrLf & "	    " & sarySearchResults(intDisplayResultsLoopCounter)
			Response.Write vbCrLf & "	<br>"
		Next
	End If
	
	'Close the HTML table displaying the results
	Response.Write vbCrLf & "	    </td>"
	Response.Write vbCrLf & "	  </tr>"
	Response.Write vbCrLf & "	</table>"

End If




 
'Display an HTML table with links to the other search results
If intTotalFilesFound > intRecordsPerPage then

	'Display an HTML table with links to the other search results
	Response.Write vbCrLf & "	<br>"
	Response.Write vbCrLf & "	<table width=""100%"" border=""0"" cellspacing=""0"" cellpadding=""0"" align=""center"">"
	Response.Write vbCrLf & " 	  <tr>"
	Response.Write vbCrLf & " 	    <td>"
	Response.Write vbCrLf & "		<table width=""100%"" border=""0"" cellpadding=""0"" cellspacing=""0"">"
	Response.Write vbCrLf & "		  <tr>"
	Response.Write vbCrLf & "		    <td width=""50%"" align=""center"">"
	
	Response.Write vbCrLf & "		Página de resultados:&nbsp;&nbsp;"
	
		
	'If the page number is higher than page 1 then display a back link    	
	If intNumFilesShown > intRecordsPerPage Then 
		Response.Write vbCrLf & "		 <a href=""buscador.asp?FileNumPosition=" &  intFileNum - intRecordsPerPage  & "&search=" & Replace(strSearchWords, " ", "+") & "&mode=" & Request.QueryString("mode") & """ target=""_self"">&lt;&lt;&nbsp;Prev</a> "   	     	
	End If     	
	
	
	'If there are more pages to display then display links to all the search results pages
	If intTotalFilesFound > intRecordsPerPage Then 
		
		'Loop to diplay a hyper-link to each page in the search results    	
		For intPageLinkLoopCounter = 1 to CInt((intTotalFilesFound / intRecordsPerPage) + 0.5)
			
			'If the page to be linked to is the page displayed then don't make it a hyper-link
			If intFileNum = (intPageLinkLoopCounter * intRecordsPerPage) - intRecordsPerPage Then
				Response.Write vbCrLf & "		     " & intPageLinkLoopCounter
			Else
			
				Response.Write vbCrLf & "		     &nbsp;<a href=""buscador.asp?FileNumPosition=" &  (intPageLinkLoopCounter * intRecordsPerPage) - intRecordsPerPage & "&search=" & Replace(strSearchWords, " ", "+") & "&mode=" & Request.QueryString("mode") & """ target=""_self"">" & intPageLinkLoopCounter & "</a>&nbsp; "			
			End If
		Next
	End If
	
	
	'If it is Not the last of the search results than display a next link     	
	If intTotalFilesFound > intNumFilesShown then   	
		Response.Write vbCrLf & "		&nbsp;<a href=""buscador.asp?FileNumPosition=" &  intNumFilesShown  & "&search=" & Replace(strSearchWords, " ", "+") & "&mode=" & Request.QueryString("mode") & """ target=""_self"">Next&nbsp;&gt;&gt;</a>"	   	
	End If      	
	
	
	'Finsh HTML the table      	
	Response.Write vbCrLf & "		    </td>"      	
	Response.Write vbCrLf & "		  </tr>"
	Response.Write vbCrLf & "		</table>"		
	Response.Write vbCrLf & "	    </td>"
	Response.Write vbCrLf & "	  </tr>"
	Response.Write vbCrLf & "	</table>"
	
 
End If 

%>
 <br>
 <div align="center">
    
  <table width="98%" border="0" cellspacing="1" cellpadding="1" bgcolor="#CCCCCC" align="center">
    <tr> 
        <td width="47%" height="18">&nbsp;Búsqueda realizada en <% = intTotalFilesSearched  %> documentos. </td>
        <td width="53%" align="right" height="18"></a>&nbsp;&nbsp;</td>
      </tr>
    </table>
    <br>
  </div>
<br>
</body>
</html>
<%



'Sub procedure to do the search
Public Sub SearchFile(fldObject)

	'Dimension local variabales
	Dim filObject				'File object
	Dim tsObject				'Text stream object
	Dim subFldObject			'Sub folder object
	Dim RegExpObject			'RegExp Object
	Dim strFileContents			'Holds the contents of the file being searched	
	Dim strPageTitle			'Holds the title of the page
	Dim intTitleStartPositionInFile		'Holds the start postion in the file being searched of the title
	Dim intTitleEndPositionInFile		'Holds the end postion in the file being searched of the title
	Dim strPageDescription			'Holds the description of the page
	Dim intDescriptionStartPositionInFile	'Holds the start postion in the file being searched of the description
	Dim intDescriptionEndPositionInFile	'Holds the end postion in the file being searched of the description
	Dim intSearchLoopCounter		'Loop counter to search all the words in the array
	Dim blnSearchFound			'Set to true if the search words are found	
	
	'Error handler
	On Error Resume Next
	
	
	'Loop to search each file in the folder
	For Each filObject in fldObject.Files
		
				
		'Check the file extension to make sure the file is of the extension type to be searched
		If InStr(1, strFilesTypesToSearch, fsoObject.GetExtensionName(filObject.Name), vbTextCompare) > 0 Then
		
		  	'Check to make sure the file about to be searched is not a barred file if it is don't search the file
			If NOT InStr(1, strBarredFiles, filObject.Name, vbTextCompare) > 0 Then
		  	
		  	
			  	'Open the file for searching
			    	Set tsObject = filObject.OpenAsTextStream
			
				'Read in the contents of the file
			   	strFileContents = tsObject.ReadAll
			 		
			 	'Initalise the search found variable to flase
			 	blnSearchFound = False
			 	
			 	
			 	'If the user has choosen to search by phrase 
			 	If Request.QueryString("mode") = "phrase" Then
			 		
			 		'Search the file for the phrase
			 		If InStr(1, LCase(strFileContents), LCase(strSearchWords), 1) then
			 		
			 			'If the search is found then set the search found variable to true
			 			blnSearchFound = True
			 		End If
			 	
			 	
			 	'Else the search is either by all or any words
			 	Else
			 			 	
			 		'If the search is by all words then initialise the search found variable to true
				 	If Request.QueryString("mode") = "allwords" then blnSearchFound = True
				 	
				 	
				 	'Loop round to search for each word to be searched
				 	For intSearchLoopCounter = 0 to UBound(sarySearchWord)
				 		    	
					    	'Search the file for the search words
					    	If InStr(1, LCase(strFileContents), LCase(sarySearchWord(intSearchLoopCounter)), 1) Then
				    	
				    			'If the search word is found and the search is for any words then set the search found variable to true
				    			If Request.QueryString("mode") = "anywords" then blnSearchFound = True
				    			
				    		Else
				    			'If the search word is not found and the search is for all words then set the search found variable back to false as one of the words has not been found
				    			If Request.QueryString("mode") = "allwords" then blnSearchFound = False
				    			
				    		End If
				    	Next
			    	End If
			    	
			    	
			    	
			    	'Calculate the total files searched
			    	intTotalFilesSearched = intTotalFilesSearched + 1
			    		    	
			    			    	
			    	
			    	'If the search found variable is true then display the results
			    	If blnSearchFound = True Then
			    			    	
			    					    		    	
					'Calculate the total files found 
					intTotalFilesFound = intTotalFilesFound + 1
										
			    	
			    		
					'Check that the file shown is between the the files shown so far and the maximum files to show per page
					If  intNumFilesShown < (intRecordsPerPage + intFileNum) and intTotalFilesFound > intNumFilesShown Then
	
						'Calculate the number of results shown
						intNumFilesShown = intNumFilesShown + 1
						
						
		
					    	'Read in the title of the file
					    	'Get the position in the file of the HTML tag <title> as its 7 characters long add 7 to the answer
						intTitleStartPositionInFile = InStr(1, lcase(strFileContents), "<title>", 1) + 7
						
						
						'If there is a title then the start position will be more than 7	
						If NOT intTitleStartPositionInFile = 7 Then
						
							'Get the position in file of the HTML tag </title>
							intTitleEndPositionInFile = InStr(intTitleStartPositionInFile, strFileContents, "</title>", 1)
							
							'Read in the page title of the file by removing eveything before and after the title HTML tags	
							strPageTitle = Server.HTMLEncode(Trim(Mid(strFileContents, intTitleStartPositionInFile, (intTitleEndPositionInFile - intTitleStartPositionInFile))))
							
						
						'If there is no pag title then give the pag title variable the value No Title
						Else
							strPageTitle = "No Title"
						End If
						
			
						
						
						'Read in the description of the file
						'Get the start position in the file of the description
					    	intDescriptionStartPositionInFile = InStr(1, strFileContents, "<meta name=""description"" content=""", 1)
					    	
					    	'If there is a description then the position in file will be over 0
					    	If NOT intDescriptionStartPositionInFile = 0 Then
							
							'Get the end position of the HTML description tag
							intDescriptionStartPositionInFile = intDescriptionStartPositionInFile + Len("<meta name=""description"" content=""")
							
							'Get the position in file of the closing tag for the description
							intDescriptionEndPositionInFile = InStr(intDescriptionStartPositionInFile, strFileContents, """>", 1)
				
							'Read in the descrition from the file
							strPageDescription = Server.HTMLEncode(Trim(Mid(strFileContents, intDescriptionStartPositionInFile, (intDescriptionEndPositionInFile - intDescriptionStartPositionInFile))))
							
				       		'If the is no description then the description variable will hold the appropriate message
				       		Else
				       			strPageDescription = "No hay descripción disponible para esta página"
				       		
				       		End If
				       		
				       		
				       		'Place the search results into the saerch results array
				       		'Calculate the array position of the results array
				       		intResultsArrayPosition = intResultsArrayPosition + 1
				       		
				       		
				       		'Set the search results found boolean to true
				       		blnSearchResultsFound = True
				       					       		
						'If the file is in the root directory then
						If blnIsRoot = True Then
						
							'Place the search results into the search results array
							sarySearchResults(intResultsArrayPosition) = "<a href=""./" &  filObject.Name & """ target=""_self"">" & strPageTitle & "</a><br>" & vbCrLf & "        " & strPageDescription
									    						       		
				       		'Else it is not in the root directiory
				       		Else
				       			'Place the search results into the search results array
				       			sarySearchResults(intResultsArrayPosition) = "<a href=""./" & strFileURL  & fldObject.Name & "/" & filObject.Name & """ target=""_self"">" & strPageTitle & "</a><br>" & vbCrLf & "	      " & strPageDescription			   			   								
						End If	
									
					End If	      		
		      		End If
							
				'Close the text stream object
		    		tsObject.Close
			End If
		End If
	Next



	'Loop to search through the sub folders within the site
	For Each subFldObject In FldObject.SubFolders
										
		'Check to make sure the folder about to be searched is not a barred folder if it is then don't search
		If NOT InStr(1, strBarredFolders, subFldObject.Name, vbTextCompare) > 0 Then
			
			'Set to false as we are searching sub directories
			blnIsRoot = False
						
					
			'Get the server path to the file
			strFileURL = fldObject.Path & "\"
			
			'Turn the server path to the file into a URL path to the file
			strFileURL = Replace(strFileURL, strServerPath, "")
			
			'Replace the NT backslash with the internet forward slash in the URL to the file
			strFileURL = Replace(strFileURL, "\", "/")
			
			'Replace the spaces in the URL to the file with Internet friendly %20
			strFileURL = Replace(strFileURL, " ", "%20")
			
							
			'Call the search sub prcedure to search the web site
			Call SearchFile(subFldObject)
		End If
	Next



	'Reset server variables
	Set filObject = Nothing
	Set tsObject = Nothing
	Set subFldObject = Nothing


End Sub
%>