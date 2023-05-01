<?php
require_once "models/UserModel.php";
require_once "views/UserView.php";

class UserController
{
    //Metodo para insertar un nuevo usuario
    function insertUser()
    {
        //Obtener todos los atributos
        $nombre_user = $_POST['nombre'];
        $apellido_user = $_POST['apellido'];
        $id_tdoc = $_POST['tipo_documento'];
        $documento_user = $_POST['documento'];
        $email_user = $_POST['email'];
        $password_user = $_POST['password'];
        $confirmPassword = $_POST['confirmPassword'];
        $id_estado = $_POST['estado'];
        $id_rol = $_POST['rol'];


        $Connection = new Connection();
        $UserModel = new UserModel($Connection);

        //Validar si el documento que se esta ingresando ya le pertenece a una persona
        $array_documento = $UserModel->duplicateDocumento($documento_user);
        $array_email = $UserModel->duplicateEmail($email_user);

        //Saber que si se llenaron los campos
        if (
            $nombre_user == "" || $apellido_user == "" || $id_tdoc == "Seleccionar" ||
            $documento_user == "" || $email_user == "" || $password_user == "" || $confirmPassword == "" ||
            $id_estado == 'Seleccionar' || $id_rol == "Seleccionar"
        ) 
        {

            $array_message = ['message' => 'Hay campos por llenar'];
            exit(json_encode($array_message));

            //Validar que el numero de documento sea numerico y de 10 digitos
        } else if (!(ctype_digit($documento_user)) || strlen($documento_user) < 8) {
            $array_message = ['message' => 'Error en el numero de documento'];
            exit(json_encode($array_message));

            //Validar que las dos contraseñas coincidan    
        } else if ($password_user != $confirmPassword) {
            $array_message = ['message' => 'Las contraseñas no coinciden'];
            exit(json_encode($array_message));

            //Saber si el documento que se esta ingresando ya esta asignado
        } else if ($array_documento) {
            $array_message = ['message' => 'Ya existe un usuario con ese documento'];
            exit(json_encode($array_message));
            //Saber si el correo que se esta ingresando ya esta asignado
        } else if ($array_email) {
            $array_message = ['message' => 'Ya existe alguien con ese correo'];
            exit(json_encode($array_message));
        } else {
            //Obtener los codigo en tipo numerico
            $id_rol = intval($id_rol);
            $id_tdoc = intval($id_tdoc);
            $id_estado = intval($id_estado);

            $UserModel->insertUser(
                $nombre_user,
                $apellido_user,
                $id_rol,
                $id_tdoc,
                $documento_user,
                $password_user,
                $email_user,
                $id_estado
            );
        }

        $array_user = $UserModel->paginateUser();
        $array_estado = $UserModel->paginateEstado();
        $UserView = new UserView();
        $UserView->paginateUsers($array_user, $array_estado);
    }

    //Metodo para insertar un acceso
    function insertHistorialAccesos($array)
    {
        //Obtener todos los atributos
        $nombre_user = 'hola';
        $apellido_user = 'beto';
        $documento_user = $array['docUser'];
        $id_rol = $array['rol'];

        $Connection = new Connection();
        $UserModel = new UserModel($Connection);

        //Obtener los codigo en tipo numerico
        $id_rol = intval($id_rol);

        $UserModel->insertHistorialAccesos(
            $nombre_user,
            $apellido_user,
            $documento_user,
            $id_rol 
        );

        $array_historialAccesos = $UserModel->paginateHistorialAccesos();

        $UserView = new UserView();
        $UserView->paginateHistorialAccesos($array_historialAccesos);
    }

    //MÉTODO QUE LISTA - (USUARIOS)
    function paginateUsers()
    {
        $Connection = new Connection();
        $UserModel = new UserModel($Connection);

        $array_user = $UserModel->paginateUser();
        $array_estado = $UserModel->paginateEstado();

        $UserView = new UserView();
        $UserView->paginateUsers($array_user, $array_estado);
    }

