<?php
include './include/header.php';
//print_r($_SESSION);
$id = $_GET['a'];
if ($_GET['a']) {
    $id = $njEncryptionObj->safe_b64decode($id);
} else {
    $id = '';
}
$id;

 $condition_opt = " id='".$id."' and is_delete='0' and status='1'";
 $result_opt = $dbComObj->viewData($conn, "contests", "*", $condition_opt);
 $num_opt = $dbComObj->num_rows($result_opt);
 $contest = $dbComObj->fetch_assoc($result_opt);
     if($contest['cover_image']){
                $image = BASE_URL . 'images/contest/' . $contest['cover_image']; 
            }else {
                 $image = BASE_URL .'frontend/img/default-product-image.png';
            }
if(!$id  && !$contest)   {
    echo '<div class="col-offset-3 col-offset-10 "><h2>no contest availaalbe please try again later</h2></div>';
     die;
}         
?>
<!--<div class="mainsection">
<div class="container">
<div class="row">
<img src="<?php // echo $image; ?>" style="height: 300px;"  class="img-responsive">
</div>
</div>
</div>-->


<div class="join">
  <div class="container">
    <div class="row">
        <h4 class="hadding"><strong><?php echo $contest['title']; ?></strong></h4>
<!--        <h5>Description</h5><p><?php  echo base64_decode($contest['description']);?> </p>
         <h5>Reward</h5> <p><?php  echo base64_decode($contest['reward']);?> </p>-->
     <hr>
          <a href="<?php echo BASE_URL ?>contest_votes.php?a=<?php echo $cid; ?>" class="btn btn-success pull-right">Vote Now</a>
    </div>
  </div>
</div>

<div class="contest">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-6">
                <h4 class="hadding text-left"><strong>Vote your favourite Products</strong></h4>
            </div>
                
            <div class="full-width">
                 <div  id="resajmsg"> </div>
                <?php
              
                $condition1 = "1 and  `contest_id` = " . $id . "  GROUP BY contest_id";
                $colom1 = "id,contest_id,seller_id, GROUP_CONCAT(product_id SEPARATOR ',') as approved_product ,GROUP_CONCAT(selected_product SEPARATOR ',') as seller_select";
                $result1 = $dbComObj->viewData($conn, "contests_participate", $colom1, $condition1);
                $num1 = $dbComObj->num_rows($result1);
                $data1 = $dbComObj->fetch_assoc($result1);
                
                //  print_r($data1);
                  $contest_id = $data1['contest_id'];
                $approved_product = $data1['approved_product'];
                $approved_product_arr = (explode(",", $approved_product));
                $approved_product_arr = array_unique($approved_product_arr);

                $seller_select = $data1['seller_select'];
                $seller_select_arr = (explode(",", $seller_select));
                $i = 0;
                $wrap_count = 3; // you can change this no of divs to wrap
                if($approved_product_arr){
                foreach ($approved_product_arr as $product_id) {
                    if ($product_id) {
                        $condition = "1 and `delete`='0' and `product_id` = " . $product_id . " and status='1'";
                        $result = $dbComObj->viewData($conn, "products", "*", $condition);
                        $num = $dbComObj->num_rows($result);
                        $data = $dbComObj->fetch_assoc($result);
                      
                        if ($num) {
                              $condition_image = "`product_id` = " . $product_id . " ORDER BY RAND()  LIMIT 1";
                        $result_image = $dbComObj->viewData($conn, "product_image", "*", $condition_image);
                        $data_image = $dbComObj->fetch_object($result_image);

                        if (isset($data_image->thumb_image))
                            $thumb_image = BASE_URL . 'images/products/thumb/' . $data_image->thumb_image;
                        else
                            $thumb_image = BASE_URL . 'frontend/img/default-product-image.png';
                        // end of image code

                        $i+=1;
                        if ($i % $wrap_count == 1) {
                            echo '<div class="full-width">';
                        }
                        //print_r($data);
                    $url_id = $njEncryptionObj->safe_b64encode($data['product_id']);
                        $data->slug;
                        $datail_page = BASE_URL . 'detail/' . $url_id . '/' . $data['slug'] . '/';
                        '/';
                            //  print_r($data); 
                             if ($login_id && $contest_id) {
                $condition_Wishlist = " `user_id` = '" . $login_id . "' and  `product_id` = '" .$data['product_id'] . "' and  `contest_id` = '" . $contest_id . "' ";
                $resultWIsh = $dbComObj->viewData($conn, 'contest_Votes', "*", $condition_Wishlist);
                $numWish = $dbComObj->num_rows($resultWIsh);
                if ($numWish) {
                
                     $voting_ICOn ='<a class ="btn btn-info">Voted</a>';
                } else {
                    //    $wishlist_ICOn=  '<a onclick="addWishlist('.$data->product_id.')"> <i class="fa fa-heart-o" aria-hidden="true"></i></a>';        
                    $voting_ICOn = '<a class="btn btn-default"  onclick="addVoted(' . $data['product_id'] . ','.$contest_id.',' . $data['seller_id'] . ')"><img alt="" src="' . BASE_URL . 'frontend/img/like.png" 
                                        /></a>';
                }  
            } else {
                //   $wishlist_ICOn= '<a onclick="addWishlist('.$data->product_id.')"> <i class="fa fa-heart-o" aria-hidden="true"></i></a>'; 
                $voting_ICOn = '<a onclick="login_modelShow()"><img alt="" src="' . BASE_URL . 'frontend/img/like.png" 
                                        /></a>';
            }
                            ?>
                            <div class="col-md-4 col-sm-4">
                                <div class="box">
                                    <a href="<?php echo $datail_page; ?>">
                                        <center class="product-grid">
                                            <img src="<?php echo $thumb_image; ?>" class="img-responsive"/>
                                            <div class="home-img-eq" id="wishlistajlink<?php echo $data->product_id; ?>">
                                           
                                            </div>
                                        </center>
                                    </a>  
                                   <?php $title = $data['product_name'];
                                         $title = (strlen($title) > 28) ? substr($title, 0, 25) . '...' : $title;
                                    ?>
                                  
                                        <h4 class="sub-hadding" align="center" ><?php echo $title; ?></h4>
                                   <center> 
                                  
                                       <div id="voting_icon<?php echo $data['product_id'];?>" class="voting_icon">  <?php echo $voting_ICOn; ?> </div>
                                   </center>
                                </div>

                            </div>

                        <?php
                        }
                    }

                    if ($i % $wrap_count == 0) {
                        echo '</div>';
                    }
                }
                if ($i % $wrap_count != 0) {
                    echo '</div>';
                }
                }else {
                    echo'<h3 align="center">No product found !</h3>';
                }
                ?>

            </div>

        </div>
    </div>
