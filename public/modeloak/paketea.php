<?php
class Paketea
{
    /**
     * Paketea klasearen eraikitzailea.
     * Paketearen ezaugarri guztiak jasotzen ditu.
     * 
     * @param int $id Paketearen IDa.
     * @param string $entragaEginBeharrekoData Paketearen entrega data.
     * @param string $hartzailea Paketearen hartzailea.
     * @param string $dimensioak Paketearen dimentsioak.
     * @param bool $hauskorra Paketearen hauskortasuna.
     * @param string $helburua Paketearen helburua.
     * @param string $jatorria Paketearen jatorria.
     * @param bool $entregatzen Paketearen entregatze egoera.
     * @param int $banatzaileaId Paketearen banatzailearen IDa.
     */
    function __construct($id, $entragaEginBeharrekoData, $hartzailea, $dimensioak, $hauskorra, $helburua, $jatorria, $entregatzen, $banatzaileaId) {
        $this->id = $id;
        $this->entragaEginBeharrekoData = $entragaEginBeharrekoData;
        $this->hartzailea = $hartzailea;
        $this->dimensioak = $dimensioak;
        $this->hauskorra = $hauskorra;
        $this->helburua = $helburua;
        $this->jatorria = $jatorria;
        $this->entregatzen = $entregatzen;
        $this->banatzaileaId = $banatzaileaId;
    }

    public $id; // Paketearen IDa
    public $entragaEginBeharrekoData; // Paketearen entrega data
    public $hartzailea; // Paketearen hartzailea
    public $dimensioak; // Paketearen dimentsioak
    public $hauskorra; // Paketearen hauskortasuna
    public $helburua; // Paketearen helburua
    public $jatorria; // Paketearen jatorria
    public $entregatzen; // Paketearen entregatze egoera
    public $banatzaileaId; // Paketearen banatzailearen IDa
}
?>
