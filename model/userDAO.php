<?php
require_once 'user.php';
// En la clase UserDao le pasamos el parametro $pdo que viene del archivo de conexion.
class UserDao{
    private $pdo;
    // En el constructor le pasamos el archivo de conexion.
    public function __construct(){
        include '../model/connection.php';
        $this->pdo=$pdo;
    }

    public function login($user){
        // Ejecutamos la query que nos permite settear el email y password que introduzcamos en el formulario de login
        $query = "SELECT * FROM usuario WHERE `email`=? AND `password`=?";
        $sentencia=$this->pdo->prepare($query);
        // Recogemos las variables de la clase, en este caso el email y el password que son los campos que utilizaremos para loguearnos.
        $email=$user->getEmail();
        $psswd=$user->getPassword();
        $sentencia->bindParam(1,$email);
        $sentencia->bindParam(2,$psswd);
        $sentencia->execute();
        $result=$sentencia->fetch(PDO::FETCH_ASSOC);
        $numRow=$sentencia->rowCount();
        //Si el numero de filas no esta vacio setteamos el email, el id del usuario y el puesto de trabajo del usuario.
        if(!empty($numRow) && $numRow==1){
            $user->setEmail($result['email']);
            $user->setId_usuario($result['id_usuario']);
            $user->setPuesto_trabajo($result['puesto_trabajo']);
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