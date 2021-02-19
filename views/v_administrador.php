<?php
// VISTA MOD MENU Imprime lo que necesita dependiendo en la url que se encuentre

// CONTENIDO COPIADO


// ----------------------------------------
 
// MOD USUARIOS
if ($mod_usuarios == true) {
    echo "
    <div class='container separador'>
    <div class='row'>
        <div class='col d-flex justify-content-center'>

            <form class='form-inline d-flex justify-content-center' method='get'>
                <input name='nombre' class='form-control mr-sm-2' type='search' placeholder='Buscar por nombre' aria-label='Search' required>
                <button type='submit' class='btn buscar my-2 my-sm-0' name='buscar'>Buscar</button>
            </form>
            <div class='insertar-usuario'>
            <a class='btn btn-primary' href='/usuarios.php?adduser'>Nuevo Usuario <i class='fas fa-user-plus'></i></a></div>
        </div>
    </div>
    </div>";
    // VISTA INDIVIDUAL BUSCAR RESULTADO
    if (isset($_GET['buscar'])) {
        echo "<div class='container separador'>
        <h2>Usuarios encontrados : " . count($buscarUsuario) . " </h2><a href='/usuarios.php'> <i class='fas fa-arrow-left'></i> Volver a Usuarios</a>";
        if (count($buscarUsuario) > 0) {
            echo " <table class='table'>
                <thead class='thead-dark'>
                    <tr>
                        <th scope='col'>Nombre</th>
                        <th scope='col'>Nick</th>
                        <th scope='col'>Accion</th>
                    </tr>
                </thead>
                <tbody>";

            foreach ($buscarUsuario as $dato) {
                if ($dato['activo'] == 0) {
                    echo " <tr class='table-danger'>";
                } else {
                    echo  "<tr>";
                }


                echo "<th scope='row'>$dato[nombre]</th>
                    <td>$dato[nick]</td>
                    <td> 
                    
                    <a class='btn btn-primary far fa-edit' href='/usuarios.php?modificar&id=$dato[id]&nombre=$dato[nombre]&nick=$dato[nick]&activo=1'></a>              
    
                </td>
                    </tr>";
            }
        } else {
            echo "<p>No hemos encontrado nada<p>";
        }
        echo "</tbody></table></div>";
    } elseif (isset($_GET['adduser'])) {

        echo "
        <div class='d-flex justify-content-center container-admin bg-white'>
        <div class='container separador'><a href='/usuarios.php'> <i class='fas fa-arrow-left'></i> Volver a Usuarios</a>
        

        
        

        <form action='#' method='post'>
            <fieldset>
                <legend>Formulario para Añadir</legend>
                <!-- Nombre -->
                <div class='form-group'>
                    <label for='Añadir-usuario' class='col control-label'>Nombre</label>
                    <div class='col inputGroupContainer'>
                        <div class='input-group'>
                            <input id ='Añadir-usuario'name='add_nombre' placeholder='Nombre' class='form-control' type='text'>
                        </div>
                    </div>
                </div>
                <!-- nick -->
                <div class='form-group'>
                    <label for='añadir-nick' class='col control-label'>Nick</label>
                    <div class='col inputGroupContainer'>
                        <div class='input-group'>
                            <input id='añadir-nick'name='add_nick' placeholder='Nick del Usuario' class='form-control' type='text'
                                maxlength='16'>
                        </div>
                    </div>
                </div>
                <!-- Contraseña form -->
                <div class='form-group'>
                    <label for='contraseña' class='col control-label'>Contraseña:</label>
                    <div class='col inputGroupContainer'>
                        <div class='input-group'>
                            <input id='contraseña' name='add_pass' placeholder='*****' class='form-control' type='password'>
                        </div>
                    </div>
                </div>
                <!-- Button -->
                <div class='form-group'>
                    <div class='col-md-4'>
                        <input type='submit' class='btn btn-primary' name='agregaruser'>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
</div>
</div>";
    } elseif (isset($_GET['modificar'])) {
        echo "<div class='container separador'><a href='/usuarios.php'> <i class='fas fa-arrow-left'></i> Volver a Usuarios</a>
        

        
        <div class='d-flex justify-content-center'>

        <form action='#' method='POST'>
            <fieldset>
                <legend>Modificar Usuario $nombre</legend>
                <!-- Nombre -->
                <div class='form-group'>
                    <label for='mnombre' class='col control-label'>Nombre</label>
                    <div class='col inputGroupContainer'>
                        <div class='input-group'>
                            <input id='mnombre' name='add_nombre' placeholder='Nombre' class='form-control' type='text' value='$nombre'>
                        </div>
                    </div>
                </div>
                <!-- nick -->
                <div class='form-group'>
                    <label for='nick' class='col control-label'>Nick</label>
                    <div class='col inputGroupContainer'>
                        <div class='input-group'>
                            <input id='nick' name='add_nick' placeholder='Nick del Usuario' class='form-control' type='text'
                                maxlength='16' value='$nick'>
                        </div>
                    </div>
                </div>
                <!-- Contraseña form -->
                <div class='form-group'>
                    <label for='contraseña' class='col control-label'>Contraseña:</label>
                    <div class='col inputGroupContainer'>
                        <div class='input-group'>
                            <input id='contraseña' name='add_pass' placeholder='*****' class='form-control' type='password'>
                        </div>
                    </div>
                </div>
                <!-- ESTADO ACTIVO -->
                <div class='form-group'>
                <label for='estado' class='col control-label'>Estado:</label>
                    <div class='col inputGroupContainer'>
                        <div class='input-group'>
                        <select id='estado' name='activo' class='custom-select'>";
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
    if (!isset($_GET['buscar']) && !isset($_GET['adduser']) && !isset($_GET['modificar'])) {
        echo "<h2 class='separador text-center'>Panel de Usuarios</h2>
    
    <div class='container'>
    <table class='table'>
        <thead class='thead-dark'>
            <tr>
                <th scope='col'>Nombre</th>
                <th scope='col'>Nick</th>
                <th scope='col'>Accion</th>
            </tr>
        </thead>
        <tbody>
        ";

        foreach ($listaUsers as $lista) {

            if ($lista['activo'] == 0) {
                echo " <tr class='table-danger'>";
            } else {
                echo  "<tr>";
            }


            echo "<th scope='row'>$lista[nombre]</th>
                <td>$lista[nick]</td>
                <td> 
                
                <a class='btn btn-primary far fa-edit' href='/usuarios.php?modificar&id=$lista[id]&nombre=$lista[nombre]&nick=$lista[nick]&activo=$lista[activo]'></a>              

            </td>
                </tr>";
        }

        echo "</tbody></table></div>";
    }
}

// -----------------------------------------







if ($mod_plataformas == true) {
    echo "
    <div class='container separador'>
    <h2 class='text-center'>Control de Plataformas</h2>

    <div class='row'>
        <div class='col d-flex justify-content-center'>

            <form class='form-inline d-flex justify-content-center' method='get'>
                <input name='nombre' class='form-control mr-sm-2' type='search' placeholder='Buscar Plataforma' aria-label='Search' required>
                <button type='submit' class='btn buscar my-2 my-sm-0' name='buscar'>Buscar</button>
            </form>
            <div class='insertar-usuario'>
            <a class='btn btn-primary' href='/plataformas.php?nuevaplataforma'><i class='fas fa-plus'></i> Nueva Plataformas</a></div>
        </div>
    </div>
    </div>";

    // VISTA INDIVIDUAL BUSCAR RESULTADO
    if (isset($_GET['buscar'])) {
        echo "<div class='container separador'>
        <h2>Plataformas encontradas : " . count($buscarplataformas) . " </h2><a href='/plataformas.php'> <i class='fas fa-arrow-left'></i> Volver a Plataformas</a>";
        if (count($buscarplataformas) > 0) {
            echo " <table class='table'>
                <thead class='thead-dark'>
                    <tr>
                        <th scope='col'>Logo</th>
                        <th scope='col'>Nombre</th>
                        <th scope='col'>Accion</th>
                    </tr>
                </thead>
                <tbody>";

            foreach ($buscarplataformas as $dato) {
                if ($dato['activo'] == 0) {
                    echo " <tr class='table-danger'>";
                } else {
                    echo  "<tr>";
                }


                echo "<th><a href='juegos.php?plataforma=$dato[nombre]'><img class='p-admin' src='assets/uploads/plataformas/$dato[logotipo]'></a></th>
                    <td>$dato[nombre]</td>
                    <td> 
                    
                    <a class='btn btn-primary far fa-edit' href='/plataformas.php?modificar&id=$dato[id]&nombre=$dato[nombre]&activo=$dato[activo]&logo=$dato[logotipo]'></a>              
    
                </td>
                    </tr>";
            }
        } else {
            echo "<p>No hemos encontrado nada<p>";
        }
        echo "</tbody></table></div>";
    } elseif (isset($_GET['nuevaplataforma'])) {

        echo "<div class='container separador bg-white container-admin'><a href='/plataformas.php'> <i class='fas fa-arrow-left'></i> Volver a Plataformas</a>
        

        
        <div class='d-flex justify-content-center'>

        <form action='#' method='POST' enctype='multipart/form-data'>
                    <fieldset>
                        <p><label for='nombre'>Nombre</label><input id='nombre' type='text' name='nombre' requiered class='form-control' />
                        </p>
                        <br>
                        <label for='img'>Imagen</label>
                        <br>
                        <input id='img' type='file' name='imagen' /><br>
                        <input class='btn btn-primary separador mb-5' type='submit' name='agregarplataforma' value='Añadir Plataforma'>
                    </fieldset>
                </form>
    </div>
</div>
</div>";
    } elseif (isset($_GET['modificar'])) {
        echo "<div class='container separador bg-white container-admin'><a href='/plataformas.php'> <i class='fas fa-arrow-left'></i> Volver a Plataformas</a>
        

        
        <div class='d-flex justify-content-center'>

        <form action='#' method='POST' enctype='multipart/form-data'>
            <fieldset>
                <legend>Modificar Plataforma $_GET[nombre]</legend>
                <!-- Nombre -->
                <div class='form-group'>
                    <label for = 'nombre' class='col control-label'>Nombre</label>
                    <div class='col inputGroupContainer'>
                        <div class='input-group'>
                            <input id='nombre' name='add_nombre' placeholder='Nombre' class='form-control' type='text' value='$_GET[nombre]'>
                        </div>
                    </div>
                </div>
                <!-- ESTADO ACTIVO -->
                <div class='form-group'>
                <label for='estado' class='col control-label'>Estado:</label>
                    <div class='col inputGroupContainer'>
                        <div class='input-group'>
                        <select id='estado' name='activo' class='custom-select'>";
        if ($_GET['activo'] == 1) {
            echo "<option selected value='1'>Activo</option>
                            <option value='0'>Desactivado</option>";
        } else {
            echo "<option value='1'>Activo</option>
                            <option selected value='0'>Desactivado</option>";
        }


        echo "</select>
                        </div>
                    </div>
                </div>
                <!-- IMAGEN UPDATE-->
                <div class='form-group'>
                <label for='imagen' class='col control-label'>Imagen Logo:</label>
                <div class='col inputGroupContainer'>
                        <div class='input-group'>
                <input id='imagen' type='file' name='imagen' />
                </div></div></div>
                <!-- Button -->
                <div class='form-group'>
                    <div class='col-md-4'>
                        <input type='submit' class='btn btn-primary' name='modificarplataforma'>
                    </div>
                </div>
                <div class='form-group'>
                <div class='col-md-12'>
                <h4>Logo actual:</h4>
                <img class='p-admin' src='assets/uploads/plataformas/$_GET[logo]'>
                </div>
                </div>
            </fieldset>
        </form>
    </div>
</div>
</div>";
    }

    // IMPRIMIR tabla plataformas
    if (!isset($_GET['buscar']) && !isset($_GET['nuevaplataforma']) && !isset($_GET['modificar'])) {
        echo "<h2 class='separador text-center'>Lista de todas las plataformas</h2>
    
    <div class='container'>
    <table class='table'>
        <thead class='thead-dark'>
            <tr>
                <th scope='col'>Logo</th>
                <th scope='col'>Nombre</th>
                <th scope='col'>Accion</th>
            </tr>
        </thead>
        <tbody>
        ";
        // MOSTRAR PLATAFORMAS
        foreach ($mostrar_plataformas as $lista) {

            if ($lista['activo'] == 0) {
                echo " <tr class='table-danger'>";
            } else {
                echo  "<tr>";
            }


            echo "<th><a href='juegos.php?plataforma=$lista[nombre]'><img class='p-admin' src='assets/uploads/plataformas/$lista[logotipo]'></a></th>
                <td>$lista[nombre]</td>
                <td> 
                
                <a class='btn btn-primary far fa-edit' href='/plataformas.php?modificar&id=$lista[id]&nombre=$lista[nombre]&activo=$lista[activo]&logo=$lista[logotipo]'></a>              

            </td>
                </tr>";
        }

        echo "</tbody></table></div>";
    }
}
?>
</tbody>
</table>
</div>