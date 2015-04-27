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
			
		    $sql = "SELECT id FROM user WHERE username='".$_POST['username']."' AND password='".$_POST['password']."'";

			$result = mysqli_query($conn, $sql);
	
			if (mysqli_num_rows($result) == 1) {
				while($row = mysqli_fetch_assoc($result)) {
					$_SESSION["userId"] = $row["id"];
					$_SESSION["username"] = $_POST['username'];
					$_SESSION["userFirstName"] = $row['firstName'];
					$_SESSION["userLastName"] = $row['lastName'];
	
					header("Location: /");
				}
			}
			
		} else {
		    echo "<script> alert('Error: Could not create account at this time. Please try again!'); </script>";
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
			<input type="text" class="form-control" name="firstName" pattern="[a-zA-Z]+" title="Names must only contain letters and be at least one character long."><br>
			<label>Last Name</label>
			<input type="text" class="form-control" name="lastName" pattern="[a-zA-Z]+" title="Names must only contain letters and be at least one character long."><br>
			<label>Username</label>
			<input type="text" class="form-control" name="username" pattern="[a-zA-Z0-9]+" title="Usernames must only contain letters and numbers and be at least one character long." ><br>
			<label>Email Address</label>
			<input type="email" class="form-control" name="email"><br>
			<label>Password</label>
			<input type="password" class="form-control" name="password" pattern="[a-zA-Z0-9]{6,}" title="Passwords must be at least 6 characters long and contain only numbers and letters."><br>
			<input name="submitted" value="1" hidden>
			<input type="submit" class="btn btn-primary btn-lg" value="Signup"><br><br>
			<p>Already Have an account? <a href="login.php">Login Here</a></p>
		</div>
	</div>
</form>



<!-- Include the page footer -->
<?php require_once('templates/footer.php'); ?>