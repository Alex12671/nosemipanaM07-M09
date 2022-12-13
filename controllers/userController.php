<?php
class userController {
    public function ValidateUserCredentials(){
        require_once "models/user.php";
        $user = new User();
        $resultado= $user->validateUser($_POST["nombre"], $_POST["password"]);
        $result= $resultado[0]->fetchAll(PDO::FETCH_ASSOC);
        if ($resultado[1]){
            if ($user){
                $_SESSION['rol']  = "comprador";
                $_SESSION['name'] = $_POST['nombre'];
                $_SESSION['id'] = $result[0]['IdCliente'];
                ?> <meta http-equiv="refresh" content="0; url=index.php"> <?php
            }
    
        }
        else{
            ?>
                <meta http-equiv="refresh" content="0; url=index.php?controller=user&action=logUser&loginFailed=1">
            <?php
        }
    }

    public function logUser(){
        require_once "views/users/logUser.php";
    }

    public function showRegisterForm() {
        if(isset($_SESSION['rol']) && $_SESSION['rol']=='comprador'){
            require_once "views/users/userRegistration.php";
        }else{
            print("Error, no estás validado como comprador");
        }
    }

    public function AddUser() {
        if(isset($_SESSION['rol']) && $_SESSION['rol']=='comprador'){
            require_once "models/user.php";
            $user = new User();
            $rows = $user->RegisterClient($_POST['Nombre'],
                $_POST['Apellidos1'],
                $_POST['Apellidos2'],
                $_POST['Password'],
                $_POST['DNI'],
                $_POST['Email'],
                $_POST['Telefono'],
                $_POST['Calle'],
                $_POST['Número'],
                $_POST['CP'],
                $_POST['Piso'],
                $_POST['Ciudad'],
                $_POST['Provincia']
            );
            if(isset($_POST['Nombre'])) {
                if($rows == 1) {
                    echo "Usuario registrado correctamente";  
                    ?><meta http-equiv="refresh" content="0; url=http://localhost/nosemipanaM07-M09-reprueba"> <?php  
                }
                else {
                    echo "Jaja no funsiona";
                }
            }
        }else{
            print("Error, no estás validado como comprador");
        }
    }

    public function ShowUserOrders(){
        if(isset($_SESSION['rol']) && $_SESSION['rol']=='comprador'){
            require_once "models/user.php";
            $user = new User();
            $result = $user->ShowUserOrders($_SESSION['id']);
            require_once "views/users/ShowUserOrders.php";
        }else{
            print("Error, no estás validado como comprador");
        }
    }

    public function ShowUserProfile() {
        if(isset($_SESSION['rol']) && $_SESSION['rol']=='comprador'){
            require_once "models/user.php";
            $user = new User();
            $result = $user->SelectUserProfile($_SESSION['id']);
            $array = $result->fetch(PDO::FETCH_ASSOC);
            require_once "views/users/userProfile.php";
        }else{
            print("Error, no estás validado como comprador");
        }
    }


    public function ModifyUserProfile() {
        if(isset($_SESSION['rol']) && $_SESSION['rol']=='comprador'){
            require_once "models/user.php";
            $user = new User();
            $result = $user->SelectUserProfile($_SESSION['id']);
            $editProfileArray = $result->fetch(PDO::FETCH_ASSOC);
            require_once "views/users/editProfile.php";
        }else{
            print("Error, no estás validado como comprador");
        }
    }

    //ToDo: claramente esta función no está terminada XD
    public function EditUserProfile() {
        if(isset($_SESSION['rol']) && $_SESSION['rol']=='comprador'){
            require_once "models/user.php";
            $user = new User();
            $rows = $user->EditUserProfile($_SESSION['id'],
                $_POST['Nombre'],
                $_POST['Apellidos1'],
                $_POST['Apellidos2'],
                $_POST['Password'],
                $_POST['DNI'],
                $_POST['Email'],
                $_POST['Telefono'],
                $_POST['Calle'],
                $_POST['Número'],
                $_POST['CP'],
                $_POST['Piso'],
                $_POST['Ciudad'],
                $_POST['Provincia']
            );
            require_once "views/users/editProfile.php";
        }else{
            print("Error, no estás validado como comprador");
        }
    }

    public function DeactivateUserProfile() {
        if(isset($_SESSION['rol']) && $_SESSION['rol']=='comprador'){
            require_once "models/user.php";
            $user = new User();
            $result = $user->DeactivateUserProfile($_SESSION['id']);
            require_once "views/users/deactivateUser.php";
        }else{
            print("Error, no estás validado como comprador");
        }
    }
}
?>