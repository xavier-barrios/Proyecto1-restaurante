<?php
include '../model/user.php';
include '../model/userDAO.php';
    $user = new Usuario($_POST['email'],$_POST['password']);
    $userDAO = new UserDAO();
    if($userDAO->login($user)){
        header('Location: ../view/zona.admin1.php');
        echo "conexion buena";
    }else {
        header('Location: ../view/login.php'); 
        echo "algo falla 1";
    }

?>