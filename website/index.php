<!--Include the page header -->
<?php require_once('templates/header2.php'); ?>

<!-- Content of page goes here -->
<ol class="breadcrumb">
  <li class="active">Home</li>
</ol>
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
			<a href="ticket-view.php" class="list-group-item">
			<h4 class="list-group-item-heading">TH 216 - Projector Flickering</h4>
			</a>
		</div>
	</div>
	<div class="col-sm-6">
		<h2>Queues</h2>
		<hr />
		<div class="list-group">
			<a href="queue-view.php" class="list-group-item">
			<h4 class="list-group-item-heading">Classrooms</h4>
			</a>
			<a href="queue-view.php" class="list-group-item">
			<h4 class="list-group-item-heading">Classrooms FM</h4>
			</a>
			<a href="queue-view.php" class="list-group-item">
			<h4 class="list-group-item-heading">Webcheckout</h4>
			</a>
			<a href="queue-view.php" class="list-group-item">
			<h4 class="list-group-item-heading">Service Request - CTI</h4>
			</a>
		</div>
	</div>
</div>
</form>



<!-- Include the page footer -->
<?php require_once('templates/footer.php'); ?>
