<?php
require_once "sesioa.php";

// Sesioaren instantzia lortzen du
$sesioa = Sesioa::getInstantzia();

$sesioa->saioaItxi();

header("Location: ../index.php");
?>
