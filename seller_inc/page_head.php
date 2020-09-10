<div id="page-wrapper"<?php
if ($template['page_preloader']) {
    echo ' class="page-loading"';
}
?>>
    <!-- Preloader -->
    <!-- Preloader functionality (initialized in js/app.js) - pageLoading() -->
    <!-- Used only if page preloader is enabled from inc/config (PHP version) or the class 'page-loading' is added in #page-wrapper element (HTML version) -->
    <div class="preloader themed-background">
        <h1 class="push-top-bottom text-light text-center"><strong>Pro</strong>UI</h1>
        <div class="inner">
            <h3 class="text-light visible-lt-ie10"><strong>Loading..</strong></h3>
            <div class="preloader-spinner hidden-lt-ie10"></div>
        </div>
    </div>
    <!-- END Preloader -->

    <!-- Page Container -->
    <!-- In the PHP version you can set the following options from inc/config file -->
    <!--
        Available #page-container classes:

        '' (None)                                       for a full main and alternative sidebar hidden by default (> 991px)

        'sidebar-visible-lg'                            for a full main sidebar visible by default (> 991px)
        'sidebar-partial'                               for a partial main sidebar which opens on mouse hover, hidden by default (> 991px)
        'sidebar-partial sidebar-visible-lg'            for a partial main sidebar which opens on mouse hover, visible by default (> 991px)
        'sidebar-mini sidebar-visible-lg-mini'          for a mini main sidebar with a flyout menu, enabled by default (> 991px + Best with static layout)
        'sidebar-mini sidebar-visible-lg'               for a mini main sidebar with a flyout menu, disabled by default (> 991px + Best with static layout)

        'sidebar-alt-visible-lg'                        for a full alternative sidebar visible by default (> 991px)
        'sidebar-alt-partial'                           for a partial alternative sidebar which opens on mouse hover, hidden by default (> 991px)
        'sidebar-alt-partial sidebar-alt-visible-lg'    for a partial alternative sidebar which opens on mouse hover, visible by default (> 991px)

        'sidebar-partial sidebar-alt-partial'           for both sidebars partial which open on mouse hover, hidden by default (> 991px)

        'sidebar-no-animations'                         add this as extra for disabling sidebar animations on large screens (> 991px) - Better performance with heavy pages!

        'style-alt'                                     for an alternative main style (without it: the default style)
        'footer-fixed'                                  for a fixed footer (without it: a static footer)

        'disable-menu-autoscroll'                       add this to disable the main menu auto scrolling when opening a submenu

        'header-fixed-top'                              has to be added only if the class 'navbar-fixed-top' was added on header.navbar
        'header-fixed-bottom'                           has to be added only if the class 'navbar-fixed-bottom' was added on header.navbar

        'enable-cookies'                                enables cookies for remembering active color theme when changed from the sidebar links
    -->
    <?php
    $page_classes = '';

    if ($template['header'] == 'navbar-fixed-top') {
        $page_classes = 'header-fixed-top';
    } else if ($template['header'] == 'navbar-fixed-bottom') {
        $page_classes = 'header-fixed-bottom';
    }

    if ($template['sidebar']) {
        $page_classes .= (($page_classes == '') ? '' : ' ') . $template['sidebar'];
    }

    if ($template['main_style'] == 'style-alt') {
        $page_classes .= (($page_classes == '') ? '' : ' ') . 'style-alt';
    }

    if ($template['footer'] == 'footer-fixed') {
        $page_classes .= (($page_classes == '') ? '' : ' ') . 'footer-fixed';
    }

    if (!$template['menu_scroll']) {
        $page_classes .= (($page_classes == '') ? '' : ' ') . 'disable-menu-autoscroll';
    }

    if ($template['cookies'] === 'enable-cookies') {
        $page_classes .= (($page_classes == '') ? '' : ' ') . 'enable-cookies';
    }
    ?>
    <div id="page-container"<?php
    if ($page_classes) {
        echo ' class="' . $page_classes . '"';
    }
    ?>>

        <!-- Main Sidebar -->
        <div id="sidebar">
            <!-- Wrapper for scrolling functionality -->
            <div id="sidebar-scroll">
                <!-- Sidebar Content -->
                <div class="sidebar-content">
                    <!-- Brand -->
                    <a href="<?php echo BASE_URL ?>" target="_blank" class="sidebar-brand">
                        <i class="gi gi-flash"></i><span class="sidebar-nav-mini-hide"><strong>Jewellery  at Home</strong></span>
                    </a>
                    <!-- END Brand -->

                    <!-- User Info -->
                    <div class="sidebar-section sidebar-user clearfix sidebar-nav-mini-hide">
                        <div class="sidebar-user-avatar">
                            <a href="<?php echo SELLER_URL; ?>">
                                <?php
                                $ck_order_qry12 = $dbComObj->viewData($conn, "users", "*", " status = '1' AND id = '" . $_SESSION['DH_seller_id'] . "'");
                                $row22 = $dbComObj->fetch_assoc($ck_order_qry12);
                                $image = $row22['image'];
                                $src = BASE_URL . "images/user/" . $image;
                                if (checkRemoteFileNj($src)) {
                                    $src = BASE_URL . "images/user/" . $image;
                                    $img = '<img src="' . $src . '" alt="' . $image . '" title="' . $image . '" width="100px" />';
                                    echo $img . "<br />&nbsp;";
                                } else {
                                       $src=BASE_URL . 'img/placeholders/avatars/avatar2.jpg';
                                    echo '<img src="' . BASE_URL . 'img/placeholders/avatars/avatar2.jpg" alt="avatar">';
                                }
                                ?>

                            </a>

                        </div> 
                        <div class="sidebar-user-name"><?php echo $_SESSION['DH_seller_name']; ?></div>
                        <div class="sidebar-user-links">
                            <a href="<?php echo SELLER_URL; ?>myprofile/" data-toggle="tooltip" data-placement="bottom" title="Profile"><i class="gi gi-user"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Messages"><i class="fa fa-question fa-fw"></i></a>
                            <a href="#" class="mb-control" data-box="#mb-signout"><i class="fa fa-power-off fa-fw"></i></a>
                        </div>
                    </div>
                    <!-- END User Info -->

                        <?php if ($primary_nav) { ?>
                        <!-- Sidebar Navigation -->
                        <ul class="sidebar-nav">
                            <?php
                            foreach ($primary_nav as $key => $link) {
                                $link_class = '';
                                $li_active = '';
                                $menu_link = '';

                                // Profile Pages
                                if ($template['active_page'] == 'dashboard.php') {
                                    $template['active_page'] = SELLER_URL . 'dashboard/';
                                }

                                if ($template['active_page'] == 'changepass.php') {
                                    $template['active_page'] = SELLER_URL . 'profile-password/';
                                }

                                if ($template['active_page'] == 'edit_profile.php') {
                                    $template['active_page'] = SELLER_URL . 'myprofile/';
                                }

                                if ($template['active_page'] == 'manage_shop.php') {
                                    $template['active_page'] = SELLER_URL . 'myshop/';
                                }


                                if ($template['active_page'] == 'shipping-and-return.php') {
                                    $template['active_page'] = SELLER_URL . 'shipping-and-return/';
                                }


                                //products  pages
                                if ($template['active_page'] == 'product.php') {
                                    $template['active_page'] = SELLER_URL . 'products/new-product/';
                                }

                                if ($template['active_page'] == 'view-products.php') {
                                    $template['active_page'] = SELLER_URL . 'products/';
                                }

                                if ($template['active_page'] == 'orders.php') {
                                    $template['active_page'] = SELLER_URL . 'orders/';
                                }

                                // Get 1st level link's vital info
                                $url = (isset($link['url']) && $link['url']) ? $link['url'] : '#';
                                $active = (isset($link['url']) && ($template['active_page'] == $link['url'])) ? ' active' : '';
                                $icon = (isset($link['icon']) && $link['icon']) ? '<i class="' . $link['icon'] . ' sidebar-nav-icon"></i>' : '';

                                // Check if the link has a submenu
                                if (isset($link['sub']) && $link['sub']) {
                                    // Since it has a submenu, we need to check if we have to add the class active
                                    // to its parent li element (only if a 2nd or 3rd level link is active)
                                    foreach ($link['sub'] as $sub_link) {
                                        if (in_array($template['active_page'], $sub_link)) {
                                            $li_active = ' class="active"';
                                            break;
                                        }

                                        // 3rd level links
                                        if (isset($sub_link['sub']) && $sub_link['sub']) {
                                            foreach ($sub_link['sub'] as $sub2_link) {
                                                if (in_array($template['active_page'], $sub2_link)) {
                                                    $li_active = ' class="active"';
                                                    break;
                                                }
                                            }
                                        }
                                    }

                                    $menu_link = 'sidebar-nav-menu';
                                }

                                // Create the class attribute for our link
                                if ($menu_link || $active) {
                                    $link_class = ' class="' . $menu_link . $active . '"';
                                }
                                ?>
                                    <?php if ($url == 'header') { // if it is a header and not a link  ?>
                                    <li class="sidebar-header">
                                    <?php if (isset($link['opt']) && $link['opt']) { // If the header has options set  ?>
                                            <span class="sidebar-header-options clearfix"><?php echo $link['opt']; ?></span>
            <?php } ?>
                                        <span class="sidebar-header-title"><?php echo $link['name']; ?></span>
                                    </li>
                                        <?php } else { // If it is a link  ?>
                                    <li<?php echo $li_active; ?>>
                                        <a href="<?php echo $url; ?>"<?php echo $link_class; ?>><?php if (isset($link['sub']) && $link['sub']) { // if the link has a submenu ?><i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><?php } echo $icon; ?><span class="sidebar-nav-mini-hide"><?php echo $link['name']; ?></span></a>
                                            <?php if (isset($link['sub']) && $link['sub']) { // if the link has a submenu ?>
                                            <ul>
                                                <?php
                                                foreach ($link['sub'] as $sub_link) {
                                                    $link_class = '';
                                                    $li_active = '';
                                                    $submenu_link = '';

                                                    // Get 2nd level link's vital info
                                                    $url = (isset($sub_link['url']) && $sub_link['url']) ? $sub_link['url'] : '#';
                                                    $active = (isset($sub_link['url']) && ($template['active_page'] == $sub_link['url'])) ? ' active' : '';

                                                    // Check if the link has a submenu
                                                    if (isset($sub_link['sub']) && $sub_link['sub']) {
                                                        // Since it has a submenu, we need to check if we have to add the class active
                                                        // to its parent li element (only if a 3rd level link is active)
                                                        foreach ($sub_link['sub'] as $sub2_link) {
                                                            if (in_array($template['active_page'], $sub2_link)) {
                                                                $li_active = ' class="active"';
                                                                break;
                                                            }
                                                        }

                                                        $submenu_link = 'sidebar-nav-submenu';
                                                    }

                                                    if ($submenu_link || $active) {
                                                        $link_class = ' class="' . $submenu_link . $active . '"';
                                                    }
                                                    ?>
                                                    <li<?php echo $li_active; ?>>
                                                        <a href="<?php echo $url; ?>"<?php echo $link_class; ?>><?php if (isset($sub_link['sub']) && $sub_link['sub']) { ?><i class="fa fa-angle-left sidebar-nav-indicator"></i><?php } echo $sub_link['name']; ?></a>
                                                            <?php if (isset($sub_link['sub']) && $sub_link['sub']) { ?>
                                                            <ul>
                                                                <?php
                                                                foreach ($sub_link['sub'] as $sub2_link) {
                                                                    // Get 3rd level link's vital info
                                                                    $url = (isset($sub2_link['url']) && $sub2_link['url']) ? $sub2_link['url'] : '#';
                                                                    $active = (isset($sub2_link['url']) && ($template['active_page'] == $sub2_link['url'])) ? ' class="active"' : '';
                                                                    ?>
                                                                    <li>
                                                                        <a href="<?php echo $url; ?>"<?php echo $active ?>><?php echo $sub2_link['name']; ?></a>
                                                                    </li>
                                                        <?php } ?>
                                                            </ul>
                                                <?php } ?>
                                                    </li>
                                        <?php } ?>
                                            </ul>
            <?php } ?>
                                    </li>
                            <?php } ?>
    <?php } ?>
                        </ul>
                        <!-- END Sidebar Navigation -->
<?php } ?>

                </div>
                <!-- END Sidebar Content -->
            </div>
            <!-- END Wrapper for scrolling functionality -->
        </div>
        <!-- END Main Sidebar -->

        <!-- Main Container -->
        <div id="main-container">
            <!-- Header -->
            <!-- In the PHP version you can set the following options from inc/config file -->
            <!--
                Available header.navbar classes:

                'navbar-default'            for the default light header
                'navbar-inverse'            for an alternative dark header

                'navbar-fixed-top'          for a top fixed header (fixed sidebars with scroll will be auto initialized, functionality can be found in js/app.js - handleSidebar())
                    'header-fixed-top'      has to be added on #page-container only if the class 'navbar-fixed-top' was added

                'navbar-fixed-bottom'       for a bottom fixed header (fixed sidebars with scroll will be auto initialized, functionality can be found in js/app.js - handleSidebar()))
                    'header-fixed-bottom'   has to be added on #page-container only if the class 'navbar-fixed-bottom' was added
            -->
            <header class="navbar<?php
