<<<<<<< HEAD
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
echo $mode;
$table = "notification";

if ($mode == 'deleteNotification') {
    $dbComObj->deleteData($conn, $table, "`id` = '" . $_POST['a'] . "'");
}

if ($mode == 'statusNotification') {
    if ($_POST['b'] == '1') {
        $a['status'] = '0';
    } else {
        $a['status'] = '1';
    }
    $dbComObj->editData($conn, $table, $a, "`id` = '" . $_POST['a'] . "'");
}
if ($mode == 'IsreadNotification') {
    if ($_POST['b'] == '1') {
        $a['is_read'] = '0';
    } else {
        $a['is_read'] = '1';
    }
    $dbComObj->editData($conn, $table, $a, "`id` = '" . $_POST['a'] . "'");
}


=======
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
echo $mode;
$table = "notification";

if ($mode == 'deleteNotification') {
    $dbComObj->deleteData($conn, $table, "`id` = '" . $_POST['a'] . "'");
}

if ($mode == 'statusNotification') {
    if ($_POST['b'] == '1') {
        $a['status'] = '0';
    } else {
        $a['status'] = '1';
    }
    $dbComObj->editData($conn, $table, $a, "`id` = '" . $_POST['a'] . "'");
}
if ($mode == 'IsreadNotification') {
    if ($_POST['b'] == '1') {
        $a['is_read'] = '0';
    } else {
        $a['is_read'] = '1';
    }
    $dbComObj->editData($conn, $table, $a, "`id` = '" . $_POST['a'] . "'");
}


>>>>>>> 6b2740f392bdf664df5ab46676ccbeb84109e8db
