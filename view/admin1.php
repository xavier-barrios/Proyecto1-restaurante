<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurante</title>
</head>
<body>
     <?php
     require_once '../controller/sessionController.php';

     function mostrarSalasMesas(){
        include '../model/connection.php';
        $query = "SELECT * FROM sala";
        $sentencia=$pdo->prepare($query);
        $sentencia->execute();
        $salas=$sentencia->fetchAll(PDO::FETCH_ASSOC);

        foreach ($salas as $sala) {
            echo "<tr>";
            $nombre = $sala['nombre'];
            $id = $sala['id_sala'];
            $query1 = "SELECT COUNT(mesa.id_mesa) AS 'Ocupada' FROM mesa WHERE id_sala = $id AND fecha_inicio IS NOT NULL";
            $sentencia2=$pdo->prepare($query1);
            $sentencia2->execute();
            $mesas=$sentencia2->fetchAll(PDO::FETCH_ASSOC);

            $query2 = "SELECT COUNT(mesa.id_mesa) AS 'Libre' FROM mesa WHERE id_sala = $id AND fecha_inicio IS NULL";
            $sentencia3=$pdo->prepare($query2);
            $sentencia3->execute();
            $mesas1=$sentencia3->fetchAll(PDO::FETCH_ASSOC);

            echo "<td><a href='./admin_2.php?id={$id}'>".$nombre."</td>";
                foreach ($mesas as $mesa) {
                    $ocupada = $mesa['Ocupada'];
                    echo "<td style='text-align: center;'>".$ocupada."</td>";
            }

            foreach ($mesas1 as $mesa1) {
                $libre = $mesa1['Libre'];
                echo "<td style='text-align: center;'>".$libre."</td>";
                echo "</tr>";
        }

        }
    }
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
                mostrarSalasMesas();    
                ?>
        </table>
    </div>
</body>
</html>