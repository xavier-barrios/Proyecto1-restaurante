<?php
include 'config.php';
$servidor="mysql:dbname=".BD.";host=";SERVIDOR;
 try{
     $pdo=new PDO($servidor,USUARIO,PASSWORD,array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES UTF8"));
     //echo "<script> alert('conexion establecida')</script>";
     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 }catch(PDOException $e){

    echo "<script> alert('Error de conexion')</script>";
     echo $e->getMessage();
 }
?>