export class inzidentzia {

    datua = [];
    lastindex = null;

    /**
     * Funtzi honek inzidetzi baten html kodeal sortzen du
     * @param {*} inzidentzia json bat izidentziaren datuekin 
     * @returns sortutako html kodea
     */
    sortuIzidenzia(inzidentzia) {

        return `
            <a href="#" onclick="window.inzidentziajs.inzidentziaIkusi(${inzidentzia.inzidenzia_kodea})" id="inzidentziaBlock${inzidentzia.inzidenzia_kodea}" class="list-group-item list-group-item-action py-3 px-3 lh-sm" aria-current="true">
                <div class="d-flex w-100 align-items-center justify-content-between">
                    <strong class="mb-1">${inzidentzia.inzidenzia_kodea}</strong>
                    <small>${inzidentzia.entrega_egin_beharreko_data}</small>
                </div>
                <div class="col-10 mb-1 small">${inzidentzia.informazioa}</div>
            </a>
        `;
    }

    /**
     * Metodo honek inzidentzi batean kilik egitean honen datu guztiak erakutsiko ditu
     * @param {*} index izidentziaren kodea
     */
    inzidentziaIkusi(index) {
        const inzidezia = this.datua.find(inzidentzia => inzidentzia.inzidenzia_kodea == index)
        document.getElementById("inzidentziaShowContTitle").innerHTML = inzidezia.inzidenzia_kodea
        document.getElementById("inzidentziaShowContInform").innerHTML = inzidezia.informazioa

        if (this.lastindex != null) { document.getElementById(`inzidentziaBlock${this.lastindex}`).style.background = "rgb(248,249,250)" }

        document.getElementById(`inzidentziaBlock${index}`).style.backgroundColor = "#d9f0ff"
        this.lastindex = index
    }

    /**
     * Metodo honek datubasetik gure banatzailearei dagozkion izidentzia guztiak kargatzen ditu.
     */
    inzidentziakKargatu() {
        const self = this;
        const xhttppaketeak = new XMLHttpRequest();
        xhttppaketeak.onload = function () {
            document.getElementById("inzidentziakCont").innerHTML = ''

            console.log(this.response)
            self.datua = JSON.parse(this.response)

            self.datua.forEach((inzidentzia) => {
                document.getElementById("inzidentziakCont").innerHTML += self.sortuIzidenzia(inzidentzia)
            })

            self.inzidentziaIkusi(self.lastindex)

        };
        xhttppaketeak.open("GET", "http://localhost/routes/inzidentziakLortu.php");
        xhttppaketeak.send();
    }
}