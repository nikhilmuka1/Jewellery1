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
if (isset($_POST['mode'])) {
    $mode = base64_decode($_POST['mode']);
    unset($_POST['mode']);
    $requestData = $_POST;
} elseif (isset($_GET['mode'])) {
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
$table = "follower";

if ($mode == "addFollower") {
    
   // print_r($_POST);
     extract($_POST);
     if($login_id){
        $condition = " `user_id` = '".$login_id."' and seller_id= '".$sid."'";
        $result = $dbComObj->viewData($conn,$table,"*",$condition);
        $num = $dbComObj->num_rows($result);
        if ($num == 0) 
        {
            $data = array();
            $data['user_id'] = $login_id;
            $data['seller_id'] = $sid;
           $dbComObj->addData($conn,$table,$data);
            echo "Following";
        } else {
              $res= $dbComObj->deleteData($conn,$table,$condition);
            echo "Follow";
        }
     }else{
         echo "Not Login";
     }
} 

if($mode == 'removeFollower')
{
    $res= $dbComObj->deleteData($conn,$table,"`id` = '".$_POST['id']."'");
    if($res)    echo "Remove wishlist product successfully.";
    else echo  "Not Removed  please try again later";
}



