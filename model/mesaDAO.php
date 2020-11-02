<?php 
require_once 'mesa.php';
class AlumnoDAO{
    private $pdo;

    public  function __construct(){
        require_once 'connexion.php';
        $this->pdo=$pdo;
    }

    public function mostrar(){
        $sql="SELECT * FROM tbl_mesas";
        $sentencia=$pdo->prepare($sql);
        $sentencia->execute();

        $lista_mesas=$sentencia->fetchAll(PDO::FETCH_ASSOC);

        foreach ($lista_mesas as $mesa) {
            $id=$mesas['id_mesas']." ";
            echo "{$mesa['capacidad_mesa']}"." ";
            echo "{$mesa['Disponibilidad']}". " ";
            echo "{$mesa['id_ubicacion']}<br>";
        }
    }
}