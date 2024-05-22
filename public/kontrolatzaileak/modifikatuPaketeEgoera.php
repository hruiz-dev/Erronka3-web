<?php

require_once "sesioa.php";
require_once "dbKonexioa.php";

// Sesioaren instantzia lortzen du
$sesioa = Sesioa::getInstantzia();

// Banatzailea sesioan ez badago, index orrira birbideratzen du
if ($sesioa->lortuBanatzailea() == null) {
    header('Location: index.php');
}

/**
 * Pakete bat banatzen jartzen du bere ID erabiliz.
 * 
 * @param int $id Paketearen IDa.
 */
function banatzenJarri($id) {
    $konexioa = new dbKonexioa();
    $konexioa->paketeaBanatzenJarri($id);
}

/**
 * Pakete bat entregatuta jartzen du bere ID erabiliz eta "OK" mezua itzultzen du.
 * 
 * @param int $id Paketearen IDa.
 * @return string "OK" mezua.
 */
function entregatutaJarri($id) {
    $konexioa = new dbKonexioa();
    $konexioa->paketeaEntregatutaJarri($id);
    return "OK";
}
?>
