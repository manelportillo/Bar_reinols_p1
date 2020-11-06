<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/estilologin.css">
    <script src="../js/login.js"></script>
    <title>Bar Reinols</title>
</head>
<body>
<div>
  <form action="../controller/loginController_mantenimiento.php" method="POST" onsubmit="return validacionForm()">
    <img src="../img/mauricio.png"><br>
    <label for="email">Email Mantenimiento</label>
    <input type="email" id="email" name="email" placeholder="Email...">
    <label for="passwd">Contraseña</label>
    <input type="password" id="passwd" name="passwd" placeholder="Contraseña...">
  
    <input type="submit" id="error" value="Submit">
  </form>
  <div id="mensaje"></div>
</div>
</body>
</html>
