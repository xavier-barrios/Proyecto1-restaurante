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
    ?>
    <!--Creamos la tabla para las incidencias en la que se van a mostrar las mesas, sillas y el estado -->
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
            // Llamamos a la funcion que se encuentra en MesaDAO, lo que hará que se muestren los datos de la mesa.
            $sala =  new MesaDAO();
            echo $sala->mostrarMesas();
            ?>
            <form action=""></form>
        </tbody>
    </table>
</body>
</html>
