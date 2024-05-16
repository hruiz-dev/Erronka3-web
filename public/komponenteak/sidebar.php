<?php

require_once "kontrolatzaileak/sesioa.php";
/**
 * Funtzio honek sidebar html komponetea bueltatzen du
 * @param string $aktiboa aktibo dagoen orriaren izena pasa behar da
 */
function sidebar($aktiboa) {
  $sesioa =  Sesioa::getInstantzia();
  $banatzailea = $sesioa->lortuBanatzailea();
  $erabiltzailea = $banatzailea->izena . " " . $banatzailea->abizena;


  $orriak = [array("Hasiera","main.php", '<i class="bi bi-speedometer"></i>'),
   array("Nire paketeak", "nirePaketeak.php", '<i class="bi bi-box-seam"></i>'),
   array("Inzidentziak", "inzidentziak.php", '<i class="bi bi-exclamation-triangle"></i>'),
   array("Historiala", "historiala.php", '<i class="bi bi-table"></i>')];
  $menua = "";

  foreach ($orriak as $orria) {
    $klasea = $aktiboa;
    $klasea == $orria[1] ? $klasea = 'class="nav-link text-white active"' : $klasea = 'class="nav-link text-white"';
    $menua .= <<<HTML
      <li class="nav-item">
            <a href="{$orria[1]}" {$klasea} aria-current="page">
              {$orria[2]}
              {$orria[0]}
            </a>
          </li>
    HTML;
  }
    return <<<HTML
    <div class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark" style="width: 280px;">
        <a href="main.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
          <img src="resources/img/empresaLogo.png" class="mr-4" width="20%" style="margin-right: 15px" alt="">
          <span class="fs-4 ml-4">pakAG</span>
        </a>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
          $menua
        </ul>
        <hr>
        <div class="dropdown">
          <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="resources/img/user-icon-argia.png" alt="" width="32" height="32" class="rounded-circle me-2">
            <strong>$erabiltzailea</strong>
          </a>
          <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
            <li><a class="dropdown-item" href="#">Inzidentzia berria</a></li>
            <li><a class="dropdown-item" href="#">Ezarpenak</a></li>
            <li><a class="dropdown-item" href="#">Nire erabiltzailea</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="kontrolatzaileak/saioaItxi.php">Saioa itxi</a></li>
          </ul>
        </div>
      </div>

    HTML;
}