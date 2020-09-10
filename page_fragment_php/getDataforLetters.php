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
$table = "company";
$i = 1;
//echo $mode;
if ($mode == "changeLetter")
    {
    
    if($_POST['a'] == 'ALL')
    {
        $condition = " 1 order by name ASC";
    }
    else
    {
        $condition = " `name` like '".$_POST['a']."%' order by name ASC";
    }
    
    $result = $dbComObj->viewData($conn, $table, "*", $condition);
    $num = $dbComObj->num_rows($result);
    if ($num > 0) {
       while($data = $dbComObj->fetch_assoc($result))
       {
           echo '<div class="col-sm-4 col-xs-4 mar-B15"><a id="letters" href="'.BASE_URL.'company/'.$data['id'].'/'.$data['slug'].'/">'.$data['name'].'</a></div>';
       }
    }
    else
    {
        echo 'No Data Found in system !';
    }
} 

?>