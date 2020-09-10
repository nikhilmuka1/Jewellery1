<?php

require_once '../page_fragment/define.php';
include ('../page_fragment/dbConnect.php');
include ('../page_fragment/dbGeneral.php');
include ('../page_fragment/njGeneral.php');
include ('../page_fragment/ajGeneral.php');
include ('../page_fragment/njFile.php');
include ('../page_fragment/njEncription.php');

$dbConObj = new dbConnect();
$dbComObj = new dbGeneral();
$njGenObj = new njGeneral();
$ajGenObj = new ajGeneral();
$njFileObj = new njFile();

$njEncryptionObj = new njEncryption();
$conn = $dbConObj->dbConnect();

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

$time = time() + (86400 * 30);
switch ($mode) {
    /* Manage Add to cart */
    case 'setCart':
        $cartItem = array();
        $jsonCartItem = "";
         $custom_options  =   $_POST['productData']['custom_options'] ;
         $custom_price_total=0;
         if($custom_options) {
                for ($x = 0; $x <  count($custom_options); $x++) {
                $custom_id= $custom_options[$x]['value'];
                $custom_price = $ajGenObj->NameById($custom_id, 'custom_option_value','price');
                $custom_price_total += $custom_price;
                }
         }
         $_POST['productData']['custom_price_total'] = $custom_price_total ;
         $product_price_with_Custom = $_POST['productData']['price'] + $custom_price_total;
         $_POST['productData']['total_price'] = $total_price = ($_POST['productData']['qty'] * $product_price_with_Custom);
         $custom_option  =   $_POST['productData']['custom_option'] ;
          $wishid= $_POST['wishid'];
//          print_r( $_COOKIE['cartItems']);
        
        if (isset($_COOKIE['cartItems']) && !empty($_COOKIE['cartItems']))
            {
            $preCartItems = $_COOKIE['cartItems'];
            $preCartItems1 = stripslashes($preCartItems);
            $savedPreCartItems = json_decode($preCartItems1, true);
            $cartItem = $savedPreCartItems;
            if (!isset($savedPreCartItems[$_POST['productId']]) || empty($savedPreCartItems[$_POST['productId']])) {
                $cartItem[$_POST['productId']] = array("productData" => $_POST['productData']);
                $jsonCartItem = json_encode($cartItem);
                setcookie('cartItems', $jsonCartItem, $time, '/');
                echo 'Added Successfully';
                  if(isset($wishid) && $wishid  ){
          	     $res= $dbComObj->deleteData($conn,"wishlist","`id` = '".$wishid."'");
                   }
               setcookie('cartItems', $jsonCartItem, $time, '/');      
            } else {
                 $array1 = $cartItem[$_POST['productId']];
                $array = $array1['productData'];
                $array['qty'] += $_POST['productData']['qty'];               

                 if ($array['qty'] > $_POST['productData']['inv_qty']) {
                    echo  'The requested quantity for "'.$_POST['productData']['productName'].'" is not available. Remaining quanty is '.$_POST['productData']['inv_qty'].'';
                 } else {
              //  $array['custom_price_total'] = $custom_price;
                      if(isset($wishid) && $wishid  ){
          	     $res= $dbComObj->deleteData($conn,"wishlist","`id` = '".$wishid."'");
                   }
                $array['total_price'] = $array['qty'] * $product_price_with_Custom;
                $cartItem[$_POST['productId']] = array("productData" => $array);
                $jsonCartItem = json_encode($cartItem);
                setcookie('cartItems', $jsonCartItem, $time, '/');
                echo 'Added Successfully';
                }
            }
//            print_r($_COOKIE['cartItems']);
        } 
        else {
            if(isset($wishid) && $wishid  )
            {
       	        $res= $dbComObj->deleteData($conn,"wishlist","`id` = '".$wishid."'");
            }
            $cartItem[$_POST['productId']] = array("productData" => $_POST['productData']);
            $jsonCartItem = json_encode($cartItem);
            setcookie('cartItems', $jsonCartItem, $time, '/');
//            print_r($_COOKIE['cartItems']);
            echo 'Added Successfully';
        }
//       print_r($_COOKIE['cartItems']);
        //echo 'Nj';
        break;
        
     case 'setCartGroup':
        $cartItem = array();
        $jsonCartItem = "";
         $custom_options  =   $_POST['productData']['custom_options'] ;
         $custom_price_total=0;
         if($custom_options) {
                for ($x = 0; $x <  count($custom_options); $x++) {
                $custom_id= $custom_options[$x]['value'];
                $custom_price = $ajGenObj->NameById($custom_id, 'custom_option_value','price');
                $custom_price_total += $custom_price;
                }
         }
         $_POST['productData']['custom_price_total'] = $custom_price_total ;
         $product_price_with_Custom = $_POST['productData']['price'] + $custom_price_total;
         $_POST['productData']['total_price'] = $total_price = ($_POST['productData']['qty'] * $product_price_with_Custom);
         $custom_option  =   $_POST['productData']['custom_option'] ;
          $wishid= $_POST['wishid'];
           
        if (isset($_COOKIE['cartItems']) && !empty($_COOKIE['cartItems'])) {
            $preCartItems = $_COOKIE['cartItems'];
            $preCartItems1 = stripslashes($preCartItems);
            $savedPreCartItems = json_decode($preCartItems1, true);
            $cartItem = $savedPreCartItems;
            if (!isset($savedPreCartItems[$_POST['productId']]) || empty($savedPreCartItems[$_POST['productId']])) {
                $cartItem[$_POST['productId']] = array("productData" => $_POST['productData']);
                $jsonCartItem = json_encode($cartItem);
                setcookie('cartItems', $jsonCartItem, $time, '/');
                echo 'Added Successfully';
                  if(isset($wishid) && $wishid  ){
          	     $res= $dbComObj->deleteData($conn,"wishlist","`id` = '".$wishid."'");
                   }
            } else {
                 $array1 = $cartItem[$_POST['productId']];
                $array = $array1['productData'];
                $array['qty'] += $_POST['productData']['qty'];               

                 if ($array['qty'] > $_POST['productData']['inv_qty']) {
                    echo  'The requested quantity for "'.$_POST['productData']['productName'].'" is not available. Remaining quanty is '.$_POST['productData']['inv_qty'].'';
                 } else {
              //  $array['custom_price_total'] = $custom_price;
                      if(isset($wishid) && $wishid  ){
          	     $res= $dbComObj->deleteData($conn,"wishlist","`id` = '".$wishid."'");
                   }
                $array['total_price'] = $array['qty'] * $product_price_with_Custom;
                $cartItem[$_POST['productId']] = array("productData" => $array);
                $jsonCartItem = json_encode($cartItem);
                setcookie('cartItems', $jsonCartItem, $time, '/');
                echo 'Added Successfully';
                }
            }
         //   print_r($_COOKIE['cartItems']);
        } else {
              if(isset($wishid) && $wishid  ){
          	     $res= $dbComObj->deleteData($conn,"wishlist","`id` = '".$wishid."'");
                   }
            $cartItem[$_POST['productId']] = array("productData" => $_POST['productData']);
            $jsonCartItem = json_encode($cartItem);
            setcookie('cartItems', $jsonCartItem, $time, '/');
            //print_r($_COOKIE['cartItems']);
            
            echo 'Added Successfully';
        }
       print_r($_COOKIE['cartItems']);
        //echo 'Nj';
        break;
    case 'updateCart':
        $cartItem = array();
        $jsonCartItem = "";
      
        $custom_price_total = $_POST['productData']['custom_price_total']+ $_POST['productData']['price'] ;
         $product_total_price   = $custom_price_total;
         $custom_option  =   $_POST['productData']['custom_option'] ;
        // aj end
        if (isset($_COOKIE['cartItems']) && !empty($_COOKIE['cartItems'])) {
            $preCartItems = $_COOKIE['cartItems'];
            $preCartItems1 = stripslashes($preCartItems);
            $savedPreCartItems = json_decode($preCartItems1, true);
            $cartItem = $savedPreCartItems;
            if (!isset($savedPreCartItems[$_POST['productId']]) || empty($savedPreCartItems[$_POST['productId']])) {
                //  echo 'Updated Successfully ';
                echo $response = json_encode(array("Updated Successfully", CURRENCY_SYMBOL . number_format($product_total_price, 2)));
                //  print_r($response);
            } else {
                $array1 = $cartItem[$_POST['productId']];
                $array = $array1['productData'];
                $array['qty'] = $_POST['productData']['qty']; //
             
                $array['total_price'] = $product_total_price= $_POST['productData']['qty'] * $product_total_price;
                $cartItem[$_POST['productId']] = array("productData" => $array); //
                $jsonCartItem = json_encode($cartItem); //
                setcookie('cartItems', $jsonCartItem, $time, '/');
                // echo 'Updated Successfully ';
                echo $response = json_encode(array("Updated Successfully", CURRENCY_SYMBOL . number_format($product_total_price, 2)));
            }
            // print_r($_COOKIE['cartItems']);
        } else {
            // echo 'Updated Successfully ';
            echo $response = json_encode(array("Updated Successfully", CURRENCY_SYMBOL . number_format($total_price, 2)));
            //    print_r($response);
        }
        break;

    case 'setCartSingle':

        $cartItem = array();
        $jsonCartItem = "";
        if (isset($_COOKIE['cartItems']) && !empty($_COOKIE['cartItems'])) {
            $preCartItems = $_COOKIE['cartItems'];
            $preCartItems1 = stripslashes($preCartItems);
            $savedPreCartItems = json_decode($preCartItems1, true);
            $cartItem = $savedPreCartItems;
            if (!isset($savedPreCartItems[$_POST['productId']]) || empty($savedPreCartItems[$_POST['productId']])) {
                $cartItem[$_POST['productId']] = array("productData" => $_POST['productData']);
                $array1 = $cartItem[$_POST['productId']];
                $array = $array1['productData'];
                $array['qty'] = $_POST['quantity_wanted'];
                $cartItem[$_POST['productId']] = array("productData" => $array);
                $jsonCartItem = json_encode($cartItem);
                setcookie('cartItems', $jsonCartItem, $time, '/');
                echo 'Added Successfully';
            } else {
                $array1 = $cartItem[$_POST['productId']];
                $array = $array1['productData'];
                $array['qty'] += $_POST['quantity_wanted'];
                $cartItem[$_POST['productId']] = array("productData" => $array);
                $jsonCartItem = json_encode($cartItem);
                setcookie('cartItems', $jsonCartItem, $time, '/');
                echo 'Added Successfully';
            }
            //print_r($_COOKIE['cartItems']);
        } else {
            // $cartItem[$_POST['productId']] = array("productData" => $_POST['productData']);
            if (!isset($_REQUEST['quantity_wanted'])) {
                $cartItem[$_POST['productId']] = array("productData" => $_POST['productData']);
            } else {
                $array = $_POST['productData'];
                $array['qty'] = $_REQUEST['quantity_wanted'];
                $cartItem[$_POST['productId']] = array("productData" => $array);
            }
            $jsonCartItem = json_encode($cartItem);
            setcookie('cartItems', $jsonCartItem, $time, '/');
            //print_r($_COOKIE['cartItems']);
            echo 'Added Successfully';
        }

        //echo 'Nj';
        break;
    /* Manage Add to cart */
    case 'setWishCart':
        $cartItem = array();
        $jsonCartItem = "";
        if (isset($_COOKIE['cartItemsWish']) && !empty($_COOKIE['cartItemsWish'])) {
            $preCartItems = $_COOKIE['cartItemsWish'];
            $preCartItems1 = stripslashes($preCartItems);
            $savedPreCartItems = json_decode($preCartItems1, true);
            $cartItem = $savedPreCartItems;
            if (!isset($savedPreCartItems[$_POST['productId']]) || empty($savedPreCartItems[$_POST['productId']])) {
                $cartItem[$_POST['productId']] = array("productData" => $_POST['productData']);
                $jsonCartItem = json_encode($cartItem);
                setcookie('cartItemsWish', $jsonCartItem, $time, '/');
                echo 'Added Successfully';
            } else {
                $array1 = $cartItem[$_POST['productId']];
                $array = $array1['productData'];
                $cartItem[$_POST['productId']] = array("productData" => $array);
                $jsonCartItem = json_encode($cartItem);
                setcookie('cartItemsWish', $jsonCartItem, $time, '/');
                echo 'Added Successfully';
            }
            //print_r($_COOKIE['cartItems']);
        } else {
            $cartItem[$_POST['productId']] = array("productData" => $_POST['productData']);
            $jsonCartItem = json_encode($cartItem);
            setcookie('cartItemsWish', $jsonCartItem, $time, '/');
            //print_r($_COOKIE['cartItems']);
            echo 'Added Successfully';
        }

        //echo 'Nj';
        break;


    case 'removeCartItem':
        $cartItem = array();
        $jsonCartItem = "";
        if (isset($_COOKIE['cartItems']) && !empty($_COOKIE['cartItems'])) {
            $preCartItems = $_COOKIE['cartItems'];
            $preCartItems1 = stripslashes($preCartItems);
            $savedPreCartItems = json_decode($preCartItems1, true);
            $cartItem = $savedPreCartItems;
            if (!isset($savedPreCartItems[$_POST['productId']]) || empty($savedPreCartItems[$_POST['productId']])) {
                echo 'Removed Successfully';
            } else {
                unset($cartItem[$_POST['productId']]);
                if (sizeof($cartItem) > 0) {
                    $jsonCartItem = json_encode($cartItem);
                    setcookie('cartItems', $jsonCartItem, $time, '/');
                } else {
                    unset($_COOKIE['cartItems']);
                    setcookie("cartItems", "", time() - 3600, '/');
                }
                echo 'Removed Successfully';
            }
            //print_r($_COOKIE['cartItems']);
        } else {
            echo 'Not Removed Successfully';
        }
        break;

    case 'emptyCart':
        if (isset($_COOKIE['cartItems'])) {
            unset($_COOKIE['cartItems']);
            setcookie("cartItems", "", time() - 3600, '/');
        }
        echo 'Removed Successfully';
        break;


    case 'editCart':
        $cartItem = array();
        $jsonCartItem = "";
        if (isset($_COOKIE['cartItems']) && !empty($_COOKIE['cartItems'])) {
            $preCartItems = $_COOKIE['cartItems'];
            $preCartItems1 = stripslashes($preCartItems);
            $savedPreCartItems = json_decode($preCartItems1, true);
            $cartItem = $savedPreCartItems;
            if (!isset($savedPreCartItems[$_POST['productId']]) || empty($savedPreCartItems[$_POST['productId']])) {
                echo 'Updated Successfully';
            } else {
                $array1 = $cartItem[$_POST['productId']];
                $array = $array1['productData'];
                $array['outletId'] = $_POST['productData']['outletId'];
                $array['outletArea'] = $_POST['productData']['outletArea'];
                $array['qty'] = $_POST['productData']['qty'];
                $cartItem[$_POST['productId']] = array("productData" => $array);
                $jsonCartItem = json_encode($cartItem);
                setcookie('cartItems', $jsonCartItem, $time, '/');
                echo 'Updated Successfully';
            }
            //print_r($_COOKIE['cartItems']);
        } else {
            echo 'Updated Successfully';
        }
        break;
         case 'TotalItemCart':
          //   $total_item_Count = count((array) json_decode($_COOKIE['cartItems'])); 
           //  echo trim($total_item_Count);
             $sumArray = array();
                  $cartItems =json_decode($_COOKIE['cartItems']);
                  foreach ($cartItems as $cartItem) {
                    foreach ($cartItem as $key => $item) {
                            $sumArray[]+=$item->qty;
                          }
                        }

                ($sumArray);
               $total_item_Count=  array_sum($sumArray);
               echo $total_item_Count ;
               break;
}
//
function removeCartItem_Nj() {
    if (isset($_COOKIE['cartItems'])) {
        unset($_COOKIE['cartItems']);
        setcookie("cartItems", "", time() - 3600, '/');
    }
}

?>  