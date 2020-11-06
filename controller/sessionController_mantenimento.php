<?php
require_once '../model/mantenimiento.php';
session_start();
if (!isset($_SESSION['mantenimiento'])) {
    header('Location:../index.php');
}
// var_dump($_SESSION['camarero']);
echo '<div class="logo">
        <h1>Bienvenido '.$_SESSION['mantenimiento']->getEmail().'</h1> 
        <h1 style="float: right;"><a href="../controller/logoutController.php">Logout</a></h1>
      </div>';
