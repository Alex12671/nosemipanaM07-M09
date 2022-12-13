<?php

class productController{

    public function showProducts() {
        if($_SESSION['rol']=='admin'){
            require_once "models/product.php"; 
            $product = new Product();
            
            $show = $product->ShowProducts();
            
            require_once "views/products/ShowProducts.php";
        }else{
            print("Error, no estás validado como admin");
        }
    }

    public function AddProduct(){
        if($_SESSION['rol']=='admin'){
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
        }else{
            print("Error, no estás validado como admin");
        }
    }
    
    public function getProductEdit($id){
        if($_SESSION['rol']=='admin'){
            require_once "views/products/EditProducts.php";
        }else{
            print("Error, no estás validado como admin");
        }
    }

    public function EditProduct(){
        if($_SESSION['rol']=='admin'){
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
                $_POST["Liquidacion"],
            );
            //vuelve a la tabla de productos
            $product2 = new Product();
            $show = $product2->ShowProducts();
            require_once "views/products/ShowProducts.php";
        }else{
            print("Error, no estás validado como admin");
        }
    }

    public function getEditImgForm(){
        if($_SESSION['rol']=='admin'){
            require_once "views/products/EditImg.php";
        }else{
            print("Error, no estás validado como admin");
        }
    }

    public function EditImg(){
        if($_SESSION['rol']=='admin'){
            require_once "models/product.php";
            $product = new Product();
            
            $edit= $product->EditImg($_POST["id"],$_FILES["Imagenlibro"]);

            //vuelve a la tabla de productos
            $product2 = new Product();
            $show = $product2->ShowProducts();
            require_once "views/products/ShowProducts.php";
        }else{
            print("Error, no estás validado como admin");
        }
    }

    public function Activate(){
        if($_SESSION['rol']=='admin'){
            require_once "models/product.php";
            $product = new Product();
            $activate= $product->Activate($_GET['id']);

            //vuelve a la tabla de productos
            $product2 = new Product();
            $show = $product2->ShowProducts();
            require_once "views/products/ShowProducts.php";
        }else{
            print("Error, no estás validado como admin");
        }
    }

    public function Desactivate(){
        if($_SESSION['rol']=='admin'){
            require_once "models/product.php";
            $product = new Product();
            $desactivate= $product->Desactivate($_GET['id']);

            //vuelve a la tabla de productos
            $product2 = new Product();
            $show = $product2->ShowProducts();
            require_once "views/products/ShowProducts.php";
        }else{
            print("Error, no estás validado como admin");
        }
    }

    //muestra todos los libros en principal
    public function showMain(){
        if($_SESSION['rol']=='admin'){
            require_once "models/product.php";
            $product = new Product();
            $show= $product->showMain();
            if(isset($_COOKIE['lastVisitedBooks'])) {
                $lastBooks = array();
                $product2 = new Product();
                $lastVisited = json_decode($_COOKIE['lastVisitedBooks'],true);
                foreach($lastVisited as $data => $value) {
                    array_push($lastBooks,$product2->ShowSelectedProduct($value));
                }
            }
            require_once "views/products/showMain.php";
        }else{
            print("Error, no estás validado como admin");
        }
    }

    public function SearchProductsByCategory() {
        if($_SESSION['rol']=='admin'){
            require_once "models/product.php";
            $product = new Product();
            $category = new Category();
            $_SESSION['img'] = $category->categoryImg($_GET['id']);
            $filter = $product->ShowProductsByCategory($_GET['id']);
            require_once "views/products/productFilter.php";
        }else{
            print("Error, no estás validado como admin");
        }
    }

    public function SearchProductsByName() {
        if($_SESSION['rol']=='admin'){
            require_once "models/product.php";
            $product = new Product();
            $filter = $product->ShowProductsByName($_POST['bookFilter']);
            require_once "views/products/productFilter.php";
        }else{
            print("Error, no estás validado como admin");
        }
    }

    public function ShowProductDetails() {
        if($_SESSION['rol']=='admin'){
            require_once "models/product.php";
            $product = new Product();
            $details = $product->ShowSelectedProduct($_GET['idProduct']);
            require_once "views/products/productDetails.php";
        }else{
            print("Error, no estás validado como admin");
        }
    }

    public function searchProducts() {
        if($_SESSION['rol']=='admin'){
            require_once "models/product.php";
            $product = new Product();
            $show = $product->searchProducts($_POST['searchField']);
            require_once "views/products/ShowProducts.php";
        }else{
            print("Error, no estás validado como admin");
        }
    }
    public function showSales() {
        if($_SESSION['rol']=='admin'){
            require_once "models/product.php";
            $product = new Product();
            $filter = $product->showSales();
            require_once "views/products/sales.php";
        }else{
            print("Error, no estás validado como admin");
        }
    }

    public function AddProductToCart() {
        if($_SESSION['rol']=='admin'){
            require_once "models/product.php";
            $product = new Product();
            $details = $product->ShowSelectedProduct($_GET['id']);
            $array = $details->fetch(PDO::FETCH_ASSOC);
            if(!isset($_SESSION['Cart'][$_GET['id']])) {
                if($array['Liquidacion'] == 1) {
                    $precioLiquidación = $array['Precio'] * 0.8;
                    $_SESSION['Cart'][$_GET['id']] = array(
                        "Quantity" => 1,
                        "Price" => $precioLiquidación,
                        "OriginalPrice" => $array['Precio'],
                        "Nombre" => $array['Nombre'],
                        "Autor" => $array['Autor'],
                        "Imagen" => $array['Imagenlibro'],
                        
                    );
                }
                else {
                    $_SESSION['Cart'][$_GET['id']] = array(
                        "Quantity" => 1,
                        "Price" => $array['Precio'],
                        "Nombre" => $array['Nombre'],
                        "Autor" => $array['Autor'],
                        "Imagen" => $array['Imagenlibro'],
                        
                    );
                }
                
                if(isset($_SESSION['TotalQuantity'])) {
                    $_SESSION['TotalQuantity']++;
                }
                else {
                    $_SESSION['TotalQuantity'] = 1;
                }
                
            }
            else {
                $_SESSION['Cart'][$_GET['id']]['Quantity']++;
                $_SESSION['TotalQuantity']++;
                $_SESSION['Cart'][$_GET['id']]['Price'] = $_SESSION['Cart'][$_GET['id']]['Price'] + $array['Precio'];
            }
            ?><meta http-equiv="refresh" content="0; url=index.php?controller=product&action=ShowProductDetails&idProduct=<?php echo $array['IdProducto']; ?>"> <?php  
        }else{
            print("Error, no estás validado como admin");
        }
    }

    public function ShowCart() {
        if($_SESSION['rol']=='admin'){
            require "views/products/showCart.php";
        }else{
            print("Error, no estás validado como admin");
        }
    }

    public function ConfirmOrder() {
        if($_SESSION['rol']=='admin'){
            require_once "models/order.php";
            if(isset($_SESSION['rol']) && $_SESSION['rol'] == "comprador") {
                $pedido = new Order();
            }
            else {
                ?><meta http-equiv="refresh" content="0; url=index.php?controller=user&action=logUser&orderFailed=1"> <?php  
            }
        }else{
            print("Error, no estás validado como admin");
        }
    }

    public function EmptyCart() {
        if($_SESSION['rol']=='admin'){
            unset($_SESSION['Cart']);
            unset($_SESSION['TotalQuantity']);
            ?><meta http-equiv="refresh" content="0; url=index.php?controller=product&action=ShowMain"> <?php  
        }else{
            print("Error, no estás validado como admin");
        }
    }

    public function DeleteProductFromCart() {
        if($_SESSION['rol']=='admin'){
            $_SESSION['TotalQuantity'] -= $_SESSION['Cart'][$_GET['id']]['Quantity'];
            unset($_SESSION['Cart'][$_GET['id']]);
            if($_SESSION['TotalQuantity'] == 0) {
                unset($_SESSION['Cart']);
            }
            ?><meta http-equiv="refresh" content="0; url=index.php?controller=product&action=ShowMain"> <?php  
        }else{
            print("Error, no estás validado como admin");
        }
    }  
}
?>