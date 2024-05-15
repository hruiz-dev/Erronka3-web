<?php

require_once "sesioa.php";
require_once "../modeloak/banatzailea.php";
require_once "../modeloak/paketea.php";
require_once "dbKonexioa.php";
require_once "../komponenteak/paketea.php";


$sesioa = Sesioa::getInstantzia();
  $banatzailea = $sesioa->lortuBanatzailea();

  $konexioa = new dbKonexioa();
  $paketeak = $konexioa->lortuBanatzailearenPaketeak($banatzailea->id);
  $paketeakHtml = "";
  
  // paketen informazioa aktualizatzeko metodoa
if (isset($_GET["paketeak"])) {
  while ($paketeaData = $paketeak->fetch_assoc()) {
  
    $paketea = new Paketea($paketeaData['id'], 
    $paketeaData['entrega_egin_beharreko_data'], 
    $paketeaData['hartzailea'], 
    $paketeaData['dimensioak'], 
    $paketeaData['hauskorra'], 
    $paketeaData['helburua'], 
    $paketeaData['jatorria'], 
    $paketeaData['entregatuta']);
  
    $paketeakHtml .= sortuPaketeaHtml($paketea);
  }

echo $paketeakHtml;
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

