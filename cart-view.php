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
$currency_symbol = CURRENCY_SYMBOL;
$express_DHL_delivery = '15.00';
// set the expiration date to one hour ago  time() + (86400 * 30);
setcookie("cartItems", "", time() - (86400 * 30));
$cartItems = $_COOKIE['cartItems'];
$cartItems = json_decode($_COOKIE['cartItems']);
$total_item_cart = count((array) $cartItems);
//echo '<pre>';
//print_r($cartItems);echo '</pre>';
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
<div class="cart-detail">
    <div class="container">
        <div  id="resajmsg"> </div>
        <div class="row">
            <div class="box">
                <div class="col-md-12 col-sm-12 full-width border-bottom-2">
                    <div class="col-md-6 col-sm-6">
                        <div class="row">
                            <h4>My Cart( <span id="total_item_cart"><?php if ($total_item_cart)
    echo $total_item_cart;
else
    echo 0;
?></span>)</h4>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-6 text-right margintop10">
                        <div class="row">
                            <a href="<?php echo BASE_URL; ?>grid/" class="btn btn-default ">Continue Shoping</a>
<?php if ($cartItems) { //print_r($cartItems);  ?>
                                <a href="<?php echo BASE_URL; ?>checkout/" class="btn btn-success ">Place Order</a>
<?php } ?>
                        </div>
                    </div>

                    <hr>
                </div>
                <?php
                if ($cartItems) { //print_r($cartItems);
                    foreach ($cartItems as $cartItem) {
                        foreach ($cartItem as $key => $item) {
                            //  print_r( $value);
                            // print_r( $value['productData']['productId']);
                            //die
                            $productId = $item->productId;
                            $sellerName = $item->sellerName;
                            $slug = $item->slug;
                            $sku_product = $item->sku_product;
                            $productName = $item->productName;
                            $total_price = $item->total_price;
                            $custom_options = $item->custom_options;
                            // image code start
                            $condition_image_cart = "`product_id` = " . $productId . " ORDER BY RAND()  LIMIT 1";
                            $result_imagec = $dbComObj->viewData($conn, "product_image", "*", $condition_image_cart);
                            $data_imagec = $dbComObj->fetch_object($result_imagec);

                            if (isset($data_imagec->thumb_image))
                                $thumb_image_cart = BASE_URL . 'images/products/thumb/' . $data_imagec->thumb_image;
                            else
                                $thumb_image_cart = BASE_URL . 'frontend/img/default-product-image.png';
                            // end of image code
                            $url_id = $njEncryptionObj->safe_b64encode($productId);
                            $productajslug = $njGenObj->removeSpecialChar($productName);
                            $datail_page = BASE_URL . 'detail/' . $url_id . '/' . $productajslug . '/';
                            if ($productId) {
                                ?>

                                <div class="full-width margintop20" id="cartItem<?php echo $productId; ?>">
                                    <div class="col-md-3 col-sm-3">
                                        <a href="<?php echo $datail_page; ?>">
                                            <img src="<?php echo $thumb_image_cart; ?>" class="img-responsive">
                                        </a>
                                        <div class="input-group spinner margintop10">
                                            <input class="form-control"  style="width:200px;"  value="<?php if ($item->qty)
                                    echo $item->qty;
                                else
                                    echo 1;
                                ?>"
                                                   onblur="updateCart('<?php echo $item->productId; ?>', this.value)" onchange="updateCart('<?php echo $item->productId; ?>', this.value)" min="1" max="99"  name="item_qty" type="number"> 
                                            <!--   -->
                                            <?php
                                            if ($item->product_price_with_Custom) {
                                                $product_price = $item->product_price_with_Custom;
                                            } else {
                                                $product_price = $item->price + $item->custom_price_total;
                                            }
                                            ?>  
                                            <!--                                        <div class="input-group-btn-vertical">
                                                                                            <button class="btn btn-success" type="button"><i class="fa fa-caret-up"></i></button>
                                                                                            <button class="btn btn-success" type="button"><i class="fa fa-caret-down"></i></button>
                                                                                        </div>-->
                                        </div>
                                    </div>
                                    <input type="hidden" id="product_price<?php echo $item->productId; ?>" value="<?php echo $product_price; ?>" />
                                    <input type="hidden" id="product_inv_qty<?php echo $item->productId; ?>" value="<?php echo $item->inv_qty; ?>" />
                                    <input type="hidden" id="product_name<?php echo $item->productId; ?>" value="<?php echo $productName; ?>" />
                                    <div class="col-md-9 col-sm-9">
                                        <h4 class="sub-hadding"><?php echo $productName; ?></h4>
                                        <?php if ($sellerName) echo '<div>' . $sellerName . '</div>' ?>

                                        <?php
//                                        if ($custom_options) {
//                                            //   print_r($custom_options);
//                                            echo '<div>';
//                                            for ($x = 0; $x < count($custom_options); $x++) {
//                                                $custom_name = $custom_options[$x]->name;
//                                                $custom_id = $custom_options[$x]->value;
//                                                //  $custom_price = $ajGenObj->NameById($custom_id, 'custom_option_value','price');
//                                                echo '<div> ' . $custom_name . '</div>';
//                                            }
//                                            echo '</div>';
//                                        }
                                        ?>

                <!--                                        <p>Delivery by Mon, Aug 21:40</p>-->
                                        <p class="font-18" ><span id="cart_price_<?php echo $item->productId; ?>"><?php echo CURRENCY_SYMBOL . number_format($total_price, 2); ?></span>
                                        </p>
                                        <a onclick="removeCartItem('<?php echo $item->productId; ?>')" class="btn btn-success">Remove</a>
                                        <hr>
                                    </div>

                                </div>
                                <?php
                            }
                        }
                    }
                } else {
                    echo '<h2 align= "center">Your cart is Empty</h2>';
                }
                ?>


                <div class="col-md-12 col-sm-12 margintop20">
                    <p><i class="fa fa-map-marker"></i> Indore - 452001 (M.P) <a href="#"><strong>Change Address</strong></a></p>
                </div>

            </div>
        </div>
    </div>
    <div id="loading-overlay" class="loading-overlay"></div>     
