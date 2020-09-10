<?php
include '../../page_fragment/define.php';
include '../../page_fragment/topScript.php';
$site_title = "Admin Users | Jewelry at Home";
include '../../inc/config.php';
if(isset($_REQUEST['session_uid'])){
$id = $njEncryptionObj->safe_b64decode($_REQUEST['session_uid']);
} else {
  $id ='';  
}
$mode = "addNewUser";
$txt = "Add New";
$bxt = "Create User";
$name = '';
$email = '';
$contact_no = '';
$image = '';
$req = 'required';
$cover_image='';
$roll_type='';
$qry = $dbComObj->viewData($conn, "users", "*", "`id`='" . $id . "'");
$num = $dbComObj->num_rows($qry);
if ($num > 0) {
    $row = $dbComObj->fetch_assoc($qry);
    $mode = "manageUsers";
    $txt = "Manage";
    $bxt = "Update User";
    $req = '';
    extract($row);
 
      if ($image == '' || $image == null) {
                    $profileImage = BASE_URL.'img/user-images/avatar.jpg';
                } else {
                    $profileImage = BASE_URL.'images/user/'.$image;
                }      
   
}
 if(isset($_GET['type']) && $_GET['type']=="sellers") 
    $type="Seller";
else 
     $type="User";
?>

<?php include '../../inc/template_start.php'; ?>
<?php include '../../inc/page_head.php'; ?>

<!-- Page content -->
<div id="page-content">
    <!-- Forms General Header -->
    <div class="content-header">
        <div class="header-section">
            <h1>
                <i class="gi gi-user_add"></i><?php echo $txt.' '.$type; ?>  Here
            </h1>
        </div>
    </div>
    <ul class="breadcrumb breadcrumb-top">
        <li><a href="<?php echo ADMIN_URL; ?>dashboard/">Dashboard</a></li>
        <li><a href="<?php echo ADMIN_URL; ?>users/" class="btn btn-alt btn-xs btn-primary"><i class="hi hi-eye-open"></i> View Users List</a></li>
        <li><?php echo $txt.' '.$type; ?></li>
    </ul>
    <!-- END Forms General Header -->
    <!-- Form Example with Blocks in the Grid -->
    <div class="row">
        <div class="col-sm-12">
            <!-- Example Form Block -->
            <div class="block">
                <!-- Example Form Title -->
                <div class="block-title">
                    <h2><?php echo $txt.' '.$type; ?></h2>
                </div>
                <!-- END Example Form Title -->
                <!-- Example Form Content -->
                <div id="userResult"></div>
                <form class="form-bordered" method="post" id="userForm">
                    <div class="form-group col-md-6">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="gi gi-user"></i></span>
                            <input type="text" id="name" name="name" value="<?php echo $name; ?>" class="form-control" placeholder="Username" required>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="gi gi-iphone"></i></span>
                            <input type="number" id="contact_no" name="contact_no" minlength="10"  maxlength="12" value="<?php echo $contact_no; ?>" class="form-control" placeholder="Contact Number" required>
                        </div>
                    </div>
                    <br/>
                    <div class="form-group col-md-12">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="gi gi-envelope"></i></span>
                            <?php if($email == '') { ?>
                            <input type="email" id="email" name="email" value="<?php echo $email; ?>" class="form-control" placeholder="Email" required>
                            <?php } else { ?>
                            <input type="email" readonly id="email" name="email" value="<?php echo $email; ?>" class="form-control" placeholder="Email" required>
                            <?php } ?>
                            
                        </div>
                    </div>
                    <br/>

                    <div class="form-group col-md-6">
                        
                            <div class="input-group">
                                <span class="input-group-addon"><i class="gi gi-picture"></i></span>
                                <input type="file" id="image" name="image" <?php
                                if ($id == "") {
                                    echo ' required="required" ';
                                }
                                ?> class="form-control avatar-input">
                            </div>
                        
                          <!-- <div class="col-md-3"> 
                                        <img src='<?php echo $profileImage; ?>' width="80"/>
                               </div> -->
                       </div>
                    
                      <div class="form-group col-md-6">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="gi gi-user"></i></span>
                             <select class="form-control" id="sel1" name="roll_type" <?php echo $req; ?>>
                                <option value=''>Select User Type</option>
                                <option value='1' <?php if($roll_type =='1')echo 'selected'; ?>> Buyer </option>
                                <option value='2' <?php if($roll_type =='2')echo 'selected'; ?>> Seller </option>
								<option value='3' <?php if($roll_type =='3')echo 'selected'; ?>> Expert  </option>
                              </select>
                        </div>
                      </div>
                    <br> </br>
                    <div class="form-group form-actions">
                        <input type="hidden" name="mode" value="<?php echo base64_encode($mode); ?>" />
                        <input type="hidden" name="session_uid" value="<?php echo $id; ?>" />
                        <input type="hidden" name="type" value="<?php echo $type; ?>" />
                        
                        <button type="button" onclick="formSubmit('userForm', 'userResult', '<?php echo ADMIN_URL; ?>user/users_operations.php')" class="btn btn-sm btn-success"><?php echo $bxt; ?> </button>
                    </div>
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
<?php include '../../inc/template_end.php'; ?>
