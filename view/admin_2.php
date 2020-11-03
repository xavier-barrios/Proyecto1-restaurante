<?php
require_once '../model/user.php';
require_once '../model/connection.php';
if (!isset($_SESSION['user'])) {
    header('Location:login.php');
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
    <?php
        require_once '../model/mesaDAO.php';
        require_once '../controller/sessionController.php';
        $nombre_sala = $_GET['nombre_sala'];
    ?>
    <h1><?php echo $nombre_sala;?></h1>
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
            $sala =  new MesaDAO();
            echo $sala->mostrarMesas();
            ?>
            <form action=""></form>
        </tbody>
    </table>
    <a href="./admin_1.php">Volver</a>
</body>
</html>
