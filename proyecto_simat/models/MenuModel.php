<?php

class MenuModel
{
    private $Connection;

    function __construct($Connection)
    {
        $this->Connection = $Connection;
    }

    function listUser($id_user)
    {
        $sql = "SELECT * FROM SIMAT_MAS.USUARIOS 
        WHERE id_user = '$id_user'";
        $this->Connection->query($sql);
        return $this->Connection->fetchAll();
    }

    function numRegister()
    {
        $sql = "SELECT count(*) FROM SIMAT_MAS.USUARIOS";
        $this->Connection->query($sql);
        return $this->Connection->fetchAll();
    }

    function numRegister_sol()
    {
        $sql = "SELECT count(*) FROM SIMAT_MAS.SOLICITUDES";
        $this->Connection->query($sql);
        return $this->Connection->fetchAll();
    }

    function validateRol($rol)
    {
        $sql = "SELECT * FROM SIMAT_MAS.USUARIOS 
        WHERE id_rol = '$rol'";
        $this->Connection->query($sql);
        return $this->Connection->fetchAll();
    }
}
?>