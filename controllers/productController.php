<?php

public class productController{

    public function AddProduct(){
        require_once "models/product.php";
        $product = new Product();
        
        $add = $product->AddProduct(
            $_POST["Nombre"],
            $_POST["Descripcion"],
            $_POST["Genero"],
            $_POST["Autor"],
            $_POST["Editorial"],
            $_POST["Imagenlibro"],
            $_POST["Precio"],
            $_POST["Fecha_Entrada"],
            $_POST["Cantidad"],
            $_POST["Liquidacion"]
        );

        require_once "views/admin/menuAdmin.php";
    }
}
?>