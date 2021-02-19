<?php
require_once "models/m_juegos.php";
require_once "models/m_comentarios.php";
require_once "models/m_plataformas.php";
require_once "models/m_administrador.php";



$juegos = new modelo_juegos();
$comentario = new modelo_comentarios();
$numero_comentarios = 0;
$insertar_comentario = new modelo_comentarios();
$link_plataformas = new modelo_plataforma();
$link_plataformas = $link_plataformas->menuPlataforma();
$mod_juegos = false;

if (isset($_SESSION['rol'])) {
    if ($_SESSION['rol'] == 'admin') {
        $mostrarJuegos = new modelo_juegos();
        $mostrarJuegos = $mostrarJuegos->mostrarJuegosAdmin();


        $listaPlataformasJuegos = new modelo_juegos();
            $listaPlataformasJuegos = $listaPlataformasJuegos->listaPlataformasJuegos();

        if (isset($_GET['modificar'])) {
            $nombre = $_GET['nombre'];
            $id = $_GET['id'];
            $plataforma = $_GET['plataforma'];

            if (isset($_POST['modificaruser'])) {
                $modificarJuego = new modelo_juegos();
                $j_nombre = $_POST['add_nombre'];
                $j_estado = $_POST['activo'];
                $j_plataforma = $_POST['plataforma'];
                
                
                $modificarJuego = $modificarJuego->modificarJuego($j_nombre, $j_estado, $plataforma, $id);
                
                echo "<div class='alert alert-success' role='alert' id='success_message'>Modificado con exito!</div>";
                

            }
        }

        // Buscar Juego por nombre
        if (isset($_GET['buscar'])) {
            $buscarJuego = new modelo_juegos();
            $buscarJuego = $buscarJuego->buscarJuego($_GET['nombre']);
        }

        if (isset($_GET['addjuego'])) {
            


            if (isset($_POST['agregarjuego'])) {

                // COMPROBAMOS QUE EL FORMULARIO NO ESTE VACIO
                $insertarJuego = new modelo_juegos();
                $nom_juego = $_POST['nombre'];
                $texto = $_POST['texto'];
                $plataforma = $_POST['plataforma'];
                $nom_img = $_FILES['imagen']['name'];
                $fecha = $_POST['fecha'];

                if(!empty($nom_juego) && !empty($texto) && !empty($plataforma) && !empty($nom_img)){

                

                    $nom_img = $_FILES['imagen']['name'];
                    $nombre_temporal = $_FILES['imagen']['tmp_name'];

                    $dir_subida = "assets/uploads/caratulas/$nom_img";
                    move_uploaded_file($nombre_temporal, $dir_subida);

                    $insertarJuego = $insertarJuego->insertarJuego($nom_juego, $texto, $plataforma, $nom_img, $fecha);

                    echo "<div class='alert alert-success text-center' role='alert' id='success_message'>Juego Añadido correctamente!</div>";
                }else{
                    echo "<div class='alert alert-warning' text-center role='alert' id='success_message'>Error. Campos Vacios!</div>";
                }
                
            } // FIN INSERTAR USUARIOS
        }




        include "views/v_juegos_admin.php";
    } else if ($_SESSION['rol'] == 'user') {
        if (!empty($_GET['ver'])) {
            $idjuego = $_GET['ver'];
            $mostrar_error = false;
            $juegos = $juegos->verJuego($idjuego);
            $fechajuegos = date("d/m/Y", strtotime($juegos['fecha']));
            $comentario = $comentario->mostrarComentarios($idjuego);
            $numero_comentarios = count($comentario);
            if (isset($_POST['comentar'])) {
                sleep(2);
                $insertar_comentario;
                $insertar_comentario = $insertar_comentario->insertarComentario($_SESSION['id'], $idjuego, $_POST['comentario']);
                echo "<META HTTP-EQUIV='REFRESH'CONTENT='0;URL=./juegos.php?ver=$idjuego'>";
            }
        } else {
            if (empty($_GET['plataforma'])) {
                $juegos = $juegos->todos_Juegos();
                $mostrar_error = false;
            } elseif (isset($_GET['plataforma'])) {
                $token = $_GET['plataforma'];
                $juegos = $juegos->juego_Plataforma($token);
                $mostrar_error = false;
            } elseif (isset($_GET['ver'])) {
            }
        }
        include "views/v_juegos.php";
    }
} else {





    $mostrar_error = true;
    if (!empty($_GET['ver'])) {
        $idjuego = $_GET['ver'];
        $mostrar_error = false;
        $juegos = $juegos->verJuego($idjuego);
        $fechajuegos = date("d/m/Y", strtotime($juegos['fecha']));
        $comentario = $comentario->mostrarComentarios($idjuego);
        $numero_comentarios = count($comentario);
        if (isset($_POST['comentar'])) {
            sleep(2);
            $insertar_comentario;
            $insertar_comentario = $insertar_comentario->insertarComentario($_SESSION['id'], $idjuego, $_POST['comentario']);
            echo "<META HTTP-EQUIV='REFRESH'CONTENT='0;URL=./juegos.php?ver=$idjuego'>";
        }
    } else {
        if (empty($_GET['plataforma'])) {
            $juegos = $juegos->todos_Juegos();
            $mostrar_error = false;
        } elseif (isset($_GET['plataforma'])) {
            $token = $_GET['plataforma'];
            $juegos = $juegos->juego_Plataforma($token);
            $mostrar_error = false;
        } elseif (isset($_GET['ver'])) {
        }
    }

    include "views/v_juegos.php";
}
