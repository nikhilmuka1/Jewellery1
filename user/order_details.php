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
$table="`orders`";
if ($_SESSION) {
    if (isset($_SESSION['user_id']))
        $login_id = $_SESSION['user_id'];
    if (isset($_SESSION['DH_seller_id'])) {
        $login_id = $_SESSION['DH_seller_id'];
        $loginSeller = $_SESSION['DH_seller_type_name'];
    }
}
if (isset($_GET['a'])) {
     $txt = "Manage";
    $id = $njEncryptionObj->safe_b64decode($_GET['a']); 
    $condition = "`id` = '" . $id . "'";
    $qry = $dbComObj->viewData($conn, $table, "*", $condition);
    $num = $dbComObj->num_rows($qry);
     $order = $dbComObj->fetch_assoc($qry);
   
}
if (empty($login_id) && $_GET['a'] ) {
    header('Location: ' . BASE_URL);
    exit;
}

//print_r($_SESSION);
$siteTitle = "Jeweellry  | My Orders";
include '../include/user_header.php';
?>
<style>
    th.sorting_asc {
        width: 140px !important;
    }
    td {
        font-size: 13px !important;
    }

    .btn-group>.dropdown-menu:after, .dropdown-toggle>.dropdown-menu:after, .dropdown>.dropdown-menu:after {
        position: absolute;
        top: -7px;
        left: 50px !important;
        right: auto;
        display: inline-block!important;
        border-right: 7px solid transparent;
        border-bottom: 7px solid #fff;
        border-left: 7px solid transparent;
        content: '';
    }


    .btn-group>.dropdown-menu:before, .dropdown-toggle>.dropdown-menu:before, .dropdown>.dropdown-menu:before {
        position: absolute;
        top: -8px;
        left: 50px !important;
        right: auto;
        display: inline-block!important;
        border-right: 8px solid transparent;
        border-bottom: 8px solid #e0e0e0;
        border-left: 8px solid transparent;
        content: '';
    }

    .btn-group>.dropdown-menu, .dropdown-toggle>.dropdown-menu, .dropdown>.dropdown-menu {
        margin-top: 10px;
        margin-left: -40px !important;
    }
    .bars, .chart, .pie {
        height: 0px !important;
    }
    .fixed-table-container {
        height: auto !important;
    }
    .fixed-table-footer {
        display: none !important;
    }
    .fixed-table-container {
        clear: none !important;
    }
    .fixed-table-container thead th .both {
        background-image: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABMAAAATCAQAAADYWf5HAAAAkElEQVQoz7X QMQ5AQBCF4dWQSJxC5wwax1Cq1e7BAdxD5SL+Tq/QCM1oNiJidwox0355mXnG/DrEtIQ6azioNZQxI0ykPhTQIwhCR+BmBYtlK7kLJYwWCcJA9M4qdrZrd8pPjZWPtOqdRQy320YSV17OatFC4euts6z39GYMKRPCTKY9UnPQ6P+GtMRfGtPnBCiqhAeJPmkqAAAAAElFTkSuQmCC');
    }

    .fixed-table-container thead th .asc {
        background-image: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABMAAAATCAYAAAByUDbMAAAAZ0lEQVQ4y2NgGLKgquEuFxBPAGI2ahhWCsS/gDibUoO0gPgxEP8H4ttArEyuQYxAPBdqEAxPBImTY5gjEL9DM+wTENuQahAvEO9DMwiGdwAxOymGJQLxTyD+jgWDxCMZRsEoGAVoAADeemwtPcZI2wAAAABJRU5ErkJggg==');
    }

    .fixed-table-container thead th .desc {
        background-image: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABMAAAATCAYAAAByUDbMAAAAZUlEQVQ4y2NgGAWjYBSggaqGu5FA/BOIv2PBIPFEUgxjB+IdQPwfC94HxLykus4GiD+hGfQOiB3J8SojEE9EM2wuSJzcsFMG4ttQgx4DsRalkZENxL+AuJQaMcsGxBOAmGvopk8AVz1sLZgg0bsAAAAASUVORK5CYII= ');
    }
    .fixed-table-body thead th .th-inner {
        box-sizing: border-box;
    }
    .fixed-table-container thead th .sortable {
        cursor: pointer;
        background-position: right;
        background-repeat: no-repeat;
        padding-right: 30px;
    }
    /*
    .fixed-table-toolbar {
        width: 100%;
        height: 65px;
        margin-top: -40px;
    }
    */
    .fixed-table-header {
        display: none !important;
    }
    .fixed-table-loading {
        top: 55px !important;
    }
    .pull-right.search {
        width: 25% !important;
        padding: 0px 10px !important;
    }
    button.btn.btn-default {
        height: 30px !important;
    }
    a#njView {
        display: block;
        margin-bottom: 5px;
        padding: 5px;
    }
    button#refreshNj {
        border: 1px solid #55bee7;
    }
</style>

