<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "mozi";
    
    if(isset($_GET)){
    //Kapcsolat létrehozása
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    $vetid = $_GET['id'];
    //Csatlakozás ellenőrzése
    if (!$conn) {
    die("Hiba: " . mysqli_connect_error());
    }
    
    $sql = "SELECT `sor`,`oszlop`,foglalas.`vetitesid` FROM `foglalas` INNER JOIN vetitites ON vetitites.vetitesid = foglalas.vetitesid WHERE foglalas.vetitesid = {$vetid}";
    $result = mysqli_query($conn, $sql);
    $result=$result -> fetch_all(MYSQLI_ASSOC);
    //Tömb hossza
    $len = 0;
    foreach ($result as $key => $val){
      $len++;
    }

    //Minden generált székre megnézzük, hogy arra van-e egy foglalt szék
    for ($i=1; $i < 11; $i++) { 
      for ($j=1; $j < 10; $j++) { 
        $isin = false;
        $x = 0;
        while (($x < $len) && ($isin != true)) {
          if($i == $result[$x]['sor'] && $j == $result[$x]['oszlop']){
            $isin = true;
          }
          $x++;
        }
        //Itt nézzük meg milyen érték jött vissza, van-e foglalás vagy nincs
        if($isin == true){
          echo("<a class='btn-foglalt'>{$i}-{$j}</a>");
        }
        else{
          echo("<a href='./ossz.php?id={$vetid}&sor={$i}&oszlop={$j}' class='btn-szabad'>{$i}-{$j}</a>");
        }
      }
    }
      
      mysqli_close($conn);
    }
?>