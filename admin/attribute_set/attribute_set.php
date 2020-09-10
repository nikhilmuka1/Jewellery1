<?php
include '../../page_fragment/define.php';
include '../../page_fragment/topScript.php';
$site_title = "Admin eCommerce | Manage Attribute Set | MarketPlace at Home";
include '../../inc/config.php';
$table = 'attribute_set';
$todo = "addAttributeSet";
$txt = "Add New";
$name = "";
$assign_attributes="";

$id = "";
$status = 1;
if (isset($_GET['a'])) {
     $txt = "Manage";
     $id = $njEncryptionObj->safe_b64decode($_GET['a']); 
    $condition = " `id` = '" . $id . "'";
    $qry = $dbComObj->viewData($conn, $table, "*", $condition);
    $num = $dbComObj->num_rows($qry);
    if ($num) {
        $row = $dbComObj->fetch_assoc($qry);
        $todo = "editAttributeSet";
        extract($row);
    } else {
        header('Location:' . ADMIN_PATH . 'attributes-set/');
    }
}
?>
<?php include '../../inc/template_start.php'; ?>
<?php include '../../inc/page_head.php'; ?>
<!-- Page content -->
<div id="page-content">
    <!-- Forms General Header -->
    <div class="content-header">
        <div class="header-section">
            <h1>
                <i class="gi gi-notes_2"></i><?php echo $txt; ?> Attribute's Set  Here
            </h1>
        </div>
    </div>
    <ul class="breadcrumb breadcrumb-top">
        <li><a href="<?php echo ADMIN_URL; ?>dashboard/">Dashboard</a></li>
        <li><a href="<?php echo ADMIN_URL; ?>attributes-set/" class="btn btn-sm btn-info btn-growl" data-growl="info"><i class="fa fa-pencil fa-fw"></i>View Attribute Set List</a></li>
        <li><?php echo $txt; ?> Attribute</li>
    </ul>
    <!-- END Forms General Header -->
    <!-- Form Example with Blocks in the Grid -->
    <div class="row">
        <div class="col-sm-12">
            <!-- Example Form Block -->
            <div class="block">
                <!-- Example Form Title -->
                <div class="block-title">
                    <h2><?php echo $txt; ?> Your Attribute's  Set Here</h2>
                </div>
                <!-- END Example Form Title -->
                <!-- Example Form Content -->
                 <div id="result_category"></div>
                <form class="form-horizontal form-bordered" id="form_category" enctype="multipart/form-data" method="post" data-parsley-validate>
                    <div id="container">
                        <div class="col-md-6">
                            <label class="control-label" for="first-name">Name<span class="required">*</span>
                            </label>
                            <div class="form-group">
                                <input type="text" id="name" name="name" value="<?php echo $name; ?>" pattern="^[a-zA-Z_ ]{3,}$" required="required" class="form-control col-md-7 col-xs-12" placeholder="name">
                            </div>
                        </div>  
                        <div class="col-md-6">
                            <label class="control-label" for="first-name">Attributes Assign<span class="required">*</span>
                            </label>
                            <div class="form-group"> 
                               <?php   
                                          $condition = "1 and status='1' and `delete`='0' order by name";         
                                         $result = $dbComObj->viewData($conn,"attribute", "*",$condition);
                                         $num = $dbComObj->num_rows($result);
                                        if ($num > 0) { 
                                              $checked_arr = explode(",",$assign_attributes);  
                                         while ($data = $dbComObj->fetch_assoc($result)){ 
                                               $checked='';  
                                                  foreach ($checked_arr as $checkkey => $checkvalue) {   
                                                       if( trim($checked_arr[$checkkey]) ==  $data['id']){
                                                            $checked = 'checked';
                                                            }            
                                                      }
                                              
                                         ?>

                                    <label class="checkbox-inline"><input type="checkbox" required name="assign_attributes[]" 
                                    <?php echo $checked; ?> value="<?php echo $data['id'] ?>"><?php echo $data['name'];?></label>
                                      
                                    <?php   } 
                                    }  ?>

                            </div>
                        </div>  
                           
                    </div>
                    <div class="clearfix">&nbsp;</div>
                    <div class="ln_solid"></div>
                   
                    <div class="form-group form-actions">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <input type="hidden" name="todo" value="<?php echo base64_encode($todo); ?>" />
                            <input type="hidden" name="id" value="<?php echo base64_encode($id); ?>" />
                            <?php if (!isset($_GET['a'])) { ?>
                                <button type="reset" class="btn btn-primary">Reset</button>
                            <?php } ?>
                            <button type="button" onclick="formSubmit('form_category', 'result_category', '<?php echo ADMIN_URL; ?>attribute_set/attribute_set_operations.php')" class="btn btn-success srSubmitBtn">Submit</button>
                        </div>
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
<script src="../../js/pages/formsGeneral.js"></script>
<script>$(function () {
    FormsGeneral.init();
});
  $("#attribute_value").hide();
 var input_type = $('.input_type').val();
            if(input_type =='select' ){
            $("#attribute_value").show();
                 $("#attribute_value_inp").prop('disabled', false);
         } else {
              $("#attribute_value").hide();
              $("#attribute_value_inp").prop('disabled', true);
         }
   
 $( ".input_type" ).change(function() {
            var input_type = $('.input_type').val();
            if(input_type =='select' ){
            $("#attribute_value").show();
                 $("#attribute_value_inp").prop('disabled', false);
         } else {
              $("#attribute_value").hide();
              $("#attribute_value_inp").prop('disabled', true);
         }
    
        
});
</script>

<?php include '../../inc/template_end.php'; ?>
                       