<body id="contact" class="contact hide-left-column hide-right-column lang_en  one-column">
    <div id="page">
        <?php // include './user_header.php'; ?>
        <div class="columns-container">
            <div id="columns">
                <!-- Breadcrumb -->
                <div class="breadcrumb container">
                    <ul>
                        <li class="home"><a class="home" href="<?php echo BASE_URL; ?>" title="Return to Home">home</a></li>
                        <li class="crumb-1"><a href="<?php echo BASE_URL; ?>user/<?php echo $login_name; ?>/my-account/" title="My account">My account</a></li>
                         <li class="crumb-1"><a href="<?php echo BASE_URL; ?>user/<?php echo $login_name; ?>/my-order/" title="My Order">My Order</a></li>
                        <li class="crumb-2 last"><span class="navigation-pipe">&gt;</span><span class="navigation_page"> Order details</span></li>
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
                                                
    <div class="row">
        <div class="col-xs-12">
            <div class="text-center">
                <i class="fa fa-search-plus pull-left icon"></i>
                <h2>Order No #<?php echo $order['order_no']; ?></h2>
            </div>
            <hr>   
            <div class="row">
                <div class="col-xs-12 col-md-3 col-lg-4 pull-left">
                    <div class="panel panel-default height">
                        <div class="panel-heading">Billing Details</div>
                        <div class="panel-body">
                            <?php   $condition_address = " `id` = '" . $order['address_id'] . "'";
                                        $qry_address = $dbComObj->viewData($conn,"`billing_address`", "*", $condition_address);
                                        $num1 = $dbComObj->num_rows($qry_address);
                                      $address = $dbComObj->fetch_assoc($qry_address);
                                              if($address) {?>
                            <strong>Name: </strong><?php echo $address['first_name'].' '.$address['last_name']?><br>
                            <?php echo $address['address']?><br>
                            <?php echo $address['city']?><?php echo $address['state']?><br>
                            <strong><?php echo $address['zip_code']?></strong><br>
                             <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-md-4 col-lg-4">
                    <div class="panel panel-default height">
                        <div class="panel-heading">Payment Information</div>
                        <div class="panel-body">   
                            <strong>Payment Type : </strong><?php echo $order['payment_type']; ?><br>
                              <?php if($order['Paid'] && $order['payment_type']!= "COD"){ if($order['Paid']==1)  $paid="Done"; else $paid="Not Done";
                              echo"<strong>Payment type: </strong>".$order['Paid']."<br>";
                              } ?> 
                              
                              <?php if($order['Paid']){
                              echo"<strong>Payment status: </strong>".$order['Paid']."<br>";
                              } ?> 
<!--                            <strong>Card Name:</strong> Visa<br>
                            <strong>Card Number:</strong> ***** 332<br>
                            <strong>Exp Date:</strong> 09/2020<br>-->
                        </div>
                    </div>
                </div>
              <div class="col-xs-12 col-md-4 col-lg-4">
                    <div class="panel panel-default height">
                        <div class="panel-heading">Order Preferences</div>
                        <div class="panel-body">
                            <strong>Tracking Id:</strong> <?php echo $order['tracking_id']; ?><br>
                            <strong>Courier Company:</strong> <?php echo $order['courier_company']; ?><br>                         
                           
                        </div>
                    </div>
                </div>
              
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="text-center"><strong>Order summary</strong></h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-condensed">
                            <thead>
                                <tr>
                                    <td><strong>Item Name</strong></td>
                                    <td class="text-center"><strong>Item Price</strong></td>
                                    <td class="text-center"><strong>Item Quantity</strong></td>
                                    <td class="text-right"><strong>Total</strong></td>
                                </tr>
                            </thead>
                            <tbody>
                              <?php     $condition_dtl = " `id` = '" . $id . "' ";
                                        $qry1 = $dbComObj->viewData($conn,"`orders`", "*", $condition_dtl);
                                        $num1 = $dbComObj->num_rows($qry1);
                                        if ($num1 > 0) {
                                            $i = 0;
                                            $sub_total= 0;
                                      while ($order_details = $dbComObj->fetch_assoc($qry1)){
                                           //  print_r($order_details);
                                          $sub_total  +=  $order_details['total_price'];
                                              ?>
                                            <tr>
                                                <td><?php echo $order_details['product_name']; ?></td>
                                                <td class="text-center"> <?php echo CURRENCY_SYMBOL.number_format($order_details['price'],2); ?> </td>
                                                <td class="text-center"> <?php echo $order_details['quantity']; ?></td>
                                                <td class="text-right"> <?php echo CURRENCY_SYMBOL.number_format($order_details['total_price'],2); ?> </td>
                                            </tr>
                               
                                    <?php 
                                           }

                                       } ?>
                                
                                <tr>
                                    <td class="highrow"></td>
                                    <td class="highrow"></td>
                                    <td class="highrow text-center"><strong>Subtotal</strong></td>
                                    <td class="highrow text-right"><?php echo CURRENCY_SYMBOL.number_format($sub_total,2); ?> </td>
                                </tr>
                              
                                <tr>
                                    <td class="emptyrow"><i class="fa fa-barcode iconbig"></i></td>
                                    <td class="emptyrow"></td>
                                    <td class="emptyrow text-center"><strong>Total</strong></td>
                                    <td class="emptyrow text-right"><?php echo CURRENCY_SYMBOL.number_format($sub_total,2); ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>   
</div>


                                       
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
<script src="<?php echo BASE_URL; ?>user/bootstrap-table.js"></script>
</html>