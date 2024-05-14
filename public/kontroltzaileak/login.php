<?php
$sesioa = new sesioa();

$konexia = new dbKonexioa();

$erabiltzailea = $_POST['erabiltzailea'];
$pasahitza = $_POST['pasahitza'];

$banatzailea = $konexia->login($erabiltzailea, $pasahitza);

if ($banatzailea != null) {
    $sesioa->gordeBanatzailea($banatzailea);
    header('Location: ../dashboard.php');
} else {
    header('Location: ../index.php?errorea=Erabiltzailea edo pasahitza okerra');
}

