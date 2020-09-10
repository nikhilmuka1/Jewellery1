<?php
include './include/header.php';
//print_r($_SESSION);
$PAGE_LIMIT = LIST_PAGE_LIMT;
$UriSegment_id = $UriSegment_type = $conditon_nav_filter = '';
$UriSegment_id = $ajGenObj->getUriSegment(3);
if (($ajGenObj->getUriSegment(4)))
    $UriSegment_type = $ajGenObj->getUriSegment(4);
if (($ajGenObj->getUriSegment(6)))
    $subcategory_segment = $ajGenObj->getUriSegment(6);
if ($UriSegment_id && $UriSegment_type == "designer") {
    $Brand_id = $njEncryptionObj->safe_b64decode($UriSegment_id);
    $conditon_nav_filter = 'and  Brand= ' . $Brand_id . '';
} else if ($UriSegment_id && $UriSegment_type == "type") {
    $category_id = $njEncryptionObj->safe_b64decode($UriSegment_id);
    if (isset($subcategory_segment) && $subcategory_segment) {
        $conditon_nav_filter = "and FIND_IN_SET( '" . $category_id . " ', category_id ) <> 0 ";
    } else {
        $condition = "1 and `parent_id` =  '" . $category_id . " ' "; //and `delete` = '0' and `status` = '1'
        $result = $dbComObj->viewData($conn, "category", "*", $condition);
        $num = $dbComObj->num_rows($result);
        $parent_allCat_id_arr = array();
        if ($num > 0) {
            while ($data = $dbComObj->fetch_assoc($result)) {
                $parent_allCat_id_arr[] = "FIND_IN_SET( '" . $data['id'] . " ', category_id ) ";
            }
        }
        $parent_allCat_id = implode(" OR ", $parent_allCat_id_arr);
        ///  echo '<br>';
        if ($parent_allCat_id)
            $conditon_nav_filter = "and ( $parent_allCat_id ) ";
    }
} else {
    $conditon_nav_filter = '';
}
$condition_product = " `delete` = '0' and status= '1'  $conditon_nav_filter order by product_id desc  ";
?>
<?php
if (isset($_GET['search_term']) && trim($_GET['search_term']) == "") {
    echo '<script> window.location.href = "' . BASE_URL . '"; </script>';
}
if (isset($_GET['search_term']) && $_GET['search_term']) {
    $condition_product = " `delete` = '0' and status= '1' and  price<>'' and product_name like '%" . trim($_GET['search_term']) . "%' order by product_id desc  ";
} else {
    $condition_product = " `delete` = '0' and status= '1' and price<>'' $conditon_nav_filter order by product_id desc ";
}
$condition_product;
$resultproducts = $dbComObj->viewData($conn, "products", "*", $condition_product);
$num_products = $dbComObj->num_rows($resultproducts);
?>
<style>
    .loading-overlay{
        position: fixed;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        z-index: 999;
        background: rgba(183, 173, 173, 0.5) url(<?php echo BASE_URL; ?>img/loading.gif) no-repeat center center;
        /*background: rgba(0,0,0,0.5);*/
        display: none;
    }
    .sr-msg-error {
        border: 1px solid red;
        color: red !important;
    }
    .product-grid a.wishlist.outline i, #b-glam a.wishlist.outline i {
        background-position: 1px -20px;
    }
    .product-grid a.wishlist i, #b-glam a.wishlist i {
        display: block;
        width: 25px;
        height: 25px;
        margin: auto;
        position: relative;
        z-index: 3;
        background: url(http://www.fxpips.co.uk/marketplace/frontend/img/icon-heart.v1.png) no-repeat 0 0;
    }
    .product-grid i {
        background-position: 1px -20px;
    }
    .product-grid i {
        display: block;
        width: 25px;
        height: 25px;
        margin: auto;
        position: relative;
        z-index: 3;
        top: -231px;
        float: right;
        left: -10px;
        font-size: 22px;
        color: #a7a3a3;
    }
    .product-grid i:hover{
        color: #ab0000;
    }	
    ///// for model login popup
    .modal-backdrop.in{
        display:none !important;
    }
    modal-backdrop {
        position: relative !important;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        z-index: 1040;
        background-color: #000;
    }
</style>
<script src="http://www.fxpips.co.uk/marketplace/js/jquery.validate.js"></script>
<script src="http://www.fxpips.co.uk/marketplace/js/nj_form.js"></script>
<script>
    $("#searchform").validate({
        errorPlacement: function (error, element) {
            return true;
        }
    });
