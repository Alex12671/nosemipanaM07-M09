<?php
class adminController{
    //El controller tiene las diferentes acciones que se pueden hacer sobre el administrador 
    public function validar(){
        require_once "models/admin.php";
        $admin = new Admin();
        print_r($_POST["nombre"]);
        $admin->setNombre($_POST["nombre"]);
        $admin->getNombre();
        print_r($_POST["password"]);
        $admin->setPassword($_POST["password"]);
        $admin->getPassword();
        $validacion = $admin->validar($_POST["nombre"], $_POST["password"]);
        require_once "views/admin/validar.php";
    }
    public function logAdmin(){
        require_once "views/admin/logAdmin.php";
    }
}
?>


