<?php
include './include/header.php';
//print_r($_SESSION);
?>
<style>
    .contest
{
	display: inline-block;
	width: 100%;
	padding: 40px 0px;
}
.contest .carousel-control {
    bottom: 0;
    font-size: 20px;
    position: relative;
    text-align: center;
    text-shadow:none;
    top: 0;
    display: inline-block;
}

.contest .carousel-control i
{
	background: #5cc7c5;
	width: 40px;
	height: 40px;
	text-align: center;
	color: #fff;
	font-size: 30px;
	padding-top: 5px;
}
.contest .carousel-control .glyphicon-chevron-left, .contest .carousel-control .glyphicon-chevron-right, .contest .carousel-control .icon-prev, .contest .carousel-control .icon-next
{
	margin-top: -18px;
}
.contest .left.carousel-control
{
	margin: 0px;
	text-align: right;
}
.contest .right.carousel-control
{
	margin: 0px;
	text-align: left;

}
.gray-box
{
	background: #f5f5f5;
	display: inline-block;
	width: 100%;
	padding: 40px;
}
label
{
	font-weight: normal !important;
}
</style>
<div class="mainsection">
<div class="container">
<div class="row">
<img src="<?php echo BASE_URL; ?>frontend/img/Banner.png" class="img-responsive">
</div>
</div>
</div>


<div class="join">
  <div class="container">
    <div class="row">
      <h4 class="hadding"><strong>Our Runing Contest</strong></h4>
      <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
     
     <hr>

    </div>
  </div>
</div>


<div class="contest">
  <div class="container">
     <div class="row">
       <div class="col-md-6 col-sm-6">
         <h4 class="hadding text-left"><strong>Runing Contest</strong></h4>
       </div>
       <div class="col-md-6 col-sm-6 text-right">
         <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <i class="fa fa-angle-left" aria-hidden="true"></i>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <i class="fa fa-angle-right" aria-hidden="true"></i>
    <span class="sr-only">Next</span>
  </a>
       </div>

       <div class="col-md-12 col-sm-12 margintop30">
       <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
      <?php 
        $condition_opt = "1 and is_delete='0' and status='1'";
 $result_opt = $dbComObj->viewData($conn, "contests", "*", $condition_opt);
 $num_opt = $dbComObj->num_rows($result_opt);
 $co_count = 1;

 if ($num_opt > 0) { $class='';
     while ($data_opt = $dbComObj->fetch_assoc($result_opt)) {
       //   print_r($data_opt);
      
           $co_count;
            if($co_count==1){
                      $wrap_countr = 2;
            }
            if($data_opt['cover_image']){
                $thumb_image = BASE_URL . 'images/contest/thumb/' . $data_opt['cover_image']; 
            }else {
                 $thumb_image = BASE_URL .'frontend/img/default-product-image.png';
            }
              if ($co_count % $wrap_countr == 1) {
                                        ?>
                   <div class="item <?php if($co_count==1){ echo "active"; } ?>">
                                            <?php }
                                            ?>
                
       
 
      <div class="col-md-6 col-sm-6">
        <img src="<?php echo $thumb_image; ?>" class="img-responsive">
        <h4><strong><?php  echo $data_opt['title'];?></strong></h4>
        <p><?php $description= base64_decode( $data_opt['description']); 
        $description = (strlen($description) > 38) ? substr(strip_tags($description),0,50).'...' : $description;
         echo $description; ?></p>
        <p><strong>Last Time : <?php  echo $data_opt['last_date'];?></strong></p>
        <a href="<?php BASE_URL?>contestlist.php?id=<?php  echo $data_opt['id'];?>" class="btn btn-success">Participate</a>
          <a href="<?php BASE_URL?>contest_votes.php?a=<?php echo $njEncryptionObj->safe_b64encode($data_opt['id']);?>" class="btn btn-success">Vote</a>
      </div>
        <?php
            if ($co_count % $wrap_countr == 0) {
                echo '</div>';
            }
    
    $co_count++;}
      
     } ?>
    

  <!-- Controls -->

</div>
       </div>
     </div>
  </div>
</div>




<?php include 'include/footer.php'; ?>