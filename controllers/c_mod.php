<?php
require_once "models/m_administrador.php";

$mod_usuarios = false;
$mod_plataformas = false;
$mod_juegos = false;
$url = $_SERVER["PHP_SELF"];

if (isset($_SESSION['rol'])) {
    if ($_SESSION['rol'] == 'admin') {


        //CARGAR LISTA USUARIOS

        if ($url == '/usuarios.php') {
            $mod_usuarios = true;
            $listaUsers = new modelo_administrador();
            $listaUsers = $listaUsers->mostrarUsuarios();

            //BUSCAR
            if (isset($_GET['buscar'])) {
                $buscarUsuario = new modelo_administrador();
                $buscarUsuario = $buscarUsuario->buscarUsuario($_GET['nombre']);
            }

            if (isset($_POST['agregaruser'])) {

                // COMPROBAMOS QUE EL FORMULARIO NO ESTE VACIO
                if (!empty($_POST['add_nombre']) && !empty($_POST['add_nick']) && !empty($_POST['add_pass'])) {

                    $insertarUser = new modelo_administrador();
                    $insertarUser = $insertarUser->insertarUsuario($_POST['add_nombre'], $_POST['add_nick'], $_POST['add_pass']);
                    echo "<div class='alert alert-success' role='alert' id='success_message'>Usuario Añadido correctamente!</div>";
                }
            } // FIN INSERTAR USUARIOS
            // MODIFICAR USUARIOS YA EXISTENTES
            if (isset($_GET['modificar'])) {
                $nick = $_GET['nick'];
                $id = $_GET['id'];
                $nombre = $_GET['nombre'];
                $estado = $_GET['activo'];

                if (isset($_POST['modificaruser'])) {
                    $m_nombre = $_POST['add_nombre'];
                    $m_pass = $_POST['add_pass'];
                    $m_nick = $_POST['add_nick'];
                    $m_estado = $_POST['activo'];
                    $modificar_usuario = new modelo_administrador();
                    echo "<div class='alert alert-success' role='alert' id='success_message'>Usuario Modificado correctamente!</div>";
                    if (empty($_POST['add_pass'])) {
                        $modificar_usuario = $modificar_usuario->modificarUsuariobyPass($m_nombre, $m_nick, $m_estado, $id);
                        echo "<META HTTP-EQUIV='REFRESH'CONTENT='1;URL=./usuarios.php'>";
                    } else {
                        // modificarUsuario();
                        $modificar_usuario = $modificar_usuario->modificarUsuario($m_nombre, $m_nick, $m_pass, $m_estado, $id);
                        echo "<META HTTP-EQUIV='REFRESH'CONTENT='1;URL=./usuarios.php'>";
                    }
                }
            }
        }
        //-------------------------------------------------------
        // CARGAR MOD MENU PLATAFORMAS
        if ($url == '/plataformas.php') {
            $mod_plataformas = true;

      
            $mostrar_plataformas = new modelo_administrador();
            $mostrar_plataformas = $mostrar_plataformas->mostrarPlataformas();

            if (isset($_GET['modificar'])) {

                if (isset($_POST['modificarplataforma'])) {
                    $modificar_plataform = new modelo_administrador();
                    $m_nombre = $_POST['add_nombre'];
                    $m_estado = $_POST['activo'];
                    $id = $_GET['id'];

                    if ($_FILES['imagen']['size'] == 0) {
                        $modificar_plataform = $modificar_plataform->modificarPlataformasinFoto($m_nombre, $m_estado, $id);
                    } else {
                        $nom_img = $_FILES['imagen']['name'];
                        $nombre_temporal = $_FILES['imagen']['tmp_name'];
                        $dir_subida = "assets/uploads/plataformas/$nom_img";
                        move_uploaded_file($nombre_temporal, $dir_subida);
                        $modificar_plataform = $modificar_plataform->modificarPlataforma($m_nombre, $m_estado, $nom_img, $id);
                    }
                    echo "<div class='alert alert-success' role='alert' id='success_message'>Modificado con exito!</div>";

                    echo "<META HTTP-EQUIV='REFRESH'CONTENT='1;URL=./plataformas.php'>";
                }
            }

            if (isset($_GET['buscar'])) {
                $buscarplataformas = new modelo_administrador();
                $buscarplataformas = $buscarplataformas->buscarPlataforma($_GET['nombre']);
            }

            if (isset($_GET['nuevaplataforma'])) {

                if (isset($_POST['agregarplataforma'])) {

                    $nom_img = $_FILES['imagen']['name'];

                    if (!empty($_POST['nombre']) && !empty($nom_img)) {

                        $nombre = $_POST['nombre'];
                        $nombre_temporal = $_FILES['imagen']['tmp_name'];
                        $dir_subida = "assets/uploads/plataformas/$nom_img";
                        move_uploaded_file($nombre_temporal, $dir_subida);

                        $add_plataforma = new modelo_administrador();
                        $add_plataforma = $add_plataforma->insertarPlataforma($nombre, $nom_img);

                        echo "<div class='alert alert-success' role='alert'>
                        Plataforma $nombre agregada con exito!
                      </div>";
                    } else {
                        echo "<div class='alert alert-danger' role='alert'>
                        Plataforma no Añadida! Revise los campos
                      </div>";
                    }
                }
            }
        }         
            
        
    } else if ($_SESSION['rol'] == 'user') {
        if ($url === "/comentarios.php" || $url === "/usuarios.php") {

            echo "<META HTTP-EQUIV='REFRESH'CONTENT='0;URL=./index.php'>";
        }
    }
} else {
    if ($url === "/comentarios.php" || $url === "/usuarios.php") {
        echo "<META HTTP-EQUIV='REFRESH'CONTENT='0;URL=./index.php'>";
    }
}
include "views/v_administrador.php";
