<?php
include '../../page_fragment/define.php';
include '../../page_fragment/topScript.php';
$site_title = "Admin Users | Jewelry at Home";
include '../../inc/config.php';
if (isset($_REQUEST['session_uid'])) {
    $id = $njEncryptionObj->safe_b64decode($_REQUEST['session_uid']);
} else {
    $id = '';
}
$qry = $dbComObj->viewData($conn, "users", "*", "`id`='" . $id . "'");
$num = $dbComObj->num_rows($qry);
if ($num > 0) {
    $row = $dbComObj->fetch_assoc($qry);
    $mode = "manageUsers";
    $txt = "View ";
    $bxt = "Update User";
    $req = '';
    extract($row);
} else {
    echo "<h2> NO seller detail found </h2>";
    die;
}
?>
<?php include '../../inc/template_start.php'; ?>
<?php include '../../inc/page_head.php'; ?>
<style>
    .loading-overlay{
        position: fixed;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        z-index: 999;
        background: rgba(183, 173, 173, 0.5) url(../../../img/loading.gif) no-repeat center center;
        /*background: rgba(0,0,0,0.5);*/
        display: none;
    }
</style>
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
    .fixed-table-toolbar {
        width: 100%;
        margin-top: -58px;
    }
    .fixed-table-header {
        display: none !important;
    }
    .fixed-table-loading {
        top: 55px !important;
    }
    .image-tblview {
        width: 50px;
        border: 1px solid #ccc;
        border-radius: 5px;
        padding: 1px;
    }
</style>
<!-- Page content -->
<div id="page-content">
    <!-- Forms General Header -->
    <div class="content-header">
        <div class="header-section">
            <h1>
                <i class="gi gi-user_add"></i><?php echo $txt . ' ' . $name; ?>  
            </h1>
        </div>
    </div>
    <ul class="breadcrumb breadcrumb-top">
        <li><a href="<?php echo ADMIN_URL; ?>dashboard/">Dashboard</a></li>
        <li><a href="<?php echo ADMIN_URL; ?>sellers/" class="btn btn-alt btn-xs btn-primary"><i class="hi hi-eye-open"></i> View Seller List</a></li>
        <li><?php echo $txt; ?> Seller</li>
    </ul>
    <!-- END Forms General Header -->
    <!-- Form Example with Blocks in the Grid -->
    <div class="row">
        <div class="col-sm-12">
            <!-- Example Form Block -->
            <div class="my" style="    padding: 20px 15px 1px; background:#fff;">
                   
                <div class="container">
                    <div class="row">

                        <div class="tabbable">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#tab1info" data-toggle="tab">INFO SUMMERY</a></li>
                                <li><a href="#tabproducts" data-toggle="tab">PRODUCTS</a></li>
                                <li><a href="#tabOrders" data-toggle="tab">ORDERS</a></li>
                                <li><a href="#tabstatTRA" data-toggle="tab">TRANSCATION STATEMENT VIEW</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab1info">
                                   <br><br>
                                   <?php  //print_r($row);?>
