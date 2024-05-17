/**
 * Funtzi honek get petizio ba tegiten du gure php kontrolatzaileari eta bertatik gure banatzailearen paketeak ateratzen ditugu
 */
export function datuakKargatu() {

    const xhttppaketeak = new XMLHttpRequest();
    xhttppaketeak.onload = function () {
        let array = JSON.parse(this.response);
        let html = "";
        array.forEach(element => {
            html += sortuPaketea(element);
        });
        document.getElementById("paketeakCont").innerHTML = html;
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

/**
 * Funtzi honek paketearen datuak erabiliz html elemetu bat sortzen du
 * @param {*} json paketearen datuekin jsona
 * @returns html-a textu formatuan
 */
function sortuPaketea(json) {
    let paketeakInd = document.createElement('div');
    paketeakInd.className = 'paketeak-ind';


    paketeakInd.innerHTML = `
        <div class="paketeak-ind-top">
            <div class="paketeak-ind-top-left">
                ${json.helburua}
            </div>
            <div class="paketeak-ind-top-right">
                ${json.entragaEginBeharrekoData}
            </div>
        </div>
        <div class="paketeak-ind-center">
            <div class="paketeak-ind-center-left">
                <p><i class="bi bi-geo-alt-fill"></i> ${json.jatorria}</p>
                <p><i class="bi bi-person-fill"></i> ${json.hartzailea}</p>
                <p><i class="bi bi-box-fill"></i> ${json.dimensioak}</p>
            </div>
            <div class="paketeak-ind-center-center">
                <button class="btn btn-primary">Entregatuta markatu</button>
            </div>
        </div>
    `;

    // Devolver el elemento creado
    return paketeakInd.outerHTML;
}