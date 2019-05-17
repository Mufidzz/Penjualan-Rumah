<?php

class address
{
    /**
     * @var PDO
     */

    private $conn;

    public $id_kec;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    function getKecamatan(){
        $q = "SELECT * FROM `kecamatan` WHERE `id_kab` = 3573";
        $stmt = $this->conn->prepare($q);

        $respose = array();
        if ($stmt->execute()){
            while ($row = $stmt->fetchObject()){
                $respose[] = $row;
            }
        }
        http_response_code(200);
        echo json_encode(array("data" => $respose));
    }

    function getKelurahan($id_kecamatan){
        $q = "SELECT * FROM `kelurahan` WHERE `id_kec` = :id_kec";
        $stmt = $this->conn->prepare($q);

        $id_kecamatan = htmlspecialchars(strip_tags($id_kecamatan));

        $stmt->bindParam(':id_kec', $id_kecamatan);

        $respose=array();
        if ($stmt->execute()){
            while ($row = $stmt->fetchObject()){
                $respose[] = $row;
            }
        }

        http_response_code(200);
        echo json_encode(array("data" => $respose));
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

}