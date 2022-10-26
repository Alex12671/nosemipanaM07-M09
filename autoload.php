<?php

function AutoLoad($ClassName){

    include "controllers/$ClassName.php";

}

spl_autoload_register("AutoLoad");


?>