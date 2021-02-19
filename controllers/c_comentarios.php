<?php
require_once "models/m_comentarios.php";

$comentario = new modelo_comentarios();
$comentarios_mod = new modelo_comentarios();
$borrar_comentario = new modelo_comentarios();

if(isset($_SESSION['rol'])){
    if($_SESSION['rol']=='admin'){
        
        $comentarios_mod = $comentarios_mod->mostrarComentariosMod();
    
        if(isset($_GET['borrar']) && isset($_GET['id']) && isset($_GET['juego'])){
            echo $_GET['id'];
            $borrar_comentario = $borrar_comentario->borrarComentarioMod($_GET['id'],$_GET['juego']);
            echo"<div class='alert alert-success text-center' role='alert'>
            Comentario borrado con exito!
          </div>";
        }
    }else{
        echo "<META HTTP-EQUIV='REFRESH'CONTENT='0;URL=./index.php'>";
    }
}






include "views/v_comentarios.php";


?>