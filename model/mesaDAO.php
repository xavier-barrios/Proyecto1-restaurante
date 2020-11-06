<?php
class MesaDAO{

    public function __construct(){
    }

    public function mostrarMesas(){
        require_once '../model/connection.php';
        // Recogemos la variable del id_sala y el nombre del formulario.
        $id_sala = $_GET['id_sala'];
        $nombre = $_GET['nombre'];

        // Ejecutamos la query que nos va a mostrar todas las mesas del id_sala que le recogamos mediante el GET
        $query = "SELECT * FROM mesa WHERE id_sala = $id_sala";
        $sentencia=$pdo->prepare($query);
        $sentencia->execute();
        $salas=$sentencia->fetchAll(PDO::FETCH_ASSOC);

        // Si el id_usuario es NULL (es decir, que la mesa esta libre y no tiene ninguna reserva de ningun camarero) entonces mostramos que la mesa esta libre.
        function estado($salas) {
            if($salas['id_usuario'] == NULL) {
                return '<label class="libre">Libre</label>';
                // Si no, mostramos con un label que la mesa esta ocupada.
            } else {
                return '<label class="ocupada">Ocupada</label>';
            }
        }
        
        function actualizar($salas) {
            // Si el id del usuario esta en NULL, entonces añadimos el boton de ocupar.
            if($salas['id_usuario'] == NULL) {
                return 'Ocupar';
                // Si no, mostramos el botón de Liberar, lo que indica que esa mesa estaria ocupada por un id_usuario.
            } else {
                return 'Liberar';
            }
        }
        foreach($salas as $sala) {
            // Volvemos a recoger el id de la mesa para poder mostrar los datos por pantalla en formato tabla.
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