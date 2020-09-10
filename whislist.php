<?php
include './include/header.php';
//print_r($_SESSION);
$login_id = '';
if ($_SESSION) {
    if (isset($_SESSION['user_id']))
        $login_id = $_SESSION['user_id'];
    if (isset($_SESSION['DH_seller_id'])) {
        $login_id = $_SESSION['DH_seller_id'];
        $loginSeller = $_SESSION['DH_seller_type_name'];
    }
}
$cartItems = $_COOKIE['cartItemsWish'];
$cartItems = json_decode($_COOKIE['cartItemsWish']);
$total_item_cart = count((array) $cartItems);
?>
<style>
    .loading-overlay{
        position: fixed;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        z-index: 999;
        background: rgba(183, 173, 173, 0.5) url(<?php echo BASE_URL; ?>img/loading.gif) no-repeat center center;
        /*background: rgba(0,0,0,0.5);*/
        display: none;
    }
    .sr-msg-error {
        border: 1px solid red;
        color: red !important;
    }
</style>
<div id="loading-overlay" class="loading-overlay"></div>     
<div class="whislist">
    <div class="container">
        <div  id="resajmsg"> </div>
        
        <div class="row">
            <?php
            if ($cartItems) { //print_r($cartItems);
                $i = 0;
                $wrap_count = 4; // you can change this no of divs to wrap
                foreach ($cartItems as $cartItem) {
                    foreach ($cartItem as $key => $item) {
                        //  print_r( $value);
                        // print_r( $value['productData']['productId']);
                        //die
                        $i+=1;
                        if ($i % $wrap_count == 1) {
                            echo '<div class="full-width">';
                        }
                        $productId = $item->productId;
                        $sellerId = $item->sellerId;
                        $slug = $item->slug;
                        $sku_product = $item->sku_product;
                        $productName = $item->productName;
                        $total_price = $item->total_price;
                        // image code start
                        $condition_image_cart = "`product_id` = " . $productId . " ORDER BY RAND()  LIMIT 1";
                        $result_imagec = $dbComObj->viewData($conn, "product_image", "*", $condition_image_cart);
                        $data_imagec = $dbComObj->fetch_object($result_imagec);

                        if (isset($data_imagec->thumb_image))
                            $thumb_image_cart = BASE_URL . 'images/products/thumb/' . $data_imagec->thumb_image;
                        else
                            $thumb_image_cart = BASE_URL . 'frontend/img/default-product-image.png';
                        // end of image code
                        if ($productId) {
                            ?>

                            <div class="gray-outline-box"  id="wishlistproduct<?php echo $data->id; ?>">
                                <h3 class="border-bottom">Shipping from cyprus</h3>
                                <div class="full-width margintop30">
                                    <div class="col-md-3 col-sm-3">
                                        <a href="<?php echo $datail_page ?>" ><img src="<?php echo $thumb_image_cart; ?>" class="img-responsive"></a>
                                    </div>
                                    <div class="col-md-3">
                                        <a href="<?php echo $datail_page ?>" ><h3><?php echo $productName; ?></h3></a>
                                        <p><?php echo base64_decode($data->product_description); ?></p> 
                                        <a href="javascript:void();"  class="btn btn-success" onclick="removeWishlist('<?php echo $data->id; ?>')" >Remove Item</a>

                                    </div>
                                    <div class="col-md-3">
                                        <p><?php echo $data_price; ?></p>        
                                    </div>
                                    <div class="col-md-3">
                                          <form class="frm-slt">
                                       <?php 
                                               if ($data->is_in_stock == '1' && $data->inv_qty > 0) { ?> 
                                                <input type="number" min="0" max="99" class="form-control" placeholder="quantity" id="cart_qty" name="qty" value="1">
                                                <a  onclick="addToCart('<?php echo $data->product_id; ?>', '<?php echo $data->id; ?>')" class="btn btn-success btn-block margintop10">Move to bag <i class="fa fa-angle-right"></i></a>                                                        
                                       <?php } ?>
                                           <p class="margintop10"> <?php echo $data->inv_qty ?>  left in stock</p>
                                             </form>
                                    </div>
                                </div>
                            </div>
                <?php
                if ($i % $wrap_count == 0) {
                    echo '</div>';
                }
                ?>


                <?php
            }
            if ($i % $wrap_count != 0) {
                echo '</div>';
            }
            //  if ($count%3 != 1) echo "</div>"; //This is to ensure there is no open div if the number of elements in user_kicks is not a multiple of 4
        }
    }
} else {
    //  echo '<h2 align= "center">Your cart is Empty</h2>';
}
?>
            <?php
            if ($login_id) {
                $condition = "INNER JOIN products ON wishlist.product_id = products.product_id where wishlist.user_id=" . $login_id . " ";
                $result = $dbComObj->viewJoinData($conn, "wishlist", "*", $condition);
                $num = $dbComObj->num_rows($result);
                if ($num > 0) {
                    $i = 0;
                    $wrap_count = 4; // you can change this no of divs to wrap
                    while ($data = $dbComObj->fetch_object($result)) {
                        ?>
                        <?php
                        // image code start
                        $condition_image = "`product_id` = " . $data->product_id . " ORDER BY RAND()  LIMIT 1";
                        $result_image = $dbComObj->viewData($conn, "product_image", "*", $condition_image);
                        $data_image = $dbComObj->fetch_object($result_image);

                        if (isset($data_image->thumb_image))
                            $thumb_image = BASE_URL . 'images/products/thumb/' . $data_image->thumb_image;
                        else
                            $thumb_image = BASE_URL . 'frontend/img/default-product-image.png';
                        // end of image code

                        if ($data->price)
                            $data_price = '$ ' . ($data->price);
                        else
                            $data_price = '-';
                        $i+=1;
                        if ($i % $wrap_count == 1) {
                            echo '<div class="full-width">';
                        }
                        $url_id = $njEncryptionObj->safe_b64encode($data->product_id);
                        $datail_page = BASE_URL . 'detail/' . $url_id . '/' . $data->slug . '/';

                        if ($data->seller_id)
                            $seller_name = $ajGenObj->NameById($data->seller_id, 'users');
                        else
                            $seller_name = '';
                        if ($data_price_grp)
                            $product_price = $data_price_grp;
                        else
                            $product_price = $data->price;
                        $productData['productId'] = $data->product_id;
                        $productData['sellerId'] = $data->seller_id;
                        $productData['sellerName'] = $seller_name;
                        $productData['inv_qty'] = $data->inv_qty;
                        $productData['slug'] = $data->slug;
                        $productData['sku_product'] = $data->SKU;
                        $productData['Brand'] = $data->Brand;
                        //$productData['slug'] = $data->product_id; 
                        $productData['productName'] = $data->product_name;
                        $productData['productImage'] = $thumb_image;
                        $productData['price'] = ($data->price);
                        $productData['discount'] = $data->discount;
                        //  $productData['qty'] = $data->product_id;
                        $productData1 = json_encode($productData);
                        //print_r($productData1);
                        $prodcutData_aj = "<input type='hidden' name='productData_" . $data->product_id . "' id='productData_" . $data->product_id . "' value='" . $productData1 . "'/>";
                        ?>  
                        <div class="gray-outline-box"  id="wishlistproduct<?php echo $data->id; ?>">
                            <h3 class="border-bottom">Shipping from cyprus</h3>
                            <div class="full-width margintop30">
                                <div class="col-md-3 col-sm-3">
                                    <a href="<?php echo $datail_page ?>" ><img src="<?php echo $thumb_image; ?>" class="img-responsive"></a>
                                </div>
                                <div class="col-md-3">
                                    <a href="<?php echo $datail_page ?>" ><h3><?php echo $product_name =  $data->product_name ?></h3></a>
                                    <p><?php echo base64_decode($data->product_description); ?></p> 
                                    <a href="javascript:void();"  onclick="removeWishlist('<?php echo $data->id; ?>')" >Remove Item</a>

                                </div>
                                <div class="col-md-3">
                                    <p><?php echo $data_price; ?></p>        
                                </div>
                                <div class="col-md-3">
                                    <form class="frm-slt">
                                         <?php 
                                               if ($data->is_in_stock == '1' && $data->inv_qty > 0) { ?> 
                                        <input type="number" min="0" max="99" class="form-control" placeholder="quantity" id="cart_qty_<?php echo $data->product_id; ?>" name="qty" value="1">
                                        <?php echo $prodcutData_aj; ?>
                                        <a  onclick="addToCart('<?php echo $data->product_id; ?>', '<?php echo $data->id; ?>')" class="btn btn-success btn-block margintop10">Move to bag <i class="fa fa-angle-right"></i></a>
                                        <p class="margintop10"> <?php echo $inv_qty = $data->inv_qty ?>  left in stock</p>
                                               <?php } ?> 
                                    </form>
                                </div>
                            </div>
                        </div>
                        <?php
                        if ($i % $wrap_count == 0) {
                            echo '</div>';
                        }
                        ?>


                        <?php
                    }
                    if ($i % $wrap_count != 0) {
                        echo '</div>';
                    }
                    //  if ($count%3 != 1) echo "</div>"; //This is to ensure there is no open div if the number of elements in user_kicks is not a multiple of 4
                } else {
                    ?>
                    <h3 align="center"> You have no  wishlist product  </h3>
                    <!--<h3 align="center"> Please login to show yours wishlist products </h3>-->

                <?php }
            } else {
                ?>
                <h3 align="center"> Please login to show yours wishlist products </h3>
            <?php }
            ?>         

            <h3>jewelstreet Concierge</h3> 
            <p>Our dedicated jewellery Concierge team is standing by to help on the phone, live chat or email.</p>
            <hr>
            <div class="full-width">
                <div class="col-md-4 col-sm-4">
                    <div class="gray-outline-box">
                        <h3><a href="#"><i class="fa fa-volume-control-phone"></i>&nbsp; Phoness</a></h3>

                        <p>click here</p> 
                    </div>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="gray-outline-box">
                        <h3><a href="#"><i class="fa fa-envelope"></i>&nbsp; Email</a></h3>  
                        <p>click here</p> 
                    </div>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="gray-outline-box">
                        <h3><a href="#"><i class="fa fa-commenting-o"></i>&nbsp;Chat</a></h3>
                        <p>click here</p> 
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<script>
    function serverResponse(id, res, alertClass, tm = "6000") {

        var resmsg1 = '<div class="alert alert-dismissable alert alert-' + alertClass + '"><a href="#" class="close" data-dismiss="alert" aria-label="close"> x </a>\<strong class="text-capitalize">' + alertClass + '!</strong> <span>' + res + '</span> </div>';
        //response  msg aj st
        $('#' + id).show();
        $('#' + id).html(resmsg1);
          if (alertClass == "success" || alertClass == "info") {
            window.setTimeout(function () {
                //   $('#'+id).fadeTo(500, 0).slideUp(500, function () {
                $('#' + id).html("");
                //   });
            }, tm);
        }
    }
    function removeWishlist(id) {
        var user_id = '<?php echo $login_id; ?>';
        var wishlistproduct = "#wishlistproduct" + id;
        var cfm = confirm("Are you sure to remove products from wishlist");
          var total_item_wishlist = parseInt($('.total_item_wishlist').text());
        if (user_id) {
            if (cfm) {
                $.ajax({
                    type: "POST",
                    data: {id: id, mode: 'removeWishlist'},
                    url: "<?php echo BASE_URL ?>/controller/wishlist_operation.php",
                    success: function (data) {
                     //   alert(data);
                        $(wishlistproduct).remove();
                        $('.total_item_wishlist').text(total_item_wishlist - 1)
                    }
                });
            }
        } else {
            alert("please login to add  products to wishlist");
        }
    }
    function addToCart(a, wishid) {
        $('#loading-overlay').show();
        var qty = $("#cart_qty_" + a).val();
        var jsondata1 = jQuery.parseJSON($('#productData_' + a).val());
        var jsondata2 = {qty: qty}
        var productData = $.extend({}, jsondata1, jsondata2);
        var inv_qty = '<?php echo $inv_qty; ?>';
      
         if (qty < 1) {
            var response = 'please select quantity';
            serverResponse('resajmsg', response, "success");
        } else {
            $.post('<?php echo BASE_URL; ?>controller/cart_operations.php', {productId: a, wishid: wishid, productData: productData, mode: '<?php echo base64_encode('setCart'); ?>'}, function (response) {

//                   alert(response);
                serverResponse('resajmsg', response, "success");
                        $.post('<?php echo BASE_URL; ?>controller/cart_operations.php', {mode: '<?php echo base64_encode('TotalItemCart'); ?>'}, function (res) {
//                                     alert(res);
                                       if($.trim(response)=='Added Successfully') {
                                      var total_item_wishlist = parseInt($('.total_item_wishlist').text());
                                        $('.total_item_wishlist').text(total_item_wishlist - 1)
                                        $('.total_item_cart').text(res.trim());
                                        $("#wishlistproduct" + wishid).remove();
                                         serverResponse('resajmsg', response, "success"); 
                                    } else {
                                         serverResponse('resajmsg', response, "success");     
                                    }
                                  });   
                $('#loading-overlay').hide();
                // $('#manageCart_Nj').load("<?php echo BASE_URL; ?>/controller/manage_cart.php");
                return false;
            });
            return false;
        }
        $('#loading-overlay').hide();
    }

</script>


<?php include 'include/footer.php'; ?>