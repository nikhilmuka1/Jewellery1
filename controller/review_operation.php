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
$table = "reviews";

if ($mode == "addReview") {
//print_r($_POST);
   extract($_POST);
       if (isset($login_id) && $login_id) {
            //image    
            $image = $_FILES['image'];
        $dates = date("Y-m-d-H-i-s");
        $data = array();
        // $conditions = " `id`='".$_SESSION['vendor_id']."'";
        if (isset($_FILES['image']['name']) && !empty($_FILES['image']['name'])) {
            $image = $_FILES['image'];
            $name = preg_replace('/[^a-zA-Z0-9_]/', '-', $_POST['title']);
            $filename = $name . "-" . $dates;
            $pathToSave = "../images/reviews/";
            $thumbPathToSave = "../images/reviews/thumb/";
            $main_logo = $njFileObj->uploadImage($image, $filename, $pathToSave);
            $image_source = "../images/reviews/" . $main_logo;
            $thumb_logo = $njFileObj->resizeImage($image_source, $filename, $thumbPathToSave);
            $data['image'] = $main_logo;
        }
        $slug = $njGenObj->removeSpecialChar($title);
            $data['user_id'] = $login_id;
            //  $data['title'] = $title;
               if(isset($product_id) && $product_id )
                 $data['product_id'] = $product_id;
                  if(isset($seller_id) && $seller_id )
                  $data['seller_id'] = $seller_id;
                $data['description'] =base64_encode($description);
                  $data['review_type'] = '1' ;
                    $data['rating'] = $rating;
            $data['ip'] = $_SERVER['REMOTE_ADDR'];
            $data['added_on'] = date("Y-m-d H:i:s");
 
            $dbComObj->addData($conn,$table,$data);
        
            echo "Reload :Added to review successfully.";
        } 
          else {
        echo "Error : Only registered users can write reviews.";
    }
   
} 

if($mode == 'removeWishlist')
{
    $res= $dbComObj->deleteData($conn,$table,"`id` = '".$_POST['id']."'");
    if($res)    echo "Remove wishlist product successfully.";
    else echo  "Not Removed  please try again later";
}



