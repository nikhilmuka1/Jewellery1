<?php
include '../../page_fragment/define.php';
include '../../page_fragment/topScript.php';
$site_title = "Admin Products | Jewelry at Home";
include '../../inc/config.php';
if(isset($_REQUEST['session_uid'])){
$id = $njEncryptionObj->safe_b64decode($_REQUEST['session_uid']);
} else {
  $id ='';  
}

$mode = "addNewProduct";
$txt = "Add New";
$bxt = "Create Product";
$product_name = '';
$product_description = '';
$product_type = '';
$SKU = '';
$Brand = '';
$category_id = '';
$quantity = '';
$price = '';
$measurement_size = '';
$Material = '';
$discount = '';
$unit_weight = '';
$resizable = '';
$is_lab_created = '';
$product_metal = '';
$stone = '';
$no_of_stone = '';
$stone_setting = '';
$stone_color = '';
$stone_clarity = '';
$stone_shape = '';
$carat = '';
$req = 'required';
$cover_image='';
$roll_type='';
$qry = $dbComObj->viewData($conn, "products", "*", "`product_id`='" . $id . "'");
$num = $dbComObj->num_rows($qry);
if ($num > 0) {
    $row = $dbComObj->fetch_assoc($qry);
    $mode = "manageProducts";
    $txt = "Manage";
    $bxt = "Update Product";
    $req = '';
    extract($row);
           
    if ($cover_image == '' || $cover_image == null ) {
        $profileImage = '';
    } else {
        $profileImage = '<img src="' . image_PATH . 'user-images/' . $cover_image . '"/>';
    }
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
                <i class="gi gi-user_add"></i><?php echo $txt; ?> Product Here
            </h1>
        </div>
    </div>
    <ul class="breadcrumb breadcrumb-top">
        <li><a href="<?php echo ADMIN_URL; ?>dashboard/">Dashboard</a></li>
        <li><a href="<?php echo ADMIN_URL; ?>products/" class="btn btn-alt btn-xs btn-primary">
        <i class="hi hi-eye-open"></i> View Products List</a></li>
          <li><a href="<?php echo ADMIN_URL;?>products/new-product/" class="btn btn-alt btn-xs btn-primary"><i class="fa fa-pencil"></i> Add New Product's </a></li>
        <li><?php echo $txt; ?> Product csv</li>
    </ul>
    <!-- END Forms General Header -->
    <!-- Form Example with Blocks in the Grid -->
    <div class="row">
        <div class="col-sm-12">
            <!-- Example Form Block -->
            <div class="block">
                <!-- Example Form Title -->
                <div class="block-title">
                    <h2><?php echo $txt; ?> Product</h2>
                </div>
                <!-- END Example Form Title -->
                <!-- Example Form Content -->
                <div id="usercsvResult"></div>
                    <form  method="post" class="form-inline form-bordered" enctype="multipart/form-data" id="importFrm">
     <div class="form-group">
    <label for="file"> CSV file Import:</label>
                <input  class="form-control" id="file"  type="file" name="csv" />
                  </div>
                     <input type="hidden" name="mode" value="<?php echo base64_encode("ImportCsv"); ?>" />
                        <input type="hidden" name="session_uid" value="<?php echo $id; ?>" />
                  <button type="button" name="importSubmit" id="importSubmit" onclick="formSubmit('importFrm', 'usercsvResult', '<?php echo BASE_URL; ?>common/products_operations.php')" class="btn btn-sm btn-primary" > IMPORT</button>
                 <a href="<?php echo BASE_URL; ?>product_csv_template.csv" download> Sample CSV file</a>
            </form>
                <!-- END Example Form Content -->
            </div>
           <!--  list view of added and not added recoreds  -->


            <!-- END Example Form Block -->
                <!-- Form Example with Blocks in the Grid -->

            <!-- Example Form Block -->
            <div class="block">
                <!-- Example Form Title -->
                <!--  <div class="block-title">
                    <h2>Import Product List</h2>
                </div>
                <!-- END Example Form Title -->
         <!--       <!-- Example Form Content -->
           <!--    <table data-toggle="table" data-toolbar="#toolbar" data-search="true" data-show-refresh="true" data-show-toggle="true" data-show-columns="true"
  data-sort-name="stargazers_count" data-sort-order="desc" data-show-export="true" data-show-pagination-switch="true" data-pagination="true"
  data-show-footer="true" data-height="400" data-url="<?php echo BASE_URL;?>common/product_data.php?a=ImportCsvList&limit=4" data-query-params="queryParams"
  data-pagination="true" data-search="true">
  <thead>
  
  <tr><th data-field="product_id" data-sortable="true">#</th>
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
                            </table>     -->            
      
                <!-- END Example Form Content -->
            </div>
            <!-- END Example Form Block -->
        </div>
    </div>
       
    <!-- END Form Example with Blocks in the Grid -->
</div>

<!-- END Page Content -->
<div id="loading-overlay" class="loading-overlay"></div>
<?php include '../../inc/page_footer.php'; ?>
<?php include '../../inc/template_scripts.php'; ?>
<!-- Load and execute javascript code used only in this page -->
<?php include '../../inc/template_end.php'; ?>
<script type="text/javascript" src="<?php echo BASE_URL;?>js/bootstrap-table.js"></script>
<script>
$(document).ready(function(){
   // alert(11);
 $("#importSubmit").click(function(){
   //  alert(11);
    $("#int_counter").change(function(){
        var count_Res = $( "#int_counter" ).val();
        alert("The text has been changed.");
     });
     });
});
</script>
