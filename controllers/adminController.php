<?php
class adminController{
    //El controller tiene las diferentes acciones que se pueden hacer sobre el administrador 
    public function logAdmin(){
        require_once "views/admin/logAdmin.php";
    }

    public function validateAdmin(){
        require_once "models/admin.php";
        $admin = new Admin();
        
        $validacion = $admin->validateAdmin($_POST["nombre"], $_POST["password"]);
        require_once "views/admin/validar.php";
    }
}
?>


