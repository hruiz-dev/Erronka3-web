<?php

class Banatzailea {
    public $id;
    public $izena;
    public $abizena;
    public $erabiltzailea;
    public $pasahitza;
    public $entregak;
    public $beranduEntregak;

    public static function sortuBanatzailea($banatzaileaSql) : banatzailea {
        $banatzailea = new banatzailea();
        $banatzailea->id = $banatzaileaSql['id'];
        $banatzailea->izena = $banatzaileaSql['izena'];
        $banatzailea->abizena = $banatzaileaSql['abizena'];
        $banatzailea->erabiltzailea = $banatzaileaSql['erabiltzailea'];
        $banatzailea->pasahitza = $banatzaileaSql['pasahitza'];
        $banatzailea->entregak = $banatzaileaSql['entregak'];
        $banatzailea->beranduEntregak = $banatzaileaSql['berandu_entregatuta'];
        return $banatzailea;
    }
}