<div class="container">
 <div class="well span8 offset2">
       
        <div class="row-fluid user-infos cyruxx">
            <div class="span10 offset1">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Seller information</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row-fluid">
                            <div class="span3 col-md-2">
                                 <?php  if ($row['image'] == '' || $row['image'] == null) {
                                            $profileImage = BASE_URL.'img/user-images/avatar.jpg';
                                         //   https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=100
                                        } else {
                                            $profileImage = BASE_URL.'images/user/thumb/'.$row['image'];
                                        } ?>
                                <img class="img-circle" style=" height: 100%;width: 100%;"
                                     src="<?php echo $profileImage;?>"
                                     alt="<?php echo $row['image'];?>">
                            </div>
                            <div class="span6 col-md-10">
                                <strong>Cyruxx</strong><br>
                                <table class="table table-condensed table-responsive table-user-information">
                                    <tbody>
                                    <tr>
                                        <td>Name:</td>
                                        <td><?php echo $row['name'];?></td>
                                    </tr>
                                    
                                    <tr>
                                        <td>Email</td>
                                        <td><?php echo $row['email'];?></td>
                                    </tr>
                                    <tr>
                                        <td>Contact No</td>
                                        <td><?php echo $row['contact_no'];?></td>
                                    </tr>
                                    <tr>
                                        <td>City</td>
                                        <td><?php echo $row['city'];?></td>
                                    </tr>
                                    <tr>
                                        <td>State</td>
                                        <td><?php echo $row['state'];?></td>
                                    </tr>
                                    <tr>
                                        <td>Country</td>
                                        <td><?php echo $row['country'];?></td>
                                    </tr>
                                     <tr>
                                        <td>Address</td>
                                        <td><?php echo $row['address'];?></td>
                                    </tr>
                                     <tr>
                                        <td>About Me</td>
                                        <td><?php echo base64_decode($row['aboutme']);?></td>
                                    </tr>
                                     <tr>
                                        <td>Status</td>
                                        <td><?php if($row['status'] == 1)
                                                {
                                                      $textt = 'De-active';
                                                      $content = '<span class="label label-sm label-success"> Active </span>';
                                                }
                                                else
                                                {
                                                      $textt = 'Active';
                                                      $content = '<span class="label label-sm label-danger"> De-active </span>';
                                                } 
                                                echo $content;
                                                ?>
                                        </td>
                                    </tr>
                                     <tr>
                                        <td>Approved</td>
                                        <td><?php if($row['approved'] == 1)
                                                {
                                                      $textt = 'De-active';
                                                      $content = '<span class="label label-sm label-success"> Approved </span>';
                                                }
                                                else
                                                {
                                                      $textt = 'Active';
                                                      $content = '<span class="label label-sm label-danger"> Decline </span>';
                                                } 
                                                echo $content;
                                                ?></td>
                                    </tr>
                                    <tr>
                                        <td>Registered Since:</td>
                                        <td><?php echo date('d M Y', strtotime($row['added_on']));?></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
<!--                    <div class="panel-footer">
                        <button class="btn  btn-primary" type="button"
                                data-toggle="tooltip"
                                data-original-title="Send message to user"><i class="icon-envelope icon-white"></i></button>
                        <span class="pull-right">
                            <button class="btn btn-warning" type="button"
                                    data-toggle="tooltip"
                                    data-original-title="Edit this user"><i class="icon-edit icon-white"></i></button>
                            <button class="btn btn-danger" type="button"
                                    data-toggle="tooltip"
                                    data-original-title="Remove this user"><i class="icon-remove icon-white"></i></button>
                        </span>
                    </div>-->
                </div>
            </div>
        </div>
          
       <div class="row-fluid user-infos cyruxx">
            <div class="span10 offset1">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Shop Information</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row-fluid">
                            <div class="span3 col-md-2">
                                  <?php  if ($row['shop_image'] == '' || $row['shop_image'] == null) {
                                            $shopImage = BASE_URL.'img/user-images/avatar.jpg';
                                         //   https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=100
                                        } else {
                                            $shopImage = BASE_URL.'images/user/shop/thumb/'.$row['shop_image'];
                                        } ?>
                                <img class="img-circle" style=" height: 100%;width: 100%;"
                                     src="<?php echo $shopImage;?>"
                                     alt="User Pic">
                            </div>
                            <div class="span6 col-md-10">
                                <strong>Cyruxx</strong><br>
                                <table class="table table-condensed table-responsive table-user-information">
                                    <tbody>
                                     <tr>
                                        <td>Shop Name</td>
                                        <td><?php echo $row['shop_name'];?></td>
                                    </tr>
                                      <tr>
                                        <td>Shop Heading</td>
                                        <td><?php echo $row['shop_heading'];?></td>
                                    </tr>
                                      <tr>
                                        <td>Discripation</td>
                                        <td><?php echo ($row['discripation']);?></td>
                                    </tr>
                                      <tr>
                                        <td>Contact No.</td>
                                        <td><?php echo ($row['shop_contact']);?></td>
                                    </tr>
                                      <tr>
                                        <td>Shop Policy</td>
                                        <td><?php echo base64_decode($row['shop_policy']);?></td>
                                    </tr>
                                    <tr>
                                        <td>Payment Policy</td>
                                        <td><?php echo base64_decode($row['payment_policy']);?></td>
                                    </tr>
                                     <tr>
                                        <td>Shipping Return Policy</td>
                                        <td><?php echo base64_decode($row['shipping_return_policy']);?></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
      
    
    </div>
