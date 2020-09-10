<?php
error_reporting(E_ALL);
session_start();
$http_host = $_SERVER['HTTP_HOST'];
if (($http_host == 'localhost' )) {
    /* BASE PATH AND URL */
    define("BASE_URL", "http://localhost/ddc/");
    define("BASE_PATH", "http://localhost/ddc/");
    define("ADMIN_URL", "http://localhost/ddc/admin/");
    define("ADMIN_PATH", "http://localhost/ddc/admin/");
    /* DB Constant */
    define("DB_HOST", "localhost");
    define("DB_USER", "root");
    define("DB_PWD", "");
    define("DB_NAME", "ddc");
    date_default_timezone_set('Asia/Kolkata');
}
elseif (($http_host == '192.168.1.5' )) {
    /* BASE PATH AND URL */
    define("BASE_URL", "http://198.168.1.5/ddc/");
    define("BASE_PATH", "http://198.168.1.5/ddc/");
    define("ADMIN_URL", "http://198.168.1.5/ddc/admin/");
    define("ADMIN_PATH", "http://198.168.1.5/ddc/admin/");
    /* DB Constant */
    define("DB_HOST", "localhost");
    define("DB_USER", "root");
    define("DB_PWD", "");
    define("DB_NAME", "ddc");
    date_default_timezone_set('Asia/Kolkata');
}
else {
    /* BASE PATH AND URL */
    define("BASE_URL", "http://www.abaxsoft.com/ddc/");
    define("BASE_PATH", "http://www.abaxsoft.com/ddc/");
    define("ADMIN_URL", "http://www.abaxsoft.com/ddc/admin/");
    define("ADMIN_PATH", "http://www.abaxsoft.com/ddc/admin/");
    /* DB Constant */
    define("DB_HOST", "localhost");
    define("DB_USER", "dreamcarddistan");
    define("DB_PWD", "hakunatata");
    define("DB_NAME", "dreamdc");
}
date_default_timezone_set('Asia/Kolkata');
/* (KeyType:BrowserKey)-(KeyName:BrowserKeyForDDC)-(Key:AIzaSyDOb8ScpmDkGCb_-mNlxqCKmyBRoSFqJRo)-(Mail:shivraj@abaxsoft.com)-(Project:ddc-project) */
/* (KeyType:ServerKey)-(KeyType:ServerKeyForDDC)-(Key:AIzaSyCPjBeapH_4mDDeG0yBfNW3wDbitK6bL5A)-(Mail:shivraj@abaxsoft.com)-(Project:ddc-project) */
/* (Mail:auth.findmyshipper@gmail.com)-(Project:myshipper)-(KeyType:ServerKey)-(Key:AIzaSyCHmrFOgud7lJtEKiLW9cfPfX_Nt-fHULA) */

/* GCM Key */
define("GOOGLE_GCM_KEY", "AIzaSyDd7RDY86pKszKOhkMtFF37QC4GBPQ_vWw");
/* Google Map Key */
define("GOOGLE_MAP_KEY", "AIzaSyDd7RDY86pKszKOhkMtFF37QC4GBPQ_vWw");


/* MAIL Constant */
define("MAIL_HOST", "smtp.gmail.com");
define("MAIL_SMTPSecure", "ssl"); /* ssl->465, tls->587 */
define("MAIL_PORT", "465"); /* ssl->465, tls->587 */
define("MAIL_USER", "shivraj@abaxsoft.com");
define("MAIL_NAME", "Shivraj Raghuwanshi");
define("MAIL_PWD", "shivraj@123");



/*
 * Project ID------------------------>abaxsoftddc
 * Project number-------------------->766994112934
 * Server Key------------------------>AIzaSyDlL51uExNUjwsFnULGZwH7K93Yj1DjrTQ
 * Browser Key----------------------->AIzaSyApCubycKNEgM69eitJypRoZoM60yNdxXo
 * Here is your client ID------------>766994112934-ijdef6ompkob5cmt9uopa2smqantll45.apps.googleusercontent.com
 * Here is your client secret-------->iYMeG1xjhugAssCOjAVMuuIG
 * 
 * 
*/
?>