<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurante</title>
</head>
<body>
     <?php
     require_once '../model/salaDAO.php';
     require_once '../controller/sessionController.php';
    ?>

    <div>
        <h2>Restaurante</h2>
        <table>
            <thead>
            <tr>
                <th>Salas</th>
                <th>Mesas Ocupadas</th>
                <th>Mesas Libres</th>
            </tr>
            </thead>
                <?php
                $sala =  new SalaDAO();
                echo $sala->mostrarSalasMesas();    
                ?>
        </table>
    </div>
    <a href='estadisticas.php'>Estadisticas</a>
</body>
</html>
