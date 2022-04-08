<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="style.css">
    <title>ThinStreet Cinema - Admin</title>
</head>
<body>
    <div class="head">
        <img src="logo.png" alt="" srcset="">
    </div>
    <div class="container">
        <div class="nav">
            <ul class="navbar">
                <li class="navbar-item"><a href="./index.html">Főoldal</a></li>
                <li class="navbar-item"><a href="./films.php">Filmek</a></li>
                <li class="navbar-item"><a href="./foglalas.html">Foglalás</a></li>
                <li class="navbar-item"><a href="">Statisztika</a></li>
                <li class="navbar-item"><a href="">Büfe</a></li>
            </ul>
        </div>

        <div class="content">
            <h1>Filmek</h1>
            <div class="table">
                <a href="./controller/add.php"><button>Film hozzáadás</button></a>
               <table>
                    <tr>
                       <th>Id</th>
                       <th>Cím</th>
                       <th>Premier</th>
                       <th>Műfaj</th>
                       <th>Leírás</th>
                       <th>Művelet</th>
                    </tr>
                    <?php 
                        include "../api/model/database.php";
    
                        //SQL lekérdezés elkészítése
                        $sql = "SELECT * FROM film";
                        $stmt = $conn->prepare($sql);
                        $stmt->execute();
                    
                        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        foreach($result as $item){
                            echo("<tr><td>{$item['filmid']}</td>
                                        <td>{$item['nev']}</td>
                                        <td>{$item['premier']}</td>
                                        <td>{$item['mufaj']}</td>
                                        <td>{$item['info']}</td>
                                        <td><a href='./controller/modify.php?id={$item['filmid']}'><button>Szerkesztés</button></a>
                                        <a href='../api/post/FilmDelete.php?id={$item['filmid']}'><button>Törlés</button></a></td>
                                        </tr>");
                        }
                    ?>
                    
               </table>
            </div>
        </div>
    </div>
</body>
</html>