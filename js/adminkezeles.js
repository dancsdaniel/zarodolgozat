fetch("http://zarodolgozat.test/db_muveletek/select_adminok.php")
    .then(x => x.json())
    .then(y => tabla(y));

function tabla(adatok){
    console.log(adatok);
    let sz="";

    for (let elem of adatok) {
        sz+='<tr>';
        sz+='<td>';
        sz+=''+elem.felhasznalok_teljesnev+'';
        sz+='</td>';
        sz+='<td>';
        sz+=''+elem.felhasznalok_email+'';
        sz+='</td>';
        sz+='<td>';
        sz+='<a href="./db_muveletek/update_admintouser.php?email='+elem.felhasznalok_email+'"><button type="button" class="btn btn-outline-danger btn-sm" style="width: 100px;">Admin jog törlése</button></a>';
        sz+='</td>';
        sz+='</tr>';
    }
    document.getElementById("adatok").innerHTML=sz;
}