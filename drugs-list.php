<?php 
session_start();
if(isset($_SESSION['message'])) {
	$message = $_SESSION['message'] ;
}
else {
	$message = "";
}


$con = mysqli_connect( "localhost", "root", "", "patient_counseling"); 

$query = "SELECT * FROM drugs"; 

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
			<h5>Drugs List</h5>
			<?php if($message !== "") {?>
			<div class="note success">
				<h6><?php echo $message ?></h6>
			</div>
			<?php } ?>
			
		</div>
		<div class="container">
			<ul class="collection">
			<?php $i = 0; do{ $i++ ?>
				<li class="collection-item">
					<div>
						<?php echo $i . " - " . $rows['drug_brand'] . " (" . $rows['drug_name'] . ")";  ?>
						<a href="drug-delete.php?id=<?php echo $rows['drug_id'] ?>" class="secondary-content action-delete">
							<i class="mdi-action-delete"></i>
						</a>
						<a href="drug-edit.php?id=<?php echo $rows['drug_id'] ?>" class="secondary-content">
							<i class="mdi-editor-mode-edit"></i>
						</a>
					</div>
				</li>
			<?php } while ($rows = mysqli_fetch_assoc($result) ) ?>
			</ul>
		</div>
	</div>
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="materialize/js/materialize.js"></script>
</body>

</html>
