<?php

	// put your email address here
	$youremail = 'yourname@mail.com';   

	// prepare message 
	$body = "Subscribe request for Applechic :
	
	Email:  $_POST[email]";

	if( $_POST['email'] && !preg_match( "/[\r\n]/", $_POST['email']) ) {
	  $headers = "From: $_POST[email]";
	} else {
	  $headers = "From: $youremail";
	}

	mail($youremail, 'Subscribe request from Applechic', $body, $headers );

?>

<!DOCTYPE HTML>
<html>
<head>
<title>Thanks!</title>
</head>
<body>
<p>Subscription complete.</p>
</body>
</html>