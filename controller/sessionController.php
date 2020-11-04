<?php
require_once '../model/user.php';
session_start();
if (!isset($_SESSION['user'])) {
    header('Location:../view/login.php');
}
echo '<div class="container-logout container"><a href="../view/login.php" class="logout">Logout</a></div>';
echo '<div class="container"><h1>Bienvenido '.$_SESSION['user']->getEmail().'</h1></div>';

?>

