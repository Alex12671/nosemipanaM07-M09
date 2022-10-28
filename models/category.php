<?php
require_once("database.php");

class Category extends Database {
    private $name;

    function getName() {
        return $this->name;
    }

    function setName($name) {
        $this->name = $name;
    }
    
    function getAllGenres(){
        $sql = "SELECT * FROM generos";
        $result = $this->db->query($sql);
        $rows = $result->rowCount();
        return $rows;
    }
}

?>