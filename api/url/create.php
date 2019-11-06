<?php

// Include the php file to allow connection to the database
include("../config/dbConnect.php");

// Get request data
$postdata = file_get_contents("php://input");

// Confirm that data was received with the request
if(isset($postdata) && !empty($postdata)){

	// Extract the request data.
	$request = json_decode($postdata);

	// Validate request data
	if(trim($request->base_url) === '' || $request->base_url = null){
		return http_response_code(400);
	}

    // Set the baseURL variable
    $baseURL = $request->base_url;
    
    // Generate a unique value for short URL
    $shortURL = "temp1234";

    // Build SQL statement with url input
	$sql = "INSERT INTO resource_list (base_url, short_url) VALUES ('{$baseURL}', '{$shortURL}')";

    // Attempt to add new entry to database
	if($connection->multi_query($sql)){
		http_response_code(201);
	}else{
		http_response_code(422);
	}

	$stmt->close();
	$connection->close();

}else{
	return http_response_code(400);
}

?>
