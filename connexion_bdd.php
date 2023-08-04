<?php
$host = 'localhost';
$username = 'root';
$password = '';
$dbname= 'chat';
try {
    $con = new PDO("mysql:host=localhost;dbname=chat", "root", "");
    // set the PDO error mode to exception
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $con->exec("SET NAMES UTF8");
    }
catch(PDOException $e)
    {
    echo "Connexion à la base de données échouée : " . $e->getMessage();
    }
?>