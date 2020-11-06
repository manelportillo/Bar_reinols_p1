<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0"/>
        <link  rel="stylesheet" href="../css/zona_camarero.css"/>

        <script src="../js/code.js"></script>
        <title>Mesas Bar Reinols</title>
    </head>
    <body>
    <img class='img' src="../img/header.jpg"><br>
        <?php

            require_once '../model/mesaDAO.php';
            $mesaDAO=new MesaDao(); 
           
            if (isset($_POST['Disponibilidad'])){
                $mesaDAO->update();
            }

            if (isset($_POST['num_com']) || isset($_POST['disponibilidad']) || isset($_POST['ubicacion'])) {
                // $num_comensales=$_POST['num_com'];
                // $disponibilidad=$_POST['disponibilidad'];
                // $ubicavion=$_POST['ubicacion'];
                echo "<div class='ns'>";
              
                echo "<form action='../view/zona_camarero.php' method='POST'>";
 
                echo "<label for='num_com'>Número de comensales</label>";
                echo "<select name='num_com'>";
                echo "<option value='' disabled selected='true'>Seleccionar...</option> ";
                echo "<option value='2'>2 asientos</option> ";
                echo "<option value='4'>4 asientos</option> ";
                echo "<option value='6'>6 asientos</option> ";
                echo "<option value='8'>8 asientos</option> ";
                echo "</select>";

                echo "<label for='disponibilidad'>Disponibilidad</label>";
                echo "<select name='disponibilidad'>";
                echo "<option value='' disabled selected='true'>Seleccionar...</option> ";
                echo "<option value='Disponible'>Disponible</option> ";
                echo "<option value='Reservada'>Reservada</option> ";
                echo "</select>";

                echo "<label for='ubicacion'>Ubicacion del Restaurante</label>";
                echo "<select name='ubicacion'>";
                echo "<option value='' disabled selected='true'>Seleccionar...</option> ";
                echo "<option value='1'>Comedor-1</option> ";
                echo "<option value='2'>Comedor-2</option> ";
                echo "<option value='3'>Terraza</option>";
                echo "<option value='4'>Sala privada</option> ";
                echo "</select>";

                echo "<input type='submit' value='Submit'>";

                echo "</form>";

                $mesaDAO->filtrarMesas();

            }else{
                echo "<div class='ns'>";
                echo "<form action='../view/zona_camarero.php' method='POST'>";

                echo "<label for='num_com'>Número de comensales</label>";
                echo "<select name='num_com'>";
                echo "<option value='' disabled selected='true'>Seleccionar...</option> ";
                echo "<option value='2'>2 asientos</option> ";
                echo "<option value='4'>4 asientos</option> ";
                echo "<option value='6'>6 asientos</option> ";
                echo "<option value='8'>8 asientos</option> ";
                echo "</select>";

                echo "<label for='disponibilidad'>Disponibilidad</label>";
                echo "<select name='disponibilidad'>";
                echo "<option value='' disabled selected='true'>Seleccionar...</option> ";
                echo "<option value='Disponible'>Disponible</option> ";
                echo "<option value='Reservada'>Reservada</option> ";
                echo "</select>";

                echo "<label for='ubicacion'>Ubicacion del Restaurante</label>";
                echo "<select name='ubicacion'>";
                echo "<option value='' disabled selected='true'>Seleccionar...</option> ";
                echo "<option value='1'>Comedor-1</option> ";
                echo "<option value='2'>Comedor-2</option> ";
                echo "<option value='3'>Terraza</option>";
                echo "<option value='4'>Sala privada</option> ";
                echo "</select>";

                echo "<input type='submit' value='Submit'>";

                echo "</form>";
                echo "</div>";

                
                $mesaDAO->mostrar();

            }
        ?>
 			<footer>
				<div class="footer">
				</div>
                <p class="footer">Copyright &copy; 2020 | Designed By : Manel Portillo, Albert Buendia, Eloi Rodriguez, Óscar Mengual, All rights reserved. </p>
			</footer>

	</div>
    </body>
</html>
