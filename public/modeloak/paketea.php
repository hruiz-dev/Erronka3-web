<?php
 class Paketea
{

    function __construct($id, $entragaEginBeharrekoData, $hartzailea, $dimensioak, $hauskorra, $helburua, $jatorria, $entregatuta) {
        $this->id = $id;
        $this->entragaEginBeharrekoData = $entragaEginBeharrekoData;
        $this->hartzailea = $hartzailea;
        $this->dimensioak = $dimensioak;
        $this->hauskorra = $hauskorra;
        $this->helburua = $helburua;
        $this->jatorria = $jatorria;
        $this->entregatuta = $entregatuta;
        
    }
    public $id;
    public $entragaEginBeharrekoData;
    public $hartzailea;
    public $dimensioak;
    public $hauskorra;
    public $helburua;
    public $jatorria;
    public $entregatuta;
}
