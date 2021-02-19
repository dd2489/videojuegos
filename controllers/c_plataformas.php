<?php
require_once "models/m_plataformas.php";


$plataforma = new modelo_plataforma();
$p_plataforma = new modelo_plataforma();



if(isset($index)){

$epicgames = $plataforma->ultimosLanzamientos('Epic Games');
$steam = $plataforma->ultimosLanzamientos('Steam');
$nintendo = $plataforma->ultimosLanzamientos('Nintendo');
$origin = $plataforma->ultimosLanzamientos('Origin');
$playstation = $plataforma->ultimosLanzamientos('PlayStation');
$xbox = $plataforma->ultimosLanzamientos('Xbox');
include "views/v_plataformas.php";
}else if (isset($plataforma_category)){
$p_plataforma = $p_plataforma->mostrarPlataformas();
    include "views/v_plataformas_category.php";
}


