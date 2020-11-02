<?php
    class Sala {
        private $id_sala;
        private $nombre;
        private $capacidad;
        private $mesas;

        function __construct(){

        }


        /**
         * Get the value of id_sala
         */ 
        public function getId_sala()
        {
                return $this->id_sala;
        }

        /**
         * Set the value of id_sala
         *
         * @return  self
         */ 
        public function setId_sala($id_sala)
        {
                $this->id_sala = $id_sala;

                return $this;
        }

        /**
         * Get the value of nombre
         */ 
        public function getNombre()
        {
                return $this->nombre;
        }

        /**
         * Set the value of nombre
         *
         * @return  self
         */ 
        public function setNombre($nombre)
        {
                $this->nombre = $nombre;

                return $this;
        }

        /**
         * Get the value of capacidad
         */ 
        public function getCapacidad()
        {
                return $this->capacidad;
        }

        /**
         * Set the value of capacidad
         *
         * @return  self
         */ 
        public function setCapacidad($capacidad)
        {
                $this->capacidad = $capacidad;

                return $this;
        }

        /**
         * Get the value of mesas
         */ 
        public function getMesas()
        {
                return $this->mesas;
        }

        /**
         * Set the value of mesas
         *
         * @return  self
         */ 
        public function setMesas($mesas)
        {
                $this->mesas = $mesas;

                return $this;
        }

        public function mostrarSalasMesas(){
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
}
?>