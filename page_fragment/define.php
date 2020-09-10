<?php
session_start();
//error_reporting(E_ALL);
error_reporting(E_ALL & ~E_NOTICE);
$http_host = $_SERVER['HTTP_HOST'];

//$page = end(explode('/', $_SERVER["REQUEST_URI"]));
/* BASE PATH AND URL */


    define("BASE_URL", "http://$http_host/marketplace/");
    define("BASE_PATH", BASE_URL);
    //admin 
    define("ADMIN_URL", BASE_URL."admin/");
    define("ADMIN_PATH", BASE_URL."admin/");
    define("ADMINISTRATOR_PATH_DASHBOARD", BASE_URL."admin/dashboard/");
    //seller
    define("SELLER_URL", "http://$http_host/marketplace/seller/");
    define("SELLER_PATH", SELLER_URL);
    define("SELLER_PATH_DASHBOARD", SELLER_URL."dashboard/");
    //user
    define("USER_URL", "http://$http_host/marketplace/user/");
    define("USER_PATH", USER_URL);
//    define("USER_URL_DASHBOARD", USER_URL."dashboard/");
    
   define("CURRENCY_SYMBOL", '$ ');
    define("GRID_PAGE_LIMT", '21');
    define("LIST_PAGE_LIMT", '20');

/* DB Constant */
    
define("DB_HST", "localhost");
define("DB_USR", "fxpilyzx_jewellry_marketplace");  //jwellary_market
define("DB_PWD", "TOf^a@5^SVBn"); //Zq3f[7kd9Pxx
define("DB_NAM", "fxpilyzx_jewellry_marketplace");
    
//define("DB_HST", "localhost");
//define("DB_USR", "fxpilyzx_shop_addresschic");
//define("DB_PWD", "hxirXTAwUT+w");
//define("DB_NAM", "fxpilyzx_shop_addresschic");

date_default_timezone_set('Asia/Kolkata');


/* MAIL Constant */
define("MAIL_HOST", "fxpilyzx@server238.web-hosting.com");
define("MAIL_SMTPSecure", "ssl"); /* ssl->465, tls->587 */
define("MAIL_PORT", "465"); /* ssl->465, tls->587 */
define("MAIL_USER", "support@fxpips.co.uk");
define("MAIL_NAME", "Marketplace Jweellry");
define("MAIL_PWD", "AP6iEt2GR,Rd");
define("MAIL_SUPPORT", "support@fxpips.co.uk");
define("MAIL_SUPPORT_NAME", "Marketplace Jweellry");



/* GCM Key */
define("GOOGLE_GCM_KEY", "AIzaSyAYNDAbhnsOmvHPsu8qsYOdxvQ2TjzYhv0");
/* Google Map Key */
define("GOOGLE_MAP_KEY", "AIzaSyAYNDAbhnsOmvHPsu8qsYOdxvQ2TjzYhv0");


// ---------- Cookie Info ---------- //
define("COOKIE_NAME", "marketplace_auth");
define("COOKIE_TIME", (3600 * 24 * 30)); // 30 days

$cookie_name = 'siteAuth';
$cookie_time = (3600 * 24 * 30); // 30 days

#########################################################
function _isCurl(){
    return function_exists('curl_version');
}
function check_curl(){
if  (in_array  ('curl', get_loaded_extensions())) {
       return "CURL is available on your web server";
    }  else {
       return "CURL is not available on your web server";

    } 
}

function checkRemoteFileNj($url) {
   if  (in_array  ('curl', get_loaded_extensions())) {
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $url);
      // don't download content
      curl_setopt($ch, CURLOPT_NOBODY, 1);
      curl_setopt($ch, CURLOPT_FAILONERROR, 1);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      if (curl_exec($ch) !== FALSE) {
          return true;
      } else {
          return false;
      }
     } else {
          return true;
      //  echo "CURL is not available on your web server";
     } 
}
// print_r($_SESSION);

    if(isSet($_COOKIE))
    {//  print_r($_COOKIE);  die;
            // Check if the cookie exists
         if(isSet($_COOKIE["Jauth"]))
            {
              $Jauth = $_COOKIE['Jauth'];
             $auth_data = json_decode($Jauth, true);
             $_SESSION= $auth_data;
            }
    }


?>