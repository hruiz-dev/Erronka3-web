<?php

/**
 * Klase honek sesioarekin erlazionaturiko funtzioak gordetzen ditu
 */
class Sesioa {

    private static Sesioa $instantzia;
    
    private function __construct() {
        session_start();
    }

    /**
     * Funtzio honek sesioaren instantzia itzultzen du
     */
    public static function getInstantzia() : Sesioa {
        if (!isset(self::$instantzia)) {
            self::$instantzia = new Sesioa();
        }
        return self::$instantzia;
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