<?php

// Include dbCOnnect php file to allow connection to database
include("../config/dbConnect.php");

// Get data from http request
$baseURL = $_GET["base_url"];
// Placeholder code for short URL value
$shortURL = "TempShortUrl";

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

?>

