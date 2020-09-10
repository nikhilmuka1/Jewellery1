   <div>
            <div id="userResult"></div>
            <div class="panel-group" id="accordion">
                <?php if ($product_type =="configurable" ){ //  simple configurable dyanamic db attribute on    ?>
               <div class="panel panel-default">
                  <div class="panel-heading">
                     <a data-toggle="collapse" data-parent="#accordion" href="#QUickCreate">
                        <h4 class="panel-title">
                           <span class="glyphicon glyphicon-file">
                           </span>Quick simple product creation
                        </h4>
                     </a>
                  </div>
                  <div id="QUickCreate" class="panel-collapse collapse">
                     <div class="panel-body">
                        <div class="row">
                           <form class="form-bordered" method="post" id="quickproductform">
                              <div class="col-md-6">
                                 <div class="well well-sm well-primary form-group">
                                    <label for="grant2">Product Name <span class="required">*</span></label>
                                    <input type="text" id="name"  name="product_name" value="<?php echo $product_name; ?>" class="form-control" placeholder="Product Name" required>
                                    <small>Autogenerate</small>
                                 </div>
                                 <div class="well well-sm well-primary form-group">
                                    <label for="shorttitle">Weight (in gm) <span class="required">*</span></label>
                                    <input type="number" min="0" id="Weight" name="unit_weight" value="<?php echo $unit_weight; ?>" class="form-control" placeholder="Weight" <?php echo $req; ?>>
                                 </div>
                                 <div class="well well-sm well-primary form-group">
                                    <label for="grantparent">Product Description<span class="required">*</span></label>
                                    <textarea class="form-control" rows=""  required name="product_description" id="product_description" placeholder="Product Description"> </textarea>
                                 </div>
                                 <div class="well well-sm well-primary form-group">
                                    <label for="grantpo">Product Metal<span class="required" >*</span></label>
                                    <select class="form-control" id="sel1 product_metal" name="product_metal" required <?php echo $req; ?>
                                       >
                                       <option value=''>Select product Product Metal </option>
                                       <option value='Gold' > Gold </option>
                                       <option value='Silver' <?php if($product_metal =='Silver')echo 'selected'; ?>> Silver </option>
                                       <option value='Gold Plated'>Gold Plated  </option>
                                       <option value='Platinum Plated'> Platinum Plated </option>
                                       <option value='Base Metal'> Base Metal </option>
                                       <option value='Brass'> Brass </option>
                                       <option value='Silver Plated'> Silver Plated </option>
                                       <option value='Copper'> Copper </option>
                                       <option value='Oxidised Silver'> Oxidised Silver </option>
                                    </select>
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="well well-sm well-primary form-group">
                                    <label for="shorttitle">SKU<span class="required" >*</span></label>
                                    <input type="text" id="SKU"  name="SKU" title="SKU is requreid" value="<?php echo $SKU; ?>" class="form-control" placeholder="SKU" >
                                    <small>Autogenerate</small>
                                 </div>
                                 <div class="well well-sm well-primary form-group" id="price_sec1">
                                    <label for="shorttitle">price<span class="required" >*</span></label>
                                    <input type="number" min="0" id="price" name="price" title="Price is requreid" value="" class="form-control" placeholder="price" required>
                                 </div>
                                 <div class="well well-sm well-primary">
                                    <label for="grantpo">Qty </label>
                                    <input type="number" min="0" class="form-control validate-number" id="inventory_qty" name="inv_qty" value="">
                                 </div>
                                 <div class="well well-sm well-primary">
                                    <label for="grantor">Stock Availability</label>
                                    <select id="inventory_stock_availability" name="is_in_stock" class="form-control">
                                       <option value="1" selected="">In Stock</option>
                                       <option value="0">Out of Stock</option>
                                    </select>
                                 </div>
                              </div>
                                 <div class="col-md-6">
                                 <div class="well well-sm well-primary">
                                    <label for="grantpo">Images</label>
                                    <input name="product_images[]" multiple="multiple" id="Productimages" type="file"/>
                                    <output id="resultimages" ></output>
                                   
                                 </div>
                              </div>
                              <?php   
                                 // SELECT * FROM `attribute` WHERE idIN ( 11, 5, 10 )
                                   if($attribute_arr) {
                                    //   $condition = "1 and status='1' and id IN (".$attribute_arr." ) and  `delete`='0' order by id"; 
                                     
                                    //  $result = $dbComObj->viewData($conn,"attribute", "*",$condition);
                                    //  $num = $dbComObj->num_rows($result);
                                    // if ($num > 0) {  
                                    //  while ($data = $dbComObj->fetch_assoc($result))
                                    // { 
                                      //  $attribute_arr;
                                          $condition1 = "1 and id=".$attribute_set_id."  order by id";         
                                         $result1 = $dbComObj->viewData($conn,"attribute_set", "*",$condition1);
                                         $num1 = $dbComObj->num_rows($result1);
                                         $data1 = $dbComObj->fetch_assoc($result1);
                                       //  $assign_attributes = $data1['assign_attributes'];
                                         //$assign_attributes = $data1['assign_attributes'];
                                          $assign_attributes =        $attribute_arr;
                                     $condition = "1 and id in (".$assign_attributes.") and  status='1' and `delete`='0' order by id";          
                                     $result = $dbComObj->viewData($conn,"attribute", "*",$condition);
                                     $num = $dbComObj->num_rows($result);
                                    if ($num > 0) {  
                                     while ($data = $dbComObj->fetch_assoc($result))
                                    { 
                                     
                                 ?>
                                     
                                  <div class="col-md-6">
                                 <div class="well well-sm well-primary" id= 'dynamic_attribute11'>
                                    <label for="grantpo"><?php echo  $data['name']?></label>
                                    <?php if($data['input_type']=="textarea") {?>
                                    <textarea class="form-control" rows="3" required="" name="attribute_opt_value[<?php echo  $data['name']?>]" id="product_description" placeholder="<?php echo  $data['name']?>"> </textarea>
                                    <?php }
                                       if($data['input_type']=="select") {?>
                                    <select class="form-control" id="sel1" name="attribute_opt_value[<?php echo  $data['name']?>]" required="">
                                       <option value=""> select <?php echo  $data['name'];?></option>
                                       <?php  
                                          $attribute_option =explode(',',$data['attribute_option']);    
                                          for ($x = 0; $x < count($attribute_option); $x++) {
                                          
                                          ?>
                                       <option value="<?php echo $attribute_option[$x] ?>"><?php echo $attribute_option[$x] ?></option>
                                       <?php } ?>
                                    </select>
                                    <?php }
                                    else   if($data['input_type']=="text") {?>
                                    <input type="text" id="name" name="attribute_opt_value[<?php echo  $data['name']?>]" value="<?php if(isset($attribute_value_arr->$data['name'])) echo $attribute_value_arr->$data['name']?>" class="form-control" placeholder="<?php echo  $data['name']?>" required="">
                                    <?php    }
                                   else  if($data['input_type']=="number") {?>
                                    <input type="number" id="name" name="attribute_opt_value[<?php echo  $data['name']?>]" value="<?php if(isset($attribute_value_arr->$data['name'])) echo $attribute_value_arr->$data['name']?>" class="form-control" placeholder="<?php echo  $data['name']?>" required="">
                                    <?php    } else   {?>
                                    <input type="text" id="name" name="attribute_opt_value[<?php echo  $data['name']?>]" value="<?php if(isset($attribute_value_arr->$data['name'])) echo $attribute_value_arr->$data['name']?>" class="form-control" placeholder="<?php echo  $data['name']?>" required="">
                                    <?php    } ?>
                                 </div>
                              </div>
                              <?php    }
                                 }
                                 }
                                 ?>
                                   <div class="col-md-6"> 
                              <div class="form-group form-actions">
                                 <input type="hidden" name="inventory_min_qty" value="<?php echo ($inventory_min_qty); ?>" />
                                 <input type="hidden" name="Brand" value="<?php echo ($Brand); ?>" />
                                 <input type="hidden" name="attribute_set_id" value="<?php echo ($attribute_set_id); ?>" />
                                 <input type="hidden" name="category_id" value="<?php echo ($category_id); ?>" />
                                 <input type="hidden" name="mode" value="<?php echo base64_encode($mode); ?>" />
                                 <input type="hidden" name="session_uid" value="<?php echo $id; ?>" />
                                 <button type="button" id="products_submit" onclick="formSubmit('quickproductform', 'userResult', '<?php echo BASE_URL; ?>common/products_operations.php')" class="btn btn-sm btn-success"><?php echo "Quick Create"; ?> </button>
                              </div>
                              </div>
                           </form>
                           <!--        ///////////////////// -->
                        </div>
                     </div>
                  </div>
               </div>
               <br>
               <?php } ?>
               <form class="form-bordered1" method="post" id="userForm">
                  <?php if ($product_type =="simple" || $product_type ==""){ //  simple configurable dyanamic db attribute on simple products   ?>
                  <div class="panel panel-default">
                     <div class="panel-heading">
                        <a data-toggle="collapse" data-parent="#attribute_set_dynamic" href="#attribute_set_dynamic">
                           <h4 class="panel-title">
                              <span class="glyphicon glyphicon-th-list">
                              </span>  <?php
                                 echo  $attribute_set_name = $ajGenObj->NameById($attribute_set_id,'attribute_set');
                                     ?> 
                           </h4>
                        </a>
                     </div>
                     <div id="attribute_set_dynamic" class="panel-collapse collapse in ">
                        <div class="panel-body">
                           <div class="row">
                              <?php   
                                 // SELECT * FROM `attribute` WHERE idIN ( 11, 5, 10 )
                                          $condition1 = "1 and id=".$attribute_set_id."  order by id";         
                                         $result1 = $dbComObj->viewData($conn,"attribute_set", "*",$condition1);
                                         $num1 = $dbComObj->num_rows($result1);
                                         $data1 = $dbComObj->fetch_assoc($result1);
                                       //  $assign_attributes = $data1['assign_attributes'];
                                         $assign_attributes = $data1['assign_attributes'];
                                 
                                     $condition = "1 and id in (".$assign_attributes.") and  status='1' and `delete`='0' order by id";          
                                     $result = $dbComObj->viewData($conn,"attribute", "*",$condition);
                                     $num = $dbComObj->num_rows($result);
                                    if ($num > 0) {  
                                     while ($data = $dbComObj->fetch_assoc($result))
                                    { 
                                     
                                 ?>
                              <div class="col-md-6">
                                 <div class="well well-sm well-primary" id= 'dynamic_attribute'>
                                    <label for="grantpo"><?php echo  $data['name']?></label>
                                    <?php if($data['input_type']=="textarea") {?>
                                    <textarea class="form-control" rows="3" required="" name="attribute_opt_value[<?php echo  $data['name']?>]" id="product_description" placeholder="<?php echo  $data['name']?>"> </textarea>
                                    <?php }
                                       if($data['input_type']=="select") {?>
                                    <select class="form-control" id="sel1" name="attribute_opt_value[<?php echo  $data['name']?>]" required="">
                                       <option value=""> select <?php echo  $data['name'];?></option>
                                       <?php  
                                          $attribute_option =explode(',',$data['attribute_option']);    
                                          for ($x = 0; $x < count($attribute_option); $x++) {
                                          
                                          ?>
                                       <option value="<?php echo $attribute_option[$x] ?>"><?php echo $attribute_option[$x] ?></option>
                                       <?php } ?>
                                    </select>
                                    <?php }
                                       if($data['input_type']=="text") {?>
                                    <input type="text" id="name" name="attribute_opt_value[<?php echo  $data['name']?>]" value="" class="form-control" placeholder="<?php echo  $data['name']?>" required="">
                                    <?php    }?>
                                 </div>
                              </div>
                              <?php    }
                                 }
                                 ?>          
                           </div>
                        </div>
                     </div>
                  </div>
                  <?php } // end of check $product_type  simple ?>
                  <?php if ($product_type =="configurable" ){ //  simple configurable dyanamic db attribute on    ?>
                  <div class="panel panel-default" id="associated_section">
                     <div class="panel-heading">
                        <a data-toggle="collapse" data-parent="#accordion" href="#Associated6">
                           <h4 class="panel-title">
                              <span class="glyphicon glyphicon-th-list">
                              </span>Associated Products
                           </h4>
                        </a>
                     </div>
                     <div id="Associated6" class="panel-collapse collapse in">
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
                                             $attributeName =array();
                                              $attrid_arr = explode(",",$attribute_arr);
                                               for ($i = 0; $i < count($attrid_arr) ; $i++) { 
                                                 $attributeName[] =  $ajGenObj->NameById($attrid_arr[$i],'attribute'); 
                                                    ?>
                                          <!-- ////do stuff html  -->
                                          <?php  }  
                                             ?>
                                       </div>
                                       <div id ="attribue_value_list" >
                                          <?php   
                                            $conditioncao = "1 and product_id='".$id."' order by id";         
                                             $resultcao = $dbComObj->viewData($conn,"configure_attribute_option", "*",$conditioncao);
                                             $num = $dbComObj->num_rows($resultcao);
                                             if ($num > 0) { 
                                             while ($datacao = $dbComObj->fetch_assoc($resultcao))
                                             { ?>
                                          <div class="optionaj_<?php echo $datacao['associated_product_id'] ?>">
                                             <div class="col-md-11">
                                                <div class="col-md-2">
                                                   <label for="grantpo">Attribute: </label> <b class="option_value">
                                                   <?php echo $datacao['attribute_name'] ?> </b> <br>
                                                   option:  <?php echo $datacao['option_name'] ?>
                                                    <input type="hidden" class="form-control"   name="associated_product_id[]" required value="<?php echo $datacao['associated_product_id'] ?>">
                                                   <input type="hidden" class="form-control"   name="configure_option[]" value="<?php echo $datacao['option_name'] ?>">
                                                    <input type="hidden" class="form-control"   name="configure_attribute_id[]" value="<?php echo $datacao['attribute_id'] ?>">
                                                   <input type="hidden" class="form-control"   name="configure_attribute_name[]" value="<?php echo $datacao['attribute_name'] ?>">
                                                </div>
                                                <div class="col-md-2">
                                                   <label for="grantpo">Price *</label>
                                                   <input type="number" required min="1" required class="required-entry form-control"  required id="product_option_2_title" name="configure_option_price[]" value="<?php echo $datacao['price'] ?>">
                                                </div>
                                                <div class="col-md-2">
                                                   <label for="grantpo"> Price Type *</label>
                                                   <select name="configure_price_type[]"  id="product_option_2_type" required class="select form-control required-option-select" title="">
                                                      <option  value="fixed" <?php echo $Brand == $datacao['id'] ? '    selected="selected"' : '';?>>Fixed</option>
                                                      <option value="percent" <?php echo $Brand == $datacao['id'] ? '    selected="selected"' : '';?> >Percent</option>
                                                   </select>
                                                </div>
                                             </div>
                                          </div>
                                     
                                       <?php   } 
                                          } 
                                             ?>
                                    </div>
                                    <h2>Manage Your Product</h2>
                                 </div>
                                 <!-- END Example Form Title -->
                                 <!-- Example Form Content --> 
                                 <?php 
                                 if($attribute_set_id)
                                    $encode_attr_id = $njEncryptionObj->safe_b64encode($attribute_set_id);
                                 else 
                                    $encode_attr_id = '';
                                  ?>
                                 <table data-toggle="table" data-toolbar="#toolbar" data-search="true" data-show-refresh="true" data-show-toggle="true" data-show-columns="true"
                                    data-sort-name="stargazers_count" data-sort-order="desc" data-show-export="true" data-show-pagination-switch="true" data-pagination="true"
                                    data-show-footer="true" data-height="400" data-url="<?php echo BASE_URL;?>common/product_data.php?a=configureAssociatedListForm&field=associated&checked=<?php echo base64_encode($associated_check_list); ?>&whereattr=<?php echo base64_encode(json_encode($attributeName)); ?>&attrId=<?php echo $encode_attr_id; ?>" data-query-params="queryParams"
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
                                           <?php  for ($i = 0; $i < count($attributeName) ; $i++) { ?>
                                          <th data-field="<?php echo $attributeName[$i];?>" data-sortable="true"><?php echo $attributeName[$i];?></th>
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
                  <?php } // end of check $product_type  confi ?>
				 
				   <div class="form-group form-actions">
						 <input type="hidden" name="mode" value="<?php echo base64_encode($modeSave); ?>" />
						 <input type="hidden" name="session_uid" value="<?php echo $id; ?>" />
						 <button type="button" id="products_submit" onclick="formSubmit('userForm', 'userResult', '<?php echo BASE_URL; ?>common/products_operations.php')" class="btn btn-sm btn-success"><?php echo $bxt; ?> </button>
						 </div>
				 </form>
           
         
         <!--  //// -->

		 </div>
      </div>