fetch("http://zarodolgozat.test/db_muveletek/query_autok.php")
    .then(x => x.json())
    .then(y => tabla(y));

function tabla(adatok){
    console.log(adatok);
    var sz="";
    for (let elem of adatok) {
        sz+='<div class="col" style="margin: 20px; !important">';
        sz+='<div class="card">';
        sz+='<img src="#" class="card-img-top" style="width: 100px;">';
        sz+='<div class="card-body">';
        sz+='<h5 class="card-title"><h6>'+elem.autok_marka+'</h6>'+elem.autok_tipus+'</h5>';
        sz+='<p class="card-text">'+elem.autok_gyartaseve+'</p>';
        sz+='<p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>';
        sz+='</div>';
        sz+='</div>';
    }
    document.getElementById("adatok").innerHTML=sz;
}