<?php
require_once '../model/connection.php';

session_start();

if (isset($_POST['filtro'])){
  $sala = $_POST['sala'];
  $mesa = $_POST['mesa'];
  $query="SELECT sala.nombre, mesa.numero_mesa, historico.fecha_inicio, historico.fecha_fin FROM historico INNER JOIN mesa ON historico.id_mesa = mesa.id_mesa INNER JOIN sala ON mesa.id_sala = sala.id_sala WHERE sala.nombre LIKE '%".$sala."%' AND mesa.numero_mesa = $mesa";
}else {
  $query="SELECT sala.nombre, mesa.numero_mesa, historico.fecha_inicio, historico.fecha_fin FROM historico INNER JOIN mesa ON historico.id_mesa = mesa.id_mesa INNER JOIN sala ON mesa.id_sala = sala.id_sala";
}


?>

<form method="POST">
  <h1>FILTARAR</h1>
  <p>Sala: <input type="text" name="sala" size="40"></p>
  <p>Mesa: <input type="number" name="mesa" min="1" max="5"></p>
  
  <input type="submit" value="Filtrar" name="filtro">
</form>

<?php

$sentencia=$pdo->prepare($query);
$sentencia->execute();
$lista_historico=$sentencia->fetchAll(PDO::FETCH_ASSOC);
// print_r($lista_historico);

?>

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
  //$id=$persona['id_alumno'];
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