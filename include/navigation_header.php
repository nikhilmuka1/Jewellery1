<div class="hader">
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="row">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <div class="col-xs-3">
                        <center>
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </center>
                    </div>
                    <div class="col-xs-3">
                        <div class="row">
                            <a href="<?php echo BASE_URL; ?>" class="navbar-brand"><img src="<?php echo BASE_URL ?>frontend/img/logo.png" class="img-responsive"></a>
                        </div>
                    </div>
                    <div class="col-xs-6 text-right">
                    <!--<ul class="sign-link pull-right text-right">
                                            
                                                    <?php if (isset($login_name) && $login_name) { ?> 
                                                        <li class="dropdown">
                                                            <a href="javascript:void(0)"  class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-user" aria-hidden="true"></i>
                                                                <?php echo $login_name; ?> <span><i class="fa fa-caret-down"></i></i></span></a>
                                                            <ul class="dropdown-menu dp-mnu">
                                                                <?php if ($loginSeller) { ?>
                                                                    <li><a href="<?php echo SELLER_URL; ?>">Dashboard</a></li>
                                                                <?php } ?>

                                                                <li><a href="<?php echo BASE_URL; ?>user/<?php echo $login_name; ?>/my-account/">My Account</a></li>

                                                                <li><a href="<?php echo BASE_URL; ?>controller/users_operations.php?mode=<?php echo base64_encode("logout"); ?>">Logout</a></li>
                                                            </ul>
                                                        </li> 
                                                    <?php } else { ?>
                                                        <li><a href="<?php echo BASE_URL; ?>login/"><img src="<?php echo BASE_URL; ?>frontend/img/sign-in.png"> Sign In </a></li>
                                                    <?php } ?>
                                                  
                                                    <li><a href="<?php echo BASE_URL; ?>whislist/"><i class="fa fa-heart"></i>
                                                            (<span class="total_item_wishlist"><?php if ($total_item_wishlist)
                                                        echo $total_item_wishlist;
                                                    else
                                                        echo 0;
                                                    ?></span>)</a></li>
													 <li><a href="<?php echo BASE_URL; ?>cart/"><img src="<?php echo BASE_URL; ?>frontend/img/bag.png">
                                                                Bag (<span class="total_item_cart"><?php if ($total_item_cart)
                                                        echo $total_item_cart;
                                                    else
                                                        echo 0;
                                                    ?></span>) </a></li>
													   <li class="dropdown">
                                                        <a href="javascript:void(0)"  class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><img src="<?php echo BASE_URL; ?>frontend/img/glob.png"> USD  <span><i class="fa fa-caret-down"></i></i></span></a>
                                                        <ul class="dropdown-menu dp-mnu">
                                                            <li><a href="javascript:void(0)">INR</a></li>
                                                            <li><a href="javascript:void(0)">USD</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>-->
                    </div>

<!--                <div class="search-bar-open">
                   <div class="col-md-6 col-sm-6 col-md-offset-3 col-sm-offset-3">
                       <div class="col-md-8 col-sm-8">
                         <div class="row">
                            <input type="text" class="form-control" placeholder="Search..." name="">
                              </div>
                             </div>
                           <div class="col-md-4 col-sm-4">
                              <div class="row">
                                <a href="javascript:void();" class="btn btn-success">Search</a>
                              </div>
                           </div>
                        </div>
                    </div>-->
                 </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <center>
                        <!--<ul class="nav navbar-nav">
                          <li class="dropdown-1"><a href="#">Just In</a>
                           <ul class="dropdown-content">
                             <li><a href="#">New Arrivals</a></li>
                             <li><a href="#">July Jewelry</a></li>
                             <li><a href="#">July Exclusive Set</a></li>
                             <li><a href="#">Best Sellers</a></li>
                             <li><a href="#">Personal Blueprint Guide</a></li>
                             <li><a href="#">Our Story</a></li>
                            </ul>
                          </li>
                  
                          <li class="dropdown-1"><a href="#">Women</a>
                            <ul class="dropdown-content">
                             <li><a href="#">Bracelets</a></li>
                             <li><a href="#">Necklaces + Charms</a></li>
                             <li><a href="#">Rings</a></li>
                             <li><a href="#">Earrings</a></li>
                             <li><a href="#">Sets</a></li>
                             <li><a href="#">Fine Jewelry</a></li>
                             <li><a href="#">All Jewelry</a></li>
                            </ul>
                          </li>
                  
                          <li class="dropdown-1"><a href="#">Men</a>
                           <ul class="dropdown-content">
                             <li><a href="#">About Charity by Design</a></li>
                             <li><a href="#">Who We Support</a></li>
                             <li><a href="#">How We Support</a></li>
                             <li><a href="#">Get Involved</a></li>
                             <li><a href="#">Shop The Collection</a></li>
                            </ul>
                          </li>
                  
                  
                          <li><a href="#">Desinger</a></li>
                          <li><a href="#">Slae</a></li>
                          <li><a href="#">Gifts</a></li>
                          <li><a href="#">Submit Your Design</a></li>
                          <li><a href="#">About</a></li>
                  
                        </ul>-->

                        <ul class="nav navbar-nav">
                            <?php
                            $activePage = basename($_SERVER['PHP_SELF'], ".php");
