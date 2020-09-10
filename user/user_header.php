<div class="header-container">
    <header id="header">
        <div class="wrapper it_TWUPDRNJKPEP container">
            <div class="row it_NOUYPYACDUKH align-center" style="padding:0px;">
                <div class="it_TNYGOAEZJSNE col-xs-12   col-lg-3 ">
                    <div id="header_logo">
                        <a href="<?php echo BASE_URL; ?>" title="Eveprest">
                            <img class="logo img-responsive" src="<?php echo BASE_URL; ?>img/drug_logo.png" alt="#" width="246" height="46" />
                        </a>
                    </div>
                </div>
                <div class="it_KALFUPJQNSWF col-xs-12   col-lg-8 ">
                    <div class="module ">
                        <div id="tmhtmlcontent_top">
                            <ul class="tmhtmlcontent-top">
                                <li class="tmhtmlcontent-item-1 contact-info">
                                    <div class="item-html">
                                        <p>
                                            <i class="fa fa-phone"></i>
                                            <a href="tel:0123-456-789">0123-456-789;</a>
                                            <a href="tel:0123-456-799">0123-456-799</a>
                                        </p>
                                        <p><i class="fa fa-clock-o"></i> 7 Days a week from 9:00 am to 7:00 pm</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="module static-search row">
                        <div id="tmsearch" class="col-sm-10">
                            <span id="search-toggle"></span>
                            <form id="tmsearchbox" method="get" action="#">
                                <input class="form-control" type="text" id="search_query" name="search_query" placeholder="Search" value="" />
                                <button type="submit" name="tm_submit_search" class="button-search"></button>
                                <span class="search-close"></span>
                            </form>
                        </div>
                        <?php
                        if (isset($_SESSION['MarketPlaceIcon'])) {
                            $img = BASE_URL . 'images/user/thumb/' . $_SESSION['MarketPlaceImage'];
                            $img = BASE_URL . 'images/user/thumb/' . $_SESSION['MarketPlaceImage'];
                            $file_exists = checkRemoteFileNj($img);
                            if ($file_exists == true) {

                                $img = '<img src="' . $img . '" style="width:50px;border-radius: 30px;border: 1px solid #c4d5e9;background: rgba(196, 213, 233, 0.17);"/>';
                            } else {
                                $img = '<img style="border-radius: 25px;" src="' . BASE_URL . 'images/user-icon/' . $_SESSION['MarketPlaceIcon'] . '" />';
                            }

                            // print_r($_SESSION);
                            $logg = '<div class="col-xs-6">
                        <ul class="nav nav-pills nav-stacked" style="background: transparent !important;">

                           <li class="dropdown">
                            <a href="#" data-toggle="dropdown" class="dropdown-toggle" style="background: transparent !important;">' . $img . '</a>
                            <ul class="dropdown-menu submenu2">
                                <li><a href="' . BASE_URL . 'user/' . $_SESSION['MarketPlaceSlug'] . '/my-account/"><i class="fa fa-user pull-left" style="margin-top: 2px;"></i>&nbsp;My Account</a></li>
                                <li><a href="' . BASE_URL . 'user/' . $_SESSION['MarketPlaceSlug'] . '/my-order/"><i class="fa fa-shopping-cart pull-left" style="margin-top: 2px;"></i>&nbsp;My Orders</a></li>

                               <li class="divider"></li>
                                <li><a href="' . BASE_URL . 'page_fragment_php/login_operations.php?mode=bG9nb3V0"><i class="fa fa-power-off fa-fw pull-left" style="margin-top: 2px;"></i>&nbsp;Sign out</a></li>
                            </ul>
                            </li>
                        </ul></div><!--end col-->';
                        } else {

                            $logg = '<a href="#" data-toggle="modal" id="signInButton" data-target="#login-modal" style="font-weight:bold; display:block; text-align:center; text-transform:uppercase; line-height:48px;"><span>Sign in</span>
                            </a>';
                        }
                        ?>
                        <!-- second nav-->

                        <div class="col-sm-2">
                        <?php echo $logg; ?>
                        </div>
                    </div>
                </div>
                <div class="fl-cart-contain" id="manageCart_Nj">
                    <?php require_once '../page_fragment_php/manage_cart.php';?>
                </div>
            </div>
            <div class="row it_ASPFOXOBQLNC stick-up">
                <div class="it_INWBQDHUUEZQ col-xs-12    text-center inline-menu">
                    <div class="module ">
                        <div class="top_menu top-level tmmegamenu_item">
                            <div class="menu-title tmmegamenu_item">Catalog</div>
                            <ul class="menu clearfix top-level-menu tmmegamenu_item">
                                <li class="top-level-menu-li tmmegamenu_item it_76892408"><a href="<?php echo BASE_URL; ?>">home</a></li>
                                <li class="top-level-menu-li tmmegamenu_item it_76892408"><a href="<?php echo BASE_URL; ?>all-products/">products</a></li>
                                <li class="simple top-level-menu-li tmmegamenu_item it_16592859"><a href="<?php echo BASE_URL; ?>contact/">Contact</a></li>
                                <li class="top-level-menu-li tmmegamenu_item it_76892408"><a href="<?php echo BASE_URL; ?>term-condition/">Terms & Conditions</a></li>
                                <li class="top-level-menu-li tmmegamenu_item it_76892408" >
                                    <a href="<?php echo BASE_URL; ?>upload-prescription/" class="btn" style="background:#f25a5a !important; color:#FFF; text-transform:uppercase; margin-top:-5px;padding: 5px 5px;"> Upload Prescription </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
</div>

