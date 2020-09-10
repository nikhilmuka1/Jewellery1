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
$login_id = '';
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
                        <li class="crumb-2 last"><span class="navigation-pipe">&gt;</span><span class="navigation_page">Your Follow</span></li>
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
                                        <h4>My  Following</h4>   
                                        <?php
                                        //     SELECT   FROM `follower` inner join  users on follower.seller_id = users.id      
                                        $colom = 'follower.*,users.image,name,email,city';
                                        $condition = "INNER JOIN users ON follower.seller_id = users.id where follower.user_id=" . $login_id . " ";
                                        $result1 = $dbComObj->viewJoinData($conn, "follower", $colom, $condition);
                                        $num1 = $dbComObj->num_rows($result1);
                                        if ($num1 > 0) {
                                            $j = 0;
                                            $wrap_count1 = 2; // you can change this no of divs to wrap

                                            while ($data1 = $dbComObj->fetch_object($result1)) {
                                                //   print_r($data1); 
                                                $j+=1;
                                                // image code start

                                                if (isset($data1->image))
                                                    $thumb_image = BASE_URL . 'images/user/thumb/' . $data1->image;
                                                else
                                                    $thumb_image = BASE_URL . 'frontend/img/default-product-image.png';
                                                // end of image code
                                                $url_id = $njEncryptionObj->safe_b64encode($data1->seller_id);
                                                $seller_slug = $njGenObj->removeSpecialChar($data1->name);
                                                $datail_page = BASE_URL . 'seller-profile/' . $url_id . '/' . $seller_slug . '/';

                                                $condition_sel = "1 and `seller_id` = " . $data1->seller_id . "";
                                                $result_sel = $dbComObj->viewData($conn, "follower", "*", $condition_sel);
                                                $num_follower = $dbComObj->num_rows($result_sel);
                                                if ($j % $wrap_count1 == 1) {
                                                    echo '<div class="full-width">';
                                                }
                                                $followStatus = "Follwing";
                                                ?>             

                                                <div class="col-md-6 col-sm-6" id="followingaj_<?php echo $data1->seller_id; ?>">
                                                    <a href="<?php echo $datail_page; ?>">
                                                        <div class="box">
                                                            <div class="col-md-3 col-sm-3">
                                                                <div class="row">
                                                                    <img src="<?php echo $thumb_image; ?>" class="img-responsive circel-profile">
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6 col-sm-8">
                                                                <a href="<?php echo $datail_page ?>">  <h4 class="sub-hadding" ><?php echo $data1->name; ?></h4></a>
                                                                <p class=""> Follower : <?php echo $num_follower; ?> </p>
                                                            </div>
                                                            <div class="col-md-3 col-sm-3">
                                                                <div class="row">
                                                                    <a id="followStatus" onclick="addToFollow('<?php echo $data1->seller_id; ?>');"  class="btn btn-success"><?php echo $followStatus; ?></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <?php
                                                if ($j % $wrap_count1 == 0) {
                                                    echo '</div>';
                                                }
                                                ?>
                                                <?php
                                            }
                                            if ($j % $wrap_count1 != 0) {
                                                echo '</div>';
                                            }
                                            //  if ($count%3 != 1) echo "</div>"; //This is to ensure there is no open div if the number of elements in user_kicks is not a multiple of 4
                                        } else {
                                            if ($page == 0)
                                                echo'<h4 align="center">You are not following  any Seller !</h4>';
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
                    alert(data);
                            $(wishlistproduct).remove();
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

<script>
    function serverResponse(id, res, alertClass, tm = "6000") {

    var resmsg1 = '<div class="alert alert-dismissable alert alert-' + alertClass + '"><a href="#" class="close" data-dismiss="alert" aria-label="close"> x </a>\<strong class="text-capitalize">' + alertClass + '!</strong> <span>' + res + '</span> </div>';
            //response  msg aj st
            $('#' + id).show();
            $('#' + id).html(resmsg1);
            if (alertClass == "success") {
    window.setTimeout(function () {
    //   $('#'+id).fadeTo(500, 0).slideUp(500, function () {
    $('#' + id).html("");
            //   });
    }, tm);
    }
    }
    function addToFollow(a = '') {
    var uid = '<?php echo $login_id; ?>';
            $.post('<?php echo BASE_URL; ?>controller/follower_operation.php', {sid: a, uid:uid, mode: '<?php echo base64_encode('addFollower'); ?>'}, function (response) {
            //  alert(response);
            serverResponse('resajmsg', response, "success");
                    $('#followStatus').text(response);
                    window.location.reload();
                    $('#followingaj_' + a).remove();
            });
    }
</script>