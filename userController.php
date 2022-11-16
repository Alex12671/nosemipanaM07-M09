<?php
class userController {
    public function showRegisterForm() {
        require_once "views/users/userRegistration.php";
    }

    public function AddUser() {
        require_once "models/user.php";
        $user = new User();
        $rows = $user->RegisterClient($_POST['Nombre'],$_POST['Apellidos1'],$_POST['Apellidos2'],$_POST['Password'],$_POST['DNI'],$_POST['Email'],$_POST['Telefono'],$_POST['Calle'],$_POST['Número'],$_POST['CP'],
        $_POST['Piso'],$_POST['Ciudad'],$_POST['Provincia']);
        if(isset($_POST['Nombre'])) {
            if($rows == 1) {
                echo "Usuario registrado correctamente";  
                ?><meta http-equiv="refresh" content="2; url=http://localhost/nosemipanaM07-M09-reprueba"> <?php  
            }
            else {
                echo "Jaja no funsiona";
            }
        }
    }

    public function ValidateUserCredentials(){
        require_once "models/user.php";
        $user = new User();
        
        if ($user->validateUser($_POST["nombre"], $_POST["password"])){
            if ($user){
                $_SESSION['rol']  = "comprador";
                $_SESSION['name'] = $_POST['nombre'];
                ?> <meta http-equiv="refresh" content="0; url=index.php"> <?php
            }
    
        }
        else{
            echo "<h1> Nombre o contraseña incorrectos </h1>";
            ?>
                <meta http-equiv="refresh" content="2; url=index.php?controller=user&action=logUser">
            <?php
        }
        
    }

    public function logUser(){
        require_once "views/users/logUser.php";
    }
    
    public function ShowUserCategories(){
        require_once "models/user.php";
        $user = new User();
        $rows = $user->ShowUserCategories($_SESSION['name']);
        require_once "views/users/showCategoriesUser.php";
    }
}
?>