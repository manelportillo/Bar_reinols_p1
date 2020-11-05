<?php

class MesaDAO{


    private $pdo;

    public  function __construct(){
        require_once 'connexion.php';
        $this->pdo=$pdo;
    }

    public function mostrar(){

        $sql="SELECT tbl_mesa.*, tbl_ubicacion.Nombre_ubicacion, tbl_camarero.id_camarero FROM tbl_camarero INNER JOIN tbl_reserva ON tbl_camarero.id_camarero = tbl_reserva.id_camarero INNER JOIN tbl_mesa ON tbl_reserva.id_mesa = tbl_mesa.id_mesa INNER JOIN tbl_ubicacion ON tbl_mesa.id_ubicacion = tbl_ubicacion.id_ubicacion ORDER BY tbl_mesa.id_mesa ASC";
        $sentencia=$this->pdo->prepare($sql);
        $sentencia->execute();

        $lista_mesas=$sentencia->fetchAll(PDO::FETCH_ASSOC);

        echo "<h1>Mesas</h1>";
        echo "<div class='container'>";
        foreach ($lista_mesas as $mesa) {
            
            $id=$mesa['id_mesa']." ";
            echo "<div id='item{$id}' class='item'>";
            echo "<p>{$mesa['capacidad_mesa']}"." Comensales</p> <br>";
            echo "<p class='Disponibilidad'>{$mesa['Disponibilidad']}</p><br>";
            echo "<p>{$mesa['Nombre_ubicacion']}</p><br>";
            echo "<form action='../view/zona_camarero.php?id_de_la_mesa={$id}' method='POST'>";
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
            echo "<form action='../view/zona_camarero.php?id_de_la_mesa={$id}' method='POST'>";
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
        $id_camarero=$_SESSION['camarero']->getId();
        if ($estado == 'Reservada') {
            $this->pdo->beginTransaction(); 
            try{
                
                $query="UPDATE tbl_mesa SET Disponibilidad = ? WHERE tbl_mesa.id_mesa = $id_mesa";
                $sentencia=$this->pdo->prepare($query);
                $sentencia->bindParam(1,$estado);
                $sentencia->execute();
                $query="INSERT INTO tbl_reserva (Fecha_reserva, id_mesa, id_camarero, Hora_incio_reserva) VALUES (CURRENT_DATE, ?, ?, CURRENT_TIME);";
                $sentencia=$this->pdo->prepare($query);
                $sentencia->bindParam(1,$id_mesa);
                $sentencia->bindParam(2,$id_camarero);
                $sentencia->execute();
                
                header ("Location:../view/zona_camarero.php");
            }catch (Exception $ex){
                    /* Reconocer un error y no hacer los cambios */
                     $this->pdo->rollback();
                    echo $ex->getMessage();
            } 
            $this->pdo->commit();
        }else if($estado == 'Disponible'){
            $this->pdo->beginTransaction(); 
            try{              
                $query="UPDATE tbl_mesa SET Disponibilidad = ? WHERE tbl_mesa.id_mesa = $id_mesa";
                $sentencia=$this->pdo->prepare($query);
                $sentencia->bindParam(1,$estado);
                $sentencia->execute();
                $query="UPDATE tbl_reserva SET Hora_final_reserva = CURRENT_TIME WHERE id_mesa = $id_mesa ";
                
                $sentencia=$this->pdo->prepare($query);
                $sentencia->execute();              
                header ("Location:../view/zona_camarero.php");
            }catch (Exception $ex){
                    /* Reconocer un error y no hacer los cambios */
                     $this->pdo->rollback();
                    echo $ex->getMessage();
            } 
            $this->pdo->commit();        
        }else {
            // header ("Location: zona_pruebas.php");
        }

    }

    

}
           

?>

