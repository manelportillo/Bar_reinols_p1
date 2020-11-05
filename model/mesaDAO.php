<?php 
require_once 'mesa.php';

class MesaDAO{


    private $pdo;

    public  function __construct(){
        require_once 'connexion.php';
        $this->pdo=$pdo;
    }

    public function mostrar(){

        $sql="SELECT * FROM tbl_mesa INNER JOIN tbl_ubicacion ON tbl_mesa.id_ubicacion = tbl_ubicacion.id_ubicacion ORDER BY id_mesa ASC";
        $sentencia=$this->pdo->prepare($sql);
        $sentencia->execute();

        $lista_mesas=$sentencia->fetchAll(PDO::FETCH_ASSOC);


        echo "<h1>Mesas</h1>";
        echo "<div class='container'>";
        foreach ($lista_mesas as $mesa) {
            echo "<div class='item'>";
            $id=$mesa['id_mesa']." ";
            echo "<p>{$mesa['capacidad_mesa']}"." Comensales</p> <br>";
            echo "<p class='Disponibilidad'>{$mesa['Disponibilidad']}</p><br>";
            echo "<p>{$mesa['Nombre_ubicacion']}</p><br>";
            echo "<form action='zona_camarero.php?id_de_la_mesa={$id}' method='POST'>";
            echo "<select name='Disponibilidad'>";
            echo "<option value='Disponible'>Disponible</option> ";
            echo "<option value='Reservada'>Reservada</option> ";
            echo "<option value='Mantenimiento'>Mantenimiento</option> ";
            echo "</select>";
            echo "<input type='submit' value='Submit'>";
            // echo "</p>";
            echo "</form>";
            
            echo "</div>";
        }

        echo "</div>";
        
    }

    public function filtrarMesas($num_comensales,$disponibilidad,$ubicavion){

        $sql="SELECT DISTINCT * FROM tbl_mesa INNER JOIN tbl_ubicacion ON tbl_mesa.id_ubicacion = tbl_ubicacion.id_ubicacion WHERE tbl_mesa.capacidad_mesa=? AND tbl_mesa.Disponibilidad=? AND tbl_ubicacion.id_ubicacion=? ;";
        // echo $num_comensales;
        // echo $disponibilidad;
        // echo $ubicavion;
        $sentencia=$this->pdo->prepare($sql);
        $sentencia->bindParam(1,$num_comensales);
        $sentencia->bindParam(2,$disponibilidad);
        $sentencia->bindParam(3,$ubicavion);
        

        $sentencia->execute();

        $lista_mesas=$sentencia->fetchAll(PDO::FETCH_ASSOC);


        echo "<h1>Mesas</h1>";
        echo "<div class='container'>";
        foreach ($lista_mesas as $mesa) {
            echo "<div class='item'>";
            $id=$mesa['id_mesa']." ";
            echo "<p>{$mesa['capacidad_mesa']}"." Comensales</p> <br>";
            echo "<p class='Disponibilidad'>{$mesa['Disponibilidad']}</p><br>";
            echo "<p>{$mesa['Nombre_ubicacion']}</p><br>";
            echo "<form action='zona_camarero.php?id_de_la_mesa={$id}' method='POST'>";
            echo "<select name='Disponibilidad'>";
            echo "<option value='Disponible'>Disponible</option> ";
            echo "<option value='Reservada'>Reservada</option> ";
            echo "<option value='Mantenimiento'>Mantenimiento</option> ";
            echo "</select>";
            echo "<input type='submit' value='Submit'>";
            // echo "</p>";
            echo "</form>";
            
            echo "</div>";
        }

        echo "</div>";

    }

    public function update(){
        $estado=$_POST['Disponibilidad'];
        $id_mesa=$_GET['id_de_la_mesa'];
        if ($estado == 'Disponible' || 'Reservada') {
            $query="UPDATE tbl_mesa SET Disponibilidad = ? WHERE tbl_mesa.id_mesa = $id_mesa";
            $sentencia=$this->pdo->prepare($query);
            $sentencia->bindParam(1,$estado);
            $sentencia->execute();
            header ("Location: zona_camarero.php");
        } else {
            // header ("Location: zona_pruebas.php");
        }

    }

    

}
           

?>

