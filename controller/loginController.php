<?php
include './admin.php';
include './adminDao.php';
  //crear un  admin como objeto
    $admin = new Admin($_POST['email'],$_POST['psswd']);
    $adminDAO = new AdminDao();
    if($adminDAO->login($admin)){
        header('Location: zona.admin.php');
        // echo "conexion buena";
    }else {
        ('Location: ../view/login.php'); 
        // echo "algo falla 1";
    }

?>