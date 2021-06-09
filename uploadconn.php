<?php

class Db
{
    public $servername;
    public $database;
    public $dbname;
    public $username;
    public $password;
    
    //para online
    // public function __construct()
    // {
    //     $this->servername = "localhost";
    //     $this->database = "mysql";
    //     $this->dbname = "id12726689_agriapp";
    //     $this->username = "id12726689_adminpedro";
    //     $this->password = "root2020@ESCO";
    // }

    //para localhost
    public function __construct()
    {
        $this->servername = "localhost";
        $this->database = "mysql";
        $this->dbname = "id12726689_agriapp";
        $this->username = "root"; 
        $this->password = "";
        $this->port=8012;
    }

    

    /* public function getmySQLIConnection()
    {
        $servername=$this->servername;
        $dbname=$this->dbname;
        $username=$this->username;
        $password=$this->password;
        $port=$this->port;

        $conn = mysqli_connect($servername,$username,$password,$dbname,$port) or die('Conexão falhou, erro: '.mysqli_connect_error());
        return $conn;
    } */

    public function connect()
    {
        try {
            $database=$this->database;
            $servername=$this->servername;
        $dbname=$this->dbname;
        $username=$this->username;
        $password=$this->password;
            // Create connection
            $bdh = new PDO($this->database . ':host=' . $this->servername . ';dbname=' . $this->dbname, $this->username, $this->password);
            $bdh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $bdh;
        } catch (PDOException $e) {

            die("Conexão Falhada: " . $e->getMessage());
        }
    }
}
