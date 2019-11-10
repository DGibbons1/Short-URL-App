<?php

// Include dbCOnnect php file to allow connection to database
include("./config/dbConnect.php");

// Get ShortUrl from URL
$shortArr = explode('/', getenv('REQUEST_URI'));
$location = count($shortArr) - 1;
$shortURL = $shortArr[$location];

// Build SQL Query String
$sql = "SELECT base_url FROM resource_list WHERE short_url = '" . $shortURL ."'";
			
//Perform Database Query
$result = mysqli_query($connection, $sql);

// Variable to store base URL retreived from DB
$res = "";

if (mysqli_num_rows($result) > 0) {
    $rows = array();
    while ($row = mysqli_fetch_assoc($result)) {

        $rows[] = $row;
    }

    $res = json_encode($rows);
    $res = json_decode($res);
} else {
    http_response_code(404);
}

mysqli_free_result($result); 	//Release returned data 
mysqli_close($connection); 		//Close database connection	

// Redirect browser window to base URL
header("Location: http://" . $res[0]->base_url); 
exit();

?>

