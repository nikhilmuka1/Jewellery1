<?php
include('../page_fragment/define.php');
include ('../page_fragment/dbConnect.php');
include ('../page_fragment/dbGeneral.php');
include ('../page_fragment/njGeneral.php');
include ('../page_fragment/njFile.php');
$dbConObj = new dbConnect();
$dbComObj = new dbGeneral();
$njGenObj = new njGeneral();
$conn = $dbConObj->dbConnect();

if(empty($_SESSION['MarketPlaceId']))
{
    header('Location: '.BASE_URL);
    exit;
}

$siteTitle = "Jewelry at Home | My upload prescription";
include '../include/head.php';
?>
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
.fixed-table-container thead th .both {
    background-image: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABMAAAATCAQAAADYWf5HAAAAkElEQVQoz7X QMQ5AQBCF4dWQSJxC5wwax1Cq1e7BAdxD5SL+Tq/QCM1oNiJidwox0355mXnG/DrEtIQ6azioNZQxI0ykPhTQIwhCR+BmBYtlK7kLJYwWCcJA9M4qdrZrd8pPjZWPtOqdRQy320YSV17OatFC4euts6z39GYMKRPCTKY9UnPQ6P+GtMRfGtPnBCiqhAeJPmkqAAAAAElFTkSuQmCC');
}

.fixed-table-container thead th .asc {
    background-image: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABMAAAATCAYAAAByUDbMAAAAZ0lEQVQ4y2NgGLKgquEuFxBPAGI2ahhWCsS/gDibUoO0gPgxEP8H4ttArEyuQYxAPBdqEAxPBImTY5gjEL9DM+wTENuQahAvEO9DMwiGdwAxOymGJQLxTyD+jgWDxCMZRsEoGAVoAADeemwtPcZI2wAAAABJRU5ErkJggg==');
}

.fixed-table-container thead th .desc {
    background-image: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABMAAAATCAYAAAByUDbMAAAAZUlEQVQ4y2NgGAWjYBSggaqGu5FA/BOIv2PBIPFEUgxjB+IdQPwfC94HxLykus4GiD+hGfQOiB3J8SojEE9EM2wuSJzcsFMG4ttQgx4DsRalkZENxL+AuJQaMcsGxBOAmGvopk8AVz1sLZgg0bsAAAAASUVORK5CYII= ');
}
.fixed-table-body thead th .th-inner {
    box-sizing: border-box;
}
.fixed-table-container thead th .sortable {
    cursor: pointer;
    background-position: right;
    background-repeat: no-repeat;
    padding-right: 30px;
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
button#refreshNj {
    border: 1px solid #55bee7;
}
</style>

<body id="contact" class="contact hide-left-column hide-right-column lang_en  one-column">
    <div id="page">
        <?php include './user_header.php'; ?>
        <div class="columns-container">
            <div id="columns">
                <!-- Breadcrumb -->
                <div class="breadcrumb container">
                    <ul>
                        <li class="home"><a class="home" href="<?php echo BASE_URL;?>" title="Return to Home">home</a></li>
                        <li class="crumb-1"><a href="<?php echo BASE_URL;?>user/<?php echo $_SESSION['MarketPlaceSlug'];?>/my-account/" title="My account">My account</a></li>
                        <li class="crumb-1"><a href="<?php echo BASE_URL;?>user/<?php echo $_SESSION['MarketPlaceSlug'];?>/my-account/" title="My account">My account</a></li>
                        <li class="crumb-2 last"><span class="navigation-pipe">&gt;</span><span class="navigation_page">My Upload Prescription</span></li>
                    </ul>
                </div>
                <!-- /Breadcrumb -->
                <div id="slider_row">
                    <div id="top_column" class="center_column"></div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="large-left col-sm-12">
                            <div class="row">
                                <div id="center_column" class="center_column col-xs-12 col-sm-9 accordionBox">
                                    <div class="box">
                                        <h1 class="page-subheading">
                                            My Upload Prescription 
                                        </h1>
       
                                        <div class="table-responsive">
                            
                            <table id="testTable" class="table table-bordred table-striped table table-vcenter table-condensed table-bordered" data-toggle="table" data-toolbar="#toolbar" data-search="true" data-show-refresh="true" data-show-toggle="true" data-show-columns="true"
  data-sort-name="stargazers_count" data-sort-order="desc" data-show-export="true" data-show-pagination-switch="true" data-pagination="true"
  data-show-footer="true" data-height="400" data-url="<?php echo BASE_URL;?>user/fetchinfDataFromTables.php?a=upload_prescription" data-query-params="queryParams"
  data-pagination="true" data-search="true">
  <thead>
  <tr><th data-field="id" data-sortable="true">#</th>
  <th data-field="address" data-sortable="true">Address</th>
  <th data-field="image" data-sortable="true">Prescription Image</th>
  <th data-field="location" data-sortable="true">Pick Location</th>
  <th data-field="payment" data-sortable="true">Payment</th>  
  <th data-field="status" data-sortable="true">Status</th>
  <th data-field="addedOn" data-sortable="true">Date</th>
  <!-- th data-field="action" data-formatter="actionFormatter" data-events="actionEvents">Action</th -->
                                </tr>
                                </thead>
                            </table>    
                        </div>
                                    </div>
                                    <ul class="footer_links clearfix">
                                        <li><a class="btn btn-secondary btn-sm icon-left" href="<?php echo BASE_URL;?>user/<?php echo $_SESSION['MarketPlaceSlug'];?>/my-account/" title="Back to your account"><span>Back to your account</span></a></li>
                                        <li><a class="btn btn-secondary btn-sm icon-left" href="<?php echo BASE_URL;?>" title="Home"><span>Home</span></a></li>
                                    </ul>
                                </div><!-- #center_column -->
                                <div id="left_column" class="column col-xs-12 col-sm-3"><!-- Block myaccount module -->
                                    <?php include './sidebar.php'; ?>
                                </div>
                            </div><!--.row-->
                        </div><!--.large-left-->
                    </div><!-- .row -->
                </div><!-- .container -->
            </div><!-- #columns -->
        </div><!-- .columns-container -->
        <!-- Footer -->
        <?php include '../include/footer.php'; ?><!-- #footer -->
    </div><!-- #page -->
</body>
<script src="<?php echo BASE_URL;?>user/bootstrap-table.js"></script>
</html>