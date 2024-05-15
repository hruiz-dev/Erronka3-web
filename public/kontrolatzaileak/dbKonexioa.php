<?php

class dbKonexioa 
{
    private $host = "mysql";
    private $db = "pakAG";
    private $user = "root";

    private $pass = "root";

    private $conn;

    public function __construct()
    {
        $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->db);
        if ($this->conn->connect_error) {
            die("Errorea: " . $this->conn->connect_error);
        }
    }

    /**
     * funtzio honek datubaseari kontsulta bat egiten dio pasatutako erabiltzailea eta pasahitzarekin, 
     * esistitzen bada auen datak itzuilo ditu besteal null balorea
     * @param $erabiltzailea erabiltzailearen izena
     * @param $pasahitza erabiltzailearen pasahitza
     * @return banatzailea|null banatzailea aurkitu bada, banatzailea itzuliko du, bestela null
     */
    public function login($erabiltzailea, $pasahitza){

        $erabiltzailea = $this->mysqlFormat($erabiltzailea);
        $pasahitza = $this->mysqlFormat($pasahitza);

        $sql = "SELECT * FROM `Banatzailea` WHERE erabiltzailea = '$erabiltzailea' AND pasahitza = '$pasahitza'";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }

    public function lortuBanatzailea($banatzaileaId) {
        $sql = "SELECT * FROM `Banatzailea` WHERE id = '$banatzaileaId'";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }

    /**
     * Funtzio honek datubasetik erabiltzaileari dagokion paketeak itzultzen ditu
     * @param mixed $banatzaileaId banatzailearen id-a
     */
    public function lortuBanatzailearenPaketeak($banatzaileaId){
        $sql = "SELECT * FROM `Paketea`WHERE `Banatzailea_id` = '$banatzaileaId';";
        return $this->conn->query($sql);
        
    }

    /**
     * Funtzio honek datubasetitk banatzaile honek banatu duen paketeen inzidentziak itzultzen ditu
     * @param mixed $banatzaileaId banatzailearen id-a
     */
    public function lortuPaketenInzidentziak($banatzaileaId){
        $sql = "SELECT COUNT(*)
        FROM `Paketea` 
        WHERE `Paketea`.`Banatzailea_id` = '$banatzaileaId'
        AND EXISTS (
            SELECT 1 
            FROM `paketeak_inzidenzia_eduki` 
            WHERE `paketeak_inzidenzia_eduki`.`paketea` = `Paketea`.`id`
        );";

        $result = $this->conn->query($sql);
        $row = $result->fetch_row();
        return $row[0]; // Devuelve el número de filas
    
    }

    /**
     * funtzio honek mysql ijezioak saiesteko formatuan itzultzen du psatutako string-a
     */
    function mysqlFormat($format) : string {
        return $this->conn->real_escape_string($format);
    }

    public function __destruct()
    {
        $this->conn->close();
    }
}
