<?php
try{
    $pdo = new PDO('mysql:host=localhost;dbname=coursework;charset=utf8', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch (PDOException $e){
    die('Unable to connect to the database server: ' . $e->getMessage());
}
?>