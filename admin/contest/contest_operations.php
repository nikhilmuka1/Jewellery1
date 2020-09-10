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
$table = "contests";
if ($mode == "addNewContest") {
    // print_r($_POST); die;
    $timestamp = strtotime($_POST['last_date']);
    $last_date = date('Y-m-d H:i:s', $timestamp);
    $uniqid = uniqid();
    $condition = " `title` = '" . $_POST['title'] . "'";
    $result = $dbComObj->viewData($conn, $table, "*", $condition);
    $num = $dbComObj->num_rows($result);
    if ($num == 0) { 
        $dates = date("Y-m-d-H-i-s");
        $data = array();
        if (isset($_FILES['cover_image']['name']) && !empty($_FILES['cover_image']['name'])) {
            $image = $_FILES['cover_image'];
            $name = preg_replace('/[^a-zA-Z0-9_]/', '-', $_POST['title']);
            $filename = $name . "-" . $dates;
            $pathToSave = "../../images/contest/";
            $thumbPathToSave = "../../images/contest/thumb/";
            $main_logo = $njFileObj->uploadImage($image, $filename, $pathToSave);
            $image_source = "../../images/contest/" . $main_logo;
            $thumb_logo = $njFileObj->resizeImage($image_source, $filename, $thumbPathToSave);
            $data['cover_image'] = $main_logo;
        }
        $slug = $njGenObj->removeSpecialChar($_POST['title']);

//SELECT `id`, `title`, `description`, `cover_image`, `status`, `added_on`, `updated_on`, `added_by`, `update_by`
        $data['title'] = $_POST['title'];
        $data['slug'] = $slug; 
         $data['description'] = base64_encode($_POST['description11']);
        $data['reward'] = base64_encode($_POST['reward']);
        $data['last_date'] = $last_date;
        $data['added_by'] = $_SESSION['DH_admin_id'];
        $data['status'] = '1';
        $data['added_on'] = date("Y-m-d H:i:s");
        $data['last_date'] = $last_date;


        $dbComObj->addData($conn, $table, $data);
        // echo "Redirect : User Profile created successfully. URL " . ADMIN_PATH . "users/";
        "Success : Contest Profile created successfully.  ";
        $msg = "sucess";

        $yourURL = ADMIN_URL . 'contests/?msg=' . $msg;
        echo ("<script>location.href='$yourURL'</script>");
    } else {
        "Error : Contest already Added. Please try again with diffrent Title.";
        $msg = "error";
    }
    $yourURL = ADMIN_URL . 'contests/new-contest/?msg='. $msg;
    echo ("<script>location.href='$yourURL'</script>");
}

if ($mode == "manageContest") {

    
    $condition = " `id` = '" . $_POST['session_uid'] . "'";
    $result = $dbComObj->viewData($conn, $table, "*", $condition);
    $num = $dbComObj->num_rows($result);
    if ($num) {
        $row = $dbComObj->fetch_assoc($result);
        $slug = $njGenObj->removeSpecialChar($_POST['title']);
        $data = array();
        $data['title'] = $_POST['title'];
        $data['slug'] = $slug;
        $data['description'] = base64_encode($_POST['description11']);
        $data['reward'] = base64_encode($_POST['reward']);
        $data['last_date'] = date("Y-m-d H:i:s");
        $data['added_by'] = $_SESSION['DH_admin_id'];
        $data['status'] = '1';
        $data['updated_on'] = date("Y-m-d H:i:s");
        $data['last_date'] = date("Y-m-d H:i:s");

   //   print_r($_POST);
   //   print_r($data);
   //   die;
        $dates = date("Y-m-d-H-i-s");
        if (isset($_FILES['cover_image']['name']) && !empty($_FILES['cover_image']['name'])) {
            $image = $_FILES['cover_image'];
            $name = preg_replace('/[^a-zA-Z0-9_]/', '-', $_POST['title']);
            $filename = $name . "-" . $dates;
            $pathToSave = "../../images/contest/";
            $thumbPathToSave = "../../images/contest/thumb/";
            $main_logo = $njFileObj->uploadImage($image, $filename, $pathToSave);
            $image_source = "../../images/contest/" . $main_logo;
            $thumb_logo = $njFileObj->resizeImage($image_source, $filename, $thumbPathToSave);
            $data['cover_image'] = $main_logo;
        }
        $dbComObj->editData($conn, $table, $data, $condition);
       // echo "Suceess : content saved."; 
        $msg='success';
    } else {
      //  echo "Error : User not registered.";
          $msg='error';
    }
    $yourURL = ADMIN_URL . 'contests/?msg='.$msg;
    echo ("<script>location.href='$yourURL'</script>");
}

if ($mode == 'deletecontest') {

    $a['is_delete'] = '1';
    // $dbComObj->deleteData($conn, $table, "`id` = '" . $_POST['a'] . "'");
    $dbComObj->editData($conn, $table, $a, "`id` = '" . $_POST['a'] . "'");
}

if ($mode == 'statusUpdate') {
    if ($_POST['b'] == '1') {
        $a['status'] = '0';
    } else {
        $a['status'] = '1';
    }
    $dbComObj->editData($conn, $table, $a, "`id` = '" . $_POST['a'] . "'");
}
if ($mode == 'participatestatusUpdate') {
    $table2="contests_participate";
    if ($_POST['b'] == '1') {
        $a['admin_status'] = '0';
    } else {
        $a['admin_status'] = '1';
    }
    $dbComObj->editData($conn, $table2, $a, "`id` = '" . $_POST['a'] . "'");
}
//manageContestProduct
if ($mode == 'manageContestProduct') {
    //  print_r($_POST); //extract($_POST);
    $table2="contests_participate";
      $ab['product_id'] = implode(",",$_POST['product_id1']);
      $ab['admin_status'] = 1;
  //    print_r($ab);
    $res = $dbComObj->editData($conn, $table2, $ab, "`id` = '" . $_POST['session_uid'] . "'");
       $request_type= $_POST['request_type'];
                    //  participate
      if($request_type=='participate'){
         $redirect_url= ADMIN_URL.'contests/info/?session_uid='.$_POST['cid']; 
      } else if($request_type=='pending'){
              $redirect_url= ADMIN_URL.'contests/pending_contest_participate/'; 
      }
      //echo $redirect_url; die;
      if($res){  echo "Redirect : constest Participate  product for  Approval saved . URL ".$redirect_url."";}
      else {    echo "Error : NOt saved.";}
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
