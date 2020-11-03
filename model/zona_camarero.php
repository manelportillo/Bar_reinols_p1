<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum=1.0"/>
        <link  rel="stylesheet" href="../css/zona_camarero.css"/>
        <title> </title>
    </head>
    <body>

        <?php
            require_once 'mesaDAO.php';
            $mesaDAO=new MesaDao(); 

            if (isset($_POST['num_com']) && isset($_POST['disponibilidad']) && isset($_POST['ubicacion'])) {
                $num_comensales=$_POST['num_com'];
                $disponibilidad=$_POST['disponibilidad'];
                $ubicavion=$_POST['ubicacion'];
                echo "<form action='zona_camarero.php' method='POST'>";

                echo "<label for='num_com'>numero_comensales</label>";
                echo "<select name='num_com'>";
                echo "<option value='2'>2 asientos</option> ";
                echo "<option value='4'>4 asientos</option> ";
                echo "<option value='6'>6 asientos</option> ";
                echo "<option value='8'>8 asientos</option> ";
                echo "</select>";

                echo "<label for='disponibilidad'>Disponibilidad</label>";
                echo "<select name='disponibilidad'>";
                echo "<option value='Disponible'>Disponible</option> ";
                echo "<option value='Reservada'>Reservada</option> ";
                echo "</select>";

                echo "<label for='ubicacion'>Ubicacion del Restaurante</label>";
                echo "<select name='ubicacion'>";
                echo "<option value='1'>Comedor-1</option> ";
                echo "<option value='2'>Comedor-2</option> ";
                echo "<option value='3'>Terraza</option>";
                echo "<option value='4'>Sala privada</option> ";
                echo "</select>";

                echo "<input type='submit' value='Submit'>";

                echo "</form>";

                $mesaDAO->filtrarMesas($num_comensales,$disponibilidad,$ubicavion);

            }else{

                echo "<form action='zona_camarero.php' method='POST'>";

                echo "<label for='num_com'>numero_comensales</label>";
                echo "<select name='num_com'>";
                echo "<option value='2'>2 asientos</option> ";
                echo "<option value='4'>4 asientos</option> ";
                echo "<option value='6'>6 asientos</option> ";
                echo "<option value='8'>8 asientos</option> ";
                echo "</select>";

                echo "<label for='disponibilidad'>Disponibilidad</label>";
                echo "<select name='disponibilidad'>";
                echo "<option value='Disponible'>Disponible</option> ";
                echo "<option value='Reservada'>Reservada</option> ";
                echo "</select>";

                echo "<label for='ubicacion'>Ubicacion del Restaurante</label>";
                echo "<select name='ubicacion'>";
                echo "<option value='1'>Comedor-1</option> ";
                echo "<option value='2'>Comedor-2</option> ";
                echo "<option value='3'>Terraza</option>";
                echo "<option value='4'>Sala privada</option> ";
                echo "</select>";

                echo "<input type='submit' value='Submit'>";

                echo "</form>";
                
                $mesaDAO->mostrar();

            }
            
        ?>
 
    </body>
</html>
