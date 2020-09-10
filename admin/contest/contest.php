<?php
include '../../page_fragment/define.php';
include '../../page_fragment/topScript.php';
$site_title = "Admin contests | Jewelry at Home";
include '../../inc/config.php';
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
$description='';
$contact_no = '';
$image = '';
$req = 'required';
$cover_image='';
$roll_type='';
$qry = $dbComObj->viewData($conn, "contests", "*", "`id`='" . $id . "'");
$num = $dbComObj->num_rows($qry);
if ($num > 0) {
    $row = $dbComObj->fetch_assoc($qry);
    $mode = "manageContest";
    $txt = "Manage";
    $bxt = "Update contest";
    $req = '';
     if ($row['cover_image'] == '' || $row['cover_image']== null) {
                    $profileImage = BASE_URL.'img/user-images/avatar.jpg';
                } else {
                    $profileImage = BASE_URL.'images/contest/thumb/'.$row['cover_image'];
                }      
   
}
    //   print_r($row);
     extract($row);
     $type="Contest";
?>

<?php include '../../inc/template_start.php'; ?>
<?php include '../../inc/page_head.php'; ?>
 <script src="//cdn.ckeditor.com/4.5.9/standard/ckeditor.js"></script>
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
        <div class="col-md-12">
            <!-- Example Form Block -->
            <div class="block">
                <!-- Example Form Title -->
                <div class="block-title">
                    <h2><?php echo $txt.' '.$type; ?></h2>
                </div>
                <!-- END Example Form Title -->
                <!-- Example Form Content -->
                <?php  //  print_r($row); echo $row['last_date'];?>
                <div id="userResult"><?php  if($_GET['msg']=='error') echo   "Error : Contest already Added. Please try again with diffrent Title.";?></div>
                <form class="form-bordered"  enctype="multipart/form-data" action ="<?php echo ADMIN_URL; ?>contest/contest_operations.php" method="post" id="contestsfom">
                    <div class="form-group col-md-6">
                        <label>Title </label>
                            <input type="text" id="name" name="title" value="<?php echo $title; ?>" class="form-control" placeholder="Title" required>    
                    </div>
                       <div class="form-group col-md-12">
                           
                           <label>Description</label>
                              <textarea class="form-control" id="tEditorDiscription" name="description11" rows= "6"><?php if($description)echo base64_decode($description); ?></textarea>        
                                <script>
                                  CKEDITOR.replace('description11');
                                </script>
                       </div>
                       <div class="form-group col-md-12">
                           
                           <label>Reward</label>
                            <textarea class="form-control" id="txtEditorRewards"  name="reward" rows= "6"><?php if($reward)echo base64_decode($reward); ?></textarea>                              
                                  <script>
                                       CKEDITOR.replace('reward');
                                   </script>
                       </div>
                    <br/>
                      <div class="form-group col-md-6">
                          <label>Last Date</label>
                            <input type="datetime" id="datetimepicker1" name="last_date" value="<?php echo $row['last_date']; ?>" class="form-control" placeholder="Last Date" required>  
                    </div>
                    <div class="col-md-6">
                    <div class="form-group col-md-6">
                        <label>Cover Image</label>
                                <input type="file" id="image" name="cover_image" <?php
                                if ($id == "") {
                                  //  echo ' required="required" ';
                                }
                                ?> class="form-control avatar-input">
                                </div>   
                                  <div class="col-md-6"> 
                                        <img src='<?php echo $profileImage; ?>' width="80"/>
                               </div>
                       
                       </div>
                    <br> </br>
                    <div class="form-group form-actions">
                        <input type="hidden" name="mode" value="<?php echo base64_encode($mode); ?>" />
                        <input type="hidden" name="session_uid" value="<?php echo $id; ?>" />
                        <input type="hidden" name="type" value="<?php echo $type; ?>" />
         <input type="submit" name="save" value="Save" class="btn btn-success srSubmitBtn" />
<!--                      <button type="button" onclick="formSubmit('contestsfom', 'userResult', '<?php echo ADMIN_URL; ?>contest/contest_operations.php')" class="btn btn-sm btn-success"><?php echo $bxt; ?> </button>
               -->
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
<script>

$("#contestsfom").validate({
  submitHandler: function(form) {
    $(form).submit();
  }
 });
</script>
<!-- Load and execute javascript code used only in this page -->



<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css">




 <script type="text/javascript">
            $(function () {
                $('#datetimepicker1').datetimepicker();
            });
        </script>
<!--  <script src="<?php echo BASE_URL?>/plugin/ckeditor/ckeditor.js"></script>-->
 
<!--<script src="http://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.2/adapters/jquery.js"></script>-->

<  
<?php include '../../inc/template_end.php'; ?>
