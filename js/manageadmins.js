fetch("routes.php?action=allAdmin")
    .then(x => x.json())
    .then(y => tabla(y));

function tabla(adatok){
    console.log(adatok);
    let sz="";

    for (let elem of adatok) {
        sz+='<tr>';
        sz+='<td>';
        sz+=''+elem.users_fullname+'';
        sz+='</td>';
        sz+='<td>';
        sz+=''+elem.users_email+'';
        sz+='</td>';
        sz+='<td>';
        sz+='<a href="routes.php?action=toUser&email='+elem.users_email+'"><button type="button" class="btn btn-outline-danger btn-sm" style="width: 100px;">Admin jog törlése</button></a>';
        sz+='</td>';
        sz+='</tr>';
    }
    document.getElementById("adatok").innerHTML=sz;
}