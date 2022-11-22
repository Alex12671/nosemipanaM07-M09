<!--Controlador frontal: fichero que se encarga de cargarlo absolutamente todo -->
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" type = "text/css" href = "styles.css"/>
    <link  rel="icon"   href="views/img/winrar.png" type="image/png" />
    <title>Document</title>
</head>
<body>
    <script src="codi.js"></script>
<?php 
require_once "autoload.php";
require_once "views/general/cabecera.html";


if ( isset($_SESSION['rol']) && $_SESSION['rol'] == "admin"){
    require_once "views/admin/panelAdmin.php";
}
else{
    $show = new GeneralController();
    $show->showMainMenu();
}


if (isset($_GET['controller'])){
    $nombreController = $_GET['controller']."Controller";
}
else{
    //Controlador per dedecte
    $nombreController = "productController";
}
if (class_exists($nombreController)){
    $controlador = new $nombreController(); 
    if(isset($_GET['action'])){
        $action = $_GET['action'];
    }
    else{
        $action ="showMain";
    }
    $controlador->$action();   
}else{

    echo "No existe el controlador";
}
require_once "views/general/pie.html";
?>
</body>
</html>


