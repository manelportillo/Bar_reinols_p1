<?php
require_once '../model/camarero.php';
require_once '../model/camareroDAO.php';
if (isset($_POST['email'])) {
    $admin = new Camarero($_POST['email'], md5($_POST['passwd']));
    $adminDAO = new CamareroDao();
    if($adminDAO->login($admin)){
        header('Location: ../view/zona.admin.php');
    }else {
        header('Location: ../view/login.php');
    }
}else {
    header('Location: ../view/login.php');
}
