<?php session_start(); 
	
	require_once("scripts/requireLogin.php");

?>

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

		$selected = ["", "", ""];

		if ($_GET['t'] == "All"){
			$where = 1;
			$selected[2] = "style='background-color:#35638F; color:#e7e7e7'";
		}else if ($_GET['t'] == "Closed") {
			$where = "status='Closed'";
			$selected[1] = "style='background-color:#35638F; color:#e7e7e7'";
		}else{
			$where = "status='New' OR status='Open'";
			$selected[0] = "style='background-color:#35638F; color:#e7e7e7'";
		}

		$sql = "SELECT * FROM ticket WHERE ".$where." ORDER BY dateCreated DESC";

		$ticResult = mysqli_query($conn, $sql);

		$ticketList = "";

		if (mysqli_num_rows($ticResult) > 0) {
		    while($row = mysqli_fetch_assoc($ticResult)) {
		        $ticketList .= "<a href='ticket-view.php?ticket=".$row['id']."' class='list-group-item'><h4 class='list-group-item-heading'>".$row['title']." - ".$row['creator']." (".$row['dateCreated'].")<span class='glyphicon glyphicon-option-horizontal pull-right' aria-hidden='true'></span></h4></a>";
		    }
		}

		// get all queues
		$sql2 = "SELECT * FROM queue";

		$result = mysqli_query($conn, $sql2);

		$queueList = "";

		if (mysqli_num_rows($result) > 0) {
		    while($row = mysqli_fetch_assoc($result)) {
		        $queueList .= "<a href='queue-view.php?queue=".$row['name']."' class='list-group-item'><h4 class='list-group-item-heading'>".$row['name']."<span class='glyphicon glyphicon-option-horizontal pull-right' aria-hidden='true'></span></h4></a>";
		    }
		}

		mysqli_close($conn);

?>

<div class="row">
	<div class="col-xs-12" style="text-align:leftr">
			<a class="btn btn-primary btn-lg" href="create-ticket.php"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Create New Ticket</a>
			<br><br>
	</div>
</div>
<div class="row">
	<div class="col-sm-6">
		<h2><span class="glyphicon glyphicon-tags" aria-hidden="true"></span> <?php echo $_GET['t']; ?> Tickets (<?php echo mysqli_num_rows($ticResult); ?>)</h2>
		<hr />
		<div class="btn-group" role="group" aria-label="...">
		  <a href="/tickets-and-queues.php?t=New and Open" class="btn btn-default btn-xs" <?php echo $selected[0]; ?>>New & Open</a>
		  <a href="/tickets-and-queues.php?t=Closed" class="btn btn-default btn-xs" <?php echo $selected[1]; ?>>Closed</a>
		  <a href="/tickets-and-queues.php?t=All" class="btn btn-default btn-xs" <?php echo $selected[2]; ?>>All</a>
		</div>
		<br/><br/>
		<div class="list-group">
			<?php echo $ticketList; ?>
		</div>
	</div>
	<div class="col-sm-6">
		<h2><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>  Queues</h2>
		<hr />
		<div class="list-group">
			<?php echo $queueList; ?>
		</div>
	</div>
</div>


<!-- Include the page footer -->
<?php require_once('templates/footer.php'); ?>
