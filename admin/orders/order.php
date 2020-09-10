<?php
include '../../page_fragment/define.php';
include '../../page_fragment/topScript.php';
$site_title = "Admin eCommerce | Manage category | MarketPlace at Home";
include '../../inc/config.php';
$table = '`orders`';
if (isset($_GET['a'])) {
    $txt = "Manage";
    $id = $njEncryptionObj->safe_b64decode($_GET['a']);
    $condition = " `id` = '" . $id . "'";
    $qry = $dbComObj->viewData($conn, $table, "*", $condition);
    $num = $dbComObj->num_rows($qry);
    $order = $dbComObj->fetch_assoc($qry);
}
?>
<?php include '../../inc/template_start.php'; ?>
<?php include '../../inc/page_head.php'; ?>
<!-- Page content -->
<div id="page-content">
    <!-- Forms General Header -->
    <div class="content-header">
        <div class="header-section">
            <h1>
                <i class="gi gi-notes_2"></i><?php echo $txt; ?> Order details
            </h1>
        </div>
    </div>

    <!-- END Forms General Header -->
    <!-- Form Example with Blocks in the Grid -->
    <div class="row">
        <div class="col-sm-12">
            <!-- Example Form Block -->
            <div class="block">

                <div class="row">
                    <div class="col-xs-12">
                        <div class="text-center">
                            <i class="fa fa-search-plus pull-left icon"></i>
                            <h2>Order No #<?php echo $order['order_no']; ?></h2>
                        </div>
                        <hr>   
                        <div class="row">
                            <div class="col-xs-12 col-md-6 col-lg-6 pull-left">
                                <div class="panel panel-default height">
                                    <div class="panel-heading">Billing Details</div>
                                    <div class="panel-body">
                                        <?php
                                        $condition_address = " `id` = '" . $order['address_id'] . "'";
                                        $qry_address = $dbComObj->viewData($conn, "`billing_address`", "*", $condition_address);
                                        $num1 = $dbComObj->num_rows($qry_address);
                                        $address = $dbComObj->fetch_assoc($qry_address);
                                        if ($address) {
                                            ?>
                                            <strong>Name: </strong><?php echo $address['first_name'] . ' ' . $address['last_name'] ?><br>
                                            <?php echo $address['address'] ?><br>
                                            <?php echo $address['city'] ?><?php echo $address['state'] ?><br>
                                            <strong><?php echo $address['zip_code'] ?></strong><br>
<?php } ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-6 col-lg-6">
                                <div class="panel panel-default height">
                                    <div class="panel-heading">Payment/Order Information</div>
                                    <div class="panel-body">   
                                        <strong>Payment Type : </strong><?php echo $order['payment_type']; ?><br>
                                        <?php
                                        if ($order['Paid'] && $order['payment_type'] != "COD") {
                                            if ($order['Paid'] == 1)
                                                $paid = "Done";
                                            else
                                                $paid = "Not Done";
                                            echo"<strong>Payment type: </strong>" . $order['Paid'] . "<br>";
                                        }
                                        ?> 

                                        <?php
                                        if ($order['courier_company']) {
                                            echo"<strong>Courier Company: </strong>" . $order['courier_company'] . "<br>";
                                        }
                                        ?> 
                                        <?php
                                        if ($order['tracking_id']) {
                                            echo"<strong>Tracking id: </strong>" . $order['tracking_id'] . "<br>";
                                        }
                                        ?> 
                                        <?php
                                        if ($order['Paid']) {
                                            echo"<strong>Payment status: </strong>" . $order['Paid'] . "<br>";
                                        }
                                        ?> 
                                        <?php
                                        if ($order['order_status'] == '1') {
                                            $ordertext = 'Delivered';
                                            $order_status = '<span class="label label-sm label-success"> Delivered</span>';
                                        } else if ($order['order_status'] == '2') {
                                            $ordertext = 'Rejected';
                                            $order_status = '<span class="label label-sm label-danger"> Rejected</span>';
                                        } else if ($order['order_status'] == '3') {
                                            $ordertext = 'Cancel';
                                            $order_status = '<span class="label label-sm label-danger"> Cancel</span>';
                                        } else {
                                            $ordertext = 'Pending';
                                            $order_status = '<span class="label label-sm label-info">Pending</span>';
                                        }
                                        ?>
<?php
if ($ordertext) {
    echo"<strong>Order Status: </strong>" . $order_status . "<br>";
}
?> 

