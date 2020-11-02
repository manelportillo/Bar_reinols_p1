<?php

class Mesa{
    private $id_mesa;
    private $capacidad_mesa;
    private $Disponibilidad;
    private $id_ubicacion;

    public function __construct($id_mesa,$capacidad_mesa,$Disponibilidad,$id_ubicacion){
        $this->id_mesa=$id_mesa;
        $this->capacidad_mesa=$capacidad_mesa;
        $this->Disponibilidad=$Disponibilidad;
        $this->id_ubicacion=$id_ubicacion;
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
     * Get the value of capacidad_mesa
     */ 
    public function getCapacidad_mesa()
    {
        return $this->capacidad_mesa;
    }

    /**
     * Set the value of capacidad_mesa
     *
     * @return  self
     */ 
    public function setCapacidad_mesa($capacidad_mesa)
    {
        $this->capacidad_mesa = $capacidad_mesa;

        return $this;
    }

    /**
     * Get the value of Disponibilidad
     */ 
    public function getDisponibilidad()
    {
        return $this->Disponibilidad;
    }

    /**
     * Set the value of Disponibilidad
     *
     * @return  self
     */ 
    public function setDisponibilidad($Disponibilidad)
    {
        $this->Disponibilidad = $Disponibilidad;

        return $this;
    }

    /**
     * Get the value of id_ubicacion
     */ 
    public function getId_ubicacion()
    {
        return $this->id_ubicacion;
    }

    /**
     * Set the value of id_ubicacion
     *
     * @return  self
     */ 
    public function setId_ubicacion($id_ubicacion)
    {
        $this->id_ubicacion = $id_ubicacion;

        return $this;
    }
}