<?php
// Incluimos la clase user y userDAO que es donde esta la funcion del login
include '../model/user.php';
include '../model/userDAO.php';
// La contraseña es 1234 y la encriptada 81CMbBg2r.GBA (esta hay que ponerla en la base de datos) //
    $salt = md5($_POST['password']);
    $encr = crypt($_POST['password'], $salt);

// Vamos a controlar que al introducir usuario nos rediriga a otra pagina que nos permita controlar que usuario inicia sesion en la pagina userController //
        $user = new Usuario($_POST['id_usuario'], $_POST['email'],$encr, $_POST['puesto_trabajo']);
        $userDAO = new UserDAO();
        if($userDAO->login($user)){
            header('Location: ../controller/userController.php');
        } else {
            header('Location: ../view/login.php');
        }
?>
