<?php
require_once __DIR__ . "/../modeloak/paketea.php";
function sortuPaketeaHtml(Paketea $paketea) {
    return <<<HTML
    <div class="paketeak-ind">
        <div class="paketeak-ind-top">
            <div class="paketeak-ind-top-left">
                {$paketea->helburua}
            </div>
            <div class="paketeak-ind-top-right">
                {$paketea->entragaEginBeharrekoData}
            </div>
            </div>
            <div class="paketeak-ind-center">
            <div class="paketeak-ind-center-left">
                <p><i class="bi bi-geo-alt-fill"></i> {$paketea->jatorria}</p>
                <p><i class="bi bi-person-fill"></i> {$paketea->hartzailea}</p>
                <p><i class="bi bi-box-fill"></i> {$paketea->dimensioak}</p>
            </div>
            <div class="paketeak-ind-center-center">
                <button class="btn btn-primary">Entregatuta markatu</button>
            </div>
        </div>
    </div>
    HTML;
}