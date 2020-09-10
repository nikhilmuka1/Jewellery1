<?php
$email = MAIL_USER;
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->SMTPDebug = 0;
$mail->Debugoutput = 'html';
$mail->Host = MAIL_HOST;
$mail->Port = MAIL_PORT;
$mail->Mailer = "smtp";
//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = MAIL_SMTPSecure;

//Whether to use SMTP authentication
$mail->SMTPAuth = true;
$mail->Username = $email;
$mail->Password = MAIL_PWD;

$mail->SetFrom($email,MAIL_NAME);
