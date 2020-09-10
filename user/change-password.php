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

$siteTitle = "Jewelry at Home | Change Password";
include '../include/user_header.php';
?>
<body id="contact" class="contact hide-left-column hide-right-column lang_en  one-column">
    <div id="page">
        <?php // include './user_header.php'; ?>
        <div class="columns-container">
            <div id="columns">
                <!-- Breadcrumb -->
                <div class="breadcrumb container">
                    <ul>
                        <li class="home"><a class="home" href="<?php echo BASE_URL; ?>" title="Return to Home">home</a></li>
                        <li class="crumb-1"><a href="<?php echo BASE_URL; ?>user/<?php echo $_SESSION['MarketPlaceSlug']; ?>/my-account/" title="My account">My account</a></li>
                        <li class="crumb-1"><a href="<?php echo BASE_URL; ?>user/<?php echo $_SESSION['MarketPlaceSlug']; ?>/my-account/" title="My account">My account</a></li>
                        <li class="crumb-2 last"><span class="navigation-pipe">&gt;</span><span class="navigation_page">Your personal information</span></li>
                    </ul>
                </div>
                <!-- /Breadcrumb -->
                <div id="slider_row">
                    <div id="top_column" class="center_column">
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="large-left col-sm-12">
                            <div class="row">
                                <div id="center_column" class="center_column col-xs-12 col-sm-9 accordionBox">
                                    <div class="box">

                                        <?php $temp_login = $_GET['temp_login']; ?>
                                        <?php
                                        if ($temp_login) {
                                            echo '  <h1 class="page-subheading">Set New Password</h1>';
                                            echo ' <h4> You are login with Temporary password Set your new Passoword </h4>';
                                        } else {
                                            echo '  <h1 class="page-subheading"> Change Password</h1>';
                                        }
                                        ?>
                                        <p class="required">
                                            <sup>*</sup>Required field
                                        </p>
                                        <div id="passwordinfoResult"></div>

                                        <form id="passwordinfoForm" enctype="multipart/form-data" method="post" class="std">
                                            <fieldset>
                                                <?php if (!$temp_login) { ?>
                                                    <div class="required form-group">
                                                        <label for="old_passwd">
                                                            <span class="required">*</span> Current Password
                                                        </label>
                                                        <input class="form-control" type="password"  data-validate="isPasswd" required name="old_passwd" required id="old_passwd">
                                                    </div>
                                                <?php } ?>
                                                <div class="password form-group">
                                                    <label for="passwd">
                                                        <span class="required">*</span> New Password
                                                    </label>
                                                    <input class="form-control" type="password"  minlength="5" maxlength="20" required="required" class="form-control"  name="passwd" id="npass">
                                                </div>
                                                <div class="password form-group">
                                                    <label for="confirmation">
                                                        <span class="required">*</span> Confirmation
                                                    </label>
                                                    <input class="form-control" type="password"  minlength="5" equalTo="#npass" maxlength="20" required="required" class="form-control" name="confirmation" id="confirmation">
                                                </div>
                                                <div class="form-group">
                                                    <input type="hidden" name="mode" value="<?php echo base64_encode('managePasswordInfo'); ?>" />
                                                    <input type="hidden" name="id" value="<?php echo $login_id; ?>" />
                                                    <input type="hidden" name="temp_login" value="<?php echo $_GET['temp_login']; ?>" />
                                                    <button type="button" onclick=" formSubmit('passwordinfoForm', 'passwordinfoResult', '<?php echo BASE_URL; ?>user/general_operations.php');
                                                           " class="btn btn-secondary btn-sm" id="checkBtn">Save</button>
                                                </div>
                                            </fieldset>
                                        </form> <!-- .std -->
                                    </div>
                                    <ul class="footer_links clearfix">
                                        <li><a class="btn btn-secondary btn-sm icon-left" href="<?php echo BASE_URL; ?>user/<?php echo $_SESSION['MarketPlaceSlug']; ?>/my-account/" title="Back to your account"><span>Back to your account</span></a></li>
                                        <li><a class="btn btn-secondary btn-sm icon-left" href="<?php echo BASE_URL; ?>" title="Home"><span>Home</span></a></li>
                                    </ul>
                                </div>
                                <!-- #center_column -->
                                <div id="left_column" class="column col-xs-12 col-sm-3">
                                    <?php include './sidebar.php'; ?>
                                </div>
                            </div><!--.row-->
                        </div><!--.large-left-->
                    </div><!-- .row -->
                </div><!-- .container -->
            </div><!-- #columns -->
        </div><!-- .columns-container -->
        <!-- Footer -->
        <script>
            function pagefrgt() {
                var passwd = $('#passwd').val();
                var confirmation = $('#confirmation').val()
                if (passwd != '' && confirmation != '') {
                    window.setTimeout(function () {
                        location.href = 'http://www.fxpips.co.uk/marketplace/';
                    }, 3000);
                }
            }
        </script>
        <?php include '../include/footer.php'; ?><!-- #footer -->
    </div><!-- #page -->
</body>
</html>