<?php

class modelo_juegos
{

    private $bd;
    private $juegos;

    public function __construct()
    {
        $this->bd = conectar::conexion();
        $this->juegos = array();
    }



    public function modificarJuego($nombre,$estado,$plataforma,$id)
    {
        $insertar = $this->bd->prepare("update juegos set nombre = ?, plataforma = ?, activo = ? WHERE juegos.id = ?");
        $insertar->bind_param('siii',$nombre,$plataforma,$estado,$id);
        $insertar->execute();      
        $insertar->close();
    }
    public function listaPlataformasJuegos(){

        $consulta = mysqli_query($this->bd,"select id,nombre from plataformas where activo='1'");
        if (mysqli_num_rows($consulta) > 0) {
            $i = 0;
            while ($fila = mysqli_fetch_assoc($consulta)) {
                $this->juegos[$i]['id'] = $fila['id'];
                $this->juegos[$i]['nombre'] = $fila['nombre'];
                $i++;
            }
        }
        return $this->juegos;
    

    }

    public function insertarJuego($nombre,$texto,$plataforma,$img,$fecha){


        $insertar = $this->bd->prepare("insert into juegos VALUES (NULL, ?, ?, ?, ?, ?, 1)");
        $insertar->bind_param('ssiss',$nombre,$texto,$plataforma,$img,$fecha);
        $insertar->execute();      
        $insertar->close();
    }

    public function buscarJuego($nombre)
    {           
        $buscador = mysqli_query($this->bd,"select j.*, p.logotipo from juegos j, plataformas p where p.id = j.plataforma AND j.nombre like '%$nombre%'") or die (mysqli_error($this->bd));

        if (mysqli_num_rows($buscador) > 0){
            $i = 0;
            while($fila = mysqli_fetch_assoc($buscador)){
                $this->juegos[$i]['id'] = $fila['id'];
                    $this->juegos[$i]['nombre'] = $fila['nombre'];
                    $resumen = substr($fila['descripcion'], 0, 40);
                    $this->juegos[$i]['descripcion'] = $resumen;
                    $this->juegos[$i]['plataforma'] = $fila['plataforma'];
                    $this->juegos[$i]['caratula'] = $fila['caratula'];
                    $fecha = date('d/m/Y',strtotime($fila['fecha_lanzamiento']));
                    $this->juegos[$i]['fecha'] = $fecha;
                    $this->juegos[$i]['activo'] = $fila['activo'];
                    $this->juegos[$i]['logotipo'] = $fila['logotipo'];                  
                    $i++;
            }
            return $this->juegos;
        }else{
            //Mensaje de que no encuentra nada
        }

        return $this->juegos;
    }
    public function mostrarJuegosAdmin()
    {
        $consulta = mysqli_query($this->bd, "select j.*, p.logotipo from juegos j, plataformas p where p.id = j.plataforma") or die(mysqli_error($this->bd));

        if ($consulta) {
            if (mysqli_num_rows($consulta) > 0) {
                $i = 0;
                while ($fila = mysqli_fetch_assoc($consulta)) {
                    $this->juegos[$i]['id'] = $fila['id'];
                    $this->juegos[$i]['nombre'] = $fila['nombre'];
                    $resumen = substr($fila['descripcion'], 0, 40);
                    $this->juegos[$i]['descripcion'] = $resumen;
                    $this->juegos[$i]['plataforma'] = $fila['plataforma'];
                    $this->juegos[$i]['caratula'] = $fila['caratula'];
                    $fecha = date('d/m/Y',strtotime($fila['fecha_lanzamiento']));
                    $this->juegos[$i]['fecha'] = $fecha;
                    $this->juegos[$i]['activo'] = $fila['activo'];
                    $this->juegos[$i]['logotipo'] = $fila['logotipo'];                  
                    $i++;
                }
            }
        } else {
            echo "Error de conexion";
        }
        return $this->juegos;
    }
    public function todos_Juegos()
    {
        $consulta = mysqli_query($this->bd, "select juegos.* from juegos,plataformas where juegos.activo=1 and plataforma = plataformas.id and plataformas.activo = 1");

        if (mysqli_num_rows($consulta) > 0) {
            $i = 0;
            while ($fila = mysqli_fetch_assoc($consulta)) {
                $this->juegos[$i]['id'] = $fila['id'];
                $this->juegos[$i]['nombre'] = $fila['nombre'];
                $this->juegos[$i]['caratula'] = $fila['caratula'];
                $i++;
            }
        }
        return $this->juegos;
    }
    public function juego_Plataforma($plataforma)
    {
        $consulta = mysqli_query($this->bd, "select juegos.* from juegos, plataformas where plataformas.nombre = '$plataforma' AND plataformas.id = plataforma ORDER BY fecha_lanzamiento");

        if (mysqli_num_rows($consulta) > 0) {
            $i = 0;
            while ($fila = mysqli_fetch_assoc($consulta)) {
                $this->juegos[$i]['id'] = $fila['id'];
                $this->juegos[$i]['nombre'] = $fila['nombre'];
                $this->juegos[$i]['caratula'] = $fila['caratula'];
                $i++;
            }
        }
        return $this->juegos;
    }
    public function verJuego($idjuego)
    {
        $consulta = mysqli_query($this->bd, "select * from juegos where id=$idjuego and activo=1");
        if (mysqli_num_rows($consulta) > 0) {

            $fila = mysqli_fetch_assoc($consulta);
            $this->juegos['id'] = $fila['id'];
            $this->juegos['nombre'] = $fila['nombre'];
            $this->juegos['caratula'] = $fila['caratula'];
            $this->juegos['desc'] = $fila['descripcion'];
            $this->juegos['fecha'] = $fila['fecha_lanzamiento'];
            $this->juegos['activo'] = $fila['activo'];
        }
        return $this->juegos;
    }
}
