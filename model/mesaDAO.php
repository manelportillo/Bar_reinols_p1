<?php 
require_once 'mesa.php';
class MesaDAO{
    private $pdo;

    public  function __construct(){
        require_once 'connexion.php';
        $this->pdo=$pdo;
    }

    public function mostrar(){
        $sql="SELECT DISTINCT * FROM tbl_mesa INNER JOIN tbl_ubicacion ON tbl_mesa.id_ubicacion = tbl_ubicacion.id_ubicacion";
        $sentencia=$this->pdo->prepare($sql);
        $sentencia->execute();

        $lista_mesas=$sentencia->fetchAll(PDO::FETCH_ASSOC);

        foreach ($lista_mesas as $mesa) {
            echo "<div class='item'";
            $id=$mesa['id_mesa']." ";
            echo "<p>{$mesa['capacidad_mesa']}"." Comensales <br>";
            echo "{$mesa['Disponibilidad']}<br>";
            echo "{$mesa['Nombre_ubicacion']}</p>";
            echo "</div>";
        }
    }
}