if ($template['header_navbar']) {
    echo ' ' . $template['header_navbar'];
}
?><?php
if ($template['header']) {
    echo ' ' . $template['header'];
}
?>">
                <!-- Left Header Navigation -->
                <ul class="nav navbar-nav-custom">
                    <!-- Template Options -->
                    <!-- Change Options functionality can be found in js/app.js - templateOptions() -->
                    <li class="dropdown">
                        <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="gi gi-settings"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-custom dropdown-options">
                            <li class="dropdown-header text-center">Header Style</li>
                            <li>
                                <div class="btn-group btn-group-justified btn-group-sm">
                                    <a href="javascript:void(0)" class="btn btn-primary" id="options-header-default">Light</a>
                                    <a href="javascript:void(0)" class="btn btn-primary" id="options-header-inverse">Dark</a>
                                </div>
                            </li>
                            <li class="dropdown-header text-center">Page Style</li>
                            <li>
                                <div class="btn-group btn-group-justified btn-group-sm">
                                    <a href="javascript:void(0)" class="btn btn-primary" id="options-main-style">Default</a>
                                    <a href="javascript:void(0)" class="btn btn-primary" id="options-main-style-alt">Alternative</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <!-- END Template Options -->
                    <li class="dateTime" style="padding: 15px 15px;"><span><i class="gi gi-calendar"></i> </span><span id="date-time"></span></li>
                </ul>
                <!-- END Left Header Navigation -->

                <!-- Search Form -->
                <!--form action="page_ready_search_results.php" method="post" class="navbar-form-custom">
                    <div class="form-group">
                        <input type="text" id="top-search" name="top-search" class="form-control" placeholder="Search..">
                    </div>
                </form -->
                <!-- END Search Form -->

                <!-- Right Header Navigation -->
                <ul class="nav navbar-nav-custom pull-right">
                    <!-- User Dropdown -->
                    <?php
