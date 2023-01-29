<?php 

class Database {
    private $hostname = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "db_perpustakaan";

    protected $db;

    public function __construct(){
        $this->db = mysqli_connect($this->hostname, $this->username, $this->password, $this->database);

    }
}

?>