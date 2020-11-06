<?php
    class MantenimientoDao{
        private $pdo;

        public  function __construct()
        {
            require_once 'connexion.php';
            $this->pdo=$pdo;
        }


        public function login($mantenimiento){
            $query = "SELECT * FROM tbl_mantenimiento WHERE email_mantenimiento=? AND pswd_mantenimiento=?";
            $sentencia=$this->pdo->prepare($query);
            $email=$mantenimiento->getEmail();
            $psswd=$mantenimiento->getPasswd();
            // echo $email;
            // echo $psswd;
            $sentencia->bindParam(1,$email);
            $sentencia->bindParam(2,$psswd);
            $sentencia->execute();
            $result=$sentencia->fetch(PDO::FETCH_ASSOC);
            $numRow=$sentencia->rowCount();

            if(!empty($numRow) && $numRow==1){
                $mantenimiento->setId($result['id_mantenimiento']);

                //Creamos la sesión
                session_start();
                $_SESSION['mantenimiento']=$mantenimiento;

                return true;
            }else {
                return false;
            }
        }

    }
?>