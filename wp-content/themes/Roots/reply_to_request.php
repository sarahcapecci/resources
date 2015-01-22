<?php
if(isset($_POST['email_to'])) {
      
    // validation expected data exists
    if(!isset($_POST['email_to']) ||
        !isset($_POST['subject']) ||
        !isset($_POST['message'])) {
        die('We are sorry, but there appears to be a problem with the form you submitted.');       
    }
      
    $email_from = $_POST['email_from']; // required
    $email_to = $_POST['email_to'];
    $subject = $_POST['subject']; // required
    $message = $_POST['message']; // required
    $request = $_POST['request'];
    $sender_name = $_POST['sender_name'];
  
  //validation
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
    $string_exp = "/^[A-Za-z .'-]+$/";

  // if(!preg_match($email_exp,$email_from)) {
  //   $error_message .= 'The Email Address you entered does not appear to be valid.';
  // }
  // if(!preg_match($email_exp,$email_to)) {
  //   $error_message .= 'The Email Address you entered does not appear to be valid.';
  // }
   
  // if(!preg_match($string_exp,$subject)) {
  //   $error_message .= 'The subject you entered does not appear to be valid.';
  // }

  // if(!preg_match($string_exp,$sender_name)) {
  //   $error_message .= 'The subject you entered does not appear to be valid.';
  // }

  // if(strlen($message) < 2) {
  //   $error_message .= 'The message you entered do not appear to be valid.';
  // }

  // if(strlen($error_message) > 0) {
  //   var_dump($error_message);
  //   die($error_message);
  // }
    // E-mail message
    $email_message = "Someone responded to your request" . $request . "\n\n";
      
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
      
    $email_message .= "Name: ".clean_string($sender_name)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n";
    $email_message .= "Message: ".clean_string($message)."\n";
      
      
// create email headers
$headers = "From: ".$email_from."\r\n".
"Reply-To: ".$email_from."\r\n" .
"X-Mailer: PHP/" . phpversion();
@mail($email_to, $subject, $email_message, $headers);

header("Location:http://localhost:8888/resources/");  
?>