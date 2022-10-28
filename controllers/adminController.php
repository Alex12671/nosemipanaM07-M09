<?php
class adminController{
    //El controller tiene las diferentes acciones que se pueden hacer sobre el administrador 
    public function validateAdmin(){
        require_once "models/admin.php";
        $admin = new Admin();
        
        if ($admin->validateAdmin($_POST["nombre"], $_POST["password"])){
            require_once "views/admin/panelAdmin.php";
        }
        else{
            echo "<h1> Nombre o contraseña incorrectos </h1>";
            ?>
                <meta http-equiv="refresh" content="2; url=index.php?controller=admin&action=logAdmin">
            <?php
        }
        
    }
    public function logAdmin(){
        require_once "views/admin/logAdmin.php";
    }
    
}
?>


