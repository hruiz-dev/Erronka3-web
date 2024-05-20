<?php

require_once "../modeloak/paketea.php";

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
    public function login($erabiltzailea, $pasahitza)
    {

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

    /**
     * banatzailearen id-a erabiliz, banatzailearen datuak itzultzen ditu
     * @param mixed $banatzaileaId banatzailearen id-a
     */
    public function lortuBanatzailea($banatzaileaId)
    {
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
    public function lortuBanatzailearenPaketeak($banatzaileaId)
    {
        $sql = "SELECT * FROM `Paketea`WHERE `Banatzailea_id` = '$banatzaileaId';";
        return $this->conn->query($sql);

    }

    /**
     * Funtzio honek datubasetitk banatzaile honek banatu duen paketeen inzidentziak itzultzen ditu
     * @param mixed $banatzaileaId banatzailearen id-a
     */
    public function lortuPaketenInzidentziak($banatzaileaId)
    {
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
     * Funtzio honek banatzailea eduki dituen inzidentzia guztiak itzultzen ditu
     */
    public function lortuBanatzailearenInzidentziak($banatzaileaId)
    {
        $sql = "SELECT * FROM Inzidenzia 
        WHERE inzidenzia_kodea IN (
            SELECT inzidenzia FROM paketeak_inzidenzia_eduki 
            WHERE paketea IN (
                SELECT id FROM Pakete_Historiala 
                WHERE Banatzailea_id = $banatzaileaId
            )
        );
        ";

        $rows = mysqli_fetch_all($this->conn->query($sql), MYSQLI_ASSOC);
        return $rows;

    }

    /**
     * funtzio honek mysql ijezioak saiesteko formatuan itzultzen du psatutako string-a
     */
    function mysqlFormat($format): string
    {
        return $this->conn->real_escape_string($format);
    }

    /**
     * Funtzio honek paketea banatzen jartzen du bere id-a erabiliz
     * @param mixed $id paketearen id-a
     */
    public function paketeaBanatzenJarri($id) {
        $sql = "UPDATE `Paketea` SET `entregatzen` = '1' WHERE `Paketea`.`id` = $id;";
        $this->conn->query($sql);
    }

    /**
     * Funtzi honek paketea entregatuta jartzen du bere id-a erabiliz
     * Lehenik datubasetik paketearen datuak eskuratzen ditu, gero pakete historian sartu eta azkenik paketa ezabatu
     */
    public function paketeaEntregatutaJarri($id) {
        $sql = "SELECT * FROM `Paketea` WHERE `id` = $id";
        $response = $this->conn->query($sql);
        
        $response = $response->fetch_assoc();
        $paketea = new Paketea(
        $response['id'], 
        $response['entrega_egin_beharreko_data'], 
        $response['hartzailea'], 
        $response['dimensioak'], 
        $response['hauskorra'], 
        $response['helburua'], 
        $response['jatorria'], 
        $response['entregatzen'], 
        $response['Banatzailea_id']);
        
        
        $sql = "INSERT INTO `Pakete_Historiala` (`id`, `entrega_egin_beharreko_data`, `hartzailea`, `dimensioak`, 
        `hauskorra`, `helburua`, `jatorria`, `entregatze_data`, `Banatzailea_id`) 
        VALUES (
            NULL, '{$paketea->entragaEginBeharrekoData}',
            '{$paketea->hartzailea}',
            '{$paketea->dimensioak}',
            '{$paketea->hauskorra}',
            '{$paketea->helburua}',
            '{$paketea->jatorria}',
            NOW(),
            '{$paketea->banatzaileaId}')";

        $this->conn->query($sql);
            
        $sql = "DELETE FROM `Paketea` WHERE `id` = $id";
        $this->conn->query($sql);
    }

    public function __destruct()
    {
        $this->conn->close();
    }
}