</div>

<?php include 'include/footer.php'; 
  include 'login_btn_model_popup.php';?>
<script>
      function login_modelShow() {
            $('#loginajModel').modal('show');
        }
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
     function addVoted(id,cid,sid) { 
            $('#loading-overlay').show();
            var user_id = '<?php echo $login_id; ?>';
            var $contest = ' <?php echo $contest['title']; ?>';
            var total_item_wishlist = parseInt($('.total_item_wishlist').text());
            if (user_id) {
                $.ajax({
                    type: "POST",
                    data: {product_id: id,cid:cid,sid:sid ,mode: 'addVote'},
                    url: "<?php echo BASE_URL ?>/controller/voting_operation.php",
                    success: function (data) {
                       // alert(data);
                        if (data) {
                            if (data == 1) {
                                var response = 'Voted successfully.';
                                serverResponse('resajmsg', response, "success");
                                var BASE_URL = '<?php echo BASE_URL; ?>';
                             //   var witatus = '<a onclick="removeWishlist(' + id + ')" ">  <img alt="" src="' + BASE_URL + 'frontend/img/heart1.png" style="height:20px; width:20px"/></a>';
                                var voting_ICOn ='<a class ="btn btn-info">Voted</a>';
                                $('#voting_icon' + id).html(voting_ICOn);
                                $('.total_item_wishlist').text(total_item_wishlist + 1)
                            } else {
                                var response = 'You are Already  voted on  <b style=" text-transform: uppercase;"> '+ $contest +'</b>';
                                serverResponse('resajmsg', response, "info"); //success danger //info   
                            }
                            $('#loading-overlay').hide();
                            //response  msg aj end   
                            $('.total_item_wishlist').text(total_item_wishlist + 1)
                        }
                        else {
                            alert('Error occured');
                            console.log(data);
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
    </script>