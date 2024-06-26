<?php

require_once "sesioa.php";
require_once "../modeloak/banatzailea.php";
require_once "../modeloak/paketea.php";
require_once "dbKonexioa.php";

class InzidentziakKontrolatzailea{

    /**
     * Funtzi honek inzidentzia guztiak json formatuan itzultze ditu
     */
    public static function kargatuInzidentziak(){

        $sesioa = Sesioa::getInstantzia();
        $banatzailea = $sesioa->lortuBanatzailea();

        $konexioa = new dbKonexioa();

        $inzidentziak=$konexioa->lortuBanatzailearenInzidentziak($banatzailea->id);
        echo json_encode($inzidentziak);

    }

    public static function sortuInzidentzia(){
        $paketeaId= $_POST['inputPaketea'];
        $izenburua= $_POST['inputIzenburua'];
        $azalpena= $_POST['inputAzalpena'];
        
        $konexioa = new dbKonexioa();
        $konexioa->sortuInzidentzia($paketeaId, $izenburua, $azalpena);

        header("Location: ../inzidentziak.php"); 
    }

}