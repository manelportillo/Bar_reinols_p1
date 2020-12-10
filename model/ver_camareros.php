<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    require_once '../controller/sessionController.php';
    require_once '../model/administradorDAO.php';
    
    $adminDAO= new AdministradorDao();
    if (isset($_POST['nombre']) && isset($_POST['apellido'])) {

        echo "<form action='ver_mantenimiento.php' method='POST'>";
        echo "<label for='name'>First name:</label>";
        echo "<input type='text' id='nombre' name='nombre'>";
        echo "<label for='name'>Last name:</label>";
        echo "<input type='text' id='apellido' name='apellido'>";
        echo "<input type='submit' value='Submit'>";
        echo "</form>";

        $adminDAO->filtrarusuarios();


    }else{

        echo "<form action='ver_mantenimiento.php' method='POST'>";
        echo "<label for='name'>First name:</label>";
        echo "<input type='text' id='nombre' name='nombre'>";
        echo "<label for='name'>Last name:</label>";
        echo "<input type='text' id='apellido' name='apellido'>";
        echo "<input type='submit' value='Submit'>";
        echo "</form>";
        
        $adminDAO->visualizarusuarios();

    }

    ?>
</body>
</html>