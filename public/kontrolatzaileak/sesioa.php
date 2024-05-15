<?php

/**
 * Klase honek sesioarekin erlazionaturiko funtzioak gordetzen ditu
 */
class Sesioa {
    
    public function __construct() {
        session_start();
    }

    /**
     * Funtzio honek sesioan gordetako banatailea itzultzen du
     */
    public function lortuBanatzailea() : banatzailea {
        
        return $_SESSION['banatzailea'];
        
    }

    /**
     * Metodo honek banatzailea gordetzen du sesioan
     */
    public function gordeBanatzailea(banatzailea $banatzailea) {
        
        $_SESSION['banatzailea'] = $banatzailea;
        
    }

    public function saioaItxi() {
        session_destroy();
    }
}