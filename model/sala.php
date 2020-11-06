<?php
// Creamos la clase Sala que contiene todos los atributos de la base de datos
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
}
?>