<?php

class categoryController{

    public function showCategories() {
        if($_SESSION['rol']=='admin'){
            require_once "models/category.php";       
            $category = new Category();

            $show= $category->showCategories();

            require_once "views/categories/ShowCategories.php";
        }else{
            print("Error, no estás validado como admin");
        }
    }

    public function getCategoriesAdd(){
        if($_SESSION['rol']=='admin'){
            require_once "models/category.php";
            $category = new Category();
            
            $allCategories = $category->getAllGenres();

            require_once "views/products/AddProducts.php";
        }else{
            print("Error, no estás validado como admin");
        }   
    }

    public function getCategoriesEdit(){
        if($_SESSION['rol']=='admin'){
            require_once "models/category.php";
            $category = new Category();
            
            $allCategories = $category->getAllGenres();

            require_once "views/products/EditProducts.php";
        }else{
            print("Error, no estás validado como admin");
        }   
    }

    //TODO: Creo que esta funcion es una chapuza pero no sé como arreglarla
    public function AddCategoryForm(){
        if($_SESSION['rol']=='admin'){
            require_once "views/categories/AddCategory.php";
        }else{
            print("Error, no estás validado como admin");
        } 
    }

    public function AddCategory(){
        if($_SESSION['rol']=='admin'){
            require_once "models/category.php";
            $category = new Category();
            
            $add= $category->AddCategory(
                $_POST["ID"],
                $_POST["Nombre"],
                $_FILES["ImagenGenero"]    
            );

            require_once "views/categories/AddCategory.php";
        }else{
            print("Error, no estás validado como admin");
        }
    }

    public function getEditCatImgForm(){
        if($_SESSION['rol']=='admin'){
            require_once "views/categories/EditCatImg.php";
        }else{
            print("Error, no estás validado como admin");
        } 
    }

    public function EditCatImg(){
        if($_SESSION['rol']=='admin'){
            require_once "models/category.php";
            $category = new Category();
            
            $edit= $category->EditCatImg($_POST["IdGenero"],$_FILES["ImagenGenero"]);

            //vuelve a la tabla de productos
            $category2 = new Category();
            $show = $category2->ShowCategories();
            require_once "views/categories/ShowCategories.php";
        }else{
            print("Error, no estás validado como admin");
        } 
    }

    public function ShowEditCategoryForm(){        
        if($_SESSION['rol']=='admin'){
            require_once "views/categories/EditCategory.php";
        }else{
            print("Error, no estás validado como admin");
        } 
    }

    public function EditCategory(){
        if($_SESSION['rol']=='admin'){
            require_once "models/category.php";
            $category = new Category();
            
            $add= $category->EditCategory(
                $_POST["ID"],
                $_POST["Nombre"]    
            );

            //vuelve a la tabla de categorías
            $category2 = new Category();
            $show= $category2->showCategories();
            require_once "views/categories/ShowCategories.php";
        }else{
            print("Error, no estás validado como admin");
        } 
    }

    public function Activate(){
        if($_SESSION['rol']=='admin'){
            require_once "models/category.php";
            $category = new Category();
            $activate= $category->Activate($_GET['id']);

            //vuelve a la tabla de categorías
            $category2 = new Category();
            $show= $category2->showCategories();
            require_once "views/categories/ShowCategories.php";
        }else{
            print("Error, no estás validado como admin");
        }
    }

    public function Desactivate(){
        if($_SESSION['rol']=='admin'){
            require_once "models/category.php";
            $category = new Category();
            $desactivate= $category->Desactivate($_GET['id']);

            //vuelve a la tabla de categorías
            $category2 = new Category();
            $show= $category2->showCategories();
            require_once "views/categories/ShowCategories.php";
        }else{
            print("Error, no estás validado como admin");
        }
    }
}
?>