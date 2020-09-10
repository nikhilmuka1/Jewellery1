<?php
include('../page_fragment/define.php');
include ('../page_fragment/dbConnect.php');
include ('../page_fragment/dbGeneral.php');
include ('../page_fragment/njGeneral.php');
include ('../page_fragment/njFile.php');
include ('../page_fragment/njEncription.php');
include ('../page_fragment/ajCategoryView.php');
include ('../page_fragment/ajGeneral.php');
$dbConObj = new dbConnect();
$dbComObj = new dbGeneral();
$njGenObj = new njGeneral();
$njFileObj = new njFile();
$ajGenObj = new ajGeneral();
$ajCategoryViewObj = new ajCategoryView();
$njEncryptionObj = new njEncryption();
$conn = $dbConObj->dbConnect();

if ($_SESSION) {
    if (isset($_SESSION['user_id']))
        $login_id = $_SESSION['user_id'];
    if (isset($_SESSION['DH_seller_id'])) {
        $login_id = $_SESSION['DH_seller_id'];
        $loginSeller = $_SESSION['DH_seller_type_name'];
    }
}
if (empty($login_id)) {
    header('Location: ' . BASE_URL);
    exit;
}
$siteTitle = "Jewelry | Personal Info";
include '../include/user_header.php';
$result = $dbComObj->viewData($conn,"users", "*","`id` = '".$login_id."'");
$result = $dbComObj->viewData($conn,"users", "*","`id` = '".$login_id."'");
$num = $dbComObj->num_rows($result);
if ($num > 0) {
    $rows = $dbComObj->fetch_assoc($result);
    extract($rows);
}
?>
<body id="contact" class="contact hide-left-column hide-right-column lang_en  one-column">
    <div id="page">
        <div class="columns-container">
            <div id="columns">
                <!-- Breadcrumb -->
                <div class="breadcrumb container">
                    <ul>
                        <li class="home"><a class="home" href="<?php echo BASE_URL;?>" title="Return to Home">home</a></li>
                        <li class="crumb-1"><a href="<?php echo BASE_URL;?>user/my-account.php" title="My account">My account</a></li>
                        <li class="crumb-2 last"><span class="navigation-pipe">&gt;</span><span class="navigation_page">Your personal information</span></li>
                    </ul>
                </div>
                <!-- /Breadcrumb -->
                <div id="slider_row">
                    <div id="top_column" class="center_column"></div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="large-left col-sm-12">
                            <div class="row">
                                <div id="center_column" class="center_column col-xs-12 col-sm-9 accordionBox">
                                    <div class="box">
                                        <h1 class="page-subheading">Your personal information</h1>
                                        <p class="info-title">Please be sure to update your personal information if it has changed.</p>
                                        <p class="required"><sup>*</sup>Required field</p>
                                        <div id="personalinfoResult"></div>
                                        <form id="personalinfoForm" enctype="multipart/form-data" method="post" class="std">
                                            <fieldset>
                                                <div class="required form-group">
                                                    <label for="firstname">
                                                        <span class="required">*</span> Full Name
                                                    </label>
                                                    <input class="form-control" required type="text" id="firstname" name="firstname" value="<?php echo $rows['name'];?>">
                                                </div>
                                                <div class="required form-group">
                                                    <label for="email">
                                                       <span class="required">*</span> Email Address
                                                    </label>
                                                    <input class="form-control" required readonly type="email" name="email" id="email" value="<?php echo $rows['email'];?>">
                                                </div>
                                                <div class="required form-group">
                                                    <label for="phone">
                                                       <span class="required">*</span> Contact Number
                                                    </label>
                                                    <input class="form-control" type="number" required minlength="10"  maxlength="12" min="0" name="contact_no" id="contact_no" value="<?php echo $rows['contact_no'];?>">
                                                </div>
                                                <div class="required form-group">
                                                    <label for="email">
                                                       <span class="required">*</span> User Image
                                                    </label>
                                                    <img src='<?php echo BASE_URL; ?>images/user/thumb/<?php echo $rows['image']; ?>' width="80"/>
                                                    <input class="form-control" type="file" name="image" id="image" value="">
                                                </div>
                                                <div class="form-group">
                                                    <input type="hidden" name="mode" value="<?php echo base64_encode('managePersonalInfo'); ?>" />
                                                    <input type="hidden" name="id" value="<?php echo $login_id; ?>" />
                                                    <button type="button" onclick="formSubmit('personalinfoForm', 'personalinfoResult', '<?php echo BASE_URL; ?>user/general_operations.php')" class="btn btn-secondary btn-sm" id="checkBtn">Save</button>
                                                </div>
                                            </fieldset>
                                        </form> <!-- .std -->
                                    </div>

                                    <ul class="footer_links clearfix">
                                        <li><a class="btn btn-secondary btn-sm icon-left" href="<?php echo BASE_URL;?>user/my-account.php" title="Back to your account"><span>Back to your account</span></a></li>
                                        <li><a class="btn btn-secondary btn-sm icon-left" href="<?php echo BASE_URL;?>" title="Home"><span>Home</span></a></li>
                                    </ul>
                                </div><!-- #center_column -->
                                <div id="left_column" class="column col-xs-12 col-sm-3"><!-- Block myaccount module -->
                                    <?php include './sidebar.php'; ?>
                                </div>
                            </div><!--.row-->
                        </div><!--.large-left-->
                    </div><!-- .row -->
                </div><!-- .container -->
            </div><!-- #columns -->
        </div><!-- .columns-container -->
        <!-- Footer -->
        <?php include '../include/footer.php'; ?><!-- #footer -->
    </div><!-- #page -->
</body>
