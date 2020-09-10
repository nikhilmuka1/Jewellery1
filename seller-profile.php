<?php
include './include/header.php';
//print_r($_SESSION);
$login_id = '';
if ($_SESSION) {
    if (isset($_SESSION['user_id']))
        $login_id = $_SESSION['user_id'];
    if (isset($_SESSION['DH_seller_id'])) {
        $login_id = $_SESSION['DH_seller_name'];
        $loginSeller = $_SESSION['DH_seller_type_name'];
    }
}

$UriSegmentID = $ajGenObj->getUriSegment(3);
$seller_urlslug = $ajGenObj->getUriSegment(4);
$id = intval($njEncryptionObj->safe_b64decode($UriSegmentID));
if (($UriSegmentID && is_int($id))) {

    $condition = "`id` = " . $id . " ";
    $results = $dbComObj->viewData($conn, "users", "*", $condition);
    $seller = $dbComObj->fetch_object($results);
}

if ($seller == "") {
    header("Location: " . BASE_URL . "404/"); /* Redirect browser */
    exit();
}

if (isset($seller->cover_image)) {
    $cover_image = BASE_URL . 'images/user/cover/thumb/' . $seller->cover_image;
} else {
    $cover_image = BASE_URL . 'frontend/img/profile-bg.png';
}
if (isset($seller->shop_image)) {
    $shop_image = BASE_URL . 'images/user/shop/thumb/' . $seller->shop_image;
} else {
    $shop_image = BASE_URL . 'frontend/img/default-product-image.png';
}
if (isset($seller->image)) {
    $seller_image = BASE_URL . 'images/user/thumb/' . $seller->image;
} else {
    $seller_image = BASE_URL . 'frontend/img/default-product-image.png';
}

$shop_page = BASE_URL . 'seller-shop/' . $UriSegmentID . '/' . $seller_urlslug . '/';

$conditionF = " seller_id= '" . $id . "'";
$resultF = $dbComObj->viewData($conn, "follower", "*", $conditionF);
$No_of_follower = $dbComObj->num_rows($resultF);
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
<div class="seller-profile-detail">
    <div class="container">
        <div class="row">
            <div  id="resajmsg"> </div>
            <div class="col-md-2 col-sm-2">
                <div class="user-profile">
                    <img src="<?php echo $seller_image; ?>" class="img-responsive">
                    <h4 class="margintop10"><a href="#"><?php echo $seller->name; ?></a></h4>
                    <p><i class="fa fa-map-marker"></i><?php echo $seller->city . ' ' . $seller->state . ' ' . $seller->country ?>
                        <?php
                        if ($login_id) {
                            $condition = " `user_id` = '" . $login_id . "' and seller_id= '" . $id . "'";
                            $result = $dbComObj->viewData($conn, "follower", "*", $condition);
                            $num = $dbComObj->num_rows($result);
                            if ($num == 0) {
                                $followStatus = "Follow";
                            } else {
                                $followStatus = "Following";
                            }
                            ?>

                            <a  id="followStatus" onclick="addToFollow('<?php echo $id; ?>');"  class="btn btn-success"><?php echo $followStatus; ?></a>
                        <?php
                        } else {
                            echo '  <button type="button" class="btn btn-info" data-toggle="modal" data-target="#loginajModel">Follow</button>';
                            include 'login_btn_model_popup.php';
                        }
                        ?>
                </div>
                <ul class="profile margintop20">
                    <li class="active"><a href="#">Profile</a></li>
                    <li><a href="#">Favourits</a></li>
                    <li><a href="#">Followers (<?php echo $No_of_follower; ?>)</a></li>
                    <li><a ><?php echo $seller->shop_contact; ?></a></li>
                </ul>
                <div class="box">
                    <h4 class="margin0"><?php echo $seller->shop_name; ?></h4>
                    <img src="<?php echo $shop_image; ?>" class="img-responsive">
                    <div class="full-width margintop30">
                        <a href="#"><i class="fa fa-building-o"></i> <?php echo $seller->shop_name; ?></a>
                        <p class="margintop10"><?php echo $seller->shop_heading; ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-5 col-sm-5">
                <h4 class="hadding text-left"><?php echo $seller->name; ?></h4>
                <div class="box">
                    <h4 class="sub-hadding">About Us</h4>

                    <p>
                        <?php echo base64_decode($seller->aboutme); ?>
                    </p>
                    <p><strong>Favourite materials</strong></p>
                    <p> sterling silver, gemstones, PMC, precious metal clay, chainmail, fine silver, argentium silver </p>
                </div>

            </div>
            <div class="col-md-5 col-sm-5 margintop45">
                <div class="box">
                    <p class="sub-hadding">Shop <a href="<?php echo $shop_page; ?>"><strong>Show More</strong></a></p>

                    <?php
                    $condition_product = " `delete` = '0' and status= '1' and  seller_id='$id'  and    price<>'' ORDER BY `product_id` DESC LIMIT 12 ";
                    $result_product = $dbComObj->viewData($conn, "products", "*", $condition_product);
                    $num_product = $dbComObj->num_rows($result_product);

                    if ($num_product > 0) {
                        $i = 0;
                        while ($dataP = $dbComObj->fetch_object($result_product)) { // echo '<pre>';print_r($dataP);
                            ?>
                            <?php
                            // image code start
                            $condition_image = "`product_id` = " . $dataP->product_id . " ORDER BY RAND()  LIMIT 1";
                            $result_image = $dbComObj->viewData($conn, "product_image", "*", $condition_image);
                            $data_image = $dbComObj->fetch_object($result_image);

                            if (isset($data_image->thumb_image))
                                $thumb_image = BASE_URL . 'images/products/thumb/' . $data_image->thumb_image;
                            else
                                $thumb_image = BASE_URL . 'frontend/img/default-product-image.png';
                            // end of image code
                            //  if($data->price) $data_price=  '$ '.($dataP->price);else  $data_price= '-';
                            $url_id = $njEncryptionObj->safe_b64encode($dataP->product_id);
                            $datail_page = BASE_URL . 'detail/' . $url_id . '/' . $dataP->slug . '/';
                            if (($thumb_image)) {
                                ?>        
                                <a href="<?php echo $datail_page; ?>"> <img src="<?php echo $thumb_image ?>" class="box-img"></a>          
                                <?php
                            }
                            $i++;
                        }
                    }
                    ?>

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
            var sid = '<?php echo $id; ?>';
            $.post('<?php echo BASE_URL; ?>controller/follower_operation.php', {sid: sid, uid:uid, mode: '<?php echo base64_encode('addFollower'); ?>'}, function (response) {
            //  alert(response);
            serverResponse('resajmsg', response, "success");
                    $('#followStatus').text(response);
                   window.location.reload()
            });
            }
</script>
<?php include 'include/footer.php'; ?>



