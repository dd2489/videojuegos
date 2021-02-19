<?php
include 'bd/bd.php';
include "controllers/c_usuarios.php";
// MOD MENU 
if($godmode == true){
    echo "<title>Plataformas - Admin</title>";
    include "controllers/c_mod.php";
}else{

// FIN MOD MENU
$plataforma_category= true;
include "controllers/c_plataformas.php";
}


footer();
