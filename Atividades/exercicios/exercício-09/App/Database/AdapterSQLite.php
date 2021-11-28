<?php

namespace App\Database;

class AdapterSQLite implements AdapterInterface {

    private $conn;

    public function open(){
        $this->conn = include "connect.php";
        
    }

    public function close(){
        $this->conn = null;
    }

    public function get(){
        return $this->conn;
    }
}