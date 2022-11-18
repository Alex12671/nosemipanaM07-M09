<?php
require_once("database.php");
class User extends Database {
    private $name;
    private $surname1;
    private $surname2;
    private $passwd;
    private $dni;
    private $email;
    private $tlf;
    private $calle;
    private $numero;
    private $cp;
    private $piso;
    private $ciudad;
    private $provincia;

    

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of surname1
     */ 
    public function getSurname1()
    {
        return $this->surname1;
    }

    /**
     * Set the value of surname1
     *
     * @return  self
     */ 
    public function setSurname1($surname1)
    {
        $this->surname1 = $surname1;

        return $this;
    }

    /**
     * Get the value of surname2
     */ 
    public function getSurname2()
    {
        return $this->surname2;
    }

    /**
     * Set the value of surname2
     *
     * @return  self
     */ 
    public function setSurname2($surname2)
    {
        $this->surname2 = $surname2;

        return $this;
    }

    /**
     * Get the value of passwd
     */ 
    public function getPasswd()
    {
        return $this->passwd;
    }

    /**
     * Set the value of passwd
     *
     * @return  self
     */ 
    public function setPasswd($passwd)
    {
        $this->passwd = $passwd;

        return $this;
    }

    /**
     * Get the value of dni
     */ 
    public function getDni()
    {
        return $this->dni;
    }

    /**
     * Set the value of dni
     *
     * @return  self
     */ 
    public function setDni($dni)
    {
        $this->dni = $dni;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of tlf
     */ 
    public function getTlf()
    {
        return $this->tlf;
    }

    /**
     * Set the value of tlf
     *
     * @return  self
     */ 
    public function setTlf($tlf)
    {
        $this->tlf = $tlf;

        return $this;
    }

    /**
     * Get the value of calle
     */ 
    public function getCalle()
    {
        return $this->calle;
    }

    /**
     * Set the value of calle
     *
     * @return  self
     */ 
    public function setCalle($calle)
    {
        $this->calle = $calle;

        return $this;
    }

    /**
     * Get the value of numero
     */ 
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Set the value of numero
     *
     * @return  self
     */ 
    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }

    /**
     * Get the value of cp
     */ 
    public function getCp()
    {
        return $this->cp;
    }

    /**
     * Set the value of cp
     *
     * @return  self
     */ 
    public function setCp($cp)
    {
        $this->cp = $cp;

        return $this;
    }

    /**
     * Get the value of piso
     */ 
    public function getPiso()
    {
        return $this->piso;
    }

    /**
     * Set the value of piso
     *
     * @return  self
     */ 
    public function setPiso($piso)
    {
        $this->piso = $piso;

        return $this;
    }

    /**
     * Get the value of ciudad
     */ 
    public function getCiudad()
    {
        return $this->ciudad;
    }

    /**
     * Set the value of ciudad
     *
     * @return  self
     */ 
    public function setCiudad($ciudad)
    {
        $this->ciudad = $ciudad;

        return $this;
    }

    /**
     * Get the value of provincia
     */ 
    public function getProvincia()
    {
        return $this->provincia;
    }

    /**
     * Set the value of provincia
     *
     * @return  self
     */ 
    public function setProvincia($provincia)
    {
        $this->provincia = $provincia;

        return $this;
    }

    public function RegisterClient($name,$surname1,$surname2,$passwd,$dni,$email,$tlf,$calle,$numero,$cp,$piso,$ciudad,$provincia) {
        $sql = "INSERT INTO  clientes
        VALUES (DEFAULT,'".md5($passwd)."', '".$name."', '".$surname1."', '".$surname2."', '".$dni."', '".$email."', '".$tlf."', '".$calle."', '".$numero."', '".$cp."', '".$piso."','".$ciudad."','".$provincia."','1') ";
        $result = $this->db->query($sql);
        $rows = $result->rowCount();
        return $rows;
    }

    public function validateUser($username, $password){
        $sql = "SELECT * FROM clientes where Nombre='$username' and Password= '".md5($password)."'";
        $result = $this->db->query($sql);
        $rows = $result->rowCount();
        if($rows == 1) {
            return true;
        }
        else {
            return false;
        }
        
    }
}
?>