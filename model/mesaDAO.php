<?php
class MesaDAO{

    public function __construct(){
    }

    public function mostrarMesas(){
        require_once '../model/connection.php';
        // recogemos el id y el nombre de la sala 
        // el id lo recogemos para la consulta y el nombre porque se volvera a enniar para ser mostrado
        $id_sala = $_GET['id_sala'];
        $nombre = $_GET['nombre'];


        // Mesas sin incidencias
        $query = "SELECT * FROM mesa WHERE mesa.id_sala = $id_sala AND mesa.id_mesa NOT IN (SELECT incidencias.id_mesa FROM incidencias)";

        $sentencia=$pdo->prepare($query);
        $sentencia->execute();
        $salas=$sentencia->fetchAll(PDO::FETCH_ASSOC);

        // mesas con incidencias
        $query3 = "SELECT  mesa.id_usuario, mesa.id_mesa, mesa.numero_mesa, mesa.sillas_mesa FROM mesa INNER JOIN incidencias ON mesa.id_mesa = incidencias.id_mesa WHERE mesa.id_sala = $id_sala";
        $sentencia3=$pdo->prepare($query3);
        $sentencia3->execute();
        $mesas_incidencias=$sentencia3->fetchAll(PDO::FETCH_ASSOC);
        
        function mesas_incidencia_estado($mesas_incidencias) {
            return '<label class="incid">Incidencia</label>';
        }
      
        foreach($mesas_incidencias as $mesas_incidencia) {
            echo "<tr>";
            echo "<td>{$mesas_incidencia['numero_mesa']}</td>";
            echo "<td>{$mesas_incidencia['sillas_mesa']}</td>";
            echo "<td>".mesas_incidencia_estado($mesas_incidencia)."</td>";
            echo "</tr>";
        }
      
        // Si el id_usuario es NULL (es decir, que la mesa esta libre y no tiene ninguna reserva de ningun camarero) entonces mostramos que la mesa esta libre.

        function estado($salas) {
            // si el campo 
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

    public function mostrarMesasAdmin(){
        require_once '../model/connection.php';
        // recogemos el id y el nombre de la sala 
        // el id lo recogemos para la consulta y el nombre porque se volvera a enniar para ser mostrado
        $id_sala = $_GET['id_sala'];
        $nombre = $_GET['nombre'];

        $query = "SELECT mesa.id_mesa, numero_mesa, incidencias.id_mesa AS incidencia FROM `mesa` LEFT JOIN `incidencias` ON mesa.id_mesa = incidencias.id_mesa WHERE mesa.id_sala = $id_sala";
        $sentencia=$pdo->prepare($query);
        $sentencia->execute();
        $salas=$sentencia->fetchAll(PDO::FETCH_ASSOC);

        function estadoAdmin($salas) {
            // si el campo 
            if($salas['incidencia'] == NULL) {
                return '<label class="libre">Desbloqueada</label>';
            } else {
                return '<label class="ocupada">Bloqueada</label>';
            }
        }
        
        function actualizarAdmin($salas) {
            if($salas['incidencia'] == NULL) {
                return 'Bloquear';
            } else {
                return 'Desbloquear';
            }
        }
        foreach($salas as $sala) {
            $id = $sala['id_mesa'];
            $actualizar = actualizarAdmin($sala);
            echo "<tr>";
            echo "<td>{$sala['numero_mesa']}</td>";
            // echo "<td>{$sala['sillas_mesa']}</td>";
            echo "<td>".estadoAdmin($sala)."</td>";
            echo "<td><a href='../controller/man2Controller.php?id=$id&act=$actualizar&nombre={$nombre}'>".$actualizar."</a></td>";
            echo "</tr>";
        }
    }
}
?>