<?php
     header('Access-Controll-Allow-Origin: *');
     //header('Content-Type: application/json');
     include "../model/database.php";

     if(isset($_POST)){
        $fogid = json_decode($_POST['fogid'], true);

        $sql = "DELETE FROM foglalas WHERE foglalasid = {$fogid}";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        echo("SIKER!");

        $conn = null;
     }
?>