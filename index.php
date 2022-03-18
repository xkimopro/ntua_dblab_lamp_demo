<?php

# This is how we fetch data while running on the server to render our HTML page using PHP
# Here the server and the client live on the same physical host --> localhost


# Setting the API Base URL where all the endpoints live
$API_URL = 'http://localhost/ntua_dblab_lamp_demo/api/';

# Configuring our request
$options = ['http' =>  ['method'  => 'GET']];
$context  = stream_context_create($options);
$response = file_get_contents( $API_URL . 'readAllCountries.php', false, $context);

# Decoding the response string into a usable PHP associative array
$decoded = json_decode($response, true);
if ($decoded['error_code'] != 0){
    echo $decoded['message'];
}
else {
    $countries = $decoded['data'];
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demo</title>


    <!-- Import bootstrap css and javascript a CDN-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <!-- Import bootstrap css and javascript throught a CDN-->

    <!-- Import JQuery using a CDN-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Import JQuery using a CDN-->


    <!-- Import this page's custom CSS stylesheet -->
    <link rel="stylesheet" href="./styles.css" >
    <!-- Import this page's custom CSS stylesheet -->

</head>

<body>
    <h1></h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Code</th>
                <th scope="col">Name</th>
                <th scope="col">Code2</th>
            </tr>
        </thead>
        <tbody>

        <div class='header-container'>
            <h1> Countries </h1>
        </div>
        
        <?php
        // Open php tags again to render the table rows
        // Double quotes enable string interpolation that results in cleaner code
        // Rows is a string that holds all of our html code containing the rows that will be echoed out
        $rows = "";
        foreach ($countries as $country){
            $code = $country['Code'];
            $name = $country['Name'];
            $code2 = $country['Code2'];
            $row = 
            "<tr class='country-rows' id=$code>" .
            "<td>$code</td>" .
            "<td>$name</td>" .  
            "<td>$code2</td>" .  
            "</tr>";
            $rows .= $row;
        }
        echo $rows;



        ?>



        </tbody>
    </table>

</body>

<script>
    $('.country-rows').click(function (event) {
        let serve_directory = "http://localhost/ntua_dblab_lamp_demo"

        let country_code = event.target.parentElement.id;
        console.log(country_code);
        event.preventDefault();    
        window.open("countrys_cities.php?country_code=" + country_code, '_blank');
    


    });
</script>


</html>