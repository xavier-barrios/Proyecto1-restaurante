<?php
require_once 'mesa.php';
class MesaDAO{

    public function __construct(){
    }
    
    public function filtrarEstadisticas(){
        
    }

    public function mostrarMesas(){
        require_once '../model/connection.php';

        // OJO
        $id_sala = $_GET['id_sala'];
        // FIN OJO

        $query = "SELECT * FROM mesa WHERE id_sala = $id_sala";
        $sentencia=$pdo->prepare($query);
        $sentencia->execute();
        $salas=$sentencia->fetchAll(PDO::FETCH_ASSOC);
        // print_r($salas);

        function estado($salas) {
            if($salas['id_usuario'] == NULL) {
                return 'Libre';
            } else {
                return 'Ocupada';
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
            echo "<td><a href='../controller/admin2Controller.php?id=$id&act=$actualizar'>".$actualizar."</a></td>";
            echo "</tr>";
        }
    }
}
?>