<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
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

        $adminDAO->filtrarmantenimiento();


    }else{

        echo "<form action='ver_mantenimiento.php' method='POST'>";
        echo "<label for='name'>First name:</label>";
        echo "<input type='text' id='nombre' name='nombre'>";
        echo "<label for='name'>Last name:</label>";
        echo "<input type='text' id='apellido' name='apellido'>";
        echo "<input type='submit' value='Submit'>";
        echo "</form>";
        
        $adminDAO->visualizarmantenimiento();

    }

    ?>
</body>
</html>
