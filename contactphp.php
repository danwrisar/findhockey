<?php
if(isset($_POST['email'])) {
	
	// CHANGE THE TWO LINES BELOW
	$email_to = "dansar324@gmail.com";
	
	$email_subject = "New submission from findhockey";
	
	
	function died($error) {
		// your error code can go here
		echo "We're sorry, but there's errors found with the form you submitted.<br /><br />";
		echo $error."<br /><br />";
		echo "Please go back and fix these errors.<br /><br />";
		die();
	}
	
	// validation expected data exists
	if(!isset($_POST['team_name']) ||
		!isset($_POST['email']) ||
		!isset($_POST['hockey_type']) ||
		!isset($_POST['url']) ||
		!isset($_POST['comments'])) {
		died('We are sorry, but there appears to be a problem with the form you submitted.');		
	}
	
	$team_name = $_POST['team_name']; // required
	$email = $_POST['email']; // required
	$hockey_type = $_POST['hockey_type']; // required
	$url = $_POST['url']; // required
	$comments = $_POST['comments']; // required
	
	$error_message = "";
	$email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
  if(!preg_match($email_exp,$email) {
  	$error_message .= 'The Email Address you entered does not appear to be valid.<br />';
  }
	$string_exp = "/^[A-Za-z .'-]+$/";
  if(!preg_match($string_exp,$team_name)) {
  	$error_message .= 'The First Name you entered does not appear to be valid.<br />';
  }
  if(!preg_match($string_exp,$hockey_type)) {
  	$error_message .= 'The Last Name you entered does not appear to be valid.<br />';
  }
  if(strlen($comments) < 2) {
  	$error_message .= 'The Comments you entered do not appear to be valid.<br />';
  }
  if(strlen($error_message) > 0) {
  	died($error_message);
  }
	$email_message = "Form details below.\n\n";
	
	function clean_string($string) {
	  $bad = array("content-type","bcc:","to:","cc:","href");
	  return str_replace($bad,"",$string);
	}
	
	$email_message .= "Team Name: ".clean_string($team_name)."\n";
	$email_message .= "Email: ".clean_string($email)."\n";
	$email_message .= "Hockey Type: ".clean_string($hockey_type)."\n";
	$email_message .= "URL: ".clean_string($url)."\n";
	$email_message .= "Comments: ".clean_string($comments)."\n";
	
	
// create email headers
$headers = 'From: '.$email."\r\n".
'Reply-To: '.$email."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);  
?>

<!-- place your own success html below -->

Thank you for contacting us. We will be in touch with you very soon.

<?php
}
die();
?>