//                    $login_id = $_SESSION['DH_seller_id'];
//                    if ($_SESSION['DH_seller_id'] == '') {
//                        header('Location:' . SELLER_URL . 'seller_operations.php?mode=' . base64_encode("logout"));
//                    }
//                    $User_type = $_SESSION['DH_seller_type_name'];
//                    $condition_notify = "1 and notify_user_id='" . $_SESSION['DH_seller_id'] . "' and user_type='" . $User_type . "' and  `is_read` = '0'  "; // and `status` = '0'
//                    $result_notify = $dbComObj->viewData($conn, "notification", "*", $condition_notify);
//                    $num_notify = $dbComObj->num_rows($result_notify);
//                    $nod = 1;
                    ?>
                           <?php
// DH_admin_id DH_admin_type_name Admin 
                           $User_type = $_SESSION['DH_seller_type_name'];
                           $condition_notify = "1 and notify_user_id='" . $_SESSION['DH_seller_id'] . "' and user_type='" . $User_type . "' and  `is_read` = '0'  "; // and `status` = '0'
                           $result_notify = $dbComObj->viewData($conn, "notification", "*", $condition_notify);
                           $num_notify = $dbComObj->num_rows($result_notify);
                           ?>
                    <li>
                        <a href="javascript:void(0)" onclick="App.sidebar('toggle-sidebar-alt', 'toggle-other');
                                this.blur();">
                            <i class="gi gi-share_alt"></i>
                            <span class="label label-primary label-indicator animation-floating" id="notifyajcount"><?php
                                if ($num_notify > 0) {
                                    echo $num_notify;
                                }
                           ?></span>
                        </a>
                    </li>
                    <li class="dropdown">

                        <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="<?php echo $src; ?>" alt="avatar"> <?php echo $_SESSION['DH_seller_name']; ?> <i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-custom dropdown-menu-right">
                            <li class="dropdown-header text-center">Account</li>
