<?php

class AccessModel
{
    //ATRIBUTOS
    private $Connection;

    //MÉTODO CONTRUCTOR - CONEXIÓN
    function __Construct($Connection)
    {
        $this->Connection = $Connection;
    }

    //FUNCIÓN VALIDAR - (LOGIN)
    function validateFormSession($documento,$password,$rol)
    {
        $sql = "SELECT * FROM SIMAT_MAS.USUARIOS 
                WHERE documento_user = '$documento' 
                AND password_user = '$password' 
                AND id_rol = '$rol'";

        $this->Connection->query($sql);
        return $this->Connection->fetchAll();
    }
}

?>