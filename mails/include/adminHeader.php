
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!--
 - @file       Footer File
 -
-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<link rel="shortcut icon" href="<?=$baseURL?>/css/images/favicon.ico">
	<title>Administrator Gents Place</title>

	<link href="<?=$baseURL?>/css/style-admin.css" rel="stylesheet" type="text/css" />
	<link href="<?=$baseURL?>/css/style-txt.css" rel="stylesheet" type="text/css" />
		
    <script type="text/javascript" src="<?=$baseURL?>/module/classUtility.js" ></script>
    <script type="text/javascript" src="<?=$baseURL?>/module/validation.js" ></script>
	
    <script type="text/javascript"> var baseJS = "<?=$baseURL;?>";</script>

    <link rel="stylesheet" type="text/css" href="<?=$baseURL?>/include/menu/chromestyle.css" />
    <script type="text/javascript" src="<?=$baseURL?>/include/menu/chrome.js"></script>

    <script type="text/javascript" src="<?=$baseURL?>/module/bg-js/jquery-1.5.1.min.js"></script>
    <script type="text/javascript" src="<?=$baseURL?>/module/bg-js/jquery.cycle.min.js"></script>
    <script type="text/javascript" src="<?=$baseURL?>/module/bg-js/jquery.ez-bg-resize.js"></script>
    <script type="text/javascript" src="<?=$baseURL?>/module/bg-js/transition.js"></script>    
    <script type="text/javascript">
        $(document).ready(function(){            
            // Home Backgrounds
            var homeBg = ["<?=$baseURL?>/css/images/bg1.jpg"]; 
            var tmphomeBg = homeBg[Math.floor(Math.random()*homeBg.length)]
            
            $.ezBgResize({
                img		: tmphomeBg, 	// Required.
                width	: 1400, 		// Required. Default image width.
                height	: 1100 		// Required. Default image height.
            });
        });	
    </script>
    
    <!--[if IE]>
        <style type="text/css"> 
        	.ieFixdivCategory 	{ width:120%;}
        </style>
    <![endif]-->
    
    <!--[if IE 7]>
        <style type="text/css"> 
			.thrColLiqHdr #headerContent ul { width:100%; margin:0px; }
        </style>
    <![endif]-->
</head> 
<body class="thrColLiqHdr">
    <div id="container">
   
        <div id="headerContent">
        	<div id="header">
                <p class="colorPurple" style="text-align:center;">
                <a href="<?=$baseURL?>/ag-admin/"><img height="70" width="280" src="<?=$baseURL?>/css/images/logo_01.png" alt="Admin Header" title="Admin Header" /></a></p>
                <div class="clear"></div>
                <?php
                if(!empty($_SESSION['loginID']))
                {	?>           
                  	<div id="chromemenu" class="chromestyle">
                    <ul>
                    	<span style="float:left;">                                                        
                             <li><a href="<?=$baseURL?>/ag-admin/email-manage/" <?=(CUR_PAGE == "adminEmail Manage")? "class='activaLink'" : ""; ?> title="Email Manage" >Email Manage</a></li>
                             
                        </span>
                        <span style="float:right;">   
                        <li><a href="#" rel="dropmenu2" title="Options" >Membership</a></li>
                             <div id="dropmenu2" class="dropmenudiv size12">
                             <li><a href="<?=$baseURL?>/ag-admin/cancel/index.php" title="Email Manage" >Membership </a></li>
                             <li><a href="<?=$baseURL?>/ag-admin/cancel/index1.php?a=1" title="Email Manage" >Frisco Membership</a></li>
                             <li><a href="<?=$baseURL?>/ag-admin/cancel/index2.php?a=2" title="Email Manage" >Preston Hollow Membership</a></li>
                             <li><a href="<?=$baseURL?>/ag-admin/cancel/index3.php?a=3" title="Email Manage" >Leawood Membership</a></li>
                        </div>
                                             
                          <li><a href="#" rel="dropmenu1" <?=( (CUR_PAGE == "adminOrder") )? "class='activaLink'" : ""; ?> title="Options" >Manage Order</a></li>
                            <li><a href="<?=$baseURL?>/ag-admin/change-passwd/" <?=(CUR_PAGE == "adminChange Password")? "class='activaLink'" : ""; ?> title="Change Password">Change Password</a></li>                    
                            <li><a href="<?=$baseURL?>/ag-admin/logout/" title="Logout" >Logout</a></li>
                        </span>
                    </ul></div>
                    <div id="dropmenu1" class="dropmenudiv size12">
                        <li><a href="<?=$baseURL?>/ag-admin/order/?section=order1" title="Order1">Order-1</a></li>                        <li><a href="<?=$baseURL?>/ag-admin/order/?section=order2" title="Order1">Order-2</a></li>
                        <li><a href="<?=$baseURL?>/ag-admin/order/?section=order3" title="Order3">Order-3</a></li>                      
                    </div>
                    <script type="text/javascript">cssdropdown.startchrome("chromemenu");</script>                   
                	<?php
                } ?>   
            <!-- end #header --></div>    
        <!-- end #headerContent --></div>

