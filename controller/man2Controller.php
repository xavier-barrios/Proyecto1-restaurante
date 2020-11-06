<?php
require_once '../model/connection.php';

require_once '../controller/sessionController.php';
// recogemos el id del usuario que ha inciado secion
// recogemos el id de la mesa y la variable actualizar (Ocupar o Liberar) junto a nombre de la sala, 

$id_usuario=$_SESSION['user']->getId_usuario();

$id_mesa = $_GET['id'];
$actualizar = $_GET['act'];
$nombre = $_GET['nombre'];

echo "id_mesa: {$id_mesa}";
echo "id_mesa: {$actualizar}";

// Información sobre la mesa y la sala a la que pertenece
$query2 = "SELECT * FROM mesa WHERE id_mesa = $id_mesa";
$sentencia2=$pdo->prepare($query2);
$sentencia2->execute();
$mesa=$sentencia2->fetch(PDO::FETCH_ASSOC);
print_r($mesa);
$id_sala=$mesa['id_sala'];
$id_mesa=$mesa['id_mesa'];
if($actualizar == 'Bloquear') {
    // Está ocupada (cuando le demos a liberar, tiene que guardarse en histórico)
    try {
        // Empezar transacción
        $pdo->beginTransaction();
        
        $query="INSERT INTO `incidencias` (`id_usuario`, `id_sala`, `id_mesa`) VALUES (?, ?, ?);";
        $query=$pdo->prepare($query);
        $query->bindParam(1,$id_usuario);
        $query->bindParam(2,$id_sala);
        $query->bindParam(3,$id_mesa);
        $id_incidencias = $pdo->lastInsertId();
        $query->execute();
        $pdo->commit();
        header("Location:../view/adminMantenimiento2.php?id_sala={$id_sala}&nombre={$nombre}");
    } catch (Exception $ex) {
        $pdo->rollback();
        echo $ex->getMessage();
    }
    header("Location:../view/adminMantenimiento2.php?id_sala={$id_sala}&nombre={$nombre}");
}else {
    $query="DELETE FROM `incidencias` WHERE `incidencias`.`id_mesa` = $id_mesa";
    $query=$pdo->prepare($query);
    $query->execute();
    header("Location:../view/adminMantenimiento2.php?id_sala={$id_sala}&nombre={$nombre}");
    
}

?>