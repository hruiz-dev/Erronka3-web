/**
 * Paketea datubasean banatzen estadoan jartzen du
 * @param {*} id  Paketearen id-a
 */
export function jarriBanatzen(id) {
    const xhttppaketeak = new XMLHttpRequest();
    xhttppaketeak.open("GET", "routes/paketakAdministratu.php?banatzen=true&id=" + id);
    xhttppaketeak.send();
    console.log(xhttppaketeak);
}

/**
 * Paketea datubasean entregatuta estadoan jartzen du
 * @param {*} id  Paketearen id-a
 */
export function markatuEntregatuta(id) {
    const xhttppaketeak = new XMLHttpRequest();
    xhttppaketeak.open("GET", "routes/paketakAdministratu.php?entregatuta=true&id=" + id);
    xhttppaketeak.send();
    console.log(xhttppaketeak);
}