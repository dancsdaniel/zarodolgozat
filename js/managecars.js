fetch("routes.php?action=allCar")
    .then(x => x.json())
    .then(y => tabla(y));

function tabla(adatok){
    console.log(adatok);
    let sz="";

    for (let elem of adatok) {
        sz+='<tr>';
        sz+='<td>';
        sz+=''+elem.cars_brand+'';
        sz+='</td>';
        sz+='<td>';
        sz+=''+elem.cars_model+'';
        sz+='</td>';
        sz+='<td>';
        sz+=''+elem.cars_year+'';
        sz+='</td>';
        sz+='<td>';
        sz+='<button data-bs-toogle="modal" data-bs-target="#exampleModal" type="button" onclick="del('+elem.cars_id+')" class="btn btn-outline-danger btn-sm">Jármű törlése</button>';
        sz+='</td>';
        sz+='<td>';
        sz+='<button data-bs-toogle="modal" data-bs-target="#exampleModal" type="button" onclick="find('+elem.cars_id+')" class="btn btn-outline-warning btn-sm">Jármű szerkesztése</button>';
        sz+='</td>';
        sz+='</tr>';
    }
    document.getElementById("adatok").innerHTML=sz;
}

function find(id){
    fetch('routes.php?action=findCar&id='+id+'')
        .then(x => x.json())
        .then(y => edit(y));
}

function del(id){
    document.getElementById("exampleModalLabel").innerHTML="Jármű törlése";

    document.getElementById("edit2").value=2;
    document.getElementById("id2").value=id;

    document.getElementById("inputs").style.display="none";
    document.getElementById("warningmessage").innerHTML="Biztos benne?";

    document.getElementById("modalbutton").click();
}

function edit(cardata){
    console.log(cardata);
    document.getElementById("exampleModalLabel").innerHTML="Jármű szerkesztése";

    for (let elem of cardata) {
        console.log(elem);
        document.getElementById("edit2").value=1;
        document.getElementById("id2").value=elem.cars_id;
        document.getElementById("marka2").value=elem.cars_brand;
        document.getElementById("tipus2").value=elem.cars_model;
        document.getElementById("gyartaseve2").value=elem.cars_year;
        document.getElementById("teljesitmeny2").value=elem.cars_power;
        document.getElementById("ferohely2").value=elem.cars_seats;
        document.getElementById("dij2").value=elem.cars_price;
    }

    document.getElementById("modalbutton").click();
}

function formreset(){
    document.getElementById('inputs').style.display='block';
    document.getElementById('crudform').reset();
    document.getElementById('warningmessage').innerHTML="";
}