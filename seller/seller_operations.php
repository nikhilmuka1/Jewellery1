<?php
require_once '../page_fragment/define.php';
include ('../page_fragment/dbConnect.php');
include ('../page_fragment/dbGeneral.php');
include ('../page_fragment/njGeneral.php');
$dbConObj = new dbConnect();
$dbComObj = new dbGeneral();
$njGenObj = new njGeneral();
$conn = $dbConObj->dbConnect();

$mode = "";
if (isset($_POST['mode'])) {
    $mode = base64_decode($_POST['mode']);
    unset($_POST['mode']);
} elseif (isset($_GET['mode'])) {
    $mode = base64_decode($_GET['mode']);
    unset($_GET['mode']);
}
if ($mode == "login") {
    $username = $_POST['login-email'];
    $password = $_POST['login-password'];
    $rememberMe = $_POST['remember'];
    $table = "users";

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
                    $_SESSION['user_type'] = $row['roll_type'];
                    $_SESSION['user_type_name'] = $njT;
                    $_SESSION['user_image'] = $row['image'];
                    $_SESSION['user_email'] = $row['email'];
                    if ($temp_login == 1) {
                        $redirect_page = BASE_URL . 'user/' . $row['name'] . '/change-password/?temp_login=1';
                    } else {
                        $redirect_page = BASE_URL;
                    }
                } else if ($row['roll_type'] == '2') {
                    $njT = 'Seller';
                    $_SESSION['DH_seller_id'] = $row['id'];
                    $_SESSION['DH_seller_name'] = $row['name'];
                    $_SESSION['DH_seller_type'] = $row['roll_type'];
                    $_SESSION['seller_email'] = $row['email'];
                    $_SESSION['DH_seller_type_name'] = $njT;
                    if ($temp_login == 1) {
                        $redirect_page = SELLER_URL . "profile-password/?temp_login=1";
                    } else {
                        $redirect_page = SELLER_URL . "dashboard/";
                    }
                } else {
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
} elseif ($mode == "forgotPassword") {
    $username = $_POST['reminder-email'];
    $table = "users";
    $condition = " `email` = '" . $username . "'";
    $result = $dbComObj->viewData($conn, $table, "*", $condition);
    $num = $dbComObj->num_rows($result);
    if ($num > 0) {
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
                $redirect_page = SELLER_URL;
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
    unset($_SESSION['DH_seller_type']);
    unset($_SESSION['DH_seller_name']);
    unset($_SESSION['DH_seller_type_name']);
    unset($_SESSION['seller_email']);

//session_destroy();
    header('Location:' . SELLER_URL);
}