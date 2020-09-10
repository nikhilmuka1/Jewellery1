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
$table = "`orders`";

if($operation == 'deleteOrder')
{
    $dbComObj->deleteData($conn,$table,"`id` = '".$_POST['a']."'");
}

if($operation == 'OrderStatus')
{
    $a['order_status'] = $_POST['val'];
    $dbComObj->editData($conn,$table,$a,"`id` = '".$_POST['a']."'");   
}
if($operation == 'trackOrder')
{
  //  print_r($_POST);
    $a['tracking_id'] = $_POST['tracking_no'];
    $a['courier_company'] = $_POST['courier_company'];
    $a['comments'] = $_POST['comment'];
    $id= base64_decode($_POST['id']);
   $res = $dbComObj->editData($conn,$table,$a,"`id` = '".$id."'");
   if($res){
         echo "Success : Track Order updated successfully.";
   }else {
        echo "Error : Track Order Not updated successfully.";
   }
   
}