</script>
<style> 
    .sr-msg-error {
        border: 1px solid red;
        color: red !important;   
    }
    #search_term label .sr-msg-error {
        display: none !important;
    }
</style>

<style>
    .home-img-eq{
        position:relative;
        top:-235px;
        float:right;
    }
    .home-img-eq img{
        width:30px;
        height:30px;
    }
</style>
<div class="gid-view">
    <div class="container">
        <div class="row">
            <div class="green-box-outline">
                <div class="postion">
                    <h4 class="hadding">Find It Fast</h4>
                </div>

                <div class="full-width margintop30">
                    <div class="col-md-3 col-sm-3">
                        <center>
                            <img src="<?php echo BASE_URL; ?>frontend/img/grid1.png" class="img-responsive">
                            <h4 class="hadding margintop10"> CLASSIC FIT</h4>
                            <p>Plenty of room through the chest and armholes.</p>
                        </center>
                    </div>

                    <div class="col-md-3 col-sm-3">
                        <center>
                            <img src="<?php echo BASE_URL; ?>frontend/img/grid1.png" class="img-responsive">
                            <h4 class="hadding margintop10"> REGULAR FIT</h4>
                            <p>A little extra room through the chest and body.</p>
                        </center>
                    </div>

                    <div class="col-md-3 col-sm-3">
                        <center>
                            <img src="<?php echo BASE_URL; ?>frontend/img/grid1.png" class="img-responsive">
                            <h4 class="hadding margintop10">SLIM FIT</h4>
                            <p>Fitted through the chest and armholes.</p>
                        </center>
                    </div>

                    <div class="col-md-3 col-sm-3">
                        <center>
                            <img src="<?php echo BASE_URL; ?>frontend/img/grid1.png" class="img-responsive">
                            <h4 class="hadding margintop10">EXTRA-SLIM FIT</h4>
                            <p>Slim throughout, with higher armholes.</p>
                        </center>
                    </div>

                </div>

            </div>

            <div class="product-list">
                <ol class="breadcrumb">
                    <?Php
                    if (isset($category_id) && $category_id) {
                        $condition_cat = "1 and `id` = " . $category_id . "";
                        $result_cat = $dbComObj->viewData($conn, "category", "*", $condition_cat);
                        $data_cat = $dbComObj->fetch_assoc($result_cat);
                        $parent_id = $data_cat['parent_id'];
                    } elseif (isset($Brand_id) && $Brand_id) {
                        $condition_cat = "1 and `id` = " . $Brand_id . "";
                        $result_cat = $dbComObj->viewData($conn, "brands", "*", $condition_cat);
                        $data_cat = $dbComObj->fetch_assoc($result_cat);
                        $parent_id = $data_cat['parent_id'];
                    }
                    $category_segment = $ajGenObj->getUriSegment(5);
                    if (isset($parent_id) && isset($category_segment) && $category_segment) {
                        $parent_encode_id = $njEncryptionObj->safe_b64encode($parent_id);
                        $category_segment2 = str_replace("-", " ", $category_segment);
                        $subcategory_segment = $ajGenObj->getUriSegment(6);
                    }
                    ?>
                    <li><a href="<?php echo BASE_URL; ?>">Home</a></li>
                    <?php if (isset($subcategory_segment) && $subcategory_segment) { ?>
                        <li><a href="<?php echo BASE_URL; ?>grid/<?php echo $parent_encode_id; ?>/type/<?php echo $category_segment ?>/">
                                <?php if (isset($category_segment2) && $category_segment2) echo $category_segment2; ?> </a></li>
                    <?php } ?>
                    <li class="active"><?php
                        if (isset($data_cat['name']) && $data_cat['name'])
                            echo $data_cat['name'];
                        else
                            echo "All Products"
                            ?></li>
                </ol>
                <div  id="resajmsg"> </div>
                <div class="col-md-3 col-sm-3">
                    <div class="" data-spy="affix" data-offset-top="660">
                        <form id="filterFrm">
                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="headingOnedesk">
                                        <h4 class="panel-title">
                                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOnedesk" aria-expanded="true" aria-controls="collapseOnedesk">
                                                Sort By <span class="glyphicon glyphicon-plus pull-right"></span>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseOnedesk" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                        <div class="panel-body">
                                            <p> <input type="checkbox" class="filled-in Fsortby1" name="Fsortby" value="top_picks" 
                                                       id="filled-in-box-desk"  />
                                                <label for="filled-in-box-desk">Top picks</label></p>
                                            <p> <input type="checkbox" class="filled-in Fsortby1" name="Fsortby" value="new" id="filled-in-box-one-desk"
                                                       />
                                                <label for="filled-in-box-one-desk">New Arrivals</label></p>
                                            <p> <input type="checkbox" class="filled-in Fsortby1" name="Fsortby" value="best_sellers" id="filled-in-box-two-desk"
                                                       />
                                                <label for="filled-in-box-two-desk">Best Sellers</label></p>
                                            <p> <input type="checkbox" class="filled-in Fsortby1" name="Fsortby" value="customer_top_rated" id="filled-in-box-three-desk"
                                                       />
                                                <label for="filled-in-box-three-desk">Customer Top Rated</label></p>
                                            <p> <input type="checkbox" class="filled-in Fsortby1" name="Fsortby" value="price_desc" id="filled-in-box-four-desk" 
                                                       />
                                                <label for="filled-in-box-four-desk">price (high to low)</label></p>
                                            <p> <input type="checkbox" class="filled-in Fsortby1" name="Fsortby"  value="price_asc" id="filled-in-box-five-desk" />
										            <label for="filled-in-box-five-desk">price (low to high)</label>
													   </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="headingfivedesk">
                                        <h4 class="panel-title">
                                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapsefivedesk" aria-expanded="false" aria-controls="collapsefive">
                                                By Designer <span class="glyphicon glyphicon-plus pull-right"></span>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapsefivedesk" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingfivedesk">
                                        <div class="panel-body">
                                            <?php
                                            $condition_Brand = "1 and  `delete` = '0' and `status` = '1' ";
                                            $result_Brand = $dbComObj->viewData($conn, "brands", "*", $condition_Brand);
                                            $num_Brand = $dbComObj->num_rows($result_Brand);
                                            $nod = 1;
                                            if ($num_Brand > 0) {
                                                while ($data_Brand = $dbComObj->fetch_assoc($result_Brand)) {
                                                    ?>
                                                    <p><input type="checkbox"  value ="<?php echo $data_Brand['id']; ?>"
                                                              class="filled-in FABrands" name="Fbrands" id="filled-in-box-desinger-desk<?php echo $nod; ?>"  />
                                                        <label for="filled-in-box-desinger-desk<?php echo $nod; ?>">
                                                            <?php echo $data_Brand['name']; ?></label></p>

                                                    <?php
                                                    $nod++;
                                                }
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="headingsixdesk">
                                        <h4 class="panel-title">
                                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapsesixdesk" aria-expanded="false" aria-controls="collapsesixdesk">
                                                Price <span class="glyphicon glyphicon-plus pull-right"></span>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapsesixdesk" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingsixdesk">
                                        <div class="panel-body">
                                            <p> <input type="checkbox" class="filled-in FAjpricebtwn" name="FAjpricebtwn" value="< 500" id="filled-in-box-price-desk"  />
                                                <label for="filled-in-box-price-desk">Under $500</label></p>
                                            <p> <input type="checkbox" class="filled-in FAjpricebtwn" name="FAjpricebtwn" value="BETWEEN 1000 AND 25000" id="filled-in-box-one-price-desk"  />
                                                <label for="filled-in-box-one-price-desk">$1000-$25000</label></p>
                                            <p><input type="checkbox" class="filled-in FAjpricebtwn" name="FAjpricebtwn"  value="BETWEEN 25000 AND 50000" id="filled-in-box-four-price-desk"  />
                                                <label for="filled-in-box-four-price-desk">$25000-$50000</label></p>
                                            <p><input type="checkbox" class="filled-in FAjpricebtwn"  name="FAjpricebtwn" value="BETWEEN 50000 AND 100000" id="filled-in-box-three-price-desk"  />
                                                <label for="filled-in-box-three-price-desk"  >$50000-$100000</label></p>
                                            <p> <input type="checkbox" class="filled-in FAjpricebtwn" name="FAjpricebtwn" value="> 100000" id="filled-in-box-two-price-desk"  />
                                                <label for="filled-in-box-two-price-desk">$100000 Over</label></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="headingThreedesk">
                                        <h4 class="panel-title">
                                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThreedesk" aria-expanded="false" aria-controls="collapseThreedesk">
                                                Metal Material <span class="glyphicon glyphicon-plus pull-right"></span>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseThreedesk" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThreedesk">
                                        <div class="panel-body">
                                            <?php
                                            $condition_metal = "1 and  `delete` = '0' and `status` = '1' ";
                                            $result_metal = $dbComObj->viewData($conn, "product_metal", "*", $condition_metal);
                                            $num_metal = $dbComObj->num_rows($result_metal);
                                            $nom = 1;
                                            if ($num_metal > 0) {
                                                while ($data_metal = $dbComObj->fetch_assoc($result_metal)) {
                                                    ?>
                                                    <p><input type="checkbox"  value ="<?php echo $data_metal['id']; ?>"
                                                              class="filled-in FAproduct_Metal" name="FAproduct_Metal" id="filled-in-box-metal-desk<?php echo $nom; ?>"  />
                                                        <label for="filled-in-box-metal-desk<?php echo $nom; ?>">
                                                            <?php echo $data_metal['name']; ?></label></p>

                                                    <?php
                                                    $nom++;
                                                }
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-9 col-sm-9">
                    <h4 class="hadding text-left"><?php if (isset($data_cat['name']) && $data_cat['name']) echo $data_cat['name']; ?></h4>
                    <div class="full-width">
                        <div class="col-md-2 col-sm-2">
                            <div class="btn-group">
                                <a href="javascript:void(0)" class="btn btn-default" id="grid-view" ><i class="fa fa-th"></i></a>
                                <a href="javascript:void(0)" class="btn btn-default" id="list-view"><i class="fa fa-list"></i></a>
                                <script type="text/javascript">
                                    $(function () {
                                        $('[data-toggle="tooltip"]').tooltip()
                                    })
                                </script>
                            </div>
                        </div> 
                        <br/>
                        <div id="grid"></div>
                        <!--List-->
                        <div id="list"> </div>
                    </div>
                    <input type="hidden" class="page_number" name="page_number" value= "1"/>
                    <input type="hidden" class="page_number_list" name="page_number_list" value= "1"/>
                    <input type="hidden"  id="view_typeJ" name="view_type" value= "grid"/>
                    <input type="hidden" class="total_record" name="total_record" value="" />
                    <input type="hidden"  id="category_arr" name="sfterm" value= ""/>
                    <input type="hidden"  id="sort_arr" name="sfterm" value= ""/>
                </div>
            </div>
        </div>
        <div id="loading-overlay" class="loading-overlay"></div>     
    </div>
    <script>
        $(document).ready(function () {
            var pagenum = parseInt($(".page_number").val());
            var search = '';
            loadProducts(1, search);

            $('input[name="Fsortby"]').change(function () {
                FilterProducts(1);
            });
            $('input[name="Fproduct_type"]').change(function () {
                FilterProducts(1);
            });

            $('input[name="Fbrands"]').change(function () {
                FilterProducts(1);
            });

            $('input[name="FAjpricebtwn"]').change(function () {
                FilterProducts(1);
            });
            $('input[name="FAproduct_Metal"]').change(function () {
                FilterProducts(1);
            });

        });
        function onChangeVol() {
            var location = $('#location').val();
            var specialty = $('#specialty').val();
            var m_condition = $('#m_condition').val();
            var transportation = $('input[name=transportation]:checked').val();
            var compensation = $('input[name=compensation]:checked').val();
            var publications = $('input[name=publications]:checked').val();
            //alert(compensation);
            $.post('getData.php', {
                z: 'getInvest_Vol',
                location: location,
                specialty: specialty,
                m_condition: m_condition,
                transportation: transportation,
                compensation: compensation,
                publications: publications
            }, function (data) {

                if (data != '') {
                    $("#investigatorLists").empty().append(data);
                } else {
                    var div_data = '<div class="alert alert-danger"><strong>Danger!</strong> No data available according search.</div>';
                    $("#investigatorLists").append(data);
                }

            });
        }
    </script> 
    <script>
        function FilterProducts(pagenum) {
            var viewtype = $("#view_typeJ").val();
            var pageNumber_list_set = $(".page_number_list").val("1");
            var page_number_set = $(".page_number").val('1');
            var nav_filter = "<?php echo $conditon_nav_filter ?>";
            var category_arr = $('input[name="Fproduct_type"]').serializeArray();
            var sort_arr = $('input[name="Fsortby"]').serializeArray();
            var designer_arr = $('input[name="Fbrands"]').serializeArray();
            var price_arr = $('input[name="FAjpricebtwn"]').serializeArray();
            var metal_arr = $('input[name="FAproduct_Metal"]').serializeArray();
            var search = $("#filterFrm").serializeArray();
            $.ajax({
                url: "<?php echo BASE_URL; ?>ajaxdata_products.php",
                type: "POST",
                data: {page: pagenum, view_type: viewtype, sort_arr: sort_arr,
                    category_arr: category_arr, metal_arr: metal_arr, price_arr: price_arr, designer_arr: designer_arr, nav_filter: nav_filter},
                beforeSend: function () {
                    $('#loading-overlay').show();
                },
                complete: function () {
                    $('#loading-overlay').hide();
                },
                success: function (data) {
                    // alert(viewtype);
                    if (viewtype == 'grid') {
                        $("#grid").html(data);
                    } else if (viewtype == 'list') {
                        $("#list").html(data);
                    } else {
                        alert('not data append');
                    }
                    $('#loading-overlay').hide();
                },
                error: function () {
                }
            });
            }
            function loadProducts(pagenum, viewtype = ""){
            var search_term = '<?php if (isset($_GET['search_term'])) echo trim($_GET['search_term']); ?>';
            //   alert(search_term);
            if (viewtype == '') {
                var viewtype = $("#view_typeJ").val();
            }
            var nav_filter = "<?php echo $conditon_nav_filter ?>";
            var category_arr = $('input[name="Fproduct_type"]').serializeArray();
            var sort_arr = $('input[name="Fsortby"]').serializeArray();
            var designer_arr = $('input[name="Fbrands"]').serializeArray();
            var price_arr = $('input[name="FAjpricebtwn"]').serializeArray();
            var metal_arr = $('input[name="FAproduct_Metal"]').serializeArray();
            var search = $("#filterFrm").serializeArray();
            $.ajax({
            url: "<?php echo BASE_URL; ?>ajaxdata_products.php",
                    type: "POST",
                    data: {page: pagenum, view_type: viewtype, sort_arr: sort_arr,
                            category_arr: category_arr, metal_arr: metal_arr, price_arr: price_arr, designer_arr: designer_arr, nav_filter: nav_filter, search_term:search_term},
                    beforeSend: function () {
                        $('#loading-overlay').show();
                    },
                    complete: function () {
                        $('#loading-overlay').hide();
                    },
                    success: function (data) {
                        // alert(viewtype);
                        if (viewtype == 'grid') {
                            $("#grid").append(data);
                        } else if (viewtype == 'list') {
                            $("#list").append(data);
                        } else {
                            alert('not data append');
                        }
                        $('#loading-overlay').hide();
                    },
                    error: function () {
                    }
            });
            }
    </script>
    <?php if ($num_products > $PAGE_LIMIT) { ?>
        <script>
                // load more
                $(document).ready(function () {
                    if ($(window).width() <= 767) {
                        $(window).scroll(function () {
                            if ($(window).scrollTop() >= $(document).height() - $(window).height() - 100) {
                                var pagenum = parseInt($(".page_number").val()) + 1;
                                var datat = $(".page_number").val(pagenum);
                                // for mobile
                            }
                        });
                    } else {
                        $(window).scroll(function () {
                            if ($(window).scrollTop() == $(document).height() - $(window).height()) {
                                // alert(viewtype);
                                var viewtype = $("#view_typeJ").val();
                                if (viewtype == 'list') {
                                    var pagenum = parseInt($(".page_number_list").val()) + 1;
                                    var datat = $(".page_number_list").val(pagenum);
                                }
                                if (viewtype == 'grid') {
                                    var pagenum = parseInt($(".page_number").val()) + 1;
                                    var datat_list = $(".page_number").val(pagenum);
                                }
                                //    alert("aaaaaaa");
                                //  alert(pagenum);
                                loadProducts(pagenum);
                            }
                        });
                    }
                });
        </script>
    <?php } ?>     
    <script>
            $(document).ready(function () {
                loadProducts(1, 'list');
                $("#grid-view").click(function () {
                    $("#grid").show("");
                    var view_type = $("#view_typeJ").val('grid');
                    var page_number_set = $(".page_number").val('1');
                    $("#list").hide("");
                });
                $("#list-view").click(function () {
                    var pageNumber_list_set = $(".page_number_list").val("1");
                    $("#grid").hide("");
                    var view_type = $("#view_typeJ").val('list');
                    $("#list").show("");
                });
                $("#filter").click(function () {
                    $(".filter-content").addClass("dropdown-menu-2");
                });
                $("#close-filter").click(function () {
                    $(".filter-content").removeClass("dropdown-menu-2");
                });
            });
    </script>
    <script>
            function serverResponse(id, res, alertClass, tm = "6000") {
            var resmsg1 = '<div class="alert alert-dismissable alert alert-' + alertClass + '"><a href="#" class="close" data-dismiss="alert" aria-label="close"> x </a>\<strong class="text-capitalize">' + alertClass + '!</strong> <span>' + res + '</span> </div>';
            //response  msg aj st
            $('#' + id).show();
            $('#' + id).html(resmsg1);
            if (alertClass == "success" || alertClass == "info") {
                window.setTimeout(function () {
                    //   $('#'+id).fadeTo(500, 0).slideUp(500, function () {
                    $('#' + id).html("");
                    //   });
                }, tm);
            }
        }
        function addWishlist(id) {
            $('#loading-overlay').show();
            var user_id = '<?php echo $login_id; ?>';
            var total_item_wishlist = parseInt($('.total_item_wishlist').text());
            if (user_id) {
                $.ajax({
                    type: "POST",
                    data: {product_id: id, mode: 'addWishlist'},
                    url: "<?php echo BASE_URL ?>/controller/wishlist_operation.php",
                    success: function (data) {
                        if (data) {
                            if (data == 1) {
                                var response = 'Added to Wishlist successfully.';
                                serverResponse('resajmsg', response, "success");
                                var BASE_URL = '<?php echo BASE_URL; ?>';
                                var wishstatus = '<a onclick="removeWishlist(' + id + ')" ">  <img alt="" src="' + BASE_URL + 'frontend/img/heart1.png" style="height:20px; width:20px"/></a>';
                                $('#wishlistajlink' + id).html(wishstatus);
                                $('.total_item_wishlist').text(total_item_wishlist + 1)
                            } else {
                                var response = 'Products is already in your wishlist.';
                                serverResponse('resajmsg', response, "info"); //success danger //info   
                            }
                            $('#loading-overlay').hide();
                            //response  msg aj end   
                            $('.total_item_wishlist').text(total_item_wishlist + 1)
                        }
                        else {
                            alert('Error occured');
                        }
                    }
                });
            } else {
                // alert("please login to add  products to wishlist");
                //response  msg aj st
                var response = 'please login to add  products to wishlist';
                serverResponse('resajmsg', response, "danger"); //success danger //info
                $('#loading-overlay').hide();
                //response  msg aj end     
            }
        }
        function removeWishlist(id) {
            var user_id = '<?php echo $login_id; ?>';
            var wishlistproduct = "#wishlistproduct" + id;
            var total_item_wishlist = parseInt($('.total_item_wishlist').text());
            //  var cfm = confirm("Are you sure to remove products from wishlist");
            if (user_id) {
                // if (cfm) {
                $.ajax({
                    type: "POST",
                    data: {id: id, mode: 'removeWishlistUSR'},
                    url: "http://www.fxpips.co.uk/marketplace/controller/wishlist_operation.php",
                    success: function (data) {
                        if (data) {
                            //  alert(data);
                            if (data == 1) {
                                var response = 'Removed to  successfully.';
                                serverResponse('resajmsg', response, "success");
                                var BASE_URL = '<?php echo BASE_URL; ?>';
                                var wishstatus = '<a onclick="addWishlist(' + id + ')" "> <img alt="" src="' + BASE_URL + 'frontend/img/heart.png" style="height:20px; width:20px"/></a>';
                                $('#wishlistajlink' + id).html(wishstatus);
                                $('.total_item_wishlist').text(total_item_wishlist - 1)
                            } else {
                                var response = 'Not Removed  please try again later.';
                                serverResponse('resajmsg', response, "info"); //success danger //info   
                            }
                            $('#loading-overlay').hide();
                            //response  msg aj end   
                        }
                        else {
                            alert('Error occured');
                        }
                        $(wishlistproduct).remove();
                    }
                });
//            }
//        } else {
//            alert("please login to add  products to wishlist");
//        }
            } else {
                // alert("please login to add  products to wishlist");
                //response  msg aj st
                var response = 'please login to add  products to wishlist';
                serverResponse('resajmsg', response, "danger"); //success danger //info
                $('#loading-overlay').hide();
                //response  msg aj end     
            }
        }
        // when DOM is ready


        // Attach Button click event listener 
        function login_modelShow() {
            $('#loginajModel').modal('show');
        }

    </script>
<!--    <script type="text/javascript" src="<?php echo BASE_URL; ?>frontend/js/materialize1.js"></script>-->
    <?php
    include 'login_btn_model_popup.php';
// include 'include/footer.php';?>