<?php
require_once 'user.php';
// require_once '../model/connection.php';
// if (!isset($_SESSION['user'])) {
//     header('Location:../view/login.php');
// }
class UserDao{
    private $pdo;

    public function __construct(){
        include '../model/connection.php';
        $this->pdo=$pdo;
    }

    public function login($user){
        $query = "SELECT * FROM usuario WHERE `email`=? AND `password`=?";
        $sentencia=$this->pdo->prepare($query);
        $email=$user->getEmail();
        $psswd=$user->getPassword();
        $sentencia->bindParam(1,$email);
        $sentencia->bindParam(2,$psswd);
        $sentencia->execute();
        $result=$sentencia->fetch(PDO::FETCH_ASSOC);
        $numRow=$sentencia->rowCount();
        if(!empty($numRow) && $numRow==1){
            $user->setEmail($result['email']);
            $user->setId_usuario($result['id_usuario']);
            // Creamos la sesión //
            session_start();
            $_SESSION['user']=$user;
            return true;
        }else {
            return false;
        }
    }
}

?>