<!--                            <strong>Card Name:</strong> Visa<br>
  <strong>Card Number:</strong> ***** 332<br>
  <strong>Exp Date:</strong> 09/2020<br>-->
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-md-12 col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">Track Order</div>
                        <div class="panel-body"> 
                            <div id="result_track"> </div> 
                            <form class="form-inline form-bordered" id="form_track_order" enctype="multipart/form-data" method="post" data-parsley-validate>
                                <div class="form-group">
                                    <label for="Tracking no">Tracking no:</label>
                                    <input type="text"  minlength="8"  class="form-control" value="<?php echo $order['tracking_id']; ?>" required name="tracking_no" id="tracking_no">
                                </div>     
                                <div class="form-group">
                                    <label for="pwd">Courier company:</label>
                                    <input type="text" class="form-control" required="" value="<?php echo $order['courier_company']; ?>" name="courier_company" id="courier_company">
                                </div>
                                <div class="form-group">
                                    <label for="pwd">Comment:</label>
                                    <textarea class="form-control"    name="comment"  id="comment"><?php echo $order['comments']; ?></textarea>

                                </div>

                                <div class="form-group form-actions">

                                    <input type="hidden" name="todo" value="<?php echo base64_encode("trackOrder"); ?>" />
                                    <input type="hidden" name="id" value="<?php echo base64_encode($id); ?>" />
<?php if (!isset($_GET['a'])) { ?>
                                        <button type="reset" class="btn btn-primary">Reset</button>
<?php } ?>
                                    <button type="button" onclick="formSubmit('form_track_order', 'result_track', '<?php echo SELLER_URL; ?>orders/order_operations.php')" class="btn btn-success srSubmitBtn">Submit</button>

                                </div>
                            </form>
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

                                            <tr>
                                                <td><?php echo $order['product_name']; ?></td>
                                                <td class="text-center"> <?php echo CURRENCY_SYMBOL . number_format($order['total_price'], 2); ?> </td>
                                                <td class="text-center"> <?php echo $order['quantity']; ?></td>
                                                <td class="text-right"> <?php echo CURRENCY_SYMBOL . number_format($order['total_price'], 2); ?> </td>
                                            </tr>
                                            <tr>
                                                <td class="highrow"></td>
                                                <td class="highrow"></td>
                                                <td class="highrow text-center"><strong>Subtotal</strong></td>
                                                <td class="highrow text-right"><?php echo CURRENCY_SYMBOL . number_format($order['total_price'], 2); ?> </td>
                                            </tr>
                                            <tr>
                                                <td class="emptyrow"><i class="fa fa-barcode iconbig"></i></td>
                                                <td class="emptyrow"></td>
                                                <td class="emptyrow text-center"><strong>Total</strong></td>
                                                <td class="emptyrow text-right"><?php echo CURRENCY_SYMBOL . number_format($order['total_price'], 2); ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>   
                </div>
                <style>
                    .height {
                        min-height: 200px;
                    }

                    .icon {
                        font-size: 47px;
                        color: #5CB85C;
                    }

                    .iconbig {
                        font-size: 77px;
                        color: #5CB85C;
                    }

                    .table > tbody > tr > .emptyrow {
                        border-top: none;
                    }

                    .table > thead > tr > .emptyrow {
                        border-bottom: none;
                    }

                    .table > tbody > tr > .highrow {
                        border-top: 3px solid;
                    }
                </style>
                <!-- END Example Form Content -->
            </div>
        </div>
    </div>
    <!-- END Form Example with Blocks in the Grid -->
</div>
<!-- END Page Content -->

<?php include '../../inc/page_footer.php'; ?>
<?php include '../../inc/template_scripts.php'; ?>
<!-- Load and execute javascript code used only in this page -->
<script src="../../js/pages/formsGeneral.js"></script>
<script>$(function () {
                                    FormsGeneral.init();
                                });
</script>
<?php /*
  function fetchCategoryTree($parent = 0, $spacing = '', $user_tree_array = '') {
  $dbComObj = new dbGeneral();
  $dbConObj = new dbConnect();
  $conn = $dbConObj->dbConnect();
  if (!is_array($user_tree_array))
  $user_tree_array = array();
  $condition = "1 AND `parent_id` = '".$parent."' ORDER BY id ASC";
  $result = $dbComObj->viewData($conn,"category", "*",$condition);
  $num = $dbComObj->num_rows($result);
  if ($num > 0) {
  while ($data = $dbComObj->fetch_assoc($result))
  {
  $user_tree_array[] = array("id" =>$data['id'], "name" => $spacing . $data['name']);
  $user_tree_array = fetchCategoryTree($data['id'], $spacing . '&nbsp;&nbsp;', $user_tree_array);
  }
  }
  return $user_tree_array;
  } */ ?>
<?php include '../../seller_inc/template_end.php'; ?>
                       