<!--                            <li>
                                <a href="#">
                                    <i class="fa fa-envelope-o fa-fw pull-right"></i>
                                    <span class="badge pull-right">5</span>
                                    Bug / Feature
                                </a>
                                <a href="#"><i class="fa fa-question fa-fw pull-right"></i>
                                    <span class="badge pull-right">11</span>
                                    Ask a Question
                                </a>
                            </li>
                            <li class="divider"></li>-->
                            <li>
                                <a href="<?php echo SELLER_URL; ?>myprofile/"><i class="fa fa-user fa-fw pull-right"></i> Profile </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="#" class="mb-control" data-box="#mb-signout"><i class="fa fa-power-off fa-fw"></i> Logout</a>
                            </li>
                        </ul>
                    </li>
                    <!-- END User Dropdown -->
                </ul>
                <!-- END Right Header Navigation -->
            </header>
            <!-- END Header -->
            <!-- END Header -->
            <div id="page-container" class="sidebar-partial sidebar-visible-lg sidebar-no-animations">
                <div id="sidebar-alt">
                    <div id="sidebar-alt-scroll">
                        <div class="sidebar-content">

                            <div class="chat-talk display-none">
                                <div class="chat-talk-info sidebar-section">
                                    <button id="chat-talk-close-btn" class="btn btn-xs btn-default pull-right">
                                        <i class="fa fa-times"></i>
                                    </button>
                                    <img src="img/placeholders/avatars/avatar5.jpg" alt="avatar" class="img-circle pull-left">
                                    <strong>John</strong> Doe
                                </div>
                                <ul class="chat-talk-messages">
                                    <li class="text-center"><small>Yesterday, 18:35</small></li>
                                    <li class="chat-talk-msg animation-slideRight">Hey admin?</li>
                                    <li class="chat-talk-msg animation-slideRight">How are you?</li>
                                    <li class="text-center"><small>Today, 7:10</small></li>
                                    <li class="chat-talk-msg chat-talk-msg-highlight themed-border animation-slideLeft">I'm fine, thanks!</li>
                                </ul>
                                <form action="index.php" method="post" id="sidebar-chat-form" class="chat-form">
                                    <input type="text" id="sidebar-chat-message" name="sidebar-chat-message" class="form-control form-control-borderless" placeholder="Type a message..">
                                </form>
                            </div>
                            <a href="javascript:void(0)" class="sidebar-title">
                                <i class="fa fa-globe pull-right"></i> <strong>Activity</strong>UI
                            </a>
                            <div class="sidebar-section">
                                <!--            <div class="alert alert-danger alert-alt">
                                               <small>just now</small><br>
                                               <i class="fa fa-thumbs-up fa-fw"></i> Upgraded to Pro plan
                                            </div>
                                            <div class="alert alert-info alert-alt">
                                               <small>2 hours ago</small><br>
                                               <i class="gi gi-coins fa-fw"></i> You had a new sale!
                                            </div>
                                            <div class="alert alert-success alert-alt">
                                               <small>3 hours ago</small><br>
                                               <i class="fa fa-plus fa-fw"></i> <a href="#"><strong>John Doe</strong></a> would like to become friends!<br>
                                               <a href="javascript:void(0)" class="btn btn-xs btn-primary"><i class="fa fa-check"></i> Accept</a>
                                               <a href="javascript:void(0)" class="btn btn-xs btn-default"><i class="fa fa-times"></i> Ignore</a>
                                            </div>-->
                                        <?php
                                        if ($num_notify > 0) {
                                            while ($notification = $dbComObj->fetch_assoc($result_notify)) {
                                                ?>
                                        <div class="alert alert-success alert-alt notifyaj<?php echo $notification['id']; ?>" id="notifyaj<?php echo $notification['id']; ?>">
                                            <small>  <?php
                                                $datetime1 = new DateTime(); // Today's Date/Time
                                                $datetime2 = new DateTime($notification['added_on']);
                                                $interval = $datetime1->diff($datetime2);
                                                echo $interval->format('%D days %H hours %I minutes ago');
                                                ?></small><br>
                                            <i class="fa fa-plus fa-fw"></i> <?php echo $notification['msg']; ?><br>

                                            <a href="javascript:void(0)" onclick="return ManagesellerApproval(<?php echo $notification['user_id'] . ',' . '0' . ',' . $notification['id']; ?>);" class="btn btn-xs btn-primary"><i class="fa fa-check"></i> Accept</a>
                                            <a href="javascript:void(0)" onclick="return NotificationIsread(<?php echo $notification['id'] . ',' . '0'; ?>);" class="btn btn-xs btn-default"><i class="fa fa-times"></i> Ignore</a>
                                        </div>
        <?php
        $nod++;
    }
} else {
    echo '<h4 align="center">You have no notification </h3>';
}
?>
                                <!--            <div class="alert alert-warning alert-alt">
                                               <small>2 days ago</small><br>
                                               Running low on space<br><strong>18GB in use</strong> 2GB left<br>
                                               <a href="page_ready_pricing_tables.php" class="btn btn-xs btn-primary"><i class="fa fa-arrow-up"></i> Upgrade Plan</a>
                                            </div>-->
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- <div id="notifiacation_alert">
                    <div class="alert alert-info alert-dismissable">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Info!</strong> Indicates a neutral informative change or action.
                      </div>
            
            </div>-->
            <script>
                function NotificationIsread(a, b)
                {

                    $.post('<?php echo BASE_URL; ?>controller/notification_operations.php', {a: a, b: b, mode: '<?php echo base64_encode('IsreadNotification'); ?>'}, function (data) {

                        $("#notifyaj" + a).remove();
                        var notify_count = parseInt($('#notifyajcount').text());
                        $("#notifyajcount").text(notify_count - 1);
                        $(".notifyaj" + a).remove();
                        // alert(' successfully.');
                        //  window.location.reload();
                        return false;
                    });

                    return false;
                }
                function ManagesellerApproval(a, b, c)
                {
                    var txt1 = '';
                    if (b == '1') {
                        txt1 = 'Decline';
                    } else {
                        txt1 = 'Approved';
                    }
                    $.post('<?php echo BASE_URL; ?>controller/notification_operations.php', {a: c, b: b, mode: '<?php echo base64_encode('IsreadNotification'); ?>'}, function (data) {
                        var notify_count = parseInt($('#notifyajcount').text());
                        $("#notifyajcount").text(notify_count - 1);
                    });
                    $.post('<?php echo ADMIN_URL; ?>user/users_operations.php', {a: a, b: b, mode: '<?php echo base64_encode('approvedUsers'); ?>'}, function (data) {
                        $(".notifyaj" + c).remove();
                        //  $('#errorMsg').html(data);
                        //  alert('Users '+txt1+' successfully.');
                        // window.location.reload();
                        return false;
                    });

                    return false;
                }
            </script>

