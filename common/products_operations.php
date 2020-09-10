<?php
require_once '../page_fragment/define.php';
include ('../page_fragment/dbConnect.php');
include ('../page_fragment/dbGeneral.php');
include ('../page_fragment/njGeneral.php');
include ('../page_fragment/njFile.php');
include ('../page_fragment/njEncription.php');
$dbConObj = new dbConnect();
$dbComObj = new dbGeneral();
$njGenObj = new njGeneral();
$conn = $dbConObj->dbConnect();
$njEncryptionObj = new njEncryption();

$njFileObj = new njFile();
$mode = "";
$requestData = array();
if (isset($_POST['mode'])) {
    $mode = base64_decode($_POST['mode']);
    unset($_POST['mode']);
    $requestData = $_POST;
} elseif (isset($_GET['mode'])) {
    $mode = base64_decode($_GET['mode']);
    unset($_GET['mode']);
    $requestData = $_GET;
}

$table = "products";

if (isset($_SESSION['DH_admin_id'])) {
    $ss_user_id = $_SESSION['DH_admin_id'];
    $user_type = $_SESSION['DH_admin_type_name'];
    $path_url = ADMIN_PATH;
    $redirect_url = ADMIN_URL;
} else {
    $ss_user_id = $_SESSION['DH_seller_id'];
    $user_type = $_SESSION['DH_seller_type_name'];
    $path_url = SELLER_PATH;
    $redirect_url = SELLER_URL;
}

