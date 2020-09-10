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
$table = "attribute_set";
if ($operation == "addAttributeSet") {
    $condition = " `name`='" . $_POST['name'] . "'";
    $result = $dbComObj->viewData($conn,$table, "*", $condition);
    $num = $dbComObj->num_rows($result);
    if ($num == 0) {
        $data = array();
        // $conditions = " `id`='".$_SESSION['vendor_id']."'";
        //   print_r($_POST);
        $data['name'] = $_POST['name'];
        $assign_attributes= implode(",",$_POST['assign_attributes'])  ;   
        $data['assign_attributes'] =$assign_attributes;
        $data['added_on'] = date("Y-m-d H:i:s");
        $data['added_by'] = $_SESSION['DH_admin_id'];
        $data['status'] = 1;
        $dbComObj->addData($conn,$table, $data);
        $attribute_id = $dbComObj->insert_id($conn);

             if(isset($_POST['assign_attributes']) && $_POST['assign_attributes']) {
                         
                  $assign_attributes= $_POST['assign_attributes'];   
                  $count_field= count($assign_attributes);
                    for ($ij = 0; $ij < $count_field; $ij++) { 

                         $conditions_asgn = " `id`='" . $assign_attributes[$ij] . "'";  
                        $assign['attribute_set_id'] = $attribute_id;                 
                        $dbComObj->editData($conn,'attribute', $assign, $conditions_asgn);
                     
                    }          
            }
      
       // die;
        echo "Reload : Attribute set added successfully.";
    } else {
        echo "Error : Attribute set already exist.";
    }
} elseif ($operation == "editAttributeSet") {
    $condition = " `id`!=" . base64_decode($_POST['id']) . " and  `name`='" . $_POST['name'] . "'";
     $attr_id= base64_decode($_POST['id']);
    $result = $dbComObj->viewData($conn,$table, "*", $condition);
    $num = $dbComObj->num_rows($result);
    if ($num == 0) {
        $data = array();
        $dates = date("Y-m-d-H-i-s");
    
        $data['name'] = $_POST['name'];
        $assign_attributes= implode(",",$_POST['assign_attributes'])  ;   
        $data['assign_attributes'] =$assign_attributes;
        $data['updated_by'] = $_SESSION['DH_admin_id'];
        $data['updated_on'] = date("Y-m-d H:i:s");
        $conditions = " `id`='" . base64_decode($_POST['id']) . "'";
         if(isset($_POST['assign_attributes']) && $_POST['assign_attributes']) {
                         
                  $assign_attributes= $_POST['assign_attributes'];   
                  $count_field= count($assign_attributes);
                    for ($ij = 0; $ij < $count_field; $ij++) { 

                         $conditions_asgn = " `id`='" . $assign_attributes[$ij] . "'";  
                        $assign['attribute_set_id'] = $attr_id;                 
                        $dbComObj->editData($conn,'attribute', $assign, $conditions_asgn);
                     
                    }          
            }
      
        unset($_POST['id']);
        $dbComObj->editData($conn,$table, $data, $conditions);
       //die;
       // echo "Reload : Attribute Set updated successfully.";
         echo "Redirect : Attribute  Set updated successfully. URL ".ADMIN_PATH."attributes-set/";
    } else {
        echo "Error : Attribute Set already exist.";
    }
} 
if($operation == 'deleteAttributeSet')
{
    //$dbComObj->deleteData($conn,$table,"`id` = '".$_POST['a']."'");
    
      $data['delete'] = '1';
     $condition ="`id` = '".$_POST['a']."'";
     $dbComObj->editData($conn,$table,$data,$condition);
}

if($operation == 'statusAttributeSet')
{
    if($_POST['b'] == '1'){$a['status'] = '0';}else{$a['status'] = '1';}
    $dbComObj->editData($conn,$table,$a,"`id` = '".$_POST['a']."'");
}
