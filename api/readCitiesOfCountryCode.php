<?php
header('Content-Type: application/json');
error_reporting(E_ALL ^ E_NOTICE);  

include_once '../objects/city.php'; 

$country_code = $_GET['country_code'] ?? null;
if (!$country_code){
    $resp = [
        'error_code' => 1,
        'message' => "No country code parameter provided!",
    ];
    echo json_encode($resp, JSON_PRETTY_PRINT);
    exit();
}



$city = new City();
$cities = $city->readCitiesOfCountryCode($country_code);
if (!empty($cities)){
    $resp = [
        'error_code' => 0,
        'message' => "Data fetched successfully",
        'data' => $cities 
    ];
}
else {
    $resp = [
        'error_code' => 1,
        'message' => "Could not fetch any data. Uncomment the line that says //var_dump($stmt->errorInfo()); inside the City object for more info",
    ];
}
echo json_encode($resp, JSON_PRETTY_PRINT);



