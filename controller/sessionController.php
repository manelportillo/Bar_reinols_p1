<?php
require_once '../model/camarero.php';
session_start();
if (!isset($_SESSION['camarero'])) {
    header('Location:../index.php');
}
// var_dump($_SESSION['camarero']);
echo '<div class="logo"><h1>Bienvenido '.$_SESSION['camarero']->getId().'</h1><h1 style="float: right;"><a href="../controller/logoutController.php">Logout</a></h1></div>';


