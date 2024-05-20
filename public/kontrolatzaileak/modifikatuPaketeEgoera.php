<?php

require_once "sesioa.php";
require_once "dbKonexioa.php";

$sesioa = Sesioa::getInstantzia();
if ($sesioa->lortuBanatzailea() == null) {
  header('Location: index.php');
}

function banatzenJarri($id) {
    $konexioa = new dbKonexioa();
    $konexioa->paketeaBanatzenJarri($id);
}

function entregatutaJarri($id) {
    $konexioa = new dbKonexioa();
    $konexioa->paketeaEntregatutaJarri($id);
    return "OK";
}