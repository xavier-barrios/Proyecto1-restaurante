<?php
// require_once '../model/user.php';
// require_once '../model/connection.php';
// if (!isset($_SESSION['user'])) {
//     header('Location:login.php');
// }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Central Peak</title>
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700;900&display=swap" rel="stylesheet">

</head>
<body>
    <?php
        require_once '../model/mesaDAO.php';
        require_once 'header.html';
        require_once '../controller/sessionController.php';
        // recogemos el nombre de la sala para mostrarlo
        $nombre = $_GET['nombre'];
    ?>
    <main class="main--admin container">
        <div class="container-admin">
            <h2><?php echo $nombre;?></h2>
            <div class="admin--table">
                <table>
                    <thead>
                        <tr>
                            <th>Mesa</th>
                            <th>Sillas</th>
                            <th colspan='2'>Estado</th>
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
            </div>
            <!-- <div class="volver">
                <a href="./admin_1.php">Volver</a>
            </div> -->
        </div>
    </main>    

</body>
</html>
