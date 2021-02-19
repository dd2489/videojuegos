<?php
require_once "models/m_usuarios.php";
$user = new modelo_usuarios();
// ACTIVA EL MODO ADMIN *_*
$godmode = false;

if (!empty($_POST['user']) && !empty($_POST['pass'])) {
    $usuario = $_POST['user'];
    $pass = $_POST['pass'];
    $datos = $user->get_Login($usuario, $pass);
}
if (isset($_POST['salir'])) {

    $user->cerrarSession();
}

if(isset($_SESSION['rol'])){
    if($_SESSION['rol']=='admin'){
    
    $godmode = true;
}
}
include "views/v_usuarios.php";