if ($mode == "addNewProduct") {
//print_r($attribute_opt_value);
    //echo '<pre>'; print_r($_POST);
    // die;
    //validation start
    $ser_error_name = '';
    if ($_POST['product_type'] == 'grouped' && !$_POST['group_check_list']) {
        $SER_ERROR = 1;
        $ser_error_name .= "Please select Group Products";
    } else {
        $SER_ERROR = 0;
    }
    $SER_ERROR;
    //validation end
    if ($SER_ERROR == 0) {
        $uniqid = uniqid();
        $condition = " `SKU` = '" . $_POST['SKU'] . "'";
        $result = $dbComObj->viewData($conn, $table, "*", $condition);
        $num = $dbComObj->num_rows($result);
        if ($num == 0) {

            $dates = date("Y-m-d-H-i-s");
            $data = array();

            $slug = $njGenObj->removeSpecialChar($_POST['product_name']);
            if ($_POST['SKU']) {
                $SKU = $_POST['SKU'];
            } else {
                $SKU = 'MPJ-' . $uniqid;
            }
            $data['product_name'] = $_POST['product_name'];
            $data['slug'] = $slug;
            $data['product_description'] = base64_encode($_POST['product_description']);
            $data['stone_description'] = base64_encode($_POST['stone_description']);
            $data['addtional_infomation'] = base64_encode($_POST['addtional_infomation']);
            $data['product_type'] = $_POST['product_type'];
            $data['attribute_set_id'] = $_POST['attribute_set_id'];
            $data['SKU'] = $SKU;
            $data['Brand'] = ($_POST['Brand']);
            if (isset($_POST['category_id']))
                $data['category_id'] = implode(",", $_POST['category_id']);
            $data['unit_weight'] = ($_POST['unit_weight']);
            $data['price'] = ($_POST['price']);
            /// n others fileds st///////
            $data['inv_qty'] = ($_POST['inv_qty']);
            if (isset($_SESSION['DH_seller_id']) && $_SESSION['DH_seller_id']) {
                $data['seller_id'] = ($_SESSION['DH_seller_id']);
            }
            //$data['min_sale_qty'] = ($_POST['min_sale_qty']);
            //  $data['max_sale_qty'] = ($_POST['max_sale_qty']);
            //  $data['inventory_min_qty'] = ($_POST['inventory_min_qty']);
            $data['is_in_stock'] = ($_POST['is_in_stock']);
            if (isset($_POST['related_check_list']))
                $data['related_check_list'] = implode(",", $_POST['related_check_list']);
            if (isset($_POST['attribute_arr']))
                $data['attribute_arr'] = implode(",", $_POST['attribute_arr']);

            if (isset($_POST['associated_check_list']))
                $data['associated_check_list'] = implode(",", $_POST['associated_check_list']);
            if (isset($_POST['group_check_list']))
                $data['group_products'] = implode(",", $_POST['group_check_list']);
            if ($_POST['meta_title']) {
                $data['meta_title'] = ($_POST['meta_title']);
            } else {
                $data['meta_title'] = ($_POST['product_name']);
            }
            if ($_POST['meta_keyword']) {
                $data['meta_keyword'] = ($_POST['meta_keyword']);
            } else {
                $data['meta_keyword'] = ($_POST['product_name']);
            }
            if ($_POST['meta_description']) {
                $data['meta_description'] = base64_encode($_POST['meta_description']);
            } else {
                $data['meta_description'] = base64_encode($_POST['product_description']);
            }
            /// diamond and stone details
            $data['measurement_size'] = ($_POST['measurement_size']);
            //    $data['Material'] = ($_POST['Material']);
            //$data['discount'] = ($_POST['discount']);
            //$data['quantity'] = ($_POST['quantity']);
            //// $data['resizable'] = ($_POST['resizable']);
            // $data['is_lab_created'] = ($_POST['is_lab_created']);
            $data['product_metal'] = ($_POST['product_metal']);
            $data['stone'] = ($_POST['stone']);
            $data['no_of_stone'] = ($_POST['no_of_stone']);
            $data['stone_setting'] = ($_POST['stone_setting']);
            $data['stone_color'] = ($_POST['stone_color']);
            $data['stone_clarity'] = ($_POST['stone_clarity']);
            $data['stone_shape'] = ($_POST['stone_shape']);
            $data['carat'] = ($_POST['carat']);
            //  print_r($_FILES['image_certificate']);
            if (isset($_FILES['image_certificate']['name']) && !empty($_FILES['image_certificate']['name'])) {
                $image = $_FILES['image_certificate'];
                $name = preg_replace('/[^a-zA-Z0-9_]/', '-', $_POST['product_name']);
                $filename = $name . "-" . $dates;
                $pathToSave = "../../images/cert/";
                $thumbPathToSave = "../../images/cert/thumb/";
                $main_logo = $njFileObj->uploadImage($image, $filename, $pathToSave);
                $image_source = "../../images/cert/" . $main_logo;
                $thumb_logo = $njFileObj->resizeImage($image_source, $filename, $thumbPathToSave);
                $data['image_certificate'] = $main_logo;
            }

            $data['added_on'] = date("Y-m-d H:i:s");
            $data['added_user_type'] = $user_type;
            $data['added_by'] = $ss_user_id;
            $data['status'] = '1';

            $dbComObj->addData($conn, $table, $data);
            $product_id = $dbComObj->insert_id($conn);
            /// image upload
            $image_data = array();
            $file = $_FILES['product_images'];
            $product_images = $file ['name'];
            foreach ($product_images as $key => $value) {
                $tmppath = $file['tmp_name'][$key];
                if ($tmppath != '') {
                    $names = explode('.', $value);
                    $pname = preg_replace('/[^a-zA-Z0-9_]/', '-', $_POST['product_name']);
                    $value = $pname . '-' . $dates . ' _ ' . $value;
                    $path = "../images/products/" . $value;
                    move_uploaded_file($tmppath, $path);
                    $image_source = "../images/products/" . $value;
                    $thumbPathToSave = "../images/products/thumb/";
                    $thumb_logo = $njFileObj->resizeImage($image_source, $value, $thumbPathToSave);
                    $image_data['product_id'] = $product_id;
                    $image_data['thumb_image'] = $thumb_logo;
                    $image_data['image'] = $value;
                    $image_data['added_on'] = date("Y-m-d H:i:s");
                    $image_data['added_user_type'] = $user_type;
                    $image_data['added_by'] = $ss_user_id;
                    $image_data['status'] = '1';
                    $product_imageAdd = $dbComObj->addData($conn, 'product_image', $image_data);
                }
            }

            if (isset($_POST['product_option_title'])) {

                $count_field = count($_POST['product_option_title']);

                for ($i = 0; $i < $count_field; $i++) {

                    $option['title'] = $_POST['product_option_title'][$i];
                    $option['input_type'] = 'drop_down'; // $_POST['option_input_type'][$i];
                    $option['is_require'] = $_POST['option_is_requre'][$i];
                    $option['sort_order'] = $_POST['product_opt_sort_order'][$i];
                    $option['product_id'] = $product_id;
                    $option['added_on'] = date("Y-m-d H:i:s");
                    $option['added_type'] = $user_type;
                    $option['added_by'] = $ss_user_id;
                    $option['status'] = '1';
                    //custom_options table;
                    $custom_optionsAdd = $dbComObj->addData($conn, 'custom_options', $option);
                    $custom_options_ID = $dbComObj->insert_id($conn);

                    $count_field_dl = count($_POST['opt_price_row'][$i]);
                    for ($J = 0; $J < $count_field_dl; $J++) {
                        // echo $i;  echo '------'. $J;
                        //  echo 'opt_price_row-----J. ---'. $_POST['opt_price_row'][$i][$J];
                        $option3['price'] = ($_POST['opt_price_row'][$i][$J]);
                        $option3['price_type'] = ($_POST['price_type_opt_row'][$i][$J]);
                        $option3['opt_sort_order_row'] = ($_POST['opt_sort_order_row'][$i][$J]);
                        $option3['option_title'] = ($_POST['ddl_option_title'][$i][$J]);
                        $option3['option_id'] = $custom_options_ID; // nn
                        $option3['input_type'] = 'drop_down'; //$input_opt; // nn
                        $custom_option_valueAdd = $dbComObj->addData($conn, 'custom_option_value', $option3);
                        'option3----';
                        print_r($option3);
                    }
                    //}
                }
            }
            // die;
            //  if($_POST['attribute_arr'] && $_POST['attribute_set_id']){
            if ($_POST['attribute_set_id']) {
                echo "Redirect : Select Assoctiative products. URL " . $redirect_url . "products/new-product-step2-configure/?session_uid=" . $njEncryptionObj->safe_b64encode($product_id) . "";
                // die;
            } else {

                echo "Redirect : Products created successfully. URL " . $redirect_url . "products/";
                //echo "Redirect : Select Assoctiative products. URL ".$path_url."products/new-product-step2-configure/?session_uid=".$njEncryptionObj->safe_b64encode($product_id)."";
            }
        } else {
            echo "Error : product SKU already registered. Please try again with diffrent SKU.";
        }
    } else {
        echo "Error : $ser_error_name";
    }
}

