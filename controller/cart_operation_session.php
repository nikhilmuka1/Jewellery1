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

$table = "cart";
//if ($mode == "addToCart") 

switch($mode)
{
/*  Add to cart */
    case 'addToCart':
      // print_r($_POST);
        extract($_POST);
          if(isset($wishid) && $wishid ){
          	$res= $dbComObj->deleteData($conn,"wishlist","`id` = '".$wishid."'");
          }
                  $custom_id1; 
                  $custom_price1;
                   $custom_title1 ;

                   $custom_id2 ;
                   $custom_price2; 
                   $custom_title2;
                   
                   $custom_id3;
                   $custom_price3 ;
                   $custom_title3;
         $condition = " `user_id` = '".$login_id."' and product_id= '".$product_id."'";
        $result = $dbComObj->viewData($conn,$table,"*",$condition);
        $num = $dbComObj->num_rows($result);
        if ($num == 0) 
        {
        	 $conditionp = "`product_id` = ".$product_id." ";
            $resultp = $dbComObj->viewData($conn, "products", "*", $conditionp);
             $product = $dbComObj->fetch_object($resultp); 
            $product_price_with_Custom =  $product->price+$custom_price1+$custom_price2+$custom_price3;
             $total_price= $qty* $product_price_with_Custom;
            $data = array();
            $data['user_id'] = $login_id;
            $data['product_id'] = $product_id;
            $data['qty'] = $qty;
            $data['item_price'] =  $product_price_with_Custom;
             $data['total_price'] =  $total_price;
            $data['sku_code'] = $product->SKU;
            $data['seller_id'] = $product->seller_id;
            $data['ip_address'] = $_SERVER['REMOTE_ADDR'];
            $data['added_on'] = date("Y-m-d H:i:s");
         
            $dbComObj->addData($conn,$table,$data);
        
            echo "Added to Cart successfully.";
        } else {
            echo "Products is already in your Cart/Bag.";
        }

    break;    
   /*  remove to cart */ 
    case 'removeToCart':
       $res= $dbComObj->deleteData($conn,$table,"`id` = '".$_POST['id']."'");
    if($res)    echo "Remove wishlist product successfully.";
    else echo  "Not Removed  please try again later";
    break;
       /*  edit / manage cart */ 
    case 'manageCart':

    break;    
}