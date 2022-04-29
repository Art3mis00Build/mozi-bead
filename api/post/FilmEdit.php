<?php
    header('Access-Controll-Allow-Origin: *');
    include "../model/database.php";

    if(isset($_POST) && isset($_GET)){
        //Ha van POST akkor feldolgozzuk az adatokat
        $id = $_GET["id"];

        //SQL lekérdezés elkészítése
        $sql = "UPDATE film SET nev='{$_POST['nev']}', premier = '{$_POST['premier']}', mufaj = '{$_POST['mufaj']}', info ='{$_POST['info']}', poster='{$_POST['poster']}' WHERE filmid={$id}";
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        $conn = null;
        header("Location: ../../admin/films.php");
    }
    else{
        header("Location: ../../index.html");
    }
?>