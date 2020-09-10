<?php
//include '../controller/PHPMailerAutoload.php';
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->Host = MAIL_HOST;
$mail->SMTPAuth = true;
$mail->SMTPDebug = 0;
$mail->Debugoutput = 'html';
$mail->Mailer = "smtp";
$mail->SMTPSecure = MAIL_SMTPSecure;
$mail->Username = MAIL_USER;
$mail->Password = MAIL_PWD;
$mail->Port = MAIL_PORT;
$mail->SetFrom(MAIL_USER, MAIL_NAME);
$mail->AddReplyTo(MAIL_USER, MAIL_NAME);
//$mail->AddAddress(MAIL_SUPPORT, MAIL_SUPPORT_NAME);