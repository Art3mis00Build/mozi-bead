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
        
        $sql = "SELECT * FROM film WHERE filmid = {$filmid}";
        $result = mysqli_query($conn, $sql);
        
        if(mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                echo("<div class='imain_content-movies-poster'>
                <h1>{$row['nev']}</h1>
                    <img src='{$row['poster']}' id='idopont_poster' alt='pic'>
                </div>
                <div class='imain_content-movies-description'>
                    <h2>{$row['info']}</h2>
                </div>");
            }
        } else {
            echo "";
        }
        
        mysqli_close($conn);
     }
?>