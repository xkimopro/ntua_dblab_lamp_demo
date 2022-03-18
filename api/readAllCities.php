<?php
header('Content-Type: application/json');

include_once '../objects/city.php'; 

$city = new City();
$cities = $city->readAllCities();
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



