<?php 
	session_start();
	$con=mysqli_connect( "localhost", "root", "", "patient_counseling");

	$id = $_GET['id'];

	$query = "DELETE FROM drugs WHERE drug_id=$id";
	$result = mysqli_query($con, $query);

	if($result) {
		header('Location: drugs-list.php');
		$_SESSION['message'] = "Drug deleted.";
	}

 ?>