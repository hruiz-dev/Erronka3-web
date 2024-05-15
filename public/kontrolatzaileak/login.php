<?php
require_once "sesioa.php";
require_once "dbKonexioa.php";
require_once "../modeloak/banatzailea.php";

$sesioa = new sesioa();

$konexia = new dbKonexioa();

$erabiltzailea = $_POST['erabiltzailea'];
$pasahitza = $_POST['pasahitza'];

$banatzaileaSql = $konexia->login($erabiltzailea, $pasahitza);


if ($banatzaileaSql != null) {
    $banatzailea = Banatzailea::sortuBanatzailea($banatzaileaSql);
    $sesioa->gordeBanatzailea($banatzailea);
    header('Location: ../main.php');
} else {
    header('Location: ../index.php?errorea=Erabiltzailea edo pasahitza okerra');
}

