<?php

require_once "kontrolatzaileak/sesioa.php";
/**
 * Funtzio honek sidebar html komponetea bueltatzen du
 * @param string $aktiboa aktibo dagoen orriaren izena pasa behar da
 */
function sidebar($aktiboa) {
  $sesioa =  Sesioa::getInstantzia();
  $banatzailea = $sesioa->lortuBanatzailea();
  if($banatzailea==null){
    header("Location: index.php");
  }
  $erabiltzailea = $banatzailea->izena . " " . $banatzailea->abizena;


  $orriak = [array("<span class='nav-item-span'>Hasiera</span>","main.php", '<i class="bi bi-speedometer"></i>'),
   array("<span class='nav-item-span'>Nire paketeak</span>", "nirePaketeak.php", '<i class="bi bi-box-seam"></i>'),
   array("<span class='nav-item-span'>Inzidentziak</span>", "inzidentziak.php", '<i class="bi bi-exclamation-triangle"></i>'),
   array("<span class='nav-item-span'>Historiala</span>", "historiala.php", '<i class="bi bi-table"></i>')];
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
    <div class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark sidebar">
        <a href="main.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
          <img src="resources/img/empresaLogo.png" class="mr-4" width="50px" style="margin-right: 15px" alt="">
          <span class="fs-4 ml-4 sidebar-title">pakAG</span>
        </a>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
          $menua
        </ul>
        <hr>
        <div class="dropdown">
          <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="resources/img/user-icon-argia.png" alt="" width="32" height="32" class="rounded-circle me-2">
            <div class="sidebar-user-name">$erabiltzailea</div>
          </a>
          <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
            <li><a class="dropdown-item" href="kontrolatzaileak/logout.php">Saioa itxi</a></li>
          </ul>
        </div>
      </div>

    HTML;
}