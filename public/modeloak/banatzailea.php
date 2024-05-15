<?php

class Banatzailea {

    function __construct($banatzaileaSql) {
        $this->id = $banatzaileaSql['id'];
        $this->izena = $banatzaileaSql['izena'];
        $this->abizena = $banatzaileaSql['abizena'];
        $this->erabiltzailea = $banatzaileaSql['erabiltzailea'];
        $this->pasahitza = $banatzaileaSql['pasahitza'];
        $this->entregak = $banatzaileaSql['entregak'];
        $this->beranduEntregak = $banatzaileaSql['berandu_entregatuta'];
    }
    public $id;
    public $izena;
    public $abizena;
    public $erabiltzailea;
    public $pasahitza;
    public $entregak;
    public $beranduEntregak;
}