<?php

require_once "sesioa.php";
require_once "../modeloak/banatzailea.php";
require_once "../modeloak/paketea.php";
require_once "dbKonexioa.php";

$sesioa = Sesioa::getInstantzia();
  $banatzailea = $sesioa->lortuBanatzailea();

  $konexioa = new dbKonexioa();
  $paketeak = $konexioa->lortuBanatzailearenPaketeak($banatzailea->id);
  $paketeakJson = [];
  
  //if honek get patizio bat iristen bazaio orrialde honi datuak banatzailearen paketen datuak json moduan pasatzen ditu
if (isset($_GET["paketeak"])) {
  while ($paketeaData = $paketeak->fetch_assoc()) {
  
    $paketea = new Paketea($paketeaData['id'], 
    $paketeaData['entrega_egin_beharreko_data'], 
    $paketeaData['hartzailea'], 
    $paketeaData['dimensioak'], 
    $paketeaData['hauskorra'], 
    $paketeaData['helburua'], 
    $paketeaData['jatorria'], 
    $paketeaData['entregatzen'],
    $paketeaData['Banatzailea_id']);
  
    array_push($paketeakJson,$paketea);
  }

echo json_encode($paketeakJson);
}
// banatzailearen datuak aktualizatzeko metodoa
if (isset($_GET["datuak"])) {
  $entregatubearrekoak = 0;
  while ($paketeaData = $paketeak->fetch_assoc()) {
    $entregatubearrekoak++;
  }

  $banatzaileaData = $konexioa->lortuBanatzailea($banatzailea->id);
  $banatzailea = new Banatzailea($banatzaileaData);
  $sesioa->gordeBanatzailea($banatzailea);

  $inzidentziak = $konexioa->lortuPaketenInzidentziak($banatzailea->id);

  $json = array($banatzailea->entregak, $entregatubearrekoak, $inzidentziak, $banatzailea->beranduEntregak);
  echo json_encode($json);
}

