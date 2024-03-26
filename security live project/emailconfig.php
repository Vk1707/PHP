<?php
include('PHPMailer/PHPMailerAutoload.php');

$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = '10.20.10.18';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'email.support@silaris.in';                 // SMTP username
$mail->Password = 'google@555';                           // SMTP password
#$mail->SMTPSecure = 'tls';                     // Enable TLS encryption, `ssl` also accepted
$mail->Port = 25;                                    // TCP port to connect to


     // Add a recipient
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('rajesh.bisht@silaris.in', 'Information');
//$mail->addCC('abhinav.tiwari@silaris.in','Tanay Dobhal');
//$mail->addCC('accounts@silaris.in','Rishi Kumar Jha');
//$mail->addCC('isms@silaris.in','Tanay Dobhal');
$mail->addCC('emailer@silaris.in','Emailer');

//$mail->addBCC('bcc@example.com');

//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML


//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
$mail->setFrom('email.support@silaris.in', 'Email Support');



?>