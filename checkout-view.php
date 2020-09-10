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
$express_DHL_delivery = '0.00';
$Shipping_charge = '0.00';
// set the expiration date to one hour ago  time() + (86400 * 30);

$cartItems = $_COOKIE['cartItems'];
$cartItems = json_decode($_COOKIE['cartItems']);
$total_item_cart = count((array) $cartItems);
if ($login_id == "") {
    $redirect_url = BASE_URL . 'login/?reference=checkout'
    ?>
    <script>
        window.location.href = "<?php echo $redirect_url; ?>";
    </script>


    <?php
}
?>
<style>

    .sm-p{
        margin-top: -14px !important;
        font-size: 12px !important;
    }
    .summry{
        border: 1px solid #ddd;
        padding: 15px;
        height: auto;
    }
    #addressremove {
        margin: -24px 14px 0px 0px !important;
        width: 0px !important;
        display: block;
        float: right;
    }
    .foundation_sm li {
        list-style: none;
        margin-left: 25px;
        display: inline-block;
    }
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
    .foundation{
        border: 1px solid #ccc;
        padding: 0 0 5px;
    }

    .foundation h3{
        border-bottom: 1px solid #ccc;padding-left:3%;margin-top: 0px;padding-top: 5px;padding-bottom: 5px;font-size:16px;

    }
    .foundation_sm ul{
        margin:0px;
        padding:0px;
    }
    .foundation_sm li{
        list-style:none;
        margin-left:25px;
    }
    .foundation_sm li i{
        padding-right: 6px;
    }
    #addressremove {
        margin: 0 auto;
        width: 100px;
        display: block;
    }
    .checked_address_label {
        font-weight: 400 !important;
        font-size: 14px !important;
    }
