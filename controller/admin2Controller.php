<?php
/* Hacemos un require_once del archivo de conexion a la base de datos y del sessionController para seguir manteniendo la sesion iniciada*/
require_once '../model/connection.php';
require_once '../controller/sessionController.php';
// recogemos el id del usuario que ha inciado secion
// recogemos el id de la mesa y la variable actualizar (Ocupar o Liberar) junto a nombre de la sala, 
// Recogemos el id del usuario con el get y el resto de los campos //
$id_usuario=$_SESSION['user']->getId_usuario();
$id_mesa = $_GET['id'];
$actualizar = $_GET['act'];
$nombre = $_GET['nombre'];

// Mostramos por pantalla el id de la mesa y al lado, el boton de actualizar //
echo "id_mesa: {$id_mesa}";
echo "id_mesa: {$actualizar}";

// Información sobre la mesa y la sala a la que pertenece //
$query2 = "SELECT * FROM mesa WHERE id_mesa = $id_mesa";
$sentencia2=$pdo->prepare($query2);
$sentencia2->execute();
$mesa=$sentencia2->fetch(PDO::FETCH_ASSOC);
print_r($mesa);

// Si la variable actualizar es igual a liberar //
if($actualizar == 'Liberar') {
    // Está ocupada (cuando le demos a liberar, tiene que guardarse en histórico)
    try {
        // Empezar transacción
        $pdo->beginTransaction();

        // tabla historico
        /* Ejecutamos la query del insert en la tabla de historico para que guarde
        todos los registros cuando liberemos una mesa */
        $query="INSERT INTO `historico` (`id_historico`, `id_mesa`, `id_sala`, `sillas_mesa`, `fecha_inicio`, `fecha_fin`, `id_usuario`) VALUES (NULL, ?, ?, ?, ?, current_timestamp(), ?);";
        $query=$pdo->prepare($query);
        $id_mesa=$mesa['id_mesa'];
        $id_sala=$mesa['id_sala'];
        $sillas_mesa=$mesa['sillas_mesa'];
        $fecha_inicio=$mesa['fecha_inicio'];
        $query->bindParam(1,$id_mesa);
        $query->bindParam(2,$id_sala);
        $query->bindParam(3,$sillas_mesa);
        $query->bindParam(4,$fecha_inicio);
        $query->bindParam(5,$id_usuario);
        $id_historico = $pdo->lastInsertId();
        $query->execute();
        // tabla mesa
        /* Updateamos la tabla mesa para indicarle los campos en NULL, ya que eso nos
        va a permitir poder realizar otro historico */
        $query1="UPDATE mesa SET fecha_inicio=NULL, id_usuario=NULL WHERE id_mesa = $id_mesa;";
        $sentencia1=$pdo->prepare($query1);
        $sentencia1->bindParam(1,$id_usuario);
        $sentencia1->execute();
        $pdo->commit();
        header("Location:../view/admin_2.php?id_sala={$id_sala}&nombre={$nombre}");
    } catch (Exception $ex) {
        $pdo->rollback();
        echo $ex->getMessage();
    }
    header("Location:../view/admin_2.php?id_sala={$id_sala}&nombre={$nombre}");
}else {
    // Está libre (hay que actualizar la tabla mesa con la fecha actual y el id del camarero)
    // OJO (viene por la sesión)
    $id_sala=$mesa['id_sala'];
    $nombre = $_GET['nombre'];
    // FIN OJO
    // tabla mesa
    $query = "UPDATE mesa SET fecha_inicio=NOW(), id_usuario=? WHERE id_mesa = $id_mesa";
    $sentencia=$pdo->prepare($query);
    $sentencia->bindParam(1,$id_usuario);
    $sentencia->execute();
    header("Location:../view/admin_2.php?id_sala={$id_sala}&nombre={$nombre}");
    
}

?>