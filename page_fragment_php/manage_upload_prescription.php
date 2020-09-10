<?php
require_once '../page_fragment/define.php';
include ('../page_fragment/dbConnect.php');
include ('../page_fragment/dbGeneral.php');
include ('../page_fragment/njGeneral.php');
include ('../page_fragment/njFile.php');
include ('../page_fragment/njEncription.php');
$dbConObj = new dbConnect();
$dbComObj = new dbGeneral();
$njGenObj = new njGeneral();
$njFileObj = new njFile();
$njEncryptionObj = new njEncryption();
$conn = $dbConObj->dbConnect();

$mode = "";
$requestData = array();
if(isset($_POST['todo'])) {
    $mode = base64_decode($_POST['todo']);
    unset($_POST['todo']);
    $requestData = $_POST;
} elseif(isset($_GET['todo'])) {
    $mode = base64_decode($_GET['todo']);
    unset($_GET['todo']);
    $requestData = $_GET;
}
$table = "upload_prescription";
$i = 1;
//echo $mode;
if ($mode == "upload_prescription")
{
    //print_r($_POST);
    $user_id = base64_decode($_POST['id']);
    if($user_id)
    {
        
        $image = $_FILES['fileUpload'];
        $dates = date("Y-m-d-H-i-s");
        $data = array();
        // $conditions = " `id`='".$_SESSION['vendor_id']."'";
        if (isset($_FILES['fileUpload']['name']) && !empty($_FILES['fileUpload']['name'])) {
            $image = $_FILES['fileUpload'];
            $name = preg_replace('/[^a-zA-Z0-9_]/', '-',"prescription");
            $filename = $name . "-" . $dates;
            $pathToSave = "../images/upload_prescription/";
            $thumbPathToSave = "../images/upload_prescription/thumb/";
            $main_logo = $njFileObj->uploadImage($image, $filename, $pathToSave);
            $image_source = "../images/upload_prescription/" . $main_logo;
            $thumb_logo = $njFileObj->resizeImage($image_source, $filename, $thumbPathToSave);
            $data['image'] = $main_logo;
        }
        $data['location'] = $_POST['location'];
        $data['address'] = mysqli_real_escape_string ($conn, $_POST['address']);
        $data['payment_mode'] = "Cash";
        $data['user_id'] = $user_id;
        $data['status'] = "0";
        
        $data['added_on'] = date("Y-m-d H:i:s");
        $data['added_by'] = $user_id;
        
        $dbComObj->addData($conn,$table, $data);
        echo "Reload : Thank you for uploading prescription. We will contact you shortly.";
    }
    else
    {
        echo 'Error : Please firsly register your account or login.';
    }
} 

?>