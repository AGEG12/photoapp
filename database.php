<?php 
    $server = 'localhost:3307';
    $username = 'root';
    $password = '';
    $database = 'photoapp_db';
    try {
        $conn =  new PDO("mysql:host=$server;dbname=$database;",$username,$password);

    } catch (PDOException $e) {
        die('Conexión fallida con la base de datos: '.$e->getMessage());
    }
?>