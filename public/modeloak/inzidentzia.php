<?php
class Inzidentzia
{
    /**
     * Inzidentzia klasearen eraikitzailea.
     * Inzidentziaren kodea eta informazioa jasotzen ditu.
     * 
     * @param int $inzidentziaKodea Inzidentziaren kodea.
     * @param string $informazioa Inzidentziaren informazioa.
     */
    function __construct($inzidentziaKodea, $informazioa) {
        $this->inzidentziaKodea = $inzidentziaKodea;
        $this->informazioa = $informazioa;
    }

    public $inzidentziaKodea; // Inzidentziaren kodea
    public $informazioa; // Inzidentziaren informazioa
}
?>
