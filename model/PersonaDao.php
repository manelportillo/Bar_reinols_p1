<?php
    class PersonaDao{
        private $pdo;

        public  function __construct()
        {
            require_once 'connexion.php';
            $this->pdo=$pdo;
        }

        public function buscarPrivilegios($email, $passwd){

            $profile = $this->pdo->prepare("SELECT `id_profile` FROM `tbl_usuario` WHERE `email`='{$email}' AND `passwd`='{$passwd}';");
            $profile->execute();

            $array = $profile->fetch(PDO::FETCH_ASSOC);

            //cogemos el valor que se encuentra dentro de la array y lo pasamos a una variable llamada $num recoginedo el valor que se ecuentra en la array indicando el nombre de la columna.
            $num= $array['id_profile'];
            // print_r($array);
            // echo $num;
            return $num;
        }

        public function login_admin($admin){
            $query = "SELECT * FROM tbl_usuario WHERE email=? AND passwd=?";
            $sentencia=$this->pdo->prepare($query);
            $email=$admin->getEmail();
            $psswd=$admin->getPasswd();
            // echo $email;
            // echo $psswd;
            $sentencia->bindParam(1,$email);
            $sentencia->bindParam(2,$psswd);
            $sentencia->execute();
            $result=$sentencia->fetch(PDO::FETCH_ASSOC);
            $numRow=$sentencia->rowCount();

            if(!empty($numRow) && $numRow==1){
                $admin->setId($result['id_admin']);

                //Creamos la sesión
                session_start();
                $_SESSION['admin']=$admin;

                return true;
            }else {
                return false;
            }
        }

        public function login_camarero($camarero){
            $query = "SELECT * FROM tbl_usuario WHERE email=? AND passwd=?";
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

        public function login_mantenimiento($mantenimiento){
            $query = "SELECT * FROM tbl_usuario WHERE email=? AND passwd=?";
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