<?php
require_once 'phpmailer/PHPMailerAutoload.php';
require 'db.php';

$conn = new mysqli($servername, $username, $password, $dbname);
$sql = "SELECT * FROM settings;";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$mailto = $row['mailto'];
$msg = $row['msg'];
$email = $row['email'];
$pwd = $row['pwd'];
$host = $row['host'];
$port = $row['port'];
$sec = $row['sec'];
$client_id = $row['client_id'];
$tenant_id = $row['tenant_id'];
$secret = $row['secret'];
$conn->close();

$results_messages = array();
 
$mail = new PHPMailer(true);
$mail->CharSet = 'utf-8';
ini_set('default_charset', 'UTF-8');
 
class phpmailerAppException extends phpmailerException {}
 
try {
$to = 'erwing.geo@yahoo.com';
if(!PHPMailer::validateAddress($to)) {
  throw new phpmailerAppException("Email address " . $to . " is invalid -- aborting!");
}
$mail->isSMTP();
$mail->SMTPDebug  = 2;
$mail->Host       = $host;
$mail->Port       = $port;
$mail->SMTPSecure = $sec;
$mail->SMTPAuth   = true;
$mail->Username   = $email;
$mail->Password   = $pwd;
$mail->addReplyTo($email, "Case Story Notifier");
$mail->setFrom($email, "Case Story Notifier");
$mail->addAddress($mailto, "Case Story Administrator");
$mail->Subject  = "There is a new case story";
$body = <<<'EOT'
Test from SCP case stories.
EOT;
$mail->WordWrap = 78;
$mail->msgHTML($msg, dirname(__FILE__), true); //Create message bodies and embed images
$mail->addAttachment('phpmailer/examples/images/phpmailer_mini.png','phpmailer_mini.png');  // optional name
$mail->addAttachment('phpmailer/examples/images/phpmailer.png', 'phpmailer.png');  // optional name
 
try {
  $mail->send();
  $results_messages[] = "Message has been sent using SMTP";
}
catch (phpmailerException $e) {
  throw new phpmailerAppException('Unable to send to: ' . $to. ': '.$e->getMessage());
}
}
catch (phpmailerAppException $e) {
  $results_messages[] = $e->errorMessage();
}
 
if (count($results_messages) > 0) {
  echo "<h2>Run results</h2>\n";
  echo "<ul>\n";
foreach ($results_messages as $result) {
  echo "<li>$result</li>\n";
}
echo "</ul>\n";
}
?>
