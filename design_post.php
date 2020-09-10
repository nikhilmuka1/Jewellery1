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
$dates = date("Y-m-d-H-i-s");
$dname = $_POST["name"];
$demail = $_POST["email"];
$ddescription = $_POST["description"];
$dmobileno = $_POST["phone"];
$data = array();
$pathToSave = "./images/custom/";
$image = $_FILES['imageUpload'];
$filename = '';
$name = preg_replace('/[^a-zA-Z0-9_]/', '-', $_POST['name']);
if (isset($_FILES['imageUpload']['name']) && !empty($_FILES['imageUpload']['name'])) {
    $image = $_FILES['imageUpload'];
    $name = preg_replace('/[^a-zA-Z0-9_]/', '-', $_POST['name']);
    $filename = $name . "-" . $dates;

    $main_logo = $njFileObj->uploadImage($image, $filename, $pathToSave);
    $image_source = $main_logo;
    $data['image'] = $main_logo;
}

$table = "custom_design";
$data['name'] = $dname;
$data['email'] = $demail;
$data['mobile'] = $dmobileno;
$data['message'] = $ddescription;
$data['added_on'] = date("Y-m-d H:i:s");
$data['status'] = '1';
$dbComObj->addData($conn, $table, $data);

$from = 'Hello Webmaster,
New inquiry is come from';
$subject = 'Enquiry from Submit your design form';
$femailid = "support@fxpips.co.uk";
$message = "Hello ,<br><br>
                <b>New Enquiry is come from</b><br><br>
                Name: " . $dname . "<br><br>E-mail: " . $demail . "<br><br>Message:" . $ddescription . "<br><br>
                Mobile No: " . $dmobileno . "<br><br>";

$headers = 'From: &marketplace;' . $femailid . '&marketplace;' . "\r\n" .
        'Reply-To: &marketplace;' . $femailid . '&marketplace;' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();
$headers = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'From: marketplace <' . $femailid . '>' . "\r\n";
$header .= "Content-Type: application/octet-stream; name=\"" . $filename . "\"\r\n"; // use different content types here
$header .= "Content-Transfer-Encoding: base64\r\n";
$header .= "Content-Disposition: attachment; filename=\"" . $filename . "\"\r\n\r\n";
mail('mmfinfotech1075@gmail.com', $subject, $message, $headers, $from);
mail('support@fxpips.co.uk', $subject, $message, $headers, $from);

echo "Reload : design added successfully.";
?>

