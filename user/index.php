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
include '../include/user_header.php';

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

$siteTitle = "Marketplace | My Account";
?>
<style>
    .bg_lb{ background:#27a9e3;}
    .bg_db{ background:#2295c9;}
    .bg_lg{ background:#28b779;}
    .bg_dg{ background:#28b779;}
    .bg_ly{ background:#ffb848;}
    .bg_dy{ background:#da9628;}
    .bg_ls{ background:#2255a4;}
    .bg_lo{ background:#da542e;}
    .bg_lr{ background:#f74d4d;}
    .bg_lv{ background:#603bbc;}
    .bg_lh{ background:rgba(103, 58, 183, 0.76);}

    /* Stat boxes and quick actions */
    .quick-actions_homepage {
        width:100%;
        text-align:center; position:relative;
        float:left;
        margin-top:10px;
    }
    .stat-boxes, .quick-actions, .quick-actions-horizontal, .stats-plain {
        display: block;
        list-style: none outside none;
        margin: 15px 0;
        text-align: center;
    }
    .stat-boxes2 {
        display: inline-block;
        list-style: none outside none;
        margin:0px; 
        text-align: center;
    }
    .stat-boxes2 li {
        display: inline-block;
        line-height: 18px;
        margin: 0 10px 10px;
        padding: 0 10px; background:#fff; border: 1px solid #DCDCDC
    }
    .stat-boxes2 li:hover{ background: #f6f6f6; }
    .stat-boxes2 .left, .stat-boxes .right {
        text-shadow: 0 1px 0 #fff;
        float: left;
    }
    .stat-boxes2 .left {
        border-right: 1px solid #DCDCDC;
        box-shadow: 1px 0 0 0 #FFFFFF;
        font-size: 10px;
        font-weight: bold;
        margin-right: 10px;
        padding: 10px 14px 6px 4px;
    }
    .stat-boxes2 .right {
        color: #666666;
        font-size: 12px;
        padding: 9px 10px 7px 0;
        text-align: center;
        min-width: 70px; float:left
    }
    .stat-boxes2 .left span, .stat-boxes2 .right strong {
        display: block;
    }
    .stat-boxes2 .right strong {
        font-size: 26px;
        margin-bottom: 3px;
        margin-top: 6px;
    }
    .quick-actions_homepage .quick-actions li{ position:relative;}
    .quick-actions_homepage .quick-actions li .label{ position:absolute; padding:5px; top:-10px; right:-5px;}
    .stats-plain {
        width: 100%;
    }
    .stat-boxes li, .quick-actions li, .quick-actions-horizontal li {
        float: left;
        line-height: 18px;
        margin: 0 10px 10px 0px;
        padding: 0 10px;
    }
    .stat-boxes li a:hover, .quick-actions li a:hover, .quick-actions-horizontal li a:hover, .stat-boxes li:hover, .quick-actions li:hover, .quick-actions-horizontal li:hover {
        background: #2E363F;
    }
    .quick-actions li {
        min-width:14%;
        min-height:70px;
    }
    .quick-actions_homepage .quick-actions .span3{ width:30%;}
    .quick-actions li, .quick-actions-horizontal li {
        padding: 0;
    }
    .stats-plain li {
        padding: 0 30px;
        display: inline-block;
        margin: 0 10px 20px;
    }
    .quick-actions li a {
        padding:10px 30px; 
    }
    .stats-plain li h4 {
        font-size: 40px;
        margin-bottom: 15px;
    }
    .stats-plain li span {
        font-size: 14px;
        color: #fff;
    }
    .quick-actions-horizontal li a span {
        padding: 10px 12px 10px 10px;
        display: inline-block;
    }
    .quick-actions li a, .quick-actions-horizontal li a {
        display: block;
        color: #fff; font-size:14px;
        font-weight:lighter;
    }
    .quick-actions li a i[class^="fa"], .quick-actions li a i[class*=" fa"] {
        font-size:30px;
        display: block;	
        margin: 0 auto 5px;
    }
    .quick-actions-horizontal li a i[class^="icon-"], .quick-actions-horizontal li a i[class*=" icon-"] {
        background-repeat: no-repeat;
        background-attachment: scroll;
        background-position: center;
        background-color: transparent;
        width: 16px;
        height: 16px;
        display: inline-block;
        margin: -2px 0 0 !important;
        border-right: 1px solid #dddddd;
        margin-right: 10px;
        padding: 10px;
        vertical-align: middle;
    }

    .quick-actions li:active, .quick-actions-horizontal li:active {
        background-image: -webkit-gradient(linear, 0 0%, 0 100%, from(#EEEEEE), to(#F4F4F4));
        background-image: -webkit-linear-gradient(top, #EEEEEE 0%, #F4F4F4 100%);
        background-image: -moz-linear-gradient(top, #EEEEEE 0%, #F4F4F4 100%);
        background-image: -ms-linear-gradient(top, #EEEEEE 0%, #F4F4F4 100%);
        background-image: -o-linear-gradient(top, #EEEEEE 0%, #F4F4F4 100%);
        background-image: linear-gradient(top, #EEEEEE 0%, #F4F4F4 100%);
        box-shadow: 0 1px 4px 0 rgba(0,0,0,0.2) inset, 0 1px 0 rgba(255,255,255,0.4);
    }
    .stat-boxes .left, .stat-boxes .right {
        text-shadow: 0 1px 0 #fff;
        float: left;
    }
    .stat-boxes .left {
        border-right: 1px solid #DCDCDC;
        box-shadow: 1px 0 0 0 #FFFFFF;
        font-size: 10px;
        font-weight: bold;
        margin-right: 10px;
        padding: 10px 14px 6px 4px;
    }
    .stat-boxes .right {
        color: #666666;
        font-size: 12px;
        padding: 9px 10px 7px 0;
        text-align: center;
        min-width: 70px;
    }
    .stat-boxes .left span, .stat-boxes .right strong {
        display: block;
    }
    .stat-boxes .right strong {
        font-size: 26px;
        margin-bottom: 3px;
        margin-top: 6px;
    }
    .stat-boxes .peity_bar_good, .stat-boxes .peity_line_good {
        color: #459D1C;
    }
    .stat-boxes .peity_bar_neutral, .stat-boxes .peity_line_neutral {
        color: #757575;
    }
    .stat-boxes .peity_bar_bad, .stat-boxes .peity_line_bad {
        color: #BA1E20;
    }
    .stats-plain {
    }

    .site-stats {
        margin: 0;
        padding: 0; text-align:center;
        list-style: none;
    }
    .site-stats li {
        cursor: pointer; display:inline-block;
        margin: 0 5px 10px; text-align:center; width:42%;
        padding:10px 0; color:#fff;
        position: relative;
    }
    .site-stats li i{ font-size:24px; clear:both}
    .site-stats li:hover { background:#2E363F;
    }

    .site-stats li i {
        vertical-align: baseline;
    }
    .site-stats li strong {
        font-weight: bold;
        font-size: 20px; width:100%; float:left;
        margin-left:0px;
    }
    .site-stats li small {
        margin-left:0px;
        font-size: 11px;
        width:100%; float:left;
    }
</style>
<body id="contact" class="contact hide-left-column hide-right-column lang_en  one-column">
    <div id="page">
        <?php // include 'user_header.php';   ?>
        <div class="columns-container">
            <div id="columns">
                <!-- Breadcrumb -->
                <div class="breadcrumb container">
                    <ul>
                        <li class="home"><a class="home" href="<?php echo BASE_URL; ?>" title="Return to Home">home</a></li>
                        <li class="crumb-2 last"><span class="navigation-pipe">&gt;</span><span class="navigation_page">Your account information</span></li>
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
                                        <h1 class="page-subheading">Welcome <span style="font-style: italic;"><?php echo $_SESSION['user_name']; ?></span><br/><small>Account information</small></h1>


                                        <div class="container-fluid">
                                            <div class="quick-actions_homepage">
                                                <ul class="quick-actions">
                                                    <li class="bg_lb"> <a href="<?php echo BASE_URL; ?>user/my-account.php"> <i class="fa fa-dashboard"></i> My Dashboard </a> </li>
                                                    <li class="bg_ly"> <a href="<?php echo BASE_URL; ?>user/personal-info.php"> <i class="fa fa-user-plus"></i> Personal Info </a> </li>
                                                    <li class="bg_lg"> <a href="<?php echo BASE_URL; ?>user/my-order.php"> <i class="fa fa-cart-arrow-down"></i> <span class="label label-important">10</span>Manage Orders</a> </li>
                                                    <!--<li class="bg_lh"> <a href="<?php echo BASE_URL; ?>user/my-upload-prescription/"> <i class="fa fa-medkit"></i>Manage Prescription</a> </li>-->
                                                    <li class="bg_lr"> <a href="<?php echo BASE_URL; ?>user/change-password.php"> <i class="fa fa-key"></i> Password</a> </li>
                                                </ul>
                                            </div>
                                        </div>

                                        <!-- .std -->
                                    </div>

                                    <ul class="footer_links clearfix">
                                        <li><a class="btn btn-secondary btn-sm icon-left" href="<?php echo BASE_URL; ?>user/my-account.php" title="Back to your account"><span>Back to your account</span></a></li>
                                        <li><a class="btn btn-secondary btn-sm icon-left" href="<?php echo BASE_URL; ?>" title="Home"><span>Home</span></a></li>
                                    </ul>
                                </div><!-- #center_column -->
                                <div id="left_column" class="column col-xs-12 col-sm-3">
                                    <!-- Block myaccount module -->
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

</html>