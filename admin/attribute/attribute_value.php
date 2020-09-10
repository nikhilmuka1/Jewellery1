<?php
include '../../page_fragment/define.php';
include '../../page_fragment/topScript.php';
$site_title = "Admin eCommerce | Manage Attribute | MarketPlace at Home";
include '../../inc/config.php';
$table = 'Attribute';
$todo = "addAttributeValue";
$txt = "Add New";
$name = "";
$input_type="";
$attribute='';
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
                <i class="gi gi-notes_2"></i><?php echo $txt; ?> Attribute's  Value Here
            </h1>
        </div>
    </div>
    <ul class="breadcrumb breadcrumb-top">
        <li><a href="<?php echo ADMIN_URL; ?>dashboard/">Dashboard</a></li>
        <li><a href="<?php echo ADMIN_URL; ?>attributes/" class="btn btn-sm btn-info btn-growl" data-growl="info"><i class="fa fa-pencil fa-fw"></i>View Attribute List</a></li>
          <li><a href="<?php echo ADMIN_URL; ?>attribute/add-attribute/" class="btn btn-sm btn-info btn-growl" data-growl="info"><i class="fa fa-pencil fa-fw"></i>Add Attribute value </a></li>
        <li><?php echo $txt; ?> Attribute Value</li>
    </ul>
    <!-- END Forms General Header -->
    <!-- Form Example with Blocks in the Grid -->
    <div class="row">
        <div class="col-sm-12">
            <!-- Example Form Block -->
            <div class="block">
                <!-- Example Form Title -->
                <div class="block-title">
                    <h2><?php echo $txt; ?> Your Attribute's Value Here</h2>
                </div>
                <!-- END Example Form Title -->
                <!-- Example Form Content -->
                 <div id="result_category"></div>
                <form class="form-horizontal form-bordered" id="form_category" enctype="multipart/form-data" method="post" data-parsley-validate>
                    <div id="container">

                         <div class="col-md-6">
                                    <div class="well well-sm well-primary form-group">
                                        <label for="shorttitle">Attribute<span class="required" >*</span></label>
                                      <select class="form-control" id="sel1" name="attribute_id" required <?php echo $req; ?>>
                                      <option value=''> select Attribute</option>
                                          <?php   
                                          $condition = "1 and status='1' and input_type = 'select' and `delete`='0' order by name";         
                                         $result = $dbComObj->viewData($conn,"attribute", "*",$condition);
                                         $num = $dbComObj->num_rows($result);
                                        if ($num > 0) { 
                                         while ($data = $dbComObj->fetch_assoc($result))
                                        { ?>
                                       <option value="<?php echo $data['id'] ?>" <?php echo $attribute == $data['id'] ? ' selected="selected"' : '';?> ><?php echo $data['name'];?></option>    
                                    <?php   } 
                                    } 
                                       ?>
                                       </select>
                                        
                                </div>      
                                    </div>
                        <div class="col-md-6">
                            <label class="control-label" for="first-name">Name<span class="required">*</span>
                            </label>
                            <div class="form-group">
                                <input type="text" id="name" name="name" value="<?php echo $name; ?>" pattern="^[a-zA-Z_ ]{3,}$" required="required" class="form-control col-md-7 col-xs-12" placeholder="name">
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

<?php include '../../inc/page_footer.php'; ?>
<?php include '../../inc/template_scripts.php'; ?>
<!-- Load and execute javascript code used only in this page -->
<script src="../../js/pages/formsGeneral.js"></script>
<script>$(function () {
    FormsGeneral.init();
});
</script>

<?php include '../../inc/template_end.php'; ?>
                       