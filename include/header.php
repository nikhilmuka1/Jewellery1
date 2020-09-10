<?php
include './system/config.php';
//print_r($_SESSION);
$login_name = '';
$loginSeller = '';
if ($_SESSION) {
    if (isset($_SESSION['user_name'])) {
        $login_name = $_SESSION['user_name'];
        $login_id = $_SESSION['user_id'];
    }
    if (isset($_SESSION['DH_seller_name'])) {
        $login_id = $_SESSION['DH_seller_id'];
        $login_name = $_SESSION['DH_seller_name'];
        $loginSeller = $_SESSION['DH_seller_type_name'];
    }
}
if(!$login_id)
{
include_once 'autologin.php';
}
//$cartItems = json_decode($_COOKIE['cartItems']);
//$total_item_cart = count((array) $cartItems);
$sumArray = array();
$cartItems = json_decode($_COOKIE['cartItems']);
if ($cartItems) {
    foreach ($cartItems as $cartItem) {
        foreach ($cartItem as $key => $item) {
            $sumArray[]+=$item->qty;
        }
    }
}
$total_item_cart = array_sum($sumArray);
// wish  
$total_item_wishlist = '';
if ($login_id) {
    $res_wishlist = $dbComObj->viewData($conn, 'wishlist', "*", " `user_id` = '" . $login_id . "' ");
    $total_item_wishlist = $dbComObj->num_rows($res_wishlist);
}
//echo $login_id.$total_item_wishlist; die;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <title>Jweelery</title>
        <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>frontend/css/bootstrap.css">
            <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>frontend/css/font-awesome.min.css">
                <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>frontend/css/style.css">
                    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>frontend/css/animate.css">
                        <script type="text/javascript" src="<?php echo BASE_URL; ?>frontend/js/jquery-new.js"></script>
                        <script type="text/javascript" src="<?php echo BASE_URL; ?>frontend/js/bootstrap.js"></script>
                        <script type="text/javascript" src="<?php echo BASE_URL; ?>frontend/js/wow.min.js"></script>
                        <script>
                            wow = new WOW(
                                    {
                                        animateClass: 'animated',
                                        offset: 100,
                                        callback: function (box) {
                                            console.log("WOW: animating <" + box.tagName.toLowerCase() + ">")
                                        }
                                    }
                            );
                            wow.init();
                            // document.getElementById('moar').onclick = function () {
                            //     var section = document.createElement('section');
                            //     section.className = 'section--purple wow fadeInDown';
                            //     this.parentNode.insertBefore(section, this);
                            // };

                        </script>
                        <script>
                            $(document).ready(function () {
                                $("#search").click(function () {
                                    $(".search-bar-open").addClass("search-bar-close");
                                    $(".search-open-icon").hide("");
                                    $(".search-close-icon").show("");
                                });
                                $("#close").click(function () {
                                    $(".search-bar-open").removeClass("search-bar-close");
                                    $(".search-open-icon").show("");
                                    $(".search-close-icon").hide("");
                                });
                            });
                        </script>

                        <script>
                            jQuery(document).ready(function () {
                                $(".nav li").hover(
                                        function () {
                                            $('.multi-level', this).fadeIn("fast");
                                        },
                                        function () {
                                            $('.multi-level', this).fadeOut("fast");
                                        });
                            });
                        </script>
                        <script type="text/javascript">
                            $(document).ready(function () {
                                var trigger = $('.hamburger'),
                                        overlay = $('.overlay'),
                                        isClosed = false;

                                trigger.click(function () {
                                    hamburger_cross();
                                });

                                function hamburger_cross() {

                                    if (isClosed == true) {
                                        overlay.hide();
                                        trigger.removeClass('is-open');
                                        trigger.addClass('is-closed');
                                        isClosed = false;
                                    } else {
                                        overlay.show();
                                        trigger.removeClass('is-closed');
                                        trigger.addClass('is-open');
                                        isClosed = true;
                                    }
                                }

                                $('[data-toggle="offcanvas"]').click(function () {
                                    $('#wrapper').toggleClass('toggled');
                                });
                            });
                        </script>
                        <script>
                            $(document).ready(function () {
                                // Add minus icon for collapse element which is open by default
                                $(".collapse.in").each(function () {
                                    $(this).siblings(".panel-heading").find(".glyphicon").addClass("glyphicon-minus").removeClass("glyphicon-plus");
                                });

                                // Toggle plus minus icon on show hide of collapse element
                                $(".collapse").on('show.bs.collapse', function () {
                                    $(this).parent().find(".glyphicon").removeClass("glyphicon-plus").addClass("glyphicon-minus");
                                }).on('hide.bs.collapse', function () {
                                    $(this).parent().find(".glyphicon").removeClass("glyphicon-minus").addClass("glyphicon-plus");
                                });
                            });
                        </script>
                        </head>
                        <body>
                            <div >
                                <div class="green-had">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6">
                                                <p>Free Shipping Over $75</p>
                                            </div>
                                            <div class="col-md-6 col-sm-6">
                                                <ul class="sign-link pull-right text-right">
                                                    <!--    user start  -->
                                                    <?php if (isset($login_name) && $login_name) { ?> 
                                                        <li class="dropdown">
                                                            <a href="javascript:void(0)"  class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-user" aria-hidden="true"></i>
                                                                <?php echo $login_name; ?> <span><i class="fa fa-caret-down"></i></i></span></a>
                                                            <ul class="dropdown-menu dp-mnu">
                                                                <?php if ($loginSeller) { ?>
                                                                    <li><a href="<?php echo SELLER_URL; ?>">Dashboard</a></li>
                                                                <?php } ?>                           

                                                                <li><a href="<?php echo BASE_URL; ?>user/<?php echo $njGenObj->removeSpecialChar($login_name); ?>/my-account/">My Account</a></li>

                                                                <li><a href="<?php echo BASE_URL; ?>controller/users_operations.php?mode=<?php echo base64_encode("logout"); ?>">Logout</a></li>
                                                            </ul>
                                                        </li> 
                                                    <?php } else { ?>
                                                        <li><a href="<?php echo BASE_URL; ?>login/"><img src="<?php echo BASE_URL; ?>frontend/img/sign-in.png"> Sign In </a></li>
                                                    <?php } ?>
                                                    <!--    user end  -->
                                                    <li><a href="<?php echo BASE_URL; ?>whislist/"><i class="fa fa-heart"></i>
                                                            (<span class="total_item_wishlist"><?php if ($total_item_wishlist)
                                                        echo $total_item_wishlist;
                                                    else
                                                        echo 0;
                                                    ?></span>)</a></li>
                                                    <li><a href="<?php echo BASE_URL; ?>cart/"><img src="<?php echo BASE_URL; ?>frontend/img/bag.png">
                                                                Bag (<span class="total_item_cart"><?php if ($total_item_cart)
                                                        echo $total_item_cart;
                                                    else
                                                        echo 0;
                                                    ?></span>) </a></li>
                                                    <li class="dropdown">
                                                        <a href="javascript:void(0)"  class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><img src="<?php echo BASE_URL; ?>frontend/img/glob.png"> USD  <span><i class="fa fa-caret-down"></i></i></span></a>
                                                        <ul class="dropdown-menu dp-mnu">
                                                            <li><a href="javascript:void(0)">INR</a></li>
                                                            <li><a href="javascript:void(0)">USD</a></li>
                                                        </ul>
                                                    </li>
                                                    <li><a href="javascript:void(0)"><i class="fa fa-search search-open-icon" id="search"></i> <i class="fa fa-close search-close-icon" id="close"></i></a></li>
                                                </ul>
                                            </div> 
                                            <div class="search-bar-open">
                                                <form action="<?php echo BASE_URL ?>grid/" method="get" id="searchform" >
                                                    <div class="col-md-6 col-sm-6 col-md-offset-3 col-sm-offset-3">
                                                        <div class="col-md-8 col-sm-8">
                                                            <div class="row">
                                                                <input type="text" class="form-control" id="search_term"  title="Please Enter Search term" required value="<?php if (isset($_GET['search_term']) && $_GET['search_term']) echo $_GET['search_term']; ?>"  name="search_term" placeholder="Search..." />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 col-sm-4">
                                                            <div class="row">

<!-- <a href="<?php // echo BASE_URL;    ?>" class="btn btn-success">Search</a> -->
                                                                <input type='submit' value="Search" class="btn btn-success"/> 
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="logo-section">
                                    <div class="container">
                                        <div class="row">
                                            <div class="full-width text-center">
                                                <center>
                                                    <a href="<?php echo BASE_URL; ?>" class="navbar-brand xs-hide"><img src="<?php echo BASE_URL; ?>frontend/img/logo.png"></a>
                                                </center>             
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- navigation header start  -->
<?php include 'navigation_header.php'; ?>
                                <!--end of navigation header -->

                            </div>
