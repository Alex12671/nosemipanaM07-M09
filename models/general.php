<?php
require_once("database.php");
class General extends Database {

    public function mainMenu() {
        $sql = "SELECT * FROM generos";
        $result = $this->db->query($sql);
        return $result;
    }
}
?>