<?php
class UserModel
{
    private $Connection;
    
    //Metodo constrcutor
    function __construct($Connection) {
        $this->Connection = $Connection;
    }


    //Metodo para insertar un usuaro
    function insertUser($nombre_user,$apellido_user,$id_rol,$id_tdoc,$documento_user,$password_user,$email_user,$id_estado)
    {
        $sql = "INSERT INTO SIMAT_MAS.USUARIOS (id_user,nombre_user,apellido_user,id_rol,id_tdoc,documento_user,password_user,email_user,id_estado)
        VALUES (DEFAULT,'$nombre_user','$apellido_user',$id_rol,$id_tdoc,'$documento_user','$password_user','$email_user',$id_estado)";
        $this->Connection->query($sql);
    }

    function insertHistorialAccesos($nombre_user,$apellido_user,$documento_user,$id_rol)
    {
        $sql = "INSERT INTO SIMAT_MAS.AUDI_ACCESO(id_user,nombre_user,apellido_user,documento_user,fecha_acceso,id_rol)
        VALUES (DEFAULT,'$nombre_user','$apellido_user','$documento_user',DEFAULT,$id_rol)";
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

    //MÉTODO QUE CONSULTA - (USUARIOS)
    function paginateUser()
    {
        $sql = "SELECT * FROM SIMAT_MAS.USUARIOS";
        $this->Connection->query($sql);
        return $this->Connection->fetchAll();
    }

    //MÉTODO QUE CONSULTA - (USUARIOS)
    function paginateHistorialAccesos()
    {
        $sql = "SELECT * FROM SIMAT_MAS.AUDI_ACCESO";
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
    function paginateRol()
    {
        $sql = "SELECT * FROM SIMAT_MAS.ROLES";
        $this->Connection->query($sql);
        return $this->Connection->fetchAll();
    }

    //MÉTODO QUE CONSULTA - ESTADOS)
    function paginateEstado()
    {
        $sql = "SELECT * FROM SIMAT_MAS.ESTADO";
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
    function duplicateDocumento($documento_user) 
    {
        $sql="SELECT * FROM SIMAT_MAS.USUARIOS
        WHERE documento_user = '$documento_user'";
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
    function duplicateEmail($email_user)
    {
        $sql="SELECT * FROM SIMAT_MAS.USUARIOS
        WHERE email_user = '$email_user'";
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