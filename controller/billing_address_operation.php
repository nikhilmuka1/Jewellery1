<?php
require_once '../page_fragment/define.php';
include ('../page_fragment/dbConnect.php');
include ('../page_fragment/dbGeneral.php');
include ('../page_fragment/njGeneral.php');
include ('../page_fragment/njFile.php');
$dbConObj = new dbConnect();
$dbComObj = new dbGeneral();
$njGenObj = new njGeneral();
$conn = $dbConObj->dbConnect();
$njFileObj = new njFile();

$mode = "";
$requestData = array();
if(isset($_POST['mode'])) {
    $mode = base64_decode($_POST['mode']);
    unset($_POST['mode']);
    $requestData = $_POST;
} elseif(isset($_GET['mode'])) {
    $mode = base64_decode($_GET['mode']);
    unset($_GET['mode']);
    $requestData = $_GET;
}
if($_SESSION){
   if(isset($_SESSION['user_id']))
        $login_id=$_SESSION['user_id'];
    if(isset($_SESSION['DH_seller_id'])) {
     $login_id=$_SESSION['DH_seller_id'];
      $loginSeller=$_SESSION['DH_seller_type_name'];
    }
}

$table = "billing_address";
//if ($mode == "addToCart") 
//`user_id`, `first_name`, `last_name`, `city`, `email`, `zip_code`, `address`, `phone_no`, `added_on`, `updated_on`, `ip_address`
switch($mode)
{
/*  Add to cart */
    case 'addBillingAddress':
//print_r($_POST);
        extract($_POST);
  
            $data = array();
            $data['user_id'] = $login_id;
            $data['first_name'] = $first_name;
            $data['last_name'] = $last_name;
            $data['city'] =  $city;
             $data['email'] =  $email;
            $data['zip_code'] = $zip_code;
            $data['address'] = $address;
             $data['phone_no'] = $phone_no;
            $data['ip_address'] = $_SERVER['REMOTE_ADDR'];
            $data['added_on'] = date("Y-m-d H:i:s");
 
            $dbComObj->addData($conn,$table,$data);
           
            echo "Success :Added successfully.";
       
         

    break;    
   /*  remove to address */ 
    case 'deleteAddress':
     //print_r($_POST);
       $res= $dbComObj->deleteData($conn,$table,"`id` = '".$_POST['a']."'");
     //   print_r($res);
    if($res)    echo "Success : Address deleted successfully.";
    else echo  "Error :Not Removed  please try again later";
    break;
       /*  edit / manage cart */ 
    
}