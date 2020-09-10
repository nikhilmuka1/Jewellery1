<?php
include('../page_fragment/define.php');
include ('../page_fragment/dbConnect.php');
include ('../page_fragment/dbGeneral.php');
include ('../page_fragment/njGeneral.php');
include ('../page_fragment/njFile.php');
include ('../page_fragment/njEncription.php');
include ('../page_fragment/ajCategoryView.php');
include ('../page_fragment/ajGeneral.php');
$dbConObj = new dbConnect();
$dbComObj = new dbGeneral();
$njGenObj = new njGeneral();
$njFileObj = new njFile();
$ajGenObj = new ajGeneral();
$ajCategoryViewObj = new ajCategoryView();
$njEncryptionObj = new njEncryption();
$conn = $dbConObj->dbConnect();
include '../include/user_header.php';

if ($_SESSION) {
    if (isset($_SESSION['user_id']))
        $login_id = $_SESSION['user_id'];
    if (isset($_SESSION['DH_seller_id'])) {
        $login_id = $_SESSION['DH_seller_id'];
        $loginSeller = $_SESSION['DH_seller_type_name'];
    }
}
if (empty($login_id)) {
    header('Location: ' . BASE_URL);
    exit;
}

$siteTitle = "Marketplace | My Account";

$currency_symbol = '$ ';
$express_DHL_delivery = '15.00';
// set the expiration date to one hour ago  time() + (86400 * 30);
setcookie("cartItems", "", time() - (86400 * 30));
$cartItems = $_COOKIE['cartItems'];
$cartItems = json_decode($_COOKIE['cartItems']);
$total_item_cart = count((array) $cartItems);
//echo '<pre>';
//print_r($cartItems);
//echo '</pre>';
?>
<body id="contact" class="contact hide-left-column hide-right-column lang_en  one-column">
    <div id="page">
        <div class="columns-container">
            <div id="columns">
                <!-- Breadcrumb -->
                <div class="breadcrumb container">
                    <ul>
                        <li class="home"><a class="home" href="<?php echo BASE_URL; ?>" title="Return to Home">home</a></li>
                        <li class="crumb-1"><a href="<?php echo BASE_URL; ?>user/my-account.php" title="My account">My account</a></li>
                        <li class="crumb-2 last"><span class="navigation-pipe">&gt;</span><span class="navigation_page">Your Wishlist</span></li>
                    </ul>
                </div>
                <!-- /Breadcrumb -->
                <div id="slider_row">
                    <div id="top_column" class="center_column"></div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="large-left col-sm-12">
                            <div class="row">
                                <div id="center_column" class="center_column col-xs-12 col-sm-9 accordionBox">
                                    <div class="box">
                                        <div class="col-md-6 col-sm-6">
                                            <div class="row">
                                                <h4>My Cart( <span id="total_item_cart"><?php
                                                        if ($total_item_cart)
                                                            echo $total_item_cart;
                                                        else
                                                            echo 0;
                                                        ?></span>)</h4>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-sm-6 text-right margintop10">
                                            <div class="row">
                                                <a href="<?php echo BASE_URL; ?>grid/" class="btn btn-default ">Continue Shoping</a>
                                                <?php if ($cartItems) { //print_r($cartItems);   ?>
                                                    <a href="<?php echo BASE_URL; ?>checkout/" class="btn btn-success ">Place Order</a>
                                                <?php } ?>
                                            </div>
                                        </div>

                                        <hr>
                                    <?php
                                    if ($cartItems) { //print_r($cartItems);
                                        foreach ($cartItems as $cartItem) {
                                            foreach ($cartItem as $key => $item) {
                                                //  print_r( $value);
                                                // print_r( $value['productData']['productId']);
                                                //die
                                                $productId = $item->productId;
                                                $sellerId = $item->sellerId;
                                                $sellerName = $item->sellerName;
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

                                                    <div class="full-width margintop20" id="cartItem<?php echo $productId; ?>">
                                                        <div class="col-md-3 col-sm-3">
                                                            <img src="<?php echo $thumb_image_cart; ?>" class="img-responsive">

                                                            <div class="input-group spinner margintop10 ">
                                                                <input class="form-control"  value="<?php
                                                                if ($item->qty)
                                                                    echo $item->qty;
                                                                else
                                                                    echo 1;
                                                                ?>"
                                                                onblur="updateCart('<?php echo $item->productId; ?>', this.value)" min="1" name="item_qty" type="number"> 
                                                                <!--  onchange="updateCart('<?php // echo $item->productId;   ?>',this.value)" -->
                                                                <?php
                                                                if ($item->custom_price_total) {
                                                                    $product_price = $item->custom_price_total;
                                                                } else {
                                                                    $product_price = $item->price;
                                                                }
                                                                ?>
                                                                <input type="hidden" id="product_price<?php echo $item->productId; ?>" value="<?php echo $product_price; ?>" />
<!--                                                                <div class="input-group-btn-vertical">
                                                                    <button class="btn btn-success" type="button"><i class="fa fa-caret-up"></i></button>
                                                                    <button class="btn btn-success" type="button"><i class="fa fa-caret-down"></i></button>
                                                                </div>-->
                                                            </div>

                                                        </div>
                                                        <div class="col-md-9 col-sm-9">
                                                            <h4 class="sub-hadding"><?php echo $productName; ?></h4>
                                                           <?php if ($sellerName) echo '<div>' . $sellerName . '</div>' ?>
                                                          
                                                           
<!--                                                            <p>Delivery by Mon, Aug 21:40</p>-->
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
                                    }else {
                                        echo '<h2 align= "center">Your cart is Empty</h2>';
                                    }
                                    ?>
                                </div>
                                <ul class="footer_links clearfix">
                                    <li><a class="btn btn-secondary btn-sm icon-left" href="<?php echo BASE_URL; ?>user/my-account.php" title="Back to your account"><span>Back to your account</span></a></li>
                                    <li><a class="btn btn-secondary btn-sm icon-left" href="<?php echo BASE_URL; ?>" title="Home"><span>Home</span></a></li>
                                </ul>
                            </div><!-- #center_column -->
                            <div id="left_column" class="column col-xs-12 col-sm-3"><!-- Block myaccount module -->
                                <?php include './sidebar.php'; ?>
                            </div>
                        </div><!--.row-->
                    </div><!--.large-left-->
                </div><!-- .row -->
            </div><!-- .container -->
        </div><!-- #columns -->
    </div><!-- .columns-container -->
    <!-- Footer -->
    <?php include '../include/footer.php'; ?><!-- #footer -->
</div><!-- #page -->
</body>
<script>
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

        $('#loading-overlay').show();
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
                $('#resajmsg').show().addClass("alert-success");
                $('#resajmsg strong').text("Success! ");
                $('#resajmsg span').text(parsedData[0]);
                window.setTimeout(function () {
                    $("#resajmsg").fadeTo(500, 0).slideUp(500, function () {
                        $(this).remove();
                    });
                }, 9000);

            } else {
                alert('unexpeted Error  Please try again later');
            }

        });

    }

</script>





