<?php
$mailto   = $_POST['sendto'];
$name     = ucwords($_POST['name']); 
$email    = $_POST['email'];
$message  = $_POST['subscribesubject'];

	if(strlen($_POST['name']) < 1 ){
		echo  'email_error';
	}
	
  else if(strlen($email) < 1 ) {
		echo 'email_error';
	}

  else if(!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $email)) { 
    echo 'email_error';
  }

  else {

	// NOW SEND THE ENQUIRY

	$email_message="\n\n" .
		"Name: " .
		ucwords($name) .
		"\n" .
		"Email: " .
		$email .
		"\n" .
		"Subscribe with subject: " .
		"\n" .
		$message . 
		"\n" .
		"\n\n" ;

		$email_message = trim(stripslashes($email_message));
		mail($mailto, $subject, $email_message, "From: \"$name\" <".$email.">\nReply-To: \"".ucwords($name)."\" <".$email.">\nX-Mailer: PHP/" . phpversion() );
    
    echo 'Thanks, we will send information that you have a subscription.';
}
?>