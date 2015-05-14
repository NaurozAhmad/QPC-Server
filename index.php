<?php 
$message = "";
if (isset($_POST['hidden']) && !empty($_POST['username'])) {
	$con = mysqli_connect("localhost", "root", "", "patient_counseling");
	$username = $_POST['username'];
	$password = $_POST['password'];
	$query = "SELECT * FROM users WHERE username='$username' AND password='$password' ";
	$result = mysqli_query($con, $query);
	$num_rows = mysqli_num_rows($result);
	if($num_rows > 0) {
		header('Location: drugs.php');
	}
	else {
		$message = "Username or Password is incorrect. Please try again.";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Admin Panel - Quick Patient Counseling</title>
	<link rel="stylesheet" type="text/css" href="materialize/css/materialize.css">
	<link rel="stylesheet" type="text/css" href="css/custom.css">
</head>
<body>
	<h1 id="drug-title">Quick Patient Counseling</h1>
	<div style="padding-left: 20px;">
		<h5>Enter Username and Password</h5>
		<h6><?php echo $message ?></h6>
		<div class="row">
			<form class="col s12" action="index.php" method="post" name="login">
				<div class="row">
					<div class="input-field col s12">
						<input id="username" type="text" class="validate" name="username">
						<label for="username">Username</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12">
						<input id="password" type="password" class="validate" name="password">
						<label for="password">Password</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field">
						<input type="submit" value="Submit" class="btn" name="submit">
						<input type="hidden" value="hidden" name="hidden">
					</div>	
				</div>

			</form>
		</div>
	</div>

	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="materialize/js/materialize.js"></script>
</body>
</html>