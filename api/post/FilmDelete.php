<?php
    header('Access-Controll-Allow-Origin: *');
    include "../model/database.php";

    if(isset($_GET)){
        //Ha van POST akkor feldolgozzuk az adatokat
        $id = $_GET["id"];

        //SQL lekérdezés elkészítése
        $sql = "DELETE FROM film WHERE filmid = {$id}";
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        $conn = null;
        header("Location: ../../admin/films.php");
    }
    else{
        header("Location: ../../index.html");
    }
?>