<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum=1.0"/>
        <link  rel="stylesheet" href="../css/zona_camarero.css"/>
        <title> </title>
    </head>
    <body>

        <form action="/action_page.php">

            <label for="num_com">numero_comensales</label>
            <select name="num_com">
                <option value="2">2 asientos</option> 
                <option value="4">4 asientos</option> 
                <option value="6">2 asientos</option>
                <option value="8">2 asientos</option> 
            </select>

            <label for="Disponibilidad">Disponibilidad</label>
            <select name="Disponibilidad">
                <option value="Disponible">Disponible</option> 
                <option value="Reservada">Reservada</option> 
            </select>

            <label for="ubicacion">Ubicacion del Restaurante</label>
            <select name="ubicacion">
                <option value="1">Comedor-1</option> 
                <option value="2">Comedor-2</option> 
                <option value="3">Terraza</option>
                <option value="4">Sala privada</option> 
            </select>
            <input type="submit" value="Submit">

        </form>
        
        <h1>Mesas</h1>
        <div class="container">
        <?php
        require_once 'mesaDAO.php';

        $mostrar=new MesaDao;   
        $mostrar->mostrar();
        ?>
        </div>
    </body>
</html>
