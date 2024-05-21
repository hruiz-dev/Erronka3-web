<?php

require_once "sesioa.php";
require_once "../modeloak/banatzailea.php";
require_once "../modeloak/paketea.php";
require_once "dbKonexioa.php";

class HistorialaKontrolatzailea{

    /**
     * Funtzi honek entregatutako pakete guztiak json formatuan itzultze ditu
     */
    public static function kargatuHistoriala(){

        $sesioa = Sesioa::getInstantzia();
        $banatzailea = $sesioa->lortuBanatzailea();

        $konexioa = new dbKonexioa();

        $historiala=$konexioa->lortuBanatzailearenHistoriala($banatzailea->id);
        echo json_encode($historiala);

    }

}