<?php
include './include/header.php';
//print_r($_SESSION);
 $id=$_GET['id'];
?>
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
         <h4 class="hadding text-left"><strong>Participate Contest</strong></h4>
       </div>
       <div class="full-width">
          <div class="gray-box">
            <div class="full-width">
              <div class="col-md-4 col-sm-4">
                <h4>Select Contest</h4>
              </div>
              <div class="col-md-4 col-sm-4 text-center">
                <h4>Details</h4>
              </div>
              <div class="col-md-4 col-sm-4 text-center">
                <h4>Rewards</h4>
              </div>
            </div>
              <form  action="<?php echo BASE_URL ?>participate.php"  method="GET"> 
                 <?php 
        $condition_opt = "1 and is_delete='0' and status='1'";
 $result_opt = $dbComObj->viewData($conn, "contests", "*", $condition_opt);
 $num_opt = $dbComObj->num_rows($result_opt);
 $co_count = 1;

 if ($num_opt > 0) { $class='';
     while ($data_opt = $dbComObj->fetch_assoc($result_opt)) {
       //   print_r($data_opt); ?>
            <div class="full-width margintop20">
              <div class="col-md-4 col-sm-4">
                <p> 
      <input name="contest" type="radio"  <?php if($id && $id == $data_opt['id'] ){ echo 'checked'; } ?>    id="title<?php  echo $co_count;?>" value="<?php  echo $njEncryptionObj->safe_b64encode($data_opt['id']);?>" />
      <label for="title<?php  echo $co_count;?>"><?php  echo $data_opt['title'];?></label>
    </p>
              </div>
              <div class="col-md-4 col-sm-4 ">
                <p><?php   $description = base64_decode($data_opt['description']);
                          $description = (strlen($description) > 38) ? substr(strip_tags($description),0,100).'...' : $description;
             echo $description;
                
                ?> </p>
              </div>
              <div class="col-md-4 col-sm-4">
                <p><?php $reward=  base64_decode($data_opt['reward']);
                        $reward = (strlen($reward) > 38) ? substr(strip_tags($reward),0,50).'...' : $reward;
         echo $reward;
                ?></p>
              </div>
            </div>
 <?php
    $co_count++;}
      
     } ?>
                    <?php  if($login_id){  ?>
                        <input type="submit" value="Next" class="btn btn-success pull-right">
                        <?php } else {
                        echo '<a class="btn btn-success pull-right" data-toggle="modal" data-target="#loginajModel">Next</a>';
                            
                        }  ?>
              </form>
         
          </div>
       </div>
    
     </div>
  </div>
</div>

<?php include 'include/footer.php'; include 'login_btn_model_popup.php'; ?>
