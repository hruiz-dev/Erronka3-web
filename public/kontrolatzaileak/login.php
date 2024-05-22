<?php
require_once "sesioa.php";
require_once "dbKonexioa.php";
require_once "../modeloak/banatzailea.php";

// Sesioaren instantzia lortzen du
$sesioa = Sesioa::getInstantzia();

// Datu basearekin konexioa sortzen du
$konexia = new dbKonexioa();

// POST bidez jasotako erabiltzailea eta pasahitza aldagaietan gordetzen ditu
$erabiltzailea = $_POST['erabiltzailea'];
$pasahitza = $_POST['pasahitza'];

// Erabiltzailearekin eta pasahitzarekin login saioa egiten du
$banatzaileaSql = $konexia->login($erabiltzailea, $pasahitza);

// Banatzailea existitzen bada, sesioan gordetzen du eta orri nagusira birbideratzen du
if ($banatzaileaSql != null) {
    $banatzailea = new Banatzailea($banatzaileaSql);
    $sesioa->gordeBanatzailea($banatzailea);
    header('Location: ../main.php');
} else { // Bestela, errore mezuarekin hasierako orrira birbideratzen du
    header('Location: ../index.php?errorea=Erabiltzailea edo pasahitza okerra');
}
?>
