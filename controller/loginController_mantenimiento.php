<?php
require_once '../model/mantenimiento.php';
require_once '../model/mantenimientoDAO.php';
if (isset($_POST['email'])) {
    $mantenimiento = new mantenimiento($_POST['email'], md5($_POST['passwd']));
    $mantenimientoDAO = new mantenimientoDAO();
    if($mantenimientoDAO->login($mantenimiento)){
        header('Location: ../view/zona_mantenimiento.php');
    }else {
        header('Location: ../view/login_mantenimiento.php');
        
    }
}else {
    header('Location: ../view/login_mantenimiento.php');
}