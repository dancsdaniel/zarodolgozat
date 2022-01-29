fetch("routes.php?action=allCar")
    .then(x => x.json())
    .then(y => tabla(y));

function tabla(adatok){
    console.log(adatok);
    let sz="";

    for (let elem of adatok) {
        sz+='<div class="card">';
            sz+='<img class="card-img-top" src="./pictures/'+elem.cars_picture+'"">';
                sz+='<div class="card-body">';
                    sz+='<h3 class="card-title">'+elem.cars_brand+' '+elem.cars_model+'</h6>';
                    sz+='<li class="card-text">Gyártás éve: '+elem.cars_year+'</li>';
                    sz+='<li class="card-text">Teljesítmény: '+elem.cars_power+'</li>';
                    sz+='<li class="card-text">Férőhelyek: '+elem.cars_seats+'</li>';
                    sz+='<button type="button" onclick="modal(\''+elem.cars_id+'\',\''+elem.cars_brand+'\',\''+elem.cars_model+'\',\''+elem.cars_year+'\', '+elem.cars_price+')" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"> Autó foglalása: '+elem.cars_price+' kredit  </button>'
                sz+='</div>';
        sz+='</div>';
    }
    document.getElementById("adatok").innerHTML=sz;
}

function modal(id, marka, tipus, gyartaseve, dij){
    let cim = '<p>'+gyartaseve+' '+marka+' '+tipus+' kölcsönzése</p>';
    cim += '<p">['+dij+' kredit/nap] </p>';
    document.getElementById("exampleModalLabel").innerHTML = cim;
    document.getElementById("szamitottdij").innerHTML = null;

    let modaltest = '<p> Kölcsönzés kezdete: '
    modaltest+= '<input type="date" class="form-control" id="start" name="from" value="'+maiDatum()+'" min="'+maiDatum()+'">';
    modaltest+= '<br>Kölcsönzés napjainak száma (maximum 14 nap): ';
    modaltest+= '<input type="number" class="form-control" min="1" max="14" value="0" name="days" id="napok" oninput="dijSzamolas(this.value, '+dij+')">';
    modaltest+= '<input type="hidden" name="carid" value="'+id+'">';
    modaltest+= '<input type="hidden" name="carprice" value="'+dij+'">';

    document.getElementById("modaltest").innerHTML=modaltest;
}

function maiDatum(){
    let ma = new Date();
    let maidatum = ma.getFullYear() + '-' + ('0' + (ma.getMonth()+1)).slice(-2) + '-' + ('0' + ma.getDate()).slice(-2);

    return maidatum;
}

function dijSzamolas(napok, dij){
    kolcsondija=(napok*dij).toString();

    let sz = 'A kölcsönzés '+kolcsondija+' kreditbe fog kerülni naponta!';
    document.getElementById("szamitottdij").innerHTML = sz;
}