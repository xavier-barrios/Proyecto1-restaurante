<?php
require_once 'config.php';
// Connectar-nos a la BBDD
try {
    $dsn = "mysql:host=".SERVIDOR.";dbname=".BD;
    $pdo = new PDO($dsn, USER, PASSWORD); // Quan volguem fer connexió a la BBDD, fem servir $pdo
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "<a href='logoutController.php'>Cerrar sesión</a>";
} catch (PDOException $e){
    echo $e->getMessage();
}
?>
