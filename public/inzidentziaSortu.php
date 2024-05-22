<?php

require_once "kontrolatzaileak/sesioa.php";
require_once "modeloak/banatzailea.php";

$sesioa = Sesioa::getInstantzia();
if ($sesioa->lortuBanatzailea() == null) {
  header('Location: index.php');
}



require_once "komponenteak/sidebar.php";

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
  <?php echo sidebar("inzidentziaSortu.php"); ?>

  <div class="hasiera-cont" style="padding: 40px">
    <h2 id="pageTitle">Inzidentzia berria</h2>
    <hr>
    <form class="row g-3" action="routes/inzidentziaBerria.php" method="POST">
      <div class="col-md-6">
        <label for="inputPaketea" class="form-label">Paketea</label>
        <select id="inputPaketea" name="inputPaketea" class="form-select">
          <option selected>Paketea aukeratu...</option>
          <option>...</option>
        </select>
      </div>
      <div class="col-md-6">
        <label for="inputIzenburua" class="form-label">Izenburua</label>
        <input type="text" class="form-control" id="inputIzenburua" name="inputIzenburua" onkeyup="tituluaAldatu()" placeholder="Inzidentziaren izenburua adierazi">
      </div>
      <div class="col-12">
        <label for="inputAzalpena" class="form-label">Azalpena</label>
        <textarea class="form-control" id="inputAzalpena" name="inputAzalpena" rows="10"></textarea>
      </div>
      <div class="col-12">
        <button type="submit" class="btn btn-primary">Gorde</button>
      </div>
    </form>
  </div>
  </body>

</html>

<script>
  getPaketeak()
  function tituluaAldatu(){
    text=document.getElementById("inputIzenburua").value
    document.getElementById("pageTitle").innerHTML=""
    document.getElementById("pageTitle").innerHTML=text
  }

  function getPaketeak(){
    const xhttpBanatzaileDatuak = new XMLHttpRequest();
    xhttpBanatzaileDatuak.onload = function () {

        const datuak = JSON.parse(this.response);
        datuak.forEach(paketea =>{
          document.getElementById("inputPaketea").innerHTML=`<option value="${paketea.id}">${paketea.helburua}</option>`
        })
    }
    xhttpBanatzaileDatuak.open("GET", "kontrolatzaileak/paketeakDinamikoki.php?paketeak=true");
    xhttpBanatzaileDatuak.send();
  }
</script>