<?php

// Include dbCOnnect php file to allow connection to database
include("../config/dbConnect.php");

// Base String for Short URL
$urlBase = "http://localhost/ShortUrlApp/api/redirect.php/";

// Get data from http request
$baseURL = $_GET["base_url"];
// Placeholder code for short URL value
$shortURL = generateShortURL();

// SQL Query to insert new value to DB
$sql = "INSERT INTO resource_list (base_url, short_url) VALUES ('{$baseURL}', '{$shortURL}')";

// Attempt to query the DB
if($connection->multi_query($sql)){
	http_response_code(201);
} else{
	http_response_code(422);
}

// Close the connection to the DB after executing query
$connection->close();

// Return the Short URL value that has been generated
echo "{\"shortURL\" : \"" .$urlBase.$shortURL."\"}";

function generateShortURL($length = 10) {
    $chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $arrLength = strlen($chars);
    $shortUrlString = "";
    for ($i = 0; $i < $length; $i++) {
        $shortUrlString .= $chars[rand(0, $arrLength - 1)];
    }
    return $shortUrlString;
}

?>

