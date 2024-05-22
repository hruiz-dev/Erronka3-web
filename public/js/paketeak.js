/**
 * Funtzio honek get petizio ba tegiten du gure php kontrolatzaileari eta bertatik gure banatzailearen paketeak ateratzen ditugu
 */
function datuakKargatu() {
    return new Promise((resolve, reject) => {
        const xhttppaketeak = new XMLHttpRequest();
        xhttppaketeak.onload = function () {
            if (this.status >= 200 && this.status < 300) {
                resolve(JSON.parse(this.response));
            } else {
                reject(new Error(this.statusText));
            }
        };
        xhttppaketeak.onerror = function () {
            reject(new Error("Network Error"));
        };
        xhttppaketeak.open("GET", "kontrolatzaileak/paketeakDinamikoki.php?paketeak=true");
        xhttppaketeak.send();
    });
}

export function paketeDatuakKargatu() {

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

export function sortuPaketaHtml() {
    let html = "";
    datuakKargatu().then(array => {
        // Haz algo con el array
        array.forEach(element => {
            if (element.entregatzen == 1) {
                html += sortuPaketea(element, "Entregatuta markatu");
            } else {
                html2 += sortuPaketea(element);
            }
        });
        document.getElementById("paketeakCont").innerHTML = html;
    })
    

}

/**
 * Funtzio honek paketearen datuak erabiliz html elemetu bat sortzen du
 * @param {*} json paketearen datuekin jsona
 * @returns html-a textu formatuan
 */
function sortuPaketea(json, action = "Banatzen Jarri") {
    let paketeakInd = document.createElement('div');
    paketeakInd.className = 'paketeak-ind';
    let button = "";

    if (action == "Entregatuta markatu") {
        button = `<button class="btn btn-primary" onclick="entregatutaMarkatu(${json.id})">${action}</button>`;
   } else {
        button = `<button class="btn btn-primary" onclick="banatzenJarri(${json.id})">${action}</button>`;
   }

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
                ${button}
            </div>
        </div>
    `;

    return paketeakInd.outerHTML;
}

export function erakutsiBanatzenPaketeak() {
    datuakKargatu().then(array => {
        let html = "";
        let html2 = "";
        array.forEach(element => {
            if (element.entregatzen == 1) {
                html += sortuPaketea(element, "Entregatuta markatu");
            } else {
                html2 += sortuPaketea(element);
            }
        });
        document.getElementById("esleituGabekoak").innerHTML = html;
        document.getElementById("paketeakCont").innerHTML = html2;
        
    })
}