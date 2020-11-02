<?php
    class CamareroDao{
        private $pdo;

        public  function __construct()
        {
            require_once 'connexion.php';
            $this->pdo=$pdo;
        }

        public function login($admin){
            $query = "SELECT * FROM tbl_administrador WHERE email_admin=? AND password_admin=?";
            $sentencia=$this->pdo->prepare($query);
            $email=$admin->getEmail();
            $psswd=$admin->getPasswd();
            $sentencia->bindParam(1,$email);
            $sentencia->bindParam(2,$psswd);
            $sentencia->execute();
            $result=$sentencia->fetch(PDO::FETCH_ASSOC);
            $numRow=$sentencia->rowCount();

            if(!empty($numRow) && $numRow==1){
                $admin->setEmail($result['email_admin']);
                $admin->getPasswd($result['password_admin']);

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