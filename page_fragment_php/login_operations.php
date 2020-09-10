<?php
require_once '../page_fragment/define.php';
include ('../page_fragment/dbConnect.php');
include ('../page_fragment/dbGeneral.php');
include ('../page_fragment/njGeneral.php');
include ('../page_fragment/njFile.php');
include ('../page_fragment/njEncription.php');
$dbConObj = new dbConnect();
$dbComObj = new dbGeneral();
$njGenObj = new njGeneral();
$njFileObj = new njFile();
$njEncryptionObj = new njEncryption();
$conn = $dbConObj->dbConnect();

$mode = "";
$requestData = array();
if(isset($_POST['mode'])) {
    $mode = base64_decode($_POST['mode']);
    unset($_POST['mode']);
    $requestData = $_POST;
} elseif(isset($_GET['mode'])) {
    $mode = base64_decode($_GET['mode']);
    unset($_GET['mode']);
    $requestData = $_GET;
}
$table = "customer";
$i = 1;
//echo $mode;
if ($mode == "login")
    {
    $condition = " `email`='" . mysqli_real_escape_string($conn,$_POST['login_username']) . "'  AND `md5_password` = '" . mysqli_real_escape_string($conn,  md5($_POST['login_password'])) . "'";
    $result = $dbComObj->viewData($conn, $table, "*", $condition);
    $num = $dbComObj->num_rows($result);
    if ($num > 0) {
        $data = $result->fetch_assoc();

       // $nj_login['added_on'] = date("Y-m-d-H-i-s");
        $nj_login['customer_id'] = $data['id'];
        $nj_login['login_tym'] = date("Y-m-d-H-i-s");
        $nj_login['status'] = '1';
        
        $dbComObj->addData($conn,"customer_login_logs", $nj_login);
        
        $identifierKey = $data['id'].'-Nj-'.ucwords($data['name']);
    	
        $identifier = $njEncryptionObj->safe_b64encode($identifierKey);// ucwords($Restname);
        
        $_SESSION['MarketPlaceId'] = $data['id'];
        $_SESSION['MarketPlaceIcon'] = $data['title_image'];
        $_SESSION['MarketPlaceImage'] = $data['image'];
        $_SESSION['MarketPlaceName'] = ucwords($data['name']);
        $_SESSION['MarketPlaceSlug'] = ucwords($data['slug']);        
        $_SESSION['identifier'] = "?identifier=".$identifier;
        echo "Reload : <b><i>".$data['name']."</i>!</b> Welcome back to Drug At Home!.";
    } else {
        //$i = $i + 1;
        echo "Error : Email id / Password incorrect. Please check your email id & password.";
    }
} 

else if ($mode == "Checkoutlogin")
    {
    $condition = " `email`='" . mysqli_real_escape_string($conn,$_POST['login_username']) . "'  AND `md5_password` = '" . mysqli_real_escape_string($conn,  md5($_POST['login_password'])) . "'";
    $result = $dbComObj->viewData($conn, $table, "*", $condition);
    $num = $dbComObj->num_rows($result);
    if ($num > 0) {
        $data = $result->fetch_assoc();

       // $nj_login['added_on'] = date("Y-m-d-H-i-s");
        $nj_login['customer_id'] = $data['id'];
        $nj_login['login_tym'] = date("Y-m-d-H-i-s");
        $nj_login['status'] = '1';
        
        $dbComObj->addData($conn,"customer_login_logs", $nj_login);
        
        $identifierKey = $data['id'].'-Nj-'.ucwords($data['name']);
    	
        $identifier = $njEncryptionObj->safe_b64encode($identifierKey);// ucwords($Restname);
        
        $_SESSION['MarketPlaceId'] = $data['id'];
        $_SESSION['MarketPlaceIcon'] = $data['title_image'];
        $_SESSION['MarketPlaceImage'] = $data['image'];
        $_SESSION['MarketPlaceName'] = ucwords($data['name']);
        $_SESSION['MarketPlaceSlug'] = ucwords($data['slug']);        
        $_SESSION['identifier'] = "?identifier=".$identifier;
        
        $img = BASE_URL . 'images/user/thumb/' . $_SESSION['MarketPlaceImage'];
        $file_exists = checkRemoteFileNj($img);
        if ($file_exists == true) {
            $img = '<img src="' . $img . '" style="width:50px;border-radius: 30px;border: 1px solid #c4d5e9;background: rgba(196, 213, 233, 0.17);"/>';
        } else {
            $img = '<img style="border-radius: 25px;" src="' . BASE_URL . 'images/user-icon/' . $_SESSION['MarketPlaceIcon'] . '" />';
        }
        echo '1||nj||'.$img.' '.$_SESSION['MarketPlaceName'];
    } else {
        //$i = $i + 1;
        echo "0||nj||Email id / Password incorrect. Please check your email id & password.";
    }
} 

