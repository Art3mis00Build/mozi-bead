var api_url = "http://localhost/mozi/api/get/getAllVetites.php";

//Székek generálása
function GenChairs(e){
    $('.chairs').empty();
    $.getJSON("http://localhost/mozi/api/get/getAllCustById.php?id="+e.target.id, function(data){
        console.log(data)
        var x = 0
        for (let i = 1; i <= 10; i++) {
            for (let j = 1; j <= 9; j++) {
                tmp = {"sor": i,
                        "oszlop": j}
                if(containsObj(data,tmp) == true){
                    $('<div>').attr('class',"chair foglalt").append(
                        $('<h2>').text(i+":"+j).attr('class','tmp').attr('id',e.target.id)
                    ).attr('sor',i).attr('oszlop',j).attr('fogid',data[x].foglalasid).attr('id',e.target.id).appendTo('.chairs');
                    x++;
                }
                else{
                    $('<div>').attr('class',"chair szabad").append(
                        $('<h2>').text(i+":"+j).attr('class','tmp').attr('sor',i).attr('oszlop',j).attr('id',e.target.id)
                    ).attr('sor',i).attr('oszlop',j).attr('id',e.target.id).attr('fogid',"0").appendTo('.chairs');
                }
            }
        }
    });
}

//Eldönti, hogy egy obj benne van-e a tömbben
function containsObj(list,obj){
    var i;
    for (i = 0; i < list.length; i++) {
        if (list[i].sor === obj.sor && list[i].oszlop == obj.oszlop) {
            return true;
        }
    }
    return false;
}

//Visszaadja a foglalás indexét
function getIndexOfCust(list,obj){
    var i;
    for (i = 0; i < list.length; i++) {
        if (list[i].sor === obj.sor && list[i].oszlop == obj.oszlop) {
            return i;
        }
    }
    return 0;
}

//Bármikor készül egy div ezzel az osztállyal hozzá van kötve ez a függvény
//Foglalást hozunk létre
$(document).on('click','.chair.szabad', function(e){
    var tmp ={
        "oszlop": jQuery(this).attr('oszlop'),
        "sor": jQuery(this).attr('sor'),
        "id": e.target.id
    };
    $.post("http://localhost/mozi/api/post/CustomerAdd.php", tmp,function(rep){
        console.log("Üzenet:",rep);
    });
    GenChairs(e);
});

//Bármikor készül egy div ezzel az osztállyal hozzá van kötve ez a függvény
//Foglalást törlünk
$(document).on('click','.chair.foglalt', function(e){
    var tmp ={
        "fogid": jQuery(this).attr('fogid'),
    };
    console.log(tmp);
    $.post("http://localhost/mozi/api/post/CustomerDelete.php", tmp,function(rep){
        console.log("Üzenet:",rep);
    });
    //jQuery(this).attr('class',"chair szabad");
    //jQuery(this).attr('fogid',"0");
    GenChairs(e);
});

//Vetítések gombja generálása API-ról
$.getJSON(api_url,
    function (data) {
        $.each(data, function(i, item){
            var link = $('<button>').text(item.nev + " - " + item.datum).attr('class','vetites').attr('id',item.vetitesid).appendTo('.vetitesek');
        });
    }
);

//Film szerint lekéri az adatokat és kiírja a székek állapotát
$('.vetitesek').click(function (e) { 
    GenChairs(e);
});