<?php 
	$message = "" ;

	if (!empty($_POST[ 'name']) ) { 
		$con=mysqli_connect( "localhost", "root", "", "patient_counseling"); 

		$name = $_POST['name'];
		$brand = $_POST['brand'];
		$food = $_POST['food'];
		$sedation = $_POST['sedation'];
		$preg_lact = $_POST['preg_lact'];
		$maj_se = $_POST['maj_se'];
		$caution = $_POST['caution'];
		$bbw = $_POST['bbw'];
		$key_points = $_POST['key_points'];
		
		$query=" INSERT INTO drugs VALUES ('', '$name', '$brand', '$food', '$sedation', '$preg_lact', '$maj_se', '$caution', '$bbw', '$key_points') "; 
		
		$result=mysqli_query($con, $query); 
		
		if($result) {
			$message = "Drug " . $name . " added into database.";
		}
		else {
			$message = "Error while submitting new drug.";
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
	<div style="padding-left: 20px;">
		<h5>New Drug</h5>
		<h6><?php echo $message ?></h6>
		<div class="row">
			<form class="col s12" action="drugs.php" method="post" name="new-drug">
				<div class="input-field">
					<input type="text" name="name">
					<label for="">Name</label>
				</div>

				<div class="input-field">
					<input type="text" name="brand">
					<label for="">Brand</label>
				</div>

				<div class="input-field">
					<input type="text" name="food">
					<label for="">Food</label>
				</div>

				<div class="input-field">
					<input type="text" name="sedation">
					<label for="">Sedation</label>
				</div>

				<div class="input-field">
					<input type="text" name="preg_lact">
					<label for="">Preg/Lact</label>
				</div>

				<div class="input-field">
					<input type="text" name="maj_se">
					<label for="">Maj. SEs</label>
				</div>

				<div class="input-field">
					<input type="text" name="caution">
					<label for="">Caution/Cont. Ind.</label>
				</div>

				<div class="input-field">
					<input type="text" name="bbw">
					<label for="">BBW</label>
				</div>

				<div class="input-field">
					<textarea name="key_points" class="materialize-textarea"></textarea>
					<label for="">Key Counseling Points</label>
				</div>

				<button class="btn waves-effect waves-light" style="margin: 20px auto; display: block; width: 200px" type="submit" name="action">Submit
					<i class="mdi-content-send right"></i>
				</button>
			</form>
		</div>
	</div>
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="materialize/js/materialize.js"></script>
</body>

</html>
