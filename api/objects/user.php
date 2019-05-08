<?php

class User
{
    /**
     * @var PDO
     */

    private $conn;
    private $table_name = "user";

    public $username;
    public $password;
    public $whatsapp;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    function create(){
        $q = "INSERT INTO " . $this->table_name  . ' SET 
                        username = :username,
                        password = :password,
                        whatsapp = :whatsapp';

        $stmt = $this->conn->prepare($q);

        $this->username=htmlspecialchars(strip_tags($this->username));
        $this->password=htmlspecialchars(strip_tags($this->password));
        $this->whatsapp=htmlspecialchars(strip_tags($this->whatsapp));

        $password_hash = password_hash($this->password,PASSWORD_BCRYPT);

        $stmt->bindParam(':username', $this->username);
        $stmt->bindParam(':password', $password_hash);
        $stmt->bindParam(':whatsapp', $this->whatsapp);

        if ($stmt->execute()){
            return true;
        } else {
            return false;
        }
    }

    function getUserAll(){
        $q = "SELECT * FROM " .$this->table_name;
        $stmt = $this->conn->prepare($q);

        $respose = array();
        if ($stmt->execute()){
            while ($row = $stmt->fetchObject()){
                $respose[] = $row;
            }
        }
        http_response_code(200);
        echo json_encode(array("message" => "Success Request All User Data","data" => $respose));
    }

    function getUser($username){
        $q = "SELECT * FROM " .$this->table_name. " WHERE `username` = :username";
        $stmt = $this->conn->prepare($q);

        $username = htmlspecialchars(strip_tags($username));

        $stmt->bindParam(':username', $username);

        $respose=array();
        if ($stmt->execute()){
            while ($row = $stmt->fetchObject()){
                $respose[] = $row;
            }
        }

        http_response_code(200);
        echo json_encode(array("message" => "Success Requesting User ".$username." Data","data" => $respose));
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    function update(){
        $q = "UPDATE " .$this->table_name. " SET `password` = :password, `whatsapp` = :whatsapp WHERE `username` = :username";

        $stmt = $this->conn->prepare($q);

        $this->username=htmlspecialchars(strip_tags($this->username));
        $this->password=htmlspecialchars(strip_tags($this->password));
        $this->whatsapp=htmlspecialchars(strip_tags($this->whatsapp));

        $password_hash = password_hash($this->password, PASSWORD_BCRYPT);

        $stmt->bindParam(':username', $this->username);
        $stmt->bindParam(':password', $password_hash);
        $stmt->bindParam(':whatsapp', $this->whatsapp);

        if ($stmt->execute()){
            return true;
        }
        return false;
    }

    function delete(){
        $q ="DELETE FROM " .$this->table_name. " WHERE username = :username";
        $stmt = $this->conn->prepare($q);

        $this->username=htmlspecialchars(strip_tags($this->username));
        $stmt->bindParam(':username', $this->username);

        if ($stmt->execute()){
            return true;
        } else {
            return false;
        }
    }

    function userExists(){
        $q = "SELECT * FROM " .$this->table_name. " WHERE username = :username";
        $stmt = $this->conn->prepare($q);

        $this->username = htmlspecialchars(strip_tags($this->username));
        $stmt->bindParam(":username",$this->username);

        $stmt->execute();

        $num = $stmt->rowCount();

        if ($num>0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            $this->username = $row['username'];
            $this->whatsapp = $row['whatsapp'];
            $this->password = $row['password'];

            return true;
        }
        return false;
    }
}