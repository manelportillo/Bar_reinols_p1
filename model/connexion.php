<?php
include 'config.php';
try {
    $dsn = "mysql:host=".SERVER.";dbname=".BD;
    $pdo = new PDO($dsn, USER, PASSWORD);
    // echo "<script> alert('conexión establecida')</script>";
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e){
    echo $e->getMessage();
}
?>