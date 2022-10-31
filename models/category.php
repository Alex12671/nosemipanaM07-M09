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
        $cont= 0;
        echo "<table cellspacing = 0>";
        while ($array = $result->fetchAll(PDO::FETCH_ASSOC)) {
            foreach($array as $data) {
                echo "<tr>";
                foreach($data as $field_name => $value) {
                    echo "<td>$value</td>";
                }
                echo "<td><a href= 'index.php?controller=category&action=ShowEditCategoryForm&id=".$data['IdGenero']."&name=".$data['Nombre']."'> Editar Genero </a></td>";
                if($data['Activo']==1){
                    echo "<td><a href= 'index.php?controller=category&action=Desactivate&id=".$data['IdGenero']."'> Desactivar </a></td>"; 
                }else{
                    echo "<td><a href= 'index.php?controller=category&action=Activate&id=".$data['IdGenero']."'> Activar </a></td>"; 
                }
                echo "</tr>";
                $cont+= 1;
            }
        }
        echo "</table>";
    }
}

?>