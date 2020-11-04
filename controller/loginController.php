<?php
    include '../model/user.php';
    include '../model/userDAO.php';
// La contraseña es 1234 y la encriptada 81CMbBg2r.GBA (esta hay que ponerla en la base de datos) //
    $salt = md5($_POST['password']);
    $encr = crypt($_POST['password'], $salt);
    $user = new Usuario($_POST['email'], $encr, $_POST['id_usuario']);
    $userDAO = new UserDAO();
    if($userDAO->login($user)){
        header('Location: ../view/admin_1.php');
        echo "conexion buena";
    }else {
        header('Location: ../view/login.php'); 
        echo "algo falla 1";
    }

?>