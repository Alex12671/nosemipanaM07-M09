<?php
require_once("database.php");
class Product extends Database {
    private $name;
    private $decription;
    private $category;
    private $author;
    private $editorial;
    private $pages;
    private $img;
    private $price;
    private $startingDate;
    private $quantity;
    private $settlement;

   
    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    public function getDecription()
    {
        return $this->decription;
    }

    public function setDecription($decription)
    {
        $this->decription = $decription;
    }

    public function getCategory()
    {
        return $this->category;
    }

    public function setCategory($category)
    {
        $this->category = $category;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function setAuthor($author)
    {
        $this->author = $author;
    }

    public function getEditorial()
    {
        return $this->editorial;
    }

    public function setEditorial($editorial)
    {
        $this->editorial = $editorial;
    }

    public function getPages()
    {
        return $this->pages;
    }

    public function setPages($pages)
    {
        $this->pages = $pages;
    }

    public function getImg()
    {
        return $this->img;
    }

    public function setImg($img)
    {
        $this->img = $img;
    }

    
    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function getStartingDate()
    {
        return $this->startingDate;
    }

    public function setStartingDate($startingDate)
    {
        $this->startingDate = $startingDate;
    }

    public function getQuantity()
    {
        return $this->quantity;
    }

    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    public function getSettlement()
    {
        return $this->settlement;
    }

    public function setSettlement($settlement)
    {
        $this->settlement = $settlement;
    }

    public function Activate($id)
    {
        $sql = "UPDATE producto SET Activo= 'a' WHERE IdProducto= '".$id."'";
        $result = $this->db->query($sql);
    }

    public function Desactivate($id)
    {
        $sql = "UPDATE producto SET Activo= 'd' WHERE IdProducto= '".$id."'";
        $result = $this->db->query($sql);
    }

    function AddProduct($id, $name, $decription, $category, $author, $editorial, $pages, $img, $price, $startingDate, $quantity){
        if (is_uploaded_file ($_FILES['Imagenlibro']['tmp_name']))
        {
            $nombreImg= str_replace(" ", "-", $_FILES['Imagenlibro']['name']);
            $nombreDirectorio = "views/img/";
            $idUnico = $id;
            $nombreFichero = $idUnico . "-" .$nombreImg;
            $directorio= $nombreDirectorio . $nombreFichero;
            move_uploaded_file ($_FILES['Imagenlibro']['tmp_name'], $nombreDirectorio . $nombreFichero);
        }

        $sql = "INSERT INTO  producto (Nombre,Descripcion,Genero,Autor,Editorial,Paginas,Imagenlibro,Precio,Fecha_Entrada,Cantidad,Liquidacion)
        VALUES ('".$name."', '".$decription."', '".$category."', '".$author."', '".$editorial."', '".$pages."', '".$directorio."', '".$price."', '".$startingDate."', '".$quantity."', '0') ";
        $result = $this->db->query($sql);
        $rows = $result->rowCount();
    }

    function EditProduct($id, $name, $decription, $category, $author, $editorial, $pages, $price, $startingDate, $quantity){
        $sql = "UPDATE producto SET Nombre= '".$name."', Descripcion= '".$decription."',Genero= '".$category."',Autor= '".$author."',
        Editorial= '".$editorial."',Paginas= '".$pages."',Precio= '".$price."',Fecha_Entrada= '".$startingDate."', 
        Cantidad= '".$quantity."', Liquidacion= '0' WHERE IdProducto= '".$id."'";
        $result = $this->db->query($sql);
    }

    function EditImg($id, $img){
        if (is_uploaded_file ($_FILES['Imagenlibro']['tmp_name']))
        {
            $nombreImg= str_replace(" ", "-", $_FILES['Imagenlibro']['name']);
            $nombreDirectorio = "views/img/";
            $idUnico = $id;
            $nombreFichero = $idUnico . "-" .$nombreImg;
            $directorio= $nombreDirectorio . $nombreFichero;
            move_uploaded_file ($_FILES['Imagenlibro']['tmp_name'], $nombreDirectorio . $nombreFichero);
        }
        $sql = "UPDATE producto SET Imagenlibro= '".$directorio."' WHERE IdProducto= '".$id."'";
        $result = $this->db->query($sql);
    }

    function ShowProducts() {
        $sql = "SELECT * FROM producto";
        $result = $this->db->query($sql);
        return $result;
        
    }

    function showMain() {
        $sql = "SELECT IdProducto, nombre, Imagenlibro, Precio FROM producto where Activo like 'a' ORDER BY Fecha_Entrada DESC LIMIT 12";
        $result = $this->db->query($sql);
        return $result;
    }

    function ShowProductsByCategory($genre) {
        $sql = "SELECT * FROM producto WHERE Genero = '$genre'";
        $result = $this->db->query($sql);
        return $result;
    }

    function ShowProductsByName($name) {
        $sql = "SELECT * FROM producto WHERE Nombre LIKE '%$name%'";
        $result = $this->db->query($sql);
        return $result;
    }

    function ShowSelectedProduct($id) {
        $sql = "SELECT * FROM producto WHERE IdProducto = '$id'";
        $result = $this->db->query($sql);
        return $result;
    }

    function searchProducts($nombre){
        $sql = "SELECT * FROM producto WHERE Nombre LIKE '%$nombre%'";
        $result = $this->db->query($sql);
        return $result;
    }
}
?>