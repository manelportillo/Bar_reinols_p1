<?php
require_once '../model/camarero.php';
session_start();
if (!isset($_SESSION['camarero'])) {
    header('Location:../index.php');
}
// var_dump($_SESSION['camarero']);
echo '<div class="logo">
        <h2>Bienvenido '.$_SESSION['camarero']->getEmail().'</h2>
        <h3 class="logout"style="float: right;"><a href="../controller/logoutController.php">Logout</a></h3>
        </div>';
?>
