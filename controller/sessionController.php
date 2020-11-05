<?php
require_once '../model/user.php';
session_start();
if (!isset($_SESSION['user'])) {
    header('Location:../view/login.php');
}
echo '<a href="../view/login.php">Logout</a>';
echo '<h1>Bienvenido '.$_SESSION['user']->getEmail().'</h1>';