export class historiala {

    datua = [];
    

    sortuLerroa(paketea) {

        let estiloa = "";

        if(paketea.entregatze_data>paketea.entrega_egin_beharreko_data){
            estiloa=`style="color: red;" title="Berandu entregatua"`
        }
        else{
            estiloa=" "
        }

        return `
        <tr>
            <th scope="row">${paketea.id}</th>
            <td>${paketea.hartzailea}</td>
            <td>${paketea.dimensioak}</td>
            <td>${paketea.helburua}</td>
            <td>${paketea.jatorria}</td>
            <td>${paketea.entrega_egin_beharreko_data}</td>
            <td ${estiloa}>${paketea.entregatze_data}</td>
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