</style>
<div class="cart-detail">
    <div class="container">
        <div class="row">
            <div class="full-width margintop10">
                <div class="green-box-outline">
                    <div class="col-md-6 col-sm-6 col-md-offset-3 col-sm-offset-3 postionrl">
                        <div class="under-line-1">
                            <div class="line">
                            </div>
                        </div>
                        <div class="under-line-2">
                            <div class="line">
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-4">
                            <center>
                                <div class="circel-outline one">
                                    <i class="fa fa-shopping-cart"></i>
                                </div>
                                <h4><span class="margintop10">SHIPPING</span></h4>
                            </center>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <center>
                                <div class="circel-outline two">
                                    <i class="fa fa-star"></i>
                                </div>
                                <h4><span class="margintop10">REVIEW</span></h4>
                            </center>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <center>
                                <div class="circel-outline three">
                                    <i class="fa fa-credit-card"></i>
                                </div>
                                <h4><span class="margintop10">PAYMENT</span></h4>
                            </center>
                        </div>
                    </div>

                    <div class="full-width">
                        <?php if ($cartItems) { ?>
                            <div class="col-md-9 col-sm-9">
                                <div class="delivere" >
                                    <div class="row ">
                                        <form class="form-bordered" method="post" id="userForm">
                                            <div id="billing_address">
                                                <div id="SerMsgaddress"> </div>   
                                                <?php
                                                $condition_address = " `user_id` = '" . $login_id . "' order by id desc ";
                                                $result_adr = $dbComObj->viewData($conn, "billing_address", "*", $condition_address);
                                                $num_adr = $dbComObj->num_rows($result_adr);
                                                if ($num_adr > 0) {
                                                    $i = 0;
                                                    while ($address = $dbComObj->fetch_object($result_adr)) { //print_r($address)
                                                        ?>
                                                        <div class="col-md-12 foundation" id="address_b<?Php echo $address->id ?>">
                                                            <h3>ADDRESS <?php echo $i+=1 ?></h3>
                                                            <div class="foundation_sm" style="padding:10px;">      
                                                                <ul>
                                                                    <li><i class="fa fa-user-o" aria-hidden="true"></i> Name  :
                                                                        <?php echo $address->first_name . ' ' . $address->last_name ?></li>
                                                                    <!--<li><i class="fa fa-envelope-o" aria-hidden="true"></i>
                                                                    <?php echo $address->email; ?></li>-->
                                                                    <li><i class="fa fa-address-card" aria-hidden="true"></i>
                                                                        <?php echo $address->address ?></li> 
                                                                    <li><i class="fa fa-location-arrow" aria-hidden="true"></i>
                                                                        <?php echo $address->city . ', ' . $address->state . ', ' . $address->zip_code ?></li>
                                                                    <li><i class="fa fa-phone" aria-hidden="true"></i> <?php echo $address->phone_no ?></li>
                                                                </ul>
                                                                <div class="col-md-12 col-sm-12 margintop10 form-group">
                                                                    <p><input id="radio<?Php echo $address->id ?>"  class="checked_address ignore" name="checked_address1" type="radio" value="<?php echo $address->id . ',' . $address->email; ?>">
                                                                        <label for="radio<?Php echo $address->id ?>" class="checked_address_label">Tick to deliver to the billing address above </label></p>
                                                                </div> 
                                                                <button class="btn btn-success center " onclick="return deleteAddress('<?Php echo $address->id ?>');" id="addressremove"><i class="fa fa-trash" aria-hidden="true" style="margin-left: -5px;"></i></button>

                                                            </div> 
                                                        </div>



                                                        <?php
                                                    }
                                                }
                                                ?>     
                                            </div>
                                            <?php if ($num_adr > 0) { ?> 
                                                <div class="col-md-12 col-sm-12 form-group margintop20">
                                                    <p style="text-align:center;"><input type="checkbox" id="foroneregister" class="newaddress" value="2" name="roll_type" onchange="addressValueChanged()"> 
                                                        <label for="foroneregister" style="font-size: 16px !important;"><b>Tick to deliver to New billing address above </b> </label></p>
                                                </div> 
                                            <?php } ?>
                                            <div id="add_new_address"  class="col-md-12 col-sm-12" <?php if ($num_adr > 0)
                                            echo 'style="display: none;"';
                                        else
                                            echo 'style="display: block;"'
                                            ?>>

                                                <div id="userResult"></div>
                                                <div class="col-md-6 col-sm-6">
    <?php // print_r($_SESSION);  ?>
                                                    <div class="form-group">
                                                        <h4>First Name*</h4>
                                                        <input type="text" class="form-control" required  name="first_name" value="">
                                                    </div>
                                                    <div class="form-group">
                                                        <h4>Last Name*</h4>
                                                        <input type="text" class="form-control" required name="last_name" value="">
                                                    </div>
                                                    <div class="form-group">
                                                        <h4>Email Address*</h4>
                                                        <input type="email" class="form-control" required name="email" value="<?php if (isset($_SESSION['user_email'])) echo $_SESSION['user_email']; ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <h4>Address*</h4>
                                                        <input type="text" class="form-control " required  name="address" value="">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6">
                                                    <div class="form-group">
                                                        <h4>City*</h4>
                                                        <input type="text" class="form-control" required name="city">
                                                    </div>
                                                    <div class="form-group">
                                                        <h4>State / Province*</h4>
                                                        <input type="text" class="form-control" required name="state">
                                                    </div>
                                                    <div class="form-group">
                                                        <h4>Zip / Postal Code *</h4>
                                                        <input type="number" minlength="6" maxlength="7" class="form-control" required name="zip_code">
                                                    </div>
                                                    <div class="form-group">
                                                        <h4>Phone Number*</h4>
                                                        <input type="number" class="form-control"  minlength="10" maxlength="12" required  name="phone_no">
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-sm-12 margintop10 form-group"  >
                                                    <p><input type="radio" id="radio" required="" class="checked_address2" name="checked_address"> <label for="radio">Tick to deliver to the billing address above </label></p>
                                                </div>
                                            </div>
                                            <div class="col-md-offset-3 col-sm-offset-3 col-md-6 col-sm-6 margintop10">

                                                <input type="hidden" name="mode" value="<?php echo base64_encode("addBillingAddress"); ?>" />
                                                <!--                         <button type="button"  class="btn btn-success btn-block" id="next-setp-1">Next </button>-->
                                                <input type="submit" name="save"  class="btn btn-success btn-block" id="next-setp-1" value="next" /> 
                                            </div>

                                        </form>
                                    </div>
                                </div>

                                <div class="review">
                                    <div class="full-width margintop10">
                                        <div class="">
                                            <div class="hading-green"><h4>REVIEW YOUR ORDER</h4></div>
                                            <div class="full-width margintop10 border-bottmo">
                                                <div class="col-md-6 col-sm-6">
                                                    <h5><strong>Product</strong></h5>
                                                </div>
                                                <!-- <div class="col-md-3 col-sm-3">
                                                     <h5><strong>Qty</strong></h5>
                                                 </div>
                                                 <div class="col-md-3 col-sm-3">
                                                     <h5><strong>Price</strong></h5>
                                                 </div>-->
                                            </div>
                                            <?php
                                            if ($cartItems) { //print_r($cartItems);
                                                $subtotalR = 0;
                                                foreach ($cartItems as $cartItem) {
                                                    foreach ($cartItem as $key => $item) {

                                                        $productId = $item->productId;
                                                        $sellerId = $item->sellerName;
                                                        $slug = $item->slug;
                                                        $sku_product = $item->sku_product;
                                                        $productName = $item->productName;
                                                        $total_price = $item->total_price;
                                                        $subtotalR += $total_price;
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
                                                            <div class="full-width margintop10 border-bottmo">
                                                                <div class="col-md-6 col-sm-6">
                                                                    <div class="col-md-3 col-sm-3">
                                                                        <div class="row">
                                                                            <p><img src="<?php echo $thumb_image_cart; ?>" class="img-responsive"></p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-9 col-sm-9">
                                                                        <p><small><strong><?php echo $productName; ?></strong></small></p>
                                                                        <p><?php echo $item->sellerName; ?></p>

                                                                        <h5><strong> Qty <span> <?php echo $item->qty; ?> </span></strong></h5>
                                                                        <h5><strong> Price <span><?php echo CURRENCY_SYMBOL . number_format($total_price, 2); ?></span></strong></h5>
                                                                    </div>
                                                                </div>
                                                                <!--<div class="col-md-3 col-sm-3">
                                                                    <h5><strong><?php echo $item->qty; ?></strong></h5>
                                                                </div>
                                                                <div class="col-md-3 col-sm-3">
                                                                    <h5><strong><?php echo CURRENCY_SYMBOL . number_format($total_price, 2); ?></strong></h5>
                                                                </div>-->
                                                            </div>

                                                            <?php
                                                        }
                                                    }
                                                }
                                                $totalpriceR = $subtotalR + $Shipping_charge;
                                                ?>

                                                <div class="col-md-12 col-sm-12 margintop10 border-bottmo">
                                                    <p> Delivered to you in by <?php echo Date('D d F Y', strtotime("+3 days")); ?>. </p>
                                                </div>
                                                <div class="full-width margintop10 border-bottmo">
                                                    <div class="col-md-4 col-sm-4">
                                                        <p>Subtotal <span style="float:right;"> <?php echo CURRENCY_SYMBOL . number_format($subtotalR, 2); ?> </span></p>
                                                    </div>
                                                </div>

                                                <div class="full-width margintop10 border-bottmo">
                                                    <div class="col-md-4 col-sm-4">
                                                        <p>Shipping charge <span style="float:right;"> <?php echo CURRENCY_SYMBOL . number_format($Shipping_charge, 2); ?> </span> </p>
                                                    </div>
                                                </div>
                                                <div class="full-width margintop10">
                                                    <div class="col-md-4 col-sm-4">  
                                                        <p> <strong> Total </strong> <span style="float:right; font-weight:bold;"> <?php echo CURRENCY_SYMBOL . number_format($totalpriceR, 2); ?> </span></p>
                                                    </div>
                                                </div>
                                                <?php
                                            } else {
                                                echo '<h2 align= "center">Your cart is Empty</h2>';
                                                ?>
                                                <a href="<?php echo BASE_URL; ?>grid/" style="float:right;" class="btn btn-default ">Continue Shoping</a>

                                                <?php
                                            }
                                            $totalpriceR = $subtotalR + $Shipping_charge;
                                            ?>

                                        </div>
                                        <div class="col-md-offset-3 col-sm-offset-3 col-md-6 col-sm-6 margintop10">
                                            <a href="javascript:void(0)" class="btn btn-success btn-block" id="next-setp-2">Next</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="card">

                                    <form class="form-bordered" method="post" id="userForm">


                                        <div class="col-md-12 col-sm-12 margintop10" form-group="">
                                            <p><input id="radiocod" required="" name="order_type" type="radio" value="COD">
                                                <label for="radiocod">COD </label></p>
                                        </div>
                                        <div class="col-md-12 col-sm-12 margintop10" form-group="">
                                            <p><input id="radiopaypal" required="" name="order_type" type="radio"value="Paypal"> 
                                                <label for="radiopaypal">Paypal </label></p>
                                        </div>
                                        <div class="full-width margintop10">
                                            <!--                                    <div class="col-md-12 col-sm-12">
                                                                                    <input type="text" class="form-control" name="" placeholder="Enter Debit Card No">
                                                                                    <select class="form-control margintop10">
                                                                                        <option>Select Bank</option>
                                                                                        <option>Stata Bank</option>
                                                                                        <option>ICIC Bank</option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="full-width margintop10">
                                                                                    <div class="col-md-4 col-sm-4">
                                                                                        <h4>Expiary Date</h4>
                                                                                        <input type="text" class="form-control" placeholder="MM" name="">
                                                                                    </div>
                                                                                    <div class="col-md-4 col-sm-4">
                                                                                        <input type="text" class="form-control margintop40" placeholder="YY" name="">
                                                                                    </div>
                                                                                    <div class="col-md-4 col-sm-4">
                                                                                        <h4>CVV</h4>
                                                                                        <input type="text" class="form-control" placeholder="CVV" name="">
                                                                                    </div>
                                                                                </div>-->
                                            <div class="col-md-offset-3 col-sm-offset-3 col-md-6 col-sm-6 margintop30">
                                                <a href="javascript:void(0)" class="btn btn-success btn-block" id="next-setp-3">Finish</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="successfull col-md-12 col-sm-12">
                                <center>
                                    <div id="SerOrderResult"> </div>
                                    <h4>Done</h4>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                </center>
                            </div>

                            <div class="col-md-3 col-sm-3">
                                <div class="summry">
                                    <h4 class="hadding">Summary</h4>
                                    <?php
                                    if ($cartItems) { //print_r($cartItems);
                                        $subtotal = 0;
                                        foreach ($cartItems as $cartItem) {
                                            foreach ($cartItem as $key => $item) {
                                                //  print_r( $value);
                                                // print_r( $value['productData']['productId']);
                                                //die
                                                $productId = $item->productId;
                                                $sellerId = $item->sellerName;
                                                $slug = $item->slug;
                                                $sku_product = $item->sku_product;
                                                $productName = $item->productName;
                                                $total_price = $item->total_price;
                                                $subtotal += $total_price;
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

                                                        </div>
                                                        <div class="col-md-9 col-sm-9">
                                                            <h4 class="sub-hadding"><?php echo $productName; ?></h4>
                    <?php if ($sellerId) echo '<div>' . $sellerId . '</div>' ?>
                    <!--                                                        <h4 class="hadding text-left">Designer:<?php // echo $ajGenObj->NameById($item->Brand, 'brands'); // echo $data->Brand;        ?></h4>-->
                                                            <p class="font-18" ><span id="cart_price_<?php echo $item->productId; ?>"><?php echo CURRENCY_SYMBOL . number_format($total_price, 2); ?></span>
                                                            </p>
                                                            <hr>
                                                        </div>

                                                    </div>
                                                    <?php
                                                }
                                            }
                                        }
                                        $totalpricewithShip = $subtotal + $Shipping_charge;
                                        ?>
                                        <!--                            <div class="summry">
                                                                        <h4 class="hadding">Summary</h4>
                                                                        <p>Designer Name</p>
                                                                        <h4 class="hadding text-left">Romance Heart Ring Wrap</h4>
                                                                        <p class="border-bottom-2"><a href="#"><span>193 Customer Reviews</span></a> </p>-->
                                        <p class="font-18">Sub Total <span class="pull-right"><strong> <?php echo CURRENCY_SYMBOL . number_format($subtotal, 2); ?></strong></span></p>
                                        <p class="font-18 border-bottom-2">Shipping <span class="pull-right"><strong> <?php echo CURRENCY_SYMBOL . number_format($Shipping_charge, 2); ?></strong></span></p>
                                        <p class="font-18"><strong>Total:</strong> <span class="pull-right"><strong><?php echo CURRENCY_SYMBOL . number_format($totalpricewithShip, 2); ?></strong></span></p>
                                        <p class="margin0 pull-right sm-p">(Import duties included)</p>
                                        <?php
                                    }else {
                                        echo '<h2 align= "center">Your cart is Empty</h2>';
                                        ?>
                                        <a href="<?php echo BASE_URL; ?>grid/" style="float:right;" class="btn btn-default ">Continue Shoping</a>
                                        <?php
                                    }
                                    $totalpricewithShip = $subtotal + $Shipping_charge;
                                    ?>
                                </div>
                            </div>

                            <?php
                        } else {
                            echo '<h2 align= "center">Your cart is Empty</h2>';
                            ?>
                            <a href="<?php echo BASE_URL; ?>grid/" style="float:right;" class="btn btn-default ">Continue Shoping</a>
<?php }
?>
                    </div>    
                    <script>

                        // var  address_checked_val= $('input[name="checked_address"]:checked').val();
                        //         alert(address_checked_val);
                        function addressValueChanged() {
                            if ($('.newaddress').is(":checked")) {
                                $("#add_new_address").show(300);
                                $("#billing_address").hide(300);
                            }
                            else {
                                $("#add_new_address").hide(300);
                                $("#billing_address").show(300);
                            }
                        }
                        $(document).ready(function () {
                            addressValueChanged
                            var formid = 'userForm';
                            var address_checked_val = '';
                            $("#next-setp-1").click(function () {
                                $("#userForm").validate({
                                    ignore: ".ignore",
                                    errorPlacement: function (error, element) {
                                        // Append error within linked label
                                        $(element).closest('.form-group').append(error);
                                        $(element).closest('.form-group-sm').append(error);


                                    }
                                })
                                var address_checked_val = $('input[name="checked_address1"]:checked').val();
                                if (address_checked_val) {
                                    //  alert(address_checked_val);
                                    //  return true;
                                    $(".under-line-1").addClass("grenn");
                                    $(".one").addClass("grenn");
                                    $(".delivere").hide("");
                                    $(".review").show("");
                                    //  return true;
                                }
                                if (!address_checked_val) {
                                    var resulres = 'please Select Billing  address';
                                    var textresult = '<div class="alert alert-danger"><button class="close" data-dismiss="alert" type="button"><span aria-hidden="true">X</span></button>' + resulres + '</div>';
                                    $("#SerMsgaddress").html(textresult);
                                }
                                if ($("#" + formid).valid()) {

                                    $(".loading-overlay").show();
                                    var datastring = ($("#" + formid).serialize());
                                    //alert(datastring);
                                    $.ajax({
                                        type: "POST",
                                        data: datastring,
                                        url: "<?php echo BASE_URL ?>controller/billing_address_operation.php",
                                        success: function (result) {
                                            var oOutput = $("#userResult");
                                            //  alert(result);
                                            if (result) {
                                                //  alert(result);
                                                if (result.indexOf("Success :") != -1) {
                                                    var textresult = '<div class="alert alert-success"><button class="close" data-dismiss="alert" type="button"><span aria-hidden="true">×</span></button>' + result + '</div>';
                                                } else {
                                                    var textresult = '<div class="alert alert-danger"><button class="close" data-dismiss="alert" type="button"><span aria-hidden="true">×</span></button>' + result + '</div>';
                                                }
                                                $("#userResult").html(textresult);
                                                $(".loading-overlay").hide();
                                                //alert(response);
                                                $(".under-line-1").addClass("grenn");
                                                $(".one").addClass("grenn");
                                                $(".delivere").hide("");
                                                $(".review").show("");
                                            }
                                            else {
                                                alert('Error occured on results');
                                            }
                                        }
                                    });
                                    return false;
                                } else {
                                    return false;
                                }


                                //    });
                            });
                            $("#next-setp-2").click(function () {
                                $(".under-line-2").addClass("grenn");
                                $(".two").addClass("grenn");
                                $(".delivere").hide("");
                                $(".review").hide("");
                                $(".card").show("");
                            });
                            $("#next-setp-3").click(function () {
                                var order_type = '';
                                var subtotal = '<?php echo CURRENCY_SYMBOL . number_format($subtotal, 2); ?>';
                                var total_amt = '<?php echo CURRENCY_SYMBOL . number_format($totalpricewithShip, 2); ?>';
                                var address_id = $('input[name="checked_address1"]:checked').val();
                                var order_type = $('input[name="order_type"]:checked').val();
                                var Sales_tax = '0.00';
                                var Shipping_charge = '<?php echo $Shipping_charge; ?>';
                                var mode = '<?php echo base64_encode('addOrder'); ?>';
                                //  alert(subtotal);  alert(total_amt);  alert(address_id);  alert(order_type);  alert(Shipping_charge);  
                                var datastring = {subtotal: subtotal, total_amt: total_amt, address_id: address_id,
                                    order_type: order_type, Sales_tax: Sales_tax, mode: mode,
                                }
                                if (order_type) {
                                    $.ajax({
                                        type: "POST",
                                        data: datastring,
                                        url: "<?php echo BASE_URL ?>controller/order_operations.php",
                                        success: function (result) {
                                            if (result) {
                                                //  alert(result);
                                                if (result.indexOf("Success :") != -1) {
                                                    var textresult = '<div class="alert alert-success"><button class="close" data-dismiss="alert" type="button"><span aria-hidden="true">X</span></button>' + result + '</div>';
                                                    setTimeout(function () {
                                                        location.reload();
                                                    }, 3000);
                                                } else {
                                                    var textresult = '<div class="alert alert-danger"><button class="close" data-dismiss="alert" type="button"><span aria-hidden="true">X</span></button>' + result + '</div>';
                                                }
                                                $("#SerOrderResult").html(textresult);
                                                $(".loading-overlay").hide();
                                                $(".under-line-2").addClass("grenn");
                                                $(".three").addClass("grenn");
                                                $(".delivere").hide("");
                                                $(".review").hide("");
                                                $(".card").hide("");
                                                $(".successfull").show("");
                                                $(".summry").hide("");
                                            }
                                            else {
                                                alert('Error occured');
                                            }
                                        }
                                    });
                                } else {
                                    var textresult = '<div class="alert alert-success"><button class="close" data-dismiss="alert" type="button"><span aria-hidden="true">×</span></button> please select Payment Type</div>';

                                    $("#SerOrderResult").html(textresult);
                                }

                            });
                        });
                    </script>




                </div>
            </div>

        </div>
    </div>
</div>
<div id="loading-overlay" class="loading-overlay"></div>     

<script type="text/javascript">
    // checked_address
    $('.checked_address2').click(function () {
        //alert(1);
        if ($('.checked_address2').is(":checked")) {
            $('.checked_address').attr('checked', false);
        } else {
            $('.checked_address').attr('checked', true);
        }
    });
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
    function deleteAddress(a)
    {
        var cr = confirm("Are you sure to delete this Address?");
        if (cr) {
            $.post('<?php echo BASE_URL; ?>controller/billing_address_operation.php', {a: a, mode: '<?php echo base64_encode('deleteAddress'); ?>'}, function (data) {
                // alert(data);

                if (data) {
                    if (data.indexOf("Success :") != -1) {
                        var message = '<div class="alert alert-success alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">X</a><strong></strong> ' + data + ' </div>';
                    } else {
                        var message = '<div class="alert alert-info  alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">X</a><strong></strong> ' + data + ' </div>';
                    }
                    $('#SerMsgaddress').html(message);
                    $('#address_b' + a).remove();

                    //  alert(' Address deleted successfully.');
                }
                // window.location.reload();
                return false;
            });

            return false;
        }
    }
</script>
<?php include 'include/footer.php'; ?>