if ($mode == "manageProducts") {

//      print_r($_POST); 
    $condition = " `product_id` = '" . $_POST['session_uid'] . "'";
    $result = $dbComObj->viewData($conn, $table, "*", $condition);
    $num = $dbComObj->num_rows($result);
    $row = $dbComObj->fetch_assoc($result);
    $DB_SKU=$row['SKU']; 
    //validation start
    $SER_ERROR = 0;
    $ser_error_name = '';
    if ($_POST['product_type'] == 'grouped' && !($_POST['group_check_list'])) {
        $SER_ERROR = 1;
        $ser_error_name .= "Please select Group Products";
    }  if($requestData['SKU'] != $DB_SKU){
       $condition_s = " `SKU` = '" . $requestData['SKU'] . "'";
        $result_S = $dbComObj->viewData($conn, $table, "*", $condition_s);
        $num_sku = $dbComObj->num_rows($result_S);
        
        if ($num_sku > 0 ) {
            $SER_ERROR = 1; 
           $ser_error_name .= " product SKU already registered. Please try again with diffrent SKU.";
     }   
   }
     $SER_ERROR;
    //validation end
    if ($SER_ERROR == 0) {
        if ($num) {
        

            $slug = $njGenObj->removeSpecialChar($_POST['product_name']);
            $row = $dbComObj->fetch_assoc($result);
            $data = array();
            $data['product_name'] = $requestData['product_name'];
            $data['slug'] = $slug;
            $data['product_description'] = base64_encode($requestData['product_description']);
            $data['stone_description'] = base64_encode($_POST['stone_description']);
            $data['product_type'] = $requestData['product_type'];
            $data['Brand'] = ($requestData['Brand']);
            $data['addtional_infomation'] = base64_encode($_POST['addtional_infomation']);
            $category_id = ($requestData['category_id']);   //array
            if (($category_id))
                $data['category_id'] = implode(",", $requestData['category_id']);
            $data['unit_weight'] = ($requestData['unit_weight']);
            $data['price'] = ($requestData['price']);
            $data['SKU'] = ($requestData['SKU']);
            /// n others fileds st///////
            $data['inv_qty'] = ($requestData['inv_qty']);
            //$data['min_sale_qty'] = ($requestData['min_sale_qty']);
            // $data['max_sale_qty'] = ($requestData['max_sale_qty']);
            //  $data['inventory_min_qty'] = ($requestData['inventory_min_qty']);
            $data['is_in_stock'] = ($requestData['is_in_stock']);
            if (isset($requestData['related_check_list']))
                $data['related_check_list'] = implode(",", $requestData['related_check_list']);
            if (isset($requestData['associated_check_list']))
                $data['associated_check_list'] = implode(",", $requestData['associated_check_list']);
            if (isset($_POST['group_check_list']))
                $data['group_products'] = implode(",", $requestData['group_check_list']);
            $data['meta_title'] = ($requestData['meta_title']);
            $data['meta_keyword'] = ($requestData['meta_keyword']);
            $data['meta_description'] =  base64_encode(($requestData['meta_description']));($requestData['meta_description']);
            /// diamond and stone details
            $data['measurement_size'] = ($requestData['measurement_size']);
            //  print_r($_POST['attribute_opt_value']); die;
            if (isset($_POST['attribute_opt_value'])) {
                $json_attribute_value = json_encode($_POST['attribute_opt_value'], true);
                $data['attribute_opt_value'] = $json_attribute_value;
            }
            // $data['Material'] = ($_POST['Material']);
            //$data['discount'] = ($_POST['discount']);
            //$data['quantity'] = ($_POST['quantity']);
            //$data['resizable'] = ($_POST['resizable']);
            // $data['is_lab_created'] = ($_POST['is_lab_created']);
            $data['product_metal'] = ($requestData['product_metal']);
            $data['stone'] = ($requestData['stone']);
            $data['no_of_stone'] = ($requestData['no_of_stone']);
            $data['stone_setting'] = ($requestData['stone_setting']);
            $data['stone_color'] = ($requestData['stone_color']);
            $data['stone_clarity'] = ($requestData['stone_clarity']);
            $data['stone_shape'] = ($requestData['stone_shape']);
            $data['carat'] = ($requestData['carat']);
            if (isset($_SESSION['DH_seller_id']) && $_SESSION['DH_seller_id']) {
                $data['seller_id'] = ($_SESSION['DH_seller_id']);
            }
            if (isset($_FILES['image_certificate']['name']) && !empty($_FILES['image_certificate']['name'])) {
                $image = $_FILES['image_certificate'];
                $name = preg_replace('/[^a-zA-Z0-9_]/', '-', $requestData['product_name']);
                $filename = $name . "-" . $dates;
                $pathToSave = "../../images/cert/";
                $thumbPathToSave = "../../images/cert/thumb/";
                $main_logo = $njFileObj->uploadImage($image, $filename, $pathToSave);
                $image_source = "../../images/cert/" . $main_logo;
                $thumb_logo = $njFileObj->resizeImage($image_source, $filename, $thumbPathToSave);
                $data['image_certificate'] = $main_logo;
            }
            $data['updated_on'] = date("Y-m-d H:i:s");
            $data['update_user_type'] = $user_type;
            $data['updated_by'] = $ss_user_id;
            $dates = date("Y-m-d-H-i-s");
            if (isset($_FILES['image']['name']) && !empty($_FILES['image']['name'])) {
                $image = $_FILES['image'];
                $name = preg_replace('/[^a-zA-Z0-9_]/', '-', $_POST['product_name']);
                $filename = $name . "-" . $dates;
                $pathToSave = "../../images/user/";
                $thumbPathToSave = "../../images/user/thumb/";
                $main_logo = $njFileObj->uploadImage($image, $filename, $pathToSave);
                $image_source = "../../images/user/" . $main_logo;
                $thumb_logo = $njFileObj->resizeImage($image_source, $filename, $thumbPathToSave);
                $data['image'] = $main_logo;
            }
            $dbComObj->editData($conn, $table, $data, $condition);
            /// image upload start
            $image_data = array();
            $file = $_FILES['product_images'];
            $product_images = $file ['name'];
            foreach ($product_images as $key => $value) {
                $tmppath = $file['tmp_name'][$key];
                if ($tmppath != '') {
                    $names = explode('.', $value);
                    $pname = preg_replace('/[^a-zA-Z0-9_]/', '-', $_POST['product_name']);
                    $value = $pname . '-' . $dates . ' _ ' . $value;
                    $path = "../images/products/" . $value;
                    move_uploaded_file($tmppath, $path);
                    $image_source = "../images/products/" . $value;
                    $thumbPathToSave = "../images/products/thumb/";
                    $thumb_logo = $njFileObj->resizeImage($image_source, $value, $thumbPathToSave);
                    $image_data['product_id'] = $_POST['session_uid'];
                    $image_data['thumb_image'] = $thumb_logo;
                    $image_data['image'] = $value;
                    $image_data['added_on'] = date("Y-m-d H:i:s");
                    $image_data['added_user_type'] = $user_type;
                    $image_data['added_by'] = $ss_user_id;
                    $image_data['status'] = '1';
                    $product_imageAdd = $dbComObj->addData($conn, 'product_image', $image_data);
                }
            }
            // custom option start
            //  echo 'id--------'. $requestData['session_uid'];  //die;
            $product_id = $requestData['session_uid'];
            if (isset($requestData['product_option_title'])) {

                $count_field = count($requestData['product_option_title']);
                $dbComObj->deleteData($conn, 'custom_options', "`product_id` = '" . $product_id . "'");   // delete data
                $dbComObj->deleteData($conn, 'custom_option_value', "`product_id` = '" . $product_id . "'");   // delete data
                //    print_r($requestData['product_option_title']);
                for ($i = 0; $i < $count_field; $i++) {
                    $option['title'] = $requestData['product_option_title'][$i];
                    $option['input_type'] = 'drop_down'; // $requestData['option_input_type'][$i];
                    $option['is_require'] = $requestData['option_is_requre'][$i];
                    $option['sort_order'] = $requestData['product_opt_sort_order'][$i];
                    $option['product_id'] = $product_id;
                    $option['added_on'] = date("Y-m-d H:i:s");
                    $option['added_type'] = $user_type;
                    $option['added_by'] = $ss_user_id;
                    $option['status'] = '1';
                    $custom_optionsAdd = $dbComObj->addData($conn, 'custom_options', $option);
                    $custom_options_ID = $dbComObj->insert_id($conn);
                    //   echo '<pre> custom_options----';   print_r($option);
                    $input_opt = $requestData['opt_price_row'][$i];

                    $count_field_dl = count($requestData['opt_price_row'][$i]);
                    for ($J = 0; $J < $count_field_dl; $J++) {
                        //   echo $i;  echo '------'. $J;
                        $option3['price'] = ($_POST['opt_price_row'][$i][$J]);
                        $option3['price_type'] = ($_POST['price_type_opt_row'][$i][$J]);
                        $option3['opt_sort_order_row'] = ($_POST['opt_sort_order_row'][$i][$J]);
                        $option['product_id'] = $product_id;
                        $option3['option_title'] = ($_POST['ddl_option_title'][$i][$J]);
                        $option3['option_id'] = $custom_options_ID; // nn
                        $option3['input_type'] = 'drop_down';

                        $custom_option_valueAdd = $dbComObj->addData($conn, 'custom_option_value', $option3);
                        // echo '<pre>custom_option_value---';  print_r($option3);
                    }
                }
            } else {
                $dbComObj->deleteData($conn, 'custom_options', "`product_id` = '" . $product_id . "'");   // delete data
                $dbComObj->deleteData($conn, 'custom_option_value', "`product_id` = '" . $product_id . "'");   // delete data  
            }
            //  die;
            //configure_option 
            if (isset($requestData['configure_option'])) {
                $count_field = count($requestData['configure_option']);
                $dbComObj->deleteData($conn, 'configure_attribute_option', "`product_id` = '" . $_POST['session_uid'] . "'");   // delete data   
                for ($J = 0; $J < $count_field; $J++) {

                    $option['product_id'] = $_POST['session_uid'];
                    $option['associated_product_id'] = ($_POST['associated_product_id'][$J]);
                    $option['attribute_id'] = ($_POST['configure_attribute_id'][$J]);
                    $option['attribute_name'] = ($_POST['configure_attribute_name'][$J]);
                    $option['option_name'] = ($_POST['configure_option'][$J]);
                    $option['price'] = ($_POST['configure_option_price'][$J]);
                    $option['price_type'] = ($_POST['configure_price_type'][$J]);

                    //print_r($option);
                    $custom_option_valueAdd = $dbComObj->addData($conn, 'configure_attribute_option', $option);
                    // echo '<pre>';  echo 'option3----'; print_r($option3);
                }
            }
            // die;
            //GsellerID
            if (isset($_POST['GsellerID']) && $_POST['GsellerID']) {
                $GsellerID = $_POST['GsellerID'];
                echo "Redirect : Products updated successfully. URL " . $path_url . "seller/?session_uid=$GsellerID#tabproducts";
            } else {
                echo "Redirect : Products updated successfully. URL " . $path_url . "products/";
            }
           
        } else {
            echo "Error : products not updated.";
        }
    } else {
        echo "Error : $ser_error_name";
    }
}
if ($mode == "addsaveSecondStep") {

    //echo '<pre>'; print_r($_POST);
    $condition = " `product_id` = '" . $_POST['session_uid'] . "'";
    $data = array();
    if (isset($_POST['associated_check_list']))
        $data['associated_check_list'] = implode(",", $_POST['associated_check_list']);
    if (isset($_POST['attribute_opt_value'])) {
        $json_attribute_value = json_encode($_POST['attribute_opt_value'], true);
        $data['attribute_opt_value'] = $json_attribute_value;
    }

//    print_r($data); die;
    if ($data) {
        //  print_r($data); die;
        $dbComObj->editData($conn, $table, $data, $condition);
//       echo 'attribute set added successfully';
    } else {
        echo "Nothing to update ";
        die;
    }

    //configure_option  
    if (isset($requestData['configure_option'])) {
        $count_field = count($requestData['configure_option']);
        $dbComObj->deleteData($conn, 'configure_attribute_option', "`product_id` = '" . $_POST['session_uid'] . "'");   // delete data   
        for ($J = 0; $J < $count_field; $J++) {

            $option['product_id'] = $_POST['session_uid'];
            $option['associated_product_id'] = ($_POST['associated_product_id'][$J]);
            $option['attribute_id'] = ($_POST['configure_attribute_id'][$J]);
            $option['attribute_name'] = ($_POST['configure_attribute_name'][$J]);
            $option['option_name'] = ($_POST['configure_option'][$J]);
            $option['price'] = ($_POST['configure_option_price'][$J]);
            $option['price_type'] = ($_POST['configure_price_type'][$J]);

            //$dbComObj->deleteData($conn,'configure_attribute_option',"`option_id` = '".$custom_options_ID."'");   // delete data
            //print_r($option);
            $custom_option_valueAdd = $dbComObj->addData($conn, 'configure_attribute_option', $option);
            // echo '<pre>';  echo 'option3----'; print_r($option3);
        }
    }
    // die;
    echo "Redirect : Products save successfully. URL " . $redirect_url . "products/";
}

