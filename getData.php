<?php
include './system/config.php';

if(isset($_POST['mode'])) {
    $mode = ($_POST['mode']); 
} elseif(isset($_GET['mode'])) {
    $mode = ($_GET['mode']);  
}
$limit = 10;
switch ($mode) {

    case 'getReviews':
        $page = $_POST['page'] - 1;
        $offset = $limit * $page;
        $sortby = 'order by id desc';
        if (isset($_POST['a']) && $_POST['a']) {
            $prodcut_id = $_POST['a'];
            $id = $njEncryptionObj->safe_b64decode($prodcut_id);
            $condition = "1 and product_id = '" . $id . "' $sortby  LIMIT  " . $offset . ", " . $limit . " ";
        }
        //Sid
        if (isset($_POST['Sid']) && $_POST['Sid']) {
            $seller_id = $_POST['Sid'];
            $id = $njEncryptionObj->safe_b64decode($seller_id);
            $condition = "1 and seller_id = '" . $id . "' $sortby  LIMIT  " . $offset . ", " . $limit . " ";
        }
        $result = $dbComObj->viewData($conn, "reviews", "*", $condition);
        $num = $dbComObj->num_rows($result);
        if ($num > 0) {
            $i = 0;
            while ($data = $dbComObj->fetch_assoc($result)) {
                //  foreach($categoryList as $data) 
                // print_r($data);
                $user_id = $data['user_id'];
                $resultuser = $dbComObj->viewData($conn, "users", "name,image", "id=" . $user_id . "");
                $data_user = $dbComObj->fetch_assoc($resultuser);
                $user_name = $data_user['name'];
                $user_image = $data_user['image'];
                $user_image = BASE_URL . 'images/user/thumb/' . $data_user['image'];

                $timestamp = strtotime($data['added_on']);

                $added_on = date('d M ,Y', $timestamp);
                ?>
                <div class="full-width">

                    <div class="col-md-2 col-sm-2">
                        <img src="<?php echo $user_image; ?>" class="img-responsive circel">
                    </div>
                    <div class="col-md-10 col-sm-10">
                        <h4><a href="#"><?php echo $user_name; ?></a> on <?php echo $added_on; ?> </h4>
                        <div class="full-width">
                            <?php
                            for ($x = 1; $x <= $data['rating']; $x++) {
                                echo ' <img src="' . BASE_URL . 'frontend/img/star.png">';
                            }
                            $thumb_image = BASE_URL . 'images/reviews/thumb/' . $data['image'];
                            ?>        

                            <div class="col-md-4 col-sm-4 margintop10">
                                <div class="row">
                                    <img src="<?php echo $thumb_image; ?>" class="img-responsive">
                                </div>
                            </div>

                            <div class="col-md-8 col-sm-8 margintop30">
                                <p><a ><?php echo base64_decode($data['description']); ?> </a></p>
                            </div>

                        </div>
                    </div>
                </div>

                <hr>
                <?php
                $i ++;
            }
        } else {
            if ($page == 0)
                echo'<h4 align="center">No Reviews!</h4>';
        }


        break;
    case 'SuggestSellerProduct':
        $sortby = 'order by product_name desc';
         $searchTerm = $_GET['term'];
       $seller_id = $_SESSION['DH_seller_id'];
        if($seller_id){
         $condition = "1 and `delete` = '0' and status= '1' and seller_id = '" . $seller_id . "' and product_name like '%" . trim($_GET['term']) . "%' $sortby ";
        $result = $dbComObj->viewData($conn, "products", "*", $condition);
        $num = $dbComObj->num_rows($result);
        }
        if ($num > 0) { 
            $i = 0;
            while ($data = $dbComObj->fetch_assoc($result)) {
               $response[] = array("value"=>$data['product_id'],"label"=>$data['product_name']); 
             
                 
                //return json data
            }
        } else {
              echo "no products";
        }

        echo  json_encode($response);
        break;
}
?>