<?php session_start(); 

	if (isset($_POST["submitted"])) {
		//connect to database
		require_once('scripts/dbConn.php');

		$sql = "SELECT id, firstName, lastName, isAdmin FROM user WHERE username='".$_POST['username']."' AND password='".$_POST['password']."'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) == 1) {
		    while($row = mysqli_fetch_assoc($result)) {
		        $_SESSION["userId"] = $row["id"];
		        $_SESSION["username"] = $_POST['username'];
		        $_SESSION["userFirstName"] = $row['firstName'];
		        $_SESSION["userLastName"] = $row['lastName'];
		        $_SESSION["isAdmin"] = $row['isAdmin'];

		        header("Location: /tickets-and-queues.php");
		    }
		} else {
		    $loginFailed = 1;
		}

		mysqli_close($conn);

	}

?>
<!--Include the page header -->
<?php require_once('templates/header2.php'); ?>

<!-- Content of page goes here -->

<ol class="breadcrumb">
  <li><a href="index.php">Home</a></li>
  <li class="active">Login</li>
</ol>

<form action="" method="POST">
	<div class="row">
		<div class="col-sm-6 col-sm-offset-3">
			<h2><span class="glyphicon glyphicon-lock" aria-hidden="true"></span> Login</h2>
			<hr>
			<br>
			<?php if($loginFailed == 1): ?>
				<div class="alert alert-danger" role="alert"><strong><span class="glyphicon glyphicon-alert" aria-hidden="true"></span> Unable to Login!</strong> Username or Password invalid!</div>
			<?php endif; ?>
			<br>
			<label>Username</label>
			<input type="text" class="form-control" name="username"><br>
			<label>Password</label>
			<input type="password" class="form-control" name="password"><br>
			<input name="submitted" value="1" hidden>
			<input type="submit" class="btn btn-primary btn-lg" value="Login"><br><br>
			<p>Don't Have an account? <a href="signup.php">Signup Here</a></p>
		</div>
	</div>
</form>



<!-- Include the page footer -->
<?php require_once('templates/footer.php'); ?>