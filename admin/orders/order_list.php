<?php
include '../../page_fragment/define.php';
include '../../page_fragment/topScript.php';
$site_title = "Admin order | Manage category | MarketPlace at Home";
include '../../inc/config.php';
?>
<?php include '../../inc/template_start.php'; ?>
<?php include '../../inc/page_head.php'; ?>
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
                <i class="gi gi-notes_2"></i>Manage Orders List
            <!--      <br><small>Manage edit / delete / add Orders !</small> -->
            </h1>
        </div>
    </div>

    <ul class="breadcrumb breadcrumb-top">
        <li><a href="<?php echo SELLER_URL; ?>dashboard/">Dashboard</a></li>
        <li>View Orders List</li>
    </ul>
    <!-- END Forms General Header -->
    <!-- Form Example with Blocks in the Grid -->
    <div class="row">
        <div class="col-sm-12">
            <!-- Example Form Block -->
            <div class="block">
                <!-- Example Form Title -->
                <div class="block-title">
                    <h2>Manage Orders</h2>
                </div>
                <!-- END Example Form Title -->
                <!-- Example Form Content -->
                <div class="box-body">
                    <div class="x_content"><div id="result1"></div>
                        <div class="table-responsive">

                            <table id="testTable" class="table table-vcenter table-condensed table-bordered" data-toggle="table" data-toolbar="#toolbar" data-search="true" data-show-refresh="true" data-show-toggle="true" data-show-columns="true"
                                   data-sort-name="stargazers_count" data-sort-order="desc" data-show-export="true" data-show-pagination-switch="true" data-pagination="true"
                                   data-show-footer="true" data-height="400" data-url="<?php echo ADMIN_URL; ?>orders/fetchinfDataFromTables.php?a=orders" data-query-params="queryParams"
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
                        </div>
                    </div>
                </div>
                <!-- END Example Form Content -->
            </div>
            <!-- END Example Form Block -->
        </div>
    </div>
    <!-- END Form Example with Blocks in the Grid -->
</div>
<!-- END Page Content -->
<?php include '../../inc/page_footer.php'; ?>
<?php include '../../inc/template_scripts.php'; ?>
<script src="<?php echo BASE_URL; ?>js/bootstrap-table.js"></script>

<?php include '../../inc/template_end.php'; ?>
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
<script>
function ProductDelete(a)
{
    var cr = confirm("Are you sure to delete this Product?");
     if(cr){
      $.post('<?php echo BASE_URL;?>common/products_operations.php',{a:a,mode:'<?php echo base64_encode('deleteProduct');?>'},function(data){
        $('#errorMsg').html(data);
           //alert(data);
        alert('Product deleted successfully.');
        window.location.reload();
        return false;
      });

      return false;
    }
}

function ProductManage(a,b)
{
    var txt = '';
    if(b == '1'){txt = 'Deactivate';}else{txt = 'Activate';}
  $.post('<?php echo BASE_URL;?>common/products_operations.php',{a:a,b:b,mode:'<?php echo base64_encode('statusProduct');?>'},function(data){
    // alert(data);
    // $('#errorMsg').html(data);
    alert('Product '+txt+' successfully.');
    window.location.reload();
    return false;
  });

  return false;
}
</script>