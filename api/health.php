<?php
header('Content-Type: application/json');

include_once '../objects/database.php';
$db = new Database();
$conn = $db->getConnection();
if (is_string($conn)) {
    // Non-zero code means error 
    // If getConnection returns a string that string is the error message 
    $resp = [
        'error_code' => 1 ,
        'message' => $conn

    ];
}
else {
    // Zero code means no error
    $resp = [
        'error_code' => 0 ,
        'message' => 'Database is healthy'

    ];
}
// Here resp is a PHP associative array , 
// it holds key value pairs and it can be encoded into JSON and echoed out with the command below
// Open your browser and go to http://localhost/ntua_dblab_lamp_demo/api/health.php and test your database health first  
echo json_encode($resp, JSON_PRETTY_PRINT);
