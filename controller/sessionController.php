<?php
require_once './admin.php';
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location:../view/login.php');
}
 echo '<h1>Bienvenido '.$_SESSION['admin']->getEmail().'</h1><h1><a href="./logoutController.php">Logout</a></h1>';