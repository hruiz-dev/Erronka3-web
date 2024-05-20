<?php
require_once "kontrolatzaileak/sesioa.php";
require_once "komponenteak/sidebar.php";
require_once "modeloak/banatzailea.php";
$sesioa = Sesioa::getInstantzia();
if ($sesioa->lortuBanatzailea() == null) {
  header('Location: index.php');
}


?>

<!DOCTYPE html>
<html lang="eus">

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
  <title>Inzidentziak</title>
</head>

<body class="no-scroll">
  <?php echo sidebar("inzidentziak.php"); ?>
  <div class="d-flex flex-column align-items-stretch flex-shrink-0 bg-body-tertiary"
    style="width: 380px; overflow:auto">
    <a href="#"
      class="d-flex align-items-center flex-shrink-0 p-3 link-body-emphasis text-decoration-none border-bottom">
      <span class="fs-5 fw-semibold">Inzidentziak</span>
    </a>
    <div id="inzidentziakCont">

    </div>
  </div>
  </div>
  <div class="inzidentzia-show-cont" id="inzidentziaShowCont">
    <h2 id="inzidentziaShowContTitle">List group item heading</h2>
    <span id="inzidentziaShowContInform">Some placeholder content in a paragraph below the heading and date.</span>
  </div>
</body>

</html>
<script type="module">
  import { inzidentzia } from './js/inzidetziak.js';

  window.inzidentziajs = new inzidentzia();

  inzidentziajs.inzidentziakKargatu();

  setInterval(() => inzidentziajs.inzidentziakKargatu(), 10000);


</script>