if ($mode == 'deleteProduct') {
    //$dbComObj->deleteData($conn,$table,"`product_id` = '".$_POST['a']."'");
    $data['delete'] = '1';
    $condition = "`product_id` = '" . $_POST['a'] . "'";
    $dbComObj->editData($conn, $table, $data, $condition);
}

if ($mode == 'get_attribute') {
    // echo 'aaaaaa'; die;
    $id = $_POST['id'];
    if ($id) {
        $condition1 = "1 and id=" . $id . "  order by id";
        $result1 = $dbComObj->viewData($conn, "attribute_set", "*", $condition1);
        $num1 = $dbComObj->num_rows($result1);
        $data1 = $dbComObj->fetch_assoc($result1);
        $assign_attributes = $data1['assign_attributes'];
        if ($assign_attributes) {
            $condition = "1 and id in (" . $assign_attributes . ") and  status='1' and `delete`='0' order by name";
            $result = $dbComObj->viewData($conn, "attribute", "*", $condition);
            $num = $dbComObj->num_rows($result);
            if ($num > 0) {
                while ($data = $dbComObj->fetch_assoc($result)) {
                    ?>
                    <label class="checkbox-inline"><input  name="attribute_arr[]" required type="checkbox" value="<?php echo $data['id'] ?>"><?php echo $data['name']; ?></label>

                    <?php
                }
            }
        }
    }
}

