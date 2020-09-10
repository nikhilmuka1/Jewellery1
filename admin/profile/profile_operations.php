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
$table = "admin";
//echo $operation;
if ($operation == "changepass") {
    $condition = " `id`='" . $_POST['id'] . "'";
    $result = $dbComObj->viewData($conn, $table, "*", $condition);
    $num = $dbComObj->num_rows($result);
    if ($num > 0) {
        $row = $dbComObj->fetch_assoc($result);
        //echo md5($_POST['old_password'])." == ".$row['password'];
        $temp_login = $_POST['temp_login'];
        if ($temp_login != "" || $temp_login == 1) {
            if ($_POST['old_password'] != $row['password']) {
                echo "Error : You entered an incorrect password";
            } else if ($_POST['newpassword'] == $_POST['confirmnewpassword']) {
                $data = array();
                $dates = date("Y-m-d-H-i-s");
                $data['password'] = $_POST['confirmnewpassword'];
                $conditions = " `id`='" . $_POST['id'] . "'";
                unset($data['id']);
                $dbComObj->editData($conn, $table, $data, $conditions);
                echo "Success : Password changed successfully.";
            }
        } else {
            if ($_POST['old_password'] != $row['password']) {
                echo "Error : You entered an incorrect password";
            } else {
                if ($_POST['newpassword'] == $_POST['confirmnewpassword']) {
                    $data = array();
                    $dates = date("Y-m-d-H-i-s");
                     $data['password'] = $_POST['confirmnewpassword'];
                    $conditions = " `id`='" . $_POST['id'] . "'";
                    unset($data['id']);
                    $dbComObj->editData($conn, $table, $data, $conditions);
                    echo "Redirect : Password changed successfully. URL " . ADMIN_URL . "dashboard/";
//                    $redirect_page = SELLER_URL . "dashboard/";
                }
            }
        }
    } else {
        echo "Error : Password doesn't Changed.";
    }
} elseif ($operation == "editprofile") {
    $condition = " `id`= '" . $_POST['id'] . "'";
    $result = $dbComObj->viewData($conn, $table, "*", $condition);
    $num = $dbComObj->num_rows($result);
    if ($num > 0) {
        $data = array();
        $dates = date("Y-m-d-H-i-s");
        if (isset($_FILES['image']['name']) && !empty($_FILES['image']['name'])) {
            $image = $_FILES['image'];
            $name = preg_replace('/[^a-zA-Z0-9_]/', '-', $_POST['name']);
            $filename = $name . "-" . $dates;
            $pathToSave = "../../images/user/";
            $thumbPathToSave = "../../images/user/thumb/";
            $main_logo = $srFileObj->uploadImage($image, $filename, $pathToSave);
            $image_source = "../../images/user/" . $main_logo;
            $thumb_logo = $srFileObj->resizeImage($image_source, $filename, $thumbPathToSave);
            $data['image'] = $main_logo;
        }

        $data['name'] = $_POST['name'];
        $data['email'] = $_POST['email'];
        $data['mobile'] = $_POST['mobile'];

        $data['facebook'] = $_POST['facebook'];
        $data['googleplus'] = ($_POST['googleplus']);
        $data['twitter'] = $_POST['twitter'];
        $data['pinrest'] = $_POST['pinterest'];

        $data['added_by'] = $_SESSION['DH_admin_id'];
        $conditions = " `id`='" . $_POST['id'] . "'";
        unset($_POST['id']);
        $dbComObj->editData($conn, $table, $data, $conditions);
        echo "Reload : Profile updated successfully.";
    } else {
        echo "Error : Profile doesn't updated .";
    }
} elseif ($operation == "editPolicy") {
    // print_r($_POST);
    $condition = " `id`= '" . $_POST['id'] . "'";
    $result = $dbComObj->viewData($conn, $table, "*", $condition);
    $num = $dbComObj->num_rows($result);
    if ($num > 0) {
        $data = array();
        $dates = date("Y-m-d-H-i-s");
        $data['shop_policy'] = base64_encode($_POST['shop_policy']);
        $data['payment_policy'] = base64_encode($_POST['payment_policy']);
        $data['shipping_return_policy'] = base64_encode($_POST['shipping_return_policy']);
        $conditions = " `id`='" . $_POST['id'] . "'";
        unset($_POST['id']);
        $dbComObj->editData($conn, $table, $data, $conditions);

        "Reload : Profile updated successfully.";
        $msg = 'success';
    } else {
        "Error : Profile doesn't updated .";
        $msg = 'error';
    }

    $yourURL = ADMIN_URL . 'shipping-and-return/?msg=' . $msg;
    echo ("<script>location.href='$yourURL'</script>");

    //  echo ""
    // location.href = "http://www.cnn.com";
}

