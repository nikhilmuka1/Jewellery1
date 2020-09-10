<?php
include('../page_fragment/define.php');
include ('../page_fragment/dbConnect.php');
include ('../page_fragment/dbGeneral.php');
include ('../page_fragment/njGeneral.php');
include ('../page_fragment/njFile.php');
include ('../page_fragment/njEncription.php');
include ('../page_fragment/ajCategoryView.php');
include ('../page_fragment/ajGeneral.php');
$dbConObj = new dbConnect();
$dbComObj = new dbGeneral();
$njGenObj = new njGeneral();
$njFileObj = new njFile();
$ajGenObj = new ajGeneral();
$ajCategoryViewObj = new ajCategoryView();
$njEncryptionObj = new njEncryption();
$conn = $dbConObj->dbConnect();

if ($_SESSION) {
    if (isset($_SESSION['user_id']))
        $login_id = $_SESSION['user_id'];
    if (isset($_SESSION['DH_seller_id'])) {
        $login_id = $_SESSION['DH_seller_id'];
        $loginSeller = $_SESSION['DH_seller_type_name'];
    }
}
if (empty($login_id)) {
    header('Location: ' . BASE_URL);
    exit;
}

//print_r($_SESSION);
$siteTitle = "Jeweellry  | My Orders";
include '../include/user_header.php';
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
        <?php // include './user_header.php'; ?>
        <div class="columns-container">
            <div id="columns">
                <!-- Breadcrumb -->
                <div class="breadcrumb container">
                    <ul>
                        <li class="home"><a class="home" href="<?php echo BASE_URL; ?>" title="Return to Home">Home</a></li>
                        <li class="crumb-1"><a href="<?php echo BASE_URL; ?>user/<?php echo $login_name; ?>/my-account/" title="My account">My Account</a></li>
                        <!--<li class="crumb-1"><a href="<?php echo BASE_URL; ?>user/my-account.php" title="My account">My account</a></li>-->
                        <li class="crumb-2 last"><span class="navigation-pipe">&gt;</span><span class="navigation_page">My Orders</span></li>
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
                                            My ORDERS 
                                        </h1>
                                    <div id ="resorderajmsg"></div>
                                        <div class="table-responsive">

                                            <table id="testTable" class="table table-bordred table-striped table table-vcenter table-condensed table-bordered" data-toggle="table" data-toolbar="#toolbar" data-search="true" data-show-refresh="true" data-show-toggle="true" data-show-columns="true"
                                                   data-sort-name="stargazers_count" data-sort-order="desc" data-show-export="true" data-show-pagination-switch="true" data-pagination="true"
                                                   data-show-footer="true" data-height="400" data-url="<?php echo BASE_URL; ?>user/fetchinfDataFromTables.php?a=orders" data-query-params="queryParams"
                                                   data-pagination="true" data-search="true">
                                                <thead class="tbl-my-cs">
                                                    <tr><th data-field="id" data-sortable="false">#</th>
                                                        <th data-field="order_no" data-sortable="false">Order No</th>
 
                                                          <th data-field="product_name" data-sortable="false">Product Name</th>
                                                            <th data-field="quantity" data-sortable="false">Qty</th>
                                                          
                                                        <th data-field="ammount" data-sortable="false">Ammount</th>
                                                        <th data-field="payment_type" data-sortable="false">Payment</th>
                                                        <!--<th data-field="image" data-sortable="true">Prescription Image</th>-->
                                                        <th data-field="order_status" data-sortable="false">Status</th>
<!--                                                        <th data-field="via" data-sortable="true">Via</th>-->
                                                        <th data-field="addedOn" data-sortable="false">Date</th>
                                                        <th data-field="action" data-sortable="false">Action</th>
<!--                                                           <th data-field="action" data-sortable="false">Action</th>-->
<!--                                                        <th data-field="action" data-formatter="actionFormatter" data-events="actionEvents">Action</th -->
                                                    </tr>
                                                </thead>
                                            </table>    
                                        </div>
                                    </div>
                                    <ul class="footer_links clearfix">
                                        <li><a class="btn btn-secondary btn-sm icon-left" href="<?php echo BASE_URL; ?>user/my-account.php" title="Back to your account"><span>Back to your account</span></a></li>
                                        <li><a class="btn btn-secondary btn-sm icon-left" href="<?php echo BASE_URL; ?>" title="Home"><span>Home</span></a></li>
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
            <div id="loading-overlay" class="loading-overlay"></div>     
    </div><!-- #page -->
