<?php

require_once "sesioa.php";
require_once "../modeloak/banatzailea.php";
require_once "../modeloak/paketea.php";
require_once "dbKonexioa.php";
require_once "../komponenteak/paketea.php";

class InzidentziakKontrolatzailea{

    public static function kargatuInzidentziak(){

        $sesioa = Sesioa::getInstantzia();
        $banatzailea = $sesioa->lortuBanatzailea();

        $konexioa = new dbKonexioa();

        $inzidentziak=$konexioa->lortuBanatzailearenInzidentziak($banatzailea->id);

        echo json_encode($inzidentziak);

    }

}

?>