</div>
                                </div>
                                    <!--- seller info tab content end ------> 
                                <div class="tab-pane" id="tabproducts">
                                    <div class="block">
                                        <!-- Example Form Title -->
                                        <div class="block-title">
                                         
                                        </div>
                                        <!-- END Example Form Title -->
                                        <!-- Example Form Content -->
                                        <table data-toggle="table" data-toolbar="#toolbar" data-search="true" data-show-refresh="true" data-show-toggle="true" data-show-columns="true"
                                               data-sort-name="stargazers_count" data-sort-order="desc" data-show-export="true" data-show-pagination-switch="true" data-pagination="true"
                                               data-show-footer="true" data-height="400" data-url="<?php echo ADMIN_URL; ?>seller/fetchinfDataFromTables.php?a=products&SID=<?php if (isset($_REQUEST['session_uid'])) echo $_REQUEST['session_uid'];  ?>" data-query-params="queryParams"
                                               data-pagination="true" data-search="true">
                                            <thead>

                                                <tr> <th data-field="id" data-sortable="true">Sr.No</th>
                                                    <th data-field="product_id" data-sortable="true">Product ID</th>
                                                    <th data-field="product_name" data-sortable="true">Name</th>
                                                    <th data-field="product_type" data-sortable="true">Type</th>
                                                    <th data-field="Brand" data-sortable="true">Brand</th>
                                                    <th data-field="category" data-sortable="true">Category</th>
                                                    <th data-field="SKU" data-sortable="true">SKU</th>
                                                    <th data-field="price" data-sortable="true">Price</th>
                                                    <th data-field="quantity" data-sortable="true">Quantity</th> 
                                                    <th data-field="is_available" data-sortable="true">Available</th>
                                                    <th data-field="status" data-sortable="true">Status</th>
                                                    <th data-field="action" data-sortable="false">Action</th>

                                                </tr>
                                            </thead>
                                        </table>                

                                    </div>
                                </div>
                                    <!---PRoducts tab content end ------> 
                                <div class="tab-pane" id="tabOrders">
                                    <div class="block">
                                        <!-- Example Form Title -->
                                        <div class="block-title">
                                         
                                        </div>
                                        <!-- END Example Form Title -->
                                        <!-- Example Form Content -->
                                                 

                                            <table id="" class="table table-vcenter table-condensed table-bordered" data-toggle="table" data-toolbar="#toolbar" data-search="true" data-show-refresh="true" data-show-toggle="true" data-show-columns="true"
                                                   data-sort-name="stargazers_count" data-sort-order="desc" data-show-export="true" data-show-pagination-switch="true" data-pagination="true"
                                                   data-show-footer="true" data-height="400" data-url="<?php echo ADMIN_URL; ?>seller/fetchinfDataFromTables.php?a=orders&SID=<?php if (isset($_REQUEST['session_uid'])) echo $_REQUEST['session_uid'];  ?>" data-query-params="queryParams"
                                                   data-pagination="true" data-search="true">
                                                <thead>
                                                    <tr><th data-field="id" data-sortable="true">#</th>
                                                        <th data-field="order_no" data-sortable="true">Order No.</th>
                                                        <th data-field="user_id" data-sortable="true">Name</th>
                                                        <th data-field="product_name" data-sortable="true">Product Name</th>
                                                        <th data-field="quantity" data-sortable="true">Qty</th>
                                                        <th data-field="ammount" data-sortable="true">Ammount</th>
                                                        <th data-field="payment_type" data-sortable="true">Payment Type</th>
                                                        <th data-field="paid" data-sortable="true">Payement status</th>
                                                        <th data-field="order_status" data-sortable="true">order Status</th>
                                                        <th data-field="order_date" data-sortable="true">Date</th>
                                                        <th data-field="action" data-sortable="false">Action</th>
                                                    </tr>

                                                </thead>
                                            </table>    
                                        <!-- END Example Form Content -->
                                    </div>
                                </div>
                                  <!--- ORder tab content end ------> 
                                 <div class="tab-pane" id="tabstatTRA">
                                    <p>I'm in Section 1.</p>
                                </div>
                                <!------------------------tab content end ---------------------------------------> 
                                
                            </div>
                        </div>

                    </div>
                </div>  

            </div>
        </div>
    </div>
