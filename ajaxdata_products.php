<?php
//include database configuration file
include './system/config.php';

$view_type = $_POST['view_type']; // grid and list
if ($view_type == "list") {
    $limit = LIST_PAGE_LIMT;
} else {
    $limit = GRID_PAGE_LIMT;
}
$page = $_POST['page'] - 1;
$offset = $limit * $page;
$sortby = 'order by product_id desc';
//  search filter term start
//  sort_arr, category_arr, metal_arr, price_arr, designer_arr
// sort by or order by  
if (isset($_POST['sort_arr']) && $_POST['sort_arr']) {
    $sort_arr = $_POST['sort_arr'];
    $sort_count = count($sort_arr);
    $sortby = "ORDER BY  "; //ORDER BY `DATE` DESC, `IMPORTANCE` DESC
    for ($x = 0; $x < $sort_count; $x++) {
        $value = $sort_arr[$x]['value'];
        switch ($value) {
            case "new":
                $sortby .= '`product_id`  DESC,';
                break;
            case 'top_picks':
                $sortby .= '`product_id`  DESC,';
                break;
            case "best_sellers":
                $sortby .= '`product_id`  DESC,';
                break;
            case "customer_top_rated":
                $sortby .= '`product_id`  DESC,';
                break;
            case "price_desc":
                $sortby .= '`price`  DESC,';
                break;
            case "price_asc":
                $sortby .= '`price`  ASC ,';
                break;
            default:
                $sortby .= '';
        }
    }
    $sortby = rtrim($sortby, ",");
    $sortby;
}

// category_arr       //  sort_arr, category_arr, metal_arr, price_arr, designer_arr
if (isset($_POST['category_arr']) && $_POST['category_arr']) {
    $category_arr = $_POST['category_arr'];
    $category_count = count($category_arr);
    $category_filter = ""; //ORDER BY `DATE` DESC, `IMPORTANCE` DESC
    $categories_ajflt = '';
    for ($x = 0; $x < $category_count; $x++) {
        $value = $category_arr[$x]['value'];
        $categories_ajflt .= "FIND_IN_SET( '" . $value . " ', category_id)  OR ";
    }
    $categories_ajflt = rtrim($categories_ajflt, 'OR ');
    $category_filter = "and ( $categories_ajflt ) ";

    $category_filter;
} else {
    $category_filter = '';
}
//  search filter term end
// designer_arr   Brand     //  sort_arr, category_arr, metal_arr, price_arr, designer_arr
if (isset($_POST['designer_arr']) && $_POST['designer_arr']) {
    $designer_arr = $_POST['designer_arr'];
    $designer_count = count($designer_arr);
    $designer_filter = ""; //ORDER BY `DATE` DESC, `IMPORTANCE` DESC
    $designer_ajflt = '';
    for ($x = 0; $x < $designer_count; $x++) {
        $value = $designer_arr[$x]['value'];
        $designer_ajflt .= "Brand = '" . $value . " ' OR ";
    }
    $designer_ajflt = rtrim($designer_ajflt, 'OR ');
    $designer_filter = "and ( $designer_ajflt ) ";

    $designer_filter;
} else {
    $designer_filter = '';
}
// price_arr   price     //  sort_arr, category_arr, metal_arr, price_arr, designer_arr
if (isset($_POST['price_arr']) && $_POST['price_arr']) {
    $price_arr = $_POST['price_arr'];
    $price_count = count($price_arr);
    $price_filter = ""; //ORDER BY `DATE` DESC, `IMPORTANCE` DESC
    $price_ajflt = '';
    for ($x = 0; $x < $price_count; $x++) {
        $value = $price_arr[$x]['value'];
        $price_ajflt .= "price " . $value . "  OR ";
    }
    $price_ajflt = rtrim($price_ajflt, 'OR ');
    $price_filter = "and ( $price_ajflt ) ";

    $price_filter;
} else {
    $price_filter = '';
}
// metal_arr   Brand     //  sort_arr, category_arr, metal_arr, price_arr, designer_arr
if (isset($_POST['metal_arr']) && $_POST['metal_arr']) {
    $metal_arr = $_POST['metal_arr'];
    $metal_count = count($metal_arr);
    $metal_filter = ""; //ORDER BY `DATE` DESC, `IMPORTANCE` DESC
    $metal_ajflt = '';
    for ($x = 0; $x < $metal_count; $x++) {
        $value = $metal_arr[$x]['value'];
        $metal_ajflt .= "product_metal = '" . $value . " ' OR ";
    }
    $metal_ajflt = rtrim($metal_ajflt, 'OR ');
    $metal_filter = "and ( $metal_ajflt ) ";

    //echo    $metal_filter;
} else {
    $metal_filter = '';
}
// search  select condtion start 
if (isset($_POST['search_term']) && $_POST['search_term']) {
    $search_term = " and product_name like '%" . $_POST['search_term'] . "%'";
} else {
    $search_term = "";
}
//navigation filter                
if (isset($_POST['nav_filter']) && $_POST['nav_filter']) {
    $nav_filter = $_POST['nav_filter'];
} else {
    $nav_filter = "";
}

