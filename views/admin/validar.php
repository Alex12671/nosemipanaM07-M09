<?php

    if(isset($_SESSION["Administrador"])){
        echo "<h1> bienvenido </h1>";
    }else{
        echo "<h1> Nombre o contraseña incorrectos </h1>";
        ?>
                <meta http-equiv="refresh" content="3; url=index.php?controller=admin&action=logAdmin">
                <?php
    }
?>