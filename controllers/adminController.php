<?php
class adminController{
    //El controller tiene las diferentes acciones que se pueden hacer sobre el administrador 
    public function validateAdmin(){
        require_once "models/admin.php";
        $admin = new Admin();
        
        if ($admin->validateAdmin($_POST["nombre"], $_POST["password"])){
            if ($admin){
                $_SESSION['rol']  = "admin";
                $_SESSION['name'] = $_POST['nombre'];
                ?> <meta http-equiv="refresh" content="0; url=index.php"> <?php
            }
    
        }
        else{
            ?>
                <meta http-equiv="refresh" content="0; url=index.php?controller=admin&action=logAdmin&loginFailed=1">
            <?php
        }
        
    }
    
    //muestra las acciones que puede hacer el administrador
    public function logAdmin(){
        require_once "models/admin.php";
        $admin = new Admin();
        $edit  = $admin->logAdmin();
        require_once "views/admin/logAdmin.php";
    }

    public function showAdminPanel() {
        if(isset($_SESSION['rol']) && $_SESSION['rol']=='admin'){
            require_once "views/general/menu.php";
            require_once "views/admin/panelAdmin.php";
        }else{
            print("Error, no estás validado como admin");
        }
    }
}
?>