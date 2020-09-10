<?php

/**
 * DDC
 *
 * Copyright (c) 2014 - 2015, Abaxsoft Solutions
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * @project	DDC
 * @author	Shivraj
 * @copyright	Copyright (c) 2008 - 2014, Abaxsoft Solutions
 * @link	http://www.abaxsoft.com
 * @since	Version 1.0.0
 */
/* This funtion is created for the general map operations */

class srmap{
    
    public function getAddressByLatLong($lat, $lng) {
        $url = "http://maps.googleapis.com/maps/api/geocode/json?latlng=" . $lat . "," . $lng . "&sensor=false";
        $json = @file_get_contents($url);
        $data = json_decode($json);
        $status = $data->status;
        $address = '';
        if ($status == "OK") {
            $address = $data->results[0]->formatted_address;
        }
        return $address;
    }

    public function getLatLngByAddress($address) {
        $address = str_replace(" ", "+", $address);
        /* $json = file_get_contents("http://maps.google.com/maps/api/geocode/json?address=$address&sensor=false&region=$region"); */
        $json = file_get_contents("http://maps.google.com/maps/api/geocode/json?address=$address&sensor=false");
        $data = json_decode($json);
        $status = $data->status;
        if ($status == "OK") {
            $lat = $data->{'results'}[0]->{'geometry'}->{'location'}->{'lat'};
            $long = $data->{'results'}[0]->{'geometry'}->{'location'}->{'lng'};
            return $lat . ',' . $long;
        } else {
            return "0";
        }
    }

    public function getStateByAddress($address) {
        $address = str_replace(" ", "+", $address);
        $state = "";
        /* $json = file_get_contents("http://maps.google.com/maps/api/geocode/json?address=$address&sensor=false&region=$region"); */
        $json = file_get_contents("http://maps.google.com/maps/api/geocode/json?address=$address&sensor=false");
        $data = json_decode($json);
        $status = $data->status;
        if ($status == "OK") {
            $address_components = $data->{'results'}[0]->{'address_components'};
            foreach ($address_components as $key => $value) {
                /* city <=> administrative_area_level_2, state <=> administrative_area_level_1, country <=> country */
                if ($value->{'types'}[0] == "administrative_area_level_1") {
                    $state = $value->{'short_name'}; /* short_name, long_name */
                }
            }
            return $state;
        } else {
            return "0";
        }
    }

    public function getStateByLatLng($lat, $lng) {
        $latlng = $lat . "," . $lng;
        $state = "";
        /* $json = file_get_contents("http://maps.google.com/maps/api/geocode/json?address=$address&sensor=false&region=$region"); */
        $json = file_get_contents("http://maps.google.com/maps/api/geocode/json?address=$latlng&sensor=false");
        $data = json_decode($json);
        $status = $data->status;
        if ($status == "OK") {
            $address_components = $data->{'results'}[0]->{'address_components'};
            foreach ($address_components as $key => $value) {
                /* city <=> administrative_area_level_2, state <=> administrative_area_level_1, country <=> country */
                if ($value->{'types'}[0] == "administrative_area_level_1") {
                    $state = $value->{'short_name'}; /* short_name, long_name */
                }
            }
            return $state;
        } else {
            return "0";
        }
    }

    public function getMapImage($center, $pickup, $drop) {
        //$url = "https://maps.googleapis.com/maps/api/staticmap?center=".$center."&zoom=7&size=400x350&maptype=roadmap";
        $url = "https://maps.googleapis.com/maps/api/staticmap?size=264x264&maptype=roadmap";
        $pklatlng = $this->getLatLngByAddress($pickup);
        $dplatlng = $this->getLatLngByAddress($drop);
        $url .= "&markers=color:green%7Clabel:G%7C" . $pklatlng;
        $url .= "&markers=color:red%7Clabel:G%7C" . $dplatlng;
        $url .= "&path=color:0x0000ff|weight:5|" . $pklatlng . "|" . $dplatlng;
        //$url .= "&key=AIzaSyB5Tv4V87vKVntLacUuoBDp9suc7D9crSA";
        $url .= "&key="+GOOGLE_MAP_KEY;
        return $url;
    }

    public function getMapImageWT($center, $drop) {
        //$url = "https://maps.googleapis.com/maps/api/staticmap?center=".$center."&zoom=7&size=400x350&maptype=roadmap";
        $url = "https://maps.googleapis.com/maps/api/staticmap?size=264x264&maptype=roadmap";
        //$pklatlng = $this->getLatLngByAddress($pickup);
        $dplatlng = $this->getLatLngByAddress($drop);
        //$url .= "&markers=color:green%7Clabel:G%7C" . $pklatlng;
        $url .= "&markers=color:red%7Clabel:G%7C" . $dplatlng;
        //$url .= "&path=color:0x0000ff|weight:5|" . $pklatlng . "|" . $dplatlng;
        $url .= "&key="+GOOGLE_MAP_KEY;
        return $url;
    }

    public function distanceCalculation($point1_lat, $point1_long, $point2_lat, $point2_long, $unit = 'km', $decimals = "") {
        $distance = "";
        // Calculate the distance in degrees
        $degrees = rad2deg(acos((sin(deg2rad($point1_lat)) * sin(deg2rad($point2_lat))) + (cos(deg2rad($point1_lat)) * cos(deg2rad($point2_lat)) * cos(deg2rad($point1_long - $point2_long)))));
        // Convert the distance in degrees to the chosen unit (kilometres, miles or nautical miles)
        switch ($unit) {
            case 'km':
                $distance = $degrees * 111.13384;
                /* 1 degree = 111.13384 km, based on the average diameter of the Earth (12,735 km) */
                break;
            case 'mi':
                $distance = $degrees * 69.05482;
                /* 1 degree = 69.05482 miles, based on the average diameter of the Earth (7,913.1 miles) */
                break;
            case 'nmi':
                $distance = $degrees * 59.97662;
            /* 1 degree = 59.97662 nautic miles, based on the average diameter of the Earth (6,876.3 nautical miles) */
        }
        if ($decimals != "") {
            $distance = round($distance, $decimals);
        }
        return $distance;
    }

    public function getDistanceBetweenAddress($addressFrom, $addressTo) {
        $baseUrl = "http://maps.googleapis.com/maps/api/distancematrix/json?";
        $origin = "origins=" . urlencode($addressFrom);
        $destination = "&destinations=" . urlencode($addressTo);
        $extraas = "&mode=car&language=pl&sensor=false";
        $url = $baseUrl . $origin . $destination . $extraas;
        $distance = "";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        /* curl_setopt($ch, CURLOPT_NOBODY, TRUE); // remove body */
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        $head = curl_exec($ch);
        /* $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE); */
        curl_close($ch);
        $data = json_decode($head);
        $status = $data->status;
        if ($status == "OK") {
            $distance = $data->rows[0]->elements[0]->distance->value;
            $distance = round($distance / 1000);
            /* $duration_text = $data->rows[0]->elements[0]->duration->text;
              $duration_value = $data->rows[0]->elements[0]->duration->value; */
        }
        /* print_r($distance); die(); */
        return $distance;
    }

}