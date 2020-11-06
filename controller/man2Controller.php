<?php
require_once '../model/connection.php';

require_once '../controller/sessionController.php';
// require_once '../model/user.php';
// if (!isset($_SESSION['user'])) {
//     header('Location:../view/login.php');
// }
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

        // $nombre = $_GET['nombre'];

        // OJO
        // tabla historico
        // $query="INSERT INTO historico (id_historico, id_mesa, id_sala, sillas_mesa, fecha_inicio, fecha_fin, id_usuario VALUES (NULL,?,?,?,?,NOW(),?);";
        // $query="INSERT INTO `historico` (`id_historico`, `id_mesa`, `id_sala`, `sillas_mesa`, `fecha_inicio`, `fecha_fin`, `id_usuario`) VALUES (NULL, '1', '2', '6', '2020-11-02 16:27:37', current_timestamp(), '1');";
        $query="INSERT INTO `incidencias` (`id_usuario`, `id_sala`, `id_mesa`) VALUES (?, ?, ?);";
        $query=$pdo->prepare($query);
        
        
        // $sillas_mesa=$mesa['sillas_mesa'];
        // $fecha_inicio=$mesa['fecha_inicio'];
        // $id_usuario=$mesa['id_usuario'];
        $query->bindParam(1,$id_usuario);
        $query->bindParam(2,$id_sala);
        $query->bindParam(3,$id_mesa);
        // $query->bindParam(4,$fecha_inicio);
        // $query->bindParam(5,$id_usuario);
        $id_incidencias = $pdo->lastInsertId();
        $query->execute();
        // FIN OJO
        // OJO (viene por la sesión)
        // $id_usuario=1;
        // FIN OJO
        // tabla mesa
        // $query1="UPDATE mesa SET fecha_inicio=NULL, id_usuario=NULL WHERE id_mesa = $id_mesa;";
        // $sentencia1=$pdo->prepare($query1);
        // $sentencia1->bindParam(1,$id_usuario);
        // $sentencia1->execute();
        $pdo->commit();
        header("Location:../view/adminMantenimiento2.php?id_sala={$id_sala}&nombre={$nombre}");
    } catch (Exception $ex) {
        $pdo->rollback();
        echo $ex->getMessage();
    }
    header("Location:../view/adminMantenimiento2.php?id_sala={$id_sala}&nombre={$nombre}");
}else {
    // Está libre (hay que actualizar la tabla mesa con la fecha actual y el id del camarero)
    // OJO (viene por la sesión)
    // $id_usuario=1;
    // (`id_incidencia`, `id_usuario`, `id_sala`, `id_mesa`)
    $query="DELETE FROM `incidencias` WHERE `incidencias`.`id_mesa` = $id_mesa";
    $query=$pdo->prepare($query);
    $query->execute();
    // $id_sala=$mesa['id_sala'];
    // $nombre = $_GET['nombre'];
    // // FIN OJO
    // // tabla mesa
    // $query = "UPDATE mesa SET fecha_inicio=NOW(), id_usuario=? WHERE id_mesa = $id_mesa";
    // $sentencia=$pdo->prepare($query);
    // $sentencia->bindParam(1,$id_usuario);
    // $sentencia->execute();
    header("Location:../view/adminMantenimiento2.php?id_sala={$id_sala}&nombre={$nombre}");
    
}

?>