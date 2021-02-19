<title>Mod Menu - Comentarios</title>
<h2 class="separador text-center">Panel de Comentarios <small>(Total: <?php echo count($comentarios_mod);?>)</small></h2>



<div class="container">
    <table class="table table-responsive">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Nick</th>
                <th scope="col">Juego</th>
                <th scope="col">Fecha</th>
                <th scope="col">Comentario</th>
                <th scope="col">Acción</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($comentarios_mod as $comments) {
                echo "<th scope='row'>$comments[nick]</th>
                <td>$comments[nombre_j]</td>
                <td>$comments[fecha]</td>
                <td>$comments[texto]</td>
                <td><a href='/comentarios.php?borrar&id=$comments[iduser]&juego=$comments[idjuego]' class='btn btn-danger fas fa-trash-alt' id='borrar'></a></td>
                </tr>";
            }
            ?>
        </tbody>
    </table>
</div>