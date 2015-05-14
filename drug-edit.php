<?php 
	session_start();
	$message = "" ;

	$con=mysqli_connect( "localhost", "root", "", "patient_counseling");

	$id = $_GET['id'];

	if (!empty($_POST['name']) ) { 

		$name = $_POST['name'];
		$brand = $_POST['brand'];
		$food = $_POST['food'];
		$sedation = $_POST['sedation'];
		$preg_lact = $_POST['preg_lact'];
		$maj_se = $_POST['maj_se'];
		$caution = $_POST['caution'];
		$bbw = $_POST['bbw'];
		$key_points = $_POST['key_points'];
		
		$query="UPDATE drugs SET drug_name='$name', drug_brand='$brand', food='$food', sedation='$sedation', preg_lact='$preg_lact', maj_se='$maj_se', caution='$caution', bbw='$bbw', key_points='$key_points' WHERE drug_id=$id"; 
		
		$result=mysqli_query($con, $query); 
		
		if($result) {
			$_SESSION['message'] = "Drug " . $name . " updated.";
			header('Location: drugs-list.php');
		}
		else {
			$message = "failure";
		}
	}

	$query = "SELECT * FROM drugs WHERE drug_id=$id"; 

	$result = mysqli_query($con, $query); 
	$rows = mysqli_fetch_assoc($result);
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
	<?php require_once 'navbar.php' ?>
	<div>
		<div class="container">
			<h5>New Drug</h5>
			<?php if($message === "failure") {?>
			<div class="note failure">
				<h6>Error editing drug.</h6>
			</div>
			<?php } else {?>
			<?php } ?>
		</div>
		<div class="row">
			<form class="col s12" action="drug-edit.php?id=<?php echo $id ?>" method="post" name="new-drug">
				<div class="input-field">
					<input type="text" name="name" value="<?php echo $rows['drug_name'] ?>">
					<label for="">Name</label>
				</div>

				<div class="input-field">
					<input type="text" name="brand" value="<?php echo $rows['drug_brand'] ?>">
					<label for="">Brand</label>
				</div>

				<div class="input-field">
					<input type="text" name="food" value="<?php echo $rows['food'] ?>">
					<label for="">Food</label>
				</div>

				<div class="input-field">
					<input type="text" name="sedation" value="<?php echo $rows['sedation'] ?>">
					<label for="">Sedation</label>
				</div>

				<div class="input-field">
					<input type="text" name="preg_lact" value="<?php echo $rows['preg_lact'] ?>">
					<label for="">Preg/Lact</label>
				</div>

				<div class="input-field">
					<input type="text" name="maj_se" value="<?php echo $rows['maj_se'] ?>">
					<label for="">Maj. SEs</label>
				</div>

				<div class="input-field">
					<input type="text" name="caution" value="<?php echo $rows['caution'] ?>">
					<label for="">Caution/Cont. Ind.</label>
				</div>

				<div class="input-field">
					<input type="text" name="bbw" value="<?php echo $rows['bbw'] ?>">
					<label for="">BBW</label>
				</div>

				<div class="input-field">
					<textarea name="key_points" class="materialize-textarea"><?php echo $rows['key_points'] ?></textarea>
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