</div>
<script>
    function serverResponse(id, res, alertClass, tm = "7000") {

        var resmsg1 = '<div class="alert alert-dismissable alert alert-' + alertClass + '"><a href="#" class="close" data-dismiss="alert" aria-label="close"> x </a>\<strong class="text-capitalize">' + alertClass + '!</strong> <span>' + res + '</span> </div>';
        //response  msg aj st
        $('#' + id).show();
        $('#' + id).html(resmsg1);
        window.setTimeout(function () {
            //   $('#'+id).fadeTo(500, 0).slideUp(500, function () {
            $('#' + id).html("");
            //   });
        }, tm);
    }

    (function ($) {
        $('.spinner .btn:first-of-type').on('click', function () {
            var input = $(this).find('input');
            input.val(parseInt(input.val(), 10) + 1);
        });
        $('.spinner .btn:last-of-type').on('click', function () {
            var input = $(this).find('input');
            input.val(parseInt(input.val(), 10) - 1);
        });
    })(jQuery);
 // removeCartItem                         
    function removeCartItem(a)
    {
        $('#loading-overlay').show();
        var total_item_cart = parseInt($('#total_item_cart').text());

        // alert(total_item_cart);
        var cartitem = '#cartItem' + a;
        $.post('<?php echo BASE_URL; ?>controller/cart_operations.php', {productId: a, mode: '<?php echo base64_encode('removeCartItem'); ?>'}, function (response) {

            $('#loading-overlay').hide();

            if (response) {
                //  alert(response);
                //response  msg aj st
                $('#resajmsg').show().addClass("alert-success");
                $('#resajmsg strong').text("Success! ");
                $('#resajmsg span').text(response);
                window.setTimeout(function () {
                    $("#resajmsg").fadeTo(500, 0).slideUp(500, function () {
                        $(this).remove();
                    });
                }, 12000);
                $('#total_item_cart').text('');
                $('#total_item_cart').text(total_item_cart - 1)
                $(cartitem).remove();
            } else {
                //response  msg aj st
                $('#resajmsg').show().addClass("alert-info");
                $('#resajmsg strong').text("Info! ");
                $('#resajmsg span').text("please try again later");
                window.setTimeout(function () {
                    $("#resajmsg").fadeTo(500, 0).slideUp(500, function () {
                        $(this).remove();
                    });
                }, 10000);
                //response  msg aj end     
                //     alert('Please try again later');
            }

        });

    }                    
    
    //  editCart
    function updateCart(a, val)
    {
        var cartitem = '#product_price' + a;
        var price = $(cartitem).val();
        var inv_qty = $('#product_inv_qty' + a).val();
        var product_name = $('#product_name' + a).val();
        $('#loading-overlay').show();
        val = parseInt(val);
        //  alert(inv_qty);

        if (val < 1) {
            //  alert(qty);
            var response = 'please select quantity';
            serverResponse('resajmsg', response, "danger");
        } else if (val >= inv_qty) {
            var response = 'The requested quantity for "' + product_name + '" is not available.';
            serverResponse('resajmsg', response, "danger");

        } else {
            var productData = {
                qty: val, price: price
            }
            var cartitem = '#cartItem' + a;
            var cart_price = '#cart_price_' + a;
            $.post('<?php echo BASE_URL; ?>controller/cart_operations.php', {productId: a, productData: productData, mode: '<?php echo base64_encode('updateCart'); ?>'}, function (response) {

                $('#loading-overlay').hide();
                if (response) {
                    var parsedData = JSON.parse(response);
                    //  alert(parsedData[0]);  
                    $(cart_price).text(parsedData[1]);
                    //response  msg aj st
                    serverResponse('resajmsg', parsedData[0], "success")


                } else {
                    alert('unexpeted Error  Please try again later');
                }

            });
        }
        $('#loading-overlay').hide();
    }

</script>
<?php include 'include/footer.php'; ?>
<?php
// echo '<pre>'; print_r($cartItems);echo '</pre>';
?>