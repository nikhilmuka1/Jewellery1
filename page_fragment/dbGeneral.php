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

class dbGeneral extends dbConnect {

    public function addData($conn, $table, $data) {
        $columnName = array();
        $columnValue = array();
        foreach ($data as $clmName => $clmValue) {
            $columnName[] = "`" . $clmName . "`";
            $columnValue[] = "'" . mysqli_real_escape_string ($conn, $clmValue). "'";
                  
        }
        $columnName1 = implode(",", $columnName);
        $columnValue1 = implode(",", $columnValue);
        $query = "INSERT INTO " . $table . " (" . $columnName1 . ") VALUES (" . $columnValue1 . ")";
        $result = dbConnect::dbExecute($conn, $query);
        return $result;
    }

    public function editData($conn, $table, $data, $condition) {
        $columnNameValue = array();
        foreach ($data as $clmName => $clmValue) {
            //mysqli_real_escape_string ($conn, $clmValue) or die("s : ".$clmName);
             $clmValue  = trim($clmValue);
             $clmValue = stripslashes($clmValue);
            $columnNameValue[] = "`" . $clmName . "`='" . mysqli_real_escape_string ($conn, $clmValue) . "'";
        }
        $columnNameValue1 = implode(",", $columnNameValue);
        $query = "UPDATE  " . $table . " SET " . $columnNameValue1 . " WHERE " . $condition;
        $result = dbConnect::dbExecute($conn, $query);
        return $result;
    }

    public function viewData($conn, $table, $fields = "*", $condition = "1", $extra = "") {
        $query = "SELECT " . $fields . " FROM " . $table . " WHERE " . $condition . " " . $extra;
        $result = dbConnect::dbExecute($conn, $query);
        return $result;
    }
    
    public function deleteData($conn, $table, $condition) {
        $query = "DELETE FROM " . $table . " WHERE " . $condition;
        $result = dbConnect::dbExecute($conn, $query);
        return $result;
    }
    
    public function num_rows($result){
        $num = mysqli_num_rows($result);
        return $num;
    }
    
    public function fetch_assoc($query){
        $result = mysqli_fetch_assoc($query);
        return $result;
    }
    
    public function fetch_array($query){
        $result = mysqli_fetch_array($query);
        return $result;
    }
    
    public function fetch_object($query){
        $result = mysqli_fetch_object($query);
        return $result;
    }
    
    public function insert_id($conn){
        $result = mysqli_insert_id($conn);
        return $result;
    }
    public function viewJoinData($conn, $table,$fields, $condition) {
       $query = "SELECT " . $fields . " FROM " . $table ." ". $condition . " ";
       $result = dbConnect::dbExecute($conn, $query);
       return $result;
   }
}

?>