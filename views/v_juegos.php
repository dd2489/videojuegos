<!-- Aqui va un menu con iconos  -->
<title>Todos los Juegos Disponibles <?php if (isset($token)) {
                                      echo "de $token - DGames";
                                    } ?></title>
<?php if ($mostrar_error == true) {
  echo "<div class='alert alert-danger text-center' role='alert'>
    Esta Plataforma No existe <a href='./juegos.php' class='alert-link'>volver a juegos</a>. (Click para volver).
  </div>
  <div class='categorias-juegos separador text-center'>
    <h2>o eligue una de estas plataformas : </h2>
  </div>
  ";
} ?>
<!-- MENU DE CATEGORIAS -->
<div class="categorias-juegos separador text-center">
  <div class="lista-plataforma">
    <a href="juegos.php"><img class="icon" src="assets/uploads/icons/square.png"> Todos</a>
    <?php
   
    foreach($link_plataformas as $links){
      echo"<a href='juegos.php?plataforma=$links[nombre]'><img class='icon' src='assets/uploads/plataformas/$links[logotipo]'> $links[nombre]</a>";
    }

?>
  </div>
</div>
<br>


<?php if (!empty($_GET['ver'])) {
  // JUEGO INDIVIDUAL 
  if (!empty($juegos)) {
    echo "<div class='container'>
      <div class='row'>
          <div class='col-lg-12 morado p-2 text-white mt-2 text-center text-capitalize'>
              <h3>$juegos[nombre]</h3>
          </div>
      </div>
      <div class='row mt-4'>
          <div class='col-lg-4 text-center'>
              <div class='tab-content row mtop d-flex justify-content-center align-items-center' id='myTabContent'>
                  <div class='tab-pane fade show active col-lg-12' id='home' role='tabpanel'
                      aria-labelledby='home-tab'>
                      <img class='img-fluid' src='./assets/uploads/caratulas/$juegos[caratula]' />
                      ";
    estrellasRandom();
    echo "<h5>Fecha Lanzamiento : $fechajuegos</h5>
                  </div>
              </div>
          </div>
          <div class='col-lg-7 separador'>
              <h2>
                  Descripción
              </h2>
              <p>$juegos[desc]</p>
          </div>";
    // SECCION DE COMENTARIOS
    // SACAR LOS COMENTARIOS $numero_comentarios 
    echo "<div class='container separador bg-white comentarios'>
          <div class='row mtop mleft'>";
    if ($numero_comentarios == 0) {
      echo "<h5 for='#comentario'>No hay Comentarios :( </h5></div>";
    } else if ($numero_comentarios > 0) {
      echo "<h5 for='#comentario'>Comentarios | $numero_comentarios |</h5></div><br>";
    }

    // ESTO METERLO POR SI NO ESTAS REGISTRADO
    if (isset($_SESSION['rol'])) {
      echo "<div class='form-floating'>
              <form method='POST' action='#'>
                  <textarea class='form-control' placeholder='Escribe tu comentario'
                      maxlength='255' name='comentario'></textarea><br>
                  <input type='submit' value='Comentar' name='comentar' class='btn boton-comentar'>
              </form>
          </div><br>";
    }
    // POR SI NO ESTA REGISTRADO SE OCULTA
    // CARGA LOS COMENTARIOS
    if ($numero_comentarios != 0) {
      foreach ($comentario as $datos) {
        echo "<div class='row comentario'>
              <div class='head'>
                  <small><strong class='user'>$datos[usuario] $datos[fecha]</strong></small>
              </div><br>
              <p> $datos[texto]</p>
              </div>";
      }
    }
    //FIN COMENTARIOS
    echo "</div></div></div>";
  } else {
    echo "<META HTTP-EQUIV='REFRESH'CONTENT='0;URL=./juegos.php'>";
  }
} else {
  echo "<div class='container-fluid'>";
  // CATEGORIAS VIDEOJUEGOS
  if ($mostrar_error !== true) {
    echo "<h2 class='text-center titulo animate__bounceIn animate__slower'>Juegos";
    if (isset($token)) {
      echo " de $token";
    }
    echo "</h2>
    
    
  <div class='d-flex justify-content-center flex-wrap'>";
  }
  if (isset($juegos)) {
    foreach ($juegos as $datos) {
      echo "<div class='card-g card-game animate__bounceIn animate__faster'>
                <center>
                <img src='./assets/uploads/caratulas/$datos[caratula]'>
                <small>$datos[nombre]</small><br>
                <a href='juegos.php?ver=$datos[id]' class='btn btn-primary'>Ver Juego</a>
                </center>
            </div>";
    }
    echo "</div></div>";
  }
}
?>