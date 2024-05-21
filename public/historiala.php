<?php

require_once "kontrolatzaileak/sesioa.php";
require_once "modeloak/banatzailea.php";
require_once "komponenteak/sidebar.php";
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
          <th scope="col">Hartzailea</th>
          <th scope="col">Dimesioak</th>
          <th scope="col">Helburua</th>
          <th scope="col">Jatorria</th>
          <th scope="col">Entregatu beharreko data</th>
          <th scope="col">Entregatze data</th>
        </tr>
      </thead>
      <tbody id="historialaTBody">
        
      </tbody>
    </table>
  </div>
</body>

</html>

<script type="module">
  import { historiala } from './js/historiala.js';

  window.historialajs = new historiala();

  historialajs.historialaKargatu();

  setInterval(() => historialajs.historialaKargatu(), 10000);

</script>