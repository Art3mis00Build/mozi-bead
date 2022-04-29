//Statisztika betöltése
function refreshMain(){
    //Adatok lekérése API-ról
    var api_url = "http://localhost/mozi/api/get/getNumAllRes.php";
    $.getJSON(api_url, function(data){
        $("#valami").text(data[0].num);
    });

    $.getJSON("http://localhost/mozi/api/get/getWeekCustomer.php", function(data){
        $("#week").text(data[0].Ossz);
    });

    $.getJSON("http://localhost/mozi/api/get/getTodayCustomer.php", function(data){
        $("#today").text(data[0].Ossz);
    });
}

//Mai nap adatai
function TodayData(){
    $('#records').empty();
    var head = "<thead><th>Cím:</th><th>Foglalások:</th><th>Szabadhelyek:</th></thead>";
    $('#records').append(head);
    $.getJSON("http://localhost/mozi/api/get/getTodayFilms.php", function(data){
        $.each(data, function(i,item){
            var $tr = $('<tr>').append(
                $('<td>').text(item.cim),
                $('<td>').text(item.num),
                $('<td>').text(10*9-parseInt(item.num))
            ).appendTo('#records');
        });
    });
}

//Gyűjtemény
function Collection(){
    refreshMain();
    TodayData();
}

$(document).ready(function(){
    //10 másodpercenként frissíti az adatokat
    $(function(){
        setInterval(Collection(), 10000);
    });
});