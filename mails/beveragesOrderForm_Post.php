<?php

require_once("dompdf_config.inc.php");
require_once("functions.inc.php");
require_once("classEmail.php");
define("BASE_URLL", "http://www.truckslogistics.com/Projects-Work/ubenx/dev/");

	$from_Email = 'mmfinfotech253@gmail.com';
    $admin_Email   =  'neerjarseniya@gmail.com';			//brittany@thegentsplace.com,ben@thegentsplace.com
    $subject        = "Beverages Order Form for";
    $admin_body =  '<table width="500" align="center" border="0"  cellpadding="0" cellspacing="0">
	<tr><td colspan="3"  align="center" style="font-size:26px; height:50px; color:#FFFFFF; text-align:center; background:#292522;"><strong style="text-align:center;">Beverages Order</strong> </td></tr></table>';

	 $pdf_body = '<style>	body{ margin:0; padding:0; background:url('.BASE_URLL.'images/cert.png) no-repeat center;}
	*{ margin:0px; padding:0px;}
	@font-face {font-family: "Lucida Calligraphy";
	src: url("'.BASE_URLL.'LucidaCalligraphy-Italic.eot");
	src: url("'.BASE_URLL.'LucidaCalligraphy-Italic.eot?#iefix") format("embedded-opentype"),
		url("'.BASE_URLL.'LucidaCalligraphy-Italic.woff") format("woff"),
		url("'.BASE_URLL.'LucidaCalligraphy-Italic.ttf") format("truetype");
	font-weight: normal;
	font-style: italic;}.ab1{ border:none; border-bottom:1.6px #222 solid; width:220px; margin:0 auto; height:42px; font-family: "Lucida Calligraphy"; font-size:18px; font-style:italic; padding-left:10px; font-weight:600;}
	.ab1::-webkit-input-placeholder, .ab2::-webkit-input-placeholder {color: #222;}.ab1::-moz-placeholder, .ab2::-moz-placeholder {color: #222;}
.ab1:-ms-input-placeholder, .ab2:-ms-input-placeholder {color: #222;}
.ab1:-moz-placeholder, .ab2:-moz-placeholder {color: #222;}
p.pop{ font-size:24px; text-align:center; color:#222; font-family: "Lucida Calligraphy"; font-weight:400; margin-top:3%;}
p.pop1{font-size:28px; text-align:center; color:#222; font-family: "Lucida Calligraphy"; font-weight:600; margin-top:3%; text-decoration:underline;}
.ab2{ border:none; border-bottom:1.6px #222 solid; width:150px; font-family: "Lucida Calligraphy";}
p.popD{ font-size:18px; margin-top:10%;}
p.popV{ font-size:12px; font-family:Arial, Helvetica, sans-serif;}
</style>
<div class="content" style="height:628px; width:800px; padding:20px 60px; margin:0 auto;"><div class="img" style="margin-top:20%;"><img src="'.BASE_URLL.'images/hdd.jpg" alt="" title="" /></div><form action="#.php"><div style="width:220px; margin:0 auto;"><input type="text" class="ab1" placeholder="Name"/>
</div><p class="pop">Has mastered the course</p><p class="pop1">Name of Course Completed</p>
<p class="pop popD">Awarded&nbsp;&nbsp;_____________________&nbsp;&nbsp;this _____________________day of, 20_____________________</p>
<div style="width:220px; margin:0 auto;">_____________________<p class="pop popV">Presenter Name and Title</p></div></form></div>';
  
  
	    //$userName = str_replace(" ","",$name);	//remove the space if first name contain
		$old_limit = ini_set("memory_limit", "192M"); 
		$dompdf = new DOMPDF();
		echo $pdf_body;
               // die;
		$dompdf->load_html($pdf_body);
                $customPaper = array(0,0,975,630);
                $dompdf->set_paper($customPaper);
		//$dompdf->set_paper("a4", "landscape");
		$dompdf->render();
		$pdf_content = $dompdf->output();// Put contents of pdf into variable
		$fileName = "Beverages_Order_Form.pdf"; // create the unique name for pdf generated
		file_put_contents("attachment/".$fileName, $pdf_content);
		//send the message to Admin 
		$SendEmail = new sendEmail();
		$SendEmail->setHeader("From", $from_Email);    // You can modify predefined headers or set new ones
		$SendEmail->clear_bodyText();
		$SendEmail->clear_htmlText();
		$SendEmail->htmlText($admin_body);
		
		$SendEmail->attachFile("attachment/".$fileName, 'application/pdf');
		$SendEmail->sendMail($admin_Email, $subject);
		
	exit;
?>