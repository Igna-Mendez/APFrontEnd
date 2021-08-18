

##################################################################
 (C) 1999 FreeASP.Com, Inc. This program is freeware and may 
 be used at no cost to you (just leave this notice intact). 
 Feel free to modify, hack, and play  with this script.
 It is provided AS-IS with no warranty of any kind.
 We also cannot assume responsibility for either any programs 
 provided here, or for any advice that is given since we have no 
 control over what happens after our code or words leave this site. 
 Always use prudent judgment in implementing any program- and 
 always make a backup first! 
##################################################################

           FreeASP.Com MAILLIST E-MAIL SYSTEM
           -----------------------------------------

The FreeASP Maillist consists of two scripts, subscribe.asp and
mailadmin.asp. The purpose of the system is to provide a simple
and flexible e-mail subscription system for any web site that
does not have access to MajorDomo, or where MajorDomo is too
much of a hassle to set up and maintain.

The subscribe.asp script is used to allow readers to either
subscribe or unsubscribe from a mailing list. The mailing
list name is specified in the calling HTML page, and by using
the SELECT input tag, you can provide a choice of lists for
your readers to subscribe to. (note: only using single item
selections).

The mailadmin.asp script is an administrative interface. It
allows you to maintain your mailing lists, create or edit form
letters, and send out mailings. It is very flexible and simple
to implement.

We appreciate if you can let us know your URL (mail to:info@freeasp.com)
and provide a link back to FreeASP.com (It's not mandatory). That 
will help us continue to develop new FreeASP scripts.

                 


                 ABOUT THE FILE FORMATS
                 ----------------------

Mailing lists are stored in files that end with the extension
"lst". They are flat ASCII text files with pipe "|" characters
used as field delimiters.   Each subscriber record contains the 
person's email address, the IP address of the computer that submitted 
the requestion, and a date/time stamp.

Form letters are stored in files that end with the extension
"ltr". They are flat ASCII files.

                INSTALLING SUBSCRIBE.ASP
                ------------------------

STEP 1. Creating your subscribe/unsubscribe input form.

     <FORM ACTION="/cgi-bin/subscribe.ASP" METHOD="POST">
     <INPUT TYPE="RADIO" NAME="action" VALUE="subscribe" checked>Subscribe
     <INPUT TYPE="RADIO" NAME="action" VALUE="unsubscribe">Un-Subscribe
     <INPUT TYPE="TEXT" NAME="email" VALUE="your-email" SIZE=10 MAXLENGTH=100>
     <INPUT TYPE="HIDDEN" NAME="datafile" VALUE="subscribe">
     <INPUT TYPE="SUBMIT" VALUE="DO IT!">
     </FORM>
               (provide HTML formatting as needed)

        *Be careful, the provided subscribe.html also contains an
         HTML screenshot of the admin screen!
     
     In the example above, you will see the form calls /cgi-bin/subscribe.asp
     There is a radio button control to set the variable "action" to
     either subscribe or unsubscribe. If you only want to allow people
     to subscribe, replace the two radio buttons with a line like this:
      
     <INPUT TYPE="HIDDEN" NAME="action" VALUE="subscribe">

     The datafile input can also be a SELECT control, allowing you to
     let a reader pick which mailing list to subscribe to. The email
     variable is what is placed in the "lst" file for the reader's
     address.

STEP 2. Editing subscribe.asp

     Edit the subscribe.asp file to meet your system's requirements.
     The only required change to the script is setting the BASEDIR
     variable:

           BASEDIR="C:/temp/maillist"
 
     This must be set to the directory on your system where the letter
     and mail list files will be located. Be sure to set the permissions
     on this directory so that the IIS user can write to it. 
 
     Look at the script for other settings you might want to make.

STEP 3. Installing subscribe.asp

     Upload the subscribe.asp file from your PC or Mac to the
     cgi-bin directory of your site using the ASCII method, not
     BINARY. 

     *NOTE: DO NOT install the subscribe.asp into the same directory
            as mailadmin.asp. The reason for this will be covered
            in the next section.

     

If you have done everything properly, you are now ready to start 
signing up your readers! If you do not wish to use the mailadmin.asp
script to maintain your files or send mail, you can download the
gathered data for easy import into other e-mail systems.

                   INSTALLING MAILADMIN.ASP
                   ------------------------
This is the master administration screen for the NOMODOMO system.
You simply call it by entering a URL on the browser command line
such as http://yourdomain.com/cgi-bin/directoryname/mailadmin.asp

STEP 1. Edit the mailadmin.asp file.

     Edit the subscribe.asp file to meet your system's requirements.

 BASEDIR indicates the directory where your ltr and lst files will
 be stored. Be sure that it is the same as you entered for subscribe.asp

         BASEDIR="C:/temp/maillist"
 
     This must be set to the directory on your system where the letter
     and mail list files will be located. Be sure to set the permissions
     on this directory so that the IIS user can write to it

     SCRIPT_URL is the URL (not path) of this script.

         SCRIPT_URL="/cgi-bin/nodomo/mailadmin.asp"

     DEFAULT_EMAIL is used as the default 'from' e-mail address
     for your mailings. You can type over this value when sending
     mail.

       DEFAULT_EMAIL="yourname\@xxxyyyzzz.com"

Step 2. Installing mailadmin.asp

     Upload the mailadmin.asp file from your PC or Mac to the
     cgi-bin/nomodomo directory of your site using the ASCII method, 
     not BINARY. 

     
                *** IMPORTANT SUPPORT/SECURITY INFORMATION ***

   If you need help for installation/customization, please post your question
   to http://www.delphi.com/freeasp/start. The mailadmin.asp script contains 
   NO INTERNAL SECURITY DEVICES!!!! This is why you DO NOT INSTALL THE 
   mailadmin.asp in your main /cgi-bin directory.
   
 
    