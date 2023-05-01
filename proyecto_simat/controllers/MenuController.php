<?php
require_once "views/MenuView.php";
require_once "models/MenuModel.php";

class MenuController 
{ 
    // FUNCIÓN QUE MUESTRA - (MENÚ DE USUARIOS)
    function validateMenu()
    {
        $Connection = new Connection();
        $MenuModel = new MenuModel($Connection);
        
        $user = $MenuModel->listUser($_SESSION["id_user"]);
        $num_register = $MenuModel->numRegister()[0]->count;
        $num_register_sol = $MenuModel->numRegister_sol()[0]->count;

        $MenuView = new MenuView();  
        $MenuView->showMenu($user,$num_register, $num_register_sol);
        
    }
    
    // FUNCIÓN QUE MUESTRA - (MENÚ DE USUARIOS)
    function validateHome()
    {
        $Connection = new Connection();
        $MenuModel = new MenuModel($Connection);
        
        $num_register = $MenuModel->numRegister()[0]->count;
        $num_register_sol = $MenuModel->numRegister_sol()[0]->count;

        $MenuView = new MenuView();
        $MenuView->showStartePage($num_register, $num_register_sol);
    }
    
}
?>