</body>
<script src="<?php echo BASE_URL; ?>user/bootstrap-table.js"></script>
<script>
 function serverResponse(id, res, alertClass, tm = "6000") {

    var resmsg1 = '<div class="alert alert-dismissable alert alert-' + alertClass + '"><a href="#" class="close" data-dismiss="alert" aria-label="close"> x </a>\<strong class="text-capitalize">' + alertClass + '!</strong> <span>' + res + '</span> </div>';
    //response  msg aj st
    $('#' + id).show();
    $('#' + id).html(resmsg1);
    if (alertClass == "success") {
        window.setTimeout(function () {
            //   $('#'+id).fadeTo(500, 0).slideUp(500, function () {
            $('#' + id).html("");
            //   });
        }, tm);
    }
}   
function OrderCancel(a='',b='')
{
         // sid  pid  orderno
            var cancelId = $('#cancelId').val();
             var reasoncancel = $('#reasoncancel').val();
      
       if(a==''){ a=cancelId; }
//        alert(a);    alert(reasoncancel);
       if (reasoncancel == "") {
                 response =  "Reason for cancel  must be filled out";
                  serverResponse('validErrorcancel', response, "danger"); //success danger //info
                    return false;
                }
    var cr = confirm("Are you sure to Cancel this Order?");
     if(cr){
          var response='';
           var order_no = $('#ordernoA'+a).text();
         var  sId =  $('#sidA'+a).val();
         var  pId  =    $('#pidA'+a).val();
//         alert(pId);   
//          alert(sId);
           var qty  =     $('#orderQTY'+a).html();
         //   alert(qty);
           if(pId && qty&& a && qty && reasoncancel) {
                  $('#loading-overlay').show();
      $.post('<?php echo BASE_URL;?>user/general_operations.php',{a:a,reasoncancel:reasoncancel,order_no:order_no,sId:sId,qty:qty,pId:pId, mode:'<?php echo base64_encode('OrderCancel');?>'},function(data){
        $('#loading-overlay').hide();

        //   alert(data);
              $('#loading-overlay').hide();
           if(data == '1'){
               response='Order Cancel successfully';
               $('#ORderCancelDialog').modal('hide');
             serverResponse('resorderajmsg', response, "success"); //success danger //info
             var outDiv='<span class="label label-sm label-danger"> Cancel</span>';
              $('#orderajstatus'+a).html('');
                $('#orderajstatus'+a).html(outDiv);
               $('#orderajbtn'+a).remove();
             
         } else if(data=='0'){
                response='please try again later some error occured ';
                serverResponse('resorderajmsg', response, "danger");
         }else {
              response='No Response-'+data;
           serverResponse('resorderajmsg', response, "danger");
           }
         
            //    $('.total_item_cart').text('');
       // alert('Order Cancel successfully.');
      //    window.location.reload();
        return false;
      });
      }
      return false;
    }
}
$(document).on("click", ".open-cancelDialog", function () {
//alert(1);
     var cancelId = $(this).data('id');
    
     $(".modal-body #cancelId").val( cancelId );
     
});

    

</script>
<style>
.alert {
padding-left: 20px !important;
}
</style>
<div id="ORderCancelDialog" class="modal fade" role="dialog">
  <div class="modal-dialog">
     
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Order Cancel</h4>
      </div>
      <div class="modal-body">
           <div id="validErrorcancel"></div>
    
           <div class="form-group">
              <label for="comment">Reason For Cancel Order :</label>
              <textarea class="form-control" rows="5" id="reasoncancel"></textarea>
            </div>
          <input type="hidden" name="cancelId" id="cancelId" value=""/>
              <a href="javascript:;" onclick="return OrderCancel()" class="btn btn-success"> Order Cancel </a>
              
          </div>
      </div>
    
    </div>

  </div>
</div>

</html>