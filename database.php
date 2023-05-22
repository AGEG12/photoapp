<?php 
    $DB_HOST = $_ENV['DB_HOST'];
    $DB_USER = $_ENV['DB_USER'];
    $DB_PASSWORD = $_ENV['DB_PASSWORD'];
    $DB_NAME = $_ENV['DB_NAME'];
    $DB_PORT = $_ENV['DB_PORT'];
    
    try {
        $dsn = "mysql:host=$DB_HOST;port=$DB_PORT;dbname=$DB_NAME";
        $conn = new PDO($dsn, $DB_USER, $DB_PASSWORD);

    } catch (PDOException $e) {
        die('Conexión fallida con la base de datos: '.$e->getMessage());
    }
?>