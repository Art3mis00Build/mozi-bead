<?php
    
    include "../model/database.php";

    if(isset($_POST)){
        //Ha van POST akkor feldolgozzuk az adatokat
        //SQL lekérdezés elkészítése
        $sql = "INSERT INTO film (nev, premier, mufaj, info)
        VALUES ('{$_POST['nev']}', '{$_POST['premier']}', '{$_POST['mufaj']}', '{$_POST['info']}')";
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        $conn = null;
        header("Location: ../../admin/films.php");
    }
    else{
        header("Location: ../../index.html");
    }
?>