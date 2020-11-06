<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Incidencias</title>
</head>
<body>
     <?php
        require_once '../model/salaDAO.php';
        require_once '../controller/sessionController.php';
    ?>

    <div>
        <!--Creamos la tabla para las incidencias en la que se van a mostrar las salas, mesas ocupadas y mesas libres -->
        <h2>Incidencias</h2>
        <table>
            <thead>
            <tr>
                <th>Salas</th>
                <th>Mesas Ocupadas</th>
                <th>Mesas Libres</th>
            </tr>
            </thead>
            <?php
            // Llamamos a la funcion que se encuentra en SalaDAO, lo que hará que se muestren los datos de la sala.
                $sala =  new SalaDAO();
                echo $sala->mostrarSalasMesasMan();
            
            ?>
        </table>
    </div>
</body>
</html>