if ($category_filter) {
    $nav_filter_aJ = '';
} else {
    $nav_filter_aJ = $nav_filter;
}
// final condition
$condition = "left JOIN users on users.id=products.seller_id 
    where  products.`delete` = '0' and  products.status= '1' and ((  users.status='1' and users.approved='1') OR  seller_id='0')  $search_term $nav_filter_aJ"
        . " $category_filter $designer_filter $price_filter $metal_filter   $sortby   LIMIT  " . $offset . ", " . $limit . "  ";
//    $product_colom = 'products.*,CASE products.product_type
//when "grouped" and products.group_products > 0 then products.group_products END as expose '; 
$product_colom = 'products.* ';
// SELECT products.* FROM `products` inner join users  where products.`delete` = '0' and products.status= '1' and users.status=  '1'  order by product_id desc LIMIT 0, 21
//  echo '<br>'; echo $condition;
//get rows query  
$login_id = '';
if ($_SESSION) {
    if (isset($_SESSION['user_id']))
        $login_id = $_SESSION['user_id'];
    if (isset($_SESSION['DH_seller_id'])) {
        $login_id = $_SESSION['DH_seller_id'];
        $loginSeller = $_SESSION['DH_seller_type_name'];
    }
}
if ($view_type == "grid") {

    $result = $dbComObj->viewJoinData($conn, "products", $product_colom, $condition);
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
            $data->slug;
            $datail_page = BASE_URL . 'detail/' . $url_id . '/' . $data->slug . '/';
            if ($login_id) {
                $condition_Wishlist = " `user_id` = '" . $login_id . "' and `product_id` = '" . $data->product_id . "' ";
                $resultWIsh = $dbComObj->viewData($conn, 'wishlist', "*", $condition_Wishlist);
                $numWish = $dbComObj->num_rows($resultWIsh);
                if ($numWish) {
                    //  $wishlist_ICOn= '<a onclick="removeWishlist('.$data->product_id.')"> <i class="fa fa-heart" aria-hidden="true"></i></a>';
                    $wishlist_ICOn = '<a onclick="removeWishlist(' . $data->product_id . ')">
                                  <img alt="" src="' . BASE_URL . 'frontend/img/heart1.png" 
                                        style="height:20px; width:20px"  /></a>';
                } else {
                    //    $wishlist_ICOn=  '<a onclick="addWishlist('.$data->product_id.')"> <i class="fa fa-heart-o" aria-hidden="true"></i></a>';        
                    $wishlist_ICOn = '<a onclick="addWishlist(' . $data->product_id . ')"><img alt="" src="' . BASE_URL . 'frontend/img/heart.png" 
                                        style="height:20px; width:20px"  /></a>';
                }
            } else {
                //   $wishlist_ICOn= '<a onclick="addWishlist('.$data->product_id.')"> <i class="fa fa-heart-o" aria-hidden="true"></i></a>'; 
                $wishlist_ICOn = '<a onclick="login_modelShow()"><img alt="" src="' . BASE_URL . 'frontend/img/heart.png" 
                                        style="height:25px; width:25px" /></a>';
            }
            ?>        

            <div class="col-md-4 col-sm-4">
                <div class="box">
                    <a href="<?php echo $datail_page; ?>">
                        <center class="product-grid">
                            <img src="<?php echo $thumb_image; ?>" class="img-responsive"/>
                            <div class="home-img-eq" id="wishlistajlink<?php echo $data->product_id; ?>">
                                <?php echo $wishlist_ICOn; ?>
                            </div>
                        </center>
                    </a>
                    <!--                             
                                                       <img src="<?php //echo $thumb_image;      ?>" class="img-responsive">
                                                     </center>-->
                    <?php $title = $data->product_name;
                    $title = (strlen($title) > 28) ? substr($title,0,25).'...' : $title;?>
                    <a href="<?php echo $datail_page; ?>">
                        <h4 class="sub-hadding" align="center" ><?php echo $title; ?></h4>
                        <p><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half-o"></i></p>
                        <p class="text-center price-text-color"><?php echo $data_price; ?></p></a>
                </div>

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
    } else {
        if ($page == 0)
            echo'<h3 align="center">No product found !</h3>';
    }
}
if ($view_type == "list") {
    // echo $num;
    $result1 = $dbComObj->viewJoinData($conn, "products", $product_colom, $condition);
    $num1 = $dbComObj->num_rows($result1);
    if ($num1 > 0) {
        $j = 0;
        $wrap_count1 = 2; // you can change this no of divs to wrap

        while ($data1 = $dbComObj->fetch_object($result1)) {
            $j+=1;
            if ($data1->price)
                $data_price = '$ ' . ($data1->price);
            else
                $data_price = '-';

            // image code start
            $condition_image = "`product_id` = " . $data1->product_id . " ORDER BY RAND()  LIMIT 1";
            $result_image = $dbComObj->viewData($conn, "product_image", "*", $condition_image);
            $data_image = $dbComObj->fetch_object($result_image);

            if (isset($data_image->thumb_image))
                $thumb_image = BASE_URL . 'images/products/thumb/' . $data_image->thumb_image;
            else
                $thumb_image = BASE_URL . 'frontend/img/default-product-image.png';
            // end of image code
            $url_id = $njEncryptionObj->safe_b64encode($data1->product_id);
            $datail_page = BASE_URL . 'detail/' . $url_id . '/' . $data1->slug . '/';
            if ($j % $wrap_count1 == 1) {
                echo '<div class="full-width">';
            }
            ?>             
            <div class="col-md-6 col-sm-6">
                <a href="<?php echo $datail_page; ?>"><div class="box">
                        <div class="col-md-4 col-sm-4">
                            <div class="row">
                                <img src="<?php echo $thumb_image; ?>" class="img-responsive">
                            </div>
                        </div>
                        <div class="col-md-8 col-sm-8">
                            <h4 class="sub-hadding" ><?php echo $data1->product_name; ?></h4>
                            <p><a href="<?php
                                echo $datail_page;
                                ?>">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-half-o"></i>
                                </a></p>
                            <p class=""><a href="<?php
                                echo $datail_page;
                                ;
                                ?>"><?php echo $data_price ;?></a></p>
                        </div>
                    </div></a>
            </div>
            <?php
            if ($j % $wrap_count1 == 0) {
                echo '</div>';
            }
            ?>
            <?php
        }
        if ($j % $wrap_count1 != 0) {
            echo '</div>';
        }
        //  if ($count%3 != 1) echo "</div>"; //This is to ensure there is no open div if the number of elements in user_kicks is not a multiple of 4
    } else {
        if ($page == 0)
            echo'<h3 align="center">No product found !</h3>';
    }
}
if ($view_type == "sellerProducts") {
    $Sid = $_POST['Sid'];
    $condition_seller = " `delete` = '0' and status= '1'  and `seller_id` = " . $Sid . "  order by product_id desc LIMIT  " . $offset . ", " . $limit . " ";
    $result = $dbComObj->viewData($conn, "products", "*", $condition_seller);
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
                        <h4 class="sub-hadding" align="center" ><?php echo $data->product_name; ?></h4>
                        <p><a href="<?php echo BASE_URL; ?>detail/"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half-o"></i></a></p>
                        <p class="text-center"><a href="<?php echo BASE_URL; ?>detail/"><?php echo $data_price; ?></a></p>
                    </div></a>
            </div>

            <?php
            if ($i % $wrap_count == 0) {
                echo '</div>';
            }
        }
        if ($i % $wrap_count != 0) {
            echo '</div>';
        }
        //  if ($count%3 != 1) echo "</div>"; //This is to ensure there is no open div if the number of elements in user_kicks is not a multiple of 4
    } else {
        if ($page == 0)
            echo'<h3 align="center"><b>No product found !</b></h3>';
    }
}
?>   
