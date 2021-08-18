<!--#INCLUDE FILE="config.inc" -->
<html>
<head>
<title>ICQ</title>

</head>

<Style>
	a:link   {color="<% =LinkColor %>";text-decoration:<% =LinkTextDecoration %>}
	a:visited{color:"<% =VisitedLinkColor %>";text-decoration:<% =VisitedTextDecoration %>}
	a:hover  {color:"<% =HoverFontColor %>";text-decoration:<% =HoverTextDecoration %>}
</style>

<body bgcolor="#FFFFFF" text="#000000" link="#000000" vlink="#000000" alink="#000000">
<TABLE align=center border=0 cellPadding=0 cellSpacing=0 width=100%>
    
    <TR>
        <TD vAlign=top><IMG alt="ASP Bulletin Board" border=0 
            src="bboard.gif" ></TD>
        <TD align=right vAlign=top>&nbsp;
</TD></TR></TABLE>
<font face="<% =DefaultFontFace %>" size="2">

<br><br>
<div align="center"><center>
<form action="http://wwp.mirabilis.com/scripts/WWPMsg.dll" method="post">
<input type="hidden" name="subject" value="From Your Web Page"><input type="hidden"
name="to" value="<%= Request.QueryString("ICQ") %>">
<TABLE bgColor=#b0c4de border=1 cellPadding=0 cellSpacing=0 
            width=90% 
            background="" bordercolor=#000000>
                <TR>
                 <TD Colspan=2><font face="<% =DefaultFontFace %>" size="2">
                   Send ICQ TO <%= Request.QueryString("ICQ") %></font></td>
                </tr>
                
                <TR>
                    <TD width="50%"><font face="<% =DefaultFontFace %>" size=2>Senders Name</td>
                    <TD width="50%"><font face="<% =DefaultFontFace %>" size=3><input type="text" name="from" value size="15" maxlength="40" onfocus="this.select()">
                         </td>
                <TR>
                    <TD><font face="<% =DefaultFontFace %>" size=2>Senders Email Address</FONT></td>
                    <TD><font face="<% =DefaultFontFace %>" size=3><input type="text" name="fromemail" value size="15" maxlength="40" onfocus="this.select()">
                        </td>
                <TR>
                    <TD><font face="<% =DefaultFontFace %>" size=2>Message </td>
                    <TD><font face="<% =DefaultFontFace %>" size=3><textarea name="body" rows="3" cols="20" wrap="Virtual"></textarea>
                        </td>
                 </TR>
                  <TR><TD Colspan=2 align=center><input type=submit value="Send"></td>
                </tr>

	
	</TABLE></form><a href="javascript:onClick= window.close()"><small>Close 
            Window</SMALL></A></div></center>


