<?php
include ('../../page_fragment/dbConnect.php');
include ('../../page_fragment/dbGeneral.php');
include ('../../page_fragment/njGeneral.php');
include ('../../page_fragment/njFile.php');
include ('../../page_fragment/njEncription.php');
include ('../../page_fragment/ajCategoryView.php');
include ('../../page_fragment/ajGeneral.php');

$dbConObj = new dbConnect();
$dbComObj = new dbGeneral();
$njGenObj = new njGeneral();
$ajGenObj = new ajGeneral();
$njFileObj = new njFile();
$njEncryptionObj = new njEncryption();
$conn = $dbConObj->dbConnect();

 if (isset($_SESSION['DH_admin_id'])){  
	if ($njGenObj->isNotLoggedIn()) {
	    header('Location:' .ADMIN_URL.'admin_operations.php?mode='.base64_encode("logout"));
	}
}
 else if (isset($_SESSION['DH_seller_id'])){
	if ($njGenObj->isNotLoggedInSeller()) { 
	   header('Location:' .SELLER_URL.'seller_operations.php?mode='.base64_encode("logout"));
	}
}
else {
	   header('Location:' .BASE_URL.'');	
}
 
?>