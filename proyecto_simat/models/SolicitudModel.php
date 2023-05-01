<?php
class SolicitudModel
{
    private $Connection;
    
    //Metodo constrcutor
    function __construct($Connection) {
        $this->Connection = $Connection;
    }


    //Metodo para insertar un usuaro
    function insertSolicitud($nombre_acu,$apellido_acu,$documento_acu,$email_acu,$telefono_acu,$id_tdoc_acu,$nombre_aspi,$apellido_aspi,$documento_aspi,$id_grado,$id_disc,$id_tdoc_aspi)
    {
        $sql = "INSERT INTO SIMAT_MAS.SOLICITUDES(id_sol,id_acu,nombre_acu,apellido_acu,documento_acu,email_acu,telefono_acu,id_tdoc_acu,id_rol_acu,id_aspi,nombre_aspi,apellido_aspi,documento_aspi,id_grado,id_disc,id_tdoc_aspi,id_rol_aspi)
        VALUES (DEFAULT,DEFAULT,'$nombre_acu','$apellido_acu','$documento_acu','$email_acu','$telefono_acu', $id_tdoc_acu, DEFAULT,DEFAULT,'$nombre_aspi','$apellido_aspi','$documento_aspi',$id_grado,$id_disc,$id_tdoc_aspi,DEFAULT)";
        $this->Connection->query($sql);
    }

    function updateUser($id_user,$nombre_user,$apellido_user,$id_rol,$id_tdoc,$documento_user,$password_user,$email_user,$id_estado)
    {
        $sql = "UPDATE SIMAT_MAS.USUARIOS
        SET nombre_user = '$nombre_user', apellido_user = '$apellido_user',
        id_rol = '$id_rol', id_tdoc = '$id_tdoc', documento_user = '$documento_user',
        password_user = '$password_user', email_user = '$email_user', id_estado = '$id_estado' 
        WHERE id_user = '$id_user'";
        $this->Connection->query($sql);
    }

    //MÉTODO QUE CONSULTA - (SOLICITUDES)
    function paginateSolicitud()
    {
        $sql = "SELECT * FROM SIMAT_MAS.SOLICITUDES";
        $this->Connection->query($sql);
        return $this->Connection->fetchAll();
    }

    //MÉTODO QUE CONSULTA - (ÚLTIMA SOLICITUD)
    function paginateSolicitudAcudiente()
    {
        $sql = "SELECT * FROM SIMAT_MAS.SOLICITUDES ORDER BY id_sol DESC LIMIT 1";
        $this->Connection->query($sql);
        return $this->Connection->fetchAll();
    }

    //--------------------------------------- LISTAR TABLAS 

    //MÉTODO QUE CONSULTA - (TIPOS DE DOCUMENTO)
    function paginateDocumentType()
    {
        $sql = "SELECT * FROM SIMAT_MAS.TIPO_DOCUMENTO ";
        $this->Connection->query($sql);
        return $this->Connection->fetchAll();
    }

    //MÉTODO QUE CONSULTA - (ROLES)
    function paginateGrado()
    {
        $sql = "SELECT * FROM SIMAT_MAS.GRADOS";
        $this->Connection->query($sql);
        return $this->Connection->fetchAll();
    }

    //MÉTODO QUE CONSULTA - ESTADOS)
    function paginateDiscapacidad()
    {
        $sql = "SELECT * FROM SIMAT_MAS.DISCAPACIDAD";
        $this->Connection->query($sql);
        return $this->Connection->fetchAll();
    }


    //----------------------------- METODOS PARA BUSCAR
    
    //Metodo para buscar por documento
    function searchUserDocument($document_number){
        $sql = "SELECT * FROM ODONTOK.USER WHERE DOCUMENT_NUMBER = '$document_number'";
        $this->Connection->query($sql);
        return $this->Connection->fetchAll();
    }

    //Metodo para buscar por estado
    function searchUserState($cod_state){
        $sql = "SELECT * FROM ODONTOK.USER WHERE COD_STATE = $cod_state";
        $this->Connection->query($sql);
        return $this->Connection->fetchAll();
    }

    //Metodo para seleccionar un usuario en concreto
    function selectUser($id_user)
    {
        $sql = "SELECT * FROM SIMAT_MAS.USUARIOS 
        WHERE id_user = $id_user";
        $this->Connection->query($sql);
        return $this->Connection->fetchAll();
    }

    //---------------- METODOS  PARA REALIZAR VALIDACIONES

    //Saber si un documento ya existe en la base de datos
    function duplicateDocumento($documento_acu) 
    {
        $sql="SELECT * FROM SIMAT_MAS.SOLICITUDES
        WHERE documento_acu = '$documento_acu'";
        $this->Connection->query($sql);
        return $this->Connection->fetchAll();
    } 

    //Saber si un documento ya existe en la base de datos
    function duplicateDocumentoAspi($documento_aspi) 
    {
        $sql="SELECT * FROM SIMAT_MAS.SOLICITUDES
        WHERE documento_aspi = '$documento_aspi'";
        $this->Connection->query($sql);
        return $this->Connection->fetchAll();
    } 

    //Saber si un numero de documento no es repetido
    function duplicateDocumentoUpdate($documento_user,$id_user_update)
    {
        $sql="SELECT * FROM SIMAT_MAS.USUARIOS
        WHERE documento_user = '$documento_user'
        AND id_user<> '$id_user_update'";
        $this->Connection->query($sql);
        return $this->Connection->fetchAll();
    }

    //Saber si un nombre de usuario esta en la base de datos 
    function duplicateEmail($email_acu)
    {
        $sql="SELECT * FROM SIMAT_MAS.SOLICITUDES
        WHERE email_acu = '$email_acu'";
        $this->Connection->query($sql);
        return $this->Connection->fetchAll();
    }

    //Saber que el nuevo usuario no esta dupli
    function duplicateEmailUpdate($email_user,$id_user_update)
    {
        $sql="SELECT * FROM SIMAT_MAS.USUARIOS
        WHERE email_user = '$email_user'
        AND id_user <> '$id_user_update'";
        $this->Connection->query($sql);
        return $this->Connection->fetchAll();
    }

    
}
?>