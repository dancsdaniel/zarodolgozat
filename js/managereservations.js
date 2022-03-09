fetch("routes.php?action=allCar")
    .then(x => x.json())
    .then(y => tabla(y));

function tabla(adatok){
    console.log(adatok);
    let sz='<option disabled selected value>Válasszon a járművek közül</option>';
    sz+='<option value=0>ÖSSZES FOGLALÁS</option>'

    for (let elem of adatok) {
        sz+='<option value='+elem.cars_id+'>';
        sz+=''+elem.cars_brand+' '+elem.cars_model+'';
        sz+='</option>';
    }
    document.getElementById("cars").innerHTML=sz;
}

function findReservation() {
    let id = document.getElementById("cars").value;
    console.log(id);
    let adatok;
    fetch('routes.php?action=findReservation&id='+id+'')
        .then(x => x.json())
        .then(y => listReservation(y))
}

function listReservation(adatok){
    if (adatok==[]){
        document.getElementById("adatok").innerHTML="Nincs megjeleníthető foglalás!";
    }
    else{
        let sz="";
        for (let elem of adatok) {
            sz+='<tr>';
            sz+='<td>';
            sz+=''+elem.reservations_id+'';
            sz+='</td>';
            sz+='<td>';
            sz+=''+elem.reservations_from+'';
            sz+='</td>';
            sz+='<td>';
            sz+=''+elem.reservations_to+'';
            sz+='</td>';
            sz+='<td>';
            sz+=''+elem.users_fullname+'';
            sz+='</td>';
            sz+='<td>';
            sz+='<td>';
            let kezdodatum = new Date(elem.reservations_from);
            kezdodatum.setHours(0,0,0,0);
            let vegedatum = new Date(elem.reservations_to);
            vegedatum.setHours(0,0,0,0);
            let ma = new Date();
            ma.setHours(0,0,0,0);

            if(ma >= kezdodatum && ma <= vegedatum)
                sz+='AKTÍV';
            else
                sz+='INAKTÍV';        sz+='</td>';
            sz+='<td>';
            sz+='<a href="routes.php?action=delReservation&id='+elem.reservations_id+'"><button type="button" class="btn btn-outline-danger btn-sm" style="width: 100px;">Foglalás törlése</button></a>';
            sz+='</td>';
            sz+='</tr>';
        }
        document.getElementById("adatok").innerHTML=sz;
    }
}