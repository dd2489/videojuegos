<?php 

echo "<div class='container separador'>
    <div class='row'>
        <div class='col d-flex justify-content-center'>

            <form class='form-inline d-flex justify-content-center' method='get'>
                <input name='nombre' class='form-control mr-sm-2' type='search' placeholder='Buscar por nombre' aria-label='Search' required>
                <button type='submit' class='btn buscar my-2 my-sm-0' name='buscar'>Buscar</button>
            </form>
            <div class='insertar-usuario'>
            <a class='btn btn-primary' href='/juegos.php?addjuego'>Nuevo Juego <i class='fas fa-user-plus'></i></a></div>
        </div>
    </div>
    </div>";
    // VISTA INDIVIDUAL BUSCAR RESULTADO
    if (isset($_GET['buscar'])) {
        echo "<div class='container separador'>
        <h2>Juegos encontrados : " . count($buscarJuego) . " </h2><a href='/juegos.php'> <i class='fas fa-arrow-left'></i> Volver a Juegos</a>";
        if (count($buscarJuego) > 0) {
            echo " <table class='table tabla-responsive'>
            <thead class='thead-dark'>
                <tr>
                    <th scope='col'>Nombre Juego</th>
                    <th scope='col'>Descripcion</th>
                    <th scope='col'>Caratula</th>
                    <th scope='col'>Fecha Lanzamiento</th>
                    <th scope='col'>Plataforma</th>
                    <th scope='col'>Accion</th>
                </tr>
            </thead>
            <tbody>";

            foreach ($buscarJuego as $lista) {

                if ($lista['activo'] == 0) {
                    echo " <tr class='table-danger'>";
                } else {
                    echo  "<tr>";
                }
    
    
                echo "<th scope='row'>$lista[nombre]</th>
                    <td>$lista[descripcion]...</td>
                    <td><img class='caratulas-admin' src='assets/uploads/caratulas/$lista[caratula]'></td>
                    <td>$lista[fecha]</td>
                    <td><img class='caratulas-admin' src='assets/uploads/plataformas/$lista[logotipo]'></td>
                    <td><a class='btn btn-success far fa-edit' href='/usuarios.php?modificar&id=$lista[id]&nombre=$lista[nombre]&nick=$lista[nick]&activo=$lista[activo]'></a></td>
                    
                    
                    </tr>";
            }
        } else {
            echo "<p>No hemos encontrado nada<p>";
        }
        echo "</tbody></table></div>";
    } elseif (isset($_GET['addjuego'])) {

        echo "<div class='container separador container-admin bg-white'><a href='/juegos.php'> <i class='fas fa-arrow-left'></i> Volver a Juegos</a>
    
        
        <div class='d-flex justify-content-center'>

        <form action='#' method='post' enctype='multipart/form-data'>
            <fieldset>
                <legend>Formulario para Añadir Juegos</legend>
                <!-- Nombre -->
                  <!-- Nombre -->
                    <div class='form-group'>
                        <label for = 'nombre' class='col control-label'>Nombre</label>
                        <div class='col inputGroupContainer'>
                            <div class='input-group'>
                                <input id='nombre' name='nombre' placeholder='Nombre' class='form-control' type='text'>
                            </div>
                        </div>
                    </div>
                <!-- Texto -->
                <div class='form-group'>
                    <label for='textoJuego'class='col control-label'>Descripcion: </label>
                    <div class='col inputGroupContainer'>
                        <div class='input-group'>
                        <textarea name='texto' class='form-control' id='textoJuego' rows='3'></textarea>
                        </div>
                    </div>
                </div>
                <!-- Fecha -->
                <div class='form-group'>
                    <label for='fecha' class='col control-label'>Lanzamiento del Juego: </label>
                    <div class='col inputGroupContainer'>
                        <div class='input-group'>
                        <input type='date' class='form-control' id='fecha' name='fecha'>
                        </div>
                    </div>
                </div>

                <div class='form-group'>
                <label for='plataforma' class='col control-label'>Plataforma: </label>
                    <div class='col inputGroupContainer'>
                        <div class='input-group'>
                        <select id='plataforma' name='plataforma' class='custom-select'>";
                        
                        foreach ($listaPlataformasJuegos as $datos){
                            echo"<option value='$datos[id]'>$datos[nombre]</option>";
                        }
                       echo "</select>
                        </div>
                    </div>
                </div>
                <!-- caratula -->
                <div class='form-group'>
                    <label for='img'class='col control-label'>Caratula: </label>
                    <div class='col inputGroupContainer'>
                        <div class='input-group'>
                        <input id='img' type='file' name='imagen'/><br>
                        </div>
                    </div>
                </div>

                <!-- Button -->
                <div class='form-group'>
                    <div class='col-md-4'>
                        <input type='submit' class='btn btn-primary' name='agregarjuego'>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
</div>
</div>";
    } elseif (isset($_GET['modificar'])) {
        echo "<div class='container separador container-admin bg-white'><a href='/juegos.php'> <i class='fas fa-arrow-left'></i> Volver a Juegos</a>
        

        
        <div class='d-flex justify-content-center'>

        <form action='#' method='POST'>
            <fieldset>
                <legend>Modificar Juego $nombre</legend>
                <!-- Nombre -->
                <div class='form-group'>
                    <label class='col control-label'>Nombre</label>
                    <div class='col inputGroupContainer'>
                        <div class='input-group'>
                            <input name='add_nombre' placeholder='Nombre' class='form-control' type='text' value='$nombre'>
                        </div>
                    </div>
                </div>
                
                <div class='form-group'>
                <label for='plataforma' class='col control-label'>Plataforma: </label>
                    <div class='col inputGroupContainer'>
                        <div class='input-group'>
                        <select id='plataforma' name='plataforma' class='custom-select'>";
                        
                        foreach ($listaPlataformasJuegos as $datos){
                            echo"<option value='$datos[id]'>$datos[nombre]</option>";
                        }
                       echo "</select>
                        </div>
                    </div>
                </div>                
                <!-- ESTADO ACTIVO -->
                <div class='form-group'>
                <label class='col control-label'>Estado:</label>
                    <div class='col inputGroupContainer'>
                        <div class='input-group'>
                        <select name='activo' class='custom-select'>";
                        if($_GET['activo'] == 1){
                            echo "<option selected value='1'>Activo</option>
                            <option value='0'>Desactivado</option>";
                        }else{
                            echo "<option value='1'>Activo</option>
                            <option selected value='0'>Desactivado</option>";
                        }
                            
                      
                      echo"</select>
                        </div>
                    </div>
                </div>
                
                <!-- Button -->
                <div class='form-group'>
                    <div class='col-md-4'>
                        <input type='submit' class='btn btn-primary' name='modificaruser'>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
</div>
</div>";
    }

    // IMPRIMIR PANEL NORMAL
    if (!isset($_GET['buscar']) && !isset($_GET['addjuego']) && !isset($_GET['modificar'])) {
        echo "<h2 class='separador text-center'>Lista de Juegos</h2>
    
    <div class='container'>
    <table class='table'>
        <thead class='thead-dark'>
            <tr>
                <th scope='col'>Nombre Juego</th>
                <th scope='col'>Descripcion</th>
                <th scope='col'>Caratula</th>
                <th scope='col'>Fecha Lanzamiento</th>
                <th scope='col'>Plataforma</th>
                <th scope='col'>Accion</th>
            </tr>
        </thead>
        <tbody>
        ";

        foreach ($mostrarJuegos as $lista) {

            if ($lista['activo'] == 0) {
                echo " <tr class='table-danger'>";
            } else {
                echo  "<tr>";
            }


            echo "<th scope='row'>$lista[nombre]</th>
                <td>$lista[descripcion]...</td>
                <td><img class='caratulas-admin' src='assets/uploads/caratulas/$lista[caratula]'></td>
                <td>$lista[fecha]</td>
                <td><img class='caratulas-admin' src='assets/uploads/plataformas/$lista[logotipo]'></td>";

                echo "<td><a class='btn btn-success far fa-edit' href='/juegos.php?modificar&id=$lista[id]&nombre=$lista[nombre]&activo=$lista[activo]&plataforma=$lista[plataforma]'></a></td>
                
                
                </tr>";
        }

        echo "</tbody></table></div>";
    }
