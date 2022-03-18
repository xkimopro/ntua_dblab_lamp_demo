<?php
include_once 'database.php';


class City
{
    private $conn;


    // City class constructor
    function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
      }


    // Read all cities
    public function readAllCities() {
        $query = "SELECT * FROM `city`";
        $stmt = $this->conn->prepare($query);
        if ($stmt->execute())
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        // var_dump($stmt->errorInfo());
        return array();
    }


    // Read all cities of a specific country given its country code
    public function readCitiesOfCountryCode($country_code){

        // This is how we bind parameters to queries
        $query = "SELECT * FROM `city` WHERE CountryCode = :code_param";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':code_param', $country_code);
        if ($stmt->execute())
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        // var_dump($stmt->errorInfo());
        return array();
        
    }
    
}
