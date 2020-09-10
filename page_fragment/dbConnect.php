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
class dbConnect {
    public $conn;
    public function dbConnect() {
        $conn = $this->con = mysqli_connect(DB_HST, DB_USR, DB_PWD, DB_NAM) or die("Error : Failed to connect to MySQL:  " . mysqli_connect_error());
        return $conn;
    }
    public function dbExecute($conn, $query) {
        $run = mysqli_query($conn, $query) or die("Error- :" . mysqli_errno($conn) . " : " . mysqli_error($conn)." ".$query);
        return $run;
    }
    public function dbClose($conn) {
        $conn = mysqli_close($conn);
    }
}
?>