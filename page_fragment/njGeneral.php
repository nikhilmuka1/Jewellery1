<?php

/**
 * Nj-Man
 *
 * Copyright (c) 2014 - 2015, Nj Solutions
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * @project	Nj Solutions
 * @author	Nj Solutions
 * @copyright	Copyright (c) 2008 - 2014, Nj Solutions
 * @link	http://www.neerjarseniya.com
 * @since	Version 1.0.0
 */
/* This funtion is created for the database functions */

class njGeneral{
    
    public function selectedChoice($val1, $val2) {
        if ($val1 === $val2) {
            echo "selected";
        }
    }
    
    public function selectedChoiceArray($val, $cArray) {
        if (in_array($val, $cArray)) {
            echo "selected";
        }
    }

    public function isInArray($val, $cArray) {
        //print_r($cArray);
        if (in_array($val, $cArray)) {
            return TRUE;
        }
        return FALSE;
    }

    public function checkedChoice($val1, $val2) {
        if ($val1 === $val2) {
            echo "checked";
        }
    }

    public function checkedChoiceArray($val, $cArray) {
        if (in_array($val, $cArray)) {
            echo "checked";
        }
    }
    
    public function isEqual($val1, $val2) {
        if ($val1 === $val2) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function isLoggedIn() {
        if (isset($_SESSION['DH_admin_id']) || isset($_SESSION['DH_admin_type']) || isset($_SESSION['DH_admin_name'])) {
            return TRUE;
        }
        return FALSE;
    }

    public function isNotLoggedIn() {
        if (!isset($_SESSION['DH_admin_id']) || !isset($_SESSION['DH_admin_type']) || !isset($_SESSION['DH_admin_name'])) {
            return TRUE;
        }
        return FALSE;
    }
   //seller check login
    public function isLoggedInSeller() {
        if (isset($_SESSION['DH_seller_id']) || isset($_SESSION['DH_seller_type']) || isset($_SESSION['DH_seller_name'])) {
            return TRUE;
        }
        return FALSE;
    }

    public function isNotLoggedInSeller() {
        if (!isset($_SESSION['DH_seller_id']) || !isset($_SESSION['DH_seller_type']) || !isset($_SESSION['DH_seller_name'])) {
            return TRUE;
        }
        return FALSE;
    }
      public function isNotLoggedInUser() {
        if (!isset($_SESSION['user_id']) || !isset($_SESSION['user_type']) || !isset($_SESSION['user_type_name'])) {
            return TRUE;
        }
        return FALSE;
    }
    public function changeDateFormat($date, $from, $to) {
        if ($myDateTime = DateTime::createFromFormat($from, $date)) {
            return $myDateTime->format($to);
        } else {
            return "";
        }
    }

    public function sendsms($mobileno, $message, $senderId = "UPDATE", $unicode = 0) {
        //Your authentication details
        $username = "findmyshipper_com";
        $password = "92590245";
        //Multiple mobiles numbers separated by comma
        $mobileNumber = $mobileno;
        
        //$senderId = "UPDATE"; /* $senderid */
        $message = urlencode($message);
        //Define route 
        $route = "default";
        $mobileNumber = trim($mobileNumber);
        $message = trim($message);
        $msize = strlen($mobileNumber);
        if ($mobileNumber != "" && $message != "" && $msize >= 10 && $msize <= 13) {
            if($msize == 10){
                $mobileNumber = "91".$mobileNumber;
            }
            //API URL
            //$url = "https://www.txtguru.in/imobile/api.php?";
            $ch = curl_init('https://www.txtguru.in/imobile/api.php?');
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, "username=$username&password=$password&source=$senderId&dmobile=$mobileNumber&message=$message");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $output = curl_exec($ch);
            //Print error if any
            if (curl_errno($ch)) {
                $ret = 'Error:' . curl_error($ch);
            } else {
                $ret = "Message Sent";
            }
            curl_close($ch);
        } else {
            $ret = 'Number and message both are must.';
        }
        return $ret;
        /*
          $ch = curl_init();
          curl_setopt_array($ch, array(
          CURLOPT_URL => $url,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_POST => true,
          CURLOPT_POSTFIELDS => $postData
          //,CURLOPT_FOLLOWLOCATION => true
          ));
          //Ignore SSL certificate verification
          curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
          curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
          //get response
          $output = curl_exec($ch);
          //Print error if any
          if (curl_errno($ch)) {
          echo 'error:' . curl_error($ch);
          } else {
          echo "Message Sent";
          }
          curl_close($ch);
         */
    }

    public function randomString($type, $length) {
        $schars = "abcdefghijklmnopqrstuvwxyz";
        $cchars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $allchars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $nums = "0123456789";
        $ccharsNum = "0123456789ABCDEFGHIJK0123456789LMNOPQRSTUVWXYZ";
        $alphaNum = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $alphaNumSpecial = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?";
        $result = substr(str_shuffle($$type), 0, $length);
        return $result;
    }
    
    function removeSpecialChar($string){
        $string = preg_replace( "/\s+/", "-", $string); // Replaces all spaces/multiple-space with hyphens.
        $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
        return $string;
    }
  

}