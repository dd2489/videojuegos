<!-- ULTIMOS JUEGOS EPIC GAMES -->
<div class='separador'></div>
<div class='container-fluid'>
    <h2 class='text-center titulo'>Ultimos Juegos de Epic Games</h2>
    <div class='d-flex justify-content-center flex-wrap'>
        <?php foreach ($epicgames as $datos) {
            echo "<div class='card-g card-game'>
                <center>
                <img src='assets/uploads/caratulas/$datos[caratula]'>
                <br>
                <a href='juegos.php?ver=$datos[id]' class='btn btn-primary '>Ver Juego</a>
                </center>
            </div>";
        } ?>
    </div>
</div>
<!-- FIN ULTIMOS JUEGOS EPIC GAMES-->
<!-- JUEGOS STEAM -->
<div class='separador'></div>
<hr>
<div class='container-fluid'>
    <h2 class='text-center titulo'>Ultimos Juegos de Steam</h2>
    <div class='d-flex justify-content-center flex-wrap'>
        <?php foreach ($steam as $datos) {
            echo "<div class='card-g card-game'>
                <center>
                <img src='assets/uploads/caratulas/$datos[caratula]'>
                <br>
                <a href='juegos.php?ver=$datos[id]' class='btn btn-primary '>Ver Juego</a>
                </center>
            </div>";
        } ?>
    </div>
</div>
<!-- FIN JUEGOS STEAM -->

<!-- FIN ULTIMOS JUEGOS XBOX-->
<div class='separador'></div>
<hr>
<div class='container-fluid'>
    <h2 class='text-center titulo'>Ultimos Juegos de Xbox</h2>
    <div class='d-flex justify-content-center flex-wrap'>
        <?php foreach ($xbox as $datos) {
            echo "<div class='card-g card-game'>
                <center>
                <img src='assets/uploads/caratulas/$datos[caratula]'>
                <br>
                <a href='juegos.php?ver=$datos[id]' class='btn btn-primary '>Ver Juego</a>
                </center>
            </div>";
        } ?>
    </div>
</div>

<div class='separador'></div>
<hr>
<div class='container-fluid'>
    <h2 class='text-center titulo'>Ultimos Juegos de Nintendo</h2>
    <div class='d-flex justify-content-center flex-wrap'>
        <?php foreach ($nintendo as $datos) {
            echo "<div class='card-g card-game'>
                <center>
                <img src='assets/uploads/caratulas/$datos[caratula]'>
                <br>
                <a href='juegos.php?ver=$datos[id]' class='btn btn-primary '>Ver Juego</a>
                </center>
            </div>";
        } ?>
    </div>
</div>