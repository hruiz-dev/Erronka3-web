<?php

require_once "kontrolatzaileak/sesioa.php";
require_once "modeloak/banatzailea.php";
require_once "komponenteak/sidebar.php";
require_once "komponenteak/paketea.php";
// require_once "kontrolatzaileak/mainKontrolatzailea.php";

$sesioa = Sesioa::getInstantzia();
if ($sesioa->lortuBanatzailea() == null) {
  header('Location: index.php');
}
$banatzailea = $sesioa->lortuBanatzailea();

?>

<!DOCTYPE html>
<html lang="eu">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="resources/styles/styles.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <title>Kontrol panela</title>
</head>

<body>
  <?php echo sidebar("historiala.php"); ?>
  <div class="hasiera-cont m-4">
    <h2>Historiala</h2>
    <hr>
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">id</th>
          <th scope="col">Entregatze data</th>
          <th scope="col">Hartzailea</th>
          <th scope="col">Dimesioak</th>
          <th scope="col">Helburua</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">1</th>
          <td>Mark</td>
          <td>Otto</td>
          <td>@mdo</td>
          <td>@mdo</td>
        </tr>
        <tr>
          <th scope="row">2</th>
          <td>Jacob</td>
          <td>Thornton</td>
          <td>@fat</td>
          <td>@mdo</td>
        </tr>
        <tr>
          <th scope="row">3</th>
          <td>Larry</td>
          <td>the Bird</td>
          <td>@twitter</td>
          <td>@mdo</td>
        </tr>
      </tbody>
    </table>
  </div>
</body>

</html>

<script>
  datuakKargatu();
  setInterval(datuakKargatu, 10000);
  function datuakKargatu() {

    const xhttppaketeak = new XMLHttpRequest();
    xhttppaketeak.onload = function () {
      document.getElementById("paketeakCont").innerHTML =
        this.response;
    }
    xhttppaketeak.open("GET", "kontrolatzaileak/paketeakDinamikoki.php?paketeak=true");
    xhttppaketeak.send();

    const xhttpBanatzaileDatuak = new XMLHttpRequest();
    xhttpBanatzaileDatuak.onload = function () {
      const datuak = JSON.parse(this.response);
      document.getElementById("banatutako-paketeak").innerHTML = "<i class='bi bi-box-seam' style='color:rgb(181, 153, 119)'></i> " + datuak[0];
      document.getElementById("banatzen-paketeak").innerHTML = "<i class='bi bi-play-fill' style='color: rgb(130, 173, 113)'></i> " + datuak[1];
      document.getElementById("inzidentziak").innerHTML = "<i class='bi bi-exclamation-triangle' style='color: rgb(173, 113, 113)'></i> " + datuak[2];
      document.getElementById("berandu-entregatutakoak").innerHTML = "<i class='bi bi-clock-history' style='color:rgb(221, 211, 120)'></i> " + datuak[3];
    }
    xhttpBanatzaileDatuak.open("GET", "kontrolatzaileak/paketeakDinamikoki.php?datuak=true");
    xhttpBanatzaileDatuak.send();
  }
</script>