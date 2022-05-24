<?php
require '/usr/share/php/libphp-phpmailer/src/PHPMailer.php';
require '/usr/share/php/libphp-phpmailer/src/SMTP.php';

//Declare the object of PHPMailer

//$email = new PHPMailer\PHPMailer\PHPMailer();

//Set up necessary configuration to send email

// $email->IsSMTP();
// $email->SMTPAuth = true;
// $email->SMTPSecure = 'tls';
// $email->Host = "mail.obbsco.com";
// $email->Port = 587;

// //Set the gmail address that will be used for sending email
// $email->Username = "erwin.galang@obbsco.com";

// //Set the valid password for the gmail address
// $email->Password = "F!renz@130";

// //Set the sender email address
// $email->SetFrom("erwin.galang@obbsco.com");

// //Set the receiver email address
// $email->AddAddress("note.genius@gmail.com");

// //Set the subject
// $email->Subject = "Testing Email";

// //Set email content
// $email->Body = "Hello! use PHPMailer to send email using PHP. - Case Stories Server";
// if(!$email->Send()) {
//   echo "Error: " . $email->ErrorInfo;
// } else {
//   echo "Email has been sent.";
// }
// ?>
