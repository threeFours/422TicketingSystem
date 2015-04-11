<?php session_start(); ?>

<!--Include the page header -->
<?php require_once('templates/header2.php'); ?>

<!-- Content of page goes here -->
<?php
	if (isset($_POST["submitted"])) {
		//connect to database
		require_once('scripts/dbConn.php');

		$sql = "INSERT INTO user(username, email, password, firstName, lastName) VALUES ('".$_POST['username']."', '".$_POST['email']."', '".$_POST['password']."', '".$_POST['firstName']."', '".$_POST['lastName']."')";

		if (mysqli_query($conn, $sql)) {
		    echo "New record created successfully";
		} else {
		    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}

		$sql = "SELECT id FROM user WHERE username='".$_POST['username']."' AND password='".$_POST['password']."'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) == 1) {
		    while($row = mysqli_fetch_assoc($result)) {
		        $_SESSION["userId"] = $row["id"];
		        $_SESSION["username"] = $_POST['username'];

		        header("Location: /");
		    }
		}

		mysqli_close($conn);

	}
?>
<ol class="breadcrumb">
  <li><a href="index.php">Home</a></li>
  <li class="active">Signup</li>
</ol>

<form action="" method="POST">
	<div class="row">
		<div class="col-sm-6 col-sm-offset-3">
			<h2>Signup</h2>
			<hr><br><br>
			<label>First Name</label>
			<input type="text" class="form-control" name="firstName"><br>
			<label>Last Name</label>
			<input type="text" class="form-control" name="lastName"><br>
			<label>Username</label>
			<input type="text" class="form-control" name="username"><br>
			<label>Email Address</label>
			<input type="text" class="form-control" name="email"><br>
			<label>Password</label>
			<input type="password" class="form-control" name="password"><br>
			<input name="submitted" value="1" hidden>
			<input type="submit" class="btn btn-primary btn-lg" value="Signup"><br><br>
			<p>Already Have an account? <a href="login.php">Login Here</a></p>
		</div>
	</div>
</form>



<!-- Include the page footer -->
<?php require_once('templates/footer.php'); ?>