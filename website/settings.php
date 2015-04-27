<?php session_start(); ?>

<!--Include the page header -->
<?php require_once('templates/header2.php'); ?>

<!-- Content of page goes here -->
<?php
	if (isset($_POST["submitted"])) {
		//connect to database
		require_once('scripts/dbConn.php');

		$sql = "UPDATE user SET username='".$_POST['username']."', firstName='".$_POST['firstName']."', lastName='".$_POST['lastName']."' WHERE id=".$_SESSION["userId"];
		
		echo $sql;

		if (mysqli_query($conn, $sql)) {
			$_SESSION["username"] = $_POST['username'];
			$_SESSION["userFirstName"] = $_POST['firstName'];
			$_SESSION["userLastName"] = $_POST['lastName'];
			$updated=1;
		} else {
		    echo "<script> alert('Error: Could not create account at this time. Please try again!'); </script>";
		}

		mysqli_close($conn);

	}
?>
<ol class="breadcrumb">
  <li><a href="index.php">Home</a></li>
  <li class="active">Settings</li>
</ol>

<?php if($updated == 1): ?>
	<div class="alert alert-success" role="alert"><span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span> Your account has been successfully updated!</div>
<?php endif; ?>

<form action="" method="POST">
	<div class="row">
		<div class="col-sm-6 col-sm-offset-3">
			<h2>Settings</h2>
			<hr><br><br>
			<label>First Name</label>
			<input type="text" value="<?php echo $_SESSION["userFirstName"]; ?>" class="form-control" name="firstName" pattern="[a-zA-Z]+" title="Names must only contain letters and be at least one character long."><br>
			<label>Last Name</label>
			<input type="text" value="<?php echo $_SESSION["userLastName"]; ?>" class="form-control" name="lastName" pattern="[a-zA-Z]+" title="Names must only contain letters and be at least one character long."><br>
			<label>Username</label>
			<input type="text" value="<?php echo $_SESSION["username"]; ?>" class="form-control" name="username" pattern="[a-zA-Z0-9]+" title="Usernames must only contain letters and numbers and be at least one character long." ><br>
			
			<input name="submitted" value="1" hidden>
			<input type="submit" class="btn btn-primary btn-lg" value="Update Settings"><br><br>
		</div>
	</div>
</form>



<!-- Include the page footer -->
<?php require_once('templates/footer.php'); ?>