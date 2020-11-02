<?php
class Reserva {
    private $id_historico;
    private $fecha_ini;
    private $fecha_fin;
    private $id_mesa;
    private $id_usuario;
    private $id_sala;
    private $sillas_mesa;

    public function __construct(){
    }

    /**
     * Get the value of id_historico
     */ 
    public function getId_historico()
    {
        return $this->id_historico;
    }

    /**
     * Set the value of id_historico
     *
     * @return  self
     */ 
    public function setId_historico($id_historico)
    {
        $this->id_historico = $id_historico;

        return $this;
    }

    /**
     * Get the value of fecha_ini
     */ 
    public function getFecha_ini()
    {
        return $this->fecha_ini;
    }

    /**
     * Set the value of fecha_ini
     *
     * @return  self
     */ 
    public function setFecha_ini($fecha_ini)
    {
        $this->fecha_ini = $fecha_ini;

        return $this;
    }

    /**
     * Get the value of fecha_fin
     */ 
    public function getFecha_fin()
    {
        return $this->fecha_fin;
    }

    /**
     * Set the value of fecha_fin
     *
     * @return  self
     */ 
    public function setFecha_fin($fecha_fin)
    {
        $this->fecha_fin = $fecha_fin;

        return $this;
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
}
?>