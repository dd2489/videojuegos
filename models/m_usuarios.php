<?php
session_start();
class modelo_usuarios
{
    private $bd;
    private $usuarios;

    public function __construct()
    {
        $this->bd = conectar::conexion();
    }
    public function get_Login($user, $pas)
    {   $con = $this->bd;
        $consulta = "select * from usuarios where nick='$user' and pass='$pas' and activo='1'";
        $resultado = mysqli_query($con, $consulta);
        $value = false;

        if($resultado){
            if(mysqli_num_rows($resultado) > 0){
                $valor = mysqli_fetch_array($resultado);
                if($valor['pass'] == $pas){
                    $value = true;
                    $codigo = $valor['id'];
                    $nick = $valor['nick'];
                }
            }            
        }
        if($value == true){
            if($codigo == 0){
                $_SESSION['rol'] = 'admin';
                $_SESSION['nick'] = $nick;
                $_SESSION['id'] = $codigo;
            }
            else
            {
                $_SESSION['rol'] = 'user';
                $_SESSION['nick'] = $nick;
                $_SESSION['id'] = $codigo;
            }
        }else{
            echo "<div class='alert alert-danger alert-dismissible fade show text-center' role='alert'>
            <strong>La contraseña o el usuario $user no existe o es incorrecta</strong> Prueba otra vez..
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
          </div>";
        
        }
        $con->close();
    }

    
    public function cerrarSession(){
	$_SESSION = array();
	session_destroy();
    }

    
}
