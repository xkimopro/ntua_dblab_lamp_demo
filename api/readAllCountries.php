<?php
header('Content-Type: application/json');

include_once '../objects/country.php'; 

$country = new Country();
$countries = $country->readAllCountries();
if (!empty($countries)){
    $resp = [
        'error_code' => 0,
        'message' => "Data fetched successfully",
        'data' => $countries 
    ];
}
else {
    $resp = [
        'error_code' => 1,
        'message' => "Could not fetch any data. Uncomment the line that says var_dump(\$stmt->errorInfo()); inside the Country object for more info",
    ];
}
echo json_encode($resp, JSON_PRETTY_PRINT);



