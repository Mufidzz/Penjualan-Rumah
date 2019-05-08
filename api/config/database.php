<?php

class Database{
    private $host="localhost";
    private $db_name="skripsi";
    private $username="root";
    private $password="";
    private $connection_status;

    public $conn;

    public function getConnection(){
        $this->conn = null;

        try{
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->connection_status = 200;
        }catch (PDOException $e){
            $this->connection_status = $e->getCode();
        }

        return $this->conn;
    }

    public function getStatusCode(){
        return $this->connection_status;
    }
}