
<?php
require_once "vendor/session.php"; //REQUIERE - SESIÓN
require_once "vendor/Connection.php"; //REQUIERE - CONEXIÓN

//AL INICIAR - SESIÓN
if(isset($_SESSION, $_SESSION['id_user']) and $_SESSION['auth']=='OK')
{
    require_once "vendor/FrontController.php";

    if(isset($_GET['route']))
    {
        $route = $_GET['route'];
    }
        //AL INICIAR - RUTA VACÍA
    else
    {
        $route = '';
    }
    /*
    require_once "controllers/UserController.php";
    if(isset($_POST['docUser'],$_POST['password'],$_POST['rol']))
    {
    $UserController = new UserController();
    $UserController->insertHistorialAccesos($_POST);
    }*/
    
    $FrontController = new FrontController($route);

}
//SE CAPTURAN LOS DATOS - POR POST
else if(isset($_POST['docUser'],$_POST['password'],$_POST['rol']))
{
    require_once "controllers/AccessController.php";
    
    $AccessController = new AccessController();
    $AccessController->validateFormSession($_POST); //ENVÍA ARRAY - AL MPETODO PARA VALIDAR
}  else //AL NO ENVIAR DATOD 
    {
        require_once "controllers/AccessController.php";

        $AccessController = new AccessController();
        $AccessController->validateClient(); //MUESTRA - SESIÓN
    }

?>