<?php
include '../../page_fragment/define.php';
include '../../page_fragment/topScript.php';
$site_title = "Admin Profile | Jewelry at Home";
include '../../inc/config.php';
$table = "admin";
$condition = " `id`='" . $_SESSION['DH_admin_id'] . "'";
$result = $dbComObj->viewData($conn, "admin", "*", $condition);
$row = $dbComObj->fetch_assoc($result);
$name = $row['name'];
$email = $row['email'];
$mobile = $row['mobile'];
extract($row);
?>
<?php include '../../inc/template_start.php'; ?>
<?php include '../../inc/page_head.php'; ?>

<!-- Page content -->
<div id="page-content">
    <!-- Forms General Header -->
    <div class="content-header">
        <div class="header-section">
            <h1>
                <i class="gi gi-notes_2"></i>Manage your Profile's<br><small>Manage your profile!</small>
            </h1>
        </div>
    </div>
    <ul class="breadcrumb breadcrumb-top">
        <li><a href="<?php echo ADMIN_URL; ?>dashboard/">Dashboard</a></li>
        <li>Manage Profile</li>
    </ul>
    <!-- END Forms General Header -->
    <!-- Form Example with Blocks in the Grid -->
    <div class="row">
        <div class="col-sm-12">
            <!-- Example Form Block -->
            <div class="block">
                <!-- Example Form Title -->
                <div class="block-title">
                    <h2>Manage Your Profile</h2>
                </div>
                <!-- END Example Form Title -->
                <!-- Example Form Content -->
                <div id="profile_result"></div>
                <form action="" method="post" id="editprofile" onsubmit="return false;" enctype="multipart/form-data" >
                    <!-- SELECT2 EXAMPLE -->
                    <div class="box box-default">
                        <div class="box-header with-border">
                            <!--<h3 class="box-title">Edit Profile</h3>-->
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">
                                <div class="clearfix">&nbsp;</div>
                                <div class="col-md-6 col-md-offset-3">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" id="name" name="name" required="required" pattern="^[a-zA-Z]{3,}$" class="form-control" value="<?php echo $name; ?>"/>
                                    </div><!-- /.form-group -->
                                </div>
                                <div class="clearfix">&nbsp;</div>
                                <div class="col-md-6 col-md-offset-3">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" readonly id="email" name="email" required="required" class="form-control" value="<?php echo $email; ?>" />
                                    </div><!-- /.form-group -->
                                </div>
                                <div class="clearfix">&nbsp;</div>
                                <div class="col-md-6 col-md-offset-3">
                                    <div class="form-group">
                                        <label>Mobile</label>
                                        <input type="number"  minlength="10" maxlength="12"  minlength="12" id="mobile" name="mobile" required  mobile="^[789][0-9]{9}$" class="form-control" value="<?php echo $mobile; ?>" />
                                    </div><!-- /.form-group -->
                                </div>
                                <div class="col-md-6 col-md-offset-3">
                                    <div class="form-group">
                                        <label>Profile Photo</label>
                                        <img src='../../images/user/<?php echo $row['image']; ?>' width="80"/>
                                        <input type="file" id="img" name="image" class="form-control"/>
                                    </div><!-- /.form-group -->
                                </div>
                                 <div class="col-md-6 col-md-offset-3">
                                    <div class="form-group">
                                        <label> Facebook URL</label>
                                        <input type="url" id="facebook" minlength="25" title="please Enter vlaid URL" name="facebook" required="required" pattern="^[a-zA-Z]{3,}$" class="form-control" value="<?php echo $facebook; ?>"/>
                                    </div><!-- /.form-group -->
                                </div>
                                   <div class="col-md-6 col-md-offset-3">
                                    <div class="form-group">
                                        <label>Twitter URL</label>
                                        <input type="url" id="twitter" name="twitter"  minlength="20"  title="please Enter vlaid URL" required="required" pattern="^[a-zA-Z]{3,}$" class="form-control" value="<?php echo $twitter; ?>"/>
                                    </div><!-- /.form-group -->
                                </div>
                                   <div class="col-md-6 col-md-offset-3">
                                    <div class="form-group">
                                        <label>Google Plus URL</label>
                                        <input type="url" id="googleplus" name="googleplus" minlength="22"  title="please Enter vlaid URL" required="required" pattern="^[a-zA-Z]{3,}$" class="form-control" value="<?php echo $googleplus; ?>"/>
                                    </div><!-- /.form-group -->
                                </div>
                                   <div class="col-md-6 col-md-offset-3">
                                    <div class="form-group">
                                        <label>Pinterest URL</label>
                                        <input type="url" id="shop_heading" name="pinterest" minlength="22"  title="please Enter vlaid URL" required="required" pattern="^[a-zA-Z]{3,}$" class="form-control" value="<?php echo $pinrest; ?>"/>
                                    </div><!-- /.form-group -->
                                </div>
                                <div class="clearfix">&nbsp;</div>
                                
                                <div class="col-md-6 col-md-offset-3">
                                  <?php // print_r($_SESSION);?>
                                    <input type="hidden" id="id" name="id" value="<?php echo $_SESSION['DH_admin_id']; ?>" />
                                    <input type="hidden" name="todo" value="<?php echo base64_encode("editprofile"); ?>" />
                                    <a class="btn btn-success srSubmitBtn" href="javascript:;" onclick="formSubmit('editprofile', 'profile_result', '<?php echo ADMIN_URL; ?>profile/profile_operations.php')">Update</a>
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