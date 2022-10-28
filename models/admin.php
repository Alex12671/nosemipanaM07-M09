<?php
require_once("database.php");
class Admin extends Database {
    private   $username;
    private   $email;
    private   $password;
    protected $rows;

    function getNombre() {
        return $this->username;
    }

    function getEmail() {
        return $this->email;
    }

    function getPassword() {
        return $this->password;
    }

    function setUsername($username) {
        $this->username = $username;
    }
    function setEmail($email) {
        $this->email = $email;
    }

    function setPassword($password) {
        $this->password = $password;
    }
    
    function validateAdmin($username, $password){
        $sql = "SELECT * FROM admin where Nombre='$username' and Password= '".md5($password)."'";
        $result = $this->db->query($sql);
        $rows = $result->rowCount();
        if ($rows == 1) {
            $_SESSION["Administrador"]= $username;
            return true;
        }
        else {
            return false;
        }
    }
}

?>