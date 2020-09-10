<?php
include '../../page_fragment/define.php';
include '../../page_fragment/topScript.php';
$site_title = "Seller Shop Profile | Jewelry at Home";
include '../../seller_inc/config.php';
$table = "users";
$condition = " `id`='" . $_SESSION['DH_seller_id'] . "'";
$result = $dbComObj->viewData($conn, "users", "*", $condition);
$row = $dbComObj->fetch_assoc($result);
//$city = $row['shop_city'];
//$state = $row['shop_state'];
//$address = $row['shop_address'];
$shop_name = $row['shop_name'];
$discripation = $row['discripation'];
$shop_heading = $row['shop_heading'];
//$country = $row['shop_country'];
$cover_image  = $row['cover_image'];
$shop_image = $row['shop_image'];
$shop_contact  = $row['shop_contact'];
extract($row);

   //   city`, `state`, `country`, `password`, `address`, `shop_name`, `discripation`, `shop_heading`,
?>
<?php include '../../seller_inc/template_start.php'; ?>
<?php include '../../seller_inc/page_head.php'; ?>
<!-- Page content -->
<div id="page-content">
    <!-- Forms General Header -->
    <div class="content-header">
        <div class="header-section">
            <h1>
                <i class="gi gi-notes_2"></i>Manage your Shop's<br><small>Manage your shop!</small>
            </h1>
        </div>
    </div>
    <ul class="breadcrumb breadcrumb-top">
        <li><a href="<?php echo SELLER_URL; ?>dashboard/">Dashboard</a></li>
        <li>Manage Shop</li>
    </ul>
    <!-- END Forms General Header -->
    <!-- Form Example with Blocks in the Grid -->
    <div class="row">
        <div class="col-sm-12">
            <!-- Example Form Block -->
            <div class="block">
                <!-- Example Form Title -->
                <div class="block-title">
                    <h2>Manage Your Shop</h2>
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
                                        <label>Shop Name</label>
                                        <input type="text" id="shop_name"  name="shop_name" required="required" pattern="^[a-zA-Z]{3,}$" class="form-control" value="<?php echo $shop_name; ?>"/>
                                    </div><!-- /.form-group -->
                                </div>
                                 <div class="col-md-6 col-md-offset-3">
                                    <div class="form-group">
                                        <label>shop contact</label>
                                          <input minlength="10" maxlength="12" pattern="[789][0-9]{9}" placeholder="Contact No" class="form-control sr-msg-error" required="Please enter valid mobile no" name="shop_contact" type="number" value="<?php echo $shop_contact; ?>">
                                    </div><!-- /.form-group -->
                                </div>
                                  <div class="col-md-6 col-md-offset-3">
                                    <div class="form-group">
                                        <label>Shop Heading/Title</label>
                                        <input type="text" id="shop_heading" name="shop_heading" required="required" pattern="^[a-zA-Z]{3,}$" class="form-control" value="<?php echo $shop_heading; ?>"/>
                                    </div><!-- /.form-group -->
                                </div>
                                 <div class="col-md-6 col-md-offset-3">
                                    <div class="form-group">
                                        <label> Shop Discription</label>
                                         <textarea class="form-control" id="comment" name="discripation"><?php echo $discripation; ?></textarea>
                                        
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
                                        <label>Google plus URL</label>
                                        <input type="url" id="googleplus" name="googleplus" minlength="22"  title="please Enter vlaid URL" required="required" pattern="^[a-zA-Z]{3,}$" class="form-control" value="<?php echo $googleplus; ?>"/>
                                    </div><!-- /.form-group -->
                                </div>
                                   <div class="col-md-6 col-md-offset-3">
                                    <div class="form-group">
                                        <label>pinrest URL</label>
                                        <input type="url" id="shop_heading" name="pinrest" minlength="22"  title="please Enter vlaid URL" required="required" pattern="^[a-zA-Z]{3,}$" class="form-control" value="<?php echo $pinrest; ?>"/>
                                    </div><!-- /.form-group -->
                                </div>
                                  <div class="col-md-6 col-md-offset-3">
                                    <div class="form-group">
                                        <label> Shop Photo</label>
                                          <?php if(isset($row['shop_image']) && $row['shop_image']) { ?>
                                        <img src='../../images/user/shop/<?php if(isset($row['shop_image']))echo $row['shop_image']; ?>' width="80"/>
                                          <?php  } ?>
                                        <input type="file" id="imgshop" name="shop_image" class="form-control"/>
                                    </div><!-- /.form-group -->
                                </div>
<!--                                 <div class="col-md-6 col-md-offset-3">
                                    <div class="form-group">
                                        <label>Country</label>
                                        <input type="text" id="country" name="shop_country" required="required" pattern="^[a-zA-Z]{3,}$" class="form-control" value="<?php echo $country; ?>"/>
                                    </div> /.form-group 
                                </div>
                                 <div class="col-md-6 col-md-offset-3">
                                    <div class="form-group">
                                        <label>State</label>
                                        <input type="text" id="state" name="shop_state" required="required" pattern="^[a-zA-Z]{3,}$" class="form-control" value="<?php echo $state; ?>"/>
                                    </div> /.form-group 
                                </div>
                                 <div class="col-md-6 col-md-offset-3">
                                    <div class="form-group">
                                        <label>City</label>
                                        <input type="text" id="city" name="shop_city" required="required" pattern="^[a-zA-Z]{3,}$" class="form-control" value="<?php echo $city; ?>"/>
                                    </div> /.form-group 
                                </div>
                                   <div class="col-md-6 col-md-offset-3">
                                    <div class="form-group">
                                        <label>Address</label>
                                         <textarea class="form-control" id="comment" name="shop_address"><?php echo $address; ?></textarea>
                                    </div> /.form-group 
                            </div> /.row -->
                              <div class="col-md-6 col-md-offset-3">
                                <div class="clearfix">&nbsp;</div>
                                
                                <div class="col-md-6 col-md-offset-3">
                                    <input type="hidden" id="id" name="id" value="<?php echo $_SESSION['DH_seller_id']; ?>" />
                                    <input type="hidden" name="todo" value="<?php echo base64_encode("editshop"); ?>" />
                                    <a class="btn btn-success srSubmitBtn" href="javascript:;" onclick="formSubmit('editprofile', 'profile_result', '<?php echo SELLER_URL; ?>profile/profile_operations.php')">Update</a>
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

<?php include '../../seller_inc/page_footer.php'; ?>
<?php include '../../seller_inc/template_scripts.php'; ?>
<!-- Load and execute javascript code used only in this page -->
<script src="../../js/pages/formsGeneral.js"></script>
<script>$(function () {
    FormsGeneral.init();
});</script>
<?php include '../../seller_inc/template_end.php'; ?>