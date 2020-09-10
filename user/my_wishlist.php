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
                                         <h4>My  Wishlist</h4>   
                                         <div id="resajmsg"></div>
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

                                                        <div  id="wishlistproduct<?php echo $data->id; ?>">
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
                                                                        <input type="number" min="1" class="form-control" placeholder="quantity" id="cart_qty" name="qty">
                                                                        <select class="form-control margintop10">
                                                                            <option value="volvo">Volvo</option>
                                                                            <option value="saab">Saab</option>
                                                                            <option value="mercedes">Mercedes</option>
                                                                            <option value="audi">Audi</option>
                                                                        </select> 
                                                                        <a  onclick="addToCart('<?php echo $data->product_id; ?>', '<?php echo $data->id; ?>')" class="btn btn-success btn-block margintop10">Move to bag <i class="fa fa-angle-right"></i></a>
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

                                                    $productData = array();
                                                    $productData['productId'] = $data->product_id;
                                                    $productData['sellerId'] = $ajGenObj->NameById($data->seller_id, 'users');
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
                                                    <div id="wishlistproduct<?php echo $data->id; ?>">
                                                        <h3 class="border-bottom">Shipping from cyprus</h3>
                                                        <div class="full-width margintop30">
                                                            <div class="col-md-3 col-sm-3">
                                                                <a href="<?php echo $datail_page ?>" ><img src="<?php echo $thumb_image; ?>" class="img-responsive"></a>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <a href="<?php echo $datail_page ?>" ><h3><?php echo $data->product_name ?></h3></a>
                                                                <p><?php echo base64_decode($data->product_description); ?></p> 
                                                                <a href="javascript:void();"  onclick="removeWishlist('<?php echo $data->id; ?>')" style="color:#3fbfbd;" >Remove Item</a>

                                                            </div>
                                                            <div class="col-md-3">
                                                                <p><?php echo $data_price; ?></p>        
                                                            </div>
                                                            <div class="col-md-3">
                                                                <form class="frm-slt">
                                                                    <input type="number" min="0" max="99" class="form-control" placeholder="quantity" id="cart_qty_<?php echo $data->product_id; ?>" name="qty" value="1">
                                                                    <?php echo $prodcutData_aj; ?>
                                                                    <a  onclick="addToCart('<?php echo $data->product_id; ?>', '<?php echo $data->id; ?>')" class="btn btn-success btn-block margintop10">Move to bag <i class="fa fa-angle-right"></i></a>
                                                                    <p class="margintop10"> <?php echo $data->inv_qty ?>  left in stock</p>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php
                                                    if ($i % $wrap_count == 0) {
                                                        echo '</div>';
                                                    }
                                                }
                                                if ($i % $wrap_count != 0) {
                                                    echo '</div>';
                                                }
                                                //  if ($count%3 != 1) echo "</div>"; //This is to ensure there is no open div if the number of elements in user_kicks is not a multiple of 4
                                            } else {
                                                ?>
                                                <h4 align="center"> You have no  wishlist product  </h4>
<!--                                                <h3 align="center"> Please login to show yours wishlist products </h3>-->
                                                <?php
                                            }
                                        } else {
                                            ?>
                                            <h3 align="center"> Please login to show yours wishlist products </h3>
                                        <?php }
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
    function removeWishlist(id) {
        var user_id = '<?php echo $login_id; ?>';
        var wishlistproduct = "#wishlistproduct" + id;
        var cfm = confirm("Are you sure to remove products from wishlist");
        if (user_id) {
            if (cfm) {
                $.ajax({
                    type: "POST",
                    data: {id: id, mode: 'removeWishlist'},
                    url: "<?php echo BASE_URL ?>/controller/wishlist_operation.php",
                    success: function (data) {
                       // alert(data);
                        $(wishlistproduct).remove();
                           window.location.reload();
                    }
                });
            }
        } else {
            alert("please login to add  products to wishlist");
        }
    }
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
    function addToCart111(a, wishid) {
        $('#loading-overlay').show();
        var qty = $("#cart_qty_" + a).val();
        var jsondata1 = jQuery.parseJSON($('#productData_' + a).val());
        var jsondata2 = {qty: qty}
        var productData = $.extend({}, jsondata1, jsondata2);
        if (qty && qty > 0) {
            //  alert(qty);
        } else {
            var response = "please select quantity";
            $('#resajmsg').show();
            $("#resajmsg").addClass("alert-danger");
            $('#resajmsg strong').text("Error! ");
            $('#resajmsg span').text(response);
            window.setTimeout(function () {
                $("#resajmsg").fadeTo(500, 0).slideUp(500, function () {
                    $(this).remove();
                });
            }, 9000);


        }
        $.post('<?php echo BASE_URL; ?>controller/cart_operations.php', {productId: a, wishid: wishid, productData: productData, mode: '<?php echo base64_encode('setCart'); ?>'}, function (response) {

            //   alert(response);
            $('#resajmsg').show().addClass("alert-success");
            $('#resajmsg strong').text("Success! ");
            $('#resajmsg span').text(response);
            window.setTimeout(function () {
                $("#resajmsg").fadeTo(500, 0).slideUp(500, function () {
                    $(this).remove();
                });
            }, 9000);
            $("#wishlistproduct" + wishid).remove();
            $('#loading-overlay').hide();
            // $('#manageCart_Nj').load("<?php echo BASE_URL; ?>/controller/manage_cart.php");
            return false;
        });
        return false;

    }

</script>

