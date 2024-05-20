<?php
 class Paketea
{

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
    public $id;
    public $entragaEginBeharrekoData;
    public $hartzailea;
    public $dimensioak;
    public $hauskorra;
    public $helburua;
    public $jatorria;
    public $entregatzen;
    public $banatzaileaId;
}
