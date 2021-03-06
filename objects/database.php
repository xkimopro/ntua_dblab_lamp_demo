<?php
class Database
{

    // specify your own database credentials
    private $host = "localhost";

    // Localhost
    private $db_name = "world_x";
    private $username = "root";
    private $password = "";


    public $conn;

    // get the database connection
    public function getConnection()
    {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password, array(PDO::MYSQL_ATTR_FOUND_ROWS => true));
            $this->conn->exec("set names utf8");
        } catch (PDOException $exception) {
            return "Connection error: " . $exception->getMessage();
        }
        return $this->conn;
    }
}
