<?php

session_start();
error_reporting(E_ALL);
ini_set('display_errors', "1");
$http_host = $_SERVER['HTTP_HOST'];

/* BASE PATH AND URL */

if (($http_host == 'localhost')) {
    /* BASE PATH AND URL */
    define("BASE_URL", "http://localhost/product_cabs/");
    define("ADMIN_URL", "http://localhost/product_cabs/admin/");

    define("BASE_PATH", "http://localhost/product_cabs/");
    define("ADMIN_PATH", "http://localhost/product_cabs/admin/");

    /* DB Constant */
    define("DB_HST", "localhost");
    define("DB_USR", "root");
    define("DB_PWD", "");
    define("DB_NAM", "abx_product_cabs");

    date_default_timezone_set('Asia/Kolkata');
} else {
    /* BASE PATH AND URL */
    define("BASE_URL", "http://www.abaxsoft.com/product_cabs/");
    define("BASE_PATH", "http://www.abaxsoft.com/product_cabs/");
    define("ADMIN_URL", "http://www.abaxsoft.com/product_cabs/admin/");
    define("ADMIN_PATH", "http://www.abaxsoft.com/product_cabs/admin/");
    /* DB Constant */
    define("DB_HST", "localhost");
    define("DB_USR", "cab@ur");
    define("DB_PWD", "cab123");
    define("DB_NAM", "product_cab");
    error_reporting(E_ALL ^ E_DEPRECATED);
}

/* Set Default Timezone */
date_default_timezone_set('Asia/Kolkata');

/* GCM Key */
define("GOOGLE_GCM_KEY", "AIzaSyD7WyyBsC6yjs_WNNlQscdvvy4MpdePchQ");
/* Google Map Key */
define("GOOGLE_MAP_SKEY", "AIzaSyD7WyyBsC6yjs_WNNlQscdvvy4MpdePchQ");
define("GOOGLE_MAP_BKEY", "AIzaSyDkIjKyPUb4NRhz9deES-yk-67fkFDTPCA");


/* MAIL Constant */
define("MAIL_HOST", "mail.google.com");
define("MAIL_SMTPSecure", "ssl"); /* ssl->465, tls->587 */
define("MAIL_PORT", "465"); /* ssl->465, tls->587 */
define("MAIL_USER", "shivraj@abaxsoft.com");
define("MAIL_NAME", "Shivraj Rudra");
define("MAIL_PWD", "Rudra@work");
define("MAIL_SUPPORT", "shivraj@abaxsoft.com");
define("MAIL_SUPPORT_NAME", "Shivraj Rudra");

/*
 * Project ID------------------------>droyo-1338
 * Project number-------------------->
 * Server Key------------------------>AIzaSyD7WyyBsC6yjs_WNNlQscdvvy4MpdePchQ
 * Browser Key----------------------->AIzaSyDkIjKyPUb4NRhz9deES-yk-67fkFDTPCA
 * Here is your client ID------------>
 * Here is your client secret-------->
 */
?>