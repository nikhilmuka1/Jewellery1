<?php

include '../../page_fragment/define.php';
include '../../page_fragment/topScript.php';
$srFileObj = new njFile();
$operation = "";
//mysqli_real_escape_string($con, $_POST[]);
if (isset($_POST['todo'])) {
    $operation = base64_decode($_POST['todo']);
    unset($_POST['todo']);
} elseif (isset($_GET['todo'])) {
    $operation = base64_decode($_GET['todo']);
    unset($_GET['todo']);
}
$table = "admin_setting";
//echo $operation;
//print_r($_POST);
if ($operation == "editSetting") {
    $data = array();
    $data['shipping_chage'] = $_POST['shipping_chage'];
    $data['currency'] = $_POST['currency'];
    $data['updated_on'] = date("Y-m-d H:i:s");
    $result = $dbComObj->viewData($conn, $table, "*", 1);
    $rowS = $dbComObj->fetch_assoc($result);
    $setting_id = $rowS['id'];
    $num = $dbComObj->num_rows($result);
    if ($num > 0) {

        $conditions = " `id`='" . $setting_id . "'";
        unset($_POST['id']);
        $dbComObj->editData($conn, $table, $data, $conditions);
        echo "Reload : Setting saved successfully.";
    } else {
        $dbComObj->addData($conn, $table, $data);
        echo "Error : Setting doesn't saved .";
    }
}

