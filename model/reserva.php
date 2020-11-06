<?php 
class Reserva {
    private $id_reserva;
    private $fecha_reserva;
    private $id_mesa;
    private $id_camarero;
    private $hora_inicial_reserva;
    private $hora_final_reserva;
    public static $mesa_mas_reservas;

    public function __construct($hora_final_reserva, $hora_inicial_reserva, $id_camarero, $id_mesa, $fecha_reserva, $id_reserva) {
        $this->id_reserva=$id_reserva;
        $this->fecha_reserva=$fecha_reserva;
        $this->id_mesa=$id_mesa;
        $this->id_camarero=$id_camarero;
        $this->hora_inicial_reserva=$hora_inicial_reserva;
        $this->hora_final_reserva=$hora_final_reserva;
    }

    /**
     * Get the value of id_reserva
     */ 
    public function getId_reserva()
    {
        return $this->id_reserva;
    }

    /**
     * Set the value of id_reserva
     *
     * @return  self
     */ 
    public function setId_reserva($id_reserva)
    {
        $this->id_reserva = $id_reserva;

        return $this;
    }

    /**
     * Get the value of fecha_reserva
     */ 
    public function getFecha_reserva()
    {
        return $this->fecha_reserva;
    }

    /**
     * Set the value of fecha_reserva
     *
     * @return  self
     */ 
    public function setFecha_reserva($fecha_reserva)
    {
        $this->fecha_reserva = $fecha_reserva;

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
     * Get the value of id_camarero
     */ 
    public function getId_camarero()
    {
        return $this->id_camarero;
    }

    /**
     * Set the value of id_camarero
     *
     * @return  self
     */ 
    public function setId_camarero($id_camarero)
    {
        $this->id_camarero = $id_camarero;

        return $this;
    }

    /**
     * Get the value of hora_inicial_reserva
     */ 
    public function getHora_inicial_reserva()
    {
        return $this->hora_inicial_reserva;
    }

    /**
     * Set the value of hora_inicial_reserva
     *
     * @return  self
     */ 
    public function setHora_inicial_reserva($hora_inicial_reserva)
    {
        $this->hora_inicial_reserva = $hora_inicial_reserva;

        return $this;
    }

    /**
     * Get the value of hora_final_reserva
     */ 
    public function getHora_final_reserva()
    {
        return $this->hora_final_reserva;
    }

    /**
     * Set the value of hora_final_reserva
     *
     * @return  self
     */ 
    public function setHora_final_reserva($hora_final_reserva)
    {
        $this->hora_final_reserva = $hora_final_reserva;

        return $this;
    }
}
?>