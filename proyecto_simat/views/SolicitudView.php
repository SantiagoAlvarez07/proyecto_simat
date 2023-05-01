<?php
class SolicitudView
{
    //Metodo para listar los usuarios
    function paginateSolicitud($array_solicitudes)
    {
    ?>
        <!-- Listado de opciones de la parte superiror -->
        
        <div class="card">
            <div class="card-header row">
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
                            /*
                            foreach ($array_estado as $estado) {
                                $id_estado = $estado->id_estado;
                                $nombre_estado = $estado->nombre_estado;
                            
                            ?>
                                <option value="<?php echo $id_estado ?>"><?php echo $nombre_estado ?></option>
                            <?php
                            }*/
                            
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
                                <th>ITEM</th>
                                <th>Nombres Acudiente/Aspirante</th>
                                <th>Documentos</th>
                                <th>Teléfono</th>
                                <th>Grado</th>
                                <th>Discapacidad</th>
                                <th>Enviar horarios</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            foreach ($array_solicitudes as $solicitud) 
                            { 
                                $id_sol = $solicitud->id_sol;
                                $nombre_acu = $solicitud->nombre_acu . " " . $solicitud->apellido_acu;
                                $documento_acu = $solicitud->documento_acu;
                                $telefono_acu = $solicitud->telefono_acu;

                                $nombre_aspi= $solicitud->nombre_aspi . " " . $solicitud->apellido_aspi;
                                $documento_aspi = $solicitud->documento_aspi;
                                $id_grado = $solicitud->id_grado;
                                $id_disc = $solicitud->id_disc;

                                if($id_grado == '1')
                                {
                                    $id_grado = 'PÁRVULOS';
                                }
                                
                                if($id_grado == '2')
                                {
                                    $id_grado = 'TRANSICIÓN';
                                }

                                if($id_grado == '3')
                                {
                                    $id_grado = 'PRIMERO';
                                }

                                if($id_grado == '4')
                                {
                                    $id_grado = 'SEGUNDO';
                                }

                                if($id_grado == '5')
                                {
                                    $id_grado = 'TERCERO';
                                }

                                if($id_grado == '6')
                                {
                                    $id_grado = 'CUARTO';
                                }

                                if($id_grado == '7')
                                {
                                    $id_grado = 'QUINTO';
                                }

                                if($id_grado == '8')
                                {
                                    $id_grado = 'SEXTO';
                                }

                                if($id_grado == '9')
                                {
                                    $id_grado = 'SÉPTIMO';
                                }

                                if($id_grado == '10')
                                {
                                    $id_grado = 'OCTAVO';
                                }

                                if($id_grado == '11')
                                {
                                    $id_grado = 'NOVENO';
                                }

                                if($id_grado == '12')
                                {
                                    $id_grado = 'DÉCIMO';
                                }

                                if($id_grado == '13')
                                {
                                    $id_grado = 'UNDÉCIMO';
                                }
                                //-------------------------------------------

                                if($id_disc == '1')
                                {
                                    $id_disc = 'Si';
                                }else 
                                {
                                    $id_disc = 'No';
                                }
                            ?>  
                                <tr>
                                    <td><?php echo $id_sol ?></td>
                                    <td><?php echo $nombre_acu;
                                            echo "<br>";
                                            echo $nombre_aspi ?></td>

                                    <td><?php echo $documento_acu;
                                            echo "<br>";
                                            echo $documento_aspi ?></td>

                                    <td><?php echo $telefono_acu ?></td>
                                    <td><?php echo $id_grado ?></td>
                                    <td><?php echo $id_disc?></td>
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
function paginateSolicitudAcudiente($array_SolicitudAcudiente)
{
?>
    <!-- TABLA QUE LISTA LOS USUARIOS -->
    <div class="card">
        <div class="card-body ">
            <div class="table-responsive">
                <table class="table table-striped ">
                    <thead class="table-dark">
                        <tr>
                            <th>Nombres Acudiente/Aspirante</th>
                            <th>Documentos</th>
                            <th>Teléfono</th>
                            <th>Grado</th>
                            <th>Discapacidad</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        foreach ($array_SolicitudAcudiente as $solicitud) 
                        { 
                            $nombre_acu = $solicitud->nombre_acu . " " . $solicitud->apellido_acu;
                            $documento_acu = $solicitud->documento_acu;
                            $telefono_acu = $solicitud->telefono_acu;

                            $nombre_aspi= $solicitud->nombre_aspi . " " . $solicitud->apellido_aspi;
                            $documento_aspi = $solicitud->documento_aspi;
                            $id_grado = $solicitud->id_grado;
                            $id_disc = $solicitud->id_disc;

                            if($id_grado == '1')
                            {
                                $id_grado = 'PÁRVULOS';
                            }
                            
                            if($id_grado == '2')
                            {
                                $id_grado = 'TRANSICIÓN';
                            }

                            if($id_grado == '3')
                            {
                                $id_grado = 'PRIMERO';
                            }

                            if($id_grado == '4')
                            {
                                $id_grado = 'SEGUNDO';
                            }

                            if($id_grado == '5')
                            {
                                $id_grado = 'TERCERO';
                            }

                            if($id_grado == '6')
                            {
                                $id_grado = 'CUARTO';
                            }

                            if($id_grado == '7')
                            {
                                $id_grado = 'QUINTO';
                            }

                            if($id_grado == '8')
                            {
                                $id_grado = 'SEXTO';
                            }

                            if($id_grado == '9')
                            {
                                $id_grado = 'SÉPTIMO';
                            }

                            if($id_grado == '10')
                            {
                                $id_grado = 'OCTAVO';
                            }

                            if($id_grado == '11')
                            {
                                $id_grado = 'NOVENO';
                            }

                            if($id_grado == '12')
                            {
                                $id_grado = 'DÉCIMO';
                            }

                            if($id_grado == '13')
                            {
                                $id_grado = 'UNDÉCIMO';
                            }
                            //-------------------------------------------

                            if($id_disc == '1')
                            {
                                $id_disc = 'Si';
                            }else 
                            {
                                $id_disc = 'No';
                            }
                        ?>  
                            <tr>
                                <td><?php echo $nombre_acu;
                                        echo "<br>";
                                        echo $nombre_aspi ?></td>

                                <td><?php echo $documento_acu;
                                        echo "<br>";
                                        echo $documento_aspi ?></td>

                                <td><?php echo $telefono_acu ?></td>
                                <td><?php echo $id_grado ?></td>
                                <td><?php echo $id_disc?></td>
                                <td class="text-danger"><?php echo 'En revisión'?></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>

                <button type="button" href="" class="btn btn-lg btn-danger" onclick="Solicitud.cancelarSolicitud()">
                    <i class="fa-solid fa-users-gear"></i>  
                    <p class="text-light">Cancelar Solicitud</p>
                </button>     
            </div>
        </div>
    </div>          
<?php
}
    //Metodo para listar los usuarios
function paginateSolicitarCupo()
{
?>
    <div class="wpb_single_image wpb_content_element vc_align_center  wpb_animate_when_almost_visible wpb_bounceInLeft bounceInLeft">
        <h5 class="featurette-heading">Solicite un cupo escolar para ESTUDIANTES NUEVOS en cinco(5) sencillos pasos: <span class="text-muted"></span></h5>
    </div>

    <!-- TABLA PARA INFORMACIÓN CUPO -->
    <div class="card">
        <div class="card-body ">
            <div class="row featurette">
                <div class="col-md-5">
                    <br></br>
                    <br></br>
                    <br></br>
                    <h4 class="text-info">REQUISITOS DEL TRÁMITE</h4>
                    <a class="bd-placeholder-img" href=""></a><center><img src="img/icon_requisitos.png" height="100px" width="80x"></center></a>
                </div> 
                
                <div class="col-md-7">
                    <div class="row featurette">
                    <a class="bd-placeholder-img" href=""></a><center><img src="img/icon_requisitos_info.png" height="400x" width="650"></center></a>
                    </div>  
                </div>
                 
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body ">
            <div class="row featurette">
                <div class="col-md-5">
                    <button type="button" href="" class="btn btn-lg btn-primary" onclick="Solicitud.showFormSolicitud()">
                        <i class="fa-solid fa-users-gear"></i>  
                        <p class="text-light">Solicitar Cupo</p>
                    </button> 
                </div> 
                
                <div class="col-md-7">
                    <button type="button" href="" class="btn btn-lg btn-success" onclick="">
                        <i class="fa-solid fa-users-gear"></i>  
                        <p class="text-light">Continuar Proceso</p>
                    </button>    
                </div>
                 
            </div>
        </div>
    </div>   
<?php
}

    function showFormSolicitud2($arrayTypeDocument, $arrayGrado, $arrayDiscapacidad)
    {
?>

                        <div>
                            <h3>Datos acudiente</h3><br>
                            <form class="form" id='insert_solicitud'>
                                <div class="container">
                                    <div class="row">
                                        <div class="col">
                                          <!-- Nombres del usuario -->
                                            <div class="mb-3">
                                                <input type="text" class="form-control" id="nombre_acu" name="nombre_acu" placeholder="Nombre(s)">
                                                <input type="text" class="form-control" id="apellido_acu" name="apellido_acu" placeholder="Apellido(s)">
                                            </div>
                                        </div>

                                        <!-- Campos para el documento -->
                                        <div class="col">
                                          <select class="form-select fieldlabels" id="tipo_documento_acu" name="tipo_documento_acu" aria-label="Default select example">
                                              <option selected>Tipo de documento</option>
                                              
                                              <?php
                                              foreach ($arrayTypeDocument as $typeDocument) 
                                              {
                                                  $id_tdoc = $typeDocument->id_tdoc;
                                                  $nombre_tdoc = $typeDocument->nombre_tdoc;
                                                  ?>
                                                      <option value="<?php echo $id_tdoc ?>"><?php echo $nombre_tdoc ?></option>
                                                  <?php
                                                  
                                              }
                                              ?>
                                          </select>
                                          <input type="text" class="form-control" id="documento_acu" name="documento_acu" placeholder="Documento">
                                        </div>

                                        <div class="col">
                                          <div class="mb-3">
                                              <input type="text" class="form-control" id="telefono_acu" name="telefono_acu" placeholder="Telefono">
                                              <input type="text" class="form-control" id="email_acu" name="email_acu" placeholder="Email">
                                          </div>
                                      </div>
                                    </div>
                                </div>
                                
                                <h3>Datos aspirante</h3><br>
                          <div class="container">
                                    <div class="row">
                                        <div class="col">
                                          <input type="text" class="form-control" id="nombre_aspi" name="nombre_aspi" placeholder="Nombre(s)">
                                          <input type="text" class="form-control" id="apellido_aspi" name="apellido_aspi" placeholder="Apellido(s)">
                                        </div>
                                        <div class="col">
                                          <select class="form-select fieldlabels" id="tipo_documento_aspi" name="tipo_documento_aspi" aria-label="Default select example">
                                            <option selected>Tipo de documento</option>
                                            
                                            <?php
                                            foreach ($arrayTypeDocument as $typeDocument) 
                                            {
                                                $id_tdoc = $typeDocument->id_tdoc;
                                                $nombre_tdoc = $typeDocument->nombre_tdoc;
                                                ?>
                                                    <option value="<?php echo $id_tdoc ?>"><?php echo $nombre_tdoc ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                            <input type="text" class="form-control" id="documento_aspi" name="documento_aspi" placeholder="Documento">
                                        </div>
                                        <div class="col">
                                            <center>
                                                
                                                
                                              <select class="form-select fieldlabels" id='grado_aspi' name="grado_aspi" aria-label="Default select example">
                                                <option selected>Grado a cursar</option>
                                                <?php
                                                foreach ($arrayGrado as $grado) 
                                                {
                                                    $id_grado = $grado->id_grado;
                                                    $nombre_grado = $grado->nombre_grado;
                                                    ?>
                                                    <option value="<?php echo $id_grado ?>"><?php echo $nombre_grado ?></option>
                                                    <?php
                                                }
                                                ?>
                                              </select>
                                            </center>
                                        </div>
                                        <div class="col">
                                            <center>
                                              <h5>Discapacidad</h5>
                                                <div class="continer">
                                                    <div class="row">
                                                        <div class="col">
                                                          
                                                          <select class="form-select fieldlabels" id='discapacidad_aspi' name="discapacidad_aspi" aria-label="Default select example">
                                                            <option selected>Seleccionar</option>
                                                            <?php
                                                            foreach ($arrayDiscapacidad as $disc) 
                                                            {
                                                                $id_disc = $disc->id_disc;
                                                                $nombre_disc= $disc->nombre_disc;
                                                                ?>
                                                                <option value="<?php echo $id_disc ?>"><?php echo $nombre_disc ?></option>
                                                                <?php
                                                            }
                                                            ?>
                                                        </select>
                                                            <input type="file" name="archivo_discapacidad_aspi"></input>
                                                        </div>
                                                    </div>
                                                </div>
                                            </center>
                                        </div>
                                    </div>
                                    
                                </div>
                                <button type="button" class="btn btn-lg btn-primary" onclick="Solicitud.insertSolicitud()">
                            <i class="fas fa-save mr-2"></i> Enviar
                          </button>
                            </form>
                        </div>

</html>

<?php 
    }

}
?>