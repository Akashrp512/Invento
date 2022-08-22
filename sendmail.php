<?php

// Read the form values
$success = false;
$successTxt = "";
$senderName = isset( $_POST['name'] ) ? preg_replace( "/[^\.\-\' a-zA-Z0-9]/", "", $_POST['name'] ) : "";
$senderEmail = isset( $_POST['email'] ) ? preg_replace( "/[^\.\-\_\@a-zA-Z0-9]/", "", $_POST['email'] ) : "";
$subject = isset( $_POST['subject'] ) ? preg_replace( "/[^\.\-\' a-zA-Z0-9]/", "", $_POST['subject'] ) : "";
$budget = isset( $_POST['budget'] ) ? preg_replace( "/^[A-Za-z0-9\\-\\.]+$/", "", $_POST['budget'] ) : "";
$message = isset( $_POST['message'] ) ? preg_replace( "/(From:|To:|BCC:|CC:|Subject:|Content-Type:)/", "", $_POST['message'] ) : "";
$txt = "Client budget: " . $budget . "\n\n"  . $message . "\n\n" . "Regards,\n\n" . $senderName . " | " .$senderEmail;

// If all values exist, send the email
if ( $senderName && $senderEmail && $message ) {
  $mailTo = "akashrp512@gmail.com,rpakash512@gmail.com"; // change it to your host mail for example (contact@yourdomain.com).
  $headers = "From: " . $senderEmail;
  $success = mail( $mailTo, $subject, $txt, $headers );
  $successTxt = "<p class='uk-alert uk-alert-success uk-margin-large-bottom success' data-uk-alert=''>Thanks for contacting us. We will contact you ASAP!</p>";
  echo $successTxt;
}

?>
