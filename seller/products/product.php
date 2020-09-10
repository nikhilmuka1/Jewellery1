<?php
   include '../../page_fragment/define.php';
   include '../../page_fragment/topScript.php';
   $site_title = "Seller Products | Jewelry at Home";
   include '../../seller_inc/config.php';
   if(isset($_REQUEST['session_uid'])){
   $id = $njEncryptionObj->safe_b64decode($_REQUEST['session_uid']);
   } else {
     $id ='';  
   }
   $mode = "addNewProduct";
   $txt = "Add New";
   $bxt = "Save and Continue";//"Create Product";
   $product_name = '';
   $product_description = '';
   $stone_description = '';
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
   $req = '';
   $cover_image='';
   $roll_type='';
   //
    $inv_qty='';
   $min_sale_qty='';
   $max_sale_qty='';
   $inventory_min_qty='0';
   $is_in_stock='1';
   $related_check_list='';
   $associated_check_list='';
   $meta_title='';
   $meta_keyword='';
   $meta_description='';
   $product_option_title='';
    $option_input_type='';
   $option_is_requre='';
   $product_opt_sort_order='';
   $opt_price_field='';
   $price_type_opt='';
   $opt_sku='';
   $opt_maxchar='';  
    $opt_price_row='';
   $price_type_opt_row='';
   $opt_sort_order_row='';
   $opt_sku_row='';
   $ddl_option_title='';
   $attribute_set_id='';
   $group_products='';
   
              
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
<?php include '../../seller_inc/template_start.php'; ?>
<?php include '../../seller_inc/page_head.php'; ?>
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
   .thumbnailaj{
   height: 100px;
   margin: 10px;    
   }
   input.sr-msg-error {
   border: 1px solid red;
   color: red;
   }
   .sr-msg-error {
   border: 1px solid red;
   color: red;
   }
   ol.tree {
   list-style: none;
   }
   /* ---------------------tree view ---------------*/
   #treecheckbox {
   height: 222px;
   overflow: auto;
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
   <li><a href="<?php echo SELLER_URL; ?>dashboard/">Dashboard</a></li>
   <li><a href="<?php echo SELLER_URL; ?>products/" class="btn btn-alt btn-xs btn-primary"><i class="hi hi-eye-open"></i> View Products List</a></li>
   <li><a href="<?php echo SELLER_URL;?>products/new-productcsv/" class="btn btn-alt btn-xs btn-primary"><i class="fa fa-pencil"></i> Add New Product's CSV Import</a></li>
   <?php if($txt=='Manage'){?>
   <li><a href="<?php echo SELLER_URL;?>products/new-product/" class="btn btn-alt btn-xs btn-primary"><i class="fa fa-pencil"></i> Add New Product's </a></li>
   <?php } ?>
   <li><?php echo $txt; ?> Product</li>
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
                    <?php include '../../common/product_form.php'; ?>
      </div>
      <!-- END Example Form Content -->
   </div>
</div>
<!-- END Example Form Block -->
<!-- END Form Example with Blocks in the Grid -->
<!-- END Page Content -->
<div id="loading-overlay" class="loading-overlay"></div>
<?php include '../../seller_inc/page_footer.php'; ?>
<?php include '../../seller_inc/template_scripts.php'; ?>
<!-- Load and execute javascript code used only in this page -->
<?php include '../../seller_inc/template_end.php'; ?>
<?php include '../../common/product_footer_script.php'; ?>