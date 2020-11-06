<?php
require_once 'user.php';

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
            $user->setPuesto_trabajo($result['puesto_trabajo']);
            // Creamos la sesión //
            session_start();
            $_SESSION['user'] = $user;
            // OJO
            // error_log('User set on session');
            // FIN OJO
            return true;
        }else {
            return false;
        }
    }
}

?>