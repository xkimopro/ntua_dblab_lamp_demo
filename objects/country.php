<?php
include_once 'database.php';


class Country
{
    private $conn;


    // City class constructor
    function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
      }


    // Read all countries
    public function readAllCountries() {
        $query = "SELECT * FROM `country`";
        $stmt = $this->conn->prepare($query);
        if ($stmt->execute())
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        // var_dump($stmt->errorInfo());
        return array();
    }
    
}
