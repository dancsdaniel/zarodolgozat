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

let allbaddate = [];
let mydates=[];

function modal(id, marka, tipus, gyartaseve, dij){
    allbaddate=[];
    mydates=[];
    document.getElementById("reservebutton").style.display="block";

    let cim = '<p>'+gyartaseve+' '+marka+' '+tipus+' kölcsönzése</p>';
    cim += '<p">['+dij+' kredit/nap] </p>';
    document.getElementById("exampleModalLabel").innerHTML = cim;
    document.getElementById("szamitottdij").innerHTML = null;


    fetch('routes.php?action=reservedDates&id='+id+'')
        .then(x => x.json())
        .then(y => allbaddate=y);

    function DisableDates(date) {
        if (allbaddate!=0){
            var string = jQuery.datepicker.formatDate('yy-mm-dd', date);
            return [allbaddate.indexOf(string) == -1];
        }
        else
            return "null";
    }

    $(function(){
        $.datepicker.setDefaults({
            currentText: 'ma',
            monthNames: ['Január', 'Február', 'Március', 'Április', 'Május', 'Június',
                'Július', 'Augusztus', 'Szeptember', 'Október', 'November', 'December'],
            dayNamesMin: ['V', 'H', 'K', 'Sze', 'Cs', 'P', 'Szo'],
            weekHeader: 'Hé',
            dateFormat: 'yy-mm-dd',
            firstDay: 1,
            onSelect: function(dateText, inst) {
                document.getElementById("napok").value=0;
                isDaysFree();
            },
            isRTL: false,
            showMonthAfterYear: false,
            yearSuffix: ''});
            
        $("#datepicker").datepicker({
            minDate: new Date(),
            beforeShowDay: DisableDates
        });
    })

    let modaltest = '<p> Kölcsönzés kezdete: '
    modaltest+= '<input type="text" class="form-control" id="datepicker" name="from" readonly="readonly"';
    modaltest+= '<br>Kölcsönzés napjainak száma (maximum 14 nap): ';
    modaltest+= '<input type="number" onkeydown="return false" class="form-control" min="1" max="14" value="0" name="days" id="napok" oninput="dijSzamolas(this.value, '+dij+'), isDaysFree()">';

    modaltest+= '<input type="hidden" name="carid" value="'+id+'">';
    modaltest+= '<input type="hidden" name="carprice" value="'+dij+'">';

    document.getElementById("modaltest").innerHTML=modaltest;
}

function isDaysFree(){
    let days = document.getElementById("napok").value;
    let from = new Date(document.getElementById("datepicker").value);

    let newdate = new Date(from.getTime() + (days * 24 * 60 * 60 * 1000) );
    newdate.setUTCHours(0,0,0,0);

    mydates.push(newdate.toISOString().substring(0, 10));
    if(baddate(mydates, allbaddate)){
        document.getElementById("szamitottdij").innerHTML="Hibás időtartam! Az ablak 2 másodperc múlva bezáródik...";
        document.getElementById("reservebutton").style.display="none";
        setTimeout(()=>{document.getElementById("closebutton").click()}, 2000);
    }
}

function baddate(array1, array2) {
    for(let i = 0; i < array1.length; i++) {
        for(let j = 0; j < array2.length; j++) {
            if(array1[i] === array2[j]) {
                return true;
            }
        }
    }
    return false;
}

function dijSzamolas(napok, dij){
    kolcsondija=(napok*dij).toString();
    let sz = 'A kölcsönzés '+kolcsondija+' kreditbe fog kerülni naponta!';
    document.getElementById("szamitottdij").innerHTML = sz;
}