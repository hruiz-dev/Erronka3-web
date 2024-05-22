<?php

class Banatzailea {
    
    /**
     * Banatzailea klasearen eraikitzailea.
     * SQL kontsultatik lortutako datuekin objektua sortzen du.
     * 
     * @param array $banatzaileaSql SQL kontsultatik lortutako banatzailearen datuak.
     */
    function __construct($banatzaileaSql) {
        $this->id = $banatzaileaSql['id'];
        $this->izena = $banatzaileaSql['izena'];
        $this->abizena = $banatzaileaSql['abizena'];
        $this->erabiltzailea = $banatzaileaSql['erabiltzailea'];
        $this->pasahitza = $banatzaileaSql['pasahitza'];
        $this->entregak = $banatzaileaSql['entregak'];
        $this->beranduEntregak = $banatzaileaSql['berandu_entregatuta'];
    }

    public $id; // Banatzailearen IDa
    public $izena; // Banatzailearen izena
    public $abizena; // Banatzailearen abizena
    public $erabiltzailea; // Banatzailearen erabiltzaile izena
    public $pasahitza; // Banatzailearen pasahitza
    public $entregak; // Banatzaileak egin dituen entregak
    public $beranduEntregak; // Banatzaileak berandu entregatutakoak
}
?>
