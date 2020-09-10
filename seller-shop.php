<?php
include './include/header.php';
//print_r($_SESSION);
$login_id = '';
if ($_SESSION) {
    if (isset($_SESSION['user_id']))
        $login_id = $_SESSION['user_id'];
    if (isset($_SESSION['DH_seller_id'])) {
        $login_id = $_SESSION['DH_seller_name'];
        $loginSeller = $_SESSION['DH_seller_type_name'];
    }
}

$UriSegmentID = $ajGenObj->getUriSegment(3);
$seller_urlslug = $ajGenObj->getUriSegment(4);
$id = intval($njEncryptionObj->safe_b64decode($UriSegmentID));
if (($UriSegmentID && is_int($id))) {

    $condition = "`id` = " . $id . " ";
    $results = $dbComObj->viewData($conn, "users", "*", $condition);
    $seller = $dbComObj->fetch_object($results);
}

if ($seller == "") {
    header("Location: " . BASE_URL . "404/"); /* Redirect browser */
    exit();
}
$limit=GRID_PAGE_LIMT;
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
    .modal-backdrop.in{
display:none !important;
}
</style>
<?php
if (isset($seller->cover_image)) {
    $cover_image = BASE_URL . 'images/user/cover/thumb/' . $seller->cover_image;
} else {
    $cover_image = BASE_URL . 'frontend/img/profile-bg.png';
}
if (isset($seller->shop_image)) {
    $shop_image = BASE_URL . 'images/user/shop/thumb/' . $seller->shop_image;
} else {
    $shop_image = BASE_URL . 'frontend/img/default-product-image.png';
}
if (isset($seller->image)) {
    $seller_image = BASE_URL . 'images/user/thumb/' . $seller->image;
} else {
    $seller_image = BASE_URL . 'frontend/img/default-product-image.png';
}

?>
<!--<div class="mainsection">
<img src="<?php echo $cover_image; ?>" class="img-responsive">
<div class="slider-postion">
</div>

</div>-->


<div class="gid-view">
    <div class="container">
        <div class="row">
            <div class="product-list">
                <div class="col-md-3 col-sm-3">
                    <div class="user-profile">
                        <img src="<?php echo $shop_image; ?>" class="img-responsive">
                    </div>
                    <h4 class="hadding text-left margintop30">Discription</h4>
                    <p class="text-justify"><?php echo $seller->discripation; ?></p>
                </div>
                <div class="col-md-9 col-sm-9">
                    <div class="full-width">
                        <div class="col-md-9 col-sm-9">
                            <h3><?php echo $seller->shop_name; ?></h3>
                            <p><i class="fa fa-heart"></i> <?php echo $seller->shop_heading; ?> <i class="fa fa-heart"></i></p>
                            <p><i class="fa fa-map-marker"></i><?php echo $seller->shop_city . ' ' . $seller->shop_state . ' ' . $seller->shop_country ?>| 82219 Sales |On Since <?php echo date(" F Y", strtotime($seller->added_on)); //;$data->added_on;  ?></p>

                            <a href="#" class="btn btn-dfault"><i class="fa fa-heart"></i> Favourite Shop (54942)</a>

                        </div>
                        <div class="col-md-3 col-sm-3 margintop30">

                            <center>
                                <?php $seller_page = BASE_URL . 'seller-profile/' . $UriSegmentID . '/' . $seller_urlslug . '/'; ?>
                                <h4>SHOP OWNER</h4>
                                 <a href="<?php echo $seller_page; ?>"><img src="<?php echo $seller_image; ?>" class="img-responsive circel-profile"></a>
                                <a href="<?php echo $seller_page; ?>" class="margintop10"><strong><?php echo $seller->name; ?></strong></a>
                                <p> <a href="#"><i class="fa fa-envelope"></i> <?Php echo $seller->email ?></a></p>
                                <p> <i class="fa fa-phone"></i>&nbsp <?php echo $seller->contact_no ?></p>
                            </center>
                        </div>
                    </div>


                    <div class="col-md-12 col-sm-12 margintop30">
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Seller Product</a></li>
                              <?php    $condition_rew = "1 and seller_id = '". $id."'";
         $result_rew = $dbComObj->viewData($conn,"reviews", "*",$condition_rew);  
          $num_rew = $dbComObj->num_rows($result_rew); ?>
       
                            <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">All Reviews (<?php echo $num_rew; ?>)</a></li>
                            <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Policy</a></li>
                        </ul>

                    </div>

                    <div class="col-md-12 col-sm-12">
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="home">
<!--                                <div class="full-width margintop30">
                                    <div class="col-md-4 col-sm-4 col-md-offset-8 col-sm-offset-8">
                                        <div class="row">
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Search for...">
                                                <span class="input-group-btn">
                                                    <button class="btn btn-success" type="button">Search</button>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>-->
                                <div class="full-width margintop30">
<?php
        $condition = " `delete` = '0' and status= '1' and `seller_id` = " . $id . "  order by product_id desc LIMIT $limit ";
