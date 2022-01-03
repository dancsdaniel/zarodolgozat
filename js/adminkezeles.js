fetch("http://zarodolgozat.test/db_muveletek/select_adminok.php")
    .then(x => x.json())
    .then(y => tabla(y));

function tabla(adatok){
    console.log(adatok);
    let sz="";

    for (let elem of adatok) {
        sz+='<p>';
        sz+=''+elem.felhasznalok_teljesnev+'';
        sz+=''+elem.felhasznalok_email+'';
        sz+='<button type="button" class="btn btn-outline-danger btn-sm" style="width: 100px;" onclick=torles("'+elem.felhasznalok_email+'")>Admin jog törlése</button>';
        sz+='</p>';
    }
    document.getElementById("adatok").innerHTML=sz;
}

torles=(nev)=>{
    alert(nev);
}