<?php
include '../../page_fragment/define.php';
include '../../page_fragment/topScript.php';
$site_title = "Admin Attribute | Manage Attribute | MarketPlace at Home";
include '../../inc/config.php';
?>
<?php include '../../inc/template_start.php'; ?>
<?php include '../../inc/page_head.php'; ?>
<style>
th.sorting_asc {
    width: 140px !important;
}
td {
    font-size: 13px !important;
}

.btn-group>.dropdown-menu:after, .dropdown-toggle>.dropdown-menu:after, .dropdown>.dropdown-menu:after {
    position: absolute;
    top: -7px;
    left: 50px !important;
    right: auto;
    display: inline-block!important;
    border-right: 7px solid transparent;
    border-bottom: 7px solid #fff;
    border-left: 7px solid transparent;
    content: '';
}


.btn-group>.dropdown-menu:before, .dropdown-toggle>.dropdown-menu:before, .dropdown>.dropdown-menu:before {
    position: absolute;
    top: -8px;
    left: 50px !important;
    right: auto;
    display: inline-block!important;
    border-right: 8px solid transparent;
    border-bottom: 8px solid #e0e0e0;
    border-left: 8px solid transparent;
    content: '';
}

.btn-group>.dropdown-menu, .dropdown-toggle>.dropdown-menu, .dropdown>.dropdown-menu {
    margin-top: 10px;
    margin-left: -40px !important;
}
.bars, .chart, .pie {
    height: 0px !important;
}
.fixed-table-container {
    height: auto !important;
}
.fixed-table-footer {
    display: none !important;
}
.fixed-table-container {
    clear: none !important;
}
/*
.fixed-table-toolbar {
    width: 100%;
    height: 65px;
    margin-top: -40px;
}
*/
.fixed-table-header {
    display: none !important;
}
.fixed-table-loading {
    top: 55px !important;
}
.pull-right.search {
    width: 25% !important;
    padding: 0px 10px !important;
}
button.btn.btn-default {
    height: 30px !important;
}
a#njView {
    display: block;
    margin-bottom: 5px;
    padding: 5px;
}
.image-tblview {
    width: 50px;
    border: 1px solid #ccc;
    border-radius: 5px;
    padding: 1px;
  }
</style>

<!-- Page content -->
<div id="page-content">
    <!-- Forms General Header -->
    <div class="content-header">
        <div class="header-section">
            <h1>
                <i class="gi gi-notes_2"></i>Manage Attribute List <br><small>Manage edit / delete / add Attribute!</small>
            </h1>
        </div>
    </div>

    <ul class="breadcrumb breadcrumb-top">
        <li><a href="<?php echo ADMIN_URL; ?>dashboard/">Dashboard</a></li>
        <li><a href="<?php echo ADMIN_URL; ?>attribute/add-attribute/" class="btn btn-sm btn-info btn-growl" data-growl="info"><i class="fa fa-pencil fa-fw"></i> Add New Attribute</a></li>
        <li>View Attribute List</li>
    </ul>
    <!-- END Forms General Header -->
    <!-- Form Example with Blocks in the Grid -->
    <div class="row">
        <div class="col-sm-12">
            <!-- Example Form Block -->
            <div class="block">
                <!-- Example Form Title -->
                <div class="block-title">
                    <h2>Manage Attribute</h2>
                </div>
                <!-- END Example Form Title -->
                <!-- Example Form Content -->
                
                <div class="box-body">
                    <div class="x_content"><div id="result1"></div>
                        <div class="table-responsive">
  <table id="testTable" class="table table-vcenter table-condensed table-bordered" data-toggle="table" data-toolbar="#toolbar" data-search="true" data-show-refresh="true" data-show-toggle="true" data-show-columns="true"
  data-sort-name="stargazers_count" data-sort-order="desc" data-show-export="true" data-show-pagination-switch="true" data-pagination="true"
  data-show-footer="true" data-height="400" data-url="<?php echo ADMIN_URL;?>attribute/fetchinfDataFromTables.php?a=attribute" data-query-params="queryParams"
  data-pagination="true" data-search="true">
  <thead>
  <tr>
  <th data-field="id" data-sortable="true">#</th>
  <th data-field="cid" data-sortable="true">Id</th>
  
  <th data-field="title" data-sortable="true">Name</th>
  <th data-field="input_type" data-sortable="true">Input Type</th>
  <th data-field="addedOn" data-sortable="true">Date</th>
  <th data-field="status" data-sortable="true">Status</th>
   <th data-field="action" data-sortable="false">Action</th>
                                </tr>
                                </thead>
                            </table>    
                        </div>
                    </div>
                </div>
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
<script src="<?php echo BASE_URL;?>js/bootstrap-table.js"></script>

<?php include '../../inc/template_end.php'; ?>
<script>
function deleteAttribute(a)
{
   var cr = confirm("Are you sure to delete this attribute?");
   if(cr){
      $.post('<?php echo ADMIN_URL;?>attribute/attribute_operations.php',{a:a,todo:'<?php echo base64_encode('deleteAttribute');?>'},function(data){
       // $('#errorMsg').html(data);
        alert('attribute deleted successfully.');
        window.location.reload();
        return false;
      });

      return false;
   }
}

function ManageByAdmin(a,b)
{
    var txt = '';
    if(b == '1'){txt = 'Deactivate';}else{txt = 'Activate';}
  $.post('<?php echo ADMIN_URL;?>attribute/attribute_operations.php',{a:a,b:b,todo:'<?php echo base64_encode('statusAttribute');?>'},function(data){
    //  $('#errorMsg').html(data);
    alert('attribute '+txt+' successfully.');
    window.location.reload();
    return false;
  });

  return false;
}
</script>
<link rel="stylesheet" href="<?php echo BASE_URL; ?>css/tabletreeajviews/jquery.treetable.css" />
<link rel="stylesheet" href="<?php echo BASE_URL; ?>css/tabletreeajviews/jquery.treetable.theme.default.css" />

<script src="<?php echo BASE_URL; ?>js/jquery.treetable.js"></script>
<script>
$(document).ready(function(){
$("#treetable-basic").treetable({
  expandable: true
});
});
</script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css"/>
<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script>

$(document).ready(function(){
    $('.mydataTable').DataTable();
});
</script>