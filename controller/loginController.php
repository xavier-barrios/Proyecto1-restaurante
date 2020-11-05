<?php
include '../model/user.php';
include '../model/userDAO.php';
// La contraseña es 1234 y la encriptada 81CMbBg2r.GBA (esta hay que ponerla en la base de datos) //
    $salt = md5($_POST['password']);
    $encr = crypt($_POST['password'], $salt);
// Vamos a controlar que si el usuario que se logea es un camarero, que rediriga a la pagina de mostrar salas, y si es de mantenimiento, que rediriga a la pagina de vista de incidencias //
    if ($_POST['email'] == 'sergio@gmail.com' || $_POST['email'] == 'danny@gmail.com') {
        $user = new Usuario($_POST['email'],$encr,$_POST['camarero']);
        $userDAO = new UserDAO();
        if($userDAO->login($user)){
            header('Location: ../view/admin1.php');
            echo "conexion buena 1";
        }else {
            header('Location: ../view/login.php'); 
            echo "algo falla 1";
        }
    } else if ($_POST['email'] == 'agnes@gmail.com' || $_POST['email'] == 'ignasi@gmail.com') {
        $user = new Usuario($_POST['email'],$encr,$_POST['mantenimiento']);
        $userDAO = new UserDAO();
        if($userDAO->login($user)){
            header('Location: ../view/adminMantenimiento.php');
            echo "conexion buena 2";
        }else {
            header('Location: ../view/login.php'); 
            echo "algo falla 2";
        }   
    } else {
        echo "Los usuarios no son correctos";
    }

?>