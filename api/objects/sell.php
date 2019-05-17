<?php
class Sell{
    /**
     * @var PDO
     */

    private $conn;
    private $table_name = "sell";

    public $id;
    public $issuer;
    public $title;
    public $alamat;
    public $idlokasi;
    public $shm;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    function create(){
        $q = "INSERT INTO " . $this->table_name  . ' SET
                        issuer = :issuer,
                        title = :title,
                        alamat = :alamat,
                        idlokasi = :idlokasi,
                        shm = :shm';

        $stmt = $this->conn->prepare($q);

        $this->issuer=htmlspecialchars(strip_tags($this->issuer));
        $this->title=htmlspecialchars(strip_tags($this->title));
        $this->alamat=htmlspecialchars(strip_tags($this->alamat));
        $this->idlokasi=htmlspecialchars(strip_tags($this->idlokasi));
        $this->shm=htmlspecialchars(strip_tags($this->shm));

        $stmt->bindParam(':issuer', $this->issuer);
        $stmt->bindParam(':title', $this->title);
        $stmt->bindParam(':alamat', $this->alamat);
        $stmt->bindParam(':idlokasi', $this->idlokasi);
        $stmt->bindParam(':shm', $this->shm);

        if ($stmt->execute()){
            return true;
        } else {
            return false;
        }
    }

    function getSellListAll(){
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

    function getSellListByIssuer($issuer){
        $q = "SELECT * FROM " .$this->table_name. " WHERE `issuer` = :issuer";
        $stmt = $this->conn->prepare($q);

        $issuer = htmlspecialchars(strip_tags($issuer));

        $stmt->bindParam(':issuer', $issuer);

        $respose=array();
        if ($stmt->execute()){
            while ($row = $stmt->fetchObject()){
                $respose[] = $row;
            }
        }

        http_response_code(200);
        echo json_encode(array("message" => "Success Requesting All List From ".$issuer,"data" => $respose));
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    function getSellListByID($id){
        $q = "SELECT * FROM " .$this->table_name. " WHERE `id` = :id";
        $stmt = $this->conn->prepare($q);

        $id = htmlspecialchars(strip_tags($id));

        $stmt->bindParam(':id', $id);
        $respose=array();
        if ($stmt->execute()){
            while ($row = $stmt->fetchObject()){
                $respose[] = $row;
            }
        }

        http_response_code(200);
        echo json_encode(array("message" => "Success Requesting ".$id ." Data","data" => $respose));
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    function update(){
        $q = "UPDATE " .$this->table_name. ' SET
                        issuer = :issuer,
                        title = :title,
                        alamat = :alamat,
                        idlokasi = :idlokasi,
                        shm = :shm WHERE id = :id';

        $stmt = $this->conn->prepare($q);

        $this->issuer=htmlspecialchars(strip_tags($this->issuer));
        $this->title=htmlspecialchars(strip_tags($this->title));
        $this->alamat=htmlspecialchars(strip_tags($this->alamat));
        $this->idlokasi=htmlspecialchars(strip_tags($this->idlokasi));
        $this->shm=htmlspecialchars(strip_tags($this->shm));
        $this->id=htmlspecialchars(strip_tags($this->id));

        $stmt->bindParam(':issuer', $this->issuer);
        $stmt->bindParam(':title', $this->title);
        $stmt->bindParam(':alamat', $this->alamat);
        $stmt->bindParam(':idlokasi', $this->idlokasi);
        $stmt->bindParam(':shm', $this->shm);
        $stmt->bindParam(':id', $this->id);

        if ($stmt->execute()){
            return true;
        }
        return false;
    }

    function delete(){
        $q ="DELETE FROM " .$this->table_name. " WHERE id = :id";
        $stmt = $this->conn->prepare($q);

        $this->id=htmlspecialchars(strip_tags($this->id));
        $stmt->bindParam(':id', $this->id);

        if ($stmt->execute()){
            return true;
        } else {
            return false;
        }
    }
}