</div>
<!-- END Page Content -->
<div id="loading-overlay" class="loading-overlay"></div>
<?php include '../../inc/page_footer.php'; ?>
<?php include '../../inc/template_scripts.php'; ?>
<script src="<?php echo BASE_URL; ?>js/bootstrap-table.js"></script>
<!-- Load and execute javascript code used only in this page -->
<?php include '../../inc/template_end.php'; ?>

<script>

    $(function () {
        var hash = window.location.hash;
        hash && $('ul.nav a[href="' + hash + '"]').tab('show');
        $('.nav-tabs a').click(function (e) {
            $(this).tab('show');
            var scrollmem = $('body').scrollTop();
            window.location.hash = this.hash;
            $('html,body').scrollTop(scrollmem);
        });
    });
</script>
<script>

    function changeStatus(val, a)
    {
        // alert(2);
        $.post('<?php echo ADMIN_URL; ?>orders/order_operations.php', {a: a, val: val, todo: '<?php echo base64_encode('OrderStatus'); ?>'}, function (data) {
            //  $('#errorMsg').html(data);
            window.location.reload();
            return false;
        });

        return false;
    }
</script>
<style>
    //Reusing bootstrap 3 panel CSS
.panel {
    background-color: #FFFFFF;
    border: 1px solid rgba(0, 0, 0, 0);
    border-radius: 4px 4px 4px 4px;
    box-shadow: 0 1px 1px rgba(0, 0, 0, 0.05);
    margin-bottom: 20px;
}   

.panel-primary {
    border-color: #428BCA;
}   

.panel-primary > .panel-heading {
    background-color: #428BCA;
    border-color: #428BCA;
    color: #FFFFFF;
}   

.panel-heading {
    border-bottom: 1px solid rgba(0, 0, 0, 0);
    border-top-left-radius: 3px;
    border-top-right-radius: 3px;
    padding: 10px 15px;
}   

.panel-title {
    font-size: 16px;
    margin-bottom: 0;
    margin-top: 0;
}   

.panel-body:before, .panel-body:after {
    content: " ";
    display: table;
}   

.panel-body:before, .panel-body:after {
    content: " ";
    display: table;
}   

.panel-body:after {
    clear: both;
}   

.panel-body {
    padding: 15px;
}   

.panel-footer {
    background-color: #F5F5F5;
    border-bottom-left-radius: 3px;
    border-bottom-right-radius: 3px;
    border-top: 1px solid #DDDDDD;
    padding: 10px 15px;
}

//CSS from v3 snipp
.user-row {
    margin-bottom: 14px;
}

.user-row:last-child {
    margin-bottom: 0;
}

.dropdown-user {
    margin: 13px 0;
    padding: 5px;
    height: 100%;
}

.dropdown-user:hover {
    cursor: pointer;
}

.table-user-information > tbody > tr {
    border-top: 1px solid rgb(221, 221, 221);
}

.table-user-information > tbody > tr:first-child {
    border-top: 0;
}


.table-user-information > tbody > tr > td {
    border-top: 0;
}

</style>