else if ($mode == 'Checkoutregister')
{
    $condition = " `email`='" . mysqli_real_escape_string($conn,$_POST['reg_email']) . "'";
    $result = $dbComObj->viewData($conn, $table, "*", $condition);
    $num = $dbComObj->num_rows($result);
    if ($num == 0) {
        
        $nametxt = ucfirst(substr($_POST['reg_username'], 0,+1));
        $slug = $njGenObj->removeSpecialChar($_POST['reg_username']);
        $nj_login['title_image'] = createImageIcon($nametxt);
       //die;
        $nj_login['slug'] = $slug;
        $nj_login['name'] = $_POST['reg_username'];
        $nj_login['email'] = $_POST['reg_email'];
        $nj_login['contact_no'] = $_POST['reg_phone'];
        $nj_login['password'] = $_POST['reg_password'];
        $nj_login['md5_password'] = md5($_POST['reg_password']);
        $nj_login['added_on'] = date("Y-m-d-H-i-s");
        $nj_login['status'] = '1';
        $dbComObj->addData($conn, $table, $nj_login);
        $user_id = $dbComObj->insert_id($conn);
        $identifierKey = $data['id'].'-Nj-'.ucwords($_POST['reg_username']);
        $identifier = $njEncryptionObj->safe_b64encode($identifierKey);// ucwords($Restname);
        
        $_SESSION['MarketPlaceId'] = $user_id;
        $_SESSION['MarketPlaceIcon'] = $nj_login['title_image'];
        $_SESSION['MarketPlaceImage'] = '';
        $_SESSION['MarketPlaceName'] = ucwords($_POST['reg_username']);
        $_SESSION['MarketPlaceSlug'] = ucwords($slug);        
        $_SESSION['identifier'] = "?identifier=".$identifier;
        $img = '<img style="border-radius: 25px;" src="' . BASE_URL . 'images/user-icon/' . $_SESSION['MarketPlaceIcon'] . '" />';
        echo '1||nj||'.$img.' '.$_SESSION['MarketPlaceName'];
    } else {
        echo "0||nj||Email id already exist in system. Please try again with diffrent email id.";
    }
}

else if ($mode == 'register')
{
    $condition = " `email`='" . mysqli_real_escape_string($conn,$_POST['email']) . "'";
    $result = $dbComObj->viewData($conn, $table, "*", $condition);
    $num = $dbComObj->num_rows($result);
    if ($num == 0) {
        
        $nametxt = ucfirst(substr($_POST['name'], 0,+1));
        $slug = $njGenObj->removeSpecialChar($_POST['name']);
        $nj_login['title_image'] = createImageIcon($nametxt);
        $nj_login['slug'] = $slug;
        $nj_login['name'] = $_POST['name'];
        $nj_login['email'] = $_POST['email'];
        $nj_login['contact_no'] = $_POST['contact_no'];
        $nj_login['password'] = $_POST['password'];
        $nj_login['md5_password'] = md5($_POST['password']);
        $nj_login['added_on'] = date("Y-m-d-H-i-s");
        //$nj_login['login_tym'] = date("Y-m-d-H-i-s");
        $nj_login['status'] = '1';
        
        $dbComObj->addData($conn, $table, $nj_login);
        
        $identifierKey = $data['id'].'-Nj-'.ucwords($data['name']);
    	
        $identifier = $njEncryptionObj->safe_b64encode($identifierKey);// ucwords($Restname);
        echo "Reload : You are register successfully!";
    } else {
        //$i = $i + 1;
        echo "Error : Email id already exist in system. Please try again with diffrent email id.";
    }
}

elseif ($mode == "logout") {
    unset($_SESSION['MarketPlaceId']);
    unset($_SESSION['MarketPlaceIcon']);
    unset($_SESSION['MarketPlaceName']);
    unset($_SESSION['MarketPlaceSlug']);
    unset($_SESSION['MarketPlaceSlug']);
    unset($_SESSION['identifier']);
    session_destroy();
    header('Location:'.BASE_URL);
}

function createImageIcon($a)
{
$back1 = '245';
$back1 = '245';
$back1 = '245';
$back1 = '245';
// Create a blank image and add some text
$im = imagecreatetruecolor(50, 50);
$digit = '';

$colors0 = '27,78,181';     // blue
$colors1 = '22,163,35';     // green
$colors2 = '214,36,7';      // red
$colors3 = '58,64,70';      // dark blue gray
$colors4 = '56,163,252';    // bright blue
$colors5 = '223,69,96';     // magenta/pink


for($x = 10; $x <= 130; $x += 30) {
    $digit += rand(0, 2);
}

if($digit <= 2){$background_color = imagecolorallocate($im,27,78,181);}
elseif($digit == 3){$background_color = imagecolorallocate($im,22,163,35);}
elseif($digit == 4){$background_color = imagecolorallocate($im,214,36,7);}
elseif($digit == 5){$background_color = imagecolorallocate($im,58,64,70);}
elseif($digit >= 6){$background_color = imagecolorallocate($im,56,163,252);}	
// 62732 .  77599 . 17058 . 22030

$fonts = array();
$font = "../ttf/DejaVuSerif-Bold.ttf";
$fonts[] = "../ttf/DejaVuSans-Bold.ttf";
$fonts[] = "../ttf/DejaVuSansMono-Bold.ttf";

$text_color = imagecolorallocate($im, 0, 255, 255);
$line_color = imagecolorallocate($im, 64, 64, 64);
$pixel_color = imagecolorallocate($im, 0, 0, 255);
imagefilledrectangle($im, 0, 0, 200, 50, $background_color);


//$text_color = imagecolorallocate($im, 255, 255, 255);
$val= $a;
//imagestring($im, 255, 14, 11,  $val , $text_color);

//$font='BELLB.TTF';
$white=imagecolorallocate($im, 255, 255, 255);
$string_length=5;
$font_size=20;
$width=132;
$height=45;
//CALC APPROX LOCATION FOR TEXT
$y_value=($height/2)+($font_size/2);
$x_value=($width-($string_length*$font_size))/2;
//DRAW STRING USING TRUE TYPE FUNCTION
imagettftext($im, $font_size, 0, $x_value,$y_value, $white, $font, $val);

// Save the image as 'simpletext.jpg'
$name = date("Y-m-d-H-i-s").$nameText.'.jpg';
    $pathName = image_PATH.'user-icon/'.$name;
    imagejpeg($im,$pathName,100);

// Free up memory
imagedestroy($im);
//echo "<img src=images/user-icon/".$name.">";
return $name;
}
?>