<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>Mozi</title>
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
    <div class="main">
        <div class="main_container">
            <div class="main_content">
                <h1>GAMF MOZI</h1>
                <h2>Üdvözöljük a Gamf mozi weboldalán. Megannyi film közül választhat...</h2>
            </div>
            <div class="main_content-genre">
                <a href="/"><button>Hétfő</button></a>
                <a href="/"><button>Kedd</button></a>
                <a href="/"><button>Szerda</button></a>
                <a href="/"><button>Csütörtök</button></a>
                <a href="/"><button>Péntek</button></a>
                <a href="/"><button>Szombat</button></a>
                <a href="/"><button>Vasárnap</button></a>
            </div>
                            <div class="imain_content-movies">
                                <?php include "./assets/GenIMainFilm.php"?>
                                <div class="imain_content-movies-vetitesek">
                                    <?php include "./assets/GetFilmTime.php"?>
                                </div>
                                    </div>
					            </div>
                            </div>                
    </div>
    <div class="footer_container">
    <img src="Képek/card-payment.png" alt="">
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
                <h2>Rólunk</h2>
                    <a href="/">Kapcsolatfelvétel</a>
                    <a href="/">Adatkezelés</a>
                </div>
            </div>
        </div>
        <h1>Minden jog fenntartva! 2022</h1>
    </div>
</body>
<script src="script.js"></script>
</html>