<?php
abstract class Persona{
    private $id_ad; 

    private $email;
    private $passwd;

    public function __construct($email, $passwd){
        $this->email=$email;
        $this->passwd=$passwd;
    }
  
    /**
     * Get the value of id_ad
     */ 
    public function getId_ad()
    {
        return $this->id_ad;

    }

    /**
     * Set the value of id_ad
     *
     * @return  self
     */ 
    public function setId_ad($id)
    {
        $this->id = $id_ad;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }
    public function mostrarEmail(){
        echo $this->email;
    }
    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of passwd
     */ 
    public function getPasswd()
    {
        return $this->passwd;
    }

    /**
     * Set the value of passwd
     *
     * @return  self
     */ 
    public function setPasswd($passwd)
    {
        $this->passwd = $passwd;

        return $this;
    }
}

?>