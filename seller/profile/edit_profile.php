<?php
include '../../page_fragment/define.php';
include '../../page_fragment/topScript.php';
$site_title = "Seller Profile | Jewelry at Home";
include '../../seller_inc/config.php';
$table = "users";
$condition = " `id`='" . $_SESSION['DH_seller_id'] . "'";
$result = $dbComObj->viewData($conn, "users", "*", $condition);
$row = $dbComObj->fetch_assoc($result);
$name = $row['name'];
$email = $row['email'];
$mobile = $row['contact_no'];
$city = $row['city'];
$state = $row['state'];
$country = $row['country'];
$address = $row['address'];
$aboutme = $row['aboutme'];

   //   city`, `state`, `country`, `password`, `address`, `shop_name`, `discripation`, `shop_heading`,
?>
<style>
    .loading-overlay{
        position: fixed;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        z-index: 999;
        background: rgba(183, 173, 173, 0.5) url(<?php echo BASE_URL; ?>img/loading.gif) no-repeat center center;
        /*background: rgba(0,0,0,0.5);*/
        display: none;
    }
    .sr-msg-error {
        border: 1px solid red;
        color: red !important;
    }
</style>
 <div id="loading-overlay" class="loading-overlay"></div>    
<?php include '../../seller_inc/template_start.php'; ?>
<?php include '../../seller_inc/page_head.php'; ?>
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
        <li><a href="<?php echo SELLER_URL; ?>dashboard/">Dashboard</a></li>
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
                                        <input type="email" id="email" readonly name="email" required="required" class="form-control" value="<?php echo $email; ?>" />
                                    </div><!-- /.form-group -->
                                </div>
                                <div class="clearfix">&nbsp;</div>
                                <div class="col-md-6 col-md-offset-3">
                                    <div class="form-group">
                                        <label>Contact no</label>
                                        <input type="number" minlength="10" maxlength="12" id="mobile" 
                                        name="contact_no" required pattern="[789][0-9]{9}"  title="Please enter Valid No."  class="form-control" value="<?php echo $mobile; ?>" />
                                    </div><!-- /.form-group -->
                                </div>
                                  <div class="col-md-6 col-md-offset-3">
                                    <div class="form-group">
                                        <label> About Me</label>
                                         <textarea class="form-control" rows="10"  id="comment" name="aboutme"><?php echo base64_decode($aboutme); ?></textarea>
                                        
                                    </div><!-- /.form-group -->
                                </div>
                                 <div class="col-md-6 col-md-offset-3">
                                     <div class="form-group">
                                        <label>Country</label>
                                    <select class="form-control" id="sel1" name="country" required <?php echo $req; ?>
                                       >
                                       <option value=''> select Country</option>
                                       <?php   
                                          $conditionC = "1 order by name";         
                                          $resultC = $dbComObj->viewData($conn,"countries", "*",$conditionC);
                                          $numC = $dbComObj->num_rows($resultC);
                                          if ($numC > 0) { 
                                          while ($dataC = $dbComObj->fetch_assoc($resultC))
                                          { ?>
                                       <option value="<?php echo $dataC['name'] ?>" <?php echo $country == $dataC['name'] ? '    selected="selected"' : '';?> ><?php echo $dataC['name'];?></option>
                                       <?php   } 
                                          } 
                                             ?>
                                    </select>
                                
                                         </div><!-- /.form-group -->
                                </div>
                                 <div class="col-md-6 col-md-offset-3">
                                    <div class="form-group">
                                        <label>State</label>
                                        <input type="text" id="state" name="state" required="required" pattern="^[a-zA-Z]{3,}$" class="form-control" value="<?php echo $state; ?>"/>
                                    </div><!-- /.form-group -->
                                </div>
                                 <div class="col-md-6 col-md-offset-3">
                                    <div class="form-group">
                                        <label>City</label>
                                        <input type="text" id="city" name="city" required="required" pattern="^[a-zA-Z]{3,}$" class="form-control" value="<?php echo $city; ?>"/>
                                    </div><!-- /.form-group -->
                                </div>
                                   <div class="col-md-6 col-md-offset-3">
                                    <div class="form-group">
                                        <label>Address</label>
                                         <textarea class="form-control" id="comment" name="address"><?php echo $address; ?></textarea>
                                    </div><!-- /.form-group -->
                                    </div>
                                <div class="col-md-6 col-md-offset-3">
                                    <div class="form-group">
                                        <label>Profile Photo</label>
                                        <?php if($row['image'] != '') { ?>
                                        <img src='../../images/user/<?php echo $row['image']; ?>' width="80"/>
                                        <?php } else { ?>
                                        <img src='../../img/user-images/avatar.jpg' width="80"/>
                                        <?php } ?>
                                        <input type="file" id="img" name="image" class="form-control"/>
                                    </div><!-- /.form-group -->
                                </div>
                                
                                <div class="clearfix">&nbsp;</div>
                                
                                <div class="col-md-6 col-md-offset-3">
                                    <input type="hidden" id="id" name="id" value="<?php echo $_SESSION['DH_seller_id']; ?>" />
                                    <input type="hidden" name="todo" value="<?php echo base64_encode("editprofile"); ?>" />
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