//                            $dbConObj = new dbConnect();
//                            $conn = $dbConObj->dbConnect();
                            $condition = "1 and `parent_id` = '0' and `delete` = '0' and `status` = '1'";
                            $result = $dbComObj->viewData($conn, "category", "*", $condition);
//                            echo 'sneha'.$condition; die;
//                            $ajCategoryViewObj = new ajCategoryView();
                            $num = $dbComObj->num_rows($result);
                            if ($num > 0) {
                                while ($data = $dbComObj->fetch_assoc($result)) {

                                       $cat_encode_id = $njEncryptionObj->safe_b64encode($data['id']);
                                      $category_segment = $njGenObj->removeSpecialChar($data['name']);
                                    $category_page= BASE_URL.'grid/'.$cat_encode_id.'/type/'.$category_segment;
                                    ?>
                                    <li class="dropdown mega-dropdown <?= ($activePage == $data['name']) ? 'active':''; ?>" >
                                        <a href="<?php echo $category_page;?>" class="dropdown-toggle" data-toggle="dropdown"><?php echo $data['name'] ?><!--<span class="caret"></span>--></a>       
                                        <ul class="dropdown-menu mega-dropdown-menu multi-level">
                                            <?php
                                             $url_cat_name = $njGenObj->removeSpecialChar($data['name']);
                                            $condition_sub = "1 and `parent_id` = " . $data['id'] . " and `delete` = '0' and `status` = '1' ORDER BY `name` ASC ";
                                            $result_sub = $dbComObj->viewData($conn, "category", "*", $condition_sub);
                                            $num = $dbComObj->num_rows($result_sub);
                                            if ($num > 0) {
                                                while ($data_sub = $dbComObj->fetch_assoc($result_sub)) {
                                                    $url_sub_id = $njEncryptionObj->safe_b64encode($data_sub['id']);
                                                   $url_sub_name = $njGenObj->removeSpecialChar($data_sub['name']);
                                                    ?>
                                                    <li id="sub<?php echo $data_sub['id'];?>"><a href = "<?php echo BASE_URL;?>grid/<?php echo $url_sub_id; ?>/type/<?php echo $url_cat_name ?>/<?php echo $url_sub_name; ?>/"><span><?php echo $data_sub['name'] ?></span></a></li>
                <!--                                                    <li><a href = "grid-view.html"><span>Diamond Solitaire Ring</span></a></li>
                                                    <li><a href = "grid-view.html"><span>Diamond Solitaire Ring</span></a></li>
                                                    <li><a href = "grid-view.html"><span>Diamond Solitaire Ring</span></a></li>
                                                    <li><a href = "grid-view.html"><span>Diamond Solitaire Ring</span></a></li>-->
                                                <?php
                                                }
                                            }
                                            ?>
                                        </ul>
                                    </li>
                                    <?php
                                }
                            }
                            ?>
                            <!--                            <li class="dropdown mega-dropdown">
                                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Women <span class="caret"></span></a>       
                                                            <ul class="dropdown-menu mega-dropdown-menus">
                                                                <li><a href="grid-view.html"><span>Diamond Solitaire Ring</span></a></li>
                                                                <li><a href="grid-view.html"><span>Diamond Solitaire Ring</span></a></li>
                                                                <li><a href="grid-view.html"><span>Diamond Solitaire Ring</span></a></li>
                                                                <li><a href="grid-view.html"><span>Diamond Solitaire Ring</span></a></li>
                                                                <li><a href="grid-view.html"><span>Diamond Solitaire Ring</span></a></li>
                                                            </ul>       
                                                        </li>
                            
                                                        <li class="dropdown mega-dropdown">
                                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Men <span class="caret"></span></a>       
                                                            <ul class="dropdown-menu mega-dropdown-menus">
                                                                <li><a href="grid-view.html"><span>Diamond Solitaire Ring</span></a></li>
                                                                <li><a href="grid-view.html"><span>Diamond Solitaire Ring</span></a></li>
                                                                <li><a href="grid-view.html"><span>Diamond Solitaire Ring</span></a></li>
                                                                <li><a href="grid-view.html"><span>Diamond Solitaire Ring</span></a></li>
                                                                <li><a href="grid-view.html"><span>Diamond Solitaire Ring</span></a></li>
                                                            </ul>     
                                                        </li>
                            
                            -->   <?php /* ?>            
                            <li class="dropdown mega-dropdown">
                                <a href="javascript:void();" class="dropdown-toggle" data-toggle="dropdown">Designers <span class="caret"></span></a>       
                                <ul class="dropdown-menu mega-dropdown-menus">
                                    <?php
                                    $condition_brand = "1 and `delete` = '0' and `status` = '1' ORDER BY `name` ASC ";
                                    $result_brand = $dbComObj->viewData($conn, "brands", "*", $condition_brand);
                                    $num_brand = $dbComObj->num_rows($result_brand);
                                    if ($num > 0) {
                                        while ($data_brand = $dbComObj->fetch_assoc($result_brand)) {
                                               $url_brand_id = $njEncryptionObj->safe_b64encode($data_brand['id']);
                                               $url_brand_name = $njGenObj->removeSpecialChar($data_brand['name']);
                                            ?>
                                    <li id="brand<?php echo $data_brand['id'];?>"><a href="<?php echo BASE_URL;?>grid/<?php echo $url_brand_id; ?>/designer/<?php echo $url_brand_name; ?>/"><span><?php echo $data_brand['name']; ?></span></a></li>
<!--                                    <li><a href="grid-view.html"><span>Diamond Solitaire Ring</span></a></li>
                                    <li><a href="grid-view.html"><span>Diamond Solitaire Ring</span></a></li>
                                    <li><a href="grid-view.html"><span>Diamond Solitaire Ring</span></a></li>
                                    <li><a href="grid-view.html"><span>Diamond Solitaire Ring</span></a></li>-->
                                        <?php } 
                                    } ?>
                                </ul>

                            </li> <?php */ ?>
                             <li>
                                <a <?= ($activePage == 'brands') ? 'active':''; ?> href="<?php echo BASE_URL;?>brands/" >Brands </a>        
                             
                            </li>
                            <li>
                                <a <?= ($activePage == 'sale') ? 'active':''; ?> href="<?php echo BASE_URL;?>sale/" >Sale </a>        
                             
                            </li>
                            <li>
                                <a <?= ($activePage == 'gifts') ? 'active':''; ?> href="<?php echo BASE_URL;?>gifts/">Gifts </a>       
                               
                            </li>
                            <li class="<?= ($activePage == 'design') ? 'active':''; ?>"><a href="<?php echo BASE_URL;?>design/">Submit Your Design</a></li>
                            <li class="<?= ($activePage == 'contact') ? 'active':''; ?>"><a href="<?php echo BASE_URL;?>contact/">Contact</a></li>
                        </ul>
                    </center>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </div>
    </nav>
</div>