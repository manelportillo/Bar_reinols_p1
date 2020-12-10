<?php
require_once '../model/camarero.php';
require_once '../model/administrador.php';
require_once '../model/mantenimiento.php';

session_start();

if (isset($_SESSION['camarero']) || isset($_SESSION['admin']) || isset($_SESSION['admin'])) {

    if (isset($_SESSION['camarero']) || !isset($_SESSION['admin']) || !isset($_SESSION['mantenimiento'])) {
        echo '<div class="logo">';
        echo '<h2>Bienvenido '.$_SESSION['camarero']->getEmail().'</h2>';
        echo '<h3 class="logout"><a href="../controller/logoutController.php">Logout</a></h3>';
        echo '</div>';

    }else if (!isset($_SESSION['camarero']) || isset($_SESSION['admin']) || !isset($_SESSION['mantenimiento'])) {
        echo '<div class="logo">';
        echo '<h2>Bienvenido '.$_SESSION['admin']->getEmail().'</h2>';
        echo '<h3 class="logout"><a href="../controller/logoutController.php">Logout</a></h3>';
        echo '</div>';

    }else if (!isset($_SESSION['camarero']) || !isset($_SESSION['admin']) || isset($_SESSION['mantenimiento'])) {
        echo '<div class="logo">';
        echo '<h2>Bienvenido '.$_SESSION['mantenimiento']->getEmail().'</h2>';
        echo '<h3 class="logout"><a href="../controller/logoutController.php">Logout</a></h3>';
        echo '</div>';
        
    }else {
        header('Location:../index.php');
    }
    
}

?>
