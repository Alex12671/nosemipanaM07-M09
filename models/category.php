<?php
require_once("database.php");

class Category extends Database {
    private $name;
    private $ID;

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

    function AddCategory($ID, $name){
        $sql = "INSERT INTO  generos (IdGenero, Nombre) VALUES ( '".$ID."', '".$name."') ";
        $result = $this->db->query($sql);
        $rows = $result->rowCount();
    }

    function EditCategory($ID, $name){
        $sql = "UPDATE generos SET IdGenero= '".$ID."', Nombre= '".$name."' WHERE IdGenero= '".$ID."'";
        $result = $this->db->query($sql);
    }

    function ShowCategories() {
        $sql = "SELECT * FROM generos";
        $result = $this->db->query($sql);
        return $result;
    }
}

?>