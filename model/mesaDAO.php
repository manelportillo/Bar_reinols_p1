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
            
            $id=$mesa['id_mesa']." ";
            echo "<div id='item{$id}' class='item'>";
            echo "<p>{$mesa['capacidad_mesa']}"." Comensales</p> <br>";
            echo "<p class='Disponibilidad'>{$mesa['Disponibilidad']}</p><br>";
            echo "<p>{$mesa['Nombre_ubicacion']}</p><br>";
            echo "<form id='form{$id}' class='visible' action='../view/zona_camarero.php?id_de_la_mesa={$id}' method='POST'>";
            echo "<select style='margin-top: 10.2%;' name='Num_mesas'>";
            echo "<option value='2'>2 asientos</option> ";
            echo "<option value='4'>4 asientos</option> ";
            echo "<option value='6'>6 asientos</option> ";
            echo "<option value='8'>8 asientos</option> ";
            echo "<option value='16'>16 asientos</option> ";
            echo "</select>";
            echo "<select style='margin-top: 10.2%;' name='Disponibilidad'>";
            echo "<option value='Disponible'>Disponible</option> ";
            echo "<option value='Reservada'>Reservada</option> ";
            echo "<option value='Mantenimiento'>Mantenimiento</option> ";
            echo "</select>";
            echo "<input  type='submit' value='Submit'>";
            echo "</form>";           
            echo "</div>";
            }
            ?>
            <script>
                var Mesa=document.getElementsByClassName('item');
                var Disponibilidad=document.getElementsByClassName('Disponibilidad');
              
                for (let i = 0; i < Mesa.length; i++) {
                    if(Disponibilidad[i].innerHTML == 'Disponible'){
                    Mesa[i].style.backgroundColor = "green";
                    }else if(Disponibilidad[i].innerHTML == 'Reservada'){
                    Mesa[i].style.backgroundColor = "red";
                    }else if(Disponibilidad[i].innerHTML == 'Mantenimiento'){ 
                                                        
                        Mesa[i].style.backgroundColor = "grey";                       
                    }
                }
            </script>
            <?php
            echo "<footer>";
            echo "<p>Copyright &copy; 2020 | Designed By : Manel Portillo, Albert Buendia, Eloi Rodriguez, Óscar Mengual, All rights reserved. </p>";
            echo "</footer>";    
    }

    public function filtrarMesas(){

        if (isset($_POST['num_com']) && isset($_POST['disponibilidad']) && isset($_POST['ubicacion'])) {

            $num_comensales=$_POST['num_com'];
            $disponibilidad=$_POST['disponibilidad'];
            $ubicacion=$_POST['ubicacion'];

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
            echo "<select style='margin-top: 10.2%;' name='Num_mesas'>";
            echo "<option value='2'>2 asientos</option> ";
            echo "<option value='4'>4 asientos</option> ";
            echo "<option value='6'>6 asientos</option> ";
            echo "<option value='8'>8 asientos</option> ";
            echo "<option value='16'>16 asientos</option> ";
            echo "</select>";
            echo "<select style='margin-top: 10.2%;' name='Disponibilidad'>";
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
            </script>
            <?php
            echo "<footer>";
            echo "<p>Copyright &copy; 2020 | Designed By : Manel Portillo, Albert Buendia, Eloi Rodriguez, Óscar Mengual, All rights reserved. </p>";
            echo "</footer>";
            
    }

    public function update(){

        if (isset($_POST['Disponibilidad'])) {
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
                    $query="UPDATE tbl_reserva SET Hora_final_reserva = CURRENT_TIME WHERE id_mesa = $id_mesa AND id_camarero = $id_camarero ORDER BY id_reserva DESC LIMIT 1";            
                    $sentencia=$this->pdo->prepare($query);
                    $sentencia->execute();              
                    header ("Location:../view/zona_camarero.php");
                }catch (Exception $ex){
                        /* Reconocer un error y no hacer los cambios */
                            $this->pdo->rollback();
                        echo $ex->getMessage();
                } 
                $this->pdo->commit();        
            }else if($estado == 'Mantenimiento'){
                $query="UPDATE tbl_mesa SET Disponibilidad = ? WHERE tbl_mesa.id_mesa = $id_mesa";
                    $sentencia=$this->pdo->prepare($query);
                    $sentencia->bindParam(1,$estado);
                    $sentencia->execute();
                header ("Location:../view/form_incidencia.php?id_mesa={$id_mesa}");
            }
        }
        
        if (isset($_POST['Num_mesas'])) {
            $num_comensales = $_POST['Num_mesas'];
            $this->pdo->beginTransaction(); 
                try{
                    
                    $query="UPDATE tbl_mesa SET capacidad_mesa = ? WHERE tbl_mesa.id_mesa = $id_mesa";
                    $sentencia=$this->pdo->prepare($query);
                    $sentencia->bindParam(1,$num_comensales);
                    $sentencia->execute();
                    
                    header ("Location:../view/zona_camarero.php");
                }catch (Exception $ex){
                        /* Reconocer un error y no hacer los cambios */
                            $this->pdo->rollback();
                        echo $ex->getMessage();
                } 
                $this->pdo->commit();
        }

    }

    public function mesas_incidencia(){

        $sql="SELECT * FROM tbl_mesa INNER JOIN tbl_ubicacion ON tbl_mesa.id_ubicacion = tbl_ubicacion.id_ubicacion WHERE Disponibilidad = 'Mantenimiento' ORDER BY id_mesa ASC";
        $sentencia=$this->pdo->prepare($sql);
        $sentencia->execute();

        $lista_mesas=$sentencia->fetchAll(PDO::FETCH_ASSOC);

        echo "<div class='container'>";
        foreach ($lista_mesas as $mesa) {
            
            $id=$mesa['id_mesa']." ";
            echo "<div id='item{$id}' class='item'>";
            echo "<p>{$mesa['capacidad_mesa']}"." Comensales</p> <br>";
            echo "<p class='Disponibilidad'>{$mesa['Disponibilidad']}</p><br>";
            echo "<p>{$mesa['Nombre_ubicacion']}</p><br>";
            echo "<form action='../view/zona_mantenimiento.php?id_de_la_mesa={$id}' method='POST'>";
            echo "<select style='margin-top: 10.2%;' name='Disponible'>";
            echo "<option value='Disponible'>Disponible</option> ";
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
            </script>
            <?php
            echo "<footer>";
            echo "<p>Copyright &copy; 2020 | Designed By : Manel Portillo, Albert Buendia, Eloi Rodriguez, Óscar Mengual, All rights reserved. </p>";
            echo "</footer>";    
    }
    public function liberar_mesas(){
        $estado=$_POST['Disponible'];
        $id_mesa=$_GET['id_de_la_mesa'];
        if ($estado == 'Disponible') {               
                $query="UPDATE tbl_mesa SET Disponibilidad = ? WHERE tbl_mesa.id_mesa = $id_mesa";
                $sentencia=$this->pdo->prepare($query);
                $sentencia->bindParam(1,$estado);
                $sentencia->execute();
                header ("Location:../view/zona_mantenimiento.php");
        }else {
                header ("Location:../view/zona_mantenimiento.php");
        }
    }


}      

?>

