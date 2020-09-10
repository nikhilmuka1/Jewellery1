<!-- END Example Form Title -->
<!-- Example Form Content -->
<div id="userResult"></div>
<form class="form-bordered" method="post" id="userForm">
    <div class="col-md-12">
        <div class="panel-group" id="accordion">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a data-toggle="collapse" data-parent="#accordion" href="#GeneralOne">
                        <h4 class="panel-title">
                            <span class="glyphicon glyphicon-file">
                            </span>General
                        </h4>
                    </a>
                </div>
                <div id="GeneralOne" class="panel-collapse collapse in">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-6">
                                <?php if ($product_type != '') { ?>
                                    <div class="well well-sm well-primary form-group">
                                        <label for="grant1">Product Type <span class="required">*</span> </label>
                                        <select class="form-control product_type" id="sel1" name="product_type" <?php echo $req; ?> disabled>
                                            <option value='simple' <?php if ($product_type == 'simple') echo 'selected'; ?>> Simple Product </option>
                                            <option value="grouped" <?php if ($product_type == 'grouped') echo 'selected'; ?>>Grouped Product</option>
                                            <option value="configurable" <?php if ($product_type == 'configurable') echo 'selected'; ?>>Configurable Product</option>
                                        </select>
                                        <input type="hidden" name="product_type" value="<?php echo $product_type; ?>" />
                                    </div>
                                <?php } else { ?>
                                    <div class="well well-sm well-primary form-group">
                                        <label for="grant1">Product Type <span class="required">*</span> </label>
                                        <select class="form-control product_type" id="sel1" name="product_type" <?php echo $req; ?>>
                                            <option value='simple' <?php if ($product_type == 'simple') echo 'selected'; ?>> Simple Product </option>
                                            <option value="grouped" <?php if ($product_type == 'grouped') echo 'selected'; ?>>Grouped Product</option>
                                            <option value="configurable" <?php if ($product_type == 'configurable') echo 'selected'; ?>>Configurable Product</option>
                                        </select>
                                    </div>
                                <?php } ?>
                                <div class="well well-sm well-primary form-group" id="attribute_section">
                                    <label for="grant1">Select Configurable Attributes <span class="required">*</span> </label>
                                    <div id="attribute-list"></div>
                                    <?php /*
                                      $condition = "1 and status='1' and `delete`='0' order by name";
                                      $result = $dbComObj->viewData($conn,"attribute", "*",$condition);
                                      $num = $dbComObj->num_rows($result);
                                      if ($num > 0) {
                                      while ($data = $dbComObj->fetch_assoc($result))
                                      { ?>
                                      <label class="checkbox-inline"><input  name="attribute_arr[]" required type="checkbox" value="<?php echo $data['id'] ?>"><?php echo $data['name'];?></label>
                                      <?php   }
                                      } */
                                    ?>
                                </div>
                                <div class="well well-sm well-primary form-group">
                                    <label for="grant2">Product Name <span class="required">*</span></label>
                                    <input type="text" id="name" name="product_name" value="<?php echo $product_name; ?>" class="form-control" placeholder="Product Name" required>
                                </div>
                                <div class="well well-sm well-primary form-group">
                                    <label for="shorttitle">Weight (in gm) <span class="required">*</span></label>
                                    <input type="number" min="0" id="Weight" name="unit_weight" value="<?php echo $unit_weight; ?>" class="form-control" placeholder="Weight" <?php echo $req; ?> required>
                                </div>
                                <div class="well well-sm well-primary form-group">
                                    <label for="grantparent">Product Description<span class="required">*</span></label>
                                    <textarea class="form-control" rows="3"  required name="product_description" id="product_description" placeholder="Product Description"><?php echo base64_decode($product_description); ?> </textarea>
                                </div>
                                <div class="well well-sm well-primary form-group">
                                    <label for="grantpo">Product Metal<span class="required" ></span></label>
                                    <select class="form-control" id="sel1 product_metal" name="product_metal"  <?php echo $req; ?>
                                            >
                                        <option value=''> select Product Metal </option>
                                        <?php
                                        $condition_metal = "1 and status='1' and `delete`='0' order by name asc";
                                        $resultaj_metal = $dbComObj->viewData($conn, "product_metal", "*", $condition_metal);
                                        $numm = $dbComObj->num_rows($resultaj_metal);
                                        if ($numm > 0) {
                                            while ($datam = $dbComObj->fetch_assoc($resultaj_metal)) {
                                                ?>
                                                <option value="<?php echo $datam['id'] ?>" <?php echo $product_metal == $datam['id'] ? '    selected="selected"' : ''; ?> ><?php echo $datam['name']; ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <!--                                 <div class="well well-sm well-primary form-group">
                                                                    <label for="grantpo">Product Metal<span class="required" >*</span></label>
                                                                    <select class="form-control" id="sel1 product_metal" name="product_metal"  <?php echo $req; ?>
                                                                       >
                                                                       <option value=''>Select product Product Metal </option>
                                                                       <option value='Gold' <?php if ($product_metal == 'Gold') echo 'selected'; ?>> Gold </option>
                                                                       <option value='Silver' <?php if ($product_metal == 'Silver') echo 'selected'; ?>> Silver </option>
                                                                       <option value='Gold Plated' <?php if ($product_metal == 'Gold Plated') echo 'selected'; ?>>Gold Plated  </option>
                                                                       <option value='Platinum Plated' <?php if ($product_metal == 'Platinum Plated') echo 'selected'; ?>> Platinum Plated </option>
                                                                       <option value='Base Metal' <?php if ($product_metal == 'Base Metal') echo 'selected'; ?>> Base Metal </option>
                                                                       <option value='Brass' <?php if ($product_metal == 'Brass') echo 'selected'; ?>> Brass </option>
                                                                       <option value='Silver Plated' <?php if ($product_metal == 'Silver Plated') echo 'selected'; ?>> Silver Plated </option>
                                                                       <option value='Copper' <?php if ($product_metal == 'Copper') echo 'selected'; ?>> Copper </option>
                                                                       <option value='Oxidised Silver' <?php if ($product_metal == 'Oxidised Silver') echo 'selected'; ?>> Oxidised Silver </option>
                                                                    </select>
                                                                 </div>-->
                                <div class="well well-sm well-primary form-group">
                                    <label for="shorttitle">SKU<span class="required" >*</span></label>
                                    <input type="text" id="SKU" name="SKU" title="SKU is requreid" value="<?php echo $SKU; ?>" class="form-control" placeholder="SKU" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="well well-sm well-primary form-group">
                                    <label for="shorttitle">Attribute Set<span class="required" >*</span></label>
                                    <?php if ($product_type != '') { ?> 
                                        <select class="form-control attribute_set_id" id="sel1 attribute_set_id" name="attribute_set_id"   onChange="get_attribute(this.value);"  <?php echo $req; ?> disabled>
                                        <?php } else { ?>
                                            <select class="form-control attribute_set_id" id="sel1 attribute_set_id" name="attribute_set_id"   onChange="get_attribute(this.value);"  <?php echo $req; ?>>
                                            <?php } ?>
                                            <option value='0'> Default </option>
                                            <?php
                                            $condition = "1 and status='1' and `delete`='0' order by name";
                                            $result = $dbComObj->viewData($conn, "attribute_set", "*", $condition);
                                            $num = $dbComObj->num_rows($result);
                                            if ($num > 0) {
                                                while ($data = $dbComObj->fetch_assoc($result)) {
                                                    ?>

                                                    <option value="<?php echo $data['id'] ?>" <?php echo $attribute_set_id == $data['id'] ? ' selected="selected"' : ''; ?> ><?php echo $data['name']; ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                </div>
                                <div class="well well-sm well-primary form-group">
                                    <label for="shorttitle">Brand<span class="required" >*</span></label>
                                    <select class="form-control" id="sel1" name="Brand" required <?php echo $req; ?>
                                            >
                                        <option value=''> select Brand</option>
                                        <?php
                                        $condition = "1 and status='1' and `delete`='0' order by name";
                                        $result = $dbComObj->viewData($conn, "brands", "*", $condition);
                                        $num = $dbComObj->num_rows($result);
                                        if ($num > 0) {
                                            while ($data = $dbComObj->fetch_assoc($result)) {
                                                ?>
                                                <option value="<?php echo $data['id'] ?>" <?php echo $Brand == $data['id'] ? '    selected="selected"' : ''; ?> ><?php echo $data['name']; ?></option>
                                                <?php
                                            }
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
                                    $categoryList11 = $ajCategoryViewObj->createTreeViewcheckbox($category_id, 0);
                                    echo "</div>";
                                    ?>
                                    <!-- <select class="form-control" multiple="multiple" id="sel1" name="category_id[]" <?php // echo $req;   ?>>
                                       <option value="0">Select Category</option>
                                    <?php // foreach($categoryList as $cl) {  ?>
                                       <option value="<?php // echo $cl["id"]   ?>" <?php // echo $category_id == $cl['id'] ? '    selected="selected"' : '';  ?> ><?php //echo $cl["name"];   ?></option>
                                    <?php //}  ?>
                                       </select> -->
                                </div>
                                <div class="well well-sm well-primary form-group" id="price_sec">
                                    <label for="shorttitle">price<span class="required" >*</span></label>
                                    <input type="number" min="1" id="price"  name="price" title="Price is requreid" value="<?php echo $price; ?>" class="form-control" placeholder="price" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a data-toggle="collapse" data-parent="#accordion" href="#MetaTwo">
                        <h4 class="panel-title">
                            <span class="glyphicon glyphicon-th-list">
                            </span>Meta Information
                        </h4>
                    </a>
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
                                    <textarea id="meta_description" name="meta_description" class=" form-control" rows="2" cols="15" onkeyup="checkMaxLength(this, 255);"><?php if (base64_decode($meta_description))echo base64_decode($meta_description); ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a data-toggle="collapse" data-parent="#accordion" href="#stoneinfo">
                        <h4 class="panel-title">
                            <span class="glyphicon glyphicon-th-list">
                            </span>Stone Infomation
                        </h4>
                    </a>
                </div>
                <div id="stoneinfo" class="panel-collapse collapse">
                    <div class="panel-body">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <div class="well well-sm well-primary">
                                    <label for="grantpo">Stone</label>
                                    <select class="form-control" id="sel1 stone" name="stone" <?php echo $req; ?>>
                                        <option value=''>Select Stone </option>
                                        <option value='American Diamond' <?php if ($stone == 'American Diamond') echo 'selected'; ?>> American Diamond </option>
                                        <option value='Crystal' <?php if ($stone == 'Crystal') echo 'selected'; ?>> Crystal </option>
                                        <option value='Pearl' <?php if ($stone == 'Pearl') echo 'selected'; ?>>Pearl  </option>
                                        <option value='Platinum Plated' <?php if ($stone == 'Platinum Plated') echo 'selected'; ?>> Platinum Plated </option>
                                        <option value='Cubic Zirconia ' <?php if ($stone == 'Cubic Zirconia ') echo 'selected'; ?>> Cubic Zirconia  </option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <div class="well well-sm well-primary">
                                    <label for="grantpo">No of Stone</label>
                                    <input type="number" min="0" id="no_of_stone" name="no_of_stone" value="<?php echo $no_of_stone; ?>" class="form-control" placeholder="No of Stone" <?php echo $req; ?>>
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
                                        <option value='D' <?php if ($stone_color == 'D') echo 'selected'; ?>> D </option>
                                        <option value='E' <?php if ($stone_color == 'E') echo 'selected'; ?>> E </option>
                                        <option value='F' <?php if ($stone_color == 'F') echo 'selected'; ?>> F </option>
                                        <option value='G' <?php if ($stone_color == 'G') echo 'selected'; ?>> G </option>
                                        <option value='H' <?php if ($stone_color == 'H') echo 'selected'; ?>> H </option>
                                        <option value='I' <?php if ($stone_color == 'I') echo 'selected'; ?>> I </option>
                                        <option value='J' <?php if ($stone_color == 'J') echo 'selected'; ?>> J </option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <div class="well well-sm well-primary">
                                    <label for="grantpo">Stone Clarity</label>
                                    <select class="form-control" id="sel1 stone_clarity" name="stone_clarity" <?php echo $req; ?>>
                                        <option value=''>Select stone clarity </option>
                                        <option value='FL' <?php if ($stone_clarity == 'FL') echo 'selected'; ?>> FL </option>
                                        <option value='IF' <?php if ($stone_clarity == 'IF') echo 'selected'; ?>> IF </option>
                                        <option value='VVS1' <?php if ($stone_clarity == 'VVS1') echo 'selected'; ?>> VVS1 </option>
                                        <option value='VVS2' <?php if ($stone_clarity == 'VVS2') echo 'selected'; ?>> VVS2 </option>
                                        <option value='VS1' <?php if ($stone_clarity == 'VS1') echo 'selected'; ?>> VS1 </option>
                                        <option value='VS2' <?php if ($stone_clarity == 'VS2') echo 'selected'; ?>> VS2 </option>
                                        <option value='SI1' <?php if ($stone_clarity == 'SI1') echo 'selected'; ?>> SI1 </option>
                                        <option value='SI2' <?php if ($stone_clarity == 'SI2') echo 'selected'; ?>> SI2 </option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <div class="well well-sm well-primary">
                                    <label for="grantpo"> Stone shape</label>
                                    <select class="form-control" id="sel1 stone_shape" name="stone_shape" <?php echo $req; ?>>
                                        <option value=''>Select stone shape </option>
                                        <option value='Round' <?php if ($stone_shape == 'Round') echo 'selected'; ?>> Round </option>
                                        <option value='Pear' <?php if ($stone_shape == 'Pear') echo 'selected'; ?>> Pear </option>
                                        <option value='Emerald' <?php if ($stone_shape == 'Emerald') echo 'selected'; ?>> Emerald </option>
                                        <option value='Marquise' <?php if ($stone_shape == 'Marquise') echo 'selected'; ?>> Marquise </option>
                                        <option value='Oval' <?php if ($stone_shape == 'Oval') echo 'selected'; ?>> Oval </option>
                                        <option value='Princess' <?php if ($stone_shape == 'Princess') echo 'selected'; ?>> Princess </option>
                                        <option value='Asscher' <?php if ($stone_shape == 'Asscher') echo 'selected'; ?>> Asscher </option>
                                        <option value='Cushion' <?php if ($stone_shape == 'Cushion') echo 'selected'; ?>> Cushion </option>
                                        <option value='Heart' <?php if ($stone_shape == 'Heart') echo 'selected'; ?>> Heart </option>
                                        <option value='Radiant' <?php if ($stone_shape == 'Radiant') echo 'selected'; ?>> Radiant </option>
                                        <option value='Square Radiant' <?php if ($stone_shape == 'Square Radiant') echo 'selected'; ?>> Square Radiant </option>
                                        <option value='Trillian' <?php if ($stone_shape == 'Trillian') echo 'selected'; ?>> Trillian </option>
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
                                    <input type="file" id="image_certificate" name="image_certificate"  <?php ?> class="form-control avatar-input">
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
                    <a data-toggle="collapse" data-parent="#accordion" href="#ImagesThree">
                        <h4 class="panel-title">
                            <span class="glyphicon glyphicon-th-list">
                            </span>Images
                        </h4>
                    </a>
                </div>
                <div id="ImagesThree" class="panel-collapse collapse">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="well well-sm well-primary">
                                    <label for="grantpo">Images</label>
                                    <input name="product_images[]" multiple="multiple" id="Productimages" type="file"/>
                                    <output id="resultimages" ></output>
                                    <?php
                                    if ($id) {
                                        $condition = "1 and product_id = " . $id . "  order by id";
                                        $result = $dbComObj->viewData($conn, "product_image", "*", $condition);
                                        $num = $dbComObj->num_rows($result);
                                        if ($num > 0) {
                                            ?>
                                            <?php
                                            while ($data = $dbComObj->fetch_assoc($result)) {
                                                ?>
                                                <?php // echo $data['id']  ?>
                        <!--                                            <img class="thumbnailaj" src="" title="undefined">-->
                                                <div class="col-md-3" id="productimg<?php echo $data['id'] ?>">
                                                    <a class="deleteimage" href="#" data-id="<?php echo $data['id'] ?>" ><i class="icon-remove-sign"></i> Remove</a>
                                                    <img class="thumbnailaj" src="<?php echo BASE_URL . 'images/products/thumb/' . $data['thumb_image'] ?>" title="product image">
                                                </div>
                                            <?php } ?>
                                            <?php
                                        }
                                    }
                                    ?>
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
                    <a data-toggle="collapse" data-parent="#accordion" href="#addtionalinfo">
                        <h4 class="panel-title">
                            <span class="glyphicon glyphicon-th-list">
                            </span>Addtional Information
                        </h4>
                    </a>
                </div>
                <div id="addtionalinfo" class="panel-collapse collapse">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="well well-sm well-primary">
                                    <label for="grantor">Addtional  Information</label>
                                    <textarea id="meta_description" name="addtional_infomation" class=" form-control" rows="3" cols="15" onkeyup="checkMaxLength(this, 255);"><?php echo base64_decode($addtional_infomation); ?></textarea>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a data-toggle="collapse" data-parent="#accordion" href="#Inventory4">
                        <h4 class="panel-title">
                            <span class="glyphicon glyphicon-th-list">
                            </span>Inventory
                        </h4>
                    </a>
                </div>
                <div id="Inventory4" class="panel-collapse collapse">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="well well-sm well-primary">
                                    <label for="grantpo">Qty </label>
                                    <input type="number" min="1"  required class="form-control validate-number" id="inventory_qty" name="inv_qty" value="<?php echo $inv_qty; ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="well well-sm well-primary">
                                    <label for="grantor">Stock Availability</label>
                                    <select id="inventory_stock_availability" name="is_in_stock" class="form-control">
                                        <option value="1" <?php if ($is_in_stock == 1) echo 'Selected'; ?>>In Stock</option>
                                        <option value="0" <?php if ($is_in_stock == 0) echo 'Selected'; ?>>Out of Stock</option>
                                    </select>
                                </div>
                            </div>
                            <!-- 
                               <div class="well well-sm well-primary">
                                   <label for="grantor">Minimum Qty Allowed in Shopping Cart</label>
                                   <input type="text" class="form-control validate-number" min="0" id="min_sale_qty" name="min_sale_qty" value="<?php echo $min_sale_qty; ?>">
                               </div>
                               <div class="well well-sm well-primary">
                                   <label for="grantor">Maximum Qty Allowed in Shopping Cart</label>
                                   <input type="text" class="form-control validate-number"  min="0" id="inventory_qty" name="max_sale_qty" value="<?php echo $max_sale_qty; ?>">
                               </div>
                            -->

                            <!--                              <div class="col-md-6">
                                                             <div class="well well-sm well-primary">
                                                                <label for="grantpo">Qty for Item's Status to Become Out of Stock</label>
                                                                <input type="number" class="form-control validate-number" min="0"  id="inventory_min_qty" name="inventory_min_qty" value="<?php echo $inventory_min_qty; ?>">
                                                             </div>
                                                          </div>-->
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a data-toggle="collapse" data-parent="#accordion" href="#Related5">
                        <h4 class="panel-title">
                            <span class="glyphicon glyphicon-th-list">
                            </span>Related Products
                        </h4>
                    </a>
                </div>
                <div id="Related5" class="panel-collapse collapse">
                    <div class="panel-body">
                        <div class="row">
                            <!-- Example Form Block -->
                            <div class="block">
                                <!-- Example Form Title -->
                                <div class="block-title">
                                    <h2>Manage Products (Related)</h2>
                                </div>
                                <!-- END Example Form Title -->
                                <!-- Example Form Content -->
                                <table data-toggle="table" data-toolbar="#toolbar" data-search="true" data-show-refresh="true" data-show-toggle="true" data-show-columns="true"
                                       data-sort-name="stargazers_count" data-sort-order="desc" data-show-export="true" data-show-pagination-switch="true" data-pagination="true"
                                       data-show-footer="true" data-height="400" data-url="<?php echo BASE_URL; ?>common/product_data.php?a=ProductUserListForm&rp_id=<?php echo $id; ?>&field=related&checked=<?php echo base64_encode($related_check_list); ?>" data-query-params="queryParams"
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
                    <a data-toggle="collapse" data-parent="#accordion" href="#groupedproducts6">
                        <h4 class="panel-title">
                            <span class="glyphicon glyphicon-th-list">
                            </span>Group Products
                        </h4>
                    </a>
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
                                       data-show-footer="true" data-height="400" data-url="<?php echo BASE_URL; ?>common/product_data.php?a=ProductUserListForm&field=group&checked=<?php echo base64_encode($group_products); ?>" data-query-params="queryParams"
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
                <?php /* ?>
                  <div class="panel-heading">
                  <a data-toggle="collapse" data-parent="#accordion" href="#Associated6">
                  <h4 class="panel-title">
                  <span class="glyphicon glyphicon-th-list">
                  </span>Associated Products
                  </h4>
                  </a>
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
                  <?php */ ?>
            </div>
            <?Php
            // code for edit only section start
            if ($id) {
                ?>
    <?php if ($product_type == "simple" || $product_type == "") { //  simple configurable dyanamic db attribute on simple products     ?>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <a data-toggle="collapse" data-parent="#attribute_set_dynamic" href="#attribute_set_dynamic">
                                <h4 class="panel-title">
                                    <span class="glyphicon glyphicon-th-list">
                                    </span>  <?php
                                    if ($attribute_set_id)
                                        echo $attribute_set_name = $ajGenObj->NameById($attribute_set_id, 'attribute_set');
                                    ?> 
                                </h4>
                            </a>
                        </div>
                        <div id="attribute_set_dynamic" class="panel-collapse collapse  ">
                            <div class="panel-body">
                                <div class="row">
                                    <?php
                                    $attribute_value_arr = json_decode($attribute_opt_value, true);
//                                 print_r($attribute_value_arr);
                                    // SELECT * FROM `attribute` WHERE idIN ( 11, 5, 10 )
                                    if ($attribute_set_id) {
                                        $condition1 = "1 and id=" . $attribute_set_id . "  order by id";
                                        $result1 = $dbComObj->viewData($conn, "attribute_set", "*", $condition1);
                                        $num1 = $dbComObj->num_rows($result1);
                                        $data1 = $dbComObj->fetch_assoc($result1);
                                        $assign_attributes = $data1['assign_attributes'];

                                        $condition = "1 and id in (" . $assign_attributes . ") and  status='1' and `delete`='0' order by id";
                                        $result = $dbComObj->viewData($conn, "attribute", "*", $condition);
                                        $num = $dbComObj->num_rows($result);
                                    }

                                    if (isset($num) && $num > 0) {
                                        while ($data = $dbComObj->fetch_assoc($result)) {
                                            $attr_value = $attribute_value_arr[$data['name']];
                                            ?>
                                            <div class="col-md-6">
                                                <div class="well well-sm well-primary" id= 'dynamic_attribute'>
                                                    <label for="grantpo"><?php echo $data['name'] ?></label>
                                                    <?php if ($data['input_type'] == "textarea") { ?>
                                                        <textarea class="form-control" rows="3" required="" name="attribute_opt_value[<?php echo $data['name'] ?>]" id="atttraj" placeholder="<?php echo $data['name'] ?>"><?php if (isset($attr_value)) echo $attr_value ?> </textarea>
                                                    <?php
                                                    }
                                                    if ($data['input_type'] == "select") {
                                                        ?>
                                                        <select class="form-control" id="sel1" name="attribute_opt_value[<?php echo $data['name'] ?>]" required="">
                                                            <option value=""> select <?php echo $data['name']; ?></option>
                                                            <?php
                                                            $attribute_option = explode(',', $data['attribute_option']);
                                                            for ($x = 0; $x < count($attribute_option); $x++) {
                                                                ?>
                                                                <option value="<?php echo $attribute_option[$x] ?>" <?php if (isset($attr_value) && $attr_value == $attribute_option[$x]) echo "selected"; ?>><?php echo $attribute_option[$x] ?></option>
                                                        <?php } ?>
                                                        </select>
                                                    <?php
                                                    }
                                                    else if ($data['input_type'] == "text") {
                                                        ?>
                                                        <input type="text" id="name" name="attribute_opt_value[<?php echo $data['name'] ?>]" value="<?php if (isset($attr_value)) echo $attr_value ?>" class="form-control" placeholder="<?php echo $data['name'] ?>" required="">
                                                    <?php
                                                    }
                                                    else if ($data['input_type'] == "number") {
                                                        ?>
                                                        <input type="number" id="name" name="attribute_opt_value[<?php echo $data['name'] ?>]" value="<?php if (isset($attr_value)) echo $attr_value ?>" class="form-control" placeholder="<?php echo $data['name'] ?>" required="">
                                            <?php } else { ?>
                                                        <input type="text" id="name" name="attribute_opt_value[<?php echo $data['name'] ?>]" value="<?php if (isset($attr_value)) echo $attr_value ?>" class="form-control" placeholder="<?php echo $data['name'] ?>" required="">
                                            <?php } ?>
                                                </div>
                                            </div>
                <?php
            }
        }
        ?>          
                                </div>
                            </div>
                        </div>
                    </div>
    <?php } // end of check $product_type  simple 
    ?>

    <?php if ($product_type == "configurable") { //  simple configurable dyanamic db attribute on      ?>
                    <div class="panel panel-default" id="associated_section1">
                        <div class="panel-heading">
                            <a data-toggle="collapse" data-parent="#accordion" href="#Associated61">
                                <h4 class="panel-title">
                                    <span class="glyphicon glyphicon-th-list">
                                    </span>Associated Products
                                </h4>
                            </a>
                        </div>
                        <div id="Associated61" class="panel-collapse collapse">
                            <div class="panel-body">
                                <div class="row">
                                    <!-- Example Form Block -->
                                    <div class="block">
                                        <!-- Example Form Title -->
                                        <div class="block-title">
                                            <div id= 'configurable_attributes'>
                                                <h2> Product attributes configuration </h2>
                                                <div class="attributeName">
                                                    <?php
                                                    //  attribute_arr
                                                    $attributeName = array();
                                                    $attrid_arr = explode(",", $attribute_arr);
                                                    for ($i = 0; $i < count($attrid_arr); $i++) {
                                                        $attributeName[] = $ajGenObj->NameById($attrid_arr[$i], 'attribute');
                                                        ?>
                                                        <!-- ////do stuff html  -->
            <?php
        }
        // print_r($attributeName);
        ?>
                                                </div>
                                                <div id ="attribue_value_list" >
                                                    <?php
                                                    $condition = "1 and product_id='" . $id . "' order by id";
                                                    $result = $dbComObj->viewData($conn, "configure_attribute_option", "*", $condition);
                                                    $num = $dbComObj->num_rows($result);
                                                    if ($num > 0) {
                                                        while ($data = $dbComObj->fetch_assoc($result)) {
                                                            ?>
                                                            <div class="optionaj_<?php echo $data['associated_product_id'] ?>">
                                                                <div class="col-md-11">
                                                                    <div class="col-md-2">
                                                                        <label for="grantpo">Attribute: </label> <b class="option_value">
                <?php echo $data['attribute_name'] ?> </b> <br>
                                                                        option:  <?php echo $data['option_name'] ?>
                                                                        <input type="hidden" class="form-control" required  name="associated_product_id[]" required value="<?php echo $data['associated_product_id'] ?>">
                                                                        <input type="hidden" class="form-control" required  name="configure_option[]" value="<?php echo $data['option_name'] ?>">
                                                                        <input type="hidden" class="form-control" required  name="configure_attribute_id[]" value="<?php echo $data['attribute_id'] ?>">
                                                                        <input type="hidden" class="form-control" required  name="configure_attribute_name[]" value="<?php echo $data['attribute_name'] ?>">
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <label for="grantpo">Price *</label>
                                                                        <input type="number" required min="1" required class="required-entry form-control"  required id="product_option_2_title" name="configure_option_price[]" value="<?php echo $data['price'] ?>">
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <label for="grantpo"> Price Type *</label>
                                                                        <select name="configure_price_type[]"  id="product_option_2_type" required class="select form-control required-option-select" title="">
                                                                            <option  value="fixed" <?php echo $Brand == $data['id'] ? '    selected="selected"' : ''; ?>>Fixed</option>
                                                                            <option value="percent" <?php echo $Brand == $data['id'] ? '    selected="selected"' : ''; ?> >Percent</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>

                <?php
            }
        }
        ?>
                                                </div>
                                                <h2>Manage Your Product</h2>
                                            </div>
                                            <!-- END Example Form Title -->
                                            <!-- Example Form Content --> 
                                            <table data-toggle="table" data-toolbar="#toolbar" data-search="true" data-show-refresh="true" data-show-toggle="true" data-show-columns="true"
                                                   data-sort-name="stargazers_count" data-sort-order="desc" data-show-export="true" data-show-pagination-switch="true" data-pagination="true"
                                                   data-show-footer="true" data-height="400" data-url="<?php echo BASE_URL; ?>common/product_data.php?a=configureAssociatedListForm&field=associated&checked=<?php echo base64_encode($associated_check_list); ?>&whereattr=<?php echo base64_encode(json_encode($attributeName)); ?>" data-query-params="queryParams"
                                                   data-pagination="true" data-search="true">
                                                <thead>
                                                    <tr>
                                                        <th data-field="action" data-sortable="false">Action</th>
                                                        <th data-field="product_id" data-sortable="true">#</th>
                                                        <th data-field="product_name" data-sortable="true">Name</th>
                                                        <th data-field="attribute_set_id" data-sortable="true">Attribute name</th>
                                                        <th data-field="SKU" data-sortable="true">SKU</th>
                                                        <th data-field="price" data-sortable="true">Price</th>
                                                        <th data-field="is_in_stock" data-sortable="true">Inventory</th>
        <?php for ($i = 0; $i < count($attributeName); $i++) { ?>
                                                            <th data-field="<?php echo $attributeName[$i]; ?>" data-sortable="true"><?php echo $attributeName[$i]; ?></th>
        <?php } ?>

                                                        <th data-field="edit" data-sortable="true">Action</th>
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
                    </div>
    <?php } // end of check $product_type  confi   ?>                       
<?php
}
//end edit only on 
?>
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
<?php
$qry_opt = $dbComObj->viewData($conn, "custom_options", "*", "`product_id`='" . $id . "' and `product_id`<>0");
$num_opt = $dbComObj->num_rows($qry_opt);
?>
                                    <div class="col-md-11">
                                        <a class="add_field_button btn btn-info pull-right " data-id="<?php echo $num_opt + 1; ?>">Add More Fields</a>
                                    </div>
                                    <div class="clearfix visible-xs"></div>
                                    <!-- ////// &&&&&&&&&&&& **********add more  edit data here  start***************************- -->
<?php
if ($num_opt > 0) {
    $oid = 0;
    while ($data_opt = $dbComObj->fetch_assoc($qry_opt)) {
        ?>
                                            <div class="col-md-11 well well-sm well-primary">
                                                <div class="col-md-5">
                                                    <div class="well well-sm well-primary">
                                                        <label for="grantpo">Title *</label>
                                                        <input type="text" class="required-entry form-control" id="product_option_2_title" name="product_option_title[]" value="<?php echo $data_opt['title'] ?>"> 
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="well well-sm well-primary">
                                                        <label for="grantpo">Is Required</label>
                                                        <select name="option_is_requre[]" id="product_option_2_is_require" class="form-control" title="">
                                                            <option value="1"  <?php if ($data_opt['is_require'] == '1') echo'Selected'; ?> >Yes</option>
                                                            <option value="0"  <?php if ($data_opt['is_require'] == '0') echo'Selected'; ?>>No</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="well well-sm well-primary">
                                                        <label for="grantpo">Sort Order </label>
                                                        <input type="number" min="0" class="validate-zero-or-greater form-control" name="product_opt_sort_order[]" value="<?php echo $data_opt['sort_order'] ?>"> 
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="grantpo"> </label> <a href="#" class="remove_field btn btn-danger">Remove</a> 
                                                </div>
                                                <div id="optiondiv-13">
                                                    <?php
                                                    $qry_val = $dbComObj->viewData($conn, "custom_option_value", "*", "`option_id`='" . $data_opt['id'] . "'");
                                                    $num_val = $dbComObj->num_rows($qry_opt);
                                                    if ($num_val > 0) {
                                                        while ($data_val = $dbComObj->fetch_assoc($qry_val)) {
                                                            ?>

                                                            <div class="option_select_row_val" id="option_select_row_val<?php echo $oid ?>">
                                                                <div class="col-md-11">
                                                                    <div class="col-md-2">
                                                                        <div class="well well-sm well-primary">
                                                                            <label for="grantpo">Title *</label>
                                                                            <input type="text" class="required-entry form-control" id="product_option_2_title" name="ddl_option_title[<?php echo $oid; ?>][]" value="<?php echo $data_val['option_title'] ?>"> 
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <div class="well well-sm well-primary">
                                                                            <label for="grantpo">Price *</label>
                                                                            <input type="number" min="0" class="required-entry form-control" id="product_option_2_title" name="opt_price_row[<?php echo $oid; ?>][]" value="<?php echo $data_val['price'] ?>"> 
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <div class="well well-sm well-primary">
                                                                            <label for="grantpo"> Price Type *</label>
                                                                            <select name="price_type_opt_row[<?php echo $oid; ?>][]" id="product_option_2_type" class="select form-control required-option-select" title="">
                                                                                <option value="fixed"  <?php if ($data_val['price_type'] == 'fixed') echo'Selected'; ?>>Fixed</option>
                                                                                <option value="percent"  <?php if ($data_val['price_type'] == 'percent') echo'Selected'; ?>>Percent</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-2">
                                                                        <div class="well well-sm well-primary">
                                                                            <label for="grantpo">Sort Order </label>
                                                                            <input type="number" min="0" class="validate-zero-or-greater form-control" name="opt_sort_order_row[<?php echo $oid; ?>][]" value="<?php echo $data_val['opt_sort_order_row'] ?>"> 
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <label for="grantpo"> </label> <a href="#" class="remove_field btn btn-danger">Remove</a> 
                                                                    </div>
                                                                </div>
                                                            </div>
                <?php
            } // else close 
        }
        ?>
                                                    <div class="col-md-10"><a class="add_option_field_button btn btn-info pull-right" onclick="add_option_field_row(<?php echo $oid; ?>)">Add More Row</a> </div>

                                                </div>
                                            </div>
        <?php
        $oid++;
    }
}
?>
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
    <!--  //// -->
    <div class="form-group form-actions">
        <input type="hidden" name="mode" value="<?php echo base64_encode($mode); ?>" />
        <input type="hidden" name="session_uid" value="<?php echo $id; ?>" />
        <input type="hidden" name="GsellerID" value="<?php
               if (isset($_GET['seller']) && $_GET['seller']) {
                   echo $_GET['seller'];
               }
?>" />
        <button type="button" id="products_submit" onclick="formSubmit('userForm', 'userResult', '<?php echo BASE_URL; ?>common/products_operations.php')" class="btn btn-sm btn-success"><?php echo $bxt; ?> </button>
    </div>
</form>