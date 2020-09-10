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
                    <div class="form-group col-md-6">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="gi gi-user"></i></span>
                            <input type="text" id="name" name="product_name" value="<?php echo $product_name; ?>" class="form-control" placeholder="Product Name" required>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="hi hi-list-alt"></i></span>
                             <textarea class="form-control" rows="3" name="product_description" id="product_description" placeholder="Product Description"><?php echo $product_description; ?> </textarea>
                            
                        </div>
                    </div>
                    <br/>
                    <div class="form-group col-md-6">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="gi gi-envelope"></i></span>
                            <input type="text" id="Brand" name="Brand" value="<?php echo $Brand; ?>" class="form-control" placeholder="Brand" required>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="gi gi-envelope"></i></span>
                             <select class="form-control" id="sel1" name="product_type" <?php echo $req; ?>>
                                <option value=''>Select product type </option>
                                <option value='simple' <?php if($product_type =='simple')echo 'selected'; ?>> Simple Product </option>
                                <option value='Fashion' <?php if($product_type =='Fashion')echo 'selected'; ?>> Fashion </option>
                                <option value='Traditional' <?php if($product_type =='Traditional')echo 'selected'; ?>>Traditional Imitation </option>
                              </select>
                           
                        </div>
                    </div>
                    
                     <div class="form-group col-md-6">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="gi gi-asterisk"></i></span>
                              <?php 
                                    $ajCategoryViewObj = new ajCategoryView();
                                    $categoryList = $ajCategoryViewObj->fetchCategoryTree();
                                    $num = count($categoryList)
                                   
                                    ?>
                                     <select class="form-control" id="sel1" name="category_id" <?php echo $req; ?>>
                                       <option value="0">Select Category</option>
                                    <?php foreach($categoryList as $cl) { ?>
                                      <option value="<?php echo $cl["id"] ?>" <?php echo $category_id == $cl['id'] ? '    selected="selected"' : '';?> ><?php echo $cl["name"]; ?></option>
                                    <?php } ?>
                                 </select>
                            
                        </div>
                    </div>
                    
                    <div class="form-group col-md-6">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="gi gi-asterisk"></i></span>
                            <input type="number" id="quantity" name="quantity" value="<?php echo $quantity; ?>" class="form-control" placeholder="Quantity" <?php echo $req; ?>>
                        </div>
                    </div>
                     <div class="form-group col-md-6">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="gi gi-asterisk"></i></span>
                            <input type="number" id="price" name="price" value="<?php echo $price; ?>" class="form-control" placeholder="Price" <?php echo $req; ?>>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="gi gi-asterisk"></i></span>
                            <input type="text" id="measurement_size" name="measurement_size" value="<?php echo $measurement_size; ?>" class="form-control" placeholder="Measurement Size" <?php echo $req; ?>>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="gi gi-asterisk"></i></span>
                             <select class="form-control" id="sel1 Material" name="Material" <?php echo $req; ?>>
                                <option value=''>Select product Material </option>
                                <option value='Metal' <?php if($Material =='Metal')echo 'selected'; ?>> Metal </option>
                                <option value='Fabric' <?php if($Material =='Fabric')echo 'selected'; ?>> Fabric </option>
                                <option value='Pearl' <?php if($Material =='Pearl')echo 'selected'; ?>>Pearl  </option>
                           </select>
                            
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="gi gi-asterisk"></i></span>
                            <input type="number" id="discount" name="discount" value="<?php echo $discount; ?>" class="form-control" placeholder="Discount %" <?php echo $req; ?>>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="gi gi-asterisk"></i></span>
                            <input type="text" id="price" name="unit_weight" value="<?php echo $unit_weight; ?>" class="form-control" placeholder="Unit Weight" <?php echo $req; ?>>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="gi gi-asterisk"></i></span>
                              <select class="form-control" id="sel1 product_metal" name="product_metal" <?php echo $req; ?>>
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
                     <div class="form-group col-md-6">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="gi gi-asterisk"></i></span>
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
                        <div class="input-group">
                            <span class="input-group-addon"><i class="gi gi-asterisk"></i></span>
                            <input type="number" id="no_of_stone" name="no_of_stone" value="<?php echo $no_of_stone; ?>" class="form-control" placeholder="No of Stone" <?php echo $req; ?>>
                        </div>
                    </div>
                     <div class="form-group col-md-6">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="gi gi-asterisk"></i></span>
                            <input type="text" id="stone_setting" name="stone_setting" value="<?php echo $stone_setting; ?>" class="form-control" placeholder="Stone Setting" <?php echo $req; ?>>
                        </div>
                    </div>
                     <div class="form-group col-md-6">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="gi gi-asterisk"></i></span>
                            <input type="text" id="stone_color" name="stone_color" value="<?php echo $stone_color; ?>" class="form-control" placeholder="Stone Color" <?php echo $req; ?>>
                        </div>
                    </div>
                     <div class="form-group col-md-6">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="gi gi-asterisk"></i></span>
                            <input type="text" id="stone_clarity" name="stone_clarity" value="<?php echo $stone_clarity; ?>" class="form-control" placeholder="Stone Clarity" <?php echo $req; ?>>
                        </div>
                    </div>
                     <div class="form-group col-md-6">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="gi gi-asterisk"></i></span>
                             <select class="form-control" id="sel1 stone_shape" name="stone_shape" <?php echo $req; ?>>
                                <option value=''>Select stone shape </option>
                                <option value='Round' <?php if($stone_shape =='Round')echo 'selected'; ?>> Round </option>
                                <option value='Pear' <?php if($stone_shape =='Pear')echo 'selected'; ?>> Pear </option>
                                 <option value='Emerald' <?php if($stone_shape =='Emerald')echo 'selected'; ?>> Emerald </option>
                                  <option value='Marquise' <?php if($stone_shape =='Marquise')echo 'selected'; ?>> Marquise </option>
                                   <option value='Oval' <?php if($stone_shape =='Oval')echo 'selected'; ?>> Oval </option>
                              </select>
                            
                        </div>
                    </div> 
                    <div class="form-group col-md-6">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="gi gi-asterisk"></i></span>
                            <input type="text" id="carat" name="carat" value="<?php echo $carat; ?>" class="form-control" placeholder="Carat" <?php echo $req; ?>>
                        </div>
                    </div>
                    <br/>
                    <div class="form-group col-md-6">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="gi gi-picture"></i></span>
                            <input type="file" id="image" name="image[]" multiple="multiple" <?php
                            if ($id == "") {
                                echo 'required="required" ';
                            }
                            ?> class="form-control avatar-input">
                        </div>
                    </div>
                      <div class="form-group col-md-6">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="gi gi-user"></i></span>
                             <select class="form-control" id="sel1" name="resizable" <?php echo $req; ?>>
                                <option value=''>Select Resizable </option>
                                <option value='1' <?php if($resizable =='1')echo 'selected'; ?>> Yes </option>
                                <option value='0' <?php if($resizable =='0')echo 'selected'; ?>> No </option>
                              </select>
                        </div>
                    </div>
                     <div class="form-group col-md-6">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="gi gi-user"></i></span>
                             <select class="form-control" id="sel1" name="is_lab_created" <?php echo $req; ?>>
                                <option value=''>Select Lab Created </option>
                                <option value='1' <?php if($is_lab_created =='1')echo 'selected'; ?>> Yes </option>
                                <option value='0' <?php if($is_lab_created =='0')echo 'selected'; ?>> No </option>
                              </select>
                        </div>
                    </div>
                    <div class="form-group form-actions">
                        <input type="hidden" name="mode" value="<?php echo base64_encode($mode); ?>" />
                        <input type="hidden" name="session_uid" value="<?php echo $id; ?>" />
                        <button type="button" onclick="formSubmit('userForm', 'userResult', '<?php echo BASE_URL; ?>common/products_operations.php')" class="btn btn-sm btn-success"><?php echo $bxt; ?> </button>
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
