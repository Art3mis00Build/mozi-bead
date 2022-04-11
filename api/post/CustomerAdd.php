<?php
     header('Access-Controll-Allow-Origin: *');
     //header('Content-Type: application/json');
     include "../model/database.php";

     if(isset($_POST)){
        $id = json_decode($_POST['id'], true);
        $sor = json_decode($_POST['sor'], true);
        $oszlop = json_decode($_POST['oszlop'], true);

        $sql = "INSERT INTO foglalas (vetitesid, foglalonev, foglaloemail, sor, oszlop)
        VALUES ('".$id."', 'Manual', 'Manual', '".$sor."', '".$oszlop."')";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        echo($conn->lastInsertId());

        $conn = null;
     }
?>