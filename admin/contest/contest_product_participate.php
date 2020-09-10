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

$qry = $dbComObj->viewData($conn, "contests_participate", "*", "`id`='" . $id . "'");
$num = $dbComObj->num_rows($qry);
if ($num > 0) {
    $row = $dbComObj->fetch_assoc($qry);
    $mode = "manageContestProduct";
    $txt = "Manage participate products";
    $bxt = "Save";
    $req = '';
     if ($cover_image == '' || $cover_image == null) {
                    $profileImage = BASE_URL.'img/user-images/avatar.jpg';
                } else {
                    $profileImage = BASE_URL.'images/contest/thumb/'.$image;
                }      
   
}
   
     extract($row);
    
     $type="Contest";
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
        <li><a href="<?php echo ADMIN_URL; ?>contests/" class="btn btn-alt btn-xs btn-primary"><i class="hi hi-eye-open"></i> View Contest List</a></li>
              <li><a href="<?php echo ADMIN_URL; ?>contests/pending_contest_participate/" class="btn btn-alt btn-xs btn-primary"><i class="hi hi-eye-open"></i> View Pending Participate List</a></li>
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
                    <h2><?php echo $txt.' '.$type;  ?></h2>
                </div>
                <!-- END Example Form Title -->
                <!-- Example Form Content -->
                <div id="userResult"> </div>
                 
                <form class="form-bordered"  method="post" id="contestsfom">
                                  <table class="table">
                                <thead>
                                  <tr>
                                    <th></th>
                                    <th>Name</th>
                                      <th>SKU</th>
                                       <th>Brand</th>
                                        <th>Type</th>
<!--                                        <th>Category</th>   -->
                                  </tr>
                                </thead>
                                <tbody>
                                 
                               
                  <?php     
                                $product_arr = explode(",",$selected_product);
                    // print_r($row);
                             //   $approved_product_arr = json_decode($product_id);
                                  $approved_product_arr = explode(",",$product_id);
                            //   print_r($product_arr);    
                          //    print_r($approved_product_arr);       
                              foreach($product_arr as $product_id){
                                  if($product_id){        
                                $condition = "1 and `delete`='0' and `product_id` = ".$product_id." and status='1'";
                                 $result = $dbComObj->viewData($conn, "products", "*", $condition);
                                 $num = $dbComObj->num_rows($result);
                                 $data = $dbComObj->fetch_assoc($result);
                                  $checked= '';
                                     foreach($approved_product_arr as $aproved_id){
                                          if($aproved_id==$product_id){
                                             $checked= 'checked';
                                          }
                                     }
                                 if($num) {
                                   //  print_r($data); ?>
                                        <tr>
                                    <td><input type="checkbox" <?php echo $checked;?> name="product_id1[]" value="<?php echo $data['product_id']; ?>"  required> </td>
                                    <td><b> <?php echo ucfirst($data['product_name']); ?></b></td>
                                  
                                    <td><?php echo $data['SKU']; ?></td> 
                                 <td><?php echo $ajGenObj->NameById($data['Brand'],'brands'); ?></td> 
                                     <td><?php echo $data['product_type']; ?></td> 
                                 <td><?php //echo $ajCategoryViewObj->CategoryNameById($data['category_id']); ?></td> 
                                  </tr>
                                   <div class="col-md-12 form-group">  
                          
                                              
                                    
                                         </div> 
                                     <?php }
                                  }  
                              }
                                 ?>
                                  
                                </tbody>
                              </table>
                    
                  
             <?php   if($num) { ?>
                   <div>
                    <div class="form-group form-actions">
                        <input type="hidden" name="mode" value="<?php echo base64_encode($mode); ?>" />
                        <input type="hidden" name="session_uid" value="<?php echo $id; ?>" />
                        <input type="hidden" name="request_type" value="<?php echo $_GET['req']; ?>" />
                        <input type="hidden" name="cid" value="<?php if(isset($_GET['cid']))echo $_GET['cid']; ?>" />
                        <input type="hidden" name="type" value="<?php echo $type; ?>" />
         
                   <button type="button" onclick="formSubmit('contestsfom', 'userResult', '<?php echo ADMIN_URL; ?>contest/contest_operations.php')" class="btn btn-sm btn-success"><?php echo $bxt; ?> </button>
                      </div>

                    </div>
                    <?php   } ?>
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
  <script src="<?php echo BASE_URL?>/plugin/ckeditor/ckeditor.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.2/adapters/jquery.js"></script>

<script>
$('#tEditorDiscription').ckeditor({
    height: "300px",
    toolbarStartupExpanded: true,
    width: "100%"
});
$('#txtEditorRewards').ckeditor({
    height: "300px",
    toolbarStartupExpanded: true,
    width: "100%"
});


</script>    
<?php include '../../inc/template_end.php'; ?>
