<?php

include './page_fragment/define.php';
include ('./page_fragment/dbConnect.php');
include ('./page_fragment/dbGeneral.php');
include ('./page_fragment/njGeneral.php');
include ('./page_fragment/njFile.php');
include ('./page_fragment/njEncription.php');
include ('./page_fragment/ajCategoryView.php');
include ('./page_fragment/ajGeneral.php');

$dbConObj = new dbConnect();
$dbComObj = new dbGeneral();
$njGenObj = new njGeneral();
$ajGenObj = new ajGeneral();
$njFileObj = new njFile();
$njEncryptionObj = new njEncryption();
$conn = $dbConObj->dbConnect();

require_once("./mails/dompdf_config.inc.php");
require_once("./mails/functions.inc.php");
require_once("./mails/classEmail.php");
$fname = $_POST["first_name"];
$lname = $_POST['last_name'];
$email = $_POST["email"];
$comment = $_POST["comment"];
$mobile = $_POST["mobile"];
$name = $fname . $lname;
$data = array();

$table = "contactus";
$data['first_name'] = $fname;
$data['last_name'] = $fname;
$data['email'] = $email;
$data['comment'] = $comment;
$data['telephone'] = $mobile;
$name = $fname . ' ' . $lname;
$data['added_on'] = date("Y-m-d H:i:s");
$dbComObj->addData($conn, $table, $data);

$from = 'Hello Webmaster,
New inquiry is come from';
$subject = 'enquiry from Contact form';
$femailid = "support@fxpips.co.uk";
$message = "Hello Webmaster,<br><br>
<b>New inquiry is here</b><br><br>
Name: " . $name . "<br><br>E-mail: " . $email . "<br><br>
Mobile No: " . $mobile . "<br><br> <b>Note: </b>This Inquiry is come from the website marketplace ,because the user is properly filled the inquiry form.
 ";
$headers = 'From: &marketplace;' . $femailid . '&marketplace;' . "\r\n" .
        'Reply-To: &marketplace;' . $femailid . '&marketplace;' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();
$headers = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'From: marketplace <' . $femailid . '>' . "\r\n";
mail('mmfinfotech1075@gmail.com', $subject, $message, $headers, $from);
mail('support@fxpips.co.uk', $subject, $message, $headers, $from);
//        echo 'mail sent successfully';
//print_r($SendEmail);
//    echo "Reload : design added successfully.";
//} else {
//    echo "Error : design already exist.";
///}
echo 'Reload : Enquiry Sent Successfully';
?>

