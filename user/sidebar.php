<!-- Block myaccount module -->
<style>
    .block .list-block li a i {
        display: block !important; 
    }
</style>
<?php // print_r($_SESSION); ?>
<section class="block myaccount-column">
    <h4 class="title_block">
         <?php $login_name = $njGenObj->removeSpecialChar($login_name); ?>
        <a href="<?php echo BASE_URL; ?>user/<?php echo $login_name; ?>/my-account/" title="My account">
            <?php
            $img = BASE_URL.'images/user/thumb/'.$rows['image'];
//             $img1 = BASE_URL.'images/user/thumb/'.$_SESSION['user_image'];
            $file_exists = checkRemoteFileNj($img);
            if ($file_exists == true) {
                $img = '<img src="' . $img . '" style="width: 22%;border-radius: 30px;border: 1px solid #c4d5e9;background: rgba(196, 213, 233, 0.17);"/>';
            } else {
//                $img = '<i class="fa fa-user pull-left" style="margin-top: 2px;"></i>';
//                $img = '<img src="'.$img1.'" style="width: 22%;border-radius: 30px;border: 1px solid #c4d5e9;background: rgba(196, 213, 233, 0.17);"/>';
            }
//            echo $img;
            ?>
            My Account
        </a>
    </h4>
    <div class="block_content list-block" style="">
        <ul>
            <li>
                <a href="<?php echo BASE_URL; ?>user/<?php echo $login_name; ?>/my-order/" title="My orders">
                    <i class="fa fa-shopping-cart pull-left" style="margin-top: 2px;"></i> My Orders
                </a>
            </li>

            <li>
                <a href="<?php echo BASE_URL; ?>user/<?php echo $login_name; ?>/personal-info/" title="My merchandise returns">
                    <i class="fa fa-user-plus pull-left" style="margin-top: 2px;"></i> Personal Info
                </a>
            </li>
            <li>
                <a href="<?php echo BASE_URL; ?>user/<?php echo $login_name; ?>/my_wishlist/" title="wishlist">
                    <i class="fa fa-user-plus pull-left" style="margin-top: 2px;"></i> Wishlist
                </a>
            </li>
            <li>
                <a href="<?php echo BASE_URL; ?>user/<?php echo $login_name; ?>/my_cart/" title="My merchandise returns">
                    <i class="fa fa-user-plus pull-left" style="margin-top: 2px;"></i> My Cart
                </a>
            </li>
              <li>
                <a href="<?php echo BASE_URL; ?>user/<?php echo $login_name; ?>/my_follow/" title="My merchandise returns">
                    <i class="fa fa-rss pull-left" style="margin-top: 2px;"></i> My Follow
                </a>
            </li>
            <li>
                <a href="<?php echo BASE_URL; ?>user/<?php echo $login_name; ?>/change-password/" title="My merchandise returns">
                    <i class="fa fa-key pull-left" style="margin-top: 2px;"></i> Change Password
                </a>
            </li>
            <!-- MODULE WishList -->
            <!-- END : MODULE tmcollections -->
        </ul>
        <div class="logout">
            <a class="btn btn-secondary-2 btn-sm" href="<?php echo BASE_URL; ?>page_fragment_php/login_operations.php?mode=bG9nb3V0" title="Sign out">
                <span>
                    <i class="fa fa-power-off pull-left" style="margin-top: 2px;"></i> Sign Out
                </span>
            </a>
        </div>
    </div>
</section>
<!-- /Block myaccount module --><!-- MODULE Block new products -->
<section id="new-products_block_right" class="block products_block" style="display:none;">
    <h4 class="title_block">
        <a href="#" title="Featured products">Featured Products</a>
    </h4>
    <div class="block_content products-block" style="">
        <ul class="products">
            <li class="clearfix">
                <a class="products-block-image" href="#" title="Sundown Naturals Inulin Fiber Prebiotic Mineral Supplement Capsules 90 Count">
                    <img class="replace-2x img-responsive" src="<?php echo BASE_URL; ?>img/p/1/4/7/147-tm_small_default.jpg" alt="Sundown Naturals">
                </a>
                <div class="product-content">
                    <h5>
                        <a class="product-name" href="https://ld-prestashop.template-help.com/prestashop_62336_v1/index.php?id_product=27&amp;controller=product&amp;id_lang=1" title="Sundown Naturals">Sundown Naturals</a>
                    </h5>
                    <p class="product-description">Health is one of most important things in our life. We...</p>
                    <div class="price-box">
                        <span class="price">$7.00</span>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</section>
<!-- /MODULE Block new products -->
<!-- /Block myaccount module --><!-- MODULE Block new products -->
<section id="new-products_block_right" class="block products_block" style="display:none;">
    <h4 class="title_block">
        <a href="#" title="Partner products">Partner products</a>
    </h4>
    <div class="block_content products-block" style="">
        <ul class="products">
            <li class="clearfix">
                <a class="products-block-image" href="https://ld-prestashop.template-help.com/prestashop_62336_v1/index.php?id_product=23&amp;controller=product&amp;id_lang=1" title="Nature's Way Umcka Original Alcohol Free Drops 2 Ounce">
                    <img class="replace-2x img-responsive" src="<?php echo BASE_URL; ?>img/p/1/2/2/122-tm_small_default.jpg" alt="Nature's Way Umcka Original">
                </a>
                <div class="product-content">
                    <h5>
                        <a class="product-name" href="https://ld-prestashop.template-help.com/prestashop_62336_v1/index.php?id_product=23&amp;controller=product&amp;id_lang=1" title="Nature's Way Umcka Original">Nature's Way Umcka Original</a>
                    </h5>
                    <p class="product-description">Health is one of most important things in our life. We...</p>
                    <div class="price-box">
                        <span class="price">$21.00</span>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</section>
<!-- /MODULE Block new products -->