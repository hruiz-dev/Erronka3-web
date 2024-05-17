<?php
 class Inzidentzia
{

    function __construct($inzidentziaKodea, $informazioa) {
        $this->inzidentziaKodea = $inzidentziaKodea;
        $this->informazioa = $informazioa;
    }
    
    public $inzidentziaKodea;
    public $informazioa;
}
