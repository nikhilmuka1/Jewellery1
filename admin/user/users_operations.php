<?php
include '../../page_fragment/define.php';
include '../../page_fragment/topScript.php';
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
$table = "users";
if ($mode == "addNewUser") {
    // print_r($_POST);
    //die;
    if ($_POST['password'] !== $_POST['C_password']) {
        echo "Error : Password not match to confirm password.";
    } else {
        $uniqid = uniqid();
        $condition = " `email` = '" . $_POST['email'] . "'";
        $result = $dbComObj->viewData($conn, $table, "*", $condition);
        $num = $dbComObj->num_rows($result);
        if ($num == 0) {

            $dates = date("Y-m-d-H-i-s");
            $data = array();
            if (isset($_FILES['image']['name']) && !empty($_FILES['image']['name'])) {
                $image = $_FILES['image'];
                $name = preg_replace('/[^a-zA-Z0-9_]/', '-', $_POST['name']);
                $filename = $name . "-" . $dates;
                $pathToSave = "../../images/user/";
                $thumbPathToSave = "../../images/user/thumb/";
                $main_logo = $njFileObj->uploadImage($image, $filename, $pathToSave);
                $image_source = "../../images/user/" . $main_logo;
                $thumb_logo = $njFileObj->resizeImage($image_source, $filename, $thumbPathToSave);
                $data['image'] = $main_logo;
            }
            $slug = $njGenObj->removeSpecialChar($_POST['name']);



//Here you specify how many characters the returning string must have 
            $temp_password = GeraHash(6);

            $data['name'] = $_POST['name'];
            $data['slug'] = $slug;
            $data['email'] = $_POST['email'];
            $data['roll_type'] = $_POST['roll_type'];
            $data['contact_no'] = $_POST['contact_no'];
            //$data['password'] = md5($_POST['password']);
            $data['added_on'] = date("Y-m-d H:i:s");
            $data['added_by'] = $_SESSION['DH_admin_id'];
            // $data['md5_password'] = md5($_POST['password']);  
            $data['temp_password'] = $temp_password;
            $data['approved'] = 1;


            $data['status'] = '1';

            $dbComObj->addData($conn, $table, $data);
            // echo "Redirect : User Profile created successfully. URL " . ADMIN_PATH . "users/";
            echo "Success : User Profile created successfully.  Temperory Password is -> <b>$temp_password</b> ";
        } else {
            echo "Error : Email-id already registered. Please try again with diffrent email-id.";
        }
    }
}

if ($mode == "manageUsers") {

    //print_r($_POST);

    $condition = " `id` = '" . $_POST['session_uid'] . "'";
    $result = $dbComObj->viewData($conn, $table, "*", $condition);
    $num = $dbComObj->num_rows($result);
    if ($num) {
        $row = $dbComObj->fetch_assoc($result);
        $data = array();
        $data['name'] = $requestData['name'];
        //  $data['email'] = $requestData['email'];
        $data['roll_type'] = $requestData['roll_type'];
        $data['contact_no'] = $requestData['contact_no'];
        $data['updated_on'] = date("Y-m-d H:i:s");
        $data['updated_by'] = $_SESSION['DH_admin_id'];

        if ($_POST['password'] != '' || $_POST['password'] != null) {
            $data['md5_password'] = md5($_POST['password']);
            $data['md5_password'] = $_POST['password'];
        }

        $dates = date("Y-m-d-H-i-s");
        if (isset($_FILES['image']['name']) && !empty($_FILES['image']['name'])) {
            $image = $_FILES['image'];
            $name = preg_replace('/[^a-zA-Z0-9_]/', '-', $_POST['name']);
            $filename = $name . "-" . $dates;
            $pathToSave = "../../images/user/";
            $thumbPathToSave = "../../images/user/thumb/";
            $main_logo = $njFileObj->uploadImage($image, $filename, $pathToSave);
            $image_source = "../../images/user/" . $main_logo;
            $thumb_logo = $njFileObj->resizeImage($image_source, $filename, $thumbPathToSave);
            $data['image'] = $main_logo;
        }
        $dbComObj->editData($conn, $table, $data, $condition);
        if (isset($_POST['type']) && $_POST['type'] == "Seller")
            $type = "sellers";
        else
            $type = "users";
        // echo $type;
        // die;

        echo "Redirect : User Profile updated successfully. URL " . ADMIN_PATH . $type . "/";
    } else {
        echo "Error : User not registered.";
    }
}

