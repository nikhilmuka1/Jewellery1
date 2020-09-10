<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Description of GCM
 * @author 
 */
class GCM {
    function __construct() {
    }
    public function send_notification($registatoin_ids, $message,$api_key) {
        // Set POST variables
        $url = 'https://android.googleapis.com/gcm/send';
        $fields = array('registration_ids' => $registatoin_ids,'data' => $message);
        $headers = array( 'Authorization: key=' . $api_key, 'Content-Type: application/json' );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
        $result = curl_exec($ch);
        if ($result === FALSE) {
            die('Curl failed: ' . curl_error($ch));
        }
        //print_r($result);
        curl_close($ch);
        //die();
        return $result;
    }
}
?>