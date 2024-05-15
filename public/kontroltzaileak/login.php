<?php
$sesioa = new sesioa();

$konexia = new dbKonexioa();

$erabiltzailea = $_POST['erabiltzailea'];
$pasahitza = $_POST['pasahitza'];

$banatzaileaSql = $konexia->login($erabiltzailea, $pasahitza);

$banatzailea = banatzailea::sortuBanatzailea($banatzaileaSql);

if ($banatzailea != null) {
    $sesioa->gordeBanatzailea($banatzailea);
    header('Location: ../dashboard.php');
} else {
    header('Location: ../index.php?errorea=Erabiltzailea edo pasahitza okerra');
}

