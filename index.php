<?php
include 'bd/bd.php';
include "controllers/c_usuarios.php";

?>


<title>DavidGames - DG</title>

<div id="carousel-galaxias" class="carousel slide fluid-carousel d-none d-sm-block animate__animated animate__fadeIn" data-ride="carousel" data-interval="3500">
	<!-- Indicadores -->
	<ul class="carousel-indicators">
		<li data-target="#carousel-galaxias" data-slide-to="0" class="active"></li>
    	<li data-target="#carousel-galaxias" data-slide-to="1"></li>
  	</ul>
  	<!-- Imágenes -->
  	<div class="carousel-inner">
    	<div class="carousel-item active">
        <img src="assets/uploads/carrusel/img01.jpg" alt="Imagen de la galaxia Andrómeda" class="d-block w-100">
      		<div class="carousel-caption d-none d-sm-block fondoTransparente">
    			<h5>Los Mejores Juegos del 2021</h5>
    			<p>Con el Comienzo del 2021 ya hemos podido comprobar y ver los mejores juegos del año anterior 2020</p>
  			</div>
    	</div>
    	<div class="carousel-item">
      		<img src="assets/uploads/carrusel/img03.jpg" alt="Imagen de la galaxia Andrómeda" class="d-block w-100">
      		<div class="carousel-caption d-none d-sm-block fondoTransparente">
    			<h5>Halo regresa en este 2021</h5>
    			<p>El mejor shooter de la historia regresa en forma de chapa</p>
  			</div>
    	</div>
  </div>
  <!-- Siguiente y anterior -->
	<a class="carousel-control-prev" href="#carousel-galaxias" data-slide="prev">
 		<span class="carousel-control-prev-icon"></span>
  	</a>
  	<a class="carousel-control-next" href="#carousel-galaxias" data-slide="next">
    	<span class="carousel-control-next-icon"></span>
  	</a>
</div>

  

<?php $index = true;
include "controllers/c_plataformas.php";
?>
<div class="cuerpo-comentarios">
    <div class="container-fluid px-2 px-md-4 py-5 mx-auto">
        <div class="row d-flex justify-content-center">
            <div class="col-md-10 col-lg-9 col-xl-8">
                <div class="card card-main border-0 text-center">
                    <h2 class="font-weight-bold mb-4">Ultimos Comentarios</h2>
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="3500">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
                        </ol>
                        <div class="carousel-inner">
                            <?php 
                            require_once "models/m_comentarios.php";
                            $comentario = new modelo_comentarios();

                            $comentario = $comentario->caruselComentarios();
                            $i = 0;
                            foreach ($comentario as $datos){
                                if($i == 0){
                                  echo"  <div class='carousel-item active'>";
                                }else{
                                 echo " <div class='carousel-item'>";
                                }

                             
                                    echo"<div class='card border-0 card-0'>
                                    <div class='card profile py-3 px-4'>
                                        <div class='text-center'> <img src='./assets/uploads/caratulas/$datos[caratula]' class='img-fluid profile-pic'> </div>
                                        <h6 class='mb-0 mt-2'>$datos[nombre]</h6> <small>$datos[fecha]</small>
                                    </div> <img class='img-fluid open-quotes' src='./assets/uploads/dot.png' width='20' height='20'>
                                    <p class='content mb-0'>$datos[texto]</p> <img class='img-fluid close-quotes ml-auto' src='./assets/uploads/dot.png' width='20' height='20'>
                                </div>
                                </div>";
                            $i++;
                            }
                            // FIN FOREACH
                            ?>
                            
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<?php footer();
?>