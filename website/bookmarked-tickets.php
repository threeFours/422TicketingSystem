<?php session_start(); 
	
	require_once("scripts/requireLogin.php");

	require_once('scripts/dbConn.php');
	// get all tickets
		$sql = "SELECT ticket.* FROM ticket INNER JOIN bookmark ON bookmark.ticket = ticket.id WHERE bookmark.user =".$_SESSION['userId'];

		$result = mysqli_query($conn, $sql);

		$ticketList = "";

		if (mysqli_num_rows($result) > 0) {
		    while($row = mysqli_fetch_assoc($result)) {
		        $ticketList .= "<a href='ticket-view.php?ticket=".$row['id']."' class='list-group-item'><h4 class='list-group-item-heading'>".$row['title']." - ".$row['creator']." (".$row['dateCreated'].")<span class='glyphicon glyphicon-option-horizontal pull-right' aria-hidden='true'></span></h4></a>";
		    }
		}else{
			$ticketList = "You haven't bookmarked any tickets!";
		}

		mysqli_close($conn);

?>

<!--Include the page header -->
<?php require_once('templates/header2.php'); ?>

<ol class="breadcrumb">
  <li><a href="index.php">Home</a></li>
  <li class="active">Bookmarked Tickets</li>
</ol>

<form>
<div class="row">
	<div class="col-sm-6">
		<h2><span class="glyphicon glyphicon-bookmark" aria-hidden="true"></span> Bookmarked Tickets (<?php echo mysqli_num_rows($result); ?>)</h2>
		<hr/><br/>
		<div class="list-group">
			<?php echo $ticketList; ?>
		</div>
	</div>
	<div class="col-sm-6">
	</div>
</div>
</div>
</form>

<!-- Include the page footer -->
<?php require_once('templates/footer.php'); ?>