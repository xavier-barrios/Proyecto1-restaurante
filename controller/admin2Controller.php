<?php
require_once '../model/connection.php';

$id_mesa = $_GET['id'];
$actualizar = $_GET['act'];

echo "id_mesa: {$id_mesa}";
echo "id_mesa: {$actualizar}";

if($actualizar == 'Liberar') {
    // Está ocupada (cuando le demos a liberar, tiene que guardarse en histórico)
    try {
        // Empezar transacción
        $pdo->beginTransaction();
        // OJO
        // tabla historico
        // FIN OJO
        // OJO (viene por la sesión)
        $id_usuario=1;
        // FIN OJO
        // tabla mesa
        $query = "UPDATE mesa SET fecha_inicio=NULL, id_usuario=NULL WHERE id_mesa = $id_mesa";
        $sentencia=$pdo->prepare($query);
        $sentencia->bindParam(1,$id_usuario);
        $sentencia->execute();
        $pdo->commit();
        header('Location:../view/admin_2.php');
    } catch (Exception $ex) {
        $pdo->rollback();
        echo $ex->getMessage();
    }
    header('Location:../view/admin_2.php');
}else {
    // Está libre (hay que actualizar la tabla mesa con la fecha actual y el id del camarero)
    // OJO (viene por la sesión)
    $id_usuario=1;
    // FIN OJO
    // tabla mesa
    $query = "UPDATE mesa SET fecha_inicio=NOW(), id_usuario=? WHERE id_mesa = $id_mesa";
    $sentencia=$pdo->prepare($query);
    $sentencia->bindParam(1,$id_usuario);
    $sentencia->execute();
    header('Location:../view/admin_2.php');
}

?>