if ($mode == 'statusProduct') {
    if ($_POST['b'] == '1') {
        $a['status'] = '0';
    } else {
        $a['status'] = '1';
    }
    $dbComObj->editData($conn, $table, $a, "`product_id` = '" . $_POST['a'] . "'");
}
if ($mode == 'ImportCsv') {

    $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
    if (!empty($_FILES['csv']['name']) && in_array($_FILES['csv']['type'], $csvMimes)) {
        if (is_uploaded_file($_FILES['csv']['tmp_name'])) {
            $csvFile = fopen($_FILES['csv']['tmp_name'], 'r');
            fgetcsv($csvFile);
            $already_exit_arr = array();
            $int_counter = 0;
            $upt_counter = 0;
            while (($line = fgetcsv($csvFile)) !== FALSE) {

                // print_r($line); die;
                //check whether member already exists in database with same email
                $condition = " `SKU` = '" . $line[3] . "'";
                $result = $dbComObj->viewData($conn, $table, "*", $condition);
                $num = $dbComObj->num_rows($result);
                $slug = $njGenObj->removeSpecialChar($line[0]);
                $uniqid = uniqid();

                if ($line[3]) {
                    $SKU = $line[4];
                } else {
                    $SKU = 'MPJ-' . $uniqid;
                }
                $data['product_name'] = $line[0];
                $data['slug'] = $slug;
                $data['product_description'] = base64_encode($line[1]);
                $data['product_type'] = $line[2];
                $data['SKU'] = $SKU;
                $data['Brand'] = ($line[4]);
                $data['category_id'] = ($line[5]);
                $data['unit_weight'] = ($line[6]);
                $data['price'] = ($line[7]);
                /// n others fileds st///////
                $data['inv_qty'] = ($line[8]);
                $data['min_sale_qty'] = ($line[9]);
                $data['max_sale_qty'] = ($line[10]);
                //  $data['inventory_min_qty'] =($line[11]);
                $data['is_in_stock'] = ($line[12]);
                $data['related_check_list'] = ($line[13]);
                $data['associated_check_list'] = ($line[14]);
                $data['meta_title'] = ($line[15]);
                $data['meta_keyword'] = ($line[16]);
                $data['meta_description'] = ($line[17]);
                /// diamond and stone details
                $data['measurement_size'] = ($line[18]);
                $data['product_metal'] = ($line[19]);
                $data['Material'] = ($line[20]);
                $data['stone'] = ($line[21]);
                $data['no_of_stone'] = ($line[22]);
                $data['stone_setting'] = ($line[23]);
                $data['stone_color'] = ($line[24]);
                $data['stone_clarity'] = ($line[25]);
                $data['stone_shape'] = ($line[26]);
                $data['carat'] = ($line[27]);
                $data['stone_description'] = base64_encode(($line[28]));
                $data['added_on'] = date("Y-m-d H:i:s");
                $data['added_user_type'] = $user_type;
                $data['added_by'] = $ss_user_id;
                $data['method'] = 'csv';
                 if (isset($_SESSION['DH_seller_id']) && $_SESSION['DH_seller_id']) {
                $data['seller_id'] = ($_SESSION['DH_seller_id']);
            }
                $data['status'] = '1';
                if ($num > 0) {
                    //update products data

                    $already_exit_arr[] = $line[3];
                    //    $dbComObj->editData($conn,$table,$data,$condition);
                    $upt_counter++;
                } else {

                    $dbComObj->addData($conn, $table, $data);
                    $product_id = $dbComObj->insert_id($conn);
                    //   echo "Redirect : Products created successfully. URL ".$path_url."products/";
                    $int_counter++;
                }
            }
            if ($already_exit_arr) {

                //  echo '$already_exit_arr-----'; print_r($already_exit_arr);
                $already_exit_product = implode(", ", $already_exit_arr);
                echo 'Error : Product SKU (' . $already_exit_product . ')  is already exits. Please try again with diffrent product <br>';
            } else {
                $qstring = '?status=succ';
                echo 'Reload: Total(<b id="int_counter">' . $int_counter . '</b>) Products data has been inserted  successfully.';
            }


            fclose($csvFile);
            echo 'Reload: Total(<b id="int_counter">' . $int_counter . '</b>) Products data has been inserted  successfully.';
            // echo "Redirect : Other User added successfully. URL ".BASE_URL."UsersList/boysList.php";
        } else {
            echo "Error : File Format not supported. Please check your file and upload again.";
        }
    } else {
        echo "Error : Invalid file Type. Please Upload Csv File.";
    }
}
if ($mode == "QUickSimpleNewProduct") {

    // echo '<pre>'; print_r($_POST); 
    //echo  json_encode($_POST['attribute_opt_value']);
    if (isset($_POST['attribute_opt_value'])) {

        $attribute_m_array = $_POST['attribute_opt_value'];
        $value_suffix = array();
        foreach ($attribute_m_array as $value) {
            $value_suffix[] = trim($value);
        }
        $value_suffix = implode("-", $value_suffix);
        $product_name = $_POST['product_name'] . '-' . $value_suffix;
        $SKU = $_POST['SKU'] . '-' . $value_suffix;
    } else {
        $product_name = $_POST['product_name'];
        $SKU = $_POST['SKU'];
    }
    $uniqid = uniqid();
    $condition = " `SKU` = '" . $SKU . "'";
    $result = $dbComObj->viewData($conn, $table, "*", $condition);
    $num = $dbComObj->num_rows($result);
    if ($num == 0) {

        $dates = date("Y-m-d-H-i-s");
        $data = array();

        $slug = $njGenObj->removeSpecialChar($_POST['product_name']);

        $data['product_name'] = $product_name;
        $data['SKU'] = $SKU;
        $data['slug'] = $slug;
        $data['product_description'] = base64_encode($_POST['product_description']);
        $data['attribute_opt_value'] = json_encode($_POST['attribute_opt_value'], true);
        $data['unit_weight'] = ($_POST['unit_weight']);
        $data['price'] = ($_POST['price']);
        /// n others fileds st///////
        $data['inv_qty'] = ($_POST['inv_qty']);
        $data['inventory_min_qty'] = ($_POST['inventory_min_qty']);
        $data['is_in_stock'] = ($_POST['is_in_stock']);

        //// db f st hidden 
        $data['product_type'] = 'simple';
        $data['attribute_set_id'] = $_POST['attribute_set_id'];
        $data['Brand'] = ($_POST['Brand']);
        if (isset($_POST['category_id']))
            $data['category_id'] = $_POST['category_id'];

        $data['product_metal'] = ($_POST['product_metal']);

        $data['added_on'] = date("Y-m-d H:i:s");
        $data['added_user_type'] = $user_type;
        $data['added_by'] = $ss_user_id;
        $data['status'] = '1';

        $dbComObj->addData($conn, $table, $data);
        $product_id = $dbComObj->insert_id($conn);
        /// image upload
        $image_data = array();
        $file = $_FILES['product_images'];
        $product_images = $file ['name'];
        foreach ($product_images as $key => $value) {
            $tmppath = $file['tmp_name'][$key];
            if ($tmppath != '') {
                $names = explode('.', $value);
                $pname = preg_replace('/[^a-zA-Z0-9_]/', '-', $_POST['product_name']);
                $value = $pname . '-' . $dates . ' _ ' . $value;
                $path = "../images/products/" . $value;
                move_uploaded_file($tmppath, $path);
                $image_source = "../images/products/" . $value;
                $thumbPathToSave = "../images/products/thumb/";
                $thumb_logo = $njFileObj->resizeImage($image_source, $value, $thumbPathToSave);
                $image_data['product_id'] = $product_id;
                $image_data['thumb_image'] = $thumb_logo;
                $image_data['image'] = $value;
                $image_data['added_on'] = date("Y-m-d H:i:s");
                $image_data['added_user_type'] = $user_type;
                $image_data['added_by'] = $ss_user_id;
                $image_data['status'] = '1';
                $product_imageAdd = $dbComObj->addData($conn, 'product_image', $image_data);
            }
        }
        //  die;
        echo "Reload : Product added successfully.";
    } else {
        echo "Error : product SKU already registered. Please try again with diffrent SKU.";
    }
}
if ($mode == 'deleteProductImage') {
    $condition = "`id` = '" . $_POST['a'] . "'";
    $result = $dbComObj->viewData($conn, "product_image", "*", $condition);
    $num = $dbComObj->num_rows($result);
    $data = $dbComObj->fetch_assoc($result);
    $image = $data['image'];
    $thumb_image = $data['thumb_image'];
    //$dbComObj->deleteData($conn,$table,"`product_id` = '".$_POST['a']."'");
    $res = $dbComObj->deleteData($conn, "product_image", $condition);
    if ($res) {
        $image_source = "../images/products/";
        $thumbPathToSave = "../images/products/thumb/";
        unlink($image_source . $image);
        unlink($thumbPathToSave . $thumb_image);

        echo 'product delete successfully';
    }
}

 
