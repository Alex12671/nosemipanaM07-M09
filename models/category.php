<?php
require_once("database.php");

class Category extends Database {
    private $name;
    private $ID;
    private $img;

    function getID() {
        return $this->ID;
    }

    function setID($ID) {
        $this->ID = $ID;
    }

    function getName() {
        return $this->name;
    }

    function setName($name) {
        $this->name = $name;
    }
    
    public function Activate($id)
    {
        $sql = "UPDATE generos SET Activo= 1 WHERE IdGenero= '".$id."'";
        $result = $this->db->query($sql);
    }

    public function Desactivate($id)
    {
        $sql = "UPDATE generos SET Activo= 0 WHERE IdGenero= '".$id."'";
        $result = $this->db->query($sql);
    }

    function getAllGenres(){
        $sql = "SELECT * FROM generos";
        $result = $this->db->query($sql);
        $genres = $result->fetchAll(PDO::FETCH_ASSOC);
        return $genres;
    }

    function AddCategory($ID, $name, $img){
        if (is_uploaded_file ($_FILES['ImagenGenero']['tmp_name']))
        {
            $nombreImg= str_replace(" ", "-", $_FILES['ImagenGenero']['name']);
            $nombreDirectorio = "views/img/";
            $idUnico = $ID;
            $nombreFichero = $idUnico . "-" . $nombreImg;
            $directorio= $nombreDirectorio . $nombreFichero;
            move_uploaded_file ($_FILES['ImagenGenero']['tmp_name'], $nombreDirectorio . $nombreFichero);
        }
        $sql = "INSERT INTO  generos (IdGenero, Nombre, Imagen) VALUES ( '".$ID."', '".$name."', '".$img."') ";
        $result = $this->db->query($sql);
        $rows = $result->rowCount();
    }

    function EditCategory($ID, $name){
        $sql = "UPDATE generos SET IdGenero= '".$ID."', Nombre= '".$name."' WHERE IdGenero= '".$ID."'";
        $result = $this->db->query($sql);
    }

    function EditCatImg($ID, $img){
        if (is_uploaded_file ($_FILES['ImagenGenero']['tmp_name']))
        {
            $nombreImg= str_replace(" ", "-", $_FILES['ImagenGenero']['name']);
            $nombreImg2= htmlspecialchars($nombreImg, ENT_QUOTES, "UTF-8");

            $nombreDirectorio = "views/img/";
            $idUnico = $ID;
            $nombreFichero = $idUnico . "-" . $nombreImg;
            $nombreFichero2 = $idUnico . "-" . $nombreImg2;
            $directorio= $nombreDirectorio . $nombreFichero2;
            move_uploaded_file ($_FILES['ImagenGenero']['tmp_name'], $nombreDirectorio . $nombreFichero);
        }
        $sql = "UPDATE generos SET Imagen= '".$directorio."' WHERE IdGenero= '".$ID."'";
        $result = $this->db->query($sql);
    }

    public function ShowCategories() {
        $sql = "SELECT * FROM generos";
        $result = $this->db->query($sql);
        return $result;

    }

    public function MenuCategories() {
        $sql = "SELECT IdGenero,Nombre,Imagen FROM generos";
        $result = $this->db->query($sql);
        return $result;
    }
}

?>