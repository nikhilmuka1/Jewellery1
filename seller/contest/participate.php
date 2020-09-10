<?php
include '../../page_fragment/define.php';
include '../../page_fragment/topScript.php';
$site_title = "Admin contests | Jewelry at Home";
include '../../seller_inc/config.php';
if(isset($_REQUEST['session_uid'])){
$id = $njEncryptionObj->safe_b64decode($_REQUEST['session_uid']);
} else {
  $id ='';  
}
$mode = "addNewContest";
$txt = "Add New";
$bxt = "Create Contest";
$name = '';
$email = '';
$contact_no = '';
$image = '';
$req = 'required';
$cover_image='';
$roll_type='';
$qry = $dbComObj->viewData($conn, "contests", "*", "`id`='" . $id . "'");
$num = $dbComObj->num_rows($qry);
if ($num > 0) {
    $row = $dbComObj->fetch_assoc($qry);
    $mode = "manageUsers";
    $txt = "Manage";
    $bxt = "Update contest";
    $req = '';
    extract($row);
 
      if ($image == '' || $image == null) {
                    $profileImage = BASE_URL.'img/user-images/avatar.jpg';
                } else {
                    $profileImage = BASE_URL.'images/user/'.$image;
                }      
   
}
 
     $type="Contest";
?>

<?php include '../../seller_inc/template_start.php'; ?>
<?php include '../../seller_inc/page_head.php'; ?>

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
        <li><a href="<?php echo ADMIN_URL; ?>contests/" class="btn btn-alt btn-xs btn-primary"><i class="hi hi-eye-open"></i> View Contest List</a></li>
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
<!--                <form class="form-bordered" method="post" id="contestsfom">
                    <div class="form-group col-md-6">
                        <div class="input-group">
                            
                            <span class="input-group-addon"><i class="gi gi-user"></i></span>
                            <input type="text" id="name" name="title" value="<?php echo $name; ?>" class="form-control" placeholder="Title" required>
                        </div>
                    </div>
                       <div class="form-group col-md-6">
                        <div class="input-group">
                            
                             <span class="input-group-addon"><i class="gi gi-user"></i></span>
                              <textarea class="form-control"  id="comment"></textarea>     </div>
                    </div>
                    <br/>
                    
                    <div class="form-group col-md-6">
                        
                            <div class="input-group">
                                <span class="input-group-addon"><i class="gi gi-picture"></i></span>
                                <input type="file" id="image" name="cover_image" <?php
                                if ($id == "") {
                                    echo ' required="required" ';
                                }
                                ?> class="form-control avatar-input">
                            </div>
                        
                           <div class="col-md-3"> 
                                        <img src='<?php echo $profileImage; ?>' width="80"/>
                               </div> 
                       </div>
                      <div class="form-group col-md-6">
                      </div>
                    <br> </br>
                    <div class="form-group form-actions">
                        <input type="hidden" name="mode" value="<?php echo base64_encode($mode); ?>" />
                        <input type="hidden" name="session_uid" value="<?php echo $id; ?>" />
                        <input type="hidden" name="type" value="<?php echo $type; ?>" />
                        
                        <button type="button" onclick="formSubmit('contestsfom', 'userResult', '<?php echo ADMIN_URL; ?>contest/contest_operations.php')" class="btn btn-sm btn-success"><?php echo $bxt; ?> </button>
                    </div>
                </form>-->
                <!-- END Example Form Content -->
            </div>
            <!-- END Example Form Block -->
        </div>
    </div>
    <!-- END Form Example with Blocks in the Grid -->
</div>
 
<!-- END Page Content -->
<div id="loading-overlay" class="loading-overlay"></div>
<?php include '../../seller_inc/page_footer.php'; ?>
<?php include '../../seller_inc/template_scripts.php'; ?>
<!-- Load and execute javascript code used only in this page -->
<?php include '../../seller_inc/template_end.php'; ?>


<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css">




 <script type="text/javascript">
            $(function () {
                $('#datetimepicker1').datetimepicker();
            });
        </script>