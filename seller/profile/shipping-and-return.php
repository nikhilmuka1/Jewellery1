<?php
include '../../page_fragment/define.php';
include '../../page_fragment/topScript.php';
$site_title = "Seller Policy | Jewelry at Home";
include '../../seller_inc/config.php';
$table = "users";
$condition = " `id`='" . $_SESSION['DH_seller_id'] . "'";
$result = $dbComObj->viewData($conn, "users", "*", $condition);
$row = $dbComObj->fetch_assoc($result);
$shipping_return_policy = $row['shipping_return_policy'];
$shop_policy = $row['shop_policy'];
$payment_policy = $row['payment_policy'];
?>
<?php include '../../seller_inc/template_start.php'; ?>
<?php include '../../seller_inc/page_head.php'; ?>
<!-- Page content -->
<div id="page-content">
    <!-- Forms General Header -->
    <div class="content-header">
        <div class="header-section">
            <h1>
                <i class="gi gi-notes_2"></i>Manage your Policy's<br><small>Manage your profile!</small>
            </h1>
        </div>
    </div>
    <ul class="breadcrumb breadcrumb-top">
        <li><a href="<?php echo SELLER_URL; ?>dashboard/">Dashboard</a></li>
        <li>Manage Policy</li>
    </ul>
    <!-- END Forms General Header -->
    <!-- Form Example with Blocks in the Grid -->
    <div class="row">
        <div class="col-sm-12">
            <!-- Example Form Block -->
            <div class="block">
                <!-- Example Form Title -->
                <div class="block-title">
                    <h2>Manage Your Policy</h2>
                </div>
                <!-- END Example Form Title -->
                <!-- Example Form Content -->
                <div id="policy_result"></div>
                <form action="<?php echo SELLER_URL; ?>profile/profile_operations.php" method="post" id="editPolicy"   enctype="multipart/form-data" >
                    <!-- SELECT2 EXAMPLE -->
                    <div class="box box-default">
                        <div class="box-header with-border">
                            <!--<h3 class="box-title">Edit Policy</h3>-->
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">
                                <div class="clearfix">&nbsp;</div>       
                                 <div class="col-md-8 col-md-offset-2">
                                    <div class="form-group">
                                        <label>Shop Policy</label>
                                          
                                         <textarea class="form-control" rows= "6" id="txtEditorWYSIWYGAJpolicy" name="shop_policy"><?php echo base64_decode($shop_policy); ?></textarea>
                                          
                                    </div><!-- /.form-group -->
                                </div>
                                 <div class="col-md-8 col-md-offset-2">
                                     
                                    <div class="form-group">
                                        <label> Shipping and Return </label>
                                         <textarea class="form-control" id="txtEditorWYSIWYGAJshipping" name="shipping_return_policy" rows= "6"><?php echo base64_decode($shipping_return_policy); ?></textarea>
                                        
                                    </div><!-- /.form-group -->
                                </div>
                                  <div class="col-md-8 col-md-offset-2">
                                    <div class="form-group">
                                        <label>Payment Policy</label>
                                             <textarea class="form-control" rows= "6" id="txtEditorWYSIWYGAJpayment" name="payment_policy"><?php echo base64_decode($payment_policy); ?></textarea>
                                
                                    </div><!-- /.form-group -->
                                </div>
                                 
                                <div class="clearfix">&nbsp;</div>
                                
                                <div class="col-md-8 col-md-offset-2">
                                    <input type="hidden" id="id" name="id" value="<?php echo $_SESSION['DH_seller_id']; ?>" />
                                    <input type="hidden" name="todo" value="<?php echo base64_encode("editPolicy"); ?>" />
                                        <input type="submit" name="save" value="Save" class="btn btn-success srSubmitBtn" />
<!--                                    <button class="btn btn-success srSubmitBtn"  onclick="formSubmit('editPolicy', 'policy_result', '<?php echo SELLER_URL; ?>profile/profile_operations.php')">Save</button>
                                    <button type="submit" name="submit" class="btn btn-primary btn-block btn-flat">Submit</button></br>-->
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

<?php include '../../seller_inc/page_footer.php'; ?>
<?php include '../../seller_inc/template_scripts.php'; ?>
<!-- Load and execute javascript code used only in this page -->
<script src="../../js/pages/formsGeneral.js"></script>
<script>$(function () {
    FormsGeneral.init();
});</script>

<script src="http://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.2/ckeditor.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.2/adapters/jquery.js"></script>

<script>
$('#txtEditorWYSIWYGAJpolicy').ckeditor({
    height: "300px",
    toolbarStartupExpanded: true,
    width: "100%"
});
$('#txtEditorWYSIWYGAJpayment').ckeditor({
    height: "300px",
    toolbarStartupExpanded: true,
    width: "100%"
});
$('#txtEditorWYSIWYGAJshipping').ckeditor({
    height: "300px",
    toolbarStartupExpanded: true,
    width: "100%"
});

</script>
<script src="../../plugin/Bootstrap-WYSIWYG-LineControl-TextEditor/editor.js"></script>
<link href="../../plugin/Bootstrap-WYSIWYG-LineControl-TextEditor/editor.css" type="text/css" rel="stylesheet"/>
    <!--     <script>
            $(document).ready(function() {
                $("#txtEditorWYSIWYGAJpolicy").Editor();
                $("#txtEditorWYSIWYGAJpolicy").Editor("getText");
                   $("#txtEditorWYSIWYGAJpayment").Editor();
                      $("#txtEditorWYSIWYGAJpayment").Editor("getText");
                      $("#txtEditorWYSIWYGAJshipping").Editor();
                         $("#txtEditorWYSIWYGAJshipping").Editor("getText");
            });
        </script> -->
<?php include '../../seller_inc/template_end.php'; ?>