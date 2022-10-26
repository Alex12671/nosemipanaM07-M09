<?php

public class Connection {
    protected $db;

    public function __construct() {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "lostrestenores";

        try{
            $this->db = new PDO("mysql:host=$servername;dbname=$dbname",$username, $password);
            $this ->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch(PDOException $error) {
            echo "Connection failed: " . $error->getMessage();
        }
        $conn=null;
    }
    
}

?>