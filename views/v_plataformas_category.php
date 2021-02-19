<title>Plataformas que usamos - DGames</title>
<div class='container-fluid'>
<div class="separador"></div>

<div class="separador"></div>

        <h2 class='text-center titulo '>Plataformas con las que Trabajamos</h2>
        <div class="separador"></div>
        <div class='d-flex justify-content-center flex-wrap'>
        <?php 
        foreach ($p_plataforma as $datos){
            echo"<div>
            <center>
            <a href='juegos.php?plataforma=$datos[nombre]'><img class='imagen-plataforma' src='/assets/uploads/plataformas/$datos[logotipo]'></a>
            </center></div>";   
        }
        ?>
            
        </div>
    </div>