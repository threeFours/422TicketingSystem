<?php session_start(); 
	
	require_once("scripts/requireLogin.php");

	if(!$_SESSION['isAdmin'] == 1){
	    header("Location:/");
	}

?>

<!--Include the page header -->
<?php require_once('templates/header2.php'); ?>

<!-- Content of page goes here -->
<ol class="breadcrumb">
  <li>Home</li>	
  <li class="active">Admin</li>
</ol>

<?php

	//connect to database
	require_once('scripts/dbConn.php');

		if (isset($_POST['newQueue'])) {
			$sql = "INSERT INTO queue (name) VALUES ('".$_POST['newQueue']."')";
			echo $sql;
			$result = mysqli_query($conn, $sql);
		}


		// get all queues
		$sql2 = "SELECT * FROM queue";

		$result = mysqli_query($conn, $sql2);

		$queueList = "";

		if (mysqli_num_rows($result) > 0) {
		    while($row = mysqli_fetch_assoc($result)) {
		        $queueList .= "<li class='list-group-item'><h4 class='list-group-item-heading'>".$row['name']." 
		        <a href='scripts/deleteQueue.php?queue=".$row['id']."'><span class='glyphicon glyphicon-remove-circle pull-right' aria-hidden='true'></span></a>
		        </h4></li>";
		    }
		}

		// get all users

		$sql = "SELECT id, firstName, lastName, username, isAdmin FROM user";
		$result = mysqli_query($conn, $sql);

		$userTable = "";

		if (mysqli_num_rows($result) > 0) {
		    while($row = mysqli_fetch_assoc($result)) {

		    	$checked = "unchecked";

		    	if ($row['isAdmin'] == 1) {
		    		$checked = "check";
		    	}

		    	$userTable .= "<tr>
					<td>".$row['firstName']." ".$row['lastName']."</td>
					<td>@".$row['username']."</td>
					<td><a href='scripts/updateAdmin.php?id=".$row['id']."&status=".$row['isAdmin']."'><span class='glyphicon glyphicon-".$checked."' aria-hidden='true'></span></a></td>
					<td><a href='scripts/deleteUser.php?id=".$row['id']."'><span class='glyphicon glyphicon-remove-circle pull-right' aria-hidden='true'></span></a></td>
				</tr>";
		    }

		}


		mysqli_close($conn);

?>

<div class="row">
	<div class="col-sm-6">
		<h2><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Queues</h2>
		<hr />

		<h4>Add New Queue</h4>
		<form method="POST" action="/admin.php">
			<div class="input-group">
		      <input type="text" class="form-control" name="newQueue"  placeholder="Queue Name">
		      <span class="input-group-btn">
		        <input type="submit" class="btn btn-default" value="Add Queue">
		      </span>
		    </div>
		</form>
		
	    <hr>
	    <br>
		<ul class="list-group">
			<?php echo $queueList; ?>
		</ul>
	</div>

	<div class="col-sm-6">
		<h2><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Users</h2>
		<hr />
		<h4>All Users</h4>

		<table class="table table-striped">
			<tr>
				<th>Name</th>
				<th>Username</th>
				<th>Admin</th>
				<th></th>
			</tr>
			
			<?php echo $userTable; ?>

		</table>
	</div>
</div>


<!-- Include the page footer -->
<?php require_once('templates/footer.php'); ?>
