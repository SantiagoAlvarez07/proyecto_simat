<?php
require_once "models/SolicitudModel.php";
require_once "views/SolicitudView.php";

class SolicitudController
{
    //Metodo para insertar un nuevo usuario
    function insertSolicitud()
    {
        //Obtener todos los atributos del ACUDIENTE
        $nombre_acu = $_POST['nombre_acu'];
        $apellido_acu = $_POST['apellido_acu'];
        $id_tdoc_acu = $_POST['tipo_documento_acu'];
        $documento_acu = $_POST['documento_acu'];
        $telefono_acu = $_POST['telefono_acu'];
        $email_acu = $_POST['email_acu'];
        //$id_rol_acu = '3';

        //Obtener todos los atributos del ASPIRANTE
        $nombre_aspi = $_POST['nombre_aspi'];
        $apellido_aspi = $_POST['apellido_aspi'];
        $id_tdoc_aspi = $_POST['tipo_documento_aspi'];
        $documento_aspi = $_POST['documento_aspi'];
        $id_grado = $_POST['grado_aspi'];
        $id_disc = $_POST['discapacidad_aspi'];
        //$id_rol_aspi = '4';

        $Connection = new Connection();
        $SolicitudModel = new SolicitudModel($Connection);

        //Validar si el documento que se esta ingresando ya le pertenece a una persona
        $array_documento = $SolicitudModel->duplicateDocumento($documento_acu);
        $array_email = $SolicitudModel->duplicateEmail($email_acu);
        $array_documento_aspi = $SolicitudModel->duplicateDocumentoAspi($documento_aspi);

        //Saber que si se llenaron los campos
        if (
            $nombre_acu == "" || $apellido_acu == "" || $id_tdoc_acu == "Tipo de documento" ||
            $documento_acu == "" || $telefono_acu == "" || $email_acu == "" ||
            
            $nombre_aspi == "" || $apellido_aspi == "" || $id_tdoc_aspi == "Tipo de documento" ||
            $documento_aspi == "" || $id_grado == "Grado a cursar" || $id_disc == "Seleccionar" 
        ) 
        {

            $array_message = ['message' => 'Hay campos por llenar'];
            exit(json_encode($array_message));

            //Validar que el numero de documento sea numerico y de 10 digitos
        } else if (!(ctype_digit($documento_acu)) || strlen($documento_acu) < 8) {
            $array_message = ['message' => 'Error en el numero de documento'];
            exit(json_encode($array_message));

            //Saber si el documento que se esta ingresando ya esta asignado
        } else if ($array_documento) {
            $array_message = ['message' => 'Ya existe un acudiente con ese documento'];
            exit(json_encode($array_message));
            //Saber si el correo que se esta ingresando ya esta asignado
        } else if ($array_documento_aspi) {
            $array_message = ['message' => 'Ya existe un aspirante con ese documento'];
            exit(json_encode($array_message));
        } else if ($array_email) {
            $array_message = ['message' => 'Ya existe un acudiente con ese correo'];
            exit(json_encode($array_message));
        } else {
            //Obtener los codigo en tipo numerico
            $id_tdoc_acu = intval($id_tdoc_acu);

            $id_tdoc_aspi = intval($id_tdoc_aspi);
            $id_grado = intval($id_grado);
            $id_disc = intval($id_disc);

            $SolicitudModel->insertSolicitud(
                $nombre_acu,
                $apellido_acu,
                $documento_acu,
                $email_acu,
                $telefono_acu,
                $id_tdoc_acu,
                $nombre_aspi,
                $apellido_aspi,
                $documento_aspi,
                $id_grado,
                $id_disc,
                $id_tdoc_aspi
            );
        }
        
        $array_SolicitudAcudiente = $SolicitudModel->paginateSolicitudAcudiente();

        $SolicitudView = new SolicitudView();
        $SolicitudView->paginateSolicitudAcudiente($array_SolicitudAcudiente);
    }
    //MÉTODO QUE LISTA - (SOLICITUDES)
    function paginateSolicitud()
    {
        $Connection = new Connection();
        $SolicitudModel = new SolicitudModel($Connection);

        $array_Solicitudes = $SolicitudModel->paginateSolicitud();

        $SolicitudView = new SolicitudView();
        $SolicitudView->paginateSolicitud($array_Solicitudes);
    }

    //MÉTODO QUE MUESTRA INFORMACIÓN - (SOLICITAR CUPO)
    function paginateSolicitarCupo()
    {
        $Connection = new Connection();
        $SolicitudModel = new SolicitudModel($Connection);

        $SolicitudView = new SolicitudView();
        $SolicitudView->paginateSolicitarCupo();
    }

    //MÉTODO QUE LISTA - (SOLICITUD ACUDIENTE)
    function paginateSolicitudAcudiente()
    {
        $Connection = new Connection();
        $SolicitudModel = new SolicitudModel($Connection);

        $array_Solicitudes = $SolicitudModel->paginateSolicitud();

        $SolicitudView = new SolicitudView();
        $SolicitudView->paginateSolicitudAcudiente($array_Solicitudes);
    }

    function showFormSolicitud2()
    {
        $Connection = new Connection();
        $SolicitudModel = new SolicitudModel($Connection);

        $arrayTypeDocument = $SolicitudModel->paginateDocumentType();
        $arrayGrado = $SolicitudModel->paginateGrado();
        $arrayDiscapacidad = $SolicitudModel->paginateDiscapacidad();

        $SolicitudView = new SolicitudView();
        $SolicitudView->showFormSolicitud2($arrayTypeDocument, $arrayGrado, $arrayDiscapacidad);
    }
}
?>