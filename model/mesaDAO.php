<?php

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
            echo "</form>";
            
            echo "</div>";
            }
            ?>
            <script>
                var Mesa=document.getElementsByClassName('item');
                var Disponibilidad=document.getElementsByClassName('Disponibilidad');

                for (let i = 0; i < Mesa.length; i++) {
                    //alert(Mesa[i]);
                    //alert(Disponibilidad[i].innerHTML);

                    if(Disponibilidad[i].innerHTML == 'Disponible'){
                    Mesa[i].style.backgroundColor = "green";
                    }else if(Disponibilidad[i].innerHTML == 'Reservada'){
                    Mesa[i].style.backgroundColor = "red";
                    }else{
                    Mesa[i].style.backgroundColor = "grey";
                    }
                }
            </script>";
            <?php        
    }

    public function filtrarMesas(){

        if (isset($_POST['num_com']) && isset($_POST['disponibilidad']) && isset($_POST['ubicacion'])) {

            $num_comensales=$_POST['num_com'];
            $disponibilidad=$_POST['disponibilidad'];
            $ubicacion=$_POST['ubicacion'];
            echo $num_comensales;
            echo $disponibilidad;
            echo $ubicacion;


            $sql="SELECT DISTINCT * FROM tbl_mesa INNER JOIN tbl_ubicacion ON tbl_mesa.id_ubicacion = tbl_ubicacion.id_ubicacion WHERE tbl_mesa.capacidad_mesa=? AND tbl_mesa.Disponibilidad=? AND tbl_ubicacion.id_ubicacion=? ;";
            $sentencia=$this->pdo->prepare($sql);
            $sentencia->bindParam(1,$num_comensales);
            $sentencia->bindParam(2,$disponibilidad);
            $sentencia->bindParam(3,$ubicacion);
            

            $sentencia->execute();

            $lista_mesas=$sentencia->fetchAll(PDO::FETCH_ASSOC);

        }else if (isset($_POST['num_com']) && !isset($_POST['disponibilidad']) && !isset($_POST['ubicacion'])) {

            $num_comensales=$_POST['num_com'];
        
            $sql="SELECT DISTINCT * FROM tbl_mesa INNER JOIN tbl_ubicacion ON tbl_mesa.id_ubicacion = tbl_ubicacion.id_ubicacion WHERE tbl_mesa.capacidad_mesa=?;";
            $sentencia=$this->pdo->prepare($sql);
            $sentencia->bindParam(1,$num_comensales);


            $sentencia->execute();

            $lista_mesas=$sentencia->fetchAll(PDO::FETCH_ASSOC);

        }else if (!isset($_POST['num_com']) && isset($_POST['disponibilidad']) && !isset($_POST['ubicacion'])) {

            $disponibilidad=$_POST['disponibilidad'];

            $sql="SELECT DISTINCT * FROM tbl_mesa INNER JOIN tbl_ubicacion ON tbl_mesa.id_ubicacion = tbl_ubicacion.id_ubicacion WHERE tbl_mesa.Disponibilidad=?;";
            $sentencia=$this->pdo->prepare($sql);
            $sentencia->bindParam(1,$disponibilidad);
            $sentencia->execute();

            $lista_mesas=$sentencia->fetchAll(PDO::FETCH_ASSOC);

        }else if (!isset($_POST['num_com']) && !isset($_POST['disponibilidad']) && isset($_POST['ubicacion'])) {

            $ubicacion=$_POST['ubicacion'];

            $sql="SELECT DISTINCT * FROM tbl_mesa INNER JOIN tbl_ubicacion ON tbl_mesa.id_ubicacion = tbl_ubicacion.id_ubicacion WHERE tbl_ubicacion.id_ubicacion=? ;";
            $sentencia=$this->pdo->prepare($sql);
            $sentencia->bindParam(1,$ubicacion);
            $sentencia->execute();

            $lista_mesas=$sentencia->fetchAll(PDO::FETCH_ASSOC);

        }else if (isset($_POST['num_com']) && isset($_POST['disponibilidad']) && !isset($_POST['ubicacion'])) {

            $num_comensales=$_POST['num_com'];
            $disponibilidad=$_POST['disponibilidad'];

            $sql="SELECT DISTINCT * FROM tbl_mesa INNER JOIN tbl_ubicacion ON tbl_mesa.id_ubicacion = tbl_ubicacion.id_ubicacion WHERE tbl_mesa.capacidad_mesa=? AND tbl_mesa.Disponibilidad=? ;";
            $sentencia=$this->pdo->prepare($sql);
            $sentencia->bindParam(1,$num_comensales);
            $sentencia->bindParam(2,$disponibilidad);
            $sentencia->execute();

            $lista_mesas=$sentencia->fetchAll(PDO::FETCH_ASSOC);

        }else if (isset($_POST['num_com']) && !isset($_POST['disponibilidad']) && isset($_POST['ubicacion'])) {

            $num_comensales=$_POST['num_com'];
            $ubicacion=$_POST['ubicacion'];

            $sql="SELECT DISTINCT * FROM tbl_mesa INNER JOIN tbl_ubicacion ON tbl_mesa.id_ubicacion = tbl_ubicacion.id_ubicacion WHERE tbl_mesa.capacidad_mesa=? AND tbl_ubicacion.id_ubicacion=? ;";
            $sentencia=$this->pdo->prepare($sql);
            $sentencia->bindParam(1,$num_comensales);
            $sentencia->bindParam(2,$ubicacion);
            $sentencia->execute();

            $lista_mesas=$sentencia->fetchAll(PDO::FETCH_ASSOC);

        }else if (!isset($_POST['num_com']) && isset($_POST['disponibilidad']) && isset($_POST['ubicacion'])) {

            $disponibilidad=$_POST['disponibilidad'];
            $ubicacion=$_POST['ubicacion'];

            $sql="SELECT DISTINCT * FROM tbl_mesa INNER JOIN tbl_ubicacion ON tbl_mesa.id_ubicacion = tbl_ubicacion.id_ubicacion WHERE  tbl_mesa.Disponibilidad=? AND tbl_ubicacion.id_ubicacion=? ;";
            $sentencia=$this->pdo->prepare($sql);
            $sentencia->bindParam(1,$disponibilidad);
            $sentencia->bindParam(2,$ubicacion);
            $sentencia->execute();

            $lista_mesas=$sentencia->fetchAll(PDO::FETCH_ASSOC);
        }
      
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
            echo "</form>";
            
            echo "</div>";
            }
            ?>
            <script>
                var Mesa=document.getElementsByClassName('item');
                var Disponibilidad=document.getElementsByClassName('Disponibilidad');

                for (let i = 0; i < Mesa.length; i++) {
                    //alert(Mesa[i]);
                    //alert(Disponibilidad[i].innerHTML);

                    if(Disponibilidad[i].innerHTML == 'Disponible'){
                    Mesa[i].style.backgroundColor = "green";
                    }else if(Disponibilidad[i].innerHTML == 'Reservada'){
                    Mesa[i].style.backgroundColor = "red";
                    }else{
                    Mesa[i].style.backgroundColor = "grey";
                    }
                }
            </script>";
            <?php
    }

    public function update(){
        $estado=$_POST['Disponibilidad'];
        $id_mesa=$_GET['id_de_la_mesa'];
        if ($estado == 'Disponible' || 'Reservada') {
            $query="UPDATE tbl_mesa SET Disponibilidad = ? WHERE tbl_mesa.id_mesa = $id_mesa";
            $sentencia=$this->pdo->prepare($query);
            $sentencia->bindParam(1,$estado);
            $sentencia->execute();
            header ("Location:../view/zona_camarero.php");
        } else {
            // header ("Location: zona_pruebas.php");
        }

    }

    

}
           

?>

