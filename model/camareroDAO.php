<?php
    class CamareroDao{
        private $pdo;

        public  function __construct()
        {
            require_once 'connexion.php';
            $this->pdo=$pdo;
        }


        public function login($camarero){
            $query = "SELECT * FROM tbl_camarero WHERE email_camarero=? AND pswd_camarero=?";
            $sentencia=$this->pdo->prepare($query);
            $email=$camarero->getEmail();
            $psswd=$camarero->getPasswd();
            // echo $email;
            // echo $psswd;
            $sentencia->bindParam(1,$email);
            $sentencia->bindParam(2,$psswd);
            $sentencia->execute();
            $result=$sentencia->fetch(PDO::FETCH_ASSOC);
            $numRow=$sentencia->rowCount();

            if(!empty($numRow) && $numRow==1){
                $camarero->setId($result['id_camarero']);

                //Creamos la sesión
                session_start();
                $_SESSION['camarero']=$camarero;

                return true;
            }else {
                return false;
            }
        }

    }
?>