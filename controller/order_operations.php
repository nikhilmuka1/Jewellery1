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
if ($_SESSION) {
    if (isset($_SESSION['user_id']))
        $login_id = $_SESSION['user_id'];
    if (isset($_SESSION['DH_seller_id'])) {
        $login_id = $_SESSION['DH_seller_id'];
        $loginSeller = $_SESSION['DH_seller_type_name'];
    }
}
// cart item details cookie
$cartItems = $_COOKIE['cartItems'];
$cartItems = json_decode($_COOKIE['cartItems']);
$total_item_cart = count((array) $cartItems);
//end 
$table = "`orders`";
//echo $mode;
if ($mode == "addOrder") {
//    print_r($_POST);
    extract($_POST);

    $email = "";
    if ($address_id == '') {
        $condition_adr = " `user_id` = '" . $login_id . "' order by id desc LIMIT 1 ";
        $result_adr = $dbComObj->viewData($conn, 'billing_address', "*", $condition_adr);
        $address = $dbComObj->fetch_object($result_adr);
        $address_id = $address->id;
        $email = $address->email;
    } else {
        $address_id;
        $address_arr = (explode(",", $address_id));
        $address_id = $address_arr[0];
        $email = $address_arr[1];
    }

    if ($cartItems) {
        //echo '</pre>'; print_r($cartItems); die;
        foreach ($cartItems as $cartItem) {
            foreach ($cartItem as $key => $item) {
                $order_no = 'ORD' . mt_rand();
                $orders = array();
                $orders['order_no'] = $order_no;
                $orders['user_id'] = $login_id;
                $orders['seller_id'] = $item->sellerId;
                $orders['seller_name'] = $item->sellerName;
                $orders['brand_id'] = $item->Brand;
                $orders['address_id'] = $address_id;
                $orders['sales_tax'] = $Sales_tax;
                $orders['payment_type'] = $order_type;
                $orders['product_id'] = $item->productId;
                $orders['product_name'] = $item->productName;
                $orders['price'] = $item->price;
                $orders['product_image'] = $item->productImage;
                $orders['sku_product'] = $item->sku_product;
                $orders['quantity'] = $item->qty;
                $orders['discount'] = $item->discount;
                $orders['total_price'] = $item->total_price;
                if ($item->custom_options) {
                    $orders['custom_options'] = json_encode($item->custom_options);
                }
                $orders['custom_price_total'] = json_encode($item->custom_price_total);
                $orders['added_on'] = date("Y-m-d H:i:s");
                //  echo '<pre>';print_r($orders); echo '</pre>';
                $dbComObj->addData($conn, $table, $orders);
                $order_ID = $dbComObj->insert_id($conn);
                ////manage order inv quantity start 
                $condition_qty = " `product_id` = '" . $item->productId . "'  ";
                $result_qty = $dbComObj->viewData($conn, 'products', "inv_qty", $condition_qty);
                $products = $dbComObj->fetch_object($result_qty);
                $inv_qty = $products->inv_qty;
                if ($inv_qty) {
                    $a['inv_qty'] = $inv_qty - $item->qty;
                    $dbComObj->editData($conn, 'products', $a, "`product_id` = '" . $item->productId . "'");
                }
                //notification start 
                if ($item->sellerId == 0) {
                    $user_type = "Admin";
                    $resultajm = $dbComObj->viewData($conn, 'admin', "*", '1');
                    $admin = $dbComObj->fetch_assoc($result_notify);
                    if ($admin['id'])
                        $notify_user_id = $admin['id'];
                    else
                        $notify_user_id = '1';
                } else {
                    $user_type = "Seller";
                    $notify_user_id = $item->sellerId;
                }

                $msg = 'you have Get  new orders  <strong>#' . $order_no . '</strong> ';
                $notification['notify_user_id'] = $notify_user_id;
                $notification['user_id'] = $login_id;
                $orders['order_id'] = $order_ID;
                $notification['msg'] = $msg;
                $notification['notify_type'] = 2;
                $notification['user_type'] = $user_type;
                $notification['added_on'] = date("Y-m-d H:i:s");
                $dbComObj->addData($conn, "notification", $notification);
                // notification end    
                if ($order_ID) {
                    $time = time() - (86400 * 30);
//                     $address->email; die;
                    $from = 'Hello Webmaster,
                New inquiry is come from';
                    $subject = 'Invoice mail';
                    $femailid = "support@fxpips.co.uk";
                    $message = "Hello Webmaster,<br><br>
                    <h4> Your order placed on date " . date("Y-m-d H:i:s") . "and order id is #" . $order_no;

                    $headers = 'From: &marketplace;' . $femailid . '&marketplace;' . "\r\n" .
                            'Reply-To: &marketplace;' . $femailid . '&marketplace;' . "\r\n" .
                            'X-Mailer: PHP/' . phpversion();
                    $headers = 'MIME-Version: 1.0' . "\r\n";
                    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                    $headers .= 'From: marketplace <' . $femailid . '>' . "\r\n";
                    mail('support@fxpips.co.uk', $subject, $message, $headers, $from);
                    mail($email, $subject, $message, $headers, $from);
                }
            }
        }
        if ($order_ID) {
            echo " Success :Added to order successfully.";
            setcookie('cartItems', "", $time, '/');
        }
    }
}

if ($mode == 'removeOrder') {
    $res = $dbComObj->deleteData($conn, $table, "`id` = '" . $_POST['id'] . "'");
    if ($res)
        echo "Success :Remove  ORder successfully.";
    else
        echo "Error : Not Removed  please try again later";
}



