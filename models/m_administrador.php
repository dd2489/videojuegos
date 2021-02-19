<?php

class modelo_administrador
{
    private $bd;
    private $usuarios;
    private $buscar;
    private $plataformas;
    private $juegos;

    public function __construct()
    {
        $this->bd = conectar::conexion();
        $this->plataformas = array();
        $this->buscar = array();
        $this->juegos = array();
    }


    // PLATAFORMAS ADMIN
    public function mostrarPlataformas()
    {
        $consulta = mysqli_query($this->bd, "select * from plataformas") or die(mysqli_error($this->bd));

        if ($consulta) {
            if (mysqli_num_rows($consulta) > 0) {
                $i = 0;

                while ($fila = mysqli_fetch_assoc($consulta)) {
                    $this->plataformas[$i]['id'] = $fila['id'];
                    $this->plataformas[$i]['nombre'] = $fila['nombre'];
                    $this->plataformas[$i]['activo'] = $fila['activo'];
                    $this->plataformas[$i]['logotipo'] = $fila['logotipo'];
                    $i++;
                }
            }
        } else {
            echo "Error de conexion";
        }
        return $this->plataformas;
    }
    public function insertarPlataforma($nombre,$nom_img)
    {
        $consulta = $this->bd->prepare("insert into plataformas (id, nombre, activo, logotipo) VALUES (NULL, '$nombre', '1', '$nom_img')");
        $consulta->execute();
        $consulta->close();


    }

    public function modificarPlataformasinFoto($nombre,$estado,$id)
    {

        $insertar = $this->bd->prepare("update plataformas set nombre = ?, activo = ? WHERE plataformas.id = ?");
        $insertar->bind_param('sii',$nombre,$estado,$id);
        $insertar->execute();      
        $insertar->close();
        // FALTA POR HACER como el de modificar plataforma con 2 opciones
    }
    public function modificarPlataforma($nombre,$estado,$nom_img,$id)
    {

        $insertar = $this->bd->prepare("update plataformas set nombre = ?, activo = ?, logotipo = ? WHERE plataformas.id = ?");
        $insertar->bind_param('sisi',$nombre,$estado,$nom_img,$id);
        $insertar->execute();      
        $insertar->close();
        // FALTA POR HACER como el de modificar plataforma con 2 opciones
    }

    public function buscarPlataforma($nombre)
    {
        $buscador = mysqli_query($this->bd,"select * from plataformas where nombre like '%$nombre%'") or die (mysqli_error($this->bd));

        if (mysqli_num_rows($buscador) > 0){
            $i = 0;
            while($fila = mysqli_fetch_assoc($buscador)){
                $this->plataformas[$i]['id'] = $fila['id'];
                $this->plataformas[$i]['nombre'] = $fila['nombre'];
                $this->plataformas[$i]['activo'] = $fila['activo'];
                $this->plataformas[$i]['logotipo'] = $fila['logotipo'];
                $i++;
            }
            return $this->plataformas;
        }else{
            //Mensaje de que no encuentra nada
        }

        return $this->buscar;
    
    }

    //FIN Plataforma admin

    //USUARIOS ADMIN

    public function mostrarUsuarios()
    {

        $consulta = mysqli_query($this->bd, "select * from usuarios") or die(mysqli_error($this->bd));

        if ($consulta) {
            if (mysqli_num_rows($consulta) > 0) {
                $i = 0;

                while ($fila = mysqli_fetch_assoc($consulta)) {
                    $this->usuarios[$i]['id'] = $fila['id'];
                    $this->usuarios[$i]['nombre'] = $fila['nombre'];
                    $this->usuarios[$i]['nick'] = $fila['nick'];
                    $this->usuarios[$i]['activo'] = $fila['activo'];
                    $i++;
                }
            }
        } else {
            echo "Error de conexion";
        }
        return $this->usuarios;
    }


    public function insertarUsuario($nombre,$nick,$pass)
    {
        $insertar = $this->bd->prepare("insert into usuarios VALUES (NULL, ?, ?, ?, '1')");
        $insertar->bind_param('sss',$nombre,$nick,$pass);
        $insertar->execute();      
        $insertar->close();
    }   
    

    public function modificarUsuario($nombre,$nick,$pass,$estado,$id)
    {
        $insertar = $this->bd->prepare("update usuarios set nombre = ?, nick = ?, pass = ?, activo = ? WHERE usuarios.id = ?");
        $insertar->bind_param('sssii',$nombre,$nick,$pass,$estado,$id);
        $insertar->execute();      
        $insertar->close();
    }
    public function modificarUsuariobyPass($nombre,$nick,$estado,$id)
    {
        $insertar = $this->bd->prepare("update usuarios set nombre = ?, nick = ?, activo = ? WHERE usuarios.id = ?");
        $insertar->bind_param('ssii',$nombre,$nick,$estado,$id);
        $insertar->execute();      
        $insertar->close();
    }

    public function buscarUsuario($nombre)
    {           
        $buscador = mysqli_query($this->bd,"select * from usuarios where nombre like '%$nombre%'") or die (mysqli_error($this->bd));

        if (mysqli_num_rows($buscador) > 0){
            $i = 0;
            while($fila = mysqli_fetch_assoc($buscador)){
                $this->buscar[$i]['id'] = $fila['id'];
                $this->buscar[$i]['nombre'] = $fila['nombre'];
                $this->buscar[$i]['nick'] = $fila['nick'];
                $this->buscar[$i]['activo'] = $fila['activo'];
                $i++;
            }
            return $this->buscar;
        }else{
            //Mensaje de que no encuentra nada
        }

        return $this->buscar;
    }
}
        
        
            
