<?php
include '../../page_fragment/define.php';
include '../../page_fragment/topScript.php';
$site_title = "Admin category | Manage category | MarketPlace at Home";
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
                <i class="gi gi-notes_2"></i>Manage Categories List <br><small>Manage edit / delete / add categories!</small>
            </h1>
        </div>
    </div>

    <ul class="breadcrumb breadcrumb-top">
        <li><a href="<?php echo ADMIN_URL; ?>dashboard/">Dashboard</a></li>
        <li><a href="<?php echo ADMIN_URL; ?>category/add-category/" class="btn btn-sm btn-info btn-growl" data-growl="info"><i class="fa fa-pencil fa-fw"></i> Add New Category</a></li>
        <li>View Categories List</li>
    </ul>
    <!-- END Forms General Header -->
    <!-- Form Example with Blocks in the Grid -->
    <div class="row">
        <div class="col-sm-12">
            <!-- Example Form Block -->
            <div class="block">
                <!-- Example Form Title -->
                <div class="block-title">
                    <h2>Manage Categories</h2>
                </div>
                <!-- END Example Form Title -->
                <!-- Example Form Content -->

                <div class="box-body">
                    <div class="x_content"><div id="result1"></div>
                        <div class="table-responsive">

                            <table id="treetable-basic" class="table table-vcenter table-condensed table-bordered">
                                <thead>
                                    <tr>
                                   <!--  <tr><th data-field="id" data-sortable="true">#</th> -->
                                        <th data-field="cid" data-sortable="true">ID</th>
                                        <th data-field="title" data-sortable="true">Name</th>
                                        <th data-field="addedOn" data-sortable="true">Date</th>
                                        <th data-field="status" data-sortable="true">Status</th> 
                                        <th data-field="action" data-sortable="false">Action</th>



                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    $result = $dbComObj->viewData($conn, "category", "*", "1");
                                    $ajCategoryViewObj = new ajCategoryView();
                                    $categoryList = $ajCategoryViewObj->fetchCategoryTreeTable();
                                    $num = count($categoryList);
                                    if ($num > 0) {
                                        $i = 0;
                                        //  echo '<pre>'; print_r($categoryList);
                                        foreach ($categoryList as $data) {
                                            // print_r($data); die;
                                            $i++;

                                            if ($data['status'] == '1') {
                                                $textt = 'De-active';

                                                $status = '<span class="label label-sm label-success">Active</span>';
                                            } else {
                                                $textt = 'Active';
                                                $status = '<span class="label label-sm label-danger">De-active</span>';
                                            }
                                            if ($data['delete'] == '1')
                                                $delete = '<b><span class="label label-sm label-danger"><b>Deleted</b></span>';
                                            else
                                                $delete = '';
                                            $action = '<div class="actions"><div class="btn-group"><a class="btn green-haze btn-outline btn-circle btn-sm" href="' . ADMIN_URL . 'category/?a=' . $data['id'] . '&b=' . $data['status'] . '" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"> <i class="fa fa-cogs"></i><i class="fa fa-angle-down"></i></a><ul class="dropdown-menu" style="min-width: 100px !important;"><li><a href="' . ADMIN_URL . 'category/add-category/?a=' . $njEncryptionObj->safe_b64encode($data['id']) . '&mode=' . base64_encode('editCategory') . '"><i class="fa fa-file-text-o"></i> Edit </a></li><li><a href="javascript:0" onclick="return deleteCategory(' . $data['id'] . ');"><i class="fa fa-file-text-o"></i> Delete </a></li>
      <li><a href="javascript:;" onclick="return CategoryManageByAdmin(' . $data['id'] . ',' . $data['status'] . ');"><i class="fa fa-ban"></i> ' . $textt . ' </a></li></ul></div>';
                                            ?>
                                            <tr data-tt-id="<?php echo $data['data_tt_id'] ?>" data-tt-parent-id="<?php echo $data['data_tt_parent_id'] ?>">
                                                <td> <?php echo '#' . $data['id'] ?></td>
                                                <td> <?php echo $data['name'] ?></td>
<!--                                                <td> <?php // echo '<img src="' . BASE_URL . 'images/category/thumb/' . $data['image'] . '" class="image-tblview"/>'; ?></td>-->
                                                <td> <?php  echo date("F j Y g:i a", strtotime($data['updated_on'])); ?></td>
                                                <td> <?php if ($delete) echo $delete;
                                    else echo $status; ?> </td>
                                                <td> <?php echo $action ?></td>

                                            </tr>



        <?php
    }
}
else {
    echo $nj = 'No data found.';
}
?>
                                    <!--
                                     <tr data-tt-id="1" data-tt-parent-id=""><td>1</td></tr>
                                    <tr data-tt-id="1.1" data-tt-parent-id="1"><td>1.1</td></tr>
                                    <tr data-tt-id="1.1.1" data-tt-parent-id="1.1"><td>1.1.1</td></tr>
                                    <tr data-tt-id="1.1.1.1" data-tt-parent-id="1.1"><td>1.1.1.1</td></tr>
                                    <tr data-tt-id="2"><td>2</td></td></tr> -->
                                </tbody>

                            </table>

                         <!--    <table id="testTable" class="table table-vcenter table-condensed table-bordered" data-toggle="table" data-toolbar="#toolbar" data-search="true" data-show-refresh="true" data-show-toggle="true" data-show-columns="true"
  data-sort-name="stargazers_count" data-sort-order="desc" data-show-export="true" data-show-pagination-switch="true" data-pagination="true"
  data-show-footer="true" data-height="400" data-url="<?php //echo ADMIN_URL; ?>category/fetchinfDataFromTables.php?a=category" data-query-params="queryParams"
  data-pagination="true" data-search="true">
  <thead>
  <tr><th data-field="id" data-sortable="true">#</th>
  <th data-field="title" data-sortable="true">Name</th>
  <th data-field="small_desc" data-sortable="true">Image</th>
  <th data-field="addedOn" data-sortable="true">Date</th>
  <th data-field="status" data-sortable="true">Status</th>
   <th data-field="action" data-sortable="false">Action</th>
                                </tr>
                                </thead>
                            </table>     -->
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

<?php include '../../inc/page_footer.php'; ?>
<?php include '../../inc/template_scripts.php'; ?>
<script src="<?php echo BASE_URL; ?>js/bootstrap-table.js"></script>

<?php include '../../inc/template_end.php'; ?>
<script>
    function deleteCategory(a)
    {
        var cr = confirm("Are you sure to delete this category?");
        if (cr) {
            $.post('<?php echo ADMIN_URL; ?>category/category_operations.php', {a: a, todo: '<?php echo base64_encode('deleteCategory'); ?>'}, function (data) {
                // $('#errorMsg').html(data);
                alert('Category deleted successfully.');
                window.location.reload();
                return false;
            });

            return false;
        }
    }

    function CategoryManageByAdmin(a, b)
    {
        var txt = '';
        if (b == '1') {
            txt = 'Deactivate';
        } else {
            txt = 'Activate';
        }
        $.post('<?php echo ADMIN_URL; ?>category/category_operations.php', {a: a, b: b, todo: '<?php echo base64_encode('statusCategory'); ?>'}, function (data) {
            //  $('#errorMsg').html(data);
            alert('Category ' + txt + ' successfully.');
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
    $(document).ready(function () {
        $("#treetable-basic").treetable({
            expandable: true
        });
    });
</script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css"/>
<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script>

    $(document).ready(function () {
        $('.mydataTable').DataTable();
    });
</script>