<?php
require_once 'historico.php';
// require_once '../model/connection.php';
// require_once 'user.php';
// if (!isset($_SESSION['user'])) {
//     header('Location:../view/login.php');
// }
class HistoricoDAO{

    public function __construct(){
    }
    
    public function filtrarHistorico(){
        require_once '../model/connection.php';
        if (isset($_POST['sala']) || isset($_POST['mesa'])){
            $query="SELECT sala.nombre, mesa.numero_mesa, historico.fecha_inicio, historico.fecha_fin FROM historico INNER JOIN mesa ON historico.id_mesa = mesa.id_mesa INNER JOIN sala ON mesa.id_sala = sala.id_sala WHERE sala.nombre LIKE '%{$_POST['sala']}%' AND mesa.numero_mesa LIKE '%{$_POST['mesa']}%'";
            $query3="SELECT sala.nombre, mesa.numero_mesa, COUNT(numero_mesa) as veces_mesa FROM historico INNER JOIN mesa ON historico.id_mesa = mesa.id_mesa INNER JOIN sala ON mesa.id_sala = sala.id_sala WHERE sala.nombre LIKE '%{$_POST['sala']}%' AND mesa.numero_mesa LIKE '%{$_POST['mesa']}%' GROUP BY sala.nombre, mesa.numero_mesa";
            $sentencia3=$pdo->prepare($query3);
            $sentencia3->execute();
            $num_reservas=$sentencia3->fetchAll(PDO::FETCH_ASSOC);
            $numRow=$sentencia3->rowCount();
          }else {
            $query="SELECT sala.nombre, mesa.numero_mesa, historico.fecha_inicio, historico.fecha_fin FROM historico INNER JOIN mesa ON historico.id_mesa = mesa.id_mesa INNER JOIN sala ON mesa.id_sala = sala.id_sala";
          }
          
          $sentencia=$pdo->prepare($query);
          $sentencia->execute();
          $lista_historico=$sentencia->fetchAll(PDO::FETCH_ASSOC);
          $numRow=$sentencia->rowCount();
          ?>
          
          <!DOCTYPE html>
          <html lang="es">
          <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Estadísticas</title>
            <link rel="stylesheet" href="../css/normalize.css">
            <link rel="stylesheet" href="../css/style.css">
            <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700;900&display=swap" rel="stylesheet">
          </head>
          <body class="historico">
                <?php
                  require_once 'header.html';
                ?>
                <form method="POST">
                  <h1>HISTÓRICO</h1>
                  <div class="historico-filtro">
                    <p>Sala: <input type="text" name="sala" size="40" placeholder="Escribe la sala..."></p>
                    <p>Mesa: <input type="number" name="mesa" min="1" max="5"></p>
                    <input type="submit" value="Filtrar" name="filtro">
                    <p class="indicaciones">Para ver el resumen completo pulse el botón </span>Filtrar</span> con los campos vacíos</p>
                  </div>
                </form>
                <?php
                
                  if(isset($_POST['filtro'])) {
                ?>
                
                <main class="main--admin container">
                  <div class="container-admin">
                    <h2>Resumen</h2>
                    <div class="admin--table">
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
                    if($numRow!=0) {
                      foreach($num_reservas as $num_reserva) {
                  ?>
                    <td><?php echo "{$num_reserva['nombre']}"; ?></td>
                    <td><?php echo "{$num_reserva['numero_mesa']}"; ?></td>
                    <td><?php echo "{$num_reserva['veces_mesa']}"; ?></td>
                  </tr>
                  <?php
                      }
                    }else {
                      echo "<td>0 resultados</td>";
                    }
                  }
                  ?>
                </tbody>    
              </table>
                  </div>
                  </div>
                </main>


                <main class="main--admin container">  
                  <div class="container-admin">
                    <div class="admin--table">
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
                    if($numRow!=0) {
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
                    }else {
                      echo "<td>0 resultados</td>";
                    }
                    
                    ?>
                    
                      </tbody>
                    </table>
                    </div>
                  </div>
                </main>    
          </body>
          </html>
          <?php
            }          
}
?>