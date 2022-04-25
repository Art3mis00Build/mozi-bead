<?php
     $servername = "localhost";
     $username = "root";
     $password = "";
     $dbname = "mozi";
     
     if(isset($_GET)){
         //Csatlakozás létrehozása
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        $filmid = $_GET['filmid'];
        //Csatlakozás elelnőrzése
        if (!$conn) {
        die("Hiba: " . mysqli_connect_error());
        }
        
        $sql = "SELECT * FROM vetitites WHERE filmid = {$filmid}";
        $result = mysqli_query($conn, $sql);
        
        if(mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                echo("<a movie-playlist href='./foglalo.php?id={$row['vetitesid']}'>{$row['datum']}</a>");
            }
        } else {
            echo "0 results";
        }
        
        mysqli_close($conn);
     }
?>