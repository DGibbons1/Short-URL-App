<?php	

//Localhost DB Connection
$dbhost = "localhost";
$dbuser = "root";
$dbpassword = "";
$dbname = "shorturldb";

//Create a connection to the database	
$connection = mysqli_connect($dbhost,$dbuser,$dbpassword,$dbname);
		
//Test if connection occoured
if(mysqli_connect_errno()){
	return http_response_code(400);
	die("DB connection failed: " .
		mysqli_connect_error() .
			" (" . mysqli_connect_errno() . ")"
			);
}

if (!$connection){
	return http_response_code(400);
	die('Could not connect: ' . mysqli_error());
}

?>
