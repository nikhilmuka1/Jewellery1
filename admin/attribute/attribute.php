<?php
include '../../page_fragment/define.php';
include '../../page_fragment/topScript.php';
$site_title = "Admin eCommerce | Manage Attribute | MarketPlace at Home";
include '../../inc/config.php';
$table = 'attribute';
$todo = "addAttribute";
$txt = "Add New";
$name = "";
$input_type="";
$attribute_option="";

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
        $todo = "editAttribute";
        extract($row);
    } else {
        header('Location:' . ADMIN_PATH . 'attributes/');
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
                <i class="gi gi-notes_2"></i><?php echo $txt; ?> Attribute's  Here
            </h1>
        </div>
    </div>
    <ul class="breadcrumb breadcrumb-top">
        <li><a href="<?php echo ADMIN_URL; ?>dashboard/">Dashboard</a></li>
        <li><a href="<?php echo ADMIN_URL; ?>attributes/" class="btn btn-sm btn-info btn-growl" data-growl="info"><i class="fa fa-pencil fa-fw"></i>View Attribute List</a></li>
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
                    <h2><?php echo $txt; ?> Your Attribute's  Here</h2>
                </div>
                <!-- END Example Form Title -->
                <!-- Example Form Content -->
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
                            <label class="control-label" for="first-name">Input Type<span class="required">*</span>
                            </label>
                            <div class="form-group"> 
                             <select id="sel1" name="input_type" required title="Input Type for Attributes Required" class="input_type form-control">
                                 <option value=""> Select input Type</option>
                                <option value="text"  <?php if($input_type=='text') echo'Selected'; ?>>Text Field</option>
                                <option value="textarea"  <?php if($input_type=='textarea') echo'Selected'; ?>>Text Area</option>
                               <!-- <option value="date"  <?php if($input_type=='date') echo'Selected'; ?>>Date</option>-->
                                <option value="select"  <?php if($input_type=='select') echo'Selected'; ?>>Dropdown</option>
                                <option value="number"  <?php if($input_type=='number') echo'Selected'; ?>>Number</option>
                            </select>     
                            </div>
                        </div>  
                          <div class="col-md-6" id="attribute_value">
                         <div class="well well-sm well-primary form-group">
                                        <label for="grantparent"> Options (values of your attribute)<span class="required">*</span></label>
                                        <!--   <textarea class="form-control" rows="3" required="" name="attribute_option" id="attribute_value_inp" placeholder="Attribute value"> <?php  echo $attribute_option;?></textarea>
                                          <b>Mulitiple with cooma seprated</b> -->
                                           <div class="tab-pane fade active in" id="add_labo_result">
                                                 
                                                <?php  
                                                          $attribute_option =explode(',',$attribute_option);
                                                         
                                                    for ($x = 0; $x < count($attribute_option); $x++) {
  
                                                     ?>
                                                <div class="form-inline">
                                                    <div class="row" id="remove-database-field" >
                                                        <div class="form-group">
                                                            <span class="txt_style_9c">Name</span>
                                                            <input type="text" class="form-control" placeholder="Name" class="attribute_option"  name="attribute_option[]" id="txtLabTest" value="<?php echo $attribute_option[$x] ?>">
                                                        </div>
   
                                                            
                                                              <a href="#" id="<?php echo $attribute_option[$x] ?>" class="remove_field" >  Remove  </a>
                                                        
                                                    </div>
                                                </div>                                  
                                                    <?php } ?>                       
                                           </div>

                                          <div class="form-group row MGB0">
                                            <div class="col-sm-12">
                                                <a class="btn3d btn btn-primary" id="add_laboratory">add more</a>
                                            </div>
                                        </div>  
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
                            <button type="button" onclick="formSubmit('form_category', 'result_category', '<?php echo ADMIN_URL; ?>attribute/attribute_operations.php')" class="btn btn-success srSubmitBtn">Submit</button>
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
<script src="<?Php  echo BASE_URL; ?>js/pages/formsGeneral.js"></script>
<script>$(function () {
    FormsGeneral.init();
});
  $("#attribute_value").hide();
 var input_type = $('.input_type').val();
            if(input_type =='select' ){
            $("#attribute_value").show();
                 $("#attribute_value_inp").prop('disabled', false);
                     $(".attribute_option").attr('required',true);
         } else {
              $("#attribute_value").hide();
              $("#attribute_value_inp").prop('disabled', true);
                  $(".attribute_option").attr('required',false);
         }
   
 $( ".input_type" ).change(function() {
            var input_type = $('.input_type').val();
            if(input_type =='select' ){
            $("#attribute_value").show();
                 $("#attribute_value_inp").prop('disabled', false);
                    $(".attribute_option").attr('required',true);
         } else {
              $("#attribute_value").hide();
              $("#attribute_value_inp").prop('disabled', true);
              $(".attribute_option").attr('required',false);
         }
    
        
});
</script>

<script>
$(document).ready(function() {
   
   var max_fields      = 30; //maximum input boxes allowed
   var wrapper_laboratory         = $("#add_labo_result"); //Fields wrapper
   var add_button_laboratory      = $("#add_laboratory"); //Add button ID
   var xx = 1; //initlal text box count
   $(add_button_laboratory).click(function(e){ //on add input button click
    
       e.preventDefault();
       if(xx < max_fields){ //max input box allowed
           xx++; //text box increment           
           $(wrapper_laboratory).append('<div class="form-inline"><div class="form-group"><span class="txt_style_9c">Name</span><input type="text" class="form-control" placeholder="Option Name" class="attribute_option" name="attribute_option[]" required></div><a href="javascript:void(0)" class="remove_field">Remove</a></div>'); //add input box
       }

   });

   $(wrapper_laboratory).on("click",".remove_field", function(e){ //user click on remove text
     e.preventDefault(); $(this).parent('div').remove(); xx--;
   })

})

</script>
<?php include '../../inc/template_end.php'; ?>
                       