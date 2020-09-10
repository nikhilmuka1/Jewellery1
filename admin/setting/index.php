<?php
include '../../page_fragment/define.php';
include '../../page_fragment/topScript.php';
$site_title = "Admin Setting | Jewelry at Home";
include '../../inc/config.php';
$table = "admin_setting";
$condition='1';
$result = $dbComObj->viewData($conn, $table, "*", $condition);
$row = $dbComObj->fetch_assoc($result);

$name='';
$email="";
$mobile="";
$image='';
?>
<?php include '../../inc/template_start.php'; ?>
<?php include '../../inc/page_head.php'; ?>

<!-- Page content -->
<div id="page-content">
    <!-- Forms General Header -->
    <div class="content-header">
        <div class="header-section">
            <h1>
                <i class="gi gi-notes_2"></i>Manage your Settings's<br>
            </h1>
        </div>
    </div>
    <ul class="breadcrumb breadcrumb-top">
        <li><a href="<?php echo ADMIN_URL; ?>dashboard/">Dashboard</a></li>
        <li>Manage Setting</li>
    </ul>
    <!-- END Forms General Header -->
    <!-- Form Example with Blocks in the Grid -->
    <div class="row">
        <div class="col-sm-12">
            <!-- Example Form Block -->
            <div class="block">
                <!-- Example Form Title -->
                <div class="block-title">
                    <h2>Manage Your Setting</h2>
                </div>
                <!-- END Example Form Title -->
                <!-- Example Form Content -->
                <div id="setting_result"></div>
                <form action="" method="post" id="editSetting" onsubmit="return false;" enctype="multipart/form-data" >
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
                                        <label>Shipping chage</label>
                                        <input type="text" id="name" name="shipping_chage"  required="required" pattern="^[a-zA-Z]{3,}$" class="form-control" value="<?php if($row['shipping_chage']) echo $row['shipping_chage']; ?>"/>
                                    </div><!-- /.form-group -->
                                </div>
                                <div class="clearfix">&nbsp;</div>
                                <div class="col-md-6 col-md-offset-3">
                                    <div class="form-group">
                                        <label>Currency</label>
                                        <input type="text" id="currency" name="currency" required="required" class="form-control" value="<?php if($row['currency']) echo $row['currency']; ?>" />
                                    </div><!-- /.form-group -->
                                </div>
                                <div class="clearfix">&nbsp;</div>
                               
                                
                                <div class="col-md-6 col-md-offset-3">

                                    <input type="hidden" name="todo" value="<?php echo base64_encode("editSetting"); ?>" />
                                    <a class="btn btn-success srSubmitBtn" href="javascript:;" onclick="formSubmit('editSetting', 'setting_result', '<?php echo ADMIN_URL; ?>setting/setting_operations.php')">Save</a>
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