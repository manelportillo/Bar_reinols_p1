<?php
require_once '../model/admin.php';
require_once '../model/adminDAO.php';
if (isset($_POST['email'])) {
    $admin = new Admin($_POST['email'], md5($_POST['psswd']),$id);
    $adminDAO = new AdminDao();
    if($adminDAO->login($admin)){
        header('Location: ../view/zona.admin.php');
    }else {
        header('Location: ../view/login.php');
    }
}else {
    header('Location: ../view/login.php');
}
