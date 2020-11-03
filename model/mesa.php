<?php
require_once '../model/connection.php';
require_once '../model/user.php';
if (!isset($_SESSION['user'])) {
    header('Location:../view/login.php');
}
    class Mesa {
        private $id_mesa;
        private $numero_mesa;
        private $id_sala;
        private $sillas_mesa;
        private $fecha_inicio;
        private $id_usuario;

    function __construct() {
        }


        /**
         * Get the value of id_mesa
         */ 
        public function getId_mesa()
        {
                return $this->id_mesa;
        }

        /**
         * Set the value of id_mesa
         *
         * @return  self
         */ 
        public function setId_mesa($id_mesa)
        {
                $this->id_mesa = $id_mesa;

                return $this;
        }

        /**
         * Get the value of numero_mesa
         */ 
        public function getNumero_mesa()
        {
                return $this->numero_mesa;
        }

        /**
         * Set the value of numero_mesa
         *
         * @return  self
         */ 
        public function setNumero_mesa($numero_mesa)
        {
                $this->numero_mesa = $numero_mesa;

                return $this;
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
         * Get the value of sillas_mesa
         */ 
        public function getSillas_mesa()
        {
                return $this->sillas_mesa;
        }

        /**
         * Set the value of sillas_mesa
         *
         * @return  self
         */ 
        public function setSillas_mesa($sillas_mesa)
        {
                $this->sillas_mesa = $sillas_mesa;

                return $this;
        }

        /**
         * Get the value of fecha_inicio
         */ 
        public function getFecha_inicio()
        {
                return $this->fecha_inicio;
        }

        /**
         * Set the value of fecha_inicio
         *
         * @return  self
         */ 
        public function setFecha_inicio($fecha_inicio)
        {
                $this->fecha_inicio = $fecha_inicio;

                return $this;
        }

        /**
         * Get the value of id_usuario
         */ 
        public function getId_usuario()
        {
                return $this->id_usuario;
        }

        /**
         * Set the value of id_usuario
         *
         * @return  self
         */ 
        public function setId_usuario($id_usuario)
        {
                $this->id_usuario = $id_usuario;

                return $this;
        }

}

?>