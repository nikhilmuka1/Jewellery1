<?php 
include '../../page_fragment/define.php'; 
include '../../page_fragment/topScript.php';
$site_title = "Seller View Products | Jewelry at Home";
include '../../seller_inc/config.php'; 
?>
<?php include '../../seller_inc/template_start.php'; ?>
<?php include '../../seller_inc/page_head.php'; ?>
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
    height: 65px;
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
                <i class="gi gi-group"></i>Manage your Product's<br><small>Add / Edit / Delete here!</small>
            </h1>
        </div>
    </div>
    <ul class="breadcrumb breadcrumb-top">
        <li><a href="">Dashboard</a></li>
        <li><a href="<?php echo SELLER_URL;?>products/new-product/" class="btn btn-alt btn-xs btn-primary"><i class="fa fa-pencil"></i> Add New Product's</a></li>
         <li><a href="<?php echo SELLER_URL;?>products/new-productcsv/" class="btn btn-alt btn-xs btn-primary"><i class="fa fa-pencil"></i> Add New Product's CSV</a></li>
           <li>View Product List</li>
    </ul>
    <!-- END Forms General Header -->
    <!-- Form Example with Blocks in the Grid -->
    <div class="row">
        <div class="col-sm-12">
            <!-- Example Form Block -->
            <div class="block">
                <!-- Example Form Title -->
                <div class="block-title">
                    <h2>Manage Your Product</h2>
                </div>
                <!-- END Example Form Title -->
                <!-- Example Form Content -->
              <table data-toggle="table" data-toolbar="#toolbar" data-search="true" data-show-refresh="true" data-show-toggle="true" data-show-columns="true"
  data-sort-name="stargazers_count" data-sort-order="desc" data-show-export="true" data-show-pagination-switch="true" data-pagination="true"
  data-show-footer="true" data-height="400" data-url="<?php echo SELLER_URL;?>products/product_data.php?a=list" data-query-params="queryParams"
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
      
                <!-- END Example Form Content -->
            </div>
            <!-- END Example Form Block -->
        </div>
    </div>
    <!-- END Form Example with Blocks in the Grid -->
</div>
<!-- END Page Content -->

<?php include '../../seller_inc/page_footer.php'; ?>
<?php include '../../seller_inc/template_scripts.php'; ?>

<!-- Load and execute javascript code used only in this page -->
<script src="<?php echo BASE_URL;?>js/pages/formsGeneral.js"></script>
<script>$(function(){ FormsGeneral.init(); });</script>
<?php include '../../seller_inc/template_end.php'; ?>
<script type="text/javascript" src="<?php echo BASE_URL;?>js/bootstrap-table.js"></script>
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