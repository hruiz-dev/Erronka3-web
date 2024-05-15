<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="resources/styles/styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Main</title>
</head>
<body>
    <div class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark" style="width: 280px;">
        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
          <img src="resources/img/empresaLogo.png" class="mr-4" width="20%" style="margin-right: 15px" alt="">
          <span class="fs-4 ml-4">pakAG</span>
        </a>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
          <li class="nav-item">
            <a href="#" class="nav-link active" aria-current="page">
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
            <a href="#" class="nav-link text-white">
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
          <li>
            <a href="#" class="nav-link text-white">
              <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#people-circle"></use></svg>
              Customers
            </a>
          </li>
        </ul>
        <hr>
        <div class="dropdown">
          <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="resources/img/user-icon-argia.png" alt="" width="32" height="32" class="rounded-circle me-2">
            <strong>erabiltzailea</strong>
          </a>
          <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
            <li><a class="dropdown-item" href="#">Inzidentzia berria</a></li>
            <li><a class="dropdown-item" href="#">Ezarpenak</a></li>
            <li><a class="dropdown-item" href="#">Nire erabiltzailea</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Saioa itxi</a></li>
          </ul>
        </div>
      </div>
      <div class="hasiera-cont">
        <div class="hasiera-cont-stats">
            <div class="hasiera-cont-stats-ind">
              <div class="hasiera-cont-stats-ind-num"><i class="bi bi-box-seam" style="color:rgb(181, 153, 119)"></i> 25</div>
            </div>
            <div class="hasiera-cont-stats-ind">
              <div class="hasiera-cont-stats-ind-num"><i class="bi bi-play-fill" style="color: rgb(130, 173, 113)"></i> 1</div>
            </div>
            <div class="hasiera-cont-stats-ind">
              <div class="hasiera-cont-stats-ind-num"><i class="bi bi-exclamation-triangle" style="color: rgb(173, 113, 113)"></i> 3</div>
            </div>
            <div class="hasiera-cont-stats-ind">
              <div class="hasiera-cont-stats-ind-num"><i class="bi bi-clock-history" style="color:rgb(221, 211, 120)"></i> 8</div>
            </div>
        </div>
        <div class="paketeak-cont">
          <h2>Paketeak</h2>
          <hr>

          <div class="paketeak-ind">
            <div class="paketeak-ind-top">
              <div class="paketeak-ind-top-left">
                Santa Luzia 17, 20400 Tolosa, Gipuzkoa
              </div>
              <div class="paketeak-ind-top-right">
                14/05/2024
              </div>
            </div>
            <div class="paketeak-ind-center">
              <div class="paketeak-ind-center-left">
                <p><i class="bi bi-geo-alt-fill"></i> Santa Luzia 17, 20400 Tolosa, Gipuzkoa</p>
                <p><i class="bi bi-person-fill"></i> Imanol Zubiaurre</p>
                <p><i class="bi bi-box-fill"></i> 5x20</p>
              </div>
              <div class="paketeak-ind-center-center">
                <button class="btn btn-primary">Entregatuta markatu</button>
              </div>
            </div>
          </div>

          <div class="paketeak-ind">
            <div class="paketeak-ind-top">
              <div class="paketeak-ind-top-left">
                Santa Luzia 17, 20400 Tolosa, Gipuzkoa
              </div>
              <div class="paketeak-ind-top-right">
                14/05/2024
              </div>
            </div>
            <div class="paketeak-ind-center">
              <div class="paketeak-ind-center-left">
                <p><i class="bi bi-geo-alt-fill"></i> Santa Luzia 17, 20400 Tolosa, Gipuzkoa</p>
                <p><i class="bi bi-person-fill"></i> Imanol Zubiaurre</p>
                <p><i class="bi bi-box-fill"></i> 5x20</p>
              </div>
              <div class="paketeak-ind-center-center">
                <button class="btn btn-primary">Entregatuta markatu</button>
              </div>
            </div>
          </div>

        </div>
      </div>
</body>
</html>