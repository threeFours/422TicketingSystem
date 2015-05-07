<?php session_start(); 
	
	require_once("scripts/requireLogin.php");

	if(!isset($_GET['ticket'])){
		header("Location: /");
	}else{

		//connect to database
		require_once('scripts/dbConn.php');

		//check for bookmark
		$sql = "SELECT id FROM bookmark WHERE user=".$_SESSION['userId']." AND ticket=".$_GET['ticket'];
		$result = mysqli_query($conn, $sql);

		$bookmarked = "Bookmark This Ticket";
		$BMlink = "createBookmark";
		if (mysqli_num_rows($result) > 0) {
		 	$bookmarked = "Un-Bookmark This Ticket";
		 	$BMlink = "deleteBookmark";
		 } 


		if(isset($_POST['postMessage'])){
			$sql = "INSERT INTO message(user, message, ticket) VALUES ('".$_SESSION["userFirstName"]." ".$_SESSION["userLastName"]."', '".$_POST['message']."', ".$_GET['ticket'].")";
			mysqli_query($conn, $sql); 
		}

		$sql = "SELECT * FROM ticket INNER JOIN user ON user.username = ticket.creator WHERE ticket.id=".$_GET['ticket'];

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) == 1) {
		    while($row = mysqli_fetch_assoc($result)) {
		    	$ticketId = $row['id'];
		        $ticketStatus = $row['status'];
		        $ticketName = $row['title'];
		        $ticketQueue = $row['queue'];
		        $ticketCreator = $row['creator'];
		        $ticketCC = $row['cc'];
		        $ticketRoom = $row['room'];
		        $ticketDateCreated = $row['dateCreated'];
		        $ticketLastModified = $row['dateCreated'];
		        $ticketMessage = $row['message'];
		        $creatorFirstName = $row['firstName'];
		        $creatorLastName = $row['lastName'];
		    }
		}

		$sql = "SELECT * FROM message WHERE ticket=".$_GET['ticket'];

		$result = mysqli_query($conn, $sql);

		$messages = "";

		if (mysqli_num_rows($result) > 0) {
		    while($row = mysqli_fetch_assoc($result)) {
		    	$messages .= "<li class='list-group-item'><h4 class='list-group-item-heading'>".$row['dateTime']." - ".$row['user']."</h4><p class='list-group-item-text'>".$row['message']."</p></li>";
		    }
		}

	}

	if($ticketStatus == "Open"){
		$statusColor = "class='alert-sm alert-warning'";
	}else if($ticketStatus == "New"){
		$statusColor = "class='alert-sm alert-success'";
	}else{
		$statusColor = "class='alert-sm alert-danger'";
	}

?>

<!--Include the page header -->
<?php require_once('templates/header2.php'); ?>

<ol class="breadcrumb">
  <li><a href="index.php">Home</a></li>
  <li class="active">Ticket</li>
</ol>

<div class="row">
	<div class="col-sm-6">
		<h2><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span> Information</h2>
		<hr />
		<label>Status: </label>
		<mark <?php echo $statusColor; ?>><?php echo $ticketStatus; ?></mark>
		<br /><label>Name: </label>
		<?php echo $ticketName; ?>
		<br /><label>Queue: </label>
		<?php echo $ticketQueue; ?>
		<br /><label>Creator: </label>
		<?php echo $ticketCreator; ?>
		<br /><label>CC: </label>
		<?php echo $ticketCC; ?>
		<br /><label>Room: </label>
		<?php echo $ticketRoom; ?>
		<br /><label>Date created: </label>
		<?php echo $ticketDateCreated; ?>
		<br /><label>Last modified: </label>
		<?php echo $ticketLastModified; ?>
		<br><br>
		<!-- Single button -->
		<div class="btn-group">
		  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
		    Update Ticket Status <span class="caret"></span>
		  </button>
		  <ul class="dropdown-menu" role="menu">
		    <li <?php if ($ticketStatus == "New") echo "class='disabled'"; ?>><a href="/scripts/change-status.php?status=New&ticket=<?php echo $_GET['ticket']; ?>">New</a></li>
		    <li <?php if ($ticketStatus == "Open") echo "class='disabled'"; ?>><a href="/scripts/change-status.php?status=Open&ticket=<?php echo $_GET['ticket']; ?>">Open</a></li>
		    <li <?php if ($ticketStatus == "Closed") echo "class='disabled'"; ?>><a href="/scripts/change-status.php?status=Closed&ticket=<?php echo $_GET['ticket']; ?>">Closed</a></li>
		  </ul>
		</div>
		<br><br><br><br>

		<a href="/scripts/<?php echo $BMlink; ?>.php?tid=<?php echo $_GET['ticket']; ?>" class="btn btn-default btn-lg"><span class='glyphicon glyphicon-bookmark' aria-hidden='true'></span> <?php echo $bookmarked; ?></a>

	</div>
	<div class="col-sm-6">
		<h2><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> History</h2>
		<hr>
		<ul class="list-group" id="list-group-scrollable" style="height: 200px">
			<li class="list-group-item">
			<h4 class="list-group-item-heading"><?php echo $ticketDateCreated." - ".$creatorFirstName." ".$creatorLastName; ?></h4>
			<p class="list-group-item-text"><?php echo $ticketMessage; ?></p>
			</li>
			<?php echo $messages; ?>
		</ul>
		<hr>
		<form action="" method="POST">
			<textarea class="form-control" rows="5" name="message" id="message"></textarea><br />
			<input name="postMessage" value="1" hidden>
			<button type="submit" class="btn btn-default btn-lg" id="addMessage"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Add message</button>
		</form>
		
		<script>
		$(document).ready(function(){
			$("#addMessage").click(function(){
				
				var today = new Date();
				var day = today.getDate();
				var month = today.getMonth()+1;
				var year = today.getFullYear();
				var hour = today.getHours();
				var minute = today.getMinutes();
				var amPm = "AM";
				var message = document.getElementById("message").value;
				
				if(hour > 12){ amPm = "PM";}
				if(hour > 12){ hour = hour - 12;}
				if(minute < 10){ minute = '0'+ minute;}
				
				$("#list-group-scrollable").append("<a href=\"#\" class=\"list-group-item\"><h4 class=\"list-group-item-heading\">" + month + "/" + day + "/" + year + " " + hour + ":" + minute + " " + amPm + " - Alex Schlake</h4><p class=\"list-group-item-text\">" + message + "</p></a>");
			});
		});
		</script>
		
	</div>
</div>
</div>



<!-- Include the page footer -->
<?php require_once('templates/footer.php'); ?>