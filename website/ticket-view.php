<!--Include the page header -->
<?php require_once('templates/header2.php'); ?>

<ol class="breadcrumb">
  <li><a href="index.php">Home</a></li>
  <li class="active">Ticket</li>
</ol>

<form>
<div class="row">
	<div class="col-sm-6">
		<h2>Information</h2>
		<hr />
		<label>Status: </label>
		<mark>Open</mark>
		<br /><label>Name: </label>
		TH 216 - Projector Flickering
		<br /><label>Queue: </label>
		Classrooms
		<br /><label>Creator: </label>
		aschla4
		<br /><label>CC: </label>
		mcarmi4
		<br /><label>Room: </label>
		TH 216
		<br /><label>Date created: </label>
		3/13/15 04:36 PM
		<br /><label>Last modified: </label>
		3/14/15 12:20 PM
		<br><br>
	</div>
	<div class="col-sm-6">
		<h2>History</h2>
		<hr>
		<div class="list-group" id="list-group-scrollable">
			<a href="#" class="list-group-item">
			<h4 class="list-group-item-heading">3/13/2015 4:36 PM - Alexander Schlake</h4>
			<p class="list-group-item-text">An instructor reported the projector occasionally flickers when using the built-in PC source.</p>
			</a>
			<a href="#" class="list-group-item">
			<h4 class="list-group-item-heading">3/13/2015 5:20 PM - John McDermott</h4>
			<p class="list-group-item-text">The flickering also occurs from all other sources.</p>
			</a>
			<a href="#" class="list-group-item">
			<h4 class="list-group-item-heading">3/14/2015 8:36 AM - Isaias Hernandez</h4>
			<p class="list-group-item-text">The transmitters in the lectern and on the projector were reset. The system ran for 20 minutes on all sources without issue. We will watch this for the time being.</p>
			</a>
			<a href="#" class="list-group-item">
			<h4 class="list-group-item-heading">3/14/2015 12:20 PM - Diego Sanchez</h4>
			<p class="list-group-item-text">We received another report of the flickering. Further testing is required.</p>
			</a>
		</div>
		<hr>
		<textarea class="form-control" rows="5" id="message"></textarea><br />
		<button type="button" class="btn btn-default btn-lg" id="addMessage">Add message</button>
		
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
				
				$("#list-group-scrollable").append("<a href=\"#\" class=\"list-group-item\"><h4 class=\"list-group-item-heading\">" + month + "/" + day + "/" + year + " " + hour + ":" + minute + " " + amPm + " - Alex Schlake</h4><p class=\"list-group-item-text\">" + message + "</p></a>");
			});
		});
		</script>
		
	</div>
</div>
</div>
</form>



<!-- Include the page footer -->
<?php require_once('templates/footer.php'); ?>