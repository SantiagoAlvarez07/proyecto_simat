<?php

class UserView
{
    //Metodo para mostrar el formulario para insertar un nuevo usuario 
    function showFormUser($arrayTypeDocument, $arrayRol, $arrayEstado)
    {
?>
        <div>
            <form id="insert_user">
                <!-- Nombres del usuario -->
                <div class="row">
                    <div class="form-group col">
                        <label for="nombre">Nombre(s)</label>
                        <input type="text" class="form-control" id="nombre" name="nombre">
                    </div>
                    <div class="form-group col">
                        <label for="apellido">Apellido(s)</label>
                        <input type="text" class="form-control" id="apellido" name="apellido">
                    </div>
                </div>

                <!-- Campos para el documento -->
                <div class="row">
                    <div class="col">
                        <label for="tipo_documento">Tipo de documento</label>
                        <select class="form-control" id="tipo_documento" name="tipo_documento" aria-label="Default select example">
                            <option selected>Seleccionar</option>
                            <?php
                            foreach ($arrayTypeDocument as $typeDocument) 
                            {
                                $id_tdoc = $typeDocument->id_tdoc;
                                $nombre_tdoc = $typeDocument->nombre_tdoc;
                                if($id_tdoc > 1)
                                {
                                ?>
                                    <option value="<?php echo $id_tdoc ?>"><?php echo $nombre_tdoc ?></option>
                                <?php
                                }
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group col">
                        <label for="documento">Documento</label>
                        <input type="text" class="form-control" id="documento" name="documento">
                    </div>
                </div>

                
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" id="email" name="email">
                </div>
                

                <!-- Campos para pedir una contraseña -->
                <div class="row">
                    <div class="form-group col">
                        <label for="password">Contraseña</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <div class="form-group col">
                        <label for="confirmPassword">Confirmar contraseña</label>
                        </i><input type="password" class="form-control" id="confirmPassword" name="confirmPassword">
                    </div>
                </div>

                <!-- Ultimos campos del usuario -->
                <div class="row">
                    <div class="col">
                        <label for="">Estado</label>
                        <select class="form-control" id="estado" name="estado" aria-label="Default select example">
                            <option select>Seleccionar</option>
                            <?php
                            foreach ($arrayEstado as $estado) 
                            {
                                $id_estado = $estado->id_estado;
                                $nombre_estado = $estado->nombre_estado;
                            ?>
                                <option value="<?php echo $id_estado?>"><?php echo $nombre_estado?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col">
                        <label for="">Rol</label>
                        <select class="form-control col" id="rol" name="rol" aria-label="Default select example">
                            <option selected>Seleccionar</option>
                            <?php
                            
                            foreach ($arrayRol as $rol) 
                            {
                                $id_rol = $rol->id_rol;
                                $nombre_rol = $rol->nombre_rol;
                                if($id_rol <= 2)
                                {
                                    $id_rol = $rol->id_rol;
                                    $nombre_rol = $rol->nombre_rol;
                                
                                ?>
                                    <option value="<?php echo $id_rol?>"><?php echo $nombre_rol?></option>
                                <?php
                                 }
                            }
                            ?>

                        </select>
                    </div>
                </div>


                <button type="button" class="btn btn-primary float-right mt-4" onclick="User.insertUser()">
                    <i class="fas fa-save mr-2"></i> Guardar
                </button>

            </form>
        </div>


    <?php
    }

    //Metodo para listar los usuarios
    function paginateUsers($array_user, $array_estado)
    {
    ?>
        <!-- Listado de opciones de la parte superiror -->
        <div class="card">
            <div class="card-header row">
                <div class="col-4">
                    <button type="button" class="btn btn-success float-left" onclick="User.showFormUser()">
                        <i class="fa-solid fa-user-plus mr-2"></i> Agregar usuario
                    </button>
                </div>
                
                <!-- FORMULARIO PARA BUSCAR -->
                <!--
                <div class="col">
                    <form id="search_user" class="row justify-content-around">

                        <input class="col-4 form-control" type="text" name="documento" id="documento" placeholder="Numero de documento">
                        <button type="button" class="btn btn-primary float-right col-2" onclick="User.searchNumberDocument()">
                            <i class="fa-solid fa-magnifying-glass mr-3"></i> Buscar
                        </button>

                        
                        <select onchange="User.searchState();" class="col-4 form-control" id="estado" name="estado" aria-label="Default select example">
                            <option select>Seleccionar estado</option>
                            <option value="todo">TODOS</option>
                            <?php
                            
                            foreach ($array_estado as $estado) {
                                $id_estado = $estado->id_estado;
                                $nombre_estado = $estado->nombre_estado;
                            
                            ?>
                                <option value="<?php echo $id_estado ?>"><?php echo $nombre_estado ?></option>
                            <?php
                            }
                            
                            ?>
                        </select>
                    </form>
                </div>
                -->           
            </div>
        </div>

        <!-- TABLA QUE LISTA LOS USUARIOS -->
        <div class="card">
            
            <div class="card-body ">

                <div class="table-responsive">
                    <table class="table table-striped ">
                        <thead class="table-dark">
                            <tr>
                                <th>ID Usuario</th>
                                <th>Documento</th>
                                <th>Nombre</th>
                                <th >Estado</th>
                                <th>Cargo</th>
                                <th>Acci&oacute;n</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            foreach ($array_user as $user) 
                            { 
                                $id_user = $user->id_user;
                                $documento_user = $user->documento_user;
                                $nombre_user = $user->nombre_user . " " . $user->apellido_user;
                                $id_estado = $user->id_estado;

                                if($id_estado == '1')
                                {
                                    $id_estado = 'Activo';
                                }else{
                                    $id_estado = 'Inactivo';
                                }

                                $id_rol = $user->id_rol;
                                if($id_rol == '1')
                                {
                                    $id_rol = 'Administrador';
                                }else 
                                {
                                    $id_rol = 'Secretaria';
                                
                                }
                            ?>  
                                <tr>
                                    <td><?php echo $id_user ?></td>
                                    <td><?php echo $documento_user ?></td>
                                    <td><?php echo $nombre_user ?></td>
                                    <td><?php echo $id_estado ?></td>
                                    <td><?php echo $id_rol ?></td>
                                    <td>
                                        <i class="fa-sharp fa-solid fa-pen-to-square" onclick="User.showUser('<?php echo $id_user ?>');" style="color: #16a239;cursor:pointer;"></i>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    <?php
    }

        //Metodo para listar los usuarios
    function paginateHistorialAccesos($array_historialAccesos)
    {
    ?>
        <!-- TABLA QUE LISTA LOS USUARIOS -->
        <div class="card">
            
            <div class="card-body ">

                <div class="table-responsive">
                    <table class="table table-striped ">
                        <thead class="table-dark">
                            <tr>
                                <th>ID Usuario</th>
                                <th>Documento</th>
                                <th>Nombre</th>
                                <th>Fecha de Acceso</th>
                                <th>Rol</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            foreach ($array_historialAccesos as $acceso) 
                            { 
                                $id_user = $acceso->id_user;
                                $documento_user = $acceso->documento_user;
                                $nombre_user = $acceso->nombre_user . " " . $acceso->apellido_user;
                                $fecha_acceso = $acceso->fecha_acceso;
                                $id_rol = $acceso->id_rol;

                                if($id_rol == '1')
                                {
                                    $id_rol = 'Administrador';
                                }else 
                                {
                                    $id_rol = 'Secretaria';
                                }
                            ?>  
                                <tr>
                                    <td><?php echo $id_user ?></td>
                                    <td><?php echo $documento_user ?></td>
                                    <td><?php echo $nombre_user ?></td>
                                    <td><?php echo $fecha_acceso ?></td>
                                    <td><?php echo $id_rol ?></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    <?php
    }

    function showUser($user,$array_type_document, $array_rol, $array_estado)
    {
        $id_user = $user[0]->id_user;
        $nombre_user = $user[0]->nombre_user;
        $apellido_user = $user[0]->apellido_user;
        $id_tdoc = $user[0]->id_tdoc;
        $documento_user = $user[0]->documento_user;
        $email_user = $user[0]->email_user;
        $password_user = $user[0]->password_user;
        $id_estado = $user[0]->id_estado;
        $id_rol = $user[0]->id_rol;

    ?>
        <div>
            <form id="update_user">
                <!-- Nombres del usuario -->
                <div class="row">
                    <div class="form-group col">
                        <label for="nombre">Nombre(s)</label>
                        <input type="text" class="form-control" id="nombre" name="nombre"  value="<?php echo $nombre_user?>">
                    </div>
                    <div class="form-group col">
                        <label for="apellido">Apellido(s)</label>
                        <input type="text" class="form-control" id="apellido" name="apellido"  value="<?php echo $apellido_user?>">
                    </div>
                </div>

                <!-- Campos para el documento -->
                <div class="row">
                    <div class="col">
                        <label for="tipo_documento">Tipo de documento</label>
                        <select class="form-control" id="tipo_documento" name="tipo_documento" aria-label="Default select example"  >
                            <option selected>Seleccionar</option>
                            <?php
                            foreach ($array_type_document as $typeDocument) 
                            {
                                $id_tdocA = $typeDocument->id_tdoc;
                                $nombre_tdocA = $typeDocument->nombre_tdoc;
                                if ($id_tdocA == $id_tdoc) 
                                {
                                ?>
                                    <option selected value="<?php echo $id_tdocA?>"><?php echo $nombre_tdocA?></option>
                                <?php
                                } else {
                                ?>
                                <option value="<?php echo $id_tdocA?>"><?php echo $nombre_tdocA?></option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group col">
                        <label for="documento">Documento</label>
                        <input type="text" class="form-control" id="documento" name="documento"  value="<?php echo $documento_user?>">
                    </div>
                </div>

                
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" id="email" name="email"  value="<?php echo $email_user?>">
                </div>
                

                <!-- Campos para pedir una contraseña -->
                <div class="row">
                    <div class="form-group col">
                        <label for="password">Contraseña</label>
                        <input type="password" class="form-control" id="password" name="password"  value="<?php echo $password_user?>">
                    </div>
                    <div class="form-group col">
                        <label for="confirmPassword">Confirmar contraseña</label>
                        </i><input type="password" class="form-control" id="confirmPassword" name="confirmPassword">
                    </div>
                </div>

                <!-- Ultimos campos del usuario -->
                <div class="row">
                    <div class="col">
                        <label for="">Estado</label>
                        <select class="form-control" id="estado" name="estado" aria-label="Default select example"  value="<?php echo $id_estado?>">
                            <option select>Seleccionar</option>
                            <?php
                            foreach ($array_estado as $estado) 
                            {
                                $id_estadoA = $estado->id_estado;
                                $nombre_estadoA = $estado->nombre_estado;
                                if ($id_estadoA == $id_estado) 
                                {
                                ?>
                                    <option selected value="<?php echo $id_estadoA ?>"><?php echo $nombre_estadoA ?></option>
                                <?php
                                } else {
                                ?>
                                    <option value="<?php echo $id_estadoA ?>"><?php echo $nombre_estadoA ?></option>
                                <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col">
                        <label for="">Rol</label>
                        <select class="form-control col" id="rol" name="rol" aria-label="Default select example"  value="<?php echo $id_rol?>">
                            <option selected>Seleccionar</option>
                            <?php
                            foreach ($array_rol as $rol) 
                            {
                                $id_rolA = $rol->id_rol;
                                $nombre_rolA = $rol->nombre_rol;
                                if ($id_rolA == $id_rol) 
                                {
                                ?>
                                    <option selected value="<?php echo $id_rolA ?>"><?php echo $nombre_rolA ?></option>
                                <?php
                                } else {
                                ?>
                                    <option value="<?php echo $id_rolA ?>"><?php echo $nombre_rolA ?></option>
                                <?php
                                }
                            }
                            ?>

                        </select>
                    </div>
                </div>

                        <button type="button" class="btn btn-success float-right mt-4" onclick="User.updateUser('<?php echo $id_user;?>')">
                            <i class="fa-sharp fa-solid fa-pen-to-square"></i> Actualizar
                        </button>

            </form>
        </div>


<?php



    }
}
?>