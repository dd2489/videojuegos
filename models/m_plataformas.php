<?php

class modelo_plataforma {

    private $bd;
    private $lanzamiento;
    private $plataforma;
    
    public function __construct()
    {
        $this->bd = conectar::conexion();
        $this->lanzamiento = array();
    }

    public function menuPlataforma(){
        $consulta = mysqli_query($this->bd,"select nombre, logotipo from plataformas where activo=1");
        if(mysqli_num_rows($consulta) > 0 ){
            $i = 0;
            while($fila = mysqli_fetch_assoc($consulta)){
                $this->plataforma[$i]['nombre'] = $fila['nombre'];
                $this->plataforma[$i]['logotipo'] = $fila['logotipo'];
                $i++;
            }
        }
        return $this->plataforma;
    
    }

    public function ultimosLanzamientos($plataforma){

        $consulta = mysqli_query($this->bd,"select juegos.* from juegos, plataformas where plataformas.nombre = '$plataforma' AND plataformas.id = plataforma AND plataformas.activo=1 and juegos.activo=1 ORDER BY fecha_lanzamiento DESC LIMIT 4");
        
        if(mysqli_num_rows($consulta) > 0 ){
            $i = 0;
            while($fila = mysqli_fetch_assoc($consulta)){
                $this->lanzamiento[$i]['id'] = $fila['id'];
                $this->lanzamiento[$i]['caratula'] = $fila['caratula'];
                $i++;
            }
        }
        return $this->lanzamiento;
    }

    public function mostrarPlataformas(){
        $consulta = mysqli_query($this->bd,"select * from plataformas where activo = 1");
        
        if(mysqli_num_rows($consulta) > 0 ){
            $i = 0;
            while($fila = mysqli_fetch_assoc($consulta)){
                $this->plataforma[$i]['id'] = $fila['id'];
                $this->plataforma[$i]['nombre'] = $fila['nombre'];
                $this->plataforma[$i]['activo'] = $fila['nombre'];
                $this->plataforma[$i]['logotipo'] = $fila['logotipo'];
                $i++;
            }
        }
        return $this->plataforma;
    }
    




}
