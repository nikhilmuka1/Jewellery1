<?php
include '../../page_fragment/define.php'; 
include '../../page_fragment/topScript.php';
$njFileObj = new njFile();
$operation = "";
if (isset($_POST['todo'])) {
    $operation = base64_decode($_POST['todo']);
    unset($_POST['todo']);
} elseif (isset($_GET['todo'])) {
    $operation = base64_decode($_GET['todo']);
    unset($_GET['todo']);
}
$table = "category";
if ($operation == "addCategory") {
    $condition = " `name`='" . $_POST['name'] . "'";
    $result = $dbComObj->viewData($conn,$table, "*", $condition);
    $num = $dbComObj->num_rows($result);
    if ($num == 0) {
        $image = $_FILES['image'];
        $dates = date("Y-m-d-H-i-s");
        $data = array();
        // $conditions = " `id`='".$_SESSION['vendor_id']."'";
        if (isset($_FILES['image']['name']) && !empty($_FILES['image']['name'])) {
            $image = $_FILES['image'];
            $name = preg_replace('/[^a-zA-Z0-9_]/', '-', $_POST['name']);
            $filename = $name . "-" . $dates;
            $pathToSave = "../../images/category/";
            $thumbPathToSave = "../../images/category/thumb/";
            $main_logo = $njFileObj->uploadImage($image, $filename, $pathToSave);
            $image_source = "../../images/category/" . $main_logo;
            $thumb_logo = $njFileObj->resizeImage($image_source, $filename, $thumbPathToSave);
            $data['image'] = $main_logo;
        }
        $slug = $njGenObj->removeSpecialChar($_POST['name']);
        $data['name'] = $_POST['name'];
        $data['parent_id'] = $_POST['parent'];
        $data['slug'] = $slug;
        $data['added_on'] = date("Y-m-d H:i:s");
        $data['added_by'] = $_SESSION['DH_seller_id'];
        $data['updated_by'] = $_SESSION['DH_seller_id'];
        $data['updated_on'] = date("Y-m-d H:i:s");
        $dbComObj->addData($conn,$table, $data);
        echo "Reload : Category added successfully.";
    } else {
        echo "Error : Category already exist.";
    }
} elseif ($operation == "editCategory") {
    $condition = " `id`!=" . base64_decode($_POST['id']) . " and  `name`='" . $_POST['name'] . "'";
    $result = $dbComObj->viewData($conn,$table, "*", $condition);
    $num = $dbComObj->num_rows($result);
    if ($num == 0) {
        $data = array();
        $dates = date("Y-m-d-H-i-s");
        if (isset($_FILES['image']['name']) && !empty($_FILES['image']['name'])) {
            $image = $_FILES['image'];
            $name = preg_replace('/[^a-zA-Z0-9_]/', '-', $_POST['name']);
            $filename = $name . "-" . $dates;
            $pathToSave = "../../images/category/";
            $thumbPathToSave = "../../images/category/thumb/";
            $main_logo = $njFileObj->uploadImage($image, $filename, $pathToSave);
            $image_source = "../../images/category/" . $main_logo;
            $thumb_logo = $njFileObj->resizeImage($image_source, $filename, $thumbPathToSave);
            $data['image'] = $main_logo;
        }
         $slug = $njGenObj->removeSpecialChar($_POST['name']);
        $data['name'] = $_POST['name'];
        $data['parent_id'] = $_POST['parent'];
        $data['slug'] = $slug;
        $data['updated_by'] = $_SESSION['DH_seller_id'];
        $data['updated_on'] = date("Y-m-d H:i:s");
        $conditions = " `id`='" . base64_decode($_POST['id']) . "'";
        unset($_POST['id']);
        $dbComObj->editData($conn,$table, $data, $conditions);
        echo "Reload : Category updated successfully.";
    } else {
        echo "Error : Category already exist.";
    }
} 
if($operation == 'deleteCategory')
{
    $dbComObj->deleteData($conn,$table,"`id` = '".$_POST['a']."'");
}

if($operation == 'statusCategory')
{
    if($_POST['b'] == '1'){$a['status'] = '0';}else{$a['status'] = '1';}
    $dbComObj->editData($conn,$table,$a,"`id` = '".$_POST['a']."'");
}