?>

                                    <div id="grid">
                                    <?php
                                    $result = $dbComObj->viewData($conn, "products", "*", $condition);
                                    $num = $dbComObj->num_rows($result);
                                    if ($num > 0) {
                                        $i = 0;
                                        $wrap_count = 3; // you can change this no of divs to wrap
                                        while ($data = $dbComObj->fetch_object($result)) {
                                            ?>
                                                <?php
                                                // image code start
                                                $condition_image = "`product_id` = " . $data->product_id . " ORDER BY RAND()  LIMIT 1";
                                                $result_image = $dbComObj->viewData($conn, "product_image", "*", $condition_image);
                                                $data_image = $dbComObj->fetch_object($result_image);

                                                if (isset($data_image->thumb_image))
                                                    $thumb_image = BASE_URL . 'images/products/thumb/' . $data_image->thumb_image;
                                                else
                                                    $thumb_image = BASE_URL . 'frontend/img/default-product-image.png';
                                                // end of image code

                                                if ($data->price)
                                                    $data_price = '$ ' . ($data->price);
                                                else
                                                    $data_price = '-';
                                                $i+=1;
                                                if ($i % $wrap_count == 1) {
                                                    echo '<div class="full-width">';
                                                }
                                                $url_id = $njEncryptionObj->safe_b64encode($data->product_id);
                                                $datail_page = BASE_URL . 'detail/' . $url_id . '/' . $data->slug . '/';
                                                ?>        

                                                <div class="col-md-4 col-sm-4">
                                                    <a href="<?php echo $datail_page; ?>"><div class="box">
                                                            <center>
                                                                <img src="<?php echo $thumb_image; ?>" class="img-responsive">
                                                            </center>
															<?php
                                                                           $title = $data->product_name;
                                                                           $title = (strlen($title) > 20) ? substr($title, 0, 17) . '...' : $title;
                                                                           ?>
                                                            <h4 class="sub-hadding" align="center" ><?php echo $title; ?></h4>
                                                            <p><a href="<?php echo BASE_URL; ?>detail/"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half-o"></i></a></p>
                                                            <p class="text-center price-text-color"><a href="<?php echo BASE_URL; ?>detail/"><?php echo $data_price; ?></a></p>
                                                        </div></a>
                                                </div>

        <?php
        if ($i % $wrap_count == 0) {
            echo '</div>';
        }
        ?>


                                                <?php
                                            }
                                            if ($i % $wrap_count != 0) {
                                                echo '</div>';
                                            }
                                            //  if ($count%3 != 1) echo "</div>"; //This is to ensure there is no open div if the number of elements in user_kicks is not a multiple of 4
                                        }
                                        ?>         
                                    </div>

                                    <div id="loading-overlay" class="loading-overlay">loading.....</div> 

                                </div></div>


                            <div role="tabpanel" class="tab-pane" id="profile">
                                <div class="box">

                                <?php // echo  $_SERVER['REQUEST_URI'];  
             if(empty($login_id)){
           //   $reference_page ='detail/'. $UriSegmentID . '/' .$ajGenObj->getUriSegment(4) . '';
                    echo '<button type="button" class="btn btn-info" data-toggle="modal" data-target="#loginajModel">Write a Review</button>';
                     include 'login_btn_model_popup.php';
              } else { ?>
            <button type="button" class="btn btn-success margintop3" data-toggle="modal" data-target="#ajWriteReviewModal">Write a Review</button>  
              <?php }  ?>  
              </br>
    
        
          <div id="getReviews" style="margin-top:20px;"> </div>
          <?php if($num_rew>10){ ?>
          <button type="button" class="btn btn-success"  id="loadmoreReviews" >Load More</button>
            <?php } ?>
    
                                </div>

                            </div>

                            <div role="tabpanel" class="tab-pane" id="settings" style="margin-top:25px; border:1px solid #ddd; padding:10px;">

                                <h3 class="hadding text-left margin0">Shop Policies</h3>
                                <p class="margintop10"> <?php echo base64_decode($seller->shop_policy) ?>
                                </p>

                                <h3 class="hadding text-left margin0">Payment</h3>
                                <p class="margintop10"><?php echo base64_decode($seller->payment_policy) ?>
                                <h3 class="hadding text-left margin0">Shipping</h3>
                                <p class="margintop10">
<?php echo base64_decode($seller->shipping_return_policy) ?>
                                </p>

                            </div>

                        </div>
                    </div>
                    <input type="hidden" class="page_number" name="page_number" value= "1"/>
                    <input type="hidden" class="page_number_list" name="page_number_list" value= "1"/>
                    <input type="hidden"  id="view_typeJ" name="view_type" value= "grid"/>
                    <input type="hidden" class="total_record" name="total_record" value="" />

                    <!--List-->

                    <!--list-->


                </div>
            </div>

        </div>
    </div>
</div>

</div>
 <input type="hidden" class="reviewpageNum" name="reviewpageNum" value= "1"/>
