fetch('routes.php?action=myReservation')
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
        kezdodatum.setHours(0,0,0,0);
        let vegedatum = new Date(elem.reservations_to);
        vegedatum.setHours(0,0,0,0);
        let ma = new Date();
        ma.setHours(0,0,0,0);

        if(ma >= kezdodatum && ma <= vegedatum)
            sz+='<span style="color: green">AKTÍV</span>';
        //if(kezdodatum>ma)
            //sz+='<span style="color: yellow">JÖVŐBELI</span>';
        else
            sz+='<span style="color: red">LEJÁRT</span>';
    }
    document.getElementById("adatok").innerHTML=sz;
}