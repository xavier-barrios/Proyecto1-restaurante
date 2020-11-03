<?php
require_once '../model/connection.php';

// OJO
$id_sala = $_GET['id_sala'];
echo $id_sala;
// FIN OJO

$query = "SELECT * FROM mesa WHERE id_sala = $id_sala";
$sentencia=$pdo->prepare($query);
$sentencia->execute();
$salas=$sentencia->fetchAll(PDO::FETCH_ASSOC);
// print_r($salas);


function estado($salas) {
    if($salas['id_usuario'] == NULL) {
        return 'Libre';
    } else {
        return 'Ocupada';
    }
}

function actualizar($salas) {
    if($salas['id_usuario'] == NULL) {
        return 'Ocupar';
    } else {
        return 'Liberar';
    }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin2</title>
</head>
<body>
    <h1>Admin2</h1>
    <table>
        <thead>
            <tr>
                <th>Mesa</th>
                <th>Sillas</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
        <?php
            foreach($salas as $sala) {
                $id = $sala['id_mesa'];
                $actualizar = actualizar($sala);
                echo "<tr>";
                echo "<td>{$sala['numero_mesa']}</td>";
                echo "<td>{$sala['sillas_mesa']}</td>";
                echo "<td>".estado($sala)."</td>";
                echo "<td><a href='../controller/admin2Controller.php?id=$id&act=$actualizar'>".$actualizar."</a></td>";
                echo "</tr>";
            }
            ?>
            <form action=""></form>
        </tbody>
    </table>
</body>
</html>