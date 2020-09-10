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
$inventory_min_qty='';
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
        <li><a href="<?php echo ADMIN_URL; ?>dashboard/">Dashboard</a></li>
        <li><a href="<?php echo ADMIN_URL; ?>products/" class="btn btn-alt btn-xs btn-primary"><i class="hi hi-eye-open"></i> View Products List</a></li>
        <li><a href="<?php echo ADMIN_URL;?>products/new-productcsv/" class="btn btn-alt btn-xs btn-primary"><i class="fa fa-pencil"></i> Add New Product's CSV Import</a></li>
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
                <div id="userResult"></div>
                <form class="form-bordered" method="post" id="userForm">
                  <div class="col-md-12">
            <div class="panel-group" id="accordion">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#GeneralOne">
                        <span class="glyphicon glyphicon-file">
                            </span>General</a>
                        </h4>
                    </div>
                    <div id="GeneralOne" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="well well-sm well-primary form-group">
                                        <label for="grant1">Product Type <span class="required">*</span> </label>

                                         <select class="form-control product_type" id="sel1" name="product_type" <?php echo $req; ?>>
                                        <option value='simple' <?php if($product_type =='simple')echo 'selected'; ?>> Simple Product </option>
                                        <option value="grouped" <?php if($product_type =='grouped')echo 'selected'; ?>>Grouped Product</option>
                                        <option value="configurable" <?php if($product_type =='configurable')echo 'selected'; ?>>Configurable Product</option>
                                      </select>
                                    </div>
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
                                          <textarea class="form-control" rows="3"  required name="product_description" id="product_description" placeholder="Product Description"><?php echo base64_decode($product_description); ?> </textarea>
                                    </div>
                                        <div class="well well-sm well-primary form-group">
                                        <label for="grantpo">Product Metal<span class="required" >*</span></label>
                              <select class="form-control" id="sel1 product_metal" name="product_metal" required <?php echo $req; ?>>
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
                                    <div class="well well-sm well-primary form-group">
                                        <label for="shorttitle">Brand<span class="required" >*</span></label>
                                      <select class="form-control" id="sel1" name="Brand" required <?php echo $req; ?>>
                                      <option value=''> select Brand</option>
                                          <?php   
                                          $condition = "1 and status='1' and `delete`='0' order by name";         
                                         $result = $dbComObj->viewData($conn,"brands", "*",$condition);
                                         $num = $dbComObj->num_rows($result);
                                        if ($num > 0) { 
                                         while ($data = $dbComObj->fetch_assoc($result))
                                        { ?>
                                       <option value="<?php echo $data['id'] ?>" <?php echo $Brand == $data['id'] ? '    selected="selected"' : '';?> ><?php echo $data['name'];?></option>    
                                    <?php   } 
                                    } 
                                       ?>
                                       </select>
                                        
                                      
                                    </div>
                                    <div class="well well-sm well-primary form-group">
                                    <label for="title">Category<span class="required">*</span></label>
                                        <?php 
                                    $ajCategoryViewObj = new ajCategoryView();
                                    $categoryList = $ajCategoryViewObj->fetchCategoryTree();
                                    $num = count($categoryList);
                                    // with html checkbox
                                  //  echo $category_id;
                                    echo "<div id='treecheckbox'>";
                                     $categoryList11 = $ajCategoryViewObj->createTreeViewcheckbox($category_id,0);
                                     echo "</div>";                                   
                                    ?>

                                     <!-- <select class="form-control" multiple="multiple" id="sel1" name="category_id[]" <?php // echo $req; ?>>
                                       <option value="0">Select Category</option>
                                    <?php // foreach($categoryList as $cl) { ?>
                                      <option value="<?php // echo $cl["id"] ?>" <?php // echo $category_id == $cl['id'] ? '    selected="selected"' : '';?> ><?php //echo $cl["name"]; ?></option>
                                    <?php //} ?>
                                 </select> -->
                                    </div>
                                     <div class="well well-sm well-primary form-group">
                                        <label for="shorttitle">SKU<span class="required" >*</span></label>
                                        <input type="text" id="SKU" name="SKU" title="SKU is requreid" value="<?php echo $SKU; ?>" class="form-control" placeholder="SKU" required>
                                    </div>
                                    <div class="well well-sm well-primary form-group" id="price_sec">
                                        <label for="shorttitle">price<span class="required" >*</span></label>
                                        <input type="number" id="price" name="price" title="Price is requreid" value="<?php echo $price; ?>" class="form-control" placeholder="price" required>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#MetaTwo"><span class="glyphicon glyphicon-th-list">
                            </span>Meta Information</a>
                        </h4>
                    </div>
                    <div id="MetaTwo" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="well well-sm well-primary form-group">
                                        <label for="grantpo">Meta Title</label>
                                      <input id="meta_title" name="meta_title"  value="<?php echo $meta_title; ?>" class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="well well-sm well-primary form-group">
                                        <label for="grantor">Meta keyword</label>
                                        <textarea id="meta_keyword" name="meta_keyword" class="form-control" rows="2" cols="15" ><?php echo $meta_keyword; ?></textarea>
                                    </div>
                                </div>
                                  <div class="col-md-6">
                                    <div class="well well-sm well-primary form-group">
                                        <label for="grantor">Meta Description</label>
                          <textarea id="meta_description" name="meta_description" class=" form-control" rows="2" cols="15" onkeyup="checkMaxLength(this, 255);"><?php  echo $meta_description; ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                 <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#stoneinfo"><span class="glyphicon glyphicon-th-list">
                            </span>Stone Infomation</a>
                        </h4>
                    </div>
                    <div id="stoneinfo" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="row">
                          
                     <div class="form-group col-md-6">
                      <div class="well well-sm well-primary">
                                        <label for="grantpo">Stone</label>
                             <select class="form-control" id="sel1 stone" name="stone" <?php echo $req; ?>>
                                <option value=''>Select Stone </option>
                                <option value='American Diamond' <?php if($stone =='American Diamond')echo 'selected'; ?>> American Diamond </option>
                                <option value='Crystal' <?php if($stone =='Crystal')echo 'selected'; ?>> Crystal </option>
                                <option value='Pearl' <?php if($stone =='Pearl')echo 'selected'; ?>>Pearl  </option>
                                <option value='Platinum Plated' <?php if($stone =='Platinum Plated')echo 'selected'; ?>> Platinum Plated </option>
                                <option value='Cubic Zirconia ' <?php if($stone =='Cubic Zirconia ')echo 'selected'; ?>> Cubic Zirconia  </option>
                                
                              </select>
                            
                        </div>
                    </div>
                     <div class="form-group col-md-6">
                      <div class="well well-sm well-primary">
                                        <label for="grantpo">No of Stone</label>
                            <input type="number" id="no_of_stone" name="no_of_stone" value="<?php echo $no_of_stone; ?>" class="form-control" placeholder="No of Stone" <?php echo $req; ?>>
                        </div>
                    </div>
                     <div class="form-group col-md-6">
                      <div class="well well-sm well-primary">
                                        <label for="grantpo">Stone Setting</label>
                            <input type="text" id="stone_setting" name="stone_setting" value="<?php echo $stone_setting; ?>" class="form-control" placeholder="Stone Setting" <?php echo $req; ?>>
                        </div>
                    </div>
                     <div class="form-group col-md-6">
                        <div class="well well-sm well-primary">
                                        <label for="grantpo">Stone Color</label>
                            
                              <select class="form-control" id="sel1 stone_color" name="stone_color" <?php echo $req; ?>>
                                <option value=''>Select stone Color </option>
                                <option value='D' <?php if($stone_color =='D')echo 'selected'; ?>> D </option>
                                 <option value='E' <?php if($stone_color =='E')echo 'selected'; ?>> E </option>
                                  <option value='F' <?php if($stone_color =='F')echo 'selected'; ?>> F </option>
                                   <option value='G' <?php if($stone_color =='G')echo 'selected'; ?>> G </option>
                                    <option value='H' <?php if($stone_color =='H')echo 'selected'; ?>> H </option>
                                     <option value='I' <?php if($stone_color =='I')echo 'selected'; ?>> I </option>
                                      <option value='J' <?php if($stone_color =='J')echo 'selected'; ?>> J </option>

                                </select>
                        </div>
                    </div>
                     <div class="form-group col-md-6">
                        <div class="well well-sm well-primary">
                                        <label for="grantpo">Stone Clarity</label>
                          
                            <select class="form-control" id="sel1 stone_clarity" name="stone_clarity" <?php echo $req; ?>>
                                <option value=''>Select stone clarity </option>
                                <option value='FL' <?php if($stone_clarity =='FL')echo 'selected'; ?>> FL </option>
                                 <option value='IF' <?php if($stone_clarity =='IF')echo 'selected'; ?>> IF </option>
                                  <option value='VVS1' <?php if($stone_clarity =='VVS1')echo 'selected'; ?>> VVS1 </option>
                                   <option value='VVS2' <?php if($stone_clarity =='VVS2')echo 'selected'; ?>> VVS2 </option>
                                    <option value='VS1' <?php if($stone_clarity =='VS1')echo 'selected'; ?>> VS1 </option>
                                     <option value='VS2' <?php if($stone_clarity =='VS2')echo 'selected'; ?>> VS2 </option>
                                      <option value='SI1' <?php if($stone_clarity =='SI1')echo 'selected'; ?>> SI1 </option>
                                      <option value='SI2' <?php if($stone_clarity =='SI2')echo 'selected'; ?>> SI2 </option>

                                </select>
                        </div>
                    </div>
                     <div class="form-group col-md-6">
                       <div class="well well-sm well-primary">
                                        <label for="grantpo"> Stone shape</label>
                             <select class="form-control" id="sel1 stone_shape" name="stone_shape" <?php echo $req; ?>>
                                <option value=''>Select stone shape </option>
                                <option value='Round' <?php if($stone_shape =='Round')echo 'selected'; ?>> Round </option>
                                <option value='Pear' <?php if($stone_shape =='Pear')echo 'selected'; ?>> Pear </option>
                                 <option value='Emerald' <?php if($stone_shape =='Emerald')echo 'selected'; ?>> Emerald </option>
                                  <option value='Marquise' <?php if($stone_shape =='Marquise')echo 'selected'; ?>> Marquise </option>
                                   <option value='Oval' <?php if($stone_shape =='Oval')echo 'selected'; ?>> Oval </option>

                                    <option value='Princess' <?php if($stone_shape =='Princess')echo 'selected'; ?>> Princess </option>
                                     <option value='Asscher' <?php if($stone_shape =='Asscher')echo 'selected'; ?>> Asscher </option>
                                      <option value='Cushion' <?php if($stone_shape =='Cushion')echo 'selected'; ?>> Cushion </option>
                                       <option value='Heart' <?php if($stone_shape =='Heart')echo 'selected'; ?>> Heart </option>
                                        <option value='Radiant' <?php if($stone_shape =='Radiant')echo 'selected'; ?>> Radiant </option>
                                         <option value='Square Radiant' <?php if($stone_shape =='Square Radiant')echo 'selected'; ?>> Square Radiant </option>
                                          <option value='Trillian' <?php if($stone_shape =='Trillian')echo 'selected'; ?>> Trillian </option>
                              </select>
                            
                        </div>
                    </div> 
                    <div class="form-group col-md-6">
                      <div class="well well-sm well-primary">
                                        <label for="grantpo">Measurement size</label>
                            <input type="text" id="measurement_size" name="measurement_size" value="<?php echo $measurement_size; ?>" class="form-control" placeholder="length x width unit" <?php echo $req; ?>>
                        </div>
                    </div>
                  
                    <div class="form-group col-md-6">
                       <div class="well well-sm well-primary">
                                        <label for="grantpo">Carat</label>
                            <input type="text" id="carat" name="carat" value="<?php echo $carat; ?>" class="form-control" placeholder="Carat" <?php echo $req; ?>>
                        </div>
                    </div>
                    <br/>
                    <div class="form-group col-md-6">
                        <div class="well well-sm well-primary">
                                        <label for="grantpo"> GIA Certificate </label>
                            <input type="file" id="image_certificate" name="image_certificate"  <?php
                            
                            ?> class="form-control avatar-input">
                        </div>
                    </div>
                       <div class="form-group col-md-6">
                    <div class="well well-sm well-primary">
                                        <label for="grantparent">Stone Description<span class="required">*</span></label>
                                          <textarea class="form-control" rows="3"   name="stone_description" id="stone_description" placeholder="Stone Description"><?php echo base64_decode($stone_description); ?> </textarea>
                                    </div>
                         </div>
                            </div>
                        </div>
                    </div>
                </div>
                  <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#ImagesThree"><span class="glyphicon glyphicon-th-list">
                            </span>Images</a>
                        </h4>
                    </div>
                    <div id="ImagesThree" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="well well-sm well-primary">
                                        <label for="grantpo">Images</label>
                                       <input name="product_images[]" multiple="multiple" id="Productimages" type="file"/>
                                           <output id="resultimages" />
                                    </div>

                                </div>
                                <div class="col-md-6">
                                   

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                  <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#Inventory4"><span class="glyphicon glyphicon-th-list">
                            </span>Inventory</a>
                        </h4>
                    </div>
                    <div id="Inventory4" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                    
                                     <div class="well well-sm well-primary">
                                        <label for="grantpo">Qty </label>
                                        <input type="number" class="form-control validate-number" id="inventory_qty" name="inv_qty" value="<?php echo $inv_qty; ?>">
                                    </div>
                                    <div class="well well-sm well-primary">
                                        <label for="grantor">Stock Availability</label>
                                        <select id="inventory_stock_availability" name="is_in_stock" class="form-control">
                                            <option value="1" <?php if($is_in_stock == 1) echo 'Selected';?>>In Stock</option>
                                            <option value="0" <?php if($is_in_stock == 0) echo 'Selected';?>>Out of Stock</option>
                                          </select>
                                    </div>
                                 <!-- 
                                    <div class="well well-sm well-primary">
                                        <label for="grantor">Minimum Qty Allowed in Shopping Cart</label>
                                        <input type="text" class="form-control validate-number" id="min_sale_qty" name="min_sale_qty" value="<?php echo $min_sale_qty; ?>">
                                    </div>
                                    <div class="well well-sm well-primary">
                                        <label for="grantor">Maximum Qty Allowed in Shopping Cart</label>
                                        <input type="text" class="form-control validate-number" id="inventory_qty" name="max_sale_qty" value="<?php echo $max_sale_qty; ?>">
                                    </div>
                                     -->
                                </div>
                                <div class="col-md-6"> 
                                    <div class="well well-sm well-primary">
                                        <label for="grantpo">Qty for Item's Status to Become Out of Stock</label>
                                       <input type="text" class="form-control validate-number" id="inventory_min_qty" name="inventory_min_qty" value="<?php echo $inventory_min_qty; ?>">
                                    </div>
                                    

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                 
                  <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#Related5"><span class="glyphicon glyphicon-th-list">
                            </span>Related Products</a>
                        </h4>
                    </div>
                    <div id="Related5" class="panel-collapse collapse">
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
                                  data-show-footer="true" data-height="400" data-url="<?php echo BASE_URL;?>common/product_data.php?a=ProductUserListForm&field=related&checked=<?php echo  base64_encode($related_check_list); ?>" data-query-params="queryParams"
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
                </div>
                       <div class="panel panel-default" id="group_section">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#groupedproducts6"><span class="glyphicon glyphicon-th-list">
                            </span>Group Products</a>
                        </h4>
                    </div>
                    <div id="groupedproducts6" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="row">
                                     <!-- Example Form Block -->
                                <div class="block">
                                    <!-- Example Form Title -->
                                    <div class="block-title">
                                        <h2>Manage Your Product(group)</h2>
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
                </div>
                      <div class="panel panel-default" id="associated_section">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#Associated6"><span class="glyphicon glyphicon-th-list">
                            </span>Associated Products</a>
                        </h4>
                    </div>
                    <div id="Associated6" class="panel-collapse collapse">
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
                </div>
                <div class="panel panel-default" id="CustomOptions_section">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#CustomOptions7"><span class="glyphicon glyphicon-th-list">
                            </span>Custom Options</a>
                        </h4>
                    </div>
                    <div id="CustomOptions7" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                  <div class="input_fields_wrap">
                                  <!-- /////// -->
									<div class="col-md-11">
										<a class="add_field_button btn btn-info pull-right " >Add More Fields</a>
                                    </div>
                                    <div class="clearfix visible-xs"></div>
                                        <!-- ////// &&&&&&&&&&&& **********add more  edit data here  start***************************- -->
                                            
    <?php 
    $qry_opt = $dbComObj->viewData($conn, "custom_options", "*", "`product_id`='" . $id . "' and `product_id`<>0");
     $num_opt = $dbComObj->num_rows($qry_opt); 
    if ($num_opt > 0) {
        $oid = 0 ;
    while ($data_opt = $dbComObj->fetch_assoc($qry_opt)) { 
    ?>
    <div class="col-md-10 well well-sm well-primary">
        <div class="col-md-3">
            <div class="well well-sm well-primary">
                <label for="grantpo">Title *</label>
                <input type="text" class="required-entry form-control" id="product_option_2_title" name="product_option_title[]" value="<?php  echo $data_opt['title'] ?>"> </div>
        </div>
        <div class="col-md-3">
            <div class="well well-sm well-primary">
                <label for="grantpo"> Input Type *</label>
                <select name="option_input_type[]" onchange="option_select(this.value,<?php echo $oid;?>)" id="product_option_2_type" class="select form-control required-option-select" title="">
                    <option value="">-- Please select --</option>
                    <optgroup label="Text">
                        <option value="field" <?php if($data_opt['input_type']=='field') echo'Selected'; ?>>Field</option>
                    </optgroup>
                    <optgroup label="Select">
                        <option value="drop_down" <?php if($data_opt['input_type']=='drop_down') echo'Selected'; ?>>Drop-down</option>
                        <!--<option value="radio">Radio Buttons</option><option value="checkbox">Checkbox</option> -->
                    </optgroup>
                </select>
            </div>
        </div>
        <div class="col-md-2">
            <div class="well well-sm well-primary">
                <label for="grantpo">Is Required</label>
                <select name="option_is_requre[]" id="product_option_2_is_require" class="form-control" title="">
                    <option value="1"  <?php if($data_opt['is_require']=='1') echo'Selected'; ?> >Yes</option>
                    <option value="0"  <?php if($data_opt['is_require']=='0') echo'Selected'; ?>>No</option>
                </select>
            </div>
        </div>
        <div class="col-md-2">
            <div class="well well-sm well-primary">
                <label for="grantpo">Sort Order </label>
                <input type="number" class="validate-zero-or-greater form-control" name="product_opt_sort_order[]" value="<?php  echo $data_opt['sort_order'] ?>"> </div>
        </div>
        <div class="col-md-2">
            <label for="grantpo"> </label> <a href="#" class="remove_field btn btn-danger">Remove</a> </div>

            <div id="optiondiv-13">
             <?php   $qry_val  = $dbComObj->viewData($conn, "custom_option_value", "*", "`option_id`='" . $data_opt['id'] . "'");
                     $num_val = $dbComObj->num_rows($qry_opt);
                     if ($num_val > 0) {
                    while ($data_val = $dbComObj->fetch_assoc($qry_val)) { 
                          if($data_opt['input_type']=='drop_down'){
                        ?>

                    
                    <div class="option_select_row_val" id="option_select_row_val2">
                        <div class="col-md-11">
                            <div class="col-md-2">
                                <div class="well well-sm well-primary">
                                    <label for="grantpo">Title *</label>
                                    <input type="text" class="required-entry form-control" id="product_option_2_title" name="ddl_option_title[<?php echo $oid;?>][]" value="<?php  echo $data_val['option_title'] ?>"> </div>
                            </div>
                            <div class="col-md-2">
                                <div class="well well-sm well-primary">
                                    <label for="grantpo">Price *</label>
                                    <input type="text" class="required-entry form-control" id="product_option_2_title" name="opt_price_row[<?php echo $oid;?>][]" value="<?php  echo $data_val['price'] ?>"> </div>
                            </div>
                            <div class="col-md-2">
                                <div class="well well-sm well-primary">
                                    <label for="grantpo"> Price Type *</label>
                                    <select name="price_type_opt_row[<?php echo $oid;?>][]" id="product_option_2_type" class="select form-control required-option-select" title="">
                                        <option value="fixed"  <?php if($data_val['price_type']=='fixed') echo'Selected'; ?>>Fixed</option>
                                        <option value="percent"  <?php if($data_val['price_type']=='percent') echo'Selected'; ?>>Percent</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="well well-sm well-primary">
                                    <label for="grantpo">SKU</label>
                                    <input type="text" class="validate-zero-or-greater form-control" name="opt_sku_row[<?php echo  $oid;?>][]" value="<?php  echo $data_val['SKU'] ?>"> </div>
                            </div>
                            <div class="col-md-2">
                                <div class="well well-sm well-primary">
                                    <label for="grantpo">Sort Order </label>
                                    <input type="number" class="validate-zero-or-greater form-control" name="opt_sort_order_row[<?php echo $oid;?>][]" value="<?php  echo $data_val['opt_sort_order_row'] ?>"> </div>
                            </div>
                            <div class="col-md-2">
                                <label for="grantpo"> </label> <a href="#" class="remove_field btn btn-danger">Remove</a> </div>
                        </div>
                    </div>

                <?php } else { ?>
                     <div class="col-md-12">
                        <div class="col-md-2">
                            <div class="well well-sm well-primary">
                                <label for="grantpo">Price *</label>
                                <input type="number" class="required-entry form-control" id="product_option_2_title" name="opt_price_field[<?php echo $oid;?>][]" value="<?php  echo $data_val['price'] ?>"> </div>
                        </div>
                        <div class="col-md-2">
                            <div class="well well-sm well-primary">
                                <label for="grantpo"> Price Type *</label>
                                <select name="price_type_opt[<?php echo $oid;?>][]" id="product_option_2_type" class="select form-control required-option-select" title="">
                                     <option value="fixed"  <?php if($data_val['price_type']=='fixed') echo'Selected'; ?>>Fixed</option>
                                        <option value="percent"  <?php if($data_val['price_type']=='percent') echo'Selected'; ?>>Percent</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="well well-sm well-primary">
                                <label for="grantpo">SKU</label>
                                <input type="text" class="validate-zero-or-greater form-control" name="opt_sku[<?php echo $oid;?>][]" value="<?php  echo $data_val['SKU'] ?>"> </div>
                        </div>
                        <div class="col-md-2">
                            <div class="well well-sm well-primary">
                                <label for="grantpo">Max Characters </label>
                                <input type="number" class="validate-zero-or-greater form-control" name="opt_maxchar[<?php echo $oid;?>][]" value="<?php  echo $data_val['opt_maxchar'] ?>"> </div>
                        </div>
                        <div class="col-md-2">
                            <label for="grantpo"> </label> <a href="#" class="remove_field btn btn-danger">Remove</a> </div>
                    </div>


               <?php  } // else close 

                  } // while close 
            }  /// no of recored check close 

                   if($data_opt['input_type']=='drop_down'){
                ?>
                  
                <div class="col-md-10"><a class="add_option_field_button btn btn-info pull-right" onclick="add_option_field_row(<?php echo $oid;?>)">Add More Row</a> </div>
               
                <?php  } ?>
            </div>
    </div>
                
    <?php  $oid++;  } 

    } ?>

        
     </div>
 </div>

                                           
                                        <!-- /////--------********************** edit add more end***************** -->
                                 </div>
                                  <!--   <div><input type="text" name="mytext[]"></div> -->
                                 </div>
                                </div>
                                
                </div>
            </div>
         </div>
    </div>
               <!--  //// -->
            
        </div>
                
                    <div class="form-group form-actions">
                        <input type="hidden" name="mode" value="<?php echo base64_encode($mode); ?>" />
                        <input type="hidden" name="session_uid" value="<?php echo $id; ?>" />
                        <button type="button" id="products_submit" onclick="formSubmit('userForm', 'userResult', '<?php echo BASE_URL; ?>common/products_operations.php')" class="btn btn-sm btn-success"><?php echo $bxt; ?> </button>
                    </div>
                </form>
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
    ////// product type hide and show
     //$("#CustomOptions_section").hide();
      product_typeFunction();
     function product_typeFunction() {
      //  alert(11);
           $("#associated_section").hide();
            var product_type = $('.product_type').val();
            if(product_type =='grouped' || product_type =='simple'  ){
            $("#group_section").show();
         } else {
              $("#group_section").hide();
         }
            if(product_type =='configurable'){
            $("#associated_section").show();
         } else {
              $("#associated_section").hide();
         }

         if(product_type =='grouped'){
            $("#CustomOptions_section").hide();
             $("#price").prop('disabled', true);
            $("#price_sec").hide();
         }else {
             $("#price_sec").show();
               $("#price").prop('disabled', false);
              $("#CustomOptions_section").show();
         }
 }
       //on change st

    $( ".product_type" ).change(function() {
         product_typeFunction();
    
        
});
   ////***** page load call addmore row edit ***********///  
    window.onload = function() {

         //add_custom_row();
       //  option_select('field',1); //field  //drop_down
       //  add_option_field_row(0);
        //  add_custom_row();
        };
   
    var max_fields      = 10; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID
     
    var x = 0; //initlal text box count
    function add_custom_row() {
    //  e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
          //  $(wrapper).append('<div><input type="text" name="mytext[]"/><a href="#" class="remove_field">Remove</a></div>'); //add input box
         $(wrapper).append('<div class="col-md-10 well well-sm well-primary">\
                                       <div class="col-md-3">\
                                    <div class="well well-sm well-primary">\
                                        <label for="grantpo">Title *</label>\
                                     <input type="text" class="required-entry form-control" id="product_option_2_title" name="product_option_title[]" value="">\
                                    </div>\
                                </div>\
                                  <div class="col-md-3">\
                                    <div class="well well-sm well-primary">\
                                        <label for="grantpo"> Input Type *</label>\
                                    <select name="option_input_type[]"  onchange="option_select(this.value,'+x+')" id="product_option_2_type" class="select form-control required-option-select" title=""><option value="">-- Please select --</option><optgroup label="Text"><option value="field">Field</option></optgroup><optgroup label="Select"><option value="drop_down">Drop-down</option> <!--<option value="radio">Radio Buttons</option><option value="checkbox">Checkbox</option> --></optgroup></select>\
                                    </div>\
                                </div>\
                                  <div class="col-md-2">\
                                    <div class="well well-sm well-primary">\
                                        <label for="grantpo">Is Required</label>\
                                    <select name="option_is_requre[]" id="product_option_2_is_require" class="form-control" title=""><option value="1">Yes</option><option value="0">No</option></select>\
                                    </div>\
                                </div>\
                                <div class="col-md-2">\
                                    <div class="well well-sm well-primary">\
                                        <label for="grantpo">Sort Order </label>\
                                   <input type="number" class="validate-zero-or-greater form-control" name="product_opt_sort_order[]" value="'+x+'">\
                                    </div>\
                                </div>\
                                <div class="col-md-2"><label for="grantpo"> </label>\
                                <a href="#" class="remove_field btn btn-danger">Remove</a>\
                                  </div>\
                                  <div id ="optiondiv' + x + '"></div>\
                                   </div>'); 
        }


    }

    $(add_button).click(function(e){ //on add input button click
       //  e.preventDefault();
          add_custom_row() ;
    });
    
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent().parent('div').remove(); x--;
    })
    
    
    ///////////////// 
});
///// ******************  on change start   ********************///////////////
function myFunction() {
      //  alert(11);
    var x = document.getElementById("mySelect").value;
    document.getElementById("demo").innerHTML = "You selected: " + x;
   }
     function option_select(val,id) {
         var max_fields = 10; //maximum input boxes allowed
           var wrapper  = $("#optiondiv"+id); //Fields wrapper
             wrapper.empty();
              id =  id-1;
         //  alert(wrapper.html());
      // alert(val); 
      // alert(id);
      //  e.preventDefault();
       var   x=1;
       var abv="";
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
          //  $(wrapper).append('<div><input type="text" name="mytext[]"/><a href="#" class="remove_field">Remove</a></div>'); //add input box
          if(val =='field') {
            abv ='<div class="col-md-12">\
                        <div class="col-md-2">\
                                    <div class="well well-sm well-primary">\
                                        <label for="grantpo">Price *</label>\
                                     <input type="number" class="required-entry form-control" id="product_option_2_title"  name="opt_price_field['+id+'][]" value="">\
                                    </div>\
                                </div>\
                                  <div class="col-md-2">\
                                    <div class="well well-sm well-primary">\
                                        <label for="grantpo"> Price Type *</label>\
                                    <select name="price_type_opt['+id+'][]"  id="product_option_2_type" class="select form-control required-option-select" title=""><option value="fixed">Fixed</option><option value="percent">Percent</option></select>\
                                    </div>\
                                </div>\
                                  <div class="col-md-2">\
                                    <div class="well well-sm well-primary">\
                                        <label for="grantpo">SKU</label>\
                                    <input type="text" class="validate-zero-or-greater form-control" name="opt_sku['+id+'][]" value="">\
                                    </div>\
                                </div>\
                                <div class="col-md-2">\
                                    <div class="well well-sm well-primary">\
                                        <label for="grantpo">Max Characters </label>\
                                   <input type="number" class="validate-zero-or-greater form-control" name="opt_maxchar['+id+'][]" value="">\
                                    </div>\
                                </div>\
                                <div class="col-md-2"><label for="grantpo"> </label>\
                                <a href="#" class="remove_field btn btn-danger">Remove</a>\
                                  </div></div>\
                                </div>';
                 
              } else if (val =='drop_down') {
                abv='  <div class="option_select_row_val" id ="option_select_row_val' + x + '"></div>\
                <div class="col-md-10"><a class="add_option_field_button btn btn-info pull-right" onclick="add_option_field_row('+id+')" >Add More Row</a> </div>';

              }
               $(wrapper).html(abv); 
        }
    }
    ///////********** add more option fields on click start******************//////

    function add_option_field_row(id) {
      id =  id;
    var max_fields1 = 10; //maximum input boxes allowed
           var wrapper  = $(".option_select_row_val"); //Fields wrapper
          // alert(2);
       var   yf=0;
       var abv="";
        if(yf < max_fields1){ //max input box allowed
            yf++; //text box increment
          //  $(wrapper).append('<div><input type="text" name="mytext[]"/><a href="#" class="remove_field">Remove</a></div>'); //add input box
        
            abv ='<div class="col-md-11">\
             <div class="col-md-2"><div class="well well-sm well-primary">\
            <label for="grantpo">Title *</label>\
            <input type="text" class="required-entry form-control" id="product_option_2_title" name="ddl_option_title['+id+'][]" value=""> </div></div>\
                                       <div class="col-md-2">\
                                    <div class="well well-sm well-primary">\
                                        <label for="grantpo">Price *</label>\
                                     <input type="text" class="required-entry form-control" id="product_option_2_title" name="opt_price_row['+id+'][]" value="">\
                                    </div>\
                                </div>\
                                  <div class="col-md-2">\
                                    <div class="well well-sm well-primary">\
                                        <label for="grantpo"> Price Type *</label>\
                                    <select name="price_type_opt_row['+id+'][]"  id="product_option_2_type" class="select form-control required-option-select" title=""><option value="fixed">Fixed</option><option value="percent">Percent</option></select>\
                                    </div>\
                                </div>\
                                  <div class="col-md-2">\
                                    <div class="well well-sm well-primary">\
                                        <label for="grantpo">SKU</label>\
                                    <input type="text" class="validate-zero-or-greater form-control" name="opt_sku_row['+id+'][]" value="">\
                                    </div>\
                                </div>\
                                <div class="col-md-2">\
                                    <div class="well well-sm well-primary">\
                                        <label for="grantpo">Sort Order </label>\
                                   <input type="number" class="validate-zero-or-greater form-control" name="opt_sort_order_row['+id+'][]"  value="">\
                                    </div>\
                                </div>\
                                <div class="col-md-2"><label for="grantpo"> </label>\
                                <a href="#" class="remove_field btn btn-danger">Remove</a>\
                                  </div></div>\
                                </div>';               
               $(wrapper).append(abv); 
        }
    }
 ////*********** product submit *****************************************************************///   
      $("#products_submit11").click(function(){
         var checkgeneral =$('#GeneralOne').find('.form-control').hasClass("sr-msg-error");
        if(checkgeneral){
        $('#GeneralOne').collapse('show');  
         } else {
          alert(2)
         }
    });

