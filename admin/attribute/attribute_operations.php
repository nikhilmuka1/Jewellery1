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
$table = "attribute";
if ($operation == "addAttribute") {
    $condition = " `name`='" . $_POST['name'] . "' and `delete`='0' ";
    $result = $dbComObj->viewData($conn,$table, "*", $condition);
    $num = $dbComObj->num_rows($result);
    if ($num == 0) {
        $data = array();
        // $conditions = " `id`='".$_SESSION['vendor_id']."'";
           // print_r($_POST);
        $data['name'] = $_POST['name'];
        $data['input_type'] =$_POST['input_type'];
        $data['added_on'] = date("Y-m-d H:i:s");
        $data['added_by'] = $_SESSION['DH_admin_id'];
        $data['status'] = 1;
        $data['attribute_option'] =implode(",",array_unique($_POST['attribute_option']));
        $dbComObj->addData($conn,$table, $data);
        $attribute_id = $dbComObj->insert_id($conn);
       
        echo "Reload : Attribute added successfully.";
    } else {
        echo "Error : Attribute already exist.";
    }
} elseif ($operation == "editAttribute") {
//print_r($_POST); die;
    $condition = " `id`!=" . base64_decode($_POST['id']) . " and  `name`='" . $_POST['name'] . "' and `delete`='0'";
     $attr_id= base64_decode($_POST['id']);
    $result = $dbComObj->viewData($conn,$table, "*", $condition);
    $num = $dbComObj->num_rows($result);
    if ($num == 0) {
        $data = array();
        $dates = date("Y-m-d-H-i-s");
    
        $data['name'] = $_POST['name'];
        $data['input_type'] =$_POST['input_type'];
        $data['attribute_option'] =implode(",",array_unique($_POST['attribute_option']));
        $data['updated_by'] = $_SESSION['DH_admin_id'];
        $data['updated_on'] = date("Y-m-d H:i:s");
        $conditions = " `id`='" . base64_decode($_POST['id']) . "'";
        unset($_POST['id']);
        $dbComObj->editData($conn,$table, $data, $conditions);
            //  die;
        echo "Redirect : Attribute updated successfully. URL ".ADMIN_PATH."attributes/";
      //  echo "Reload : Attribute updated successfully.";

    } else {
        echo "Error : Attribute already exist.";
    }
} 
if($operation == 'deleteAttribute')
{
    //$dbComObj->deleteData($conn,$table,"`id` = '".$_POST['a']."'");
    
      $data['delete'] = '1';
     $condition ="`id` = '".$_POST['a']."'";
     $dbComObj->editData($conn,$table,$data,$condition);
}

if($operation == 'statusAttribute')
{
    if($_POST['b'] == '1'){$a['status'] = '0';}else{$a['status'] = '1';}
    $dbComObj->editData($conn,$table,$a,"`id` = '".$_POST['a']."'");
}
