<?php session_start(); 
	
	require_once("scripts/requireLogin.php");

	if(!isset($_GET['ticket'])){
		header("Location: /");
	}else{

		//connect to database
		require_once('scripts/dbConn.php');

		if(isset($_POST['postMessage'])){
			$sql = "INSERT INTO message(user, message, ticket) VALUES ('".$_SESSION["userFirstName"]." ".$_SESSION["userLastName"]."', '".$_POST['message']."', ".$_GET['ticket'].")";
			mysqli_query($conn, $sql); 
		}

		$sql = "SELECT * FROM ticket INNER JOIN user ON user.username = ticket.creator WHERE ticket.id=".$_GET['ticket'];

		$result = mysqli_query($conn, $sql);

		$ticketList = "";

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
		    	$messages .= "<a href='#' class='list-group-item'><h4 class='list-group-item-heading'>".$row['dateTime']." - ".$row['user']."</h4><p class='list-group-item-text'>".$row['message']."</p></a>";
		    }
		}

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
		<h2>Information</h2>
		<hr />
		<label>Status: </label>
		<mark><? echo $ticketStatus; ?></mark>
		<br /><label>Name: </label>
		<? echo $ticketName; ?>
		<br /><label>Queue: </label>
		<? echo $ticketQueue; ?>
		<br /><label>Creator: </label>
		<? echo $ticketCreator; ?>
		<br /><label>CC: </label>
		<? echo $ticketCC; ?>
		<br /><label>Room: </label>
		<? echo $ticketRoom; ?>
		<br /><label>Date created: </label>
		<? echo $ticketDateCreated; ?>
		<br /><label>Last modified: </label>
		<? echo $ticketLastModified; ?>
		<br><br>
	</div>
	<div class="col-sm-6">
		<h2>History</h2>
		<hr>
		<div class="list-group" id="list-group-scrollable">
			<a href="#" class="list-group-item">
			<h4 class="list-group-item-heading"><?php echo $ticketDateCreated." - ".$creatorFirstName." ".$creatorLastName; ?></h4>
			<p class="list-group-item-text"><?php echo $ticketMessage; ?></p>
			
			<?php echo $messages; ?>
		</div>
		<hr>
		<form action="" method="POST">
			<textarea class="form-control" rows="5" name="message" id="message"></textarea><br />
			<input name="postMessage" value="1" hidden>
			<input type="submit" class="btn btn-default btn-lg" id="addMessage" value="Add message">
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