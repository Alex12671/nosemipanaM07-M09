<?php
require_once("database.php");
class Admin extends Database {
    private $nombre;
    private $email;
    private $password;
    protected $rows;

    function getNombre() {
        return $this->nombre;
    }

    function getEmail() {
        return $this->email;
    }

    function getPassword() {
        return $this->password;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }
    function setEmail($email) {
        $this->email = $email;
    }

    function setPassword($password) {
        $this->password = $password;
    }
    
    function validar($nombre, $password){
        $passwordEncriptada = md5($password);
        $sql = "SELECT * FROM admin where Nombre='$nombre' and Password= '$passwordEncriptada'";
        echo "$sql";
        $rows = $this->db->query($sql);
        $numeroEntradas = $rows->rowCount();
        echo $numeroEntradas;
        session_start();
        if ($rows !=0) {
            $_SESSION["Administrador"]= $nombre;
        }
        return $rows;
    }
}

?>