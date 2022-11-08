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
        $sql = "UPDATE producto SET Activo= 1 WHERE IdProducto= '".$id."'";
        $result = $this->db->query($sql);
    }

    public function Desactivate($id)
    {
        $sql = "UPDATE producto SET Activo= 0 WHERE IdProducto= '".$id."'";
        $result = $this->db->query($sql);
    }

    function AddProduct($name, $decription, $category, $author, $editorial, $pages, $img, $price, $startingDate, $quantity){
        if (is_uploaded_file ($_FILES['Imagenlibro']['tmp_name']))
        {
            $nombreDirectorio = "views/img/";
            $idUnico = $name;
            $nombreFichero = $idUnico . "-" . $_FILES['Imagenlibro']['name'];
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
            $nombreDirectorio = "views/img/";
            $idUnico = $id;
            $nombreFichero = $idUnico . "-" . $_FILES['Imagenlibro']['name'];
            $directorio= $nombreDirectorio . $nombreFichero;
            move_uploaded_file ($_FILES['Imagenlibro']['tmp_name'], $nombreDirectorio . $nombreFichero);
        }
        $sql = "UPDATE producto SET Imagenlibro= '".$directorio."' WHERE IdProducto= '".$id."'";
        $result = $this->db->query($sql);
    }

    function ShowProducts() {
        $sql = "SELECT * FROM producto";
        $result = $this->db->query($sql);
        echo "<table cellspacing = 0>";
        while ($array = $result->fetchAll(PDO::FETCH_ASSOC)) {
            foreach($array as $data) {
                echo "<tr>";
                foreach($data as $field_name => $value) {
                    if($field_name == "Imagenlibro") {
                        echo "<td><img src=$value></img></td>";
                    }
                    else {
                        echo "<td>$value</td>";
                    }
                    
                }
                echo "<td><a href= 'index.php?controller=category&action=getCategoriesEdit&id=".$data['IdProducto']."&name=".$data['Nombre']."&desc=".$data['Descripcion']."&category=".$data['Genero']."&author=".$data['Autor']."&editorial=".$data['Editorial']."&pages=".$data['Paginas']."&price=".$data['Precio']."&date=".$data['Fecha_Entrada']."&date=".$data['Fecha_Entrada']."&quantity=".$data['Cantidad']."'> Editar Producto </a></td>";
                echo "<td><a href= 'index.php?controller=product&action=getEditImgForm&id=".$data['IdProducto']."'> Editar Imagen </a></td>";
                if($data['Activo']==1){
                    echo "<td><a href= 'index.php?controller=product&action=Desactivate&id=".$data['IdProducto']."'> Desactivar </a></td>"; 
                }else{
                    echo "<td><a href= 'index.php?controller=product&action=Activate&id=".$data['IdProducto']."'> Activar </a></td>"; 
                }
                echo "</tr>";
            }
        }
        echo "</table>";
    }
}

?>