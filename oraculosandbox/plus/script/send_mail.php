<?php
	
	//this is the email address the emails go to
	$toEmail = "oraculoweb@gmail.com";
	
	 
	//get variables from flash
	$senderName = $_POST['_name_str'];
	$senderEmail = $_POST['_email_str'];
	$senderSubject = $_POST['_subject_str'];
	$senderMessage = $_POST['_message_str'];
	$senderPhoneNumber=$_POST['_phone_str'];
	//gets rid of unwanted characters
	$senderName = stripslashes($senderName); 
	$senderEmail = stripslashes($senderEmail); 
	$senderSubject = stripslashes("[Website] $senderSubject"); 
	$senderMessage = stripslashes($senderMessage); 
	$senderPhoneNumber=stripslashes($senderPhoneNumber);
	//adds name to message
	$body = "Message: $senderMessage\r\n$senderName Phone Number:$senderPhoneNumber";
	//puts from in correct format
	$from = "From: $senderEmail\r\n";
	//send the email
	mail($toEmail, $senderSubject, $body, $from);
	
?>