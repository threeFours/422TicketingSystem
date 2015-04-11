<?php session_start(); 
	
	require_once("scripts/requireLogin.php");

?>

<!--Include the page header -->
<?php require_once('templates/header2.php'); ?>

<ol class="breadcrumb">
  <li><a href="index.php">Home</a></li>
  <li class="active">Queue</li>
</ol>

<form>
<div class="row">
	<div class="col-sm-6">
		<h2>Tickets</h2>
		<div class="list-group">
			<a href="ticket-view.php" class="list-group-item">
			<h4 class="list-group-item-heading">TH 216 - Projector Flickering</h4>
			</a>
			<a href="ticket-view.php" class="list-group-item">
			<h4 class="list-group-item-heading">LC A1 - Keyboard and mouse unresponsive</h4>
			</a>
			<a href="ticket-view.php" class="list-group-item">
			<h4 class="list-group-item-heading">LC C6 - Wireless mic low volume</h4>
			</a>
			<a href="ticket-view.php" class="list-group-item">
			<h4 class="list-group-item-heading">SES 138 - Projector not responsing to touch panel</h4>
			</a>
		</div>
	</div>
	<div class="col-sm-6">
	</div>
</div>
</div>
</form>

<!-- Include the page footer -->
<?php require_once('templates/footer.php'); ?>