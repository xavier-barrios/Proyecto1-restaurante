<?php
require_once 'mesa.php';
// require_once '../model/connection.php';
// require_once 'user.php';
// if (!isset($_SESSION['user'])) {
//     header('Location:../view/login.php');
// }
class MesaDAO{

    public function __construct(){
    }

    public function mostrarMesas(){
        require_once '../model/connection.php';
        $id_sala = $_GET['id_sala'];
        $nombre = $_GET['nombre'];

        $query = "SELECT * FROM mesa WHERE id_sala = $id_sala";
        $sentencia=$pdo->prepare($query);
        $sentencia->execute();
        $salas=$sentencia->fetchAll(PDO::FETCH_ASSOC);

        function estado($salas) {
            if($salas['id_usuario'] == NULL) {
                return '<label class="libre">Libre</label>';
            } else {
                return '<label class="ocupada">Ocupada</label>';
            }
        }
        
        function actualizar($salas) {
            if($salas['id_usuario'] == NULL) {
                return 'Ocupar';
            } else {
                return 'Liberar';
            }
        }
        foreach($salas as $sala) {
            $id = $sala['id_mesa'];
            $actualizar = actualizar($sala);
            echo "<tr>";
            echo "<td>{$sala['numero_mesa']}</td>";
            echo "<td>{$sala['sillas_mesa']}</td>";
            echo "<td>".estado($sala)."</td>";
            echo "<td><a href='../controller/admin2Controller.php?id=$id&act=$actualizar&nombre={$nombre}'>".$actualizar."</a></td>";
            echo "</tr>";
        }
    }
}
?>