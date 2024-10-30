<?php

// Define some constants
define( "RECIPIENT_NAME", "Marina Developpement" );
define( "RECIPIENT_EMAIL", "contact@marinabott.fr" );

// Read the form values
$success = false;
$name = isset( $_POST['name'] ) ? preg_replace( "/[^\.\-\' a-zA-Z0-9]/", "", $_POST['name'] ) : "";
$fname = isset( $_POST['fname'] ) ? preg_replace( "/[^\.\-\' a-zA-Z0-9]/", "", $_POST['fname'] ) : "";
$lname = isset( $_POST['lname'] ) ? preg_replace( "/[^\.\-\' a-zA-Z0-9]/", "", $_POST['lname'] ) : "";
$senderEmail = isset( $_POST['email'] ) ? preg_replace( "/[^\.\-\_\@a-zA-Z0-9]/", "", $_POST['email'] ) : "";
$phone = isset( $_POST['phone'] ) ? preg_replace( "/[^\.\-\_\@a-zA-Z0-9]/", "", $_POST['phone'] ) : "";
$services = isset( $_POST['services'] ) ? preg_replace( "/[^\.\-\_\@a-zA-Z0-9]/", "", $_POST['services'] ) : "";
$date = isset( $_POST['date'] ) ? preg_replace( "/[^\.\-\_\@a-zA-Z0-9]/", "", $_POST['date'] ) : "";
$subject = isset( $_POST['subject'] ) ? preg_replace( "/[^\.\-\_\@a-zA-Z0-9]/", "", $_POST['subject'] ) : "";
$website = isset( $_POST['website'] ) ? preg_replace( "/[^\.\-\_\@a-zA-Z0-9]/", "", $_POST['website'] ) : "";
$message = isset( $_POST['message'] ) ? preg_replace( "/(From:|To:|BCC:|CC:|Subject:|Content-Type:)/", "", $_POST['message'] ) : "";


// full name or first name last name;

$name = ( !empty( $name ) ) ? $name : $fname . ' ' . $lname;


$mail_subject = 'Message reçu via marinabott.fr de la part de ' . $name;

$body = 'Nom / Prénom: '. $name . "\r\n";
$body .= 'Email: '. $senderEmail . "\r\n";


if ($phone) {$body .= 'Téléphone: '. $phone . "\r\n"; }
if ($services) {$body .= 'Services: '. $services . "\r\n"; }
if ($date) {$body .= 'Date: '. $date . "\r\n"; }
if ($subject) {$body .= 'Sujet: '. $subject . "\r\n"; }
if ($website) {$body .= 'Website: '. $website . "\r\n"; }

$body .= 'Message: ' . "\r\n" . $message;



// If all values exist, send the email
if ( $name && $senderEmail && $message ) {
  $recipient = RECIPIENT_NAME . " <" . RECIPIENT_EMAIL . ">";
  $headers  = "From: $senderEmail\r\n";
  $headers .= "Reply-To: $senderEmail\r\n";  
  $success = mail( $recipient, $mail_subject, $body, $headers );
  echo "sent";
}else {
	echo "failed";
}

?>
