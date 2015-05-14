<?php 
	header("Access-Control-Allow-Origin: *"); 
	$con = mysqli_connect("localhost", "root", "", "patient_counseling");

	$query = "SELECT * FROM drugs"; 
	$result = mysqli_query($con, $query);  
	echo json_encode(mysqli_fetch_assoc($result)); 
 ?>