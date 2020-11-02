<?php 
require_once 'mesa.php';
class MesaDAO{
    private $pdo;

    public  function __construct(){
        require_once 'connexion.php';
        $this->pdo=$pdo;
    }

    public function mostrar(){
        $sql="SELECT * FROM tbl_mesa";
        $sentencia=$this->pdo->prepare($sql);
        $sentencia->execute();

        $lista_mesas=$sentencia->fetchAll(PDO::FETCH_ASSOC);

        foreach ($lista_mesas as $mesa) {
            $id=$mesa['id_mesa']." ";
            echo "{$mesa['capacidad_mesa']}"." ";
            echo "{$mesa['Disponibilidad']}". " ";
            echo "{$mesa['id_ubicacion']}<br>";
        }
    }
}