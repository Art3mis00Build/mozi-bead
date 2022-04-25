<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "mozi";
    
    //Csatlakozás létrehozása
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    //Csatlakozás ellenőrzése
    if (!$conn) {
    die("Hiba: " . mysqli_connect_error());
    }
    
    $sql = 'SELECT * FROM film';
    $result = mysqli_query($conn, $sql);
    
    if(mysqli_num_rows($result) > 0) {
        //Sorokként kiírjuk az adatot
        while($row = mysqli_fetch_assoc($result)) {
            echo("<div class='movie-box'>
            <div class='poster'>
                <img src='{$row['poster']}'>
                <!--<a data-movie='835' class='trailer'><i class='icon-play'></i></a>-->
            </div>
            <div class='info'>
                <div class='title'>
                    <a href=''>{$row['nev']}</a>
                </div>
                <div class='meta'>
                    <img src='Képek/Ages/4-circle.svg'>{$row['mufaj']}
                </div>
                <div class='description'>
                   Erre majd kitalálok valamit... 
                    <span class='readmore-dots'>...</span>
                    <span class='readmore-content hidden'> 
                        {$row['info']}
                    </span>
                    <a class='readmore' rel>Tovább</a>
                </div>
            
                <div class='times'>
                    <div class='movie-time'>
                        <a class='past'>
                            <span class='time'>
                                <em>{$row['premier']}</em>
                            </span>
                        </a>
                    </div>
                </div>
                <div class='moretimes'>
                    <a href='film/encanto-835' class='movie-playlist'>Mikor lesz még műsoron?</a>
                </div>
            </div>
        </div>");
        }
      } else {
        echo "0 results";
      }
      
      mysqli_close($conn);
?>