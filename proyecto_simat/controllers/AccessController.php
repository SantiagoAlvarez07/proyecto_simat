<?php
require_once "models/AccessModel.php";
require_once "views/AccessView.php";

class AccessController
{
    //FUNCIÓN QUE MUESTRA - (LOGIN)
    function validateClient()
    {
        $AccessView = new AccessView(); //CREA - *OBJETO* VISTA (LOGIN)
        $AccessView->showFormSession(); //MUESTRA - (LOGIN)
    }
    //---------------------------------------------------------------//
    //FUNCIÓN QUE VALIDA LOS DATOS - *LOGIN*
    function validateFormSession($array)
    {
        $documento = $array['docUser']; //TOMA - CÓDIGO (LOGIN)
        $password = $array['password']; //TOMA - CONTRASEÑA (LOGIN)
        $rol = $array['rol']; //TOMA - ROL (LOGIN)
        {
            //CREA - CONEXIÓN
            $Connection = new Connection(); 
            $AccessModel = new AccessModel($Connection); //CREA - ACCES MODEL

            //OBTIENE RESULTADO DE CONSULTA - POR ACCESS MODEL
            $array_access = $AccessModel->validateFormSession($documento,$password,$rol);

            if($array_access)
            {
                $_SESSION['id_user'] = $array_access[0]->id_user;
                $_SESSION['auth'] = 'OK';
            }
            else
            {
                //exit("DIGITE DE NUEVO POR FAVOR");
            }
            header('location:index.php');
        }
        
    }
//-------------------------------------------------------------------//
    //FUNCIÓN QUE CIERRA - SESION
    function closeSession()
    {
        $response=array();

        session_unset();
        session_destroy();
        $_SESSION = array();

        $response['message']="QUE TENGA UN BUEN DÍA";

        exit(json_encode($response));
    }
}
?>