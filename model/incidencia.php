<?php
class Incidencia {
    private $nombre_incidencia;
    private $descripcion;

    public function __construct($nombre_incidencia, $descripcion){
        $this->nombre_incidencia=$nombre_incidencia;
        $this->descripcion=$descripcion;
    }

    /**
     * Get the value of nombre_incidencia
     */ 
    public function getNombre_incidencia()
    {
        return $this->nombre_incidencia;
    }

    /**
     * Set the value of nombre_incidencia
     *
     * @return  self
     */ 
    public function setNombre_incidencia($nombre_incidencia)
    {
        $this->nombre_incidencia = $nombre_incidencia;

        return $this;
    }

    /**
     * Get the value of descripcion
     */ 
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set the value of descripcion
     *
     * @return  self
     */ 
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }
}

?>