<?php
define("image_PATH", "/home/truckhvantage/public_html/Projects-Work/MarketPlace/development/images/");  // 
echo createImageIcon('S');
function createImageIcon($a)
{
$back1 = '245';
$back1 = '245';
$back1 = '245';
$back1 = '245';
// Create a blank image and add some text
$im = imagecreatetruecolor(50, 50);
$digit = '';

$colors0 = '27,78,181';     // blue
$colors1 = '22,163,35';     // green
$colors2 = '214,36,7';      // red
$colors3 = '58,64,70';      // dark blue gray
$colors4 = '56,163,252';    // bright blue
$colors5 = '223,69,96';     // magenta/pink


for($x = 10; $x <= 130; $x += 30) {
    $digit += rand(0, 2);
}

if($digit <= 2){$background_color = imagecolorallocate($im,27,78,181);}
elseif($digit == 3){$background_color = imagecolorallocate($im,22,163,35);}
elseif($digit == 4){$background_color = imagecolorallocate($im,214,36,7);}
elseif($digit == 5){$background_color = imagecolorallocate($im,58,64,70);}
elseif($digit >= 6){$background_color = imagecolorallocate($im,56,163,252);}	
// 62732 .  77599 . 17058 . 22030

$fonts = array();
$font = "../ttf/DejaVuSerif-Bold.ttf";
$fonts[] = "../ttf/DejaVuSans-Bold.ttf";
$fonts[] = "../ttf/DejaVuSansMono-Bold.ttf";

$text_color = imagecolorallocate($im, 0, 255, 255);
$line_color = imagecolorallocate($im, 64, 64, 64);
$pixel_color = imagecolorallocate($im, 0, 0, 255);
imagefilledrectangle($im, 0, 0, 200, 50, $background_color);


//$text_color = imagecolorallocate($im, 255, 255, 255);
$val= $a;
//imagestring($im, 255, 14, 11,  $val , $text_color);

//$font='BELLB.TTF';
$white=imagecolorallocate($im, 255, 255, 255);
$string_length=5;
$font_size=20;
$width=135;
$height=45;
//CALC APPROX LOCATION FOR TEXT
$y_value=($height/2)+($font_size/2);
$x_value=($width-($string_length*$font_size))/2;
//DRAW STRING USING TRUE TYPE FUNCTION
imagettftext($im, $font_size, 0, $x_value,$y_value, $white, $font, $val);

// Save the image as 'simpletext.jpg'
$name = date("Y-m-d-H-i-s").$nameText.'.jpg';
    $pathName = image_PATH.'user-icon/'.$name;
    imagejpeg($im,$pathName,100);

// Free up memory
imagedestroy($im);
echo "<img src=images/user-icon/".$name.">";
}
?>

