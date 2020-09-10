<?php 
include '../../page_fragment/define.php'; 
include '../../page_fragment/topScript.php';
$site_title = "Admin View contest | Jewelry at Home";
include '../../inc/config.php'; 
if(isset($_REQUEST['session_uid'])){
$id = $njEncryptionObj->safe_b64decode($_REQUEST['session_uid']);
} else {
  $id ='';  
}
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
.fixed-table-toolbar {
    width: 100%;
    height: 65px;
    margin-top: -58px;
}
.fixed-table-header {
    display: none !important;
}
.fixed-table-loading {
    top: 55px !important;
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
                <i class="gi gi-group"></i>Manage your contest particpate 's<br><small>Add / Edit / Delete here!</small>
            </h1>
        </div>
    </div>
      
    <ul class="breadcrumb breadcrumb-top">
        <li><a href="">Dashboard</a></li>
        <li>View particpate List</li>
        <li><a href="<?php echo ADMIN_URL;?>contests/" class="btn btn-alt btn-xs btn-primary"><i class="fa fa-pencil"></i> View Contest List</a></li>
    </ul>
    <!-- END Forms General Header -->
    <!-- Form Example with Blocks in the Grid -->
    <div class="row">
        
        <div class="col-sm-12">
            <!-- Example Form Block -->
            <div class="block">
                
                <!-- Example Form Title -->
                <div class="block-title">
                    <h2>Manage Your particpate</h2>
                </div>
                <!-- END Example Form Title -->
                <!-- Example Form Content -->
              <table data-toggle="table" data-toolbar="#toolbar" data-search="true" data-show-refresh="true" data-show-toggle="true" data-show-columns="true"
  data-sort-name="stargazers_count" data-sort-order="desc" data-show-export="true" data-show-pagination-switch="true" data-pagination="true"
  data-show-footer="true" data-height="400" data-url="<?php echo ADMIN_URL;?>contest/fetch_data.php?a=contestPendingParticpate&b=<?php echo $id;?>" data-query-params="queryParams"
  data-pagination="true" data-search="true">
  <thead>
  <tr><th data-field="id" data-sortable="true">#</th>
  <th data-field="contest_name" data-sortable="true"> Contest Name</th>
  <th data-field="seller" data-sortable="true">Participate Name</th>
    <th data-field="product" data-sortable="true">Contest Products</th>
  <th data-field="added_on" data-sortable="true">Added</th>
  <th data-field="admin_status" data-sortable="true">Status</th>
  <th data-field="action" data-sortable="false">Action</th>
  
                                </tr>
                                </thead>
                            </table>                
      
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
<script src="<?php echo BASE_URL;?>js/pages/formsGeneral.js"></script>
<script>$(function(){ FormsGeneral.init(); });</script>
<?php include '../../inc/template_end.php'; ?>
<script type="text/javascript" src="<?php echo BASE_URL;?>js/bootstrap-table.js"></script>
<script>
function DeleteContest(a)
{
    var cr = confirm("Are you sure to delete this Contest?");
     if(cr){
      $.post('<?php echo ADMIN_URL;?>contest/contest_operations.php',{a:a,mode:'<?php echo base64_encode('deletecontest');?>'},function(data){
       // $('#errorMsg').html(data);
       // alert(data);
        alert('Contest deleted successfully.');
        window.location.reload();
        return false;
      });

      return false;
    }
}

function UserManageByAdmin(a,b)
{
    var txt = '';
    if(b == '1'){txt = 'Deactivate';}else{txt = 'Activate';}
  $.post('<?php echo ADMIN_URL;?>contest/contest_operations.php',{a:a,b:b,mode:'<?php echo base64_encode('participatestatusUpdate');?>'},function(data){
    //  $('#errorMsg').html(data);
    alert('Participate '+txt+' successfully.');
    window.location.reload();
    return false;
  });

  return false;
}
</script>