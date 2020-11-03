<?php
require_once '../model/connection.php';

session_start();

if (isset($_POST['sala']) || isset($_POST['mesa'])){
  $query="SELECT sala.nombre, mesa.numero_mesa, historico.fecha_inicio, historico.fecha_fin FROM historico INNER JOIN mesa ON historico.id_mesa = mesa.id_mesa INNER JOIN sala ON mesa.id_sala = sala.id_sala WHERE sala.nombre LIKE '%{$_POST['sala']}%' AND mesa.numero_mesa LIKE '%{$_POST['mesa']}%'";
  $query3="SELECT sala.nombre, mesa.numero_mesa, COUNT(numero_mesa) as veces_mesa FROM historico INNER JOIN mesa ON historico.id_mesa = mesa.id_mesa INNER JOIN sala ON mesa.id_sala = sala.id_sala WHERE sala.nombre LIKE '%{$_POST['sala']}%' AND mesa.numero_mesa LIKE '%{$_POST['mesa']}%' GROUP BY sala.nombre";
  $sentencia3=$pdo->prepare($query3);
  $sentencia3->execute();
  $num_reservas=$sentencia3->fetchAll(PDO::FETCH_ASSOC);
  print_r($num_reservas);
}else {
  $query="SELECT sala.nombre, mesa.numero_mesa, historico.fecha_inicio, historico.fecha_fin FROM historico INNER JOIN mesa ON historico.id_mesa = mesa.id_mesa INNER JOIN sala ON mesa.id_sala = sala.id_sala";
}

$sentencia=$pdo->prepare($query);
$sentencia->execute();
$lista_historico=$sentencia->fetchAll(PDO::FETCH_ASSOC);




?>

<form method="POST">
  <h1>FILTRAR</h1>
  <p>Sala: <input type="text" name="sala" size="40"></p>
  <p>Mesa: <input type="number" name="mesa" min="1" max="5"></p>
  
  <input type="submit" value="Filtrar" name="filtro">
</form>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Estadísticas</title>
</head>
<body>
      <?php
        if(isset($_POST['filtro'])) {
      ?>
          <h2>Resumen</h2>
          <table>
            <thead>
              <tr>
                <th>Nombre sala</th>
                <th>Mesa</th>
                <th>Nº de veces reservada</th>
              </tr>
            </thead>
            <tbody>
              <tr>
      <?php
          foreach($num_reservas as $num_reserva) {

      ?>
        <td><?php echo "{$num_reserva['nombre']}"; ?></td>
        <td><?php echo "{$num_reserva['numero_mesa']}"; ?></td>
        <td><?php echo "{$num_reserva['veces_mesa']}"; ?></td>
      </tr>
      <?php
        }
      }
      ?>
    </tbody>
  </table>
  <table>
    <thead>
      <tr>
        <th>Sala</th>
        <th>Mesa</th>
        <th>Fecha Inicio</th>
        <th>Fecha Fin</th>
      </tr>
    </thead>
    <tbody>

<?php

foreach($lista_historico as $historico) {

  ?>

  <tr>
    <td><?php echo "{$historico['nombre']}";?></td>
    <td><?php echo "{$historico['numero_mesa']}"; ?></td>
    <td><?php echo "{$historico['fecha_inicio']} "; ?></td>
    <td><?php echo "{$historico['fecha_fin']} "; ?></td>
  </tr>

<?php
    
}

?>

  </tbody>
</table>
</body>
</html>