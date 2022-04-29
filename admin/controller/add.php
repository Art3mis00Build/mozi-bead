<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="../style.css">
    <title>ThinStreet Cinema - Admin</title>
</head>
<body>
    <div class="head">
        <img src="logo.png" alt="" srcset="">
    </div>
    <div class="container">
        <div class="nav">
            <ul class="navbar">
            <li class="navbar-item"><a href="../index.html">Főoldal</a></li>
                <li class="navbar-item"><a href="../films.php">Filmek</a></li>
                <li class="navbar-item"><a href="../foglalas.html">Foglalás</a></li>
                <li class="navbar-item"><a href="">Statisztika</a></li>
                <li class="navbar-item"><a href="">Büfe</a></li>
            </ul>
        </div>

        <div class="content">
            <h1>Filmek</h1>
            <div class="form-field">
               <form action="../../api/post/FilmAdd.php" method="post">
                   <label for="nev">Cím:</label><br><input type="text" name="nev" id="nev" value="" require><br>
                   <label for="premier">Premier:</label><br><input type="date" name="premier" id="premier" value="" require><br>
                   <label for="mufaj">Műfaj:</label><br><input type="text" name="mufaj" id="mufaj" value="" require><br>
                   <label for="info">Leírás:</label><br><input type="text" name="info" id="info" value="" require><br>
                   <label for="poster">Pószter:</label><br><input type="text" name="poster" id="poster" value="" require><br>
                   <button type="submit">Kész</button>
               </form>
            </div>
        </div>
    </div>

    <script src="./assets/js/main.js"></script>
</body>
</html>