<?php
    if (isset($_GET) && isset($_POST)) {
        $id = $_GET['id'];
        $sor = $_GET['sor'];
        $oszlop = $_GET['oszlop'];

        $nev = $_POST['name'];
        $email = $_POST['email'];

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "mozi";
        
        
        //Csatlakozás létrehozása
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        $vetid = $_GET['id'];
        //Csatlakozás ellenőrzése
        if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
        }
        
        $sql = "INSERT INTO foglalas (vetitesid,foglalonev,foglaloemail,sor,oszlop) VALUES
        ({$id},'{$nev}','{$email}',{$sor},{$oszlop})";
        
        if(mysqli_query($conn, $sql)){
            echo("SIKER");
        }
        else{
            echo("MÉGSE");
        }
        mysqli_close($conn);

        //Visszamegyünk a kész oldalra
        //Maradhatnánk itt is de így tisztább
        header("Location: ../kesz.php");
    }    
?>