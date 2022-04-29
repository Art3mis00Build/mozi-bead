<?php
    include "../../api/model/database.php";

    //ID lekérése
    $id = 0;
    if(isset($_GET)){
        $id = $_GET["id"];
    }
    
    //SQL lekérdezés elkészítése
    $sql = "SELECT * FROM film WHERE filmid = {$id}";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $data = array();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC); 
    if(count($result)> 0){
        
    }
    else{
        echo("Hiba Történt!");
    }
?>

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
               <form action="../../api/post/FilmEdit.php?id=<?php echo($id); ?>" method="post">
                   <label for="nev">Cím:</label><input type="text" name="nev" id="nev" value="<?php echo($result[0]['nev']);?>"><br>
                   <label for="premier">Premier:</label><input type="date" name="premier" id="premier" value="<?php echo($result[0]['premier']);?>"><br>
                   <label for="mufaj">Műfaj:</label><input type="text" name="mufaj" id="mufaj" value="<?php echo($result[0]['mufaj']);?>"><br>
                   <label for="info">Leírás:</label><input type="text" name="info" id="info" value="<?php echo($result[0]['info']);?>"><br>
                   <label for="poster">Pószter:</label><input type="text" name="poster" id="poster" value="<?php echo($result[0]['poster']);?>"><br>
                   <button type="submit">Kész</button>
               </form>
            </div>
        </div>
    </div>

    <script src="./assets/js/main.js"></script>
</body>
</html>