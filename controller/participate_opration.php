<<<<<<< HEAD
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

$table = "contests_participate";
//`id`, `contest_id`, `seller_id`, `description`, `product_id`, `added_on`, `updated_on`, `status`, `admin_status
switch($mode)
{
/*  Add to cart */
    case 'add':
  //  print_r($_POST);
        extract($_POST);
     $product_id =array_unique($product_id);
     $product_id = implode(",",$product_id);
     $condition = " `seller_id` = '" . $login_id . "' and contest_id = '" . $contest_id . "'";
    $result = $dbComObj->viewData($conn, $table, "*", $condition);
    $num = $dbComObj->num_rows($result);
  
    if ($num <= 0) {
            $data = array();
            $data['contest_id'] = $contest_id;
            $data['seller_id'] = $login_id;
            $data['title'] = $title;
            $data['description'] = $description;
            $data['selected_product'] = $product_id;
            $data['added_on'] = date("Y-m-d H:i:s");
 
            $dbComObj->addData($conn,$table,$data);
           
            echo "Success :Added successfully.";
    
      } else {
        echo "Error : You are already participate on this Contest .";
    }
=======
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

$table = "contests_participate";
//`id`, `contest_id`, `seller_id`, `description`, `product_id`, `added_on`, `updated_on`, `status`, `admin_status
switch($mode)
{
/*  Add to cart */
    case 'add':
  //  print_r($_POST);
        extract($_POST);
     $product_id =array_unique($product_id);
     $product_id = implode(",",$product_id);
     $condition = " `seller_id` = '" . $login_id . "' and contest_id = '" . $contest_id . "'";
    $result = $dbComObj->viewData($conn, $table, "*", $condition);
    $num = $dbComObj->num_rows($result);
  
    if ($num <= 0) {
            $data = array();
            $data['contest_id'] = $contest_id;
            $data['seller_id'] = $login_id;
            $data['title'] = $title;
            $data['description'] = $description;
            $data['selected_product'] = $product_id;
            $data['added_on'] = date("Y-m-d H:i:s");
 
            $dbComObj->addData($conn,$table,$data);
           
            echo "Success :Added successfully.";
    
      } else {
        echo "Error : You are already participate on this Contest .";
    }
>>>>>>> 6b2740f392bdf664df5ab46676ccbeb84109e8db
}