<?php
if ($ SERVER [REQUEST_METHOD] == "POST") {
	$name = strip_tags(trim($_POST["name"]));
				$name = str_replace(array("\r","\n"),array(" "," "),$name);
	$email = filter_var(trim($_POST["email"]), FILTER_SANATIZE_EMAIL);
	$message = trim($_POST["message"]);
	
	if (empty($name) OR empty($message) OR !filter_var($email, FILTER_VALIDATE_EMAIL)) {
		http_response_code(400);
		echo "Oops we I it again";
		exit;
	}	
	$recipient = "josephcureton1@gmail.com";
	$subject = "Here4Reentry";
	$email_content = "Name: $name\n";
	$email_content = "Email: $email\n";
	$email_content = "Message:\n$message\n";

	$email_headers = "From: $name <$email>";

	if (mail($recipient, $subject, $email_content, $email_headers)){
		http_response_code(200);
		echo "Thank you for your interest in Here4Reentry!";
	}
	else {
		http_response_code(500);
		echo "You have reached a non-working number. Please try again later. Goodbye.";
	}

} 
else{
	http_response_code(403);
	echo "There was a problem with your submission, please try again.";
}
?>