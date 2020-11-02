<?php
require_once 'user.php';
class UserDao{
    private $pdo;

    public function __construct(){
        include 'conexion.php';
        $this->pdo=$pdo;
    }

    public function login($user){
        $query = "SELECT * FROM usuario WHERE `email`=? AND `password`=?";
        $sentencia=$this->pdo->prepare($query);
        $email=$admin->getEmail();
        $psswd=$admin->getPassword();
        $sentencia->bindParam(1,$email);
        $sentencia->bindParam(2,$password);
        $sentencia->execute();
        $result=$sentencia->fetch(PDO::FETCH_ASSOC);
        $numRow=$sentencia->rowCount();
        if(!empty($numRow) && $numRow==1){
            $user->setEmail($result['email']);
            $user->setId_usuario($result['Id_usuario']);
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