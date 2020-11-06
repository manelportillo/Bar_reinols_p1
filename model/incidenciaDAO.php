<?php
class incidenciaDAO {
    private $pdo;

    public  function __construct()
    {
        require_once 'connexion.php';
        $this->pdo=$pdo;
    }

    public function registrar_incidencia($mesa){
        $nombre_incidencia=$_POST['Nombre_incidencia'];
        $descripcion=$_POST['descripcion'];
        $query="INSERT INTO tbl_incidencia (nombre_incidencia, descripcion_incidencia, id_mantenimiento, id_mesa) VALUES (?, ?, 1, ?)";
        $sentencia=$this->pdo->prepare($query);
        $sentencia->bindParam(1,$nombre_incidencia);
        $sentencia->bindParam(2,$descripcion);
        $sentencia->bindParam(3,$mesa);
        $sentencia->execute();
        header('Location: ../view/zona_camarero.php');
    }
}
?>