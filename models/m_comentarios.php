<?php
class modelo_comentarios{
    private $bd;
    private $comentarios;

    public function __construct()
    {
        $this->bd = conectar::conexion();
        $this->comentarios = array();
        $this->comentarios_c = array();

    }

    
    public function mostrarComentarios($idjuego){
        $consulta = mysqli_query($this->bd, "select distinct nick, c.fecha, texto from comentario c, juegos j, usuarios u where u.id = c.usuario and c.juego=j.id and c.juego = $idjuego");
        
        if (mysqli_num_rows($consulta) > 0) {
            $i = 0;
            while ($fila = mysqli_fetch_assoc($consulta)) {
                $this->comentarios[$i]['usuario'] = $fila['nick'];
                $this->comentarios[$i]['fecha'] = date("d/m/Y", strtotime($fila['fecha']));
                $this->comentarios[$i]['texto'] = $fila['texto'];
                $i++;               
            }
            
        }
        return $this->comentarios;
    }

    public function insertarComentario($usuario,$idjuego,$texto){
        
        $fecha_actual = $fecha_actual = date('Y-m-d');
        $insertar_comentario = "insert into `comentario` (`usuario`, `juego`, `fecha`, `texto`) VALUES ('$usuario', '$idjuego', '$fecha_actual', '$texto');";
        $insertar = $insertar_comentario;
        $consulta = $this->bd->prepare($insertar);
        $consulta->execute();      
        if($consulta->execute()){
            //Insercion con Exito
            return true;
        } else {
            return false;
        }
        $consulta->close();
    }   

    public function mostrarComentariosMod(){
        $consulta = mysqli_query($this->bd,"select u.nick, u.id id_user, j.nombre nom_j, j.id id_juego, c.fecha, c.texto from usuarios u, juegos j, comentario c WHERE c.usuario = u.id and c.juego = j.id order by fecha DESC") or die(mysqli_error($this->bd));
        
        if(mysqli_num_rows($consulta) > 0 ){
            $i = 0;
            while($fila = mysqli_fetch_assoc($consulta)){
                $this->accion[$i]['nick'] = $fila['nick'];
                $this->accion[$i]['nombre_j'] = $fila['nom_j'];
                $fecha = date('d/m/Y',strtotime($fila['fecha']));
                $this->accion[$i]['fecha'] = $fecha;
                $this->accion[$i]['texto'] = $fila['texto'];
                $this->accion[$i]['iduser'] = $fila['id_user'];
                $this->accion[$i]['idjuego'] = $fila['id_juego'];
                
                $i++;
            }
        }
        return $this->accion;
    }
    public function borrarComentarioMod($idusuario,$idjuego){
       $borrar = $this->bd->prepare("delete from `comentario` where usuario = $idusuario AND juego = $idjuego");
       $borrar->execute();
       $borrar->close();
       header('Location: ./comentarios.php');
    }

    public function caruselComentarios(){
        $comentarios = mysqli_query($this->bd,"select j.caratula, u.nombre, c.texto, c.fecha from juegos j , usuarios u, comentario c WHERE c.usuario = u.id AND j.id = c.juego order by c.fecha desc limit 5");

        if (mysqli_num_rows($comentarios) > 0) {
            $i = 0;
            while ($fila = mysqli_fetch_assoc($comentarios)) {
                $this->comentarios_c[$i]['caratula'] = $fila['caratula'];
                $this->comentarios_c[$i]['nombre'] = $fila['nombre'];
                $this->comentarios_c[$i]['texto'] = $fila['texto'];
                $fecha = date('d/m/Y',strtotime($fila['fecha']));
                $this->comentarios_c[$i]['fecha'] = $fecha;
                $i++;               
            }
            
        }
        return $this->comentarios_c;



    }
}


?>