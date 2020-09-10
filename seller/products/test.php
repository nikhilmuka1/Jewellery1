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
                                    <input type="text" id="name" name="attribute_opt_value[<?php echo  $data['name']?>]" value="" class="form-control" placeholder="Product Name" required="">
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
                                             $condition = "1 and product_id='".$id."' order by id";         
                                             $result = $dbComObj->viewData($conn,"configure_attribute_option", "*",$condition);
                                             $num = $dbComObj->num_rows($result);
                                             if ($num > 0) { 
                                             while ($data = $dbComObj->fetch_assoc($result))
                                             { ?>
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
                                                   <input type="number" required min="0" required class="required-entry form-control"  required id="product_option_2_title" name="configure_option_price[]" value="<?php echo $data['price'] ?>">
                                                </div>
                                                <div class="col-md-2">
                                                   <label for="grantpo"> Price Type *</label>
                                                   <select name="configure_price_type[]"  id="product_option_2_type" required class="select form-control required-option-select" title="">
                                                      <option  value="fixed" <?php echo $Brand == $data['id'] ? '    selected="selected"' : '';?>>Fixed</option>
                                                      <option value="percent" <?php echo $Brand == $data['id'] ? '    selected="selected"' : '';?> >Percent</option>
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
                                 <table data-toggle="table" data-toolbar="#toolbar" data-search="true" data-show-refresh="true" data-show-toggle="true" data-show-columns="true"
                                    data-sort-name="stargazers_count" data-sort-order="desc" data-show-export="true" data-show-pagination-switch="true" data-pagination="true"
                                    data-show-footer="true" data-height="400" data-url="<?php echo BASE_URL;?>common/product_data.php?a=configureAssociatedListForm&field=associated&checked=<?php echo base64_encode($associated_check_list); ?>&whereattr=<?php echo base64_encode(json_encode($attributeName)); ?>" data-query-params="queryParams"
                                    data-pagination="true" data-search="true">
                                    <thead>
                                       <tr>
                                          <th data-field="action" data-sortable="false">Action</th>
                                          <th data-field="product_id" data-sortable="true">#</th>
                                          <th data-field="product_name" data-sortable="true">Name</th>
                                          <th data-field="product_type" data-sortable="true">Type</th>
                                          <th data-field="Brand" data-sortable="true">Brand</th>
                                          <th data-field="category" data-sortable="true">Category</th>
                                          <?php  for ($i = 0; $i < count($attributeName) ; $i++) { ?>
                                          <th data-field="<?php echo $attributeName[$i];?>" data-sortable="true"><?php echo $attributeName[$i];?></th>
                                          <?php } ?>
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
                </div>
                  <?php } // end of check $product_type  confi ?>