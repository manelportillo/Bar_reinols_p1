<?php
header('Location: view/login.php');

require_once 'model/mesaDAO.php';

$mostrar=new MesaDao;   
$mostrar->mostrar();