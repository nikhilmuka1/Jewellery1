<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        include '../page_fragment/define.php';
        include_once ('../page_fragment/njGeneral.php');
        $njGenObj = new njGeneral();
        if ($njGenObj->isLoggedIn()) {
            header("Location:" . ADMIN_URL . "dashboard/");
        }$site_title = "Admin Login | MarketPalace";
        ?>
        <?php include '../inc/config.php'; ?>
        <?php include '../inc/template_start.php'; ?>
        <!-- Login Background -->
        <!-- For best results use an image with a resolution of 2560x400 pixels (prefer a blurred image for smaller file size) -->
        <img src="../img/placeholders/photos/background.jpg" alt="Login Full Background" class="full-bg animation-pulseSlow">
        <!-- END Login Background -->
        <!-- Login Container -->
        <div id="login-container" class="animation-fadeIn">
            <!-- Login Title -->
            <div class="login-title text-center">
                    <!--  <img src="../img/drug_logo.png" style="width: 50%;"/> -->
                <h1 style="margin-top: 0px;">
                    <small>Please 

                        <strong>Login</strong> - 

                        <strong>MarketPlace (ADMIN)</strong>
                    </small>
                </h1>
            </div>
            <!-- END Login Title -->
            <!-- Login Block -->
            <div class="block push-bit">
                <!-- Login Form -->
                <div id="errorMessageLog"></div>
                <form method="post" id="form-login" class="form-horizontal form-bordered form-control-borderless">
                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="gi gi-envelope"></i>
                                </span>
                                <input type="text" id="login-email" name="login-email" class="form-control input-lg" placeholder="Email" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="gi gi-asterisk"></i>
                                </span>
                                <input type="password" id="login-password" name="login-password" class="form-control input-lg" placeholder="Password" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group form-actions">
                        <div class="col-xs-12 text-center">
                            <input type="hidden" name="mode" value="

                                   <?php echo base64_encode("login"); ?>" />
                            <button type="button" onclick="formSubmit('form-login', 'errorMessageLog', '<?php echo ADMIN_URL; ?>admin_operations.php')" class="btn btn-sm btn-primary">
                                <i class="fa fa-angle-right"></i> Login to Dashboard

                            </button>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12 text-center">
                            <a href="javascript:void(0)" id="link-reminder-login">
                                <small>Forgot password?</small>
                            </a>
                        </div>
                    </div>
                </form>
                <!-- END Login Form -->
                <!-- Reminder Form -->
                <form action="login.php#reminder" method="post" id="form-reminder" class="form-horizontal form-bordered form-control-borderless display-none">
                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="gi gi-envelope"></i>
                                </span>
                                <input type="text" id="reminder-email" name="reminder-email" class="form-control input-lg" placeholder="Email">
                            </div>
                        </div>
                    </div>
                    <div class="form-group form-actions">
                        <div class="col-xs-12 text-right">
                            <button type="submit" class="btn btn-sm btn-primary">
                                <i class="fa fa-angle-right"></i> Reset Password
                            </button>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12 text-center">
                            <small>Did you remember your password?</small>
                            <a href="javascript:void(0)" id="link-reminder">
                                <small>Login</small>
                            </a>
                        </div>
                    </div>
                </form>
                <!-- END Reminder Form -->
            </div>
            <!-- END Login Block -->
            <!-- Footer -->
            <footer class="text-muted text-center">
                <small>
                    <span id="year-copy"></span> &copy; 

                    <a href="#" target="_blank">MMF</a>
                </small>
            </footer>
            <!-- END Footer -->
        </div>
        <!-- END Login Container -->
        <?php include '../inc/template_scripts.php'; ?>
        <!-- Load and execute javascript code used only in this page -->
        <script src="../js/pages/login.js"></script>
        <script>
        $(function () {
        Login.init();
        });
        </script>
        <?php include '../inc/template_end.php'; ?>
    </body>
</html>