<?php



class ajGeneral extends dbGeneral {



    var $skey = "aj"; // you can change it



    function __construct() {

        

    }



    public function NameById($id, $table, $colomname = "name",$colomkey = "id") {

        $dbConObj = new dbConnect();

        $conn = $dbConObj->dbConnect();

        $condition = " `" . $colomkey . "` = '" . $id . "'";

        $result = $this->viewData($conn, $table, "*", $condition);

        $num = $this->num_rows($result);

        if ($num) {

            $row = $this->fetch_assoc($result);

            $res = $row[$colomname];

        } else {

            $res = "~";

        }

        return $res;

    }



    public function NameByIdArray($id, $table, $colomname = "name") {



        $id_arr = explode(",", $id);

        $name_array = array();

        for ($i = 0; $i < count($id_arr); $i++) {

            $dbConObj = new dbConnect();

            $conn = $dbConObj->dbConnect();

            $condition = " `id` = '" . $id[$i] . "'";

            $result = $this->viewData($conn, $table, "*", $condition);

            $num = $this->num_rows($result);

            if ($num) {

                $row = $this->fetch_assoc($result);

                $name_array[] = $row[$colomname];

            } else {

                $name_array[] = 'undefined';

            }

        }

        return implode(",", $name_array);

    }



    function getUriSegments() {

        return explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

    }



    function getUriSegment($n) {

        $segs = $this->getUriSegments();
        if(isset($segs) && $segs && isset($n))  
        return  count($segs) > 0 && count($segs) >= ($n - 1) ? $segs[$n] : '';

       
    }

function curPageURL() {
 $pageURL = 'http';
 if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
 $pageURL .= "://";
 if ($_SERVER["SERVER_PORT"] != "80") {
  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
 } else {
  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
 }
 return $pageURL;
}

}

