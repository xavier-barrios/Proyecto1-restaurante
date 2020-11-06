<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Incidencias</title>
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700;900&display=swap" rel="stylesheet">
</head>
<body>
     <?php
        require_once '../model/salaDAO.php';
        require_once 'header2.html';
        require_once '../controller/sessionController.php';
    ?>
    <main class="main--admin container">
        <div class="container-admin">
          <!--Creamos la tabla para las incidencias en la que se van a mostrar las salas, mesas ocupadas y mesas libres -->
            <h2>Incidencias</h2>
            <div class="admin--table"> 
                <table>
                    <thead>
                    <tr>
                        <th>Salas</th>
                        <!-- <th>Mesas Ocupadas</th>
                        <th>Mesas Libres</th> -->
                    </tr>
                    </thead>
                    <?php
                  // Llamamos a la funcion que se encuentra en SalaDAO, lo que hará que se muestren los datos de la sala.
                        $sala =  new SalaDAO();
                        echo $sala->mostrarSalasMesasMan();
                    
                    ?>
                </table>
            </div>
        </div>
    </main>
</body>
</html>