/// ***************image upload  and preivews***********************************
$( "#Productimages" ).change(function() {
   if(window.File && window.FileList && window.FileReader)
    {
        var filesInput = document.getElementById("Productimages");
        
       // filesInput.addEventListener("change", function(event){    
           
            var files = event.target.files; //FileList object
            var output = document.getElementById("resultimages");
            output.innerHTML = "";
              //output.empty();
            for(var i = 0; i< files.length; i++)
            {
                var file = files[i];
                
                //Only pics
                if(!file.type.match('image'))
                  continue;
                
                var picReader = new FileReader();
                
                picReader.addEventListener("load",function(event){
                    
                    var picFile = event.target;
                    
                    var div = document.createElement("span");
                    
                    div.innerHTML = "<img class='thumbnailaj' src='" + picFile.result + "'" +
                            "title='" + picFile.name + "'/>";
                    
                    output.insertBefore(div,null);            
                
                });
                
                 //Read the image
                picReader.readAsDataURL(file);
            }                               
           
       // });
    }
    else
    {
        console.log("Your browser does not support File API");
    }
});
window.onload = function(){
        
    //Check File API support
    if(window.File && window.FileList && window.FileReader)
    {
        var filesInput = document.getElementById("Productimages");
        
        filesInput.addEventListener("change", function(event){    
           
            var files = event.target.files; //FileList object
            var output = document.getElementById("resultimages");
            output.innerHTML = "";
              //output.empty();
            for(var i = 0; i< files.length; i++)
            {
                var file = files[i];
                
                //Only pics
                if(!file.type.match('image'))
                  continue;
                
                var picReader = new FileReader();
                
                picReader.addEventListener("load",function(event){
                    
                    var picFile = event.target;
                    
                    var div = document.createElement("span");
                    
                    div.innerHTML = "<img class='thumbnailaj' src='" + picFile.result + "'" +
                            "title='" + picFile.name + "'/>";
                    
                    output.insertBefore(div,null);            
                
                });
                
                 //Read the image
                picReader.readAsDataURL(file);
            }                               
           
        });
    }
    else
    {
        console.log("Your browser does not support File API");
    }
}

</script>
