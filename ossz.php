<?php
    if(isset($_GET)){
        $id = $_GET['id'];
        $sor = $_GET['sor'];
        $oszlop = $_GET['oszlop'];
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
    <h1>CÍM</h1>
    <div class="main_container-foglalo">
    <h2>Vetítő</h2>
        <div class="container">
            <?php 
                echo("<form action='./assets/PostSeat.php?id={$id}&sor={$sor}&oszlop={$oszlop}' method='post'>");
            ?>
                <label for="name">Név:</label>
                <input type="text" name="name" id="name" required>
                <br>
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" required>
                <br>
                <button type="submit">Foglalok!</button>
            </form>
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