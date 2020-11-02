<?php
require_once '../model/user.php';
session_start();
if (!isset($_SESSION['user'])) {
    header('Location:../view/login.php');
}
 echo '<h1>Bienvenido '.$_SESSION['user']->getEmail().'</h1><h1><a href="./logoutController.php">Logout</a></h1>';