<script>
     $("#loadmoreReviews").show();    
   loadReviews(1);
   
   $("#loadmoreReviews").click(function(){
       var pagenum = parseInt($(".reviewpageNum").val()) + 1;
        var datat = $(".reviewpageNum").val(pagenum);
       // alert(pagenum);
         loadReviews(pagenum);
});
  function loadReviews(pagenum){
     var   mode='getReviews'; 
     var   Sid="<?php echo $UriSegmentID ; ?>";
            $.ajax({              
                url: "<?php echo BASE_URL; ?>getData.php",
                type: "POST",
                data: {page: pagenum,mode:mode,Sid:Sid},
                beforeSend: function () {
                    $('#loading-overlay').show();
                },
                complete: function () {
                    $('#loading-overlay').hide();
                },
                success: function (data) {
                  //  alert(data);
                    // alert(viewtype);
                    if(data){
                        $("#getReviews").append(data); 
                           $("#loadmoreReviews").show();                    
                    } else{
                       $("#loadmoreReviews").hide();       
                    }
                    $('#loading-overlay').hide();
                },
                error: function () {
                }
            });
        }
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#loading-overlay').hide();
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
                    //   alert(11);
                    var pagenum = parseInt($(".page_number").val()) + 1;
                    var datat_list = $(".page_number").val(pagenum);
                    var viewtype = 'sellerProducts';
                    var Sid = '<?php echo $id; ?>';
                    $.ajax({
                        url: "<?php echo BASE_URL; ?>ajaxdata_products.php",
                        type: "POST",
                        data: {page: pagenum, view_type: viewtype, Sid: Sid},
                        beforeSend: function () {
                            $('#loading-overlay').show();
                        },
                        complete: function () {
                            $('#loading-overlay').hide();
                        },
                        success: function (data) {
                            // alert(viewtype);
                            $("#grid").append(data);
                            $('#loading-overlay').hide();

                        },
                        error: function () {
                        }
                    });

                }


            });
        }
    });


</script>
<link rel="stylesheet" href="<?php echo BASE_URL; ?>frontend/custom/star.css" type="text/css" media="all" />

<script type="text/javascript" src="<?php echo BASE_URL; ?>frontend/js/materialize.js"></script>
<script src="<?php echo BASE_URL; ?>js/jquery.validate.js"></script>
<script src="<?php echo BASE_URL; ?>js/nj_form.js"></script>
<?php 
        //include 'include/footer.php';
if($login_id) {
?>
             <!-- Modal start-->
             
<div id="ajWriteReviewModal" class="modal fade" role="dialog">
    <br>
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Write your own review</h4>
      </div>  
      <div class="modal-body">
     <?php  if(empty($login_id)){  ?>
  <div class="alert alert-info">
  <strong>info! </strong> Only registered users can write reviews
</div>
     <?php  } ?>
     <div id="errorMessageReviewLog"></div>
           <form method="post" id="addReviews" class="">  
                            <div class="row">
                                <div class="col-md-8">
<!--                                    <div class="form-group">
                                        <label>Title</label>
                                        <input class="form-control" required="" type="text" id="title" name="title">
                                    </div>-->
                                    <div class="form-group">
                                        <label>Review</label>
                                        <textarea class="form-control" required="" name="description" id="description" rows="3"></textarea>
                                    </div>
                                     <div class="form-group">
                                        <label class="custom-file">
                                <input type="file" id="file" name="image" class="custom-file-input">
                                          <span class="custom-file-control"></span>
                                        </label>
                                      </div>
                                       <div class="form-group">
                                        <input type="hidden" name="mode" value="<?php echo base64_encode("addReview"); ?>" />
                                         <input type="hidden" name="seller_id" value="<?php echo $id;?>" />
                                        <button type="button" onclick="formSubmit('addReviews', 'errorMessageReviewLog', '<?php echo BASE_URL; ?>controller/review_operation.php')" class="btn btn-success margintop30 btn btn-lg">Post </button>
                                    </div>
                                </div> 
                                <div class="col-md-4 form-group" >
                                    Rate it
                                   <div class="stars">
        <input type="radio" name="rating" class="star-1" id="star-1" value="1" required=""/>
        <label class="star-1" for="star-1">1</label>
        <input type="radio" name="rating" class="star-2" id="star-2" value="2" required="" />
        <label class="star-2" for="star-2">2</label>
        <input type="radio" name="rating" class="star-3" id="star-3" value="3" required=""  />
        <label class="star-3" for="star-3">3</label>
        <input type="radio" name="rating" class="star-4" id="star-4" value="4"  required=""/>
        <label class="star-4" for="star-4">4</label>
        <input type="radio" name="rating" class="star-5" id="star-5" value="5" required="" />
        <label class="star-5" for="star-5">5</label>
        <span></span>
    </div>
                                </div>
                            </div>
                        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<?php } ?>            
    <input type="hidden" class="reviewpageNum" name="reviewpageNum" value= "1"/>
<!-- end model write reviews-->
<div id="loading-overlay" class="loading-overlay"></div>     