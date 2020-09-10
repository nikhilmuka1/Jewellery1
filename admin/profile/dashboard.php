<?php
include '../../page_fragment/define.php';
include '../../page_fragment/topScript.php';
$site_title = "Admin Dashboard | Jewelry at Home";
include '../../inc/config.php';
?>
<?php include '../../inc/template_start.php'; ?>
<?php include '../../inc/page_head.php'; ?>
<style>
    .padding-md {
        padding: 20px!important
    }
    .bg-white {
        background-color: #fff
    }

    .bg-light {
        background-color: #f1f5fc
    }

    .bg-dark {
        background-color: #222
    }

    .bg-grey {
        background-color: #eee;
        text-shadow: 0 1px #fff
    }

    .bg-primary {
        background-color: #424f63;
        color: #BECFDF
    }

    .bg-primary a {
        color: #BECFDF
    }

    .bg-primary a:focus,
    .bg-primary a:hover {
        color: #fff
    }

    .bg-warning {
        background-color: #f3ce85;
        color: #fff
    }

    .bg-info {
        background-color: #6bafbd;
        color: #fff
    }

    .bg-success {
        background-color: #65cea7;
        color: #fff
    }

    .bg-danger {
        background-color: #fc8675!important;
        color: #fff!important
    }
    .panel-stat3 {
        position: relative;
        overflow: hidden;
        padding: 25px 20px;
        margin-bottom: 20px;
        color: #fff;
        cursor: pointer;
        border-radius: 10px;
        -moz-border-radius: 10px;
        -webkit-border-radius: 10px;
    }
    .m-top-none {
        margin-top: 0;
    }
    .m-left-xs {
        margin-left: 5px;
    }
    .panel-stat3 .stat-icon {
        position: absolute;
        top: 20px;
        right: 10px;
        font-size: 30px;
        opacity: .3
    }

    .panel-stat3 .refresh-button {
        position: absolute;
        top: 10px;
        right: 10px;
        transition: all .2s ease;
        -webkit-transition: all .2s ease;
        -moz-transition: all .2s ease;
        -ms-transition: all .2s ease;
        -o-transition: all .2s ease;
        color: rgba(0, 0, 0, .3)
    }

    .panel-stat3 .refresh-button:hover {
        color: #fff;
        transition: all .2s ease;
        -webkit-transition: all .2s ease;
        -moz-transition: all .2s ease;
        -ms-transition: all .2s ease;
        -o-transition: all .2s ease
    }

</style>
<!-- Page content -->
<div id="page-content">
<!--   <div id="notifiacation_alert">
    <?php
        // DH_admin_id DH_admin_type_name Admin 
//          $login_id=$_SESSION['DH_admin_id'];
//         $User_type=$_SESSION['DH_admin_type_name'];
//        $condition_notify = "1 and notify_user_id='".$login_id."' and user_type='".$User_type."' and  `is_read` = '0'  ";// and `status` = '0'
//        $result_notify = $dbComObj->viewData($conn, "notification", "*", $condition_notify);
//        $num_notify = $dbComObj->num_rows($result_notify);
//        $nod = 1;
//        if ($num_notify > 0) {
//            while ($notification = $dbComObj->fetch_assoc($result_notify)) {
                ?>
        <div class="alert alert-info alert-dismissable notifyaj<?php echo $notification['id'];?>">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Info!</strong> <?php echo $notification['msg']; ?>
            <a href="javascript:;" onclick="return NotificationIsread( <?php echo $notification['id'].','.$notification['is_read'] ;?>);">
                <i class="fa fa-ban"></i>Read</a>
          </div>
          <?php
//            $nod++;
//        }
//    }
    ?>

</div>-->
    <?php
    $result_users = $dbComObj->viewData($conn, "`users`", "*", "1 and roll_type = '1'");
    $num_users = $dbComObj->num_rows($result_users);

    $result_seller = $dbComObj->viewData($conn, "`users`", "*", "1 and roll_type = '2'");
    $num_seller = $dbComObj->num_rows($result_seller);

    $result_orders = $dbComObj->viewData($conn, "`orders`", "*", "1 and `order_status`='1'");
    $num_orders = $dbComObj->num_rows($result_orders);
    
    $result_products = $dbComObj->viewData($conn, "`products`", "*", "1 and `status`='1' and `delete`='0'");
    $num_products = $dbComObj->num_rows($result_products);
    
    ?>
    <!-- Dashboard Header -->
    <!-- For an image header add the class 'content-header-media' and an image as in the following example -->
    <div class="content-header content-header-media">
        <div class="header-section">
            <div class="row">
                <!-- Main Title (hidden on small devices for the statistics to fit) -->
                <div class="col-md-4 col-lg-6 hidden-xs hidden-sm">
                    <h1>Welcome <strong>Admin</strong><br><small>You Look Awesome!</small></h1>
                </div>
                <!-- END Main Title -->

                <!-- Top Stats -->
                <!-- END Top Stats -->
            </div>
        </div>
        <!-- For best results use an image with a resolution of 2560x248 pixels (You can also use a blurred image with ratio 10:1 - eg: 1000x100 pixels - it will adjust and look great!) -->
        <img src="<?php echo BASE_URL; ?>img/placeholders/headers/dashboard_header.jpg" alt="header image" class="animation-pulseSlow">
    </div>
    <!-- END Dashboard Header -->

    <!-- Mini Top Stats Row -->
    <div class="padding-md">
        <div class="row">
            <div class="col-sm-6 col-md-3">
                <div class="panel-stat3 bg-danger">
                    <h2 class="m-top-none" id="userCount"><?php echo $num_users;  ?></h2>
                    <h5>Registered users</h5>
                    <div class="stat-icon">
                        <i class="fa fa-user fa-3x"></i>
                    </div>
                </div>
            </div><!-- /.col -->
            <div class="col-sm-6 col-md-3">
                <div class="panel-stat3 bg-info">
                    <h2 class="m-top-none"><?php echo $num_seller; ?></h2>
                    <h5>Registered Company</h5>
                    <div class="stat-icon">
                        <i class="fa fa-hdd-o fa-3x"></i>
                    </div>
                </div>
            </div><!-- /.col -->
            <div class="col-sm-6 col-md-3">
                <div class="panel-stat3 bg-warning">
                    <h2 class="m-top-none" id="orderCount"><?php echo $num_orders; ?></h2>
                    <h5>All Orders</h5>
                    <div class="stat-icon">
                        <i class="fa fa-shopping-cart fa-3x"></i>
                    </div>
                </div>
            </div><!-- /.col -->
            <div class="col-sm-6 col-md-3">
                <div class="panel-stat3 bg-success">
                    <h2 class="m-top-none" id="visitorCount"><?php echo $num_products; ?></h2>
                    <h5>Total Products</h5>
                    <div class="stat-icon">
                        <i class="fa fa-bar-chart-o fa-3x"></i>
                    </div>
                </div>
            </div><!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- END Mini Top Stats Row -->
</div>
<!-- END Page Content -->

<?php include '../../inc/page_footer.php'; ?>
<?php include '../../inc/template_scripts.php'; ?>

<script src="../../js/pages/index.js"></script>
<script>$(function () {
        Index.init();
    });</script>

<?php include '../../inc/template_end.php'; ?>