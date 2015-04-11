<?php session_start(); ?>

<!--Include the page header -->
<?php require_once('templates/header2.php'); ?>

<!-- Content of page goes here -->
<ol class="breadcrumb">
  <li class="active">Home</li>
</ol>

<?php
	
	//connect to database
	require_once('scripts/dbConn.php');

	if (isset($_POST["newTicket"])) {

		// add ticket to db
		$sql1 = "INSERT INTO ticket(creator, cc, title, queue, room, status, message, dateCreated) VALUES ('".$_SESSION['username']."', '".$_POST['cc']."', '".$_POST['ticketName']."', '".$_POST['queue']."', '".$_POST['room']."', 'New', '".$_POST['message']."', NOW())";

		if (mysqli_query($conn, $sql1)): ?> 
			<div class="alert alert-success" role="alert"><span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span> Your ticket has been successfully added to the queue!</div>
		<?php else: ?>

		<?php endif;
	}

	// get all tickets
		$sql = "SELECT * FROM ticket";

		$result = mysqli_query($conn, $sql);

		$ticketList = "";

		if (mysqli_num_rows($result) > 0) {
		    while($row = mysqli_fetch_assoc($result)) {
		        $ticketList .= "<a href='ticket-view.php?ticket=".$row['id']."' class='list-group-item'><h4 class='list-group-item-heading'>".$row['title']."</h4></a>";
		    }
		}

		// get all queues
		$sql2 = "SELECT * FROM queue";

		$result = mysqli_query($conn, $sql2);

		$queueList = "";

		if (mysqli_num_rows($result) > 0) {
		    while($row = mysqli_fetch_assoc($result)) {
		        $queueList .= "<a href='ticket-view.php?queue=".$row['id']."' class='list-group-item'><h4 class='list-group-item-heading'>".$row['name']."</h4></a>";
		    }
		}

		mysqli_close($conn);

?>

<form method="post" action="create-ticket.php">
<div class="row">
	<div class="col-xs-12" style="text-align:leftr">
			<input type="submit" class="btn btn-primary btn-lg"   value="Create New Ticket">
			<br><br>
	</div>
</div>
<div class="row">
	<div class="col-sm-6">
		<h2>Incoming Tickets</h2>
		<hr />
		<div class="list-group">
			<?php echo $ticketList; ?>
		</div>
	</div>
	<div class="col-sm-6">
		<h2>Queues</h2>
		<hr />
		<div class="list-group">
			<?php echo $queueList; ?>
		</div>
	</div>
</div>
</form>



<!-- Include the page footer -->
<?php require_once('templates/footer.php'); ?>
