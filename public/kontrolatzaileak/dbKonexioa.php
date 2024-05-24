<?php

require_once "../modeloak/paketea.php";

class dbKonexioa
{
    private $host = "mysql";
    private $db = "pakAG";
    private $user = "root";
    private $pass = "root";
    private $conn;

    /**
     * dbKonexioa eraikitzailea.
     * Datu basearekin konexioa hasieratzen du.
     */
    public function __construct()
    {
        $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->db);
        if ($this->conn->connect_error) {
            die("Errorea: " . $this->conn->connect_error);
        }
    }

    /**
     * Emandako erabiltzaile eta pasahitzarekin login kontsulta bat exekutatzen du.
     * 
     * @param string $erabiltzailea Erabiltzailearen izena.
     * @param string $pasahitza Erabiltzailearen pasahitza.
     * @return array|null Banatzailearen datuak itzultzen ditu aurkituz gero, bestela null.
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
     * Banatzailearen datuak bere ID bidez lortzen ditu.
     * 
     * @param mixed $banatzaileaId Banatzailearen IDa.
     * @return array|null Banatzailearen datuak itzultzen ditu aurkituz gero, bestela null.
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
     * Emandako banatzailearen paketeak lortzen ditu.
     * 
     * @param mixed $banatzaileaId Banatzailearen IDa.
     * @return mysqli_result Paketeak dituen kontsultaren emaitza.
     */
    public function lortuBanatzailearenPaketeak($banatzaileaId)
    {
        $sql = "SELECT * FROM `Paketea` WHERE `Banatzailea_id` = '$banatzaileaId';";
        return $this->conn->query($sql);
    }

    /**
     * Emandako banatzaileak banatu dituen paketeen inzidentzien kopurua itzultzen du.
     * 
     * @param mixed $banatzaileaId Banatzailearen IDa.
     * @return int Inzidentzien kopurua.
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
        return $row[0]; // Itzultzen du lerro kopurua
    }

    /**
     * Emandako banatzailearekin erlazionatutako inzidentzia guztiak itzultzen ditu.
     * 
     * @param mixed $banatzaileaId Banatzailearen IDa.
     * @return array Inzidentzien datuak.
     */
    public function lortuBanatzailearenInzidentziak($banatzaileaId)
    {
        $sql = "SELECT * FROM `Inzidenzia`
        INNER JOIN paketeak_inzidenzia_eduki ON paketeak_inzidenzia_eduki.inzidenzia=Inzidenzia.inzidenzia_kodea
        WHERE (paketeak_inzidenzia_eduki.paketea IN (SELECT id FROM Paketea WHERE Paketea.Banatzailea_id=$banatzaileaId)) OR  (paketeak_inzidenzia_eduki.paketea IN (SELECT id FROM Pakete_Historiala WHERE Pakete_Historiala.Banatzailea_id=$banatzaileaId));";

        $rows = mysqli_fetch_all($this->conn->query($sql), MYSQLI_ASSOC);
        return $rows;
    }

    /**
     * SQL injekzioak saihesteko string bat ihes egiten du.
     * 
     * @param string $format Ihes egin behar den stringa.
     * @return string Ihes egindako stringa.
     */
    function mysqlFormat($format): string
    {
        return $this->conn->real_escape_string($format);
    }

    /**
     * Pakete bat entregatzen jartzen du bere IDa erabiliz.
     * 
     * @param mixed $id Paketearen IDa.
     */
    public function paketeaBanatzenJarri($id) {
        $sql = "UPDATE `Paketea` SET `entregatzen` = '1' WHERE `Paketea`.`id` = $id;";
        $this->conn->query($sql);
    }

    /**
     * Pakete bat entregatuta jartzen du bere IDa erabiliz.
     * Paketea historialera mugitu eta aktiboen taulatik ezabatzen du.
     * 
     * @param mixed $id Paketearen IDa.
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
            $response['Banatzailea_id']
        );
        
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
                    '{$paketea->banatzaileaId}'
                )";
        $this->conn->query($sql);
        
        $sql = "DELETE FROM `Paketea` WHERE `id` = $id";
        $this->conn->query($sql);
    }

    /**
     * Objektua suntsitzean datu basearekin konexioa ixten du.
     */
    public function __destruct()
    {
        $this->conn->close();
    }

    /**
     * Emandako banatzailearen entregen historial guztia lortzen du.
     * 
     * @param mixed $banatzaileaId Banatzailearen IDa.
     * @return array Entrega-historialaren datuak.
     */
    public function lortuBanatzailearenHistoriala($banatzaileaId)
    {
        $sql = "SELECT * FROM `Pakete_Historiala` WHERE `Banatzailea_id` = '$banatzaileaId';";
        return mysqli_fetch_all($this->conn->query($sql), MYSQLI_ASSOC);
    }

    public function sortuInzidentzia($paketeaId, $izenburua, $azalpena){
        $sql = "INSERT INTO `Inzidenzia`(`izenburua`, `informazioa`, `momentua`) VALUES ('$izenburua','$azalpena',NOW())";
        $this->conn->query($sql);

        $last_id = $this->conn->insert_id;
        $sql = "INSERT INTO `paketeak_inzidenzia_eduki`(`inzidenzia`, `paketea`) VALUES ('$last_id','$paketeaId')";
        $this->conn->query($sql);
    }
}
?>
