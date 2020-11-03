<?php
require_once '../model/admin.php';
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location:../index.php');
}
echo '<div class="logo"><h1>Bienvenido '.$_SESSION['admin']->getEmail().'</h1><h1 style="float: right;"><a href="../controller/logoutController.php">Logout</a></h1></div>';