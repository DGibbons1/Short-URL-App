<?php

// Include dbCOnnect php file to allow connection to database
include("../config/dbConnect.php");

$slug = $_GET["short_url"];
// Build SQL Query String
$sql = "SELECT base_url FROM resource_list WHERE short_url = '" .$slug."'";
			
//Perform Database Query
$result = mysqli_query($connection, $sql);

// Variable to store base URL retreived from DB
$res = "";

if (mysqli_num_rows($result) > 0) {
    $rows = array();
    while ($row = mysqli_fetch_assoc($result)) {

        $rows[] = $row;
    }

    echo json_encode($rows);
} else {
    http_response_code(404);
}

mysqli_free_result($result); 	//Release returned data 
mysqli_close($connection); 		//Close database connection	

?>