    //MÉTODO QUE MUESTRA AUDITORIA DE ACCESOS
    function paginateHistorialAccesos()
    {
        $Connection = new Connection();
        $UserModel = new UserModel($Connection);

        $array_historialAccesos = $UserModel->paginateHistorialAccesos();

        $UserView = new UserView();
        $UserView->paginateHistorialAccesos($array_historialAccesos);
    }

    //MÉTODO QUE MUESTRA - (FORMULARIO - NUEVO USUARIO)
    function showFormUser()
    {
        $Connection = new Connection();
        $UserModel = new UserModel($Connection);

        $arrayTypeDocument = $UserModel->paginateDocumentType();
        $arrayRol = $UserModel->paginateRol();
        $arrayEstado = $UserModel->paginateEstado();

        $UserView = new UserView();
        $UserView->showFormUser($arrayTypeDocument, $arrayRol, $arrayEstado);
    }

    //Metodo para mostrar un usuario
    function showUser(){

        $id_user = $_POST['id_user'];

        //Metodo para conectarme a la base de datos
        $Connection = new Connection();
        $UserModel = new UserModel($Connection);

        $user = $UserModel->selectUser($id_user);
        $array_rol = $UserModel->paginateRol();
        $array_estado = $UserModel->paginateEstado();
        $array_type_document = $UserModel->paginateDocumentType();

        //Cargar y mostrar vistas
        $UserView = new UserView();
        $UserView->showUser($user, $array_type_document, $array_rol, $array_estado);

    }

    function updateUser(){
        //Obtener todos los atributos
        $id_user = $_POST['id_user'];
        $nombre_user = $_POST['nombre'];
        $apellido_user = $_POST['apellido'];
        $id_tdoc = $_POST['tipo_documento'];
        $documento_user = $_POST['documento'];
        $email_user = $_POST['email'];
        $password_user = $_POST['password'];
        $confirmPassword = $_POST['confirmPassword'];
        $id_estado = $_POST['estado'];
        $id_rol = $_POST['rol'];



        $Connection = new Connection();
        $UserModel = new UserModel($Connection);

        //Validar si el documento que se esta ingresando ya le pertenece a una persona
        $array_documento = $UserModel->duplicateDocumentoUpdate($documento_user, $id_user);
        $array_email = $UserModel->duplicateEmailUpdate($email_user, $id_user);

        //Saber que si se llenaron los campos
        if (
            $nombre_user == "" || $apellido_user == "" || $id_tdoc == "Seleccionar" ||
            $documento_user == "" || $email_user == "" || $password_user == "" || $confirmPassword == "" ||
            $id_estado == 'Seleccionar' || $id_rol == "Seleccionar"
            ) 
            {

                $array_message = ['message' => 'Hay campos por llenar'];
                exit(json_encode($array_message));
    
                //Validar que el numero de documento sea numerico y de 10 digitos
            } else if (!(ctype_digit($documento_user)) || strlen($documento_user) < 8) {
                $array_message = ['message' => 'Error en el numero de documento'];
                exit(json_encode($array_message));
    
                //Validar que las dos contraseñas coincidan    
            } else if ($password_user != $confirmPassword) {
                $array_message = ['message' => 'Las contraseñas no coinciden'];
                exit(json_encode($array_message));
    
                //Saber si el documento que se esta ingresando ya esta asignado
            } else if ($array_documento) {
                $array_message = ['message' => 'Ya existe un usuario con ese documento'];
                exit(json_encode($array_message));
                //Saber si el correo que se esta ingresando ya esta asignado
            } else if ($array_email) {
                $array_message = ['message' => 'Ya existe alguien con ese correo'];
                exit(json_encode($array_message));
            } else {
                //Obtener los codigo en tipo numerico
                $id_rol = intval($id_rol);
                $id_tdoc = intval($id_tdoc);
                $id_estado = intval($id_estado);
    
                $UserModel->updateUser(
                    $id_user,
                    $nombre_user,
                    $apellido_user,
                    $id_rol,
                    $id_tdoc,
                    $documento_user,
                    $password_user,
                    $email_user,
                    $id_estado
                );
        }

        $array_user = $UserModel->paginateUser();
        $array_estado = $UserModel->paginateEstado();
        $UserView = new UserView();
        $UserView->paginateUsers($array_user, $array_estado);
    }
}
?>