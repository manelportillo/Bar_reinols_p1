<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum=1.0"/>
        <link  rel="stylesheet" href="zona_camarero.css"/>
        <title> </title>
    </head>
    <body>
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
