<?php
require_once '../page_fragment/define.php';
include ('../page_fragment/dbConnect.php');
include ('../page_fragment/dbGeneral.php');
include ('../page_fragment/njGeneral.php');
include ('../page_fragment/njFile.php');
$dbConObj = new dbConnect();
$dbComObj = new dbGeneral();
$njGenObj = new njGeneral();
$conn = $dbConObj->dbConnect();
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
//echo $mode;
$table = "users";
if ($mode == "login") {
    $username = $_POST['login-email'];
    $password = $_POST['login-password'];
    $rememberMe = $_POST['remember'];
    $uid = 'loggedin';
    $condition = " `email` = '" . $username . "'";
    $result = $dbComObj->viewData($conn, $table, "*", $condition);
    $num = $dbComObj->num_rows($result);
    if ($num) {
        $row = $dbComObj->fetch_assoc($result);
        $pwd = $row['password'];
        $random_password = $row['random_password'];
        if ($pwd == '' || $pwd == "0") {
            $pwd = $row['temp_password'];
            echo "Login with Tempeory password";
            $temp_login = 1;
        } else {
            $temp_login = 0;
        }
//        echo 'temp'. $pwd;
        if ($password == $pwd) {
            if ($row['status'] == 0) {
                echo "Error : User is not allowed to login.";
            } else if ($row['approved'] == 0 && $row['roll_type'] == '2') {
                echo "Error :Not Approved please wait for  Admin apporoal or contact to Admin .";
            } else {
                $data = array();
                $data['today_login'] = date('Y-m-d H:i:s');
                $data['pre_login'] = $row['today_login'];
               
                if ($row['roll_type'] == '1') {
                    $njT = 'Buyer';
                    $_SESSION['user_id'] = $row['id'];
                    $_SESSION['user_name'] = $row['name'];
                    $_SESSION['user_type'] = $row['name'];
                    $_SESSION['user_type_name'] = $njT;
                     $_SESSION['JM_roll_type'] = $row['roll_type'];
                    $_SESSION['user_image'] = $row['image'];
                    $_SESSION['user_email'] = $row['email'];
                     
                    if ($temp_login == 1) {
                        $redirect_page = BASE_URL . 'user/' . $njGenObj->removeSpecialChar($row['name']) . '/change-password/?temp_login=1';
                    } else {
                        $redirect_page = BASE_URL;
                    }
                    
                } else if ($row['roll_type'] == '2') {
                    $njT = 'Seller';
                    $_SESSION['DH_seller_id'] = $row['id'];
                    $_SESSION['DH_seller_name'] = $row['name'];
                    $_SESSION['DH_seller_type'] = $row['roll_type'];
                     $_SESSION['JM_roll_type'] = $row['roll_type'];
                    $_SESSION['seller_email'] = $row['email'];
                    
                    $_SESSION['DH_seller_type_name'] = $njT;
                    
                    if ($temp_login == 1) {
                        $redirect_page = SELLER_URL . "profile-password/?temp_login=1";
                    } else {
                        $redirect_page = SELLER_URL . "dashboard/";
                    }
                  
                }   else if ($row['roll_type'] == '3') {
                    $njT = 'expert';
                     $_SESSION['user_id'] = $row['id'];
                     $_SESSION['user_name'] = $row['name'];
                    $_SESSION['user_type'] = $row['name'];
                     $_SESSION['JM_roll_type'] = $row['roll_type'];
                    $_SESSION['user_type_name'] = $njT;
                    $_SESSION['user_image'] = $row['image'];
                    $_SESSION['user_email'] = $row['email'];
                    
                    if ($temp_login == 1) {
                         $redirect_page = BASE_URL . 'user/' . $njGenObj->removeSpecialChar($row['name']) . '/change-password/?temp_login=1';
                    } else {
                        $redirect_page = BASE_URL;
                    }
                  
                } 
                else {
                    echo "Error : No login found please try again later(s) ";
                }
                 if ($rememberMe == 'on') { 
                     $Jauth = json_encode($_SESSION);
                    setcookie('Jauth', $Jauth, time() + (30 * 24 * 60 * 60), '/'); // this sets cookie for 30 days.
                }
                //$_SESSION['DH_acc_type_name'] = $njT;
                $dbComObj->editData($conn, $table, $data, " id='" . $row['id'] . "' ");
                if (isset($_POST['reference_url']) && $_POST['reference_url']) {
                    $redirect_url = BASE_URL . $_POST['reference_url'] . "/";
                } else if (isset($_POST['QUERY_STRING']) && $_POST['QUERY_STRING']) {
                    $redirect_url = $_POST['QUERY_STRING'];
                } else {
                    $redirect_url = $redirect_page;
                }
                //  echo  $redirect_url;
                //  print_r($_SESSION);

                echo "Redirect : Logged in successfully. URL " . $redirect_url . "";
            }
        } else {
            echo "Error : Password is incorrect."; /* .$password."==".$row['password'] */
        }
    } else {
        echo "Error : User not registered.";
    }
}
//elseif ($mode == "forgotPasswordadmin") {
//    $username = $_POST['usr'];
//    $table = "admin";
//    $condition = " `email` = '" . $username . "'";
//    $result = $dbComObj->viewData($conn, $table, "*", $condition);
//    $num = $dbComObj->num_rows($result);
//    if ($num) {
//        $row = $dbComObj->fetch_assoc($result);
//        if ($row['status'] == -1) {
//            echo "Error : User is not allowed to login.";
//        } elseif ($row['status'] == 1) {
//            $data = array();
//
//            $password = $srGenObj->randomString('alphaNum', '8');
//            $email = MAIL_USER;
//            $mail = new PHPMailer();
//            $mail->IsSMTP();
//            $mail->SMTPAuth = true;
//            $mail->SMTPDebug = 0;
//            $mail->Debugoutput = 'html';
//            $mail->Host = MAIL_HOST;
//            $mail->Port = MAIL_PORT;
//            $mail->Mailer = "smtp";
//            //Set the encryption system to use - ssl (deprecated) or tls
//            $mail->SMTPSecure = MAIL_SMTPSecure;
//
//            //Whether to use SMTP authentication
//            $mail->SMTPAuth = true;
//            $mail->Username = $email;
//            $mail->Password = MAIL_PWD;
//
//            $mail->SetFrom($email, 'NO-Reply');
//            $mail->Subject = "Your TeamUnited Admin Acount Password Is Reset";
//            $mail->MsgHTML('Your new password for TeamUnited admin account is ' . $password);
//            $mail->addAddress($row['email']);
//            if ($mail->Send()) {
//                $dataArray = array("password" => md5($password));
//                $chng_qry = $dbComObj->editData($conn, $table, $dataArray, " id='" . $row['id'] . "' ");
//                /* $smsContact = $row['mobile'];
//                  $smsBody = "Your new password for merchant gohelper account is " . $password . ".";
//                  $srGenObj->sendsms($smsContact, $smsBody); */
//                $output['status'] = "200";
//                $output['message'] = "password is reset";
//                echo "Success : New password is sent to your registered mail. Please try login with that password.";
//            } else {
//                echo $mail->ErrorInfo;
//            }
//        } elseif ($row['status'] == 99) {
//            echo "Error : This email is not registered with us..";
//        }
//    } else {
//        echo "Error : This email is not registered with us.";
//    }
//} 
elseif ($mode == "forgotPassword") {
    $username = $_POST['email'];
//    $table = "users";
    $condition = " `email` = '" . $username . "'";
    $result = $dbComObj->viewData($conn, $table, "*", $condition);
    $num = $dbComObj->num_rows($result);

    if ($num) {
        $row = $dbComObj->fetch_assoc($result);

        $email = $row['email'];
        if ($row['status'] == -1) {
            echo "Error : User is not allowed to login.";
        } elseif ($row['status'] == 1) {

            $password = $njGenObj->randomString('alphaNum', '8');
            $subject = "";
            if ($row['roll_type'] == 1) {
                $subject = 'Your Marketplace Customer Account Password Is Reset';
            } elseif ($row['roll_type'] == 2) {
                $subject = 'Your Marketplace Seller Account Password Is Reset';
            } else {
                $subject = 'Your Marketplace Account Password Is Reset';
            }
            $from = 'Hello Webmaster,
                    New inquiry is come from';
//            $subject = 'Your Marketplace  Acount Password Is Reset';
            $femailid = "support@fxpips.co.uk";
            $message = "<h2>Your new password for TeamUnited admin account is " . $password . "<h2>";
            $headers = 'From: &marketplace;' . $femailid . '&marketplace;' . "\r\n" .
                    'Reply-To: &marketplace;' . $femailid . '&marketplace;' . "\r\n" .
                    'X-Mailer: PHP/' . phpversion();
            $headers = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            $headers .= 'From: marketplace <' . $femailid . '>' . "\r\n";

            if (mail($email, $subject, $message, $headers, $from)) {
                $dataArray = array("md5_password" => md5($password), "temp_password" => $password, "password" => "");
                $chng_qry = $dbComObj->editData($conn, $table, $dataArray, " id='" . $row['id'] . "' ");
                /* $smsContact = $row['mobile'];
                  $smsBody = "Your new password for merchant gohelper account is " . $password . ".";
                  $srGenObj->sendsms($smsContact, $smsBody); */
                $output['status'] = "200";
                $output['message'] = "password is reset";
                echo "Success : New password is sent to your registered mail. Please try login with that password.";
//                header('Location: login/');
            } else {
                echo $mail->ErrorInfo;
            }
        } elseif ($row['status'] == 99) {
            echo "Error : This email is not registered with us..";
        }
    } else {
        echo "Error : This email is not registered with us.";
    }
} elseif ($mode == "logout") {
    unset($_SESSION['DH_seller_id']);
    unset($_SESSION['DH_seller_name']);
    unset($_SESSION['DH_seller_type']);
    unset($_SESSION['DH_seller_type_name']);
    unset($_SESSION['user_id']);
    unset($_SESSION['user_name']);
    unset($_SESSION['user_type']);
    unset($_SESSION['user_type_name']);
        setcookie('Jauth','', time() + (30 * 24 * 60 * 60), '/'); // this sets cookie for 30 days.
    //session_destroy();
    // echo 'aaas';
    //  print_r($_SESSION);
    //die;
    header('Location:' . BASE_URL);
} elseif ($mode == "UserRegister") {

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
            $pathToSave = "../images/user/";
            $image = $_FILES['image'];
            $filename = '';
            $dates = date("Y-m-d-H-i-s");
            $data = array();
            if (isset($_FILES['image']['name']) && !empty($_FILES['image']['name'])) {
                $image = $_FILES['image'];
                $name = preg_replace('/[^a-zA-Z0-9_]/', '-', $_POST['name']);
                $filename = $name . "-" . $dates;
                $pathToSave = "../images/user/";
                $thumbPathToSave = "../images/user/thumb/";
                $main_logo = $njFileObj->uploadImage($image, $filename, $pathToSave);
                $image_source = "../images/user/" . $main_logo;
                $thumb_logo = $njFileObj->resizeImage($image_source, $filename, $thumbPathToSave);
                $data['image'] = $main_logo;
            }
            if ($_POST['roll_type']) {
                $roll_type = $_POST['roll_type'];
            } else {
                $roll_type = '1';
            }
            $email = $_POST['email'];
            $slug = $njGenObj->removeSpecialChar($_POST['name']);
            $data['name'] = $_POST['name'];
            $data['slug'] = $slug;
            $data['email'] = $_POST['email'];
            $data['contact_no'] = $_POST['contact_no'];
            $data['password'] = $_POST['password'];
            $data['added_on'] = date("Y-m-d H:i:s");
            $data['md5_password'] = md5($_POST['password']);
            $data['roll_type'] = $roll_type;
            // seller st
            $data['city'] = $_POST['city'];
            $data['state'] = $_POST['state'];
            $data['country'] = $_POST['country'];
            $data['address'] = $_POST['address'];
            $data['zip_code'] = $_POST['zip_code'];
            // seller end
            $data['status'] = '1';
            $dbComObj->addData($conn, $table, $data);
            $user_id = $dbComObj->insert_id($conn);

            //notification start 
            if ($roll_type == '2') {
                $resultajm = $dbComObj->viewData($conn, 'admin', "*", '1');
                $admin = $dbComObj->fetch_assoc($result_notify);
                if ($admin['id'])
                    $admin_id = $admin['id'];
                else
                    $admin_id = '1';
                $msg = '<strong>' . ucwords($_POST['name']) . '</strong> would like to become Seller!';
                $notification['notify_user_id'] = $admin_id;
                $notification['user_id'] = $user_id;
                $notification['msg'] = $msg;
                $notification['notify_type'] = 1;
                $notification['user_type'] = 'Admin';
                $notification['added_on'] = date("Y-m-d H:i:s");
                $dbComObj->addData($conn, "notification", $notification);
            }
            // notification end
            if ($roll_type == '1') {
                $from = 'Hello Webmaster,
            New Customer Registration';
                $subject = 'Customer Registration';
                $femailid = "support@fxpips.co.uk";
                $message = "Hello Webmaster,<br><br>
                        <b>New inquiry is here</b><br><br>
                        Name: " . $_POST['name'] . "<br><br>E-mail: " . $_POST['email'] . "<br><br>
                        Mobile No: " . $_POST['contact_no'] . "<br><br> <b>Note: </b>This Inquiry is come from the website marketplace ,because the user is properly filled the inquiry form.
                         ";
                $headers = 'From: &marketplace;' . $femailid . '&marketplace;' . "\r\n" .
                        'Reply-To: &marketplace;' . $femailid . '&marketplace;' . "\r\n" .
                        'X-Mailer: PHP/' . phpversion();
                $headers = 'MIME-Version: 1.0' . "\r\n";
                $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                $headers .= 'From: marketplace <' . $femailid . '>' . "\r\n";
                mail('mmfinfotech1075@gmail.com', $subject, $message, $headers, $from);
                mail('support@fxpips.co.uk', $subject, $message, $headers, $from);
                mail($email, $subject, $message, $headers, $from);

                echo "Success : Customer Profile created successfully.";
            } else {
                $from = 'Hello Webmaster, New Seller Registration';
                $subject = 'Seller Registration';
                $femailid = "support@fxpips.co.uk";
                $message = "Hello Webmaster,<br><br>
                        <b>New inquiry is here</b><br><br>
                        Name: " . $_POST['name'] . "<br><br>E-mail: " . $_POST['email'] . "<br><br>
                        Mobile No: " . $_POST['contact_no'] . "<br><br>
                        Address: " . $_POST['address'] . "<br><br>
                        City: " . $_POST['city'] . "<br><br>   
                        State: " . $_POST['state'] . "<br><br>
                        Country: " . $_POST['country'] . "<br><br>
                        Zip Code: " . $_POST['zip_code'] . "<br><br>
                        <b>Note: </b>This Inquiry is come from the website marketplace ,because the user is properly filled the inquiry form.
                         ";
                $headers = 'From: &marketplace;' . $femailid . '&marketplace;' . "\r\n" .
                        'Reply-To: &marketplace;' . $femailid . '&marketplace;' . "\r\n" .
                        'X-Mailer: PHP/' . phpversion();
                $headers = 'MIME-Version: 1.0' . "\r\n";
                $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                $headers .= 'From: marketplace <' . $femailid . '>' . "\r\n";
                mail('mmfinfotech1075@gmail.com', $subject, $message, $headers, $from);
                mail('support@fxpips.co.uk', $subject, $message, $headers, $from);
                mail($email, $subject, $message, $headers, $from);
                echo "Success : Seller Profile created successfully. You Can log in after approval of admin.";
            }
        } else {
            echo "Error : Email-id already registered. Please try again with diffrent email-id.";
        }
    }
} elseif ($mode == "manageUsers") {
    // print_r($_POST);
    if ($_POST['password'] !== '') {
        if ($_POST['password'] !== $_POST['C_password']) {
            echo "Error : Password not match to confirm password.";
        }
    } else {
        $condition = " `id` = '" . $_POST['session_uid'] . "'";
        $result = $dbComObj->viewData($conn, $table, "*", $condition);
        $num = $dbComObj->num_rows($result);
        if ($num) {
            $row = $dbComObj->fetch_assoc($result);
            $data = array();
            $data['name'] = $requestData['name'];
            $data['email'] = $requestData['email'];
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
                $pathToSave = "../images/user/";
                $thumbPathToSave = "../images/user/thumb/";
                $main_logo = $njFileObj->uploadImage($image, $filename, $pathToSave);
                $image_source = "../images/user/" . $main_logo;
                $thumb_logo = $njFileObj->resizeImage($image_source, $filename, $thumbPathToSave);
                $data['image'] = $main_logo;
            }

            $dbComObj->editData($conn, $table, $data, $condition);
            echo "Success : User Profile updated successfully. ";
        } else {
            echo "Error : User not registered.";
        }
    }
} elseif ($mode == 'deleteUsers') {
    $dbComObj->deleteData($conn, $table, "`id` = '" . $_POST['a'] . "'");
} elseif ($mode == 'statusUsers') {
    if ($_POST['b'] == '1') {
        $a['status'] = '0';
    } else {
        $a['status'] = '1';
    }
    $dbComObj->editData($conn, $table, $a, "`id` = '" . $_POST['a'] . "'");
} else {
    
}
