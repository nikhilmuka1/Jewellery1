<?php
include '../../page_fragment/define.php';
include '../../page_fragment/topScript.php';
$site_title = "Admin Profile Password's | Jewelry at Home";
include '../../inc/config.php';
?>
<?php include '../../inc/template_start.php'; ?>
<?php include '../../inc/page_head.php'; ?>
<!-- Page content -->
<div id="page-content">
    <!-- Forms General Header -->
    <div class="content-header">
        <div class="header-section">
            <h1>
                <i class="gi gi-notes_2"></i>Manage your Profile Password's<br><small>Manage your Password's!</small>
            </h1>
        </div>
    </div>
    <ul class="breadcrumb breadcrumb-top">
        <li><a href="<?php echo ADMIN_URL; ?>dashboard/">Dashboard</a></li>
        <li>Manage Profile Password's</li>
    </ul>
    <!-- END Forms General Header -->
    <!-- Form Example with Blocks in the Grid -->
    <div class="row">
        <div class="col-sm-12">
            <!-- Example Form Block -->
            <div class="block">
                <!-- Example Form Title -->
                <div class="block-title">
                    <h2>Manage Your Profile Password's</h2>
                </div>
                <!-- END Example Form Title -->
                <!-- Example Form Content -->
                <div id="pass_result"></div>
                <form action="" method="post" id="changpass" onsubmit="return false;" enctype="multipart/form-data" >
                    <!-- SELECT2 EXAMPLE -->
                    <div class="box box-default">
                        <div class="box-header with-border">
                            <!--<h3 class="box-title">Change Password</h3>-->
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">
                                <?php $temp_login = $_GET['temp_login']; ?>
                                <?php
                                if ($temp_login) {
                                    echo '  <h1 class="page-subheading">Set New Password</h1>';
                                    echo ' <h4> You are login with Temporary password Set your new Passoword </h4>';
                                } else {
                                    echo '  <h1 class="page-subheading"> Change Password</h1>';
                                }
                                ?>
                                <?php if (!$temp_login) { ?>
                                    <div class="col-md-6 col-md-offset-3">
                                        <div class="form-group">
                                            <label>Old Password</label>
                                            <input type="password" id="opass" name="old_password" minlength="5" maxlength="20" required="required" class="form-control" placeholder="Old Password" />
                                        </div><!-- /.form-group -->
                                    </div>
                                <?php } ?>
                                <div class="clearfix">&nbsp;</div>
                                <div class="col-md-6 col-md-offset-3">
                                    <div class="form-group">
                                        <label>New Password</label>
                                        <input type="password" id="npass" name="newpassword" minlength="6" maxlength="20" required="required" class="form-control" placeholder="New Password" />
                                    </div><!-- /.form-group -->
                                </div>
                                <div class="clearfix">&nbsp;</div>
                                <div class="col-md-6 col-md-offset-3">
                                    <div class="form-group">
                                        <label>Retype Password</label>
                                        <input type="password" id="cpass" name="confirmnewpassword" equalTo="#npass" minlength="6" maxlength="20" required="required" class="form-control" placeholder="Confirm Password" />
                                    </div><!-- /.form-group -->
                                </div>
                                <div class="clearfix">&nbsp;</div>
                                <div class="col-md-6 col-md-offset-3">
                                    <input type="hidden" id="id" name="id" value="<?php echo $_SESSION['DH_admin_id']; ?>" />
                                    <input type="hidden" name="todo" value="<?php echo base64_encode("changepass"); ?>" />
                                    <button type="button" class="btn btn-success srSubmitBtn" onclick="formSubmit('changpass', 'pass_result', '<?php echo ADMIN_URL; ?>profile/profile_operations.php')">Change Password</button>
                                    <!--<button type="submit" name="submit" class="btn btn-primary btn-block btn-flat">Submit</button></br>-->
                                </div><!-- /.col -->
                            </div><!-- /.row -->
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </form>
                <!-- END Example Form Content -->
            </div>
            <!-- END Example Form Block -->
        </div>
    </div>
    <!-- END Form Example with Blocks in the Grid -->
</div>
<!-- END Page Content -->
<div id="loading-overlay" class="loading-overlay"></div>
<?php include '../../inc/page_footer.php'; ?>
<?php include '../../inc/template_scripts.php'; ?>
<!-- Load and execute javascript code used only in this page -->
<script src="../../js/pages/formsGeneral.js"></script>
<script>$(function () {
                                            FormsGeneral.init();
                                        });</script>
<?php include '../../inc/template_end.php'; ?>