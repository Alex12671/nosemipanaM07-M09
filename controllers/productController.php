<?php

class productController{

    public function showProducts() {
        require_once "models/product.php"; 
        $product = new Product();
        
        $show = $product->ShowProducts();
        
        require_once "views/products/ShowProducts.php";
    }

    public function AddProduct(){
        require_once "models/product.php";
        $product = new Product();
        // $catgories = new Category();
        // $allCategories = $catgories->getAllGenres();
        
        $add= $product->AddProduct(
            $_POST["Nombre"],
            $_POST["Descripcion"],
            $_POST["Genero"],
            $_POST["Autor"],
            $_POST["Editorial"],
            $_POST["Paginas"],
            $_FILES["Imagenlibro"],
            $_POST["Precio"],
            $_POST["Fecha_Entrada"],
            $_POST["Cantidad"],
        );

        require_once "views/products/AddProducts.php";
    }
    
    public function getProductEdit(){
        require_once "views/products/EditProducts.php";
    }

    public function EditProduct(){
        require_once "models/product.php";
        $product = new Product();
        
        $edit= $product->EditProduct(
            $_POST["ID"],
            $_POST["Nombre"],
            $_POST["Descripcion"],
            $_POST["Genero"],
            $_POST["Autor"],
            $_POST["Editorial"],
            $_POST["Paginas"],
            $_POST["Precio"],
            $_POST["Fecha_Entrada"],
            $_POST["Cantidad"],
        );

        require_once "views/admin/panelAdmin.php";
    }

    public function getEditImgForm(){
        require_once "views/products/EditImg.php";
    }

    public function EditImg(){
        require_once "models/product.php";
        $product = new Product();
        
        $edit= $product->EditImg($_POST["ID"],$_FILES["Imagenlibro"]);

        require_once "views/admin/panelAdmin.php";

    }

    public function Activate(){
        require_once "models/product.php";
        $product = new Product();
        $activate= $product->Activate($_GET['id']);

        require_once "views/admin/panelAdmin.php";
    }

    public function Desactivate(){
        require_once "models/product.php";
        $product = new Product();
        $desactivate= $product->Desactivate($_GET['id']);

        require_once "views/admin/panelAdmin.php";
    }
}
?>