if ($mode == 'deleteUsers') {

    $condition = " `id` = '" . $_POST['a'] . "'";
    $result = $dbComObj->viewData($conn, $table, "*", $condition);
    $num = $dbComObj->num_rows($result);
    $row = $dbComObj->fetch_assoc($result);
    $dbComObj->deleteData($conn, $table, "`id` = '" . $_POST['a'] . "'");
    $from = 'Hello Webmaster, User Account Deleted';
    $subject = 'User Account Deleted';
    $femailid = "support@fxpips.co.uk";
    $message = "Hello Webmaster,<br><br>
           <b>Hello  " . $row['name'] . " your account is deleted by admin with E-mail " . $row['email'] . ".</b>";

    $headers = 'From: &marketplace;' . $femailid . '&marketplace;' . "\r\n" .
            'Reply-To: &marketplace;' . $femailid . '&marketplace;' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
    $headers = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers .= 'From: marketplace <' . $femailid . '>' . "\r\n";
//    mail('mmfinfotech1075@gmail.com', $subject, $message, $headers, $from);
    mail('support@fxpips.co.uk', $subject, $message, $headers, $from);
    mail($row['email'], $subject, $message, $headers, $from);
}

if ($mode == 'statusUsers') {
    $condition = " `id` = '" . $_POST['a'] . "'";
    $result = $dbComObj->viewData($conn, $table, "*", $condition);
    $num = $dbComObj->num_rows($result);
    $row = $dbComObj->fetch_assoc($result);
    if ($_POST['b'] == '1') {
        $a['status'] = '0';
        $subject = 'User Account Deactived';
        $message = "Hello Webmaster,<br><br>
           <b>Hello  " . $row['name'] . " your account is Deactived by admin with E-mail id " . $row['email'] . ".</b>";
    } else {
        $a['status'] = '1';
        $subject = 'User Account Activated';
        $message = "Hello Webmaster,<br><br>
           <b>Hello  " . $row['name'] . " your account is Activated by admin with E-mail id " . $row['email'] . ".</b>";
    }
    $dbComObj->editData($conn, $table, $a, "`id` = '" . $_POST['a'] . "'");
    $from = 'Hello Webmaster, User Account Deleted';
   
    $femailid = "support@fxpips.co.uk";
    $headers = 'From: &marketplace;' . $femailid . '&marketplace;' . "\r\n" .
            'Reply-To: &marketplace;' . $femailid . '&marketplace;' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
    $headers = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers .= 'From: marketplace <' . $femailid . '>' . "\r\n";
//    mail('mmfinfotech1075@gmail.com', $subject, $message, $headers, $from);
    mail('support@fxpips.co.uk', $subject, $message, $headers, $from);
    mail($row['email'], $subject, $message, $headers, $from);
}
//approvedUsers  
if ($mode == 'approvedUsers') {
    $condition = " `id` = '" . $_POST['a'] . "'";
    $result = $dbComObj->viewData($conn, $table, "*", $condition);
    $num = $dbComObj->num_rows($result);
    $row = $dbComObj->fetch_assoc($result);
    $message = "";
    if ($_POST['b'] == '1') {
        $a['approved'] = '0';
        $subject = 'User Account Declined';
        $message = "Hello Webmaster,<br><br>
           <b>Hello  " . $row['name'] . " your account is Declined by admin with E-mail id " . $row['email'] . ".</b>";
    } else {
        $a['approved'] = '1';
        $subject = 'User Account Approved';
        $message = "Hello Webmaster,<br><br>
           <b>Hello  " . $row['name'] . " your account is Approved by admin with E-mail id " . $row['email'] . ".</b>";
    }
    $dbComObj->editData($conn, $table, $a, "`id` = '" . $_POST['a'] . "'");
    $from = 'Hello Webmaster, User Account Deleted';
    $femailid = "support@fxpips.co.uk";
    $headers = 'From: &marketplace;' . $femailid . '&marketplace;' . "\r\n" .
            'Reply-To: &marketplace;' . $femailid . '&marketplace;' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
    $headers = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers .= 'From: marketplace <' . $femailid . '>' . "\r\n";
//    mail('mmfinfotech1075@gmail.com', $subject, $message, $headers, $from);
    mail('support@fxpips.co.uk', $subject, $message, $headers, $from);
    mail($row['email'], $subject, $message, $headers, $from);
}

function GeraHash($qtd) {
//Under the string $Caracteres you write all the characters you want to be used to randomly generate the code. 
    $Caracteres = 'ABCDEFGHIJKLMOPQRSTUVXWYZ0123456789';
    $QuantidadeCaracteres = strlen($Caracteres);
    $QuantidadeCaracteres--;

    $Hash = NULL;
    for ($x = 1; $x <= $qtd; $x++) {
        $Posicao = rand(0, $QuantidadeCaracteres);
        $Hash .= substr($Caracteres, $Posicao, 1);
    }

    return $Hash;
}
