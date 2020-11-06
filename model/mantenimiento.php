<?php 
    require_once 'persona.php';
    class Mantenimiento extends Persona{   
        public function __construct($email,$passwd)
        {
            parent::__construct($email,$passwd);
        }
    }