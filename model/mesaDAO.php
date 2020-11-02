<?php 
require_once 'mesa.php';
class AlumnoDAO{
    private $pdo;

    public function mostrar(){
        include 'connection.php';
        $sql="SELECT * FROM tbl_mesas";
        $sentencia=$pdo->prepare($sql);
        $sentencia->execute();

        $lista_mesas=$sentencia->fetchAll(PDO::FETCH_ASSOC);

        foreach ($lista_mesas as $mesa) {
            $id=$mesas['id_mesas']." ";
            echo "{$mesa['numero_mesa']}<br>";
        }
    }
}