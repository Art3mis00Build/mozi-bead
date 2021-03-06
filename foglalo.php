<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "mozi";
    $title = "";
    $datum = "";
    if(isset($_GET)){
        //Csatlakozás létrehozása
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        $filmid = $_GET['filmid'];
        $datum = $_GET['datum'];
        //Csatlakozás elelnőrzése
        if (!$conn) {
        die("Hiba: " . mysqli_connect_error());
        }
        
        $sql = "SELECT * FROM film WHERE filmid = {$filmid}";
        $result = mysqli_query($conn, $sql);
        
        if(mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                $title = $row['nev'];
            }
        }
        
        mysqli_close($conn);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body>
<nav class="navbar">
        <div class="navbar_container">
            <a href="/" id="navbar_logo">
                <img src="Képek/mozi_logo.png" alt="GamfMozi" id="navbar_logo">
            </a>
            <div id="featured-movies-wrapper">
                <div class="wrapper swiper-container-horizontal" id="featured-movies-swiper" style="cursor: grab;">
                    <div class="swiper-outer">
                        <img src="Képek/arrow_left.png" class="prev" alt="Prev">
                        <div class="swiper-inner">
                            <img src="Képek/dumbesdumber.jpg" class="active">
                            <img src="Képek/felaldozhatok.jpg" class="active">
                            <img src="Képek/dumbesdumber.jpg" class="active">
                            <img src="Képek/felaldozhatok.jpg" class="active">
                            <img src="Képek/dumbesdumber.jpg">
                            <img src="Képek/felaldozhatok.jpg">
                            <img src="Képek/dumbesdumber.jpg">
                            <img src="Képek/felaldozhatok.jpg">
                            <img src="Képek/dumbesdumber.jpg">
                            <img src="Képek/felaldozhatok.jpg">
                            <img src="Képek/dumbesdumber.jpg">
                            <img src="Képek/felaldozhatok.jpg">
                            <img src="Képek/dumbesdumber.jpg">
                            <img src="Képek/felaldozhatok.jpg">
                            <img src="Képek/dumbesdumber.jpg">
                            <img src="Képek/felaldozhatok.jpg">
                        </div>
                        <img src="Képek/arrow_right.png" class="next" alt="Next">
                    </div>
                </div>
            </div>
        </div>
    </nav>
    </nav>
    <div class="main-foglalo">
    <h1><?php echo($title);?></h1>
    <div class="main_container-foglalo">
    <h2><?php echo($datum);?></h2>
        <div class="container">
            <div class="helyfoglalo_tabla">
                <?php
                    include("./assets/GenSeats.php");
                ?>
            </div>
        </div>
    </div>
</div>
<div class="footer_container">
        <div class="footer_links">
            <div class="footer_link-wrapper">
                <div class="footer_link-items">
                    <h2>Rólunk</h2>
                    <a href="/">Kapcsolatfelvétel</a>
                    <a href="/">Adatkezelés</a>
                </div>
            </div>
            <div class="footer_link-wrapper">
                <div class="footer_link-items">
                </div>
            </div>
        </div>
    </div>
</body>
</body>
</html>