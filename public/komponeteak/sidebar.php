<?php

/**
 * Sidebar Komponentea sortzeko erabiltzen den funtzioa
 */
function sidebar(string $erabiltzailea = "Erabiltzailea") {
    return <<<HTML
    <div class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark" style="width: 280px;">
        <a href="main.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
          <img src="resources/img/empresaLogo.png" class="mr-4" width="20%" style="margin-right: 15px" alt="">
          <span class="fs-4 ml-4">pakAG</span>
        </a>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
          <li class="nav-item">
            <a href="main.php" class="nav-link active" aria-current="page">
              <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#home"></use></svg>
              Hasiera
            </a>
          </li>
          <li>
            <a href="#" class="nav-link text-white">
              <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#speedometer2"></use></svg>
              Nire paketeak
            </a>
          </li>
          <li>
            <a href="inzidentziak.php" class="nav-link text-white">
              <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#table"></use></svg>
              Inzidentziak
            </a>
          </li>
          <li>
            <a href="#" class="nav-link text-white">
              <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#grid"></use></svg>
              Historiala
            </a>
          </li>
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