<?php
    header('Access-Controll-Allow-Origin: *');
    header('Content-Type: application/json');
    include "../model/database.php";

    //ID lekérése
    $id = 0;
    if(isset($_GET)){
        $id = $_GET["id"];
    }
    
    //SQL lekérdezés elkészítése
    $sql = "SELECT `foglalasid`,`sor`,`oszlop` FROM `foglalas` INNER JOIN vetitites ON vetitites.vetitesid = foglalas.vetitesid WHERE foglalas.vetitesid = {$id} ORDER BY sor ASC, oszlop ASC";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC); 
    if(count($result)> 0){
        echo json_encode($result);
    }
    else{
        $tmp = array();
        $tmp['message'] = "Nincs adat vagy hiba történt";
        echo json_encode($tmp);
    }
    $conn = null;
?>