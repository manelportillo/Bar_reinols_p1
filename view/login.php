<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/estilologin.css">
    <title>Bar Reinols</title>
</head>
<body>
<div>
  <form action="../controller/loginController.php" onsubmit="return validacionForm()">
    <h2>Login Camarero</h2>
    <label for="email">Email Camarero</label>
    <input type="email" id="email" name="email" placeholder="Email...">

    <label for="passwd">Contraseña</label>
    <input type="password" id="passwd" name="passwd" placeholder="Contraseña...">
  
    <input type="submit" value="Submit">
  </form>
</div>
</body>
</html>