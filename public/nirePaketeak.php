<?php

require_once "kontrolatzaileak/sesioa.php";
require_once "modeloak/banatzailea.php";

$sesioa = Sesioa::getInstantzia();
if ($sesioa->lortuBanatzailea() == null) {
  header('Location: index.php');
}



require_once "komponenteak/sidebar.php";
require_once "komponenteak/paketea.php";

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
  <?php echo sidebar("nirePaketeak.php"); ?>

  <div class="hasiera-cont" style="margin-top: 40px">
    <div class="paketeak-cont">
      <h2>Banatu beharreko paketeak</h2>
      <hr>
      <div id="paketeakCont" class="paketeak-list">

      </div>
      <br>
    </div>
    <div class="hasiera-cont" style="margin-top: 40px">
      <div class="paketeak-cont">
        <h2>Banatzen hari naizen paketeak</h2>
        <hr>
        <div id="esleituGabekoak" class="paketeak-list">

        </div>
      </div>
</body>

</html>

<script type="module">
  import { datuakKargatu } from './js/paketeak.js';
  datuakKargatu();
  setInterval(datuakKargatu, 10000);

</script>