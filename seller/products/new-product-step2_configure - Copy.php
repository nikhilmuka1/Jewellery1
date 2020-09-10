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
   
   //
    $inv_qty='';
   $min_sale_qty='';
   $associated_check_list='';
   $meta_title='';
   
   
              
   $qry = $dbComObj->viewData($conn, "products", "*", "`product_id`='" . $id . "'");
   $num = $dbComObj->num_rows($qry);
   if ($num > 0) {
       $row = $dbComObj->fetch_assoc($qry);
       $mode = "addconfugureProducts";
       $txt = " New configure Assocted products ";
       $bxt = "Save";
       $req = '';
       extract($row);
              
       
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
            <i class="gi gi-user_add"></i><?php echo $txt; ?>  Here
         </h1>
      </div>
   </div>
   <ul class="breadcrumb breadcrumb-top">
      <li><a href="<?php echo ADMIN_URL; ?>dashboard/">Dashboard</a></li>
      <li><a href="<?php echo ADMIN_URL; ?>products/" class="btn btn-alt btn-xs btn-primary"><i class="hi hi-eye-open"></i> View Products List</a></li>
      <li><a href="<?php echo ADMIN_URL;?>products/new-productcsv/" class="btn btn-alt btn-xs btn-primary"><i class="fa fa-pencil"></i> Add New Product's CSV Import</a></li>
      <?php if($txt=='Manage'){?>
      <li><a href="<?php echo ADMIN_URL;?>products/new-product/" class="btn btn-alt btn-xs btn-primary"><i class="fa fa-pencil"></i> Add New Product's </a></li>
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
               <h2></h2>
            </div>
            <!-- END Example Form Title -->
            <!-- Example Form Content -->
            <div id="userResult"></div>
            <div class="col-md-12">
               <div class="panel-group" id="accordion">
                  <div class="panel panel-default">
                     <div class="panel-heading">
                        <a data-toggle="collapse" data-parent="#accordion" href="#QUickCreate">
                           <h4 class="panel-title">
                              <span class="glyphicon glyphicon-file">
                              </span>Quick simple product creation
                           </h4>
                        </a>
                     </div>
                     <div id="QUickCreate" class="panel-collapse collapse in">
                        <div class="panel-body">
                           <div class="row">
                              <form class="form-bordered" method="post" id="quickproductform">
                                 <div class="col-md-6">
                                    <div class="well well-sm well-primary form-group">
                                       <label for="grant2">Product Name <span class="required">*</span></label>
                                       <input type="text" id="name" name="product_name" value="<?php echo $product_name; ?>" class="form-control" placeholder="Product Name" required>
                                    </div>
                                    <div class="well well-sm well-primary form-group">
                                       <label for="shorttitle">Weight (in gm) <span class="required">*</span></label>
                                       <input type="number" id="Weight" name="unit_weight" value="<?php echo $unit_weight; ?>" class="form-control" placeholder="Weight" <?php echo $req; ?>>
                                    </div>
                                    <div class="well well-sm well-primary form-group">
                                       <label for="grantparent">Product Description<span class="required">*</span></label>
                                       <textarea class="form-control" rows=""  required name="product_description" id="product_description" placeholder="Product Description"><?php echo base64_decode($product_description); ?> </textarea>
                                    </div>
                                    <div class="well well-sm well-primary form-group">
                                       <label for="grantpo">Product Metal<span class="required" >*</span></label>
                                       <select class="form-control" id="sel1 product_metal" name="product_metal" required <?php echo $req; ?>
                                          >
                                          <option value=''>Select product Product Metal </option>
                                          <option value='Gold' <?php if($product_metal =='Gold')echo 'selected'; ?>> Gold </option>
                                          <option value='Silver' <?php if($product_metal =='Silver')echo 'selected'; ?>> Silver </option>
                                          <option value='Gold Plated' <?php if($product_metal =='Gold Plated')echo 'selected'; ?>>Gold Plated  </option>
                                          <option value='Platinum Plated' <?php if($product_metal =='Platinum Plated')echo 'selected'; ?>> Platinum Plated </option>
                                          <option value='Base Metal' <?php if($product_metal =='Base Metal')echo 'selected'; ?>> Base Metal </option>
                                          <option value='Brass' <?php if($product_metal =='Brass')echo 'selected'; ?>> Brass </option>
                                          <option value='Silver Plated' <?php if($product_metal =='Silver Plated')echo 'selected'; ?>> Silver Plated </option>
                                          <option value='Copper' <?php if($product_metal =='Copper')echo 'selected'; ?>> Copper </option>
                                          <option value='Oxidised Silver' <?php if($product_metal =='Oxidised Silver')echo 'selected'; ?>> Oxidised Silver </option>
                                       </select>
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                   
                                     <?php   
                                             $condition = "1 and status='1' and `delete`='0' order by name";         
                                             $result = $dbComObj->viewData($conn,"attribute", "*",$condition);
                                             $num = $dbComObj->num_rows($result);
                                             if ($num > 0) { 
                                             while ($data = $dbComObj->fetch_assoc($result))
                                             { //echo '<pre>'; print_R($data);
                                              ?>
                                            <div class="well well-sm well-primary form-group">
                                             <label for="shorttitle"><?php echo $data['name'];?><span class="required" >*</span></label>

                                             <select class="form-control" id="sel1" name="Brand" required <?php echo $req; ?>
                                                >

                                                      <option value=''> select <?php echo $data['name'];?> </option>
                                                      <?php   
                                                         $condition = "1  and status='1'and attribute_id=".$data['id']." and `delete`='0' order by name";         
                                                         $result = $dbComObj->viewData($conn,"attribute_value", "*",$condition);
                                                         $num = $dbComObj->num_rows($result);
                                                         if ($num > 0) { 
                                                         while ($data2 = $dbComObj->fetch_assoc($result))
                                                         { ?>
                                                      <option value="<?php echo $data2['id'] ?>" <?php echo $Brand == $data2['id'] ? '    selected="selected"' : '';?> ><?php echo $data2['name'];?></option>
                                                      <?php   } 
                                                         } 
                                                          ?>
                                         </select>
                                         </div>
                                         <?php   } 
                                               }  ?>
                                    
                                    <div class="well well-sm well-primary form-group">
                                       <label for="shorttitle">SKU<span class="required" >*</span></label>
                                       <input type="text" id="SKU" readonly name="SKU" title="SKU is requreid" value="<?php echo $SKU; ?>" class="form-control" placeholder="SKU" required>
                                    </div>
                                    <div class="well well-sm well-primary form-group" id="price_sec1">
                                       <label for="shorttitle">price<span class="required" >*</span></label>
                                       <input type="number" id="price" name="price" title="Price is requreid" value="<?php echo $price; ?>" class="form-control" placeholder="price" required>
                                    </div>
                                    <div class="well well-sm well-primary">
                                       <label for="grantpo">Qty </label>
                                       <input type="number" class="form-control validate-number" id="inventory_qty" name="inv_qty" value="">
                                    </div>
                                    <div class="well well-sm well-primary">
                                       <label for="grantor">Stock Availability</label>
                                       <select id="inventory_stock_availability" name="is_in_stock" class="form-control">
                                          <option value="1" selected="">In Stock</option>
                                          <option value="0">Out of Stock</option>
                                       </select>
                                    </div>
                                 </div>
                                 <div class="form-group form-actions">
                                    <input type="hidden" name="mode" value="<?php echo base64_encode($mode); ?>" />
                                    <input type="hidden" name="session_uid" value="<?php echo $id; ?>" />
                                    <button type="button" id="products_submit" onclick="formSubmit('quickproductform', 'userResult', '<?php echo BASE_URL; ?>common/products_operations.php')" class="btn btn-sm btn-success"><?php echo "Quick Create"; ?> </button>
                                 </div>
                              </form>
                              <!--        ///////////////////// -->
                              <form class="form-bordered" method="post" id="userForm">
                                 <div id="Associated6" >
                                    <div class="panel-body">
                                       <div class="row">
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
                                                data-show-footer="true" data-height="400" data-url="<?php echo BASE_URL;?>common/product_data.php?a=ProductUserListForm&field=associated&checked=<?php echo base64_encode($associated_check_list); ?>" data-query-params="queryParams"
                                                data-pagination="true" data-search="true">
                                                <thead>
                                                   <tr>
                                                      <th data-field="action" data-sortable="false">Action</th>
                                                      <th data-field="product_id" data-sortable="true">#</th>
                                                      <th data-field="product_name" data-sortable="true">Name</th>
                                                      <th data-field="product_type" data-sortable="true">Type</th>
                                                      <th data-field="Brand" data-sortable="true">Brand</th>
                                                      <th data-field="category" data-sortable="true">Category</th>
                                                      <th data-field="SKU" data-sortable="true">SKU</th>
                                                      <th data-field="price" data-sortable="true">Price</th>
                                                      <th data-field="status" data-sortable="true">Status</th>
                                                   </tr>
                                                </thead>
                                             </table>
                                             <!-- END Example Form Content -->
                                          </div>
                                          <!-- END Example Form Block -->
                                       </div>
                                    </div>
                                 </div>
                                 <div class="form-group form-actions">
                                    <input type="hidden" name="mode" value="<?php echo base64_encode($mode); ?>" />
                                    <input type="hidden" name="session_uid" value="<?php echo $id; ?>" />
                                    <button type="button" id="products_submit" onclick="formSubmit('userForm', 'userResult', '<?php echo BASE_URL; ?>common/products_operations.php')" class="btn btn-sm btn-success"><?php echo $bxt; ?> </button>
                                 </div>
                              </form>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- /////--------********************** edit add more end***************** -->
               </div>
               <!--   <div><input type="text" name="mytext[]"></div> -->
            </div>
            <!--  //// -->
            <!-- END Example Form Content -->
         </div>
      </div>
      <!-- END Example Form Block -->
   </div>
</div>
<!-- END Form Example with Blocks in the Grid -->
<!-- END Page Content -->
<div id="loading-overlay" class="loading-overlay"></div>
<?php include '../../inc/page_footer.php'; ?>
<?php include '../../inc/template_scripts.php'; ?>
<!-- Load and execute javascript code used only in this page -->
<?php include '../../inc/template_end.php'; ?>
<script type="text/javascript" src="<?php echo BASE_URL;?>js/bootstrap-table.js"></script>