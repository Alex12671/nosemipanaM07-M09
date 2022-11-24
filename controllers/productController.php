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
            $_POST["Id"],
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

        //vuelve a la tabla de productos
        $product2 = new Product();
        $show = $product2->ShowProducts();
        require_once "views/products/ShowProducts.php";
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
        //vuelve a la tabla de productos
        $product2 = new Product();
        $show = $product2->ShowProducts();
        require_once "views/products/ShowProducts.php";
    }

    public function getEditImgForm(){
        require_once "views/products/EditImg.php";
    }

    public function EditImg(){
        require_once "models/product.php";
        $product = new Product();
        
        $edit= $product->EditImg($_POST["ID"],$_FILES["Imagenlibro"]);

        //vuelve a la tabla de productos
        $product2 = new Product();
        $show = $product2->ShowProducts();
        require_once "views/products/ShowProducts.php";

    }

    public function Activate(){
        require_once "models/product.php";
        $product = new Product();
        $activate= $product->Activate($_GET['id']);

        //vuelve a la tabla de productos
        $product2 = new Product();
        $show = $product2->ShowProducts();
        require_once "views/products/ShowProducts.php";
    }

    public function Desactivate(){
        require_once "models/product.php";
        $product = new Product();
        $desactivate= $product->Desactivate($_GET['id']);

        //vuelve a la tabla de productos
        $product2 = new Product();
        $show = $product2->ShowProducts();
        require_once "views/products/ShowProducts.php";
    }

    //muestra todos los libros en principal
    public function showMain(){
        require_once "models/product.php";
        $product = new Product();
        $show= $product->showMain();
        require_once "views/products/showMain.php";
    }

    public function SearchProductsByCategory() {
        require_once "models/product.php";
        $product = new Product();
        $filter = $product->ShowProductsByCategory($_GET['id']);
        require_once "views/products/productFilter.php";
    }

    public function SearchProductsByName() {
        require_once "models/product.php";
        $product = new Product();
        $filter = $product->ShowProductsByName($_POST['bookFilter']);
        require_once "views/products/productFilter.php";
    }

    public function ShowProductDetails() {
        require_once "models/product.php";
        $product = new Product();
        $details = $product->ShowSelectedProduct($_GET['idProduct']);
        require_once "views/products/productDetails.php";
    }

    public function searchProducts() {
        require_once "models/product.php";
        $product = new Product();
        $show = $product->searchProducts($_POST['searchField']);
        require_once "views/products/ShowProducts.php";
    }
}
?>