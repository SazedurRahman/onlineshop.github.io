<!DOCTYPE html>
<html>
<head>
	<title>Form</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

	<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbNmae = "paymentform";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbNmae);

	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 
	?>
</head>
<body class="big_div">
	<section class="container">
		<div class="row justify-content-center">
			<div class="col-md-6 midel_div m-4 p-3 rounded">
				<h1 class="text-center">Payment form</h1>
				<?php
					if(isset($_POST['submit'])){
						$title = $_POST['title'];
						$name = $_POST['name'];
						$email = $_POST['email'];
						$password = $_POST['password'];
						$usercard = $_POST['usercard'];
						$cardNumber = $_POST['cardNumber'];
						$ExpirationDate = $_POST['ExpirationDate'];
						if($title=="" || $name=="" || $email=="" || $password=="" || $usercard=="" || $cardNumber=="" || $ExpirationDate==""){
							echo "<script>alert('Insert the form correctly');</script>";
						}else{
							$sql = "INSERT INTO paymentinfo (title, name, email, password, cardtype, cardnumber, expirationdate) VALUES ('$title', '$name', '$email', '$password', '$usercard', '$cardNumber', '$ExpirationDate')";

							if ($conn->query($sql) === TRUE) {
							    echo "<script>alert('New record created successfully');</script>";
							} else {
							    echo "Error: " . $sql . "<br>" . $conn->error;
							}
						}
					}
				 ?>
				<form action="index.php" method="post">
					<h5>Contact information:</h5>
					<fieldset class="form-group border border-3 row justify-content-between p-2 m-3">
						<legend class="col-form-legend col-md-2">Title</legend>
						<div class="col-md-10">
							<div class="form-check form-check-inline">
							  <input class="form-check-input" type="radio" name="title" id="mister" value="mister">
							  <label class="form-check-label" for="mister">Mister</label>
							</div>
							<div class="form-check form-check-inline">
							  <input class="form-check-input" type="radio" name="title" id="miss" value="miss">
							  <label class="form-check-label" for="miss">Miss</label>
							</div>
						</div>
					</fieldset>

					<div class="form-group m-0 p-0">
						<label for="name" class="m-0 pb-0 pt-1">Name:</label>
						<input type="text" class="form-control" id="name" name="name">
					</div>

					<div class="form-group m-0 p-0">
						<label for="email" class="m-0 pb-0 pt-1">Email:</label>
						<input type="email" class="form-control" id="email" name="email">
					</div>

					<div class="form-group m-0 p-0">
						<label for="password" class="m-0 pb-0 pt-1">Password:</label>
						<input type="password" class="form-control" id="password" name="password">
					</div>
					<h5 class="m-0 pb-0 pt-4">Payment information:</h5>
					<div class="form-group m-0 p-0">
						<label for="cardtype" class="m-0 pb-0 pt-1">Card Type:</label>
						<select class="form-control" id="cardtype" name="usercard">
							<option value="">--Select--</option>
							<option value="visa">Visa</option>
                			<option value="mastercard">Mastercard</option>
                			<option value="American Express">American Express</option>
							<option value="UnionPay">UnionPay</option>
						</select>
					</div>

					<div class="form-group m-0 p-0">
						<label for="cardNumber" class="m-0 pb-0 pt-1">Card Number:</label>
						<input type="number" class="form-control" id="cardNumber" name="cardNumber">
					</div>

					<div class="form-group m-0 p-0">
						<label for="ExpirationDate" class="m-0 pb-0 pt-1">Expiration date:</label>
						<input type="date" class="form-control" id="ExpirationDate" name="ExpirationDate">
					</div>
					<button type="submit" class="btn btn-primary float-right m-2" name="submit">Submit</button>
				</form>
			</div>
		</div>
	</section>
</body>
</html>