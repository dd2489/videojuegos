<?php
include 'bd/bd.php';
include "controllers/c_usuarios.php";

if(isset($_SESSION['rol'])){

    if ($_SESSION['rol'] == 'admin'){
        include "controllers/c_comentarios.php";

    }else{
        echo "<META HTTP-EQUIV='REFRESH'CONTENT='0;URL=./index.php'>";
    }

footer();
}else{
    echo "<META HTTP-EQUIV='REFRESH'CONTENT='0;URL=./index.php'>";

}
