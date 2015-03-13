<!--Include the page header -->
<?php require_once('templates/header2.php'); ?>

<!-- Content of page goes here -->
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
	</div>
	<div class="col-sm-6">
		<h2>Queues</h2>
	</div>
</div>
</form>



<!-- Include the page footer -->
<?php require_once('templates/footer.php'); ?>
