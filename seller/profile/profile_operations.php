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
$table = "users";
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
            if ($_POST['newpassword'] == $_POST['confirmnewpassword']) {
                $data['password'] = $_POST['confirmnewpassword'];
                $conditions = " `id`='" . $_POST['id'] . "'";
                unset($data['id']);
                $data['md5_password'] = md5($_POST['passwd']);
                $dbComObj->editData($conn, "users", $data, $condition);
                echo "Redirect : Password changed successfully. URL " . SELLER_URL . "dashboard/";
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
                    echo "Redirect : Password changed successfully. URL " . SELLER_URL . "dashboard/";
                }
            }
        }
    } else {
        echo "Error : Password doesn't Changed.";
    }
} elseif ($operation == "editprofile") {
    if ($_POST['email'] != $_SESSION['seller_email']) {
        $condition = " `email` = '" . $_POST['email'] . "'";
        $result = $dbComObj->viewData($conn, $table, "*", $condition);
        $num = $dbComObj->num_rows($result);
        if ($num > 0) {
            $error = 1;
        } else {
            $error = 0;
        }
    } else {
        $error = 0;
    }

    if ($error == 0) {
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
//     city`, `state`, `country`, `password`, `address`, `shop_name`, `discripation`, `shop_heading`,
            $data['name'] = $_POST['name'];
            $data['email'] = $_POST['email'];
            $data['contact_no'] = $_POST['contact_no'];
            $data['city'] = $_POST['city'];
            $data['state'] = $_POST['state'];
            $data['country'] = $_POST['country'];
            $data['address'] = $_POST['address'];
            $data['aboutme'] = base64_encode($_POST['aboutme']);
            $data['added_by'] = $_SESSION['DH_seller_id'];
            $conditions = " `id`='" . $_POST['id'] . "'";
            unset($_POST['id']);
            $dbComObj->editData($conn, $table, $data, $conditions);
// die;
            echo "Reload : Profile updated successfully.";
        } else {
            echo "Error : Profile doesn't updated .";
        }
    } else {
        echo "Error : Email-id already registered.";
    }
} elseif ($operation == "editshop") {

    $condition = " `id`= '" . $_POST['id'] . "'";
    $result = $dbComObj->viewData($conn, $table, "*", $condition);
    $num = $dbComObj->num_rows($result);
    if ($num > 0) {
        $data = array();
        $dates = date("Y-m-d-H-i-s");
        if (isset($_FILES['cover_image']['name']) && !empty($_FILES['cover_image']['name'])) {
            $image1 = $_FILES['cover_image'];
            $name1 = preg_replace('/[^a-zA-Z0-9_]/', '-', $_POST['name']);
            $filename1 = $name1 . "-" . $dates;
            $pathToSave1 = "../../images/user/cover/";
            $thumbPathToSave1 = "../../images/user/cover/thumb/";
            $main_logo1 = $srFileObj->uploadImage($image1, $filename1, $pathToSave1);
            $image_source1 = "../../images/user/cover/" . $main_logo1;
            $thumb_logo = $srFileObj->resizeImage($image_source1, $filename1, $thumbPathToSave1);
            $data['cover_image'] = $main_logo1;
        }
        if (isset($_FILES['shop_image']['name']) && !empty($_FILES['shop_image']['name'])) {
            $image2 = $_FILES['shop_image'];
            $name2 = preg_replace('/[^a-zA-Z0-9_]/', '-', $_POST['name']);
            $filename2 = $name2 . "-" . $dates;
            $pathToSave2 = "../../images/user/shop/";
            $thumbPathToSave2 = "../../images/user/shop/thumb/";
            $main_logo2 = $srFileObj->uploadImage($image2, $filename2, $pathToSave2);
            $image_source2 = "../../images/user/shop/" . $main_logo2;
            $thumb_logo = $srFileObj->resizeImage($image_source2, $filename2, $thumbPathToSave2);
            $data['shop_image'] = $main_logo2;
        }

        $data['facebook'] = $_POST['facebook'];
        $data['googleplus'] = ($_POST['googleplus']);
        $data['twitter'] = $_POST['twitter'];
        $data['pinrest'] = $_POST['pinrest'];

        $data['shop_name'] = $_POST['shop_name'];
        $data['discripation'] = ($_POST['discripation']);
        $data['shop_heading'] = $_POST['shop_heading'];
        $data['shop_contact'] = $_POST['shop_contact'];
        $data['added_by'] = $_SESSION['DH_seller_id'];
        $conditions = " `id`='" . $_POST['id'] . "'";
        unset($_POST['id']);
        $dbComObj->editData($conn, $table, $data, $conditions);
// die;
        echo "Reload : Shop  updated successfully.";
    } else {
        echo "Error : shop doesn't updated .";
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

    $yourURL = SELLER_URL . 'shipping-and-return/?msg=' . $msg;
    echo ("<script>location.href='$yourURL'</script>");

//  echo ""
// location.href = "http://www.cnn.com";
}
