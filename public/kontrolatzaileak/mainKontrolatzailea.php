<?php

require_once "sesioa.php";
require_once "modeloak/banatzailea.php";
require_once "dbKonexioa.php";

$sesioa = new Sesioa();
if ($sesioa->lortuBanatzailea() == null) {
  header('Location: index.php');
}
$banatzailea = $sesioa->lortuBanatzailea();

$konexioa = new dbKonexioa();
$paketeak = $konexioa->lortuBanatzailearenPaketeak($banatzailea->id);

$paketeakHtml = "";

while ($paketeaData = $paketeak->fetch_assoc()) {

  $paketea = new paketea($paketeaData['id'], 
  $paketeaData['entrega_egin_beharreko_data'], 
  $paketeaData['hartzailea'], 
  $paketeaData['dimensioak'], 
  $paketeaData['hauskorra'], 
  $paketeaData['helburua'], 
  $paketeaData['jatorria'], 
  $paketeaData['entregatuta']);

  $paketeakHtml .= sortuPaketeaHtml($paketea);
}


