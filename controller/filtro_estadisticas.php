<?php
require_once '../model/connection.php';

session_start();

if (isset($_POST['filtro'])){
  $sala = $_POST['sala'];
  $mesa = $_POST['mesa'];
  $query="SELECT sala.nombre as Sala, mesa.numero_mesa as Mesa from sala inner join mesa on sala.id_sala=mesa.id_sala";
}else {
  $query="SELECT * FROM tbl_alumnos";
}

?>

<form method="POST">
    <h1>FILTARAR</h1>
    <p>Sala: <input type="text" name="sala" size="40"></p>
    <p>Mesa: <input type="number" name="mesa" min="1" max="5"></p>
    
    <input type="submit" value="Filtrar" name="filtro">
</form>
