<?php 

include('./page_fragment/define.php');
include ('./page_fragment/dbConnect.php');
include ('./page_fragment/dbGeneral.php');
include ('./page_fragment/njGeneral.php');
include ('./page_fragment/njFile.php');
include ('./page_fragment/njEncription.php');
include ('./page_fragment/ajCategoryView.php');
include ('./page_fragment/ajGeneral.php');
$dbConObj = new dbConnect();
$dbComObj = new dbGeneral();
$njGenObj = new njGeneral();
$njFileObj = new njFile();
$ajGenObj = new ajGeneral();
$ajCategoryViewObj = new ajCategoryView();
$njEncryptionObj = new njEncryption();
$conn = $dbConObj->dbConnect(); 
//echo 'Abhi';
//echo $njEncryptionObj->safe_b64decode('gggg');

?>