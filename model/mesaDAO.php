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
            echo "<div class='item'";
            $id=$mesa['id_mesa']." ";
            echo "<p>{$mesa['capacidad_mesa']}"." Comensales <br>";
            echo "{$mesa['Disponibilidad']}<br>";

            echo "{$mesa['Nombre_ubicacion']}</p>";
            echo "</div>";
        }

        echo "</div>";
      
         echo "{$mesa['Nombre_ubicacion']}<br>"
        
    }

    public function filtrarMesas($num_comensales,$disponibilidad,$ubicavion){

        $sql="SELECT DISTINCT * FROM tbl_mesa INNER JOIN tbl_ubicacion ON tbl_mesa.id_ubicacion = tbl_ubicacion.id_ubicacion WHERE tbl_mesa.capacidad_mesa=? AND tbl_mesa.Disponibilidad=? AND tbl_ubicacion.id_ubicacion=? ;";
        echo $num_comensales;
        echo $disponibilidad;
        echo $ubicavion;
        $sentencia=$this->pdo->prepare($sql);
        $sentencia->bindParam(1,$num_comensales);
        $sentencia->bindParam(2,$disponibilidad);
        $sentencia->bindParam(3,$ubicavion);
        
        $sentencia->execute();

        $lista_mesas=$sentencia->fetchAll(PDO::FETCH_ASSOC);

        echo "<h1>Mesas</h1>";
        echo "<div class='container'>";

        foreach ($lista_mesas as $mesa) {
            echo "<div class='item'";
            $id=$mesa['id_mesa']." ";
            echo "<p>{$mesa['capacidad_mesa']}"." Comensales <br>";
            echo "{$mesa['Disponibilidad']}<br>";
            echo "{$mesa['Nombre_ubicacion']}</p>";
            echo "</div>";
        }
        echo "</div>";

    }

}
           

?>
          <form action="cambiarEstado.php?id={$id}" method="GET">
          <input type="text" value=<?php echo $id?>>
          <select name="estado">
              <option value="Disponible">Disponible</option> 
              <option value="Reservada">Reservada</option> 
              <option value="Mantenimiento">Mantenimiento</option>
          </select>
          <input type="submit" value="Cambiar" name="cambiar"><br><br>
          <?php
          // echo "<button><a href='cambiarEstado.php?id={$id}'><br>";
          echo "</div>";
