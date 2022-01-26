let valtozo = "asd"
fetch('http://zarodolgozat.test/db_muveletek/select_foglalasok.php?action='+valtozo+'')
    .then(x => x.json())
    .then(y => tabla(y));

function tabla(adatok){
    console.log(adatok);
    let sz="";

    for (let elem of adatok) {
        sz+='<tr>';
        sz+='<td>';
        sz+=''+elem.reservations_id+'';
        sz+='</td>';
        sz+='<td>';
        sz+=''+elem.cars_brand+' '+elem.cars_model+'';
        sz+='</td>';
        sz+='<td>';
        sz+=''+elem.reservations_from+'';
        sz+='</td>';
        sz+='<td>';
        sz+=''+elem.reservations_to+'';
        sz+='</td>';

        sz+='<td>';
        let kezdodatum = new Date(elem.reservations_from);
        let vegedatum = new Date(elem.reservations_to);
        let ma = new Date();
        let maidatum = ma.getFullYear() + '-' + ('0' + (ma.getMonth()+1)).slice(-2) + '-' + ('0' + ma.getDate()).slice(-2);

        console.log(kezdodatum, vegedatum, maidatum);
        if(maidatum >= kezdodatum && maidatum <= vegedatum)
            sz+='AKTÍV';
        else
            sz+='INAKTÍV';

        sz+='</td>';
        //sz+='<td>';
        //sz+='<a href="./xdb_muveletek/delete_auto.php?id='+elem.autok_id+'"><button type="button" class="btn btn-outline-danger btn-sm" style="width: 100px;">Jármű törlése</button></a>';
        //sz+='</td>';
        sz+='</tr>';
    }
    document.getElementById("adatok").innerHTML=sz;
}