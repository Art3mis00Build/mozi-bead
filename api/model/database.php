<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "mozi";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
  //PDO hibakezelés
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $conn->exec("set names utf8");
  //echo "Siker";
} catch(PDOException $e) {
  echo "Hiba történt: " . $e->getMessage();
}
?> 