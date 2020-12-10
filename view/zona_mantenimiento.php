<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0"/>
        <link  rel="stylesheet" href="../css/zona_camarero.css"/>
        <title>Mesas Bar Reinols</title>
    </head>
    <body>
        <div class='img' src="../img/header.jpg"></div>
        
        <?php
            require_once '../controller/sessionController.php';
            require_once '../model/mesaDAO.php';
            $mesaDAO=new MesaDao(); 
            if (isset($_POST['Disponible'])){
                $mesaDAO->liberar_mesas();
            }

            $mesaDAO->mesas_incidencia();
            

        ?>
    </body>
</html>
