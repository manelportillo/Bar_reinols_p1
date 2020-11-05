<?php

require_once '../model/camarero.php';
require_once '../model/camareroDAO.php';
if (isset($_POST['email'])) {
    $camarero = new Camarero($_POST['email'], md5($_POST['passwd']),$id);
    $camareroDAO = new CamareroDao();
    if($camareroDAO->login($camarero)){
        header('Location: ../view/zona_camarero.php');
    }else {
        header('Location: ../view/login.php');
    }
}else {
    header('Location: ../view/login.php');
}
