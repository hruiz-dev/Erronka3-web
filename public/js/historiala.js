export class historiala {

    datua = [];


    sortuLerroa(paketea) {

        return `
        <tr>
            <th scope="row">${paketea.id}</th>
            <td>${paketea.hartzailea}</td>
            <td>${paketea.dimensioak}</td>
            <td>${paketea.helburua}</td>
            <td>${paketea.jatorria}</td>
            <td>${paketea.entrega_egin_beharreko_data}</td>
            <td>${paketea.entregatze_data}</td>
        </tr>
        `;
    }

    /**
         * Metodo honek datubasetik gure banatzailearei dagozkion izidentzia guztiak kargatzen ditu.
         */
    historialaKargatu() {
        const self = this;
        const xhttppaketeak = new XMLHttpRequest();
        xhttppaketeak.onload = function () {
            document.getElementById("historialaTBody").innerHTML = ''

            self.datua = JSON.parse(this.response)

            self.datua.forEach((paketea) => {
                document.getElementById("historialaTBody").innerHTML += self.sortuLerroa(paketea)
            })


        };
        xhttppaketeak.open("GET", "http://localhost/routes/historialaLortu.php");
        xhttppaketeak.send();
    }
}