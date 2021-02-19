<?php

function cabezera()
{
  echo "<!doctype html><html lang='en'><head>
  <meta charset='utf-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
  <link rel='shortcut icon' href='./assets/uploads/ico.png' type='image/x-icon'>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css' integrity='sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==' crossorigin='anonymous' />  <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css'    integrity='sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z' crossorigin='anonymous'>
  <link rel='stylesheet' href='./assets/css/style.css'>
  <script src='./assets/js/cookies.js' type='text/javascript'></script>
  <script src='./assets/js/app.js' type='text/javascript'></script>
  <link
    rel='stylesheet'
    href='https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css'
  /></head>
  <body>";

  // echo"<div class='oscuro'>
  // <div class='cookies-widget' id='cookies'>
  //   <p>Utilizamos Cookies propias y de terceros para mejorar nuestro servicio. Si continua con la navegación consideramos que acepta este uso </p>
  //   <button name='cookies' id='boton-cookies'class='btn acceder my-2 my-sm-0' type='submit'>Aceptar</button>
  // </div></div>";

}
function menu($tipo)
{
  if (isset($_SESSION['rol'])) {
    $tipo = $_SESSION['rol'];
    if ($tipo == 'admin') {
      echo "
      <nav class='navbar navbar-expand-lg navbar-light bg-primary'>
        <a class='navbar-brand' href='./'>
          <img src='./assets/uploads/logo-dgames.png' class='d-inline-block align-top' alt='logo de la web'>
        </a>
        <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarSupportedContent'
          aria-controls='navbarSupportedContent' aria-expanded='false' aria-label='Toggle navigation'>
          <span class='navbar-toggler-icon'></span>
        </button>
        <div class='collapse navbar-collapse' id='navbarSupportedContent'>
          <ul class='navbar-nav mr-auto'>
            <li class='nav-item active'>
              <a class='nav-link text-white' href='./'>Inicio <span class='sr-only'>(current)</span></a>
            </li>
            <li class='nav-item'>
              <a class='nav-link text-white' href='./juegos.php'>Juegos</a>
            </li>
            <li class='nav-item'>
              <a class='nav-link text-white' href='./plataformas.php'>Plataformas</a>
            </li>
            <li class='nav-item'>
              <a class='nav-link text-white' href='./usuarios.php'>Usuarios</a>
            </li>
            <li class='nav-item'>
              <a class='nav-link text-white' href='./comentarios.php'>Comentarios</a>
            </li>
          </ul>
          <!--Formulario de admin-->
          <form class='form-inline my-2 my-lg-0' method='POST' action='#'>
            <label class='d-none d-lg-block'>Hola $_SESSION[nick]</label>
            <img class='avatar d-none d-lg-block' src='./assets/uploads/avatar/admin.png' width='40' height='40'>
            <button name='salir' class='btn acceder my-2 my-sm-0' type='submit'>Salir</button>
          </form>
          <!--FIN FORMULARIO DE ACCESO-->
        </div>
      </nav>
      <!-- FIN MENU -->";
    } elseif ($tipo == 'user') {
      echo "<nav class='navbar navbar-expand-lg navbar-light bg-primary'>
        <a class='navbar-brand' href='./'>
          <img src='./assets/uploads/logo-dgames.png' class='d-inline-block align-top' alt='logo de la web'>
        </a>
        <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarSupportedContent'
          aria-controls='navbarSupportedContent' aria-expanded='false' aria-label='Toggle navigation'>
          <span class='navbar-toggler-icon'></span>
        </button>
        <div class='collapse navbar-collapse' id='navbarSupportedContent'>
          <ul class='navbar-nav mr-auto'>
            <li class='nav-item active'>
              <a class='nav-link text-white' href='./'>Inicio <span class='sr-only'>(current)</span></a>
            </li>
            <li class='nav-item'>
              <a class='nav-link text-white' href='./juegos.php'>Juegos</a>
            </li>
            <li class='nav-item'>
              <a class='nav-link text-white' href='./plataformas.php'>Plataformas</a>
            </li>
          </ul>
          <!--Formulario de admin-->
          <form class='form-inline my-2 my-lg-0' method='POST'>
            <label class='d-none d-lg-block'>¡Hola! $_SESSION[nick]</label>
            <img class='avatar d-none d-lg-block' src='./assets/uploads/avatar/avatar2.jpg' width='40' height='40'>
            <button name='salir' class='btn acceder my-2 my-sm-0' type='submit'>Salir</button>
          </form>
          <!--FIN FORMULARIO DE ACCESO-->
        </div>
      </nav>";
    }
  } else {
    echo "<nav class='navbar navbar-expand-lg navbar-light bg-primary'>
      <a class='navbar-brand' href='./'>
        <img src='./assets/uploads/logo-dgames.png' class='d-inline-block align-top' alt=''>
      </a>
      <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarSupportedContent'
        aria-controls='navbarSupportedContent' aria-expanded='false' aria-label='Toggle navigation'>
        <span class='navbar-toggler-icon'></span>
      </button>
      <div class='collapse navbar-collapse' id='navbarSupportedContent'>
        <ul class='navbar-nav mr-auto'>
          <li class='nav-item active'>
            <a class='nav-link text-white' href='./'>Inicio <span class='sr-only'>(current)</span></a>
          </li>
          <li class='nav-item'>
            <a class='nav-link text-white' href='./juegos.php'>Juegos</a>
          </li>
          <li class='nav-item'>
            <a class='nav-link text-white' href='./plataformas.php'>Plataformas</a>
          </li>
        </ul>
        <!--Formulario de Acceso-->
        <form class='form-inline my-2 my-lg-0' method='POST'>
          <input name='user' class='form-control mr-sm-2' type='text' placeholder='Usuario' aria-label='Usuario'>
          <input name='pass' class='form-control mr-sm-2' type='password' placeholder='*******' aria-label='pass'>
          <button name='enviar' class='btn acceder my-2 my-sm-0' type='submit'>Acceder</button>
        </form>
        <!--FIN FORMULARIO DE ACCESO-->
      </div>
    </nav>";
  }
}
function footer()
{
  echo "</body>
  <footer class='footer'>
    <div class='row'>
        <div class='col-sm-6 col-md-4 footer-navigation'>
            <h3><a href='./'>David<span>Games</span>©</a></h3>
            <p class='links'><a href='./'>Inicio</a><strong> · </strong><a href='./juegos.php'>Juegos</a><strong> · </strong><a href='./plataformas.php'>Plataformas</a><strong> <br> </strong><a class='fab fa-twitter' target='_blank' href='https://twitter.com/'></a><strong> · </strong><a class ='fab fa-facebook' target='_blank' href='https://www.facebook.com/'></a><strong> · </strong><a class='fab fa-youtube' target='_blank' href='https://www.youtube.com/?hl=es&gl=ES' target='_blank'></a></p>
            <p class='company-name'>Dgames.com</p>
        </div>
        <div class='col-sm-6 col-md-4 footer-contacts'>
            <div><span class='fa fa-map-marker footer-contacts-icon'> </span>
                <p><span class='new-line-span'>c/ Dr Oloriz</span>Granada, SPAIN</p>
            </div>
            <div><i class='fa fa-phone footer-contacts-icon'></i>
                <p class='footer-center-info email text-left'> +34 958 27 80 60</p>
            </div>
            <div><i class='fa fa-envelope footer-contacts-icon'></i>
                <p> <a href='#' target='_blank'>soporte@dgames.com</a></p>
            </div>
        </div>
        <div class='clearfix'></div>
        <div class='col-md-4 footer-about'>
            <h4>Sobre esta Pagina</h4>
            <p>Este proyecto esta subido a un subdominio propiedad de David Serrano Martin de EAG</p>
        </div>
    </div>
</footer>
  <script>
  $(document).ready(function(){
    $('.parallax').parallax();
    });

    $(document).ready(function(){
      $('[data-toggle='tooltip']').tooltip();
    });

    $('#myModal').on('shown.bs.modal', function () {
      $('#myInput').trigger('focus')
    })
    </script>
  <script src='https://code.jquery.com/jquery-3.3.1.slim.min.js'
      integrity='sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo'
      crossorigin='anonymous'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js'
      integrity='sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1'
      crossorigin='anonymous'></script>
    <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js'
      integrity='sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM'
      crossorigin='anonymous'></script>
      ";
}


function estrellasRandom()
{
  //De tener un campo en la base de datos que se llame rating o algo para valorar el juego y que sea mas atractivoa  la hora del UX
  $aleatorio = rand(1, 5);
  $i = 0;
  echo "<div class='estrellas'><b>$aleatorio/5 </b>";
  while ($i < $aleatorio) {
    echo "★";
    $i++;
  }
  echo "</div>";

}

function avatarRandom(){
  $aleatorio = rand(1, 4);
  return $aleatorio;
}