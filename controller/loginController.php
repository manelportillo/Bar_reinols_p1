<?php

require_once '../model/administrador.php';
require_once '../model/camarero.php';
require_once '../model/mantenimiento.php';
require_once '../model/PersonaDao.php';

if (isset($_POST['email']) && isset($_POST['passwd'])) {

    $email = $_POST['email'];
    $passwd = md5($_POST['passwd']);
    $personaDAO = new PersonaDao();

    $num_profile = $personaDAO->buscarPrivilegios($email,$passwd);
    
    // echo $num_profile;

    if ($num_profile == 3) {
        $admin = new Administrador($_POST['email'], md5($_POST['passwd']));
        
        if($personaDAO->login_admin($admin)){
            header('Location: ../view/zona_admin.php');
        }else {
            header('Location: ../view/login.php');
        }

    }else if ($num_profile == 1) {
        $camarero = new Camarero($_POST['email'], md5($_POST['passwd']));

        if($personaDAO->login_camarero($camarero)){
            header('Location: ../view/zona_camarero.php');
        }else {
            header('Location: ../view/login.php');
        }
    }else if ($num_profile == 2) {
        $mantenimiento = new mantenimiento($_POST['email'], md5($_POST['passwd']));
  
        if($personaDAO->login_mantenimiento($mantenimiento)){
            header('Location: ../view/zona_mantenimiento.php');
        }else {
            header('Location: ../view/login_mantenimiento.php');
            
        }
    }else {
        header('Location: ../view/login.php');
    }{
        
    }
    
}else {
    header('Location: ../view/login.php');
}