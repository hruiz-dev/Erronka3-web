<?php

require_once "kontrolatzaileak/sesioa.php";
require_once "modeloak/banatzailea.php";
require_once "komponenteak/sidebar.php";

$sesioa = Sesioa::getInstantzia();
if ($sesioa->lortuBanatzailea() == null) {
  header('Location: index.php');
}
  $banatzailea = $sesioa->lortuBanatzailea();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="resources/styles/styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Kontrol panela</title>
</head>
<body>
    <?php echo sidebar("main.php"); ?>
      <div class="hasiera-cont">
        <div class="hasiera-cont-stats">
            <div class="hasiera-cont-stats-ind">
              <div class="hasiera-cont-stats-ind-num" id="banatutako-paketeak"><i class="bi bi-box-seam" style="color:rgb(181, 153, 119)"></i> 25</div>
            </div>
            <div class="hasiera-cont-stats-ind">
              <div class="hasiera-cont-stats-ind-num" id="banatzen-paketeak"><i class="bi bi-play-fill" style="color: rgb(130, 173, 113)"></i> 1</div>
            </div>
            <div class="hasiera-cont-stats-ind">
              <div class="hasiera-cont-stats-ind-num" id="inzidentziak"><i class="bi bi-exclamation-triangle" style="color: rgb(173, 113, 113)"></i> 3</div>
            </div>
            <div class="hasiera-cont-stats-ind">
              <div class="hasiera-cont-stats-ind-num" id="berandu-entregatutakoak"><i class="bi bi-clock-history" style="color:rgb(221, 211, 120)"></i> 8</div>
            </div>
        </div>
        <div class="paketeak-cont" >
          <h2>Paketeak</h2>
          <hr>
          <div id="paketakCont">

          </div>
        </div>
      </div>
</body>
</html>

<script type="module">
  import { datuakKargatu } from "./components.js";
  datuakKargatu();
  setInterval(datuakKargatu, 10000);
  
</script>