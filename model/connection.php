<?php
include 'config.php';
try {
    $dsn = "mysql:host=".SERVIDOR.";dbname=".BD;
    $pdo = new PDO($dsn, USER, PASSWORD); 
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "<a href='logoutController.php'>Cerrar sesión</a>";
} catch (PDOException $e){
    echo $e->getMessage();
}
?>