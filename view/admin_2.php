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
    <!--Creamos la tabla en la que se van a mostrar las mesas, las sillas y el estado -->
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
                    // Llamamos a la funcion que se encuentra en MesaDAO, lo que hará que se muestren los datos de la mesa.
                        $sala =  new MesaDAO();
                        echo $sala->mostrarMesas();
                        ?>
                        <form action=""></form>
                    </tbody>
                </table>
            </div>
        </div>
    </main>    

</body>
</html>
