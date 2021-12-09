fetch("http://zarodolgozat.test/db_muveletek/query_autok.php")
    .then(x => x.json())
    .then(y => tabla(y));

function tabla(adatok){
    console.log(adatok);
    let sz="";

    for (let elem of adatok) {
        sz+='<div class="card" style="width:400px;">';
            sz+='<img class="card-img-top" src="./kepek/'+elem.autok_kep+'">';
                sz+='<div class="card-body">';
                    sz+='<h6 class="card-title">'+elem.autok_marka+' '+elem.autok_tipus+'</h6>';
                    sz+='<li class="card-text">Gyártás éve: '+elem.autok_gyartaseve+'</li>';
                    sz+='<li class="card-text">Teljesítmény: '+elem.autok_teljesitmeny+'</li>';
                    sz+='<li class="card-text">Férőhelyek: '+elem.autok_ferohely+'</li>';
                    sz+='<li class="card-text">Bérlés napidíja: '+elem.autok_dij+' kredit</li>';
                    sz+='<a href="#" class="btn btn-success" style="margin-top: 10px;">Autó foglalása</a>';
                sz+='</div>';
        sz+='</div>';
    }
    document.getElementById("adatok").innerHTML=sz;
}