<?php

require_once "../kontrolatzaileak/modifikatuPaketeEgoera.php";
require_once "../kontrolatzaileak/sesioa.php";

if (isset($_GET['banatzen'])) {
    banatzenJarri($_GET['id']);
}

if (isset($_GET['entregatuta'])) {
 echo   entregatutaJarri($_GET['id']);
}