<?php
$host = 'localhost';
$db   = 'carrentals';  
$user = 'root';
$pass = '';

$dsn = "mysql:host=$host;dbname=$db";

$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
  
} catch (PDOException $e) {
    echo "Connection failed:" . $e->getMessage();
}


