var api_url = "http://localhost/mozi/api/get/getAllFilms.php";

$.getJSON(api_url, function(data){
    $("#valami").text(data[0].num);
});