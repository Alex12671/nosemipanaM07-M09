<?php

public class categoryController{

    public function getCategories(){
        require_once "models/category.php";
        $category = new Category();
        
        $add = $admin->getAllGenres();

        // TODO: No he mirado este require_once todavía, hay que mirarlo
        require_once "views/admin/menuAdmin.php";
    }
}
?>
