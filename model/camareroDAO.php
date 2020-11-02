<?php
    class CamareroDao{
        private $pdo;

        public  function __construct()
        {
            require_once 'connexion.php';
            $this->pdo=$pdo;
        }

        public function login($admin){
            $query = "SELECT * FROM tbl_camarero WHERE email_camarero=? AND pswd_camarero=?";
            $sentencia=$this->pdo->prepare($query);
            $email=$admin->getEmail();
            $psswd=$admin->getPasswd();
            echo $email;
            echo $psswd;
            $sentencia->bindParam(1,$email);
            $sentencia->bindParam(2,$psswd);
            $sentencia->execute();
            $result=$sentencia->fetch(PDO::FETCH_ASSOC);
            $numRow=$sentencia->rowCount();

            if(!empty($numRow) && $numRow==1){
                $admin->setEmail($result['email_camarero']);
                $admin->getPasswd($result['pswd_camarero']);

                //Creamos la sesión
                session_start();
                $_SESSION['admin']=$admin;
                return true;
            }else {
                return false;
            }
        }
        

    }
?>