<?php

class MenuView
{

    function showMenu($user, $num_register, $num_register_sol)
    {

?>
        <!DOCTYPE html>
        <html lang="es">

        <head>

            <title>GM_MAS</title>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">

            <title>SIMAT - MAS</title>
            <link rel="shorcut icon" href="img/Logo_FAVICON.png">

            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" 
            integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N"
            crossorigin="anonymous"></script>

    
            <!-- Google Font: Source Sans Pro -->
            <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
            <!-- Toastr -->
            <link rel="stylesheet" href="plugins/toastr/toastr.min.css">
            <!-- Theme style -->
            <link rel="stylesheet" href="dist/css/adminlte.min.css">
            <script src="https://kit.fontawesome.com/d2ec2ed15a.js" crossorigin="anonymous"></script>

            <link rel="stylesheet" href="assets/css/EstiloMenu.css">

        </head>

        <body class="hold-transition sidebar-mini">

            <div class="wrapper">
                <!------------------------------------------- Barra de navegacion ----------------------------------------->
                <nav class="main-header navbar navbar-expand navar-superior">

                    <!-- Botones izquierdos -->
                    <ul class="navbar-nav ">
                        <li class="nav-item">
                            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                        </li>
                        <li class="nav-item d-none d-sm-inline-block">
                            <a onclick="Menu.menu('MenuController/validateHome')" class="nav-link">Inicio</a>
                        </li>
                    </ul>


                    <!--  Botones de la derecha -->
                    <ul class="navbar-nav ml-auto">

                        <!-- COLOCAR LA PANTALLA GRANDE -->
                        <li class="nav-item">
                            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                                <i class="fas fa-expand-arrows-alt"></i>
                            </a>
                        </li>

                        <!-- Boton para cerrar sesion -->
                        

                        <!-- INICIO DE SESIÓN -->
                        <li>
                        <div  class="flex-shrink-0 dropdown">
                                <a href="3_login.html" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="img/administrador.jpg" width="40" height="40" class="rounded-circle">
                                    <?php echo $user[0]->nombre_user; ?>
                                    <?php echo $user[0]->apellido_user; ?>    
                                </a>
                                <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
                                    <li><hr class="dropdown-divider"></li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#" role="button" onclick="Menu.closeSession()">
                                            <i class="fas fa-power-off"></i>    Cerar Sesión
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </nav>
                <!-- /.navbar -->
                
                

                <!------------------------------------------- contenedor MENU  ----------------------------------------->
                <aside class="main-sidebar elevation-4 contenedor-botones">
                    <!-- Brand Logo -->
                    <div class="contenedorLogo">
                        <img src="img/Logo-removebg-preview.png" class="logo" alt="">
                    </div>

                    <!-- Perfil -->
                    <div class="sidebar">
                        <!-- Opciones  Menu -->
                        <nav class="mt-5">
                            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                                <li class="nav-item">

                                    <a href="#" onclick="Menu.menu('UserController/paginateUsers')" class="nav-link boton">
                                        <i class="fa-solid fa-users-gear"></i>
                                        <p class="ml-2">Administrar Usuarios</p>
                                    </a>
                                    <a href="#" onclick="Menu.menu('UserController/paginateHistorialAccesos')" class="nav-link boton">
                                        <i class="fa-sharp fa-solid fa-business-time"></i>
                                        <p class="ml-2">Historial de Accesos</p>
                                    </a>
                                    <br></br>
                                    <a href="#" onclick="Menu.menu('SolicitudController/paginateSolicitud')" class="nav-link boton">
                                        <i class="fa-solid fa-layer-group"></i>
                                        <p class="ml-2">Solicitudes</p>
                                    </a>
                                    <a href="#" onclick="" class="nav-link boton">
                                        <i class="fa-sharp fa-solid fa-calendar-days"></i>
                                        <p class="ml-2">Horarios de entrevista</p>
                                    </a>
                                    <a href="#" onclick="" class="nav-link boton">
                                        <i class="fa-sharp fa-solid fa-circle-check"></i>
                                        <p class="ml-2">Admitir</p>
                                    </a>
                                    <a href="#" onclick="" class="nav-link boton">
                                        <i class="fa-sharp fa-solid fa-file"></i>
                                        <p class="ml-2">Validar documentos</p>
                                    </a>
                                    <a href="#" onclick="" class="nav-link boton">
                                        <i class="fa-sharp fa-solid fa-user-plus"></i>
                                        <p class="ml-2">Matricular</p>
                                    </a>
                                    <br></br>
                                    <a href="#" onclick="Menu.menu('SolicitudController/paginateSolicitarCupo')" class="nav-link boton">
                                        <i class="fa-sharp fa-solid fa-business-time"></i>
                                        <p class="ml-2">MATRICULAS</p>
                                    </a>
                                    
                                </li>
                            </ul>
                        </nav>
                        <!-- /.sidebar-menu -->
                    </div>
                    <!-- /.sidebar -->
                </aside>




                <!-- Content Wrapper. Contains page content -->
                <center >
                <div class="content-wrapper">
                    <!-- Content Header (Page header) -->
                    <div class="content-header">
                        <div class="container-fluid">

                            <div class="row mb-2">
                                <div class="col-sm-6">
                                    <h1 class="m-0"></h1>
                                </div><!-- /.col -->
                            </div><!-- /.row -->
                        </div><!-- /.container-fluid -->
                    </div>
                    <!-- /.content-header -->

                    <!-- Main content -->
                    <div class="content">
                        <div class="container-fluid">

                            <!-- Aqui se carga el contenido que es requerido -->
                            <div id="content">
                                <div class="container-fluid py-4">
                                
                                    <div class="row">
                                        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                                            <div class="card">
                                                <div class="card-header p-3 pt-2">
                                                    <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                                                        <i class="material-icons opacity-10">USUARIOS</i>
                                                    </div>
                                                    <div class="text-end pt-1">
                                                        <p class="text-lg mb-0 text-capitalize">Número</p>
                                                        <h3><?php echo $num_register ?></h3>
                                                    </div>
                                                </div>
                                                    <hr class="dark horizontal my-0">
                                                    <div class="card-footer p-3">
                                                    <p class="mb-0"><span class="text-success text-lg font-weight-bolder">ACTIVOS</span></p>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                                        <div class="card">
                                            <div class="card-header p-3 pt-2">
                                                <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                                                    <i class="material-icons opacity-10">SOLICITUDES</i>
                                                </div>
                                                <div class="text-end pt-1">
                                                    <p class="text-lg mb-0 text-capitalize">Número</p>
                                                    <h3><?php echo $num_register_sol ?></h3>
                                                </div>
                                            </div>
                                                <hr class="dark horizontal my-0">
                                                <div class="card-footer p-3">
                                                <p class="mb-0"><span class="text-success text-lg font-weight-bolder">RECIBIDAS</span></p>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div><!-- /.container-fluid -->
                    </div>
                    <!-- /.content -->
                </div>
                </center>
                <!-- /.content-wrapper -->

                <div id="my_modal" class="modal" tabindex="-1">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modal_title"></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div id="modal_content" class="modal-body">

                            </div>
                        </div>
                    </div>
                </div>

                <div id="my_modal_solicitud" class="modal" tabindex="-1">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modal_title"></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div id="modal_content" class="modal-body">

                            </div>
                        </div>
                    </div>
                </div>

                <!-- Main Footer -->
                <footer class="main-footer">

                </footer>
            </div>
            <!-- ./wrapper -->

            <!-- REQUIRED SCRIPTS -->

            <!-- jQuery -->
            <script src="plugins/jquery/jquery.min.js"></script>
            <!-- Bootstrap 4 -->
            <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
            <!-- Toastr -->
            <script src="plugins/toastr/toastr.min.js"></script>
            <!-- AdminLTE App -->
            <script src="dist/js/adminlte.min.js"></script>

            <script src="js/Menu.js"></script>
            <script src="js/User.js"></script>
            <script src="js/Solicitud.js"></script>
            <script src="js/Matriculas.js"></script>

            <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        </body>

        </html>
    <?php
    }

    function showStartePage($num_register, $num_register_sol)
    {
    ?>
        <div class="row">
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-header p-3 pt-2">
                        <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                            <i class="material-icons opacity-10">USUARIOS</i>
                                </div>
                                    <div class="text-end pt-1">
                                        <p class="text-lg mb-0 text-capitalize">Número</p>
                                        <h3><?php echo $num_register ?></h3>
                                    </div>
                                </div>
                                <hr class="dark horizontal my-0">
                                <div class="card-footer p-3">
                                    <p class="mb-0"><span class="text-success text-lg font-weight-bolder">ACTIVOS</span></p>
                                </div>
                        </div>
                    </div>
                                
                    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                        <div class="card">
                            <div class="card-header p-3 pt-2">
                                <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                                    <i class="material-icons opacity-10">SOLICITUDES</i>
                                </div>
                                <div class="text-end pt-1">
                                    <p class="text-lg mb-0 text-capitalize">Número</p>
                                    <h3><?php echo $num_register_sol ?></h3>
                                </div>
                                </div>
                                    <hr class="dark horizontal my-0">
                                    <div class="card-footer p-3">
                                        <p class="mb-0"><span class="text-success text-lg font-weight-bolder">RECIBIDAS</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </div>
<?php
    }
}
?>