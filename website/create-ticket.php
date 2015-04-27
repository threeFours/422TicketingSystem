<?php session_start(); 
	
	require_once("scripts/requireLogin.php");

	//connect to database
	require_once('scripts/dbConn.php');

	$sql = "SELECT * FROM queue";

	$result = mysqli_query($conn, $sql);

	$queueList = "";

	if (mysqli_num_rows($result) > 0) {
	    while($row = mysqli_fetch_assoc($result)) {
	        $queueList .= "<option value='".$row["name"]."'>".$row["name"]."</option>";
	    }
	}

	mysqli_close($conn);
?>

<!--Include the page header -->
<?php require_once('templates/header2.php'); ?>

<!-- Content of page goes here -->

<ol class="breadcrumb">
  <li><a href="index.php">Home</a></li>
  <li class="active">Create Ticket</li>
</ol>

<form action="/" method="post">
<div class="row">
	<div class="col-sm-6">
		<h2>Information</h2>
		<hr><br><br>
		<label>CC</label>
		<input type="text" class="form-control" name="cc" pattern="[a-zA-Z0-9]+" title="Please enter a valid username." required>
		<label>Ticket Name</label>
		<input type="text" class="form-control" name="ticketName" required>
		<label>Queue</label>
		<select class="form-control" name="queue" required>
			<?php echo $queueList; ?>
		</select>
		<label>Room</label>
		<input type="text" class="form-control" name="room" required>
		<br />
	</div>	
	<div class="col-sm-6">
		<h2>Message</h2>
		<hr><br><br>
		<label>Message</label>
		<textarea name="message" class="form-control" rows="10"></textarea>
		<br><br>
	</div>
</div>
<div class="row">
	<div class="col-xs-12" style="text-align:center">
		<input name="newTicket" value="1" hidden>
		<input type="submit" class="btn btn-primary btn-lg" value="Create Ticket">
		<br><br>
	</div>
</div>
</form>

<!-- 
			<option>New</option>
			<option>Open</option>
			<option>Resolved</option>
 -->


<!-- Include the page footer -->
<?php require_once('templates/footer.php'); ?>