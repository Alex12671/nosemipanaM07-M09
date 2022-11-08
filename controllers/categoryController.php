<?php

class categoryController{

    public function showCategories() {
        require_once "models/category.php";       
        $category = new Category();

        $show= $category->showCategories();

        require_once "views/categories/ShowCategories.php";
    }

    public function getCategoriesAdd(){
        require_once "models/category.php";
        $category = new Category();
        
        $allCategories = $category->getAllGenres();

        require_once "views/products/AddProducts.php";
    }

    public function getCategoriesEdit(){
        require_once "models/category.php";
        $category = new Category();
        
        $allCategories = $category->getAllGenres();

        require_once "views/products/EditProducts.php";
    }

    //TODO: Creo que esta funcion es una chapuza pero no sé como arreglarla
    public function AddCategoryForm(){
        require_once "views/categories/AddCategory.php";
    }

    public function AddCategory(){
        require_once "models/category.php";
        $category = new Category();
        
        $add= $category->AddCategory(
            $_POST["ID"],
            $_POST["Nombre"]    
        );

        require_once "views/categories/AddCategory.php";
    }

    public function ShowEditCategoryForm(){        
        require_once "views/categories/EditCategory.php";
    }

    public function EditCategory(){
        require_once "models/category.php";
        $category = new Category();
        
        $add= $category->EditCategory(
            $_POST["ID"],
            $_POST["Nombre"]    
        );

        require_once "views/admin/panelAdmin.php";
    }

    public function Activate(){
        require_once "models/category.php";
        $category = new Category();
        $activate= $category->Activate($_GET['id']);

        require_once "views/admin/panelAdmin.php";
    }

    public function Desactivate(){
        require_once "models/category.php";
        $category = new Category();
        $desactivate= $category->Desactivate($_GET['id']);

        require_once "views/admin/panelAdmin.php";
    }
}
?>