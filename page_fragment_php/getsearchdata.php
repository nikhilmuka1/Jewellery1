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
$table = "product";
$i = 1;
$q = $_REQUEST["term"];

$result = $dbComObj->viewData($conn, $table, "*","`name` like '%".$q."%'");
$num = $dbComObj->num_rows($result);
if ($num > 0) {
   while($data = $dbComObj->fetch_assoc($result))
    {
        $json[]=array(
	'id'=>$data['id'],
        'slug'=>$data['slug'],
        'value'=>$data['name']
        );
    }
}
else
{
    $json[]=array('id'=>'NOTFOUND','value'=>'not found');
}
        
echo json_encode($json);

?>