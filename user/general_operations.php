<?php
include '../page_fragment/define.php';
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
if ($_SESSION) {
    if (isset($_SESSION['user_id']))
        $login_id = $_SESSION['user_id'];
    if (isset($_SESSION['DH_seller_id'])) {
        $login_id = $_SESSION['DH_seller_id'];
        $loginSeller = $_SESSION['DH_seller_type_name'];
    }
}
if ($mode == "managePersonalInfo")
{
    // print_r($_POST);
    // die;
    $dates = date("Y-m-d-H-i-s");
    $condition = " `id`='" .$_POST['id']. "'";
    $result = $dbComObj->viewData($conn,"users", "*", $condition);
    $num = $dbComObj->num_rows($result);
    if ($num > 0) {
        
        if (isset($_FILES['image']['name']) && !empty($_FILES['image']['name'])) {
            $image = $_FILES['image'];
            $name = preg_replace('/[^a-zA-Z0-9_]/', '-', $_POST['firstname']);
            $filename = $name . "-" . $dates;
            $pathToSave = "../images/user/";
            $thumbPathToSave = "../images/user/thumb/";
            $main_logo = $njFileObj->uploadImage($image, $filename, $pathToSave);
            $image_source = "../images/user/" . $main_logo;
            $thumb_logo = $njFileObj->resizeImage($image_source, $filename, $thumbPathToSave);
            $data['image'] = $main_logo;
        }
        
        $data['name'] = $_POST['firstname'];
        $data['email'] = $_POST['email'];
        $data['contact_no'] = $_POST['contact_no'];
        $data['updated_on'] = date("Y-m-d H:i:s");
        $data['updated_by'] = $_POST['id'];
        //print_r($data);
        $dbComObj->editData($conn,"users", $data,$condition);
        echo "Reload : User details updated successfully.";
        //echo "Redirect : Question details added successfully. URL " . BASE_URL . "question/";
    } else {
        echo "Error : User details not found in system. Please try again.";
    }
} 

else if($mode == "managePasswordInfo")
{
    $condition = " `id`='" .$_POST['id']. "'"; 
    $result = $dbComObj->viewData($conn,"users", "*", $condition);
    $num = $dbComObj->num_rows($result);
    if ($num > 0) {
       $temp_login= $_POST['temp_login'];
        if($temp_login==1){
            $num_Chkp=1;
        }else {
        $chkP = $dbComObj->viewData($conn,"users", "*","`md5_password` = '".md5($_POST['old_passwd'])."'");
       $num_Chkp = $dbComObj->num_rows($chkP);
        }
        
        if ($num_Chkp) 
        {
         //   print_R($_POST);
            if($_POST['passwd'] == $_POST['confirmation'])
            {
                $data['password'] = $_POST['passwd'];;
                $data['md5_password'] = md5($_POST['passwd']);
                $dbComObj->editData($conn,"users", $data,$condition);  
                   echo "Redirect : Password changed successfully. URL " . BASE_URL ."";  
            }
            else {
                echo "Error : New password not match with confirmation password. Please try again.";
            }
        }
        else {
            echo "Error : Current password not match. Please try again.";
        }
    }
    else {
        echo "Error : User details not found in system. Please try again.";
    }
}
if($mode == 'OrderCancel')
{   
   // print_r($_POST);
    //$dbComObj->deleteData($conn,$table,"`product_id` = '".$_POST['a']."'");
    $data['order_status'] = '3';
      $data['reason_cancel'] = $_POST['reasoncancel'];
    
     $condition ="`id` = '".$_POST['a']."'";
    $res= $dbComObj->editData($conn,"orders",$data,$condition);
       if($res){
           echo 1; 
             ////manage order inv quantity start 
               $condition_qty = " `product_id` = '" . $_POST['pId'] . "'  ";
                $result_qty = $dbComObj->viewData($conn, 'products', "inv_qty", $condition_qty);
                $products = $dbComObj->fetch_object($result_qty);
                $inv_qty = $products->inv_qty;
                if ($products->inv_qty) {
                 (int)$_POST['qty'];
                   $a['inv_qty'] = (int)$products->inv_qty + (int)$_POST['qty'];
                    $dbComObj->editData($conn, 'products', $a, "`product_id` = '" . $_POST['pId'] . "'");
                }
           $order_no = $_POST['order_no'];
        //notification start 
//            print_r($_POST);
                if ($_POST['sId'] == 0) {
//                  echo 'sneha';
                    $user_type = "Admin";
                    $resultajm = $dbComObj->viewData($conn, 'admin', "*", '1');
                    $admin = $dbComObj->fetch_assoc($result_notify);
                    if ($admin['id'])
                        $notify_user_id = $admin['id'];
                    else
                        $notify_user_id = '1';
                } else {
//                    echo 'aaa';
                    $user_type = "Seller";
                    $notify_user_id = $_POST['sId'];
                }

                $msg = 'your Order No. <strong>#' . $order_no . '</strong> is canceled ';
                $notification['notify_user_id'] = $notify_user_id;
                $notification['user_id'] = $login_id;
                $orders['order_id'] = $_POST['a'];
                $notification['msg'] = $msg;
                $notification['notify_type'] = 2;
                $notification['user_type'] = $user_type;
                $notification['added_on'] = date("Y-m-d H:i:s");
                $dbComObj->addData($conn, "notification", $notification);
                // notification end    
              
       
       }
       else {echo 0;}
  
    
}
?>